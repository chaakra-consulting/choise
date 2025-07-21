<?php   $this->load->view('layout3/header2') ?>

<?php   $this->load->view('layout3/navbar') ?>



<?php 

$id_pelamar = $this->session->userdata('ses_id');

$idStudi = $this->session->userdata('ses_ujianStudi');

$idLowongan = $this->session->userdata('sesIdLowongan');



$studi = $this->db->query("SELECT * FROM tb_ujian_kasus WHERE id_ujian_studi = $idStudi");

foreach ($studi->result() as $key_uStudi) {

	$timeStudi = $key_uStudi->waktu_akhir;

}

?>



<div class="col-sm-12 main">

	<div class="row" style="margin-bottom: -50px;">

		<div class="col-lg-9">

			<h3 class="page-header" style="margin-top: 15px">STUDI KASUS KEUANGAN PT. SEHAT BERSAMA</h3>

		</div>

		<div class="col-lg-3">

			<h4 style="margin-top: 35px" align="right">Waktu pengerjaan <span id="time"></span> detik</h4>

		</div>

	</div><!--/.row-->





	<div class="col-sm-12" style="background-color: #f9243f; padding: 30px; border-radius: 5px; margin-bottom: 20px;">

		<h4 style="color: #fff;"><b>Petunjuk Pengisian</b></h4>

		<p style="color: #fff">Jawablah	beberapa	pertanyaan	dibawah	ini	sesuai dengan pemahama yang anda miliki	saat ini secara	singkat	dan	jelas !</p>

	</div>



	<div class="container">

		

	

	<div class="col-sm-12" style="background-color: #fff; padding: 30px; border-radius: 5px;">

		<div class="form-row">

			<form action="<?php echo base_url("Pelamar/Ujian/jawaban_studi/") ?>" method="post">

				<input type="hidden" name="id_ujian" value="<?php echo $idStudi ?>">

				<input type="hidden" name="id_pelamar" value="<?php echo $id_pelamar ?>">

				<input type="hidden" name="id_lowongan" value="<?php echo $idLowongan ?>">

				<div class="form-group">



				<br><label>STUDI KASUS</label></br>
				<br>
					<label>
					<u>PERSOALAN</u>
					</label>
				</br>
					

				<br>
						<p>
						PT. Sehat Bersama adalah salah satu produsen obat-obatan milik pemerintah yang terbesar di Indonesia. Didirikan pada tahun 19 Februari 1965, 
						PT. Sehat Bersama sampai saat ini sudah memiliki 13 pabrik, 1746 apotek, 521 klinik kesehatan, 94 laboratorium klinik, 14 optik,
						dan 7 klinik kesehatan yang tersebar di seluruh Indonesia. Disamping memenuhi kebutuhan obat di Indonesia, PT. Sehat Bersama juga melakukan ekspor
						ke negara seperti Malaysia, India, Filipina, Hongkong, dan masih banyak lagi. PT. Sehat Bersama memiliki divisi audit internal yang bertanggung 
						jawab atas keuangan perusahaan. Divisi Audit Internal tersebut dikepalai oleh Kepala Auditor Internal dan sejumlah Staff Auditor Internal. 
						Setiap staff tersebut bertanggung jawab atas pengauditan unit distribusi yang dimiliki PT. Sehat Bersama dengan jumlah tertentu.
						</p></br>
						<p>	
						Pada audit tanggal 31 Desember 2016, manajemen PT. Sehat Bersama melaporkan adanya laba bersih sebesar Rp 132 M dan laporan tersebut diaudit 
						oleh audit internal. Namun, Kementrian BUMN dan OJK menilai bahwa laba bersih tersebut terlalu besar dan mengandung unsur rekayasa. 
						Setelah dilakukan audit ulang pada 2 Oktober 2017 laporan keuangan PT. Sehat Bersama 2016 disajikan kembali dan hasilnya telah ditemukan 
						kesalahan yang cukup mendasar. Pada laporan keuangan yang baru keuntungan yang disajikan hanya sebesar Rp 99,56 M, atau lebih rendah sebesar
						Rp 32,6 M, atau 24,7% dari laba awal yang telah dilaporkan. Kesalahan tersebut timbul pada unit Industri Bahan Baku yaitu kesalahan berupa 
						overstated penjualan sebesar Rp 23,9 M, pada unit Pedagang Besar Farmasi berupa overstated persediaan sebesar Rp 8,1 M dan overstated
						penjualan sebesar Rp 10,7 M. Diduga upaya penggelembungan dana yang dilakukan oleh pihak direksi PT. Sehat Bersama, dilakukan untuk
						menarik para investor untuk menanamkan modalnya kepada PT. Sehat Bersama.
						</p></br>
						<p>	
						Timbulnya kesalahan penyajian yang berkaitan dengan persediaan disebabkan oleh nilai yang ada dalam daftar harga persediaan digelembungkan. 
						PT. Sehat Bersama melalui direktur produksinya menerbitkan dua buah daftar harga persediaan pada tanggal 1 dan 3 Februari 2017. Daftar harga per 
						3 Februari tersebut telah digelembungkan nilainya dan dijadikan dasar penilaian persediaan pada unit distribusi PT. Sehat Bersama per 31 Desember 2016. 
						Sedangkan kesalahan penyajian berkaitan dengan penjualan adalah dengan dilakukannya pencatatan ganda atas penjualan. Pencatatan ganda tersebut dilakukan 
						pada unit-unit yang tidak dilakukan sampling oleh akuntan, sehinggan tidak berhasil dideteksi. Berdasarkan penyeidikan OJK, disebutkan bahwa divisi audit 
						internal yang mengaudit laporan keuangan PT. Sehat Bersama telah mengikuti standar audit yang berlaku, namun gagal mendeteksi kecurangan tersebut. 
						Selain itu, beberapa staff audit internal tersebut juga terbukti membantu manajemen melakukan kecurangan tersebut. Sebagai akibat dari kejadian ini, 
						PT. Sehat Bersama dikenakan denda sebesar Rp 500 juta, direksi lama PT. Sehat Bersama terkena denda Rp 1 M, serta divisi audit internal yang mengaudit 
						dindenda Rp 100 juta. Kesalahan yang dilakukan divisi audit internal menunjukkan bahwa divisi tersebut tidak berhasil mengatasi risiko audit dalam 
						mendeteksi adanya penggelembungan laba yang dilakukan PT. Sehat Bersama, meskipun sudah menjalankan audit sesuai prosedur.
						</p></br>
						
					</br>
					<label>
					<u>PERTANYAAN</u>

					</label>

				
					<br>

						<p>

						1.	Menurut anda, hal-hal apa saja yang menjadi penyebab permasalahan pada kasus PT. Sehat Bersama diatas? 

						</p>

					</br>

					<textarea class="form-control" name="jawaban1" required=required></textarea>

				<br>	
				
					<p> 2.	Susunlah solusi/pemecahan masalah terkait langkah apa saja yang harus ditempuh untuk menyelesaikan permasalahan pada kasus PT. Sehat Bersama diatas?

					</p>

					</label>

					<textarea class="form-control" name="jawaban2" required=required></textarea>

					

				</div>

				

			</div>



		</div>



		<div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin-top: 20px;">

			<input style="margin-bottom: 2%" type="submit"class="btn btn-primary mr-2 mb-2" value="Kirim Jawaban"></a>

			<!-- <button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/jawaban_endStudi') ?>" class="btn btn-primary"> Kirim Jawaban Bro <i class="fa fa-arrow-circle-right"></i>

						</button> -->

		</div>

	</form>





<script type="text/javascript">

  var countDownDate = new Date("<?php echo $timeStudi ?>").getTime();



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

    alert('Waktu mengerjakan ujian leadership inventory sudah habis');

    window.location.href = '<?php echo base_url('Pelamar/Pelamar/testulispsikotes'); ?>';

  }

}, 1000);



</script>



<?php   $this->load->view('layout3/footer') ?>