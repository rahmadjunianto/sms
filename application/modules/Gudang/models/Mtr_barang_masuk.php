<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mtr_barang_masuk extends CI_Model
{

    public $table = 'tr_barang_masuk';
    public $id = 'kd_barang_masuk';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json_barang() {
        $date=$this->session->userdata('date');
        $this->datatables->select("no_faktur,kd_barang_masuk,nm_barang,DATE_FORMAT(tanggal, '%d-%m-%Y') as tanggal,harga,jumlah");
        $this->datatables->from('tr_barang_masuk ');;$this->db->order_by("kd_barang_masuk", "desc");
        $this->datatables->where("tanggal='$date'");
        $this->datatables->add_column('action', '<div class="btn-group">'.anchor(site_url('gudang/tr_barang_masuk/update/$1'),'<i class="fa fa-edit"></i>','class="btn btn-xs btn-success"').anchor(site_url('gudang/tr_barang_masuk/delete/$1'),'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger" onclick="javasciprt: return confirm(\'Apakah anda yakin?\')"').'</div>', 'kd_barang_masuk');
        return $this->datatables->generate();
    }
    function json_sukses() {
        $ku=$this->session->userdata('ku');
        $this->datatables->select("no_faktur,kd_barang_masuk,nm_barang,DATE_FORMAT(tanggal, '%d-%m-%Y') as tanggal,harga,jumlah");
        $this->datatables->from('tr_barang_masuk_log ');;$this->db->order_by("tanggal", "desc");
        $this->datatables->where("status='sukses' and kd_pengguna=$ku");
        $this->datatables->add_column('action', '<div class="btn-group">'.anchor(site_url('gudang/tr_barang_masuk/update/$1'),'<i class="fa fa-edit"></i>','class="btn btn-xs btn-success"').anchor(site_url('gudang/tr_barang_masuk/delete/$1'),'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger" onclick="javasciprt: return confirm(\'Apakah anda yakin?\')"').'</div>', 'kd_barang_masuk');
        return $this->datatables->generate();
    }
    function json_gagal() {
        $ku=$this->session->userdata('ku');
        $this->datatables->select("no_faktur,kd_barang_masuk,nm_barang,DATE_FORMAT(tanggal, '%d-%m-%Y') as tanggal,harga,jumlah");
        $this->datatables->from('tr_barang_masuk_log ');;$this->db->order_by("tanggal", "desc");
        $this->datatables->where("status='gagal' and kd_pengguna=$ku");
        $this->datatables->add_column('action', '<div class="btn-group">'.anchor(site_url('gudang/tr_barang_masuk/update/$1'),'<i class="fa fa-edit"></i>','class="btn btn-xs btn-success"').anchor(site_url('gudang/tr_barang_masuk/delete/$1'),'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger" onclick="javasciprt: return confirm(\'Apakah anda yakin?\')"').'</div>', 'kd_barang_masuk');
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


    function ListBarang(){
        return $this->db->query("SELECT * from ref_barang ORDER BY nm_barang ASC")->result();
    }

}

/* End of file Mmenu.php */
/* Location: ./application/models/Mmenu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-08 05:30:09 */
/* http://harviacode.com */