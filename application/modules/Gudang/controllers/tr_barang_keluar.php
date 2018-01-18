<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tr_barang_keluar extends CI_Controller {

    function __construct()
    {
        parent::__construct();
         
        $this->load->model('Mtr_barang_keluar');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
    }
	public function index()
	{
		$this->template->load('welcome/halaman','gudang/tr_barang_keluar/tr_barang_keluar_list');
	}
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mtr_barang_keluar->json_barang();
    }	
    public function create() 
    {
        $data = array(
            'button'     => 'Tambah barang keluar',
            'action'     => site_url('gudang/tr_barang_keluar/create_action'),
            'kd_barang' => set_value('kd_barang'),
            'kd_unit' => set_value('kd_unit'),
            'kd_barang_keluar' => set_value('kd_barang_keluar'),
            'jumlah' => set_value('jumlah'),
            'harga'=> set_value('harga'),
            'nama_barang'=> set_value('nama_barang'),
            'date'=> date("d/m/Y"),
            'barang'=>$this->Mtr_barang_keluar->ListBarang(),
            'unit'=>$this->Mtr_barang_keluar->ListUnit()

	);
        $this->template->load('Welcome/halaman','tr_barang_keluar/tr_barang_keluar_form', $data);
    }
    public function create_action() 
    {
        $data = array(
		'kd_barang' => $this->input->post('barang',TRUE),
		'tanggal' => substr($this->input->post('date',TRUE),6,4)."-".substr($this->input->post('date',TRUE),3,2)."-".substr($this->input->post('date',TRUE),0,2),
		'jumlah' => $this->input->post('jumlah',TRUE),
        'harga' => $this->input->post('harga',TRUE),
        'nm_barang' => $this->input->post('nm_barang',TRUE),
        'kd_unit' => $this->input->post('kd_unit',TRUE),
	    );

            $this->Mtr_barang_keluar->insert($data);
            $this->session->set_flashdata('message', '<button type="button" class="btn btn-success"> Berhasil Menambah barang Keluar</button>');
            redirect(site_url('gudang/tr_barang_keluar'));
    }
    public function delete($id) 
    {
        $row = $this->Mtr_barang_keluar->get_by_id($id);

        if ($row) {
            $this->Mtr_barang_keluar->delete($id);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<button type="button" class="btn btn-success"> Berhasil Hapus barang Keluar</button>');
            redirect(site_url('gudang/tr_barang_keluar'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gudang/tr_barang_keluar'));
        }
    } 
    public function update($id) 
    {
        $row = $this->Mtr_barang_keluar->get_by_id($id);

        if ($row) {
$tgl=substr("$row->tanggal",8,2)."/".substr("$row->tanggal",5,2)."/".substr("$row->tanggal",0,4);            
            $data = array(
                'button'     => 'Update Referensi barang',
                'action'     => site_url('gudang/tr_barang_keluar/update_action'),
            'kd_barang_keluar' => set_value('kd_barang_keluar',$row->kd_barang_keluar),
            'kd_unit' => set_value('kd_unit',$row->kd_unit),
            'kd_barang' => set_value('kd_barang',$row->kd_barang),
            'jumlah' => set_value('jumlah',$row->jumlah),
            'nama_barang'=> set_value('nm_barang',$row->nm_barang),
            'date'=> set_value('tanggal',$tgl),
            'harga'=> set_value('harga',$row->harga),'barang'=>$this->Mtr_barang_keluar->ListBarang(),
            'unit'=>$this->Mtr_barang_keluar->ListUnit()
	    );
           $this->template->load('Welcome/halaman','tr_barang_keluar/tr_barang_keluar_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting/group'));
        }
    } 
        public function update_action() 
    {
            $data = array(
		'nm_barang' => $this->input->post('nm_barang',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
        'tanggal' => substr($this->input->post('date',TRUE),6,4)."-".substr($this->input->post('date',TRUE),3,2)."-".substr($this->input->post('date',TRUE),0,2),
        'kd_barang' => $this->input->post('barang',TRUE),
        'kd_unit' => $this->input->post('kd_unit',TRUE),
	    );

            $this->Mtr_barang_keluar->update($this->input->post('kd_barang_keluar', TRUE), $data);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<button type="button" class="btn btn-success"> Berhasil Update barang Keluar</button>');
            redirect(site_url('gudang/tr_barang_keluar'));
    }          
}

/* End of file gudang.php */
/* Location: ./application/modules/gudang/controllers/gudang.php */