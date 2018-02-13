<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class rekap_pb extends CI_Controller {

    function __construct()
    {
        parent::__construct();
         
        $this->load->model('Mrekap_pb');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
    }
	public function index()
	{
        if(isset($_POST['date'])&&isset($_POST['kategori'])){
            $kategori     =$_POST['kategori'];
            $date     =$_POST['date'];
            $rk="tampil";
        }else{
            $date=DATE('m/Y');
            $rk ="tampil";
            $kategori='all';
        }
        $sess=array(
                'date'=>substr($date,3,4)."-".substr($date,0,2), 
                'tahun'=>substr($date,3,4), 
                'bulan'=>substr($date,0,2), 
                'kd_kategori'=>$kategori,  
                );         
        $this->session->set_userdata($sess);      
        $data = array(
            'kategori'      =>$this->Mrekap_pb->ListKategori(), 
        );
        $data['date']=$date;
        $data['rk'] =$rk;
        $data['kd_kategori']=$kategori;
		$this->template->load('welcome/halaman','gudang/rekap_pb/rekap_pb_list',$data);
	}
      public function rekap_pb_excel(){
        $tahun=$this->session->userdata('tahun');
        $bulan=$this->session->userdata('bulan');
        $kd_kategori=$this->session->userdata('kd_kategori');
        $data['kd_kategori']=$this->session->userdata('kd_kategori');
        $data['rk'] =$this->Mrekap_pb->getlap($tahun,$bulan,$kd_kategori);   
        $this->load->view('gudang/rekap_pb/rekap_pb_excel',$data);
    }
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mrekap_pb->json();
    }	

    public function hapus()
    {
            $response = array();
    
    if ($_POST['delete']) {
        
        
        $id = $_POST['delete'];
        $row = $this->Mrekap_pb->get_by_id($id);
        
        if ($row) {
            $this->Mrekap_pb->delete($id);
            $response['status']  = 'success';
            $response['message'] = 'Data Supplier Sudah Dihapus ...';
        } else {
            $response['status']  = 'error';
            $response['message'] = 'Unable to delete product ...';
        }
        echo json_encode($response);
    }
    }
    public function table()
    {
         $this->load->view('gudang/rekap_pb/rekap_pb_table');
    }
    public function create() 
    {
        $data = array(
            'button'     => 'Tambah Supplier',
            'action'     => site_url('gudang/rekap_pb/create_action'),
            'kode_supplier' => set_value('kode_supplier'),
            'nama_supplier' => set_value('nama_supplier'),
            'email'=> set_value('email'),
            'hp'=> set_value('hp'),
            'kecamatan'=> set_value('kecamatan'),
            'kabupaten'=> set_value('kabupaten'),
            'alamat'=> set_value('alamat'),

	);
        $this->template->load('Welcome/halaman','rekap_pb/rekap_pb_form', $data);
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

            $this->Mrekap_pb->insert($data);
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Tambah Supplier", "", "success")
  });

</script>');
            redirect(site_url('gudang/rekap_pb'));
    } 
    public function update($id) 
    {
        $row = $this->Mrekap_pb->get_by_id($id);

        if ($row) {
            $data = array(
                'button'     => 'Update Referensi Supplier',
                'action'     => site_url('gudang/rekap_pb/update_action'),
            'kode_supplier' => set_value('kode_supplier',$row->kode_supplier),
            'nama_supplier' => set_value('nama_supplier',$row->nama_supplier),
            'email'=> set_value('email',$row->email),
            'hp'=> set_value('hp',$row->hp),
            'kecamatan'=> set_value('kecamatan',$row->kecamatan),
            'kabupaten'=> set_value('kabupaten',$row->kabupaten),
            'alamat'=> set_value('alamat',$row->alamat),
	    );
           $this->template->load('Welcome/halaman','rekap_pb/rekap_pb_form', $data);
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

            $this->Mrekap_pb->update($this->input->post('kode_supplier', TRUE), $data);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Update Supplier", "", "success")
  });

</script>');
            redirect(site_url('gudang/rekap_pb'));
    }          
}

/* End of file gudang.php */
/* Location: ./application/modules/gudang/controllers/gudang.php */