<?php $this->load->view('layout3/header2'); ?>
<?php $this->load->view('layout3/navbar'); ?>
<?php $this->load->view('talent_test/layout'); ?>

<div class="col-sm-12 main">
    <div class="row">
        <div class="col-lg-12">
            <h3>Contoh Jawaban Subtes 4</h3>
        </div>
    </div>
    <div class="col-sm-12" style="background-color: #fff; padding-top: 10px; padding-bottom: 20px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px; border-radius: 5px;">
        <div class="col-sm-12" style="background-color: #fff; padding-top: 10px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; border-radius: 5px;">
            <div class="col-sm-12">
                <p>1. Jawaban: (jawaban anda <?php echo $this->session->userdata('ses_jawab1') ?>)</p>
                <div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
                    <label class="form-check-label" for="latcfit41">c</label>
                    <center>
                        <img src="<?php echo base_url('upload/bank_soal/cfit/2c4.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
                    </center>
                </div>
                <div style="padding-top: 3.9%">
                    <p>Jawaban yang benar</p>
                </div>
            </div>
            <div class="col-sm-12" style="margin-top: 10px;">
                <p>2. Jawaban: (jawaban anda <?php echo $this->session->userdata('ses_jawab2') ?>)</p>
                <div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
                    <label class="form-check-label" for="latcfit42">c</label>
                    <center>
                        <img src="<?php echo base_url('upload/bank_soal/cfit/3c4.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
                    </center>
                </div>
                <div style="padding-top: 3.9%">
                    <p>Jawaban yang benar</p>
                </div>
            </div>
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
        $this->db->where('subtes', 3);
        $this->db->where('type_soal', 'Ujian');
        $total_subtes3 = $this->db->count_all_results('tb_soal_cfit');
        $first_subtes4 = $total_subtes1 + $total_subtes2 + $total_subtes3 + 1;
        ?>
        <div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin-top: 20px;">
            <a href="<?php echo base_url('talent-test/exam/cfit/frame/' . $first_subtes4) ?>" class="btn btn-primary mr-2 mb-2">Mulai Sekarang</a>
        </div>
    </div>
</div>
<?php $this->load->view('layout3/footer') ?>
