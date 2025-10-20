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
            $code = $keys[0];

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
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_public_holland');
        $data_user = $query->row();

        if (!$data_user) {
            redirect('public/holland-quiz');
        }

        $code = $data_user->code;

        $riasec_data = [
            'R' => [
                'name' => 'Realistic',
                'description' => 'Minat untuk bekerja dengan obyek, benda maupun peralatan. Tipe ini memiliki kemampuan mengoperasikan alat, peralatan dan mesin, merancang, membangun, maupun bekerja secara detail. Namun belum memiliki kemampuan dalam menjalin relasi antar personal.',
                'jobs' => ['Insinyur', 'Olahragawan', 'Militer', 'Arsitektur dan civil engineering']
            ],
            'I' => [
                'name' => 'Investigative',
                'description' => 'Minat untuk bekerja dengan sistematika dan intelektual. Tipe ini memiliki kemampuan menganalisa, berpikir rasional, merancang, merumuskan, dan bereksperimen. Namun belum memiliki kemampuan dalam memimpin.',
                'jobs' => ['Programmer', 'Ilmuwan Biologi, Kimia atau Fisika', 'Data Scientist', 'Analis Keuangan']
            ],
            'A' => [
                'name' => 'Artistic',
                'description' => 'Minat untuk bekerja dengan kreativitas berbentuk seni dan intuitif. Tipe ini memiliki kemampuan dalam mengekspresikan diri melalui seni, merencanakan, menyajikan, dan merancang desain. Namun belum memiliki kemampuan dalam bidang keteraturan dan sistematis.',
                'jobs' => ['Seniman (pelukis atau pembuat patung)', 'Fotografer', 'Desain interior', 'Musisi atau composer']
            ],
            'S' => [
                'name' => 'Social',
                'description' => 'Minat untuk bekerja dengan aktivitas sosial (menggerakkan dan memberikan dampak positif). Tipe ini memiliki kemampuan dalam mengembangkan situasi sosial seperti memberi informasi, berkomunikasi secara lisan atau tertulis serta pribadi yang peduli. Namun belum memiliki kemampuan dibidang mekanik dan sains.',
                'jobs' => ['Psikolog', 'Perawat/Bidan/Dokter', 'Sejarawan', 'Guru']
            ],
            'E' => [
                'name' => 'Enterprising',
                'description' => 'Minat untuk bekerja dengan kegiatan promosi dan penjualan. Tipe ini memiliki kemampuan persuasif, mengembangkan ide-ide, percaya diri dan memimpin. Namun belum memiliki kemampuan dibidang sains.',
                'jobs' => ['Pengacara', 'Publik Relations Officer', 'Konsultan Bisnis', 'Digital Marketing']
            ],
            'K' => [ // Gunakan 'K' untuk match code
                'name' => 'Conventional (konvensional)',
                'description' => 'Minat untuk bekerja secara sistematis dan menggunakan ketelitian. Tipe ini memiliki kemampuan memperhatikan detail, bekerja dengan data (angka) dan merekam serta menyimpan catatan.',
                'jobs' => ['Sekretaris', 'Perbankan (Banker)', 'Analis data atau akuntan', 'Administrator']
            ]
        ];

        $data['code'] = $code;
        $data['type_data'] = $riasec_data[$code];
        $data['message'] = 'Yuk, temukan passion dan karier impianmu dengan mengikuti Preferensi Bidang Minat Kerja! Kenali dirimu lewat enam tipe: RIASEC dan tentukan pilihan karier yang cocok untukmu!';

        $this->load->view('public/result', $data);
    }
}

?>