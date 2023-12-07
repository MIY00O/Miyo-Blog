<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Auth_model');
    }

    public function index()
    {
        $this->db->select('*')->from('kategori');
        $this->db->order_by('nama_kategori', 'ASC');
        $kategori   = $this->db->get()->result_array();
        $data  = array(
            'title' => 'Kategori - CMS',
            'kategori' => $kategori,
            'last_login' => $this->Auth_model->last_login(),
        );
        $this->template->load('admin/layout/_template', 'admin/pages/kategori-admin', $data);
    }

    public function Simpan()
    {
        $this->db->from('kategori');
        $this->db->where('nama_kategori', $this->input->post('nama_kategori'));
        $cek = $this->db->get()->result_array();
        if ($cek <> NULL) {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Tidakk! nama kategori sudah digunakan!
            </div>');
            redirect('Admin/Kategori');
        } else {
            $data = array(
                'nama_kategori' => $this->input->post('nama_kategori')
            );
            $this->db->insert('kategori', $data);
            $this->session->set_flashdata('alert', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2"></i>Yeah! Berhasil menyimpan nama kategori!
        </div>');
            redirect('Admin/Kategori');
        }
    }

    public function Update()
    {
        $where = array(
            'id_kategori' => $this->input->post('id_kategori')
        );
        $data = array(
            'nama_kategori'     => $this->input->post('nama_kategori')
        );
        if ($where <> NULL and $data <> NULL) {
            $this->db->update('kategori', $data, $where);
            $this->session->set_flashdata('alert', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Berhasil memperbarui Kategori!
            </div>');
            redirect('Admin/Kategori');
        } else {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Gagal memperbarui Kategori!
            </div>');
            redirect('Admin/Kategori');
        }
    }

    public function Hapus($id)
    {
        $where = array('id_kategori' => $id);
        if ($where <> NULL) {
            $this->db->Delete('kategori', $where);
            $this->session->set_flashdata('alert', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Berhasil menghapus Kategori!
            </div>');
            redirect('Admin/Kategori');
        } else {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Gagal menghapus Kategori!
            </div>');
            redirect('Admin/Kategori');
        }
    }
}
