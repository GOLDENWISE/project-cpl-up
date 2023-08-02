<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

  public function __construct() {

    parent::__construct();
    is_logged_in();

  }

  public function index(){

    $data["title"] = 'Menu';
    $logoutUrl = base_url('/login/logout');
    $daftarMatkulUrl = base_url('menu/daftarmatkul');
    $evaluasiMatkul = base_url('menucpl/access/EvaluasiMatkul/evaluasi');
    $evaluasiCPL = base_url('menucpl/accesscplmahasiswa/');
    $data["links"] = [
      "<a href='assets/fileDownload/Kurikulum CS 2021 - Final (2).pdf' download class='btn btn-primary'>Dokumen Kurikulum</a>",
      "<a href='$daftarMatkulUrl' class='btn btn-primary'>Daftar Matkul</a>",
      "<a href='$evaluasiMatkul' class='btn btn-primary'>Lihat Evaluasi Mata Kuliah</a>",
      "<a href='$evaluasiCPL' class='btn btn-primary'>Lihat Evaluasi CPL per Mahasiswa</a>",
      "<a href='$logoutUrl' class='btn btn-primary'>Logout</a>"
    ];
    $data["linksheader"] = [
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebarMenu', $data);
    $this->load->view('templates/footer');

  }

  public function daftarMatkul(){

    $seeCPLUrl = base_url('/menucpl/index');
    $basemenu = base_url('/menu');
    $data["title"] = 'Daftar Matkul';
    $data["links"] = [
      "<a href='$seeCPLUrl/BerpikirKomputasi' class='btn btn-primary'>Berpikir Komputasi</a>"
    ];
    $data["linksheader"] = [
      "<a href='$basemenu'>Menu</a>"
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebarMenu', $data);
    $this->load->view('templates/footer');


  }

}