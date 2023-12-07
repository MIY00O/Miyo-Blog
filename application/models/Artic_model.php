<?php
class Artic_model extends CI_Model
{
    public function getAllArtic()
    {
        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();

        $this->db->select('*')->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
        $this->db->order_by('id_konten', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getArtic($limit, $start, $keyword = null)
    {

        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();

        $this->db->select('*')->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
        $this->db->order_by('id_konten', 'DESC');
        if ($keyword) {
            $this->db->like('judul', $keyword);
        }
        return $this->db->get('', $limit, $start)->result_array();
    }

    public function countAllArtic()
    {
        return $this->db->get('konten')->num_rows();
    }
}
