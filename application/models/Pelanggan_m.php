<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Pelanggan_m extends CI_Model {
      function get_list_count($key="", $status="1"){
          $query = $this->db->query("
              select count(*) as jml from m_pelanggan
              where 
                  concat(nama, no_telp, email, coalesce(alamat, '')) like '%$key%' and status = '$status'
          ")->row_array();
          return $query;
      }

      function get_list_data($key="",  $limit="", $offset="", $column="", $sort="", $status="1"){
          $query = $this->db->query("
              select * from m_pelanggan
              where 
                  concat(nama, no_telp, email, coalesce(alamat, '')) like '%$key%' 
                  and status = '$status'
              order by $column $sort
              limit $limit offset $offset
          ");
          return $query;
      }

      function get_all(){
        $query = $this->db->select('id, nama')
                ->order_by('nama', 'asc')
                ->get('m_pelanggan');
        return $query;
      }
    }
?>