<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kembali extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kembali_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->display('backend/kembali/kembali_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Kembali_model->json();
    }

    public function read($id) 
    {
        $row = $this->Kembali_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kembali_id' => $row->kembali_id,
		'pinjam_id' => $row->pinjam_id,
		'tgl_kembali' => $row->tgl_kembali,
		'denda' => $row->denda,
		'created_by' => $row->created_by,
		'created_date' => $row->created_date,
		'updated_by' => $row->updated_by,
		'updated_date' => $row->updated_date,
		'deleted_by' => $row->deleted_by,
		'deleted_date' => $row->deleted_date,
	    );
            $this->template->display('backend/kembali/kembali_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kembali'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kembali/create_action'),
	    'kembali_id' => set_value('kembali_id'),
	    'pinjam_id' => set_value('pinjam_id'),
	    'tgl_kembali' => set_value('tgl_kembali'),
	    'denda' => set_value('denda'),
	    'created_by' => set_value('created_by'),
	    'created_date' => set_value('created_date'),
	    'updated_by' => set_value('updated_by'),
	    'updated_date' => set_value('updated_date'),
	    'deleted_by' => set_value('deleted_by'),
	    'deleted_date' => set_value('deleted_date'),
	);
        $this->template->display('backend/kembali/kembali_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'pinjam_id' => $this->input->post('pinjam_id',TRUE),
		'tgl_kembali' => $this->input->post('tgl_kembali',TRUE),
		'denda' => $this->input->post('denda',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'deleted_by' => $this->input->post('deleted_by',TRUE),
		'deleted_date' => $this->input->post('deleted_date',TRUE),
	    );

            $this->Kembali_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kembali'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kembali_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kembali/update_action'),
		'kembali_id' => set_value('kembali_id', $row->kembali_id),
		'pinjam_id' => set_value('pinjam_id', $row->pinjam_id),
		'tgl_kembali' => set_value('tgl_kembali', $row->tgl_kembali),
		'denda' => set_value('denda', $row->denda),
		'created_by' => set_value('created_by', $row->created_by),
		'created_date' => set_value('created_date', $row->created_date),
		'updated_by' => set_value('updated_by', $row->updated_by),
		'updated_date' => set_value('updated_date', $row->updated_date),
		'deleted_by' => set_value('deleted_by', $row->deleted_by),
		'deleted_date' => set_value('deleted_date', $row->deleted_date),
	    );
            $this->template->display('backend/kembali/kembali_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kembali'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kembali_id', TRUE));
        } else {
            $data = array(
		'pinjam_id' => $this->input->post('pinjam_id',TRUE),
		'tgl_kembali' => $this->input->post('tgl_kembali',TRUE),
		'denda' => $this->input->post('denda',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'deleted_by' => $this->input->post('deleted_by',TRUE),
		'deleted_date' => $this->input->post('deleted_date',TRUE),
	    );

            $this->Kembali_model->update($this->input->post('kembali_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kembali'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kembali_model->get_by_id($id);

        if ($row) {
            $this->Kembali_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kembali'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kembali'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pinjam_id', 'pinjam id', 'trim|required');
	$this->form_validation->set_rules('tgl_kembali', 'tgl kembali', 'trim|required');
	$this->form_validation->set_rules('denda', 'denda', 'trim|required');
	$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
	$this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');
	$this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');
	$this->form_validation->set_rules('deleted_by', 'deleted by', 'trim|required');
	$this->form_validation->set_rules('deleted_date', 'deleted date', 'trim|required');

	$this->form_validation->set_rules('kembali_id', 'kembali_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kembali.php */
/* Location: ./application/controllers/Kembali.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-20 16:35:52 */
/* http://harviacode.com */