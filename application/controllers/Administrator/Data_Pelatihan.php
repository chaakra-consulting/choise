<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Pelatihan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
		$this->load->model('Mdl_pendaftaran_talent_test');
		$this->load->model('Mdl_paket_talent_test');
		$this->load->model('Mdl_data_motlet');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->database();
		if ($this->session->userdata('masuk') == FALSE) {
			redirect('Login', 'refresh');
		}
	}
	
	// CRUD Motlet
	public function pendaftar()
	{
		$this->load->view('administrator/data_pendaftar_pelatihan');
	}
	
	public function master()
	{
		$this->load->view('administrator/data_pelatihan');
	}
	
	public function tambahmaster()
	{
		$this->form_validation->set_rules('nama_pelatihan', 'Nama_Pelatihan', 'trim|required');
		$this->form_validation->set_rules('tanggal_pelatihan', 'Tanggal_Pelatihan', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg_error', 'Harap Isi Semua Kolom.');
			$this->load->view('administrator/data_pelatihan');
		} else {
			$send['id_pelatihan'] = '';
			$send['nama_pelatihan'] = $this->input->post('nama_pelatihan');
			$send['tanggal_pelatihan'] = $this->input->post('tanggal_pelatihan');
			if($this->input->post('status')=='aktif'){
				$send['status'] = 'aktif';
			}else{
				$send['status'] = 'tidak aktif';
			}
			$send['jenis'] = $this->input->post('jenis');

			$this->db->insert('tb_pelatihan', $send);

			$this->session->set_flashdata('msg_success', 'Data Berhasil Ditambahkan!!!');
			redirect('Administrator/Data_Pelatihan/master');
		}
	}

	public function hapusmaster($id)
	{
		$where = array('id_pelatihan' => $id);
		$this->db->where($where);
		$this->db->delete('tb_pelatihan');
		$this->session->set_flashdata('msg_delete', 'Data Berhasil dihapus');
		redirect('Administrator/Data_Pelatihan/master');
	}

	public function hapuspendaftar($id)
	{
		$where = array('id_pendaftar_pelatihan' => $id);
		$this->db->where($where);
		$this->db->delete('tb_pendaftar_pelatihan');
		$this->session->set_flashdata('msg_delete', 'Data Berhasil dihapus');
		redirect('Administrator/Data_Pelatihan/pendaftar');
	}

	public function editmaster()
	{
		$this->form_validation->set_rules('nama_pelatihan', 'Nama_Pelatihan', 'trim|required');
		$this->form_validation->set_rules('tanggal_pelatihan', 'Tanggal_Pelatihan', 'trim|required');

		if ($this->form_validation->run() == FALSE ){
			$this->session->set_flashdata('msg_error', 'Harap Isi Semua Kolom.');
			$this->load->view('administrator/data_pelatihan');
		} else {
			$id_update=$this->input->post('id_pelatihan');
			$nama_pelatihan = $this->input->post('nama_pelatihan');
			$tanggal_pelatihan = $this->input->post('tanggal_pelatihan');
			if($this->input->post('status')=='aktif'){
				$status = 'aktif';
			}else{
				$status = 'tidak aktif';
			}
			$jenis = $this->input->post('jenis');

			$this->db->query("UPDATE tb_pelatihan
			SET nama_pelatihan='$nama_pelatihan',
			tanggal_pelatihan='$tanggal_pelatihan',
			status='$status',
			jenis='$jenis'
			WHERE id_pelatihan=$id_update");

			$this->session->set_flashdata('msg_update', 'Data Berhasil Diupdate!!!');
			redirect('Administrator/Data_Pelatihan/master');
		}
	}

	public function pendaftar_talent_test()
	{
		$this->db->select('p.*, pk.nama_paket, pk.harga');
		$this->db->from('tb_pendaftaran_pelatihan p');
		$this->db->join('tb_paket_talent_test pk', 'p.id_paket = pk.id_paket', 'left');
		$this->db->where('p.order_id IS NOT NULL');
		$this->db->order_by('p.waktu', 'DESC');
		$query = $this->db->get();

		$data['title'] = 'Data Pendaftar Talent Test (Paket)';
		$data['pendaftar_list'] = $query->result_array();

		$this->load->view('administrator/data_pelatihan/talent_test_list', $data);
	}

	public function download_nilai_talent_test($id_pendaftar_pelatihan)
	{
		$pendaftar_check = $this->db->get_where('tb_pendaftar_pelatihan', ['id_pendaftar_pelatihan' => $id_pendaftar_pelatihan])->num_rows();

		if ($pendaftar_check > 0 ) {
			$data['id_pendaftar_pelatihan'] = $id_pendaftar_pelatihan;
			$this->load->view('administrator/export_nilai_talent_test', $data);
		} else {
			$this->session->set_flashdata('msg_error', 'Data pendaftar pelatihan tidak ditemukan.');
			redirect('Administrator/Data_Pelatihan/pendaftar');

		}
	}
}
