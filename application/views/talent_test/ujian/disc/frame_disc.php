<?php $this->load->view('layout3/header'); ?>
<?php $this->load->view('layout3/navbar'); ?>
<?php $this->load->view('talent_test/layout'); ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Ujian DISC - Soal <?php echo $frame; ?> dari <?php echo $total_frames; ?></h4>
                    <div id="timer" class="float-right"></div>
                </div>
                <div class="card-body">
                    <p>Pilihlah 1 pernyataan yang PALING sesuai (M) dan 1 yang PALING tidak sesuai (L) dengan diri Anda saat ini.</p>
                    <form action="<?php echo $form_action; ?>" method="post">
                        <input type="hidden" name="no_soal" value="<?php echo $soal['no_soal']; ?>">
                        <input type="hidden" name="id_ujian" value="<?php echo $id_ujian; ?>">
                        
                        <h5>Pernyataan:</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jawaban_m" value="1" required>
                            <label class="form-check-label">M: <?php echo $soal['pernyataan1']; ?></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jawaban_m" value="2" required>
                            <label class="form-check-label">M: <?php echo $soal['pernyataan2']; ?></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jawaban_m" value="3" required>
                            <label class="form-check-label">M: <?php echo $soal['pernyataan3']; ?></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jawaban_m" value="4" required>
                            <label class="form-check-label">M: <?php echo $soal['pernyataan4']; ?></label>
                        </div>
                        
                        <h5>Pernyataan L:</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jawaban_l" value="1" required>
                            <label class="form-check-label">L: <?php echo $soal['pernyataan1']; ?></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jawaban_l" value="2" required>
                            <label class="form-check-label">L: <?php echo $soal['pernyataan2']; ?></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jawaban_l" value="3" required>
                            <label class="form-check-label">L: <?php echo $soal['pernyataan3']; ?></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jawaban_l" value="4" required>
                            <label class="form-check-label">L: <?php echo $soal['pernyataan4']; ?></label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-3">Jawab dan Lanjut</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Timer
    var endTime = <?php echo $end_time; ?> * 1000;
    var timer = setInterval(function() {
        var now = new Date().getTime();
        var distance = endTime - now;
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        document.getElementById("timer").innerHTML = minutes + "m " + seconds + "s ";
        if (distance < 0) {
            clearInterval(timer);
            alert("Waktu habis!");
            window.location.href = "<?php echo site_url('talent-test/dashboard'); ?>";
        }
    }, 1000);
</script>

<?php $this->load->view('layout3/footer'); ?>
