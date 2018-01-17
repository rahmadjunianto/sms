<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mrp_harian extends CI_Model
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
        $p1=$this->session->userdata('p1');
        $p2=$this->session->userdata('p2');
        $jenis_kayu=$this->session->userdata('jenis_kayu');
        if ($this->session->userdata('kg')==5) {
        $wh="(c.panjang_kayu=".$p1." OR c.panjang_kayu=".$p2.") and a.jenis_kayu='$jenis_kayu'  and a.kd_pengguna=$ku  AND tanggal='$date' and status='Tervalidasi'";}
        else {$wh="(c.panjang_kayu=".$p1." OR c.panjang_kayu=".$p2.") and a.jenis_kayu='$jenis_kayu'    AND tanggal='$date' and status='Tervalidasi'";}
        $this->datatables->select("b.kode_supplier,DATE_FORMAT(a.tanggal, '%d-%m-%Y') as tgl,DATE_FORMAT(a.tanggal, '%d-%m-%Y') as tgl_val,tanggal, b.nama_supplier,REPLACE(SUM(ROUND(c.volume,4)),'.',',') AS volume, SUM(c.harga) AS harga");
        $this->datatables->from('tr_dukb a');
        $this->datatables->join('ref_supplier b', 'a.kode_supplier = b.kode_supplier');
        $this->datatables->join('tr_dukb_detail c', 'c.tr_dukb_id = a.id_dukb');
        $this->datatables->where($wh);
        $this->datatables->group_by('nama_supplier');$this->db->order_by("a.id_dukb", "desc");
        $this->datatables->add_column('action', '<div class="btn-group">'.anchor(site_url('pembelian/rp_harian/pdfrp_harian/$1'),'<i class="fa fa-file-pdf-o"></i>','class="btn btn-xs btn-danger"').'</div>', 'kode_supplier');
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


    function ListLokasi(){
        return $this->db->query("SELECT * FROM ref_lokasi_kayu ")->result();
    }
    function ListSupplier(){
        return $this->db->query("SELECT b.kode_supplier, a.kode_harga_kayu,b.nama_supplier, a.kabupaten,a.kecamatan 
FROM man_harga_kayu a
JOIN ref_supplier b WHERE a.kode_supplier=b.kode_supplier

GROUP BY a.kode_supplier,a.kabupaten,a.kecamatan")->result();
    }
    function ListSuppliers(){
        return $this->db->query("SELECT kode_supplier,nama_supplier from ref_supplier")->result();
    }    
    function ListKabupaten(){
        return $this->db->query("SELECT DISTINCT kabupaten FROM ref_lokasi_kayu order by kabupaten asc")->result();
    }
    function ListKecamatan(){
        return $this->db->query("SELECT kecamatan FROM ref_lokasi_kayu")->result();
    }   
        function ListGrader(){
        return $this->db->query("SELECT * FROM ref_grader")->result();
    } 
    function Listp130(){
        return $this->db->query("SELECT diameter,kelas_diameter,panjang_kayu,v_per_btg,(CASE WHEN (LENGTH(`ref_panjang_kayu`.`v_per_btg`) = 5) THEN CONCAT(`ref_panjang_kayu`.`v_per_btg`,'0') ELSE CONCAT(`ref_panjang_kayu`.`v_per_btg`,'')END) AS `v` FROM ref_panjang_kayu WHERE panjang_kayu='130'")->result();
    }    
    function Listp260(){
        return $this->db->query("SELECT diameter,kelas_diameter,panjang_kayu,v_per_btg,(CASE WHEN (LENGTH(`ref_panjang_kayu`.`v_per_btg`) = 5) THEN CONCAT(`ref_panjang_kayu`.`v_per_btg`,'0')ELSE CONCAT(`ref_panjang_kayu`.`v_per_btg`,'') END) AS `v` FROM ref_panjang_kayu WHERE panjang_kayu='260'")->result();
    }  
    function Listp1301(){
        return $this->db->query("SELECT diameter,kelas_diameter,panjang_kayu,v_per_btg,(CASE WHEN (LENGTH(`ref_panjang_kayu`.`v_per_btg`) = 5) THEN CONCAT(`ref_panjang_kayu`.`v_per_btg`,'0') ELSE CONCAT(`ref_panjang_kayu`.`v_per_btg`,'')END) AS `v` FROM ref_panjang_kayu WHERE panjang_kayu='130'")->result();
    }    
    function Listp2601(){
        return $this->db->query("SELECT diameter,kelas_diameter,panjang_kayu,v_per_btg,(CASE WHEN (LENGTH(`ref_panjang_kayu`.`v_per_btg`) = 5) THEN CONCAT(`ref_panjang_kayu`.`v_per_btg`,'0')ELSE CONCAT(`ref_panjang_kayu`.`v_per_btg`,'') END) AS `v` FROM ref_panjang_kayu WHERE panjang_kayu='260'")->result();
    } 

        function Listd130($id){
        return $this->db->query("SELECT a.panjang_kayu,a.diameter,a.batang,
(CASE WHEN (LENGTH(a.volume) = 5) 
THEN CONCAT(a.volume,'0')
ELSE CONCAT(a.volume,'') END) AS volume,
(CASE WHEN (LENGTH(b.v_per_btg) = 5) 
THEN CONCAT(b.v_per_btg,'0')
ELSE CONCAT(b.v_per_btg,'') END) AS v_per_btg FROM tr_kayu a 
JOIN ref_panjang_kayu b ON a.panjang_kayu=b.panjang_kayu AND a.diameter=b.diameter
WHERE a.tr_kayu_suplier_id=$id AND a.panjang_kayu=130")->result();
    }             
        function Listd260($id){
        return $this->db->query("SELECT a.panjang_kayu,a.diameter,a.batang,
(CASE WHEN (LENGTH(a.volume) = 5) 
THEN CONCAT(a.volume,'0')
ELSE CONCAT(a.volume,'') END) AS volume,
(CASE WHEN (LENGTH(b.v_per_btg) = 5) 
THEN CONCAT(b.v_per_btg,'0')
ELSE CONCAT(b.v_per_btg,'') END) AS v_per_btg FROM tr_kayu a 
JOIN ref_panjang_kayu b ON a.panjang_kayu=b.panjang_kayu AND a.diameter=b.diameter
WHERE a.tr_kayu_suplier_id=$id AND a.panjang_kayu=260
")->result();
    } 
        function panjang_kayu(){
        return $this->db->query("SELECT DISTINCT panjang_kayu FROM man_harga_kayu order by panjang_kayu asc")->result();
    } 

}

/* End of file Mmenu.php */
/* Location: ./application/models/Mmenu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-08 05:30:09 */
/* http://harviacode.com */