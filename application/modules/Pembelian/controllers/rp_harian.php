<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class rp_harian extends CI_Controller {
    function __construct()
    {
        parent::__construct();
         $this->load->library('M_pdf');
        $this->load->model('Mrp_harian');
        $this->load->library('form_validation');        
        $this->load->library('datatables');
    }
    public function index()
    {
        if(isset($_POST['date'])&&isset($_POST['jenis_kayu'])){
            $date      =$_POST['date'];
            $supplier      =$_POST['supplier'];
            $p1=$_POST['p1'];
            $p2=$_POST['p2'];
            $jenis_kayu=$_POST['jenis_kayu'];         
            $rk="tampil";
        }else{
            $date=DATE('d/m/Y');
             $supplier='';
             $p1='';
             $p2='';
             $jenis_kayu='';
            $rk =" ";
        }
        $sess=array(
                'date'=>substr($this->input->post('date',TRUE),6,4)."-".substr($this->input->post('date',TRUE),3,2)."-".substr($this->input->post('date',TRUE),0,2),
                'supplier'=>$supplier,
                'jenis_kayu'=>$jenis_kayu,
                'p1'=>$p1,
                'p2'=>$p2,
                );
        $data = array(
            'supplier'      =>$this->Mrp_harian->ListSuppliers(),
            'panjang1'      =>$this->Mrp_harian->panjang_kayu(),
            'panjang2'      =>$this->Mrp_harian->panjang_kayu(), 
        );        
        $this->session->set_userdata($sess);     
        $data['date']=$date;$data['rk'] =$rk;
        $data['nm_supplier']=$supplier;
        $data['p1']=$p1;
        $data['p2']=$p2;
        $data['jenis_kayu']=$jenis_kayu;
        $this->template->load('welcome/halaman','Pembelian/rp_harian/rp_harian_list',$data);        
    }
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mrp_harian->json();
    }
        public function detail($id,$tgl) 
    {
/*        $ku=$this->session->userdata('ku');
                $sess=array(
                'id_bap'=>$id,
                );
        $this->session->set_userdata($sess); 
        $row=$this->db->query("SELECT DISTINCT b.panjang_kayu
FROM tr_dukb a JOIN tr_dukb_detail b ON b.tr_dukb_id=a.id_dukb
WHERE a.kd_pengguna=$ku AND a.kode_supplier=$id AND a.tanggal='$tgl' AND a.status='Tervalidasi' GROUP BY b.panjang_kayu")->result();

            $data = array(
                'p'          => $row,
                'p2'          => $row,
                'id' =>$id,
                'tgl'=>$tgl
        );*/
        $data['id']=$id;
           $this->template->load('Welcome/halaman','rp_harian/rp_harian_detail', $data);
        
    }
    public function pdfrp_harian($id){
        $data = array('id' => $id );
        $pdfFilePath = "Rekap Pembayaran  ".time().".pdf";
        $sumber = $this->load->view('rp_harian/rp_harian_pdf',$data,true);
        $html = $sumber;
        $this->m_pdf->pdf->AddPage('Location');  
        $this->m_pdf->pdf->WriteHTML($html);
        $this->m_pdf->pdf->Output($pdfFilePath, "D");
    }       
}

/* End of file rp_harian.php */
/* Location: ./application/modules/Pembelian/controllers/rp_harian.php */