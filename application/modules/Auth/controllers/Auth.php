<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	   public function __construct(){
        parent::__construct();
        
 }
 
	public function index()
	{
		// $this->template->load('halaman','testkonten');
		$this->load->view('auth/formlogin');
		// echo "string";
	}

	function proses(){
 		$username =trim($_POST['username']);
			$password =trim($_POST['password']);
			$sql      ="SELECT KODE_PENGGUNA,NAMA_PENGGUNA,a.KODE_GROUP,NAMA_GROUP FROM PENGGUNA a
						JOIN GRUP B ON a.KODE_GROUP=B.KODE_GROUP
						WHERE a.USERNAME=? AND a.password=?";
			$query    =$this->db->query($sql,array($username,$password))->row();


		if(count($query)>0){
				$data['pbbterpadu']      ='1';
				$data['nama'] =$query->NAMA_PENGGUNA;
				$data['ku']   =$query->KODE_PENGGUNA;
				$data['kg']   =$query->KODE_GROUP;
				$data['ng']   =$query->NAMA_GROUP;
				$this->session->set_userdata($data);


			/*$data=array(
			'kode_role'     =>'1',
			'kode_pengguna' =>'1',
			'pbbterpadu'         =>1,
			'nama'=>$username
			);*/
			$this->session->set_userdata($data);
			redirect('Welcome');
		}else{
			$this->session->set_flashdata('notif','<div class="badge">
                        Silahkan login dengan username dan password anda.
                        </div>');
			redirect('Auth');
		}
	


	}

	function logout(){
		session_destroy();
		redirect('Auth');
	}

}
