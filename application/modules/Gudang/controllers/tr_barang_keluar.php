<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tr_barang_keluar extends CI_Controller {

    function __construct()
    {
        parent::__construct();
         
        $this->load->model('Mtr_barang_keluar');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
    }
    function getsubdiv(){
        $divisi=$_POST['divisi'];
        
        //$data['parent']=$parent;
        $data['kc']=$this->db->query("SELECT * FROM ref_sub_div WHERE kd_divisi ='$divisi' order by kd_sub_div asc")->result();
        // print_r($data);
        $this->load->view('tr_barang_keluar/getsubdiv',$data);
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
        $sess=array( 
            'date' =>date("Y-m-d", strtotime(str_replace('/','-',$date)))     
                ); 
        $this->session->set_userdata($sess); 
        $data['date']=$date;
        $data['rk'] =$rk;
		$this->template->load('welcome/halaman','gudang/tr_barang_keluar/tr_barang_keluar_list',$data);
	}
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mtr_barang_keluar->json_barang();
    }
    public function hapus()
    {
            $response = array();
    
    if ($_POST['delete']) {
        
        
        $id = $_POST['delete'];
        $row = $this->Mtr_barang_keluar->get_by_id($id);
        
        if ($row) {
        $barang=$this->db->query("SELECT * FROM ref_barang WHERE kd_barang=$row->kd_barang")->row();
        $stock=$barang->stock;
        $jumlah=$row->jumlah;
        $stock_baru=$jumlah+$stock;
        $update = array('stock'=>$stock_baru );
        $this->db->where('kd_barang', $row->kd_barang);
        $this->db->update('ref_barang', $update);            
            $this->Mtr_barang_keluar->delete($id);
            $response['status']  = 'success';
            $response['message'] = 'Data Barang Keluar Sudah Dihapus ...';
        } else {
            $response['status']  = 'error';
            $response['message'] = 'Unable to delete product ...';
        }
        echo json_encode($response);
    }
    }
    public function table()
    {
         $this->load->view('gudang/tr_barang_keluar/tr_barang_keluar_table');
    } 
    public function import()
    {
        $data = array('action' => site_url('gudang/tr_barang_keluar/importaction'), );
        $this->template->load('welcome/halaman','gudang/tr_barang_keluar/import_form',$data);
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
                redirect('gudang/tr_barang_keluar/import');
        }
            elseif($baris<=10001) {              
              $this->db->query("DELETE FROM tr_barang_keluar_importtemp WHERE kd_pengguna='".$this->session->userdata('ku')."'");
              $this->db->query("DELETE FROM tr_barang_keluar_log WHERE kd_pengguna='".$this->session->userdata('ku')."'");
            for($i=2; $i<=$baris; $i++){

                // echo $data->val($i,2);
                $kd_barang=$data->val($i,3);
                $row=$this->db->query("SELECT harga FROM ref_barang WHERE kd_barang='$kd_barang'")->row();
                    $this->db->set('tanggal',substr($data->val($i, 2),6,4)."-".substr($data->val($i, 2),0,2)."-".substr($data->val($i, 2),3,2));
                    $this->db->set('kd_barang',$data->val($i,3));
                    $this->db->set('nm_barang',$data->val($i,4));
                    $this->db->set('spesifikasi',$data->val($i,5));
                    $this->db->set('jumlah',$data->val($i, 6));
                    $this->db->set('harga',$row->harga);
                    $this->db->set('kd_divisi',$data->val($i, 7));
                    $this->db->set('kd_sub_div',$data->val($i, 8));
                    $this->db->set('kd_alok_p',$data->val($i, 9));
                    $this->db->set('kd_alok_b',$data->val($i, 10));
                    $this->db->set('penerima',$data->val($i, 11));
                    $this->db->set('kd_pengguna',$this->session->userdata('ku'));
                    $this->db->insert('tr_barang_keluar_importtemp');

            }

            $arr['record']=$baris-1;
            unlink($_FILES['fileimport']['name']);
           $this->template->load('Welcome/halaman','tr_barang_keluar/previewimport',$arr);
        }
    }}
    public function jsonsukses() {
        header('Content-Type: application/json');
        echo $this->Mtr_barang_keluar->json_sukses();
    }
    function prosesinsertimport($ku){
        if(!empty($ku)){
            $berhasil=0;
            $ku=$this->session->userdata('ku');
            $temp = $this->db->query("select * from tr_barang_keluar_importtemp WHERE kd_pengguna=$ku")->result();
            foreach ($temp as $temp) {
        $jumlah_keluar   = $temp->jumlah;
        $row=$this->db->query("SELECT * FROM ref_barang WHERE kd_barang=$temp->kd_barang")->row();
        if($row)
        {
            $stock=$row->stock;
            $stock_baru=$stock-$jumlah_keluar;
        }
        $update = array('stock'=>$stock_baru );
        $this->db->where('kd_barang', $temp->kd_barang);
        $this->db->update('ref_barang', $update); 
                    $spek=str_replace("'","`",$temp->spesifikasi);
                    $nm_barang = str_replace(array('(', ')',"'"), array('{', '}',"`"), $temp->nm_barang);
                    $this->db->query("INSERT INTO tr_barang_keluar (kd_barang,tanggal,jumlah,harga,nm_barang,kd_divisi,kd_alok_p,kd_alok_b,penerima,spesifikasi,kd_sub_div) VALUES ('$temp->kd_barang','$temp->tanggal','$temp->jumlah','$temp->harga','$nm_barang','$temp->kd_divisi','$temp->kd_alok_p','$temp->kd_alok_b','$temp->penerima','$spek','$temp->kd_sub_div')");
                    $this->db->query("INSERT INTO tr_barang_keluar_log (kd_barang,tanggal,jumlah,harga,nm_barang,status,kd_pengguna,kd_divisi,kd_alok_p,kd_alok_b,penerima,spesifikasi,kd_sub_div) VALUES ('$temp->kd_barang','$temp->tanggal','$temp->jumlah','$temp->harga','$nm_barang','sukses','$ku','$temp->kd_divisi','$temp->kd_alok_p','$temp->kd_alok_b','$temp->penerima','$spek','$temp->kd_sub_div')");
                        $berhasil++;
                
            }
    $notifs="<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> ".$berhasil." Data berhasil di import</div>";
    $this->session->set_flashdata('notifs',$notifs);  
        $sess=array(
                'berhasil'=>$berhasil,
                );
        $this->session->set_userdata($sess);      
            redirect('gudang/tr_barang_keluar/data_import');
        }
    }
        public function data_import(){

        $this->template->load('welcome/halaman','gudang/tr_barang_keluar/data_import');
    } 	
    public function create() 
    {
        $data = array(
            'button'     => 'Tambah barang keluar',
            'action'     => site_url('gudang/tr_barang_keluar/create_action'),
            'kd_barang' => set_value('kd_barang'),
            'kd_divisi' => set_value('kd_divisi'),
            'kd_alok_p' => set_value('kd_alok_p'),
            'kd_alok_b' => set_value('kd_alok_b'),
            'penerima' => set_value('penerima'),
            'kd_barang_keluar' => set_value('kd_barang_keluar'),
            'jumlah' => set_value('jumlah'),
            'harga'=> set_value('harga'),
            'nama_barang'=> set_value('nama_barang'),
            'spesifikasi'=> set_value('spesifikasi'),
            'date'=> date("d/m/Y"),
            'barang'=>$this->Mtr_barang_keluar->ListTabel('ref_barang','nm_barang'),
            'divisi'=>$this->Mtr_barang_keluar->ListTabel('ref_divisi','nm_divisi'),
            'alok_p'=>$this->Mtr_barang_keluar->ListTabel('ref_alok_p','nm_alok_p'),
            'alok_b'=>$this->Mtr_barang_keluar->ListTabel('ref_alok_b','nm_alok_b'),

	);
        $this->template->load('Welcome/halaman','tr_barang_keluar/tr_barang_keluar_form', $data);
    }
    public function create_action() 
    {
        $kd_barang = $this->input->post('barang',TRUE);
        $jumlah_keluar    = $this->input->post('jumlah',TRUE);
        $data = array(
		'kd_barang' => $this->input->post('barang',TRUE),
		'tanggal' => substr($this->input->post('date',TRUE),6,4)."-".substr($this->input->post('date',TRUE),3,2)."-".substr($this->input->post('date',TRUE),0,2),
		'jumlah' => $this->input->post('jumlah',TRUE),
        'harga' => $this->input->post('harga',TRUE),
        'nm_barang' => $this->input->post('nm_barang',TRUE),
        'kd_divisi' => $this->input->post('kd_divisi',TRUE),
        'kd_alok_b' => $this->input->post('kd_alok_b',TRUE),
        'kd_alok_p' => $this->input->post('kd_alok_p',TRUE),
        'penerima' => $this->input->post('penerima',TRUE),
        'spesifikasi' => $this->input->post('spesifikasi',TRUE),
        'kd_sub_div' => $this->input->post('subdiv',TRUE),
	    );
        $row=$this->db->query("SELECT * FROM ref_barang WHERE kd_barang=$kd_barang")->row();
        if($row)
        {
            $stock=$row->stock;
            $stock_baru=$stock-$jumlah_keluar;
        }
        $update = array('stock'=>$stock_baru );
        $this->db->where('kd_barang', $kd_barang);
        $this->db->update('ref_barang', $update);
            $this->Mtr_barang_keluar->insert($data);
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Tambah Barang Keluar", "", "success")
  });

</script>');
            redirect(site_url('gudang/tr_barang_keluar'));
    }
    public function delete($id) 
    {
        $row = $this->Mtr_barang_keluar->get_by_id($id);
        if ($row) {
        $barang=$this->db->query("SELECT * FROM ref_barang WHERE kd_barang=$row->kd_barang")->row();
        $stock=$barang->stock;
        $jumlah=$row->jumlah;
        $stock_baru=$jumlah+$stock;
        $update = array('stock'=>$stock_baru );
        $this->db->where('kd_barang', $row->kd_barang);
        $this->db->update('ref_barang', $update);

            $this->Mtr_barang_keluar->delete($id);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Hapus Barang Keluar", "", "success")
  });

</script>');
            redirect(site_url('gudang/tr_barang_keluar'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gudang/tr_barang_keluar'));
        }
    } 
    public function update($id) 
    {
        $row = $this->Mtr_barang_keluar->get_by_id($id);

        if ($row) {
$tgl=substr("$row->tanggal",8,2)."/".substr("$row->tanggal",5,2)."/".substr("$row->tanggal",0,4); 
        $sess=array(
                'jumlah'=>$row->jumlah,            
                );
        $this->session->set_userdata($sess);           
            $data = array(
                'button'     => 'Update Referensi barang',
                'action'     => site_url('gudang/tr_barang_keluar/update_action'),
            'kd_barang_keluar' => set_value('kd_barang_keluar',$row->kd_barang_keluar),
            'kd_divisi' => set_value('kd_divisi',$row->kd_divisi),
            'kd_alok_p' => set_value('kd_alok_p',$row->kd_alok_p),
            'kd_alok_b' => set_value('kd_alok_b',$row->kd_alok_b),
            'penerima' => set_value('penerima',$row->penerima),
            'kd_barang' => set_value('kd_barang',$row->kd_barang),
            'jumlah' => set_value('jumlah',$row->jumlah),
            'nama_barang'=> set_value('nm_barang',$row->nm_barang),
            'date'=> set_value('tanggal',$tgl),
            'harga'=> set_value('harga',$row->harga),
            'kd_sub_div'=> set_value('kd_sub_div',$row->kd_sub_div),
            'barang'=>$this->Mtr_barang_keluar->ListTabel('ref_barang','nm_barang'),
            'divisi'=>$this->Mtr_barang_keluar->ListTabel('ref_divisi','nm_divisi'),
            'alok_p'=>$this->Mtr_barang_keluar->ListTabel('ref_alok_p','nm_alok_p'),
            'alok_b'=>$this->Mtr_barang_keluar->ListTabel('ref_alok_b','nm_alok_b'),
            'subdiv'=>$this->Mtr_barang_keluar->ListTabel('ref_sub_div','kd_sub_div'),
	    );
           $this->template->load('Welcome/halaman','tr_barang_keluar/tr_barang_keluar_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting/group'));
        }
    } 
        public function update_action() 
    {
        $kd_barang = $this->input->post('barang',TRUE);
        $barang=$this->db->query("SELECT * FROM ref_barang WHERE kd_barang=$kd_barang")->row();
        if($barang){
        $stock=$barang->stock;
        $jumlah_keluar=$this->session->userdata('jumlah');
        $jumlah_keluar_baru=$this->input->post('jumlah',TRUE);
        $stock_baru=$jumlah_keluar+$stock-$jumlah_keluar_baru;}
        $update = array('stock'=>$stock_baru );
        $this->db->where('kd_barang', $kd_barang);
        $this->db->update('ref_barang', $update);
            $data = array(
		'nm_barang' => $this->input->post('nm_barang',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
        'tanggal' => substr($this->input->post('date',TRUE),6,4)."-".substr($this->input->post('date',TRUE),3,2)."-".substr($this->input->post('date',TRUE),0,2),
        'kd_barang' => $this->input->post('barang',TRUE),
        'kd_divisi' => $this->input->post('kd_divisi',TRUE),
        'kd_alok_b' => $this->input->post('kd_alok_b',TRUE),
        'kd_alok_p' => $this->input->post('kd_alok_p',TRUE),
        'penerima' => $this->input->post('penerima',TRUE),
        'kd_sub_div' => $this->input->post('subdiv',TRUE),
	    );

            $this->Mtr_barang_keluar->update($this->input->post('kd_barang_keluar', TRUE), $data);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Update Barang Keluar", "", "success")
  });

</script>');
            redirect(site_url('gudang/tr_barang_keluar'));
    }          
}

/* End of file gudang.php */
/* Location: ./application/modules/gudang/controllers/gudang.php */