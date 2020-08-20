<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengadaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pengadaan_model', 'pengadaan');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->display('backend/pengadaan/pengadaan_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->pengadaan->json();
    }

    public function read($id)
    {
        $row = $this->pengadaan->get_by_id($id);
        if ($row) {
            $data = array(
                'pengadaan_id' => $row->pengadaan_id,
                'pengadaan_tanggal' => $row->pengadaan_tanggal,
                'buku_id' => $row->buku_id,
                'pengadaan_asal_buku' => $row->pengadaan_asal_buku,
                'pengadaan_jumlah' => $row->pengadaan_jumlah,
                'pengadaan_keterangan' => $row->pengadaan_keterangan,
                'created_by' => $row->created_by,
                'created_date' => $row->created_date,
                'updated_by' => $row->updated_by,
                'updated_date' => $row->updated_date,
                'deleted_by' => $row->deleted_by,
                'deleted_date' => $row->deleted_date,
            );
            $this->template->display('backend/pengadaan/pengadaan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengadaan'));
        }
    }
    public function create()
    {
        $data = array(
            '_method' => set_value('add', ''),
            'pengadaan_id' => set_value('pengadaan_id'),
            'pengadaan_tanggal' => set_value('pengadaan_tanggal'),
            'buku_id' => set_value('buku_id'),
            'pengadaan_asal_buku' => set_value('pengadaan_asal_buku'),
            'pengadaan_jumlah' => set_value('pengadaan_jumlah'),
            'pengadaan_keterangan' => set_value('pengadaan_keterangan'),
        );
        $msg = [
            'sukses' => $this->load->view('backend/pengadaan/pengadaan_form', $data, true)
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
                    'pengadaan_tanggal' => $this->input->post('pengadaan_tanggal', TRUE),
                    'buku_id' => $this->input->post('buku_id', TRUE),
                    'pengadaan_asal_buku' => $this->input->post('pengadaan_asal_buku', TRUE),
                    'pengadaan_jumlah' => $this->input->post('pengadaan_jumlah', TRUE),
                    'pengadaan_keterangan' => $this->input->post('pengadaan_keterangan', TRUE),
                    'created_by' => 1,
                    'created_date' => date("Y-m-d H:i:s"),
                );
                $this->pengadaan->insert($data);
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
            $row = $this->pengadaan->get_by_id($id);
            $data = array(
                '_method' => set_value('_method', 'update'),
                'pengadaan_id' => set_value('pengadaan_id', $row->pengadaan_id),
                'pengadaan_tanggal' => set_value('pengadaan_tanggal', $row->pengadaan_tanggal),
                'buku_id' => set_value('buku_id', $row->buku_id),
                'pengadaan_asal_buku' => set_value('pengadaan_asal_buku', $row->pengadaan_asal_buku),
                'pengadaan_jumlah' => set_value('pengadaan_jumlah', $row->pengadaan_jumlah),
                'pengadaan_keterangan' => set_value('pengadaan_keterangan', $row->pengadaan_keterangan),
            );
            $msg = [
                'sukses' => $this->load->view('backend/pengadaan/pengadaan_form', $data, true),
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
                $id = $this->input->post('pengadaan_id', true);
                $data = array(
                    'pengadaan_tanggal' => $this->input->post('pengadaan_tanggal', TRUE),
                    'buku_id' => $this->input->post('buku_id', TRUE),
                    'pengadaan_asal_buku' => $this->input->post('pengadaan_asal_buku', TRUE),
                    'pengadaan_jumlah' => $this->input->post('pengadaan_jumlah', TRUE),
                    'pengadaan_keterangan' => $this->input->post('pengadaan_keterangan', TRUE),
                    'updated_by' => 1,
                    'updated_date' => date("Y-m-d H:i:s"),

                );

                $this->pengadaan->update($id, $data);
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
            $row = $this->pengadaan->get_by_id($id);

            if ($row) {
                $this->pengadaan->delete($id);
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
                'field' => 'pengadaan_tanggal',
                'label' => 'Tanggal Pengadaan',
                'rules' => 'required',
                'errors' => array(
                    'required' => '%s wajib di isi',
                ),
            ),
            array(
                'field' => 'buku_id',
                'label' => 'Judul Buku',
                'rules' => 'required',
                'errors' => array(
                    'required' => '%s wajib di isi',
                ),
            ),
            array(
                'field' => 'pengadaan_asal_buku',
                'label' => 'Asal Buku',
                'rules' => 'required',
                'errors' => array(
                    'required' => '%s wajib di isi',
                ),
            ),
            array(
                'field' => 'pengadaan_jumlah',
                'label' => 'Jumlah Buku',
                'rules' => 'required',
                'errors' => array(
                    'required' => '%s wajib di isi',
                ),
            ),
        );
        $this->form_validation->set_rules($config);
    }
}
