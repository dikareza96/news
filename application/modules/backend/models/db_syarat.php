<?php 

class Db_syarat extends CI_Model{
	
	function tampil_data_syarat(){
		$this->load->database(); // tadi database nya tidak bisa ngeload, seharusnya tanpa $this->load->database(); sudah bisa di dalam table model
		$this->load->database(); 
		return $this->db->get('syarat');
	}
	
	 function getsyarat(){
        $this->load->database(); 
		return $this->db->get('syarat');
	}
	function input_data_perusahaan($data,$table){  // formatnya data setelah table nya 
		$this->load->database();
		$this->db->insert($table,$data);
	}
	function edit_data($where,$table){	
		$this->load->database();	
		return $this->db->get_where($table,$where);
	}
	public function getloker(){
        $this->load->database(); 
		return $this->db->get('loker');
}
		function hapus_data_perusahaan($where,$table){
			$this->load->database(); // tadi database nya tidak bisa ngeload, seharusnya tanpa $this->load->
			$this->db->where($where);
			$this->db->delete($table);
		}
		function list_loker_home(){
			$this->load->database(); // tadi database nya tidak bisa ngeload, seharusnya tanpa $this->load->database(); sudah bisa di dalam table model
			return $this->db->query('SELECT a.nm_perusahaan,a.gambar,a.id_loker, a.email, b.Jenis_Kategori, a.nm_pemilik, c.nama_lokasi,a.tlp, a.Deskripsi
				FROM loker a, kategori b, lokasi c
				WHERE a.id_kategori=b.id_kategori AND a.id_lokasi=c.id_lokasi ORDER BY id_loker LIMIT 0,6;');
		}
		function list_popular_home(){
			$this->load->database(); // tadi database nya tidak bisa ngeload, seharusnya tanpa $this->load->database(); sudah bisa di dalam table model
			return $this->db->query('SELECT a.nm_perusahaan,a.gambar,a.id_loker, a.email, b.Jenis_Kategori, a.nm_pemilik, c.nama_lokasi,a.tlp, a.Deskripsi, a.`total_view`
				FROM loker a, kategori b, lokasi c
				WHERE (a.id_kategori=b.id_kategori AND a.id_lokasi=c.id_lokasi) 
				GROUP BY total_view DESC
				;');
		}
		function likes($table,$data, $where){
		//$this->load->database(); 
        // $this->db->on('DUPLICATE KEY'); 
        // $this->db->set('total_view', 'total_view+1');
        // $this->db->update($table, $data, $where); 
			$sql = "INSERT INTO loker ( id_loker, total_view) VALUES ( 5, 1) ON DUPLICATE KEY UPDATE total_view=total_view+1
				                ";
        return $this->db->query($sql);
        // $res = $this->db->get();
        // return $res->result_array();
	}	
	function likes2($id_loker) {
    $this->db->where('id_loker', $id_loker);
    $this->db->set('total_view', 'total_view+1');
    $this->db->update('loker');
}
}


