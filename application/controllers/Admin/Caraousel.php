<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Caraousel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Auth_model');
    }

    public function index()
    {
        $this->db->select('*')->from('caraousel');
        $this->db->order_by('id_caraousel', 'DESC');
        $caraousel   = $this->db->get()->result_array();
        $data  = array(
            'title' => 'Caraousel - CMS',
            'caraousel' => $caraousel,
            'last_login' => $this->Auth_model->last_login(),
        );
        $this->template->load('admin/layout/_template', 'admin/pages/caraousel-admin', $data);
    }

    public function Simpan()
    {
        $time = date('YmdHis') . '.jpg';
        $config['upload_path']  = 'assets/my-assets/upload/caraousel';
        $config['max_size'] = 6 * 1024 * 1024;
        $config['allowed_types']    = '*';
        $config['overwrite']        = TRUE;
        $config['file_name']        = $time;
        $this->load->library('upload', $config);
        if ($_FILES['foto']['size'] >= 6 * 1024 * 1024) {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Ukuran file terlalu besar, upload foto kurang dari 500 KB.
            </div>');
            redirect('Admin/Caraousel');
        } else if (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }
        $data = array(
            'judul' => $this->input->post('judul'),
            'foto' => $time,
        );
        $this->db->insert('caraousel', $data);
        $this->session->set_flashdata('alert', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2"></i>Yeah! Berhasil menyimpan caraousel!
        </div>');
        redirect('Admin/Caraousel');
    }
    public function Hapus($id)
    {
        $filename = FCPATH . '/assets/my-assets/upload/caraousel/' . $id;
        if (file_exists($filename)) {
            unlink('./assets/my-assets/upload/caraousel/' . $id);
        }
        $where = array('foto' => $id);
        if ($where <> NULL) {
            $this->db->Delete('caraousel', $where);
            $this->session->set_flashdata('alert', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Berhasil menghapus caraousel!
            </div>');
            redirect('Admin/Caraousel');
        } else {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Gagal menghapus caraousel!
            </div>');

            redirect('Admin/Caraousel');
        }
    }
}
