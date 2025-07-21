<?php $this->load->view('layout3/header2') ?>

<?php $this->load->view('layout3/navbar') ?>
<style>
    /* Mengatur ukuran teks untuk nomor soal dan soal */
    .question {
        text-align: justify;
    }
</style> 	


<div class="col-sm-12 main">



	<div class="row" style="margin-bottom: -50px;">

		<div class="col-lg-9">

			<h3>In-Tray</h3>
		
		</div>

		<div class="col-lg-3">

			<h4 style="margin-top: 35px" align="right">Waktu Ujian <span id="time"></span> detik</h4>

		</div>

	</div>
	<!--/.row-->

	<?php

	$id_ujian =  $this->session->userdata('ses_tray');
	$id_pelamar = $this->session->userdata('ses_tray');

	$idTray = $this->session->userdata('ses_tray');
	
	$idLowongan = $this->session->userdata('sesIdLowongan');


	$ujian = $this->db->query("SELECT * FROM tb_ujian_tray WHERE id_ujian_tray = $id_ujian");

	foreach ($ujian->result() as $key) {

		$end_uji = $key->end_soal;
	}

?>



<div class="col-sm-12 main">

	<div class="row" style="margin-bottom: -50px;">

		<div class="col-lg-12">

			<h3 class="page-header" style="margin-top: 15px; text-align: center;"><b>Lembar Kerja</b></h3>

		</div>
	</div><!--/.row-->



	<div class="container">

		

	

	<div class="col-sm-12" style="background-color: #fff; padding: 30px; border-radius: 5px;">

		<div class="form-row">

			<form action="<?php echo base_url("Pelamar/Ujian/jawaban_tray/") ?>" method="post">

				<input type="hidden" name="id_ujian" value="<?php echo $idTray ?>">

				<input type="hidden" name="id_pelamar" value="<?php echo $id_pelamar ?>">

				<input type="hidden" name="id_lowongan" value="<?php echo $idLowongan ?>">

				<div class="form-group">
				<label>1.  Berdasarkan email-email yang sudah masuk silahkan Anda menjawab (disposisi) email - email tersebut sesuai dengan wewenang Anda saat ini
				</label>
				<div class="form-group">
				<br>
					<label>A. EMAIL 1
						<br><br>
					<p class="question">
					Jakarta, 2 April 2024<br><br>
					Kepada Yth         : Bapak Irfan<br><br>
					Dari               : Norma Ningsih (sekertaris)<br><br>
					Perihal            : Agenda Kerja<br><br>

					Bapak Irfan,<br> berikut saya persiapkan Agenda Kerja bapak untuk Bulan April 2024 setelah kepulangan bapak dari tugas studi banding.
					Presentasi mengenai Pedoman Rencana Karir Karyawan didepan Managing Director, bertempat Kantor Pusat, Ruang Arjuna, tanggal 18 Mei 2024 pukul 09.00 – 10.30 WIB
					Memberikan materi mengenai Kebijakan Sumber Daya Manusia pada acara Orientasi Karyawan Baru di Gedung Pelatihan Ruang Melati, tanggal 19 Mei 2024 pukul 08.00 – 09.00 WIB
					Memberikan materi pelatihan mengenai “Seven Habits of Highly Effective People” pada acara Leadership Training for Supervisor, bertempat di Gedung Pelatihan Ruang ANGGREK, TANGGAL 20 Mei 2024 pukul 14.00 – 16.00 WIB

					<br>
					<br><br>
					Terima kasih
</p>
										</label>
					<textarea class="form-control" name="jawaban1" required=required placeholder="Balasan Anda"></textarea>
				</div>
				<div class="form-group">
					<label>B. EMAIL 2<br><br>
					<p class="question">
					Jakarta, 5 april 2024<br><br>
					Kepada Yth : Bapak Irfan<br><br>
					Dari : Andi Kurnia, Section HRIS<br><br>
					Perihal : Proyek Implementasi HRIS<br><br>
					<br>
					Proyek Implementasi Human Resource Iformation System (HRIS) yang kita lakukan sejak sebulan lalu tampaknya tidak bisa berjalan dengan lancer. Problem mendasar yang sekarang muncul adalah software yang kita pesan dari PT. Oregon Indonesia. Tampaknya tidak cocok dengan sistem yan sekarang kita gunakan. Saya khawatir hal ini akan membawa pengaruh jelek pada sistem computer di bagian – bagian lain.
					<br><br>
					Saya berharap bisa segera menemui bapak setelah bapak pulang dari Singapore.
					<br><br><br>
					Terima kasih atas perhatian Bapak.
					</p>
					</label>
					<textarea class="form-control" name="jawaban2" required=required placeholder="Balasan Anda"></textarea>
				</div>
				<div class="form-group">

					<label>C. EMAIL 3<br><br>
					<p class="question">
					6 april 2024<br><br>
					Kepada Yth                : Bapak Irfan<br><br>
					Dari                        : Angela Kintawangi, Section Head Compensation & Benefits<br><br>
					Perihal                : Hasil Salary Survey<br><br>

					Seperti yang telah bapak ketahui, apda bulan Juli lalu kita mengikuti survei gaji yang didadakan oleh suatu Lembaga konsultan bidang compensation & benefits. Kemarin mereka telah mengirimkan hasil survei tersebut, dan hasilnya cukup mengejutkan. Secara rata – rata, tingkat gaji yang kita berikan pada karyawan kita ternyata lebih rendah 20% disbanding tingkat gaji yang diberikan oleh para pesaing ataupun organisasi lain yang bergerak di bidang yang sama dengan usaha kita.
					<br><br>
					Saya menunggu respon dari bapak untuk menindaklanjuti temuan ini.
					<br><br><br>
					Terima kasih atas perhatiannya.
					</p>					
					</label>
					<textarea class="form-control" name="jawaban3" required=required placeholder="Balasan Anda"></textarea>
				</div>
				<div class="form-group">
					<label>D. EMAIL 4<br><br>
					<p class="question">
					13 april 2024<br><br>
					Kepada Yth                : Bapak Irfan<br><br>
					Dari                        : Elena Puspasari, Manager Penjualan<br><br>
					Perihal                : Sosialisasi Proyek Implementasi HRIS<br><br>

					Bapak Irfan,<br>
					Melalui e-mail ini saya ingin memberikan sedikit masukan mengenai proses implementasi HRIS yang sudah dilangsungkan sejak beberapa waktu lalu. Tempo hari, sejumlah staf yang menangani proyek implementasi ini pemah datang ke kantor kami untuk mepersiapkan pemasangan software HRIS di komputer para anak buah saya. Hanya saja hingga saat ini, saya dan juga anak buah saya belum mengerti sepenuhnya mengenai manfaat sistem yang baru ini bagi mereka. Saya hanya mendengar bahwa dengan sistem yang baru ini nantinya setiap karyawan akan terbebas dari aneka ragam form kepersonaliaan (seperti misalnya formulir cuti, formulir biaya perjalanan kantor, formulir absensi dll), sebab semuanya bisa diakses melalui komputer. Apakah hal ini benar? Saya rasa bapak perlu melakukan sosialisasi yang lebih intensif untuk mengkomunikasikan manfaat sistem HRIS ini.<br><br><br>
					Terima kasih atas perhatiannya.</p>	
					</label>
					<textarea class="form-control" name="jawaban4" required=required placeholder="Balasan Anda"></textarea>
					</div>
					<div class="form-group">
					<label>E. EMAIL 5<br><br>
					<p class="question">
					Jakarta, 15 April 2024
					<br><br>
					Kepada Yth : Bapak Irfan<br>
					Dari     : Riswanda Imawan, Manager Finance Anggaran<br>
					Hal      : Proyek Implementasi HRIS
					<br><br>
					Tiga hari yang lalu, saudara Andi Kurnia datang ke kantor saya untuk meminta tambahan dana sebesar Rp 500 juta guna keperluan Proyek Implementasi HRIS Alasan yang ia kemukakan adalah adanya kebutuhan untuk meng-up grade semua komputer yang ada di kantor kita agar bisa optimal menjalankan software baru yang tengah ia pasang.
					<br><br>
					Terus terang saya cukup terkejut dengan permintaan ini. Seperti yang Anda ketahui, dalam Rapat Anggaran Proyek Implementasi HRIS yang kita adakan tiga bulan lalu, kita telah sepakat untuk mengeluarkan dana sebesar Rp 4 milyar untuk keperluan proyek ini. Saya berasumsi bahwa Anda dengan tim anda telah merinci kebutuhan dana secara detil, sehingga saya berharap tidak ada over-budget. Karena itu saya tidak mau memenuhi permintaan yang diajukan oleh saudara Andi Kurnia.
					<br><br><br>
					Terima kasih atas perhatiannya.
					</label>
					<textarea class="form-control" name="jawaban5" required=required placeholder="Balasan Anda"></textarea>

				</div>
				<div class="form-group">
					<label>F. EMAIL 6<br><br>
					<p class="question">
					14 april 2024<br><br>
					Kepada Yth                : Bapak Irfan<br><br>
					Dari                        : Departemen Quality Control<br><br>
					Perihal                : Laporan Proyek Implementasi HRIS<br><br>

					Bapak Irfan yang terhormat,<br>
					Dari hasil pemantauan di lapangan, kami melihat adanya sejumlah masalah berkaitan dengan Proyek Implementasi HRIS yang kini tengah berlangsung. Untuk menghindari munculnya problem sejenis di masa-masa mendatang, kami meminta bapak untuk membuat laporan tertulis, yang isinya membahas dua hal utama : <br>
					Masalah-masalah apa saya yang muncul dalam kaitannya dengan Proyek Implementasi HRIS?
					Langkah-langkah apa yang semestinya terfebih dulu dilakukan agar masalah-masalah tersebut tidak muncul?
					<br><br>
					Selanjutnya, laporan tertulis bapak tersebut akan kami gunakan sebagai bahan masukan bagi bagian-bagian lain jika kelak mereka melakukan proyek sejenis Demikian permintaan dari kami.<br><br><br><br> Atas bantuan dan kerjasamanya kami ucapkan terima kasih
					</p>
					</label>
					<textarea class="form-control" name="jawaban6" required=required placeholder="Balasan Anda"></textarea>

				</div>
				<br>
				<label>2. Berdasarkan 6 email yg sudah ada diatas, maka anda diminta untuk menentukan prioritas masing-masing berdasarkan kategori sebagai berikut: High Priority (A); Medium Priority (B); Low Priority (C). Kemudian berikan alasan singkatnya masing-masing.
					</label>



				<div class="form-group">

					<textarea class="form-control" name="jawaban7" required=required placeholder="Contoh: Email 1 (Low Priority) -Deskripsi alasan"></textarea>

				</div>			

			</div>



		</div>



		<div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin-top: 20px;">

			<input style="margin-bottom: 2%" type="submit"class="btn btn-primary mr-2 mb-2" value="Kirim Jawaban"></a>

		</div>

	</form>





	<script type="text/javascript">
	var countDownDate = new Date("<?php echo $end_uji ?>").getTime();



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

			alert('Waktu Ujian In-Tray Telah Berakhir');

			window.location.href = '<?php echo base_url('Pelamar/Pelamar/testulispsikotes/' . $id_ujian); ?>';



			// document.getElementById('hentikan').click();

		}

	}, 1000);
</script>

<?php $this->load->view('layout3/footer') ?>