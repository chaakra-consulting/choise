<?php $this->load->view('layout3/header') ?>

<?php $this->load->view('layout3/navbar') ?>


<style>
    /* Mengatur ukuran teks untuk nomor soal dan soal */
    .question-number, .question-text {
        font-size: 20px; /* Sesuaikan ukuran sesuai kebutuhan */
		color: white;
		font-weight: bold;
    }

    /* Mengatur ukuran teks untuk opsi jawaban A, B, C, D, dan E */
    .answer-option {
        font-size: 16px; /* Sesuaikan ukuran sesuai kebutuhan */
		color: white;
		text-align: middle; 
	
    }
	.form-check.col-sm-2.text-center input[type="radio"] {
    transform: scale(1.5); /* Anda dapat mengganti nilai 1.5 dengan nilai lain sesuai dengan kebutuhan Anda */
	margin-top: -5px;
	}
	.form-check-input,
	.answer-option {
    display: inline-block; /* or 'inline' */
    vertical-align: middle; /* To align them vertically */
	
	}
	.form-check {
    display: flex;
	
    align-items: center; /* Aligns items vertically in the center */
	}		
	.form-check {
    display: grid;
    grid-template-columns: auto auto; /* Two columns: one for text and one for the button */
    align-items: center;
}
.underlined-text {
            text-decoration: underline;
            line-height: 1.5; /* Anda dapat mengatur nilai sesuai dengan kebutuhan untuk menggeser garis bawah */
        }
</style> 	
<div class="col-sm-12 main">
	<div class="row" style="margin-bottom: -50px;">

		<div class="col-lg-9">

			<h3><b>Latihan</b></h3>

		</div>

		<div class="col-lg-3">

			<h4 style="margin-top: 35px" align="right">Waktu latihan <span id="time"></span> detik</h4>

		</div>

	</div>

	<?php $idUjian = $this->session->userdata('ses_cepat');

$ujian = $this->db->query("SELECT * FROM tb_ujian_cepat WHERE id_ujian_cepat = $idUjian");

	foreach ($ujian->result() as $key ) {

		$endlat = $key->end_lat;

	} 

$id_pelamar = $this->session->userdata('ses_id');?>

<div class="col-sm-12" style="background-color: #000000; padding: 30px; border-radius: 5px; margin-bottom: 20px;">
	<h3><li style="color: #fff;"><b>Jawaban :</b></h3>
    <br>
	<div class="question-text" style="margin: 5px;">
    <p style="color: #fff;">1. <u>nv</u> nx xn vx xv</p>

    <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
        <label class="answer-option" for="latcfit1a">xn</label>
        <input class="form-check-input" type="radio" name="latcfit1" id="latcfit1a" value="b" disabled>
    </div>

    <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
        <label class="answer-option" for="latcfit1b">vx</label>
        <input class="form-check-input" type="radio" name="latcfit1" id="latcfit1b" value="b" disabled>
    </div>

    <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
        <label class="answer-option" for="latcfit1c">xv</label>
        <input class="form-check-input" type="radio" name="latcfit1" id="latcfit1c" value="b" disabled>
    </div>

    <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
        <label class="answer-option" for="latcfit1d">nv</label>
        <input class="form-check-input" type="radio" name="latcfit1" id="latcfit1d" value="b" checked>
    </div>

    <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
        <label class="answer-option" for="latcfit1e">nx</label>
        <input class="form-check-input" type="radio" name="latcfit1" id="latcfit1e" value="b" disabled> 
    </div>
    <p style="color: #fff; font-size:12px;"> Jawabannya adalah "nv" karena soal menunjukkan "nv" di garis bawahi</p>

	<br>
	<br>
    <div class="question-text" style="margin: 5px;">
	<p style="color: #fff;">2. 2h h4 42 <u>4h</u> 24</p>

    <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
        <label class="answer-option" for="latcfit31a">24</label>
        <input class="form-check-input" type="radio" name="latcfit31" id="latcfit31a" value="b" disabled>
    </div>

    <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
        <label class="answer-option" for="latcfit31b">h4</label>
        <input class="form-check-input" type="radio" name="latcfit31" id="latcfit31b" value="b" disabled>
    </div>

    <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
        <label class="answer-option" for="latcfit31c">42</label>
        <input class="form-check-input" type="radio" name="latcfit31" id="latcfit31c" value="b" disabled>
    </div>

    <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
        <label class="answer-option" for="latcfit31d">2h</label>
        <input class="form-check-input" type="radio" name="latcfit31" id="latcfit31d" value="b" disabled>
    </div>

    <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
        <label class="answer-option" for="latcfit31e">4h</label>
        <input class="form-check-input" type="radio" name="latcfit31" id="latcfit31e" value="b" checked>
    </div>
    <p style="color: #fff; font-size:12px;"> Jawabannya adalah "4h" karena soal menunjukkan "4h" di garis bawahi</p>
    <br>
	<br>
	<p style="color: #fff;">3. RB <u>RD</u> DR BR BD</p>

    <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
        <label class="answer-option" for="latcfit2a">BR</label>
        <input class="form-check-input" type="radio" name="latcfit3" id="latcfit3a" value="b" disabled>
    </div>

    <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
        <label class="answer-option" for="latcfit2b">DR</label>
        <input class="form-check-input" type="radio" name="latcfit3" id="latcfit3b" value="b" disabled>
    </div>

    <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
        <label class="answer-option" for="latcfit2c">BD</label>
        <input class="form-check-input" type="radio" name="latcfit3" id="latcfit3c" value="b" disabled>
    </div>

    <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
        <label class="answer-option" for="latcfit2d">RB</label>
        <input class="form-check-input" type="radio" name="latcfit3" id="latcfit3d" value="b" disabled>
    </div>

    <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
        <label class="answer-option" for="latcfit2e">RD</label>
        <input class="form-check-input" type="radio" name="latcfit3" id="latcfit3e" value="b" checked>
    </div>
    <p style="color: #fff; font-size:12px;"> Jawabannya adalah "RD" karena soal menunjukkan "RD" di garis bawahi</p>
</div>

		

<div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin-top: 20px; margin-bottom: 20px">
<a href="<?php echo base_url('Pelamar/Ujian/start_ujian_cepat/' . $idUjian); ?>" class="btn btn-primary mr-2 mb-2">Kerjakan Sekarang</a>



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

    alert('Waktu latihan sudah berakhir, selamat mengerjakan');

    window.location.href = '<?php echo base_url('Pelamar/Ujian/start_ujian_cepat/'.$idUjian); ?>';



    // document.getElementById('hentikan').click();

  }

}, 1000);



</script>



<?php   $this->load->view('layout3/footer') ?>