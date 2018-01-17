<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
         
        $this->load->model('Mpengguna');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('welcome/halaman','pengguna/pengguna_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mpengguna->json();
    }

  

    public function create() 
    {
        $data = array(
            'button'        => 'Tambah Pengguna',
            'action'        => site_url('setting/pengguna/create_action'),
            'KODE_PENGGUNA' => set_value('KODE_PENGGUNA'),
            'USERNAME'      => set_value('USERNAME'),
            'PASSWORD'      => set_value('PASSWORD'),
            'NAMA_PENGGUNA' => set_value('NAMA_PENGGUNA'),
            'KODE_GROUP'    => set_value('KODE_GROUP'),
            'group'         => $this->db->query("SELECT KODE_GROUP, NAMA_GROUP FROM GRUP")->result(),
	);
        $this->template->load('welcome/halaman','pengguna/pengguna_form', $data);
    }
    
    public function create_action() 
    {

            $data = array(
        'USERNAME'      => $this->input->post('USERNAME',TRUE),
        'PASSWORD'      => $this->input->post('PASSWORD',TRUE),
        'NAMA_PENGGUNA' => $this->input->post('NAMA_PENGGUNA',TRUE),
        'KODE_GROUP'    => $this->input->post('KODE_GROUP',TRUE),
	    );

            $this->Mpengguna->insert($data);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<button type="button" class="btn btn-danger"> Berhasil Menambah Pengguna</button>');
            redirect(site_url('setting/pengguna'));
        
    }
    
    public function update($id) 
    {
        $row = $this->Mpengguna->get_by_id($id);

        if ($row) {
            $data = array(
                'button'        => 'Update Pengguna',
                'action'        => site_url('setting/pengguna/update_action'),
                'KODE_PENGGUNA' => set_value('KODE_PENGGUNA', $row->kode_pengguna),
                'USERNAME'      => set_value('USERNAME', $row->username),

                'NAMA_PENGGUNA' => set_value('NAMA_PENGGUNA', $row->nama_pengguna),
                'KODE_GROUP'    => set_value('KODE_GROUP', $row->kode_group),
                'group'         => $this->db->query("SELECT KODE_GROUP, NAMA_GROUP FROM GRUP")->result(),
	    );
            $this->template->load('welcome/halaman','pengguna/pengguna_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting/pengguna'));
        }
    }
    
    public function update_action() 
    {

            $data = array(
        'USERNAME'      => $this->input->post('USERNAME',TRUE),
        'NAMA_PENGGUNA' => $this->input->post('NAMA_PENGGUNA',TRUE),
        'KODE_GROUP'    => $this->input->post('KODE_GROUP',TRUE),
        );

            $this->Mpengguna->update($this->input->post('KODE_PENGGUNA', TRUE), $data);
            $this->db->query("commit");
            $this->session->set_flashdata('message', '<button type="button" class="btn btn-danger"> Berhasil Update Pengguna</button>');
            redirect(site_url('setting/pengguna'));
        
    }
    
    public function delete($id) 
    {
        $row = $this->Mpengguna->get_by_id($id);

        if ($row) {
            $this->Mpengguna->delete($id);
            $this->db->query("commit");
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('setting/pengguna'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting/pengguna'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('USERNAME', 'username', 'trim|required');
	$this->form_validation->set_rules('PASSWORD', 'password', 'trim|required');
	$this->form_validation->set_rules('NAMA_PENGGUNA', 'nama pengguna', 'trim|required');
	$this->form_validation->set_rules('KODE_GROUP', 'group', 'trim|required');
	$this->form_validation->set_rules('NIP', 'nip', 'trim|required');
    $this->form_validation->set_rules('KD_SEKSI', 'Seksi', 'trim|required');
	$this->form_validation->set_rules('KODE_PENGGUNA', 'KODE_PENGGUNA', 'trim');
	$this->form_validation->set_error_delimiters('<span class="label label-danger ">', '</span>');
    }

    function _rulesas(){
        $this->form_validation->set_rules('USERNAME', 'username', 'trim|required');
        $this->form_validation->set_rules('NAMA_PENGGUNA', 'nama pengguna', 'trim|required');
        $this->form_validation->set_rules('KODE_GROUP', 'group', 'trim|required');
        $this->form_validation->set_rules('NIP', 'nip', 'trim|required');
        $this->form_validation->set_rules('KD_SEKSI', 'Seksi', 'trim|required');
        $this->form_validation->set_rules('KODE_PENGGUNA', 'KODE_PENGGUNA', 'trim');
        $this->form_validation->set_error_delimiters('<span class ="label label-danger ">', '</span>');
    }

}

/* End of file Pengguna.php */
/* Location: ./application/controllers/Pengguna.php */
/* Generated by Mohamad Wahyu Dewantoro 2017-04-29 07:13:04 */
