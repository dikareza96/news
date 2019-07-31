<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Resource');
        

    }

    protected $table = 'user'; 

    function index()
    {
        $this->load->view('login');
    }
    function proses() {
            $usr = $this->input->get('username');
            $psw = $this->input->get('password');
            $cek = $this->Resource->cek($usr, $psw);
            if ($cek->num_rows() == 1) {
                
                foreach ($cek->result() as $qad) {
                    $sess_data['id']            = $qad->id;
                    $sess_data['username']      = $qad->username;
                    $sess_data['password']      = $qad->password;
                    $sess_data['name']          = $qad->name;
                    $sess_data['level']         = $qad->level;
                    $this->session->set_userdata($sess_data);
                }
                if($this->session->userdata('level') == 'admin')
                {
                  redirect('backend/post/index');
                }
                
            } else {
                $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
                redirect('login');
            }
    }
    function logout() {
            $this->session->sess_destroy();
            redirect('login');
    }
    
    
    

}