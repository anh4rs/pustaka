<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pinjam_model', 'pinjam');
        $this->load->model('Pinjamitem_model', 'itempinjam');
        $this->load->model('Kembali_model', 'kembali');
        $this->load->model('Siswa_model', 'siswa');
        $this->load->model('Buku_model', 'buku');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->display('backend/transaksi/transaksi_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->pinjam->json();
    }

    public function pinjam()
    {
        $data['siswas'] = $this->siswa->get_all();
        $data['bukus'] = $this->buku->get_all();
        $data['kodepinjam'] = $this->pinjam->get_kodePinjam();
        $this->template->display('backend/transaksi/peminjaman', $data);
    }

    public function prosesPinjam()
    {
        $data['siswa_id'] = $this->input->post('save_id_siswa');
        $data['kodeunik_pinjam'] = $this->pinjam->get_kodePinjam();
        $data['pinjam_tanggal'] = $this->input->post('save_tglpinjam');
        $data['pinjam_lama'] = $this->input->post('save_tglkembali');

        //pinjam detail
        $id = $this->pinjam->insert($data);
        $bukuid = $this->input->post('save_bukuid');
        $jml = $this->input->post('save_jumlah');
        $jmlitem = count($bukuid);
        for ($i = 0; $i < $jmlitem; $i++) {
            $item = array(
                'pinjam_id' => $id,
                'buku_id' => $bukuid[$i],
                'jumlah' => $jml[$i],
            );
            $this->itempinjam->insert($item);
        }

        $msg = ['sukses' => 'data peminjaman berhasil di simpan'];
        echo json_encode($msg);
        // redirect(site_url('transaksi'));
    }


    public function getKode()
    {
        $data = $this->pinjam->get_kodePinjam();
        echo $data;
    }
    public function getSiswa()
    {
        $data = $this->siswa->get_all();
        echo json_encode($data);
    }

    public function read($id)
    {
        $row = $this->Pinjam_model->get_by_id($id);
        if ($row) {
            $data = array(
                'pinjam_id' => $row->pinjam_id,
                'pinjam_tanggal' => $row->pinjam_tanggal,
                'siswa_id' => $row->siswa_id,
                'pinjam_ket' => $row->pinjam_ket,
                'pinjam_lama' => $row->pinjam_lama,
                'pinjam_status' => $row->pinjam_status,

            );
            $this->template->display('admin/pinjam/pinjam_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pinjam'));
        }
    }
}
