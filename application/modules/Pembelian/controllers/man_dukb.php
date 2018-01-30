<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class man_dukb extends CI_Controller {

    function __construct()
    {
        parent::__construct();
         
        $this->load->model('Mman_dukb');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
    }
	public function index()
	{
        if(isset($_POST['nama_grader'])&&isset($_POST['supplier'])&&isset($_POST['date'])){
            $nama_grader      =$_POST['nama_grader'];
            $supplier      =$_POST['supplier'];
            $date      =$_POST['date'];
            $rk="tampil";
        }else{
            $nama_grader='';
            $supplier='';
            $date=DATE('d/m/Y');
            $rk =" ";
        }
        $sess=array(
                'nama_grader'=>$nama_grader,
                'supplier'=>$supplier,
                'date'=>substr($this->input->post('date',TRUE),6,4)."-".substr($this->input->post('date',TRUE),3,2)."-".substr($this->input->post('date',TRUE),0,2),
                );
        $this->session->set_userdata($sess);         
        $data = array(
            'grader'      =>$this->Mman_dukb->ListGrader(),
            'supplier'      =>$this->Mman_dukb->ListSuppliers(), 
        );
        $data['nama_grader']=$nama_grader;
        $data['nm_supplier']=$supplier;
        $data['date']=$date;$data['rk'] =$rk;
		$this->template->load('welcome/halaman','Pembelian/man_dukb/man_dukb_list',$data);
	}
    public function validasi()
    {
                if(isset($_POST['supplier'])&&isset($_POST['date'])){
            
            $supplier      =$_POST['supplier'];
            $date      =$_POST['date'];
            $rk="tampil";
        }else{
           
            $supplier='';
            $date=DATE('d/m/Y');
            $rk =" ";
        }
        $sess=array(
                'supplier'=>$supplier,
                'date'=>substr($this->input->post('date',TRUE),6,4)."-".substr($this->input->post('date',TRUE),3,2)."-".substr($this->input->post('date',TRUE),0,2),
                );
        $this->session->set_userdata($sess);         
        $data = array(
            'supplier'      =>$this->Mman_dukb->ListSuppliers(), 
        );
        $data['nm_supplier']=$supplier;
        $data['date']=$date;$data['rk'] =$rk;
        $this->template->load('welcome/halaman','Pembelian/man_dukb/validasi_dukb',$data);
    }
    public function dukb_tervalidasi()
    {
                if(isset($_POST['supplier'])&&isset($_POST['date'])){
            
            $supplier      =$_POST['supplier'];
            $date      =$_POST['date'];
            $rk="tampil";
        }else{
           
            $supplier='';
            $date=DATE('d/m/Y');
            $rk =" ";
        }
        $sess=array(
                'supplier'=>$supplier,
                'date'=>substr($this->input->post('date',TRUE),6,4)."-".substr($this->input->post('date',TRUE),3,2)."-".substr($this->input->post('date',TRUE),0,2),
                );
        $this->session->set_userdata($sess);         
        $data = array(
            'supplier'      =>$this->Mman_dukb->ListSuppliers(), 
        );
        $data['nm_supplier']=$supplier;
        $data['date']=$date;$data['rk'] =$rk;
        $this->template->load('welcome/halaman','Pembelian/man_dukb/dukb_tervalidasi',$data);
    }    
    public function validasi_action($id)     
        {
            $data = array(
        'status' => "Tervalidasi",'tgl_validasi'=> date("Y-m-d")
        );

        $this->db->where('id_dukb', $id);
        $this->db->update('tr_dukb', $data);
            $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Validasi DUKB", "", "success")
  });

</script>');
            redirect(site_url('Pembelian/man_dukb/validasi'));           
        }    
    public function coba()
    {
        $this->template->load('welcome/halaman','Pembelian/man_dukb/coba');
    }    
    public function import()
    {
        $this->template->load('welcome/halaman','Pembelian/man_dukb/import_form');
    }    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mman_dukb->json();
    }
    public function json_val() {
        header('Content-Type: application/json');
        echo $this->Mman_dukb->json_val();
    }
    public function json_terval() {
        header('Content-Type: application/json');
        echo $this->Mman_dukb->json_terval();
    }                  
    public function json_dukb_detail_temp() {
        header('Content-Type: application/json');
        echo $this->Mman_dukb->json_dukb_detail_temp();
    }
    public function json_dukb_detail() {
        header('Content-Type: application/json');
        echo $this->Mman_dukb->json_dukb_detail();
    }       	
    public function create() 
    {
        $data = array(
            'button'     => 'Tambah DUKB',
            'action2'     => site_url('Pembelian/man_dukb/create'),
            'action'     => site_url('Pembelian/man_dukb/create_temp'),
            'id_inc' => set_value('id_inc'),
            'kode_harga_kayu' => set_value('kode_harga_kayu'),
            'nama_supplier' => set_value('nama_supplier'),
            'kd_grader'=> set_value('kd_grader'),
            'plat_nomor'=> set_value('plat_nomor'),
            'asal_kayu'=> set_value('asal_kayu'),
            'harga'=> set_value('harga'),
            'nm_kecamatan'=> set_value('nm_kecamatan'),
            'nm_kabupaten'=> set_value('nm_kabupaten'),
            'jenis_kayu'=> set_value('jenis_kayu'),
            'kd_siklus' => set_value('kd_siklus'),
            'kecamatan'      =>$this->Mman_dukb->ListKecamatan(),
            'supplier'      =>$this->Mman_dukb->ListSupplier(),
            'kabupaten'      =>$this->Mman_dukb->ListKabupaten(),
            'grader'      =>$this->Mman_dukb->ListGrader(),        
	);
        $this->template->load('Welcome/halaman','man_dukb/man_dukb_form', $data);
    }
    public function create_action() 
    {
        $tgl=substr($this->input->post('date',TRUE),7,4)."-".substr($this->input->post('date',TRUE),4,2)."-".substr($this->input->post('date',TRUE),0,2);echo "$tgl";
        /*$data = array(
		
		'nama_grader' => $this->input->post('nama_grader',TRUE),
        'nama_supplier' => $this->input->post('nama_supplier',TRUE),
        'plat_nomor' => $this->input->post('plat_nomor',TRUE),
		'kabupaten' => $this->input->post('kabupaten',TRUE),
		'kecamatan' => $this->input->post('kecamatan',TRUE),
        'jenis_kayu' => $this->input->post('jenis_kayu',TRUE),
        'tanggal' => substr($this->input->post('date',TRUE),8,2),
	    );
        $this->Mman_dukb->insert($data);
        $row=$this->db->query("SELECT MAX(id_inc) AS id FROM tr_dukb")->row();
        $tr_kayu_suplier_id=$row->id;*/
/*
        for($i=0;$i<count($_POST['diameter260']);$i++){



        $dt = array(
            'diameter'=>$_POST['diameter260'][$i],
            'panjang_kayu'=>$_POST['panjang_kayu260'][$i],
            'batang'=>$_POST['batang260'][$i],
            'volume'=>$_POST['v260'][$i],
            'tr_kayu_suplier_id'=>$tr_kayu_suplier_id,
        );
        $this->db->insert('tr_kayu', $dt);
        }
        for($a=0;$a<count($_POST['diameter130']);$a++){

        $dt = array(
            'diameter'=>$_POST['diameter130'][$a],
            'panjang_kayu'=>$_POST['panjang_kayu130'][$a],
            'batang'=>$_POST['batang130'][$a],
            'volume'=>$_POST['v130'][$a],
            'tr_kayu_suplier_id'=>$tr_kayu_suplier_id,
        );
        $this->db->insert('tr_kayu', $dt);
        }        
         redirect(site_url('Pembelian/man_dukb'));*/
    }
    public function create_temp() 
    {

        if(isset($_POST['simpantemp'])){
        for($a=0;$a<count($_POST['diameter']);$a++){

        $dt = array(
            'diameter'=>$_POST['diameter'][$a],
            'panjang_kayu'=>$_POST['panjang_kayu'][$a],
            'batang'=>$_POST['batang'][$a],
            'volume'=>str_replace(",", ".", $_POST['v'][$a]),
            'kd_bawah'=>$_POST['kd_bawah'][$a],
            'kd_atas'=>$_POST['kd_atas'][$a],
            'harga'=>str_replace(".", "", $_POST['harga'][$a]),
            //'tr_dukb_id'=>$tr_dukb_id,
            'kd_pengguna' => $this->session->userdata('ku')
            
        );
        if ($_POST['batang'][$a]!=0) {
            $this->db->insert('tr_dukb_detail_temp', $dt);
        }
        
        }

           $sess = array(
        'kd_grader' => $this->input->post('nama_grader',TRUE),
        'kode_harga_kayu' => $this->input->post('kode_harga_kayu',TRUE),
        'nama_supplier' => $this->input->post('nama_supplier',TRUE),
        'plat_nomor' => $this->input->post('plat_nomor',TRUE),
        'kd_siklus' => $this->input->post('kd_siklus',TRUE),
        'nm_kabupaten' => $this->input->post('kabupaten',TRUE),
        'nm_kecamatan' => $this->input->post('kecamatan',TRUE),
        'jk' => $this->input->post('jenis_kayu',TRUE),
        'asal_kayu' => $this->input->post('asal_kayu',TRUE),
        'kd_pengguna' => $this->session->userdata('ku'),
        'tanggal' => $this->input->post('date',TRUE),
        
        );$this->session->set_userdata($sess);        
           $data = array(
        'button'     => 'Tambah DUKB',    
        'action'     => site_url('Pembelian/man_dukb/create_temp'),
        'kd_grader' => $this->input->post('nama_grader',TRUE),
        'kode_harga_kayu' => $this->input->post('kode_harga_kayu',TRUE),
        'nama_supplier' => $this->input->post('nama_supplier',TRUE),
        'plat_nomor' => $this->input->post('plat_nomor',TRUE),
        'kd_siklus' => $this->input->post('kd_siklus',TRUE),
        'nm_kabupaten' => $this->input->post('kabupaten',TRUE),
        'nm_kecamatan' => $this->input->post('kecamatan',TRUE),
        'jenis_kayu' => $this->input->post('jenis_kayu',TRUE),
        'asal_kayu' => $this->input->post('asal_kayu',TRUE),
        'kd_pengguna' => $this->session->userdata('ku'),
        'tanggal' => $this->input->post('date',TRUE),
        'supplier'      =>$this->Mman_dukb->ListSupplier(),
        'grader'      =>$this->Mman_dukb->ListGrader(),
        'panjang'      =>$this->Mman_dukb->Listpanjang($this->input->post('nama_supplier',TRUE),$this->input->post('kabupaten',TRUE),$this->input->post('kecamatan',TRUE)),
        
        );

         $this->template->load('Welcome/halaman','man_dukb/man_dukb_form', $data);
        }   else if (isset($_POST['submittemp'])){
           $sess = array(
        'kd_grader',
        'kode_harga_kayu' ,
        'nama_supplier' ,
        'plat_nomor' ,
        'kd_siklus' ,
        'nm_kabupaten' ,
        'nm_kecamatan' ,
        'jk' ,
        'asal_kayu' ,
        'tanggal' ,
        
        );$this->session->unset_userdata($sess);
           $data = array(
        
        'kd_grader' => $this->input->post('nama_grader',TRUE),
        'kode_supplier' => $this->input->post('nama_supplier',TRUE),
        'plat_nomor' => $this->input->post('plat_nomor',TRUE),
        'kabupaten' => $this->input->post('kabupaten',TRUE),
        'kecamatan' => $this->input->post('kecamatan',TRUE),
        'jenis_kayu' => $this->input->post('jenis_kayu',TRUE),
        'asal_kayu' => $this->input->post('asal_kayu',TRUE),
        'kd_siklus' => $this->input->post('kd_siklus',TRUE),
        'kd_pengguna' => $this->session->userdata('ku'),
        'status' => 'Belum Tervalidasi',
        'tanggal' => substr($this->input->post('date',TRUE),6,4)."-".substr($this->input->post('date',TRUE),3,2)."-".substr($this->input->post('date',TRUE),0,2),
        );
        $this->Mman_dukb->insert($data);
        $ku = $this->session->userdata('ku');
    $row=$this->db->query("SELECT MAX(id_dukb) AS id FROM tr_dukb WHERE kd_pengguna=$ku")->row();
        $tr_dukb_id=$row->id;
        $temp=$this->db->query("SELECT * FROM tr_dukb_detail_temp WHERE kd_pengguna=$ku")->result();
        foreach ($temp as $temp) {
            $this->db->query("INSERT INTO tr_dukb_detail (diameter,panjang_kayu,batang,volume,tr_dukb_id,kd_bawah,kd_atas,kd_pengguna,harga) VALUES ('$temp->diameter','$temp->panjang_kayu','$temp->batang','$temp->volume',$tr_dukb_id,'$temp->kd_bawah','$temp->kd_atas','$ku','$temp->harga')");
        }
        $this->db->query("DELETE FROM tr_dukb_detail_temp WHERE kd_pengguna=$ku");
                    $this->session->set_flashdata('message', '<script>
  $(window).load(function(){
   swal("Berhasil Tambah DUKB", "", "success")
  });

</script>');
        redirect(site_url('Pembelian/man_dukb'));
        } 
         //redirect(site_url('Pembelian/man_dukb/create'));
         //$this->template->load('welcome/halaman','Pembelian/man_dukb/create');
    }    
    public function delete($id) 
    {
            $this->db->where('id_dukb_detail', $id);
            $this->db->delete('tr_dukb_detail_temp');
            redirect(site_url('Pembelian/man_dukb/create'));
    }
    public function delete_dukb($id) 
    {$ku=$this->session->userdata('ku');
    $this->db->delete('tr_dukb', array('id_dukb' => $id,'kd_pengguna'=>$ku));
    $this->db->delete('tr_dukb_detail', array('tr_dukb_id' => $id,'kd_pengguna'=>$ku));
            redirect(site_url('Pembelian/man_dukb/'));
    }      
    public function detail($id) 
    {
                $sess=array(
                'id_dukb'=>$id,
                );
        $this->session->set_userdata($sess); 
        $row=$this->db->query("SELECT  a.id_dukb,CONCAT(SUBSTRING(a.tanggal,9,2),'-',SUBSTRING(a.tanggal,6,2),'-',SUBSTRING(a.tanggal,1,4)) AS tanggal,c.nm_grader,b.nama_supplier,a.plat_nomor,a.jenis_kayu,a.kabupaten,a.kecamatan,a.asal_kayu,a.kd_siklus,a.tanggal
FROM tr_dukb a
JOIN ref_supplier b ON a.kode_supplier=b.kode_supplier
JOIN ref_grader c ON a.kd_grader=c.kd_grader WHERE id_dukb=$id")->row();
        $jml_p=$this->db->query("SELECT DISTINCT panjang_kayu FROM tr_dukb_detail WHERE tr_dukb_id=$id order by panjang_kayu asc")->result();
        if ($row) {
            $data = array(
                'button'     => 'Detail Transaksi DUKB',
                'action'     => site_url('pembelian/man_dukb/update_action'),
            'nama_grader' => set_value('nama_grader',$row->nm_grader),
            'nama_supplier' => set_value('nama_supplier',$row->nama_supplier),
            'plat_nomor'=> set_value('plat_nomor',$row->plat_nomor),
            'jenis_kayu'=> set_value('jenis_kayu',$row->jenis_kayu),
            'kabupatenn'=> set_value('kabupaten',$row->kabupaten),
            'kecamatann'=> set_value('kecamatan',$row->kecamatan),
            'asal_kayu'=> set_value('asal_kayu',$row->asal_kayu),
            'kd_siklus'=> set_value('kd_siklus',$row->kd_siklus),
            'tanggal'=> set_value('tanggal',$row->tanggal),
            'jml_p'      =>$jml_p,
            'id'=>$id,
        );
           $this->template->load('Welcome/halaman','man_dukb/man_dukb_detail', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting/group'));
        }
    }    
    public function update($id) 
    {
        $row = $this->Mman_dukb->get_by_id($id);

        if ($row) {
            $data = array(
                'button'     => 'Update Manajemen Harga',
                'action'     => site_url('pembelian/man_dukb/update_action'),
            'kode_harga_kayu' => set_value('kode_harga_kayu',$row->kode_harga_kayu),
            'nama_supplier' => set_value('nama_supplier',$row->nama_supplier),
            'panjang_kayu'=> set_value('panjang_kayu',$row->panjang_kayu),
            'kelas_diameter'=> set_value('kelas_diameter',$row->kelas_diameter),
            'kode_lokasi'=> set_value('kode_lokasi',$row->lokasi),
            'lokasi'=> set_value('lokasi',$row->lokasi),
            'harga'=> set_value('harga',$row->harga),
            'lokasi'      =>$this->Mman_dukb->ListLokasi(),
            'supplier'      =>$this->Mman_dukb->ListSupplier(),
            'panjang'      =>$this->Mman_dukb->ListSPanjangKayu(),
            'kDiameter'=>$this->Mman_dukb->ListKelasDiameter($row->panjang_kayu),
            'k'=>$row->kelas_diameter
	    );
           $this->template->load('Welcome/halaman','man_dukb/man_dukb_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting/group'));
        }
    } 
        public function update_action() 
    {
            $data = array(
        'nama_supplier' => $this->input->post('nama_supplier',TRUE),
        'panjang_kayu' => $this->input->post('panjang_kayu',TRUE),
        'lokasi' => $this->input->post('lokasi',TRUE),
        'kelas_diameter' => $this->input->post('kelas_diameter',TRUE),
        'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Mman_dukb->update($this->input->post('kode_harga_kayu', TRUE), $data);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<button type="button" class="btn btn-success"> Berhasil Update Harga Kayu</button>');
            redirect(site_url('Pembelian/man_dukb'));
    }    
        function getpanjang(){
        $kab=$_POST['nm_kabupaten'];$kec=$_POST['nm_kecamatan'];$nama_supplier=$_POST['n'];
        
        //$data['parent']=$parent;
        $data['rk']=$this->db->query("SELECT DISTINCT panjang_kayu FROM man_harga_kayu WHERE kode_supplier='$nama_supplier' AND kabupaten='$kab' AND kecamatan='$kec' order by panjang_kayu asc
")->result();
        // print_r($data);
        $this->load->view('man_dukb/getpanjang',$data);
    }  
            function getdiameter(){
        $kab=$_POST['kabupaten'];$kec=$_POST['kecamatan'];$nama_supplier=$_POST['nama'];$panjang=$_POST['p'];
        
        //$data['parent']=$parent;
        $dt=$this->db->query("SELECT panjang_kayu,kd_bawah,kd_atas FROM man_harga_kayu WHERE kode_supplier='$nama_supplier' AND kabupaten='$kab' AND kecamatan='$kec' AND panjang_kayu=$panjang
")->result();
        // print_r($data);
        $st='';
        foreach ($dt as $dt) {
            $st.='SELECT diameter,panjang_kayu,kd_bawah,kd_atas FROM ref_panjang_kayu WHERE kd_bawah='.$dt->kd_bawah.' AND kd_atas='.$dt->kd_atas.' AND panjang_kayu='.$dt->panjang_kayu.' UNION ';
        }$res=substr($st, 0,-7);
        $data['panjang']=$panjang;
        $data['sql']="SELECT diameter,a.panjang_kayu,a.kd_bawah,a.kd_atas,b.harga
FROM ($res)a
JOIN man_harga_kayu b ON a.panjang_kayu=b.panjang_kayu AND a.kd_bawah=b.kd_bawah AND a.kd_atas=b.kd_atas
WHERE kode_supplier=$nama_supplier AND b.panjang_kayu=$panjang AND kabupaten='$kab' AND kecamatan='$kec' ORDER BY diameter ASC";
        $data['rk']=$this->db->query("SELECT diameter,a.panjang_kayu,a.kd_bawah,a.kd_atas,b.harga
FROM ($res)a
JOIN man_harga_kayu b ON a.panjang_kayu=b.panjang_kayu AND a.kd_bawah=b.kd_bawah AND a.kd_atas=b.kd_atas
WHERE kode_supplier=$nama_supplier AND b.panjang_kayu=$panjang AND kabupaten='$kab' AND kecamatan='$kec' ORDER BY diameter ASC")->result();
        $data['r']=$this->db->query("SELECT diameter,a.panjang_kayu,a.kd_bawah,a.kd_atas,b.harga
FROM ($res)a
JOIN man_harga_kayu b ON a.panjang_kayu=b.panjang_kayu AND a.kd_bawah=b.kd_bawah AND a.kd_atas=b.kd_atas
WHERE kode_supplier=$nama_supplier AND b.panjang_kayu=$panjang AND kabupaten='$kab' AND kecamatan='$kec' ORDER BY diameter ASC")->result();
        $data['k']=$this->db->query("SELECT diameter,a.panjang_kayu,a.kd_bawah,a.kd_atas,b.harga
FROM ($res)a
JOIN man_harga_kayu b ON a.panjang_kayu=b.panjang_kayu AND a.kd_bawah=b.kd_bawah AND a.kd_atas=b.kd_atas
WHERE kode_supplier=$nama_supplier AND b.panjang_kayu=$panjang AND kabupaten='$kab' AND kecamatan='$kec' ORDER BY diameter ASC")->result();        
        $this->load->view('man_dukb/getdiameter',$data);
    }     
}

/* End of file Pembelian.php */
/* Location: ./application/modules/Pembelian/controllers/Pembelian.php */