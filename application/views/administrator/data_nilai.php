<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Data Nilai</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item"><a href="#">Data Nilai</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">

        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pelamar</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $modal = 0;
                $no = 1;
                foreach ($array as $key) {
                  $id_pelamar = $key['id_pelamar'];
                  $id_lowongan = $key['id_lowongan'];
                ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <?php $pelamar = $this->db->query("SELECT * FROM tb_data_diri");
                    foreach ($pelamar->result() as $key_pelamar) {
                      if ($key_pelamar->id_pelamar == $key['id_pelamar']) {
                        $tgl_lahir = $key_pelamar->tanggal_lahir;
                    ?>
                        <td><?php echo $key_pelamar->nama_pelamar ?></td>
                      <?php } ?>
                    <?php } ?>

                    <!-- PERHITUNGAN USIA -->
                    <?php
                    $tgl = strtotime($tgl_lahir);
                    $current_time = time();

                    $age_years = date('Y', $current_time) - date('Y', $tgl);
                    $age_months = date('m', $current_time) - date('m', $tgl);
                    $age_days = date('d', $current_time) - date('d', $tgl);
                    if ($age_days < 0) {
                      $days_in_month = date('t', $current_time);
                      $age_months--;
                      $age_days = $days_in_month + $age_days;
                    }

                    if ($age_months < 0) {
                      $age_years--;
                      $age_months = 12 + $age_months;
                    }
                    ?>
                    <!-- END USIA -->

                    <!-- END PERHITUNGAN -->
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <form method="post" action="<?php echo base_url('Administrator/Data_nilai/detail_nilai/' . $key['id_lowongan'] . '/' . $id_pelamar) ?>">
                          <input type="hidden" name="id_pelamar" value="<?php echo $id_pelamar ?>">
                          <input type="hidden" name="id_lowongan" value="<?php echo $id_lowongan ?>">
                          <input type="hidden" name="nilai_cfit" value="<?php echo $total_nilai_sub ?>">
                          <input type="hidden" name="iq" value="<?php echo $iq ?>">
                          <input type="hidden" name="kategori" value="<?php echo $kategori ?>">
                          <button data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Lihat Pelamar" type="submit" class="btn btn-primary"><i class="fa fa-eye"></i>Lihat Nilai Pelamar</button>
                        </form>
                        <form method="post" action="<?php echo base_url('Administrator/Data_nilai/papigram/' . $key['id_lowongan'] . '/' . $id_pelamar) ?>">
                          <input type="hidden" name="id_pelamar" value="<?php echo $id_pelamar ?>">
                          <input type="hidden" name="id_lowongan" value="<?php echo $id_lowongan ?>">
                          <button data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Lihat Pelamar" type="submit" class="btn btn-dark"><i class="fa fa-eye"></i>Papigram</button>
                        </form>
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