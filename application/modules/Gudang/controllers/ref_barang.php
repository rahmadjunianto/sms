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
    public function stock_gudang_excel($bulan,$tahun,$kd_kategori){
        $data['kd_kategori']=$kd_kategori;
        $data['bulan']=$bulan;
        $data['tahun']=$tahun;
               $this->load->view('gudang/ref_barang/ref_stock_barang_gudang_excel',$data);
    }
    public function harga_stock()
    {
        $this->template->load('welcome/halaman','gudang/ref_barang/Ref_harga_stock_list');
    }
    public function stock_barang_gudang()
    {
        if(isset($_POST['date'])&&isset($_POST['kategori'])){
            $kategori     =$_POST['kategori'];
            $date     =$_POST['date'];
            $rk="tampil";
        }else{
            $date=DATE('m/Y');
            $kategori='all';
            $rk="tampil"; 
        }
        $sess=array(
            'kategori'=>$kategori,  
         'bulan' => substr($date,0,2),
        'tahun' => substr($date,3,4),                
                );
        $this->session->set_userdata($sess);         
        $data = array(
            'kategori'      =>$this->Mref_barang->ListKategori(), 
        );
        $data['kd_kategori']=$kategori;
        $data['date']=$date;
        $data['rk']=$rk;
        $data['bulan']=substr($date,0,2);
        $data['tahun']=substr($date,3,4);
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
    public function hapus()
    {
            $response = array();
    
    if ($_POST['delete']) {
        
        
        $id = $_POST['delete'];
        $row = $this->Mref_barang->get_by_id($id);
        
        if ($row) {
            $this->Mref_barang->delete($id);
            $response['status']  = 'success';
            $response['message'] = 'Data Barang Sudah Dihapus ...';
        } else {
            $response['status']  = 'error';
            $response['message'] = 'Unable to delete product ...';
        }
        echo json_encode($response);
    }
    }
    public function table()
    {
         $this->load->view('gudang/ref_barang/ref_barang_table');
    }	
    public function create() 
    {
        $data = array(
            'button'     => 'Tambah barang',
            'action'     => site_url('gudang/ref_barang/create_action'),
            'kd_barang' => set_value('kd_barang'),
            'nm_barang' => set_value('nm_barang'),
            'satuan'=> set_value('satuan'),
            'spesifikasi'=> set_value('spesifikasi'),
            'stock_min'=> set_value('stock_min'),
            'stock_max'=> set_value('stock_max'),
            'kd_kategori'=> set_value('kd_kategori'),
            'kategori'=>$this->Mref_barang->ListKategori()

	);
        $this->template->load('Welcome/halaman','ref_barang/ref_barang_form', $data);
    }
    public function create_action() 
    {
        $kd_barang="";
        $kd_kategori=$this->input->post('kategori',TRUE);
        $row=$this->db->query("SELECT MAX(kd_barang) AS kd_barang FROM ref_barang WHERE kd_kategori=$kd_kategori")->row();
        if ($row->kd_barang!=null)
        {
        $kd_barang=$row->kd_barang+1;
        }
        else
        {
        $kd_barang=$kd_kategori."1001";
        }
        $data = array(
        'kd_barang' => $kd_barang,
        'spesifikasi' => $this->input->post('spesifikasi',TRUE),
		'nm_barang' => $this->input->post('nm_barang',TRUE),
		'satuan' => $this->input->post('satuan',TRUE),
        'stock_max' => $this->input->post('stock_max',TRUE),
        'stock_min' => $this->input->post('stock_min',TRUE),
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
            'spesifikasi' => set_value('spesifikasi',$row->spesifikasi),
            'kd_barang' => set_value('kd_barang',$row->kd_barang),
            'nm_barang'=> set_value('nm_barang',$row->nm_barang),
            'stock_min'=> set_value('stock_min',$row->stock_min),
            'stock_max'=> set_value('stock_max',$row->stock_max),
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
		'spesifikasi' => $this->input->post('spesifikasi',TRUE),
        'stock_max' => $this->input->post('stock_max',TRUE),
        'stock_min' => $this->input->post('stock_min',TRUE),
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