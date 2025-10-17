<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Quiz extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
    }

    public function landing()
    {
        $this->load->view('public/landing');
    }

    public function holland_quiz()
    {
        $this->load->view('public/holland_quiz');
    }

    public function submit_form()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('no_hp', 'No. HP', 'required|regex_match[/^08[0-9]+$/]');
        $this->form_validation->set_rules('ig', 'Instagram', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('public/holland_quiz');
        } else {
            $nilai_r = 0;
            $nilai_i = 0;
            $nilai_a = 0;
            $nilai_s = 0;
            $nilai_e = 0;
            $nilai_k = 0;

            $mapping = [
                'q1' => 'r', 'q2' => 'r',
                'q3' => 'i', 'q4' => 'i',
                'q5' => 'a', 'q6' => 'a',
                'q7' => 's', 'q8' => 's',
                'q9' => 'e', 'q10' => 'e',
                'q11' => 'k', 'q12' => 'k',
            ];

            foreach ($mapping as $q => $type) {
                $value = (int)$this->input->post($q);
                switch ($type) {
                    case 'r': $nilai_r += $value; break;
                    case 'i': $nilai_i += $value; break;
                    case 'a': $nilai_a += $value; break;
                    case 's': $nilai_s += $value; break;
                    case 'e': $nilai_e += $value; break;
                    case 'k': $nilai_k += $value; break;
                }
            }

            $scores = [
                'R' => $nilai_r,
                'I' => $nilai_i,
                'A' => $nilai_a,
                'S' => $nilai_s,
                'E' => $nilai_e,
                'K' => $nilai_k,
            ];

            arsort($scores);
            $keys = array_keys($scores);
            $code = $keys[0] . $keys[1];

            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $no_hp = $this->input->post('no_hp');
            $ig = $this->input->post('ig');

            $data = [
                'nama' => $nama,
                'email' => $email,
                'no_hp' => $no_hp,
                'ig' => $ig,
                'nilai_r' => $scores['R'],
                'nilai_i' => $scores['I'],    
                'nilai_a' => $scores['A'],
                'nilai_s' => $scores['S'],
                'nilai_e' => $scores['E'],
                'nilai_k' => $scores['K'],
                'code' => $code
            ];

            $this->db->insert('tb_public_holland', $data);

            redirect('public/result');
        }
    }

    public function result()
    {
        $data['code'] = 'RI';
        $data['careers'] = ['Insinyur', 'Peneliti', 'Teknisi'];
        $this->load->view('public/result', $data);   
    }
}

?>
