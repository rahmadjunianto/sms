<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_pembayaran extends CI_Controller {
    function __construct()
    {
        parent::__construct();
         $this->load->library('M_pdf');
        $this->load->model('Mlap_pembayaran');
        $this->load->library('form_validation');        
        $this->load->library('datatables');
    }
    public function index()
    {
        if(isset($_POST['nama_grader'])&&isset($_POST['supplier'])&&isset($_POST['date'])){
            $nama_grader      =$_POST['nama_grader'];
            $supplier      =$_POST['supplier'];
            $date      =$_POST['date'];
            $rk="tampil";
        }else{
            $nama_grader='';
            $supplier='';
            $date=DATE('d/m/Y');
            $rk =" ";
        }
        $sess=array(
                'nama_grader'=>$nama_grader,
                'supplier'=>$supplier,
                'date'=>substr($this->input->post('date',TRUE),6,4)."-".substr($this->input->post('date',TRUE),3,2)."-".substr($this->input->post('date',TRUE),0,2),
                );
        $this->session->set_userdata($sess);         
        $data = array(
            'grader'      =>$this->Mlap_pembayaran->ListGrader(),
            'supplier'      =>$this->Mlap_pembayaran->ListSuppliers(), 
        );
        $data['nama_grader']=$nama_grader;
        $data['nm_supplier']=$supplier;
        $data['date']=$date;$data['rk'] =$rk;
        $this->template->load('welcome/halaman','Pembelian/lap_pembayaran/lap_pembayaran_list',$data);        
    }
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mlap_pembayaran->json();
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
           $this->template->load('Welcome/halaman','lap_pembayaran/lap_pembayaran_detail', $data);
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
        $pdfFilePath = "Laporan Pembayaran ".time().".pdf";
        $sumber = $this->load->view('lap_pembayaran/lap_pembayaran_pdf',$data,true);
        $html = $sumber;
        $this->m_pdf->pdf->AddPage('Location');  
        $this->m_pdf->pdf->WriteHTML($html);
        $this->m_pdf->pdf->Output($pdfFilePath, "D");
    }       
}

/* End of file lap_pembayaran.php */
/* Location: ./application/modules/Pembelian/controllers/lap_pembayaran.php */