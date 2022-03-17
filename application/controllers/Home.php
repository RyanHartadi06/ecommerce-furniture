<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
  private $nama_menu  = "Beranda";     
  public function __construct()
  {
    parent::__construct();
    must_login();
  }
  
  public function index()
  {
    $data['content'] = "home/index.php";    
    $this->parser->parse('sistem/template', $data);
  }    
}

/* End of file Home.php */
