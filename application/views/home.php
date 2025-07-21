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
  <div id="overlayer"></div>
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

            <h1 class="mb-0 site-logo"><img src="<?php echo base_url('assets2/images/companylogohighrespng.png') ?>" alt="" style="width: 160px; height: auto;"></h1>

            <!-- <h1 class="mb-0 site-logo"><a href="index.html" class="text-black h2 mb-0">imagine<span class="text-primary">.</span> </a></h1> -->

          </div>



          <div class="col-12 col-md-6 col-xl-8 main-menu">

            <nav class="site-navigation position-relative text-right" role="navigation">

              <!-- <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block"> -->

              <ul class="nav justify-content-end site-menu main-menu">

                <li style="margin-left: -1000px;"><a href="#home-section" class="nav-link">BERANDA</a></li>

                <li><a href="#features-section" class="nav-link">LOWONGAN</a></li>

                <li><a href="#flow-section" class="nav-link">ALUR PENDAFTARAN</a></li>

                <li><a href="#pelatihan-section" class="nav-link">PELATIHAN / TALENT TEST</a></li>

                <li><a href="#faq-section" class="nav-link">FAQ</a></li>

                <li><a href="<?php echo base_url('Login_pelamar/') ?>" class="nav-link">MASUK / DAFTAR</a></li>

                <!-- Commented by Tobi 4 Feb 2021 -->

                <!--       <li><a href="<?php echo base_url('Daftar') ?>" class="nav-link">DAFTAR</a></li>	-->

                <!--                 <li><a href="#testimonials-section" class="nav-link">FAQ</a></li>

  <li><a href="#blog-section" class="nav-link">HUBUNGI KAMI</a></li> -->

                <!--                 <li><a class="nav-link">MASUK</a></li>

  <li><a class="nav-link">REGISTRASI</a></li> -->

              </ul>

            </nav>

          </div>





          <div class="col-6 col-md-9 d-inline-block d-lg-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a></div>

        </div>

      </div>

    </header>

    <br>

    <br>

    <br>

    <br>

    <div class="site-blocks-cover" style="overflow: hidden;">
      <div class="container">
        <br>
        <div id="notifikasi">
          <?php if ($this->session->flashdata('msg_home')) : ?>
            <div class="alert alert-primary">
              <?php echo $this->session->flashdata('msg_home');
              $this->session->set_flashdata('msg_home');  ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12" style="position: relative;" data-aos="fade-up" data-aos-delay="200">
            <img src="<?php echo base_url('assets2/images/headerimage.jpg') ?>" alt="Image" class="img-fluid img-absolute">
            <div class="row mb-4" data-aos="fade-up" data-aos-delay="200">
              <div class="col-lg-6 mr-auto">
                <h1>Ayo mulai karir Anda disini!</h1>
                <p class="mb-5">Bangun masa depan Anda dengan menemukan pekerjaan impian Anda di sini.</p>
                <div>
                  <a href="<?php echo base_url('Login_pelamar') ?>" class="btn btn-primary mr-2 mb-2">Masuk</a>
                  <a href="<?php echo base_url('Daftar') ?>" class="btn btn-primary mr-2 mb-2">Daftar Sekarang</a>
                </div>
              </div>
            </div>
          </div>
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

        <!-- -------------------- -->

        <!-- <div class="row justify-content-center text-center" data-aos="fade-up">

          <div class="col-7 text-center mb-3">

            <h4><b>Tanggal Penting Proses Seleksi Pegawai Baru PT. ITS Tekno Sains Tahun 2022</b></h4></br>

          </div>

        </div>

        <div class="container" data-aos="fade-up">

          <div class="row align-items-stretch" data-aos="fade-up">

            <div class="col-7 text-center">

              <div class="row">

                <table class="table table-hover table-bordered">

                  <tr>

                    <th class="text-center">No</th>

                    <th class="text-center">Tanggal Pelaksanaan</th>

                    <th class="text-center">Kegiatan</th>

                  </tr>

                  <tr>

                    <td>1.</td>

                    <td>22 - 23 Maret 2022</td>

                    <td>Registrasi Online</td>

                  </tr>

                  <tr>

                    <td>2.</td>

                    <td>24 - 25 Maret 2022</td>

                    <td>Psikotes Online</td>

                  </tr>

                  <tr>

                    <td>3.</td>

                    <td>26 - 27 Maret 2022</td>

                    <td>Wawancara Kompetensi</td>

                  </tr>

                  <tr>

                    <td>4.</td>

                    <td>29 -30 Maret 2022</td>

                    <td>Tes Online Bahasa Inggris</td>

                  </tr>

                  <tr>

                    <td>5.</td>

                    <td>1 - 3 April 2022</td>

                    <td>Tes Kemampuan Bidang (TKB) Online</td>

                  </tr>

                  <tr>

                    <td>6.</td>

                    <td>11 - 13 April 2022</td>

                    <td>Wawancara User &#42;</td>

                  </tr>

                  <tr>

                    <td>7.</td>

                    <td>16 April 2022</td>

                    <td>Tes Kesehatan &#42;</td>

                  </tr>

                </table>

              </div>

              <div class="row">

                <a class="text-start">&#42; : Jadwal bersifat tentatif</a>

              </div>

            </div>

            <div class="col-5 text-center">

              <br><br>

              <p><b>Sering-sering pantau website & sosmed kami :</b></p>

              <p>

                <a href="https://www.chaakraconsulting.com/" target="blank" class="p-3"><span class="icon-globe"></span></a>

                <a href="https://www.chaakraconsulting.com/"><b>Chaakra Consulting</b></a>

              </p>

              <p>

                <a href="https://www.facebook.com/chaakraconsulting/" target="blank" class="p-3"><span class="icon-facebook"></span></a>

                <a href="https://www.facebook.com/chaakraconsulting/"><b>Chaakra Consulting</b></a>

              </p>

              <p>

                <a href="https://www.instagram.com/chaakraconsulting/" target="blank" class="p-3"><span class="icon-instagram"></span></a>

                <a href="https://www.instagram.com/chaakraconsulting/"><b>Chaakra Consulting</b></a>

              </p>

              <p><b>untuk mendapatkan update terbaru.</b></p></br>

            </div>

          </div>

        </div> -->





        <!-- Edited by Tobi 3 Feb 2021 -->

        <!-- Menampilkan data di home sampai waktu yg di tentukan -->



        <div class="row align-items-stretch" data-aos="fade-up">

          <?php

          if (!$yoman) { ?>

            <div class="col-12 text-center mb-3">

              <br>

              <h4><b>Mohon maaf untuk saat ini belum tersedia lowongan pekerjaan.</b></h4></br>

            </div>

        </div>



        <div class="row align-items-stretch" data-aos="fade-up">

          <div class="col-12 text-center mb-3">

            <br>

            <p><b>Sering-sering pantau sosmed kami :</b></p>

            <p>

              <a href="https://www.facebook.com/chaakraconsulting/" target="blank" class="p-3"><span class="icon-facebook"></span></a>

              <a href="https://www.facebook.com/chaakraconsulting/"><b>Chaakra Consulting</b></a>

            </p>

            <p>

              <a href="https://www.instagram.com/chaakraconsulting/" target="blank" class="p-3"><span class="icon-instagram"></span></a>

              <a href="https://www.instagram.com/chaakra.consulting/"><b>Chaakra Consulting</b></a>

            </p>

            <p><b>untuk mendapatkan update terbaru.</b></p></br>

          </div>

        </div>



      <?php } else { ?>



        <!-- UNTUK RSUD KRIAN -->



        <!-- <div class="container" data-aos="fade-up">

          <div class="row align-items-stretch" data-aos="fade-up">

            <div class="col-7 text-center">

              <table class="table table-hover table-bordered">

                <tr>

                  <th class="text-center">No</th>

                  <th class="text-center">Tanggal Pelaksanaan</th>

                  <th class="text-center">Kegiatan</th>

                </tr>

                <tr>

                  <td>1.</td>

                  <td>19-22 Januari 2022</td>

                  <td>Pendaftaran secara Online.</td>

                </tr>

                <tr>

                  <td>2.</td>

                  <td>30 Januari 2022</td>

                  <td>Pengumuman Kelolosan Seleksi Administrasi.</td>

                </tr>

                <tr>

                  <td>3.</td>

                  <td>31 Januari 2022</td>

                  <td>Pelaksanaan Tes Tulis.</td>

                </tr>

                <tr>

                  <td>4.</td>

                  <td>2 Februari 2022</td>

                  <td>Pelaksanaan Psikotest.</td>

                </tr>

                <tr>

                  <td>5.</td>

                  <td>4 Februari 2022</td>

                  <td>Pelaksanaan Tes Wawancara.</td>

                </tr>

              </table>

            </div>

            <div class="col-5 text-center">

              <br><br>

              <p><b>Sering-sering pantau website & sosmed kami :</b></p>

              <p>

                <a href="https://www.chaakraconsulting.com/" target="blank" class="p-3"><span class="icon-globe"></span></a>

                <a href="https://www.chaakraconsulting.com/"><b>Chaakra Consulting</b></a>

              </p>

              <p>

                <a href="https://www.facebook.com/chaakraconsulting/" target="blank" class="p-3"><span class="icon-facebook"></span></a>

                <a href="https://www.facebook.com/chaakraconsulting/"><b>Chaakra Consulting</b></a>

              </p>

              <p>

                <a href="https://www.instagram.com/chaakraconsulting/" target="blank" class="p-3"><span class="icon-instagram"></span></a>

                <a href="https://www.instagram.com/chaakraconsulting/"><b>Chaakra Consulting</b></a>

              </p>

              <p><b>untuk mendapatkan update terbaru.</b></p></br>

            </div>

          </div>

        </div>

      </div>

      <div class="row align-items-stretch" data-aos="fade-up">

        <div class="col-12 text-center mb-3">

          <br>

          <h4><b>Lowongan Tersedia</b></h4></br>

        </div>

      </div>

      <div class="row" data-aos="fade-up">

        <div class="col-lg-4">

          <div class="table-responsive">

            <table class="table table-hover table-bordered" id="sampleTable">

              <thead>

                <tr>

                  <th class="text-center">RSUD KRIAN</th>

                </tr>

              </thead>

              <tbody>

                <?php

                $i = 1;

                foreach ($yoman as $key) {

                  $id_lowongan = $key['id_lowongan'];

                  $id_perusahaan = $key['id_perusahaan'];



                  $perusahaan = $this->db->query("SELECT * FROM tb_perusahaan");



                  foreach ($perusahaan->result() as $key_perusahaan) {

                    if ($key_perusahaan->id_perusahaan == $key['id_perusahaan']) {

                      if ($key_perusahaan->id_perusahaan == "8") {

                        echo "<tr>";



                        echo "<td>" ?>

                        <a href="<?php echo base_url('Login_pelamar/') ?>" class="text"><?php echo $i . ". " . $key['nama_jabatan'] ?></a>

                <?php



                        echo "</td></tr>";

                        $i = $i + 1;
                      }
                    }
                  }
                }

                ?>

              </tbody>

            </table>

          </div>

        </div>

        <div class="col-lg-4">

          <div class="table-responsive">

            <table class="table table-hover table-bordered" id="sampleTable">

              <thead>

                <tr>

                  <th class="text-center">Puskesmas Se-Kabupaten Sidoarjo</th>

                </tr>

              </thead>

              <tbody>

                <?php

                $iii = 1;

                foreach ($yoman as $key) {

                  $id_lowongan = $key['id_lowongan'];

                  $id_perusahaan = $key['id_perusahaan'];



                  $perusahaan = $this->db->query("SELECT * FROM tb_perusahaan");



                  foreach ($perusahaan->result() as $key_perusahaan) {

                    if ($key_perusahaan->id_perusahaan == $key['id_perusahaan']) {

                      if ($key_perusahaan->id_perusahaan == "10") {

                        echo "<tr>";



                        echo "<td>" ?>

                        <a href="<?php echo base_url('Login_pelamar/') ?>" class="text"><?php echo $iii . ". " . $key['nama_jabatan'] ?></a>

                <?php



                        echo "</td></tr>";
                      }
                    }
                  }

                  $iii = $iii + 1;
                }

                ?>

              </tbody>

            </table>

          </div>

        </div>

        <div class="col-lg-4">

          <div class="table-responsive">

            <table class="table table-hover table-bordered" id="sampleTable">

              <thead>

                <tr>

                  <th class="text-center">Dinas Kesehatan Sidoarjo</th>

                </tr>

              </thead>

              <tbody>

                <?php

                $ii = 1;

                foreach ($yoman as $key) {

                  $id_lowongan = $key['id_lowongan'];

                  $id_perusahaan = $key['id_perusahaan'];



                  $perusahaan = $this->db->query("SELECT * FROM tb_perusahaan");



                  foreach ($perusahaan->result() as $key_perusahaan) {

                    if ($key_perusahaan->id_perusahaan == $key['id_perusahaan']) {

                      if ($key_perusahaan->id_perusahaan == "9") {

                        echo "<tr>";

                        echo "<td>" ?>

                        <a href="<?php echo base_url('Login_pelamar/') ?>" class="text"><?php echo $ii . ". " . $key['nama_jabatan'] ?></a>

                <?php



                        echo "</td></tr>";
                      }
                    }
                  }

                  $ii = $ii + 1;
                }

                ?>

              </tbody>

            </table>

          </div>

        </div>

      </div> -->



        <!-- BATAS RSUD KRIAN -->



        <?php

            foreach ($yoman as $key) {

              $perusahaan = $this->db->query("SELECT * FROM tb_perusahaan");

              foreach ($perusahaan->result() as $key_perusahaan) {

                if ($key_perusahaan->id_perusahaan == $key['id_perusahaan']) {

                  $nama_perusahaan = $key_perusahaan->nama_perusahaan;

                  $logo_perusahaan = $key_perusahaan->logo_perusahaan;

        ?>

              <div class="col-md-6 col-lg-3 mb-3 mb-lg-3" data-aos="fade-up">

                <div class="unit-4 d-block">

                  <div class="card-img-block">

                    <img style="width: 130px" class="card-img-top" src="<?php echo ($logo_perusahaan != '' ? base_url('./upload/logo_perusahaan/' . $logo_perusahaan) : base_url('./upload/logo_perusahaan/img_default.jpg')); ?>">

                  </div><br>

                  <h5><?php echo $key['nama_jabatan'] ?></h5>

                  <p><?php echo $nama_perusahaan ?></p>

                  <div>

                    <a href="<?php echo base_url('Login_pelamar/') ?>" class="btn btn-primary mr-2 mb-2">Lamar Posisi</a>

                  </div>

                </div>

              </div>

      <?php }
              }
            }
          } ?>



      </div>

    </div>

    <!-- </div> -->



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



                <img class="card-img-top" src="<?php echo base_url('assets2/images/login.png') ?>" style="width:50%;" alt="Card image cap">



              </div><br>



              <h3>1.</h3>



              <p>Pendaftaran baru, pilih menu Daftar di pojok kanan atas.</p>



            </div>



          </div>



          <div class="col-md-6 col-lg-3 mb-3 mb-lg-3" data-aos="fade-up" data-aos-delay="100">



            <div class="text-center">



              <div class="card-img-block">



                <img class="card-img-top" src="<?php echo base_url('assets2/images/online-voting.png') ?>" style="width:50%;" alt="Card image cap">



              </div><br>



              <h3>2.</h3>



              <p>Isi nama pengguna, email aktif, kata sandi, dan konfirmasi kata sandi untuk keperluan Daftar ke akun choise.</p>



            </div>



          </div>



          <div class="col-md-6 col-lg-3 mb-3 mb-lg-3" data-aos="fade-up" data-aos-delay="200">



            <div class="text-center">



              <div class="card-img-block">



                <img class="card-img-top" src="<?php echo base_url('assets2/images/email.png') ?>" style="width:50%;" alt="Card image cap">



              </div><br>



              <h3>3.</h3>



              <p>Aktivasi akun melalui tautan yang dikirimkan ke email Anda. Kemudian masuk ke akun choise Anda.</p>



            </div>



          </div>



          <div class="col-md-6 col-lg-3 mb-3 mb-lg-3" data-aos="fade-up" data-aos-delay="200">



            <div class="text-center">



              <div class="card-img-block">



                <img class="card-img-top" src="<?php echo base_url('assets2/images/submit_2.png') ?>" style="width:50%;" alt="Card image cap">



              </div><br>



              <h3>4.</h3>



              <p>Lengkapi data diri, data keluarga, data riwayat pendidikan formal, data riwayat pendidikan non formal, dan data riwayat pendidikan.</p>



            </div>



          </div>



          <div class="col-md-6 col-lg-3 mb-3 mb-lg-3" data-aos="fade-up">



            <div class="text-center">



              <div class="card-img-block">



                <img class="card-img-top" src="<?php echo base_url('assets2/images/file.png') ?>" style="width:50%;" alt="Card image cap">



              </div><br>



              <h3>5.</h3>



              <p>Upload kelengkapan berkas pendukung yang diminta.</p>



            </div>



          </div>



          <div class="col-md-6 col-lg-3 mb-3 mb-lg-3" data-aos="fade-up" data-aos-delay="100">



            <div class="text-center">



              <div class="card-img-block">



                <img class="card-img-top" src="<?php echo base_url('assets2/images/apply.png') ?>" style="width:50%;" alt="Card image cap">



              </div><br>



              <h3>6.</h3>



              <p>Pilih lowongan pekerjaan yang sesuai dengan minat Anda.</p>



            </div>



          </div>



          <div class="col-md-6 col-lg-3 mb-3 mb-lg-3" data-aos="fade-up" data-aos-delay="200">



            <div class="text-center">



              <div class="card-img-block">



                <img class="card-img-top" src="<?php echo base_url('assets2/images/submit_1.png') ?>" style="width:50%;" alt="Card image cap">



              </div><br>



              <h3>7.</h3>



              <p>Klik "Lamar Lowongan" dan isi formulir motivation letter. Kemudian klik tombol "Kirim".</p>



            </div>



          </div>



          <div class="col-md-6 col-lg-3 mb-3 mb-lg-3" data-aos="fade-up" data-aos-delay="200">



            <div class="text-center">



              <div class="card-img-block">



                <img class="card-img-top" src="<?php echo base_url('assets2/images/browser.png') ?>" style="width:50%;" alt="Card image cap">



              </div><br>



              <h3>8.</h3>



              <p>Anda telah berhasil mengirim lamaran. Silahkan rutin Anda cek pengumuman mengenai lowongan yang Anda lamar di menu pengumuman pada modul Lamaran Saya.</p>



            </div>



          </div>



          <!-- <div class="col-md-6 col-lg-3 mb-3 mb-lg-3" data-aos="fade-up" data-aos-delay="200">



            <div class="text-center">



              <div class="card-img-block">



                <img class="card-img-top" src="images/login.png" style="width:50%;" alt="Card image cap">



              </div><br>



              <h3>1.</h3>



              <p>Pendaftaran baru, pilih menu registrasi di pojok kanan atas.</p>



            </div>



          </div> -->



        </div>



      </div>



    </div>



    <div class="site-section" id="pelatihan-section">

      <div class="container">

        <div class="row justify-content-center text-center" data-aos="fade-up">

          <div class="col-7 text-center">

            <h2 class="section-title">DAFTAR PELATIHAN / TALENT TEST</h2>

          </div>

        </div>

        <div class="row" data-aos="fade-up">

          <div class="col-md-5">

            <div class="panel-group align-items-stretch" id="accordion" role="tablist" aria-multiselectable="true">

              <div class="text-center">

                <div class="row">

                  <table class="table table-hover table-bordered">

                    <tr>

                      <th class="text-center">No</th>

                      <th class="text-center">Tanggal Pelaksanaan</th>

                      <th class="text-center">Pelatihan / Talent Test</th>

                    </tr>

                    <?php

                    $d_pelatihan = $this->db->query("SELECT * FROM tb_pelatihan where status='aktif'")->result();

                    $no = 1;

                    foreach ($d_pelatihan as $key) {

                    ?>

                      <tr>

                        <td><?= $no ?></td>

                        <td><?php

                            if ($key->jenis == 'talent') {

                              echo 'Appointment';
                            } else {

                              echo $key->tanggal_pelatihan;
                            }  ?></td>

                        <td><?= $key->nama_pelatihan ?></td>

                      </tr>

                    <?php $no++;
                    } ?>

                  </table>

                </div>

              </div>

            </div>

          </div>

          <div class="col-md-7">

            <div class="panel-group align-items-stretch" id="accordion" role="tablist" aria-multiselectable="true">

              <form action="<?php echo base_url('Home/inputpelatihan') ?>" method="post">

                <div class="mb-3">

                  <label for="Select" class="form-label"><b>Pelatihan / Talent Test</b></label>

                  <select id="Select" class="form-control" name="pelatihan">

                    <?php foreach ($d_pelatihan as $key) {

                    ?>

                      <option value="<?= $key->id_pelatihan ?>"><?= $key->nama_pelatihan ?></option>

                    <?php $no++;
                    } ?>

                  </select>

                </div>

                <div class="mb-3">

                  <label for="Inputnama" class="form-label"><b>Nama Lengkap</b></label>

                  <input type="text" class="form-control" id="Inputnama" aria-describedby="namaHelp" name="nama">

                  <div id="namaHelp" class="form-text">Diawajibkan menggunakan nama lengkap</div>

                </div>

                <div class="mb-3">

                  <label for="Inputemail" class="form-label"><b>E-mail</b></label>

                  <input type="email" class="form-control" id="Inputemail" aria-describedby="emailHelp" name="email">

                  <div id="emailHelp" class="form-text">Gunakan e-mail yang valid</div>

                </div>

                <div class="mb-3">

                  <label for="Inputno" class="form-label"><b>Telepon / WhatsApp</b></label>

                  <input type="text" class="form-control" id="Inputno" aria-describedby="noHelp" name="telp">

                  <div id="noHelp" class="form-text">Gunakan nomor telepon / WhatsApp yang dapat dihubungi</div>

                </div>

                <div class="mb-3">

                  <label for="Inputpe" class="form-label"><b>Pendidikan / Pekerjaan</b></label>

                  <input type="text" class="form-control" id="Inputpe" aria-describedby="pekerjaanHelp" name="pendidikan">

                </div>

                <div class="mb-3">

                  <label for="Inputbid" class="form-label"><b>Minat / Bidang Pekerjaan</b></label>

                  <input type="text" class="form-control" id="Inputbid" aria-describedby="bidangHelp" name="bidang">

                </div>

                <div class="mb-3">

                  <label for="Inputsekolah" class="form-label"><b>Sekolah / Instansi</b></label>

                  <input type="text" class="form-control" id="Inputsekolah" aria-describedby="emailHelp" name="sekolah">

                </div>

                <button type="submit" class="btn btn-primary">DAFTAR</button>

              </form>

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

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

              <?php $no = 1;

              foreach ($faq as $f) { ?>

                <div class="panel panel-default">

                  <div class="panel-heading" role="tab" id="headingOne">

                    <h4 class="panel-title">

                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $no; ?>" aria-expanded="false" aria-controls="collapseOne">

                        <?= $f['pertanyaan']; ?>

                      </a>

                    </h4>

                  </div>

                  <div id="collapse<?= $no; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">

                    <div class="panel-body">

                      <p><?= $f['jawaban']; ?></p>

                    </div>

                  </div>

                </div>

              <?php $no++;
              } ?>

            </div>

          </div>

          <!--- END COL -->

        </div>

        <!--- END ROW -->

      </div>

    </div>







  </div>



  <?php $this->load->view('layout2/footer') ?>