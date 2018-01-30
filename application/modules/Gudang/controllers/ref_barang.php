<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ref_barang extends CI_Controller {

    function __construct()
    {
        parent::__construct();
         
        $this->load->model('Mref_barang');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
    }
	public function index()
	{
		$this->template->load('welcome/halaman','gudang/ref_barang/Ref_barang_list');
	}  
    public function stock_gudang_excel(){
        $data['rk'] =$this->Mref_barang->listBarang();   
        $this->load->view('gudang/ref_barang/ref_stock_barang_gudang_excel',$data);
    }
    public function harga_stock()
    {
        $this->template->load('welcome/halaman','gudang/ref_barang/Ref_harga_stock_list');
    }
    public function stock_barang_gudang()
    {
        if(isset($_POST['kategori'])){
            $kategori     =$_POST['kategori'];
        }else{
            $kategori='all';
        }
        $sess=array(
            'kategori'=>$kategori,                
                );
        $this->session->set_userdata($sess);         
        $data = array(
            'kategori'      =>$this->Mref_barang->ListKategori(), 
        );
        $data['kd_kategori']=$kategori;
        $this->template->load('welcome/halaman','gudang/ref_barang/ref_stock_barang_gudang_list',$data);
    }     
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mref_barang->json_barang();
    }      
    public function json_stock_barang() {
        header('Content-Type: application/json');
        echo $this->Mref_barang->json_stock();
    }   
    public function json_stock() {
        header('Content-Type: application/json');
        echo $this->Mref_barang->json_barang_stock();
    }	
    public function create() 
    {
        $data = array(
            'button'     => 'Tambah barang',
            'action'     => site_url('gudang/ref_barang/create_action'),
            'kd_barang' => set_value('kd_barang'),
            'nm_barang' => set_value('nm_barang'),
            'satuan'=> set_value('satuan'),
            'kd_kategori'=> set_value('kd_kategori'),
            'kategori'=>$this->Mref_barang->ListKategori()

	);
        $this->template->load('Welcome/halaman','ref_barang/ref_barang_form', $data);
    }
    public function create_action() 
    {

        $data = array(
		'nm_barang' => $this->input->post('nm_barang',TRUE),
		'satuan' => $this->input->post('satuan',TRUE),
		'kd_kategori' => $this->input->post('kategori',TRUE),
        'harga' => 0,
        'stock' => 0,
	    );

            $this->Mref_barang->insert($data);
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Tambah Barang", "", "success")
  });

</script>');
            redirect(site_url('gudang/ref_barang'));
    }
    public function delete($id) 
    {
        $row = $this->Mref_barang->get_by_id($id);

        if ($row) {
            $this->Mref_barang->delete($id);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Hapus Barang", "", "success")
  });

</script>');
            redirect(site_url('gudang/ref_barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gudang/ref_barang'));
        }
    } 
    public function update($id) 
    {
        $row = $this->Mref_barang->get_by_id($id);

        if ($row) {
            $data = array(
                'button'     => 'Update Referensi barang',
                'action'     => site_url('gudang/ref_barang/update_action'),
            'kd_kategori' => set_value('kd_kategori',$row->kd_kategori),
            'kd_barang' => set_value('kd_barang',$row->kd_barang),
            'nm_barang'=> set_value('nm_barang',$row->nm_barang),
            'satuan'=> set_value('satuan',$row->satuan),'kategori'=>$this->Mref_barang->ListKategori()
	    );
           $this->template->load('Welcome/halaman','ref_barang/ref_barang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting/group'));
        }
    } 
        public function update_action() 
    {
            $data = array(
				'nm_barang' => $this->input->post('nm_barang',TRUE),
		'kd_kategori' => $this->input->post('kategori',TRUE),
		'satuan' => $this->input->post('satuan',TRUE),
	    );

            $this->Mref_barang->update($this->input->post('kd_barang', TRUE), $data);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Update Barang", "", "success")
  });

</script>');
            redirect(site_url('gudang/ref_barang'));
    }          
}

/* End of file gudang.php */
/* Location: ./application/modules/gudang/controllers/gudang.php */