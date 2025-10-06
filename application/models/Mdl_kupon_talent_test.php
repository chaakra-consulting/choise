<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Mdl_kupon_talent_test extends CI_Model
{
    private $table_kupon = 'tb_kupon_talent_test';
    private $table_penggunaan = 'tb_penggunaan_kupon';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_kupon_by_id($id_kupon)
    {
        $this->db->where('id_kupon', $id_kupon);
        return $this->db->get($this->table_kupon)->row_array();
    }

    public function get_kupon_by_kode($kode_kupon)
    {
        $this->db->where('kode_kupon', $kode_kupon);
        $this->db->where('status', 'aktif');
        $this->db->where('tanggal_mulai <=', date('Y-m-d'));
        $this->db->where('tanggal_berakhir >=', date('Y-m-d'));
        return $this->db->get($this->table_kupon)->row_array();
    }

    public function validate_kupon($kode_kupon, $id_pendaftar = null, $total_harga = 0)
    {
        $kupon = $this->get_kupon_by_kode($kode_kupon);

        if (!$kupon) {
            return [
                'valid' => false, 
                'message' => 'Minimal pembelian Rp ' . 
                number_format($kupon['minimal_pembelian'], 0, ',', '.')
            ];
        }
        
        if ($kupon['maksimal_penggunaan']) {
            $this->db->where('id_kupon', $kupon['id_kupon']);
            $total_penggunaan = $this->db->count_all_results($this->table_penggunaan);

            if ($total_penggunaan >= $kupon['maksimal_penggunaan']) {
                return ['valid' => false, 'message' => 'kupon sudah mencapai batas maksimal penggunaan'];
            }
        }

        return ['valid' => true, 'kupon' => $kupon];
    }

    public function calculate_discount($kupon, $total_harga) 
    {
        $diskon = 0;

        if ($kupon['jenis_diskon']  == 'persen') {
            $diskon = ($total_harga * $kupon['nilai_diskon']) / 100;
        } else {
            $diskon = $kupon['nilai_diskon'];
        }

        if ($kupon['maksimal_diskon'] && $diskon > $kupon['maksimal_diskon']) {
            $diskon = $kupon['maksimal_diskon'];
        }

        if ($diskon > $total_harga) {
            $diskon = $total_harga;
        }

        return $diskon;
    }

    public function record_kupon_usage($id_kupon, $id_pendaftar, $kode_kupon, $diskon_diterapkan)
    {
        $data = [
            'id_kupon' => $id_kupon,
            'id_pendaftar_pelatihan' => $id_pendaftar,
            'kode_kupon' => $kode_kupon,
            'diskon_diterapkan' => $diskon_diterapkan
        ];

        return $this->db->insert($this->table_penggunaan, $data);
    }

    public function get_all_kupon()
    {
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get($this->table_kupon)->result_array();
    }

    public function get_active_kupon()
    {
        $this->db->where('status', 'aktif');
        $this->db->where('tanggal_mulai <=', date('Y-m-d'));
        $this->db->where('tanggal_berakhir >=', date('Y-m-d'));
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get($this->table_kupon)->result_array();
    }

    public function insert_kupon($data)
    {
        return $this->db->insert($this->table_kupon, $data);
    }

    public function update_kupon($id_kupon, $data)
    {
        $this->db->where('id_kupon', $id_kupon);
        return $this->db->update($this->table_kupon, $data);
    }

    public function delete_kupon($id_kupon)
    {
        return $this->db->delete($this->table_kupon, ['id_kupon' => $id_kupon]);
    }
}