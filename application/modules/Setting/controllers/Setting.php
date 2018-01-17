<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {
	   public function __construct(){
        parent::__construct();
        $this->load->library('zend'); 
        $this->load->helper('url','form');   
 }
 
	public function index()
	{
		$data['list']=$this->db->query("select kode_menu,nama_menu,link_menu,icon_menu from menu where parent_menu=1 order by sort_menu asc")->result();
		$this->template->load('welcome/halaman','Setting/dashboardsetting',$data);
	}

}
