<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>
<!-- Button trigger modal -->

<!-- Modal -->
<style>
  /* HTML: <div class="loader"></div> */
  .loader {
    width: 120px;
    height: 44px;
    padding: 4px 0;
    box-sizing: border-box;
    display: flex;
    animation: l5-0 3s infinite steps(6);
    background:
      linear-gradient(#000 0 0) 0 0/0% 100% no-repeat,
      radial-gradient(circle 6px, #eeee89 90%, #0000) 0 0/20% 100% #000;
    overflow: hidden;
  }

  .loader::before {
    content: "";
    width: 40px;
    transform: translate(-100%);
    border-radius: 50%;
    background: #ffff2d;
    animation:
      l5-1 .25s .153s infinite steps(5) alternate,
      l5-2 3s infinite linear;
  }

  @keyframes l5-1 {
    0% {
      clip-path: polygon(50% 50%, 100% 0, 100% 0, 0 0, 0 100%, 100% 100%, 100% 100%)
    }

    100% {
      clip-path: polygon(50% 50%, 100% 65%, 100% 0, 0 0, 0 100%, 100% 100%, 100% 35%)
    }
  }

  @keyframes l5-2 {
    100% {
      transform: translate(90px)
    }
  }

  @keyframes l5-0 {
    100% {
      background-size: 120% 100%, 20% 100%
    }
  }
</style>
<div class="modal fade" id="modalDownloadPelamar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Lowongan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post" id="formDownloadPelamar">
        <div class="modal-body">
          <div class="mb-2">
            <div class="card">
              <div class="card-body">
                <table id="table-lowongan">
                </table>
              </div>
            </div>
          </div>
          <div id="loading-data">
            <div class="d-flex justify-content-center">
              <div class="m-4">
                <div class="loader"></div>
              </div>
            </div>
          </div>
          <div id="container-form">
            <div class="form-group">
              <label for="tingkat_pendidikan">Tingkat Pendidikan</label>
              <select name="tingkat_pendidikan" id="tingkat_pendidikan" class="form-control">
                <option value="">-- Urut Berdasarkan --</option>
                <option value="SMP">SMP</option>
                <option value="SMA/SMK">SMA/SMK</option>
                <option value="D3">D3</option>
                <option value="D4/S1">D4/S1</option>
                <option value="S2">S2</option>
                <option value="S3">S3</option>
              </select>
            </div>
            <div class="form-group">
              <label for="gaji">Range Gaji</label>
              <select name="gaji" id="gaji" class="form-control">
                <option value="">-- Urut Berdasarkan --</option>
                <option value="up">Paling Tinggi</option>
                <option value="down">Paling Rendah</option>
              </select>
            </div>
            <div class="form-group">
              <label for="usia">Usia</label>
              <select name="usia" id="usia" class="form-control">
                <option value="">-- Urut Berdasarkan --</option>
                <option value="up">Paling Tinggi</option>
                <option value="down">Paling Rendah</option>
              </select>
            </div>
          </div>
          <div id="container-results-tabs">
            <ul class="nav nav-tabs" id="city-tabs" role="tabList"></ul>
            <div class="tab-content" id="city-tab-content" style="height: 500px; overflow-x: auto; padding-top: 10px;"></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-danger" id="btnKembaliSorting">Kembali</button>
          <a href="#" class="btn btn-success" id="btnDownloadPelamar" style="display: none;"><i class="fa fa-dowload"></i> Download</a>
          <button type="submit" class="btn btn-primary" id="btnPreviewPelamar">Preview</button>
        </div>
      </form>
    </div>
  </div>
</div>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Data Lowongan</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item"><a href="#">Data Lowongan</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <a href="<?php echo base_url('Administrator/Data_lowongan/tambahdata') ?>" class="btn btn-primary" style="margin-bottom: 2%;">Tambah Data</a>
        <div id="notifikasi">
          <?php if ($this->session->flashdata('msg_success')) : ?>
            <div class="alert alert-primary">
              <?php echo $this->session->flashdata('msg_success') ?>
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
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Posisi Jabatan</th>
                  <th>Perusahaan</th>
                  <th>Jenis Lowongan</th>
                  <th>Jadwal Seleksi</th>
                  <th>Kota Penempatan</th>
                  <th>Persyaratan</th>
                  <th>Gaji</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $modal = 0;
                $no = 1;
                foreach ($array as $key) {
                  $perusahaan = $this->db->query("SELECT * FROM tb_perusahaan WHERE id_perusahaan=" . $key['id_perusahaan'])->result();
                ?>
                  <div class="modal fade" id="myModal<?php echo $modal ?>" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Hapus</h4>
                        </div>
                        <div class="modal-body">
                          <p>Apakah anda yakin akan menghapus lowongan <b><?php echo $key['nama_jabatan'] ?></b> dari perusahaan <b><?= $perusahaan[0]->nama_perusahaan ?></b>?</p>
                          <p>Menghapus lowongan ini akan menghapus semua data yang berkaitan dengan lowongan</p>
                        </div>
                        <div class="modal-footer">
                          <a href="<?php echo base_url('Administrator/Data_lowongan/hapus_lowongan/' . $key['id_lowongan']) ?>" title="Hapus Data"><button type="button" class="btn btn-danger">Hapus <i class="fa fa-trash"></i></button></a>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="myModal2<?php echo $modal ?>" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Hapus</h4>
                        </div>
                        <div class="modal-body">
                          <p>Apakah anda yakin akan menyembunyikan lowongan <b><?php echo $key['nama_jabatan'] ?></b> perusahaan <b><?= $perusahaan[0]->nama_perusahaan ?></b>? dari front end?</p>
                        </div>
                        <div class="modal-footer">
                          <a href="<?php echo base_url('Administrator/Data_lowongan/sembunyikan_lowongan/' . $key['id_lowongan']) ?>" title="Sembunyikan Data"><button type="button" class="btn btn-danger">Sembunyikan <i class="fa fa-eye-slash"></i></button></a>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $key['nama_jabatan'] ?></td>
                    <?php
                    $nama_perusahaan = '';
                    $perusahaan = $this->db->query("SELECT * FROM tb_perusahaan");
                    foreach ($perusahaan->result() as $key_perusahaan) {
                      if ($key_perusahaan->id_perusahaan == $key['id_perusahaan']) { ?>
                        <?php $nama_perusahaan = $key_perusahaan->nama_perusahaan; ?>
                        <td><?php echo $name_company = $key_perusahaan->nama_perusahaan ?></td>
                      <?php } ?>
                    <?php } ?>

                    <?php
                    $jenis_lowongan = '';
                    $jenis = $this->db->query("SELECT * FROM tb_jenis_motlet");
                    foreach ($jenis->result() as $key_jenis) {
                      if ($key_jenis->id_jenis_motlet == $key['id_jenis_motlet']) { ?>
                        <td><?php
                            $jenis_lowongan = $key_jenis->jenis_motlet;
                            echo $key_jenis->jenis_motlet ?></td>
                      <?php } ?>
                    <?php } ?>
                    <td><?php echo $key['jadwal_seleksi'] ?></td>
                    <td><?php echo $key['kota_penempatan'] ?></td>
                    <td><?php echo $key['persyaratan'] ?></td>
                    <td><?php echo $key['gaji'] ?></td>
                    <td><?php if ($key['status'] == "tersedia") {
                          echo "Aktif";
                        } else {
                          echo "Tidak Aktif";
                        } ?></td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <button data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Download Pelamar" type="button" class="btn btn-dark">
                          <a style="color: #fff" class="downloadPelamar" data-id_lowongan="<?= $key['id_lowongan']; ?>" data-nama_jabatan="<?= $key['nama_jabatan']; ?>" data-nama_perusahaan="<?= $nama_perusahaan; ?>" data-jenis_lowongan="<?= $jenis_lowongan; ?>" data-jadwal_seleksi="<?= $key['jadwal_seleksi']; ?>" href="#"><i class="fa fa-download"></i></a>
                        </button> &nbsp;
                        <button data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Lihat Pelamar" type="button" class="btn btn-primary"><a style="color: #fff" href="<?php echo base_url('Administrator/Data_lowongan/detail_lowongan/' . $key['id_lowongan']) ?>"><i class="fa fa-table" aria-hidden="true"></i></a></button>
                        &nbsp; <button data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tampilkan Lowongan" type="button" class="btn btn-primary"><a style="color: #fff" href="<?php echo base_url('Administrator/Data_lowongan/tampilkan_lowongan/' . $key['id_lowongan']) ?>"><i class="fa fa-eye"></i></a></button>
                        &nbsp; <button data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Sembunyikan Lowongan" type="button" class="btn btn-secondary"><a style="color: #fff" href="<?php echo base_url('Administrator/Data_lowongan/sembunyikan_lowongan/' . $key['id_lowongan']) ?>"><i class="fa fa-eye-slash"></i></a></button>
                        &nbsp;<button data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit" type="button" class="btn btn-warning"><a style="color: #fff" href="<?php echo base_url('Administrator/Data_lowongan/edit_lowongan/' . $key['id_lowongan']) ?>"><i class="fa fa-edit"></i></a></button>
                        &nbsp;<button data-placement="bottom" data-original-title="Hapus" data-toggle="modal" data-target="#myModal<?php echo $modal ?>" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                      </div>
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