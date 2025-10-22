<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Mdl_paket_talent_test extends CI_Model
{
    private $table = 'tb_paket_talent_test';
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_paket()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function get_active_paket()
    {
        return $this->db->get_where($this->table, ['status' => 'aktif'])->result_array();
    }

    public function get_paket_by_id($id)
    {
        return $this->db->get_where($this->table, ['id_paket' => $id])->row_array();
    }

    public function insert_paket($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update_paket($id, $data)
    {
        $this->db->where('id_paket', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete_paket($id)
    {
        return $this->db->delete($this->table, ['id_paket' => $id]);
    }

    public function get_ujian_by_paket($id_paket)
    {
        $this->db->where('id_paket', $id_paket);
        $this->db->order_by('urutan', 'ASC');
        return $this->db->get('tb_paket_ujian')->result_array();
    }

    public function add_ujian_to_paket($data)
    {
        return $this->db->insert('tb_paket_ujian', $data);
    }

    public function delete_ujian_from_paket($id_paket_ujian)
    {
        return $this->db->delete('tb_paket_ujian', ['id_paket_ujian' => $id_paket_ujian]);
    }

    public function update_ujian($id_paket_ujian, $data)
    {
        $this->db->where('id_paket_ujian', $id_paket_ujian);
        return $this->db->update('tb_paket_ujian', $data);
    }

    public function update_urutan_ujian($id_paket_ujian, $urutan)
    {
        $this->db->where('id_paket_ujian', $id_paket_ujian);
        return $this->db->update('tb_paket_ujian', ['urutan' => $urutan]);
    }

    public function duplicate_ujian($id_paket_ujian)
    {
        $ujian = $this->db->get_where('tb_paket_ujian', ['id_paket_ujian' => $id_paket_ujian])->row_array();

        if ($ujian) {
            unset($ujian['id_paket_ujian']);
            $this->db->select_max('urutan');
            $this->db->where('id_paket', $ujian['id_paket']);
            $max_urutan = $this->db->get('tb_paket_ujian')->row()->urutan;

            $ujian['urutan'] = $max_urutan + 1;
            return $this->db->insert('tb_paket_ujian', $ujian);
        }
        return false;
    }

    public function check_duplicate_ujian($id_paket, $jenis_ujian)
    {
        return $this->db->get_where('tb_paket_ujian', [
            'id_paket' => $id_paket,
            'jenis_ujian' => $jenis_ujian
        ])->num_rows() > 0;
    }

    public function get_max_urutan($id_paket)
    {
        $this->db->select_max('urutan');
        $this->db->where('id_paket', $id_paket);
        $result = $this->db->get('tb_paket_ujian')->row();
        return $result->urutan ?? 0;
    }

    public function get_kepentingan_by_paket($id_paket)
    {
        $this->db->select('k.*');
        $this->db->from('tb_kepentingan_options k');
        $this->db->join('tb_paket_kepentingan pk', 'k.id = pk.id_kepentingan');
        $this->db->where('pk.id_paket', $id_paket);
        $this->db->where('k.status', 'aktif');
        return $this->db->get()->result_array();
    }

    public function add_kepentingan_to_paket($id_paket, $id_kepentingan)
    {
        $data = [
            'id_paket' => $id_paket,
            'id_kepentingan' => $id_kepentingan
        ];
        return $this->db->insert('tb_paket_kepentingan', $data);
    }

    public function remove_kepentingan_from_paket($id_paket, $id_kepentingan)
    {
        $this->db->where('id_paket', $id_paket);
        $this->db->where('id_kepentingan', $id_kepentingan);
        return $this->db->delete('tb_paket_kepentingan');
    }

    public function get_available_kepentingan_for_paket($id_paket)
    {
        $this->db->select('k.*');
        $this->db->from('tb_kepentingan_options k');
        $this->db->where('k.status', 'aktif');
        $this->db->join('tb_paket_kepentingan pk', 'k.id = pk.id_kepentingan AND pk.id_paket = ' . $this->db->escape($id_paket), 'left');
        $this->db->where('pk.id_kepentingan IS NULL');
        return $this->db->get()->result_array();
    }

    public function get_cfit_questions()
    {
        $this->db->order_by('nomor_soal', 'ASC');
        return $this->db->get('tb_soal_cfit')->result_array();
    }

    public function get_ist_questions()
    {
        $this->db->order_by('nomor_soal', 'ASC');
        return $this->db->get('tb_soal_ist')->result_array();
    }

    public function get_disc_questions()
    {
        $this->db->order_by('no_soal', 'ASC');
        return $this->db->get('tb_soal_disc')->result_array();
    }

    public function get_essay_questions()
    {
        $this->db->order_by('nomor_soal', 'ASC');
        return $this->db->get('tb_soal_essay')->result_array();
    }

    public function get_hitung_questions()
    {
        $this->db->order_by('nomor_soal', 'ASC');
        return $this->db->get('tb_soal_hitung')->result_array();
    }

    public function get_studi_kasus_questions()
    {
        $this->db->order_by('nomor_soal', 'ASC');
        return $this->db->get('tb_soal_studi_kasus')->result_array();
    }

    public function get_leadership_questions()
    {
        $this->db->order_by('nomor_soal', 'ASC');
        return $this->db->get('tb_soal_leadership')->result_array();
    }

    public function get_soal_by_ujian($exam_type)
    {
        switch ($exam_type) {
            case 'cfit':
                return $this->get_cfit_questions();
            case 'ist':
                return $this->get_ist_questions();
            case 'holland':
                return [];
            case 'disc':
                return $this->get_disc_questions();
            case 'essay':
                return $this->get_essay_questions();
            case 'hitung':
                return $this->get_hitung_questions();
            case 'studi_kasus':
                return $this->get_studi_kasus_questions();
            case 'leadership':
                return $this->get_leadership_questions();
            default:
                return [];
        }
    }

    public function get_durasi_ujian($exam_type)
    {
        $table_map = [
            'cfit' => 'tb_ujian',
            'ist' => 'tb_ujian_ist',
            'holland' => 'tb_ujian_holland',
            'disc' => 'tb_ujian_disc',
            'essay' => 'tb_ujian_essay',
            'hitung' => 'tb_ujian_hitung', 
            'studi_kasus' => 'tb_ujian_kasus',
            'leadership' => 'tb_ujian_leadership'
        ];

        $column_map = [
            'cfit' => 'id_ujian',
            'ist' => 'id_ujian_ist',
            'holland' => 'id_ujian_holland',
            'disc' => 'id_ujian_disc',
            'essay' => 'id_ujian_essay',
            'hitung' => 'id_ujian_hitung',
            'studi_kasus' => 'id_ujian_studi_kasus',
            'leadership' => 'id_ujian_leadership'
        ];

        $table = $table_map[$exam_type] ?? 'tb_ujian';
        $column = $column_map[$exam_type] ?? 'id_ujian';
        $ujian = $this->db->get_where($table, [$column => 1])->row_array();
        
        if ($exam_type == 'holland' || $exam_type == 'disc') {
            if ($ujian && isset($ujian['waktu_mulai']) && isset($ujian['waktu_akhir'])) {
                $waktu_mulai = strtotime($ujian['waktu_mulai']);
                $waktu_akhir = strtotime($ujian['waktu_akhir']);
                $durasi_detik = $waktu_akhir - $waktu_mulai;
                return (int) ($durasi_detik / 60);
            }
            return 30;
        }
        
        return $ujian['durasi'] ?? 60;
    }
}