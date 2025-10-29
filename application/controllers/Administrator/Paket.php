<?php 
defined('BASEPATH') or exit('No  direct script access allowed');

class Paket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mdl_paket_talent_test', 'm_paket');
        $this->load->model('Mdl_kepentingan', 'm_kepentingan');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Kelola Paket Talent Test';
        $data['paket_list'] = $this->m_paket->get_all_paket();
        $data['options'] = $this->m_kepentingan->get_all_options();
        $this->load->view('administrator/paket/list', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Paket Baru';
        $this->load->view('administrator/paket/form_add', $data);
    }

    public function simpan()
    {
        $this->form_validation->set_rules('nama_paket', 'Nama Paket', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        
        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = [
                'nama_paket'=> $this->input->post('nama_paket'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga'     => $this->input->post('harga'),
                'status'    => $this->input->post('status')
            ];
            $this->m_paket->insert_paket($data);
            $this->session->set_flashdata('success', 'Paket berhasil ditambahkan!');
            redirect('administrator/paket');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Paket';
        $data['paket'] = $this->m_paket->get_paket_by_id($id);
        if (!$data['paket']) show_404();
        $this->load->view('administrator/paket/form_edit', $data);
    }

    public function update($id = NULL)
    {
        $data = [
            'nama_paket'=> $this->input->post('nama_paket'),
            'deskripsi' => $this->input->post('deskripsi'),
            'harga'     => $this->input->post('harga'),
            'status'    => $this->input->post('status'),
        ];
        $this->m_paket->update_paket($id, $data);
        $this->session->set_flashdata('success', 'Paket berhasil diperbarui!');
        redirect('administrator/paket');
    }

    public function hapus($id = NULL)
    {
        $this->m_paket->delete_paket($id);
        $this->session->set_flashdata('success', 'Paket berhasil dihapus!');
        redirect('administrator/paket');
    }

    public function kepentingan($id_paket)
    {
        $data['title'] = 'Kelola Kepentingan Paket';
        $data['paket'] = $this->m_paket->get_paket_by_id($id_paket);
        $data['kepentingan_paket'] = $this->m_paket->get_kepentingan_by_paket($id_paket);
        $data['available_kepentingan'] = $this->m_paket->get_available_kepentingan_for_paket($id_paket);

        $this->load->view('administrator/paket/kepentingan', $data);
    }

    public function tambah_kepentingan()
    {
        $data = [
            'option_text' => $this->input->post('option_text'),
            'status' => $this->input->post('status') ? 'aktif' : 'tidak aktif'
        ];
        if ($this->m_kepentingan->insert_option($data)) {
            $this->session->set_flashdata('msg_success', 'Opsi kepentingan berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('msg_error', 'Gagal menambahkan opsi kepentingan');
        }

        redirect('administrator/paket');
    }

	public function tambah_kepentingan_paket($id_paket)
	{
        $id_kepentingan = $this->input->post('id_kepentingan');

        if ($this->m_paket->add_kepentingan_to_paket($id_paket, $id_kepentingan)) {
            $this->session->set_flashdata('success', 'Kepentingan berhasil ditambahkan ke paket');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan kepentingan ke paket');
        }
        redirect('administrator/paket/kepentingan/' . $id_paket);
	}

	public function edit_kepentingan()
	{
		$id = $this->input->post('id');
		$data = [
			'option_text'=> $this->input->post('option_text'),
			'status'=> $this->input->post('status') ? 'aktif' : 'tidak aktif'
		];
		if ($this->m_kepentingan->update_option($id, $data)) {
			$this->session->set_flashdata('msg_success', 'Opsi kepentingan berhasil diupdate');
		} else {
			$this->session->set_flashdata('msg_error', 'Gagal mengupdate opsi kepentingan');
		}
		redirect('administrator/paket');
	}

	public function hapus_kepentingan($id)
	{
        if ($this->m_kepentingan->delete_option($id)) {
            $this->session->set_flashdata('msg_success', 'Opsi kepentinga berhasil dihapus');
        } else {
            $this->session->set_flashdata('msg_error', 'Gagal menghapus opsi kepentingan');
        }
        redirect('administrator/paket');
	}

    public function hapus_kepentingan_paket($id_paket, $id_kepentingan)
    {
        if ($this->m_paket->remove_kepentingan_from_paket($id_paket, $id_kepentingan)) {
            $this->session->set_flashdata('success', 'Kepentingan berhasil dihapus dari paket');
        } else {
            $this->session->set_flashdata('error',  'Gagal menghapus kepentingan dari paket');
        }
        redirect('administrator/paket/kepentingan/' . $id_paket);
    }

    public function ujian($id_paket)
    {
        $data['title']      = 'Manajemen Ujian Paket';
        $data['paket']      = $this->m_paket->get_paket_by_id($id_paket);
        $data['ujian_list'] = $this->m_paket->get_ujian_by_paket($id_paket);

        $data['jenis_ujian_options'] = [
            'cfit'      => 'CFIT',
            'ist'       => 'IST',
            'holland'   => 'Holland',
            'disc'      => 'DISC',
            'essay'     => 'Essay',
            'hitung'    => 'Hitung',
            'studi'     => 'Studi Kasus',
            'leadership'=> 'Leadership',
            'cepat'     => 'Cepat Teliti',
            'talent_who_am_i' => 'Talent Test (Who Am I?)'
        ];

        $this->load->view('administrator/paket/ujian', $data);
    }

    public function tambah_ujian($id_paket)
    {
        $this->form_validation->set_rules('jenis_ujian', 'Jenis Ujian', 'required');
        $this->form_validation->set_rules('urutan', 'Urutan', 'required|numeric|greater_than[0]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('administrator/paket/ujian/' . $id_paket);
        }

        // $jenis_ujian_input = $this->input->post('jenis_ujian');
        // $duplicate_check = $this->m_paket->check_duplicate_ujian($id_paket, $jenis_ujian_input);

        // if ($duplicate_check) {
        //     $this->session->set_flashdata('error', 'Jenis ujian ini sudah ada dalam paket');
        //     redirect('administrator/paket/ujian/' . $id_paket);
        // }
        
        $data = [
            'id_paket'      => $id_paket,
            'jenis_ujian'   => $this->input->post('jenis_ujian'),
            'urutan'        => $this->input->post('urutan') ?: $this->m_paket->get_max_urutan($id_paket) + 1,
        ];

        if ($this->m_paket->add_ujian_to_paket($data)) {
            $this->session->set_flashdata('success', 'Ujian berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan ujian');
        }

        redirect('administrator/paket/ujian/' . $id_paket);
    }

    public function hapus_ujian($id_paket_ujian, $id_paket)
    {
        if ($this->m_paket->delete_ujian_from_paket($id_paket_ujian)) {
            $this->session->set_flashdata('success', 'Ujian berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus ujian');
        }

        redirect('administrator/paket/ujian/' . $id_paket);
    }

    public function edit_ujian($id_paket_ujian, $id_paket)
    {
        $data = [
            'jenis_ujian'=> $this->input->post('jenis_ujian'),
            'urutan'=> $this->input->post('urutan')
        ];

        if ($this->m_paket->update_ujian($id_paket_ujian, $data)) {
            $this->session->set_flashdata('success', 'Ujian berhasil diperbarui');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui ujian');
        }

        redirect('administrator/paket/ujian/' . $id_paket);
    }

    public function reorder_ujian($id_paket)
    {
        $urutan_data = $this->input->post('urutan');

        if (is_array($urutan_data)) {
            foreach ($urutan_data as $id_paket_ujian => $urutan) {
                $this->m_paket->update_urutan_ujian($id_paket_ujian, $urutan);
            }
            $this->session->set_flashdata('success', 'Urutan ujian berhasil diperbarui');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui urutan');
        }
        redirect('administrator/paket/ujian/' . $id_paket);
    }

    public function duplicate_ujian($id_paket_ujian, $id_paket)
    {
        if ($this->m_paket->duplicate_ujian($id_paket_ujian)) {
            $this->session->set_flashdata('success', 'Ujian berhasil diduplikat');
        } else {
            $this->session->set_flashdata('error', 'Gagal menduplikat ujian');
        }
        redirect('administrator/paket/ujian/' . $id_paket);
    }
}