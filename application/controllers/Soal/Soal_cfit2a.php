<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soal_cfit2a extends CI_Controller
{

	public function __construct() //MEMPERSIAPKAN
	{
		parent::__construct();
		$this->load->helper('url', 'form');
		$this->load->model('Mdl_soal');
		// $this->load->model('mdl_data_nilai');
		// $this->load->model('mdl_data_pelamar');
		$this->load->library('form_validation');
		$this->load->database();
		if ($this->session->userdata('masuk') == FALSE) {
			redirect('Login', 'refresh');
		}
	}
    
    public function index() {
        $this->load->view('soal/cfit2a/index');
    }

    public function data() {
        $data = $this->db->get('tb_soal_cfit_2a')->result_array();
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function edit($id) {
        
    }
}
