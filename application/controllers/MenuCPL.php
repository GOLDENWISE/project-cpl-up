<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuCPL extends CI_Controller {

  public function __construct() {

    parent::__construct();
    is_logged_in();

  }

  public function index($namaMatkul){

    $cplAURL = base_url("/menucpl/access/CPL-A/$namaMatkul");
    $cplLURL = base_url("/menucpl/access/CPL-L/$namaMatkul");
    $basemenu = base_url('/menu');
    $listmatkulurl = base_url('/menu/daftarmatkul');
    $data["title"] = $namaMatkul;
    $data["links"] = [
      "<a href='$cplAURL' class='btn btn-primary'>Lihat CPL-A</a>",
      "<a href='$cplLURL' class='btn btn-primary'>Lihat CPL-L</a>",
    ];
    $data["linksheader"] = [
      "<a href='$basemenu'>Menu</a> >>",
      "<a href='$listmatkulurl'>Daftar Matkul</a>"
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebarMenu', $data);
    $this->load->view('templates/footer');

  }

  public function access($cpl, $namaMatkul){

    $links = [
      base_url("/menu"), 
      base_url("/menu/daftarmatkul"), 
      base_url("/menucpl/index/$namaMatkul")
    ];
    $data["title"] = $cpl;
    $data["namamatkul"] = $namaMatkul;
    $data["sourceFile"] = base_url("assets/fileDownload/$cpl.xlsx");
    if($namaMatkul !== "evaluasi"){
      $data["linksheader"] = [
        "<a href='$links[0]'>Menu</a> >>",
        "<a href='$links[1]'>Daftar Matkul</a> >>",
        "<a href='$links[2]'>Daftar CPL</a>"
      ];
    }else{
      $data["linksheader"] = [
        "<a href='$links[0]'>Menu</a>"
      ];
    }
    $this->load->view('templates/header', $data);
    $this->load->view('tablecpl', $data);
    if($namaMatkul === "evaluasi"){
      $this->load->view('chart');
    }
    $this->load->view('templates/footer');

  }

  public function accesscplmahasiswa($name = "Daftar Mahasiswa"){

    $links = base_url('/menu');
    $data["linksheader"] = [
      "<a href='$links'>Menu</a> >>"
    ];
    $data["title"] = $name;
    $this->load->view('templates/header', $data);
    if($name === "Daftar Mahasiswa"){
      $linksMahasiswa = [
        base_url('menucpl/accesscplmahasiswa/AbdullahAhmadHafiz')
      ];
      $data["links"] = [
        "<a href='$linksMahasiswa[0]' class='btn btn-primary'>Abdullah Ahmad Hafiz</a>"
      ];
      $this->load->view('templates/sidebarMenu', $data);
    }else{
      $links = base_url('/menucpl/accesscplmahasiswa/');
      $data["sourceFile"] = base_url("assets/fileDownload/EvaluasiCPL$name.xlsx");
      $data["linksheader"][1] = "<a href='$links'>Daftar Mahasiswa</a>";
      $this->load->view('tablecpl', $data);
      $this->load->view('chartEval');
    }
    $this->load->view('templates/footer');

  }

}