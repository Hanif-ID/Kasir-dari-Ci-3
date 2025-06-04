<?php
class Produk Extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Prd_model');
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
        $this->form_validation->set_rules('NamaProduk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('Harga', 'Harga', 'required');
        $this->form_validation->set_rules('Stok', 'Stok', 'required');

        $data = [
            'produk' => $this->Prd_model->all_produk(),
            'title' => 'Data Produk',
        ];

        if ($this->form_validation->run() == false){
            $this->load->view('load/header');
            $this->load->view('produk', $data);
            $this->load->view('load/footer');
        } else {
            $this->Prd_model->tambah_produk();
            $this->session->set_flashdata('success', 'Produk berhasil ditambahkan!');
            redirect('produk');
        }
    }

    public function delete($id)
    {
        $this->Prd_model->hps_produk($id);
        $this->session->set_flashdata('success', 'Produk berhasil dihapus!');
        redirect('produk');
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('NamaProduk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('Harga', 'Harga', 'required');
        $this->form_validation->set_rules('Stok', 'Stok', 'required');

        $data = [
            'produk' => $this->Prd_model->get_produk($id),
            'title' => 'Edit Produk',
        ];

        if ($this->form_validation->run() == false){
            $this->load->view('load/header');
            $this->load->view('edit_produk', $data);
            $this->load->view('load/footer');
        } else {
            $this->Prd_model->edit_prd($id);
            $this->session->set_flashdata('success', 'Produk berhasil diedit!');
            redirect('produk');
        }
    }
}
