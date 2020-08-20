<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pinjam extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pinjam_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->display('backend/pinjam/pinjam_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Pinjam_model->json();
    }

    public function read($id) 
    {
        $row = $this->Pinjam_model->get_by_id($id);
        if ($row) {
            $data = array(
		'pinjam_id' => $row->pinjam_id,
		'kodeunik_pinjam' => $row->kodeunik_pinjam,
		'pinjam_tanggal' => $row->pinjam_tanggal,
		'siswa_id' => $row->siswa_id,
		'pinjam_ket' => $row->pinjam_ket,
		'pinjam_lama' => $row->pinjam_lama,
		'pinjam_status' => $row->pinjam_status,
		'created_by' => $row->created_by,
		'created_date' => $row->created_date,
		'updated_by' => $row->updated_by,
		'updated_date' => $row->updated_date,
		'deleted_by' => $row->deleted_by,
		'deleted_date' => $row->deleted_date,
	    );
            $this->template->display('backend/pinjam/pinjam_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pinjam'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pinjam/create_action'),
	    'pinjam_id' => set_value('pinjam_id'),
	    'kodeunik_pinjam' => set_value('kodeunik_pinjam'),
	    'pinjam_tanggal' => set_value('pinjam_tanggal'),
	    'siswa_id' => set_value('siswa_id'),
	    'pinjam_ket' => set_value('pinjam_ket'),
	    'pinjam_lama' => set_value('pinjam_lama'),
	    'pinjam_status' => set_value('pinjam_status'),
	    'created_by' => set_value('created_by'),
	    'created_date' => set_value('created_date'),
	    'updated_by' => set_value('updated_by'),
	    'updated_date' => set_value('updated_date'),
	    'deleted_by' => set_value('deleted_by'),
	    'deleted_date' => set_value('deleted_date'),
	);
        $this->template->display('backend/pinjam/pinjam_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kodeunik_pinjam' => $this->input->post('kodeunik_pinjam',TRUE),
		'pinjam_tanggal' => $this->input->post('pinjam_tanggal',TRUE),
		'siswa_id' => $this->input->post('siswa_id',TRUE),
		'pinjam_ket' => $this->input->post('pinjam_ket',TRUE),
		'pinjam_lama' => $this->input->post('pinjam_lama',TRUE),
		'pinjam_status' => $this->input->post('pinjam_status',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'deleted_by' => $this->input->post('deleted_by',TRUE),
		'deleted_date' => $this->input->post('deleted_date',TRUE),
	    );

            $this->Pinjam_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pinjam'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pinjam_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pinjam/update_action'),
		'pinjam_id' => set_value('pinjam_id', $row->pinjam_id),
		'kodeunik_pinjam' => set_value('kodeunik_pinjam', $row->kodeunik_pinjam),
		'pinjam_tanggal' => set_value('pinjam_tanggal', $row->pinjam_tanggal),
		'siswa_id' => set_value('siswa_id', $row->siswa_id),
		'pinjam_ket' => set_value('pinjam_ket', $row->pinjam_ket),
		'pinjam_lama' => set_value('pinjam_lama', $row->pinjam_lama),
		'pinjam_status' => set_value('pinjam_status', $row->pinjam_status),
		'created_by' => set_value('created_by', $row->created_by),
		'created_date' => set_value('created_date', $row->created_date),
		'updated_by' => set_value('updated_by', $row->updated_by),
		'updated_date' => set_value('updated_date', $row->updated_date),
		'deleted_by' => set_value('deleted_by', $row->deleted_by),
		'deleted_date' => set_value('deleted_date', $row->deleted_date),
	    );
            $this->template->display('backend/pinjam/pinjam_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pinjam'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('pinjam_id', TRUE));
        } else {
            $data = array(
		'kodeunik_pinjam' => $this->input->post('kodeunik_pinjam',TRUE),
		'pinjam_tanggal' => $this->input->post('pinjam_tanggal',TRUE),
		'siswa_id' => $this->input->post('siswa_id',TRUE),
		'pinjam_ket' => $this->input->post('pinjam_ket',TRUE),
		'pinjam_lama' => $this->input->post('pinjam_lama',TRUE),
		'pinjam_status' => $this->input->post('pinjam_status',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'deleted_by' => $this->input->post('deleted_by',TRUE),
		'deleted_date' => $this->input->post('deleted_date',TRUE),
	    );

            $this->Pinjam_model->update($this->input->post('pinjam_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pinjam'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pinjam_model->get_by_id($id);

        if ($row) {
            $this->Pinjam_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pinjam'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pinjam'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kodeunik_pinjam', 'kodeunik pinjam', 'trim|required');
	$this->form_validation->set_rules('pinjam_tanggal', 'pinjam tanggal', 'trim|required');
	$this->form_validation->set_rules('siswa_id', 'siswa id', 'trim|required');
	$this->form_validation->set_rules('pinjam_ket', 'pinjam ket', 'trim|required');
	$this->form_validation->set_rules('pinjam_lama', 'pinjam lama', 'trim|required');
	$this->form_validation->set_rules('pinjam_status', 'pinjam status', 'trim|required');
	$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
	$this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');
	$this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');
	$this->form_validation->set_rules('deleted_by', 'deleted by', 'trim|required');
	$this->form_validation->set_rules('deleted_date', 'deleted date', 'trim|required');

	$this->form_validation->set_rules('pinjam_id', 'pinjam_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pinjam.php */
/* Location: ./application/controllers/Pinjam.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-20 16:35:53 */
/* http://harviacode.com */