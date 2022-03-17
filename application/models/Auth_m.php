<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Auth_m extends CI_Model {
      public function check_auth_login($username, $password){
          $query  = $this->db->query("
              SELECT * FROM md_user WHERE
              name_user = '$username' AND password_user = '$password'
              limit 1
          ");
          return $query;
      }
      public function auth_by_id($user_id){
          $query  = $this->db->query("
              SELECT us.*, r.nama AS NAMA_ROLE FROM md_user us
              LEFT JOIN th_roles r ON us.ID_ROLE = r.id
              WHERE us.ID_USER = '$user_id' 
          ");
          return $query;
          // SELECT * FROM md_user us
          // LEFT JOIN (
          //   SELECT hku.USER_HU AS ID_USER, hk.ID_HAKAKSES, hk.NAME_HAKAKSES, hk.STATUS FROM md_hakakses_user hku
          //   JOIN md_hakakses hk ON hku.HAKAKSES_HU = hk.ID_HAKAKSES
          //   WHERE hk.STATUS = '1'
          // ) hk ON us.id_user = hk.id_user
          // WHERE hk.STATUS = '1'
          // AND us.ID_USER = '$user_id'             
      }
    }
?>