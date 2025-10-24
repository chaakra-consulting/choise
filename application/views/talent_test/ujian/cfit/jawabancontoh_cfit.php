<?php $this->load->view('layout3/header2') ?>
<?php $this->load->view('layout3/navbar') ?>
<?php $this->load->view('talent_test/layout') ?>

<div class="col-sm-12 main">
    <div class="row" style="margin-bottom: -50px;">
        <div class="col-lg-9">
            <h3>Contoh Jawaban Subtes 1</h3>
        </div>
        <div class="col-lg-3">
            <h4 style="margin-top: 35px" align="right">Waktu latihan <span id="time"></span></h4>
        </div>
    </div>

    <div class="col-sm-12" style="background-color: #fff; padding-top: 10px; padding-bottom: 20px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px; border-radius: 5px;">
        <div class="col-sm-12" style="background-color: #fff; padding-top: 10px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; border-radius: 5px;">
            <div class="col-sm-12">
                <p>1. Jawaban: (jawaban anda <?php echo $this->session->userdata('ses_jawab1') ?>)</p>
                <div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
                    <label class="form-check-label" for="latcfit11">e</label>
                    <center>
                        <img src="<?php echo base_url('assets3/images/soalcfit/subtes1/contoh/2e.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
                    </center>
                </div>
                <div style="padding-top: 3.9%">
                    <p>Jawaban yang benar</p>
                </div>
            </div>
            <div class="col-sm-12" style="margin-top: 10px;">
                <p>2. Jawaban: (jawaban anda <?php echo $this->session->userdata('ses_jawab2') ?>)</p>
                <div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
                    <label class="form-check-label" for="latcfit12">e</label>
                    <center>
                        <img src="<?php echo base_url('assets3/images/soalcfit/subtes1/contoh/3e.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
                    </center>
                </div>
                <div style="padding-top: 3.9%">
                    <p>Jawaban yang benar</p>
                </div>
            </div>
        </div>
        <div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin-top: 20px;">
            <a href="<?php echo base_url('talent-test/start-exam/cfit') ?>" class="btn btn-primary mr-2 mb-2">Mulai Sekarang</a>
        </div>
    </div>
</div>

<?php $this->load->view('layout3/footer') ?>

<script type="text/javascript">
    var countDownDate = new Date('<?php echo $end_lat1 ?>').getTime();

    var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate - now;
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        var displayMinutes = minutes < 10 ? "0" + minutes : minutes;
        var displaySeconds = seconds < 10 ? "0" + seconds : seconds;
        document.getElementById("time").innerHTML = displayMinutes + ":" + displaySeconds;

        if (distance < 0) {
            clearInterval(x);
            alert('Waktu habis, selamat mengerjakan subtes 1');
            window.location.href = '<?php echo base_url('talent-test/start-exam/cfit'); ?>';
        }
    }, 1000);
</script>