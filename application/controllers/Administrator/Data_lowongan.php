<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
	
	// CRUD Lowongan
	public function index()
	{
		$paket['array'] = $this->Mdl_data_lowongan->ambildata_lowongan();
		$this->load->view('administrator/data_lowongan', $paket);
	}
	
	public function download_pelamar($id)
	{
		$prioritas_jenjang = $this->input->get('tingkat_pendidikan');
		$range_gaji = $this->input->get('gaji');
		$usia = $this->input->get('usia');

		if ($range_gaji != '') {
			$range_gaji = ($range_gaji == "up") ? "DESC" : "ASC";
		}

		if ($usia != '') {
			$usia = ($usia == "up") ? "ASC" : "DESC";
		}
		
		$this->db->from('tb_apply')
			->select('
				tb_apply.id_apply,
				tb_apply.id_lowongan,
				tb_apply.id_pelamar,
				tb_apply.id_perusahaan,
				tb_apply.kota_penempatan,
				tb_apply.status_lamaran,
				tb_apply.status_ujian,
				tb_pelamar.email,
				tb_data_diri.*,
				tb_motivation_letter.gaji,
				t_provinsi.nama as domisili_provinsi_nama,
				t_kota.nama as domisili_kota_nama,
				t_kecamatan.nama as domisili_kecamatan_nama,
				t_kelurahan.nama as domisili_kelurahan_nama,
			')
			->join('tb_pelamar', 'tb_pelamar.id_pelamar = tb_apply.id_pelamar')
			->join('tb_data_diri', 'tb_data_diri.id_pelamar = tb_pelamar.id_pelamar')
			->join('tb_motivation_letter', 'tb_motivation_letter.id_pelamar = tb_pelamar.id_pelamar', 'left')
			->join('t_provinsi', 't_provinsi.id = tb_data_diri.domisili_provinsi_id', 'left')
			->join('t_kota', 't_kota.id = tb_data_diri.domisili_kota_id', 'left')
			->join('t_kecamatan', 't_kecamatan.id = tb_data_diri.domisili_kecamatan_id', 'left')
			->join('t_kelurahan', 't_kelurahan.id = tb_data_diri.domisili_kelurahan_id', 'left')
			->where('tb_apply.id_lowongan', $id);

		if ($prioritas_jenjang != '') {
			$this->db->order_by("CASE WHEN tb_data_pendidikan.jenjang_pendidikan = '$prioritas_jenjang' THEN 1 ELSE 2 END", 'ASC');
		}

		if ($range_gaji != '') {
			$this->db->order_by('tb_motivation_letter.gaji', $range_gaji);
		}

		if ($usia != '') {
			$this->db->order_by('tb_data_diri.tanggal_lahir', $usia);
		}
		$getPelamar = $this->db->get()->result_array();

		$grouped_pelamar = [];
		$unique_pelamar = [];
		foreach ($getPelamar as $key) {
			if (isset($unique_pelamar[$key['id_pelamar']])) continue;
			$unique_pelamar[$key['id_pelamar']] = true;
			$kota = !empty($key['kota_penempatan']) ? $key['kota_penempatan'] : 'Belum Ditentukan';
			if (!isset($grouped_pelamar[$kota])) {
				$grouped_pelamar[$kota] = [];
			}
			$grouped_pelamar[$kota][] = $key;
		}
		
		$query = $this->db->query("SELECT a.nama_jabatan, b.nama_perusahaan FROM tb_lowongan a JOIN tb_perusahaan b ON a.id_perusahaan = b.id_perusahaan WHERE a.id_lowongan = $id");
		$dataLowongan = $query->row();
		$nama_lowongan = $dataLowongan->nama_jabatan;
		$nama_perusahaan = $dataLowongan->nama_perusahaan;

		$perusahaan_khusus = ["RSUD Krian", "Dinas Kesehatan Kabupaten Sidoarjo", "Puskesmas Kabupaten Sidoarjo"];

		if (in_array($nama_perusahaan, $perusahaan_khusus)) {
			$this->buat_excel_krian($grouped_pelamar, $nama_lowongan, $nama_perusahaan);
		} else {
			$this->buat_excel_umum($grouped_pelamar, $nama_lowongan, $nama_perusahaan);
		}
	}

	private function buat_excel_krian($grouped_pelamar, $nama_lowongan, $nama_perusahaan)
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setTitle('Data Pelamar Krian');
		$sheet->setCellValue('A1', 'ini adalah format khusus untuk ' . $nama_perusahaan);
		$sheet->setCellValue('A2', 'No');
		$sheet->setCellValue('B2', 'Nama Peserta');
		$sheet->setCellValue('C2', 'No Hp');
		$sheet->setCellValue('D2', 'Email');
		$sheet->setCellValue('E2', 'Pendidikan Terakhir');
		$sheet->setCellValue('F2', 'Pengalaman Kerja');
		$sheet->setCellValue('G2', 'Jenis Pelatihan');
		$sheet->setCellValue('H2', 'Kelengkapan Berkas');

		$writer = new Xlsx($spreadsheet);
		$nama_lowongan_clean = preg_replace('/[^A-Za-z0-9\-]/', '_', $nama_lowongan);
		$nama_perusahaan_clean = preg_replace('/[^A-Za-z0-9\-]/', '_', $nama_perusahaan);
		$tanggal_sekarang = date('Y-m-d');
		$filename = 'Pelamar_Khusus_Krian_' . $nama_lowongan_clean . '_' . $nama_perusahaan_clean . '_' . $tanggal_sekarang . '.xlsx';
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="' . $filename . '"');
		header('Cache-Control: max-age=0');
		$writer->save('php://output');
		exit();
	}
	
	private function buat_excel_umum($grouped_pelamar, $nama_lowongan, $nama_perusahaan)
    {
        $spreadsheet = new Spreadsheet();
        $spreadsheet->removeSheetByIndex(0);

        foreach ($grouped_pelamar as $kota => $pelamarData) {
            $sheet = $spreadsheet->createSheet();
            $sheetTitle = substr(preg_replace('/[\\\\\/\?\*\[\]]/', '', $kota), 0, 31);
            $sheet->setTitle($sheetTitle);

            $headers = ['No', 'Nama', 'TTL', 'Usia', 'Jenis Kelamin', 'Agama', 'Domisili', 'Domisili Provinsi', 'Domisili Kota/Kabupaten', 'Domisili Kecamatan', 'Domisili Kelurahan', 'No Hp', 'Facebook', 'Instagram', 'Twitter', 'Linkedln', 'Email', 'Gaji yang diinginkan', 'Pendidikan', 'Pengalaman Kerja', 'Jenis Pelatihan', 'Kelengkapan Berkas'];
            $sheet->fromArray($headers, NULL, 'A1');
            $sheet->getStyle('A1:V1')->getFont()->setBold(true);

            $rowNumber = 2;
            foreach ($pelamarData as $index => $pelamar) {
                // PERBAIKAN 5: Ambil data detail untuk setiap pelamar
                $usia = !empty($pelamar['tanggal_lahir']) && $pelamar['tanggal_lahir'] != '0000-00-00' ? date_diff(date_create($pelamar['tanggal_lahir']), date_create('now'))->y : 0;
                $pendidikan_list = $this->db->from('tb_data_pendidikan')->where('id_pelamar', $pelamar['id_pelamar'])->get()->result();
                $pengalaman_list = $this->db->from('tb_data_pengalaman_kerja')->where('id_pelamar', $pelamar['id_pelamar'])->get()->result();
                $pelatihan_list = $this->db->from('tb_data_pendidikan_nonformal')->where('id_pelamar', $pelamar['id_pelamar'])->get()->result();
                
                $pendidikanStr = implode("\n", array_map(function($p) { return "- {$p->jenjang_pendidikan} - {$p->nama_institusi} ({$p->jurusan})"; }, $pendidikan_list));
                $pengalamanStr = implode("\n", array_map(function($p) { return "- {$p->jabatan_akhir} - {$p->nama_perusahaan}"; }, $pengalaman_list));
                $pelatihanStr = implode("\n", array_map(function($p) { return "- {$p->nama_pendidikan_nonformal}"; }, $pelatihan_list));

                // Logika kelengkapan berkas
                $berkas_list = $this->db->from('tb_berkas')->where('id_pelamar', $pelamar['id_pelamar'])->get()->result_array();
                $arr_kat = ['ktp', 'foto', 'ijasah terakhir', 'berkas chaakra', 'surat referensi kerja', 'transkip nilai'];
                $arr_kat_hasil = [];
                foreach ($berkas_list as $b) {
                    $kat = $b['kategori'];
                    if ($kat == 'ktp' || $kat == 'foto') { array_push($arr_kat_hasil, $kat); } 
                    elseif ($kat == 'ijasah') { array_push($arr_kat_hasil, 'ijasah terakhir'); } 
                    elseif ($kat == 'berkaschaakra') { array_push($arr_kat_hasil, 'berkas chaakra'); } 
                    elseif ($kat == 'referensi') { array_push($arr_kat_hasil, 'surat referensi kerja'); } 
                    elseif ($kat == 'transkip') { array_push($arr_kat_hasil, 'transkip nilai'); }
                }
                $arr_hasil_berkas = array_diff($arr_kat, $arr_kat_hasil);
                $ket_berkas = (count($arr_kat_hasil) >= count($arr_kat)) ? 'Lengkap' : 'Tidak ada ' . implode(', ', $arr_hasil_berkas);

                $data_row = [
                    $index + 1, 
					$pelamar['nama_pelamar'], 
					$pelamar['tempat_lahir'] . ', ' . $pelamar['tanggal_lahir'],
                    $usia, 
					$pelamar['jenis_kelamin'], 
					$pelamar['agama'], 
					$pelamar['alamat'], 
					$pelamar['domisili_provinsi_nama'] ?? '',
					$pelamar['domisili_kota_nama'] ?? '',
					$pelamar['domisili_kecamatan_nama'] ?? '',
					$pelamar['domisili_kelurahan_nama'] ?? '',
					$pelamar['no_hp'],
                    $pelamar['facebook'], 
					$pelamar['instagram'], 
					$pelamar['twitter'], 
					$pelamar['linkedin'],
                    $pelamar['email'], 
					is_numeric($pelamar['gaji']) ? number_format((float)$pelamar['gaji']) : '0',
                    $pendidikanStr, 
					$pengalamanStr, 
					$pelatihanStr, 
					$ket_berkas
                ];

                $sheet->fromArray($data_row, NULL, 'A' . $rowNumber);
                $sheet->getStyle('S'.$rowNumber.':U'.$rowNumber)->getAlignment()->setWrapText(true);
                $rowNumber++;
            }
            
            foreach (range('A', 'V') as $col) {
                $sheet->getColumnDimension($col)->setAutoSize(true);
            }
        }

        $spreadsheet->setActiveSheetIndex(0);
        $writer = new Xlsx($spreadsheet);
		$nama_lowongan_clean = preg_replace('/[^A-Za-z0-9\-]/', '_', $nama_lowongan);
		$nama_perusahaan_clean = preg_replace('/[^A-Za-z0-9\-]/', '_', $nama_perusahaan);
		$tanggal_sekarang = date('Y-m-d');
		$filename = 'Pelamar_' . $nama_lowongan_clean . '_' . $nama_perusahaan_clean . '_' . $tanggal_sekarang . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }

	public function preview_download_pelamar($id)
	{
		$prioritas_jenjang = $this->input->post('tingkat_pendidikan');
		$range_gaji = $this->input->post('gaji');
		$usia = $this->input->post('usia');

		if ($range_gaji != '') {
			$range_gaji = ($range_gaji == "up") ? "DESC" : "ASC";
		}

		if ($usia != '') {
			$usia = ($usia == "up") ? "ASC" : "DESC";
		}
		
		$this->db->from('tb_apply')
			->select('
				tb_apply.id_apply,
				tb_apply.id_lowongan,
				tb_apply.id_pelamar,
				tb_apply.id_perusahaan,
				tb_apply.kota_penempatan,
				tb_apply.status_lamaran,
				tb_apply.status_ujian,
				tb_pelamar.id_pelamar,
				tb_pelamar.email,
				tb_data_diri.tanggal_lahir,
				tb_data_diri.tempat_lahir,
				tb_data_diri.nama_pelamar,
				tb_data_diri.no_hp,
				tb_data_diri.jenis_kelamin,
				tb_data_diri.agama,
				tb_data_diri.alamat,
				tb_data_diri.alamat_ktp,
				tb_data_diri.domisili_jalan,
				tb_data_diri.domisili_provinsi_id,
				tb_data_diri.domisili_kota_id,
				tb_data_diri.domisili_kecamatan_id,
				tb_data_diri.domisili_kelurahan_id,
				tb_data_diri.facebook,
				tb_data_diri.instagram,
				tb_data_diri.twitter,
				tb_data_diri.linkedin,
				tb_motivation_letter.gaji,
				t_provinsi.nama as domisili_provinsi_nama,
				t_kota.nama as domisili_kota_nama,
				t_kecamatan.nama as domisili_kecamatan_nama,
				t_kelurahan.nama as domisili_kelurahan_nama,
			')
			->join('tb_pelamar', 'tb_pelamar.id_pelamar = tb_apply.id_pelamar')
			->join('tb_data_diri', 'tb_data_diri.id_pelamar = tb_pelamar.id_pelamar')
			->join('tb_motivation_letter', 'tb_motivation_letter.id_pelamar = tb_pelamar.id_pelamar')
			->join('tb_data_pendidikan', 'tb_data_pendidikan.id_pelamar = tb_pelamar.id_pelamar', 'left')
			->join('t_provinsi', 't_provinsi.id = tb_data_diri.domisili_provinsi_id', 'left')
			->join('t_kota', 't_kota.id = tb_data_diri.domisili_kota_id', 'left')
			->join('t_kecamatan', 't_kecamatan.id = tb_data_diri.domisili_kecamatan_id', 'left')
			->join('t_kelurahan', 't_kelurahan.id = tb_data_diri.domisili_kelurahan_id', 'left')
			->where('tb_apply.id_lowongan', $id);

		if ($prioritas_jenjang != '') {
			$this->db->order_by("
				CASE 
					WHEN tb_data_pendidikan.jenjang_pendidikan = '$prioritas_jenjang' THEN 1
					ELSE 2
				END
			", 'ASC');
		}

		if ($range_gaji != '') {
			$this->db->order_by('tb_motivation_letter.gaji', $range_gaji);
		}

		if ($usia != '') {
			$this->db->order_by('tb_data_diri.tanggal_lahir', $usia);
		}
		
		$getPelamar = $this->db->get();
		
		$groupep_pelamar = [];
		$unique_pelamar = [];

		foreach ($getPelamar->result() as $key) {
			if (isset($unique_pelamar[$key->id_pelamar])) {
				continue;
			}
			$unique_pelamar[$key->id_pelamar] = true;
			
			$kota = !empty($key->kota_penempatan) ? $key->kota_penempatan : $key->kota_penempatan;
			if (!isset($groupep_pelamar[$kota])) {
				$groupep_pelamar[$kota] = [];
			}
			$age_years = null;
			if (!empty($key->tanggal_lahir) && $key->tanggal_lahir != '0000-00-00') {
				$dob = new DateTime($key->tanggal_lahir);
				$now = new DateTime();
				$age_years = $now->diff($dob)->y;
			}

			$data_pendidikan = $this->db->from('tb_data_pendidikan')
				->select('jenjang_pendidikan, nama_institusi, jurusan')
				->where('id_pelamar', $key->id_pelamar)
				->get()->result();

			$data_pendidikan_nonformal = $this->db->from('tb_data_pendidikan_nonformal')
				->select('nama_pendidikan_nonformal')
				->where('id_pelamar', $key->id_pelamar)
				->get()->result();

			$data_pegalaman_kerja = $this->db->from('tb_data_pengalaman_kerja')
				->select('nama_perusahaan, jabatan_akhir')
				->where('id_pelamar', $key->id_pelamar)
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

			$groupep_pelamar[$kota][] = [
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
				'domisili_provinsi' => $key->domisili_provinsi_nama,
				'domisili_kota' => $key->domisili_kota_nama,
				'domisili_kecamatan' => $key->domisili_kecamatan_nama,
				'domisili_kelurahan' => $key->domisili_kelurahan_nama,
				'pencarian' => [
					'jenjang' => $prioritas_jenjang,
					'gaji' => $range_gaji,
					'usia' => $usia
				]
			];
		}

		echo json_encode($groupep_pelamar);
	}

	public function tambahdata()
	{
		$this->form_validation->set_rules('nama_lowongan', 'Nama Lowongan', 'trim|required');
		$this->form_validation->set_rules('id_perusahaan', 'Perusahaan', 'trim|required');
		$this->form_validation->set_rules('jadwal_seleksi', 'Jadwal Seleksi', 'trim|required');
		$this->form_validation->set_rules('kota_penempatan', 'Kota Penempatan', 'trim|required');
		$this->form_validation->set_rules('persyaratan', 'Persyaratan', 'trim|required');
		$this->form_validation->set_rules('gaji', 'Gaji', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['msg_error'] = "Silahkan isi semua kolom";
			$kota_query = $this->db->order_by('nama', 'ASC')->get('t_kota')->result();
			$kota_list = [];
			foreach ($kota_query as $kota) {
				$kota_list[] = $kota->nama;
			}
			$data['semua_kota'] = $kota_list;

			$this->load->view('administrator/vtambah_lowongan', $data);
		} else {
			$send['id_lowongan'] = '';
			$send['nama_jabatan'] = $this->input->post('nama_lowongan');
			$send['id_perusahaan'] = $this->input->post('id_perusahaan');
			$send['id_jenis_motlet'] = $this->input->post('id_jenis_motlet');
			$send['jadwal_seleksi'] = $this->input->post('jadwal_seleksi');
			$send['persyaratan'] = $this->input->post('persyaratan');
			$send['gaji'] = $this->input->post('gaji');
			$send['status'] = 'tersedia';

			$kota_json = $this->input->post('kota_penempatan');
			$kota_array = json_decode($kota_json, true);
			$nama_kota = [];
			
			if (is_array($kota_array)) {
				foreach ($kota_array as $kota) {
					$nama_kota[] = $kota['value'];
				}
			}

			$send['kota_penempatan'] = implode(', ', $nama_kota);

			$this->Mdl_data_lowongan->tambahdata_lowongan($send);
			$this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan!');
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
		$this->form_validation->set_rules('nama_lowongan', 'Nama Lowongan', 'trim|required');
		$this->form_validation->set_rules('id_perusahaan', 'Perusahaan', 'trim|required');
		$this->form_validation->set_rules('jadwal_seleksi', 'Jadwal Seleksi', 'trim|required');
		$this->form_validation->set_rules('persyaratan', 'Persyaratan', 'trim|required');
		$this->form_validation->set_rules('gaji', 'Gaji', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$indexrow['data'] = $this->Mdl_data_lowongan->ambildata2_lowongan($id_update);
			$kota_query = $this->db->order_by('nama', 'ASC')->get('t_kota')->result();
			$kota_list = [];
			foreach ($kota_query as $kota) {
				$kota_list[] = $kota->nama;
			}
			$indexrow['semua_kota'] = $kota_list;
			$this->load->view('administrator/vedit_lowongan', $indexrow);
		} else {
			$send['id_lowongan'] = $this->input->post('id_lowongan');
			$send['id_perusahaan'] = $this->input->post('id_perusahaan');
			$send['id_jenis_motlet'] = $this->input->post('id_jenis_motlet');
			$send['nama_jabatan'] = $this->input->post('nama_lowongan');
			$send['jadwal_seleksi'] = $this->input->post('jadwal_seleksi');
			$send['persyaratan'] = $this->input->post('persyaratan');
			$send['gaji'] = $this->input->post('gaji');

			$kota_json = $this->input->post('kota_penempatan');
			$kota_array = json_decode($kota_json, true);
			$nama_kota = [];
			
			if (is_array($kota_array)) {
				foreach ($kota_array as $kota) {
					$nama_kota[] = $kota['value'];
				}
			}

			$send['kota_penempatan'] = implode(', ', $nama_kota);

			$this->Mdl_data_lowongan->modelupdate($send);
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
