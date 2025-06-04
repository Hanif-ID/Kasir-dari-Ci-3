<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->check_login();
	}

	private function check_login()
    {
        // Cek apakah session user_id ada, artinya user sudah login
        if (!$this->session->userdata('user_id')) {
            // Jika belum login, redirect ke halaman login
            redirect('auth');
        }
    }

	public function index()
	{
		$pelanggan = $this->db->count_all('pelanggan');
		$produk = $this->db->count_all('produk');
		$penjualan  = $this->db->count_all('penjualan');

		$this->db->select_sum('TotalHarga');
        $this->db->from('penjualan');
        $TotalHarga = $this->db->get()->row();

		$data = [
			'pelanggan' => $pelanggan,
			'produk' => $produk,
			'penjualan' => $penjualan,
			'TotalHarga' => $TotalHarga,
		];

		$this->load->view('load/header');
		$this->load->view('beranda', $data);
		$this->load->view('load/footer');
	}
}
