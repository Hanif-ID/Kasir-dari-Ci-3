<?php
class Prd_model Extends CI_model
{
    function all_produk()
    {
        return $this->db->get('produk')->result();
    }

    function tambah_produk()
    {
        $data = [
            'NamaProduk' => $this->input->post('NamaProduk'),
            'Harga' => $this->input->post('Harga'),
            'Stok' => $this->input->post('Stok')
        ];
        $this->db->insert('produk',$data);
    }

    function hps_produk($id)
    {
        $this->db->delete('produk', ['ProdukID' => $id]);
    }

    function get_produk($id)
    {
        return $this->db->get_where('produk', ['ProdukID' => $id])->row();
    }

    function edit_prd($id)
    {
        $data = [
            'NamaProduk' => $this->input->post('NamaProduk'),
            'Harga' => $this->input->post('Harga'),
            'Stok' => $this->input->post('Stok')
        ];

        $this->db->where('ProdukID', $id);
        $this->db->update('produk', $data);
    }
}