<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TalentTest extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Mdl_berkas');
        $this->load->helper('download');
    }

    public function admin_berkas()
    {
        if (!$this->session->userdata('masuk')) {
            redirect('login');
        }
        
        $this->db->where('kategori', 'talent_test_template');
        $berkas_list = $this->db->get('tb_berkas')->result_array();

        $data = [
            'title' => 'Kelola Berkas Talent Test',
            'berkas_list' => $berkas_list
        ];

        $this->load->view('administrator/talent_test/berkas', $data);
    }

    public function admin_upload_berkas()
    {
        if (!$this->session->userdata('masuk')) {
            redirect('login');
        }

        $nama_berkas = $this->input->post('nama_berkas');

        if (!$nama_berkas) {
            $this->session->set_flashdata('error', 'Nama berkas harus diisi.');
            redirect('administrator/talent-test/admin-berkas');
            return;
        }

        $config['upload_path'] = './upload/berkas/';
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = 5120;

        $this->load->library('upload', $config);

        if (isset($_FILES['berkas']) && $_FILES['berkas']['error'] == 0) {
            if ($this->upload->do_upload('berkas')) {
                $upload_data = $this->upload->data();
                $uploaded_file = $upload_data['file_name'];
                $extension = pathinfo($uploaded_file, PATHINFO_EXTENSION);
                $new_file_name = $nama_berkas . '.' . $extension;
                $old_path = './upload/berkas/' . $uploaded_file;
                $new_path = './upload/berkas/' . $new_file_name;

                if (rename($old_path, $new_path)) {
                    $data_berkas = [
                        'id_pelamar' => 0,
                        'berkas' => $new_file_name,
                        'kategori' => 'talent_test_template'
                    ];
                    $this->db->insert('tb_berkas', $data_berkas);
                    $this->session->set_flashdata('success', 'Berkas berhasil diupload.');
                } else {
                    unlink($old_path);
                    $this->session->set_flashdata('error', 'Upload berhasil tapi gagal rename file.');
                }
            } else {
                $this->session->set_flashdata('error', 'Upload gagal: ' . $this->upload->display_errors('', ''));
            }
        } else {
            $this->session->set_flashdata('error', 'Pilih file untuk diupload.');
        }
        redirect('administrator/talent-test/admin-berkas');
    }
    
    public function admin_edit_berkas($id_berkas)
    {
        if (!$this->session->userdata('masuk')) {
            redirect('login');
        }

        $this->db->where('id_berkas', $id_berkas);
        $this->db->where('kategori', 'talent_test_template');
        $berkas = $this->db->get('tb_berkas')->row();

        if (!$berkas) {
            $this->session->set_flashdata('error', 'Berkas tidak ditemukan.');
            redirect('administrator/talent-test/admin-berkas');
            return;
        }

        $nama_berkas = $this->input->post('nama_berkas');

        if (!$nama_berkas) {
            $this->session->set_flashdata('error', 'Nama berkas harus diisi.');
            redirect('administrator/talent-test/admin-berkas');
            return;
        }

        $update_data = [];

        if (isset($_FILES['berkas']) && $_FILES['berkas']['error'] == 0) {
            $config['upload_path'] = './upload/berkas/';
            $config['allowed_types'] = 'pdf|doc|docx';
            $config['max_size'] = 5120;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('berkas')) {
                $upload_data = $this->upload->data();
                $update_data['berkas'] = $upload_data['file_name'];

                if ($berkas->berkas && file_exists('./upload/berkas/' . $berkas->berkas)) {
                    unlink('./upload/berkas/' . $berkas->berkas);
                }
            } else {
                $this->session->set_flashdata('error', 'Upload file gagal: ' . $this->upload->display_errors('', ''));
                redirect('administrator/talent-test/admin-berkas');
                return;
            }
        } else {
            // No new file uploaded, check if name changed and rename file accordingly
            if ($berkas->berkas) {
                $old_file_name = $berkas->berkas;
                $old_path = './upload/berkas/' . $old_file_name;
                $extension = pathinfo($old_file_name, PATHINFO_EXTENSION);
                $new_file_name = $nama_berkas . '.' . $extension;
                $new_path = './upload/berkas/' . $new_file_name;

                if ($old_file_name !== $new_file_name) {
                    if (file_exists($old_path)) {
                        if (rename($old_path, $new_path)) {
                            $update_data['berkas'] = $new_file_name;
                        } else {
                            $this->session->set_flashdata('error', 'Gagal rename file.');
                            redirect('administrator/talent-test/admin-berkas');
                            return;
                        }
                    } else {
                        $this->session->set_flashdata('error', 'File lama tidak ditemukan di server.');
                        redirect('administrator/talent-test/admin-berkas');
                        return;
                    }
                }
            }
        }

        if (!empty($update_data)) {
            $this->db->where('id_berkas', $id_berkas);
            $this->db->update('tb_berkas', $update_data);
            $this->session->set_flashdata('success', 'Berkas berhasil diupdate.');
        } else {
            $this->session->set_flashdata('info', 'Tidak ada perubahan yang dilakukan.');
        }

        redirect('administrator/talent-test/admin-berkas');
    }

    public function admin_delete_berkas($id_berkas)
    {
        if (!$this->session->userdata('masuk')) {
            redirect('login');
        }

        $this->db->where('id_berkas', $id_berkas);
        $this->db->where('kategori', 'talent_test_template');
        $berkas = $this->db->get('tb_berkas')->row();

        if (!$berkas) {
            $this->session->set_flashdata('error', 'Berkas tidak ditemukan.');
            redirect('administrator/talent-test/admin-berkas');
            return;
        }

        if ($berkas->berkas && file_exists('./upload/berkas/' . $berkas->Berkas)) {
            unlink('./upload/berkas/' . $berkas->berkas);
        }

        $this->db->where('id_berkas', $id_berkas);
        $this->db->delete('tb_berkas');

        $this->session->set_flashdata('success', 'Berkas berhasil dihapus.');
        redirect('administrator/talent-test/admin-berkas');
    }

    public function admin_download_berkas($id_berkas)
    {
        if (!$this->session->userdata('masuk')) {
            redirect('administrator/login');
        }

        $this->db->where('id_berkas', $id_berkas);
        $this->db->where('kategori', 'talent_test_template');
        $berkas = $this->db->get('tb_berkas')->row();

        if (!$berkas) {
            $this->session->set_flashdata('error', 'Berkas tidak ditemukan.');
            redirect('administrator/talent-test/admin-berkas');
            return;
        }

        $file_path = './upload/berkas/' . $berkas->berkas;

        if (file_exists($file_path)) {
            force_download($file_path, NULL);
        } else {
            $this->session->set_flashdata('error', 'File tidak ditemukan di server.');
            redirect('administrator/talent-test/admin-berkas');
        }
    }

    public function admin_preview_berkas($id_berkas)
    {
        if (!$this->session->userdata('masuk')) {
            redirect('administrator/login');
        }

        $this->db->where('id_berkas', $id_berkas);
        $this->db->where('kategori', 'talent_test_template');
        $berkas = $this->db->get('tb_berkas')->row();

        if (!$berkas) {
            show_404();
            return;
        }

        $file_path = './upload/berkas/' . $berkas->berkas;

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
                return;
            }
            header('Content-Disposition: inline; filename="' . basename($file_path) . '"');
            readfile($file_path);
            exit;
        } else {
            show_404();
        }
    }

    public function get_berkas_detail($id_pendaftar)
    {
        if (!$this->session->userdata('masuk')) {
            redirect('login');
        }

        $this->db->where('id_pelamar', $id_pendaftar);
        $berkas_pendaftar = $this->db->get('tb_berkas')->result_array();
        
        $required_files = [
            'informed_consent' => ['name' => 'Informed Consent', 'icon' => 'fa-file-pdf-o'],
            'self_assessment' => ['name' => 'Self Assessment', 'icon' => 'fa-clipboard']
        ];
        
        $berkas_map = [];
        foreach ($berkas_pendaftar as $b) {
            $berkas_map[$b['berkas']] = $b;
        }
        
        $html = '<div class="row">';
        foreach ($required_files as $key => $file) {
            $html .= '<div class="col-md-6">';
            $html .= '<div class="berkas-item ' . (!isset($berkas_map[$key]) ? 'missing' : '') . '">';
            $html .= '<div class="berkas-icon"><i class="fa ' . $file['icon'] . '"></i></div>';
            $html .= '<div class="berkas-info">';
            $html .= '<strong>' . $file['name'] . '</strong><br>';
            $html .= '<small class="' . (!isset($berkas_map[$key]) ? 'text-danger' : 'text-success') . '">';
            $html .= (!isset($berkas_map[$key]) ? 'Belum diupload' : 'Sudah diupload');
            $html .= '</small>';
            $html .= '</div>';
            $html .= '<div class="berkas-actions">';
            if (isset($berkas_map[$key])) {
                $html .= '<a href="' . base_url('administrator/talent-test/admin-download-berkas/' . $id_pendaftar . '/' . $key) . '" class="btn btn-success btn-sm">';
                $html .= '<i class="fa fa-download"></i> Download</a>';
            }
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
        }
        $html .= '</div>';
        
        echo $html;
    }
    
}
