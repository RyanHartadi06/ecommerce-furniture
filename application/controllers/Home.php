<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
  private $nama_menu  = "Home";     
  public function __construct()
  {
    parent::__construct();
    $this->apl = get_apl();
    $this->load->model('Menu_m');
    // must_login();
  }
  
  public function index()
  {
    $data['title'] = "Home | ".$this->apl['nama_sistem'];

    $data['content'] = "home/index.php";    
    $this->parser->parse('frontend/template', $data);
  }
  
  public function detail()
  {
    $data['title'] = "Detail Produk | ".$this->apl['nama_sistem'];
    $data['content'] = "produk/detail_produk.php";    
    $this->parser->parse('frontend/template_produk', $data);
  }    
  
  public function about()
  {
    $data['title'] = "About | ".$this->apl['nama_sistem']; 
    $data['content'] = "home/about.php";    
    $this->parser->parse('frontend/template_produk', $data);
  } 

  public function contact()
  {
    $data['title'] = "Contact | ".$this->apl['nama_sistem']; 
    $data['content'] = "home/contact.php";    
    $this->parser->parse('frontend/template_produk', $data);
  } 

}

/* End of file Home.php */
