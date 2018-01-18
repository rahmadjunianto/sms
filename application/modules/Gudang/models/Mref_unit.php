<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mref_unit extends CI_Model
{

    public $table = 'ref_unit';
    public $id = 'kd_unit';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json_unit() {
        $this->datatables->select('kd_unit,nm_unit');
        $this->datatables->from('ref_unit');
        $this->datatables->add_column('action', '<div class="btn-group">'.anchor(site_url('gudang/ref_unit/update/$1'),'<i class="fa fa-edit"></i>','class="btn btn-xs btn-success"').anchor(site_url('gudang/ref_unit/delete/$1'),'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger" onclick="javasciprt: return confirm(\'Apakah anda yakin?\')"').'</div>', 'kd_unit');
        return $this->datatables->generate();
    }
 
    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
  

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }


    function ListParent(){
        return $this->db->query("SELECT kode_menu,nama_menu FROM MENU WHERE PARENT_MENU=0 ORDER BY SORT_MENU ASC")->result();
    }

}

/* End of file Mmenu.php */
/* Location: ./application/models/Mmenu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-08 05:30:09 */
/* http://harviacode.com */