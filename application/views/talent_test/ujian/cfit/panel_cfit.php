<div class="col-md-5 col-sm-12">
    <?php
    $id_ujian = $this->session->userdata('talent_test_id_ujian');
    $id_pendaftar = $this->session->userdata('talent_test_user_id');
    $subtes = $soal_subtes1->subtes;
    ?>
    <h4><b>Daftar Soal</b></h4>
    <?php
    $query = $this->db->query("SELECT nomor_soal FROM tb_soal_cfit WHERE subtes = $subtes AND type_soal = 'Ujian' ORDER BY nomor_soal");
    $questions = $query->result();
    foreach ($questions as $q) {
        $nomor = $q->nomor_soal;
        $global_query = $this->db->query("SELECT COUNT(*) as count FROM tb_soal_cfit WHERE type_soal = 'Ujian' AND (subtes < $subtes OR (subtes = $subtes AND nomor_soal <= $nomor))");
        $global = $global_query->row()->count;
        
        $query_answered = $this->db->query("SELECT * FROM tb_data_jawaban_talent_test_cfit WHERE id_pendaftar_pelatihan = $id_pendaftar AND nomor_soal = $nomor AND subtes = $subtes AND id_ujian = $id_ujian");
        $warna = $query_answered->num_rows() > 0 ? '#8ad919' : '#f1f1f1';
        $warnaText = $query_answered->num_rows() > 0 ? '#fff' : 'black';
        ?>
        <div class="col-sm-2 justify-content-center text-center" style="background-color: <?php echo $warna ?>; margin: 5px; padding: 10px; border-radius: 5px">
            <a href="<?php echo site_url('talent-test/exam/cfit/frame/' . $global) ?>" style="color: <?php echo $warnaText ?>"><b><?php echo $global ?></b></a>
        </div>
        <?php
    }
    ?>
</div>