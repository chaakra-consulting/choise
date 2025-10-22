<?php $this->load->view('layout3/header'); ?>
<?php $this->load->view('layout3/navbar'); ?>
<?php $this->load->view('talent_test/layout'); ?>

<div class="col-sm-12 main">
    <div class="row" style="margin-bottom: -50px;">
        <div class="col-lg-9">
            <h3>Tes Tipe Kepribadian DISC</h3>
        </div>
        <div class="col-lg-3">
            <h4 style="margin-top: 35px" align="right">Waktu Ujian <span id="timer"></span></h4>
        </div>
    </div>
    <div class="col-sm-6">
        <h3><b>Soal Nomor <?php echo $frame; ?></b></h3>
        <hr color="black">
    </div>
    <form method="post" id="answer_form" action="<?php echo site_url('talent-test/save-answer'); ?>">
        <div class="col-md-7 col-sm-12" style="margin-bottom: 5px;">
            <div style="background-color: #f9243f; padding-top: 10px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; border-radius: 5px;">
                <h4 style="color: #fff;"><b>INSTRUKSI TES!</b></h4>
                <div style="background-color: #fff; padding-top: 5px; padding-bottom: 5px; padding-left: 20px; padding-right: 20px; border-radius: 5px;">
                    <li><strong>Pilihlah 1 pernyataan yang <u><i>PALING SESUAI</i></u> dengan diri Anda SAAT INI ( M )</strong></li>
                    <li><strong>Pilihlah 1 pernyataan yang <u><i>PALING TIDAK SESUAI</i></u> dengan Anda SAAT INI ( L )</strong></li>
                    <li><strong>Dalam 1 nomor akan ada 2 jawaban (1 jawaban pernyataan M & 1 Jawaban pernyataan L)</strong></li>
                    <li><strong>Dalam satu nomor soal, tidak boleh ada jawaban yang sama untuk masing-masing kolom M dan L</strong></li>
                </div></br>
            </div><br>

            <label style="color:red">*Pastikan Tidak Ada 2 Jawaban pada kolom ( M / L ) yang sama , 2 Jawaban diwajibkan pada kolom ( M / L ) yang berbeda</label>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align: center;">M</th>
                        <th style="text-align: center;">L</th>
                        <th>Pernyataan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: center;">
                            <input class="form-check-input" type="radio" <?php if (isset($user_answer) && $user_answer->jawaban == $soal['aspek_m1']) echo "checked"; ?> name="jawaban_m" value="<?php echo $soal['aspek_m1']; ?>">
                        </td>
                        <td style="text-align: center;">
                            <input class="form-check-input" type="radio" <?php if (isset($user_answer) && $user_answer->jawaban2 == $soal['aspek_l1']) echo "checked"; ?> name="jawaban_l" value="<?php echo $soal['aspek_l1']; ?>">
                        </td>
                        <td><?php echo $soal['pernyataan1']; ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">
                            <input class="form-check-input" type="radio" <?php if (isset($user_answer) && $user_answer->jawaban == $soal['aspek_m2']) echo "checked"; ?> name="jawaban_m" value="<?php echo $soal['aspek_m2']; ?>">
                        </td>
                        <td style="text-align: center;">
                            <input class="form-check-input" type="radio" <?php if (isset($user_answer) && $user_answer->jawaban2 == $soal['aspek_l2']) echo "checked"; ?> name="jawaban_l" value="<?php echo $soal['aspek_l2']; ?>">
                        </td>
                        <td><?php echo $soal['pernyataan2']; ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">
                            <input class="form-check-input" type="radio" <?php if (isset($user_answer) && $user_answer->jawaban == $soal['aspek_m3']) echo "checked"; ?> name="jawaban_m" value="<?php echo $soal['aspek_m3']; ?>">
                        </td>
                        <td style="text-align: center;">
                            <input class="form-check-input" type="radio" <?php if (isset($user_answer) && $user_answer->jawaban2 == $soal['aspek_l3']) echo "checked"; ?> name="jawaban_l" value="<?php echo $soal['aspek_l3']; ?>">
                        </td>
                        <td><?php echo $soal['pernyataan3']; ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">
                            <input class="form-check-input" type="radio" <?php if (isset($user_answer) && $user_answer->jawaban == $soal['aspek_m4']) echo "checked"; ?> name="jawaban_m" value="<?php echo $soal['aspek_m4']; ?>">
                        </td>
                        <td style="text-align: center;">
                            <input class="form-check-input" type="radio" <?php if (isset($user_answer) && $user_answer->jawaban2 == $soal['aspek_l4']) echo "checked"; ?> name="jawaban_l" value="<?php echo $soal['aspek_l4']; ?>">
                        </td>
                        <td><?php echo $soal['pernyataan4']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <?php $this->load->view('talent_test/ujian/disc/panel_disc'); ?>

        <center>
            <input type="hidden" name="exam_type" value="disc">
            <input type="hidden" name="no_soal" value="<?php echo $soal['no_soal']; ?>">
            <input type="hidden" name="question_number" value="<?php echo $frame; ?>">
            <input type="hidden" name="target_question" id="target_question" value="">
            <div class="baten">
                <?php if ($frame != 1) { ?>
                    <button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo site_url('talent-test/save-answer'); ?>" name="redirect" value="1"> <i class="fa fa-arrow-circle-left"></i> Sebelumnya</button>
                <?php } ?>

                <?php if ($frame != $total_frames) { ?>
                    <button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo site_url('talent-test/save-answer'); ?>" name="redirect" value="2"> Selanjutnya <i class="fa fa-arrow-circle-right"></i></button>
                <?php } ?>

                <?php if ($frame == $total_frames) { ?>
                    <button type="submit" style="margin-top: 5%" class="btn btn-danger" formaction="<?php echo site_url('talent-test/save-answer'); ?>" name="redirect" value="3" onclick="return confirm('Apakah anda yakin ingin mengakhiri ujian?');"> Selesai <i class="fa fa-arrow-circle-right"></i></button>
                <?php } ?>
            </div>
        </center>
    </form>
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
            alert('Waktu Ujian DISC Telah Berakhir');
            document.querySelector('form').submit();
            window.location.href = '<?php echo site_url('talent-test/exam-list'); ?>';
        }
    }, 1000);
</script>

<?php $this->load->view('layout3/footer'); ?>