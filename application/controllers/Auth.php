<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {     

  public function __construct()
  {
    parent::__construct();
		$this->load->model('Auth_m');
  }
  
  public function index()
	{
    is_login();
		$this->load->view('auth/login');
  }
  
  public function login()
  {
      $this->form_validation->set_rules('username', 'username', 'trim|required');
      $this->form_validation->set_rules('password', 'password', 'trim|required');
      if ($this->form_validation->run() == FALSE){
        $response['success'] = false;
        $response['message'] = "Username atau Password tidak boleh kosong !";
      }else{
        $username = strip_tags($this->input->post('username'));
        $password = md5(strip_tags($this->input->post('password')));
        
        $cek_status = $this->Auth_m->check_auth_login($username, $password);
        if($cek_status->num_rows()!=0){
          $cek_status = $cek_status->row_array();
          $status = $cek_status['STATUS_USER'];
          //cek status (aktif, terblokir)
          if($status=="BLOCK"){
            $response['success'] = false;
            $response['message'] = "Akun Anda diblokir oleh sistem, hubungi pusat bantuan untuk memulihkannya !";
            // insert_log($username, "Login Aplikasi", 'Akun Diblokir', $this->input->ip_address(), $this->agent->browser(), $this->agent->agent_string());
          }else if($status=="ACTIVE"){
            $cek_login = $this->Auth_m->auth_by_id($cek_status['ID_USER']);
            if($cek_login->num_rows()!=0){
              //user ditemukan
              $data_login=$cek_login->result();
              $ses_array = array(
                'auth_id_user' => $data_login[0]->ID_USER, 
                'auth_nama_user' => $data_login[0]->NAME_USER,
                'auth_username' => $username,
                'auth_id_role' => $data_login[0]->ID_ROLE, 
                'auth_nama_role' => $data_login[0]->NAMA_ROLE,
                'auth_foto' => null,
                'auth_is_login' => TRUE,
              );
              $this->session->set_userdata( $ses_array );
          
              $response['success'] = true;
              $response['message'] = "Selamat Datang ".$data_login[0]->NAME_USER." !";
              $response['page'] = 'Home';
              // insert_log($username, "Login Aplikasi", 'Berhasil Login', $this->input->ip_address(), $this->agent->browser(), $this->agent->agent_string());
            }else{
              //Akun Anda user salah
              $response['success'] = false;
              $response['message'] = "Akun Anda Tidak Ditemukan !";
              // insert_log($username, "Login Aplikasi", 'Akun Tidak Ditemukan', $this->input->ip_address(), $this->agent->browser(), $this->agent->agent_string());
            }
          }else{
            $response['success'] = false;
            $response['message'] = "Akun Anda dinonaktifkan !";
            // insert_log($username, "Login Aplikasi", 'Akun Dinonaktifkan', $this->input->ip_address(), $this->agent->browser(), $this->agent->agent_string());
          }
        }else{
          //Akun Anda user salah
          $response['success'] = false;
          $response['message'] = "Username atau password salah !";
          // insert_log($username, "Login Aplikasi", 'Akun Tidak Ditemukan', $this->input->ip_address(), $this->agent->browser(), $this->agent->agent_string());
        }
      }
      echo json_response($response);
  }

  function logout(){
		// $username = $this->session->userdata('auth_username');
		// insert_log($username, "Logout Aplikasi", 'Berhasil Logout', $this->input->ip_address(), $this->agent->browser(), $this->agent->agent_string());
		
		$this->session->sess_destroy();
		$data['success'] = TRUE;
		$data['message'] = "Anda Berhasil Logout !";
		$data['page'] = "Auth";
		echo json_response($data);
	}
}
