<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rating extends CI_Controller {
  private $nama_menu  = "Rating";     
  public function __construct()
  {
    parent::__construct();
    $this->apl = get_apl();
    $this->load->model('Order_m');
    $this->load->model('M_main');
  }

  public function penilaian($id_order){
    must_login();
    $data['title'] = "Rating | ".$this->apl['nama_sistem'];
    $data['order'] = $this->Order_m->get_pesanan_by_id($id_order)->row_array();
    $data['order_detail'] = $this->Order_m->get_list_pesanan_detail($id_order)->result();
    $data['content'] = "order/rating.php";    
    $this->parser->parse('frontend/template_produk', $data);
  }

}

/* End of file Rating.php */
