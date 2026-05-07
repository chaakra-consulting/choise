<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Mental_health extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('dass21');
    }

    public function index()
    {
        $this->load->view('mental_health/index');
    }

    public function test()
    {
        $data = $this->db->get('mental_health_q')->result_array();
        $data['questions'] = $data;
        $this->load->view('mental_health/test', $data);
    }

    public function result()
    {
        $raw_data = $this->input->post();
        $formatted_data = [];
        if (empty($raw_data['nama'])) {
            return redirect(base_url('mental_health/test'));
        }

        foreach ($raw_data as $key => $value) {
            if (strpos($key, 'scale_') !== false) {
                $formatted_data[] = [
                    'question_no' => (int) str_replace('scale_', '', $key),
                    'answer_value' => (int) $value
                ];
            }
        }
        $results = test_result($formatted_data);
        $data_to_save = [
            'nama'         => $raw_data['nama'],
            'interpretasi' => json_encode($results) // Converts the array to a JSON string
        ];

        $insert = $this->db->insert('mental_health_a', $data_to_save);

        $data['results'] = $results;
        $this->load->view('mental_health/result', $data);
    }
}
