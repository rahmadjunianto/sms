<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan extends CI_Controller {

    function __construct()
    {
        parent::__construct();
         
        $this->load->model('M_laporan');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
    }
	public function lap_per_divisi()
	{
        if(isset($_POST['kategori'])&&isset($_POST['unit'])&&isset($_POST['date1'])&&isset($_POST['date2'])){
            $unit      =$_POST['unit'];
            $kategori      =$_POST['kategori'];
            $date1      =$_POST['date1'];
            $date2      =$_POST['date2'];
            $rk="tampil";
        }else{
            $unit='all';
            $kategori='all';
            $date1=DATE('d/m/Y');
            $date2=DATE('d/m/Y');
            $rk ="tampil";
        }
        $sess=array(
            'unit'=>$unit,
            'kategori'=>$kategori,
            'date1' =>date("Y-m-d", strtotime(str_replace('/','-',$date1))),
            'date2' =>date("Y-m-d", strtotime(str_replace('/','-',$date2)))               
                );
        $this->session->set_userdata($sess);         
        $data = array(
            'unit'      =>$this->M_laporan->ListUnit(),
            'kategori'      =>$this->M_laporan->ListKategori(), 
        );
        $data['kd_unit']=$unit;
        $data['kd_kategori']=$kategori;
        $data['date1']=$date1;$data['date2']=$date2;$data['rk'] =$rk;
		$this->template->load('welcome/halaman','gudang/laporan/laporan_per_divisi_list',$data);
	}     public function laporan_per_divisi_excel(){
        $kategori=$this->session->userdata('kategori');
        $unit=$this->session->userdata('unit');
        $date1=$this->session->userdata('date1');
        $date2=$this->session->userdata('date2');
        $data['rk'] =$this->M_laporan->getlap_divisi($kategori,$unit,$date1,$date2);   
        $this->load->view('gudang/laporan/lap_perdivisi_excel',$data);
    }
    public function lap_stock_jb()
    {
        if(isset($_POST['kategori'])&&isset($_POST['date1'])&&isset($_POST['date2'])){
            $kategori     =$_POST['kategori'];
            $date1      =$_POST['date1'];
            $date2      =$_POST['date2'];
            $rk="tampil";
        }else{
            $kategori='all';
            $date1=DATE('d/m/Y');
            $date2=DATE('d/m/Y');
            $rk ="tampil";
        }
        $sess=array(
            'kategori'=>$kategori,
            'date1' =>date("Y-m-d", strtotime(str_replace('/','-',$date1))),
            'date2' =>date("Y-m-d", strtotime(str_replace('/','-',$date2)))                 
                );
        $this->session->set_userdata($sess);         
        $data = array(
            'kategori'      =>$this->M_laporan->ListKategori(), 
        );
        $data['kd_kategori']=$kategori;
        $data['date1']=$date1;$data['date2']=$date2;$data['rk'] =$rk;
        $this->template->load('welcome/halaman','gudang/laporan/lap_stock_jb_list',$data);
    }     public function laporan_per_kategori_excel(){
        $kategori=$this->session->userdata('kategori');
        $date1=$this->session->userdata('date1');
        $date2=$this->session->userdata('date2');
        $data['rk'] =$this->M_laporan->getlap_kategori($kategori,$date1,$date2);   
        $this->load->view('gudang/laporan/lap_perkategori_excel',$data);
    }
    public function lap_per_bulan()
    {
        if(isset($_POST['date'])&&isset($_POST['kategori'])){
            $kategori     =$_POST['kategori'];
            $date     =$_POST['date'];
            $rk="tampil";
        }else{
            $date=DATE('m/Y');
            $rk ="tampil";
            $kategori='all';
        }
        $sess=array(
                'date'=>substr($date,3,4)."-".substr($date,0,2),
                'kategori'=>$kategori,        
                );         
        $data = array(
            'kategori'      =>$this->M_laporan->ListKategori(), 
        );
        $this->session->set_userdata($sess); 
        $data['date']=$date;
        $data['rk'] =$rk;
        $data['kd_kategori']=$kategori;
        $this->template->load('welcome/halaman','gudang/laporan/lap_per_bulan_list',$data);
    }     public function laporan_per_bulan_excel(){
        $date=$this->session->userdata('date');
        $kategori=$this->session->userdata('kategori');
        $data['rk'] =$this->M_laporan->getlap_bulan($kategori,$date);   
        $this->load->view('gudang/laporan/lap_perbulan_excel',$data);
    }
    public function lap_btt()
    {
        if(isset($_POST['tahun'])){
            $tahun     =$_POST['tahun'];
            $rk="tampil";
            $now=date("Y-m-d");
            $past=date('Y-m-d', strtotime('-'.$tahun.' year'));;
        }else{
            $tahun='';
            $rk ="";
            $now="";
            $past="";
        }         
        $data = array(
            'btt'      =>$this->M_laporan->Listbtt($now,$past), 
        );
        $data['tahun']=$tahun;
        $data['rk'] =$rk;
        $this->template->load('welcome/halaman','gudang/laporan/lap_btt_list',$data);
    }
    public function lap_rb()
    {
        if(isset($_POST['barang'])){
            $barang     =$_POST['barang'];
            $rk="tampil";
        }else{
            $rk ="";
            $barang='';
        }
        $sess=array(
                'barang'=>$barang,        
                );         
        $data = array(
            'barang'      =>$this->M_laporan->ListBarang(), 
        );
        $this->session->set_userdata($sess); 
        $data['rk'] =$rk;
        $data['kd_barang']=$barang;
        $data['rb'] =$this->M_laporan->Listrb($barang);
        $this->template->load('welcome/halaman','gudang/laporan/lap_rb',$data);
    }
    public function harga_stock()
    {
        $this->template->load('welcome/halaman','gudang/ref_laporan/Ref_harga_stock_list');
    }    
    public function json() {
        header('Content-Type: application/json');
        echo $this->M_laporan->json_lap_per_divisi();
    }    
    public function json_kategori() {
        header('Content-Type: application/json');
        echo $this->M_laporan->json_lap_per_kategori();
    }     
    public function json_bulan() {
        header('Content-Type: application/json');
        echo $this->M_laporan->json_lap_per_bulan();
    }    
    public function json_stock() {
        header('Content-Type: application/json');
        echo $this->Mref_laporan->json_laporan_stock();
    }   
    public function json_rb() {
        header('Content-Type: application/json');
        echo $this->M_laporan->json_rb();
    }	
    public function create() 
    {
        $data = array(
            'button'     => 'Tambah laporan',
            'action'     => site_url('gudang/ref_laporan/create_action'),
            'kd_laporan' => set_value('kd_laporan'),
            'nm_laporan' => set_value('nm_laporan'),
            'satuan'=> set_value('satuan'),
            'kd_kategori'=> set_value('kd_kategori'),
            'kategori'=>$this->Mref_laporan->ListKategori()

	);
        $this->template->load('Welcome/halaman','ref_laporan/ref_laporan_form', $data);
    }
    public function create_action() 
    {

        $data = array(
		'nm_laporan' => $this->input->post('nm_laporan',TRUE),
		'satuan' => $this->input->post('satuan',TRUE),
		'kd_kategori' => $this->input->post('kategori',TRUE),
        'harga' => 0,
        'stock' => 0,
	    );

            $this->Mref_laporan->insert($data);
            $this->session->set_flashdata('message', '<button type="button" class="btn btn-success"> Berhasil Menambah laporan</button>');
            redirect(site_url('gudang/ref_laporan'));
    }
    public function delete($id) 
    {
        $row = $this->Mref_laporan->get_by_id($id);

        if ($row) {
            $this->Mref_laporan->delete($id);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<button type="button" class="btn btn-success"> Berhasil Hapus laporan</button>');
            redirect(site_url('gudang/ref_laporan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gudang/ref_laporan'));
        }
    } 
    public function update($id) 
    {
        $row = $this->Mref_laporan->get_by_id($id);

        if ($row) {
            $data = array(
                'button'     => 'Update Referensi laporan',
                'action'     => site_url('gudang/ref_laporan/update_action'),
            'kd_kategori' => set_value('kd_kategori',$row->kd_kategori),
            'kd_laporan' => set_value('kd_laporan',$row->kd_laporan),
            'nm_laporan'=> set_value('nm_laporan',$row->nm_laporan),
            'satuan'=> set_value('satuan',$row->satuan),'kategori'=>$this->Mref_laporan->ListKategori()
	    );
           $this->template->load('Welcome/halaman','ref_laporan/ref_laporan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting/group'));
        }
    } 
        public function update_action() 
    {
            $data = array(
				'nm_laporan' => $this->input->post('nm_laporan',TRUE),
		'kd_kategori' => $this->input->post('kategori',TRUE),
		'satuan' => $this->input->post('satuan',TRUE),
	    );

            $this->Mref_laporan->update($this->input->post('kd_laporan', TRUE), $data);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<button type="button" class="btn btn-success"> Berhasil Update laporan</button>');
            redirect(site_url('gudang/ref_laporan'));
    }          
}

/* End of file gudang.php */
/* Location: ./application/modules/gudang/controllers/gudang.php */