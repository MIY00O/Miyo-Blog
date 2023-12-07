<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerAdmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Auth_model');
    }

    public function index()
    {
        $data = array(
            'title' => "Dashboard - CMS",
            'last_login' => $this->Auth_model->last_login(),
        );
        $this->template->load('admin/layout/_template', 'admin/auth-admin', $data);
    }
}
