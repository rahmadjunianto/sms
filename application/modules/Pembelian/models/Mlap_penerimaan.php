<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mlap_penerimaan extends CI_Model
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
        $date=$this->session->userdata('date');
        $bulan=$this->session->userdata('bulan');
        $tahun=$this->session->userdata('tahun');
        if ($this->session->userdata('kg')==5) {
        $wh=" YEAR(tanggal)='$tahun' AND MONTH(tanggal)='$bulan' AND STATUS='Tervalidasi' AND kd_pengguna=$ku";}
        else {$wh=" YEAR(tanggal)='$tahun' AND MONTH(tanggal)='$bulan' AND STATUS='Tervalidasi' ";}
        $this->datatables->select("id_dukb,nama_supplier,tanggal,kd_siklus,jenis_kayu,plat_nomor,kode_lokasi AS kd_asal,a.kabupaten,a.kecamatan ");
        $this->datatables->from('tr_dukb a');
        $this->datatables->join('ref_supplier b', 'a.kode_supplier = b.kode_supplier');
        $this->datatables->join('ref_lokasi_kayu c ', 'a.kecamatan=c.kecamatan AND a.kabupaten=c.kabupaten');
        $this->db->order_by("a.id_dukb", "desc");
        $this->datatables->where($wh);
        return $this->datatables->generate();
    }
     function json_dukb_detail_temp() {
        $ku=$this->session->userdata('ku');
        $wh="kd_pengguna=$ku";
        $this->datatables->select("id_dukb_detail,diameter,panjang_kayu,batang,volume");
        $this->datatables->from('tr_dukb_detail_temp');
         $this->datatables->where($wh);
        //$this->datatables->join('ref_supplier b', 'b.kode_supplier=a.ref_suplier_id');
        $this->datatables->add_column('action', '<div class="btn-group">'.anchor(site_url('pembelian/man_bap/delete/$1'),'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger" onclick="javasciprt: return confirm(\'Apakah anda yakin?\')"').'</div>', 'id_dukb_detail');
        return $this->datatables->generate();
    }

    function json_dukb_detail() {
        $ku=$this->session->userdata('id_dukb');
        $wh="tr_dukb_id=$ku";
        $this->datatables->select("id_dukb_detail,batang,panjang_kayu,diameter, (CASE WHEN (LENGTH(volume) = 5) THEN REPLACE(CONCAT(volume,'0'),'.',',') WHEN (LENGTH(volume) = 4) THEN REPLACE(CONCAT(volume,'00 '),'.',',') ELSE REPLACE(CONCAT(volume,' '),'.',',') END) AS volume");
        $this->datatables->from('tr_dukb_detail');
         $this->datatables->where($wh);
        //$this->datatables->join('ref_supplier b', 'b.kode_supplier=a.ref_suplier_id');
       //$this->datatables->add_column('action', '<div class="btn-group">'.anchor(site_url('pembelian/man_bap/delete/$1'),'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger" onclick="javasciprt: return confirm(\'Apakah anda yakin?\')"').'</div>', 'id_dukb_detail');
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

    function getlap(){
        $date=$this->session->userdata('date');
        $ku=$this->session->userdata('ku');       
        if ($this->session->userdata('kg')==5) {
        $wh="tanggal LIKE '%$date%' AND STATUS='Tervalidasi' AND kd_pengguna=$ku";}
        else {$wh=" tanggal LIKE '%$date%' AND STATUS='Tervalidasi'";}

        return $this->db->query("SELECT id_dukb,nama_supplier,tanggal,kd_siklus,jenis_kayu,plat_nomor,kode_lokasi AS kd_asal,a.kabupaten,a.kecamatan,nm_grader
FROM tr_dukb a
JOIN ref_supplier b ON a.kode_supplier = b.kode_supplier
JOIN ref_lokasi_kayu c ON a.kecamatan=c.kecamatan AND a.kabupaten=c.kabupaten
JOIN ref_grader d ON a.kd_grader=d.kd_grader where $wh")->result();
    }
}

/* End of file Mmenu.php */
/* Location: ./application/models/Mmenu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-08 05:30:09 */
/* http://harviacode.com */