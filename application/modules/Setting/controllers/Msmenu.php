<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Msmenu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Mmenu');
        $this->load->library('form_validation');        
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('Welcome/halaman','menu/menu_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mmenu->json();
    }

    public function read($id) 
    {
        $row = $this->Mmenu->get_by_id($id);
        if ($row) {
            $data = array(
		'kode_menu' => $row->kode_menu,
		'nama_menu' => $row->nama_menu,
		'link_menu' => $row->link_menu,
		'parent_menu' => $row->parent_menu,
		'sort_menu' => $row->sort_menu,
		'icon_menu' => $row->icon_menu,
		'active' => $row->active,
	    );
            $this->load->view('menu/', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

    public function create() 
    {
        $data = array(
            'button'      => 'Tambah Menu',
            'action'      => site_url('Setting/Msmenu/create_action'),
            'kode_menu'   => set_value('kode_menu'),
            'nama_menu'   => set_value('nama_menu'),
            'link_menu'   => set_value('link_menu'),
            'parent_menu' => set_value('parent_menu'),
            'sort_menu'   => set_value('sort_menu'),
            'icon_menu'   => set_value('icon_menu'),
            'active'      => set_value('active'),
            'kd_parent'      => set_value('kd_parent'),
            'icon'        =>$this->db->query("SELECT ICON icon FROM ICON")->result(),
            'parent'      =>$this->Mmenu->ListParent()

            // 'parent'      =>$this->db->query("SELECT kode_menu,nama_menu FROM p_menu WHERE parent_menu='0' ORDER BY sort_menu ASC")->result(),

	);
        $this->template->load('Welcome/halaman','menu/menu_form',$data);
    }
    
    public function create_action() 
    {

            $data = array(
                'NAMA_MENU'   => $this->input->post('nama_menu',TRUE),
                'LINK_MENU'   => $this->input->post('link_menu',TRUE),
                'PARENT_MENU' => $this->input->post('parent_menu',TRUE),
                'SORT_MENU'   => $this->input->post('sort_menu',TRUE),
                'ICON_MENU'   => $this->input->post('icon_menu',TRUE),
                'ACTIVE'      => $this->input->post('active',TRUE),
	    );
            $this->Mmenu->insert($data); 
            redirect(site_url('Setting/Msmenu'));
 
    }
    
    public function update($id) 
    {
        $row = $this->Mmenu->get_by_id($id);

        if ($row) {
            $data = array(
                'button'      => 'Update Menu',
                'action'      => site_url('menu/update_action'),
                'kode_menu'   => set_value('kode_menu', $row->KODE_MENU),
                'nama_menu'   => set_value('nama_menu', $row->NAMA_MENU),
                'link_menu'   => set_value('link_menu', $row->LINK_MENU),
                'parent_menu' => set_value('parent_menu', $row->PARENT_MENU),
                'sort_menu'   => set_value('sort_menu', $row->SORT_MENU),
                'icon_menu'   => set_value('icon_menu', $row->ICON_MENU),
                'active'      => set_value('active', $row->ACTIVE),
                'icon'        =>$this->db->query("SELECT icon FROM p_icon")->result(),
            'parent'=>$this->db->query("SELECT kode_menu,nama_menu FROM p_menu WHERE parent_menu='0' ORDER BY sort_menu ASC")->result(),
	    );
            $this->template->load('Welcome/halaman','menu/menu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kode_menu', TRUE));
        } else {
            $data = array(
		'NAMA_MENU' => $this->input->post('nama_menu',TRUE),
		'LINK_MENU' => $this->input->post('link_menu',TRUE),
		'PARENT_MENU' => $this->input->post('parent_menu',TRUE),
		'SORT_MENU' => $this->input->post('sort_menu',TRUE),
		'ICON_MENU' => $this->input->post('icon_menu',TRUE),
		'ACTIVE' => $this->input->post('active',TRUE),
	    );

            $this->Mmenu->update($this->input->post('kode_menu', TRUE), $data);
            $this->db->query("commit");
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('menu'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mmenu->get_by_id($id);

        if ($row) {
            $this->Mmenu->delete($id);
            $this->session->set_flashdata('message', ' <button type="button" class="btn btn-danger"> '.$row->nama_menu.' Berhasil Dihapus</button>');
            redirect(site_url('Setting/Msmenu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Setting/Msmenu'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_menu', 'nama menu', 'trim|required');
	$this->form_validation->set_rules('link_menu', 'link menu', 'trim|required');
	$this->form_validation->set_rules('parent_menu', 'parent menu', 'trim|required');
	$this->form_validation->set_rules('sort_menu', 'sort menu', 'trim|required');
	$this->form_validation->set_rules('icon_menu', 'icon menu', 'trim|required');
	$this->form_validation->set_rules('active', 'active', 'trim|required');

	$this->form_validation->set_rules('kode_menu', 'kode_menu', 'trim');
	$this->form_validation->set_error_delimiters('<span class="label label-danger ">', '</span>');
    }

    function getParent(){
        $parent=$_POST['kd_portal'];
        
        $data['parent']=$parent;
        $data['rk']=$this->db->query("SELECT KODE_MENU,NAMA_MENU FROM P_MENU WHERE PARENT_MENU=$parent ORDER BY SORT_MENU ASC")->result();
        // print_r($data);
        $this->load->view('menu/getParent',$data);
    }

}

/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */
/* Generated by Mohamad Wahyu Dewantoro 2017-04-08 05:30:08 */
