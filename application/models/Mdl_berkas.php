<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_berkas extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function get_berkas_by_pelamar($id_pelamar, $kategori = null)
    {
        $this->db->where('id_pelamar', $id_pelamar);
        if ($kategori) {
            $this->db->where('kategori', $kategori);
        }
        return $this->db->get('tb_berkas')->result_array();
    }

    public function get_berkas_by_jenis($id_pelamar, $jenis_berkas, $kategori = null)
    {
        $this->db->where('id_pelamar', $id_pelamar);
        $this->db->where('berkas', $jenis_berkas);
        if ($kategori) {
            $this->db->where('kategori', $kategori);
        }
        return $this->db->get('tb_berkas')->row();
    }

    public function insert_berkas($data)
    {
        return $this->db->insert('tb_berkas', $data);
    }

    public function update_berkas($id_berkas, $data)
    {
        $this->db->where('id_berkas', $id_berkas);
        return $this->db->update('tb_berkas', $data);
    }

    public function delete_berkas($id_berkas)
    {
        $this->db->where('id_berkas', $id_berkas);
        return $this->db->delete('tb_berkas');
    }

    public function get_berkas_by_kategori($kategori)
    {
        $this->db->where('kategori', $kategori);
        return $this->db->get('tb_berkas')->result_array();
    }

    public function cek_berkas_exists($id_pelamar, $jenis_berkas, $kategori = null)
    {
        $this->db->where('id_pelamar', $id_pelamar);
        $this->db->where('berkas', $jenis_berkas);
        if ($kategori) {
            $this->db->where('kategori', $kategori);
        }
        return $this->db->get('tb_berkas')->row();
    }
}