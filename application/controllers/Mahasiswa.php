<?php

class Mahasiswa extends CI_Controller {
   
    public function __construct()
    {
      parent::__construct();
      $this->load->model('Mahasiswa_model');
      $this->load->library('form_validation');
    }
    public function index()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();
      if( $this->input->post('keyword') ){
        $data['mahasiswa'] = $this->Mahasiswa_model->searchDataMahasiswa();
      }
        $this->load->database();
        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('templates/footer');
    }

    public function insert() 
    {
        $data['judul'] = 'form tambah data';
        $data['jurusan'] = ['Teknik informatika', 'teknik pangan', 'teknik lingkungan'];

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nrp', 'Nrp', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('mahasiswa/insert', $data);
            $this->load->view('templates/footer');
        } else {
            
            $this->Mahasiswa_model->insertDataMahasiswa();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('mahasiswa');
        }

    }

    public function delete($id)
    {
            $this->Mahasiswa_model->deleteDataMahasiswa($id);
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('mahasiswa');
      }

      public function detail($id)
      {
        $data['judul'] = 'Detail Data Mahasiswa';

        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/detail', $data);
        $this->load->view('templates/footer');


      }

      
      public function edit($id) 
      {
          $data['judul'] = 'form edit data';
          $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
          $data['jurusan'] = ['Teknik informatika', 'teknik pangan', 'teknik lingkungan', 'teknik mesin', 'teknik electronik', 'teknik enterprainer'];

          $this->form_validation->set_rules('nama', 'Nama', 'required');
          $this->form_validation->set_rules('nrp', 'Nrp', 'required|numeric');
          $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
          $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        
          if($this->form_validation->run() == FALSE){
              $this->load->view('templates/header', $data);
              $this->load->view('mahasiswa/edit', $data);
              $this->load->view('templates/footer');
          } else {
              
              $this->Mahasiswa_model->editDataMahasiswa();
              $this->session->set_flashdata('flash', 'Di edit');
              redirect('mahasiswa');
          }
  
      }


  }