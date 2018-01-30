<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ref_panjang_kayu extends CI_Controller {

    function __construct()
    {
        parent::__construct();
         
        $this->load->model('Mref_panjang_kayu');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
    }
	public function index()
	{
		$this->template->load('welcome/halaman','Pembelian/ref_panjang_kayu/ref_panjang_kayu_list');
	}
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mref_panjang_kayu->json();
    }	
    public function create() 
    {
        $data = array(
            'button'     => 'Tambah Panjang Kayu',
            'action'     => site_url('Pembelian/ref_panjang_kayu/create_action'),
            'kode_panjang_kayu' => set_value('kode_panjang_kayu'),
            'panjang_kayu' => set_value('panjang_kayu'),
            'kelas_diameter_bawah'=> set_value('kelas_diameter_bawah'),
            'kelas_diameter_atas'=> set_value('kelas_diameter_atas'),
            'diameter'=> set_value('diameter'),
            'v'=> set_value('v'),

	);
        $this->template->load('Welcome/halaman','ref_panjang_kayu/ref_panjang_kayu_form', $data);
    }
    public function create_action() 
    {

        $data = array(
		'panjang_kayu' => $this->input->post('panjang_kayu',TRUE),
		'kd_bawah' => preg_replace("/[^0-9-]/", "", $this->input->post('kelas_diameter_bawah',TRUE)),
        'kd_atas' => preg_replace("/[^0-9-]/", "", $this->input->post('kelas_diameter_atas',TRUE)),
		'diameter' => $this->input->post('diameter',TRUE),
		'v_per_btg' => str_replace(",",".", $this->input->post('v',TRUE)),
	    );
            $this->Mref_panjang_kayu->insert($data);
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Tambah Panjang Kayu", "", "success")
  });

</script>');
            redirect(site_url('Pembelian/ref_panjang_kayu'));
    }
    public function delete($id) 
    {
        $row = $this->Mref_panjang_kayu->get_by_id($id);

        if ($row) {
            $this->Mref_panjang_kayu->delete($id);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Delete Panjang Kayu", "", "success")
  });

</script>');
            redirect(site_url('Pembelian/ref_panjang_kayu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Pembelian/ref_panjang_kayu'));
        }
    } 
    public function update($id) 
    {
        $row = $this->Mref_panjang_kayu->get_by_id($id);

        if ($row) {
            $data = array(
            'button'     => 'Update Referensi Panjang Kayu',
            'action'     => site_url('pembelian/ref_panjang_kayu/update_action'),
            'kode_panjang_kayu' => set_value('kode_panjang_kayu',$row->kode_panjang_kayu),
            'panjang_kayu' => set_value('panjang_kayu',$row->panjang_kayu),
            'kelas_diameter_atas'=> set_value('kelas_diameter_atas',$row->kd_atas),
            'kelas_diameter_bawah'=> set_value('kelas_diameter_bawah',$row->kd_bawah),
            'diameter'=> set_value('diameter',$row->diameter),
            'v'=> set_value('v',$row->v),
	    );
           $this->template->load('Welcome/halaman','ref_panjang_kayu/ref_panjang_kayu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting/group'));
        }
    } 
        public function update_action() 
    {
            $data = array(
        'panjang_kayu' => $this->input->post('panjang_kayu',TRUE),
        'kd_bawah' => preg_replace("/[^0-9-]/", "", $this->input->post('kelas_diameter_bawah',TRUE)),
        'kd_atas' => preg_replace("/[^0-9-]/", "", $this->input->post('kelas_diameter_atas',TRUE)),
        'diameter' => $this->input->post('diameter',TRUE),
        'v_per_btg' => str_replace(",",".", $this->input->post('v',TRUE)),
	    );

            $this->Mref_panjang_kayu->update($this->input->post('kode_panjang_kayu', TRUE), $data);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Update Panjang Kayur", "", "success")
  });

</script>');
            redirect(site_url('Pembelian/ref_panjang_kayu'));
    }          
}

/* End of file Pembelian.php */
/* Location: ./application/modules/Pembelian/controllers/Pembelian.php */