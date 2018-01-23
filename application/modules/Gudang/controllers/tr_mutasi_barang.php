<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tr_mutasi_barang extends CI_Controller {

    function __construct()
    {
        parent::__construct();
         
        $this->load->model('Mtr_mutasi_barang');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
    }
	public function index()
	{
		$this->template->load('welcome/halaman','gudang/tr_mutasi_barang/tr_mutasi_barang_list');
	}
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mtr_mutasi_barang->json();
    }	
    public function create() 
    {
        $data = array(
            'button'     => 'Tambah Mutasi Barang',
            'action'     => site_url('gudang/tr_mutasi_barang/create_action'),

	);
        $this->template->load('Welcome/halaman','tr_mutasi_barang/tr_mutasi_barang_form', $data);
    }
    public function create_action() 
    {
        $bulan=substr($this->input->post('date',TRUE),0,2);
        $tahun=substr($this->input->post('date',TRUE),3,4);
        $bulantahuns=date('m-Y', strtotime('-1 months', strtotime($tahun."-".$bulan))); 
        $bulans=substr($bulantahuns,0,2);
        $tahuns=substr($bulantahuns,3,4);
        $where="WHERE tanggal LIKE '%$tahun-$bulan%'";
       $mutasi= $this->db->query("SELECT a.kd_barang, a.nm_barang, IFNULL(masuk,0) AS masuk ,IFNULL(keluar,0) AS keluar
FROM ref_barang a 
LEFT JOIN 
(SELECT kd_barang, nm_barang, IFNULL(SUM(harga*jumlah),0) AS masuk 
FROM tr_barang_masuk $where
GROUP BY kd_barang, nm_barang ) masuk ON a.kd_barang=masuk.kd_barang
LEFT  JOIN 
(SELECT kd_barang, nm_barang, IFNULL(SUM(harga*jumlah),0) AS keluar 
FROM tr_barang_keluar $where
GROUP BY kd_barang, nm_barang) keluar ON a.kd_barang=keluar.kd_barang
GROUP BY a.kd_barang, a.nm_barang")->result();
       foreach ($mutasi as $mutasi) {
        $row=$this->db->query("SELECT COUNT(kd_barang) kd_barang FROM tr_mutasi_barang WHERE kd_barang=$mutasi->kd_barang AND bulan=$bulan AND tahun=$tahun")->row();
        $tr_per_barang=$this->db->query("SELECT COUNT(saldo) AS s, saldo  FROM tr_mutasi_barang WHERE bulan= '$bulans' AND tahun='$tahuns' AND kd_barang=$mutasi->kd_barang")->row();
        $tr_mutasi=$this->db->query("SELECT * FROM tr_mutasi_barang WHERE bulan='$bulan' AND tahun='$tahun'")->result();
        if ($tr_per_barang->s==0) {
            $saldo=0;
        }
        else {$saldo=$tr_per_barang->saldo;}
        if($row->kd_barang==0){
        $data = array(
        'bulan' => substr($this->input->post('date',TRUE),0,2),
        'tahun' => substr($this->input->post('date',TRUE),3,4),
        'kd_barang'=> $mutasi->kd_barang,
        'nm_barang'=> $mutasi->nm_barang,
        'stok_awal'=>$saldo,
        'masuk'=>$mutasi->masuk,
        'keluar'=> $mutasi->keluar,
        'saldo'=>$saldo+$mutasi->masuk-$mutasi->keluar,
        );
        $this->Mtr_mutasi_barang->insert($data);
        }
        else { 
        $data = array(
        'bulan' => substr($this->input->post('date',TRUE),0,2),
        'tahun' => substr($this->input->post('date',TRUE),3,4),
        'kd_barang'=> $mutasi->kd_barang,
        'nm_barang'=> $mutasi->nm_barang,
        'stok_awal'=>$saldo,
        'masuk'=>$mutasi->masuk,
        'keluar'=> $mutasi->keluar,
        'saldo'=>$saldo+$mutasi->masuk-$mutasi->keluar,
        );
        
        $this->db->where('kd_barang', $mutasi->kd_barang);
        $this->db->where('bulan', $bulan);
        $this->db->where('tahun', $tahun);
        $this->db->update('tr_mutasi_barang', $data);

        }
       } 
        $this->session->set_flashdata('message', '<button type="button" class="btn btn-success"> Berhasil Menambah Mutasi barang</button>');
            redirect(site_url('gudang/tr_mutasi_barang'));
    }
    public function delete($id) 
    {
        $row = $this->Mtr_mutasi_barang->get_by_id($id);

        if ($row) {
            $this->Mtr_mutasi_barang->delete($id);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<button type="button" class="btn btn-success"> Berhasil Hapus Supplier</button>');
            redirect(site_url('gudang/tr_mutasi_barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gudang/tr_mutasi_barang'));
        }
    } 
    public function update($id) 
    {
        $row = $this->Mtr_mutasi_barang->get_by_id($id);

        if ($row) {
            $data = array(
                'button'     => 'Update Referensi Supplier',
                'action'     => site_url('gudang/tr_mutasi_barang/update_action'),
            'kode_supplier' => set_value('kode_supplier',$row->kode_supplier),
            'nama_supplier' => set_value('nama_supplier',$row->nama_supplier),
            'email'=> set_value('email',$row->email),
            'hp'=> set_value('hp',$row->hp),
            'kecamatan'=> set_value('kecamatan',$row->kecamatan),
            'kabupaten'=> set_value('kabupaten',$row->kabupaten),
            'alamat'=> set_value('alamat',$row->alamat),
	    );
           $this->template->load('Welcome/halaman','tr_mutasi_barang/tr_mutasi_barang_form', $data);
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

            $this->Mtr_mutasi_barang->update($this->input->post('kode_supplier', TRUE), $data);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<button type="button" class="btn btn-success"> Berhasil Update Supplier</button>');
            redirect(site_url('gudang/tr_mutasi_barang'));
    }          
}

/* End of file gudang.php */
/* Location: ./application/modules/gudang/controllers/gudang.php */