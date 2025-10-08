<?php $this->load->view('layout2/header') ?>

<!--<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">-->
<!--  <div class="modal-dialog">-->
<!--    <div class="modal-content">-->
<!--      <div class="modal-header">-->
<!--        <h5 class="modal-title" id="myModalLabel">Informasi</h5>-->
<!--        <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--          <span aria-hidden="true">&times;</span>-->
<!--        </button>-->
<!--      </div>-->
<!--      <div class="modal-body">-->
<!--        <a href="#">-->
<!--            <img src="<?php echo base_url('assets2/images/banner_ai_2.jpg') ?>" alt="no-image" style="width: 100%;">-->
<!--        </a>-->
<!--      </div>-->
<!--      <div class="modal-footer">-->
<!--        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>-->
 <!--<a href="#" class="btn btn-primary" id="btnModalDaftar">Daftar Sekarang</a>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  <div id="overlay"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
  <div class="site-wrap" id="home-section">
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-6 col-md-6 col-xl-4 d-block">
            <h1 class="mb-0 site-logo">
              <img src="<?php echo base_url('assets2/images/companylogohighrespng.png') ?>" 
                alt="Logo Choise - Platform Rekrutmen Terpercaya"
                style="width: 160px; height: auto;">
            </h1>
          </div>
          <div class="col-12 col-md-6 col-xl-8 main-menu">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="nav justify-content-end site-menu main-menu">
                <li style="margin-left: -1000px;">
                  <a href="#home-section" class="nav-link">BERANDA</a>
                </li>
                <li>
                  <a href="#pelatihan-section" class="nav-link">TALENT TEST</a>
                </li>
                <li>
                  <a href="#features-section" class="nav-link">LOWONGAN</a>
                </li>
                <li>
                  <a href="#flow-section" class="nav-link">ALUR PENDAFTARAN</a>
                </li>
                <li>
                  <a href="#faq-section" class="nav-link">FAQ</a>
                </li>
                <li>
                  <a href="<?php echo base_url('Login_pelamar/') ?>" class="nav-link">MASUK / DAFTAR</a>
                </li>
              </ul>
            </nav>
          </div>
          <div class="col-6 col-md-9 d-inline-block d-lg-none ml-md-0">
            <a href="#" class="site-menu-toggle js-menu-toggle text-black float-right">
              <span class="icon-menu h3"></span>
            </a>
          </div>
        </div>
      </div>
    </header>
    <div class="site-blocks-cover" style="overflow: hidden;">
      <div class="container">
        <br>
        <div id="notifikasi">
          <?php if ($this->session->flashdata('msg_home')) : ?>
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
              <?php echo htmlspecialchars($this->session->flashdata('msg_home')); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif; ?>
        </div>
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12" style="position: relative;" data-aos="fade-up" data-aos-delay="200">
            <img src="<?php echo base_url('assets2/images/headerimage.jpg') ?>"
              alt="Header Image - Mulai Karir Anda di Choise" 
              class="img-fluid img-absolute"
              loading="lazy">
            <div class="row mb-4" data-aos="fade-up" data-aos-delay="200">
              <div class="col-lg-6 mr-auto">
                <h1>Ayo mulai karir Anda disini!</h1>
                <p class="mb-5">Bangun masa depan Anda dengan menemukan pekerjaan impian Anda di sini.</p>
                <div>
                  <a href="<?php echo base_url('Login_pelamar')?>" class="btn btn-primary mr-2 mb-2">Masuk</a>
                  <a href="<?php echo base_url('Daftar') ?>" class="btn btn-primary mr-2 mb-2">Daftar Sekarang</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section bg-light" id="pelatihan-section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-8">
            <h2 class="section-title">DAFTAR TALENT TEST</h2>
            <p class="lead">
              Pilih paket talent test yang paling sesuai dengan kebutuhan Anda untuk memulai perjalanan karir Anda bersama kami.
            </p>
            <div class="mt-4">
              <div class="row justify-content-center">
                <div class="col-md-6">
                  <a href="<?php echo site_url('talent-test/login')?>" class="btn btn-outline-primary btn-lg btn-block">
                    <i class="fa fa-sign-in"></i> Login dengan Token Akses
                  </a>
                  <p class="mt-2">
                    <small>Sudah memiliki token akses? Masuk untuk mengakses dashboard talent test Anda.</small>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <?php if (empty($paket_list)) : ?>
            <div class="col-12 text-center" data-aos="fade-up">
              <div class="empty-state">
                <i class="fas fa-graduation-cap fa-3x mb-3"></i>
                <p>Mohon maaf, saat ini belum ada paket talent test yang tersedia.</p>
              </div>
            </div>
          <?php else : ?>
            <?php foreach ($paket_list as $paket) : ?>
              <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 text-center shadow-sm">
                  <div class="card-body d-flex flex-column">
                    <h5 class="card-title font-weight-bold text-primary">
                      <?php echo isset($paket['nama_paket']) ? htmlspecialchars($paket['nama_paket']) : 'Paket Talent Test'; ?>
                    </h5>
                    <p class="card-text text-muted">
                      <?php echo isset($paket['deskripsi']) ? htmlspecialchars($paket['deskripsi']) : 'Deskripsi paket'; ?>
                    </p>
                    <div class="mt-auto">
                      <h3 class="card-price my-3">
                        Rp. <?php echo isset($paket['Harga']) ? number_format($paket['Harga'], 0, ',', '.') : '0'; ?>
                      </h3>
                      <a href="<?php echo site_url('talent-test/daftar/' . (isset($paket['id_paket']) ? $paket['id_paket'] : '')); ?>" 
                        class="btn btn-primary btn-block">Pilih Paket</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="site-section" id="features-section">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-7 text-center mb-3">
            <h2 class="section-title">Lowongan Pekerjaan</h2>
            <p class="lead">Mulailah menemukan tujuan Anda dengan Choise. Lihat lowongan terbaru kami di bawah ini.</p>
          </div>
        </div>
        <div class="row align-items-stretch" data-aos="fade-up">
          <?php if (empty($yoman)) { ?>
            <div class="col-12 text-center mb-3">
              <br>
              <div class="empty-state">
                <i class="fas fa-briefcase fa-3x text-muted mb-3"></i>
                <h4>Mohon maaf untuk saat ini belum tersedia lowongan pekerjaan.</h4>
                <p>Sering - sering pantau website & sosmed kami untuk mendapatkan update terbaru.</p>
                <div class="social-links mt-3">
                  <a href="http://www.facebook.com/chaakraconsulting/" target="_blank" class="btn btn-outline-primary mr-2" aria-label="Facebook">
                    <i class="fab fa-facebook"></i> Facebook
                  </a>
                  <a href="http://www.instagram.com/chaakra.consulting" target="_blank" class="btn btn-outline-primary" aria-label="Instagram">
                    <i class="fab fa-instagram"></i> instagram
                  </a>
                </div>
              </div>
            </div>
          <?php } else { ?>
            <?php foreach ($yoman as $key) {
              $nama_perusahaan = isset($key['nama_perusahaan']) ? htmlspecialchars($key['nama_perusahaan']) : 'Perusahaan';
              $logo_perusahaan = isset($key['logo_perusahaan']) ? $key['logo_perusahaan'] : '';
              $nama_jabatan = isset($key['nama_jabatan']) ? htmlspecialchars($key['nama_jabatan']) : 'Lowongan';
            ?>
            <div class="col-md-6 col-lg-3 mb-3 mb-lg-3" data-aos="fade-up">
              <div class="unit-4 d-block">
                <div class="card-img-block">
                  <img style="width: 130px;" 
                    src="<?php echo (!empty($logo_perusahaan) ? base_url('./upload/logo_perusahaan/' . $logo_perusahaan) : base_url('./upload/logo_perusahaan/img_default.jpg')); ?>" 
                    alt="Logo <?php echo $nama_perusahaan ?>" 
                    class="card-img-top"
                    loading="lazy">
                </div>
                <br>
                <h5><?php echo $nama_jabatan ?></h5>
                <p><?php echo $nama_perusahaan ?></p>
                <div>
                  <a href="<?php echo base_url('Login_pelamar/') ?>" class="btn btn-primary mr-2 mb-2">Lamar Posisi</a>
                </div>
              </div>
            </div>
            <?php } ?>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="site-section" id="flow-section">
      <div class="container">
        <div class="row justify-content-center text-center" data-aos="fade-up">
          <div class="col-7 text-center mb-4">
            <h2 class="section-title">Alur Pendaftaran</h2>
          </div>
        </div>
        <div class="row align-items-stretch">
          <div class="col-md-6 col-lg-3 mb-3 mb-lg-3" data-aos="fade-up">
            <div class="text-center">
              <div class="card-img-block">
                <img src="<?php echo base_url('assets2/images/login.png')?>" 
                  alt="Langkah 1: Pendaftaran" 
                  class="card-img-top"
                  style="width: 50%;"
                  loading="lazy">
              </div>
              <br>
              <h3>1.</h3>
              <p>Pendaftaran baru, pilih menu Daftar di pojok kanan atas.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-3 mb-lg-3" data-aos="fade-up" data-aos-delay="100">
            <div class="text-center">
              <div class="card-img-block">
                <img src="<?php echo base_url('assets2/images/online-voting.png')?>" 
                  alt="Langkah 2: Isi Data" 
                  class="card-img-top"
                  style="width: 50%;"
                  loading="lazy">
              </div>
              <br>
              <h3>2.</h3>
              <p>Isi nama pengguna, email aktif, kata sandi, dan konfirmasi kata sandi untuk keperluan Daftar ke akun choise.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-3 mb-lg-3" data-aos="fade-up" data-aos-delay="200">
            <div class="text-center">
              <div class="card-img-block">
                <img src="<?php echo base_url('assets2/images/email.png') ?>" 
                  alt="Langkah 3: Aktivasi" 
                  class="card-img-block"
                  style="width: 50%;"
                  loading="lazy">
              </div>
              <br>
              <h3>3.</h3>
              <p>Aktivasi akun melalui tautan yang dikirimkan ke email Anda. Kemudian masuk ke akun choise Anda.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-3 mb-lg-3" data-aos="fade-up" data-aos-delay="200">
            <div class="text-center">
              <div class="card-img-block">
                <img src="<?php echo base_url('assets2/images/submit_2.png') ?>" 
                  alt="Langkah 4: Lengkapi Data" 
                  class="card-img-top"
                  style="width: 50%;"
                  loading="lazy">
              </div>
              <br>
              <h3>4.</h3>
              <p>Lengkapi data diri, data keluarga, data riwayat pendidikan formal, data riwayat pendidikan nonformal, dan data riwayat pendidikan.</p>
            </div>
          </div>
          <div class="col-mb-6 col-lg-3 mb-3 mb-lg-3" data-aos="fade-up">
            <div class="text-center">
              <div class="card-img-block">
                <img src="<?php echo base_url('assets2/images/file.png') ?>" 
                  alt="Langkah 5: Upload Berkas" 
                  class="card-img-block"
                  style="width: 50%;"
                  loading="lazy">
              </div>
              <br>
              <h3>5.</h3>
              <p>Upload kelengkapan berkas pendukung yang diminta.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-3 mb-lg-3" data-aos="fade-up" data-aos-delay="100">
            <div class="text-center">
              <div class="card-img-block">
                <img src="<?php echo base_url('assets2/images/apply.png') ?>" 
                  alt="Langkah 6: Pilih Lowongan" 
                  class="card-img-top"
                  style="width: 50%;"
                  loading="lazy">
              </div>
              <br>
              <h3>6.</h3>
              <p>Pilih lowongan pekerjaan yang sesuai dengan minat Anda.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-3 mb-lg-3" data-aos="fade-up" data-aos-delay="200">
            <div class="text-center">
              <div class="card-img-top">
                <img src="<?php echo base_url('assets2/images/submit_1.png') ?>" 
                  alt="Langkah 7: Kirim Lamaran" 
                  class="card-img-top"
                  style="width: 50%;"
                  loading="lazy">
              </div>
              <br>
              <h3>7.</h3>
              <p>Klik "Lamar Lowongan" dan isi formulir motivation letter. Kemudian klik tombol "Kirim".</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-3 mb-lg-3" data-aos="fade-up" data-aos-delay="200">
            <div class="text-center">
              <div class="card-img-block">
                <img src="<?php echo base_url('assets2/images/browser.png') ?>" 
                  alt="Langkah 8: Monitoring" 
                  class="card-img-top"
                  style="width: 50%;"
                  loading="lazy">
              </div>
              <br>
              <h3>8.</h3>
              <p>Anda telah berhasil mengirim lamaran. Silahkan rutin Anda cek pengumuman mengenai lowongan yang Anda lamar di menu pengumuman pada modul Lamaran Saya.</p>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section" id="faq-section">
      <div class="container">
        <div class="row justify-content-center text-center" data-aos="fade-up">
          <div class="col-7 text-center">
            <h2 class="section-title">FAQ</h2>
          </div>
        </div>
        <div class="row" data-aos="fade-up">
          <div class="col-md-12">
            <?php if (empty($faq)) : ?>
              <div class="text-center">
                <p>FAQ sedang dalam proses pembaruan.</p>
              </div>
            <?php else : ?>
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <?php $no = 1; foreach ($faq as $f) { ?>
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading<?php echo $no; ?>">
                      <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" 
                           href="#collapse<?php echo $no; ?>" aria-expanded="false" 
                           aria-controls="collapse<?php echo $no; ?>">
                          <?php echo isset($f['pertanyaan']) ? htmlspecialchars($f['pertanyaan']) : 'Pertanyaan'; ?>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse<?php echo $no; ?>" class="panel-collapse collapse" 
                         role="tabpanel" aria-labelledby="heading<?php echo $no; ?>">
                      <div class="panel-body">
                        <p><?php echo isset($f['jawaban']) ? $f['jawaban'] : 'Jawaban'; ?></p>
                      </div>
                    </div>
                  </div>
                <?php $no++; } ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<?php $this->load->view('layout2/footer') ?>