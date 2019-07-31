<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct()
    {

        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library('pagination');
        // $this->load->library('pagination1');
        $this->load->helper('text');
        $this->load->model(array('frontend/Query','backend/Resource'));
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
    $data['gallery'] = $this->Query->list_gallery_home()->result();
    $data['popular'] = $this->Query->list_popular_slide()->result();
	$this->load->view('template/header3',$data);
    $this->load->view('template/banner');
    $this->load->view('home/home', $data);
	$this->load->view('template/footer3');

	}
    function daftar_berita()
    {
    $data = array(
    'title' => 'Daftar Berita',
     );
    $jumlah_data = $this->Query->qount();
    $pagination['base_url'] = base_url().'frontend/index/daftar_berita/';
    $pagination['total_rows'] = $jumlah_data;  
    
    $pagination['next_link'] = 'Next';
    $pagination['prev_link'] = 'Previous';
    $pagination['cur_tag_open'] = '<li class="active"><a href="">';
    $pagination['per_page'] = "6";
    $pagination['uri_segment'] = 4;
    $pagination['num_links'] = 4;
    $this->pagination->initialize($pagination);
    $data['post'] = $this->Query->list_data($pagination['per_page'],$this->uri->segment(4,0));
    $this->load->vars($data);
    $data['category'] = $this->Resource->show('category')->result();
    $data['subcategory'] = $this->Resource->show('subcategory')->result();
    $data['popular'] = $this->Query->list_popular_home()->result();
    $this->load->view('template/header3', $data);
    $this->load->view('list_lowongan/daftar_berita', $data);
    $this->load->view('template/footer3');
    }
    function gallery()
    {
        $data = array(
            'title' => 'Gallery',
             );
        $jumlah_data = $this->Query->gallery_count();
        $pagination['base_url'] = base_url().'frontend/index/gallery/';
        $pagination['total_rows'] = $jumlah_data;  
        
        $pagination['next_link'] = 'Next';
        $pagination['prev_link'] = 'Previous';
        $pagination['cur_tag_open'] = '<li class="active"><a href="">';
        $pagination['per_page'] = "9";
        $pagination['uri_segment'] = 4;
        $pagination['num_links'] = 4;
        $this->pagination->initialize($pagination);
        $data['gallery'] = $this->Query->list_gallery($pagination['per_page'],$this->uri->segment(4,0));
        $this->load->vars($data);
        $this->load->view('template/header3',$data);
        $this->load->view('gallery/index', $data);
        $this->load->view('template/footer3');

    }

    
// Menu ========================================================================
// konten lanjut ===============================================================
  function read_more2($slug)
    {   
        $post = $this->Query->get_by_slug($slug);
        foreach ($post as $row ) {
                $data['title'] = $row->title;
            }
        $data['category'] = $this->Resource->show('category')->result();
        $data['subcategory'] = $this->Resource->show('subcategory')->result();
        $data['popular'] = $this->Query->list_popular_home()->result();
        $this->count_viewer($slug);
        $data['post'] = $this->Query->get_by_slug($slug);
        $data['related'] = $this->Query->get_related2($slug);
        $this->load->view('template/header3', $data);
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
            $this->Query->update_counter(urldecode($slug));
        }
    }
// konten lanjut ===============================================================

// SIDE BAR ====================================================================
    function daftar_kategori()
    {   
        
        $data['category'] = $this->Resource->show('category')->result();
        $data['subcategory'] = $this->Resource->show('subcategory')->result();
        $data['popular'] = $this->Query->list_popular_home()->result();
        $where = $this->uri->segment(3);
        $category = $this->Query->get_kategori($where);
        foreach ($category as $row ) {
            $data['title'] = $row->category_name;

        }
        $data['post'] = $this->Query->get_kategori($where);
        $this->load->view('template/header3', $data);
        $this->load->view('list_lowongan/daftar_berita', $data);
        $this->load->view('template/footer3');

       
        
    }
    function daftar_subkategori()
    {   
       
        $data['category'] = $this->Resource->show('category')->result();
        $data['subcategory'] = $this->Resource->show('subcategory')->result();
        $data['popular'] = $this->Query->list_popular_home()->result();
        $where = $this->uri->segment(3);
        $subcategory = $this->Query->get_subkategori($where);
        foreach ($subcategory as $row ) {
            $data['title'] = $row->subcategory_name;

        }
        $data['post'] = $this->Query->get_subkategori($where);
        $this->load->view('template/header3', $data);
        $this->load->view('list_lowongan/daftar_berita', $data);
        $this->load->view('template/footer3');
        
    }
// SIDE BAR ====================================================================
// SEARCH BOX  ====================================================================
    function search_keyword()
    { 
        $keyword    =   $this->input->post('keyword');
        $data = array(
            'title' => "Hasil Pencarian ".$keyword,
             );
        $data['category'] = $this->Resource->show('category')->result();
        $data['subcategory'] = $this->Resource->show('subcategory')->result();
        $data['popular'] = $this->Query->list_popular_home()->result();
        $data['results']    =   $this->Query->search1($keyword);
        $this->load->view('template/header3', $data);
        $this->load->view('list_lowongan/keyword', $data);
        $this->load->view('template/footer3');
    }
// SEARCH BOX \\  ====================================================================
	
}

