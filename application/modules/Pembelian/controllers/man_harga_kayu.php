<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class man_harga_kayu extends CI_Controller {

    function __construct()
    {
        parent::__construct();
         
        $this->load->model('Mman_harga_kayu');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
    }
	public function index()
	{
		$this->template->load('welcome/halaman','Pembelian/man_harga_kayu/man_harga_kayu_list');
	}
    public function import()
    {
        $data = array('action' => site_url('Pembelian/man_harga_kayu/importaction'), );
        $this->template->load('welcome/halaman','Pembelian/man_harga_kayu/import_form',$data);
    }    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mman_harga_kayu->json();
    }	
    public function create() 
    {
        $data = array(
            'button'     => 'Tambah Harga Kayu',
            'action'     => site_url('Pembelian/man_harga_kayu/create_action'),
            'kode_harga_kayu' => set_value('kode_harga_kayu'),
            'kode_supplier' => set_value('kode_supplier'),
            'panjang_kayu'=> set_value('panjang_kayu'),
            'kd_kabupaten'=> set_value('kd_kabupaten'),
            'kelas_diameter'=> set_value('kelas_diameter'),
            'harga'=> set_value('harga'),
            'nm_kabupaten'=> set_value('nm_kabupaten'),
            'kabupaten'      =>$this->Mman_harga_kayu->Listkab(),
            'supplier'      =>$this->Mman_harga_kayu->ListSupplier(),
            'panjang'      =>$this->Mman_harga_kayu->ListSPanjangKayu()
	);
        $this->template->load('Welcome/halaman','man_harga_kayu/man_harga_kayu_form', $data);
    }
    public function create_action() 
    {
        $kode_supplier=$this->input->post('kode_supplier',TRUE);
        $panjang_kayu= $this->input->post('panjang_kayu',TRUE);
        $kabupaten = $this->input->post('kabupaten',TRUE);
        $kecamatan = $this->input->post('kecamatan',TRUE);
        $kd_bawah =substr($this->input->post('kelas_diameter',TRUE),0,2);
        $kd_atas = substr($this->input->post('kelas_diameter',TRUE),3,2);
    $t = $this->db->query("SELECT COUNT(kode_supplier) kode_supplier 
FROM man_harga_kayu WHERE kode_supplier=$kode_supplier AND panjang_kayu=$panjang_kayu AND kabupaten='$kabupaten' AND kecamatan='$kecamatan' AND kd_bawah=$kd_bawah AND kd_atas=$kd_atas")->row();
                if($t->kode_supplier==0){
        $data = array(
        'kode_supplier' => $this->input->post('kode_supplier',TRUE),
        'panjang_kayu' => $this->input->post('panjang_kayu',TRUE),
        'kd_bawah' => substr($this->input->post('kelas_diameter',TRUE),0,2),
        'kd_atas' => substr($this->input->post('kelas_diameter',TRUE),3,2),
        'kecamatan' => $this->input->post('kecamatan',TRUE),
        'kabupaten' => $this->input->post('kabupaten',TRUE),
        'harga' => $this->input->post('harga',TRUE),
        );
            $this->Mman_harga_kayu->insert($data);            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Tambah Harga Kayu", "", "success")
  });

</script>');
            redirect(site_url('Pembelian/man_harga_kayu'));}
            else {


$this->session->set_flashdata('message', '<script>
  $(window).load(function(){
swal({
  type: "error",
  title: "Oops...",
  text: "Harga Kayu Sudah Ada",
})
  });

</script>');
            redirect(site_url('Pembelian/man_harga_kayu'));}                
            
    }
    public function delete($id) 
    {
        $row = $this->Mman_harga_kayu->get_by_id($id);

        if ($row) {
            $this->Mman_harga_kayu->delete($id);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Delete Harga Kayu", "", "success")
  });

</script>');
            redirect(site_url('Pembelian/man_harga_kayu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Pembelian/man_harga_kayu'));
        }
    } 
    public function update($id) 
    {
        $row = $this->Mman_harga_kayu->get_by_id($id);

        if ($row) {
            $data = array(
                'button'     => 'Update Manajemen Harga',
                'action'     => site_url('pembelian/man_harga_kayu/update_action'),
            'kode_harga_kayu' => set_value('kode_harga_kayu',$row->kode_harga_kayu),
            'kode_supplier' => set_value('kode_supplier',$row->kode_supplier),
            'panjang_kayu'=> set_value('panjang_kayu',$row->panjang_kayu),
            'nm_kabupaten'=> set_value('nm_kabupaten',$row->kabupaten),
            'nm_kecamatan'=> set_value('nm_kecamatan',$row->kecamatan),
            //'kelas_diameter'=> set_value('kelas_diameter',$row->kelas_diameter),
           // 'kode_lokasi'=> set_value('kode_lokasi',$row->lokasi),
            //'lokasi'=> set_value('lokasi',$row->lokasi),
            'harga'=> set_value('harga',$row->harga),
            //'lokasi'      =>$this->Mman_harga_kayu->ListLokasi(),
            'supplier'      =>$this->Mman_harga_kayu->ListSupplier(),
            'panjang'      =>$this->Mman_harga_kayu->ListSPanjangKayu(),
            'kDiameter'=>$this->Mman_harga_kayu->ListKelasDiameter($row->panjang_kayu),
            'kabupaten'      =>$this->Mman_harga_kayu->Listkab(),
            'kecamatan'      =>$this->Mman_harga_kayu->Listkec($row->kabupaten),
            'k'=>$row->kd_bawah."-".$row->kd_atas,
	    );
           $this->template->load('Welcome/halaman','man_harga_kayu/man_harga_kayu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting/group'));
        }
    } 
        public function update_action() 
    {
            $data = array(
        'kode_supplier' => $this->input->post('kode_supplier',TRUE),
        'panjang_kayu' => $this->input->post('panjang_kayu',TRUE),
        'kabupaten' => $this->input->post('kabupaten',TRUE),
        'kecamatan' => $this->input->post('kecamatan',TRUE),
        'harga' => $this->input->post('harga',TRUE),
        'kd_bawah' => substr($this->input->post('kelas_diameter',TRUE),0,2),
        'kd_atas' => substr($this->input->post('kelas_diameter',TRUE),3,2),
	    );

            $this->Mman_harga_kayu->update($this->input->post('kode_harga_kayu', TRUE), $data);
            $this->db->query("commit"); $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Update Harga Kayu", "", "success")
  });

</script>');
            redirect(site_url('Pembelian/man_harga_kayu'));
    }    
        function getkelas(){
        $panjang_kayu=$_POST['panjang_kayu'];
        
        //$data['parent']=$parent;
        $data['rk']=$this->db->query("SELECT DISTINCT kd_bawah, kd_atas,panjang_kayu  FROM ref_panjang_kayu WHERE panjang_kayu = $panjang_kayu GROUP BY kd_bawah,kd_atas")->result();
        // print_r($data);
        $this->load->view('man_harga_kayu/getkelas',$data);
    } 
            function getkecamatan(){
        $kabupaten=$_POST['kabupaten'];
        
        //$data['parent']=$parent;
        $data['kc']=$this->db->query("SELECT kabupaten,kecamatan FROM ref_lokasi_kayu WHERE kabupaten ='$kabupaten' order by kecamatan asc")->result();
        // print_r($data);
        $this->load->view('man_harga_kayu/getkecamatan',$data);
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
                redirect('Pembelian/man_harga_kayu/import');
        }
            elseif($baris<=10001) {              
              $this->db->query("DELETE FROM man_harga_kayu_importtemp WHERE kd_pengguna='".$this->session->userdata('ku')."'");
              $this->db->query("DELETE FROM man_harga_kayu_log WHERE kd_pengguna='".$this->session->userdata('ku')."'");
            for($i=2; $i<=$baris; $i++){

                // echo $data->val($i,2);

                    $this->db->set('kode_supplier',$data->val($i,2));
                    $this->db->set('panjang_kayu',$data->val($i, 3));
                    $this->db->set('harga',$data->val($i, 4));
                    $this->db->set('kabupaten',$data->val($i, 5));
                    $this->db->set('kecamatan',$data->val($i, 6));
                    $this->db->set('kd_bawah',$data->val($i, 7));
                    $this->db->set('kd_atas',$data->val($i, 8));
                    $this->db->set('kd_pengguna',$this->session->userdata('ku'));
                    $this->db->insert('man_harga_kayu_importtemp');

            }

            $arr['record']=$baris-1;
            unlink($_FILES['fileimport']['name']);
            $this->template->load('Welcome/halaman','man_harga_kayu/previewimport',$arr);

        }
    }
    }
    function prosesinsertimport($ku){
        if(!empty($ku)){
            $berhasil=0;
            $gagal=0;
            $ku=$this->session->userdata('ku');
            $temp = $this->db->query("select * from man_harga_kayu_importtemp WHERE kd_pengguna=$ku")->result();
            foreach ($temp as $temp) {
                $t = $this->db->query("SELECT COUNT(kode_supplier) kode_supplier 
FROM man_harga_kayu WHERE kode_supplier=$temp->kode_supplier AND panjang_kayu=$temp->panjang_kayu AND kabupaten='$temp->kabupaten' AND kecamatan='$temp->kecamatan' 
AND kd_bawah=$temp->kd_bawah AND kd_atas=$temp->kd_atas")->row();
                if($t->kode_supplier==0){
                    // insert
                    $this->db->query("INSERT INTO man_harga_kayu (kode_supplier,panjang_kayu,harga,kabupaten,kecamatan,kd_bawah,kd_atas) VALUES ('$temp->kode_supplier','$temp->panjang_kayu','$temp->harga','$temp->kabupaten','$temp->kecamatan','$temp->kd_bawah','$temp->kd_atas')");
                    $this->db->query("INSERT INTO man_harga_kayu_log (kode_supplier,panjang_kayu,harga,kabupaten,kecamatan,kd_bawah,kd_atas,status,kd_pengguna) VALUES ('$temp->kode_supplier','$temp->panjang_kayu','$temp->harga','$temp->kabupaten','$temp->kecamatan','$temp->kd_bawah','$temp->kd_atas','sukses','$ku')");                        
                        $berhasil++;
                }else{
                    // gagal
                    $this->db->query("INSERT INTO man_harga_kayu_log (kode_supplier,panjang_kayu,harga,kabupaten,kecamatan,kd_bawah,kd_atas,status,kd_pengguna) VALUES ('$temp->kode_supplier','$temp->panjang_kayu','$temp->harga','$temp->kabupaten','$temp->kecamatan','$temp->kd_bawah','$temp->kd_atas','gagal','$ku')"); 
                        
                        $gagal++;
                }
            }
    $notifs="<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> ".$berhasil." Data berhasil di import</div>";
    $this->session->set_flashdata('notifs',$notifs);
$notifg="<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> ".$gagal." Data gagal di import</div>";
    $this->session->set_flashdata('notifg',$notifg);    
        $sess=array(
                'gagal'=>$gagal,
                'berhasil'=>$berhasil,
                );
        $this->session->set_userdata($sess);      
            redirect('Pembelian/man_harga_kayu/data_import');
        }
    }
        public function data_import(){

        $this->template->load('welcome/halaman','Pembelian/man_harga_kayu/data_import');
    }  
    public function jsonsukses() {
        header('Content-Type: application/json');
        echo $this->Mman_harga_kayu->jsonsukses();
    }  
    public function jsongagal() {
        header('Content-Type: application/json');
        echo $this->Mman_harga_kayu->jsongagal();
    }                     
}

/* End of file Pembelian.php */
/* Location: ./application/modules/Pembelian/controllers/Pembelian.php */