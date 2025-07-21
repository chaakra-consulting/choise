<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_lowongan extends CI_Controller
{

	public function __construct() //MEMPERSIAPKAN
	{
		parent::__construct();
		$this->load->helper('url', 'form');
		$this->load->model('Mdl_data_lowongan');
		$this->load->model('Mdl_data_pelamar');
		$this->load->model('Mdl_home');
		$this->load->library('form_validation');
		$this->load->database();
		if ($this->session->userdata('masuk') == FALSE) {
			redirect('Login', 'refresh');
		}
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

	// CRUD Lowongan

	public function index()
	{
		$paket['array'] = $this->Mdl_data_lowongan->ambildata_lowongan();
		$this->load->view('administrator/data_lowongan', $paket);
	}

	public function download_pelamar($id)
	{
		$paket['pelamar'] = $this->Mdl_data_lowongan->ambildata_apply($id);
		$paket['data_pelamar'] = $this->Mdl_data_pelamar->ambildata_pelamar_();
		$paket['data_pendidikan'] = $this->Mdl_data_pelamar->ambildata_pendidikan_();
		$paket['data_pengalaman'] = $this->Mdl_data_pelamar->ambildata_pengalaman_();
		$paket['data_pelatihan'] = $this->Mdl_data_pelamar->ambildata_pendidikan_non_();
		$paket['data_motivasi'] = $this->Mdl_data_pelamar->ambildata_mot();
		$dataLowongan = $this->db->query("SELECT * FROM tb_lowongan a LEFT JOIN tb_perusahaan b ON
		a.`id_perusahaan`=b.`id_perusahaan` WHERE id_lowongan =$id")->result();
		foreach ($dataLowongan as $dl) {
			if ($dl->nama_perusahaan == "RSUD Krian" || $dl->nama_perusahaan == "Dinas Kesehatan Kabupaten Sidoarjo" || $dl->nama_perusahaan == "Puskesmas Kabupaten Sidoajo") {
				$this->load->view('administrator/export_excel_khusus_krian', $paket);
			} else {
				$this->load->view('administrator/export_excel', $paket);
			}
		}
	}
	
		public function preview_download_pelamar($id)
	{
		// Tangkap jenjang pendidikan dari request (default ke 'S1' jika tidak ada input)
		$prioritas_jenjang = $this->input->post('tingkat_pendidikan');
		$range_gaji = $this->input->post('gaji');
		$usia = $this->input->post('usia');

		if ($range_gaji != '') {
			if ($range_gaji == "up") {
				$range_gaji = "DESC";
			} else {
				$range_gaji = "ASC";
			}
		}

		if ($usia != '') {
			if ($usia == "up") {
				$usia = "ASC";
			} else {
				$usia = "DESC";
			}
		}

		// Query gabungan
		$this->db->from('tb_apply')
			->select('
        tb_apply.*, 
        tb_pelamar.id_pelamar, tb_pelamar.email, 
        tb_data_diri.*, 
		tb_data_pendidikan.id_pelamar, 
		tb_data_pendidikan.jenjang_pendidikan,
		tb_data_pendidikan.nama_institusi,
        tb_motivation_letter.gaji,
        COUNT(tb_berkas.id_berkas) AS jumlah_berkas
    	')
			->join('tb_pelamar', 'tb_pelamar.id_pelamar = tb_apply.id_pelamar')
			->join('tb_data_diri', 'tb_data_diri.id_pelamar = tb_pelamar.id_pelamar')
			->join('tb_data_pendidikan', 'tb_data_pendidikan.id_pelamar = tb_pelamar.id_pelamar')
			->join('tb_motivation_letter', 'tb_motivation_letter.id_pelamar = tb_pelamar.id_pelamar')
			->join('tb_berkas', 'tb_berkas.id_pelamar = tb_pelamar.id_pelamar', 'left')
			->where('tb_apply.id_lowongan', $id)
			->group_by('tb_pelamar.id_pelamar');

		// Tambahkan pengurutan berdasarkan prioritas_jenjang jika diisi
		if ($prioritas_jenjang != '') {
			$this->db->order_by("
			CASE 
				WHEN tb_data_pendidikan.jenjang_pendidikan = '$prioritas_jenjang' THEN 1
				ELSE 2
			END
   		", 'ASC');
		}

		// Tambahkan pengurutan berdasarkan gaji jika diisi
		if ($range_gaji != '') {
			$this->db->order_by('tb_motivation_letter.gaji', $range_gaji);
		}

		// Tambahkan pengurutan berdasarkan usia jika diisi
		if ($usia != '') {
			$this->db->order_by('tb_data_diri.tanggal_lahir', $usia);
		}

		// Tambahkan pengurutan default untuk jumlah berkas
		$this->db->order_by('jumlah_berkas', 'DESC');

		// Eksekusi query
		$getPelamar = $this->db->get();

		// Format data pelamar
		$data_pelamar = [];
		foreach ($getPelamar->result() as $key) {
			$tgl = strtotime($key->tanggal_lahir);
			$current_time = time();
			$age_years = date('Y', $current_time) - date('Y', $tgl);
			$age_months = date('m', $current_time) - date('m', $tgl);
			$age_days = date('d', $current_time) - date('d', $tgl);
			if ($age_days < 0) {
				$days_in_month = date('t', $current_time);
				$age_months--;
				$age_days = $days_in_month + $age_days;
			}
			if ($age_months < 0) {

				$age_years--;

				$age_months = 12 + $age_months;
			}

			$data_pendidikan = $this->db->from('tb_data_pendidikan')->select('tb_data_pendidikan.id_pelamar, tb_data_pendidikan.jenjang_pendidikan, tb_data_pendidikan.nama_institusi, tb_data_pendidikan.jurusan')
				->where('tb_data_pendidikan.id_pelamar', $key->id_pelamar)
				->get()->result();

			$data_pendidikan_nonformal = $this->db->from('tb_data_pendidikan_nonformal')->select('tb_data_pendidikan_nonformal.id_pelamar, tb_data_pendidikan_nonformal.nama_pendidikan_nonformal')
				->where('tb_data_pendidikan_nonformal.id_pelamar', $key->id_pelamar)
				->get()->result();

			$data_pegalaman_kerja = $this->db->from('tb_data_pengalaman_kerja')->select('tb_data_pengalaman_kerja.id_pelamar, tb_data_pengalaman_kerja.nama_perusahaan, tb_data_pengalaman_kerja.jabatan_akhir')
				->where('tb_data_pengalaman_kerja.id_pelamar', $key->id_pelamar)
				->get()->result();

			$data_berkas = $this->db->query("SELECT * FROM tb_berkas WHERE id_pelamar=" . $key->id_pelamar)->result_array();
			$arr_kat = ['ktp', 'foto', 'ijasah terakhir', 'berkas chaakra', 'surat referensi kerja', 'transkip nilai'];
			$arr_kat_hasil = [];
			foreach ($data_berkas as $key_berkas) {

				$kat = $key_berkas['kategori'];

				if ($kat == 'ktp') {
					array_push($arr_kat_hasil, $kat);
				} elseif ($kat == 'foto') {
					array_push($arr_kat_hasil, $kat);
				} elseif ($kat == 'ijasah') {
					array_push($arr_kat_hasil, 'ijasah terakhir');
				} elseif ($kat == 'berkaschaakra') {
					array_push($arr_kat_hasil, 'berkas chaakra');
				} elseif ($kat == 'referensi') {
					array_push($arr_kat_hasil, 'surat referensi kerja');
				} elseif ($kat == 'transkip') {
					array_push($arr_kat_hasil, 'transkip nilai');
				}
			}
			$arr_hasil_berkas = array_diff($arr_kat, $arr_kat_hasil);
			if (count($arr_kat_hasil) >= count($arr_kat)) {
				$ket_berkas = 'Lengkap';
			} else {
				$ket_berkas = 'Tidak ada ' . implode(', ', $arr_hasil_berkas);
			}

			$data_pelamar[] = [
				'id_pelamar' => $key->id_pelamar,
				'nama' => $key->nama_pelamar,
				'umur' => $age_years,
				'data_diri' => $key,
				// 'gaji_diinginkan' => number_format($key->gaji),
				'gaji_diinginkan' => is_numeric($key->gaji) ? number_format((float) $key->gaji) : '0',
				'data_pendidikan' => $data_pendidikan,
				'data_pendidikan_nonformal' => $data_pendidikan_nonformal,
				'data_pengalaman_kerja' => $data_pegalaman_kerja,
				'keterangan_berkas' => $ket_berkas,
				'pencarian' => [
					'jenjang' => $prioritas_jenjang,
					'gaji' => $range_gaji,
					'usia' => $usia
				]
			];
		}

		echo json_encode($data_pelamar);
	}


	public function tambahdata()
	{
		$this->form_validation->set_rules('nama_lowongan', 'Nama', 'trim|required');
		$this->form_validation->set_rules('id_perusahaan', 'Nama', 'trim|required');
		$this->form_validation->set_rules('jadwal_seleksi', 'Nama', 'trim|required');
		$this->form_validation->set_rules('kota_penempatan', 'Nama', 'trim|required');
		$this->form_validation->set_rules('persyaratan', 'Nama', 'trim|required');
		$this->form_validation->set_rules('gaji', 'Nama', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['msg_error'] = "Silahkan isi semua kolom";
			$this->load->view('administrator/vtambah_lowongan', $data);
		} else {
			$send['id_lowongan'] = '';
			$send['nama_jabatan'] = $this->input->post('nama_lowongan');
			$send['id_perusahaan'] = $this->input->post('id_perusahaan');
			$send['id_jenis_motlet'] = $this->input->post('id_jenis_motlet');
			$send['jadwal_seleksi'] = $this->input->post('jadwal_seleksi');
			$send['kota_penempatan'] = $this->input->post('kota_penempatan');
			$send['persyaratan'] = $this->input->post('persyaratan');
			$send['gaji'] = $this->input->post('gaji');
			$send['status'] = 'tersedia';

			$kembalian['jumlah'] = $this->Mdl_data_lowongan->tambahdata_lowongan($send);

			$this->load->view('administrator/data_lowongan', $kembalian);
			$this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan!!!');
			redirect('Administrator/Data_lowongan/');
		}
	}

	public function hapus_lowongan($id)
	{
		$where = array('id_lowongan' => $id);
		$this->Mdl_data_lowongan->do_delete($where, 'tb_lowongan');
		$this->Mdl_data_lowongan->do_delete($where, 'tb_apply');
		$this->session->set_flashdata('msg_hapus', 'Data Berhasil dihapus');
		redirect('Administrator/Data_lowongan/');
	}

	public function edit_lowongan($id_update)
	{
		$this->form_validation->set_rules('nama_lowongan', 'Nama', 'trim|required');
		$this->form_validation->set_rules('id_perusahaan', 'Nama', 'trim|required');
		$this->form_validation->set_rules('jadwal_seleksi', 'Nama', 'trim|required');
		$this->form_validation->set_rules('kota_penempatan', 'Nama', 'trim|required');
		$this->form_validation->set_rules('persyaratan', 'Nama', 'trim|required');
		$this->form_validation->set_rules('gaji', 'Nama', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$indexrow['data'] = $this->Mdl_data_lowongan->ambildata2_lowongan($id_update);
			$this->load->view('administrator/vedit_lowongan', $indexrow);
		} else {
			$send['id_lowongan'] = $this->input->post('id_lowongan');
			$send['id_perusahaan'] = $this->input->post('id_perusahaan');
			$send['id_jenis_motlet'] = $this->input->post('id_jenis_motlet');
			$send['nama_jabatan'] = $this->input->post('nama_lowongan');
			$send['jadwal_seleksi'] = $this->input->post('jadwal_seleksi');
			$send['kota_penempatan'] = $this->input->post('kota_penempatan');
			$send['persyaratan'] = $this->input->post('persyaratan');
			$send['gaji'] = $this->input->post('gaji');
			// var_dump($send);
			$kembalian['jumlah'] = $this->Mdl_data_lowongan->modelupdate($send);
			$this->session->set_flashdata('msg_update', 'Data Berhasil diupdate');
			redirect('Administrator/Data_lowongan');
		}
	}

	// END CRUD Lowongan
	// ============================================================================================
	// detail lowongan
	public function download_zip($id_pelamar, $id_lowongan, $no)
	{
		$this->load->library('zip');
		$a = $this->db->query("SELECT * FROM tb_berkas where id_pelamar=$id_pelamar")->result();
		$b = $this->db->query("SELECT * FROM tb_data_diri where id_pelamar=$id_pelamar")->result();
		foreach ($a as $key) {
			$this->zip->read_file('upload/berkas_pelamar/' . $key->berkas);
		}
		$this->zip->download(($no) . '. ' . $b[0]->nama_pelamar . '.zip');
		redirect('Administrator/Data_lowongan/detail_lowongan/' . $id_lowongan);
	}
    public function detail_lowongan($id_detail)
	{
		$paket['array'] = $this->Mdl_data_lowongan->ambildata_apply($id_detail, 1000000, 0);
		$paket['pagination'] = '';
		$this->load->view('administrator/detail_lowongan', $paket);
	}
	public function sembunyikan_lowongan($id_update)
	{

		// $id_lowongan = $this->input->post('id_lowongan');

		$send['id_lowongan'] = $id_update;
		$send['status'] = 'sembunyi';
		// var_dump($send);
		$kembalian['jumlah'] = $this->Mdl_data_lowongan->modelupdate_sembunyi($send);
		$this->session->set_flashdata('msg_update', 'Data Berhasil diupdate');
		redirect('Administrator/Data_lowongan');
	}
	public function tampilkan_lowongan($id_update)
	{

		// $id_lowongan = $this->input->post('id_lowongan');

		$send['id_lowongan'] = $id_update;
		$send['status'] = 'tersedia';
		// var_dump($send);
		$kembalian['jumlah'] = $this->Mdl_data_lowongan->modelupdate_sembunyi($send);
		$this->session->set_flashdata('msg_update', 'Data Berhasil diupdate');
		redirect('Administrator/Data_lowongan');
	}
	public function update_keikutsertaan_ujian($id_update, $low, $update)
	{

		// $id_lowongan = $this->input->post('id_lowongan');

		// var_dump($send);
		$this->db->query("UPDATE tb_apply SET status_ujian='$update' WHERE id_apply=$id_update");
		$this->session->set_flashdata('msg_update', 'Data Berhasil diupdate');
		redirect('Administrator/Data_lowongan/detail_lowongan/' . $low);
	}
	public function update_all_apply($low, $update)
	{
		$datalamar = $this->db->query("SELECT * FROM tb_apply where id_lowongan=$low")->result();
		// $id_lowongan = $this->input->post('id_lowongan');
		if ($update == "terima_semua_lamaran") {
			foreach ($datalamar as $key) {
				$this->db->query("UPDATE tb_apply SET status_lamaran='Diterima' WHERE id_apply=$key->id_apply");
			}
		} elseif ($update == "tolak_semua_lamara_tidak_ada_tindakan") {
			foreach ($datalamar as $key) {
				$this->db->query("UPDATE tb_apply SET status_lamaran='Tidak lolos' WHERE id_apply=$key->id_apply AND status_lamaran='Belum ada tindakan'");
			}
		} elseif ($update == "aktifkan_semua_keikutsertaan_ujian") {
			foreach ($datalamar as $key) {
				$this->db->query("UPDATE tb_apply SET status_ujian='aktif' WHERE id_apply=$key->id_apply");
			}
		} else {
			foreach ($datalamar as $key) {
				$this->db->query("UPDATE tb_apply SET status_ujian='tidak_aktif' WHERE id_apply=$key->id_apply");
			}
		}
		// var_dump($send);
		$this->session->set_flashdata('msg_update', 'Data Berhasil diupdate');
		redirect('Administrator/Data_lowongan/detail_lowongan/' . $low);
	}

	//detail pelamar


	public function terima_pelamar($id)
	{
		$where = array('id_apply' => $id);
		$this->Mdl_data_pelamar->terima_pelamar($where, 'tb_apply');

		$id_pelamar = $this->session->userdata('ses_id');
		$queryMail = $this->db->query("SELECT * FROM tb_pelamar WHERE id_pelamar = $id_pelamar");
		$queryApp = $this->db->query("SELECT * FROM tb_apply WHERE id_apply = $id");
		$queryLowongan = $this->db->query("SELECT * FROM tb_lowongan");
		$queryPerusahaan = $this->db->query("SELECT * FROM tb_perusahaan");

		$queryData = $this->db->query("SELECT * FROM tb_data_diri");

		foreach ($queryApp->result() as $keyApp) {
			$idLowApp = $keyApp->id_lowongan;
			$idPerApp = $keyApp->id_perusahaan;
			$idPel = $keyApp->id_pelamar;

			foreach ($queryLowongan->result() as $keyLow) {
				if ($idLowApp == $keyLow->id_lowongan) {
					$posisi = $keyLow->nama_jabatan;
				}
			}

			foreach ($queryPerusahaan->result() as $keyPer) {
				if ($idPerApp == $keyPer->id_perusahaan) {
					$perusahaan = $keyPer->nama_perusahaan;
				}
			}

			foreach ($queryData->result() as $keyData) {
				if ($idPel == $keyData->id_pelamar) {
					# code...
					$nama = $keyData->nama_pelamar;
					$no = $keyData->no_hp;
				}
			}
		}

		foreach ($queryMail->result() as $key) {
			$penerima = $key->email;
		}

		$message = '';
		$message .= '*Hai ' . $nama . '* ';
		$message .= '\n2 Selamat! Anda lolos seleksi administrasi sebagai kandidat ' . $posisi . ' dalam Tim ' . $perusahaan . '. Anda diundang untuk mengikuti kegiatan seleksi tahap selanjutnya yang akan diselenggarakan pada: \n2 ';
		$message .= 'Hari, tanggal : Sabtu, 31 Oktober 2020 \n ';
		$message .= 'Pukul : 08.00 - selesai \n ';
		$message .= 'Tempat : Kantor Chaakra Consulting, lantai 3, Gedung Virto Office, Ruko Galaxi Bumi Permai J1-23A, Semolowaru, Kec. Sukolilo, Surabaya. \n ';
		$message .= 'Dress code: office look. \n2 ';
		$message .= ' Silahkan memeriksa email Anda untuk mendapatkan informasi lebih lanjut \n2 ';
		$message .= ' *Mohon konfirmasi kehadiran Anda ke nomor ini SEBELUM HARI RABU 28 Oktober 2020 pukul 10.00 WIB dengan format berikut* \n2 ';
		$message .= ' IYA/TIDAK_NAMA';
		$message .= ' *Wajib menggunakan masker & face shield yang dibawa sendiri selama tes berlangsung*  \n ';
		$message .= '------- \n ';
		$message .= 'Terima kasih 
Tim Seleksi Chaakra Consulting';


		/*Kirim email*/


		$subject_ = "ADM CHOISE - Pengumuman (No Reply)";

		$pesan_ = '
		<b>SELAMAT,</b> <br><br>
		Anda dinyatakan lolos seleksi administrasi, untuk info selanjutnya bisa akses akun choise anda<br> <br> <br><br>
		Terimakasih.<br><br> Tim Rekrutmen dan Assessment Chaakraconsulting
		';
		$to_ = $penerima;

		// $this->Mdl_home->send_mail($subject_,$pesan_,$to_);	

		// Send Wa
		// $curl = curl_init();
		// $token = "Q3TYHwfhluVn6eP6Ud3F6IisRJ7EhqlLpIYTm1qGgy7TfJBpdwJ3UPUJBbgsbBBi";
		// $data = [
		// 	'phone' => $no,
		// 	'message' => $message,
		// ];

		// curl_setopt($curl, CURLOPT_HTTPHEADER,
		// 	array(
		// 		"Authorization: $token",
		// 	)
		// );
		// curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
		// curl_setopt($curl, CURLOPT_URL, "https://sawit.wablas.com/api/send-message");
		// curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		// $result = curl_exec($curl);
		// curl_close($curl);

		// echo "<pre>";
		// print_r($result);

		// if ($result) {
		// 	$this->session->set_flashdata('msg_success','Pelamar diterima, pemberitahuan berhasil dikirim via Whatsapp');
		// 	redirect('Administrator/Data_lowongan/');	
		// } else{
		// 	$this->session->set_flashdata('msg_hapus','Gagal mengirim wa');
		// 	redirect('Administrator/Data_lowongan/');	
		// }
		redirect('Administrator/Data_lowongan/detail_lowongan/' . $idLowApp);
	}

	public function tolak_pelamar($id)
	{
		$where = array('id_apply' => $id);
		$this->Mdl_data_pelamar->tolak_pelamar($where, 'tb_apply');


		$id_pelamar = $this->session->userdata('ses_id');
		$queryMail = $this->db->query("SELECT * FROM tb_pelamar WHERE id_pelamar = $id_pelamar");
		$queryApp = $this->db->query("SELECT * FROM tb_apply WHERE id_apply = $id");
		$queryLowongan = $this->db->query("SELECT * FROM tb_lowongan");
		$queryPerusahaan = $this->db->query("SELECT * FROM tb_perusahaan");

		$queryData = $this->db->query("SELECT * FROM tb_data_diri");

		foreach ($queryApp->result() as $keyApp) {
			$idLowApp = $keyApp->id_lowongan;
			$idPerApp = $keyApp->id_perusahaan;
			$idPel = $keyApp->id_pelamar;

			foreach ($queryLowongan->result() as $keyLow) {
				if ($idLowApp == $keyLow->id_lowongan) {
					$posisi = $keyLow->nama_jabatan;
				}
			}

			foreach ($queryPerusahaan->result() as $keyPer) {
				if ($idPerApp == $keyPer->id_perusahaan) {
					$perusahaan = $keyPer->nama_perusahaan;
				}
			}

			foreach ($queryData->result() as $keyData) {
				if ($idPel == $keyData->id_pelamar) {
					# code...
					$nama = $keyData->nama_pelamar;
					$no = $keyData->no_hp;
				}
			}
		}

		foreach ($queryMail->result() as $key) {
			$penerima = $key->email;
		}


		$message = '';
		$message .= '*Hai ' . $nama . '* ';
		$message .= '\n2 Mohon maaf anda dinyatakan gagal seleksi administrasi pada lowongan ' . $posisi . 'di perusahaan ' . $perusahaan . '  \n ';
		$message .= 'Tetap semangat, Jangan menyerah. \n2 ';
		$message .= ' *_Admin CHOISE_*';

		// Send Wa
		$curl = curl_init();
		$token = "Q3TYHwfhluVn6eP6Ud3F6IisRJ7EhqlLpIYTm1qGgy7TfJBpdwJ3UPUJBbgsbBBi";
		$data = [
			'phone' => $no,
			'message' => $message,
		];

		curl_setopt(
			$curl,
			CURLOPT_HTTPHEADER,
			array(
				"Authorization: $token",
			)
		);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($curl, CURLOPT_URL, "https://sawit.wablas.com/api/send-message");
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		$result = curl_exec($curl);
		curl_close($curl);

		echo "<pre>";
		print_r($result);

		if ($result) {
			$this->session->set_flashdata('msg_success', 'Pelamar ditolak, pemberitahuan berhasil dikirim via Whatsapp');
			redirect('Administrator/Data_lowongan/detail_lowongan/' . $idLowApp);
		} else {
			$this->session->set_flashdata('msg_hapus', 'Gagal mengirim wa');
			redirect('Administrator/Data_lowongan/detail_lowongan/' . $idLowApp);
		}
	}
	public function kirim_pesan($id)
	{
		$where = array('id_apply' => $id);
		$this->Mdl_data_pelamar->tolak_pelamar($where, 'tb_apply');


		$id_pelamar = $this->session->userdata('ses_id');
		$queryMail = $this->db->query("SELECT * FROM tb_pelamar WHERE id_pelamar = $id_pelamar");
		$queryApp = $this->db->query("SELECT * FROM tb_apply WHERE id_apply = $id");
		$queryLowongan = $this->db->query("SELECT * FROM tb_lowongan");
		$queryPerusahaan = $this->db->query("SELECT * FROM tb_perusahaan");

		$queryData = $this->db->query("SELECT * FROM tb_data_diri");

		foreach ($queryApp->result() as $keyApp) {
			$idLowApp = $keyApp->id_lowongan;
			$idPerApp = $keyApp->id_perusahaan;
			$idPel = $keyApp->id_pelamar;

			foreach ($queryLowongan->result() as $keyLow) {
				if ($idLowApp == $keyLow->id_lowongan) {
					$posisi = $keyLow->nama_jabatan;
				}
			}

			foreach ($queryPerusahaan->result() as $keyPer) {
				if ($idPerApp == $keyPer->id_perusahaan) {
					$perusahaan = $keyPer->nama_perusahaan;
				}
			}

			foreach ($queryData->result() as $keyData) {
				if ($idPel == $keyData->id_pelamar) {
					# code...
					$nama = $keyData->nama_pelamar;
					$no = $keyData->no_hp;
				}
			}
		}

		foreach ($queryMail->result() as $key) {
			$penerima = $key->email;
		}


		$message = '';
		$message .= '*Hai ' . $nama . '* ';
		$message .= '\n2 Mohon maaf anda dinyatakan gagal seleksi administrasi pada lowongan ' . $posisi . 'di perusahaan ' . $perusahaan . '  \n ';
		$message .= 'Tetap semangat, Jangan menyerah. \n2 ';
		$message .= ' *_Admin CHOISE_*';

		// Send Wa
		$curl = curl_init();
		$token = "Q3TYHwfhluVn6eP6Ud3F6IisRJ7EhqlLpIYTm1qGgy7TfJBpdwJ3UPUJBbgsbBBi";
		$data = [
			'phone' => $no,
			'message' => $message,
		];

		curl_setopt(
			$curl,
			CURLOPT_HTTPHEADER,
			array(
				"Authorization: $token",
			)
		);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($curl, CURLOPT_URL, "https://sawit.wablas.com/api/send-message");
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		$result = curl_exec($curl);
		curl_close($curl);

		echo "<pre>";
		print_r($result);

		if ($result) {
			$this->session->set_flashdata('msg_success', 'Pelamar ditolak, pemberitahuan berhasil dikirim via Whatsapp');
			redirect('Administrator/Data_lowongan/detail_lowongan/' . $idLowApp);
		} else {
			$this->session->set_flashdata('msg_hapus', 'Gagal mengirim wa');
			redirect('Administrator/Data_lowongan/detail_lowongan/' . $idLowApp);
		}
	}
}
