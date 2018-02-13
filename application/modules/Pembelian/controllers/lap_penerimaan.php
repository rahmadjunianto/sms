<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class lap_penerimaan extends CI_Controller {
    function __construct()
    {
        parent::__construct();
         $this->load->library('M_pdf');
        $this->load->model('Mlap_penerimaan');
        $this->load->library('form_validation');        
        $this->load->library('datatables');
    }
    public function index()
    {
        if(isset($_POST['date'])){
            $date     =$_POST['date'];
            $rk="tampil";
        }else{
            $date=DATE('m/Y');
            $rk ="";
        }
        $sess=array(    
            'date'=>substr($date,3,4)."-".substr($date,0,2),
            'bulan'=>substr($date,0,2),
            'tahun'=>substr($date,3,4),
                );   
        $this->session->set_userdata($sess); 
        $data['date']=$date;
        $data['rk'] =$rk;
        $this->template->load('welcome/halaman','pembelian/lap_penerimaan/lap_penerimaan_list',$data);
    }       
    public function list_excel(){  
        $data['rk'] =$this->Mlap_penerimaan->getlap(); 
        $data['panjang_kayu']=$this->db->query("SELECT DISTINCT panjang_kayu FROM ref_panjang_kayu order by panjang_kayu asc")->result();
        $data['jml_p']=$this->db->query("SELECT COUNT(DISTINCT panjang_kayu) AS jml_p FROM ref_panjang_kayu")->row();
        $this->load->view('Pembelian/lap_penerimaan/lap_penerimaan_excel',$data);
    }       
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mlap_penerimaan->json();
    }
        public function detail($id) 
    {
                $sess=array(
                'id_bap'=>$id,
                );
        $this->session->set_userdata($sess); 
        $row=$this->db->query("SELECT  a.id_dukb,CONCAT(SUBSTRING(a.tanggal,9,2),'-',SUBSTRING(a.tanggal,6,2),'-',SUBSTRING(a.tanggal,1,4)) AS tanggal,c.nm_grader,b.nama_supplier,a.plat_nomor,a.jenis_kayu,a.kabupaten,a.kecamatan,a.asal_kayu,a.kd_siklus
FROM tr_dukb a
JOIN ref_supplier b ON a.kode_supplier=b.kode_supplier
JOIN ref_grader c ON a.kd_grader=c.kd_grader WHERE id_dukb=$id")->row();
        $jml_p=$this->db->query("SELECT DISTINCT panjang_kayu FROM tr_dukb_detail WHERE tr_dukb_id=$id order by panjang_kayu desc")->result();
        if ($row) {
            $data = array(
                'button'     => 'Detail Manajemen bap',
                'action'     => site_url('pembelian/man_bap/update_action'),
            'nama_grader' => set_value('nama_grader',$row->nm_grader),
            'nama_supplier' => set_value('nama_supplier',$row->nama_supplier),
            'plat_nomor'=> set_value('plat_nomor',$row->plat_nomor),
            'jenis_kayu'=> set_value('jenis_kayu',$row->jenis_kayu),
            'kabupatenn'=> set_value('kabupaten',$row->kabupaten),
            'kecamatann'=> set_value('kecamatan',$row->kecamatan),
            'asal_kayu'=> set_value('asal_kayu',$row->asal_kayu),
            'kd_siklus'=> set_value('kd_siklus',$row->kd_siklus),
            'tanggal'=> set_value('tanggal',$row->tanggal),
            'jml_p'      =>$jml_p,
            'id'=>$id,
        );
           $this->template->load('Welcome/halaman','lap_penerimaan/lap_penerimaan_detail', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting/group'));
        }
    }
}

/* End of file lap_penerimaan.php */
/* Location: ./application/modules/Pembelian/controllers/lap_penerimaan.php */