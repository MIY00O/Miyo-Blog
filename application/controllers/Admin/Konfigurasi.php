<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi extends CI_Controller
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
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();
        $data = array(
            'title' => 'Konfigurasi - CMS',
            'konfig' => $konfig,
            'last_login' => $this->Auth_model->last_login(),
        );
        $this->template->load('admin/layout/_template', 'admin/pages/konfigurasi-admin', $data);
    }
    public function Update()
    {

        $where = array(
            'id_konfigurasi' => 1
        );
        $data = array(
            'judul_web'     => $this->input->post('judul_web'),
            'profil_web'     => $this->input->post('profil_web'),
            'facebook'     => $this->input->post('facebook'),
            'instagram'     => $this->input->post('instagram'),
            'alamat'     => $this->input->post('alamat'),
            'email'     => $this->input->post('email'),
            'no_wa'     => $this->input->post('no_wa')
        );
        if ($where <> NULL and $data <> NULL) {
            $this->db->update('konfigurasi', $data, $where);
            $this->session->set_flashdata('alert', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2"></i>Berhasil memperbarui Konfigurasi!
        </div>');
            redirect('Admin/Konfigurasi');
        } else {
            $this->session->set_flashdata('alert', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2"></i>Gagal memperbarui Konfigurasi!
        </div>');
            redirect('Admin/Konfigurasi');
        }
    }
}
