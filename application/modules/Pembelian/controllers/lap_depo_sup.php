<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_depo_sup extends CI_Controller {
    function __construct()
    {
        parent::__construct();
         $this->load->library('M_pdf');
        $this->load->model('Mlap_depo_sup');
        $this->load->library('form_validation');        
        $this->load->library('datatables');
    }
    public function index()
    {
        if(isset($_POST['supplier'])&&isset($_POST['date1'])&&isset($_POST['date2'])){
            $supplier      =$_POST['supplier'];
            $date1      =$_POST['date1'];
            $date2      =$_POST['date2'];
            $rk="tampil";
        }else{
            $nama_grader='';
            $supplier='';
            $date1=DATE('d/m/Y');
            $date2=DATE('d/m/Y');
            $rk =" ";
        }
        $sess=array(
                'supplier'=>$supplier,
                'date1'=>substr($this->input->post('date1',TRUE),6,4)."-".substr($this->input->post('date1',TRUE),3,2)."-".substr($this->input->post('date1',TRUE),0,2),
                'date2'=>substr($this->input->post('date2',TRUE),6,4)."-".substr($this->input->post('date2',TRUE),3,2)."-".substr($this->input->post('date2',TRUE),0,2),                
                );
        $this->session->set_userdata($sess);         
        $data = array(
            'supplier'      =>$this->Mlap_depo_sup->ListSuppliers(), 
        );
        $data['nm_supplier']=$supplier;
        $data['date1']=$date1;$data['date2']=$date2;$data['rk'] =$rk;
        $this->template->load('welcome/halaman','Pembelian/lap_depo_sup/lap_depo_sup_list',$data);        
    }
        public function list_excel(){
        $supplier=$this->session->userdata('supplier');
        $date1=$this->session->userdata('date1');
        $date2=$this->session->userdata('date2');
        $data['rk'] =$this->Mlap_depo_sup->getlist($supplier,$date1,$date2);   
        $this->load->view('Pembelian/lap_depo_sup/list_excel',$data);
    }
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mlap_depo_sup->json();
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
           $this->template->load('Welcome/halaman','lap_depo_sup/lap_depo_sup_detail', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting/group'));
        }
    }
    public function pdfbap(){
        $id=$this->session->userdata('id_bap');
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
        );}     
        $pdfFilePath = "BAP ".time().".pdf";
        $sumber = $this->load->view('lap_depo_sup/lap_depo_sup_pdf',$data,true);
        $html = $sumber;
        $this->m_pdf->pdf->AddPage('Location');  
        $this->m_pdf->pdf->WriteHTML($html);
        $this->m_pdf->pdf->Output($pdfFilePath, "D");
    }       
}

/* End of file lap_depo_sup.php */
/* Location: ./application/modules/Pembelian/controllers/lap_depo_sup.php */