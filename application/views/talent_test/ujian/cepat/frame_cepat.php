<?php $this->load->view('layout3/header'); ?>
<?php $this->load->view('layout3/navbar'); ?>
<?php $this->load->view('talent_test/layout'); ?>

<style>
    .question-number, .question-text {
        font-size: 20px;
        color: #000000;
        font-weight: bold;
    }
    .answer-option {
        font-size: 16px;
        color: #000000;
        text-align: middle; 
    }
    .form-check.col-sm-2.text-center input[type="radio"] {
        transform: scale(1.5);
        margin-top: -5px;
    }
    .form-check-input,
    .answer-option {
        display: inline-block;
        vertical-align: middle;
    }
    .form-check {
        display: flex;
        align-items: center;
    }        
    .form-check {
        display: grid;
        grid-template-columns: auto auto;
        align-items: center;
    }
    .underlined-text {
        text-decoration: underline;
        line-height: 1.5;
    }
</style>

<div class="col-sm-12 box" style="background-color: white; padding-bottom: 20px; padding-top: 60px;">
    <div class="row" style="margin-bottom: -50px;">
        <div class="col-lg-9">
            <h3><b class="question-number">Soal Nomor <?php echo $frame; ?></b></h3>
        </div>
        <div class="col-lg-3">
            <h4 style="margin-top: 35px" align="right">Waktu Ujian <span id="timer">00:00</span></h4>
        </div>
    </div>
    <hr color="black">
    <div class="col-md-7 col-sm-12" style="margin-bottom: 10px;">
        <form action="<?php echo $form_action; ?>" method="post">
            <input type="hidden" name="exam_type" value="<?php echo $exam_type; ?>">
            <input type="hidden" name="no_soal" value="<?php echo $nomor_soal; ?>">
            <input type="hidden" name="redirect" id="redirect_input" value="">
            <input type="hidden" name="target_question" value="">
            <div style="width: 600px; margin: 10px; border-radius: 5px;">
                <p class="question-text"><?php echo $soal['soal']; ?></p>
            </div>
            <br>
            <div class="form-check col-sm-2 text-center" style="margin-top:6px;">
                <p class="answer-option"><?php echo $soal['opsi_a']; ?></p>
                <input class="form-check-input" type="radio" name="jawaban" value="A" <?php if (!empty($user_answer) && $user_answer->jawaban == "A") { ?> checked="checked" <?php } ?>>
                <label class="form-check-label" for="cepat_a"></label>
            </div>
            <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
                <p class="answer-option"><?php echo $soal['opsi_b']; ?></p>
                <input class="form-check-input" type="radio" <?php if (!empty($user_answer) && $user_answer->jawaban == "B") { ?> checked="checked" <?php } ?> name="jawaban" value="B">
                <label class="form-check-label" for="cepat_b"></label>
            </div>
            <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
                <p class="answer-option"><?php echo $soal['opsi_c']; ?></p>
                <input class="form-check-input" type="radio" <?php if (!empty($user_answer) && $user_answer->jawaban == "C") { ?> checked="checked" <?php } ?> name="jawaban" value="C">
                <label class="form-check-label" for="cepat_c"></label>
            </div>
            <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
                <p class="answer-option"><?php echo $soal['opsi_d']; ?></p>
                <input class="form-check-input" type="radio" <?php if (!empty($user_answer) && $user_answer->jawaban == "D") { ?> checked="checked" <?php } ?> name="jawaban" value="D">
                <label class="form-check-label" for="cepat_d"></label>
            </div>
            <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
                <p class="answer-option"><?php echo $soal['opsi_e']; ?></p>
                <input class="form-check-input" type="radio" <?php if (!empty($user_answer) && $user_answer->jawaban == "E") { ?> checked="checked" <?php } ?> name="jawaban" value="E">
                <label class="form-check-label" for="cepat_e"></label>
            </div>
            <center>
                <div class="baten">
                    <?php if ($frame != 1) { ?>
                        <button type="submit" style="margin-top: 5%" class="btn btn-primary" name="redirect" value="1"> <i class="fa fa-arrow-circle-left"></i> Sebelumnya</button>
                    <?php } ?>
                    <?php if ($current_index < $total_frames - 1) { ?>
                        <button type="submit" style="margin-top: 5%" class="btn btn-primary" name="redirect" value="2"> Selanjutnya <i class="fa fa-arrow-circle-right"></i></button>
                    <?php } ?>
                    <?php if ($current_index == $total_frames - 1) { ?>
                        <button type="submit" style="margin-top: 5%" class="btn btn-danger" name="redirect" value="3" onclick="return confirm('Apakah anda yakin ingin mengakhiri ujian?');"> Selesai </button>
                    <?php } ?>
                </div>
            </center>
        </form>
    </div>
    <?php $this->load->view('talent_test/ujian/cepat/panel_cepat'); ?>
</div>

<script>
    var countDownDate = new Date("<?php echo date('Y-m-d H:i:s', $end_time); ?>").getTime();
    var x = setInterval(function(){
        var now = new Date().getTime();
        var distance = countDownDate - now;
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        document.getElementById("timer").innerHTML = minutes + " : " + seconds;
        if (distance < 0) {
            clearInterval(x);
            alert('Waktu Ujian Cepat Teliti Telah Berakhir');
            document.getElementById('redirect_input').value = '3';
            document.querySelector('form').submit();
        }
    }, 1000);
</script>


<?php $this->load->view('layout3/footer'); ?>