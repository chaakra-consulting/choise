<?php $this->load->view('layout3/header2') ?>
<?php $this->load->view('layout3/navbar') ?>
<?php $this->load->view('talent_test/layout') ?>

<?php
$timeRmib = date('Y-m-d H:i:s', $end_time);
$id_pelamar = $id_pendaftar_pelatihan;
$idRmib = $id_ujian;
$idLowongan = 0;
?>

<div class="col-sm-12 main">
	<div class="row" style="margin-bottom: -50px;">
		<div class="col-lg-9">
			<h3 class="page-header" style="margin-top: 15px">RMIB - Wanita</h3>
		</div>
		<div class="col-lg-3">
			<h4 style="margin-top: 35px" align="right">Waktu pengerjaan <span id="time"></span></h4>
		</div>
	</div>

	<div class="col-sm-12" style="background-color: #f9243f; padding: 30px; border-radius: 5px; margin-bottom: 20px;">
		<h4 style="color: #fff;"><b>Petunjuk Pengisian</b></h4>
		<ul>
			<li style="color: #fff;">Berikut ini adalah daftar beberapa jenis pekerjaan yang tersusun dalam beberapa kelompok. Setiap kelompok terdiri atas 12 jenis pekerjaan yang memiliki keahlian tersendiri.
			</li>
			<li style="color: #fff;">Tugas anda adalah memilih pekerjaan mana yang paling anda sukai atau ingin anda lakukan, terlepas dari upah yang akan diterima atau apakah anda akan berhasil mengerjakannya atau tidak
			</li>
			<li style="color: #fff;">Caranya adalah dengan mencantumkan angka secara berturut-turut dari angka 1(satu) sampai dengan 12 (duabelas) dibelakang setiap pekerjaan dalam masing-masing kelompok
			</li>
			<li style="color: #fff;">Angka 1 menunjukan pekerjaan yang paling di sukai dan seterusnya sampai angka 12 yang menunjukan pekerjaan yang paling tidak di sukai
			</li>
			<li style="color: #fff;">Pemilihan angka tidak boleh sama
			</li>
		</ul>
		<p style="color: #fff">Bekerjalah dengan cepat dan tuliskan angka-angka sesuai dengan kesan anda yang pertama muncul.</p>
	</div>

	<div class="container">
		<form action="<?php echo $form_action; ?>" method="post">
			<div class="col-sm-12" style="background-color: #fff; padding: 30px; border-radius: 5px;">
				<div class="form-row">
					<input type="hidden" name="id_ujian" value="<?php echo $idRmib ?>">
					<input type="hidden" name="id_pelamar" value="<?php echo $id_pelamar ?>">
					<input type="hidden" name="id_lowongan" value="<?php echo $idLowongan ?>">
					<input type="hidden" name="exam_type" value="<?php echo $exam_type; ?>">
					<div class="form-group">
						<table class="table table-bordered">
							<tr>
								<th style="text-align: center; background-color: grey; color: #fff" colspan="2">A</th>
							</tr>
							<tr>
								<td>Polisi Lalu Lintas</td>
								<td><input type="number" min="1" max="12" name="a1" required=required></td>
							</tr>
							<tr>
								<td>Insinyur Sipil</td>
								<td><input type="number" min="1" max="12" name="a2" required=required></td>
							</tr>
							<tr>
								<td>Akuntan</td>
								<td><input type="number" min="1" max="12" name="a3" required=required></td>
							</tr>
							<tr>
								<td>Ilmuwati</td>
								<td><input type="number" min="1" max="12" name="a4" required=required></td>
							</tr>
							<tr>
								<td>Penjual hasil mode</td>
								<td><input type="number" min="1" max="12" name="a5" required=required></td>
							</tr>
							<tr>
								<td>Seniman</td>
								<td><input type="number" min="1" max="12" name="a6" required=required></td>
							</tr>
							<tr>
								<td>Wartawati</td>
								<td><input type="number" min="1" max="12" name="a7" required=required></td>
							</tr>
							<tr>
								<td>Pianis Konser</td>
								<td><input type="number" min="1" max="12" name="a8" required=required></td>
							</tr>
							<tr>
								<td>Guru Sekolah Dasar</td>
								<td><input type="number" min="1" max="12" name="a9" required=required></td>
							</tr>
							<tr>
								<td>Sekretaris Dasar</td>
								<td><input type="number" min="1" max="12" name="a10" required=required></td>
							</tr>
							<tr>
								<td>Penata Busana</td>
								<td><input type="number" min="1" max="12" name="a11" required=required></td>
							</tr>
							<tr>
								<td>Dokter</td>
								<td><input type="number" min="1" max="12" name="a12" required=required></td>
							</tr>
							<label style="color: red">*Pastikan Angka Yang Anda Masukkan Tidak Ada yang Sama </label>
							<tr>
								<th style="text-align: center; background-color: grey; color: #fff" colspan="2">B</th>
							</tr>
							<tr>
								<td>Perakit Komputer</td>
								<td><input type="number" min="1" max="12" name="b1" required=required></td>
							</tr>
							<tr>
								<td>Personalia</td>
								<td><input type="number" min="1" max="12" name="b2" required=required></td>
							</tr>
							<tr>
								<td>Insinyur Kimia Industri</td>
								<td><input type="number" min="1" max="12" name="b3" required=required></td>
							</tr>
							<tr>
								<td>Penyiar Radio</td>
								<td><input type="number" min="1" max="12" name="b4" required=required></td>
							</tr>
							<tr>
								<td>Artis Profesional</td>
								<td><input type="number" min="1" max="12" name="b5" required=required></td>
							</tr>
							<tr>
								<td>Pengarang</td>
								<td><input type="number" min="1" max="12" name="b6" required=required></td>
							</tr>
							<tr>
								<td>Pemain Musik Orkestra</td>
								<td><input type="number" min="1" max="12" name="b7" required=required></td>
							</tr>
							<tr>
								<td>Psikolog Pendidikan</td>
								<td><input type="number" min="1" max="12" name="b8" required=required></td>
							</tr>
							<tr>
								<td>Pegawai Administrasi</td>
								<td><input type="number" min="1" max="12" name="b9" required=required></td>
							</tr>
							<tr>
								<td>Seniman Pot Keramik</td>
								<td><input type="number" min="1" max="12" name="b10" required=required></td>
							</tr>
							<tr>
								<td>Ahli Bedah</td>
								<td><input type="number" min="1" max="12" name="b11" required=required></td>
							</tr>
							<tr>
								<td>Guru Olahraga</td>
								<td><input type="number" min="1" max="12" name="b12" required=required></td>
							</tr>

							<tr>
								<th style="text-align: center; background-color: grey; color: #fff" colspan="2">C</th>
							</tr>
							<tr>
								<td>Auditor</td>
								<td><input type="number" min="1" max="12" name="c1" required=required></td>
							</tr>
							<tr>
								<td>Ahli Meteorologi</td>
								<td><input type="number" min="1" max="12" name="c2" required=required></td>
							</tr>
							<tr>
								<td>Customer Service Bank</td>
								<td><input type="number" min="1" max="12" name="c3" required=required></td>
							</tr>
							<tr>
								<td>Guru Kesenian</td>
								<td><input type="number" min="1" max="12" name="c4" required=required></td>
							</tr>
							<tr>
								<td>Penulis Drama</td>
								<td><input type="number" min="1" max="12" name="c5" required=required></td>
							</tr>
							<tr>
								<td>Komponis</td>
								<td><input type="number" min="1" max="12" name="c6" required=required></td>
							</tr>
							<tr>
								<td>Kepala Panti Asuhan</td>
								<td><input type="number" min="1" max="12" name="c7" required=required></td>
							</tr>
							<tr>
								<td>Resepsionis</td>
								<td><input type="number" min="1" max="12" name="c8" required=required></td>
							</tr>
							<tr>
								<td>Penata Rambut</td>
								<td><input type="number" min="1" max="12" name="c9" required=required></td>
							</tr>
							<tr>
								<td>Dokter Hewan</td>
								<td><input type="number" min="1" max="12" name="c10" required=required></td>
							</tr>
							<tr>
								<td>Pramugari</td>
								<td><input type="number" min="1" max="12" name="c11" required=required></td>
							</tr>
							<tr>
								<td>Ahli Rekayasa Industri</td>
								<td><input type="number" min="1" max="12" name="c12" required=required></td>
							</tr>

							<tr>
								<th style="text-align: center; background-color: grey; color: #fff" colspan="2">D</th>
							</tr>
							<tr>
								<td>Ahli Biologi</td>
								<td><input type="number" min="1" max="12" name="d1" required=required></td>
							</tr>
							<tr>
								<td>Agen Biro Periklanan</td>
								<td><input type="number" min="1" max="12" name="d2" required=required></td>
							</tr>
							<tr>
								<td>Dekorator Interior</td>
								<td><input type="number" min="1" max="12" name="d3" required=required></td>
							</tr>
							<tr>
								<td>Ahli Sejarah</td>
								<td><input type="number" min="1" max="12" name="d4" required=required></td>
							</tr>
							<tr>
								<td>Kritikus Musik</td>
								<td><input type="number" min="1" max="12" name="d5" required=required></td>
							</tr>
							<tr>
								<td>Aktivis LSM</td>
								<td><input type="number" min="1" max="12" name="d6" required=required></td>
							</tr>
							<tr>
								<td>Ahli Perkreditan</td>
								<td><input type="number" min="1" max="12" name="d7" required=required></td>
							</tr>
							<tr>
								<td>Antropolog</td>
								<td><input type="number" min="1" max="12" name="d8" required=required></td>
							</tr>
							<tr>
								<td>Apoteker</td>
								<td><input type="number" min="1" max="12" name="d9" required=required></td>
							</tr>
							<tr>
								<td>Ahli Pertanaman</td>
								<td><input type="number" min="1" max="12" name="d10" required=required></td>
							</tr>
							<tr>
								<td>Ahli Elektronika</td>
								<td><input type="number" min="1" max="12" name="d11" required=required></td>
							</tr>
							<tr>
								<td>Penilai / Auditor Pajak</td>
								<td><input type="number" min="1" max="12" name="d12" required=required></td>
							</tr>
							<tr>
								<th style="text-align: center; background-color: grey; color: #fff" colspan="2">E</th>
							</tr>
							<tr>
								<td>Pembawa Acara</td>
								<td><input type="number" min="1" max="12" name="e1" required=required></td>
							</tr>
							<tr>
								<td>Perancang Pakaian</td>
								<td><input type="number" min="1" max="12" name="e2" required=required></td>
							</tr>
							<tr>
								<td>Editor Buku</td>
								<td><input type="number" min="1" max="12" name="e3" required=required></td>
							</tr>
							<tr>
								<td>Guru Musik</td>
								<td><input type="number" min="1" max="12" name="e4" required=required></td>
							</tr>
							<tr>
								<td>Pemuka Agama</td>
								<td><input type="number" min="1" max="12" name="e5" required=required></td>
							</tr>
							<tr>
								<td>Kepala Administrasi</td>
								<td><input type="number" min="1" max="12" name="e6" required=required></td>
							</tr>
							<tr>
								<td>Florist</td>
								<td><input type="number" min="1" max="12" name="e7" required=required></td>
							</tr>
							<tr>
								<td>Psikiater</td>
								<td><input type="number" min="1" max="12" name="e8" required=required></td>
							</tr>
							<tr>
								<td>Guru Olahraga</td>
								<td><input type="number" min="1" max="12" name="e9" required=required></td>
							</tr>
							<tr>
								<td>Teknisi Industri</td>
								<td><input type="number" min="1" max="12" name="e10" required=required></td>
							</tr>
							<tr>
								<td>Guru Matematika</td>
								<td><input type="number" min="1" max="12" name="e11" required=required></td>
							</tr>
							<tr>
								<td>Ahli Pertanian</td>
								<td><input type="number" min="1" max="12" name="e12" required=required></td>
							</tr>
							<tr>
								<th style="text-align: center; background-color: grey; color: #fff" colspan="2">F</th>
							</tr>
							<tr>
								<td>Fotografer</td>
								<td><input type="number" min="1" max="12" name="f1" required=required></td>
							</tr>
							<tr>
								<td>Penulis Majalah</td>
								<td><input type="number" min="1" max="12" name="f2" required=required></td>
							</tr>
							<tr>
								<td>Pemain orgel ( organ )</td>
								<td><input type="number" min="1" max="12" name="f3" required=required></td>
							</tr>
							<tr>
								<td>Relawan Palang Merah</td>
								<td><input type="number" min="1" max="12" name="f4" required=required></td>
							</tr>
							<tr>
								<td>Pegawai Bank</td>
								<td><input type="number" min="1" max="12" name="f5" required=required></td>
							</tr>
							<tr>
								<td>Desainer Grafis</td>
								<td><input type="number" min="1" max="12" name="f6" required=required></td>
							</tr>
							<tr>
								<td>Perawat</td>
								<td><input type="number" min="1" max="12" name="f7" required=required></td>
							</tr>
							<tr>
								<td>Peternak</td>
								<td><input type="number" min="1" max="12" name="f8" required=required></td>
							</tr>
							<tr>
								<td>Ahli Farmasi</td>
								<td><input type="number" min="1" max="12" name="f9" required=required></td>
							</tr>
							<tr>
								<td>Analis Sistem Komputer</td>
								<td><input type="number" min="1" max="12" name="f10" required=required></td>
							</tr>
							<tr>
								<td>Ahli Botani</td>
								<td><input type="number" min="1" max="12" name="f11" required=required></td>
							</tr>
							<tr>
								<td>Eksportir & Importir</td>
								<td><input type="number" min="1" max="12" name="f12" required=required></td>
							</tr>
							<tr>
								<th style="text-align: center; background-color: grey; color: #fff" colspan="2">G</th>
							</tr>
							<tr>
								<td>Kritikus Buku</td>
								<td><input type="number" min="1" max="12" name="g1" required=required></td>
							</tr>
							<tr>
								<td>Ahli Pustaka Musik</td>
								<td><input type="number" min="1" max="12" name="g2" required=required></td>
							</tr>
							<tr>
								<td>Aktivis Komunitas</td>
								<td><input type="number" min="1" max="12" name="g3" required=required></td>
							</tr>
							<tr>
								<td>Pegawai Kantor</td>
								<td><input type="number" min="1" max="12" name="g4" required=required></td>
							</tr>
							<tr>
								<td>Fisioterapis</td>
								<td><input type="number" min="1" max="12" name="g5" required=required></td>
							</tr>
							<tr>
								<td>Ahli Rontgent</td>
								<td><input type="number" min="1" max="12" name="g6" required=required></td>
							</tr>
							<tr>
								<td>Petani Bunga</td>
								<td><input type="number" min="1" max="12" name="g7" required=required></td>
							</tr>
							<tr>
								<td>Pembuat Perhiasan</td>
								<td><input type="number" min="1" max="12" name="g8" required=required></td>
							</tr>
							<tr>
								<td>Ahli Tatabuku</td>
								<td><input type="number" min="1" max="12" name="g9" required=required></td>
							</tr>
							<tr>
								<td>Ahli Astronomi</td>
								<td><input type="number" min="1" max="12" name="g10" required=required></td>
							</tr>
							<tr>
								<td>Model</td>
								<td><input type="number" min="1" max="12" name="g11" required=required></td>
							</tr>
							<tr>
								<td>Penata Panggung</td>
								<td><input type="number" min="1" max="12" name="g12" required=required></td>
							</tr>
							<tr>
								<th style="text-align: center; background-color: grey; color: #fff" colspan="2">H</th>
							</tr>
							<tr>
								<td>Vokalis Band</td>
								<td><input type="number" min="1" max="12" name="h1" required=required></td>
							</tr>
							<tr>
								<td>Konsultan</td>
								<td><input type="number" min="1" max="12" name="h2" required=required></td>
							</tr>
							<tr>
								<td>Ahli Tata Negara</td>
								<td><input type="number" min="1" max="12" name="h3" required=required></td>
							<tr>
								<td>Trainer</td>
								<td><input type="number" min="1" max="12" name="h4" required=required></td>
							</tr>
							<tr>
								<td>Bidan</td>
								<td><input type="number" min="1" max="12" name="h5" required=required></td>
							</tr>
							<tr>
								<td>Tour Guide</td>
								<td><input type="number" min="1" max="12" name="h6" required=required></td>
							</tr>
							<tr>
								<td>Instalator Listrik</td>
								<td><input type="number" min="1" max="12" name="h7" required=required></td>
							</tr>
							<tr>
								<td>Developer Multimedia</td>
								<td><input type="number" min="1" max="12" name="h8" required=required></td>
							</tr>
							<tr>
								<td>Ahli Geologi</td>
								<td><input type="number" min="1" max="12" name="h9" required=required></td>
							</tr>
							<tr>
								<td>Petugas Hubungan Masyarakat</td>
								<td><input type="number" min="1" max="12" name="h10" required=required></td>
							</tr>
							<tr>
								<td>Pelukis</td>
								<td><input type="number" min="1" max="12" name="h11" required=required></td>
							</tr>
							<tr>
								<td>Penulis Sandiwara Radio</td>
								<td><input type="number" min="1" max="12" name="h12" required=required></td>
							</tr>
							<tr>
								<th style="text-align: center; background-color: grey; color: #fff" colspan="2">I</th>
							</tr>
							<tr>
								<td>Petugas KOMNAS HAM</td>
								<td><input type="number" min="1" max="12" name="i1" required=required></td>
							</tr>
							<tr>
								<td>Pegawai Tata Usaha</td>
								<td><input type="number" min="1" max="12" name="i2" required=required></td>
							</tr>
							<tr>
								<td>Koki / Chef</td>
								<td><input type="number" min="1" max="12" name="i3" required=required></td>
							</tr>
							<tr>
								<td>Dokter Anak</td>
								<td><input type="number" min="1" max="12" name="i4" required=required></td>
							</tr>
							<tr>
								<td>Atlet</td>
								<td><input type="number" min="1" max="12" name="i5" required=required></td>
							</tr>
							<tr>
								<td>Kontraktor</td>
								<td><input type="number" min="1" max="12" name="i6" required=required></td>
							</tr>
							<tr>
								<td>Petugas Pajak</td>
								<td><input type="number" min="1" max="12" name="i7" required=required></td>
							</tr>
							<tr>
								<td>Laboran</td>
								<td><input type="number" min="1" max="12" name="i8" required=required></td>
							</tr>
							<tr>
								<td>Manager Promosi</td>
								<td><input type="number" min="1" max="12" name="i9" required=required></td>
							</tr>
							<tr>
								<td>Perancang Motif Tekstil</td>
								<td><input type="number" min="1" max="12" name="i10" required=required></td>
							</tr>
							<tr>
								<td>Penyair</td>
								<td><input type="number" min="1" max="12" name="i11" required=required></td>
							</tr>
							<tr>
								<td>Komposer</td>
								<td><input type="number" min="1" max="12" name="i12" required=required></td>
							</tr>
						</table></br>
						<label>Tuliskan 3 (tiga) macam pekerjaan yang paling ingin anda lakukan atau paling anda sukai.</label>
						<label>(Tidak harus pekerjaan yang tercantum dalam daftar yang ada)</label>
						<div class="form-group">
							<br>
							<label>1.</label>
							</br>
								<textarea class="form-control" name="jawaban1" required=required></textarea>
							<br>	
								<label>2.</label>
							</br>
								<textarea class="form-control" name="jawaban2" required=required></textarea>
							<br>
							<label>3.</label>
							</br>
								<textarea class="form-control" name="jawaban3" required=required></textarea>
							<br>
						</div>
					</div>
					<div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin-top: 20px;">
						<input style="margin-bottom: 2%" type="submit"class="btn btn-primary mr-2 mb-2" value="Kirim Jawaban"></a>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript">
  var countDownDate = new Date("<?php echo $timeRmib ?>").getTime();
  var x = setInterval(function() {
	var now = new Date().getTime();
	var distance = countDownDate - now;
	var days = Math.floor(distance / (1000 * 60 * 60 * 24));
	var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
	var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
	var seconds = Math.floor((distance % (1000 * 60)) / 1000);
	document.getElementById("time").innerHTML = minutes + " : " + seconds + " ";
	if (distance < 0) {
		clearInterval(x);
		alert('Waktu mengerjakan ujian talent sudah habis');
		window.location.href = '<?php echo base_url('talent-test/exam-list'); ?>';
	}
}, 1000);
</script>

<?php $this->load->view('layout3/footer') ?>