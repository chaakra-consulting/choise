<div class="col-md-5 col-sm-12">
    <?php
    $id_ujian = $this->session->userdata('talent_test_id_ujian');
    $id_pendaftar = $this->session->userdata('talent_test_user_id');
    $subtes = $soal_subtes1->subtes;
    $current_question_number = $question_number;
    ?>
    <h4><b>Daftar Soal</b></h4>
    <?php
    $query = $this->db->query("SELECT nomor_soal FROM tb_soal_cfit WHERE subtes = $subtes AND type_soal = 'Ujian' ORDER BY nomor_soal");
    $questions = $query->result();
    $local = 1;
    foreach ($questions as $q) {
        $nomor = $q->nomor_soal;
        $global_query = $this->db->query("SELECT COUNT(*) as count FROM tb_soal_cfit WHERE type_soal = 'Ujian' AND 
            (subtes < $subtes OR (subtes = $subtes AND nomor_soal <= $nomor))");
        $global = $global_query->row()->count;
        
        $query_answered = $this->db->query("SELECT * FROM tb_data_jawaban_talent_test_cfit WHERE id_pendaftar_pelatihan = $id_pendaftar AND 
            nomor_soal = $nomor AND subtes = $subtes AND id_ujian = $id_ujian AND ((subtes != 2 AND jawaban != '') OR (subtes = 2 AND jawaban != '' AND jawaban2 != ''))");
        $is_answered = $query_answered->num_rows() > 0;
        $is_current = ($global == $current_question_number);
        
        if ($is_current) {
            $warna = '#007bff';
            $warnaText = '#fff';
        } elseif ($is_answered) {
            $warna = '#8ad919';
            $warnaText = '#fff';
        } else {
            $warna = '#f1f1f1';
            $warnaText = 'black';
        }
        ?>
        <div class="col-sm-2 justify-content-center text-center" style="background-color: <?php echo $warna ?>; margin: 5px; padding: 10px; border-radius: 5px">
            <a href="#" onclick="document.getElementById('target_question').value = '<?php echo $global ?>'; document.getElementById('answer_form').submit();" style="color: <?php echo $warnaText ?>"><b><?php echo $local ?></b></a>
        </div>
        <?php
        $local++;
    }
    ?>
</div>
