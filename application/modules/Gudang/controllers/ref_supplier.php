<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ref_supplier extends CI_Controller {

    function __construct()
    {
        parent::__construct();
         
        $this->load->model('Mref_supplier');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
    }
	public function index()
	{
		$this->template->load('welcome/halaman','gudang/ref_supplier/Ref_supplier_list');
	}
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mref_supplier->json_supplier();
    }	
    public function create() 
    {
        $data = array(
            'button'     => 'Tambah Supplier',
            'action'     => site_url('gudang/ref_supplier/create_action'),
            'kode_supplier' => set_value('kode_supplier'),
            'nama_supplier' => set_value('nama_supplier'),
            'email'=> set_value('email'),
            'hp'=> set_value('hp'),
            'kecamatan'=> set_value('kecamatan'),
            'kabupaten'=> set_value('kabupaten'),
            'alamat'=> set_value('alamat'),

	);
        $this->template->load('Welcome/halaman','ref_supplier/ref_supplier_form', $data);
    }
    public function create_action() 
    {

        $data = array(
		'nama_supplier' => $this->input->post('nama_supplier',TRUE),
		'email' => $this->input->post('email',TRUE),
		'hp' => $this->input->post('hp',TRUE),
		'kecamatan' => $this->input->post('kecamatan',TRUE),
		'kabupaten' => $this->input->post('kabupaten',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
	    );

            $this->Mref_supplier->insert($data);
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Tambah Supplier", "", "success")
  });

</script>');
            redirect(site_url('gudang/ref_supplier'));
    }
    public function delete($id) 
    {
        $row = $this->Mref_supplier->get_by_id($id);

        if ($row) {
            $this->Mref_supplier->delete($id);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Hapus Supplier", "", "success")
  });

</script>');
            redirect(site_url('gudang/ref_supplier'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gudang/ref_supplier'));
        }
    } 
    public function update($id) 
    {
        $row = $this->Mref_supplier->get_by_id($id);

        if ($row) {
            $data = array(
                'button'     => 'Update Referensi Supplier',
                'action'     => site_url('gudang/ref_supplier/update_action'),
            'kode_supplier' => set_value('kode_supplier',$row->kode_supplier),
            'nama_supplier' => set_value('nama_supplier',$row->nama_supplier),
            'email'=> set_value('email',$row->email),
            'hp'=> set_value('hp',$row->hp),
            'kecamatan'=> set_value('kecamatan',$row->kecamatan),
            'kabupaten'=> set_value('kabupaten',$row->kabupaten),
            'alamat'=> set_value('alamat',$row->alamat),
	    );
           $this->template->load('Welcome/halaman','ref_supplier/ref_supplier_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting/group'));
        }
    } 
        public function update_action() 
    {
            $data = array(
				'nama_supplier' => $this->input->post('nama_supplier',TRUE),
		'email' => $this->input->post('email',TRUE),
		'hp' => $this->input->post('hp',TRUE),
		'kecamatan' => $this->input->post('kecamatan',TRUE),
		'kabupaten' => $this->input->post('kabupaten',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
	    );

            $this->Mref_supplier->update($this->input->post('kode_supplier', TRUE), $data);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Update Supplier", "", "success")
  });

</script>');
            redirect(site_url('gudang/ref_supplier'));
    }          
}

/* End of file gudang.php */
/* Location: ./application/modules/gudang/controllers/gudang.php */