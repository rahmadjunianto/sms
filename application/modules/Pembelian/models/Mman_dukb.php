<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mman_dukb extends CI_Model
{

    public $table = 'tr_dukb';
    public $id = 'id_inc';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $ku=$this->session->userdata('ku');
        $kd_grader=$this->session->userdata('nama_grader');
        $supplier=$this->session->userdata('supplier');
        $date=$this->session->userdata('date');
        if ($this->session->userdata('kg')==5) {
        $wh="a.kd_grader=$kd_grader AND a.kd_pengguna=$ku AND a.kode_supplier=$supplier AND tanggal='$date'";}
        else {$wh="a.kd_grader=$kd_grader AND a.kode_supplier=$supplier AND tanggal='$date'";}
        $this->datatables->select("a.id_dukb,CONCAT(SUBSTRING(a.tanggal,9,2),'-',SUBSTRING(a.tanggal,6,2),'-',SUBSTRING(a.tanggal,1,4)) AS tanggal,c.nm_grader,b.nama_supplier,a.plat_nomor,a.jenis_kayu,a.kabupaten,a.kecamatan,a.kd_siklus,a.status");
        $this->datatables->from('tr_dukb a');
        $this->datatables->join('ref_supplier b', 'a.kode_supplier = b.kode_supplier');
        $this->datatables->join('ref_grader c', 'a.kd_grader=c.kd_grader');
        $this->datatables->where($wh);$this->db->order_by("a.id_dukb", "desc");
        $this->datatables->add_column('action', '<div class="btn-group">'.anchor(site_url('pembelian/man_dukb/detail/$1'),'<i class="fa fa-binoculars"></i>','class="btn btn-xs btn-success"').anchor(site_url('pembelian/man_dukb/delete_dukb/$1'),'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger" onclick="javasciprt: return confirm(\'Apakah anda yakin?\')"').'</div>', 'id_dukb');
        return $this->datatables->generate();
    }
        function json_val() {
        $supplier=$this->session->userdata('supplier');
        $date=$this->session->userdata('date');
        $wh=" a.kode_supplier=$supplier AND tanggal='$date' and a.status='Belum Tervalidasi'";
        $this->datatables->select("a.id_dukb,CONCAT(SUBSTRING(a.tanggal,9,2),'-',SUBSTRING(a.tanggal,6,2),'-',SUBSTRING(a.tanggal,1,4)) AS tanggal,c.nm_grader,b.nama_supplier,a.plat_nomor,a.jenis_kayu,a.kabupaten,a.kecamatan,a.kd_siklus,a.status");
        $this->datatables->from('tr_dukb a');
        $this->datatables->join('ref_supplier b', 'a.kode_supplier = b.kode_supplier');
        $this->datatables->join('ref_grader c', 'a.kd_grader=c.kd_grader');
        $this->datatables->where($wh);$this->db->order_by("a.id_dukb", "desc");
        $this->datatables->add_column('action', '<div class="btn-group">'.anchor(site_url('pembelian/man_dukb/detail/$1'),'<i class="fa fa-binoculars"></i>','class="btn btn-xs btn-success"').anchor(site_url('pembelian/man_dukb/validasi_action/$1'),'<i class="fa fa-check"></i>','class="btn btn-xs btn-primary" onclick="javasciprt: return confirm(\'Apakah anda yakin?\')"').'</div>', 'id_dukb');
        return $this->datatables->generate();
    }
        function json_terval() {
        $supplier=$this->session->userdata('supplier');
        $date=$this->session->userdata('date');
        $wh=" a.kode_supplier=$supplier AND tanggal='$date' and a.status='Tervalidasi'";
        $this->datatables->select("a.id_dukb,CONCAT(SUBSTRING(a.tanggal,9,2),'-',SUBSTRING(a.tanggal,6,2),'-',SUBSTRING(a.tanggal,1,4)) AS tanggal,CONCAT(SUBSTRING(a.tgl_validasi,9,2),'-',SUBSTRING(a.tgl_validasi,6,2),'-',SUBSTRING(a.tgl_validasi,1,4)) AS tanggal_val,c.nm_grader,b.nama_supplier,a.plat_nomor,a.jenis_kayu,a.kabupaten,a.kecamatan,a.kd_siklus,a.status");
        $this->datatables->from('tr_dukb a');
        $this->datatables->join('ref_supplier b', 'a.kode_supplier = b.kode_supplier');
        $this->datatables->join('ref_grader c', 'a.kd_grader=c.kd_grader');
        $this->datatables->where($wh);$this->db->order_by("a.id_dukb", "desc");
        $this->datatables->add_column('action', '<div class="btn-group">'.anchor(site_url('pembelian/man_dukb/detail/$1'),'<i class="fa fa-binoculars"></i>','class="btn btn-xs btn-success"').anchor(site_url('pembelian/man_dukb/validasi_action/$1'),'<i class="fa fa-check"></i>','class="btn btn-xs btn-primary" onclick="javasciprt: return confirm(\'Apakah anda yakin?\')"').'</div>', 'id_dukb');
        return $this->datatables->generate();
    }    
     function json_dukb_detail_temp() {
        $ku=$this->session->userdata('ku');
        $wh="kd_pengguna=$ku";
        $this->datatables->select("id_dukb_detail,diameter,panjang_kayu,batang,volume");
        $this->datatables->from('tr_dukb_detail_temp');
         $this->datatables->where($wh);
        //$this->datatables->join('ref_supplier b', 'b.kode_supplier=a.ref_suplier_id');
        $this->datatables->add_column('action', '<div class="btn-group">'.anchor(site_url('pembelian/man_dukb/delete/$1'),'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger" onclick="javasciprt: return confirm(\'Apakah anda yakin?\')"').'</div>', 'id_dukb_detail');
        return $this->datatables->generate();
    }

    function json_dukb_detail() {
        $ku=$this->session->userdata('id_dukb');
        $wh="tr_dukb_id=$ku";
        $this->datatables->select("id_dukb_detail,batang,panjang_kayu,diameter, (CASE WHEN (LENGTH(volume) = 5) THEN REPLACE(CONCAT(volume,'0'),'.',',') WHEN (LENGTH(volume) = 4) THEN REPLACE(CONCAT(volume,'00 '),'.',',') ELSE REPLACE(CONCAT(volume,' '),'.',',') END) AS volume");
        $this->datatables->from('tr_dukb_detail');
         $this->datatables->where($wh);
        //$this->datatables->join('ref_supplier b', 'b.kode_supplier=a.ref_suplier_id');
       //$this->datatables->add_column('action', '<div class="btn-group">'.anchor(site_url('pembelian/man_dukb/delete/$1'),'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger" onclick="javasciprt: return confirm(\'Apakah anda yakin?\')"').'</div>', 'id_dukb_detail');
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
    function delete_tr_kayu($id)
    {
        $this->db->where('tr_kayu_suplier_id', $id);
        $this->db->delete('tr_kayu');
    }    


    function ListLokasi(){
        return $this->db->query("SELECT * FROM ref_lokasi_kayu ")->result();
    }
    function ListSupplier(){
        return $this->db->query("SELECT b.kode_supplier, a.kode_harga_kayu,b.nama_supplier, a.kabupaten,a.kecamatan 
FROM man_harga_kayu a
JOIN ref_supplier b WHERE a.kode_supplier=b.kode_supplier

GROUP BY a.kode_supplier,a.kabupaten,a.kecamatan  ORDER BY nama_supplier,kabupaten,kecamatan ASC")->result();
    }
    function ListSuppliers(){
        return $this->db->query("SELECT kode_supplier,nama_supplier from ref_supplier ORDER BY nama_supplier asc")->result();
    }    
    function ListKabupaten(){
        return $this->db->query("SELECT DISTINCT kabupaten FROM ref_lokasi_kayu order by kabupaten asc")->result();
    }
    function ListKecamatan(){
        return $this->db->query("SELECT kecamatan FROM ref_lokasi_kayu")->result();
    }   
        function ListGrader(){
        return $this->db->query("SELECT * FROM ref_grader order by nm_grader asc")->result();
    } 
    function Listpanjang($nama_supplier,$kab,$kec){
        return $this->db->query("SELECT DISTINCT panjang_kayu FROM man_harga_kayu WHERE kode_supplier='$nama_supplier' AND kabupaten='$kab' AND kecamatan='$kec' order by panjang_kayu asc")->result();
    }    
}

/* End of file Mmenu.php */
/* Location: ./application/models/Mmenu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-08 05:30:09 */
/* http://harviacode.com */