<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Pelanggan extends CI_Controller {
  private $nama_menu  = "Pelanggan";     
  public function __construct()
  {
    parent::__construct();
    $this->apl = get_apl();
    $this->load->model('Menu_m');
    $this->load->model('M_main');
    $this->load->model('Pelanggan_m');
    must_login();
  }
  
  public function index()
  {
    $this->Menu_m->role_has_access($this->nama_menu);
    $data['title'] = $this->nama_menu." | ".$this->apl['nama_sistem'];

    $data['content'] = "pelanggan/index.php";    
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
    $page['count_row'] = $this->Pelanggan_m->get_list_count($key)['jml'];
    $page['current']   = $pg;
    $page['list']      = gen_paging($page);
    $data['paging']    = $page;
    $data['list']      = $this->Pelanggan_m->get_list_data($key, $limit, $offset, $column, $sort);

    $this->load->view('sistem/pelanggan/list_data',$data);
  }

  public function load_modal(){
    $id = $this->input->post('id');
    if ($id!=""){
        $data['mode'] = "UPDATE";
        $data['data'] = $this->M_main->get_where('m_pelanggan','id',$id)->row_array();
    }else{
        $data['mode'] = "ADD";
        $data['kosong'] = "";
    }
    $this->load->view('sistem/pelanggan/form_modal',$data);
  }

  public function save(){
      $id = $this->input->post('id');
      $kode = strip_tags(trim($this->input->post('kode')));
      $nama = strip_tags(trim($this->input->post('nama')));
      $no_telp = strip_tags(trim($this->input->post('no_telp')));
      $alamat = strip_tags(trim($this->input->post('alamat')));
      $keterangan = strip_tags(trim($this->input->post('keterangan')));
      if($id!=""){
          $data_object = array(
              'kode'=>$kode,
              'nama'=>$nama,
              'no_telp'=>$no_telp,
              'alamat'=>$alamat,
              'keterangan'=>$keterangan,
              'updated_at'=>date('Y-m-d H:i:s')
          );
      
          $this->db->where('id',$id);
          $this->db->update('m_pelanggan', $data_object);

          $response['success'] = true;
          $response['message'] = "Data Berhasil Diubah !";     
      }else{
          $data_object = array(
              'kode'=>$kode,
              'nama'=>$nama,
              'no_telp'=>$no_telp,
              'alamat'=>$alamat,
              'keterangan'=>$keterangan,
              'status'=>'1',
              'created_at'=>date('Y-m-d H:i:s')
          );
          $this->db->insert('m_pelanggan', $data_object);
          $response['success'] = TRUE;
          $response['message'] = "Data Berhasil Disimpan";
      }
      echo json_encode($response);   
  }

  public function delete($id){
    if($id){
      $object = array(
        'status' => '0',
        'deleted_at' => date('Y-m-d H:i:s'),
      );
      $this->db->where('id', $id);
      $this->db->update('m_pelanggan', $object);
      
      $response['success'] = true;
      $response['message'] = "Data berhasil dihapus !";
    }else{
      $response['success'] = false;
      $response['message'] = "Data tidak ditemukan !";
    }
    echo json_encode($response);
  }
}

/* End of file Pelanggan.php */
