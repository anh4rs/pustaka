<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Kategori extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Kategori_model','kategori');
		$this->load->library('form_validation');        
		$this->load->library('datatables');
	}

	public function index()
	{
		$this->template->display('backend/kategori/kategori_list');
	} 

	public function json() {
		if ($this->input->is_ajax_request() == true) {
			header('Content-Type: application/json');
			echo $this->kategori->json();
		} else {
			exit('Maaf dilarang mengintip');
		}
	}


	public function create()
	{
		$data = array(
			'_method' => set_value('add', ''),
			'kategori_id' => set_value('kategori_id', ''),
			'kategori_nama' => set_value('kategori_nama', ''),
		);
		$msg = [
			'sukses' => $this->load->view('backend/kategori/kategori_form', $data, true)
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
					'kategori_nama' => $this->input->post('kategori_nama'),
					'created_by' => 1,
					'created_date' => date("Y-m-d H:i:s"),
				);
				$this->kategori->insert($data);
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
			$row = $this->kategori->get_by_id($id);
			$data = array(
				'_method' => set_value('_method', 'update'),
				'kategori_id' => set_value('kategori_id', $row->kategori_id),
				'kategori_nama' => set_value('kategori_nama', $row->kategori_nama),
			);
			$msg = [
				'sukses' => $this->load->view('backend/kategori/kategori_form', $data, true),
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
				$id = $this->input->post('kategori_id', true);
				$data = array(
					'kategori_nama' => $this->input->post('kategori_nama'),
					'updated_by' => 1,
					'updated_date' => date("Y-m-d H:i:s"),
				);

				$this->kategori->update($id, $data);
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
			$row = $this->kategori->get_by_id($id);

			if ($row) {
				$this->kategori->delete($id);
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
				'field' => 'kategori_nama',
				'label' => 'Nama kategori',
				'rules' => 'required',
				'errors' => array(
					'required' => '%s wajib di isi',
				),
			),
		);
		$this->form_validation->set_rules($config);
	}

}