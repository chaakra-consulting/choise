<?php $this->load->view('layout/header'); ?>

<?php $this->load->view('layout/sidebar'); ?>

<main class="app-content">

  <div class="app-title">

    <div>

      <h1><i class="fa fa-th-list"></i> Data Nilai Pelamar</h1>

    </div>

    <ul class="app-breadcrumb breadcrumb">

      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>

      <li class="breadcrumb-item">User</li>

      <li class="breadcrumb-item"><a href="#">Data Nilai Pelamar</a></li>

    </ul>

  </div>

  <div class="row">

    <div class="col-md-12">

      <div class="tile">

        <div id="notifikasi">

          <?php if ($this->session->flashdata('msg')) : ?>

            <div class="alert alert-primary">

              <?php echo $this->session->flashdata('msg') ?>

            </div>

          <?php endif; ?>

          <?php if ($this->session->flashdata('msg_update')) : ?>

            <div class="alert alert-primary">

              <?php echo $this->session->flashdata('msg_update') ?>

            </div>

          <?php endif; ?>

          <?php if ($this->session->flashdata('msg_hapus')) : ?>

            <div class="alert alert-danger">

              <?php echo $this->session->flashdata('msg_hapus') ?>

            </div>

          <?php endif; ?>

        </div>

        <?php

        $cfit = $this->db->query("SELECT nama_ujian from tb_ujian")->result();

        $holland = $this->db->query("SELECT nama_ujian from tb_ujian_holland")->result();

        $papikostik = $this->db->query("SELECT nama_ujian from tb_ujian_papi")->result();

        $leadership = $this->db->query("SELECT nama_ujian from tb_ujian_leadership")->result();

        $msdt = $this->db->query("SELECT nama_ujian from tb_ujian_msdt")->result();

        $epps = $this->db->query("SELECT nama_ujian from tb_ujian_epps")->result();

        $ist = $this->db->query("SELECT nama_ujian from tb_ujian_msdt")->result();

        $disc = $this->db->query("SELECT nama_ujian from tb_ujian_disc")->result();

        ?>

        <div class="tile-body">

          <div class="table-responsive">

            <table class="table table-hover table-bordered" id="sampleTable">

              <thead>

                <tr align="center">

                  <th rowspan='2'>Nama Pelamar</th>

                  <th rowspan='2'>Posisi Jabatan</th>

                  <!-- <th rowspan='2'>Nama Perusahaan</th> -->

                  <th rowspan='2'>CFIT - <?= $cfit[0]->nama_ujian ?></th>

                  <th rowspan='2'>Holland - <?= $holland[0]->nama_ujian ?></th>

                  <th rowspan='2'>Papikostik - <?= $papikostik[0]->nama_ujian ?></th>

                  <th rowspan='2'>Leadership - <?= $leadership[0]->nama_ujian ?></th>

                  <th rowspan='2'>MSDT - <?= $msdt[0]->nama_ujian ?></th>

                  <th rowspan='2'>EPPS - <?= $epps[0]->nama_ujian ?></th>

                  <th rowspan='2'>IST - <?= $ist[0]->nama_ujian ?></th>

                  <th rowspan='2'>DISC - <?= $disc[0]->nama_ujian ?></th>

                  <th colspan='7'>Wawancara</th>

                  <th rowspan='2'>Kesimpulan Keseluruhan</th>

                  <th rowspan='2'>Aksi</th>

                </tr>

                <tr align="center">

                  <th>Kemampuan Teknis</th>

                  <th>Perhatian Terhadap Ketidakjelasan Intruksi</th>

                  <th>Inisiatif</th>

                  <th>Kerjasama</th>

                  <th>Komitmen</th>

                  <th>Kepemimpinan (khusus manajerial)</th>

                  <th>Kesimpulan</th>

                </tr>

              </thead>

              <tbody>

                <?php

                $modal = 0;

                foreach ($array as $key) {

                  $id_pelamar = $key['id_pelamar'];

                  $lowongan = $key['id_lowongan'];

                  $nmLowongan = $this->db->query("SELECT * FROM tb_lowongan");

                  $namaPer = $this->db->query("SELECT * FROM tb_perusahaan");



                  foreach ($nmLowongan->result() as $key_per) {

                    $idLowong = $key_per->id_lowongan;

                    $idPerus = $key_per->id_perusahaan;

                    if ($idLowong == $key['id_lowongan']) {

                      $namaJabatan = $key_per->nama_jabatan;

                      foreach ($namaPer->result() as $keyNama) {

                        if ($idPerus == $keyNama->id_perusahaan) {

                          $nmPerusahaan =  $keyNama->nama_perusahaan;

                        }

                      }

                    }

                  }



                  $dataDiri = $this->db->query("SELECT * FROM tb_data_diri");

                  foreach ($dataDiri->result() as $key_diri) {

                    if ($id_pelamar == $key_diri->id_pelamar) {

                      $nama_pelamar = $key_diri->nama_pelamar;

                    }

                  }

                ?>

                  <tr>

                    <td><?php echo $nama_pelamar ?></td>

                    <td><?php echo $namaJabatan ?></td>

                    <!-- <td><?php echo $nmPerusahaan ?></td> -->

                    <td><?php echo $key['cfit_kategori'] == '' ? '-' : $key['cfit_kategori']; ?></td>

                    <td><?php echo $key['holland_kategori'] == '' ? '-' : $key['holland_kategori']; ?></td>

                    <td><?php echo $key['papi_kategori'] == '' ? '-' : $key['papi_kategori']; ?></td>

                    <td><?php echo $key['leadership_kategori'] == '' ? '-' : $key['leadership_kategori']; ?></td>

                    <td><?php echo $key['msdt_kategori'] == '' ? '-' : $key['msdt_kategori']; ?></td>

                    <td><?php echo $key['epps_kategori'] == '' ? '-' : $key['epps_kategori']; ?></td>

                    <td><?php echo $key['ist_kategori'] == '' ? '-' : $key['ist_kategori']; ?></td>

                    <td><?php echo $key['disc_m_kategori'] == '' ? '-' : $key['disc_m_kategori']; ?></td>

                    <td><?php echo $key['kemampuan_teknis'] == '' ? '-' : $key['kemampuan_teknis']; ?></td>

                    <td><?php echo $key['perhatian_terhadap_ketidakjelasan_intruksi'] == '' ? '-' : $key['perhatian_terhadap_ketidakjelasan_intruksi']; ?></td>

                    <td><?php echo $key['inisiatif'] == '' ? '-' : $key['inisiatif']; ?></td>

                    <td><?php echo $key['kerjasama'] == '' ? '-' : $key['kerjasama']; ?></td>

                    <td><?php echo $key['komitmen'] == '' ? '-' : $key['komitmen']; ?></td>

                    <td><?php echo $key['kepemimpinan'] == '' ? '-' : $key['kepemimpinan']; ?></td>

                    <td><?php echo $key['hasil_wawancara'] == '' ? '-' : $key['hasil_wawancara']; ?></td>

                    <td><?php echo $key['kesimpulan'] == '' ? '-' : $key['kesimpulan']; ?></td>

                    <td>

                      <a href="<?php echo base_url('Perusahaan/Data_nilai/detail_nilai/' . $key['id_nilai']) ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>

                    </td>

                  </tr>

                <?php $modal++;

                } ?>

              </tbody>

            </table>

          </div>

        </div>

      </div>

    </div>

  </div>

</main>

<?php $this->load->view('layout/footer'); ?>