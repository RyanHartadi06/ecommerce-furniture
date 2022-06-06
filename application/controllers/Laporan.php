<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller {

  private $nama_menu  = "Laporan";     

  public function __construct()
  {
    parent::__construct();
    $this->apl = get_apl();
    $this->load->model('M_main');
    must_login();
  }
  
  public function index()
  {
    $data['title'] = $this->nama_menu." | ".$this->apl['nama_sistem'];

    $id_user = $this->session->userdata("auth_id_user");
    $data_user = $this->M_main->get_where('users', 'id', $id_user)->row_array();
    $data['user'] = $data_user;      
    $data['content'] = "profile/index.php";
    $this->parser->parse('sistem/template', $data);
  }

}

/* End of file Profile.php */
