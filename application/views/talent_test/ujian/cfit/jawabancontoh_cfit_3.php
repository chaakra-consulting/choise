<?php $this->load->view('layout3/header2'); ?>
<?php $this->load->view('layout3/navbar'); ?>

<div class="col-sm-12 main">
    <div class="row">
        <div class="col-lg-12">
            <h3>Jawaban Contoh Subtes 3</h3>
        </div>
    </div>
    <div class="col-sm-12" style="background-color: #fff; padding-top: 10px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; border-radius: 5px;">
        <div class="col-sm-12" style="background-color: #fff; padding-top: 10px; padding-bottom: 20px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px; border-radius: 5px;">
            <p>Jawaban yang benar: </p>
            <div class="col-sm-12">
                <div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
                    <label for="latcfit31" class="form-check-label">c</label>
                    <center>
                        <img src="<?php echo base_url('upload/bank_soal/cfit/contoh_33c.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
                    </center>
                </div>
                <div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
                    <label for="latcfit31" class="form-check-label">e</label>
                    <center>
                        <img src="<?php echo base_url('upload/bank_soal/cfit/contoh_33e.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
                    </center>
                </div>
            </div>
            <p style="margin-top: 11%">Jawaban anda: <?php echo str_replace(',', ' dan ', $this->session->userdata('ses_jawab1')) ?></p>
        </div>
        <?php 
        $id_pelamar = $this->session->userdata('talent_test_user_id'); 
        $id_ujian = $this->session->userdata('talent_test_id_ujian');
        $this->db->where('subtes', 1);
        $this->db->where('type_soal', 'Ujian');
        $total_subtes1 = $this->db->count_all_results('tb_soal_cfit');
        $this->db->where('subtes', 2);
        $this->db->where('type_soal', 'Ujian');
        $total_subtes2 = $this->db->count_all_results('tb_soal_cfit');
        $first_subtes3 = $total_subtes1 + $total_subtes2 + 1;
        ?>
        <div class="col-sm-12 button-lm-little justify-content-center text-center" style="margin-top: 20px; margin-bottom: 20px;">
            <a href="<?php echo base_url('talent-test/exam/cfit/frame/' . $first_subtes3) ?>" class="btn btn-primary mr-2 mb-2">Mulai Sekarang</a>
        </div>
    </div>
</div>
<?php $this->load->view('layout3/footer') ?>
