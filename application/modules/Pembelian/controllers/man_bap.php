<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class man_bap extends CI_Controller {

    function __construct()
    {
        parent::__construct();
         $this->load->library('M_pdf');
        $this->load->model('Mman_bap');
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
            'grader'      =>$this->Mman_bap->ListGrader(),
            'supplier'      =>$this->Mman_bap->ListSuppliers(), 
        );
        $data['nama_grader']=$nama_grader;
        $data['nm_supplier']=$supplier;
        $data['date']=$date;$data['rk'] =$rk;
		$this->template->load('welcome/halaman','Pembelian/man_bap/man_bap_list',$data);
	}
    public function pdfbap(){
        $id=$this->session->userdata('id_bap');
        $row=$this->db->query("SELECT  a.id_dukb,CONCAT(SUBSTRING(a.tanggal,9,2),'-',SUBSTRING(a.tanggal,6,2),'-',SUBSTRING(a.tanggal,1,4)) AS tanggal,c.nm_grader,b.nama_supplier,a.plat_nomor,a.jenis_kayu,a.kabupaten,a.kecamatan,a.asal_kayu,a.kd_siklus
FROM tr_dukb a
JOIN ref_supplier b ON a.kode_supplier=b.kode_supplier
JOIN ref_grader c ON a.kd_grader=c.kd_grader WHERE id_dukb=$id")->row();
        $jml_p=$this->db->query("SELECT DISTINCT panjang_kayu FROM tr_dukb_detail WHERE tr_dukb_id=$id order by panjang_kayu desc")->result();
        if ($row) {
            $data = array(
                'button'     => 'Detail Manajemen bap',
                'action'     => site_url('pembelian/man_bap/update_action'),
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
        );}     
        $pdfFilePath = "BAP ".time().".pdf";
        $sumber = $this->load->view('man_bap/man_bap_pdf',$data,true);
        $html = $sumber;
        $this->m_pdf->pdf->AddPage('Location');  
        $this->m_pdf->pdf->WriteHTML($html);
        $this->m_pdf->pdf->Output($pdfFilePath, "D");
    }    
    public function coba()
    {
        $this->template->load('welcome/halaman','Pembelian/man_bap/coba');
    }    
    public function import()
    {
        $this->template->load('welcome/halaman','Pembelian/man_bap/import_form');
    }    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mman_bap->json();
    }    
    public function json_bap_detail_temp() {
        header('Content-Type: application/json');
        echo $this->Mman_bap->json_bap_detail_temp();
    }
    public function json_bap_detail() {
        header('Content-Type: application/json');
        echo $this->Mman_bap->json_bap_detail();
    }       	
    public function create() 
    {
        $data = array(
            'button'     => 'Tambah bap',
            'action2'     => site_url('Pembelian/man_bap/create'),
            'action'     => site_url('Pembelian/man_bap/create_temp'),
            'id_inc' => set_value('id_inc'),
            'kode_supplier' => set_value('kode_supplier'),
            'kd_grader'=> set_value('kd_grader'),
            'plat_nomor'=> set_value('plat_nomor'),
            'harga'=> set_value('harga'),
            'nm_kecamatan'=> set_value('nm_kecamatan'),
            'nm_kabupaten'=> set_value('nm_kabupaten'),
            'jenis_kayu'=> set_value('jenis_kayu'),
            'kecamatan'      =>$this->Mman_bap->ListKecamatan(),
            'supplier'      =>$this->Mman_bap->ListSupplier(),
            'kabupaten'      =>$this->Mman_bap->ListKabupaten(),
            'grader'      =>$this->Mman_bap->ListGrader(),
            'p130'      =>$this->Mman_bap->Listp130(),
            'p260'      =>$this->Mman_bap->Listp260(),
            'p1301'      =>$this->Mman_bap->Listp1301(),
            'p2601'      =>$this->Mman_bap->Listp2601()            
	);
        $this->template->load('Welcome/halaman','man_bap/man_bap_form', $data);
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
        $this->Mman_bap->insert($data);
        $row=$this->db->query("SELECT MAX(id_inc) AS id FROM tr_bap")->row();
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
         redirect(site_url('Pembelian/man_bap'));*/
    }
    public function create_temp() 
    {

        if(isset($_POST['simpantemp'])){
        for($a=0;$a<count($_POST['diameter']);$a++){

        $dt = array(
            'diameter'=>$_POST['diameter'][$a],
            'panjang_kayu'=>$_POST['panjang_kayu'][$a],
            'batang'=>$_POST['batang'][$a],
            'volume'=>$_POST['v'][$a],
            'kd_bawah'=>$_POST['kd_bawah'][$a],
            'kd_atas'=>$_POST['kd_atas'][$a],
            //'tr_bap_id'=>$tr_bap_id,
            'kd_pengguna' => $this->session->userdata('ku')
            
        );
        if ($_POST['batang'][$a]!=0) {
            $this->db->insert('tr_bap_detail_temp', $dt);
        }
        
        }    

        }   else if (isset($_POST['submittemp'])){
           $data = array(
        
        'nama_grader' => $this->input->post('nama_grader',TRUE),
        'nama_supplier' => $this->input->post('nama_supplier',TRUE),
        'plat_nomor' => $this->input->post('plat_nomor',TRUE),
        'kabupaten' => $this->input->post('kabupaten',TRUE),
        'kecamatan' => $this->input->post('kecamatan',TRUE),
        'jenis_kayu' => $this->input->post('jenis_kayu',TRUE),
        'kd_pengguna' => $this->session->userdata('ku'),
        'tanggal' => substr($this->input->post('date',TRUE),6,4)."-".substr($this->input->post('date',TRUE),3,2)."-".substr($this->input->post('date',TRUE),0,2),
        );
        $this->Mman_bap->insert($data);
        $ku = $this->session->userdata('ku');
    $row=$this->db->query("SELECT MAX(id_bap) AS id FROM tr_bap WHERE kd_pengguna=$ku")->row();
        $tr_bap_id=$row->id;
        $temp=$this->db->query("SELECT * FROM tr_bap_detail_temp WHERE kd_pengguna=$ku")->result();
        foreach ($temp as $temp) {
            $this->db->query("INSERT INTO tr_bap_detail (id_bap_detail,diameter,panjang_kayu,batang,volume,tr_bap_id,kd_bawah,kd_atas,kd_pengguna) VALUES ('$temp->id_bap_detail','$temp->diameter','$temp->panjang_kayu','$temp->batang','$temp->volume',$tr_bap_id,'$temp->kd_bawah','$temp->kd_atas','$ku')");
        }
        $this->db->query("DELETE FROM tr_bap_detail_temp WHERE kd_pengguna=$ku");
        redirect(site_url('Pembelian/man_bap'));
        } 
         redirect(site_url('Pembelian/man_bap/create'));
    }    
    public function delete($id) 
    {
            $this->db->where('id_bap_detail', $id);
            $this->db->delete('tr_bap_detail_temp');
            redirect(site_url('Pembelian/man_bap/create'));
    }
    public function delete_bap($id) 
    {$ku=$this->session->userdata('ku');
    $this->db->delete('tr_bap', array('id_bap' => $id,'kd_pengguna'=>$ku));
    $this->db->delete('tr_bap_detail', array('tr_bap_id' => $id,'kd_pengguna'=>$ku));
            redirect(site_url('Pembelian/man_bap/'));
    }      
    public function detail($id) 
    {
                $sess=array(
                'id_bap'=>$id,
                );
        $this->session->set_userdata($sess); 
        $row=$this->db->query("SELECT  a.id_dukb,CONCAT(SUBSTRING(a.tanggal,9,2),'-',SUBSTRING(a.tanggal,6,2),'-',SUBSTRING(a.tanggal,1,4)) AS tanggal,c.nm_grader,b.nama_supplier,a.plat_nomor,a.jenis_kayu,a.kabupaten,a.kecamatan,a.asal_kayu,a.kd_siklus
FROM tr_dukb a
JOIN ref_supplier b ON a.kode_supplier=b.kode_supplier
JOIN ref_grader c ON a.kd_grader=c.kd_grader WHERE id_dukb=$id")->row();
        $jml_p=$this->db->query("SELECT DISTINCT panjang_kayu FROM tr_dukb_detail WHERE tr_dukb_id=$id order by panjang_kayu desc")->result();
        if ($row) {
            $data = array(
                'button'     => 'Detail Manajemen bap',
                'action'     => site_url('pembelian/man_bap/update_action'),
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
           $this->template->load('Welcome/halaman','man_bap/man_bap_detail', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting/group'));
        }
    }    
    public function update($id) 
    {
        $row = $this->Mman_bap->get_by_id($id);

        if ($row) {
            $data = array(
                'button'     => 'Update Manajemen Harga',
                'action'     => site_url('pembelian/man_bap/update_action'),
            'kode_harga_kayu' => set_value('kode_harga_kayu',$row->kode_harga_kayu),
            'nama_supplier' => set_value('nama_supplier',$row->nama_supplier),
            'panjang_kayu'=> set_value('panjang_kayu',$row->panjang_kayu),
            'kelas_diameter'=> set_value('kelas_diameter',$row->kelas_diameter),
            'kode_lokasi'=> set_value('kode_lokasi',$row->lokasi),
            'lokasi'=> set_value('lokasi',$row->lokasi),
            'harga'=> set_value('harga',$row->harga),
            'lokasi'      =>$this->Mman_bap->ListLokasi(),
            'supplier'      =>$this->Mman_bap->ListSupplier(),
            'panjang'      =>$this->Mman_bap->ListSPanjangKayu(),
            'kDiameter'=>$this->Mman_bap->ListKelasDiameter($row->panjang_kayu),
            'k'=>$row->kelas_diameter
	    );
           $this->template->load('Welcome/halaman','man_bap/man_bap_form', $data);
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

            $this->Mman_bap->update($this->input->post('kode_harga_kayu', TRUE), $data);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<button type="button" class="btn btn-success"> Berhasil Update Harga Kayu</button>');
            redirect(site_url('Pembelian/man_bap'));
    }    
        function getpanjang(){
        $kab=$_POST['nm_kabupaten'];$kec=$_POST['nm_kecamatan'];$nama_supplier=$_POST['n'];
        
        //$data['parent']=$parent;
        $data['rk']=$this->db->query("SELECT DISTINCT panjang_kayu FROM man_harga_kayu WHERE nama_supplier='$nama_supplier' AND kabupaten='$kab' AND kecamatan='$kec' 
")->result();
        // print_r($data);
        $this->load->view('man_bap/getpanjang',$data);
    }  
            function getdiameter(){
        $kab=$_POST['kabupaten'];$kec=$_POST['kecamatan'];$nama_supplier=$_POST['nama'];$panjang=$_POST['p'];
        
        //$data['parent']=$parent;
        $dt=$this->db->query("SELECT panjang_kayu,kd_bawah,kd_atas FROM man_harga_kayu WHERE nama_supplier='$nama_supplier' AND kabupaten='$kab' AND kecamatan='$kec' AND panjang_kayu=$panjang
")->result();
        // print_r($data);
        $st='';
        foreach ($dt as $dt) {
            $st.='SELECT diameter,panjang_kayu,kd_bawah,kd_atas FROM ref_panjang_kayu WHERE kd_bawah='.$dt->kd_bawah.' AND kd_atas='.$dt->kd_atas.' AND panjang_kayu='.$dt->panjang_kayu.' UNION ';
        }$res=substr($st, 0,-7);
        $data['panjang']=$panjang;
        $data['rk']=$this->db->query("$res ORDER BY diameter ASC")->result();$data['r']=$this->db->query("$res ORDER BY diameter ASC")->result();
        $this->load->view('man_bap/getdiameter',$data);
    }     
}

/* End of file Pembelian.php */
/* Location: ./application/modules/Pembelian/controllers/Pembelian.php */