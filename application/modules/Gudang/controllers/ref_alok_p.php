<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ref_alok_p extends CI_Controller {

    function __construct()
    {
        parent::__construct();
         
        $this->load->model('Mref_alok_p');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
    }
	public function index()
	{
		$this->template->load('welcome/halaman','gudang/ref_alok_p/ref_alok_p_list');
	}
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mref_alok_p->json();
    }	

    public function hapus()
    {
            $response = array();
    
    if ($_POST['delete']) {
        
        
        $id = $_POST['delete'];
        $row = $this->Mref_alok_p->get_by_id($id);
        
        if ($row) {
            $this->Mref_alok_p->delete($id);
            $response['status']  = 'success';
            $response['message'] = 'Data Alokasi Pemakaian Sudah Dihapus ...';
        } else {
            $response['status']  = 'error';
            $response['message'] = 'Unable to delete product ...';
        }
        echo json_encode($response);
    }
    }
    public function table()
    {
         $this->load->view('gudang/ref_alok_p/ref_alok_p_table');
    }
    public function create() 
    {
        $data = array(
            'button'     => 'Tambah Alokasi Pemakaian',
            'action'     => site_url('gudang/ref_alok_p/create_action'),
            'kd_alok_p' => set_value('kd_alok_p'),
            'nm_alok_p' => set_value('nm_alok_p'),

	);
        $this->template->load('Welcome/halaman','ref_alok_p/ref_alok_p_form', $data);
    }
    public function create_action() 
    {

        $data = array(
		'nm_alok_p' => $this->input->post('nm_alok_p',TRUE),
	    );

            $this->Mref_alok_p->insert($data);
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Tambah Alokasi Pemakaian", "", "success")
  });

</script>');
            redirect(site_url('gudang/ref_alok_p'));
    } 
    public function update($id) 
    {
        $row = $this->Mref_alok_p->get_by_id($id);

        if ($row) {
            $data = array(
                'button'     => 'Update Referensi Alokasi Pemakaian',
                'action'     => site_url('gudang/ref_alok_p/update_action'),
            'kd_alok_p' => set_value('kd_alok_p',$row->kd_alok_p),
            'nm_alok_p' => set_value('nm_alok_p',$row->nm_alok_p),
	    );
           $this->template->load('Welcome/halaman','ref_alok_p/ref_alok_p_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting/group'));
        }
    } 
        public function update_action() 
    {
            $data = array(
				'nm_alok_p' => $this->input->post('nm_alok_p',TRUE),
	    );

            $this->Mref_alok_p->update($this->input->post('kd_alok_p', TRUE), $data);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Update Alokasi Pemakaian", "", "success")
  });

</script>');
            redirect(site_url('gudang/ref_alok_p'));
    }          
}

/* End of file gudang.php */
/* Location: ./application/modules/gudang/controllers/gudang.php */