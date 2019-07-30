<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller { 

	
	
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url','file', 'text'));		
        $this->load->model(array('Resource','Query'));  

    }
    protected $table = 'post';

    function create_url_slug($string){
       $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($string));
       return $slug;
   } 

   function index()
   {
    $module = $this->table;
    $data['route'] = $this->table;
    $data[$module] = $this->Query->post_join()->result();
    $this->load->view('backend/template/header');
    $this->load->view('backend/'.$module.'/index',$data);
    $this->load->view('backend/template/footer');
}
function create()
{
    $module = $this->table;
    $data['route'] = $this->table;
    $data['category'] = $this->Resource->show('category')->result();
    $data['subcategory'] = $this->Resource->show('subcategory')->result();
    $this->load->view('backend/template/header');
    $this->load->view('backend/'.$module.'/create', $data);
    $this->load->view('backend/template/footer');
}
function store()
{
    $module = $this->table;
    $this->load->library('upload');
    $nmfile = "file_".time(); 
    $config['upload_path'] = './assets/uploads/'; 
    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
    $config['max_size']             = 2000;
    $config['max_width']            = 2048;
    $config['max_height']           = 2048;
    $config['file_name'] = $nmfile;
    $this->upload->initialize($config);
    if($_FILES['image']['name'])
    {
        if ($this->upload->do_upload('image'))
        {
            $title = $this->input->post('title');
            $slug = $this->create_url_slug($this->input->post('title'));
            $content = $this->input->post('content');
            $post_category = $this->input->post('post_category');
            $post_subcategory = $this->input->post('post_subcategory');
            $content = $this->input->post('content');
            $gbr = $this->upload->data();
            $data = array(
                'title' => $title,
                'slug' => $slug,
                'content' => $content,
                'img' =>$gbr['file_name'],
                'post_category' => $post_category,
                'post_subcategory' => $post_subcategory,

            );
            $this->Resource->store($data,$this->table);  
        } 
    }
    redirect('backend/'.$module.'/index');
}
function edit($id){
    $module = $this->table;
    $data['route'] = $this->table; 
    $where = array('id' => $id);
    $data[$module] = $this->Resource->edit($where,$this->table)->result();
    $data['category'] = $this->Resource->show('category')->result();
    $data['subcategory'] = $this->Resource->show('subcategory')->result();
    $this->load->view('backend/template/header');
    $this->load->view('backend/'.$module.'/edit',$data);
    $this->load->view('backend/template/footer');
}
function update(){
    $module = $this->table;

    $this->load->library('upload');
    $id = $this->input->post('id');
    $title = $this->input->post('title');
    $slug = $this->create_url_slug($this->input->post('title'));
    $content = $this->input->post('content');
    $post_category = $this->input->post('post_category');
    $post_subcategory = $this->input->post('post_subcategory');
    $content = $this->input->post('content');
    $data = array(
        'title' => $title,
        'slug' => $slug,
        'content' => $content,
        'post_category' => $post_category,
        'post_subcategory' => $post_subcategory,

    );
    $nmfile = "file_".time(); 
    $config['upload_path'] = './assets/uploads/'; 
    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
    $config['max_size']             = 2000;
    $config['max_width']            = 2048;
    $config['max_height']           = 2048;
    $config['file_name'] = $nmfile;
    $this->upload->initialize($config);
    $content = $this->input->post('content');
    if($_FILES['image']['name'])
    {
        if ($this->upload->do_upload('image'))
        {

            $gbr = $this->upload->data();
            $data['img'] =$gbr['file_name'];
            
        } 

    }
    $where = array(
        'id' => $id
    );

    $this->Resource->update($where,$data,$this->table);
    redirect('backend/'.$module.'/index');

}

function destroy ($id){ 
    $module = $this->table;
    $where = array('id' => $id);
    $this->Resource->destroy($where,$this->table);
    redirect('backend/'.$module.'/index'); 
}



function a_read_more($id_loker){ 
    $data['kategori']=$this->db_kategori->tampil_data_kategori()->result();
    $data['lokasi']=$this->db_lokasi->tampil_data_lokasi()->result();
    $this->load->view('frontend/template2');
    $where = array('id_loker' => $id_loker);
    $data['loker'] = $this->db_lokasi->edit_data($where,'loker')->result();
    $this->load->view('frontend/read_more',$data); 
    $this->load->view('frontend/footer');
}




}

