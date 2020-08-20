<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->display('backend/user/user_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->User_model->json();
    }

    public function read($id) 
    {
        $row = $this->User_model->get_by_id($id);
        if ($row) {
            $data = array(
		'user_id' => $row->user_id,
		'user_username' => $row->user_username,
		'user_password' => $row->user_password,
		'user_realname' => $row->user_realname,
		'user_role' => $row->user_role,
		'created_by' => $row->created_by,
		'created_date' => $row->created_date,
		'updated_by' => $row->updated_by,
		'updated_date' => $row->updated_date,
		'deleted_by' => $row->deleted_by,
		'deleted_date' => $row->deleted_date,
	    );
            $this->template->display('backend/user/user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('user/create_action'),
	    'user_id' => set_value('user_id'),
	    'user_username' => set_value('user_username'),
	    'user_password' => set_value('user_password'),
	    'user_realname' => set_value('user_realname'),
	    'user_role' => set_value('user_role'),
	    'created_by' => set_value('created_by'),
	    'created_date' => set_value('created_date'),
	    'updated_by' => set_value('updated_by'),
	    'updated_date' => set_value('updated_date'),
	    'deleted_by' => set_value('deleted_by'),
	    'deleted_date' => set_value('deleted_date'),
	);
        $this->template->display('backend/user/user_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'user_username' => $this->input->post('user_username',TRUE),
		'user_password' => $this->input->post('user_password',TRUE),
		'user_realname' => $this->input->post('user_realname',TRUE),
		'user_role' => $this->input->post('user_role',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'deleted_by' => $this->input->post('deleted_by',TRUE),
		'deleted_date' => $this->input->post('deleted_date',TRUE),
	    );

            $this->User_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/update_action'),
		'user_id' => set_value('user_id', $row->user_id),
		'user_username' => set_value('user_username', $row->user_username),
		'user_password' => set_value('user_password', $row->user_password),
		'user_realname' => set_value('user_realname', $row->user_realname),
		'user_role' => set_value('user_role', $row->user_role),
		'created_by' => set_value('created_by', $row->created_by),
		'created_date' => set_value('created_date', $row->created_date),
		'updated_by' => set_value('updated_by', $row->updated_by),
		'updated_date' => set_value('updated_date', $row->updated_date),
		'deleted_by' => set_value('deleted_by', $row->deleted_by),
		'deleted_date' => set_value('deleted_date', $row->deleted_date),
	    );
            $this->template->display('backend/user/user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('user_id', TRUE));
        } else {
            $data = array(
		'user_username' => $this->input->post('user_username',TRUE),
		'user_password' => $this->input->post('user_password',TRUE),
		'user_realname' => $this->input->post('user_realname',TRUE),
		'user_role' => $this->input->post('user_role',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'deleted_by' => $this->input->post('deleted_by',TRUE),
		'deleted_date' => $this->input->post('deleted_date',TRUE),
	    );

            $this->User_model->update($this->input->post('user_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('user_username', 'user username', 'trim|required');
	$this->form_validation->set_rules('user_password', 'user password', 'trim|required');
	$this->form_validation->set_rules('user_realname', 'user realname', 'trim|required');
	$this->form_validation->set_rules('user_role', 'user role', 'trim|required');
	$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
	$this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');
	$this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');
	$this->form_validation->set_rules('deleted_by', 'deleted by', 'trim|required');
	$this->form_validation->set_rules('deleted_date', 'deleted date', 'trim|required');

	$this->form_validation->set_rules('user_id', 'user_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-20 16:35:53 */
/* http://harviacode.com */