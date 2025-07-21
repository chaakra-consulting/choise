<?php   $this->load->view('layout3/header2') ?>

<?php   $this->load->view('layout3/navbar') ?>



<div class="col-sm-12 main">

	

	<div class="row" style="margin-bottom: -50px;">

		<div class="col-lg-9">

			<h3>GRAFIS 2</h3>

		</div>

		<div class="col-lg-3">

			<h4 style="margin-top: 35px" align="right">Waktu Ujian <span id="timer"></span> detik</h4>

		</div>

	</div><!--/.row-->

	<?php  

	$id_ujian=  $this->session->userdata('ses_ujian');

	$ujian = $this->db->query("SELECT * FROM tb_ujian_grafis2 WHERE id_ujian_grafis = $id_ujian");

	foreach ($ujian->result() as $key ) {

		$end_uji1 = $key->end_uji_sub1;

	}

	?>

</div>

</div><!--/.row-->



</div>	<!--/.main-->

	<div class="col-sm-12" style="background-color: #fff; padding-top: 10px; padding-bottom: 20px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px; border-radius: 5px;">
		<div class="col-sm-12">
			<h3><b>Konfirmasi Data</b></h3>
			<hr color="black">
		</div>
		<?php 
		$id_pelamar = $this->session->userdata('ses_id');
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		foreach ($grafis2 as $key) {
			$nik=$key['nik'];
			$nama=$key['nama_pelamar'];

			$lowongan=$this->db->query("SELECT * FROM tb_apply WHERE id_pelamar = $id_pelamar AND id_lowongan = $id_lowongan");
			$jabatan = $this->db->query("SELECT * FROM tb_lowongan WHERE id_lowongan = $id_lowongan");

			foreach ($lowongan->result() as $key_low) {
				$pelamar = $key_low->id_pelamar;
				$lowong = $key_low->id_lowongan;

				foreach ($jabatan->result() as $key_jab) {
					if ($key_low->id_lowongan == $key_jab->id_lowongan) {
						$nama_jabatan = $key_jab->nama_jabatan;
					}
				}
			}
		}

		foreach ($grafis2U as $key_u) {
			$nama_u = $key_u['nama_ujian'];
			$durasi = $key_u['durasi'] / 60;
		}
		?>
		<div class="col-sm-12" style="margin-bottom: 5px;">
			<table class="table table-bordered">
				<tbody>
					<tr>
						<td><b>Nama Lengkap</b></td>
						<td><?php echo $nama ?></td>
					</tr>
					<tr>
						<td><b>NIK</b></td>
						<td><?php echo $nik ?></td>
					</tr>
					<tr>
						<td><b>Posisi Dilamar</b></td>
						<td><?php echo $nama_jabatan ?></td>
					</tr>
					<tr>
						<td><b>Nama Ujian</b></td>
						<td><?php echo $nama_u ?></td>
					</tr>
					<tr>
						<td><b>Waktu Pengerjaan</b></td>
						<td>15 Menit</td>
					</tr> 
				</tbody>
			</table>
		</div>
  <!--/.row-->
  <div class="col-sm-12" style="background-color: #000000; padding: 30px; border-radius: 5px; margin-bottom: 20px;">
    <h2 style="color: #ffffff" align="center"><b>INSTRUKSI TES GRAFIS 2</b></h2><br>
    <p style="color: #ffffff;">1. Pada pojok kiri atas tuliskan identitas diri</p><br>
    <p style="color: #ffffff;">Nama					: </p>
	<p style="color: #ffffff;">Jenis Kelamin		: </p>
	<p style="color: #ffffff;">Tgl. Lahir			: </p>
	<p style="color: #ffffff;">Tgl. Pemeriksaan		: </p><br>
    <p style="color: #ffffff;">2.	Balik kertas tersebut dalam posisi vertikal (potrait)</p><br>
	<p style="color: #ffffff;">3.	Tugas : <b>Gambarlah pohon berkayu atau berkambium, KECUALI pohon pisang, kelapa, randu, beringin, semak/perdu, bambu, pinus/palma, cemara, dan pohon-pohon lainnya yang tidak berkayu</b></p><br>
	<p style="color: #ffffff;">4.	Gunakan pensil HB <b>tidak diperkenankan menggunakan penghapus dan penggaris</b></p><br>
	<p style="color: #ffffff;">5.   Pada area yang kosong tuliskan: Nama pohon yang digambar</p><br>

	<p style="color: #ff0000;" align="center">CATATAN :</p><br>
	<p style="color: #ff0000;" align="center">1. Hasil gambar discan dalam format PDF dan diberi nama " Kode Peserta_Nama Lengkap_Hasil Tes Grafis 2</p>
	<p style="color: #ff0000;" align="center">2. Kirimkan hasil (dalam bentuk PDF) pada nomor Whatsapp yang menghubungi Anda maksimal 30 menit setelah waktu pengerjaan</p><br>
	<p style="color: #ff0000;" align="center">3. jika pengiriman melebihi batas waktu maka tes tidak akan dinilai !!</p><br>
	<p style="color: #ff0000;" align="center">4. Setelah mengirim ke Whatsapp pastikan sudah menerima konfirmasi dari Admin. Apabila belum dikonfirmasi harap ditunggu.</p><br>

	</div>
	</div>

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

  	alert('Waktu Ujian Grafis 2 Telah Berakhir');

  	window.location.href = '<?php echo base_url('Pelamar/Ujian/testulispsikotes'); ?>';

			// document.getElementById('hentikan').click();

		}

	}, 1000);
</script>

<?php $this->load->view('layout3/footer') ?>