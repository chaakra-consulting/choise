<div class="col-md-5 col-sm-12">
    <?php 
    $id_ujian = $this->session->userdata('talent_test_id_ujian');
    $id_pendaftar = $this->session->userdata('talent_test_user_id');
    $current_frame = $frame;
    ?>
    <h4><b>Daftar Soal</b></h4>
        <?php for ($i = 1; $i <= $total_frames; $i++) { 
        $query_answered = $this->db->query("SELECT * FROM tb_data_jawaban_talent_test_disc WHERE id_pendaftar_pelatihan = $id_pendaftar
        AND no_soal = $i AND id_ujian = $id_ujian AND jawaban != '' AND jawaban2 != ''");

        $is_current = ($i == $current_frame);
        $is_answered = $query_answered->num_rows() > 0;

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
        <div class="col-sm-2 justify-content-center text-center" style="background-color: <?php echo $warna ?>; margin: 5px; 
            padding: 10px; border-radius: 5px">
            <a href="#" onclick="document.getElementById('target_question').value = '<?php echo $i ?>'; 
                document.getElementById('answer_form').submit();" style="color: <?php echo $warnaText ?>">
                <b><?php echo $i ?></b>
            </a>
        </div>
    <?php } ?>
</div>