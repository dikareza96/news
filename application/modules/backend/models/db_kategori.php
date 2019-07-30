<?php 

class Db_kategori extends CI_Model{

	function tampil_data_kategori(){
		$this->load->database(); 
		$this->db->order_by('Jenis_Kategori');
		return $this->db->get('kategori');
	}
	function view_kategori(){
		$this->load->database(); 
			return $this->db->query('SELECT a.id_loker, a.nm_perusahaan, a.slug, a.email, b.Jenis_Kategori, a.nm_lowongan, c.nama_lokasi, a.tgl, a.tgl_akhir, a.tlp, a.Deskripsi, a.gambar, c.slug_lokasi,b.slug_kategori, a.total_view
                    FROM loker a
                    INNER JOIN kategori b
                    ON a.`id_kategori`=b.`id_kategori`
                    INNER JOIN lokasi c
                    ON a.`id_lokasi`=c.`id_lokasi`
                    Where a.status = "Show"
				    ORDER BY b.Jenis_Kategori;');
	}
	function input_data_kategori($data,$table){  
		$this->load->database();
		$this->db->insert($table,$data);
	}
	function hapus_data_kategori($where,$table){
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


