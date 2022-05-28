<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Order extends CI_Controller {
  private $nama_menu  = "Home";     
  public function __construct()
  {
    parent::__construct();
    $this->apl = get_apl();
    $this->load->model('Order_m');
  }

  public function cart_list (){
    $data['title'] = "Cart | ".$this->apl['nama_sistem'];
    
    $id_user = $this->session->userdata('auth_id_user');
    $cart = $this->Order_m->get_list_cart($id_user)->result();
    $data['data'] = $cart;
    $data['content'] = "order/cart.php";    
    $this->parser->parse('frontend/template_produk', $data);
  }

  public function add_cart()
  {
    $id_user = $this->session->userdata('auth_id_user');
    $id_produk = $this->input->post('id_produk');
    $qty = $this->input->post('qty');

    $is_login = $this->session->userdata('auth_is_login');
    if($is_login){  
      $data_object = array(
        'id_user'=>$id_user,
        'id_produk'=>$id_produk,
        'qty'=>$qty,
        'is_checkout'=>'0',
        'created_at'=>date('Y-m-d H:i:s')
      );
      $this->db->insert('chart', $data_object);
  
      $response['success'] = TRUE;
      $response['message'] = "Produk berhasil ditambahkan ke dalam keranjang";
    }else{
      $response['success'] = TRUE;
      $response['message'] = "Maaf, silahkan login terlebih dahulu";
    }

    echo json_encode($response);   
  }
      
}

/* End of file Order.php */
