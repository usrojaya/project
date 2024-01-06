<?php
class Peoples_model extends CI_Model {

    public function getAllPeoples() {
        return $this->db->get('peoples')->result_array();
    }

    public function getPeoples($limit, $start, $keyword = null) {
        if ($keyword) {
            $this->db->like('name', $keyword);
            $this->db->or_like('email', $keyword);
        }
        return $this->db->get('peoples', $limit, $start)->result_array();
    }

    public function countAllPeoples() {
        return $this->db->count_all_results('peoples');
    }

    public function searchDataPeoples() {
        $keyword = $this->input->post('keyword', true);
        // Pastikan untuk membersihkan atau validasi $keyword di sini untuk keamanan.
        $this->db->like('name', $keyword);
        $this->db->or_like('address', $keyword);
        $this->db->or_like('email', $keyword);
        
        return $this->db->get('peoples')->result_array();
    }
}
