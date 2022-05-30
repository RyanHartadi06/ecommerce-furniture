<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Account extends CI_Controller {     

  public function __construct()
  {
    parent::__construct();
    $this->apl = get_apl();
		$this->load->model('Auth_m');
		$this->load->model('Order_m');
  }
  
  public function index()
	{
    must_login();
    $id_user = $this->session->userdata('auth_id_user');
    $data['title'] = "Account | ".$this->apl['nama_sistem'];
    $data['order'] = $this->Order_m->get_pesanan_by_pelanggan($id_user)->result();
    $data['content'] = "account/index.php";    
    $this->parser->parse('frontend/template_produk', $data);
  }
}
