<?php $this->load->view('layout3/header2') ?>
<?php $this->load->view('layout3/navbar') ?>
<?php $this->load->view('talent_test/layout') ?>

<div class="col-sm-12 main">
    <div class="row" style="margin-bottom: -50px;">
        <div class="col-lg-9">
            <h3>Contoh Jawaban Latihan Subtes 3</h3>
        </div>
        <div class="col-lg-3">
            <h4 style="margin-top: 35px" align="right">Sisa Waktu <span id="time">00:00</span></h4>
        </div>
    </div>

    <div class="col-sm-12" style="background-color: #fff; padding-top: 10px; padding-bottom: 20px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px; border-radius: 5px;">
        <div class="col-sm-12" style="background-color: #fff; padding-top: 10px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; border-radius: 5px;">
            <p>Jawaban yang benar: c dan e</p>
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
            <p style="margin-top: 11%">Jawaban Anda: <?php echo str_replace(',', ' dan ', $this->session->userdata('ses_jawab1')) ?></p>
            <p>Penjelasan: Kotak c dan e memiliki pola gambar yang berbeda dari yang lain (sesuai aturan subtes 3).</p>
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
            <a href="<?php echo base_url('talent-test/exam/cfit/frame/' . $first_subtes3) ?>" class="btn btn-primary mr-2 mb-2">Mulai Subtes 3</a>
        </div>
    </div>
</div>

<script type="text/javascript">
    var endLat3 = '<?php echo isset($end_lat3) ? $end_lat3 : date('Y-m-d H:i:s', time() + 30); ?>';
    var countDownDate = new Date(endLat3).getTime();

    function updateTimer() {
        var now = new Date().getTime();
        var distance = countDownDate - now;

        if (isNaN(distance) || distance < 0) {
            clearInterval(x);
            document.getElementById("time").innerHTML = "00:00";
            window.location.href = '<?php echo base_url('talent-test/exam/cfit/frame/' . $first_subtes3); ?>';
        } else {
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            var displayMinutes = minutes < 10 ? "0" + minutes : minutes;
            var displaySeconds = seconds < 10 ? "0" + seconds : seconds;
            document.getElementById("time").innerHTML = displayMinutes + ":" + displaySeconds;
        }
    }

    updateTimer();
    var x = setInterval(updateTimer, 1000);
</script>

<?php $this->load->view('layout3/footer') ?>
