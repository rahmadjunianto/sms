<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class rp extends CI_Controller {
    function __construct()
    {
        parent::__construct();
         $this->load->library('M_pdf');
        $this->load->model('Mrp');
        $this->load->library('form_validation');        
        $this->load->library('datatables');$this->load->model('Mrp_harian');
    }
    public function index()
    {
        if(isset($_POST['date1'])&&isset($_POST['date2'])){
            $date1      =$_POST['date1'];
            $date2      =$_POST['date2'];
            $p1=$_POST['p1'];
            $p2=$_POST['p2'];
            $jenis_kayu=$_POST['jenis_kayu'];              
            $rk="tampil";
        }else{
            $date1=DATE('d/m/Y');
            $date2=DATE('d/m/Y');
            $p1='';
            $p2='';
            $jenis_kayu='';              
            $rk =" ";
        }
        $sess=array(
                'date1'=>substr($this->input->post('date1',TRUE),6,4)."-".substr($this->input->post('date1',TRUE),3,2)."-".substr($this->input->post('date1',TRUE),0,2),
                'date2'=>substr($this->input->post('date2',TRUE),6,4)."-".substr($this->input->post('date2',TRUE),3,2)."-".substr($this->input->post('date2',TRUE),0,2),  
                'jenis_kayu'=>$jenis_kayu,
                'p1'=>$p1,
                'p2'=>$p2,                              
                );
        $data = array(
            'panjang1'      =>$this->Mrp_harian->panjang_kayu(),
            'panjang2'      =>$this->Mrp_harian->panjang_kayu(), 
        );             
        $this->session->set_userdata($sess);     
        $data['date1']=$date1;
        $data['date2']=$date2;
        $data['p1']=$p1;
        $data['p2']=$p2;
        $data['jenis_kayu']=$jenis_kayu;        
        $data['rk'] =$rk;
        $this->template->load('welcome/halaman','Pembelian/rp/rp_list',$data);        
    }
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mrp->json();
    }
        public function detail($id) 
    {
        $ku=$this->session->userdata('ku');
                $sess=array(
                'id_bap'=>$id,
                );
        $this->session->set_userdata($sess); 
        $row=$this->db->query("SELECT DISTINCT b.panjang_kayu
FROM tr_dukb a JOIN tr_dukb_detail b ON b.tr_dukb_id=a.id_dukb
WHERE a.kd_pengguna=$ku AND a.kode_supplier=$id AND a.tanggal='$tgl' AND a.status='Tervalidasi' GROUP BY b.panjang_kayu")->result();

            $data = array(
                'id'          => $id
        );
           $this->template->load('Welcome/halaman','rp/rp_detail', $data);
        
    }
        public function pdfrp($id){
        $data = array('id' => $id );
        $pdfFilePath = "Rekap Pembayaran  ".time().".pdf";
        $sumber = $this->load->view('rp/rp_pdf',$data,true);
        $html = $sumber;
        $this->m_pdf->pdf->AddPage('Location');  
        $this->m_pdf->pdf->WriteHTML($html);
        $this->m_pdf->pdf->Output($pdfFilePath, "D");
    } 
}

/* End of file rp.php */
/* Location: ./application/modules/Pembelian/controllers/rp.php */