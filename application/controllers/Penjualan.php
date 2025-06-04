<?php
class Penjualan Extends CI_Controller
{
    //Bagian Penjualan
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pnj');
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
        $data = [
            'penjualan' => $this->Pnj->all_prdplg(),
            'pelanggan' => $this->Pnj->all_pelanggan(),
            'title' => 'Data Penjualan',
        ];
        
        $this->load->view('load/header');
        $this->load->view('penjualan/index', $data);
        $this->load->view('load/footer');
    }

    function prosescreate($id)
    {
    $pelanggan = $this->Pnj->get_pelanggan($id);
    if ($pelanggan) {
        $data = [
            'PelangganID' => $pelanggan->PelangganID,
            'TanggalPenjualan' => date('Y-m-d'),
        ];
        $penjualan = $this->Pnj->prosescreate($data);
        if ($penjualan) {
            $this->session->set_flashdata('success', 'Transaksi berhasil dibuat.');
            redirect('penjualan/detail/' . $penjualan);
        } else {
            $this->session->set_flashdata('error', 'Gagal membuat transaksi.');
            redirect('penjualan');
        }
    } else {
        $this->session->set_flashdata('error', 'Data pelanggan tidak ditemukan.');
        redirect('penjualan');
    }
    }

    function hapus_penjualan($id)
    {
        $this->Pnj->hapus_penjualan($id);
        $this->session->set_flashdata('success', 'Data penjualan berhasil dihapus.');
        redirect('penjualan');
    }    

    //Bagian Detail
    public function detail($id)
    {
        $data = [
            'produk' => $this->Pnj->all_produk(),
            'detail' => $this->Pnj->get_data_detail($id),
            'TotalHarga' => $this->Pnj->total_harga($id),
            'Penjualan' => $this->Pnj->penjualan_data($id),
            'title' => 'Detail Penjualan',
        ];

        $this->load->view('load/header', );
        $this->load->view('penjualan/detail', $data);
        $this->load->view('load/footer', );

    }

    public function ProsesTambahDetail()
    {
    $ProdukID = $this->input->post('ProdukID');
    $Produk = $this->Pnj->get_produk($ProdukID);
    $penjualanID = $this->input->post('PenjualanID');
    $jumlah = $this->input->post('JumlahProduk');
    $SubTotal = $jumlah * $Produk->Harga;

    if ($Produk->Stok < $jumlah) {
        $this->session->set_flashdata('error', 'Stok produk tidak mencukupi!');
        redirect('Penjualan/Detail/' . $penjualanID);
    }

    $data = [
        'PenjualanID' => $penjualanID,
        'ProdukID' => $ProdukID,
        'JumlahProduk' => $jumlah,
        'Subtotal' => $SubTotal,
    ];

    if ($this->Pnj->create_detail($data)) {
        $this->Pnj->kurang_stok($ProdukID, $jumlah);
        $this->session->set_flashdata('success', 'Produk berhasil ditambahkan ke transaksi.');
    } else {
        $this->session->set_flashdata('error', 'Gagal menambahkan produk ke transaksi.');
    }

    redirect('Penjualan/Detail/' . $penjualanID);
    }

    public function hapus_detail($id)
    {
        $detailProduk = $this->Pnj->get_detail($id);
        $ProdukID = $detailProduk->ProdukID;
        $Jumlah = $detailProduk->JumlahProduk;
    
        if ($this->Pnj->hapus_detail($id)) {
            $this->Pnj->balik_stok($ProdukID, $Jumlah);
            $this->session->set_flashdata('success', 'Produk berhasil dihapus dari transaksi.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus produk dari transaksi.');
        }
    
        redirect('Penjualan/Detail/' . $detailProduk->PenjualanID);
    }
    
    public function bayar($id)
    {
    $Pembayaran = $this->input->post('Pembayaran');
    $TotalHarga = $this->input->post('TotalHarga');
    $data = [
        'TotalHarga' => $TotalHarga,
        'TotalPembayaran' => $Pembayaran
    ];

    if ($this->Pnj->Pembayaran($id, $data)) {
        $this->session->set_flashdata('success', 'Pembayaran berhasil diproses.');
        redirect('Penjualan/Struk/' . $id);
    } else {
        $this->session->set_flashdata('error', 'Pembayaran gagal, silakan coba lagi.');
        redirect('Penjualan/Detail/' . $id);
    }
    }


    public function struk($id)
    {
        $data = [
            'produk' => $this->Pnj->all_produk(),
            'detail' => $this->Pnj->get_data_detail($id),
            'TotalHarga' => $this->Pnj->total_harga($id),
            'penjualan' => $this->Pnj->penjualan_data($id),
        ];

        $this->load->view('load/header');
        $this->load->view('penjualan/struk', $data);
    }

    //End Bagian detail
}