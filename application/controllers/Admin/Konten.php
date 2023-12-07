<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konten extends CI_Controller
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

        $this->db->select('*')->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
        $this->db->join('user c', 'a.username=c.username', 'left');
        $this->db->order_by('id_konten', 'DESC');
        $konten   = $this->db->get()->result_array();

        $data  = array(
            'konten' => $konten,
            'kategori' => $kategori,
            'last_login' => $this->Auth_model->last_login(),
        );
        $data['title'] = 'Konten - CMS';
        $this->template->load('admin/layout/_template', 'admin/pages/konten-admin', $data);
    }

    public function Simpan()
    {
        $time = date('YmdHis') . '.jpg';
        $config['upload_path']  = 'assets/my-assets/upload/konten';
        $config['max_size'] = 500 * 1024;
        $config['allowed_types']    = '*';
        $config['overwrite']        = TRUE;
        $config['file_name']        = $time;
        $this->load->library('upload', $config);
        if ($_FILES['foto']['size'] >= 6 * 1024 * 1024) {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Ukuran file terlalu besar, upload foto kurang dari 500 KB.
            </div>');
            redirect('Admin/konten');
        } else if (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }

        $this->db->from('konten');
        $this->db->where('judul', $this->input->post('judul'));
        $cek = $this->db->get()->result_array();
        if ($cek <> NULL) {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Tidakk! Judul konten sudah digunakan!
            </div>');
            redirect('Admin/konten');
        } else {
            $data = array(
                'judul' => $this->input->post('judul'),
                'id_kategori' => $this->input->post('id_kategori'),
                'keterangan' => $this->input->post('keterangan'),
                'tanggal' => date('Y-m-d'),
                'foto' => $time,
                'username' => $this->session->userdata('username'),
                'slug' => str_replace(' ', '-', $this->input->post('judul')),
            );
            $this->db->insert('konten', $data);
            $this->session->set_flashdata('alert', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2"></i>Yeah! Berhasil menyimpan konten!
        </div>');
            redirect('Admin/konten');
        }
    }

    public function Update()
    {
        $namafoto = $this->input->post('nama_foto');
        $config['upload_path']  = 'assets/my-assets/upload/konten';
        $config['max_size'] = 6 * 1024 * 1024;
        $config['allowed_types']    = '*';
        $config['overwrite']        = TRUE;
        $config['file_name']    = $namafoto;
        $this->load->library('upload', $config);
        if ($_FILES['foto']['size'] >= 6 * 1024 * 1024) {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Ukuran file terlalu besar, upload foto kurang dari 500 KB.
            </div>');
            redirect('Admin/konten');
        } else if (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }
        $data = array(
            'judul' => $this->input->post('judul'),
            'id_kategori' => $this->input->post('id_kategori'),
            'keterangan' => $this->input->post('keterangan'),
            'slug' => str_replace(' ', '-', $this->input->post('judul')),
        );
        $where = array(
            'foto' => $this->input->post('nama_foto')
        );
        $this->db->update('konten', $data, $where);
        $this->session->set_flashdata('alert', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2"></i>Yeah! Berhasil mengubah konten!
        </div>');
        redirect('Admin/konten');
    }

    public function Hapus($id)
    {
        $filename = FCPATH . '/assets/my-assets/upload/konten/' . $id;
        if (file_exists($filename)) {
            unlink('./assets/my-assets/upload/konten/' . $id);
        }
        $where = array('foto' => $id);
        if ($where <> NULL) {
            $this->db->Delete('konten', $where);
            $this->session->set_flashdata('alert', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Berhasil menghapus konten!
            </div>');
            redirect('Admin/konten');
        } else {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Gagal menghapus konten!
            </div>');
            redirect('Admin/konten');
        }
    }
}
