<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bappenas extends CI_Controller
{
	public function __construct() //MEMPERSIAPKAN
	{
		parent::__construct();
		$this->load->helper('url', 'form');
		$this->load->model('Mdl_ujian');
		$this->load->model('Mdl_data_ujian');
		$this->load->library('form_validation');
		$this->load->database();
		if ($this->session->userdata('masuk') == FALSE) {
			redirect('Login_pelamar', 'refresh');
		}
	}
    public function index()
	{
		$this->load->view('pelamar/ujian/bappenas/sub1/index');
	}
    public function sub2()
	{
		$this->load->view('pelamar/ujian/bappenas/sub2/index');
	}
    public function sub3()
	{
		$this->load->view('pelamar/ujian/bappenas/sub3/index');
	}

    public function get_all_data()
	{
		$id_ujian = $this->input->post('id_ujian');
		$subtes = $this->input->post('subtes');
		$id_pelamar = $this->session->userdata('ses_id');
		$id_lowongan = $this->session->userdata('sesIdLowongan');

		// 1. Fetch ALL questions for this exam
		$this->db->order_by('nomor_soal', 'ASC');
		$this->db->where('subtes', $subtes);
		$soal = $this->db->get_where('tb_soal_bappenas')->result();

		// 2. Fetch ALL answers the user has already saved
		$jawaban_query = $this->db->get_where('tb_data_jawaban_bappenas', [
			'id_ujian' => $id_ujian,
			'id_pelamar' => $id_pelamar,
			'subtes' => $subtes,
			'id_lowongan' => $id_lowongan
		])->result();

		// Format answers so it's easy for Javascript to read (e.g., [ 1 => 'A', 2 => 'C' ])
		$dijawab = [];
		foreach ($jawaban_query as $j) {
			$dijawab[$j->nomor_soal] = $j->jawaban;
		}

		echo json_encode([
			'soal' => $soal,
			'dijawab' => $dijawab
		]);
	}

	public function get_question()
	{
		$id_ujian = $this->input->post('id_ujian');
		$nomor_soal = $this->input->post('nomor_soal');
		$subtes = $this->input->post('subtes');
		$id_pelamar = $this->session->userdata('ses_id');
		$id_lowongan = $this->session->userdata('sesIdLowongan');

		// Fetch the specific question
		$soal = $this->db->get_where('tb_soal_bappenas', [
			'nomor_soal' => $nomor_soal,
			'subtes' => $subtes
		])->row();

		// Fetch user's previous answer if it exists
		$jawaban = $this->db->get_where('tb_data_jawaban_bappenas', [
			'nomor_soal' => $nomor_soal,
			'subtes' => $subtes,
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan
		])->row();

		echo json_encode([
			'status' => true,
			'soal' => $soal ? $soal->soal : 'Soal tidak ditemukan.',
			// NOTE: Change 'a', 'b', 'c', 'd' below if your database column names are different (e.g., 'opsi_a')
			'opsi_a' => $soal ? $soal->opsi_a : '',
			'opsi_b' => $soal ? $soal->opsi_b : '',
			'opsi_c' => $soal ? $soal->opsi_c : '',
			'opsi_d' => $soal ? $soal->opsi_d : '',
			'opsi_e' => $soal ? $soal->opsi_e : '',
			'jawaban' => $jawaban ? $jawaban->jawaban : null,
		]);
	}

	public function get_grid()
	{
		$id_ujian = $this->input->post('id_ujian');
		$subtes = $this->input->post('subtes');
		$id_pelamar = $this->session->userdata('ses_id');
		$id_lowongan = $this->session->userdata('sesIdLowongan');

		// Total number of questions
		$total_soal = $this->db->where('subtes', $subtes)->count_all_results('tb_soal_bappenas');

		// Fetch only the question numbers that have been answered by this user
		$dijawab_query = $this->db->select('nomor_soal')->get_where('tb_data_jawaban_bappenas', [
			'id_ujian' => $id_ujian,
			'subtes' => $subtes,
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan
		])->result_array();

		// Convert multidimensional array to a flat array of numbers: [1, 3, 5]
		$answered_array = array_column($dijawab_query, 'nomor_soal');

		echo json_encode([
			'total' => $total_soal,
			'dijawab' => $answered_array
		]);
	}

    public function save_answer()
	{
		$id_ujian = $this->input->post('id_ujian');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban');
		$subtes = $this->input->post('subtes');

		if ($jawaban) {

			$id_pelamar = $this->session->userdata('ses_id');
			$id_lowongan = $this->session->userdata('sesIdLowongan');

			$where = [
				'id_ujian' => 1,
				'nomor_soal' => $nomor_soal,
				'id_pelamar' => $id_pelamar,
				'subtes' => $subtes,
				'id_lowongan' => $id_lowongan
			];

			$cek = $this->db->get_where('tb_data_jawaban_bappenas', $where)->num_rows();

			if ($cek > 0) {
				$this->db->where($where)->update('tb_data_jawaban_bappenas', ['jawaban' => $jawaban,]);
			} else {
				$data = $where;
				$data['jawaban'] = $jawaban;
				$this->db->insert('tb_data_jawaban_bappenas', $data);
			}

			echo json_encode(['status' => true]);
		}
	}

}