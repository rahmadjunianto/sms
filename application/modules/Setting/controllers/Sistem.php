<?php 
	if (!defined('BASEPATH'))exit('No direct script access allowed');

	class Sistem extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('msistem');
		 
		
	}

	
	function privilege(){
			$data['data']=$this->db->query("SELECT NAMA_GROUP,KODE_GROUP FROM grup ORDER BY nama_group ASC")->result_array();
        	 $this->template->load('Welcome/halaman','privilege',$data);
			
	}

		 
	function settingPrivilege($kode){
        $data['role']        =$this->msistem->getMenu($kode);
        $data['kode_groupq'] =$kode;
        $data['ng']          =$this->db->query("SELECT nama_group FROM grup WHERE kode_group='$kode'")->row();
         $this->template->load('Welcome/halaman','settingPrivilege',$data);
    }

	function do_role(){
	        $kode_group =$_POST['kode_group'];
	        $role       =$_POST['role'];
	        $role=$this->msistem->do_role($kode_group,$role);
	        if($role){
	        	$this->session->set_flashdata('message', '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Role berhasil disimpan</div>');
	                        // echo "<script>window.alert('Data tersimpan !');
	                  // window.location='".site_url()."sistem/privilege';</script>";
	        	redirect('setting/sistem/privilege');
	        }else{
	        	$this->session->set_flashdata('message', '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Role tidak tersimpan</div>');
	        	redirect('setting/sistem/privilege');
	        }
	 } 

 
}