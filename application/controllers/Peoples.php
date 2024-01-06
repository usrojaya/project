<?php

class Peoples extends CI_Controller {

  public function __construct() {
      parent::__construct();
      $this->load->model('Peoples_model');
    
  }

  public function index() {
      $data['judul'] = 'halaman peoples';
      
      //mendapatklan no halaman saat ini
      $page_number = $this->uri->segment(3) ? $this->uri->segment(3) : 1;


      if ($this->input->post('keyword')) {
          $data['keyword'] = $this->input->post('keyword');
          $this->session->set_userdata('keyword', $data['keyword']);
      } else {
       
        $data['keyword'] = $this->session->userdata('keyword');
      }

      // Config
      $this->db->like('name', $data['keyword']);
      $this->db->from('peoples');

      // Pagination
      $config['base_url'] = base_url('peoples/index');
      $config['total_rows'] = $this->db->count_all_results();
      $data['total_rows'] = $config['total_rows'];
            // Jumlah total baris data
      $config['per_page'] = 10; // Jumlah data per halaman
      $data['total_rows'] = $config['total_rows']; // Jumlah total baris data
      
      $total_data = $data['total_rows']; // Mengambil jumlah total baris data dari variabel
      $per_page = $config['per_page']; // Mengambil jumlah data per halaman dari konfigurasi
      
    $data['page_num'] = ceil($total_data / $per_page); // Menghitung jumlah halaman yang diperlukan
      
      // Mendapatkan nomor halaman saat ini dari URI
      $data['current_page'] = $this->uri->segment(3) ? $this->uri->segment(3) : 1;
      
  // Initialize pagination
      $this->pagination->initialize($config);
      $data['start'] = $this->uri->segment(3);
      $data['peoples'] = $this->Peoples_model->getPeoples($config['per_page'], $data['start'], $data['keyword']);
      
      $this->load->view('templates/header', $data);
      $this->load->view('peoples/index', $data);
      $this->load->view('templates/footer');
  }
}
