<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller { //Data  atau nama class (harus sesuai dengan nama  file nya)

	
function __construct(){ //untuk mengload db_lokasi
	parent::__construct();		
		$this->load->model('backend/db_lokasi'); // bukan folder,  bawaanya Codeigniter (model) pakai ini 
		// $this->load->helper('url');
	}

	

	function input_data_kontak(){
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$tlp = $this->input->post('tlp');
		$pesan = $this->input->post('pesan');

		$data = array(
			'nama' => $nama,
			'email' => $email,
			'tlp' => $tlp ,
			'pesan' => $pesan   
			);
		
		$this->db_lokasi->input_data_lokasi($data,'kontak');
		redirect('kontak');
	}


	
}