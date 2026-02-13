<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Studi_kasus_mekanik_pendingin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->model('Mdl_data_ujian');
        $this->load->library('form_validation');
        if ($this->session->userdata('masuk') == FALSE) {
            redirect('Login_pelamar', 'refresh');
        }
        function tambahmenit($datetime_mulai, $menit)
        {
            $time = new DateTime($datetime_mulai);
            $time->add(new DateInterval('PT' . $menit . 'M'));
            $stamp = $time->format('Y-m-d H:i:s');
            return $stamp;
        }
    }
    public function index()
    {
        $paket['array'] = $this->Mdl_data_ujian->ambildata_sk_mekanik_pendingin();
        $this->load->view('Administrator/data_ujian/studi_kasus_mekanik_pendingin', $paket);
    }

    function update()
    {
        $namates = $this->input->post('nama_ujian');
        $datetime_mulai = $this->input->post('waktu_mulai');
        $waktuujian = $this->input->post('waktu_ujian');

        if ($this->input->post('status') == "aktif") {
            $status = "aktif";
        } else {
            $status = "tidak aktif";
        }

        $startujian = $datetime_mulai;
        $endujian = tambahmenit($startujian, $waktuujian);

        $this->db->query("UPDATE tb_ujian_sk_mekanik_pendingin SET nama_ujian='$namates',waktu_mulai='$datetime_mulai',waktu_akhir='$endujian',STATUS='$status' where id_ujian_sk_mekanik_p=1");
        $this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian Studi Kasus Mekanik Pendingin Berhasil di Update.');
        redirect('Administrator/manage_ujian/studi_kasus_mekanik_pendingin');
    }
}
