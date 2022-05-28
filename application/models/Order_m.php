<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Order_m extends CI_Model {

      function get_list_cart($id_user){
        $query = $this->db->query("
            SELECT c.*, d.kode, d.nama, d.harga, (
              SELECT foto FROM m_produk_image
              WHERE id_produk = c.id_produk
              ORDER BY created_at asc
              LIMIT 1
            ) AS foto FROM cart c
            LEFT JOIN m_produk d ON c.id_produk = d.id
            WHERE c.id_user = '$id_user'
            AND c.is_checkout = 0        
        ");
        return $query;
      }

      function get_produk_in_cart($id_produk, $id_user){
        $query = $this->db->select('*')
                ->where(array(
                  'id_produk' => $id_produk,
                  'id_user' => $id_user,
                  'is_checkout' => 0
                ))
                ->get('cart');
        return $query;
      }
    }
?>