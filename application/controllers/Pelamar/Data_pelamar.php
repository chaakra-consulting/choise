<?php
defined('BASEPATH') or exit('No direct script access allowed');
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once APPPATH . "libraries/tcpdf/PDFMerger.php";

use PDFMerger\PDFMerger;

class Data_pelamar extends CI_Controller
{

	public function __construct() //MEMPERSIAPKAN
	{
		parent::__construct();
		$this->load->helper('url', 'form');
		$this->load->model('Mdl_data_pelamar');
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('download');
		if ($this->session->userdata('masuk') == FALSE) {
			redirect('Login', 'refresh');
		}
		$this->load->library('upload');
		$this->load->library('session');
		$this->load->library('user_agent');
		$this->data 	= array();
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

	// CRUD Motlet

	public function phpinfo()
	{
		echo phpinfo();
	}
	public function detail_pelamar($id_detail)
	{
		$paket['array'] = $this->Mdl_data_pelamar->ambildata_pelamar($id_detail);
		$this->load->view('pelamar/detail_pelamar', $paket);
	}

	public function detail_pendidikan($id_detail)
	{
		$paket['array'] = $this->Mdl_data_pelamar->ambildata_pendidikan($id_detail);
		$this->load->view('pelamar/detail_pendidikan', $paket);
	}

	public function detail_pendidikan_non($id_detail)
	{
		$paket['array'] = $this->Mdl_data_pelamar->ambildata_pendidikan_non($id_detail);
		$this->load->view('pelamar/detail_pendidikan_non_formal', $paket);
	}

	public function detail_berkas($id_detail)
	{
		$dbnama = $this->db->query("select * from tb_data_diri where id_pelamar=$id_detail")->result();
		// // echo $dbnama[0]->nama_pelamar;
		$pdf_files = [];
		$dbberkas = $this->db->query("select * from tb_berkas where id_pelamar=$id_detail AND (kategori='ktp' OR kategori='ijasah' OR kategori='foto' OR kategori='transkip' OR kategori='sertifikat' OR kategori='referensi' OR kategori='berkaschaakra')")->result();
		for ($i = 0; $i < count($dbberkas); $i++) {
			// echo $dbberkas[$i]->berkas;
			// echo "<br>";
			array_push($pdf_files, $dbberkas[$i]->berkas);
		}
		// $pdf_files = array('1.pdf', '2.pdf', '3.pdf', '4.pdf', '5.pdf', '6.pdf', '7.pdf');
		// var_dump($pdf_files);
		// MERGER FILES
		$pdf = new PDFMerger;
		//var_dump($pdf_files);
		if ($pdf_files) {
			foreach ($pdf_files as $file) {
				$pdf->addPDF('./upload/berkas_pelamar/' . $file, 'all');
			}

			$new_file = 'merge-' . $dbnama[0]->nama_pelamar . '.pdf';
			$pdf->merge('file', APPPATH . '../upload/berkas_pelamar/' . $new_file);
		} else {
			$new_file = '';
		}


		$paket['array'] = $this->Mdl_data_pelamar->ambildata_berkas($id_detail);
		$paket['array2'] = $dbberkas;
		$paket['nama_pelamar'] = $dbnama[0]->nama_pelamar;
		$paket['id_pelamar'] = $id_detail;
		$this->load->view('pelamar/detail_berkas', $paket);
	}

	public function detail_keluarga($id_detail)
	{
		$paket['array'] = $this->Mdl_data_pelamar->ambildata_keluarga($id_detail);
		$this->load->view('pelamar/detail_keluarga', $paket);
	}

	public function detail_pengalaman($id_detail)
	{
		$paket['array'] = $this->Mdl_data_pelamar->ambildata_pengalaman($id_detail);
		$this->load->view('pelamar/detail_pengalaman', $paket);
	}

	public function detail_motlet($id_detail)
	{
		$paket['array'] = $this->Mdl_data_pelamar->ambildata_motlet($id_detail);
		$this->load->view('pelamar/detail_motivasi', $paket);
	}

	function get_assessment($id_detail)
	{
		$data_pelamar = $this->Mdl_data_pelamar->ambildata_pelamar($id_detail);
		$id_lowongan = $this->input->get('id_lowongan');
		$lowongan = $this->db->query("SELECT nama_jabatan FROM tb_lowongan where id_lowongan=$id_lowongan")->row()->nama_jabatan;
		$email = $this->db->query("SELECT email FROM tb_pelamar where id_pelamar=$id_detail")->row()->email;
		$data_pendidikan = $this->Mdl_data_pelamar->ambildata_pendidikan($id_detail);
		$data_pendidikan_non = $this->Mdl_data_pelamar->ambildata_pendidikan_non($id_detail);
		$data_pengalaman = $this->Mdl_data_pelamar->ambildata_pengalaman($id_detail);


		$counter = 1;
		foreach ($data_pendidikan as &$row) {
			$row['no'] = $counter;
			$counter++;
		}
		unset($row);

		$counterNon = 1;
		foreach ($data_pendidikan_non as &$row) {
			$row['no_nonformal'] = $counterNon;
			$counterNon++;
		}
		unset($row);

		$counterPengalaman = 1;
		foreach ($data_pengalaman as &$row) {
			$row['no_pengalaman'] = $counterPengalaman;
			$counterPengalaman++;
		}
		unset($row);

		$social_media = array(
			'facebook' => $data_pelamar[0]['facebook'],
			'twitter' => $data_pelamar[0]['twitter'],
			'linkedin' => $data_pelamar[0]['linkedin'],
			'instagram' => $data_pelamar[0]['instagram']
		);
		$template_path = FCPATH . 'assets/template/Assessment Psikologi.docx';

		if (!file_exists($template_path)) {
			show_error('Template document not found at: ' . $template_path);
			return;
		}
		\PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(true);
		$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($template_path);

		$templateProcessor->setValue('nama', $data_pelamar[0]['nama_pelamar']);
		$templateProcessor->setValue('agama', $data_pelamar[0]['agama']);
		$templateProcessor->setValue('tempat_lahir', $data_pelamar[0]['tempat_lahir']);
		$templateProcessor->setValue('tanggal_lahir', $data_pelamar[0]['tanggal_lahir']);
		$templateProcessor->setValue('anak_ke', $data_pelamar[0]['anak_ke']);
		$templateProcessor->setValue('dari_x_sdr', $data_pelamar[0]['dari_x_sdr']);
		$templateProcessor->setValue('alamat', $data_pelamar[0]['alamat']);
		$templateProcessor->setValue('no_hp', $data_pelamar[0]['no_hp']);
		$templateProcessor->setValue('status_perkawinan', $data_pelamar[0]['status_perkawinan']);
		$templateProcessor->setValue('email', $email);
		$templateProcessor->setValue('lowongan', $lowongan);
		$templateProcessor->setValue('jenis_kelamin', $data_pelamar[0]['jenis_kelamin']);
		$templateProcessor->setValue('social_media', $this->get_only_active_social_media($social_media));

		$templateProcessor->cloneRowAndSetValues('no', $data_pendidikan);
		$templateProcessor->cloneRowAndSetValues('no_nonformal', $data_pendidikan_non);
		$templateProcessor->cloneRowAndSetValues('no_pengalaman', $data_pengalaman);
		$templateProcessor->setValue('pendidikan_terakhir', $data_pendidikan[count($data_pendidikan) - 1]['nama_institusi'] . ' - ' . $data_pendidikan[count($data_pendidikan) - 1]['jenjang_pendidikan'] . " " . $data_pendidikan[count($data_pendidikan) - 1]['jurusan']);

		$file_name = 'Hasil_Assessment_' . time() . '.docx';
		$temp_dir = FCPATH . 'upload/assessment_temp/';
		$temp_file = $temp_dir . $file_name;
		$templateProcessor->saveAs($temp_file);

		// 6. Read the temp file, trigger the download, and clean up
		$file_content = file_get_contents($temp_file);

		// Delete the temporary file from the server
		@unlink($temp_file);

		if (ob_get_length()) {
			ob_end_clean();
		}

		// Force the browser to download the file
		force_download($file_name, $file_content);
	}


	function get_only_active_social_media($data)
	{
		$platforms_to_check = ['facebook', 'twitter', 'linkedin', 'instagram'];

		if (is_array($data)) {
			foreach ($platforms_to_check as $platform) {
				if (isset($data[$platform])) {
					$value = trim($data[$platform]);

					// If it's valid, return it immediately as an array with one item
					if (!empty($value) && $value !== '-') {
						return $value;
					}
				}
			}
		}

		// Return an empty array if no valid social media is found at all
		return '-';
	}


	// public function tambahdata(){
	// 	$this->form_validation->set_rules('id_perusahaan','Nama','trim|required');
	// 	$this->form_validation->set_rules('soal_motlet','Nama','trim|required');
	// 	$value['jenis_motlet']=$this->input->post('jenis_motlet');

	// 	if ($this->form_validation->run()==FALSE || $value['jenis_motlet']=='zero' ) {
	// 		$data['msg_error']="Silahkan isi semua kolom";
	// 		$this->load->view('administrator/vtambah_motlet',$data);
	// 	}
	// 	else{
	// 		$send['id_soal']='';
	// 		$send['id_perusahaan']=$this->input->post('id_perusahaan');
	// 		$send['jenis_motlet']=$this->input->post('jenis_motlet');
	// 		$send['soal_motlet']=$this->input->post('soal_motlet');

	// 		$kembalian['jumlah']=$this->mdl_data_motlet->tambahdata_motlet($send);

	// 		$this->load->view('administrator/data_motlet',$kembalian);
	// 		$this->session->set_flashdata('msg','Data Berhasil Ditambahkan!!!');
	// 		redirect('Administrator/Data_motlet/');
	// 	}
	// }

	// public function hapus_motlet($id){
	// 	$where = array('id_soal' => $id);
	// 	$this->mdl_data_motlet->do_delete($where,'tb_soal_motlet');
	// 	$this->session->set_flashdata('msg_hapus','Data Berhasil dihapus');
	// 	redirect('Administrator/Data_motlet/');
	// }

	// public function edit_lowongan($id_update){
	// 	$this->form_validation->set_rules('id_perusahaan','Nama','trim|required');
	// 	$this->form_validation->set_rules('soal_motlet','Nama','trim|required');
	// 	$value['jenis_motlet']=$this->input->post('jenis_motlet');

	// 	if($this->form_validation->run()==FALSE ){
	// 		$indexrow['data']=$this->mdl_data_motlet->ambildata2_motlet($id_update);
	// 		$this->load->view('administrator/vedit_motlet', $indexrow);
	// 	}
	// 	else{
	// 		$send['id_soal']=$this->input->post('id_soal');
	// 		$send['id_perusahaan']=$this->input->post('id_perusahaan');
	// 		$send['jenis_motlet']=$this->input->post('jenis_motlet');
	// 		$send['soal_motlet']=$this->input->post('soal_motlet');
	// 		// var_dump($send);
	// 		$kembalian['jumlah']=$this->mdl_data_motlet->modelupdate($send);
	// 		$this->session->set_flashdata('msg_update', 'Data Berhasil diupdate');
	// 		redirect('Administrator/Data_motlet');
	// 	}
	// }

	// END CRUD Motlet
	// ============================================================================================


}
