<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
    {

        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library('pagination');
        $this->load->helper('text');
        $this->load->model(array('backend/db_lokasi','backend/db_perusahaan','backend/db_kategori','backend/db_syarat'));
         // $this->load->library('Ajax_pagination');
         $this->load->library('javascript');
          $this->load->library('table');
          $this->load->database();
           $this->load->helper('html');

        //$this->load->helper('cookie');
    }
 
	public function index()
	{
		
	$lokasi1['user'] = $this->db_lokasi->view_lokasi_limit_1()->result();
    $lokasi2['user'] = $this->db_lokasi->view_lokasi_limit_2()->result();
    $lokasi3['user'] = $this->db_lokasi->view_lokasi_limit_3()->result();
	$kategori['user'] = $this->db_kategori->tampil_data_kategori()->result();

    $popular['user'] = $this->db_perusahaan->list_popular_home()->result();
	$perusahaan['user'] = $this->db_perusahaan->list_loker_home()->result();
	$this->load->view('template',$lokasi1);
    $this->load->view('list_lokasi_kolom2',$lokasi2);
    $this->load->view('list_lokasi_kolom3',$lokasi3);
	$this->load->view('sidebar1',$popular);
    $this->load->view('sidebar2',$kategori);
	$this->load->view('konten',$perusahaan);
	$this->load->view('footer');

	}
    public function lowongan_tersedia()
    {
$jumlah_data = $this->db_perusahaan->jumlah_data1();
        // pagination limit
        $pagination['base_url'] = base_url().'frontend/welcome/lowongan_tersedia/';
        $pagination['total_rows'] = $jumlah_data;
        // $pagination['full_tag_open'] = "<p><div class=\"pagination\" style='letter-spacing:2px;'>";
        // $pagination['full_tag_close'] = "</div></p>";
        // $pagination['cur_tag_open'] = "<span class=\"current\">";
        // $pagination['cur_tag_close'] = "</span>";
        // $pagination['num_tag_open'] = "<span class=\"disabled\">";
        // $pagination['num_tag_close'] = "</span>";
        $pagination['per_page'] = "4";
        $pagination['uri_segment'] = 4;
        $pagination['num_links'] = 5;

        $this->pagination->initialize($pagination);

        $data['user'] = $this->db_perusahaan->list_data($pagination['per_page'],$this->uri->segment(4,0));

        $this->load->vars($data);
        $this->load->view('template2');
        $this->load->view('lowongan',$data);
        $this->load->view('footer');
    }
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
  //Pull 'name' field records from table 'contact'
    function getData(){

        $page = $this->input->post('page'); //Look at $config['postVar']
        if(!$page):
        $offset = 0;
        else:            
        $offset = $page;
        endif;

        $sql = "SELECT * FROM loker LIMIT ".$offset.", ".$this->perPage();
        $q = $this->db->query($sql);

        return $q->result();

    }
    function getTotalData(){

      $sql = "SELECT * FROM loker";
      $q = $this->db->query($sql);

      return $q->num_rows();

    }

    function perPage(){
         return 4; //define total records per page
      }

    // Generate table from array
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

  function contact(){
     
      $this->load->view('template2');
      $this->load->view('contactus');
      $this->load->view('footer');
  }
  function about(){
     
      $this->load->view('template2');
      $this->load->view('about');
      $this->load->view('footer');
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

    
    function add_count($id_loker)
    {
        
        $this->load->helper('cookie');
        $check_visitor = $this->input->cookie(urldecode($id_loker), FALSE);      
        $ip = $this->input->ip_address();
        if ($check_visitor == false) {
            $cookie = array("name" => urldecode($id_loker), "value" => "$ip", "expire" => time() + 7200, "secure" => false);
            $this->input->set_cookie($cookie);
            $this->db_lokasi->update_counter(urldecode($id_loker));
        }
    }

    function search_keyword()
    {
        
        $keyword    =   $this->input->post('keyword');
        $data['kategori']=$this->db_kategori->tampil_data_kategori()->result();
        $data['lokasi']=$this->db_lokasi->tampil_data_lokasi()->result();
        $data['results']    =   $this->db_perusahaan->search($keyword);
        $this->load->view('template2');
        $this->load->view('result_view',$data);
        $this->load->view('footer');

        
        

       
    }


    function daftar_lokasi($id_lokasi)
    {   
        $lokasi1['user'] = $this->db_lokasi->view_lokasi_limit_1()->result();
        $lokasi2['user'] = $this->db_lokasi->view_lokasi_limit_2()->result();
        $data['kategori']=$this->db_kategori->tampil_data_kategori()->result();
        $data['lokasi']=$this->db_lokasi->tampil_data_lokasi()->result();
        $data['syarat']=$this->db_syarat->getsyarat()->result();
        $this->load->view('template3',$lokasi1);

        $where = $this->uri->segment(4);
        // $where = array('id_lokasi' => $id_lokasi);  
        // $table = ("SELECT a.nm_perusahaan, a.email, b.id_kategori, a.nm_lowongan, c.id_lokasi, a.tgl, a.tlp, a.deskripsi
        //             FROM loker a
        //             INNER JOIN kategori b
        //             ON a.`id_kategori`=b.`id_kategori`
        //             INNER JOIN lokasi c
        //             ON a.`id_lokasi`=c.`id_lokasi`
        //             ");
        $data['list'] = $this->db_lokasi->get_lokasi($where);
        $this->load->view('list_lokasi_2',$lokasi2);
        $this->load->view('by_lokasi',$data); 
        $this->load->view('footer');
        
    }
    function daftar_kategori($id_kategori)
    {   
        $kategori['user'] = $this->db_kategori->tampil_data_kategori()->result();
        $data['kategori']=$this->db_kategori->tampil_data_kategori()->result();
        $data['lokasi']=$this->db_lokasi->tampil_data_lokasi()->result();
        $data['syarat']=$this->db_syarat->getsyarat()->result();
        $this->load->view('template4',$kategori);

        $where = $this->uri->segment(4);
        // $where = array('id_lokasi' => $id_lokasi);  
        // $table = ("SELECT a.nm_perusahaan, a.email, b.id_kategori, a.nm_lowongan, c.id_lokasi, a.tgl, a.tlp, a.deskripsi
        //             FROM loker a
        //             INNER JOIN kategori b
        //             ON a.`id_kategori`=b.`id_kategori`
        //             INNER JOIN lokasi c
        //             ON a.`id_lokasi`=c.`id_lokasi`
        //             ");
        $data['list'] = $this->db_lokasi->get_kategori($where);
        // $this->load->view('list_lokasi_2',$lokasi2);
        $this->load->view('by_kategori',$data); 
        $this->load->view('footer');
        
    }

    function read_more2($id_loker)
    {   
        $data['kategori']=$this->db_kategori->tampil_data_kategori()->result();
        $data['lokasi']=$this->db_lokasi->tampil_data_lokasi()->result();
        $data['syarat']=$this->db_syarat->getsyarat()->result();
        $this->load->view('template2');
        $where = array('id_loker' => $id_loker);
        $data['loker'] = $this->db_lokasi->get_lokasi2($where)->result();
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

