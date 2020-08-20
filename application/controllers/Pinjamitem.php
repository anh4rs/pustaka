<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pinjamitem extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pinjamitem_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->display('backend/pinjamitem/pinjamitem_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Pinjamitem_model->json();
    }

    public function read($id) 
    {
        $row = $this->Pinjamitem_model->get_by_id($id);
        if ($row) {
            $data = array(
		'pitem' => $row->pitem,
		'pinjam_id' => $row->pinjam_id,
		'buku_id' => $row->buku_id,
		'jumlah' => $row->jumlah,
	    );
            $this->template->display('backend/pinjamitem/pinjamitem_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pinjamitem'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pinjamitem/create_action'),
	    'pitem' => set_value('pitem'),
	    'pinjam_id' => set_value('pinjam_id'),
	    'buku_id' => set_value('buku_id'),
	    'jumlah' => set_value('jumlah'),
	);
        $this->template->display('backend/pinjamitem/pinjamitem_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'pinjam_id' => $this->input->post('pinjam_id',TRUE),
		'buku_id' => $this->input->post('buku_id',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
	    );

            $this->Pinjamitem_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pinjamitem'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pinjamitem_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pinjamitem/update_action'),
		'pitem' => set_value('pitem', $row->pitem),
		'pinjam_id' => set_value('pinjam_id', $row->pinjam_id),
		'buku_id' => set_value('buku_id', $row->buku_id),
		'jumlah' => set_value('jumlah', $row->jumlah),
	    );
            $this->template->display('backend/pinjamitem/pinjamitem_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pinjamitem'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('pitem', TRUE));
        } else {
            $data = array(
		'pinjam_id' => $this->input->post('pinjam_id',TRUE),
		'buku_id' => $this->input->post('buku_id',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
	    );

            $this->Pinjamitem_model->update($this->input->post('pitem', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pinjamitem'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pinjamitem_model->get_by_id($id);

        if ($row) {
            $this->Pinjamitem_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pinjamitem'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pinjamitem'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pinjam_id', 'pinjam id', 'trim|required');
	$this->form_validation->set_rules('buku_id', 'buku id', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');

	$this->form_validation->set_rules('pitem', 'pitem', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pinjamitem.php */
/* Location: ./application/controllers/Pinjamitem.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-20 16:35:53 */
/* http://harviacode.com */