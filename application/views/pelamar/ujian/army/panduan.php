<?php $this->load->view('layout3/header2') ?>
<?php $this->load->view('layout3/navbar') ?>

<?php $idUjian = $this->session->userdata('ses_army') ?>
<div class="col-sm-12 main">
  <div class="row">
    <div class="col-lg-7">
      <h4><b>INTRUKSI TES ARMY ALPHA</b></h4>
    
    </div>
		<div class="col-lg-5">
			<h4 style="margin-top: 35px" align="right">Waktu panduan dan latihan <b><span id="time"></span> detik</h4></b>
		</div>
	</div>
  <?php $idUjian = $this->session->userdata('ses_army');

$ujian = $this->db->query("SELECT * FROM tb_ujian_army WHERE id_ujian_army = $idUjian");

	foreach ($ujian->result() as $key ) {

		$endlat = $key->end_lat;

	} 

$id_pelamar = $this->session->userdata('ses_id');?>
  <!--/.row-->
  <div class="col-sm-12" style="background-color: #000000; padding: 30px; border-radius: 5px; margin-bottom: 20px;">
    <h4 style="color: #fff;"><b>TES ARMY ALPHA :</b></h4><br>
    <p style="color: #fff;">Tes Army alpha merupakan tes untuk menilai tingkat konsentrasi, ketelitian dan kecerdasan. Tes ini terdiri dari 12 soal. Pada tes anda akan di berikan waktu yang cukup singkat dalam menjawab ke 12 soal sehingga konsentrasi dan daya tangkap tinggi dibutuhkan dalam tes ini.</p>
<br>
</div>
<!--/.main-->
<div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin-top: 20px; margin-bottom: 20px">
  <a href="<?php echo base_url('Pelamar/Ujian/latihan_army/') ?>" class="btn btn-primary mr-2 mb-2">Latihan Soal</a>
</div>
<script type="text/javascript">

  var countDownDate = new Date("<?php echo $endlat ?>").getTime();



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

  document.getElementById("time").innerHTML = minutes + " : " + seconds + " ";



  // If the count down is finished, write some text

  if (distance < 0) {

    clearInterval(x);

    // document.getElementById("time").innerHTML = "EXPIRED";

    alert('Waktu panduan dan latihan sudah berakhir, selamat mengerjakan');

    window.location.href = '<?php echo base_url('Pelamar/Ujian/start_ujian_army/'.$idUjian); ?>';



    // document.getElementById('hentikan').click();

  }

}, 1000);



</script>



<?php   $this->load->view('layout3/footer') ?>