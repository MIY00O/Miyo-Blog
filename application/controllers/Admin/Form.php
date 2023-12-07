<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        is_admin();
        $this->load->model('Auth_model');
    }

    public function index()
    {
        $this->db->select('*')->from('user');
        $this->db->order_by('name', 'ASC');
        $user   = $this->db->get()->result_array();
        $data  = array(
            'title' => 'Tambah - CMS',
            'user' => $user,
            'last_login' => $this->Auth_model->last_login(),

        );
        $this->template->load('admin/layout/_template', 'admin/pages/tambah-admin', $data);
    }

    public function Simpan()
    {
        $username = $this->input->post('username');

        $this->db->from('user');
        $this->db->where('username', $username);
        $cek = $this->db->get()->result_array();
        if ($cek <> NULL) {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Tidakk! Username sudah digunakan!
            </div>');
            redirect('Admin/Form');
        } else {
            $this->Auth_model->save();
            $this->session->set_flashdata('alert', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2"></i>Yeah! Berhasil menyimpan data!
        </div>');
            redirect('Admin/Form');
        }
    }

    public function Update()
    {
        $this->Auth_model->update();
        $this->session->set_flashdata('alert', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Berhasil memperbarui data!
            </div>');
        redirect('Admin/Form');
    }

    public function Hapus($id)
    {
        $where = array('id_user' => $id);
        if ($where <> NULL) {

            $this->db->Delete('user', $where);
            $this->session->set_flashdata('alert', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Berhasil menghapus data!
            </div>');
            redirect('Admin/Form');
        } else {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Gagal menghapus data!
            </div>');
            redirect('Admin/Form');
        }
    }
}
