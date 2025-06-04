<?php 
class Plg Extends CI_model
{
    function all_pelanggan()
    {
        return $this->db->get('pelanggan')->result();
    }

    function simpan_plg()
    {
        $data = [
            'NamaPelanggan' => $this->input->post('NamaPelanggan'),
            'Alamat' => $this->input->post('Alamat'),
            'NomorTelepon' => $this->input->post('NomorTelepon'),
        ];

        $this->db->insert('pelanggan', $data);
    }

    function hapus_plg($id)
    {
        $this->db->delete('pelanggan', [
            'PelangganID' => $id
        ]);
    }

    function get_pelanggan($id)
    {
        return $this->db->get_where('pelanggan', ['PelangganID' => $id])->row();
    }

    function edit_plg($id)
    {
        $data = [
            'NamaPelanggan' => $this->input->post('NamaPelanggan'),
            'Alamat' => $this->input->post('Alamat'),
            'NomorTelepon' => $this->input->post('NomorTelepon'),
        ];

        $this->db->where('PelangganID', $id);
        $this->db->update('pelanggan', $data);
    }
}