<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
		$this->load->model('Artic_model', 'Artic');
	}

	public function index()
	{
		// Article
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row();

		$this->db->from('caraousel');
		$caraousel = $this->db->get()->result_array();

		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();

		$this->db->select('*')->from('konten a');
		$this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
		$this->db->join('user c', 'a.username=c.username', 'left');
		$this->db->order_by('id_konten', 'DESC');
		$konten   = $this->db->get()->result_array();

		// Article

		if (!$this->uri->segment(3) == 'konten') {
			$this->session->unset_userdata('keyword');
		}

		if ($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}

		// Pagination
		$this->load->library('pagination');

		$this->db->from('konten');
		$this->db->like('judul', $data['keyword']);
		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 3;

		$this->pagination->initialize($config);
		$Artic['start'] = $this->uri->segment(3);
		$Artic = $this->Artic->getArtic($config['per_page'], $Artic['start'], $data['keyword']);
		// Pagination		
		$name = $this->session->userdata('keyword');
		if ($name) {
			$name = $this->session->userdata('keyword');
		} else {
			$name = 'Home';
		}
		$data = array(
			'title' 	=> $name . " | ",
			'konfig' 	=> $konfig,
			'kategori' 	=> $kategori,
			'caraousel' => $caraousel,
			'konten' 	=> $konten,
			'Artic' 	=> $Artic,
		);

		$this->template->load('user/layout/_template', 'home', $data);
	}

	public function Kategori($id)
	{
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row();

		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();

		$this->db->from('kategori');
		$name = $this->db->get()->row();

		$this->db->from('konten a');
		$this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
		$this->db->order_by('id_konten', 'DESC');
		$this->db->where('a.id_kategori', $id);
		$konten = $this->db->get()->result_array();

		$data = array(
			'title' => $name->nama_kategori . " | ",
			'konfig' => $konfig,
			'kategori' => $kategori,
			'konten' => $konten,
		);

		$this->template->load('user/layout/_template', 'user/pages/kategori-auth', $data);
	}


	public function Article($id)
	{
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row();

		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();

		$this->db->from('konten a');
		$this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
		$this->db->order_by('id_konten', 'DESC');
		$this->db->where('slug', $id);
		$konten = $this->db->get()->row();

		$data = array(
			'title' => $konten->judul . " | ",
			'konfig' => $konfig,
			'kategori' => $kategori,
			'konten' => $konten,
		);

		$this->template->load('user/layout/_template', 'user/pages/article-auth', $data);
	}

	public function Login()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$this->db->from('user')->where('username', $username);
		$user = $this->db->get()->row();
		if ($user == NULL) {
			// $this->session->set_flashdata('alert','
			// <div class="alert alert-danger alert-dismissible fade show text-white" role="alert">
			// <i class="fa fa-exclamation-circle me-2"></i>Username tidak ada!
			// <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			// </div>');
			redirect('auth');
		} else if ($user->password == $password) {
			$data = [
				'username' 	=> $user->username,
				'name' 		=> $user->name,
				'level' 	=> $user->level,
				'id_user' 	=> $user->id_user,
			];
			$b = $this->session->set_userdata($data);

			if ($user->level == 'Admin') {
				redirect('ControllerAdmin');
			} else if ($user->level == 'User') {
				redirect('home');
			} else {
				redirect('home');
			}
		} else {
			// $this->session->set_flashdata('alert','
			// <div class="alert alert-danger alert-dismissible fade show" role="alert">
			// <i class="fa fa-exclamation-circle me-2"></i><p class="">Password salah!</p>
			// <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			// </div>');
			redirect('home');
		}
	}

	public function Logout()
	{
		date_default_timezone_set("ASIA/JAKARTA");
		$date = date('Y-m-d H:i:s');
		$id = $this->session->userdata('id_user');

		$data = array(
			'last_login' => $date
		);

		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
		$this->session->sess_destroy();
		redirect('home');
	}
}
