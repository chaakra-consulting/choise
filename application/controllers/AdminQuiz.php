<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminQuiz extends CI_Controller
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
        $this->load->view('administrator/holland_questions', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('question_text', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('type', 'Tipe', 'required|in_list[r,i,a,s,e,k]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('administrator/add_holland_question');
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
            $this->load->view('administrator/edit_holland_question', $data);
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

    public function delete($id)
    {
        $this->Mdl_holland_questions->delete_question($id);
        redirect('admin-quiz');
    }
}
