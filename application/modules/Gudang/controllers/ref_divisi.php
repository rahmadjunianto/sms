<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ref_divisi extends CI_Controller {

    function __construct()
    {
        parent::__construct();
         
        $this->load->model('Mref_divisi');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
    }
	public function index()
	{
		$this->template->load('welcome/halaman','gudang/ref_divisi/ref_divisi_list');
	}
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mref_divisi->json();
    }	

    public function hapus()
    {
            $response = array();
    
    if ($_POST['delete']) {
        
        
        $id = $_POST['delete'];
        $row = $this->Mref_divisi->get_by_id($id);
        
        if ($row) {
            $this->Mref_divisi->delete($id);
            $response['status']  = 'success';
            $response['message'] = 'Data Divisi Sudah Dihapus ...';
        } else {
            $response['status']  = 'error';
            $response['message'] = 'Unable to delete product ...';
        }
        echo json_encode($response);
    }
    }
    public function table()
    {
         $this->load->view('gudang/ref_divisi/ref_divisi_table');
    }
    public function create() 
    {
        $data = array(
            'button'     => 'Tambah Divisi',
            'action'     => site_url('gudang/ref_divisi/create_action'),
            'kd_divisi' => set_value('kd_divisi'),
            'nm_divisi' => set_value('nm_divisi'),

	);
        $this->template->load('Welcome/halaman','ref_divisi/ref_divisi_form', $data);
    }
    public function create_action() 
    {

        $data = array(
		'nm_divisi' => $this->input->post('nm_divisi',TRUE),
	    );

            $this->Mref_divisi->insert($data);
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Tambah Divisi", "", "success")
  });

</script>');
            redirect(site_url('gudang/ref_divisi'));
    } 
    public function update($id) 
    {
        $row = $this->Mref_divisi->get_by_id($id);

        if ($row) {
            $data = array(
                'button'     => 'Update Referensi Divisi',
                'action'     => site_url('gudang/ref_divisi/update_action'),
            'kd_divisi' => set_value('kd_divisi',$row->kd_divisi),
            'nm_divisi' => set_value('nm_divisi',$row->nm_divisi),
	    );
           $this->template->load('Welcome/halaman','ref_divisi/ref_divisi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting/group'));
        }
    } 
        public function update_action() 
    {
            $data = array(
				'nm_divisi' => $this->input->post('nm_divisi',TRUE),
	    );

            $this->Mref_divisi->update($this->input->post('kd_divisi', TRUE), $data);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Update Divisi", "", "success")
  });

</script>');
            redirect(site_url('gudang/ref_divisi'));
    }          
}

/* End of file gudang.php */
/* Location: ./application/modules/gudang/controllers/gudang.php */