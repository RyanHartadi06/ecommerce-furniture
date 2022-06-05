<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Produk_m extends CI_Model {
      function get_list_count($key="", $status="1"){
          $query = $this->db->query("
              SELECT count(*) as jml FROM m_produk p
              LEFT JOIN m_jenis_produk jp ON p.id_jenis_produk = jp.id 
              LEFT JOIN m_kategori_produk kp ON p.id_kategori_produk = kp.id
              LEFT JOIN m_satuan s ON p.id_satuan = s.id
              WHERE concat(p.kode, p.nama, jp.nama, kp.nama, s.nama, p.deskripsi) like '%$key%' 
              and p.status = '$status'
          ")->row_array();
          return $query;
      }

      function get_list_data($key="",  $limit="", $offset="", $column="", $sort="", $status="1"){
          $query = $this->db->query("
              SELECT p.*, jp.nama AS jenis_produk, kp.nama AS kategori_produk, s.nama AS satuan,  (
                select foto from m_produk_image where id_produk = p.id
                order by created_at asc limit 1 
              ) as foto FROM m_produk p
              LEFT JOIN m_jenis_produk jp ON p.id_jenis_produk = jp.id 
              LEFT JOIN m_kategori_produk kp ON p.id_kategori_produk = kp.id
              LEFT JOIN m_satuan s ON p.id_satuan = s.id
              WHERE concat(p.kode, p.nama, jp.nama, kp.nama, s.nama, p.deskripsi) like '%$key%' 
              and p.status = '$status'
              order by $column $sort
              limit $limit offset $offset
          ");
          return $query;
      }

      function get_all(){
        $query = $this->db->select('id, nama')
                ->order_by('nama', 'asc')
                ->get('m_produk');
        return $query;
      }

      function get_by_id($id){
        $query = $this->db->query("
            SELECT p.*, jp.nama AS jenis_produk, kp.nama AS kategori_produk, s.nama AS satuan, (
              select foto from m_produk_image where id_produk = p.id
              order by created_at asc limit 1 
            ) as foto FROM m_produk p
            LEFT JOIN m_jenis_produk jp ON p.id_jenis_produk = jp.id 
            LEFT JOIN m_kategori_produk kp ON p.id_kategori_produk = kp.id
            LEFT JOIN m_satuan s ON p.id_satuan = s.id
            WHERE p.id = '$id'
        ");
        return $query;
      }

      function get_produk_by_kategori($id_kategori="", $id_produk=""){
        $q = "
          SELECT p.*, jp.nama AS jenis_produk, kp.nama AS kategori_produk, s.nama AS satuan,  (
            select foto from m_produk_image where id_produk = p.id
            order by created_at asc limit 1 
          ) as foto FROM m_produk p
          LEFT JOIN m_jenis_produk jp ON p.id_jenis_produk = jp.id 
          LEFT JOIN m_kategori_produk kp ON p.id_kategori_produk = kp.id
          LEFT JOIN m_satuan s ON p.id_satuan = s.id
          where p.id_kategori_produk = '$id_kategori'
          and p.status = '1'
        ";

        if($id_produk!=""){
          $q .= " and p.id <> '$id_produk'";
        }
        $q .= " order by p.created_at desc";
        
        $query = $this->db->query($q);
        return $query;
      }

      function get_produk_by_kode($kode=""){
        $q = "
            SELECT p.*, jp.nama AS jenis_produk, kp.nama AS kategori_produk, s.nama AS satuan,  (
              select foto from m_produk_image where id_produk = p.id
              order by created_at asc limit 1 
            ) as foto FROM m_produk p
            LEFT JOIN m_jenis_produk jp ON p.id_jenis_produk = jp.id 
            LEFT JOIN m_kategori_produk kp ON p.id_kategori_produk = kp.id
            LEFT JOIN m_satuan s ON p.id_satuan = s.id
            WHERE p.kode = '$kode'
            AND p.status = '1'
        ";

        $query = $this->db->query($q);
        return $query;
      }

    }
?>