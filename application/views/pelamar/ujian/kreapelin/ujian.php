<?php $this->load->view('layout3/header2') ?>

<?php $this->load->view('layout3/navbar') ?>



<div class="col-sm-12 main">



	<div class="row" style="margin-bottom: -50px;">

		<div class="col-lg-9">

			<h3>TES KREAPELIN</h3>

		</div>

		<div class="col-lg-3">

			<h4 style="margin-top: 35px" align="right">Waktu Ujian <span id="time"></span> detik</h4>

		</div>

	</div>
	<!--/.row-->

	<?php


	$dbsoal = 'tb_soal_kreapelin';
	$dbjawaban = 'tb_data_jawaban_kreapelin';
	$dbwaktu = 'tb_ujian_kreapelin';
	$id_ujian =  $this->session->userdata('ses_kreapelin');
	$id_pelamar =  $this->session->userdata('ses_id');

	$nomor = $this->session->userdata('ses_no_soal_kreapelin');
	// echo $nomor;

	$ujian = $this->db->query("SELECT * FROM $dbwaktu WHERE id_ujian = $id_ujian");
	foreach ($ujian->result() as $key) {
		$end_1 = $key->waktu_akhir;
	}

	?>

	<!-- <iframe id="frame" src="<?php echo base_url('Pelamar/Ujian/frame_ujian_kreapelin/' . $id_ujian . '/' . $nomor) ?>" width="100%" onload="this.style.height=this.contentDocument.body.scrollHeight +'px';" frameborder="0">Browser Anda Tidak Mendukung Iframe, Silahkan Perbaharui Browser Anda.</iframe> -->


	<div class="col-sm-6">
		<h3><b>Soal Nomor <?php echo $this->session->userdata('ses_no_soal_kreapelin') ?></b></h3>
		<!-- <p id="time"></p> -->
		<hr color="black">
	</div>
	<div class="col-md-7 col-sm-12" style="margin-bottom: 5px;">
	<form id="article_form" method="post">

<center>Judul:<br />

<input type="text" name="judul" id="txt_judul" /><br />

</center>

</form>
		<!-- <form method="post">
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
      <td><?='<b>'. ($i+1) . '</b>. ' . $dat[$i] . ' + ' . $datplus[$i] ." = <input type='text' name='jawaban".($i+1)."' style='width:40px'>" ?></td>
      <td><?='<b>'. ($i+11) . '</b>. ' . $dat[$i+11] . ' + ' . $datplus[$i+11] ." = <input type='text' name='jawaban".($i+11)."' style='width:40px'>"?></td>
      <td><?='<b>'. ($i+21) . '</b>. ' . $dat[$i+12] . ' + ' . $datplus[$i+12] ." = <input type='text' name='jawaban".($i+21)."' style='width:40px'>"?></td>
			<td><?='<b>'. ($i+31) . '</b>. ' . $dat[$i+13] . ' + ' . $datplus[$i+13] ." = <input type='text' name='jawaban".($i+31)."' style='width:40px'>"?></td>
			<td><?='<b>'. ($i+41) . '</b>. ' . $dat[$i+14] . ' + ' . $datplus[$i+14] ." = <input type='text' name='jawaban".($i+41)."' style='width:40px'>"?></td>
			<td><?='<b>'. ($i+51) . '</b>. ' . $dat[$i+15] . ' + ' . $datplus[$i+15] ." = <input type='text' name='jawaban".($i+51)."' style='width:40px'>"?></td>
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

		</form> -->
	</div>

</div>

</div>
<!--/.row-->



</div>
<!--/.main-->

<script type="text/javascript">

$(document).ready(function(){

autosave();

});

function eraseText() //function untuk auto clear form object input

{

document.getElementById("txt_judul").value = "";

}

function autosave()

{

var t = setTimeout("autosave()", 1000); // Jalankan fungsi autosave setiap 1 detik sekali

var judul = $("#txt_judul").val();

if (judul.length > 0)

{

$.ajax(

{

type: "POST",

url: "<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_kreapelin/') ?>", //autosave.php merupakan file php untuk save

data: "judul=" + judul,

cache: false,

success: function(pesan)

{

$("#waktu").empty().append(pesan);

eraseText();

}

});

}

}

</script>

<!-- <script type="text/javascript">
	var countDownDate = new Date("<?php echo $end_1 ?>").getTime();
	// var countDownDate = 10;



	// Update the count down every 1 second

	var x = setInterval(function() {



		// Get today's date and time

		var now = new Date().getTime();



		// Find the distance between now and the count down date

		var distance = countDownDate - now;



		// Time calculations for days, hours, minutes and seconds

		var days = Math.floor(distance / (1000 * 60 * 60 * 24));

		var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

		var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

		var seconds = Math.floor((distance % (1000 * 60)) / 1000);



		// Display the result in the element with id="demo"

		document.getElementById("time").innerHTML = days + " : " + hours + " : " + minutes + " : " + seconds + " ";



		// If the count down is finished, write some text

		if (distance < 0) {

			clearInterval(x);

			// document.getElementById("time").innerHTML = "EXPIRED";

			alert('Sesi 1 Selesai');

			window.location.href = '<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_kreapelin/') ?>';



			// document.getElementById('hentikan').click();

		}

	}, 1000);
</script> -->

<?php $this->load->view('layout3/footer') ?>