<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_model
{
    public function save()
    {
        $data = array(
            'username'  => $this->input->post('username'),
            'name'      => $this->input->post('name'),
            'password'  => md5($this->input->post('password')),
            'level'     => $this->input->post('level'),
        );
        $this->db->insert('user', $data);
    }

    public function update()
    {
        $data = array(
            'name'      => $this->input->post('name'),
            'username'      => $this->input->post('username'),
            'level'     => $this->input->post('level'),
        );
        $where = array(
            'id_user' => $this->input->post('id_user')
        );
        $this->db->update('user', $data, $where);
    }
    public function last_login()
    {
        $this->db->select('username, last_login');
        $this->db->from('user');
        $this->db->order_by('last_login', 'desc');
        $this->db->limit(1);
        return $this->db->get()->row();
    }
}
