<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Mdl_pendaftaran_talent_test extends CI_Model
{
    private $table = 'tb_pendaftar_pelatihan';

    public function insert_pendaftaran($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function get_pendaftaran_by_order_id($order_id)
    {
        $this->db->select('p.*, pk.nama_paket, pk.harga');
        $this->db->from($this->table . ' p');
        $this->db->join('tb_paket_talent_test pk', 'p.id_paket = pk.id_paket', 'left');
        $this->db->where('p.order_id', $order_id);
        return $this->db->get()->row_array();
    }

    public function update_status_by_order_id($order_id, $status)
    {
        $this->db->where('order_id', $order_id);
        return $this->db->update($this->table, ['status_pembayaran' => $status]);
    }
    
    public function get_pendaftaran_by_user($user_id)
    {
        $this->db->select('tb_pendaftar_pelatihan.*, pk.nama_paket, pk.Harga, pk.deskripsi');
        $this->db->from($this->table);
        $this->db->join('tb_paket_talent_test pk', 'tb_pendaftar_pelatihan.id_paket = pk.id_paket', 'left');
        $this->db->where('tb_pendaftar_pelatihan.id_pendaftar_pelatihan', $user_id);
        $this->db->where('tb_pendaftar_pelatihan.status_pembayaran', 'success');
        return $this->db->get()->row_array();
    }
}