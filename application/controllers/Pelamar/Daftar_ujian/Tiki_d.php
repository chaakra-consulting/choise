<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tiki_d extends CI_Controller
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
		$this->load->view('pelamar/ujian/tiki/sub1/latihan');
	}

	public function latihan1_answer()
	{
		$this->load->view('pelamar/ujian/tiki/sub1/jawaban_latihan');
	}

	public function ujian1()
	{
		$this->load->view('pelamar/ujian/tiki/sub1/ujian');
	}


	function latihan2()
	{
		$this->load->view('pelamar/ujian/tiki/sub2/latihan');
	}
	public function latihan2_answer()
	{
		$this->load->view('pelamar/ujian/tiki/sub2/jawaban_latihan');
	}
	public function ujian2()
	{
		$this->load->view('pelamar/ujian/tiki/sub2/ujian');
	}

	function latihan3()
	{
		$this->load->view('pelamar/ujian/tiki/sub3/latihan');
	}
	public function latihan3_answer()
	{
		$this->load->view('pelamar/ujian/tiki/sub3/jawaban_latihan');
	}
	public function ujian3()
	{
		$this->load->view('pelamar/ujian/tiki/sub3/ujian');
	}

	function latihan4()
	{
		$this->load->view('pelamar/ujian/tiki/sub4/latihan');
	}
	public function latihan4_answer()
	{
		$this->load->view('pelamar/ujian/tiki/sub4/jawaban_latihan');
	}
	public function ujian4()
	{
		$this->load->view('pelamar/ujian/tiki/sub4/ujian');
	}
	function latihan5()
	{
		$this->load->view('pelamar/ujian/tiki/sub5/latihan');
	}
	public function latihan5_answer()
	{
		$this->load->view('pelamar/ujian/tiki/sub5/jawaban_latihan');
	}
	public function ujian5()
	{
		$this->load->view('pelamar/ujian/tiki/sub5/ujian');
	}
	function latihan7()
	{
		$this->load->view('pelamar/ujian/tiki/sub7/latihan');
	}
	public function latihan7_answer()
	{
		$this->load->view('pelamar/ujian/tiki/sub7/jawaban_latihan');
	}
	public function ujian7()
	{
		$this->load->view('pelamar/ujian/tiki/sub7/ujian');
	}
	function latihan8()
	{
		$this->load->view('pelamar/ujian/tiki/sub8/latihan');
	}
	public function latihan8_answer()
	{
		$this->load->view('pelamar/ujian/tiki/sub8/jawaban_latihan');
	}
	public function ujian8()
	{
		$this->load->view('pelamar/ujian/tiki/sub8/ujian');
	}
	function latihan9()
	{
		$this->load->view('pelamar/ujian/tiki/sub9/latihan');
	}
	public function latihan9_answer()
	{
		// Menangkap input dari form latihan
		$jawaban3 = $this->input->post('jawaban_latihan3');
		$jawaban4 = $this->input->post('jawaban_latihan4');

		// Mengirim data jawaban user ke view
		$data = array(
			'jawaban_user3' => $jawaban3,
			'jawaban_user4' => $jawaban4
		);

		$this->load->view('pelamar/ujian/tiki/sub9/jawaban_latihan', $data);
	}
	public function ujian9()
	{
		$this->load->view('pelamar/ujian/tiki/sub9/ujian');
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
		$soal = $this->db->get_where('tb_soal_tiki_d')->result();

		// 2. Fetch ALL answers the user has already saved
		$jawaban_query = $this->db->get_where('tb_data_jawaban_tiki_d', [
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

		// Fetch the specific question
		$soal = $this->db->get_where('tb_soal_tiki_d', [
			'nomor_soal' => $nomor_soal,
			'subtes' => $subtes
		])->row();

		// Fetch user's previous answer if it exists
		$jawaban = $this->db->get_where('tb_data_jawaban_tiki_d', [
			'nomor_soal' => $nomor_soal,
			'subtes' => $subtes,
			'id_pelamar' => $id_pelamar
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
			'opsi_f' => $soal ? $soal->opsi_f : '',
			'jawaban' => $jawaban ? $jawaban->jawaban : null,
			'jawaban2' => $jawaban ? $jawaban->jawaban2 : null
		]);
	}

	public function get_grid()
	{
		$id_ujian = $this->input->post('id_ujian');
		$subtes = $this->input->post('subtes');
		$id_pelamar = $this->session->userdata('ses_id');
		$id_lowongan = $this->session->userdata('sesIdLowongan');

		// Total number of questions
		$total_soal = $this->db->where('subtes', $subtes)->count_all_results('tb_soal_tiki_d');

		// Fetch only the question numbers that have been answered by this user
		$dijawab_query = $this->db->select('nomor_soal')->get_where('tb_data_jawaban_tiki_d', [
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
		$jawaban2 = $this->input->post('jawaban2') ?? null; // Optional second answer for certain question types
		$subtes = $this->input->post('subtes');

		if ($jawaban) {

			$id_pelamar = $this->session->userdata('ses_id');
			$id_lowongan = $this->session->userdata('sesIdLowongan');

			$where = [
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'id_pelamar' => $id_pelamar,
				'subtes' => $subtes,
				'id_lowongan' => $id_lowongan
			];

			$cek = $this->db->get_where('tb_data_jawaban_tiki_d', $where)->num_rows();

			if ($cek > 0) {
				$this->db->where($where)->update('tb_data_jawaban_tiki_d', ['jawaban' => $jawaban, 'jawaban2' => $jawaban2]);
			} else {
				$data = $where;
				$data['jawaban'] = $jawaban;
				$data['jawaban2'] = $jawaban2;
				$this->db->insert('tb_data_jawaban_tiki_d', $data);
			}

			echo json_encode(['status' => true]);
		}
	}
}
