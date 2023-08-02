<?php 

function is_logged_in(){

  $ci = get_instance();
  if(!$ci->session->userdata('username')) redirect(base_url('/login'));

}

function is_logout() {

  $ci = get_instance();
  if($ci->session->userdata('username')) redirect(base_url('/menu'));

}