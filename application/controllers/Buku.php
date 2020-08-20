<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Buku extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_model','buku');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->display('backend/buku/buku_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->buku->json();
    }

    public function read($id) 
    {
        $row = $this->buku->get_by_id($id);
        if ($row) {
            $data = array(
		'buku_id' => $row->buku_id,
		'buku_judul' => $row->buku_judul,
		'kategori_id' => $row->kategori_id,
		'penerbit_id' => $row->penerbit_id,
		'buku_isbn' => $row->buku_isbn,
		'buku_pengarang' => $row->buku_pengarang,
		'buku_halaman' => $row->buku_halaman,
		'buku_jumlah' => $row->buku_jumlah,
		'buku_tahun_terbit' => $row->buku_tahun_terbit,
		'buku_gambar' => $row->buku_gambar,
		'buku_sinopsis' => $row->buku_sinopsis,
		'created_by' => $row->created_by,
		'created_date' => $row->created_date,
		'updated_by' => $row->updated_by,
		'updated_date' => $row->updated_date,
		'deleted_by' => $row->deleted_by,
		'deleted_date' => $row->deleted_date,
	    );
            $this->template->display('backend/buku/buku_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('buku'));
        }
    }


	public function create()
	{
		$data = array(
			'_method' => set_value('add', ''),
			'buku_id' => set_value('buku_id'),
			'buku_judul' => set_value('buku_judul'),
			'kategori_id' => set_value('kategori_id'),
			'penerbit_id' => set_value('penerbit_id'),
			'buku_isbn' => set_value('buku_isbn'),
			'buku_pengarang' => set_value('buku_pengarang'),
			'buku_halaman' => set_value('buku_halaman'),
			'buku_jumlah' => set_value('buku_jumlah'),
			'buku_tahun_terbit' => set_value('buku_tahun_terbit'),
			'buku_gambar' => set_value('buku_gambar'),
			'buku_sinopsis' => set_value('buku_sinopsis'),
		);
		$msg = [
			'sukses' => $this->load->view('backend/buku/buku_form', $data, true)
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
					'buku_judul' => $this->input->post('buku_judul', TRUE),
					'kategori_id' => $this->input->post('kategori_id', TRUE),
					'penerbit_id' => $this->input->post('penerbit_id', TRUE),
					'buku_isbn' => $this->input->post('buku_isbn', TRUE),
					'buku_pengarang' => $this->input->post('buku_pengarang', TRUE),
					'buku_halaman' => $this->input->post('buku_halaman', TRUE),
					'buku_jumlah' => $this->input->post('buku_jumlah', TRUE),
					'buku_tahun_terbit' => $this->input->post('buku_tahun_terbit', TRUE),
					'buku_gambar' => $this->input->post('buku_gambar', TRUE),
					'buku_sinopsis' => $this->input->post('buku_sinopsis', TRUE),
					'created_by' => 1,
					'created_date' => date("Y-m-d H:i:s"),
				);
				$this->buku->insert($data);
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
			$row = $this->buku->get_by_id($id);
			$data = array(
				'_method' => set_value('_method', 'update'),
				'buku_id' => set_value('buku_id', $row->buku_id),
				'buku_judul' => set_value('buku_judul', $row->buku_judul),
				'kategori_id' => set_value('kategori_id', $row->kategori_id),
				'penerbit_id' => set_value('penerbit_id', $row->penerbit_id),
				'buku_isbn' => set_value('buku_isbn', $row->buku_isbn),
				'buku_pengarang' => set_value('buku_pengarang', $row->buku_pengarang),
				'buku_halaman' => set_value('buku_halaman', $row->buku_halaman),
				'buku_jumlah' => set_value('buku_jumlah', $row->buku_jumlah),
				'buku_tahun_terbit' => set_value('buku_tahun_terbit', $row->buku_tahun_terbit),
				'buku_gambar' => set_value('buku_gambar', $row->buku_gambar),
				'buku_sinopsis' => set_value('buku_sinopsis', $row->buku_sinopsis),
			);
			$msg = [
				'sukses' => $this->load->view('backend/buku/buku_form', $data, true),
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
				$id = $this->input->post('buku_id', true);
				$data = array(
					'buku_judul' => $this->input->post('buku_judul', TRUE),
					'kategori_id' => $this->input->post('kategori_id', TRUE),
					'penerbit_id' => $this->input->post('penerbit_id', TRUE),
					'buku_isbn' => $this->input->post('buku_isbn', TRUE),
					'buku_pengarang' => $this->input->post('buku_pengarang', TRUE),
					'buku_halaman' => $this->input->post('buku_halaman', TRUE),
					'buku_jumlah' => $this->input->post('buku_jumlah', TRUE),
					'buku_tahun_terbit' => $this->input->post('buku_tahun_terbit', TRUE),
					'buku_gambar' => $this->input->post('buku_gambar', TRUE),
					'buku_sinopsis' => $this->input->post('buku_sinopsis', TRUE),
					'updated_by' => 1,
					'updated_date' => date("Y-m-d H:i:s"),
				);

				$this->buku->update($id, $data);
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
			$row = $this->buku->get_by_id($id);

			if ($row) {
				$this->buku->delete($id);
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
				'field' => 'buku_judul',
				'label' => 'Judul Buku',
				'rules' => 'required',
				'errors' => array(
					'required' => '%s wajib di isi',
				),
			),
		);
		$this->form_validation->set_rules($config);
	}
}
