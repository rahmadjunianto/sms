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
        if(isset($_POST['unit'])&&isset($_POST['date1'])&&isset($_POST['date2'])){
            $unit      =$_POST['unit'];
            $date1      =$_POST['date1'];
            $date2      =$_POST['date2'];
            $rk="tampil";
        }else{
            $unit='';
            $date1=DATE('d/m/Y');
            $date2=DATE('d/m/Y');
            $rk =" ";
        }
        $sess=array(
                'unit'=>$unit,
                'date1'=>substr($this->input->post('date1',TRUE),6,4)."-".substr($this->input->post('date1',TRUE),3,2)."-".substr($this->input->post('date1',TRUE),0,2),
                'date2'=>substr($this->input->post('date2',TRUE),6,4)."-".substr($this->input->post('date2',TRUE),3,2)."-".substr($this->input->post('date2',TRUE),0,2),                
                );
        $this->session->set_userdata($sess);         
        $data = array(
            'unit'      =>$this->M_laporan->ListUnit(), 
        );
        $data['kd_unit']=$unit;
        $data['date1']=$date1;$data['date2']=$date2;$data['rk'] =$rk;
		$this->template->load('welcome/halaman','gudang/laporan/laporan_per_divisi_list',$data);
	}
    public function harga_stock()
    {
        $this->template->load('welcome/halaman','gudang/ref_laporan/Ref_harga_stock_list');
    }    
    public function json() {
        header('Content-Type: application/json');
        echo $this->M_laporan->json_lap_per_divisi();
    }    
    public function json_stock() {
        header('Content-Type: application/json');
        echo $this->Mref_laporan->json_laporan_stock();
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