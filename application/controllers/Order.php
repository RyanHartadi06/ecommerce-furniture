<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Order extends CI_Controller {
  private $nama_menu  = "Home";     
  public function __construct()
  {
    parent::__construct();
    $this->apl = get_apl();
    $this->load->model('Order_m');
    $this->load->model('M_main');
  }

  /**
   * Function Admin
   * 
   */
  public function index (){
    must_login();
    $data['title'] = "Order | ".$this->apl['nama_sistem'];
    $data['content'] = "order/index.php";    
    $this->parser->parse('sistem/template', $data);
  }

  public function fetch_data(){
    $pg     = ($this->input->get("page") != "") ? $this->input->get("page") : 1;
    $key	  = ($this->input->get("search") != "") ? strtoupper(quotes_to_entities($this->input->get("search"))) : "";
    $limit	= $this->input->get("limit");
    $offset = ($limit*$pg)-$limit;
    $column = $this->input->get("sortby");
    $sort   = $this->input->get("sorttype");
    
    $page              = array();
    $page['limit']     = $limit;
    $page['count_row'] = $this->Order_m->get_list_count($key)['jml'];
    $page['current']   = $pg;
    $page['list']      = gen_paging($page);
    $data['paging']    = $page;
    $data['list']      = $this->Order_m->get_list_data($key, $limit, $offset, $column, $sort);

    $this->load->view('sistem/order/list_data',$data);
  }

  /**
   * Start  Function Cart Customer
   * 
   */
  public function cart_list (){
    must_login();
    $data['title'] = "Cart | ".$this->apl['nama_sistem'];
    $data['content'] = "order/cart.php";    
    $this->parser->parse('frontend/template_produk', $data);
  }

  public function get_list_cart(){
    $id_user = $this->session->userdata('auth_id_user');
    $cart = $this->Order_m->get_list_cart($id_user)->result();
    $data['data'] = $cart;
    $this->load->view('frontend/order/data-cart', $data);
  }

  public function fetch_data_cart(){
    $id_user = $this->session->userdata('auth_id_user');
    $cart = $this->Order_m->get_list_cart($id_user)->result();
    $response['success'] = TRUE;
    $response['data'] = $cart;
    echo json_encode($response);  
  }

  public function add_cart()
  {
    $id_user = $this->session->userdata('auth_id_user');
    $id_produk = $this->input->post('id_produk');
    $qty = $this->input->post('qty');

    $is_login = $this->session->userdata('auth_is_login');
    if($is_login){  
      $cek_produk = $this->Order_m->get_produk_in_cart($id_produk, $id_user);
      if($cek_produk->num_rows()>0){
        $produk = $cek_produk->row_array();
        $qty = $qty + $produk['qty'];
        $object = array(
          'qty' => $qty,
          'updated_at' => date('Y-m-d H:i:s'),
        );
        $this->db->where('id', $produk['id']);
        $this->db->update('cart', $object);

        $response['success'] = TRUE;
        $response['message'] = "Produk berhasil diupdate ke dalam keranjang";
      }else{
        $data_object = array(
          'id_user'=>$id_user,
          'id_produk'=>$id_produk,
          'qty'=>$qty,
          'is_checkout'=>'0',
          'created_at'=>date('Y-m-d H:i:s')
        );
        $this->db->insert('cart', $data_object);

        $response['success'] = TRUE;
        $response['message'] = "Produk berhasil ditambahkan ke dalam keranjang";
      }
    }else{
      $response['success'] = FALSE;
      $response['message'] = "Maaf, silahkan login terlebih dahulu";
    }

    echo json_encode($response);   
  }

  public function delete_cart($id){
    if($id){
      $this->db->where('id', $id);
      $this->db->delete('cart');
      
      $response['success'] = true;
      $response['message'] = "Produk berhasil dihapus !";
    }else{
      $response['success'] = false;
      $response['message'] = "Data tidak ditemukan !";
    }
    echo json_encode($response);
  }

  /**
   * Start Order Function
   * 
   */
  public function order_complete (){
    $data['title'] = "Order | ".$this->apl['nama_sistem'];
    $data['content'] = "order/order-complete.php";    
    $this->parser->parse('frontend/template_produk', $data);
  }

  public function save()
  {
    $id_user = $this->session->userdata('auth_id_user');
    $keterangan = $this->input->post('keterangan');
    $order_detail = $this->input->post('order_detail');
    $order_detail = json_decode($order_detail);

    $id = $this->uuid->v4(false);    
    $data_object = array(
      'id'=>$id,
      'no_invoice'=>null,
      'tanggal'=>date('Y-m-d'),
      'id_pelanggan'=>null,
      'total'=>0,
      'keterangan'=>$keterangan,  
      'status'=>'1',
      'created_at'=>date('Y-m-d H:i:s'),
      'updated_at'=>date('Y-m-d H:i:s')
    );
    $this->db->insert('order', $data_object);

    foreach ($order_detail as $row) {  
      $id_detail = $this->uuid->v4(false); 
      $data_detail = array(
        'id'=>$id_detail,
        'id_order'=>$id,
        'id_produk'=>$row->id_produk,
        'qty'=>$row->qty,
        'harga'=>$row->harga,
        'created_at'=>date('Y-m-d H:i:s'),
        'updated_at'=>date('Y-m-d H:i:s'),
        // 'id_cart'=>null
      );
      $this->db->insert('order_detail', $data_detail);
    }

    $response['success'] = TRUE;
    $response['message'] = "Pesanan berhasil disimpan !";

    echo json_encode($response);   
  }    
}

/* End of file Order.php */
