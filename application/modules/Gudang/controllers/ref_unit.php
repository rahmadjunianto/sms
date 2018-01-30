<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ref_unit extends CI_Controller {

    function __construct()
    {
        parent::__construct();
         
        $this->load->model('Mref_unit');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
    }
	public function index()
	{
		$this->template->load('welcome/halaman','gudang/ref_unit/Ref_unit_list');
	}
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mref_unit->json_unit();
    }	
    public function create() 
    {
        $data = array(
            'button'     => 'Tambah unit',
            'action'     => site_url('gudang/ref_unit/create_action'),
            'kd_unit' => set_value('kd_unit'),
            'nm_unit' => set_value('nm_unit'),
	);
        $this->template->load('Welcome/halaman','ref_unit/ref_unit_form', $data);
    }
    public function create_action() 
    {

        $data = array(
		'nm_unit' => $this->input->post('nm_unit',TRUE),
	    );

            $this->Mref_unit->insert($data);
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Hapus Unit", "", "success")
  });

</script>');
            redirect(site_url('gudang/ref_unit'));
    }
    public function delete($id) 
    {
        $row = $this->Mref_unit->get_by_id($id);

        if ($row) {
            $this->Mref_unit->delete($id);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Hapus Unit", "", "success")
  });

</script>');
            redirect(site_url('gudang/ref_unit'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gudang/ref_unit'));
        }
    } 
    public function update($id) 
    {
        $row = $this->Mref_unit->get_by_id($id);

        if ($row) {
            $data = array(
                'button'     => 'Update Referensi unit',
                'action'     => site_url('gudang/ref_unit/update_action'),
            'kd_unit' => set_value('kd_unit',$row->kd_unit),
            'nm_unit' => set_value('nm_unit',$row->nm_unit),
	    );
           $this->template->load('Welcome/halaman','ref_unit/ref_unit_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting/group'));
        }
    } 
        public function update_action() 
    {
            $data = array(
				'nm_unit' => $this->input->post('nm_unit',TRUE),
	    );

            $this->Mref_unit->update($this->input->post('kd_unit', TRUE), $data);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Update Unit", "", "success")
  });

</script>');
            redirect(site_url('gudang/ref_unit'));
    }          
}

/* End of file gudang.php */
/* Location: ./application/modules/gudang/controllers/gudang.php */