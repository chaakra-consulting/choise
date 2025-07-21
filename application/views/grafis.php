<?php   $this->load->view('layout3/header2') ?>

<?php   $this->load->view('layout3/navbar') ?>



<div class="col-sm-12 main">

	

	<div class="row" style="margin-bottom: -50px;">

		<div class="col-lg-8">

			<h3>GRAFIS 1 & 2 (Siapkan 2 Kertas HVS)</h3><br>
		</div>

		<div class="col-lg-4">

			<h4 style="margin-top: 30px" align="right">Waktu Ujian <span id="timer"></span> detik</h4>

		</div>
		</div>
		<div class="row" style="margin-bottom: -50px;">
		<div class="col-lg-12">
		<h3 style="color:#FF0000; text-align:center;"><strong>PASTIKAN ANDA TIDAK MELEWATKAN TES GRAFIS 2 DIBAWAH INI !! (SCROLL KEBAWAH)</strong></h3>

		</div>
	</div><!--/.row-->

	<?php  

	$id_ujian=  $this->session->userdata('ses_ujian');

	$ujian = $this->db->query("SELECT * FROM tb_ujian_grafis WHERE id_ujian_grafis = $id_ujian");

	foreach ($ujian->result() as $key ) {

		$end_uji1 = $key->end_uji_sub1;

	}

	?>

</div>

</div><!--/.row-->



</div>	
<style>
    .instruction-container {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .instruction-title {
        color: #000000;
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .instruction-text {
        color: #000000; /* Warna teks menjadi hitam pekat */
        font-size: 18px;
        margin-top: 10px;
        line-height: 1.5;
    }

    .important-note {
        color: #ff0000;
        text-align: left;
        margin-top: 10px;
        font-weight: bold;
        font-size: 18px;
    }

    .personal-info {
        color: #000000;
        margin-bottom: 10px;
    }

    .personal-info span {
        margin-right: 10px; /* Tambahkan spasi di sini */
    }
</style>


<div class="col-sm-12 instruction-container">
    <h2 class="instruction-title"><b>INSTRUKSI TES GRAFIS 1</b></h2>
	<div class="instruction-text">
    <table style="width: 95%; margin: 0 auto;">
        <tr>
            <td style="padding-bottom: 10px; color: #000000;">1. Pada pojok kiri atas tuliskan identitas diri</td>     
        </tr>
		<tr>
		<td style="padding-bottom: 10px; color: #000000;">Nama :</td>
		</tr>
		<tr>
		<td style="padding-bottom: 10px; color: #000000;">Jenis Kelamin :</td>
		</tr>
		<tr>
		<td style="padding-bottom: 10px; color: #000000;">Tgl. Lahir :</td>
		</tr>
		<tr>
		<td style="padding-bottom: 10px; color: #000000;">Tgl. Pemeriksaan :</td>
		</tr>
        <tr>
            <td colspan="2" style="padding-bottom: 10px; color: #000000;">2. Balik kertas tersebut dalam posisi vertikal (potrait)</td>
        </tr>
        <tr>
            <td colspan="2" style="padding-bottom: 10px; color: #000000;">3. Tugas : <b>Gambar seorang manusia</b></td>
        </tr>
        <tr>
            <td colspan="2" style="padding-bottom: 10px; color: #000000;">4. Gunakan pensil HB, <b>tidak diperkenankan menggunakan penghapus dan penggaris</b></td>
        </tr>
        <tr>
            <td colspan="2" style="padding-bottom: 10px; color: #000000;">5. Pada area yang kosong tuliskan :</td>
        </tr>
		<tr>
		<td style="padding-bottom: 10px; color: #000000;">a. Siapa yang digambar</td>
		</tr>
        <tr>
            <td style="padding-bottom: 10px; color: #000000;">b. Jenis kelamin</td>
        </tr>
		<tr>
		<td style="padding-bottom: 10px; color: #000000;">c. Usia</td>
		</tr>
        <tr>  
            <td style="padding-bottom: 10px; color: #000000;">d. Kelebihannya (berhubungan dengan sifat)</td>
        </tr>
		<tr>
		<td style="padding-bottom: 10px; color: #000000;">e. Kekurangannya (berhubungan dengan sifat)</td>
		</tr>
        <tr> 
            <td style="padding-bottom: 10px; color: #000000;">f. Apa yang disukai (berhubungan dengan fisik)</td>
        </tr>
		<tr>
		<td style="padding-bottom: 10px; color: #000000;">g. Apa yang tidak disukai (berhubungan dengan fisik)</td>
		</tr>
        <tr> 
            <td style="padding-bottom: 10px; color: #000000;">h. Apa yang sedang dilakukan (aktivitas)</td>
        </tr>
		<tr>
		<td style="padding-bottom: 10px; color: #000000;">i. Apa yang dipikirkan</td>
		</tr>
        <tr>
            <td style="padding-bottom: 10px; color: #000000;">j. Bagaimana perasaannya dan kenapa</td>
        </tr>
    </table>
</div>
</div>
<div class="col-sm-12 instruction-container">
    <h2 class="instruction-title"><b>INSTRUKSI TES GRAFIS 2</b></h2>
    <div class="instruction-text">
        <table style="color: #000000; width: 95%; margin: 0 auto;">
            <tr>
                <td style="padding-bottom: 10px;">1. Pada pojok kiri atas tuliskan identitas diri</td>
            </tr>
            <tr>
                <td style="padding-bottom: 10px;">Nama : </td>
            </tr>
            <tr>
                <td style="padding-bottom: 10px;">Jenis Kelamin : </td>
            </tr>
            <tr>
                <td style="padding-bottom: 10px;">Tgl. Lahir : </td>
            </tr>
            <tr>
                <td style="padding-bottom: 10px;">Tgl. Pemeriksaan : </td>
            </tr>
            <tr>
                <td style="padding-bottom: 10px;">2. Balik kertas tersebut dalam posisi vertikal (potrait)</td>
            </tr>
            <tr>
                <td style="padding-bottom: 10px;">3. Tugas : <b>Gambarlah pohon berkayu atau berkambium, KECUALI pohon pisang, kelapa, randu, beringin, semak/perdu, bambu, pinus/palma, cemara, dan pohon-pohon lainnya yang tidak berkayu</b></td>
            </tr>
            <tr>
                <td style="padding-bottom: 10px;">4. Gunakan pensil HB <b>tidak diperkenankan menggunakan penghapus dan penggaris</b></td>
            </tr>
            <tr>
                <td style="padding-bottom: 10px;">5. Pada area yang kosong tuliskan: Nama pohon yang digambar</td>
            </tr>
        </table>
    </div>
    <div class="important-note">
        <table style="color: #000000; width: 90%; margin: 0 auto;">
            <tr>
                <td style="padding-bottom: 10px;"><strong>CATATAN :</strong></td>
            </tr>
			<tr>
            	<td style="padding-bottom: 10px;">1. Hasil gambar wajib discan dalam format PDF dan diberi nama "Nama Lengkap_Hasil Tes Grafis 1" (Untuk Tes Grafis 1).</td>
        	</tr>
            <tr>
                <td style="padding-bottom: 10px;">2. Hasil gambar discan dalam format PDF dan diberi nama "Nama Lengkap_Hasil Tes Grafis 2" (Untuk Tes Grafis 2).</td>
            </tr>
            <tr>
                <td style="padding-bottom: 10px;">3. Kirimkan hasil (dalam bentuk PDF) pada nomor Whatsapp yang menghubungi Anda maksimal 30 menit setelah waktu pengerjaan.</td>
            </tr>
            <tr>
                <td style="padding-bottom: 10px;">4. Jika pengiriman melebihi batas waktu maka tes tidak akan dinilai !!.</td>
            </tr>
            <tr>
                <td style="padding-bottom: 10px;">5. Setelah mengirim ke Whatsapp pastikan sudah menerima konfirmasi dari Admin. Apabila belum dikonfirmasi harap ditunggu.</td>
            </tr>
			<tr>
            	<td style="padding-bottom: 10px;">6. Penilaian baru akan diberikan setelah Anda menyelesaikan Tes Grafis (1 & 2) secara lengkap</td>
        	</tr>
        </table>
    </div>
</div>
<script type="text/javascript">
	  var countDownDate = new Date("<?php echo $end_uji1 ?>").getTime();
// Update the count down every 1 second

var x = setInterval(function() {



	var now = new Date().getTime();



	var distance = countDownDate - now;



	var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

	var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

	var seconds = Math.floor((distance % (1000 * 60)) / 1000);



  // Display the result in the element with id="demo"

  document.getElementById("timer").innerHTML = ("0"+hours).slice(-2) + ":"

  + ("0"+minutes).slice(-2) + ":" + ("0"+seconds).slice(-2);

  // alert(now);



  if (distance < 0) {

  	clearInterval(x);

  	alert('Waktu Ujian Grafis 1 Telah Berakhir');

  	window.location.href = '<?php echo base_url('Pelamar/Ujian/testulispsikotes'); ?>';

			// document.getElementById('hentikan').click();

		}

	}, 1000);
</script>

<?php $this->load->view('layout3/footer') ?>
