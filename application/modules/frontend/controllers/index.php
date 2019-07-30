<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct()
    {

        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library('pagination');
        // $this->load->library('pagination1');
        $this->load->helper('text');
        $this->load->model(array('backend/Query','backend/Resource'));
        // $this->load->library('Ajax_pagination');
        $this->load->library('javascript');
        $this->load->library('table');
        $this->load->database();
        $this->load->helper('html');

        //$this->load->helper('cookie');
    }

// Menu ========================================================================
	function home()
	{
   $data = array(
    'title' => 'News',
     );
    $data['post'] = $this->Query->list_post_home()->result();
	$this->load->view('template/header3',$data);
    $this->load->view('template/banner');
    $this->load->view('home/home', $data);
	$this->load->view('template/footer3');

	}
    function daftar_lowongan()
    {
    $data = array(
    'title' => 'Daftar Lowongan',
     );
    $jumlah_data = $this->db_perusahaan->jumlah_data1();
    $pagination['base_url'] = base_url().'frontend/index/daftar_lowongan/';
    $pagination['total_rows'] = $jumlah_data;  
    
    $pagination['next_link'] = 'Next';
    $pagination['prev_link'] = 'Previous';
    $pagination['cur_tag_open'] = '<li class="active"><a href="">';
    $pagination['per_page'] = "6";
    $pagination['uri_segment'] = 4;
    $pagination['num_links'] = 4;
    $this->pagination->initialize($pagination);
    $data['user'] = $this->db_perusahaan->list_data($pagination['per_page'],$this->uri->segment(4,0));
    $this->load->vars($data);
    $data['lokasi'] = $this->db_lokasi->view_lokasi()->result();
    $data['kategori'] = $this->db_kategori->tampil_data_kategori()->result();
    $data['popular'] = $this->db_perusahaan->list_popular_home()->result();
    $this->load->view('template/header3', $data);
    $this->load->view('list_lowongan/daftar_lowongan', $data);
    $this->load->view('template/footer3');
    }
    function about(){
      $data = array(
    'title' => 'Tentang Kami',
     );
    $this->load->view('template/header3',$data);
    $this->load->view('about/about');
    $this->load->view('template/footer3');
  }
    function contact(){
      $data = array(
    'title' => 'Kontak Kami',
     );
    $this->load->view('template/header3', $data);
    $this->load->view('kontak/kontak_kami');
    $this->load->view('template/footer3');
  }
// Menu ========================================================================
// konten lanjut ===============================================================
  function read_more2($slug)
    {   $data['title'] = $this->db_lokasi->get_by_slug($slug);
        $data['kategori']=$this->db_kategori->tampil_data_kategori()->result();
        $data['lokasi']=$this->db_lokasi->tampil_data_lokasi()->result();
        $data['lokasi'] = $this->db_lokasi->view_lokasi()->result();
        $data['kategori'] = $this->db_kategori->view_kategori()->result();
        $data['popular'] = $this->db_perusahaan->list_popular_home()->result();
        // $where = array('slug' => $slug);
        $this->count_viewer($slug);
        $this->load->view('template/header_readmore', $data);
        $data['loker'] = $this->db_lokasi->get_by_slug($slug);
        $data['related'] = $this->db_lokasi->get_related2($slug);
        $this->load->view('readmore/read_more',$data); 
        
        $this->load->view('template/footer3');
        
    }
     function count_viewer($slug)
    {
        
        $this->load->helper('cookie');
        $check_visitor = $this->input->cookie(urldecode($slug), FALSE);      
        $ip = $this->input->ip_address();
        if ($check_visitor == false) {
            $cookie = array("name" => urldecode($slug), "value" => "$ip", "expire" => time() + 7200, "secure" => false);
            $this->input->set_cookie($cookie);
            $this->db_lokasi->update_counter(urldecode($slug));
        }
    }
// konten lanjut ===============================================================

// SIDE BAR ====================================================================
    function daftar_lokasi()
    {   
        
        $data['popular'] = $this->db_perusahaan->list_popular_home()->result();
        $data['kategori']=$this->db_kategori->view_kategori()->result();
        $data['lokasi']=$this->db_lokasi->view_lokasi()->result();
       

        $where = $this->uri->segment(3);
        $data['title'] = $this->db_lokasi->get_lokasi($where);
        // $where = array('id_lokasi' => $id_lokasi);  
        // $table = ("SELECT a.nm_perusahaan, a.email, b.id_kategori, a.nm_lowongan, c.id_lokasi, a.tgl, a.tlp, a.deskripsi
        //             FROM loker a
        //             INNER JOIN kategori b
        //             ON a.`id_kategori`=b.`id_kategori`
        //             INNER JOIN lokasi c
        //             ON a.`id_lokasi`=c.`id_lokasi`
        //             ");
        $data['list'] = $this->db_lokasi->get_lokasi($where);
        $this->load->view('template/header_lokasi', $data);
        $this->load->view('list_lowongan/daftar_lokasi', $data);
        $this->load->view('template/footer3');

       
        
    }
    function daftar_kategori()
    {   
       
        $data['popular'] = $this->db_perusahaan->list_popular_home()->result();
        $data['kategori']=$this->db_kategori->view_kategori()->result();
        $data['lokasi']=$this->db_lokasi->view_lokasi()->result();
        
        

        $where = $this->uri->segment(3);
        // $where = array('id_lokasi' => $id_lokasi);  
        // $table = ("SELECT a.nm_perusahaan, a.email, b.id_kategori, a.nm_lowongan, c.id_lokasi, a.tgl, a.tlp, a.deskripsi
        //             FROM loker a
        //             INNER JOIN kategori b
        //             ON a.`id_kategori`=b.`id_kategori`
        //             INNER JOIN lokasi c
        //             ON a.`id_lokasi`=c.`id_lokasi`
        //             ");
        $data['list'] = $this->db_lokasi->get_kategori($where);
        $data['title'] = $this->db_lokasi->get_kategori($where);
        // $this->load->view('list_lokasi_2',$lokasi2);
        $this->load->view('template/header_kategori', $data);
        $this->load->view('list_lowongan/daftar_kategori', $data);
        $this->load->view('template/footer3');
        
    }
// SIDE BAR ====================================================================
// SEARCH BOX  ====================================================================
    function search_keyword()
    { 
        $keyword    =   $this->input->post('keyword');
        $data = array(
            'title' => $keyword,
             );
        $data['kategori']=$this->db_kategori->tampil_data_kategori()->result();
        $data['lokasi']=$this->db_lokasi->tampil_data_lokasi()->result();
        $data['popular'] = $this->db_perusahaan->list_popular_home()->result();
        $data['results']    =   $this->db_perusahaan->search1($keyword);
        $this->load->view('template/header_search', $data);
        $this->load->view('list_lowongan/keyword', $data);
        $this->load->view('template/footer3');
    }
// SEARCH BOX  ====================================================================
	function f_lowongan(){
      
     
		
		$data['user'] = $this->db_perusahaan->tampil_data_perusahaan()->result();
		$data['lokasi'] = $this->db_lokasi->tampil_data_lokasi()->result();
	    $this->load->view('template2');
	    $this->load->view('lowongan',$data);
	    $this->load->view('footer');
  }
  function f_new(){


        $data['makeColums'] = $this->makeColumns();
        $data['getTotalData'] = $this->getTotalData();
        $data['perPage'] = $this->perPage();

        $this->load->view('template2');
        $this->load->view('lowongan',$data);
        $this->load->view('footer');
    }
  
    
    function getTotalData(){

      $sql = "SELECT * FROM loker";
      $q = $this->db->query($sql);

      return $q->num_rows();

    }

    function perPage(){
         return 4; 
      }

 
    function makeColumns(){

         $peoples = $this->getData();
         foreach($peoples as $pep):
         $data[] = $pep->nm_lowongan;
         $data[] = $pep->nm_perusahaan;
       
         $data[] = $pep->tgl;
         $data[] = $pep->total_view;
         endforeach;

         return  $this->table->make_columns($data,4);
    }
	function f_lowongan2(){
      
     
		$jumlah_data = $this->db_perusahaan->jumlah_data();
        $config['base_url'] = base_url().'frontend/welcome/f_lowongan2/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 3;
		$config['use_page_numbers']  = TRUE;
		$from = $this->uri->segment(4);
		$this->pagination->initialize($config);
		$data['user'] = $this->db_perusahaan->data($config['per_page'],$from);
		$data['lokasi'] = $this->db_lokasi->tampil_data_lokasi()->result();
	    $this->load->view('template2');
	    $this->load->view('lowongan',$data);
	    $this->load->view('footer');
  }

  function f_lowongan1($page=1){
      
     
		$this->load->library('pagination');
        $this->load->library('paginationlib');
        // $this->load->language("message");
        try
        {
            $pagingConfig   = $this->paginationlib->initPagination("/frontend/welcome/f_lowongan1",$this->db_perusahaan->jumlah_data());
            
            $data["pagination_helper"]   = $this->pagination;
            $data['user'] = $this->db_perusahaan->get_by_range((($page-1) * $pagingConfig['per_page']),$pagingConfig['per_page']);
            
              $this->load->view('template2');
        $this->load->view('lowongan',$data);
        $this->load->view('footer');

            
        }
        catch (Exception $err)
        {
            log_message("error", $err->getMessage());
            return show_error($err->getMessage());
        }
  }


  
  function f_home(){
      $data['user'] = $this->db_perusahaan->tampil_data_perusahaan()->result();
      $this->load->view('template',$data);
      $this->load->view('sidebar');
      $this->load->view('konten');
      $this->load->view('footer');
  }

  function read_more($id_loker){ 
        $data['kategori']=$this->db_kategori->tampil_data_kategori()->result();
        $data['lokasi']=$this->db_lokasi->tampil_data_lokasi()->result();
        $this->load->view('template2');
        $where = array('id_loker' => $id_loker);
        
        $data1['loker'] = $this->db_lokasi->edit_data($where,'loker')->result();
        $this->load->view('read_more',$data1); 
        $this->load->view('footer');
    }
  

    function show_one($id_loker)
    {   
        $data['kategori']=$this->db_kategori->tampil_data_kategori()->result();
        $data['lokasi']=$this->db_lokasi->tampil_data_lokasi()->result();
        $data['syarat']=$this->db_syarat->getsyarat()->result();
        $this->load->view('template2');
        $where = array('id_loker' => $id_loker);  
        // $where = $this->uri->segment(4);
        $data['loker'] = $this->db_lokasi->edit_data($where,'loker')->result();
        $this->load->view('read_more',$data); 
        $this->load->view('footer');
        $this->add_count($id_loker);
    }

    
   

    


    

    
    function read_more3($id_loker)
    {   
        $data['kategori']=$this->db_kategori->tampil_data_kategori()->result();
        $data['lokasi']=$this->db_lokasi->tampil_data_lokasi()->result();
        $data['syarat']=$this->db_syarat->getsyarat()->result();
        $this->load->view('template2');

        $table=("SELECT a.id_loker, a.nm_perusahaan, a.email, b.Jenis_Kategori, a.nm_lowongan, c.nama_lokasi, a.tgl, a.tlp, a.deskripsi, a.gambar
                    FROM loker a
                    INNER JOIN kategori b
                    ON a.`id_kategori`=b.`id_kategori`
                    INNER JOIN lokasi c
                    ON a.`id_lokasi`=c.`id_lokasi`
                    WHERE c.`id_lokasi`= (" . implode(",", $where) . ");") 
                    or die (mysql_error());
        $where = array('id_loker' => $id_loker);
        $data['loker'] = $this->db_lokasi->get_lokasi3($table,$where);
        $this->load->view('read_more',$data); 
        $this->load->view('footer');
        // $this->add_count($id_loker);
    }
}

