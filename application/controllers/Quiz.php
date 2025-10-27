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
        $this->load->view('quiz/landing');
    }

    public function holland_quiz()
    {
        $this->load->model('Mdl_holland_questions');
        $questions = $this->Mdl_holland_questions->get_all_questions();

        $grouped_questions = [];
        foreach ($questions as $q) {
            $grouped_questions[$q->type][] = $q;
        }

        $data['grouped_questions'] = $grouped_questions;
        $this->load->view('quiz/holland_quiz', $data);
    }

    public function submit_form()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('no_hp', 'No. HP', 'required|regex_match[/^08[0-9]+$/]');
        $this->form_validation->set_rules('ig', 'Instagram', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->holland_quiz();
        } else {
            $this->load->model('Mdl_holland_questions');
            $questions = $this->Mdl_holland_questions->get_all_questions();

            $nilai_r = 0;
            $nilai_i = 0;
            $nilai_a = 0;
            $nilai_s = 0;
            $nilai_e = 0;
            $nilai_k = 0;

            $mapping = [];
            $question_index = 0;
            foreach ($questions as $q) {
                $question_index++;
                $mapping['q' . $question_index] = $q->type;
            }

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

            redirect('quiz/result');
        }
    }

    public function result()
    {
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_public_holland');
        $data_user = $query->row();

        if (!$data_user) {
            redirect('quiz/holland-quiz');
        }

        $code = $data_user->code;

        $this->config->load('job_images');
        $job_images = $this->config->item('job_images')[$code];

        $riasec_data = [
            'R' => [
                'name' => 'Realistic',
                'description' => 'Minat untuk bekerja dengan obyek, benda maupun peralatan. Tipe ini memiliki kemampuan mengoperasikan alat, peralatan dan mesin, merancang, membangun, maupun bekerja secara detail. Namun belum memiliki kemampuan dalam menjalin relasi antar personal.'
            ],
            'I' => [
                'name' => 'Investigative',
                'description' => 'Minat untuk bekerja dengan sistematika dan intelektual. Tipe ini memiliki kemampuan menganalisa, berpikir rasional, merancang, merumuskan, dan bereksperimen. Namun belum memiliki kemampuan dalam memimpin.'
            ],
            'A' => [
                'name' => 'Artistic',
                'description' => 'Minat untuk bekerja dengan kreativitas berbentuk seni dan intuitif. Tipe ini memiliki kemampuan dalam mengekspresikan diri melalui seni, merencanakan, menyajikan, dan merancang desain. Namun belum memiliki kemampuan dalam bidang keteraturan dan sistematis.'
            ],
            'S' => [
                'name' => 'Social',
                'description' => 'Minat untuk bekerja dengan aktivitas sosial (menggerakkan dan memberikan dampak positif). Tipe ini memiliki kemampuan dalam mengembangkan situasi sosial seperti memberi informasi, berkomunikasi secara lisan atau tertulis serta pribadi yang peduli. Namun belum memiliki kemampuan dibidang mekanik dan sains.'
            ],
            'E' => [
                'name' => 'Enterprising',
                'description' => 'Minat untuk bekerja dengan kegiatan promosi dan penjualan. Tipe ini memiliki kemampuan persuasif, mengembangkan ide-ide, percaya diri dan memimpin. Namun belum memiliki kemampuan dibidang sains.'
            ],
            'K' => [
                'name' => 'Conventional (konvensional)',
                'description' => 'Minat untuk bekerja secara sistematis dan menggunakan ketelitian. Tipe ini memiliki kemampuan memperhatikan detail, bekerja dengan data (angka) dan merekam serta menyimpan catatan.'
            ]
        ];

        $data['code'] = $code;
        $data['type_data'] = $riasec_data[$code];
        $data['job_images'] = $job_images;
        $data['message'] = 
            'Test ini merupakan <b>LANGKAH AWAL</b> untuk mengenal diri Anda lebih baik lagi. Apakah Anda sudah punya <b>GAMBARAN</b> tentang <b>KECENDERUNGAN  MINAT</b> dan dan <b>KARIER</b> yang <b>PALING COCOK</b> untuk Anda? atau Anda <b>MASIH BINGUNG</b> membaca hasil test nya dan butuh penjelasan dari tenaga profesional? Chaakra Consulting <b>SIAP</b> bantu Anda menginterpretasikan <b>HASIL TEST</b> jadi <b>ARAH KARIER YANG TEPAT..</b>
            <br>
            <hr style="border-color: #6c757d;">
            Hubungi kami melalui WhatsApp : 0857-4550-9992';

        $this->load->view('quiz/result', $data);
    }
}

?>