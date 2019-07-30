<?php 

class Data_login extends MX_Controller{
     
     function __construct(){
          parent::__construct();        
          $this->load->model('login_model');
     }

     function index(){
         
          $this->load->view('login');

     }

     function aksi_login(){
          $username = $this->input->post('username');
          $password = $this->input->post('password');
          $where = array(
               'username' => $username,
               'password' => ($password)
               );
          $cek = $this->login_model->cek_login("pegawai",$where)->num_rows();
          if($cek > 0){

               $data_session = array(
                    'nama' => $username,
                    'status' => "login"
                    );

               $this->session->set_userdata($data_session);

               redirect(base_url("backend/welcome/index"));

          }else{
               echo $cek;
               echo "Username dan password salah !";
          }
     }

     function logout(){
          $this->session->sess_destroy();
          redirect(base_url('backend/data_login/index'));
     }
}