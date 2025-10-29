<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TalentTest extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->helper('url', 'form', 'download');
        $this->load->model('Mdl_home');
        $this->load->model('Mdl_berkas');
        $this->load->model('Mdl_paket_talent_test', 'm_paket');
        $this->load->model('Mdl_pendaftaran_talent_test', 'm_pendaftaran');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();

        $token = $this->session->userdata('talent_test_access_token');
        if (!$token) {
            redirect('talent-test/login');
        }

        $this->db->where('access_token', $token);
        $pendaftaran = $this->db->get('tb_pendaftar_pelatihan')->row_array();
        if (!$pendaftaran) {
            redirect('talent-test/login');
        }

        $this->session->unset_userdata('ses_id');
        $this->session->unset_userdata('ses_user');
        $this->session->unset_userdata('ses_idLevel');
        $this->session->unset_userdata('masuk');
    }

    public function dashboard()
    {
        $token = $this->session->userdata('talent_test_access_token');
        if (!$token) {
            redirect('talent-test/login');
        }

        $this->db->where('access_token', $token);
        $pendaftaran = $this->db->get('tb_pendaftar_pelatihan')->row_array();
        $this->session->set_userdata('talent_test_user_id', $pendaftaran['id_pendaftar_pelatihan']);

        if (!$pendaftaran || $pendaftaran['status_pembayaran'] != 'success') {
            $this->session->set_flashdata('error', 'Pembayaran belum berhasil atau tidak ditemukan.');
            redirect('talent-test/login');
            return;
        }

        $paket = $this->m_paket->get_paket_by_id($pendaftaran['id_paket']);
        $ujian_list = $this->m_paket->get_ujian_by_paket($pendaftaran['id_paket']);
        unset($ujian);

        $progress_data = $this->get_user_exam_progress($pendaftaran['id_pendaftar_pelatihan'], $pendaftaran['id_paket']);
        $jadwal_test = $pendaftaran['jadwal_test'];
        $countdown_status = null;

        if (!empty($jadwal_test) && $jadwal_test != '0000-00-00 00:00:00') {
            $exam_timestamp = strtotime($jadwal_test);
            $current_time = time();
            $time_diff = $exam_timestamp - $current_time;

            if ($time_diff <= 0) {
                $countdown_status = [
                    'can_start' => true,
                    'message' => 'Ujian dapat dimulai sekarang'
                ];
            } else {
                $countdown_status = [
                    'can_start' => false,
                    'exam_timestamp' => $exam_timestamp,
                    'server_time' => $current_time,
                    'message' => 'Ujian akan dimulai dalam'
                ];
            }
        }

        $data = [
            'title'             => 'Dashboard Talent Test',
            'pendaftaran'       => $pendaftaran,
            'paket'             => $paket,
            'ujian_list'        => $ujian_list,
            'progress_data'     => $progress_data,
            'jadwal_test'       => $jadwal_test,
            'countdown_status'  => $countdown_status,
            'is_talent_test'    => true,
            'is_pelamar'        => false,
        ];

        $this->load->view('talent_test/dashboard', $data);
    }
    
    public function berkas() 
    {
        $this->load->model('Mdl_berkas');
        $token = $this->session->userdata('talent_test_access_token');
        $this->db->where('access_token', $token);
        $pendaftaran = $this->db->get('tb_pendaftar_pelatihan')->row_array();
        $user_id = $pendaftaran['id_pendaftar_pelatihan'];

        $admin_files_raw = $this->Mdl_berkas->get_berkas_by_kategori('talent_test_template');
        $user_files = $this->Mdl_berkas->get_berkas_by_pelamar($user_id, 'talent_test_user');

        $admin_files = [];
        $required_files = [];
        foreach ($admin_files_raw as $file) {
            $key = $file['berkas'];
            $base = pathinfo($key, PATHINFO_FILENAME);
            $admin_files[$base] = $file;
            $required_files[$key] = [
                'name' => ucwords(str_replace(['_', '-'], ' ', $base)),
                'icon' => 'fa-file-pdf-o'
            ];
        }
        
        $all_files = [];
        foreach ($required_files as $key => $config) {
            $user_file = null;
            $admin_file = null;
            foreach ($user_files as $f) {
                $filename = str_replace(' ', '_', pathinfo($f['berkas'], PATHINFO_FILENAME));
                $type = str_replace(' ', '_', pathinfo($key, PATHINFO_FILENAME));
                if (strpos($filename, $type) !== false) {
                    $user_file = $f;
                    break;
                }
            }

            foreach ($admin_files_raw as $f) {
                $filename = str_replace(' ', '_', pathinfo($f['berkas'], PATHINFO_FILENAME));
                $type = str_replace(' ', '_', pathinfo($key, PATHINFO_FILENAME));
                if (strpos($filename, $type) !== false) {
                    $admin_file = $f;
                    break;
                }
            }

            if ($user_file) {
                $all_files[$key] = $user_file;
                $all_files[$key]['source'] = 'user';
            } elseif ($admin_file) {
                $all_files[$key] = $admin_file;
                $all_files[$key]['source'] = 'admin';
            } else {
                $all_files[$key] = null;
            }
        }

        $data = [
            'required_files' => $required_files,
            'all_files' => $all_files,
            'admin_files' => $admin_files,
            'pendaftaran' => $pendaftaran,
            'success_message' => $this->session->flashdata('success'),
            'error_message' => $this->session->flashdata('error'),
            'is_talent_test' => true,
            'is_pelamar' => true,
            'id_pelamar' => $pendaftaran['id_pendaftar_pelatihan']
        ];

        $this->load->view('talent_test/berkas', $data);
    }

    public function upload_berkas()
    {
        $token = $this->session->userdata('talent_test_access_token');
        if (!$token) {
            log_message('error', 'Upload berkas: No token found');
            redirect('talent-test/login');
        }

        log_message('info', 'Upload berkas started for token: ' . $token);

        $this->db->where('access_token', $token);
        $pendaftaran = $this->db->get('tb_pendaftar_pelatihan')->row_array();

        if (!$pendaftaran) {
            log_message('error', 'Upload berkas: Pendaftaran not found for token: ' . $token);
            $this->session->set_flashdata('msg_error', 'Data pendaftaran tidak ditemukan.');
            redirect('talent-test/berkas');
            return;
        }

        log_message('info', 'Upload berkas: Pendaftaran found: ID ' . $pendaftaran['id_pendaftar_pelatihan'] . ', Name: ' . $pendaftaran['nama_pendaftar_pelatihan']);

        if (!isset($pendaftaran['nama_pendaftar_pelatihan']) || empty($pendaftaran['nama_pendaftar_pelatihan'])) {
            log_message('error', 'Upload berkas: Nama pendaftar kosong untuk ID ' . $pendaftaran['id_pendaftar_pelatihan']);
            $this->session->set_flashdata('msg_error', 'Nama pendaftar tidak ditemukan.');
            redirect('talent-test/berkas');
            return;
        }

        $this->db->where('kategori', 'talent_test_template');
        $admin_files = $this->db->get('tb_berkas')->result_array();

        log_message('info', 'Upload berkas: Admin files count: ' . count($admin_files));

        $required_files = [];
        foreach ($admin_files as $file) {
            $base = pathinfo($file['berkas'], PATHINFO_FILENAME);
            $required_files[$base] = ucwords(str_replace('_', ' ', $base));
        }

        log_message('info', 'Upload berkas: Required files: ' . json_encode($required_files));

        $config['upload_path'] = './upload/berkas/';
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $uploaded_files = [];
        $errors = [];

        foreach ($required_files as $key => $name) {
            $field_name = str_replace(' ', '_', $key);
            log_message('info', 'Upload berkas: Checking upload for key: ' . $key . ' (field: ' . $field_name . ')');
            if (isset($_FILES[$field_name]) && $_FILES[$field_name]['error'] == 0) {
                log_message('info', 'Upload berkas: File uploaded for ' . $key . ', size: ' . $_FILES[$field_name]['size']);
                if ($this->upload->do_upload($field_name)) {
                    $upload_data = $this->upload->data();
                    $uploaded_files[$key] = [
                        'file_name' => $upload_data['file_name'],
                        'file_ext' => $upload_data['file_ext']
                    ];
                    log_message('info', 'Upload berkas: Upload success for ' . $key . ', file: ' . $upload_data['file_name']);
                } else {
                    $error = $this->upload->display_errors('', '');
                    $errors[] = $name . ': ' . $error;
                    log_message('error', 'Upload berkas: Upload failed for ' . $key . ', error: ' . $error);
                }
            } else {
                $error_code = isset($_FILES[$field_name]) ? $_FILES[$field_name]['error'] : 'No file';
                log_message('info', 'Upload berkas: No valid file for ' . $key . ', error code: ' . $error_code);
            }
        }

        foreach ($uploaded_files as $jenis => $file_info) {
            $old_path = './upload/berkas/' . $file_info['file_name'];
            $user_name = preg_replace('/[^A-Za-z0-9\-_]/', '_', $pendaftaran['nama_pendaftar_pelatihan']);
            $safe_jenis = str_replace(' ', '_', $jenis);
            $new_filename = $user_name . '_' . $safe_jenis . $file_info['file_ext'];
            $new_path = './upload/berkas/' . $new_filename;
            
            log_message('info', 'Upload berkas: Renaming ' . $old_path . ' to ' . $new_path);
            if (file_exists($old_path) && rename($old_path, $new_path)) {
                log_message('info', 'Upload berkas: Rename success for ' . $jenis);
                $this->db->where('id_pelamar', $pendaftaran['id_pendaftar_pelatihan']);
                $this->db->where('berkas', $new_filename);
                $this->db->where('kategori', 'talent_test_user');
                $existing_user_file = $this->db->get('tb_berkas')->row();

                $data_berkas = [
                    'id_pelamar' => $pendaftaran['id_pendaftar_pelatihan'],
                    'berkas' => $new_filename,
                    'kategori' => 'talent_test_user'
                ];

                if ($existing_user_file) {
                    $this->db->where('id_berkas', $existing_user_file->id_berkas);
                    $this->db->update('tb_berkas', $data_berkas);
                    log_message('info', 'Upload berkas: Updated existing record for ' . $jenis);
                } else {
                    $this->db->insert('tb_berkas', $data_berkas);
                    log_message('info', 'Upload berkas: Inserted new record for ' . $jenis);
                }
            } else {
                $errors[] = 'Gagal memproses file ' . $jenis;
                log_message('error', 'Upload berkas: Rename failed for ' . $jenis . ', old_path exists: ' . (file_exists($old_path) ? 'yes' : 'no'));
            }
        }

        if (empty($errors)) {
            log_message('info', 'Upload berkas: Success for user ' . $pendaftaran['id_pendaftar_pelatihan']);
            $this->session->set_flashdata('msg', 'Berkas berhasil diupload.');
        } else {
            log_message('error', 'Upload berkas: Errors for user ' . $pendaftaran['id_pendaftar_pelatihan'] . ': ' . implode(', ', $errors));
            $this->session->set_flashdata('msg_error', 'Beberapa berkas gagal diupload: ' . implode(', ', $errors));
        }

        redirect('talent-test/berkas');
    }

    public function download_berkas($id_berkas)
    {
        $token = $this->session->userdata('talent_test_access_token');
        if (!$token) {
            redirect('talent-test/login');
        }

        $this->db->where('access_token', $token);
        $pendaftaran = $this->db->get('tb_pendaftar_pelatihan')->row_array();
        $user_id = $pendaftaran['id_pendaftar_pelatihan'];

        if (!$pendaftaran) {
            show_404();
        }
        $this->db->where('id_berkas', $id_berkas)
                ->where_in('kategori', ['talent_test_user', 'talent_test_template']);
        $berkas = $this->db->get('tb_berkas')->row_array();

        if (!$berkas) {
            show_404();
        }

        if ($berkas['id_pelamar'] != 0 && $berkas['id_pelamar'] != $user_id) {
            show_404();
        }

        $file_path = FCPATH . 'upload/berkas/' . $berkas['berkas'];

        if (file_exists($file_path)) {
            $extension = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
            if ($extension == 'pdf') {
                header('Content-Type: application/pdf');
            } elseif ($extension == 'doc') {
                header('Content-Type: application/msword');
            } elseif ($extension == 'docx') {
                header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
            } else {
                show_404();
            }
            header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
            readfile($file_path);
            exit;
        } else {
            show_404();
        }
    }

    public function preview_berkas($id_berkas)
    {
        $token = $this->session->userdata('talent_test_access_token');
        if (!$token) {
            redirect('talent-test/login');
        }

        $this->db->where('access_token', $token);
        $pendaftaran = $this->db->get('tb_pendaftar_pelatihan')->row_array();
        $user_id = $pendaftaran['id_pendaftar_pelatihan'];

        if (!$pendaftaran) {
            show_404();
        }
        
        $this->db->where('id_berkas', $id_berkas)
                ->where_in('kategori', ['talent_test_user', 'talent_test_template']);
        $berkas = $this->db->get('tb_berkas')->row_array();

        if (!$berkas || !isset($berkas['berkas'])) {
            show_404();
        }

        if ($berkas['id_pelamar'] != 0 && $berkas['id_pelamar'] != $user_id) {
            show_404();
        }

        $file_path = FCPATH . 'upload/berkas/' . $berkas['berkas'];

        if (file_exists($file_path)) {
            $extension = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
            if ($extension == 'pdf') {
                header('Content-Type: application/pdf');
            } elseif ($extension == 'doc') {
                header('Content-Type: application/msword');
            } elseif ($extension == 'docx') {
                header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
            } else {
                show_404();
            }
            header('Content-Disposition: inline; filename="' . basename($file_path) . '"');
            readfile($file_path);
            exit;
        } else {
            show_404();
        }
    }

    public function check_admin_files()
    {
        $this->load->model('Mdl_berkas');
        $admin_files = $this->Mdl_berkas->get_berkas_by_kategori('talent_test_template');
        $result = [];
        foreach ($admin_files as $file) {
            $key = pathinfo($file['berkas'], PATHINFO_FILENAME);
            $result[$key] = $file;
        }
        echo json_encode($result);
    }

    public function check_exam_time()
    {
        $jadwal_test = $this->input->post('jadwal_test');
        $exam_time = strtotime($jadwal_test);
        $current_time = time();

        $can_start = ($current_time >= $exam_time);

        echo json_encode(['can_start' => $can_start]);
    }

    public function start_exam($exam_type)
    {
        $user_id = $this->session->userdata('talent_test_user_id');
        if (empty($user_id) || empty($exam_type)) {
            $this->session->set_flashdata('error', 'Parameter tidak valid.');
            redirect('talent-test/dashboard');
        }

        $from_training = $this->input->get('from_training');
        if (!$from_training) {
            $this->db->where('id_pendaftar_pelatihan', $user_id);
            $this->db->where('jenis_ujian', $exam_type);
            $finished = $this->db->get('tb_hasil_talent_test')->row();
            if ($finished) {
                $this->session->set_flashdata('error', 'Test ' . ucfirst($exam_type) . ' sudah selesai.');
                redirect('talent-test/exam-list');
                return;
            }
        }
        $this->db->where('id_pendaftar_pelatihan', $user_id);
        $this->db->where('jenis_ujian', $exam_type);
        $finished = $this->db->get('tb_hasil_talent_test')->row();
        if ($finished) {
            $this->session->set_flashdata('error', 'Test ' . ucfirst($exam_type) . ' sudah selesai.');
            redirect('talent-test/exam-list');
            return;
        }

        $pendaftaran = $this->m_pendaftaran->get_pendaftaran_by_user($user_id);
        if (!$pendaftaran) {
            $this->session->set_flashdata('error', 'Data pendaftaran tidak ditemukan.');
            redirect('talent-test/dashboard');
        }

        $this->db->where('id_paket', $pendaftaran['id_paket']);
        $paket_ujian = $this->db->get('tb_paket_ujian')->row_array();
        $id_ujian = $paket_ujian['id_ujian'] ?? 1;

        $table_map = [
            'cfit' => 'tb_ujian',
            'ist' => 'tb_ujian_ist',
            'holland' => 'tb_ujian_holland',
            'disc' => 'tb_ujian_disc',
            'essay' => 'tb_ujian_essay',
            'hitung' => 'tb_ujian_hitung',
            'studi_kasus' => 'tb_ujian_kasus',
            'leadership' => 'tb_ujian_leadership',
            'cepat_teliti' => 'tb_ujian_cepat',
            'talent_who_am_i' => 'tb_ujian_talent'
        ];

        $column_map = [
            'cfit' => 'id_ujian',
            'ist' => 'id_ujian_ist',
            'holland' => 'id_ujian_holland',
            'disc' => 'id_ujian_disc',
            'essay' => 'id_ujian_essay',
            'hitung' => 'id_ujian_hitung',
            'studi_kasus' => 'id_ujian_studi_kasus',
            'leadership' => 'id_ujian_leadership',
            'cepat_teliti' => 'id_ujian_cepat',
            'talent_who_am_i' => 'id_ujian_talent'
        ];

        $table = $table_map[$exam_type] ?? 'tb_ujian';
        $column = $column_map[$exam_type] ?? 'id_ujian';
        $ujian = $this->db->get_where($table, [$column => $id_ujian])->row_array();

        if ($exam_type == 'cfit') {
            $current_time = time();
            $waktu_subtes1 = (!empty($ujian['start_uji_sub1']) && !empty($ujian['end_uji_sub1'])) ? (strtotime($ujian['end_uji_sub1']) - strtotime($ujian['start_uji_sub1'])) / 60 : 10;
            $waktu_subtes2 = (!empty($ujian['start_uji_sub2']) && !empty($ujian['end_uji_sub2'])) ? (strtotime($ujian['end_uji_sub2']) - strtotime($ujian['start_uji_sub2'])) / 60 : 10;
            $waktu_subtes3 = (!empty($ujian['start_uji_sub3']) && !empty($ujian['end_uji_sub3'])) ? (strtotime($ujian['end_uji_sub3']) - strtotime($ujian['start_uji_sub3'])) / 60 : 10;
            $waktu_subtes4 = (!empty($ujian['start_uji_sub4']) && !empty($ujian['end_uji_sub4'])) ? (strtotime($ujian['end_uji_sub4']) - strtotime($ujian['start_uji_sub4'])) / 60 : 10;

            $sub1_end = $current_time + ($waktu_subtes1 * 60);
            $sub2_start = $sub1_end;
            $sub2_end = $sub2_start + ($waktu_subtes2 * 60);
            $sub3_start = $sub2_end;
            $sub3_end = $sub3_start + ($waktu_subtes3 * 60);
            $sub4_start = $sub3_end;
            $sub4_end = $sub4_start + ($waktu_subtes4 * 60);

            $subtest_times = [
                1 => ['start' => $current_time, 'end' => $sub1_end],
                2 => ['start' => $sub2_start, 'end' => $sub2_end],
                3 => ['start' => $sub3_start, 'end' => $sub3_end],
                4 => ['start' => $sub4_start, 'end' => $sub4_end],
            ];

            $this->session->set_userdata('talent_test_subtest_times', $subtest_times);
            $end_time = $sub4_end;
        } elseif ($exam_type == 'holland') {
            $durasi = $this->m_paket->get_durasi_ujian($exam_type);
            $end_time = time() + ($durasi * 60);
            $this->session->set_userdata([
                'talent_test_current_exam' => $exam_type,
                'talent_test_package_id' => $pendaftaran['id_paket'],
                'talent_test_start_time' => time(),
                'talent_test_end_time' => $end_time,
                'talent_test_id_ujian' => $id_ujian,
            ]);
            redirect('talent-test/exam/holland/frame/1');
        } elseif ($exam_type == 'disc') {
            $ujian_list = $this->m_paket->get_ujian_by_paket($pendaftaran['id_paket']);
            $disc_available = false;
            foreach ($ujian_list as $ujian) {
                if ($ujian['jenis_ujian'] == 'disc') {
                    $disc_available = true;
                    break;
                }
            }
            if (!$disc_available) {
                $this->session->set_flashdata('error', 'Ujian DISC tidak tersedia di paket Anda.');
                redirect('talent-test/dashboard');
            }

            $this->db->where('status', 'aktif');
            $ujian_disc = $this->db->get('tb_ujian_disc')->row_array();
            if (!$ujian_disc) {
                $this->session->set_flashdata('error', 'Ujian DISC belum diaktifkan.');
                redirect('talent-test/dashboard');
            }

            $durasi = $this->m_paket->get_durasi_ujian($exam_type);
            $end_time = time() + ($durasi * 60);
            $this->session->set_userdata([
                'talent_test_current_exam' => 'disc',
                'talent_test_package_id' => $pendaftaran['id_paket'],
                'talent_test_start_time' => time(),
                'talent_test_end_time' => $end_time,
                'talent_test_id_ujian' => $ujian_disc['id_ujian_disc'],
            ]);
            redirect('talent-test/exam/disc/frame/1');
        } elseif ($exam_type == 'cepat_teliti') {
            $ujian_cepat = $this->db->get('tb_ujian_cepat')->row_array();
            if (!$ujian_cepat) {
                $this->session->set_flashdata('error', 'Ujian Cepat Teliti belum diaktifkan.');
                redirect('talent-test/dashboard');
            }
            $durasi = $this->m_paket->get_durasi_ujian($exam_type);
            $end_time = time() + ($durasi * 60);
            $this->session->set_userdata([
                'talent_test_current_exam' => 'cepat_teliti',
                'talent_test_package_id' => $pendaftaran['id_paket'],
                'talent_test_start_time' => time(),
                'talent_test_end_time' => $end_time,
                'talent_test_id_ujian' => $ujian_cepat['id_ujian_cepat'],
            ]);
            redirect('talent-test/exam/cepat/frame/1');
        } elseif ($exam_type == 'talent_who_am_i') {
            $ujian_talent_who_am_i = $this->db->get('tb_ujian_talent')->row_array(); 
            if (!$ujian_talent_who_am_i) {
                $this->session->set_flashdata('error', 'Ujian Who Am I belum diaktifkan.');
                redirect('talent-test/dashboard');
            }

            $durasi = $this->m_paket->get_durasi_ujian($exam_type);
            $end_time = time() + ($durasi * 60);

            $this->session->set_userdata([
                'talent_test_current_exam' => 'talent_who_am_i',
                'talent_test_start_time' => time(),
                'talent_test_end_time' => $end_time,
                'talent_test_id_ujian' => $ujian_talent_who_am_i['id_ujian_talent'],
            ]);
            redirect('talent-test/exam/talent_who_am_i/frame/1');
        }

        $this->session->set_userdata([
            'talent_test_current_exam' => $exam_type,
            'talent_test_package_id' => $pendaftaran['id_paket'],
            'talent_test_start_time' => time(),
            'talent_test_end_time' => $end_time,
            'talent_test_id_ujian' => $id_ujian,
        ]);

        redirect('talent-test/exam/' . $exam_type . '/frame/1');
    }
    
    public function exam_frame($exam_type, $frame, $question_number = 1)
    {
        if (!$this->session->userdata('talent_test_current_exam') ||
            $this->session->userdata('talent_test_current_exam') != $exam_type) {
            redirect('talent-test/dashboard');
        }

        $user_id = $this->session->userdata('talent_test_user_id');

        if (is_numeric($frame)) {
            $question_number = (int)$frame;
        }

        if (empty($user_id) || empty($exam_type) || !is_numeric($question_number) || $question_number < 1) {
            $this->session->set_flashdata('error', 'Parameter tidak valid.');
            redirect('talent-test/dashboard');
        }

        $question = $this->get_question_by_type_and_number($exam_type, $question_number);

        if (!$question) {
            $this->calculate_and_save_result($user_id, $exam_type);
            redirect('talent-test/exam_results');
        }

        $question_id = isset($question['nomor_soal']) ? $question['nomor_soal'] : (isset($question['no_soal']) ? $question['no_soal'] : $question_number);
        $user_answer = $this->get_user_answer_for_question($user_id, $exam_type, $question_id, $question['subtes'] ?? null);

        $data = [
            'title'=> 'Soal ' . $question_number . ' - ' . ucfirst($exam_type),
            'question'=> $question,
            'question_number'=> $question_number,
            'exam_type'=> $exam_type,
            'user_answer'=> $user_answer,
        ];

        if ($exam_type == 'cfit') {
            $this->db->where('subtes', 1);
            $this->db->where('type_soal', 'Ujian');
            $total_subtes1 = $this->db->count_all_results('tb_soal_cfit');
            $data['total_subtes1'] = $total_subtes1;

            $this->db->where('subtes', 2);
            $this->db->where('type_soal', 'Ujian');
            $total_subtes2 = $this->db->count_all_results('tb_soal_cfit');
            $data['total_subtes2'] = $total_subtes2;

            $this->db->where('subtes', 3);
            $this->db->where('type_soal', 'Ujian');
            $total_subtes3 = $this->db->count_all_results('tb_soal_cfit');
            $data['total_subtes3'] = $total_subtes3;

            $this->db->where('subtes', 4);
            $this->db->where('type_soal', 'Ujian');
            $total_subtes4 = $this->db->count_all_results('tb_soal_cfit');
            $data['total_subtes4'] = $total_subtes4;

            $subtes_number = $question['subtes'];
            $data['soal_subtes'. $subtes_number] = (object) array_merge($question, ['subtes' => $subtes_number]);
            $data['jawaban' . $subtes_number] = (object) ['jawaban' => $user_answer];

            if ($subtes_number == 1) {
                $data['jawaban'] = $data['jawaban1'];
            }
            if ($subtes_number == 2) {
                $data['soal_subtes1'] = $data['soal_subtes2'];
            }

            $this->session->set_userdata('ses_id', $this->session->userdata('talent_test_user_id'));
            $this->session->set_userdata('ses_ujian', $this->session->userdata('id_ujian'));
            $this->session->set_userdata('sesIdLowongan', 0);

            $data['soal_subtes1'] = (object) array_merge($question, ['subtes' => $subtes_number]);
            $data['jawaban'] = (object) ['jawaban' => $user_answer];

            $data['form_action_prev'] = site_url('talent-test/save_answer/cfit');
            $data['form_action_next'] = site_url('talent-test/save_answer/cfit');
            $data['form_action_end'] = site_url('talent-test/save_answer/cfit');

            if ($subtes_number == 4) {
                $frame_view = 'frame_cfit_4';
            } elseif ($subtes_number == 3) {
                $frame_view = 'frame_cfit_3';
            } elseif ($subtes_number == 2) {
                $frame_view = 'frame_cfit_2';
            } else {
                $frame_view = 'frame_cfit_1';
            }

            $this->load->view('talent_test/ujian/cfit/' . $frame_view, $data);
        }

        if ($exam_type == 'holland') {
            $data = [
                'title' => 'Ujian Holland',
                'exam_type' => $exam_type,
                'end_time' => $this->session->userdata('talent_test_end_time'),
                'id_ujian' => $this->session->userdata('talent_test_id_ujian')
            ];
            $this->load->view('talent_test/ujian/holland/frame_holland', $data);
            return;
        }

        if ($exam_type == 'disc') {
            $user_id = $this->session->userdata('talent_test_user_id');
            $id_ujian = $this->session->userdata('talent_test_id_ujian');
            $total_frames = $this->db->count_all('tb_soal_disc');
            $current_frame = (int)$frame;
            $user_answer = $this->db->where('id_pendaftar_pelatihan', $user_id)->where('id_ujian', $id_ujian)
                ->where('no_soal', $frame)
                ->get('tb_data_jawaban_talent_test_disc')
                ->row();

            if ($current_frame < 1 || $current_frame > $total_frames) {
                redirect('talent-test/dashboard');
            }

            $this->db->where('no_soal', $current_frame);
            $soal = $this->db->get('tb_soal_disc')->row_array();
            if (!$soal) {
                $this->session->set_flashdata('error', 'Soal tidak ditemukan.');
                redirect('talent-test/dashboard');
            }

            $data = [
                'exam_type' => 'disc',
                'user_answer' => $user_answer,
                'frame' => $current_frame,
                'total_frames' => $total_frames,
                'soal' => $soal,
                'end_time' => $this->session->userdata('talent_test_end_time'),
                'id_ujian' => $id_ujian,
                'form_action' => site_url('talent-test/save-answer'),
            ];

            $this->load->view('talent_test/ujian/disc/frame_disc', $data);
            return;
        }

        if ($exam_type == 'cepat_teliti') {
            $user_id = $this->session->userdata('talent_test_user_id');
            $id_ujian = $this->session->userdata('talent_test_id_ujian');
            $soal_numbers = array_map('intval', array_column($this->db->select('nomor_soal')->order_by('CAST(nomor_soal AS UNSIGNED) ASC')->get('tb_soal_cepat')->result_array(), 'nomor_soal'));
            $total_frames = count($soal_numbers);
            $current_index = array_search((int)$frame, $soal_numbers);
            if ($current_index === false) {
                redirect('talent-test/dashboard');
            }
            
            $user_answer = $this->db->where('id_pendaftar_pelatihan', $user_id)->where('id_ujian', $id_ujian)
                ->where('no_soal', $frame)
                ->get('tb_data_jawaban_talent_test_cepat')
                ->row();

            $this->db->where('nomor_soal', $frame);
            $soal = $this->db->get('tb_soal_cepat')->row_array();
            if (!$soal) {
                $this->session->set_flashdata('error', 'Soal tidak ditemukan.');
                redirect('talent-test/dashboard');
            }

            $data = [
                'exam_type' => 'cepat_teliti',
                'user_answer' => $user_answer,
                'frame' => $frame,
                'nomor_soal' => $frame,
                'total_frames' => $total_frames,
                'soal' => $soal,
                'end_time' => $this->session->userdata('talent_test_end_time'),
                'id_ujian' => $id_ujian,
                'form_action' => site_url('talent-test/save-answer'),
                'next_frame' => ($current_index < $total_frames - 1) ? $soal_numbers[$current_index + 1] : null,
                'prev_frame' => ($current_index > 0) ? $soal_numbers[$current_index - 1] : null,
                'current_index' => $current_index,
            ];

            $this->load->view('talent_test/ujian/cepat/frame_cepat', $data);
            return;
        }

        if ($exam_type == 'talent_who_am_i') {
            $id_ujian = $this->session->userdata('talent_test_id_ujian');

            $user_answer_raw = $this->db->where('id_pendaftar_pelatihan', $user_id)
                ->where('id_ujian', $id_ujian)
                ->get('tb_data_jawaban_talent_test_who_am_i')
                ->row_array();

            $user_answer = [
                'jawaban1' => $user_answer_raw['jawaban1'] ?? '',
                'jawaban2' => $user_answer_raw['jawaban2'] ?? '',
                'jawaban3' => $user_answer_raw['jawaban3'] ?? '',
            ];

            $data = [
                'exam_type' => 'talent_who_am_i',
                'user_answer' => $user_answer,
                'frame' => 1,
                'end_time' => $this->session->userdata('talent_test_end_time'),
                'id_ujian' => $id_ujian,
                'form_action' => site_url('talent-test/save-answer'),
            ];
            $this->load->view('talent_test/ujian/talent_who_am_i/frame_talent_who_am_i', $data);
            return;
        }
    }

    public function exam_list()
    {
        $token = $this->session->userdata('talent_test_access_token');
        if (!$token) {
            redirect('talent-test/login');
        }

        $this->db->where('access_token', $token);
        $pendaftaran = $this->db->get('tb_pendaftar_pelatihan')->row_array();

        if (!$pendaftaran || $pendaftaran['status_pembayaran'] != 'success') {
            $this->session->set_flashdata('error', 'Pembayaran belum berhasil atau tidak ditemukan.');
            redirect('talent-test/login');
            return;
        }

        $paket = $this->m_paket->get_paket_by_id($pendaftaran['id_paket']);
        $ujian_list = $this->m_paket->get_ujian_by_paket($pendaftaran['id_paket']);
        $progress_data = $this->get_user_exam_progress($pendaftaran['id_pendaftar_pelatihan'], $pendaftaran['id_paket']);
        $jadwal_test = $pendaftaran['jadwal_test'];

        foreach ($ujian_list as &$ujian) {
            $exam_type = $ujian['jenis_ujian'];
            $this->db->where('id_pendaftar_pelatihan', $pendaftaran['id_pendaftar_pelatihan']);
            $this->db->where('jenis_ujian', $exam_type);
            $result = $this->db->get('tb_hasil_talent_test')->row();
            $ujian['is_completed'] = $result ? true : false;
        }

        $data = [
            'title' => 'Daftar Ujian Talent Test',
            'pendaftaran' => $pendaftaran,
            'paket' => $paket,
            'ujian_list' => $ujian_list,
            'progress_data' => $progress_data,
            'jadwal_test' => $jadwal_test,
            'is_talent_test' => true,
            'is_pelamar' => false
        ];

        $this->load->view('talent_test/ujian/exam_list', $data);
    }

    public function save_answer()
    {
        $exam_type = $this->input->post('exam_type');
        $question_id = $this->input->post('question_id');
        $user_id = $this->session->userdata('talent_test_user_id');
        $id_ujian = $this->session->userdata('talent_test_id_ujian');
        $redirect = $this->input->post('redirect');
        $question_number = (int)$this->input->post('question_number');
        $subtes = $this->input->post('subtes');
        $no_soal = $this->input->post('no_soal');

        if (empty($user_id) || empty($exam_type)) {
            $this->session->set_flashdata('error', 'Data tidak lengkap.');
            redirect('talent-test/dashboard');    
        }

                if ($exam_type != 'holland' && $exam_type != 'disc' && $exam_type != 'cepat_teliti' && empty($question_id)) {
            $this->session->set_flashdata('error', 'Data tidak lengkap.');
            redirect('talent-test/dashboard');
        }

        if ($exam_type == 'cfit' && $subtes == 2) {
            $answer_array = $this->input->post('answer') ?: [];
            if (is_array($answer_array)) {
                $answer = [
                    'jawaban' => isset($answer_array[0]) ? $answer_array[0] : '',
                    'jawaban2' => isset($answer_array[1]) ? $answer_array[1] : ''
                ];
            } else {
                $answer = ['jawaban' => '', 'jawaban2' => ''];
            }
        } else {
            $answer = $this->input->post('answer');
        }

        if ($exam_type == 'holland') {
            $answer = [
                'nilai_r' => (int)($this->input->post('nilai_r') ?? 0),
                'nilai_i' => (int)($this->input->post('nilai_i') ?? 0),
                'nilai_a' => (int)($this->input->post('nilai_a') ?? 0),
                'nilai_s' => (int)($this->input->post('nilai_s') ?? 0),
                'nilai_e' => (int)($this->input->post('nilai_e') ?? 0),
                'nilai_k' => (int)($this->input->post('nilai_k') ?? 0),
            ];
            $this->save_answer_by_type($user_id, $exam_type, null, $answer, ['id_ujian' => $id_ujian]);
            $this->calculate_and_save_result($user_id, $exam_type);
            $this->session->set_flashdata('success', 'Ujian Holland telah berhasil diselesaikan.');
            redirect('talent-test/exam-list');
            return;
        }
        
        if ($exam_type == 'disc') {
            $user_id = $this->session->userdata('talent_test_user_id');
            $id_ujian = $this->session->userdata('talent_test_id_ujian');
            $jawaban_m = $this->input->post('jawaban_m');
            $jawaban_l = $this->input->post('jawaban_l');
            $no_soal = $this->input->post('no_soal');
            
            if (!empty($jawaban_m) && !empty($jawaban_l)) {
                $data = [
                    'id_pendaftar_pelatihan' => $user_id,
                    'id_ujian' => $id_ujian,
                    'no_soal' => $no_soal,
                    'jawaban' => $jawaban_m,
                    'jawaban2' => $jawaban_l,
                    'waktu_jawab' => date('Y-m-d H:i:s'),
                ];

                $this->db->where('id_pendaftar_pelatihan', $user_id);
                $this->db->where('id_ujian', $id_ujian);
                $this->db->where('no_soal', $no_soal);
                $existing = $this->db->get('tb_data_jawaban_talent_test_disc')->row();

                if ($existing) {
                    $this->db->where('id_jawaban_disc', $existing->id_jawaban_disc);
                    $this->db->update('tb_data_jawaban_talent_test_disc', $data);
                } else {
                    $this->db->insert('tb_data_jawaban_talent_test_disc', $data);
                }
            }

            if ($target = $this->input->post('target_question')) {
                redirect('talent-test/exam/disc/frame/' . $target);
                return;
            }

            $total_jawaban = $this->db->where('id_pendaftar_pelatihan', $user_id)->where('id_ujian', $id_ujian)->count_all_results('tb_data_jawaban_talent_test_disc');
            $total_soal = $this->db->count_all('tb_soal_disc');
            if ($total_jawaban >= $total_soal) {
                $this->calculate_and_save_disc_result($user_id, $id_ujian);
                redirect('talent-test/exam-list');
            } else {
                if ($redirect == '1') {
                    $next_frame = $no_soal - 1;
                    redirect('talent-test/exam/disc/frame/' . $next_frame);
                } elseif ($redirect == '2') {
                    $next_frame = $no_soal + 1;
                    redirect('talent-test/exam/disc/frame/' . $next_frame);
                } elseif ($redirect == '3') {
                    $this->calculate_and_save_disc_result($user_id, $id_ujian);
                    redirect('talent-test/exam-list');
                } else {
                    redirect('talent-test/dashboard');
                }
            }
            return;
        }

        if ($exam_type == 'cepat_teliti') {
            $jawaban = $this->input->post('jawaban');
            $no_soal = (int) $this->input->post('no_soal');
            $redirect_action = $this->input->post('redirect');
            $target_question = $this->input->post('target_question');

            if (!empty($jawaban)) {
                $data = [
                    'id_pendaftar_pelatihan' => $user_id,
                    'id_ujian' => $id_ujian,
                    'no_soal' => $no_soal,
                    'jawaban' => $jawaban,
                    'waktu_jawab' => date('Y-m-d H:i:s'),
                ];

                $this->db->where('id_pendaftar_pelatihan', $user_id)
                        ->where('id_ujian', $id_ujian)
                        ->where('no_soal', $no_soal);
                $existing = $this->db->get('tb_data_jawaban_talent_test_cepat')->row();

                if ($existing) {
                    $this->db->where('id_jawaban_cepat', $existing->id_jawaban_cepat);
                    $this->db->update('tb_data_jawaban_talent_test_cepat', $data);
                } else {
                    $this->db->insert('tb_data_jawaban_talent_test_cepat', $data);
                }
            }

            if ($target_question) {
                redirect('talent-test/exam/cepat/frame/' . $target_question);
                return;
            }

            $soal_numbers = array_map('intval', array_column($this->db->select('nomor_soal')->order_by('CAST(nomor_soal AS UNSIGNED) ASC')->get('tb_soal_cepat')->result_array(), 'nomor_soal'));
            $total_soal = count($soal_numbers);
            $current_index = array_search($no_soal, $soal_numbers);

            if ($redirect_action == '3' || ($redirect_action == '2' && $current_index >= $total_soal - 1)) {
                $this->calculate_and_save_result($user_id, 'cepat_teliti');
                redirect('talent-test/exam-list');
                return;
            }

            if ($redirect_action == '1' && $current_index > 0) {
                redirect('talent-test/exam/cepat/frame/' . $soal_numbers[$current_index - 1]);
            } elseif ($redirect_action == '2' && $current_index < $total_soal - 1) {
                redirect('talent-test/exam/cepat/frame/' . $soal_numbers[$current_index + 1]);
            } else {
                redirect('talent-test/exam/cepat/frame/' . $no_soal);
            }
        }
        if ($exam_type == 'talent_who_am_i') {
            $jawaban1 = $this->input->post('jawaban1');
            $jawaban2 = $this->input->post('jawaban2');
            $jawaban3 = $this->input->post('jawaban3');
            $redirect = $this->input->post('redirect');

            if (!empty($jawaban1) || !empty($jawaban2) || !empty($jawaban3)) {
                $data = [
                    'id_pendaftar_pelatihan' => $user_id,
                    'id_ujian' => $id_ujian,
                    'jawaban1' => $jawaban1,
                    'jawaban2' => $jawaban2,
                    'jawaban3' => $jawaban3,
                    'waktu_jawab' => date('Y-m-d H:i:s'),
                ];

                $this->db->where('id_pendaftar_pelatihan', $user_id)
                        ->where('id_ujian', $id_ujian);
                $existing = $this->db->get('tb_data_jawaban_talent_test_who_am_i')->row();

                if ($existing) {
                    $this->db->where('id_jawaban', $existing->id_jawaban);
                    $this->db->update('tb_data_jawaban_talent_test_who_am_i', $data);
                } else {
                    $this->db->insert('tb_data_jawaban_talent_test_who_am_i', $data);
                }
            }

            if ($redirect == '3') {
                $this->calculate_and_save_result($user_id, 'talent_who_am_i');
                redirect('talent-test/exam-list');
                return;
            }

            redirect('talent-test/dashboard'); // Fallback redirect
        }

        $additional_data = ['id_ujian' => $id_ujian];
        if ($exam_type == 'cfit') {
            $additional_data['subtes'] = $subtes;
        }
        $this->save_answer_by_type($user_id, $exam_type, $question_id, $answer, $additional_data);

        if ($target = $this->input->post('target_question')) {
            redirect('talent-test/exam/' . $exam_type . '/frame/' . $target);
            return;
        }

        if ($redirect == 1) {
            $prev_question = max(1, $question_number - 1);
            redirect('talent-test/exam/' . $exam_type . '/frame/' . $prev_question);
        } elseif ($redirect == 2) {
            $next_question = $question_number + 1;
            if ($exam_type == 'cfit') {
                $this->db->where('subtes', 1);
                $this->db->where('type_soal', 'Ujian');
                $total_subtes1 = $this->db->count_all_results('tb_soal_cfit');

                $this->db->where('subtes', 2);
                $this->db->where('type_soal', 'Ujian');
                $total_subtes2 = $this->db->count_all_results('tb_soal_cfit');

                $this->db->where('subtes', 3);
                $this->db->where('type_soal', 'Ujian');
                $total_subtes3 = $this->db->count_all_results('tb_soal_cfit');

                if ($next_question == ($total_subtes1 + 1)) {
                    redirect('talent-test/training/cfit/2');
                    return;
                } elseif ($next_question == ($total_subtes1 + $total_subtes2 + 1)) {
                    redirect('talent-test/training/cfit/3');
                    return;
                } elseif ($next_question == ($total_subtes1 + $total_subtes2 + $total_subtes3 + 1)) {
                    redirect('talent-test/training/cfit/4');
                    return;
                }
            }
            redirect('talent-test/exam/' . $exam_type . '/frame/' . $next_question);
        } elseif ($redirect == 3) {
            redirect('talent-test/training/cfit/2');
            return;
        } elseif ($redirect == 4) {
            redirect('talent-test/training/cfit/3');
            return;
        } elseif ($redirect == 5) {
            redirect('talent-test/training/cfit/4');
            return;
        } elseif ($redirect == 6) {
            redirect('talent-test/exam-list');
            return;
        } else {
            redirect('talent-test/exam/' . $exam_type . '/frame/' . $question_number);
        }

        if ($exam_type == 'holland') {
            $this->calculate_and_save_result($user_id, $exam_type);
            redirect('talent-test/exam/holland/result');
            return;
        }

        if ($exam_type == 'disc') {
            if ($redirect == '1') {
                $next_frame = $question_number - 1;
                redirect('talent-test/exam/disc/frame/' . $next_frame);
            } elseif ($redirect == '2') {
                $next_frame = $question_number + 1;
                redirect('talent-test/exam/disc/frame/' . $next_frame);
            } elseif ($redirect == '3') {
                $this->calculate_and_save_disc_result('disc');
                redirect('talent-test/exam-list');
            }
        } else {
            redirect('talent-test/dashboard');
        }
    }
    
    public function exam_results()
    {
        $token = $this->session->userdata('talent_test_access_token');
        if (!$token) {
            redirect('talent-test/login');
        }

        $this->db->where('access_token', $token);
        $pendaftaran = $this->db->get('tb_pendaftar_pelatihan')->row_array();

        if (!$pendaftaran || $pendaftaran['status_pembayaran'] != 'success') {
            $this->session->set_flashdata('error', 'Pembayaran belum berhasil atau tidak ditemukan.');
            redirect('talent-test/login');
            return;
        }

        $user_id = $pendaftaran['id_pendaftar_pelatihan'];
        $paket = $this->m_paket->get_paket_by_id($pendaftaran['id_paket']);
        $ujian_list = $this->m_paket->get_ujian_by_paket($pendaftaran['id_paket']);

        $exam_results = [];
        foreach ($ujian_list as $ujian) {
            $exam_type = $ujian['jenis_ujian'];
            $result = $this->get_exam_result($user_id, $exam_type);

            if (!$result) {
                $result = $this->calculate_and_save_result($user_id, $exam_type);
            }

            if ($result) {
                $exam_results[] = [
                    'exam_type' => $exam_type,
                    'exam_name' => ucfirst(str_replace('_', ' ', $exam_type)),
                    'result' => $result
                ];
            }
        }

        $data = [
            'title' => 'Hasil Ujian Talent Test',
            'pendaftaran' => $pendaftaran,
            'paket' => $paket,
            'exam_results' => $exam_results,
            'is_talent_test' => true,
            'is_pelamar' => false
        ];

        $this->load->view('talent_test/exam_results', $data);
    }

    public function exam_confirmation($exam_type)
    {
        $token = $this->session->userdata('talent_test_access_token');
        if (!$token) {
            redirect('talent-test/login');
        }
        $this->db->where('access_token', $token);
        $pendaftaran = $this->db->get('tb_pendaftar_pelatihan')->row_array();
        if (!$pendaftaran) {
            redirect('talent-test/login');
        }

        $paket = $this->m_paket->get_paket_by_id($pendaftaran['id_paket']);
        $ujian_list = $this->m_paket->get_ujian_by_paket($pendaftaran['id_paket']);
        $questions = $this->m_paket->get_soal_by_ujian($exam_type);
        $durasi = $this->m_paket->get_durasi_ujian($exam_type);

        $this->db->where('id_paket', $pendaftaran['id_paket']);
        $paket_ujian = $this->db->get('tb_paket_ujian')->row_array();
        $id_ujian = $paket_ujian['id_ujian'] ?? 1;
        $this->session->set_userdata('talent_test_id_ujian', $id_ujian);

        $data = [
            'pendaftaran' => $pendaftaran,
            'paket' => $paket,
            'ujian_list' => $ujian_list,
            'questions' => $questions,
            'exam_type' => $exam_type,
            'durasi' => $durasi,
        ];

        if ($exam_type == 'holland') {
            $durasi = $this->m_paket->get_durasi_ujian($exam_type);
            $durasi = (int) $durasi;
            $this->load->view('talent_test/ujian/holland/exam_confirmation_holland', $data);
        } elseif ($exam_type == 'cfit') {
            $this->load->view('talent_test/ujian/cfit/exam_confirmation_cfit', $data);
        } elseif ($exam_type == 'disc') {
            $this->db->from('tb_soal_disc');
            $total_questions = $this->db->count_all_results();
            $data['questions'] = array_fill(0, $total_questions, null);
            $durasi = $this->m_paket->get_durasi_ujian($exam_type);
            $data['durasi'] = $durasi;
            $this->load->view('talent_test/ujian/disc/exam_confirmation_disc', $data);
        } elseif ($exam_type == 'cepat_teliti') {
            $this->db->from('tb_soal_cepat');
            $total_questions = $this->db->count_all_results();
            $data['questions'] = array_fill(0, $total_questions, null);
            $durasi = $this->m_paket->get_durasi_ujian($exam_type);
            $data['durasi'] = $durasi;
            $this->load->view('talent_test/ujian/cepat/exam_confirmation_cepat', $data);
        } elseif ($exam_type == 'talent_who_am_i') {
            $data['durasi'] = $this->m_paket->get_durasi_ujian($exam_type);
            $this->load->view('talent_test/ujian/talent_who_am_i/exam_confirmation_talent_who_am_i', $data);
        } else {
            $this->load->view('talent_test/ujian/' . $exam_type . '/exam_confirmation_' . $exam_type, $data);
        }
    }

    private function get_user_exam_progress($user_id, $package_id)
    {
        $this->db->where('id_paket', $package_id);
        $paket_ujian = $this->db->get('tb_paket_ujian')->result_array();

        $progress = [];
        foreach ($paket_ujian as $ujian) {
            $exam_type = $ujian['jenis_ujian'];
            $table_name = $this->get_answer_table_name_by_exam_type($exam_type);

            if ($table_name) {
                $this->db->where('id_pendaftar_pelatihan', $user_id);
                $answered_questions = $this->db->count_all_results($table_name);

                $soal_table = $this->get_table_name_by_exam_type($exam_type);
                if ($exam_type == 'cfit'){
                    $this->db->where('type_soal', 'Ujian');
                }
                $total_questions = $this->db->count_all_results($soal_table);

                $progress[$exam_type] = [
                    'total_questions' => $total_questions,
                    'answered_questions' => $answered_questions,
                ];
            } else {
                $progress[$exam_type] = [
                    'total_questions' => 1,
                    'answered_questions' => 0,
                ];
            }
        }
        return $progress;
    }

    private function get_question_by_type_and_number($exam_type, $question_number){
        $table_name = $this->get_table_name_by_exam_type($exam_type);

        if ($exam_type == 'cfit') {
            $this->db->where('type_soal', 'Ujian');
            $this->db->order_by('subtes', 'ASC');
            $this->db->order_by('nomor_soal', 'ASC');
            $this->db->limit(1, $question_number - 1);
        } elseif ($exam_type == 'holland' || $exam_type == 'talent_who_am_i') {
            return ['is_valid' => true];
        } elseif ($exam_type == 'disc') {
            $this->db->where('no_soal', $question_number);
            $this->db->order_by('no_soal', 'ASC');
        } else {
            $this->db->where('nomor_soal', $question_number);
            $this->db->order_by('nomor_soal', 'ASC');
        }

        $query = $this->db->get($table_name);
        return $query->row_array();
    }
    
    private function save_answer_by_type($user_id, $exam_type, $question_id, $answer, $additional_data = [])
    {
        $table_name = $this->get_answer_table_name_by_exam_type($exam_type);

        if ($exam_type == 'cfit') {
            $data = [
                'id_pendaftar_pelatihan' => $user_id,
                'nomor_soal' => $question_id,   
                'id_ujian' => $additional_data['id_ujian'] ?? 1,
                'subtes' => $additional_data['subtes'] ?? '1',
                'jawaban' => $answer['jawaban'] ?? '',
                'jawaban2' => $answer['jawaban2'] ?? '',
                'jawaban_kunci' => '',
                'jawaban_kunci2' => '',
                'waktu_jawab' => date('Y-m-d H:i:s')
            ];
        } elseif ($exam_type == 'disc') {
            $data = [
                'id_pendaftar_pelatihan' => $user_id,
                'id_ujian' => $additional_data['id_ujian'] ?? 1,
                'no_soal' => $question_id,
                'jawaban' => $answer['jawaban'] ?? '',
                'jawaban2' => $answer['jawaban2'] ?? '',
                'waktu_jawab' => date('Y-m-d H:i:s')
            ];
        } elseif ($exam_type == 'holland') {
            $data = [
                'id_pendaftar_pelatihan' => $user_id,
                'id_ujian' => $additional_data['id_ujian'] ?? 1,
                'nilai_r' => $answer['nilai_r'] ?? 0,
                'nilai_i' => $answer['nilai_i'] ?? 0,
                'nilai_a' => $answer['nilai_a'] ?? 0,
                'nilai_s' => $answer['nilai_s'] ?? 0,
                'nilai_e' => $answer['nilai_e'] ?? 0,
                'nilai_k' => $answer['nilai_k'] ?? 0,
                'waktu_jawab' => date('Y-m-d H:i:s')
            ];
        } elseif ($exam_type == 'ist') {
            $data = [
                'id_pendaftar_pelatihan' => $user_id,
                'nomor_soal' => $question_id,
                'id_ujian' => $additional_data['id_ujian'] ?? 1,
                'subtes' => $additional_data['subtes'] ?? '1',
                'jawaban' => $answer['jawaban'] ?? '',
                'jawaban2' => $answer['jawaban2'] ?? '',
                'jawaban3' => $answer['jawaban3'] ?? '',
                'jawaban_kunci' => $answer['jawaban_kunci'] ?? '',
                'jawaban_kunci2' => $answer['jawaban_kunci2'] ?? '',
                'jawaban_kunci3' => $answer['jawaban_kunci3'] ?? '',
                'nilai' => $answer['nilai'] ?? 0,
                'waktu_jawab' => date('Y-m-d H:i:s')
            ];
        } else {
            $data = [
                'id_pendaftar_pelatihan' => $user_id,
                'id_soal' => $question_id,
                'jawaban' => $answer,
                'waktu_jawab' => date('Y-m-d H:i:s')
            ];
        }

        $where_condition = ['id_pendaftar_pelatihan' => $user_id];
        if ($exam_type == 'cfit' || $exam_type == 'ist') {
            $where_condition['nomor_soal'] = $question_id;
            $where_condition['id_ujian'] = $additional_data['id_ujian'] ?? 1;
            $where_condition['subtes'] = $additional_data['subtes'] ?? '1';
        } elseif ($exam_type == 'disc') {
            $where_condition['no_soal'] = $question_id;
            $where_condition['id_ujian'] = $additional_data['id_ujian'] ?? 1;
        } elseif ($exam_type == 'holland') {
        } else {
            $where_condition['id_soal'] = $question_id;
        }

        $this->db->where($where_condition);
        $existing = $this->db->get($table_name)->row();

        if ($existing) {
            $this->db->where($where_condition);
            $this->db->update($table_name, $data);
        } else {
            $this->db->insert($table_name, $data);
        }
    }

    private function calculate_and_save_result($user_id, $exam_type)
    {
        switch ($exam_type) {
            case 'cfit':
                return $this->calculate_cfit_result($user_id);
            case 'ist':
                return $this->calculate_ist_result($user_id);
            case 'holland':
                return $this->calculate_holland_result($user_id);
            case 'disc':
                return $this->calculate_disc_result($user_id);
            case 'essay':
                return $this->calculate_essay_result($user_id);
            case 'hitung':
                return $this->calculate_hitung_result($user_id);
            case 'studi_kasus':
                return $this->calculate_studi_kasus_result($user_id);
            case 'leadership':
                return $this->calculate_leadership_result($user_id);
            case 'cepat_teliti':
                return $this->calculate_cepat_result($user_id);
            case 'talent_who_am_i':
                return $this->calculate_talent_who_am_i_result($user_id);
            default:
                return null;
        }
    }

    private function calculate_cfit_result($user_id) 
    {
        $this->db->select('COUNT(*) as total_soal,
            SUM(CASE WHEN s.jawaban = j.jawaban THEN 1 ELSE 0 END) as jawaban_benar');
        $this->db->from('tb_data_jawaban_talent_test_cfit j');
        $this->db->join('tb_soal_cfit s', 'j.nomor_soal = s.nomor_soal AND j.subtes = s.subtes');
        $this->db->where('j.id_pendaftar_pelatihan', $user_id);

        $result = $this->db->get()->row();

        if ($result && $result->total_soal > 0) {
            $skor = ($result->jawaban_benar / $result->total_soal) * 100;
            $nilai = $this->get_cfit_grade($skor);

            $hasil = [
                'total_soal'    => $result->total_soal,
                'jawaban_benar' => $result->jawaban_benar,
                'skor'          => round($skor, 2),
                'nilai'         => $nilai,
                'interpretasi'  => $this->get_cfit_interpretation($skor)
            ];

            $this->db->insert('tb_hasil_talent_test', [
                'id_pendaftar_pelatihan' => $user_id,
                'jenis_ujian' => 'cfit',
                'skor' => $hasil['skor'],
                'nilai' => $hasil['nilai'],
                'status_penilaian' => 'selesai',
                'waktu_selesai' => date('Y-m-d H:i:s')
            ]);

            return $hasil;
        }
        return null;
    }

    private function calculate_ist_result($user_id)
    {
        $this->db->select('j.jawaban, s.bobot_nilai');
        $this->db->from('tb_data_jawaban_ist j');
        $this->db->join('tb_soal_ist s', 'j.id_soal = s.id_soal');
        $this->db->where('j.id_pendaftar_pelatihan', $user_id);

        $answers = $this->db->get()->result();

        $total_score = 0;
        foreach ($answers as $answer) {
            $total_score += $answer->bobot_nilai;
        }

        $skor = ($total_score / count($answers)) * 100;
        $nilai = $this->get_ist_grade($skor);

        return [
            'total_soal'    => count($answers),
            'total_skor'    => $total_score,
            'skor'          => round($skor, 2),
            'nilai'         => $nilai,
            'interpretasi'  => $this->get_ist_interpretation($skor)  
        ];
    }

    private function calculate_holland_result($user_id){
        $table_name = 'tb_data_jawaban_talent_test_holland';
        $this->db->where('id_pendaftar_pelatihan', $user_id);
        $jawaban = $this->db->get($table_name)->row_array();

        if (!$jawaban) {
            return null;
        }

        $nilai = [
            'R' => (int)$jawaban['nilai_r'],
            'I' => (int)$jawaban['nilai_i'],
            'A' => (int)$jawaban['nilai_a'],
            'S' => (int)$jawaban['nilai_s'],
            'E' => (int)$jawaban['nilai_e'],
            'K' => (int)$jawaban['nilai_k'],
        ];

        arsort($nilai);
        $top1 = key($nilai);
        $top2 = isset($nilai[1]) ? key(array_slice($nilai, 1, 1, true)) : $top1;
        $code = $top1 . $top2;

        $skor_total = array_sum($nilai);
        $skor_rata = round($skor_total / 6, 2);

        $hasil = [
            'nilai_kategori' => $nilai,
            'kategori_utama' => $top1,
            'kategori_pendukung' => $top2,
            'code' => $code,
            'skor_rata' => $skor_rata,
            'interpretasi' => $this->get_holland_interpretation($code)
        ];

        $this->db->insert('tb_hasil_talent_test', [
            'id_pendaftar_pelatihan' => $user_id,
            'jenis_ujian' => 'holland',
            'skor' => $skor_rata,
            'nilai' => $top1 . '/' . $top2,
            'status_penilaian' => 'selesai',
            'waktu_selesai' => date('Y-m-d H:i:s')
        ]);

        return $hasil;
    }

    private function calculate_disc_result($user_id)
    {
        $this->db->select('j.jawaban, j.jawaban2, s.aspek_m1, s.aspek_m2, s.aspek_m3, s.aspek_m4, s.aspek_l1, s.aspek_l2, s.aspek_l3, s.aspek_l4');
        $this->db->from('tb_data_jawaban_talent_test_disc j');
        $this->db->join('tb_soal_disc s', 'j.no_soal = s.no_soal');
        $this->db->where('j.id_pendaftar_pelatihan', $user_id);

        $answers = $this->db->get()->result();

        $dimensions = ['D' => 0, 'I' => 0, 'S' => 0, 'C' => 0];

        foreach ($answers as $answer) {
            if (!empty($answer->jawaban)) {
                $most_index = (int)$answer->jawaban - 1;
                $most_aspects = [$answer->aspek_m1, $answer->aspek_m2, $answer->aspek_m3, $answer->aspek_m4];
                if (isset($most_aspects[$most_index])) {
                    $dimension = $most_aspects[$most_index];
                    if (isset($dimensions[$dimension])) {
                        $dimensions[$dimension]++;
                    }
                }
            }

            if (!empty($answer->jawaban2)) {
                $least_index = (int)$answer->jawaban2 - 1;
                $least_aspects = [$answer->aspek_l1, $answer->aspek_l2, $answer->aspek_l3, $answer->aspek_l4];
                if (isset($least_aspects[$least_index])) {
                    $dimension = $least_aspects[$least_index];
                    if (isset($dimensions[$dimension])) {
                        $dimensions[$dimension]--;
                    }
                }
            }
        }

        arsort($dimensions);
        $dominant_dimension = array_keys($dimensions)[0];

        return [
            'dimensi_dominan'   => $dominant_dimension,
            'skor_dimensi'      => $dimensions,
            'interpretasi'      => $this->get_disc_interpretation($dominant_dimension) 
        ];
    }

    private function calculate_and_save_disc_result($user_id, $id_ujian) 
    {
        $jawaban = $this->db->where('id_pendaftar_pelatihan', $user_id)->where('id_ujian', $id_ujian)->get('tb_data_jawaban_talent_test_disc')->result_array();

        $skor = ['D' => 0, 'I' => 0, 'S' => 0, 'C' => 0];
        foreach ($jawaban as $j) {
            $this->db->where('no_soal', $j['no_soal']);
            $soal = $this->db->get('tb_soal_disc')->row();
            if ($soal) {
                $m_index = (int)$j['jawaban'] - 1;
                $aspek_m = 'aspek_m' . ($m_index + 1);
                if (isset($soal->$aspek_m)) {
                    $skor[$soal->$aspek_m] += 1;
                }
                $l_index = (int)$j['jawaban2'] - 1;
                $aspek_l = 'aspek_l' . ($l_index + 1);
                if (isset($soal->$aspek_l)) {
                    $skor[$soal->$aspek_l] -= 1;
                }
            }
        }

        arsort($skor);
        $most = key($skor);
        $lest = array_key_last($skor);

        $data = [
            'id_pendaftar_pelatihan' => $user_id,
            'jenis_ujian' => 'disc',
            'skor' => current($skor),
            'nilai' => $most . '/' . $lest,
            'status_penilaian' => 'selesai',
            'waktu_selesai' => date('Y-m-d H:i:s'),
        ];
        $this->db->insert('tb_hasil_talent_test', $data);
    }

    private function calculate_essay_result($user_id){
        $this->db->where('id_pendaftar_pelatihan', $user_id);
        $this->db->where('jenis_ujian', 'essay');
        $result = $this->db->get('tb_hasil_talent_test')->row();

        if ($result) {
            return [
                'status'    => $result->status_penilaian,
                'skor'      => $result->skor,
                'nilai'     => $result->nilai,
                'komentar'  => $result->komentar
            ];
        }
        return ['status' => 'menunggu_penilaian'];
    }

    private function calculate_hitung_result($user_id) 
    {
        $this->db->select('COUNT(*) as total_soal,
            SUM(CASE WHEN s.jawaban_benar = j.jawaban THEN 1 ELSE 0 END) as jawaban_benar');
        $this->db->from('tb_data_jawaban_hitung j');
        $this->db->join('tb_soal_hitung s', 'j.id_soal = s.id_soal');
        $this->db->where('j.id_pendaftar_pelatihan', $user_id);

        $result = $this->db->get()->row();

        if ($result) {
            $skor = ($result->jawaban_benar / $result->total_soal) * 100;
            return [
                'total_soal'    => $result->total_soal,
                'jawaban_benar' => $result->jawaban_benar,
                'skor'          => round($skor, 2),
                'nilai'         => $this->get_numeric_grade($skor)
            ];
        }
        return null;
    }

    private function calculate_studi_kasus_result($user_id)
    {
        $this->db->where('id_pendaftar_pelatihan', $user_id);
        $this->db->where('jenis_ujian', 'studi_kasus');
        $result = $this->db->get('tb_hasil_talent_test')->row();

        if ($result) {
            return [
                'skor'      => $result->skor,
                'nilai'     => $result->nilai,
                'komentar'  => $result->komentar
            ];
        }

        return ['status' => 'menunggu_penilaian'];
    }

    private function calculate_leadership_result($user_id)
    {
        $this->db->select('AVG(s.bobot_nilai) as skor_rata');
        $this->db->from('tb_data_jawaban_leadership j');
        $this->db->join('tb_soal_leadership s', 'j.id_soal = s.id_soal');
        $this->db->where('j.id_pendaftar_pelatihan', $user_id);

        $result = $this->db->get()->row();

        if ($result) {
            $skor = $result->skor_rata * 100;
            return [
                'skor'=> round($skor, 2),
                'nilai'=> $this->get_leadership_grade($skor),
                'interpretasi'=> $this->get_leadership_interpretation($skor)
            ];
        }
        return null;
    }

    private function calculate_cepat_result($user_id)
    {
        $this->db->select('COUNT(j.id_jawaban_cepat) as total_jawaban, SUM(CASE WHEN s.jawaban = j.jawaban THEN 1 ELSE 0 END) as jawaban_benar');
        $this->db->from('tb_data_jawaban_talent_test_cepat j');
        $this->db->join('tb_soal_cepat s', 'j.no_soal = s.nomor_soal');
        $this->db->where('j.id_pendaftar_pelatihan', $user_id);
        $result = $this->db->get()->row();

        $total_soal_ujian = $this->db->count_all('tb_soal_cepat');

        $skor = 0;
        $jawaban_benar = 0;

        if ($result) {
            $jawaban_benar = (int) $result->jawaban_benar;
            if ($total_soal_ujian > 0) {
                $skor = ($jawaban_benar / $total_soal_ujian) * 100;
            }
        }

        $hasil = [
            'total_soal'    => $total_soal_ujian,
            'jawaban_benar' => $jawaban_benar,
            'skor'          => round($skor, 2),
        ];

        $this->db->where('id_pendaftar_pelatihan', $user_id);
        $this->db->where('jenis_ujian', 'cepat_teliti');
        $existing_result = $this->db->get('tb_hasil_talent_test')->row();

        $result_data = [
            'id_pendaftar_pelatihan' => $user_id,
            'jenis_ujian' => 'cepat_teliti',
            'skor' => $hasil['skor'],
            'status_penilaian' => 'selesai',
            'waktu_selesai' => date('Y-m-d H:i:s')
        ];

        if ($existing_result) {
            $this->db->where('id_hasil', $existing_result->id_hasil);
            $this->db->update('tb_hasil_talent_test', $result_data);
        } else {
            $this->db->insert('tb_hasil_talent_test', $result_data);
        }

        return $hasil;
    }

    // Tambahan: Logika kalkulasi hasil untuk "Who Am I?"
    private function calculate_talent_who_am_i_result($user_id)
    {
        $this->db->insert('tb_hasil_talent_test', [
            'id_pendaftar_pelatihan' => $user_id,
            'jenis_ujian' => 'talent_who_am_i',
            'skor' => 0,
            'nilai' => 'Selesai',
            'status_penilaian' => 'selesai',
            'waktu_selesai' => date('Y-m-d H:i:s')
        ]);

        return [
            'status' => 'Selesai', 
            'message' => 'Ujian Who Am I telah diselesaikan. Jawaban akan dinilai secara subjektif.'
        ];
    }
    
    private function get_table_name_by_exam_type($exam_type)
    {
        $tables = [
            'cfit'              => 'tb_soal_cfit',
            'ist'               => 'tb_soal_ist',
            'holland'           => 'tb_ujian_holland',
            'disc'              => 'tb_soal_disc',
            'essay'             => 'tb_soal_essay',
            'hitung'            => 'tb_soal_hitung',
            'studi_kasus'       => 'tb_soal_studi_kasus',
            'leadership'        => 'tb_soal_leadership',
            'cepat_teliti'      => 'tb_soal_cepat',
            'talent_who_am_i'   => 'tb_ujian_talent'
        ];

        return isset($tables[$exam_type]) ? $tables[$exam_type] : 'tb_soal_' . $exam_type;
    }

    private function get_user_answer_for_question($user_id, $exam_type, $question_id, $subtes = null)
    {
        if ($exam_type == 'talent_who_am_i' || $exam_type == 'holland') {
            return null;
        }

        $table_name = $this->get_answer_table_name_by_exam_type($exam_type);

        $this->db->where('id_pendaftar_pelatihan', $user_id);
        if (in_array($exam_type, ['cfit', 'ist'])) {
            $this->db->where('nomor_soal', $question_id);
            if ($exam_type == 'cfit' && $subtes) {
                $this->db->where('subtes', $subtes);
            }
        } elseif (in_array($exam_type, ['disc', 'cepat_teliti'])) {
            $this->db->where('no_soal', $question_id);
        } else {
            $this->db->where('id_soal', $question_id);
        }

        $result = $this->db->get($table_name)->row();
        if ($result) {
            if ($exam_type == 'cfit' && $subtes == 2) {
                $answer = [];
                if (!empty($result->jawaban)) {
                    $answer[] = $result->jawaban;
                }
                if (!empty($result->jawaban2)) {
                    $answer[] = $result->jawaban2;
                }
                return $answer;
            } else {
                return $result->jawaban;
            }
        }
        return null;
    }

    private function get_exam_result($user_id, $exam_type)
    {
        $this->db->where('id_pendaftar_pelatihan', $user_id);
        $this->db->where('jenis_ujian', $exam_type);
        return $this->db->get('tb_hasil_talent_test')->row_array();
    }

    private function get_cfit_grade($score)
    {
        if ($score >= 90) return 'A';
        if ($score >= 80) return 'B';
        if ($score >= 70) return 'C';
        if ($score >= 60) return 'D';
        return 'E';
    }

    private function get_cfit_interpretation($score)
    {
        if ($score >= 90) return 'Kemampuan Kognitif sangat tinggi';
        if ($score >= 80) return 'Kemampuan Kognitif tinggi';
        if ($score >= 70) return 'Kemampuan Kognitif sedang';
        if ($score >= 60) return 'Kemampuan Kognitif rendah';
        return 'Kemampuan Kognitif sangat rendah';
    }

    private function get_ist_grade($score) 
    {
        if ($score >= 130) return 'Superior';
        if ($score >= 120) return 'Di Atas Rata-rata';
        if ($score >= 110) return 'Rata-rata Atas';
        if ($score >= 90) return 'Rata-rata';
        if ($score >= 80) return 'Rata-rata Bawah';
        if ($score >= 70) return 'Di Bawah Rata-rata';
        return 'Borderline'; 
    }

    private function get_ist_interpretation($score)
    {
        if ($score >= 130) return 'Intelligence di atas superior';
        if ($score >= 120) return 'Intelligence tinggi';
        if ($score >= 110) return 'Intelligence di atas rata-rata';
        if ($score >= 90) return 'Intelligence rata-rata';
        if ($score >= 80) return 'Intelligence di bawah rata-rata';
        return 'Intelligence rendah';
    }

    private function get_holland_interpretation($code) {
        $interpretations = [
            'RI' => 'Realistic-Investigative: Praktis dan analitis',
            'RA' => 'Realistic-Artistic: Praktis dan kreatif',
            'RS' => 'Realistic-Social: Praktis dan membantu',
            'RE' => 'Realistic-Enterprising: Praktis dan ambisius',
            'RC' => 'Realistic-Conventional: Praktis dan terorganisir',
            'IA' => 'Investigative-Artistic: Analitis dan kreatif',
            'IS' => 'Investigative-Social: Analitis dan membantu',
            'IE' => 'Investigative-Enterprising: Analitis dan ambisius',
            'IC' => 'Investigative-Conventional: Analitis dan terorganisir',
            'AS' => 'Artistic-Social: Kreatif dan membantu',
            'AE' => 'Artistic-Enterprising: Kreatif dan ambisius',
            'AC' => 'Artistic-Conventional: Kreatif dan terorganisir',
            'SE' => 'Social-Enterprising: Membantu dan ambisius',
            'SC' => 'Social-Conventional: Membantu dan terorganisir',
            'EC' => 'Enterprising-Conventional: Ambisius dan terorganisir'
        ];
        
        return $interpretations[$code] ?? 'Kombinasi minat yang unik, konsultasikan dengan konselor karir.';
    }

    private function get_disc_interpretation($dimension) {
        $interpretations = [
            'D' => 'Dominant: Pemimpin yang tegas dan kompetitif',
            'I' => 'Influential: Komunikatif dan antusias',
            'S' => 'Steady: Stabil dan kooperatif',
            'C' => 'Conscientious: Analitis dan teliti'
        ];
        
        return isset($interpretations[$dimension]) ? $interpretations[$dimension] : 'Kepribadian campuran';
    }

    private function get_leadership_grade($score) {
        if ($score >= 85) return 'Excellent';
        if ($score >= 75) return 'Good';
        if ($score >= 65) return 'Fair';
        if ($score >= 55) return 'Poor';
        return 'Needs Improvement';
    }

    private function get_leadership_interpretation($score) {
        if ($score >= 85) return 'Kepemimpinan sangat baik, mampu memimpin tim dengan efektif';
        if ($score >= 75) return 'Kepemimpinan baik, memiliki potensi untuk berkembang';
        if ($score >= 65) return 'Kepemimpinan cukup, perlu pengembangan lebih lanjut';
        if ($score >= 55) return 'Kepemimpinan kurang, butuh pelatihan intensif';
        return 'Kepemimpinan perlu ditingkatkan secara signifikan';
    }

    private function get_numeric_grade($score) {
        if ($score >= 90) return 'A';
        if ($score >= 80) return 'B';
        if ($score >= 70) return 'C';
        if ($score >= 60) return 'D';
        return 'E';
    }

    private function get_answer_table_name_by_exam_type($exam_type)
    {
        $tables = [
            'cfit'              => 'tb_data_jawaban_talent_test_cfit',
            'ist'               => 'tb_data_jawaban_talent_test_ist',
            'holland'           => 'tb_data_jawaban_talent_test_holland',
            'disc'              => 'tb_data_jawaban_talent_test_disc',
            'cepat_teliti'      => 'tb_data_jawaban_talent_test_cepat',
            'talent_who_am_i'   => 'tb_data_jawaban_talent_test_who_am_i',
        ];

        return $tables[$exam_type] ?? null;
    }
    
    public function training($exam_type, $subtes = 1)
    {
        $allowed_training = ['cfit', 'cepat_teliti'];
        if (!in_array($exam_type, $allowed_training)) {
            redirect('talent-test/dashboard');
        }

        $this->session->set_userdata('training_subtes', $subtes);

        if ($this->input->post('start') && $subtes == 1) {
            $start_key = 'training_start_time_sub' . $subtes;
            $this->session->set_userdata($start_key, time());
            $this->session->set_userdata('training_start_time', time());
            redirect('talent-test/training/' . $exam_type . '/1');
            return;
        }

        if ($exam_type == 'cfit') {
            $durasi_latihan = $this->session->userdata('durasi_latihan');
            if (!$durasi_latihan) {
                $durasi_latihan = 2;
                $this->session->set_userdata('durasi_latihan', $durasi_latihan);
            }

            $start_key = 'training_start_time_sub' . $subtes;
            $start_time = $this->session->userdata($start_key);
            if (!$start_time) {
                $start_time = time();
                $this->session->set_userdata($start_key, $start_time);
            }

            $this->session->set_userdata('training_start_time', $start_time);

            $elapsed = time() - $start_time;
            $remaining = ($durasi_latihan * 60) - $elapsed;

            if ($remaining <= 0) {
                $start_time = time();
                $this->session->set_userdata($start_key, $start_time);
                $remaining = $durasi_latihan * 60;
            }

            $data['start_time'] = $start_time;
            $data['durasi_latihan'] = $durasi_latihan;

            if ($subtes == 1) {
                $this->load->view('talent_test/ujian/cfit/training_cfit', $data);
            } elseif ($subtes == 2) {
                $this->load->view('talent_test/ujian/cfit/training_cfit_2', $data);
            } elseif ($subtes == 3) {
                $this->load->view('talent_test/ujian/cfit/training_cfit_3', $data);
            } elseif ($subtes == 4) {
                $this->load->view('talent_test/ujian/cfit/training_cfit_4', $data);
            } else {
                redirect('talent-test/start-exam/cfit');
            }
        } elseif ($exam_type == 'cepat_teliti') {
            $durasi_latihan = $this->session->userdata('durasi_latihan_cepat');
            if (!$durasi_latihan) {
                $durasi_latihan = 2;
                $this->session->set_userdata('durasi_latihan_cepat', $durasi_latihan);
            }

            $start_key = 'training_start_time_cepat';
            $start_time = $this->session->userdata($start_key);
            if (!$start_time) {
                $start_time = time();
                $this->session->set_userdata($start_key, $start_time);
            }

            $elapsed = time() - $start_time;
            $remaining = ($durasi_latihan* 60) - $elapsed;

            if ($remaining <= 0) {
                $start_time = time();
                $this->session->set_userdata($start_key, $start_time);
                $remaining = $durasi_latihan * 60;
            }

            $end_lat = date('Y-m-d H:i:s', $start_time + ($durasi_latihan * 60));
            $this->db->where('id_ujian_cepat', $this->session->userdata('talent_test_id_ujian'));
            $this->db->update('tb_ujian_cepat', ['end_lat' => $end_lat]);

            $data['start_time'] = $start_time;
            $data['durasi_latihan'] = $durasi_latihan;

            $this->load->view('talent_test/ujian/cepat/latihan_cepat', $data);
        } else {
            redirect('talent-test/dashboard');
        }
    }

    public function submit_training($exam_type)
    {
        if ($exam_type == 'cfit') {
            $subtes = $this->session->userdata('training_subtes') ?? 1;
            $start_key = 'training_start_time_sub' . $subtes;
            $start_time = $this->session->userdata($start_key);
            $durasi_latihan = $this->session->userdata('durasi_latihan') ?? 2;
            $elapsed = time() - $start_time;
            $remaining = max(0, ($durasi_latihan * 60) - $elapsed);
            $this->db->where('subtes', 1);
            $this->db->where('type_soal', 'Ujian');
            $total_subtes1 = $this->db->count_all_results('tb_soal_cfit');
            $this->db->where('subtes', 2);
            $this->db->where('type_soal', 'Ujian');
            $total_subtes2 = $this->db->count_all_results('tb_soal_cfit');
            $this->db->where('subtes', 3);
            $this->db->where('type_soal', 'Ujian');
            $total_subtes3 = $this->db->count_all_results('tb_soal_cfit');
            if ($subtes == 4) {
                $jawab1 = $this->input->post('jawaban_latihan1');
                $jawab2 = $this->input->post('jawaban_latihan2');
            } elseif ($subtes == 3) {
                $jawab_array = $this->input->post('jawaban_latihan');
                $jawab1 = is_array($jawab_array) ? implode(',' , $jawab_array) : $this->input->post('jawaban_latihan');
                $jawab2 = $this->input->post('jawaban_latihan2') ?? '';
            } elseif ($subtes == 2) {
                $jawab_array = $this->input->post('jawaban_latihan');
                $jawab1 = is_array($jawab_array) ? implode(',' , $jawab_array) : $this->input->post('jawaban_latihan');
                $jawab2 = $this->input->post('jawaban_latihan2') ?? '';
            } else {
                $jawab1 = $this->input->post('jawaban_latihan');
                $jawab2 = $this->input->post('jawaban_latihan2');
            }
            $this->session->set_userdata('ses_jawab1', $jawab1);
            $this->session->set_userdata('ses_jawab2', $jawab2);
            if ($remaining <= 0) {
                $this->session->unset_userdata($start_key);
                if ($subtes == 1) {
                    $start_question = 1;
                } elseif ($subtes == 2) {
                    $start_question = $total_subtes1 + 1;
                } elseif ($subtes == 3) {
                    $start_question = $total_subtes1 + $total_subtes2 + 1;
                } elseif ($subtes == 4) {
                    $start_question = $total_subtes1 + $total_subtes2 + $total_subtes3 +1;
                }
                redirect('talent-test/exam/cfit/frame/' . $start_question);
            } else {
                $end_lat_key = 'end_lat' . $subtes;
                $data[$end_lat_key] = date('Y-m-d H:i:s', time() + $remaining);
                if ($subtes == 1) {
                    $this->load->view('talent_test/ujian/cfit/jawabancontoh_cfit', $data);
                } elseif ($subtes == 2) {
                    $this->load->view('talent_test/ujian/cfit/jawabancontoh_cfit_2', $data);
                } elseif ($subtes == 3) {
                    $this->load->view('talent_test/ujian/cfit/jawabancontoh_cfit_3', $data);
                } elseif ($subtes == 4) {
                    $this->load->view('talent_test/ujian/cfit/jawabancontoh_cfit_4', $data);
                } else {
                    redirect('talent-test/start-exam/cfit');
                }
            }
        } elseif ($exam_type == 'cepat_teliti') {
            $start_key = 'training_start_time_cepat';
            $start_time = $this->session->userdata($start_key);
            $durasi_latihan = $this->session->userdata('durasi_latihan_cepat') ?? 2;
            $elapsed = time() - $start_time;
            $remaining = max(0, ($durasi_latihan * 60) - $elapsed);
            if ($remaining <= 0) {
                redirect('talent-test/start-exam/cepat');
            } else {
                $end_lat_key = 'end_lat1';
                $data[$end_lat_key] = date('Y-m-d H:i:s', time() + $remaining);
                $this->load->view('talent_test/ujian/cepat/jawaban_latihan_cepat', $data);
            }
        }
    }

    public function logout(){
        $this->session->unset_userdata('talent_test_access_token');
        $this->session->unset_userdata('talent_test_current_exam');
        $this->session->unset_userdata('talent_test_package_id');
        $this->session->unset_userdata('talent_test_start_time');
        redirect('Home/#pelatihan-section');
    }
}
