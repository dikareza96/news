<?php 

class Db_perusahaan extends CI_Model{
	
	function tampil_data_perusahaan(){
		$this->load->database();
		return $this->db->query('SELECT a.nm_perusahaan,a.gambar,a.id_loker, a.email,  a.tgl_akhir, b.Jenis_Kategori, a.nm_lowongan, c.nama_lokasi, a.status, a.tgl, a.tlp, a.Deskripsi, a.admin, a.total_view
			FROM loker a, kategori b, lokasi c
			WHERE (a.id_kategori=b.id_kategori AND a.id_lokasi=c.id_lokasi) ORDER BY tgl DESC;');
	}
	function f_lowongan1($number,$offset){
		$this->load->database(); 
		return $this->db->query('SELECT a.nm_perusahaan,a.gambar,a.id_loker, a.email, b.Jenis_Kategori, a.nm_lowongan, c.nama_lokasi, a.tgl, a.status, a.tgl_akhir,a.tlp, a.Deskripsi, a.total_view
			FROM loker a, kategori b, lokasi c
			WHERE (a.id_kategori=b.id_kategori AND a.id_lokasi=c.id_lokasi)  ORDER BY tgl DESC;',$number,$offset);
	}
	function input_data_perusahaan($data,$table){ 
		$this->load->database();
		$this->db->insert($table,$data);
	}
		function hapus_data_perusahaan($where,$table){
			$this->load->database(); 
			$this->db->where($where);
			$this->db->delete($table);
		}
		function list_loker_home(){
			$this->load->database(); 
			return $this->db->query('SELECT a.id_loker, a.nm_perusahaan, a.slug, a.email, b.Jenis_Kategori, a.nm_lowongan, c.nama_lokasi, a.tgl, a.tgl_akhir, a.tlp, a.Deskripsi, a.admin, a.gambar, a.total_view
                    FROM loker a
                    INNER JOIN kategori b
                    ON a.`id_kategori`=b.`id_kategori`
                    INNER JOIN lokasi c
                    ON a.`id_lokasi`=c.`id_lokasi`
                   Where a.status = "Show"
				   ORDER BY tgl DESC LIMIT 0,8;');
		}
		function list_popular_home(){
			$this->load->database(); 
			return $this->db->query('SELECT a.nm_perusahaan,a.gambar,a.id_loker, a.slug, a.email, b.Jenis_Kategori, a.nm_lowongan, c.nama_lokasi, a.tgl_akhir, a.tgl, a.tlp, a.Deskripsi, a.total_view
				FROM loker a, kategori b, lokasi c
				WHERE (a.id_kategori=b.id_kategori AND a.id_lokasi=c.id_lokasi) 
				ORDER BY total_view DESC
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

	function search($keyword)
    {
    
        $sql = "SELECT 
				a.id_loker, a.nm_perusahaan, a.email, b.Jenis_Kategori, a.nm_lowongan, a.slug, c.nama_lokasi, a.tgl, a.tlp, a.Deskripsi, a.gambar, a.tgl_akhir, a.total_view, a.admin
				FROM loker a
		                    INNER JOIN kategori b
		                    ON a.`id_kategori`=b.`id_kategori`
		                    INNER JOIN lokasi c
		                    ON a.`id_lokasi`=c.`id_lokasi` 
		
		WHERE a.nm_perusahaan LIKE '%".$keyword."%' OR a.nm_lowongan LIKE '%".$keyword."%' OR a.slug LIKE '%".$keyword."%' OR a.Deskripsi LIKE '%".$keyword."%' OR a.tlp LIKE '%".$keyword."%' OR a.email LIKE '%".$keyword."%' 
    	
		
		";
		
		return $this->db->query($sql)->result();
    }

    function search1($keyword)
		{
		$sql = "SELECT a.id_loker, a.nm_perusahaan, a.email, b.Jenis_Kategori, a.admin, a.nm_lowongan, a.slug, c.nama_lokasi, a.tgl, a.tlp, a.Deskripsi, a.tgl_akhir, a.gambar, a.total_view
		 FROM loker a
		                    INNER JOIN kategori b
		                    ON a.`id_kategori`=b.`id_kategori`
		                    INNER JOIN lokasi c
		                    ON a.`id_lokasi`=c.`id_lokasi` 
		WHERE MATCH(a.nm_perusahaan,a.slug, a.email, a.nm_lowongan, a.tlp, a.Deskripsi) AGAINST('$keyword'  IN NATURAL LANGUAGE MODE) 
		" ;
		return $this->db->query($sql)->result();
		}
    function data($number,$offset){
   //   	$sql= "SELECT a.nm_perusahaan,a.gambar,a.id_loker, a.email, b.Jenis_Kategori, a.nm_lowongan, c.nama_lokasi, a.tgl, a.tlp, a.Deskripsi, a.total_view
			// FROM loker a, kategori b, lokasi c
			//  WHERE (a.id_kategori=b.id_kategori AND a.id_lokasi=c.id_lokasi) ORDER BY tgl DESC;";

		return $query = $this->db->get('loker',$number,$offset)->result();

		// return $this->db->query($sql,$number,$offset);		
	}
 
	function list_data($perPage, $uri){
		// $sql = "SELECT a.nm_perusahaan,a.gambar,a.id_loker, a.email, b.Jenis_Kategori, a.nm_lowongan, c.nama_lokasi, a.tgl, a.tlp, a.Deskripsi, a.total_view
		// 	FROM loker a, kategori b, lokasi c
		// 	WHERE (a.id_kategori=b.id_kategori AND a.id_lokasi=c.id_lokasi) ORDER BY tgl DESC";


			$this->db->select('loker.nm_perusahaan, loker.gambar, loker.slug, loker.id_loker, loker.email, kategori.Jenis_Kategori, loker.nm_lowongan, loker.admin, loker.tgl_akhir, lokasi.nama_lokasi, loker.tgl, loker.tlp, loker.Deskripsi, loker.total_view'); 
			$this->db->from('loker', 'kategori','lokasi');
			$this->db->join('kategori', 'loker.id_kategori = kategori.id_kategori', 'INNER');
			$this->db->join('lokasi', 'loker.id_lokasi = lokasi.id_lokasi', 'INNER');
			$this->db->where('loker.status = "Show" ');
			$this->db->order_by('tgl', 'desc');
			
			$getData = $this->db->get( '', $perPage, $uri);
		 // $query = $this->db->query("SELECT * FROM stdtbl where username='$username' and password='$password'");
		 // $getData = $this->db->query($sql);

		if ($getData->num_rows() > 0)
		{
			return $getData->result();
		}
		else{
			return null;
			// echo 'Database Error(' . $this->db->_error_number() . ') - ' . $this->db->_error_message();
		}
	}
	function jumlah_data1(){
		 $sql = "SELECT a.nm_perusahaan,a.gambar,a.id_loker, a.email, b.Jenis_Kategori, a.nm_lowongan, c.nama_lokasi, a.tgl, a.tlp, a.tgl_akhir, a.Deskripsi, a.total_view
			FROM loker a, kategori b, lokasi c
			WHERE (a.id_kategori=b.id_kategori AND a.id_lokasi=c.id_lokasi) ORDER BY tgl DESC";
      $q = $this->db->query($sql);

      return $q->num_rows();
	}

	function get_by_range(){
    $query = $this->db->get('loker');
    return $query->result();

}
function update_data($where,$data,$table){
		$this->load->database();	
		$this->db->where($where); 
		$this->db->update($table,$data);
	}
}


