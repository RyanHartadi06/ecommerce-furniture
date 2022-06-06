<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller {

  private $nama_menu  = "Profile";     

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_main');
    must_login();
  }
  
  public function index()
  {
    $id_user = $this->session->userdata("auth_id_user");
    $id_role = $this->session->userdata("auth_id_role");
    $data_user = $this->M_main->get_where('md_user', 'ID_USER', $id_user)->row_array();

    $us_profile = array();
    if ($id_role=='USTADZ' || $id_role=='ADMIN') { // Ustadz
      $id_ustadz = $this->session->userdata("id_ustadz");
      $cek_ustadz = $this->M_main->get_where('md_ustadz', 'ID_UST', $id_ustadz);	
      if($cek_ustadz->num_rows()>0){
        $ustadz = $cek_ustadz->row_array();	
        $us_profile = array(
          'nama_user_profile' => $ustadz['NAMA_UST'],
          'foto_user_profile' => $data_user['FOTO_USER'], 
        );
      }
    }
    
    if($id_role=='SANTRI'){
      $id_santri = $this->session->userdata("id_santri");
      $santri = $this->M_main->get_where('md_santri', 'ID_SANTRI', $id_santri)->row_array();	
      $us_profile = array(
        'nama_user_profile' => $santri['NAMA_SANTRI'],
        'foto_user_profile' => $data_user['FOTO_USER'], 
      );
    }

    $data['data_user'] = $data_user;   
    $data['user_profile'] = $us_profile;   
    $data['content'] = "profile/index.php";
    $this->parser->parse('sistem/template', $data);
  }
  
  public function load_modal_foto(){
    $id = $this->input->post('id');
    $data['id_user'] = $id; 
    $this->load->view('sistem/profile/modal-foto.php',$data);
  }

  public function simpan_foto(){
    $id_user = $this->input->post('id_user');
    $cek_user = $this->M_main->get_where('md_user', 'ID_USER', $id_user);                    
    if($cek_user->num_rows()!=0){
      $p_user = $cek_user->row_array();
      $foto_profile = do_upload_file('foto_user', 'upload_foto', 'assets/uploads/user/', 'jpg|png|jpeg');
      $path = $foto_profile['file_name'];

      $data_object = array(
        'FOTO_USER' => $path, 
      );
      $this->db->where('ID_USER', $id_user);
      $this->db->update('md_user', $data_object);

      $pathFileLama = $p_user['FOTO_USER'];
      if($pathFileLama!=""){
        if(file_exists($pathFileLama)){
          unlink($pathFileLama);
        } 
      }

      $ses_array = array(
        'auth_foto' => $path,
      );
      $this->session->set_userdata( $ses_array );

      $response['success'] = TRUE;
      $response['message'] = "Foto Berhasil Diperbarui";
    }else{
      $response['success'] = FALSE;
      $response['message'] = "Data Tidak Ditemukan !";
    }
    echo json_encode($response);
  }

  function update_password() {
    $id = $this->input->post('id_user');
    $password = $this->input->post("konfirm_password");
    date_default_timezone_set('Asia/Jakarta');
    $object = array(
      'PASSWORD_USER' => md5($password), 
    );
    $this->db->where('ID_USER',$id);
    $this->db->update('md_user', $object);
    
    $response['success'] = TRUE;
    $response['message'] = "Password Berhasil Diperbarui!";
    echo json_encode($response);	
  }

  function update_profile() {
    $id = $this->input->post('id_user');
    $nama_user = $this->input->post("nama_user");

    $id_role = $this->session->userdata("auth_id_role");
    date_default_timezone_set('Asia/Jakarta');
    if ($id_role=='USTADZ' || $id_role=='ADMIN') { // Ustadz
      $id_ustadz = $this->session->userdata("id_ustadz");
      $object = array( 
        'NAMA_UST' => $nama_user, 
      );
      $this->db->where('ID_UST', $id_ustadz);
      $this->db->update('md_ustadz', $object);
    }
    
    if($id_role=='SANTRI'){
      $id_santri = $this->session->userdata("id_santri");
      $object = array( 
        'NAMA_SANTRI' => $nama_user, 
      );
      $this->db->where('ID_SANTRI', $id_santri);
      $this->db->update('md_santri', $object);
    }

    $ses_array = array(
      'nama_user' => $nama_user,
    );
    $this->session->set_userdata( $ses_array );
    
    $response['success'] = TRUE;
    $response['message'] = "Data Profil berhasil Diperbarui!";
    echo json_encode($response);	
  }
}

/* End of file Profile.php */
