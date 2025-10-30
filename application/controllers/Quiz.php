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
                'name' => 'Realistic (Realistis)',
                'description' => 'Bidang realistik ini memiliki minat untuk bekerja dengan obyek, benda maupun peralatan. 
                    Individu dibidang ini yang memiliki kemampuan mengoperasikan alat, peralatan dan mesin, merancang, membangun, 
                    maupun bekerja secara detail.',
                'tantangan' => 'Individu masih perlu meningkatkan kemampuan dalam menjalin relasi antar personal.'
            ],
            'I' => [
                'name' => 'Investigative (Investigatif)',
                'description' => 'Bidang investigatif ini memiliki minat untuk bekerja dengan sistematika dan intelektual. 
                    Individu dibidang ini memiliki kemampuan menganalisa, berpikir rasional, mampu merancang & merumuskan berbagai 
                    data.',
                'tantangan' => 'Individu masih perlu meningkatkan kemampuan dalam kerjasama tim.'
            ],
            'A' => [
                'name' => 'Artistic (Artistik)',
                'description' => 'Bidang artistik ini memiliki minat untuk bekerja dengan kreativitas berbentuk seni dan intuitif. 
                    Individu dibidang ini memiliki kemampuan dalam mengekspresikan diri melalui seni, merencanakan, menyajikan, dan 
                    merancang desain.',
                'tantangan' => 'Individu masih perlu meningkatkan kemampuan dalam bidang keteraturan dan sistematis.'
            ],
            'S' => [
                'name' => 'Social (Sosial)',
                'description' => 'Bidang sosial ini memiliki minat untuk bekerja dengan aktivitas sosial 
                    (menggerakkan dan memberikan dampak positif). Individu dibidang ini memiliki kemampuan dalam mengembangkan 
                    situasi sosial seperti memberi informasi, berkomunikasi secara lisan atau tertulis serta pribadi yang peduli.',
                'tantangan' => 'Individu masih perlu meningkatkan kemampuan dibidang mekanik dan sains.'
            ],
            'E' => [
                'name' => 'Enterprising',
                'description' => 'Bidang enterprising ini memiliki minat untuk bekerja dengan kegiatan promosi dan penjualan. 
                    Individu dibidang ini memiliki kemampuan persuasif, mengembangkan ide-ide, percaya diri dan memimpin. ',
                'tantangan' => 'Individu masih perlu meningkatkan kemampuan dibidang sains.'
            ],
            'K' => [
                'name' => 'Conventional (konvensional)',
                'description' => 'Bidang konvensional ini memiliki minat untuk bekerja secara sistematis dan menggunakan ketelitian. 
                    Individu dibidang ini memiliki kemampuan memperhatikan detail, bekerja dengan data (angka) dan 
                    merekam serta menyimpan catatan.',
                'tantangan' => 'Individu masih perlu meningkatkan kemampuan dalam pekerjaan yang membutuhkan interaksi sosial tinggi, 
                    kreativitas, dan fleksibilitas.'
            ]
        ];

        $data['code'] = $code;
        $data['type_data'] = $riasec_data[$code];
        $data['job_images'] = $job_images;
        $data['message'] = 
            'Hasil ini tidak bisa berdiri sendiri, namun alangkah lebih baik dikomperasikan dengan tes psikologi lainnya untuk 
                mendapatkan hasil yang optimal! <br>Dari hasil tes diatas, Apakah Anda sudah punya <b>GAMBARAN</b> tentang 
                <b>KECENDERUNGAN MINAT</b> dan <b>KARIER</b> yang <b>PALING COCOK</b> untuk Anda? atau Anda <b>MASIH BINGUNG</b> 
                membaca hasil test nya dan butuh penjelasan dari tenaga profesional?  <br>Chaakra Consulting <b>SIAP</b> bantu Anda 
                menginterpretasikan <b>HASIL TEST</b> jadi <b>ARAH KARIER YANG TEPAT.</b>
            <br>
            <hr style="border-color: #6c757d;">
            Hubungi kami melalui WhatsApp : 0857-4550-9992';

        $this->load->view('quiz/result', $data);
    }
}

?>