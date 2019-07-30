<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_syarat extends CI_Controller { //Data  atau nama class (harus sesuai dengan nama  file nya)

	
	
	function __construct(){ //untuk mengload db_perusahaan
		parent::__construct();		
		$this->load->model(array('db_perusahaan','db_kategori','db_lokasi','db_syarat')); // bukan folder,  bawaanya Codeigniter (model) pakai ini 
		// $this->load->helper('url');
	}
    function hapus_data_syarat ($id_loker){ // $id_lokasi ini apa??
        $where = array('id_loker' => $id_loker); //'id_lokasi itu field di db_lokasi'
        $this->db_perusahaan->hapus_data_perusahaan($where,'loker');

        redirect('backend/data_perusahaan/tampil_data_perusahaan'); //redirect = ngoper ,, mindah ke index melalui ke atas dan di tampilkan
    }
       function edit_data_syarat($id_loker){ // id_lokasi
        $data['kategori']=$this->db_kategori->tampil_data_kategori()->result();
        $data['lokasi']=$this->db_lokasi->tampil_data_lokasi()->result();
        $this->load->view('header');
        $where = array('id_loker' => $id_loker);
        $data['loker'] = $this->db_lokasi->edit_data($where,'loker')->result();
        $this->load->view('view_perusahaan/ed_perusahaan',$data); //$data ini daeri variable di atasnya
        $this->load->view('footer');
    }
    function a_read_more($id_loker){ // id_lokasi
        $data['kategori']=$this->db_kategori->tampil_data_kategori()->result();
        $data['lokasi']=$this->db_lokasi->tampil_data_lokasi()->result();
        $this->load->view('frontend/template2');
        $where = array('id_loker' => $id_loker);
        $data['loker'] = $this->db_lokasi->edit_data($where,'loker')->result();
        $this->load->view('frontend/read_more',$data); //$data ini daeri variable di atasnya
        $this->load->view('frontend/footer');
    }
    function update_data_syarat(){
        $id_lokasi = $this->input->post('id_lokasi');
        $nama_lokasi = $this->input->post('nama_lokasi');
        
        $data = array(
            'nama_lokasi' => $nama_lokasi,
            );

        $where = array(
            'id_lokasi' => $id_lokasi
            );

        $this->db_lokasi->update_data($where,$data,'lokasi');
        redirect('backend/data_lokasi/tampil_data_lokasi');
    }

    function index(){
      $data['user'] = $this->db_syarat->tampil_data_syarat()->result();
      $this->load->view('backend/view_syarat/v_syarat',$data);
  }

  

	function tampil_data_syarat(){ // tampil_data adaalah method yang  terdapat di dalam nya models->m_model // user adalah variable yang  di mana akan di panggil di view
		
		$data['user'] = $this->db_syarat->tampil_data_syarat()->result();
        //print_r($data);exit();
		$this->load->view('header');
		$this->load->view('view_syarat/v_syarat',$data);
		$this->load->view('footer');		
	}
	function form_input_data_syarat(){
		$data['loker']=$this->db_syarat->getloker()->result();
		// $data['lokasi']=$this->db_lokasi->tampil_data_lokasi()->result();
		$this->load->view('header');
		$this->load->view('backend/view_syarat/in_syarat',$data);
		$this->load->view('footer');

	} function input_data_syarat(){
        $id = $this->input->post('id_loker');
        $deskripsi = $this->input->post('deskripsi');
        $data = array(
            'id_loker' => $id,
            'deskripsi' => $deskripsi // nama ini di ambil data base
            );
        
        $this->db_lokasi->input_data_lokasi($data,'syarat');
        redirect('backend/data_syarat/tampil_data_syarat');
            


        

    }

}


// jdi proses edit nya nnti kita m meembuat if else jika kosong tidak di simpan dan jika data ada maka data yang di database harus terupdate dengan  data yang baru di ambil dari  computer dll 