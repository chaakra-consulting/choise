<?php $this->load->view('layout3/header'); ?>
<?php $this->load->view('layout3/navbar'); ?>
<?php $this->load->view('talent_test/layout'); ?>

<div class="col-sm-12 main">
    <div class="row" style="margin-bottom: -50px;">
        <div class="col-lg-9">
            <h3>Jawaban Latihan Cepat Teliti</h3>
        </div>
        <div class="col-lg-3">
            <h4 style="margin-top: 35px" align="right">Waktu latihan <span id="time"></span> detik</h4>
        </div>
    </div>

    <?php
    $idUjian = $this->session->userdata('talent_test_id_ujian');
    $ujian = $this->db->query("SELECT * FROM tb_ujian_cepat WHERE id_ujian_cepat = $idUjian");
    foreach ($ujian->result() as $key) {
        $endlat = $key->end_lat;
    }
    $id_pelamar = $this->session->userdata('talent_test_user_id');
    ?>

    <div class="col-sm-12" style="background-color: #fff; padding: 30px; border-radius: 5px; margin-bottom: 20px;">
        <h4><b>Jawaban Soal Latihan</b></h4>
        <hr>
        <div class="col-sm-12">
            <p><b>1. <u>nv</u> nx xn vx xv</b></p>
            <p>Jawaban Anda: <?php echo isset($_POST['latcfit1']) ? $_POST['latcfit1'] : 'Tidak dijawab'; ?></p>
            <p><b>Jawaban Benar: nv</b></p>
            <p>Penjelasan: Kata yang digarisbawahi adalah "nv", sehingga jawaban yang benar adalah "nv".</p>
        </div>
        <div class="col-sm-12" style="margin-top: 20px;">
            <p><b>2. 2h h4 42 <u>4h</u> 24</b></p>
            <p>Jawaban Anda: <?php echo isset($_POST['latcfit2']) ? $_POST['latcfit2'] : 'Tidak dijawab'; ?></p>
            <p><b>Jawaban Benar: 4h</b></p>
            <p>Penjelasan: Kata yang digarisbawahi adalah "4h", sehingga jawaban yang benar adalah "4h".</p>
        </div>
        <div class="col-sm-12" style="margin-top: 20px;">
            <p><b>3. RB <u>RD</u> DR BR BD</b></p>
            <p>Jawaban Anda: <?php echo isset($_POST['latcfit3']) ? $_POST['latcfit3'] : 'Tidak dijawab'; ?></p>
            <p><b>Jawaban Benar: RD</b></p>
            <p>Penjelasan: Kata yang digarisbawahi adalah "RD", sehingga jawaban yang benar adalah "RD".</p>
        </div>
    </div>

    <div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin-top: 20px; margin-bottom: 20px">
        <a href="<?php echo site_url('talent-test/start-exam/cepat_teliti'); ?>" class="btn btn-primary mr-2 mb-2">Mulai Sekarang</a>
    </div>
</div>

<script type="text/javascript">
    var countDownDate = new Date("<?php echo $endlat ?>").getTime();
    var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate - now;

        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("time").innerHTML = minutes + " : " + seconds + " ";

        if (distance < 0) {
            clearInterval(x);
            alert('Waktu latihan sudah berakhir, selamat mengerjakan');
            window.location.href = '<?php echo base_url('talent-test/start-exam/cepat_teliti'); ?>';
        }
    }, 1000);
</script>

<?php $this->load->view('layout3/footer') ?>
