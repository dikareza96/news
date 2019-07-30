<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller { 

	
function __construct(){ 
	parent::__construct();		
		$this->load->model('database'); 
		$this->load->model('m_data'); 
		
	}
	
	function index(){
		$this->load->view('data_perusahaan/tampil',$data);
	} 

	function tampil_data_perusahaan(){
		$data['user'] = $this->database->tampil_data_perusahaan()->result();  
		$this->load->view('header');
		$this->load->view('data_perusahaan/tampil',$data);
		$this->load->view('footer');		
	}
	function form_input_data_perusahaan(){
		$this->load->view('header');
		$this->load->view('data_perusahaan/input');
		$this->load->view('footer');
	}
	function tampil_data_lokasi(){
		$data ['user']= $this->database->tampil_data_lokasi()->result();
		$this->load->view('header');
		$this->load->view('data_lokasi/tampil',$data);
		$this->load->view('footer');
	}
	function form_input_data_lokasi(){
		$this->load->view('header');
		$this->load->view('data_lokasi/input');
		$this->load->view('footer');
	}

	function input_data_lokasi(){
		$nama = $this->input->post('name');
		$data = array(
			'nama_lokasi' => $nama 
		
		$this->database->input_data_lokasi($data,'lokasi');
		redirect('backend/data/tampil_data_lokasi');
	}

	function hapus_data_lokasi($id_lokasi){
		$where = array('id_lokasi' => $id_lokasi); 
		$this->database->update_data_lokasi($where,'lokasi');
		redirect('backend/data/tampil_data_lokasi');
	}
	function update_data_lokasi(){
		$id_lokasi = $this->input->post('id_lokasi');
		$nama_lokasi = $this->input->post('nama_lokasi');
		
		$data = array(
			'nama_lokasi' => $nama_lokasi,
			);

		$where = array(
			'id_lokasi' => $id_lokasi
			);

		$this->database->update_data($where,$data,'lokasi');
		redirect('backend/data/tampil_data_lokasi');
	}

	function input_data_kategori(){
		$nama = $this->input->post('name');
		$data= array(
			'Jenis_Kategori' =>$nama);
		$this->database->input_data_kategori($data,'kategori');
		redirect('backend/data/tampil_data_kategori');
	}
		function edit_data_lokasi($id_lokasi){ 
			$this->load->view('header');
			$where = array('id_lokasi' => $id_lokasi);
			$data['lokasi'] = $this->database->edit_data($where,'lokasi')->result();
		$this->load->view('data_lokasi/edit',$data); 
		$this->load->view('footer');
	}


	function tampil_data_kategori(){
		$data['user'] = $this->database->tampil_data_kategori()->result(); 
		$this->load->view('header');
		$this->load->view('data_kategori/tampil',$data);
		$this->load->view('footer');
	}
	function form_input_data_kategori(){
		$this->load->view('header');
		$this->load->view('data_kategori/input');
		$this->load->view('footer');
	}

	function tampil_data_detail(){
		$data['user'] = $this->database->loker()->result();
		$this->load->view('header');
		$this->load->view('data_detail/tampil',$data);
		$this->load->view('footer');
	}

	function input_detail(){
		
		$this->load->view('header');
		$this->load->view('data_detail/input_loker');
		$this->load->view('footer');
	}
}