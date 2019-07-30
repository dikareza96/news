<?php 

class db_lokasi extends CI_Model{

	function tampil_data_lokasi(){
		$this->load->database(); 
		return $this->db->get('lokasi');
	} 
	function view_lokasi(){
		$this->load->database();
		$this->db->order_by('nama_lokasi');
		return $this->db->get('lokasi');
	}

	function update_data($where,$data,$table){
		$this->load->database();	
		$this->db->where($where); 
		$this->db->update($table,$data);
	}

	
	function input_data_lokasi($data,$table){  // formatnya data setelah table nya 
		$this->load->database();
		$this->db->insert($table,$data);
	}

	function hapus_data_lokasi($where,$table){
		$this->load->database(); // tadi database nya tidak bisa ngeload, seharusnya tanpa $this->load->
		$this->db->where($where);
		$this->db->delete($table);
	}	
	function edit_data($where,$table){	
		$this->load->database();	
		return $this->db->get_where($table,$where);
	}
	function view_lokasi_limit_1(){
		$this->load->database();
		$this->db->select('*');
		$this->db->order_by('nama_lokasi');
		$this->db->limit('8','0');
		return $this->db->get('lokasi');
	}
	function view_lokasi_limit_2(){
		$this->load->database();
		$this->db->select('*');
		$this->db->order_by('nama_lokasi');
		$this->db->limit('8','8');
		return $this->db->get('lokasi');
	}
	function view_lokasi_limit_3(){
		$this->load->database();
		$this->db->select('*');
		$this->db->order_by('nama_lokasi');
		$this->db->limit('8','17');
		return $this->db->get('lokasi');
	}
	function view_lokasi_limit_4(){
		$this->load->database();
		$this->db->select('*');
		$this->db->order_by('nama_lokasi');
		$this->db->limit('8','25');
		return $this->db->get('lokasi');
	}
	function get_one($slug)
    {
        $this->db->get_where('loker', array('id_loker' => $slug));
        $query = $this->db->get('loker');
        return $query->row();
    }
	function update_counter($slug)
    {
        //return current article views
        $this->db->where('slug', urldecode($slug));
        $this->db->select('total_view'); $count = $this->db->get('loker')->row();
        // then increase by one
        $this->db->where('slug', urldecode($slug));
        $this->db->set('total_view', ($count->total_view + 1));
        $this->db->update('loker');
    }
    function update_counter2($id_loker)
    {
        //return current article views
        $this->db->where('id_loker', urldecode($id_loker));
        $this->db->select('total_view'); $count = $this->db->get('loker')->row();
        // then increase by one
        $this->db->where('id_loker', urldecode($id_loker));
        $this->db->set('total_view', ($count->total_view + 1));
        $this->db->update('loker');
    }

    function get_lokasi($where){	
    	$sql="SELECT a.id_loker, a.nm_perusahaan, a.email, b.slug_kategori, c.slug_lokasi, b.Jenis_Kategori, a.slug, a.nm_lowongan, c.nama_lokasi, a.tgl, a.tlp, a.admin, a.tgl_akhir, a.Deskripsi, a.gambar, a.total_view
                    FROM loker a
                    INNER JOIN kategori b
                    ON a.`id_kategori`=b.`id_kategori`
                    INNER JOIN lokasi c
                    ON a.`id_lokasi`=c.`id_lokasi`
                    WHERE c.`slug_lokasi`='$where' and a.status = 'Show'
                    ";
		return $this->db->query($sql)->result();
	}
	 
	function get_kategori($where){	
    	$sql="SELECT a.id_loker, a.nm_perusahaan, a.email,b.slug_kategori, c.slug_lokasi, b.Jenis_Kategori, a.slug, a.nm_lowongan, c.nama_lokasi, a.tgl, a.tlp, a.admin, a.tgl_akhir,a.Deskripsi, a.gambar, a.total_view
                    FROM loker a
                    INNER JOIN kategori b
                    ON a.`id_kategori`=b.`id_kategori`
                    INNER JOIN lokasi c
                    ON a.`id_lokasi`=c.`id_lokasi`
                    WHERE b.`slug_kategori`='$where' and a.status='Show'
                    ";
		return $this->db->query($sql)->result();
	}
	function get_lokasi2($where){	
    	$sql=("SELECT a.id_loker, a.nm_perusahaan, a.email, b.slug_kategori, c.slug_lokasi,b.Jenis_Kategori, a.nm_lowongan, a.slug, c.nama_lokasi, a.tgl, a.tlp, a.tgl_akhir,a.Deskripsi, a.gambar, a.total_view
                    FROM loker a
                    INNER JOIN kategori b
                    ON a.`id_kategori`=b.`id_kategori`
                    INNER JOIN lokasi c
                    ON a.`id_lokasi`=c.`id_lokasi`
                    WHERE a.`slug`= (" . implode(",", $where) . ");") 
                    or die (mysql_error());
		return $this->db->query($sql)->row();

	}
	function get_slug($slug)
	{
		return $this->db->get_where('loker', array('slug' => $slug ))->row();
	}

	function get_by_slug($slug)
	{
			$this->db->select('loker.nm_perusahaan, loker.gambar, loker.slug, loker.id_loker, loker.email, kategori.Jenis_Kategori, loker.nm_lowongan, loker.admin, loker.tgl_akhir, lokasi.nama_lokasi, loker.tgl, loker.tlp, loker.Deskripsi, loker.total_view'); 
			$this->db->from('loker', 'kategori','lokasi');
			$this->db->join('kategori', 'loker.id_kategori = kategori.id_kategori', 'INNER');
			$this->db->join('lokasi', 'loker.id_lokasi = lokasi.id_lokasi', 'INNER');
			$this->db->where('loker.slug',$slug);
			$res = $this->db->get();
			return $res->result();
			// $this->db->select('*')->from('members')->join('membership', 'membership.id=members.id')->where($where)->get();
	}
	function title_readmore($slug)
	{
			$this->db->select('loker.nm_perusahaan, loker.gambar, loker.slug, loker.id_loker, loker.email, kategori.Jenis_Kategori, loker.nm_lowongan, loker.admin, loker.tgl_akhir, lokasi.nama_lokasi, loker.tgl, loker.tlp, loker.Deskripsi, loker.total_view'); 
			$this->db->from('loker', 'kategori','lokasi');
			$this->db->join('kategori', 'loker.id_kategori = kategori.id_kategori', 'INNER');
			$this->db->join('lokasi', 'loker.id_lokasi = lokasi.id_lokasi', 'INNER');
			$this->db->where('loker.slug',$slug);
			$res = $this->db->get();
			return $res->result();
			// $this->db->select('*')->from('members')->join('membership', 'membership.id=members.id')->where($where)->get();
	}
	function get_lokasi3($table,$where){	
    	$res=$this->db->get($table, $data);
        return $res->result();
}

function get_related2($slug)
{
$sql = "SELECT a.id_loker, a.nm_perusahaan, a.email, b.Jenis_Kategori, a.nm_lowongan, a.slug, c.nama_lokasi, a.tgl, a.tlp, a.Deskripsi, a.tgl_akhir, a.gambar, a.total_view, MATCH(nm_lowongan,slug) AGAINST('$slug') AS score
 FROM loker a
                    INNER JOIN kategori b
                    ON a.`id_kategori`=b.`id_kategori`
                    INNER JOIN lokasi c
                    ON a.`id_lokasi`=c.`id_lokasi` 
WHERE MATCH(nm_lowongan,slug) AGAINST('$slug') 
ORDER BY score DESC LIMIT 3";
return $this->db->query($sql)->result();
}
function get_related($slug,$Jenis_Kategori)
{
    $query = $this->db->get_where('loker',array('slug' => $slug));
    foreach($query->result() as $row)
    	{ 
    		$tag = $row->nm_lowongan; 
    	}
    $match =  explode(',', $tag);
    $result = [];
    for($i = 0; $i < count($match); $i++)
    {
        $this->db->like('nm_lowongan',$match[$i]); 
        $this->db->from('loker');
        $sqlQuery = $this->db->get();
        if($sqlQuery->num_rows()>0)
        $result[] = $sqlQuery->result();
    }       
    return $result;
}



















}
	 


