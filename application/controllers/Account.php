<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Account extends CI_Controller {     

  public function __construct()
  {
    parent::__construct();
    $this->apl = get_apl();
		$this->load->model('Auth_m');
  }
  
  public function index()
	{
    must_login();
    $data['title'] = "Account | ".$this->apl['nama_sistem'];
    $data['content'] = "account/index.php";    
    $this->parser->parse('frontend/template_produk', $data);
  }
}
