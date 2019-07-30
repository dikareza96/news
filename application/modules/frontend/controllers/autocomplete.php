<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Autocomplete extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('text');
        $this->load->model(array('backend/db_lokasi','backend/db_perusahaan','backend/db_kategori','backend/db_syarat'));
	}
	public function search_kategori()
	{
		
		$keyword = $this->uri->segment(4);

		// fleksibel model iso/nde kene iso
		$data = $this->db->from('kategori')->like('Jenis_Kategori',$keyword)->get();	

	
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->Jenis_Kategori,
				

			);
		}
		
		echo json_encode($arr);
	}

	public function search_loker()
	{
		
		$keyword = $this->uri->segment(4);

		
		$data = $this->db->from('loker')->like('nm_lowongan',$keyword)->get();	

	
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->nm_lowongan,
				

			);
		}
		
		echo json_encode($arr);
	}

	 

	public function search_lokasi()
	{
		
		$keyword = $this->uri->segment(4);

		
		$data = $this->db->from('lokasi')->like('nama_lokasi',$keyword)->get();	

	
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->nama_lokasi,
				

			);
		}
		
		echo json_encode($arr);
	}

	public function search_lowongan()
	{
		
		$keyword = $this->uri->segment(4);

		
		$data = $this->db->from('loker')->like('nm_lowongan',$keyword)->get();	

	
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->nm_lowongan,
				

			);
		}
		
		echo json_encode($arr);
	}
	public function asd()
	{
		
		$keyword = $this->uri->segment(4);

		
		$data = $this->db->from('loker')->like('nm_lowongan',$keyword)->get();	

	
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->nm_lowongan,
				

			);
		}
		
		echo json_encode($arr);
	}
}
?>