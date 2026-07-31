<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tpa_pascasarjana extends CI_Controller
{
	public function __construct() //MEMPERSIAPKAN
	{
		parent::__construct();
		$this->load->helper('url', 'form');
		$this->load->model('Mdl_ujian');
		$this->load->model('Mdl_data_ujian');
		$this->load->library('form_validation');
		$this->load->database();
		// if ($this->session->userdata('masuk') == FALSE) {
		// 	redirect('Login_pelamar', 'refresh');
		// }
	}

	function index()
	{
		$this->load->view('pelamar/ujian/tpa_pascasarjana/index');
	}

	public function get_all_data()
	{
		$id_ujian = 1;
		$id_pelamar = $this->session->userdata('ses_id');
		$id_lowongan = $this->session->userdata('sesIdLowongan');

		// 1. Fetch ALL questions for this exam
		$this->db->order_by('nomor_soal', 'ASC');
		$soal = $this->db->get_where('tb_soal_tpa_pascasarjana')->result();

		// 2. Fetch ALL answers the user has already saved
		$jawaban_query = $this->db->get_where('tb_data_jawaban_tpa_pascasarjana', [
			'id_ujian' => $id_ujian,
			'id_pelamar' => $id_pelamar,
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
		$id_ujian = 1;
		$nomor_soal = $this->input->post('nomor_soal');
		$id_pelamar = $this->session->userdata('ses_id');
		$id_lowongan = $this->session->userdata('sesIdLowongan');

		// Fetch the specific question
		$soal = $this->db->get_where('tb_soal_tpa_pascasarjana', [
			'nomor_soal' => $nomor_soal,
		])->row();

		// Fetch user's previous answer if it exists
		$jawaban = $this->db->get_where('tb_data_jawaban_tpa_pascasarjana', [
			'nomor_soal' => $nomor_soal,
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
            'tipe_pertanyaan' => $soal ? $soal->tipe_pertanyaan : '',
			'jawaban' => $jawaban ? $jawaban->jawaban : '',
		]);
	}

	public function get_grid()
	{
		$id_ujian = 1;
		$id_pelamar = $this->session->userdata('ses_id');
		$id_lowongan = $this->session->userdata('sesIdLowongan');

		// Total number of questions
		$total_soal = $this->db->count_all_results('tb_soal_tpa_pascasarjana');

		// Fetch only the question numbers that have been answered by this user
		$dijawab_query = $this->db->select('nomor_soal')->get_where('tb_data_jawaban_tpa_pascasarjana', [
			'id_ujian' => $id_ujian,
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
		$id_ujian = 1;
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban');

		if ($jawaban) {

			$id_pelamar = $this->session->userdata('ses_id');
			$id_lowongan = $this->session->userdata('sesIdLowongan');

			$where = [
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			];

			$cek = $this->db->get_where('tb_data_jawaban_tpa_pascasarjana', $where)->num_rows();

			if ($cek > 0) {
				$this->db->where($where)->update('tb_data_jawaban_tpa_pascasarjana', ['jawaban' => $jawaban]);
			} else {
				$data = $where;
				$data['jawaban'] = $jawaban;
				$this->db->insert('tb_data_jawaban_tpa_pascasarjana', $data);
			}

			echo json_encode(['status' => true]);
		}
	}
}
