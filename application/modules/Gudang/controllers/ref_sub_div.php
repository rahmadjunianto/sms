<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ref_sub_div extends CI_Controller {

    function __construct()
    {
        parent::__construct();
         
        $this->load->model('Mref_sub_div');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
    }
	public function index()
	{
		$this->template->load('welcome/halaman','gudang/ref_sub_div/ref_sub_div_list');
	}
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mref_sub_div->json();
    }	

    public function hapus()
    {
            $response = array();
    
    if ($_POST['delete']) {
        
        
        $id = $_POST['delete'];
        $row = $this->Mref_sub_div->get_by_id($id);
        
        if ($row) {
            $this->Mref_sub_div->delete($id);
            $response['status']  = 'success';
            $response['message'] = 'Data Sub Divisi Sudah Dihapus ...';
        } else {
            $response['status']  = 'error';
            $response['message'] = 'Unable to delete product ...';
        }
        echo json_encode($response);
    }
    }
    public function table()
    {
         $this->load->view('gudang/ref_sub_div/ref_sub_div_table');
    }
    public function create() 
    {
        $data = array(
            'button'     => 'Tambah Sub Divisi',
            'action'     => site_url('gudang/ref_sub_div/create_action'),
            'kd_sub_div' => set_value('kd_sub_div'),
            'nm_sub_div' => set_value('nm_sub_div'),
            'kd_divisi' => set_value('kd_divisi'),
            'divisi'=>$this->Mref_sub_div->ListTable('ref_divisi','nm_divisi')

	);
        $this->template->load('Welcome/halaman','ref_sub_div/ref_sub_div_form', $data);
    }
    public function create_action() 
    {

        $data = array(
		'nm_sub_div' => $this->input->post('nm_sub_div',TRUE),
        'kd_divisi' => $this->input->post('divisi',TRUE),
	    );

            $this->Mref_sub_div->insert($data);
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Tambah Sub Divisi", "", "success")
  });

</script>');
            redirect(site_url('gudang/ref_sub_div'));
    } 
    public function update($id) 
    {
        $row = $this->Mref_sub_div->get_by_id($id);

        if ($row) {
            $data = array(
                'button'     => 'Update Referensi Sub Divisi',
                'action'     => site_url('gudang/ref_sub_div/update_action'),
            'kd_sub_div' => set_value('kd_sub_div',$row->kd_sub_div),
            'nm_sub_div' => set_value('nm_sub_div',$row->nm_sub_div),
            'kd_divisi' => set_value('kd_divisi',$row->kd_divisi),
            'divisi'=>$this->Mref_sub_div->ListTable('ref_divisi','nm_divisi')
	    );
           $this->template->load('Welcome/halaman','ref_sub_div/ref_sub_div_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting/group'));
        }
    } 
        public function update_action() 
    {
            $data = array(
				'nm_sub_div' => $this->input->post('nm_sub_div',TRUE),
                'kd_divisi' => $this->input->post('divisi',TRUE),
	    );

            $this->Mref_sub_div->update($this->input->post('kd_sub_div', TRUE), $data);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Update Sub Divisi", "", "success")
  });

</script>');
            redirect(site_url('gudang/ref_sub_div'));
    }          
}

/* End of file gudang.php */
/* Location: ./application/modules/gudang/controllers/gudang.php */