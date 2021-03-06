<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mman_harga_kayu extends CI_Model
{

    public $table = 'man_harga_kayu';
    public $id = 'kode_harga_kayu';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select("a.kode_harga_kayu,b.nama_supplier,CONCAT (a.panjang_kayu,' cm') AS panjang,a.kabupaten,a.kecamatan,REPLACE(FORMAT(a.harga, 0), '.', ',') as harga,CONCAT (a.kd_bawah,'-',a.kd_atas ,' cm') AS kd ");
        $this->datatables->from('man_harga_kayu a');
        $this->datatables->join('ref_supplier b', 'a.kode_supplier = b.kode_supplier');;$this->db->order_by("a.kode_harga_kayu", "desc");
        $this->datatables->add_column('action', '<div class="btn-group">'.anchor(site_url('pembelian/man_harga_kayu/update/$1'),'<i class="fa fa-edit"></i>','class="btn btn-xs btn-success"').anchor(site_url('pembelian/man_harga_kayu/delete/$1'),'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger" id="delete" data-id="$1" href="javascript:void(0)"').'</div>', 'kode_harga_kayu');
        return $this->datatables->generate();
    }
     function jsonsukses() {
        $ku=$this->session->userdata('ku');
        $this->datatables->select("a.kode_harga_kayu,b.nama_supplier,CONCAT (a.panjang_kayu,' cm') AS panjang,a.kabupaten,a.kecamatan,REPLACE(FORMAT(a.harga, 0), '.', ',') as harga,CONCAT (a.kd_bawah,'-',a.kd_atas ,' cm') AS kd ");
        $this->datatables->from('man_harga_kayu_log a');
        $this->datatables->join('ref_supplier b', 'a.kode_supplier = b.kode_supplier');
        $this->datatables->where("a.status='sukses' and kd_pengguna=$ku");
        $this->datatables->add_column('action', '<div class="btn-group">'.anchor(site_url('pembelian/man_harga_kayu/update/$1'),'<i class="fa fa-edit"></i>','class="btn btn-xs btn-success"').anchor(site_url('pembelian/man_harga_kayu/delete/$1'),'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger" onclick="javasciprt: return confirm(\'Apakah anda yakin?\')"').'</div>', 'kode_harga_kayu');
        return $this->datatables->generate();
    }
     function jsongagal() {
        $ku=$this->session->userdata('ku');
        $this->datatables->select("a.kode_harga_kayu,b.nama_supplier,CONCAT (a.panjang_kayu,' cm') AS panjang,a.kabupaten,a.kecamatan,REPLACE(FORMAT(a.harga, 0), '.', ',') as harga,CONCAT (a.kd_bawah,'-',a.kd_atas ,' cm') AS kd ");
        $this->datatables->from('man_harga_kayu_log a');
        $this->datatables->join('ref_supplier b', 'a.kode_supplier = b.kode_supplier');
        $this->datatables->where("a.status='gagal' and kd_pengguna=$ku");
        $this->datatables->add_column('action', '<div class="btn-group">'.anchor(site_url('pembelian/man_harga_kayu/update/$1'),'<i class="fa fa-edit"></i>','class="btn btn-xs btn-success"').anchor(site_url('pembelian/man_harga_kayu/delete/$1'),'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger" onclick="javasciprt: return confirm(\'Apakah anda yakin?\')"').'</div>', 'kode_harga_kayu');
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


    function ListKab(){
        return $this->db->query("SELECT DISTINCT kabupaten FROM ref_lokasi_kayu order by kabupaten asc")->result();
    }
    function ListSupplier(){
        return $this->db->query("SELECT * FROM ref_supplier order by nama_supplier asc")->result();
    }
    function ListSPanjangKayu(){
        return $this->db->query("SELECT panjang_kayu  FROM
(SELECT  DISTINCT panjang_kayu  FROM ref_panjang_kayu)a order by panjang_kayu asc")->result();
    }
    function ListKelasDiameter($id){
        return $this->db->query("SELECT CONCAT (kd_bawah,'-',kd_atas) AS kd FROM
(SELECT  DISTINCT kd_bawah,kd_atas FROM ref_panjang_kayu WHERE panjang_kayu=$id)a")->result();
    } 
    function Listkec($id){
        return $this->db->query("SELECT kecamatan FROM ref_lokasi_kayu WHERE kabupaten='$id' order by kecamatan asc")->result();
    }        

}

/* End of file Mmenu.php */
/* Location: ./application/models/Mmenu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-08 05:30:09 */
/* http://harviacode.com */