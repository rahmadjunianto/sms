<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ref_alok_b extends CI_Controller {

    function __construct()
    {
        parent::__construct();
         
        $this->load->model('Mref_alok_b');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
    }
	public function index()
	{
		$this->template->load('welcome/halaman','gudang/ref_alok_b/ref_alok_b_list');
	}
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mref_alok_b->json();
    }	

    public function hapus()
    {
            $response = array();
    
    if ($_POST['delete']) {
        
        
        $id = $_POST['delete'];
        $row = $this->Mref_alok_b->get_by_id($id);
        
        if ($row) {
            $this->Mref_alok_b->delete($id);
            $response['status']  = 'success';
            $response['message'] = 'Data Alokasi Biaya Sudah Dihapus ...';
        } else {
            $response['status']  = 'error';
            $response['message'] = 'Unable to delete product ...';
        }
        echo json_encode($response);
    }
    }
    public function table()
    {
         $this->load->view('gudang/ref_alok_b/ref_alok_b_table');
    }
    public function create() 
    {
        $data = array(
            'button'     => 'Tambah Alokasi Biaya',
            'action'     => site_url('gudang/ref_alok_b/create_action'),
            'kd_alok_b' => set_value('kd_alok_b'),
            'nm_alok_b' => set_value('nm_alok_b'),

	);
        $this->template->load('Welcome/halaman','ref_alok_b/ref_alok_b_form', $data);
    }
    public function create_action() 
    {

        $data = array(
		'nm_alok_b' => $this->input->post('nm_alok_b',TRUE),
	    );

            $this->Mref_alok_b->insert($data);
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Tambah Alokasi Biaya", "", "success")
  });

</script>');
            redirect(site_url('gudang/ref_alok_b'));
    } 
    public function update($id) 
    {
        $row = $this->Mref_alok_b->get_by_id($id);

        if ($row) {
            $data = array(
                'button'     => 'Update Referensi Alokasi Biaya',
                'action'     => site_url('gudang/ref_alok_b/update_action'),
            'kd_alok_b' => set_value('kd_alok_b',$row->kd_alok_b),
            'nm_alok_b' => set_value('nm_alok_b',$row->nm_alok_b),
	    );
           $this->template->load('Welcome/halaman','ref_alok_b/ref_alok_b_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting/group'));
        }
    } 
        public function update_action() 
    {
            $data = array(
				'nm_alok_b' => $this->input->post('nm_alok_b',TRUE),
	    );

            $this->Mref_alok_b->update($this->input->post('kd_alok_b', TRUE), $data);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Update Alokasi Biaya", "", "success")
  });

</script>');
            redirect(site_url('gudang/ref_alok_b'));
    }          
}

/* End of file gudang.php */
/* Location: ./application/modules/gudang/controllers/gudang.php */