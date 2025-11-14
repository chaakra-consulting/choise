<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class KuponTalentTest extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mdl_kupon_talent_test', 'm_kupon');
        $this->load->library('form_validation');
        $this->load->database();
        if ($this->session->userdata('masuk') == FALSE) {
            redirect('Login', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'Manajemen Kupon Talent Test';
        $data['kupons'] = $this->m_kupon->get_all_kupon();
        $this->load->view('administrator/kupon_talent_test/index', $data);
    }

    public function create()
    {
        $this->form_validation->set_rules('kode_kupon', 'Kode Kupon', 'required|is_unique[tb_kupon_talent_test.kode_kupon]');
        $this->form_validation->set_rules('nama_kupon', 'Nama Kupon', 'required');
        $this->form_validation->set_rules('jenis_diskon', 'Jenis Diskon', 'required');
        $this->form_validation->set_rules('nilai_diskon', 'Nilai Diskon', 'required|numeric');
        $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('tanggal_berakhir', 'Tanggal Berakhir', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah Kupon Talent Test';
            $this->load->view('administrator/kupon_talent_test/create', $data);
        } else {
            $data = [
                'kode_kupon' => $this->input->post('kode_kupon'),
                'nama_kupon' => $this->input->post('nama_kupon'),
                'deskripsi' => $this->input->post('deskripsi'),
                'jenis_diskon' => $this->input->post('jenis_diskon'),
                'nilai_diskon' => $this->input->post('nilai_diskon'),
                'maksimal_diskon' => $this->input->post('maksimal_diskon'),
                'minimal_pembelian' => $this->input->post('minimal_pembelian'),
                'maksimal_penggunaan' => $this->input->post('maksimal_penggunaan'),
                'tanggal_mulai' => $this->input->post('tanggal_mulai'),
                'tanggal_berakhir' => $this->input->post('tanggal_berakhir'),
                'status' => $this->input->post('status')
            ];

            $this->m_kupon->insert_kupon($data);
            redirect('Administrator/KuponTalentTest');
        }
    }

    public function edit($id_kupon)
    {
        $data['kupon'] = $this->m_kupon->get_kupon_by_id($id_kupon);
        if (!$data['kupon']) {
            show_404();
        }
        $this->form_validation->set_rules('nama_kupon', 'Nama Kupon', 'required');
        $this->form_validation->set_rules('jenis_diskon', 'Jenis Diskon', 'required');
        $this->form_validation->set_rules('nilai_diskon', 'Nilai Diskon', 'required|numeric');
        $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('tanggal_berakhir', 'Tanggal Berakhir', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Kupon Talent Test';
            $this->load->view('administrator/kupon_talent_test/edit', $data);
        } else {
            $update_data = [
                'nama_kupon' => $this->input->post('nama_kupon'),
                'deskripsi' => $this->input->post('deskripsi'),
                'jenis_diskon' => $this->input->post('jenis_diskon'),
                'nilai_diskon' => $this->input->post('nilai_diskon'),
                'maksimal_diskon' => $this->input->post('maksimal_diskon'),
                'minimal_pembelian' => $this->input->post('minimal_pembelian'),
                'maksimal_penggunaan' => $this->input->post('maksimal_penggunaan'),
                'tanggal_mulai' => $this->input->post('tanggal_mulai'),
                'tanggal_berakhir' => $this->input->post('tanggal_berakhir'),
                'status' => $this->input->post('status')
            ];
            $this->m_kupon->update_kupon($id_kupon, $update_data);
            redirect('Administrator/KuponTalentTest');
        }
    }

    public function delete($id_kupon)
    {
        $this->m_kupon->delete_kupon($id_kupon);
        redirect('Administrator/KuponTalentTest');
    }
}