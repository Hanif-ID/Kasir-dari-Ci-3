<?php
class Pnj Extends CI_model
{
    // View Penjualan
    function all_prdplg()
    {
        $this->db->select('*');
        $this->db->from('penjualan');
        $this->db->join('pelanggan', 'penjualan.PelangganID = pelanggan.PelangganID');
        return $this->db->get()->result();
    }

    function all_pelanggan()
    {
        return $this->db->get('pelanggan')->result();
    }
    // End View

    // Proses Create Detail and Penjualan
    function get_pelanggan($id)
    {
        return $this->db->get_where('pelanggan', ['PelangganID' => $id])->row();
    }

    function prosescreate($data)
    {
        $this->db->insert('penjualan',  $data);
        return $this->db->insert_id();
    }

    function hapus_penjualan($id)
    {
        $this->db->delete('penjualan', ['PenjualanID' => $id]);
    }

    // End Proses

    // Detail
    function all_produk()
    {
        return $this->db->where('stok >', 0)->get('produk')->result();
    }

    function penjualan_data($id)
    {
        $this->db->select('*');
        $this->db->from('penjualan');
        $this->db->join('pelanggan', 'pelanggan.PelangganID = penjualan.PelangganID', 'left');
        $this->db->where('penjualan.PenjualanID', $id);
        return $this->db->get()->row();

    }

    function get_produk($id)
    {
        return $this->db->where('ProdukID', $id)->get('produk')->row();
    }

    function create_detail($data)
    {
        return $this->db->insert('detailpenjualan', $data);
    }

    function kurang_stok($id, $jumlah)
    {
        $this->db->where('ProdukID', $id);
        $this->db->set('Stok', 'Stok - ' . $jumlah, false);
        $this->db->update('produk');
    }

    function get_data_detail($id)
    {
        $this->db->select('*');
        $this->db->from('detailpenjualan');
        $this->db->join('produk', 'produk.ProdukID = detailpenjualan.ProdukID', 'left');
        $this->db->where('PenjualanID', $id);
        return $this->db->get()->result();
    }

    function get_detail($id)
    {
        return $this->db->get_where('detailpenjualan', ['DetailID' => $id])->row();
    }

    function hapus_detail($id)
    {
        return $this->db->delete('detailpenjualan', ['DetailID' => $id]);
    }

    function balik_stok($id, $jumlah)
    {
        $this->db->where('ProdukID', $id);
        $this->db->set('Stok', 'Stok + ' . $jumlah, false);
        $this->db->update('Produk');

    }

    function total_harga($id)
    {
        $this->db->select_sum('Subtotal');
        $this->db->where('PenjualanID', $id);
        return $this->db->get('detailpenjualan')->row();
    }

    function pembayaran($id, $data)
    {
        $this->db->where('PenjualanID', $id);
        return $this->db->update('penjualan', $data);
    }
    
    // End Detail
}