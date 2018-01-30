<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ref_grader extends CI_Controller {

    function __construct()
    {
        parent::__construct();
         
        $this->load->model('Mref_grader');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
    }
	public function index()
	{
		$this->template->load('welcome/halaman','Pembelian/ref_grader/ref_grader_list');
	}
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mref_grader->json();
    }	
    public function create() 
    {
        $data = array(
            'button'     => 'Tambah Grader',
            'action'     => site_url('Pembelian/ref_grader/create_action'),
            'kd_grader' => set_value('kd_grader'),
            'nm_grader'=> set_value('nm_grader'),

	);
        $this->template->load('Welcome/halaman','ref_grader/ref_grader_form', $data);
    }
    public function create_action() 
    {

        $data = array('nm_grader' => $this->input->post('nm_grader',TRUE),
	    );

            $this->Mref_grader->insert($data);
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Tambah Grader", "", "success")
  });

</script>');
            redirect(site_url('Pembelian/ref_grader'));
    }
    public function delete($id) 
    {
        $row = $this->Mref_grader->get_by_id($id);

        if ($row) {
            $this->Mref_grader->delete($id);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Delete Grader", "", "success")
  });

</script>');
            redirect(site_url('Pembelian/ref_grader'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Pembelian/ref_grader'));
        }
    } 
    public function update($id) 
    {
        $row = $this->Mref_grader->get_by_id($id);

        if ($row) {
            $data = array(
                'button'     => 'Update Grader',
                'action'     => site_url('pembelian/ref_grader/update_action'),
            'kd_grader' => set_value('kd_grader',$row->kd_grader),
            'nm_grader'=> set_value('nm_grader',$row->nm_grader),
	    );
           $this->template->load('Welcome/halaman','ref_grader/ref_grader_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting/group'));
        }
    } 
        public function update_action() 
    {
            $data = array(
		'nm_grader' => $this->input->post('nm_grader',TRUE),
	    );

            $this->Mref_grader->update($this->input->post('kd_grader', TRUE), $data);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Update Grader", "", "success")
  });

</script>');
            redirect(site_url('Pembelian/ref_grader'));
    }          
}

/* End of file Pembelian.php */
/* Location: ./application/modules/Pembelian/controllers/Pembelian.php */