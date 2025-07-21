<?php $this->load->view('layout3/header2') ?>

<?php $this->load->view('layout3/navbar') ?>



<?php $idUjian = $this->session->userdata('ses_cepat') ?>

<div class="col-sm-12 main">

  <div class="row">

    <div class="col-lg-7">

      <h4><b>INTRUKSI TES CEPAT TELITI</b></h4>

    

    </div>

		<div class="col-lg-5">

			<h4 style="margin-top: 35px" align="right">Waktu intruksi dan latihan <span id="time"></span> detik</h4>

		</div>

	</div>

  <?php $idUjian = $this->session->userdata('ses_cepat');



$ujian = $this->db->query("SELECT * FROM tb_ujian_cepat WHERE id_ujian_cepat = $idUjian");



	foreach ($ujian->result() as $key ) {



		$endlat = $key->end_lat;



	} 



$id_pelamar = $this->session->userdata('ses_id');?>

  <!--/.row-->

  <div class="col-sm-12" style="background-color: #000000; padding: 30px; border-radius: 5px; margin-bottom: 20px;">

    <h4 style="color: #fff;"><b>PETUNJUK :</b></h4><br>

    <p style="color: #fff;">1. Dalam tes ini anda akan dihadapkan pada 100 soal yang akan dikerjakan dalam waktu yg terbatas.</p>

    <p style="color: #fff;">2. Tes ini bertujuan untuk membandingkan pasangan huruf dan angka yang ada di setiap soalnya.</p>

    <p style="color: #fff;">3. Di setiap soal terdapat 5 pasang kombinasi huruf dan angka dalam susunan yg berbeda-beda.</p>

    <p style="color: #fff;">4. Tugas anda adalah mencari "SATU KESAMAAN" kombinasi huruf dan angka yang "<u>DIGARISBAWAHI</u>" di soal dengan pilihan jawaban yang sudah disediakan.</p>

    <p style="color: #fff;">5. Berikut adalah contoh soal dan jawaban yang perlu anda perhatikan dibawah ini:</p>

<br>

    <div style="display: flex; justify-content: center; align-items: center;">

  <table border="1" cellpadding="8">

    <tr>

      <td colspan="6" style="color: #00000; font-weight: bold; text-align: center; background-color:white; border: 1px solid black;">SOAL</td>

    </tr>

    <tr style="color: #00000;">

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">V.</td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;"><u>AB</u></td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">AC</td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">AD</td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">AE</td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">AF</td>

    </tr>

    <tr style="color: #00000;">

      <td style="text-align: center; background-color:white; border: 1px solid black;">W.</td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">aA</td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">aB</td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">BA</td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">Ba</td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;"><u>Bb</u></td>

    </tr>

    <tr style="color: #00000;">

      <td style="text-align: center; background-color:white; border: 1px solid black;">X.</td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">A7</td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">7A</td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;"><u>B7</u></td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">7B</td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">AB</td>

    </tr>

    <tr style="color: #00000;">

      <td style="text-align: center; background-color:white; border: 1px solid black;">Y.</td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">Aa</td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">Ba</td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;"><u>bA</u></td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">BA</td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">bB</td>

    </tr>

    <tr style="color: #00000;">

      <td style="text-align: center; background-color:white; border: 1px solid black;">Z.</td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">3A</td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">3B</td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;"><u>33</u></td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">B3</td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">BB</td>

    </tr>

  </table>



  <table border="1" cellpadding="8" style="margin-left: 120px;">

    <tr>

      <td colspan="6" style="color: #00000; font-weight: bold; text-align: center; background-color:white; border: 1px solid black;">JAWABAN</td>

    </tr>

    <tr style="color: #00000;">

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">V.</td>

      <td style="width: 60px; text-align: center; background-color:white; border: 1px solid black;">AC

      <input class="form-check-input" type="radio" disabled></td>

      <td style="width: 60px; text-align: center; background-color:white; border: 1px solid black;">AE

      <input class="form-check-input" type="radio" disabled></td>

      <td style="width: 60px; text-align: center; background-color:white; border: 1px solid black;">AF

      <input class="form-check-input" type="radio" disabled></td>

      <td style="width: 60px; text-align: center; background-color:white; border: 1px solid black;">AB

      <input class="form-check-input" type="radio" checked></td>

      <td style="width: 60px; text-align: center; background-color:white; border: 1px solid black;">AD

      <input class="form-check-input" type="radio" disabled></td>

    </tr>

    <tr style="color: #00000;">

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">W.</td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">BA

      <input class="form-check-input" type="radio" disabled></td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">Ba

      <input class="form-check-input" type="radio" disabled></td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">Bb

      <input class="form-check-input" type="radio" checked></td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">aA

      <input class="form-check-input" type="radio" disabled></td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">aB

      <input class="form-check-input" type="radio" disabled></td>

    </tr>

    <tr style="color: #00000;">

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">X.</td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">B7

      <input class="form-check-input" type="radio" checked></td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">7B

      <input class="form-check-input" type="radio" disabled></td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">AB

      <input class="form-check-input" type="radio" disabled></td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">7A

      <input class="form-check-input" type="radio" disabled></td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">A7

      <input class="form-check-input" type="radio" disabled></td>

    </tr>

    <tr style="color: #00000;">

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">Y.</td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">Aa

      <input class="form-check-input" type="radio" disabled></td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">bA

      <input class="form-check-input" type="radio" checked></td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">bB

      <input class="form-check-input" type="radio" disabled></td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">Ba

      <input class="form-check-input" type="radio" disabled></td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">BA

      <input class="form-check-input" type="radio" disabled></td>

    </tr>

    <tr style="color: #00000;">

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">Z.</td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">BB

      <input class="form-check-input" type="radio" disabled></td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">3B

      <input class="form-check-input" type="radio" disabled></td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">B3

      <input class="form-check-input" type="radio" disabled></td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">3A

      <input class="form-check-input" type="radio" disabled></td>

      <td style="width: 30px; text-align: center; background-color:white; border: 1px solid black;">33

      <input class="form-check-input" type="radio" checked></td>

    </tr>

  </table>

</div>

</div>

</div>

<!--/.main-->

<div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin-top: 20px; margin-bottom: 20px">

  <a href="<?php echo base_url('Pelamar/Ujian/latihan_cepat/') ?>" class="btn btn-primary mr-2 mb-2">Latihan Soal</a>

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



    alert('Waktu intruksi dan latihan sudah berakhir, selamat mengerjakan');



    window.location.href = '<?php echo base_url('Pelamar/Ujian/start_ujian_cepat/'.$idUjian); ?>';







    // document.getElementById('hentikan').click();



  }



}, 1000);







</script>







<?php   $this->load->view('layout3/footer') ?>