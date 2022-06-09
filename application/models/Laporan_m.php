<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    class Laporan_m extends CI_Model {
      
        function get_count_laporan_penjualan($filter=array()){
          $tgl_awal = $filter['tanggal_awal'];
          $tgl_akhir = $filter['tanggal_akhir'];
          $key = $filter['q'];
  
          $q = "
            SELECT count(*) as jml FROM orders o
            LEFT JOIN order_detail od ON o.id = od.id_order
            LEFT JOIN m_produk pd ON od.id_produk = pd.id
            LEFT JOIN m_pelanggan p ON o.id_pelanggan = p.id
            LEFT JOIN order_status os ON o.status = os.id
            WHERE concat(o.no_invoice, pd.nama, p.nama) like '%$key%' 
            AND o.tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir';
          "; 
        
          $query = $this->db->query($q)->row_array();
          return $query;
        }
  
        function get_laporan_penjualan($filter=array()){
            $with_pagination = $filter['with_pagination'];
            $tgl_awal = $filter['tanggal_awal'];
            $tgl_akhir = $filter['tanggal_akhir'];
            $sortby = $filter['sortby'];
            $sorttype = $filter['sorttype'];
            $offset = $filter['offset'];
            $limit = $filter['limit'];
            $key = $filter['q']; 
          
            $q = "
              select * from (
                SELECT od.*, o.no_invoice, o.tanggal, p.kode AS kode_pelanggan, p.nama AS nama_pelanggan, os.keterangan as nama_status,
                pd.kode AS kode_produk, pd.nama AS nama_produk FROM orders o
                LEFT JOIN order_detail od ON o.id = od.id_order
                LEFT JOIN m_produk pd ON od.id_produk = pd.id
                LEFT JOIN m_pelanggan p ON o.id_pelanggan = p.id
                LEFT JOIN order_status os ON o.status = os.id
                WHERE concat(o.no_invoice, pd.nama, p.nama) like '%$key%'
                AND o.tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir' 
              )x
            "; 
  
            if($with_pagination){
              $q .= "
                order by $sortby $sorttype
                limit $limit offset $offset
              ";
            }else{
              $q .= " order by o.tanggal desc ";
            }
          
            $query = $this->db->query($q);
            return $query;
        }

    }
    /* End of file Laporan_m.php */    
?>