<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_laporan extends CI_Model
{

    public $table = 'ref_laporan';
    public $id = 'kd_barang';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json_barang() {
        $this->datatables->select('nm_kategori,kd_barang,nm_barang,satuan,harga');
        $this->datatables->from('ref_laporan a');
        $this->datatables->join('ref_kategori b', 'a.kd_kategori=b.kd_kategori');
        $this->db->order_by("a.kd_barang", "desc");
        return $this->datatables->generate();
    }
    function json_rb() {
        $kd_barang=$this->session->userdata("barang");
        if($kd_barang!="all"){

        $this->datatables->select("DATE_FORMAT(tanggal, '%d/%m/%Y') as tanggal,jumlah,a.kd_unit,nm_unit");
        $this->datatables->from("(SELECT tanggal, kd_barang,SUM(jumlah) AS jumlah,IFNULL(NULL, 0) AS kd_unit,nama_supplier AS nm_unit FROM tr_barang_masuk a JOIN ref_supplier_gudang b ON a.kd_supplier=b.kode_supplier WHERE kd_barang='$kd_barang' GROUP BY tanggal, kd_barang UNION SELECT tanggal,kd_barang,SUM(jumlah) AS jumlah,a.kd_unit,b.nm_unit FROM tr_barang_keluar a JOIN ref_unit b ON a.kd_unit=b.kd_unit  WHERE kd_barang='$kd_barang' GROUP BY tanggal,kd_unit ORDER BY tanggal ASC) a");
        return $this->datatables->generate();
        }
        else {
        $this->datatables->select("tanggal,nm_barang,jumlah,kd_unit,nm_unit");
        $this->datatables->from("v_lap_rb");
        return $this->datatables->generate();
        }
    }
    function json_lap_per_divisi() {
        $kategori=$this->session->userdata('kategori');
        $unit=$this->session->userdata('unit');
        $date1=$this->session->userdata('date1');
        $date2=$this->session->userdata('date2');        
        if(($kategori!="all")&&($unit!="all"))
        {//kategori tertentu & unit tertentu
        $this->datatables->select('a.kd_barang,a.nm_barang, satuan,c.nm_kategori, IFNULL(b.jumlah, 0) jumlah,IFNULL(b.harga, 0) harga,IFNULL(b.jumlah*b.harga,0) AS total');
        $this->datatables->from('ref_barang a');
        $this->datatables->join("(SELECT kd_barang,nm_barang,SUM(jumlah) jumlah, harga FROM tr_barang_keluar WHERE kd_unit=$unit AND tanggal BETWEEN '$date1' AND '$date2' GROUP BY kd_barang,nm_barang,harga) b", "a.kd_barang=b.kd_barang","left");
        $this->datatables->join('ref_kategori c', 'a.kd_kategori=c.kd_kategori');
        $this->datatables->where("a.kd_kategori=$kategori");
        $this->db->order_by("a.nm_barang,c.nm_kategori", "asc");
        }
        elseif(($kategori=="all")&&($unit!="all")) {//semua kategori & unit tertentu
        $this->datatables->select('a.kd_barang,a.nm_barang,c.nm_kategori, satuan, IFNULL(b.jumlah, 0) jumlah,IFNULL(b.harga, 0) harga,IFNULL(b.jumlah*b.harga,0) AS total');
        $this->datatables->from('ref_barang a');
        $this->datatables->join("(SELECT kd_barang,nm_barang,SUM(jumlah) jumlah, harga FROM tr_barang_keluar WHERE kd_unit=$unit AND tanggal BETWEEN '$date1' AND '$date2' GROUP BY kd_barang,nm_barang,harga) b", "a.kd_barang=b.kd_barang","left");
        $this->datatables->join('ref_kategori c', 'a.kd_kategori=c.kd_kategori');
        $this->db->order_by("a.nm_barang,c.nm_kategori", "asc");
        }
        elseif(($kategori!="all")&&($unit=="all")) {//kategori tertentu & semua unit
        $this->datatables->select('a.kd_barang,a.nm_barang,c.nm_kategori, satuan, IFNULL(b.jumlah, 0) jumlah,IFNULL(b.harga, 0) harga,IFNULL(b.jumlah*b.harga,0) AS total');
        $this->datatables->from('ref_barang a');
        $this->datatables->join("(SELECT kd_barang,nm_barang,SUM(jumlah) jumlah, harga FROM tr_barang_keluar WHERE  tanggal BETWEEN '$date1' AND '$date2' GROUP BY kd_barang,nm_barang,harga) b", "a.kd_barang=b.kd_barang","left");
        $this->datatables->join('ref_kategori c', 'a.kd_kategori=c.kd_kategori');
        $this->datatables->where("a.kd_kategori=$kategori");
        $this->db->order_by("a.nm_barang,c.nm_kategori", "asc");
        }
        else{//semua unit & semua kategori
        $this->datatables->select('a.kd_barang,a.nm_barang,c.nm_kategori, satuan, IFNULL(b.jumlah, 0) jumlah,IFNULL(b.harga, 0) harga,IFNULL(b.jumlah*b.harga,0) AS total');
        $this->datatables->from('ref_barang a');
        $this->datatables->join("(SELECT kd_barang,nm_barang,SUM(jumlah) jumlah, harga FROM tr_barang_keluar WHERE  tanggal BETWEEN '$date1' AND '$date2' GROUP BY kd_barang,nm_barang,harga) b", "a.kd_barang=b.kd_barang","left");
        $this->datatables->join('ref_kategori c', 'a.kd_kategori=c.kd_kategori');
        $this->db->order_by("a.nm_barang,c.nm_kategori", "asc");
        }


        return $this->datatables->generate();
    }
    function json_lap_per_bulan() {

        $kategori=$this->session->userdata('kategori');
        $date=$this->session->userdata('date');
        if($kategori!="all")
        {
        $this->datatables->select('a.kd_barang,a.nm_barang, satuan,c.nm_kategori, IFNULL(b.jumlah, 0) jumlah,IFNULL(b.harga, 0) harga,IFNULL(b.jumlah*b.harga,0) AS total');
        $this->datatables->from('ref_barang a');
        $this->datatables->join("(SELECT kd_barang,nm_barang,SUM(jumlah) jumlah,harga FROM tr_barang_keluar WHERE  tanggal LIKE '%$date%' GROUP BY kd_barang,nm_barang,harga) b", "a.kd_barang=b.kd_barang","left");
        $this->datatables->join('ref_kategori c', 'a.kd_kategori=c.kd_kategori');
        $this->datatables->where("a.kd_kategori=$kategori");
        $this->db->order_by("a.nm_barang,c.nm_kategori", "asc");
        return $this->datatables->generate();
        }
        else{
        $this->datatables->select('a.kd_barang,a.nm_barang, satuan,c.nm_kategori, IFNULL(b.jumlah, 0) jumlah,IFNULL(b.harga, 0) harga,IFNULL(b.jumlah*b.harga,0) AS total');
        $this->datatables->from('ref_barang a');
        $this->datatables->join("(SELECT kd_barang,nm_barang,SUM(jumlah) jumlah,harga FROM tr_barang_keluar WHERE  tanggal LIKE '%$date%' GROUP BY kd_barang,nm_barang,harga) b", "a.kd_barang=b.kd_barang","left");
        $this->datatables->join('ref_kategori c', 'a.kd_kategori=c.kd_kategori');
        $this->db->order_by("a.nm_barang,c.nm_kategori", "asc");
        return $this->datatables->generate();
        }
    }
 
    function json_lap_per_kategori() {
        $kategori=$this->session->userdata('kategori');
        $date1=$this->session->userdata('date1');
        $date2=$this->session->userdata('date2');
        if($kategori!="all")
        {
            
        $this->datatables->select('a.kd_barang,a.nm_barang, satuan,c.nm_kategori, IFNULL(b.jumlah, 0) jumlah,IFNULL(b.harga, 0) harga,IFNULL(b.jumlah*b.harga,0) AS total');
        $this->datatables->from('ref_barang a');
        $this->datatables->join("(SELECT kd_barang,nm_barang,SUM(jumlah) jumlah,harga FROM tr_barang_keluar WHERE  tanggal BETWEEN '$date1' AND '$date2' GROUP BY kd_barang,nm_barang,harga) b", "a.kd_barang=b.kd_barang","left");
        $this->datatables->join('ref_kategori c', 'a.kd_kategori=c.kd_kategori');
        $this->datatables->where("a.kd_kategori=$kategori");
        $this->db->order_by("a.nm_barang,c.nm_kategori", "asc");
        return $this->datatables->generate();
        }
        else{
            
        $this->datatables->select('a.kd_barang,a.nm_barang, satuan,c.nm_kategori, IFNULL(b.jumlah, 0) jumlah,IFNULL(b.harga, 0) harga,IFNULL(b.jumlah*b.harga,0) AS total');
        $this->datatables->from('ref_barang a');
        $this->datatables->join("(SELECT kd_barang,nm_barang,SUM(jumlah) jumlah,harga FROM tr_barang_keluar WHERE  tanggal BETWEEN '$date1' AND '$date2' GROUP BY kd_barang,nm_barang,harga) b", "a.kd_barang=b.kd_barang","left");
        $this->datatables->join('ref_kategori c', 'a.kd_kategori=c.kd_kategori');
        $this->db->order_by("a.nm_barang,c.nm_kategori", "asc");
        return $this->datatables->generate();
        }
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

    function getlap_divisi($kategori,$unit,$date1,$date2){
        if(($kategori!="all")&&($unit!="all"))
        {//kategori tertentu & unit tertentu
        return $this->db->query("SELECT a.kd_barang,a.nm_barang, satuan,c.nm_kategori, IFNULL(b.jumlah, 0) jumlah,IFNULL(b.harga, 0) harga,IFNULL(b.jumlah*b.harga,0) AS total
FROM ref_barang a LEFT JOIN
(SELECT kd_barang,nm_barang,harga,SUM(jumlah) jumlah
FROM tr_barang_keluar
WHERE kd_unit=$unit AND tanggal BETWEEN '$date1' AND '$date2'
GROUP BY kd_barang,nm_barang,harga) b ON a.kd_barang=b.kd_barang JOIN ref_kategori c ON a.kd_kategori=c.kd_kategori WHERE a.kd_kategori=$kategori order by a.nm_barang,c.nm_kategori asc")->result();
        }
        elseif(($kategori=="all")&&($unit!="all")) {//semua kategori & unit tertentu
        return $this->db->query("SELECT a.kd_barang,a.nm_barang, satuan,c.nm_kategori, IFNULL(b.jumlah, 0) jumlah,IFNULL(b.harga, 0) harga,IFNULL(b.jumlah*b.harga,0) AS total
FROM ref_barang a LEFT JOIN
(SELECT kd_barang,nm_barang,harga,SUM(jumlah) jumlah
FROM tr_barang_keluar
WHERE kd_unit=$unit AND tanggal BETWEEN '$date1' AND '$date2'
GROUP BY kd_barang,nm_barang,harga) b ON a.kd_barang=b.kd_barang JOIN ref_kategori c ON a.kd_kategori=c.kd_kategori  order by a.nm_barang,c.nm_kategori asc")->result();
        }
       elseif(($kategori!="all")&&($unit=="all")) {//kategori tertentu & semua unit
        return $this->db->query("SELECT a.kd_barang,a.nm_barang, satuan,c.nm_kategori, IFNULL(b.jumlah, 0) jumlah,IFNULL(b.harga, 0) harga,IFNULL(b.jumlah*b.harga,0) AS total
FROM ref_barang a LEFT JOIN
(SELECT kd_barang,nm_barang,harga,SUM(jumlah) jumlah
FROM tr_barang_keluar
WHERE  tanggal BETWEEN '$date1' AND '$date2'
GROUP BY kd_barang,nm_barang,harga) b ON a.kd_barang=b.kd_barang JOIN ref_kategori c ON a.kd_kategori=c.kd_kategori WHERE a.kd_kategori=$kategori order by a.nm_barang,c.nm_kategori asc")->result();
       }

        else{//semua unit & semua kategori
        return $this->db->query("SELECT a.kd_barang,a.nm_barang, satuan,c.nm_kategori, IFNULL(b.jumlah, 0) jumlah,IFNULL(b.harga, 0) harga,IFNULL(b.jumlah*b.harga,0) AS total
FROM ref_barang a LEFT JOIN
(SELECT kd_barang,nm_barang,harga,SUM(jumlah) jumlah
FROM tr_barang_keluar
WHERE  tanggal BETWEEN '$date1' AND '$date2'
GROUP BY kd_barang,nm_barang,harga) b ON a.kd_barang=b.kd_barang JOIN ref_kategori c ON a.kd_kategori=c.kd_kategori  order by a.nm_barang,c.nm_kategori asc")->result();    
    }}

    function getlap_bulan($kategori,$date){
        if($kategori!="all")
        {
            $where = "WHERE a.kd_kategori=$kategori";
        }
        else{
            $where ="";
        }
        return $this->db->query("SELECT a.kd_barang,a.nm_barang, satuan,c.nm_kategori, IFNULL(b.jumlah, 0) jumlah,IFNULL(b.harga, 0) harga,IFNULL(b.jumlah*b.harga,0) AS total
FROM ref_barang a LEFT JOIN
(SELECT kd_barang,nm_barang,harga,SUM(jumlah) jumlah
FROM tr_barang_keluar
WHERE  tanggal LIKE '%$date%'
GROUP BY kd_barang,nm_barang,harga) b ON a.kd_barang=b.kd_barang JOIN ref_kategori c ON a.kd_kategori=c.kd_kategori $where order by a.nm_barang,c.nm_kategori asc")->result();
    }
    function getlap_kategori($kategori,$date1,$date2){
        if($kategori!="all")
        {
            $where = "WHERE a.kd_kategori=$kategori";
        }
        else{
            $where ="";
        }
        return $this->db->query("SELECT a.kd_barang,a.nm_barang, satuan,c.nm_kategori, IFNULL(b.jumlah, 0) jumlah,IFNULL(b.harga, 0) harga,IFNULL(b.jumlah*b.harga,0) AS total
FROM ref_barang a LEFT JOIN
(SELECT kd_barang,nm_barang,harga,SUM(jumlah) jumlah
FROM tr_barang_keluar
WHERE tanggal BETWEEN '$date1' AND '$date2'
GROUP BY kd_barang,nm_barang,harga) b ON a.kd_barang=b.kd_barang JOIN ref_kategori c ON a.kd_kategori=c.kd_kategori $where order by a.nm_barang,c.nm_kategori asc")->result();
    }
    function ListUnit(){
        return $this->db->query("SELECT * from ref_unit ORDER BY nm_unit ASC")->result();
    }
    function ListKategori(){
        return $this->db->query("SELECT * from ref_kategori ORDER BY nm_kategori ASC")->result();
    }
    function Listbarang(){
        return $this->db->query("SELECT * from ref_barang ORDER BY nm_barang ASC")->result();
    }
    function Listrb($kd_barang){
        return $this->db->query("SELECT DATE_FORMAT(tanggal, '%d/%m/%Y')AS tgl, tanggal, kd_barang,nm_barang,SUM(jumlah) AS jumlah,IFNULL(NULL, 0) AS kd_unit,nama_supplier AS nm_unit FROM tr_barang_masuk a
JOIN ref_supplier_gudang b ON a.kd_supplier=b.kode_supplier WHERE kd_barang='$kd_barang'
GROUP BY tanggal,kd_barang,nama_supplier 
UNION 
SELECT DATE_FORMAT(tanggal, '%d/%m/%Y') AS tgl, tanggal,kd_barang,nm_barang,SUM(jumlah) AS jumlah,a.kd_unit,b.nm_unit FROM tr_barang_keluar a
JOIN ref_unit b ON a.kd_unit=b.kd_unit  WHERE kd_barang='$kd_barang' GROUP BY tanggal,kd_barang,nm_barang,kd_unit 
ORDER BY tanggal asc
")->result();
    }
    function Listbtt($now,$past){
        return $this->db->query("SELECT a.kd_barang,a.nm_barang,a.stock,jml_k FROM (SELECT a.kd_barang,CONCAT(a.nm_barang,' (',a.satuan,')') AS nm_barang,CONCAT(a.stock,' ',a.satuan) AS stock,IFNULL(SUM(b.jumlah),0) AS jml_k FROM ref_barang a
LEFT JOIN
(SELECT kd_barang,nm_barang,jumlah FROM tr_barang_keluar  WHERE tanggal BETWEEN '$past' AND '$now' GROUP BY kd_barang) b
ON a.kd_barang=b.kd_barang GROUP BY a.kd_barang)a WHERE jml_k=0")->result();
    }

}

/* End of file Mmenu.php */
/* Location: ./application/models/Mmenu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-08 05:30:09 */
/* http://harviacode.com */