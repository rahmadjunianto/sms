<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ref_lokasi_kayu extends CI_Controller {

    function __construct()
    {
        parent::__construct();
         
        $this->load->model('Mref_lokasi_kayu');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
    }
	public function index()
	{
		$this->template->load('welcome/halaman','Pembelian/ref_lokasi_kayu/ref_lokasi_kayu_list');
	}
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mref_lokasi_kayu->json();
    }	
    public function create() 
    {
        $data = array(
            'button'     => 'Tambah Lokasi Kayu',
            'action'     => site_url('Pembelian/ref_lokasi_kayu/create_action'),
            'kode_lokasi' => set_value('kode_lokasi'),
            'kecamatan'=> set_value('kecamatan'),
            'kabupaten'=> set_value('kabupaten'),

	);
        $this->template->load('Welcome/halaman','ref_lokasi_kayu/ref_lokasi_kayu_form', $data);
    }
    public function create_action() 
    {

        $data = array(
		'kecamatan' => $this->input->post('kecamatan',TRUE),
		'kabupaten' => $this->input->post('kabupaten',TRUE),
	    );

            $this->Mref_lokasi_kayu->insert($data);
            $this->session->set_flashdata('message', '<button type="button" class="btn btn-success"> Berhasil Menambah Lokasi Kayu</button>');
            redirect(site_url('Pembelian/ref_lokasi_kayu'));
    }
    public function delete($id) 
    {
        $row = $this->Mref_lokasi_kayu->get_by_id($id);

        if ($row) {
            $this->Mref_lokasi_kayu->delete($id);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<button type="button" class="btn btn-success"> Berhasil Hapus Lokasi Kayu</button>');
            redirect(site_url('Pembelian/ref_lokasi_kayu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Pembelian/ref_lokasi_kayu'));
        }
    } 
    public function update($id) 
    {
        $row = $this->Mref_lokasi_kayu->get_by_id($id);

        if ($row) {
            $data = array(
                'button'     => 'Update Referensi Lokasi Kayu',
                'action'     => site_url('pembelian/ref_lokasi_kayu/update_action'),
            'kode_lokasi' => set_value('kode_supplier',$row->kode_lokasi),
            'kecamatan'=> set_value('kecamatan',$row->kecamatan),
            'kabupaten'=> set_value('kabupaten',$row->kabupaten),
	    );
           $this->template->load('Welcome/halaman','ref_lokasi_kayu/ref_lokasi_kayu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting/group'));
        }
    } 
        public function update_action() 
    {
            $data = array(
		'kecamatan' => $this->input->post('kecamatan',TRUE),
		'kabupaten' => $this->input->post('kabupaten',TRUE),
	    );

            $this->Mref_lokasi_kayu->update($this->input->post('kode_lokasi', TRUE), $data);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<button type="button" class="btn btn-success"> Berhasil Update Lokasi Kayu</button>');
            redirect(site_url('Pembelian/ref_lokasi_kayu'));
    }          
}

/* End of file Pembelian.php */
/* Location: ./application/modules/Pembelian/controllers/Pembelian.php */