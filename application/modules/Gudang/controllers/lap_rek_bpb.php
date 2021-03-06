<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class lap_rek_bpb extends CI_Controller {

    function __construct()
    {
        parent::__construct();
         
        $this->load->model('Mlap_rek_bpb');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
    }
	public function index()
	{
        if(isset($_POST['date'])){
            $date     =$_POST['date'];
            $rk="tampil";
        }else{
            $date=DATE('m/Y');
            $rk ="";
        }
        $sess=array(
                'date'=>substr($date,3,4)."-".substr($date,0,2), 
                'tahun'=>substr($date,3,4), 
                'bulan'=>substr($date,0,2), 
                );         
        $this->session->set_userdata($sess); 
        $data['date']=$date;
        $data['rk'] =$rk;
        $data['bulan']=substr($date,0,2);
        $data['tahun']=substr($date,3,4);
		$this->template->load('welcome/halaman','gudang/lap_rek_bpb/lap_rek_bpb_list',$data);
	}
      public function lap_rek_bpb_excel(){
        $data['tahun']=$this->session->userdata('tahun');
        $data['bulan']=$this->session->userdata('bulan'); 
        $this->load->view('gudang/lap_rek_bpb/lap_rek_bpb_excel',$data);
    }
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mlap_rek_bpb->json();
    }	

    public function hapus()
    {
            $response = array();
    
    if ($_POST['delete']) {
        
        
        $id = $_POST['delete'];
        $row = $this->Mlap_rek_bpb->get_by_id($id);
        
        if ($row) {
            $this->Mlap_rek_bpb->delete($id);
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
         $this->load->view('gudang/lap_rek_bpb/lap_rek_bpb_table');
    }
    public function create() 
    {
        $data = array(
            'button'     => 'Tambah Divisi',
            'action'     => site_url('gudang/lap_rek_bpb/create_action'),
            'kd_divisi' => set_value('kd_divisi'),
            'nm_divisi' => set_value('nm_divisi'),

	);
        $this->template->load('Welcome/halaman','lap_rek_bpb/lap_rek_bpb_form', $data);
    }
    public function create_action() 
    {

        $data = array(
		'nm_divisi' => $this->input->post('nm_divisi',TRUE),
	    );

            $this->Mlap_rek_bpb->insert($data);
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Tambah Divisi", "", "success")
  });

</script>');
            redirect(site_url('gudang/lap_rek_bpb'));
    } 
    public function update($id) 
    {
        $row = $this->Mlap_rek_bpb->get_by_id($id);

        if ($row) {
            $data = array(
                'button'     => 'Update Referensi Divisi',
                'action'     => site_url('gudang/lap_rek_bpb/update_action'),
            'kd_divisi' => set_value('kd_divisi',$row->kd_divisi),
            'nm_divisi' => set_value('nm_divisi',$row->nm_divisi),
	    );
           $this->template->load('Welcome/halaman','lap_rek_bpb/lap_rek_bpb_form', $data);
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

            $this->Mlap_rek_bpb->update($this->input->post('kd_divisi', TRUE), $data);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Update Divisi", "", "success")
  });

</script>');
            redirect(site_url('gudang/lap_rek_bpb'));
    }          
}

/* End of file gudang.php */
/* Location: ./application/modules/gudang/controllers/gudang.php */