<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_kontak extends CI_Controller { //Data  atau nama class (harus sesuai dengan nama  file nya)

	
function __construct(){ //untuk mengload db_kategori
	parent::__construct();		
		$this->load->model('db_kontak'); // bukan folder,  bawaanya Codeigniter (model) pakai ini
		// $this->load->helper('url');
	}
	
	function index(){
		$this->load->view('data_perusahaan/v_perusahaan',$data);
	} 

	function tampil_data_kontak(){
		$data['user'] = $this->db_kontak->tampil_data_kontak()->result(); //user adalah variable yang di mana akan d panggil di view
		$this->load->view('header');
		$this->load->view('view_kontak/v_kontak',$data);
		$this->load->view('footer');
	}
	
	function hapus_data_kontak ($id_kontak){ // 
		$where = array('id_kontak' => $id_kontak); //'id_lokasi itu field di database' 
		$this->db_kontak->hapus_data_kontak($where,'kontak'); //di mana data kategori
		redirect('backend/data_kontak/tampil_data_kontak'); //redirect = ngoper ,, mindah ke index melalui ke atas dan di tampilkan
	}

	

} 
