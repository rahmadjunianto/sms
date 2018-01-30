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

        if(isset($_POST['date'])){
            $date     =$_POST['date'];
            $rk="tampil";
        }else{
            $date=DATE('d/m/Y');
            $rk ="tampil";
        }
        $sess=array(/*
            'date_bm'=>substr($this->input->post('date',TRUE),6,4)."-".substr($this->input->post('date',TRUE),3,2)."-".substr($this->input->post('date',TRUE),0,2),   */   
            'date' =>date("Y-m-d", strtotime(str_replace('/','-',$date)))
                ); 
        $this->session->set_userdata($sess); 
        $data['date']=$date;
        $data['rk'] =$rk;
		$this->template->load('welcome/halaman','gudang/tr_barang_masuk/tr_barang_masuk_list',$data);
	}
    public function hapus()
    {
            $response = array();
    
    if ($_POST['delete']) {
        
        
        $id = $_POST['delete'];
        $row = $this->Mtr_barang_masuk->get_by_id($id);
        
        if ($row) {
        $jumlah_masuk=$row->jumlah;
        $harga_masuk=$row->harga;
        $barang=$this->db->query("SELECT * FROM ref_barang WHERE kd_barang=$row->kd_barang")->row();
        $harga_rata=$barang->harga;
        $stock=$barang->stock;
        $jumlah=$row->jumlah;
        $stock_lama=$stock-$jumlah;
        
        if($stock_lama==0){
            $harga_rata_lama=(($harga_rata*($jumlah_masuk+$stock_lama))-($jumlah_masuk*$harga_masuk))/1;
        }
        else {
            $harga_rata_lama=(($harga_rata*($jumlah_masuk+$stock_lama))-($jumlah_masuk*$harga_masuk))/$stock_lama;
        }
        $update = array('stock'=>$stock_lama,'harga'=>$harga_rata_lama );
        $this->db->where('kd_barang', $row->kd_barang);
        $this->db->update('ref_barang', $update);
            $this->Mtr_barang_masuk->delete($id);
            $response['status']  = 'success';
            $response['message'] = 'Data Barang Masuk Sudah Dihapus ...';
        } else {
            $response['status']  = 'error';
            $response['message'] = 'Unable to delete product ...';
        }
        echo json_encode($response);
    }
    }
    public function table()
    {
         $this->load->view('gudang/tr_barang_masuk/tr_barang_masuk_table');
    }   
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mtr_barang_masuk->json_barang();
    }
    public function jsonsukses() {
        header('Content-Type: application/json');
        echo $this->Mtr_barang_masuk->json_sukses();
    }
    public function jsongagal() {
        header('Content-Type: application/json');
        echo $this->Mtr_barang_masuk->json_gagal();
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
                $t = $this->db->query("SELECT COUNT(no_faktur) no_faktur FROM tr_barang_masuk WHERE no_faktur=$temp->no_faktur AND kd_barang=$temp->kd_barang")->row();
                if($t->no_faktur==0){

                    $this->db->query("INSERT INTO tr_barang_masuk (no_faktur,kd_barang,tanggal,jumlah,harga,nm_barang) VALUES ('$temp->no_faktur','$temp->kd_barang','$temp->tanggal','$temp->jumlah','$temp->harga','$temp->nm_barang')");
                    $this->db->query("INSERT INTO tr_barang_masuk_log (no_faktur,kd_barang,tanggal,jumlah,harga,nm_barang,status,kd_pengguna) VALUES ('$temp->no_faktur','$temp->kd_barang','$temp->tanggal','$temp->jumlah','$temp->harga','$temp->nm_barang','sukses','$ku')");
                        $berhasil++;
                }
                else {
                    $this->db->query("INSERT INTO tr_barang_masuk_log (no_faktur,kd_barang,tanggal,jumlah,harga,nm_barang,status,kd_pengguna) VALUES ('$temp->no_faktur','$temp->kd_barang','$temp->tanggal','$temp->jumlah','$temp->harga','$temp->nm_barang','gagal','$ku')");
                        $gagal++;                    
                }
            }
    $notifs="<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> ".$berhasil." Data berhasil di import</div>";
    $this->session->set_flashdata('notifs',$notifs);
    $notif="<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> ".$gagal." Data gagal di import</div>";
    $this->session->set_flashdata('notif',$notif);    
        $sess=array(
                'berhasil'=>$berhasil,
                'gagal'=>$gagal,
                );
        $this->session->set_userdata($sess);      
            redirect('gudang/tr_barang_masuk/data_import');
        }
    }
        public function data_import(){

        $this->template->load('welcome/halaman','gudang/tr_barang_masuk/data_import');
    }
    public function imports()
    {
        $data = array('action' => site_url('gudang/tr_barang_masuk/importactions'), );
        $this->template->load('welcome/halaman','gudang/tr_barang_masuk/import_forms',$data);
    } 
    function importactions(){
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
                    $this->db->set('harga',$data->val($i, 7));
                    $this->db->set('kd_pengguna',$this->session->userdata('ku'));
                    $this->db->insert('tr_barang_masuk_importtemp');

            }

            $arr['record']=$baris-1;
            unlink($_FILES['fileimport']['name']);
           $this->template->load('Welcome/halaman','tr_barang_masuk/previewimports',$arr);
        }
    }}
    function prosesinsertimports($ku){
        if(!empty($ku)){
            $berhasil=0;
            $gagal=0;
            $ku=$this->session->userdata('ku');
            $temp = $this->db->query("select * from tr_barang_masuk_importtemp WHERE kd_pengguna=$ku")->result();
            foreach ($temp as $temp) {
        $t = $this->db->query("SELECT COUNT(no_faktur) no_faktur FROM tr_barang_masuk WHERE no_faktur=$temp->no_faktur AND kd_barang=$temp->kd_barang AND harga=0")->row();
                if($t->no_faktur==1){
        $jumlah_masuk   = $temp->jumlah;
        $harga_masuk    = $temp->harga;                
        $row=$this->db->query("SELECT * FROM ref_barang WHERE kd_barang=$temp->kd_barang")->row();
        if($row)
        {
            $stock=$row->stock;
            $harga_stock=$row->harga;
            $harga_rata=(($jumlah_masuk*$harga_masuk)+($stock*$harga_stock))/($jumlah_masuk+$stock);
            $stock_baru=$stock+$jumlah_masuk;
        }
        $update = array('harga' => $harga_rata ,'stock'=>$stock_baru );
        $this->db->where('kd_barang', $temp->kd_barang);
        $this->db->update('ref_barang', $update);        
                    $this->db->query("UPDATE tr_barang_masuk SET harga = '$temp->harga' WHERE no_faktur= '$temp->no_faktur' and kd_barang= '$temp->kd_barang'");
                    $this->db->query("INSERT INTO tr_barang_masuk_log (no_faktur,kd_barang,tanggal,jumlah,harga,nm_barang,status,kd_pengguna) VALUES ('$temp->no_faktur','$temp->kd_barang','$temp->tanggal','$temp->jumlah','$temp->harga','$temp->nm_barang','sukses','$ku')");
                        $berhasil++;}
                else {

                    $this->db->query("INSERT INTO tr_barang_masuk_log (no_faktur,kd_barang,tanggal,jumlah,harga,nm_barang,status,kd_pengguna) VALUES ('$temp->no_faktur','$temp->kd_barang','$temp->tanggal','$temp->jumlah','$temp->harga','$temp->nm_barang','gagal','$ku')");
                        $gagal++;

                }
            }
    $notifs="<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> ".$berhasil." Data berhasil di import</div>";
    $this->session->set_flashdata('notifs',$notifs);  
    $notif="<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> ".$gagal." Data gagal di import</div>";
    $this->session->set_flashdata('notif',$notif); 
        $sess=array(
                'berhasil'=>$berhasil,
                'gagal'=>$gagal,
                );
        $this->session->set_userdata($sess);      
            redirect('gudang/tr_barang_masuk/data_imports');
        }
    }
        public function data_imports(){

        $this->template->load('welcome/halaman','gudang/tr_barang_masuk/data_imports');
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
        $kd_barang = $this->input->post('barang',TRUE);
        $jumlah_masuk    = $this->input->post('jumlah',TRUE);
        $harga_masuk    = $this->input->post('harga',TRUE);
        $data = array(
		'kd_barang' => $this->input->post('barang',TRUE),
		'tanggal' => substr($this->input->post('date',TRUE),6,4)."-".substr($this->input->post('date',TRUE),3,2)."-".substr($this->input->post('date',TRUE),0,2),
		'jumlah' => $this->input->post('jumlah',TRUE),
        'harga' => $this->input->post('harga',TRUE),
        'no_faktur' => $this->input->post('no_faktur',TRUE),
        'nm_barang' => $this->input->post('nm_barang',TRUE),
	    );
        $row=$this->db->query("SELECT * FROM ref_barang WHERE kd_barang=$kd_barang")->row();
        if($row)
        {
            $stock=$row->stock;
            $harga_stock=$row->harga;
            $harga_rata=(($jumlah_masuk*$harga_masuk)+($stock*$harga_stock))/($jumlah_masuk+$stock);
            $stock_baru=$stock+$jumlah_masuk;
        }
        $update = array('harga' => $harga_rata ,'stock'=>$stock_baru );
        $this->db->where('kd_barang', $kd_barang);
        $this->db->update('ref_barang', $update);

            $this->Mtr_barang_masuk->insert($data);
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Tambah Barang Masuk", "", "success")
  });

</script>');
            redirect(site_url('gudang/tr_barang_masuk'));
    }
    public function delete($id) 
    {
        $row = $this->Mtr_barang_masuk->get_by_id($id);

        if ($row) {
        $jumlah_masuk=$row->jumlah;
        $harga_masuk=$row->harga;
        $barang=$this->db->query("SELECT * FROM ref_barang WHERE kd_barang=$row->kd_barang")->row();
        $harga_rata=$barang->harga;
        $stock=$barang->stock;
        $jumlah=$row->jumlah;
        $stock_lama=$stock-$jumlah;
        $harga_rata_lama=(($harga_rata*($jumlah_masuk+$stock_lama))-($jumlah_masuk*$harga_masuk))/$stock_lama;
        $update = array('stock'=>$stock_lama,'harga'=>$harga_rata_lama );
        $this->db->where('kd_barang', $row->kd_barang);
        $this->db->update('ref_barang', $update);
            $this->Mtr_barang_masuk->delete($id);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Hapus Barang Masuk", "", "success")
  });

</script>');
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
        $sess=array(
                'jumlah'=>$row->jumlah,            
                );
        $this->session->set_userdata($sess);            
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
        $kd_barang_masuk = $this->input->post('kd_barang_masuk', TRUE);
        $row=$this->db->query("SELECT * FROM tr_barang_masuk WHERE kd_barang_masuk=$kd_barang_masuk")->row();
        $jumlah_masuk=$row->jumlah;
        $harga_masuk=$row->harga;
        $stok_baru=$this->input->post('jumlah',TRUE);
        $harga_baru=$this->input->post('harga',TRUE);
        $barang=$this->db->query("SELECT * FROM ref_barang WHERE kd_barang=$row->kd_barang")->row();
        $harga_rata=$barang->harga;
        $stock=$barang->stock;
        $stock_lama=$stock-$jumlah_masuk;
        $stock_baru=$stock-$jumlah_masuk+$stok_baru;
        if ($stock_lama==0)
        {

        $harga_rata_lama=(($harga_rata*($jumlah_masuk+$stock_lama))-($jumlah_masuk*$harga_masuk))/1;
        $harga_rata_baru=($stok_baru*$harga_baru+$stock_lama*$harga_rata_lama)/($stok_baru+$stock_lama);
        } else         {
            
        $harga_rata_lama=(($harga_rata*($jumlah_masuk+$stock_lama))-($jumlah_masuk*$harga_masuk))/$stock_lama;
        $harga_rata_baru=($stok_baru*$harga_baru+$stock_lama*$harga_rata_lama)/($stok_baru+$stock_lama);
        }   
        $update = array('stock'=>$stock_baru,'harga'=>$harga_rata_baru );
        $this->db->where('kd_barang', $row->kd_barang);
        $this->db->update('ref_barang', $update);
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
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Update Barang Masuk", "", "success")
  });

</script>');
            redirect(site_url('gudang/tr_barang_masuk'));
    }          
}

/* End of file gudang.php */
/* Location: ./application/modules/gudang/controllers/gudang.php */