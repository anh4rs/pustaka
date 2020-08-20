<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penerbit extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Penerbit_model', 'penerbit');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->display('backend/penerbit/penerbit_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->penerbit->json();
    }

    public function read($id) 
    {
        $row = $this->penerbit->get_by_id($id);
        if ($row) {
            $data = array(
		'penerbit_id' => $row->penerbit_id,
		'penerbit_nama' => $row->penerbit_nama,
		'created_by' => $row->created_by,
		'created_date' => $row->created_date,
		'updated_by' => $row->updated_by,
		'updated_date' => $row->updated_date,
		'deleted_by' => $row->deleted_by,
		'deleted_date' => $row->deleted_date,
	    );
            $this->template->display('backend/penerbit/penerbit_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penerbit'));
        }
    }
    public function create()
    {
        $data = array(
            '_method' => set_value('add', ''),
            'penerbit_id' => set_value('penerbit_id', ''),
            'penerbit_nama' => set_value('penerbit_nama', ''),
        );
        $msg = [
            'sukses' => $this->load->view('backend/penerbit/penerbit_form', $data, true)
        ];
        echo json_encode($msg);
    }

    public function save()
    {
        if ($this->input->is_ajax_request() == true) {
            $this->_rules();
            if ($this->form_validation->run() == FALSE) {
                $msg = array(
                    'error' => '<div class="alert alert-danger" role="alert">
                ' . validation_errors() . '
              </div>'
                );
            } else {
                $data = array(
                    'penerbit_nama' => $this->input->post('penerbit_nama'),
                    'created_by' => 1,
                    'created_date' => date("Y-m-d H:i:s"),
                );
                $this->penerbit->insert($data);
                $msg = [
                    "sukses" => "<h5>Data disimpan</h5>"
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }

    public function edit()
    {
        if ($this->input->is_ajax_request() == true) {
            $id = $this->input->post('id');
            $row = $this->penerbit->get_by_id($id);
            $data = array(
                '_method' => set_value('_method', 'update'),
                'penerbit_id' => set_value('penerbit_id', $row->penerbit_id),
                'penerbit_nama' => set_value('penerbit_nama', $row->penerbit_nama),
            );
            $msg = [
                'sukses' => $this->load->view('backend/penerbit/penerbit_form', $data, true),
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }

    public function update()
    {
        if ($this->input->is_ajax_request() == true) {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $msg = array(
                    'error' => '<div class="alert alert-danger" role="alert">
                ' . validation_errors() . '
              </div>'
                );
            } else {
                $id = $this->input->post('penerbit_id', true);
                $data = array(
                    'penerbit_nama' => $this->input->post('penerbit_nama'),
                    'updated_by' => 1,
                    'updated_date' => date("Y-m-d H:i:s"),
                );

                $this->penerbit->update($id, $data);
                $msg = [
                    "sukses" => "<h5>Data diperbaharui</h5>"
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }

    public function delete()
    {
        if ($this->input->is_ajax_request() == true) {
            $id = $this->input->post('id', true);
            $row = $this->penerbit->get_by_id($id);

            if ($row) {
                $this->penerbit->delete($id);
                $msg = [
                    "sukses" => "<h5>Data sukses dihapus</h5>"
                ];
                echo json_encode($msg);
            }
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }

    public function _rules()
    {
        $config = array(
            array(
                'field' => 'penerbit_nama',
                'label' => 'Nama penerbit',
                'rules' => 'required',
                'errors' => array(
                    'required' => '%s wajib di isi',
                ),
            ),
        );
        $this->form_validation->set_rules($config);
    }
}
