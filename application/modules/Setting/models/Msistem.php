<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Msistem extends CI_Model {


	function getGroup($where=""){
		return $this->db->query("SELECT * FROM GRUP ".$where)->result_array();
	}

	function getMenu($id){
		$cm=$this->db->query('SELECT KODE_MENU FROM MENU')->result_array();
		foreach($cm as $rm){
			$KODE_MENU=$rm['KODE_MENU'];
			$sql="SELECT KODE_MENU from ROLE WHERE KODE_GROUP='$id' AND KODE_MENU='$KODE_MENU'";
			$qcm=$this->db->query($sql)->num_rows();
			if($qcm == null){
				$data=array('KODE_MENU'=>$KODE_MENU,'KODE_GROUP'=>$id);

				$this->db->insert('ROLE',$data);
			}
		}

		$qr=$this->db->query("SELECT * FROM (
								SELECT kode_role,nama_menu,CASE parent_menu WHEN 0 THEN '#'  ELSE NULL END AS parent,status_role,a.sort_menu sort
								FROM MENU a , ROLE b WHERE a.KODE_MENU=b.KODE_MENU AND parent_menu=0 AND KODE_GROUP='$id' 
								UNION 
									SELECT kode_role,a.nama_menu,b.nama_menu parent,status_role,a.sort_menu
									FROM MENU a,(SELECT KODE_MENU,nama_menu FROM MENU) b, ROLE c WHERE a.parent_menu=b.KODE_MENU AND a.KODE_MENU=c.KODE_MENU AND KODE_GROUP='$id' ) cb ORDER BY parent asc,cb.sort ASC")->result_array();
		return $qr;		
	}

	function do_role($KODE_GROUP,$role){
		$ua=$this->db->query("UPDATE ROLE SET status_role='0' WHERE KODE_GROUP ='$KODE_GROUP'");
		if($ua){
			$jumlah=count($role);
			for($i=0; $i < $jumlah; $i++){
				$kode_role=$role[$i];
				$ur=$this->db->query("UPDATE ROLE SET status_role='1' WHERE kode_role='$kode_role'");
			}
		}

		return $ur;
	}

	function dataPengguna(){
		return $this->db->query("SELECT a.kode_user,nama,email,nama_group
									FROM p_user a
									JOIN GRUP b ON a.`KODE_GROUP`=b.`KODE_GROUP` ORDER BY nama_group ASC")->result_array();
	}

	function kirimEmail($tujuan,$subjek,$isi) {
  			$this->load->library('email');

				$htmlContent        = '<h1>Mengirim email HTML dengan Codeigniter</h1>';
				$htmlContent        .= '<div>Contoh pengiriman email yang memiliki tag HTML dengan menggunakan Codeigniter</div>';
				
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->to('dewwwantoro@gmail.com');
				$this->email->from('mojorotodev@gmail.com');
				$this->email->subject('Test Email (HTML)');
				$this->email->message($htmlContent);
				if($this->email->send()){
                        	echo "jos";
                        }else{
						
							show_error($this->email->print_debugger());
						}
/*

						$config['protocol']             = 'stmp';
                        $config['imap_host']            = 'ssl://imap.gmail.com';
                        $config['imap_user']            = 'mojorotodev@gmail.com';
                        $config['imap_pass']            = 'sjpatmonem2016';
                        $config['imap_port']            = '993';
                        $config['imap_mailbox']         = 'INBOX';
                        $config['imap_server_encoding'] = 'utf-8';
                        $config['imap_attachemnt_dir']  = './tmp/';
                        $config['mailtype']             = 'text';
                        $config['newline']              = '\r\n';
                        $this->load->library('email');
                        $this->email->initialize($config);
                             
                        $this->email->from('mojorotodev@gmail.com', 'PRINDEL');
                        $this->email->to($tujuan);
                        $this->email->subject($subjek);
                        $this->email->message($isi);
                        
                        if($this->email->send()){
                        	echo "jos";
                        }else{
						
							show_error($this->email->print_debugger());
						}*/


    }
 
}
