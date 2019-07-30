<?php 

class Db_kontak extends CI_Model{

	function tampil_data_kontak(){
		$this->load->database(); 
		return $this->db->get('kontak');
	}
	function input_data_kontak($data,$table){  
		$this->load->database();
		$this->db->insert($table,$data);
	}
	function hapus_data_kontak($where,$table){
		$this->load->database(); 
		$this->db->where($where);
		$this->db->delete($table);
	}	
	function update_data($where,$data,$table){
		$this->load->database();	
		$this->db->where($where); 
		$this->db->update($table,$data);
	}
	function edit_data($where,$table){	
		$this->load->database();	
		return $this->db->get_where($table,$where);
	}

}


