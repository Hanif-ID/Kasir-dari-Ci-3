<?php
class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Plg');
        $this->check_login();
    }

    private function check_login()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $this->form_validation->set_rules('NamaPelanggan', 'Nama Pelanggan', 'required');
        $this->form_validation->set_rules('Alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('NomorTelepon', 'Nomor Telepon', 'required');

        $data = [
            'pelanggan' => $this->Plg->all_pelanggan(),
            'title' => 'Data Pelanggan',
        ];

        if ($this->form_validation->run() == false) {
            if ($_POST) {
                // Jika form disubmit tapi validasi gagal
                $this->session->set_flashdata('error', 'Gagal menyimpan data. Pastikan semua field terisi.');
            }

            $this->load->view('load/header');
            $this->load->view('pelanggan', $data);
            $this->load->view('load/footer');
        } else {
            $this->Plg->simpan_plg();
            $this->session->set_flashdata('success', 'Data pelanggan berhasil disimpan!');
            redirect('pelanggan');
        }
    }

    public function hapus($id)
    {
        $this->Plg->hapus_plg($id);
        $this->session->set_flashdata('success', 'Data pelanggan berhasil dihapus!');
        redirect('pelanggan');
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('NamaPelanggan', 'Nama Pelanggan', 'required');
        $this->form_validation->set_rules('Alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('NomorTelepon', 'Nomor Telepon', 'required');

        $data = [
            'pelanggan' => $this->Plg->get_pelanggan($id),
            'title' => 'Edit Data Pelanggan',
        ];

        if ($this->form_validation->run() == false) {
            if ($_POST) {
                $this->session->set_flashdata('error', 'Gagal mengedit data. Pastikan semua field terisi.');
            }

            $this->load->view('load/header');
            $this->load->view('edit_pelanggan', $data);
            $this->load->view('load/footer');
        } else {
            $this->Plg->edit_plg($id);
            $this->session->set_flashdata('success', 'Data pelanggan berhasil diedit!');
            redirect('pelanggan');
        }
    }
}
