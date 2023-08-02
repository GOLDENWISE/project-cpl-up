<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct(){
    
    parent::__construct();
    $this->load->library('form_validation');

  }

	public function index() {

    is_logout();
    $data["title"] = 'Login';
    $data["login"] = true;
    $data["beranda"] = false;
    $data["kalender"] = false;
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
		$this->load->view('auth/login');
    $this->load->view('templates/footer', $data);
	
  }

  public function _login(){

    $username = $this->input->post('username');
    $password = $this->input->post('password');
    
    if($username === "username"){

      if($password === "password"){
      
        $data = [
          "username" => $username 
        ];
        $this->session->set_userdata($data);
        redirect(base_url('/menu'));
      
      }else{

        redirect(base_url('/login'));

      }
    
    }else{

      redirect(base_url('/login'));

    }

  }

  public function logout(){

    $this->session->unset_userdata('username');
    redirect(base_url('/login'));

  }

  public function authorization(){

    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    
    if($this->form_validation->run()){

      $this->_login();

    }

  }

}
