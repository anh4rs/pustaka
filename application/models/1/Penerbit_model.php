<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penerbit_model extends CI_Model
{

    public $table = 'penerbit';
    public $id = 'penerbit_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('penerbit_id,penerbit_nama,created_by,created_date,updated_by,updated_date,deleted_by,deleted_date');
        $this->datatables->from('penerbit');
        //add this line for join
        //$this->datatables->join('table2', 'penerbit.field = table2.field');
        $this->datatables->add_column('action', '
        	<button type="button" class="btn btn-info btn-sm" onclick="btnEdit(\'$1\')" title="Edit"> <i class="fa fa-pencil" aria-hidden="true"></i> </button>
        	<button type="button" class="btn btn-danger btn-sm" onclick="btnDel(\'$1\')" title="Hapus"> <i class="fa fa-trash" aria-hidden="true"></i> </button>
        	', 'penerbit_id');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('penerbit_id', $q);
	$this->db->or_like('penerbit_nama', $q);
	$this->db->or_like('created_by', $q);
	$this->db->or_like('created_date', $q);
	$this->db->or_like('updated_by', $q);
	$this->db->or_like('updated_date', $q);
	$this->db->or_like('deleted_by', $q);
	$this->db->or_like('deleted_date', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('penerbit_id', $q);
	$this->db->or_like('penerbit_nama', $q);
	$this->db->or_like('created_by', $q);
	$this->db->or_like('created_date', $q);
	$this->db->or_like('updated_by', $q);
	$this->db->or_like('updated_date', $q);
	$this->db->or_like('deleted_by', $q);
	$this->db->or_like('deleted_date', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
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

}

/* End of file Penerbit_model.php */
/* Location: ./application/models/Penerbit_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-20 15:04:50 */
/* http://harviacode.com */