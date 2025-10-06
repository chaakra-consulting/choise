<?php 
defined('BASEPATH') or exit('No direct script access allowed'); 

class Mdl_kepentingan extends CI_Model
{
    private $table = 'tb_kepentingan_options';

    public function get_all_options()
    {
        return $this->db->get($this->table)->result_array();
    }
    public function get_active_options()
    {
        return $this->db->get_where($this->table, ['status' => 'aktif'])->result_array();
    }

    public function insert_option($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update_option($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete_option($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }

    public function get_option_by_id($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row_array();
    }

    public function get_kepentingan_by_paket($id_paket)
    {
        $this->db->select('k.*');
        $this->db->from($this->table . ' k');
        $this->db->join('tb_paket_kepentingan pk', 'k.id = pk.id_kepentingan');
        $this->db->where('pk.id_paket', $id_paket);
        $this->db->where('k.status', 'aktif');
        return $this->db->get()->result_array();
    }
}