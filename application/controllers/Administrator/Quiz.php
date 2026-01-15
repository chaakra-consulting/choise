<?php

defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Quiz extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('Mdl_holland_questions');
    }

    public function index()
    {
        $data['questions'] = $this->Mdl_holland_questions->get_all_questions();
        $this->load->view('administrator/quiz/holland_questions', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('question_text', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('type', 'Tipe', 'required|in_list[r,i,a,s,e,k]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('administrator/quiz/add_holland_question');
        } else {
            $data = [
                'question_text' => $this->input->post('question_text'),
                'type' => $this->input->post('type'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $this->Mdl_holland_questions->insert_question($data);
            redirect('admin-quiz');
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('question_text', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('type', 'Tipe', 'required|in_list[r,i,a,s,e,k]');

        if ($this->form_validation->run() == FALSE) {
            $data['question'] = $this->Mdl_holland_questions->get_question($id);
            $this->load->view('administrator/quiz/edit_holland_question', $data);
        } else {
            $data = [
                'question_text' => $this->input->post('question_text'),
                'type' => $this->input->post('type'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $this->Mdl_holland_questions->update_question($id, $data);
            redirect('admin-quiz');
        }
    }

    public function pendaftar_quiz()
    {
        $this->load->model('Mdl_ujian');
        $data['quiz_results'] = $this->Mdl_ujian->get_holland_results();
        $this->load->view('administrator/quiz/pendaftar_quiz', $data);
    }

    public function delete($id)
    {
        $this->Mdl_holland_questions->delete_question($id);
        redirect('admin-quiz');
    }


    /**
     * Export Quiz questions to a xlsx file
     *
     * @return void
     */
    function export_registered_user()
    {
        $this->load->model('Mdl_ujian');
        $quiz_results = $this->Mdl_ujian->get_holland_results();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $no = 1;
        $numrows = 2;
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Email');
        $sheet->setCellValue('D1', 'No. HP');
        $sheet->setCellValue('E1', 'Instagram');
        $sheet->setCellValue('F1', 'Kota/ Kabupaten');
        $sheet->setCellValue('G1', 'Tanggal');
        foreach ($quiz_results as $value) {
            $sheet->setCellValue('A' . $numrows, $no++);
            $sheet->setCellValue('B' . $numrows, $value->nama ?? '');
            $sheet->setCellValue('C' . $numrows, $value->email ?? '');
            $sheet->setCellValue('D' . $numrows, $value->no_hp ?? '');
            $sheet->setCellValue('E' . $numrows, $value->ig ?? '-');
            $sheet->setCellValue('F' . $numrows, $value->kota ?? '-');
            $sheet->setCellValue('G' . $numrows, $value->created_at ?? '-');
            $numrows++;
        }

        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->setTitle("Pendaftar Quiz");


        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Pendaftar Quiz.xlsx');
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        ob_end_clean();
        $writer->save('php://output');
        exit();
    }
}
