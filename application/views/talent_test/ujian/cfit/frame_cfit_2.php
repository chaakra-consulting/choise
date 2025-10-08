<?php $this->load->view('layout3/header') ?>
<?php $this->load->view('layout3/navbar') ?>
<div class="col-sm-12 box" style="background-color: white; padding-bottom: 20px; padding-top: 60px;">
	<div class="col-sm-6">
		<h4><b>Subtes <?php echo $soal_subtes1->subtes ?></b></h4>
		<h4>Subtes ini hanya dapat memilih 2 jawaban, jika terdapat kesalahan silahkan uncheck!</h4>
		<h3><b>Soal Nomor <?php echo $question['nomor_soal'] ?></b></h3>
		<hr color="black">
	</div>
	<div class="col-md-7 col-sm-12" style="margin-bottom: 5px;">
		<div class="col-sm-12">
			<form method="post" action="<?php echo site_url('talent-test/save-answer') ?>">
				<img src="<?php echo ($question['soal'] != '' ? base_url('./upload/bank_soal/cfit/' . $question['soal']) : 
                    base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: 500px; margin: 10px; border-radius: 5px;">
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="cfit2">a</label>
					<input class="form-check-input checkbox-limit" type="checkbox" name="answer[]" value="A">
					<center>
						<img src="<?php echo ($question['opsi_a'] != '' ? base_url('./upload/bank_soal/cfit/' . $question['opsi_a']) : 
                            base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: 100px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="cfit2">b</label>
					<input class="form-check-input checkbox-limit" type="checkbox" name="answer[]" value="B">
					<center>
						<img src="<?php echo ($question['opsi_b'] != '' ? base_url('./upload/bank_soal/cfit/' . $question['opsi_b']) : 
                            base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: 100px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="cfit2">c</label>
					<input class="form-check-input checkbox-limit" type="checkbox" name="answer[]" value="C">
					<center>
						<img src="<?php echo ($question['opsi_c'] != '' ? base_url('./upload/bank_soal/cfit/' . $question['opsi_c']) : 
                            base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: 100px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="cfit2">d</label>
					<input class="form-check-input checkbox-limit" type="checkbox" name="answer[]" value="D">
					<center>
						<img src="<?php echo ($question['opsi_d'] != '' ? base_url('./upload/bank_soal/cfit/' . $question['opsi_d']) : 
                            base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: 100px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="cfit2">e</label>
					<input class="form-check-input checkbox-limit" type="checkbox" name="answer[]" value="E">
					<center>
						<img src="<?php echo ($question['opsi_e'] != '' ? base_url('./upload/bank_soal/cfit/' . $question['opsi_e']) : 
                            base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: 100px; border-radius: 5px;">
					</center>
				</div>
		</div>
		<center>
			<input type="hidden" name="exam_type" value="cfit">
			<input type="hidden" name="question_id" value="<?php echo $soal_subtes1->nomor_soal ?>">
			<input type="hidden" name="question_number" value="<?php echo $question_number ?>">
			<input type="hidden" name="subtes" value="<?php echo $soal_subtes1->subtes ?>">
			<div class="baten">
				<?php if ($question_number != 1) { ?>
					<button type="submit" style="margin-top: 5%" class="btn btn-primary" name="redirect" value="1"> <i class="fa fa-arrow-circle-left"></i> Sebelumnya
					</button>
				<?php } ?>
				<?php if (!($question_number == ($total_subtes1 + $total_subtes2) && $soal_subtes1->subtes == 2)) { ?>
					<button type="submit" style="margin-top: 5%" class="btn btn-primary" name="redirect" value="2"> Selanjutnya <i class="fa fa-arrow-circle-right"></i>
					</button>
				<?php } ?>
				<?php if ($question_number == ($total_subtes1 + $total_subtes2) && $soal_subtes1->subtes == 2) { ?>
					<button type="submit" style="margin-top: 5%" class="btn btn-primary" onclick="return confirm('Apakah Anda yakin ingin menyelesaikan subtes 2?')" formaction="<?php echo base_url('talent-test/training/cfit/3') ?>"> Subtes 3 <i class="fa fa-arrow-circle-right"></i>
					</button>
				<?php } ?>
			</div>
		</center>
		</form>
	</div>
	<?php $this->load->view('talent_test/ujian/cfit/panel_cfit'); ?>
</div>
<?php $this->load->view('layout3/footer') ?>

<script>
$(document).ready(function() {
    $('.checkbox-limit').on('change', function() {
        if ($('.checkbox-limit:checked').length > 2) {
            $(this).prop('checked', false);
            alert('Hanya dapat memilih 2 jawaban!');
        }
    });
});
</script>
