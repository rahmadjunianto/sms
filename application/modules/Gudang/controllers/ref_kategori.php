<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ref_kategori extends CI_Controller {

    function __construct()
    {
        parent::__construct();
         
        $this->load->model('Mref_kategori');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
    }
	public function index()
	{
		$this->template->load('welcome/halaman','gudang/ref_kategori/Ref_kategori_list');
	}
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mref_kategori->json_kategori();
    }	
    public function hapus()
    {
            $response = array();
    
    if ($_POST['delete']) {
        
        
        $id = $_POST['delete'];
        $row = $this->Mref_kategori->get_by_id($id);
        
        if ($row) {
            $this->Mref_kategori->delete($id);
            $response['status']  = 'success';
            $response['message'] = 'Data Kategori Sudah Dihapus ...';
        } else {
            $response['status']  = 'error';
            $response['message'] = 'Unable to delete product ...';
        }
        echo json_encode($response);
    }
    }
    public function table()
    {
         $this->load->view('gudang/ref_kategori/ref_kategori_table');
    }   
    public function create() 
    {
        $data = array(
            'button'     => 'Tambah kategori',
            'action'     => site_url('gudang/ref_kategori/create_action'),
            'kd_kategori' => set_value('kd_kategori'),
            'nm_kategori' => set_value('nm_kategori'),
            'inisial' => set_value('inisial'),

	);
        $this->template->load('Welcome/halaman','ref_kategori/ref_kategori_form', $data);
    }
    public function create_action() 
    {
        $row=$this->db->query("SELECT MAX(kd_kategori) AS kd_kategori FROM ref_kategori")->row();
        $kd_kategori=$row->kd_kategori+10;
        $data = array(
		'nm_kategori' => $this->input->post('nm_kategori',TRUE),
        'kd_kategori' => $kd_kategori,
        'inisial' => $this->input->post('inisial',TRUE),
	    );

            $this->Mref_kategori->insert($data);
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Tambah Kategori", "", "success")
  });

</script>');
            redirect(site_url('gudang/ref_kategori'));
    }
    public function delete($id) 
    {
        $row = $this->Mref_kategori->get_by_id($id);

        if ($row) {
            $this->Mref_kategori->delete($id);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Hapus Kategori", "", "success")
  });

</script>');
            redirect(site_url('gudang/ref_kategori'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gudang/ref_kategori'));
        }
    } 
    public function update($id) 
    {
        $row = $this->Mref_kategori->get_by_id($id);

        if ($row) {
            $data = array(
                'button'     => 'Update Referensi kategori',
                'action'     => site_url('gudang/ref_kategori/update_action'),
            'kd_kategori' => set_value('kd_kategori',$row->kd_kategori),
            'nm_kategori' => set_value('nm_kategori',$row->nm_kategori),
            'inisial' => set_value('inisial',$row->inisial),
	    );
           $this->template->load('Welcome/halaman','ref_kategori/ref_kategori_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting/group'));
        }
    } 
        public function update_action() 
    {
            $data = array(
				'nm_kategori' => $this->input->post('nm_kategori',TRUE),
                'inisial' => $this->input->post('inisial',TRUE),
	    );

            $this->Mref_kategori->update($this->input->post('kd_kategori', TRUE), $data);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Update Kategori", "", "success")
  });

</script>');
            redirect(site_url('gudang/ref_kategori'));
    }          
}

/* End of file gudang.php */
/* Location: ./application/modules/gudang/controllers/gudang.php */