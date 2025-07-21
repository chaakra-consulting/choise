<?php $this->load->view('layout3/header') ?>

<?php $this->load->view('layout3/navbar') ?>

<style>
    .custom-radio {
        width: 16px; /* Ubah sesuai kebutuhan */
        height: 15px; /* Ubah sesuai kebutuhan */
    }
    <?php
               if ($army->nomor_soal == 9 || $army->nomor_soal == 2 || $army->nomor_soal == 7 || $army->nomor_soal == 8 || $army->nomor_soal == 10 || $army->nomor_soal == 11 || $army->nomor_soal == 12) {
                $imageWidth = 400;
                } elseif ($army->nomor_soal == 3) {
                $imageWidth = 100;
                }
                elseif ($army->nomor_soal == 4) {
                    $imageWidth = 100;
                }else {
                $imageWidth = 200;
                }
                ?>
    <?php
               if ($army->nomor_soal == 3) {
                $no = 200;
                } elseif ($army->nomor_soal == 4) {
                $no = 200;
                }
                elseif ($army->nomor_soal == 1 || $army->nomor_soal == 5 || $army->nomor_soal == 6) {
                $no = 300;
                }else {
                $no = 500;
                }
                ?>
  
</style>
<div class="col-sm-12 main">
	<div class="row" style="margin-bottom: -50px;">

		<div class="col-lg-9">

			<h3><b>Latihan</b></h3>

		</div>

		<div class="col-lg-3">

			<h4 style="margin-top: 35px" align="right">Waktu latihan <b><span id="time"></span> detik</h4></b>

		</div>

	</div>

	<?php $idUjian = $this->session->userdata('ses_army');

$ujian = $this->db->query("SELECT * FROM tb_ujian_army WHERE id_ujian_army = $idUjian");

	foreach ($ujian->result() as $key ) {

		$endlat = $key->end_lat;

	} 

$id_pelamar = $this->session->userdata('ses_id');?>

<div class="col-sm-12" style="background-color: #000000; padding: 30px; border-radius: 5px; margin-bottom: 20px;">
	<p style="color: #fff;"><b>Intruksi</b> : Coretlah angka ganjil yang berhuruf. Coret pula angka ganjil yang bernilai lebih dari 6.</p>

	<p style="color: #fff;"><b>Pilihlah jawaban yang menurut anda sesuai dengan intruksi diatas.</b></li>
	<br>

	<h4><li style="color: #fff;"><b>Jawaban :</b></h4>
	<br>
			<img src="<?php  echo base_url('upload/bank_soal/army/contoh_1.png') ?>" class="img-responsive" alt="" style="width: 400px; border-radius: 15px; margin-bottom: 5px">
            <br>
            <div class="form-check col-sm-12" style="margin-top: 5px;">
           
					<label class="form-check-label" for="army113" style="font-size:18px; color: #fff;">a.</label>		
                    <input class="form-check-input custom-radio" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "A") { ?> checked="checked" <?php } ?> name="jawaban" value="A" disabled>
                    <img src="<?php  echo base_url('upload/bank_soal/army/contoh_a.png') ?>"  alt="" style="width: 300px;">
            	
                </div>
                <div class="form-check col-sm-12" style="margin-top: 5px;">
           
					<label class="form-check-label" for="army113" style="font-size:18px; color: #fff;">b.</label>		
                    <input class="form-check-input custom-radio" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "B") { ?> checked="checked" <?php } ?> name="jawaban" value="B" checked>
                    <img src="<?php  echo base_url('upload/bank_soal/army/contoh_b.png') ?>"  alt="" style="width: 300px;">
        
                </div>
                <div class="form-check col-sm-12" style="margin-top: 5px;">
          
					<label class="form-check-label" for="army113" style="font-size:18px; color: #fff;">c.</label>		
                    <input class="form-check-input custom-radio" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "C") { ?> checked="checked" <?php } ?> name="jawaban" value="C" disabled> 
                    <img src="<?php  echo base_url('upload/bank_soal/army/contoh_c.png') ?>"  alt="" style="width: 300px;">
            	
                </div>
                <div class="form-check col-sm-12" style="margin-top: 5px;">
        
					<label class="form-check-label" for="army113" style="font-size:18px; color: #fff;">d.</label>		
                    <input class="form-check-input custom-radio" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "D") { ?> checked="checked" <?php } ?> name="jawaban" value="D" disabled>
                    <img src="<?php  echo base_url('upload/bank_soal/army/contoh_d.png') ?>"  alt="" style="width: 300px;">
         	
                </div>
                <div class="form-check col-sm-12" style="margin-top: 5px;">
    
					<label class="form-check-label" for="army113" style="font-size:18px; color: #fff;">e.</label>		
                    <input class="form-check-input custom-radio" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "E") { ?> checked="checked" <?php } ?> name="jawaban" value="E" disabled>
                    <img src="<?php  echo base_url('upload/bank_soal/army/contoh_e.png') ?>"  alt="" style="width: 300px;">
                </div>
            <p></p>
            <p></p>
            <p style="font-size:14px; color: #fff;"><b> B adalah jawaban yang benar karena paling sesuai dengan intruksi.<b></p>
            </div>

		

<div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin-top: 20px; margin-bottom: 20px">
<br>
<br>
<h4 style="color: red;">Tunggu Hingga Waktu Latihan Selesai.</h4>


</form>

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

    alert('Waktu latihan Army sudah berakhir, selamat mengerjakan');

    window.location.href = '<?php echo base_url('Pelamar/Ujian/start_ujian_army/'.$idUjian); ?>';



    // document.getElementById('hentikan').click();

  }

}, 1000);



</script>



<?php   $this->load->view('layout3/footer') ?>