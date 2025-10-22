 <?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mdl_holland_questions extends CI_Model
{
    public function get_all_questions()
    {
        $this->db->order_by('id', 'ASC');
        return $this->db->get('tb_holland_quiz_questions')->result();
    }

    public function get_question($id)
    {
        return $this->db->get_where('tb_holland_quiz_questions', ['id' => $id])->row();
    }

    public function insert_question($data)
    {
        return $this->db->insert('tb_holland_quiz_questions', $data);
    }

    public function update_question($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('tb_holland_quiz_questions', $data);
    }

    public function delete_question($id)
    {
        return $this->db->delete('tb_holland_quiz_questions', ['id' => $id]);
    }
}
?>