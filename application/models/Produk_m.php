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
              SELECT p.*, jp.nama AS jenis_produk, kp.nama AS kategori_produk, s.nama AS satuan FROM m_produk p
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
    }
?>