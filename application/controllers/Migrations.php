<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Migrations extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Migrations_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->display('backend/migrations/migrations_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Migrations_model->json();
    }

    public function read($id) 
    {
        $row = $this->Migrations_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'version' => $row->version,
		'class' => $row->class,
		'group' => $row->group,
		'namespace' => $row->namespace,
		'time' => $row->time,
		'batch' => $row->batch,
	    );
            $this->template->display('backend/migrations/migrations_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('migrations'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('migrations/create_action'),
	    'id' => set_value('id'),
	    'version' => set_value('version'),
	    'class' => set_value('class'),
	    'group' => set_value('group'),
	    'namespace' => set_value('namespace'),
	    'time' => set_value('time'),
	    'batch' => set_value('batch'),
	);
        $this->template->display('backend/migrations/migrations_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'version' => $this->input->post('version',TRUE),
		'class' => $this->input->post('class',TRUE),
		'group' => $this->input->post('group',TRUE),
		'namespace' => $this->input->post('namespace',TRUE),
		'time' => $this->input->post('time',TRUE),
		'batch' => $this->input->post('batch',TRUE),
	    );

            $this->Migrations_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('migrations'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Migrations_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('migrations/update_action'),
		'id' => set_value('id', $row->id),
		'version' => set_value('version', $row->version),
		'class' => set_value('class', $row->class),
		'group' => set_value('group', $row->group),
		'namespace' => set_value('namespace', $row->namespace),
		'time' => set_value('time', $row->time),
		'batch' => set_value('batch', $row->batch),
	    );
            $this->template->display('backend/migrations/migrations_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('migrations'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'version' => $this->input->post('version',TRUE),
		'class' => $this->input->post('class',TRUE),
		'group' => $this->input->post('group',TRUE),
		'namespace' => $this->input->post('namespace',TRUE),
		'time' => $this->input->post('time',TRUE),
		'batch' => $this->input->post('batch',TRUE),
	    );

            $this->Migrations_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('migrations'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Migrations_model->get_by_id($id);

        if ($row) {
            $this->Migrations_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('migrations'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('migrations'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('version', 'version', 'trim|required');
	$this->form_validation->set_rules('class', 'class', 'trim|required');
	$this->form_validation->set_rules('group', 'group', 'trim|required');
	$this->form_validation->set_rules('namespace', 'namespace', 'trim|required');
	$this->form_validation->set_rules('time', 'time', 'trim|required');
	$this->form_validation->set_rules('batch', 'batch', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Migrations.php */
/* Location: ./application/controllers/Migrations.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-20 16:35:52 */
/* http://harviacode.com */