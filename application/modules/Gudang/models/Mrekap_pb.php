
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mrekap_pb extends CI_Model
{

    public $table = 'rekap_pb_gudang';
    public $id = 'kode_supplier';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $bulan=$this->session->userdata('bulan');
        $tahun=$this->session->userdata('tahun');
        $kd_kategori=$this->session->userdata('kd_kategori');
        if($kd_kategori!="all"){
            $wh="YEAR(a.tanggal)='$tahun' AND MONTH(a.tanggal)='$bulan' and f.kd_kategori='$kd_kategori'";
        }else {
            $wh="YEAR(a.tanggal)='$tahun' AND MONTH(a.tanggal)='$bulan' ";
        }
        $this->datatables->select("inisial,satuan,a.spesifikasi,a.kd_barang_keluar,c.kd_barang,a.nm_barang,DATE_FORMAT(tanggal, '%d-%m-%Y') as tanggal,a.harga,a.jumlah,(a.harga*a.jumlah) as tot,nm_divisi,penerima,nm_alok_p,nm_alok_b");
        $this->datatables->from('tr_barang_keluar a');  
        $this->datatables->join('ref_divisi b', 'a.kd_divisi=b.kd_divisi');
        $this->datatables->join('ref_barang c', 'a.kd_barang=c.kd_barang');
        $this->datatables->join('ref_alok_p d', 'a.kd_alok_p=d.kd_alok_p');
        $this->datatables->join('ref_alok_b e', 'a.kd_alok_b=e.kd_alok_b');
        $this->datatables->join('ref_kategori f', 'c.kd_kategori=f.kd_kategori');
        $this->datatables->where("$wh");
        $this->db->order_by("tanggal", "asc");
        $this->datatables->add_column('action', '<div class="btn-group">'.anchor(site_url('gudang/tr_barang_keluar/update/$1'),'<i class="fa fa-edit"></i>','class="btn btn-xs btn-success"').anchor(site_url('gudang/tr_barang_keluar/delete/$1'),'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger" id="delete" data-id="$1" href="javascript:void(0)"').'</div>', 'kd_barang_keluar');
        return $this->datatables->generate();
    }
 
    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
  

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function ListKategori(){
        return $this->db->query("SELECT * from ref_kategori ORDER BY nm_kategori ASC")->result();
    }

    function getlap($tahun,$bulan,$kd_kategori){
        if($kd_kategori!="all"){
            $wh="YEAR(a.tanggal)='$tahun' AND MONTH(a.tanggal)='$bulan' and f.kd_kategori='$kd_kategori'";
        }else {
            $wh="YEAR(a.tanggal)='$tahun' AND MONTH(a.tanggal)='$bulan' ";
        }        
        return $this->db->query("SELECT inisial,satuan,a.spesifikasi,a.kd_barang_keluar,c.kd_barang,a.nm_barang,DATE_FORMAT(tanggal, '%d-%m-%Y') AS tanggal,a.harga,a.jumlah,(a.harga*a.jumlah) AS tot,nm_divisi,penerima,nm_alok_p,nm_alok_b
FROM tr_barang_keluar a
JOIN ref_divisi b ON a.kd_divisi=b.kd_divisi
JOIN ref_barang c ON a.kd_barang=c.kd_barang
JOIN ref_alok_p d ON a.kd_alok_p=d.kd_alok_p
JOIN ref_alok_b e ON a.kd_alok_b=e.kd_alok_b
JOIN ref_kategori f ON c.kd_kategori=f.kd_kategori
WHERE $wh
ORDER BY tanggal ASC")->result();
    }

}

/* End of file Mmenu.php */
/* Location: ./application/models/Mmenu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-08 05:30:09 */
/* http://harviacode.com */