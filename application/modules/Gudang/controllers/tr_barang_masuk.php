<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tr_barang_masuk extends CI_Controller {

    function __construct()
    {
        parent::__construct();
         
        $this->load->model('Mtr_barang_masuk');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
    }
	public function index()
	{
		$this->template->load('welcome/halaman','gudang/tr_barang_masuk/tr_barang_masuk_list');
	}
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mtr_barang_masuk->json_barang();
    }
    public function jsonsukses() {
        header('Content-Type: application/json');
        echo $this->Mtr_barang_masuk->json_sukses();
    }
    public function import()
    {
        $data = array('action' => site_url('gudang/tr_barang_masuk/importaction'), );
        $this->template->load('welcome/halaman','gudang/tr_barang_masuk/import_form',$data);
    } 
    function importaction(){
        // $this->load->library('excel_reader');
        include_once ( APPPATH."libraries/Excel_reader.php");
        if(!empty($_FILES['fileimport']['name']) && !empty($_FILES['fileimport']['tmp_name'])){ 
             $target = basename($_FILES['fileimport']['name']) ;
             move_uploaded_file($_FILES['fileimport']['tmp_name'], $target);

              chmod($_FILES['fileimport']['name'],0777);
              $data  = new Spreadsheet_Excel_Reader($_FILES['fileimport']['name'],false);
              $baris = $data->rowcount($sheet_index=0);
              $no    =1;
              // $dataimort['tp']=array(
              if ($baris>=10002) {
                $notif="<div class='alert alert-warning'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> Import Data Maximal 10.000</div>";
                $this->session->set_flashdata('notif',$notif);
                redirect('gudang/tr_barang_masuk/import');
        }
            elseif($baris<=10001) {              
              $this->db->query("DELETE FROM tr_barang_masuk_importtemp WHERE kd_pengguna='".$this->session->userdata('ku')."'");
              $this->db->query("DELETE FROM tr_barang_masuk_log WHERE kd_pengguna='".$this->session->userdata('ku')."'");
            for($i=2; $i<=$baris; $i++){

                // echo $data->val($i,2);
                    
                    $this->db->set('tanggal',substr($data->val($i, 2),6,4)."-".substr($data->val($i, 2),0,2)."-".substr($data->val($i, 2),3,2));
                    $this->db->set('no_faktur',$data->val($i, 3));
                    $this->db->set('kd_barang',$data->val($i,4));
                    $this->db->set('nm_barang',$data->val($i, 5));
                    $this->db->set('jumlah',$data->val($i, 6));
                    $this->db->set('kd_pengguna',$this->session->userdata('ku'));
                    $this->db->insert('tr_barang_masuk_importtemp');

            }

            $arr['record']=$baris-1;
            unlink($_FILES['fileimport']['name']);
           $this->template->load('Welcome/halaman','tr_barang_masuk/previewimport',$arr);
        }
    }}
    function prosesinsertimport($ku){
        if(!empty($ku)){
            $berhasil=0;
            $ku=$this->session->userdata('ku');
            $temp = $this->db->query("select * from tr_barang_masuk_importtemp WHERE kd_pengguna=$ku")->result();
            foreach ($temp as $temp) {

                    $this->db->query("INSERT INTO tr_barang_masuk (no_faktur,kd_barang,tanggal,jumlah,harga,nm_barang) VALUES ('$temp->no_faktur','$temp->kd_barang','$temp->tanggal','$temp->jumlah','$temp->harga','$temp->nm_barang')");
                    $this->db->query("INSERT INTO tr_barang_masuk_log (no_faktur,kd_barang,tanggal,jumlah,harga,nm_barang,status,kd_pengguna) VALUES ('$temp->no_faktur','$temp->kd_barang','$temp->tanggal','$temp->jumlah','$temp->harga','$temp->nm_barang','sukses','$ku')");
                        $berhasil++;
                
            }
    $notifs="<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> ".$berhasil." Data berhasil di import</div>";
    $this->session->set_flashdata('notifs',$notifs);  
        $sess=array(
                'berhasil'=>$berhasil,
                );
        $this->session->set_userdata($sess);      
            redirect('gudang/tr_barang_masuk/data_import');
        }
    }
        public function data_import(){

        $this->template->load('welcome/halaman','gudang/tr_barang_masuk/data_import');
    } 
    public function create() 
    {
        $data = array(
            'button'     => 'Tambah barang Masuk',
            'action'     => site_url('gudang/tr_barang_masuk/create_action'),
            'kd_barang' => set_value('kd_barang'),
            'kd_barang_masuk' => set_value('kd_barang_masuk'),
            'jumlah' => set_value('jumlah'),
            'harga'=> set_value('harga'),
            'no_faktur'=> set_value('no_faktur'),
            'nama_barang'=> set_value('nama_barang'),
            'date'=> date("d/m/Y"),
            'barang'=>$this->Mtr_barang_masuk->ListBarang()

	);
        $this->template->load('Welcome/halaman','tr_barang_masuk/tr_barang_masuk_form', $data);
    }
    public function create_action() 
    {
        $data = array(
		'kd_barang' => $this->input->post('barang',TRUE),
		'tanggal' => substr($this->input->post('date',TRUE),6,4)."-".substr($this->input->post('date',TRUE),3,2)."-".substr($this->input->post('date',TRUE),0,2),
		'jumlah' => $this->input->post('jumlah',TRUE),
        'harga' => $this->input->post('harga',TRUE),
        'no_faktur' => $this->input->post('no_faktur',TRUE),
        'nm_barang' => $this->input->post('nm_barang',TRUE),
	    );

            $this->Mtr_barang_masuk->insert($data);
            $this->session->set_flashdata('message', '<button type="button" class="btn btn-success"> Berhasil Menambah barang Masuk</button>');
            redirect(site_url('gudang/tr_barang_masuk'));
    }
    public function delete($id) 
    {
        $row = $this->Mtr_barang_masuk->get_by_id($id);

        if ($row) {
            $this->Mtr_barang_masuk->delete($id);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<button type="button" class="btn btn-success"> Berhasil Hapus barang Masuk</button>');
            redirect(site_url('gudang/tr_barang_masuk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gudang/tr_barang_masuk'));
        }
    } 
    public function update($id) 
    {
        $row = $this->Mtr_barang_masuk->get_by_id($id);

        if ($row) {
$tgl=substr("$row->tanggal",8,2)."/".substr("$row->tanggal",5,2)."/".substr("$row->tanggal",0,4);            
            $data = array(
                'button'     => 'Update Referensi barang',
                'action'     => site_url('gudang/tr_barang_masuk/update_action'),
            'kd_barang_masuk' => set_value('kd_barang_masuk',$row->kd_barang_masuk),
            'kd_barang' => set_value('kd_barang',$row->kd_barang),
            'jumlah' => set_value('jumlah',$row->jumlah),
            'no_faktur' => set_value('no_faktur',$row->no_faktur),
            'nama_barang'=> set_value('nm_barang',$row->nm_barang),
            'date'=> set_value('tanggal',$tgl),
            'harga'=> set_value('harga',$row->harga),'barang'=>$this->Mtr_barang_masuk->ListBarang()
	    );
           $this->template->load('Welcome/halaman','tr_barang_masuk/tr_barang_masuk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting/group'));
        }
    } 
        public function update_action() 
    {
            $data = array(
		'nm_barang' => $this->input->post('nm_barang',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
        'no_faktur' => $this->input->post('no_faktur',TRUE),
        'tanggal' => substr($this->input->post('date',TRUE),6,4)."-".substr($this->input->post('date',TRUE),3,2)."-".substr($this->input->post('date',TRUE),0,2),
        'kd_barang' => $this->input->post('barang',TRUE),
	    );

            $this->Mtr_barang_masuk->update($this->input->post('kd_barang_masuk', TRUE), $data);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<button type="button" class="btn btn-success"> Berhasil Update barang Masuk</button>');
            redirect(site_url('gudang/tr_barang_masuk'));
    }          
}

/* End of file gudang.php */
/* Location: ./application/modules/gudang/controllers/gudang.php */