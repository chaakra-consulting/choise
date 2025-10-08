<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct() //MEMPERSIAPKAN
	{
		parent::__construct();
		$this->load->helper('url', 'form');
		$this->load->model('Mdl_home');
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->model('Mdl_paket_talent_test', 'm_paket');
		$this->load->model('Mdl_pendaftaran_talent_test', 'm_pendaftaran');
		$this->load->model('Mdl_kepentingan', 'm_kepentingan');
		$this->load->model('Mdl_kupon_talent_test', 'm_kupon');
		// if($this->session->userdata('masuk') == FALSE){
		// 	redirect('Login_user','refresh');
		// }		
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		$paket['yoman'] = $this->Mdl_home->ambildata();
	    $paket['faq'] = $this->Mdl_home->get_active_faq();
		$paket['title'] = 'Pilih Paket Talent Test';
		$paket['paket_list'] = $this->m_paket->get_active_paket();
		$this->load->view('home', $paket);
	}

	public function login2()
	{
		$this->load->view('login2');
	}

	public function lowonganlainnyahome()
	{
		$this->load->view('lowonganlainnyahome');
	}

	public function inputpelatihan()
	{
		$this->form_validation->set_rules('pelatihan', 'Pelatihan', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('telp', 'Telp', 'trim|required');
		$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'trim|required');
		$this->form_validation->set_rules('bidang', 'Bidang', 'trim|required');
		$this->form_validation->set_rules('sekolah', 'Sekolah', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg_error', 'Harap Isi Semua Kolom.');
			redirect('Home/');
		} else {
			date_default_timezone_set('Asia/Jakarta');
			$data = array(
				'id_pendaftar_pelatihan' => '',
				'id_pelatihan' => $this->input->post('pelatihan'),
				'nama_pendaftar_pelatihan' => $this->input->post('nama'),
				'email_pendaftar' => $this->input->post('email'),
				'no_telp' => $this->input->post('telp'),
				'pendidikan' => $this->input->post('pendidikan'),
				'minat' => $this->input->post('bidang'),
				'sekolah' => $this->input->post('sekolah'),
				'waktu' => date("Y-m-d H:i:s")
			);

			$this->db->insert('tb_pendaftar_pelatihan', $data);
			$this->session->set_flashdata('msg_home', 'Berhasil Mendaftar Pelatihan / Talent Test!!!');
			redirect('Home/');
		}
	}

	public function talent_test_daftar($id_paket)
	{
		$paket = $this->m_paket->get_paket_by_id($id_paket);
		if (!$paket || $paket['status'] != 'aktif') {
			redirect('talent_test');
		}
		$data['title'] = 'Isi Biodata Pendaftaran';
		$data['paket'] = $paket;
		$data['kota'] = $this->Mdl_home->get_kota();
		$data['kepentingan_options'] = $this->m_kepentingan->get_kepentingan_by_paket($id_paket);
		$data['is_talent_test'] = false;
		$data['is_pelamar'] = false;
		$this->load->view('talent_test/form_biodata', $data);
	}
	
	public function talent_test_proses()
	{
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('no_hp', 'No. HP', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('kepentingan', 'Kepentingan', 'required');
		$this->form_validation->set_rules('jadwal_tanggal', 'Tanggal Test', 'required');
		$this->form_validation->set_rules('jadwal_waktu', 'Waktu Test', 'required');

		$id_paket = $this->input->post('id_paket');
		$paket = $this->m_paket->get_paket_by_id($id_paket);

		if ($this->form_validation->run() == FALSE) {
			$this->talent_test_daftar($this->input->post('id_paket'));
		} else {
			// Gabungkan tanggal dan waktu menjadi satu string datetime
			$jadwal_test = $this->input->post('jadwal_tanggal') . ' ' . $this->input->post('jadwal_waktu') . ':00'; // Tambahkan detik jika diperlukan

			// Validasi jadwal gabungan
			if (!$this->validate_schedule($jadwal_test)) {
				$this->form_validation->set_message('validate_schedule', 'Jadwal yang dipilih tidak boleh tanggal yang sudah lewat.');
				$this->talent_test_daftar($this->input->post('id_paket'));
				return;
			}

			$order_id = 'TT-' . time() . rand(100, 999);
			$nomor_va_dummy = '8808' . preg_replace('/[^0-9]/', '', $this->input->post('no_hp'));
			date_default_timezone_set('Asia/Jakarta');

			$this->load->library('midtrans');
			$params = array(
				'server_key' => $this->config->item('server_key'),
				'production' => $this->config->item('is_production')
			);
			$this->midtrans->config($params);

			$transaction_details = array(
				'order_id'        => $order_id,
				'gross_amount'    => $paket['Harga']
			);

			$customer_details = array(
				'first_name'    => $this->input->post('nama_lengkap'),
				'last_name'     => '',
				'email'         => $this->input->post('email'),
				'phone'         => $this->input->post('no_hp'),
			);

			$transaction_data = array(
				'transaction_details'    => $transaction_details,
				'customer_details'        => $customer_details,
			);

			try {
				$snap_token = $this->midtrans->getSnapToken($transaction_data);
			} catch (Exception $e) {
				$snap_token = null;
				log_message('error', 'Midtrans Error: ' . $e->getMessage());
			}

			$pendaftar_data = [
				'order_id'                    => $order_id,
				'id_paket'                    => $this->input->post('id_paket'),
				'nama_pendaftar_pelatihan'    => $this->input->post('nama_lengkap'),
				'email_pendaftar'             => $this->input->post('email'),
				'no_telp'                     => $this->input->post('no_hp'),
				'tempat_lahir'                => $this->input->post('tempat_lahir'),
				'tanggal_lahir'               => $this->input->post('tanggal_lahir'),
				'kepentingan'                 => $this->input->post('kepentingan'),
				'jadwal_test'                 => $jadwal_test,
				'status_pembayaran'           => 'pending',
				'nomor_va'                    => $nomor_va_dummy,
				'snap_token'                  => $snap_token,
				'waktu'                       => date("Y-m-d H:i:s")
			];

			$this->db->insert('tb_pendaftar_pelatihan', $pendaftar_data);
			redirect('Home/talent_test_checkout/' . $order_id);
		}
	}

	public function talent_test_checkout($order_id)
	{
		$this->db->where('order_id', $order_id);
		$pendaftar = $this->db->get('tb_pendaftar_pelatihan')->row_array();

		if (!$pendaftar) {
			show_404();
		}

		$paket = $this->m_paket->get_paket_by_id($pendaftar['id_paket']);

		$data['title']					= 'Selesaikan Pembayaran';
		$data['pendaftar']				= $pendaftar;
		$data['paket']					= $paket;
		$data['midtrans_client_key']	= $this->config->item('client_key');
		$data['midtrans_is_production']	= $this->config->item('is_production');
		$data['is_talent_test']			= false;
		$data['is_pelamar']				= false;
		$this->load->view('talent_test/checkout', $data);
	}

	public function talent_test_pembayaran($order_id)
	{
		$pendaftar = $this->m_pendaftar->get_pendaftar_by_order_id($order_id);
		if (!$pendaftar) show_404();
		$data['title'] = 'Selesaikan Pembayaran';
		$data['pendaftar'] = $pendaftar;
		$this->load->view('talent_test/pembayaran', $data);
	}

	public function talent_test_dashboard()
	{
		$token = $this->session->userdata('talent_test_access_token');
		if (!$token) {
			$token = $this->input->get('token');
			if (!$token) {
				$this->session->set_flashdata('error', 'Token akses tidak valid atau sudah kadaluwarsa.');
				redirect('home');
			}
			$this->db->where('access_token', $token);
			$pendaftar = $this->db->get('tb_pendaftar_pelatihan')->row_array();

			if (!$pendaftar || $pendaftar['status_pembayaran'] != 'success') {
				$this->session->set_flashdata('error', 'Token akses tidak valid.');
				redirect('home');
			}

			$this->session->set_userdata('talent_test_access_token', $token);
		}

		$this->db->where('access_token', $token);
		$pendaftar = $this->db->get('tb_pendaftar_pelatihan')->row_array();

		if (!$pendaftar) {
			$this->session->unset_userdata('talent_test_access_token');
			$this->session->set_flashdata('error', 'Data pendaftar tidak ditemukan.');
			redirect('home');
		}

		$paket = $this->m_paket->get_paket_by_id($pendaftar['id_paket']);
		if (!$paket) {
			$this->session->set_flashdata('error', 'Paket talent test tidak ditemukan.');
			redirect('home');
		}

		$ujian_list = $this->m_paket->get_ujian_by_paket($pendaftar['id_paket']);

		$data['title'] = 'Dashboard Talent Test';
		$data['pendaftar'] = $pendaftar;
		$data['paket'] = $paket;
		$data['ujian_list'] = $ujian_list;
		$data['access_token'] = $token;
		$data['progress_data'] = $this->calculate_exam_progress($pendaftar['id_pendaftar_pelatihan']);
		$data['jadwal_test'] = $pendaftar['jadwal_test'];
		$data['current_time'] = date('Y-m-d H:i:s');
		$data['countdown_status'] = $this->get_countdown_status($pendaftar['jadwal_test']);
		$data['is_talent_test'] = true;
		$data['is_pelamar'] = false;
		log_message('debug', 'Jadwal Test dari DB: ' . $pendaftar['jadwal_test']);
		log_message('debug', 'Current Time: ' . date('Y-m-d H:i:s'));
		
		$data['countdown_status'] = $this->get_countdown_status($pendaftar['jadwal_test']);
		log_message('debug', 'Countdown Status: ' . json_encode($data['countdown_status']));
		
		$this->load->view('talent_test/dashboard', $data);
	}

	private function get_countdown_status($jadwal_test)
	{
		if (empty($jadwal_test) || $jadwal_test == '0000-00-00 00:00:00') {
			return [
				'can_start' => false,
				'message' => 'Jadwal ujian belum ditentukan',
				'time_remaining' => 0,
				'hours' => 0,
				'minutes' => 0,
				'seconds' => 0
			];
		}

		$current_time = time();
		$exam_time = strtotime($jadwal_test);

		if ($exam_time === false) {
			return [
				'can_start' => false,
				'message' => 'Format jadwal ujian tidak valid',
				'time_remaining' => 0,
				'hours' => 0,
				'minutes' => 0,
				'seconds' => 0
			];
		}

		if ($current_time >= $exam_time) {
			return [
				'can_start' => true,
				'message' => 'Ujian dapat dimulai sekarang',
				'time_remaining' => 0
			];
		} else {
			$time_diff = $exam_time - $current_time;
			$hours = floor($time_diff / 3600);
			$minutes = floor(($time_diff % 3600) / 60);
			$seconds = $time_diff % 60;

			return [
				'can_start' => false,
				'message' => 'ujian akan dimulai dalam',
				'time_remaining' => $time_diff,
				'hours' => $hours,
				'minutes' => $minutes,
				'seconds' => $seconds
			];
		}
	}

	private function calculate_exam_progress($id_pendaftar)
	{
		return [
			'total_exams' => 0,
			'completed_exams' => 0,
			'progress_percentage' => 0
		];
	}

	public function validate_token_access()
	{
		$token = $this->input->post('token');

		if (!$token) {
			echo json_encode(['valid' => false, 'message' => 'Token tidak ditemukan']);
			return;
		}

		$this->db->where('access_token', $token);
		$pendaftar = $this->db->get('tb_pendaftar_pelatihan')->row_array();

		if (!$pendaftar) {
			echo json_encode(['valid' => false, 'message' => 'Token tidak valid']);
			return;
		}

		if ($pendaftar['status_pembayaran'] != 'success') {
			echo json_encode(['valid' => false, 'message' => 'Pembayaran belum berhasil']);
			return;
		}

		echo json_encode([
			'valid' => true,
			'message' => 'Token valid',
			'redirect_url' => site_url('talent-test/dashboard?token=' . $token)	
		]);
	}

	public function validate_schedule($str)
	{
		if (strtotime($str) < time()) {
			$this->form_validation->set_message('validate_schedule', 'Jadwal yang dipilih tidak boleh tanggal yang sudah lewat.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function talent_test_success($order_id)
	{
		$applied_coupon = $this->input->post('applied_coupon');

		$this->db->where('order_id', $order_id);
		$this->db->update('tb_pendaftar_pelatihan', ['status_pembayaran' => 'success']);

		$this->db->where('order_id', $order_id);
		$pendaftar = $this->db->get('tb_pendaftar_pelatihan')->row_array();

		if ($pendaftar) {
			$token = bin2hex(random_bytes(16));
			$this->db->where('order_id', $order_id);
			$this->db->update('tb_pendaftar_pelatihan', ['access_token' => $token]);
			$this->session->set_userdata('talent_test_access_token', $token);
		
			$applied_coupon = $this->session->userdata('applied_coupon');
			if ($applied_coupon) {
				$this->m_kupon->record_kupon_usage(
					$applied_coupon['id_kupon'],
					$pendaftar['id_pendaftar_pelatihan'],
					$applied_coupon['kode_kupon'],
					$applied_coupon['diskon']
				);
				$this->session->unset_userdata('applied_coupon');
			}
			$this->send_token_email($pendaftar, $token);
		}

		$data['title'] = 'Pembayaran Berhasil';
		$data['message'] = 'Pembayaran Anda Berhasil.';
		$data['access_token'] = $token ?? null;
		$this->load->view('talent_test/payment_result', $data);
	}

	public function talent_test_pending($order_id)
	{
		$data['title']	= 'Pembayaran Pending';
		$data['message']= 'Pembayaran Anda sedang diproses.';
		$this->load->view('talent_test/payment_result', $data);
	}

	public function talent_test_error($order_id)
	{
		$data['title']	= 'Pembayaran Gagal';
		$data['message']= 'Terjadi Kesalahan dalam proses pembayaran.';
		$this->load->view('talent_test/payment_result', $data);
	}

	public function logout_talent_test()
	{
		$this->session->unset_userdata('talent_test_access_token');
		$this->session->unset_userdata('talent_test_current_exam');
		$this->session->unset_userdata('talent_test_package_id');
		$this->session->unset_userdata('talent_test_start_exam');
		redirect('Home/#pelatihan-section');
	}

	public function validate_coupon()
	{
		$kode_kupon = $this->input->post('kode_kupon');
		$id_paket = $this->input->post('id_paket');

		if (!$kode_kupon || !$id_paket) {
			echo json_encode(['valid' => false, 'message' => 'Data tidak lengkap']);
			return;
		}

		$paket = $this->m_paket->get_paket_by_id($id_paket);

		if (!$paket) {
			echo json_encode(['valid' => false, 'message' => 'Paket tidak ditemukan']);
			return;
		}

		$validation = $this->m_kupon->validate_kupon($kode_kupon, null, $paket['harga']);

		if ($validation['valid']) {
			$diskon = $this->m_kupon->calculate_discount($validation['kupon'], $paket['harga']);
			$harga_akhir = $paket['harga'] - $diskon;

			echo json_encode([
				'valid' => true,
				'kupon' => $validation['kupon'],
				'diskon' => $diskon,
				'harga_akhir' => $harga_akhir,
				'message' => 'kupon valid! Diskon Rp ' . number_format($diskon, 0, ',', '.')
			]);
		} else {
			echo json_encode($validation);
		}
	}
	
	public function apply_coupon_to_transaction()
	{
		$order_id = $this->input->post('order_id');
		$kode_kupon = $this->input->post('kode_kupon');

		if (!$order_id) {
			echo json_encode(['success' => false, 'message' => 'Data tidak lengkap']);
			return;
		}

		$this->db->where('order_id', $order_id);
		$pendaftar = $this->db->get('tb_pendaftar_pelatihan')->row_array();

		if (!$pendaftar) {
			echo json_encode(['success' => false, 'message' => 'Pendaftar tidak ditemukan']);
			return;
		}

		$paket = $this->m_paket->get_paket_by_id($pendaftar['id_paket']);

		if (!$paket) {
			echo json_encode(['success' => false, 'message' => 'Paket tidak ditemukan']);
			return;
		}

		if ($kode_kupon) {
			$validation = $this->m_kupon->validate_kupon($kode_kupon, $pendaftar['id_pendaftar_pelatihan'], $paket['Harga']);

			if (!$validation['valid']) {
				echo json_encode(['success' => false, 'message' => $validation['message']]);
				return;
			}

			$diskon = $this->m_kupon->calculate_discount($validation['kupon'], $paket['Harga']);
			$harga_akhir = $paket['Harga'] - $diskon;
		} else {
			$diskon = 0;
			$harga_akhir = $paket['Harga'];
		}

		$this->load->library('midtrans');
		$params = array(
			'server_key' => $this->config->item('server_key'),
			'production' => $this->config->item('is_production'),
		);
		$this->midtrans->config($params);

		$transaction_details = array(
			'order_id' 		=> $order_id,
			'gross_amount' 	=> $harga_akhir
		);

		$customer_details = array(
			'first_name' 	=> $pendaftar['nama_pendaftar_pelatihan'],
			'last_name' 	=> '',
			'email' 		=> $pendaftar['email_pendaftar'],
			'phone' 		=> $pendaftar['no_telp']
		);

		$transaction_data = array(
			'transaction_details' 	=> $transaction_details,
			'customer_details' 		=> $customer_details,
		);

		try {
			$snap_token = $this->midtrans->getSnapToken($transaction_data);

			$this->db->where('order_id', $order_id);
			$this->db->update('tb_pendaftar_pelatihan', ['snap_token' => $snap_token]);
			
			if ($kode_kupon) {
				$this->session->set_userdata('applied_coupon', [
					'id_kupon' 		=> $validation['kupon']['id_kupon'],
					'kode_kupon' 	=> $kode_kupon,
					'diskon' 		=> $diskon,
					'harga_akhir' 	=> $harga_akhir
				]);
			} else {
				$this->session->unset_userdata('applied_coupon');
			}

			echo json_encode([
				'success' 		=> true,
				'snap_token' 	=> $snap_token,
				'diskon' 		=> $diskon,
				'harga_akhir' 	=> $harga_akhir,
				'message' 		=> $kode_kupon ? 'Kupon berhasil diterapkan' : 'Pembayaran tanpa kupon'
			]);
		} catch (Exception $e) {
			echo json_encode(['success' => false, 'message' => 'Gagal membuat token pembayaran: ' . $e->getMessage()]);
		}
	}
	
	public function prepare_payment_without_coupon()
	{
		$order_id = $this->input->post('order_id');

		if (!$order_id) {
			echo json_encode(['success' => false, 'message' => 'Data tidak lengkap']);
			return;
		}

		$this->db->where('order_id', $order_id);
		$pendaftar = $this->db->get('tb_pendaftar_pelatihan')->row_array();

		if (!$pendaftar) {
			echo json_encode(['success' => false, 'message' => 'Pendaftar tidak ditemukan']);
			return;
		}

		$paket = $this->m_paket->get_paket_by_id($pendaftar['id_paket']);

		if (!$paket) {
			echo json_encode(['success' => false, 'message' => 'Paket tidak ditemukan']);
			return;
		}

		$harga_akhir = $paket['Harga'];

		$this->load->library('midtrans');
		$params = array(
			'server_key' => $this->config->item('server_key'),
			'production' => $this->config->item('is_production'),
		);
		$this->midtrans->config($params);

		$transaction_details = array(
			'order_id' 		=> $order_id,
			'gross_amount' 	=> $harga_akhir
		);

		$customer_details = array(
			'first_name' 	=> $pendaftar['nama_pendaftar_pelatihan'],
			'last_name' 	=> '',
			'email' 		=> $pendaftar['email_pendaftar'],
			'phone' 		=> $pendaftar['no_telp']
		);

		$transaction_data = array(
			'transaction_details' 	=> $transaction_details,
			'customer_details' 		=> $customer_details,
		);

		try {
			$snap_token = $this->midtrans->getSnapToken($transaction_data);

			$this->db->where('order_id', $order_id);
			$this->db->update('tb_pendaftar_pelatihan', ['snap_token' => $snap_token]);
			
			$this->session->unset_userdata('applied_coupon');

			echo json_encode([
				'success' 		=> true,
				'snap_token' 	=> $snap_token,
				'diskon' 		=> 0,
				'harga_akhir' 	=> $harga_akhir,
				'message' 		=> 'Pembayaran siap dilakukan'
			]);
		} catch (Exception $e) {
			echo json_encode(['success' => false, 'message' => 'Gagal membuat token pembayaran: ' . $e->getMessage()]);
		}
	}

	public function talent_test_login()
	{
		$data['title'] = 'Login Talent Test';
		$data['is_talent_test'] = false;
		$data['is_pelamar'] = false;
		$this->load->view('talent_test/login', $data);
	}

	public function talent_test_login_process()
	{
		$token = $this->input->post('access_token');

		if (!$token) {
			$this->session->set_flashdata('error','Token akses tidak boleh kosong.');
			redirect('talent-test/login');
		}

		$token = trim($token);

		if (!preg_match('/^[a-f0-9]{32}$/', $token)) {
			$this->session->set_flashdata('error', 'Format token tidak valid.');
			redirect('talent-test/login');
		}

		$this->db->where('access_token',$token);
		$pendaftar = $this->db->get('tb_pendaftar_pelatihan')->row_array();

		if (!$pendaftar) {
			$this->session->set_flashdata('error', 'Token akses tidak valid.');
			redirect('talent-test/login');
		}

		if ($pendaftar['status_pembayaran'] != 'success') {
			$this->session->set_flashdata('error', 'Pembayaran belum berhasil. Silahkan lakukan pembayaran terlebih dahulu.');
			redirect('talent-test/login');
		}
		
		$this->session->set_userdata('talent_test_access_token', $token);
		$this->session->set_userdata('talent_test_user_id', $pendaftar['id_pendaftar_pelatihan']);
		$this->session->set_userdata('talent_test_user_name', $pendaftar['nama_pendaftar_pelatihan']);
		$this->session->set_userdata('talent_test_login_time', time());

		$this->session->set_flashdata('success', 'Login berhasil! Selamat datang di dashboard talent test.');

		redirect('talent-test/dashboard');
	}
	
	private function send_token_email($pendaftar, $token)
	{
		$this->load->library('email');
		$this->email->from('adm@chaakraconsulting.com', 'Choise Platform');
		$this->email->to($pendaftar['email_pendaftar']);
		$this->email->subject('Token Akses Talent Test - Choise Platform');

		$this->email->attach(FCPATH . 'upload/talent_test_payments/tutor_talent_1.png', 'inline', null, 'tutor_talent_1');
		$this->email->attach(FCPATH . 'upload/talent_test_payments/tutor_talent_2.png', 'inline', null, 'tutor_talent_2');
		$this->email->attach(FCPATH . 'upload/talent_test_payments/tutor_talent_3.png', 'inline', null, 'tutor_talent_3');
		$this->email->attach(FCPATH . 'upload/talent_test_payments/tutor_talent_4.png', 'inline', null, 'tutor_talent_4');

		$pesan = '
		<html>
		<head>
			<title>Token Akses Talent Test</title>
			<style>
				body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
				.container { max-width: 600px; margin: 0 auto; padding: 20px; }
				.header { background: #FBC02D; color: white; padding: 20px; text-align: center; }
				.content { padding: 20px; background: #f9f9f9; }
				.token-box { background: white; padding: 15px; border-left: 4px solid #FBC02D; margin: 20px 0; }
				.token { font-size: 18px; font-weight: bold; color: #FBC02D; }
				.footer { text-align: center; padding: 20px; color: #666; font-size: 12px; }
			</style>
		</head>
		<body>
			<div class="container">
				<div class="header">
					<h2>🎉 Selamat! Pembayaran Berhasil</h2>
				</div>
				<div class="content">
					<p>Halo <strong>' . $pendaftar['nama_pendaftar_pelatihan'] . '</strong>,</p>
					<p>Pembayaran Anda untuk Talent Test telah berhasil diproses. Berikut adalah token akses Anda:</p>
					<div class="token-box">
						<p><strong>Token Akses:</strong></p>
						<div class="token">' . $token . '</div>
					</div>
					<p><strong>Cara menggunakan token:</strong></p>
					<ol>
						<li>Kunjungi halaman login: <a href="' . base_url('talent-test/login') . '">' . base_url('talent-test/login') . '</a>
							<br>
							<img src="cid:tutor_talent_1" alt="Halaman Login" style="max-width:100%; height:auto; margin-top:10px;">
						</li>
						<li>Masukkan token akses di atas
							<br>
							<img src="cid:tutor_talent_2" alt="Masukkan Token" style="max-width:100%; height:auto; margin-top:10px;">
						</li>
						<li>Klik tombol "Masuk ke Dashboard Talent Test"
							<br>
							<img src="cid:tutor_talent_3" alt="Masuk ke Dashboard" style="max-width:100%; height:auto; margin-top:10px;">
						</li>
						<li>Anda akan diarahkan ke dashboard Talent Test
							<br>
							<img src="cid:tutor_talent_4" alt="Dashboard Talent Test" style="max-width:100%; height:auto; margin-top:10px;">
						</li>
					</ol>

					<p><strong>PENTING:</strong> Simpan token ini dengan aman dan jangan berikan kepada orang lain.</p>
					<p>
						Email: adm@chaakraconsulting.com<br>
						Telepon/WhatsApp: +62 856-4820-0701
					</p>
				</div>
				<div class="footer">
					<p>Email ini dikirim otomatis oleh sistem.</p>
					<p>&copy; 2020 Choise Platform. All right reserved.</p>
				</div>
			</div>
		</body>
		</html>
		';

		$this->email->message($pesan);
		if (!$this->email->send()) {
			log_message('error', 'Gagal mengirim email token ke: ' . $pendaftar['email_pendaftar']);
		} else {
			log_message('info', 'Email token berhasil dikirim ke: ' . $pendaftar['email_pendaftar']);
		}
	}
}