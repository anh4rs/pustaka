<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Siswa extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Siswa_model', 'siswa');
		$this->load->library('form_validation');
		$this->load->library('datatables');
	}

	public function index()
	{
		$this->template->display('backend/siswa/siswa_list');
	}

	public function json()
	{
		header('Content-Type: application/json');
		echo $this->siswa->json();
	}

	public function read($id)
	{
		$row = $this->siswa->get_by_id($id);
		if ($row) {
			$data = array(
				'siswa_id' => $row->siswa_id,
				'siswa_nama' => $row->siswa_nama,
				'siswa_nisn' => $row->siswa_nisn,
				'siswa_kelamin' => $row->siswa_kelamin,
				'siswa_agama' => $row->siswa_agama,
				'siswa_tempat_lhr' => $row->siswa_tempat_lhr,
				'siswa_tanggal_lhr' => $row->siswa_tanggal_lhr,
				'siswa_alamat' => $row->siswa_alamat,
				'siswa_no_hp' => $row->siswa_no_hp,
				'siswa_foto' => $row->siswa_foto,
				'created_by' => $row->created_by,
				'created_date' => $row->created_date,
				'updated_by' => $row->updated_by,
				'updated_date' => $row->updated_date,
				'deleted_by' => $row->deleted_by,
				'deleted_date' => $row->deleted_date,
			);
			$this->template->display('backend/siswa/siswa_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('siswa'));
		}
	}
	public function create()
	{
		$data = array(
			'_method' => set_value('add', ''),
			'siswa_id' => set_value('siswa_id'),
			'siswa_nama' => set_value('siswa_nama'),
			'siswa_nisn' => set_value('siswa_nisn'),
			'siswa_kelamin' => set_value('siswa_kelamin'),
			'siswa_agama' => set_value('siswa_agama'),
			'siswa_tempat_lhr' => set_value('siswa_tempat_lhr'),
			'siswa_tanggal_lhr' => set_value('siswa_tanggal_lhr'),
			'siswa_alamat' => set_value('siswa_alamat'),
			'siswa_no_hp' => set_value('siswa_no_hp'),
			'siswa_foto' => set_value('siswa_foto'),
		);
		$msg = [
			'sukses' => $this->load->view('backend/siswa/siswa_form', $data, true)
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
					'siswa_nama' => $this->input->post('siswa_nama', TRUE),
					'siswa_nisn' => $this->input->post('siswa_nisn', TRUE),
					'siswa_kelamin' => $this->input->post('siswa_kelamin', TRUE),
					'siswa_agama' => $this->input->post('siswa_agama', TRUE),
					'siswa_tempat_lhr' => $this->input->post('siswa_tempat_lhr', TRUE),
					'siswa_tanggal_lhr' => $this->input->post('siswa_tanggal_lhr', TRUE),
					'siswa_alamat' => $this->input->post('siswa_alamat', TRUE),
					'siswa_no_hp' => $this->input->post('siswa_no_hp', TRUE),
					'siswa_foto' => $this->input->post('siswa_foto', TRUE),
					'created_by' => 1,
					'created_date' => date("Y-m-d H:i:s"),
				);
				$this->siswa->insert($data);
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
			$row = $this->siswa->get_by_id($id);
			$data = array(
				'_method' => set_value('_method', 'update'),
				'siswa_id' => set_value('siswa_id', $row->siswa_id),
				'siswa_nama' => set_value('siswa_nama', $row->siswa_nama),
				'siswa_nisn' => set_value('siswa_nisn', $row->siswa_nisn),
				'siswa_kelamin' => set_value('siswa_kelamin', $row->siswa_kelamin),
				'siswa_agama' => set_value('siswa_agama', $row->siswa_agama),
				'siswa_tempat_lhr' => set_value('siswa_tempat_lhr', $row->siswa_tempat_lhr),
				'siswa_tanggal_lhr' => set_value('siswa_tanggal_lhr', $row->siswa_tanggal_lhr),
				'siswa_alamat' => set_value('siswa_alamat', $row->siswa_alamat),
				'siswa_no_hp' => set_value('siswa_no_hp', $row->siswa_no_hp),
				'siswa_foto' => set_value('siswa_foto', $row->siswa_foto),
			);
			$msg = [
				'sukses' => $this->load->view('backend/siswa/siswa_form', $data, true),
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
				$id = $this->input->post('siswa_id', true);
				$data = array(
					'siswa_nama' => $this->input->post('siswa_nama', TRUE),
					'siswa_nisn' => $this->input->post('siswa_nisn', TRUE),
					'siswa_kelamin' => $this->input->post('siswa_kelamin', TRUE),
					'siswa_agama' => $this->input->post('siswa_agama', TRUE),
					'siswa_tempat_lhr' => $this->input->post('siswa_tempat_lhr', TRUE),
					'siswa_tanggal_lhr' => $this->input->post('siswa_tanggal_lhr', TRUE),
					'siswa_alamat' => $this->input->post('siswa_alamat', TRUE),
					'siswa_no_hp' => $this->input->post('siswa_no_hp', TRUE),
					'siswa_foto' => $this->input->post('siswa_foto', TRUE),
					'updated_by' => 1,
					'updated_date' => date("Y-m-d H:i:s"),
				);

				$this->siswa->update($id, $data);
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
			$row = $this->siswa->get_by_id($id);

			if ($row) {
				$this->siswa->delete($id);
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
				'field' => 'siswa_nama',
				'label' => 'Nama siswa',
				'rules' => 'required',
				'errors' => array(
					'required' => '%s wajib di isi',
				),
			),
		);
		$this->form_validation->set_rules($config);
	}
}
