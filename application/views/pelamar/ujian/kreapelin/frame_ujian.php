<?php $this->load->view('layout3/header');
$dbsoal = 'tb_soal_tpa';
?>
<div class="col-sm-12 box">
	<div class="col-sm-6">
		<h3><b>Soal Nomor <?php echo $this->session->userdata('ses_no_soal_kreapelin') ?></b></h3>
		<!-- <p id="time"></p> -->
		<hr color="black">
	</div>
	<div class="col-md-7 col-sm-12" style="margin-bottom: 5px;">
		<form method="post">
		<table class="table">
  <tbody>
		<?php
		$dat=[];
		$datplus=[];
foreach($array as $a){array_push($dat,$a->soal);
	array_push($datplus,$a->soal_plus);}
		for($i=0;$i<10;$i++){
			$no=1;
			?>
    <tr>
      <td><?='<b>'. ($i+1) . '</b>. ' . $dat[$i] . ' + ' . $datplus[$i] ." = <input type='text' name='jawaban[]' style='width:40px'>" ?></td>
      <td><?='<b>'. ($i+11) . '</b>. ' . $dat[$i+11] . ' + ' . $datplus[$i+11] ." = <input type='text' name='jawaban[]' style='width:40px'>"?></td>
      <td><?='<b>'. ($i+21) . '</b>. ' . $dat[$i+12] . ' + ' . $datplus[$i+12] ." = <input type='text' name='jawaban[]' style='width:40px'>"?></td>
			<td><?='<b>'. ($i+31) . '</b>. ' . $dat[$i+13] . ' + ' . $datplus[$i+13] ." = <input type='text' name='jawaban[]' style='width:40px'>"?></td>
			<td><?='<b>'. ($i+41) . '</b>. ' . $dat[$i+14] . ' + ' . $datplus[$i+14] ." = <input type='text' name='jawaban[]' style='width:40px'>"?></td>
			<td><?='<b>'. ($i+51) . '</b>. ' . $dat[$i+15] . ' + ' . $datplus[$i+15] ." = <input type='text' name='jawaban[]' style='width:40px'>"?></td>
    </tr>
		<?php }
		?>
  </tbody>
</table>
			<center>
				<input type="hidden" name="id_pelamar" value="<?php echo $this->session->userdata('ses_id') ?>">
				<input type="hidden" name="id_lowongan" value="<?php echo $this->session->userdata('sesIdLowongan') ?>">
				<input type="hidden" name="nomor_soal" value="<?php echo $this->session->userdata('ses_no_soal_kreapelin') ?>">
			</center>

		</form>
	</div>

</div>

<?php

$this->load->view('layout3/footer') ?>