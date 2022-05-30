<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Order_m extends CI_Model {
      function get_list_count($key="", $status="1"){
          $query = $this->db->query("
              SELECT count(*) as jml FROM orders o
              LEFT JOIN m_pelanggan p ON o.id_pelanggan = p.id
              WHERE concat(o.no_invoice, p.nama) like '%$key%'     
          ")->row_array();
          return $query;
      }

      function get_list_data($key="",  $limit="", $offset="", $column="", $sort="", $status="1"){
          $query = $this->db->query("
              SELECT o.*, p.kode AS kode_pelanggan, p.nama AS nama_pelanggan, p.no_telp, p.alamat FROM orders o
              LEFT JOIN m_pelanggan p ON o.id_pelanggan = p.id
              WHERE concat(o.no_invoice, p.nama) like '%$key%' 
              order by $column $sort
              limit $limit offset $offset
          ");
          return $query;
      }

      function get_pesanan_by_id($id_order){
        $query = $this->db->query("
            SELECT o.*, p.kode AS kode_pelanggan, p.nama AS nama_pelanggan, p.no_telp, p.alamat FROM orders o
            LEFT JOIN m_pelanggan p ON o.id_pelanggan = p.id
            WHERE o.id = '$id_order'
        ");
        return $query;
      }

      function get_list_pesanan_detail($id_order){
        $query = $this->db->query("
            SELECT od.*, p.nama AS nama_produk, jp.nama AS jenis_produk, kp.nama AS kategori_produk, s.nama AS satuan FROM order_detail od
            LEFT JOIN m_produk p ON od.id_produk = p.id
            LEFT JOIN m_jenis_produk jp ON p.id_jenis_produk = jp.id
            LEFT JOIN m_kategori_produk kp ON p.id_kategori_produk = kp.id
            LEFT JOIN m_satuan s ON p.id_satuan = s.id
            WHERE od.id_order = '$id_order'
        ");
        return $query;
      }

      /**
       * Function Cart
       * 
       *  */ 
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

      /**
       * Function Recommendation
       * 
       */
      function get_rating_produk(){
        $query = $this->db->query("
            SELECT p.nama AS nama_produk, pr.rating, us.username FROM produk_rating pr
            LEFT JOIN m_produk p ON pr.id_produk = p.id
            LEFT JOIN users us ON pr.id_user = us.id     
            ORDER BY us.username ASC           
        ");
        return $query;
      }

      function get_pesanan_by_pelanggan($id_user){
        $query = $this->db->query("
            SELECT o.*, p.kode AS kode_pelanggan, p.nama AS nama_pelanggan, p.no_telp, p.alamat FROM orders o
            LEFT JOIN m_pelanggan p ON o.id_pelanggan = p.id
            WHERE p.id_user = '$id_user'
        ");
        return $query;
      }
    }
?>