<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Detail Nilai Pelamar</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item"><a href="#">Detail Nilai Pelamar</a></li>
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
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <tbody>
                <?php
                $modal = 0;
                foreach ($cfit as $key) {
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
                      $tgl_lhr = $key_diri->tanggal_lahir;

                      $from = new DateTime($tgl_lhr);
                      $to   = new DateTime('today');
                      $umur = $from->diff($to)->y;
                    }
                  }

                  $cekHolland = $this->db->query("SELECT * FROM tb_data_jawaban_holland WHERE id_pelamar = $id_pelamar");
                  foreach ($cekHolland->result() as $key_holland) {
                    $nilai_r = $key_holland->nilai_r;
                    $nilai_i = $key_holland->nilai_i;
                    $nilai_a = $key_holland->nilai_a;
                    $nilai_s = $key_holland->nilai_s;
                    $nilai_e = $key_holland->nilai_e;
                    $nilai_k = $key_holland->nilai_k;
                  }

                  $cekIst = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_pelamar = $id_pelamar");
                  foreach ($cekIst->result() as $key_ist) {
                    $id_pelamar_ist = $key_ist->id_pelamar;
                    $id_lowongan_ist = $key_ist->id_lowongan;
                  }


                ?>
                  <!--  
                <div class="modal fade" id="myModal" role="dialog">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Update Nilai</h4>
                      </div>
                      <div class="modal-body">
                        <form action="<?php echo  base_url('Administrator/Data_nilai/update_nilai/' . $key['id_nilai']) ?>" method="post">
                          <div class="form-group">
                            <input type="hidden" name="id_nilai" value="<?php echo $key['id_nilai'] ?>">
                            <label class="control-label">Nilai Wawancara</label>
                            <input class="form-control" type="text" name="nilai_wawancara" value="<?php echo $key['nilai_wawancara'] ?>">
                          </div>
                          <div class="form-group">
                            <label class="control-label">Nilai FGD</label>
                            <input class="form-control" type="text" name="nilai_fgd" value="<?php echo $key['nilai_fgd'] ?>">
                          </div>                          
                        </div>
                        <div class="modal-footer">
                          <input type="submit" value="Update Nilai" class="btn btn-primary">
                        </div>
                      </form>
                    </div>
                  </div>
                </div> 
                Modal 2
                <div class="modal fade" id="myModal2" role="dialog">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Update Kepribadian</h4>
                      </div>
                      <div class="modal-body">
                        <form action="<?php echo base_url('Administrator/Data_nilai/update_deskripsi/' . $key['id_nilai']) ?>" method="post">
                          <div class="form-group">
                            <input type="hidden" name="id_nilai" value="<?php echo $key['id_nilai'] ?>">
                            <label class="control-label">Gambaran Kepribadian</label>
                            <textarea class="form-control" name="gambaran_kepribadian"><?php echo $key['gambaran_kepribadian'] ?></textarea>
                          </div>
                          <div class="form-group">
                            <label class="control-label">Kesimpulan</label>
                            <input class="form-control" type="text" name="kesimpulan" value="<?php echo $key['kesimpulan'] ?>">
                          </div>                          
                        </div>
                        <div class="modal-footer">
                          <input type="submit" value="Update Deskripsi" class="btn btn-primary">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>  -->

                  <p>Nama Pelamar : <b><?php echo $nama_pelamar ?></b></p>
                  <input type="hidden" name="umur" id="umur" value="<?= $umur; ?>">
                  <p>Posisi Jabatan / Lowongan : <b><?php echo $namaJabatan ?></b></p>
                  <p>Perusahaan : <b><?php echo $nmPerusahaan ?></b></p>
                  <tr>
                    <th width="150">Nilai CFIT</th>
                    <td colspan="2"><?php echo $key['nilai_cfit'] ?></td>
                  </tr>
                  <tr>
                    <th width="150">IQ</th>
                    <td colspan="2"><?php echo $key['iq'] ?></td>
                  </tr>
                  <tr>
                    <th width="150">Kategori</th>
                    <td colspan="2"><?php echo $key['kategori'] ?></td>
                  </tr>
                  <tr>
                    <th>Nilai Holland :</th>
                    <td colspan="2"></td>
                  </tr>
                  <tr>
                    <th style="text-align: right">R</th>
                    <td colspan="2"><?php if (isset($nilai_r)) {
                                      echo $nilai_r;
                                    } else {
                                      echo "0";
                                    } ?>
                    </td>
                  </tr>
                  <tr>
                    <th style="text-align: right">I</th>
                    <td colspan="2"><?php if (isset($nilai_i)) {
                                      echo $nilai_i;
                                    } else {
                                      echo "0";
                                    } ?></td>
                  </tr>
                  <tr>
                    <th style="text-align: right">A</th>
                    <td colspan="2"><?php if (isset($nilai_a)) {
                                      echo $nilai_a;
                                    } else {
                                      echo "0";
                                    } ?></td>
                  </tr>
                  <tr>
                    <th style="text-align: right">S</th>
                    <td colspan="2"><?php if (isset($nilai_s)) {
                                      echo $nilai_s;
                                    } else {
                                      echo "0";
                                    } ?></td>
                  </tr>
                  <tr>
                    <th style="text-align: right">E</th>
                    <td colspan="2"><?php if (isset($nilai_e)) {
                                      echo $nilai_e;
                                    } else {
                                      echo "0";
                                    } ?></td>
                  </tr>
                  <tr>
                    <th style="text-align: right">K</th>
                    <td colspan="2"><?php if (isset($nilai_k)) {
                                      echo $nilai_k;
                                    } else {
                                      echo "0";
                                    } ?></td>
                  </tr>
                  <tr>
                    <th>Nilai Papikostik :</th>
                    <form method="post" action="<?php echo base_url('Administrator/Data_nilai/papigram') ?>">
                      <input hidden type="text" value='<?= $lowongan ?>' name='id_lowongan'>
                      <input hidden type="text" value='<?= $id_pelamar ?>' name='id_pelamar'>
                      <td colspan="2"> <input type="submit" value="Papigram" class="btn btn-primary"></td>
                    </form>
                  </tr>
                  <tr>
                    <th style="text-align: center;"><strong>Aspek</strong></th>
                    <th style="text-align: center;"><strong>Dimensi</strong></th>
                    <th style="text-align: center;"><strong>Nilai Individu</strong></th>
                  </tr>
                  <tr>
                    <td rowspan="3" style="vertical-align: middle; text-align: center;"><strong>Work Direction</strong></td>
                    <th style="text-align: center;">Hard intense worked ( G )</th>
                    <td style="text-align: center;">
                      <?php
                      $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='G' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                      $result = $nilai->result_array();
                      echo $result[0]['jumlah'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <th style="text-align: center;">Need to finish task ( N )</th>
                    <td style="text-align: center;">
                      <?php
                      $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='N' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                      $result = $nilai->result_array();
                      echo $result[0]['jumlah'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <th style="text-align: center;">Need to achieve ( A )</th>
                    <td style="text-align: center;">
                      <?php
                      $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='A' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                      $result = $nilai->result_array();
                      echo $result[0]['jumlah'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td rowspan="3" style="vertical-align: middle; text-align: center;"><strong>Leadership</strong></td>
                    <th style="text-align: center;">Leadership role ( L )</th>
                    <td style="text-align: center;">
                      <?php
                      $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='L' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                      $result = $nilai->result_array();
                      echo $result[0]['jumlah'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <th style="text-align: center;">Need to control others ( P )</th>
                    <td style="text-align: center;">
                      <?php
                      $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='P' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                      $result = $nilai->result_array();
                      echo $result[0]['jumlah'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <th style="text-align: center;">Ease in decision making ( I )</th>
                    <td style="text-align: center;">
                      <?php
                      $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='I' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                      $result = $nilai->result_array();
                      echo $result[0]['jumlah'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td rowspan="2" style="vertical-align: middle; text-align: center;"><strong>Activity</strong></td>
                    <th style="text-align: center;">Pace ( T )</th>
                    <td style="text-align: center;">
                      <?php
                      $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='T' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                      $result = $nilai->result_array();
                      echo $result[0]['jumlah'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <th style="text-align: center;">Vigorous type ( V )</th>
                    <td style="text-align: center;">
                      <?php
                      $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='V' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                      $result = $nilai->result_array();
                      echo $result[0]['jumlah'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td rowspan="4" style="vertical-align: middle; text-align: center;"><strong>Social Nature</strong></td>
                    <th style="text-align: center;">Need for closeness and affection ( O )</th>
                    <td style="text-align: center;">
                      <?php
                      $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='O' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                      $result = $nilai->result_array();
                      echo $result[0]['jumlah'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <th style="text-align: center;">Need to belong to groups ( B )</th>
                    <td style="text-align: center;">
                      <?php
                      $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='B' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                      $result = $nilai->result_array();
                      echo $result[0]['jumlah'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <th style="text-align: center;">Social extension ( S )</th>
                    <td style="text-align: center;">
                      <?php
                      $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='S' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                      $result = $nilai->result_array();
                      echo $result[0]['jumlah'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <th style="text-align: center;">Need to be noticed ( X )</th>
                    <td style="text-align: center;">
                      <?php
                      $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='X' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                      $result = $nilai->result_array();
                      echo $result[0]['jumlah'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td rowspan="3" style="vertical-align: middle; text-align: center;"><strong>Work Style</strong></td>
                    <th style="text-align: center;">Organized type ( C )</th>
                    <td style="text-align: center;">
                      <?php
                      $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='C' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                      $result = $nilai->result_array();
                      echo $result[0]['jumlah'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <th style="text-align: center;">Interest in working with details ( D )</th>
                    <td style="text-align: center;">
                      <?php
                      $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='D' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                      $result = $nilai->result_array();
                      echo $result[0]['jumlah'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <th style="text-align: center;">Theoretical type ( R )</th>
                    <td style="text-align: center;">
                      <?php
                      $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='R' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                      $result = $nilai->result_array();
                      echo $result[0]['jumlah'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td rowspan="3" style="vertical-align: middle; text-align: center;"><strong>Temperament</strong></td>
                    <th style="text-align: center;">Need for change ( Z )</th>
                    <td style="text-align: center;">
                      <?php
                      $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='Z' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                      $result = $nilai->result_array();
                      echo $result[0]['jumlah'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <th style="text-align: center;">Emotional resistant ( E )</th>
                    <td style="text-align: center;">
                      <?php
                      $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='E' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                      $result = $nilai->result_array();
                      echo $result[0]['jumlah'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <th style="text-align: center;">Need to be forceful ( K )</th>
                    <td style="text-align: center;">
                      <?php
                      $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='K' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                      $result = $nilai->result_array();
                      echo $result[0]['jumlah'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td rowspan="2" style="vertical-align: middle; text-align: center;"><strong>Followership</strong></td>
                    <th style="text-align: center;">Need to support authority ( F )</th>
                    <td style="text-align: center;">
                      <?php
                      $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='F' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                      $result = $nilai->result_array();
                      echo $result[0]['jumlah'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <th style="text-align: center;">Need for rules and supervision ( W )</th>
                    <td style="text-align: center;">
                      <?php
                      $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='W' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                      $result = $nilai->result_array();
                      echo $result[0]['jumlah'];
                      ?>
                    </td>
                  </tr>
                  <!-- <tr>
                  <th style="text-align: center;">G</th>
                  <td style="text-align: center;">
                    <?php
                    $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='G' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                    $result = $nilai->result_array();
                    echo $result[0]['jumlah'];
                    ?>
                  </td>
                </tr>
                <tr>
                  <th style="text-align: center;">L</th>
                  <td style="text-align: center;">Leadership</td>
                  <td style="text-align: center;">
                    <?php
                    $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='L' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                    $result = $nilai->result_array();
                    echo $result[0]['jumlah'];
                    ?>
                  </td>
                </tr>
                <tr>
                  <th style="text-align: center;">I</th>
                  <td style="text-align: center;">Leadership</td>
                  <td style="text-align: center;">
                    <?php
                    $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='I' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                    $result = $nilai->result_array();
                    echo $result[0]['jumlah'];
                    ?>
                  </td>
                </tr>
                <tr>
                  <th style="text-align: center;">T</th>
                  <td style="text-align: center;">Activity</td>
                  <td style="text-align: center;">
                    <?php
                    $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='T' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                    $result = $nilai->result_array();
                    echo $result[0]['jumlah'];
                    ?>
                  </td>
                </tr>
                <tr>
                  <th style="text-align: center;">V</th>
                  <td style="text-align: center;">Activity</td>
                  <td style="text-align: center;">
                    <?php
                    $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='V' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                    $result = $nilai->result_array();
                    echo $result[0]['jumlah'];
                    ?>
                  </td>
                </tr>
                <tr>
                  <th style="text-align: center;">S</th>
                  <td style="text-align: center;">Social Nature</td>
                  <td style="text-align: center;">
                    <?php
                    $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='S' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                    $result = $nilai->result_array();
                    echo $result[0]['jumlah'];
                    ?>
                  </td>
                </tr>
                <tr>
                  <th style="text-align: center;">R</th>
                  <td style="text-align: center;">Workstyle</td>
                  <td style="text-align: center;">
                    <?php
                    $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='R' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                    $result = $nilai->result_array();
                    echo $result[0]['jumlah'];
                    ?>
                  </td>
                </tr>
                <tr>
                  <th style="text-align: center;">D</th>
                  <td style="text-align: center;">Workstyle</td>
                  <td style="text-align: center;">
                    <?php
                    $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='D' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                    $result = $nilai->result_array();
                    echo $result[0]['jumlah'];
                    ?>
                  </td>
                </tr>
                <tr>
                 <th style="text-align: center;">C</th>
                  <td style="text-align: center;">Workstyle</td>
                  <td style="text-align: center;">
                    <?php
                    $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='C' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                    $result = $nilai->result_array();
                    echo $result[0]['jumlah'];
                    ?>
                  </td>
                </tr>
                <tr>
                  <th style="text-align: center;">E</th>
                  <td style="text-align: center;">Temperament</td>
                  <td style="text-align: center;">
                    <?php
                    $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='E' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                    $result = $nilai->result_array();
                    echo $result[0]['jumlah'];
                    ?>
                  </td>
                </tr>
                <tr>
                  <th style="text-align: center;">N</th>
                  <td style="text-align: center;">Work Direction</td>
                  <td style="text-align: center;">
                    <?php
                    $n = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='N' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                    $result = $n->result_array();
                    echo $result[0]['jumlah'];
                    ?>
                  </td>
                </tr>
                <tr>
                  <th style="text-align: center;">A</th>
                  <td style="text-align: center;">Work Direction</td>
                  <td style="text-align: center;">
                    <?php
                    $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='A' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                    $result = $nilai->result_array();
                    echo $result[0]['jumlah'];
                    ?>
                  </td>
                </tr>
                <tr>
                  <th style="text-align: center;">P</th>
                  <td style="text-align: center;">Leadership</td>
                  <td style="text-align: center;">
                    <?php
                    $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='P' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                    $result = $nilai->result_array();
                    echo $result[0]['jumlah'];
                    ?>
                  </td>
                </tr>
                <tr>
                  <th style="text-align: center;">X</th>
                  <td style="text-align: center;">Social Nature</td>
                  <td style="text-align: center;">
                    <?php
                    $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='X' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                    $result = $nilai->result_array();
                    echo $result[0]['jumlah'];
                    ?>
                  </td>
                </tr>
                <tr>
                  <th style="text-align: center;">B</th>
                  <td style="text-align: center;">Social Nature</td>
                  <td style="text-align: center;">
                    <?php
                    $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='B' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                    $result = $nilai->result_array();
                    echo $result[0]['jumlah'];
                    ?>
                  </td>
                </tr>
                <tr>
                  <th style="text-align: center;">O</th>
                  <td style="text-align: center;">Social Nature</td>
                  <td style="text-align: center;">
                    <?php
                    $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='O' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                    $result = $nilai->result_array();
                    echo $result[0]['jumlah'];
                    ?>
                  </td>
                </tr>
                <tr>
                  <th style="text-align: center;">Z</th>
                  <td style="text-align: center;">Temperament</td>
                  <td style="text-align: center;">
                    <?php
                    $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='Z' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                    $result = $nilai->result_array();
                    echo $result[0]['jumlah'];
                    ?>
                  </td>
                </tr>
                <tr>
                  <th style="text-align: center;">K</th>
                  <td style="text-align: center;">Temperament</td>
                  <td style="text-align: center;">
                    <?php
                    $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='K' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                    $result = $nilai->result_array();
                    echo $result[0]['jumlah'];
                    ?>
                  </td>
                </tr>
                <tr>
                  <th style="text-align: center;">F</th>
                  <td style="text-align: center;">Followership</td>
                  <td style="text-align: center;">
                    <?php
                    $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='F' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                    $result = $nilai->result_array();
                    echo $result[0]['jumlah'];
                    ?>
                  </td>
                </tr>
                <tr>
                  <th style="text-align: center;">W</th>
                  <td style="text-align: center;">Followership</td>
                  <td style="text-align: center;">
                    <?php
                    $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE jawaban='W' AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                    $result = $nilai->result_array();
                    echo $result[0]['jumlah'];
                    ?>
                  </td>
                </tr> -->

                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="sampleTable">
                      <tbody>
                        <tr>
                          <th>Nilai DISC :</th>
                          <td colspan="2" align="center"><strong>MOST</strong></td>
                          <td colspan="2" align="center"><strong>LEAST</strong></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;width: 175px;">Type</th>
                          <td align="center"><strong>Nilai</strong></td>
                          <td align="center"><strong>Konvert</strong></td>
                          <td align="center"><strong>Nilai</strong></td>
                          <td align="center"><strong>Konvert</strong></td>

                        </tr>
                        <tr>
                          <th style="text-align: center;width: 175px;">D</th>
                          <td align="center">
                            <?php
                            $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_disc WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamar . " AND (jawaban='dM' OR jawaban2='dM')");
                            $result = $nilai->result_array();
                            echo $result[0]['jumlah'];
                            ?>
                          </td>
                          <td align="center">
                            <?php
                            switch ($result[0]['jumlah']) {
                              case 1:
                                echo 15;
                                break;
                              case 2:
                                echo 24;
                                break;
                              case 3:
                                echo 33;
                                break;
                              case 4:
                                echo 38;
                                break;
                              case 5:
                                echo 43;
                                break;
                              case 6:
                                echo 48;
                                break;
                              case 7:
                                echo 53;
                                break;
                              case 8:
                                echo 59;
                                break;
                              case 9:
                                echo 65;
                                break;
                              case 10:
                                echo 15;
                                break;
                              case 11:
                                echo 73;
                                break;
                              case 12:
                                echo 76;
                                break;
                              case 13:
                                echo 79;
                                break;
                              case 14:
                                echo 83;
                                break;
                              case 15:
                                echo 95;
                                break;
                              case 16:
                                echo 97;
                              case 20:
                                echo 100;
                                break;

                              default:
                                echo 3;
                                break;
                            }
                            ?>
                          </td>
                          <td align="center">
                            <?php
                            $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_disc WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamar . " AND (jawaban='dL' OR jawaban2='dL')");
                            $result = $nilai->result_array();
                            echo $result[0]['jumlah'];
                            ?>
                          </td>
                          <td align="center">
                            <?php
                            switch ($result[0]['jumlah']) {
                              case 1:
                                echo 87;
                                break;
                              case 2:
                                echo 75;
                                break;
                              case 3:
                                echo 67;
                                break;
                              case 4:
                                echo 59;
                                break;
                              case 5:
                                echo 53;
                                break;
                              case 6:
                                echo 48;
                                break;
                              case 7:
                                echo 42;
                                break;
                              case 8:
                                echo 38;
                                break;
                              case 9:
                                echo 31;
                                break;
                              case 10:
                                echo 28;
                                break;
                              case 11:
                                echo 25;
                                break;
                              case 12:
                                echo 21;
                                break;
                              case 13:
                                echo 15;
                                break;
                              case 14:
                                echo 11;
                                break;
                              case 15:
                                echo 8;
                                break;
                              case 16:
                                echo 5;
                              case 21:
                                echo 1;
                                break;

                              default:
                                echo 100;
                                break;
                            }
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <th style="text-align: center;width: 175px;">I</th>
                          <td align="center">
                            <?php
                            $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_disc WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamar . " AND (jawaban='iM' OR jawaban2='iM')");
                            $result = $nilai->result_array();
                            echo $result[0]['jumlah'];
                            ?>
                          </td>
                          <td align="center">
                            <?php
                            switch ($result[0]['jumlah']) {
                              case 1:
                                echo 20;
                                break;
                              case 2:
                                echo 35;
                                break;
                              case 3:
                                echo 43;
                                break;
                              case 4:
                                echo 56;
                                break;
                              case 5:
                                echo 68;
                                break;
                              case 6:
                                echo 73;
                                break;
                              case 7:
                                echo 83;
                                break;
                              case 8:
                                echo 88;
                                break;
                              case 9:
                                echo 92;
                                break;
                              case 10:
                                echo 97;
                                break;
                              case 11:
                                echo 100;
                                break;
                              case 12:
                                echo 100;
                                break;
                              case 13:
                                echo 100;
                                break;
                              case 14:
                                echo 100;
                                break;
                              case 15:
                                echo 100;
                                break;
                              case 16:
                                echo 100;
                              case 17:
                                echo 100;
                                break;

                              default:
                                echo 8;
                                break;
                            }
                            ?>
                          </td>
                          <td align="center">
                            <?php
                            $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_disc WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamar . " AND (jawaban='iL' OR jawaban2='iL')");
                            $result = $nilai->result_array();
                            echo $result[0]['jumlah'];
                            ?>
                          </td>
                          <td align="center">
                            <?php
                            switch ($result[0]['jumlah']) {
                              case 1:
                                echo 86;
                                break;
                              case 2:
                                echo 75;
                                break;
                              case 3:
                                echo 67;
                                break;
                              case 4:
                                echo 55;
                                break;
                              case 5:
                                echo 46;
                                break;
                              case 6:
                                echo 37;
                                break;
                              case 7:
                                echo 28;
                                break;
                              case 8:
                                echo 22;
                                break;
                              case 9:
                                echo 15;
                                break;
                              case 10:
                                echo 10;
                                break;
                              case 11:
                                echo 7;
                                break;
                              case 19:
                                echo 0;
                              default:
                                echo 100;
                                break;
                            }
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <th style="text-align: center;width: 175px;">S</th>
                          <td align="center">
                            <?php
                            $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_disc WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamar . " AND (jawaban='sM' OR jawaban2='sM')");
                            $result = $nilai->result_array();
                            echo $result[0]['jumlah'];
                            ?>
                          </td>
                          <td align="center">
                            <?php
                            switch ($result[0]['jumlah']) {
                              case 1:
                                echo 22;
                                break;
                              case 2:
                                echo 30;
                                break;
                              case 3:
                                echo 38;
                                break;
                              case 4:
                                echo 45;
                                break;
                              case 5:
                                echo 55;
                                break;
                              case 6:
                                echo 61;
                                break;
                              case 7:
                                echo 67;
                                break;
                              case 8:
                                echo 74;
                                break;
                              case 9:
                                echo 78;
                                break;
                              case 10:
                                echo 85;
                                break;
                              case 11:
                                echo 89;
                                break;
                              case 12:
                                echo 97;
                                break;
                              case 13:
                                echo 100;
                                break;
                              case 14:
                                echo 100;
                                break;
                              case 15:
                                echo 100;
                                break;
                              case 16:
                                echo 100;
                              case 19:
                                echo 100;
                                break;
                              default:
                                echo 11;
                                break;
                            }
                            ?>
                          </td>
                          <td align="center">
                            <?php
                            $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_disc WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamar . " AND (jawaban='sL' OR jawaban2='sL')");
                            $result = $nilai->result_array();
                            echo $result[0]['jumlah'];
                            ?>
                          </td>
                          <td align="center">
                            <?php
                            switch ($result[0]['jumlah']) {
                              case 1:
                                echo 96;
                                break;
                              case 2:
                                echo 85;
                                break;
                              case 3:
                                echo 75;
                                break;
                              case 4:
                                echo 67;
                                break;
                              case 5:
                                echo 59;
                                break;
                              case 6:
                                echo 53;
                                break;
                              case 7:
                                echo 42;
                                break;
                              case 8:
                                echo 37;
                                break;
                              case 9:
                                echo 29;
                                break;
                              case 10:
                                echo 23;
                                break;
                              case 11:
                                echo 15;
                                break;
                              case 12:
                                echo 8;
                                break;
                              case 13:
                                echo 4;
                                break;
                              case 19:
                                echo 1;
                              default:
                                echo 100;
                                break;
                            }
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <th style="text-align: center;width: 175px;">C</th>
                          <td align="center">
                            <?php
                            $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_disc WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamar . " AND (jawaban='cM' OR jawaban2='cM')");
                            $result = $nilai->result_array();
                            echo $result[0]['jumlah'];
                            ?>
                          </td>
                          <td align="center">
                            <?php
                            switch ($result[0]['jumlah']) {
                              case 1:
                                echo 16;
                                break;
                              case 2:
                                echo 29;
                                break;
                              case 3:
                                echo 40;
                                break;
                              case 4:
                                echo 54;
                                break;
                              case 5:
                                echo 66;
                                break;
                              case 6:
                                echo 73;
                                break;
                              case 7:
                                echo 84;
                                break;
                              case 8:
                                echo 89;
                                break;
                              case 9:
                                echo 96;
                                break;
                              case 10:
                                echo 100;
                                break;
                              case 11:
                                echo 100;
                                break;
                              case 12:
                                echo 100;
                                break;
                              case 13:
                                echo 100;
                                break;
                              case 14:
                                echo 100;
                                break;
                              case 15:
                                echo 100;
                              default:
                                echo 0;
                                break;
                            }
                            ?>
                          </td>
                          <td align="center">
                            <?php
                            $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_disc WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamar . " AND (jawaban='cL' OR jawaban2='cL')");
                            $result = $nilai->result_array();
                            echo $result[0]['jumlah'];
                            ?>
                          </td>
                          <td align="center">
                            <?php
                            switch ($result[0]['jumlah']) {
                              case 1:
                                echo 95;
                                break;
                              case 2:
                                echo 82;
                                break;
                              case 3:
                                echo 74;
                                break;
                              case 4:
                                echo 65;
                                break;
                              case 5:
                                echo 58;
                                break;
                              case 6:
                                echo 52;
                                break;
                              case 7:
                                echo 47;
                                break;
                              case 8:
                                echo 39;
                                break;
                              case 9:
                                echo 33;
                                break;
                              case 10:
                                echo 23;
                                break;
                              case 11:
                                echo 14;
                                break;
                              case 12:
                                echo 7;
                                break;
                              case 13:
                                echo 3;
                                break;
                              case 16:
                                echo 0;
                              default:
                                echo 100;
                                break;
                            }
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <th style="text-align: center;width: 175px;">X</th>
                          <td align="center">
                            <?php
                            $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_disc WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamar . " AND (jawaban='xM' OR jawaban2='xM')");
                            $result = $nilai->result_array();
                            echo $result[0]['jumlah'];
                            ?>
                          </td>
                          <td>
                          </td>
                          <td align="center">
                            <?php
                            $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_disc WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamar . " AND (jawaban='xL' OR jawaban2='xL')");
                            $result = $nilai->result_array();
                            echo $result[0]['jumlah'];
                            ?>
                          </td>
                          <td>
                          </td>
                        </tr>
                        <tr>
                          <td rowspan="2" style="vertical-align: middle; text-align: center;"><strong>Kategori</strong></td>
                          <th style="text-align: center;">Most</th>
                          <th style="text-align: center;"><i>Influence</i></th>
                        </tr>
                        <tr>
                          <th style="text-align: center;">Least</th>
                          <th style="text-align: center;"><i>Dominant</i></th>
                          </td>
                        </tr>
                    </table>
                  </div>


                  <!--NILAI RMIB PRIA -->

                  <div class="table-responsive">

                    <tr>
                      <th>Nilai RMIB - Pria :</th>
                      <td></td>
                    </tr>

                    <?php
                    /**
                     * get tb_jawaban_rmib_pria
                     * by id_pelamar and id_lowongan
                     */
                    $dataRMIB = $this->db->query("
                SELECT * FROM tb_jawaban_rmib_pria WHERE id_pelamar= " . $id_pelamar . " AND id_lowongan = " . $lowongan . "
            ")->row();

                    // // baris 1
                    // $arrayBaris1 [] = $dataRMIB->b12 ?? '';
                    // $arrayBaris2 [] = $dataRMIB->c11 ?? '';
                    // $arrayBaris3 [] = $dataRMIB->d10 ?? '';
                    // $arrayBaris4 [] = $dataRMIB->e9 ?? '';
                    // $arrayBaris5 [] = $dataRMIB->f8 ?? '';
                    // $arrayBaris6 [] = $dataRMIB->g7 ?? '';
                    // $arrayBaris7 [] = $dataRMIB->h6 ?? '';
                    // $arrayBaris8 [] = $dataRMIB->i5 ?? '';

                    ?>
                    <table class="table table-hover table-bordered" id="sampleTable">
                      <tbody>
                        <tr>
                          <th style="text-align: center;">Kategori</th>
                          <td style="text-align: center;">A</td>
                          <td style="text-align: center;">B</td>
                          <td style="text-align: center;">C</td>
                          <td style="text-align: center;">D</td>
                          <td style="text-align: center;">E</td>
                          <td style="text-align: center;">F</td>
                          <td style="text-align: center;">G</td>
                          <td style="text-align: center;">H</td>
                          <td style="text-align: center;">I</td>
                          <td style="text-align: center;">Jumlah</td>
                          <td style="text-align: center;">Rank</td>
                        </tr>
                        <tr>
                          <th style="text-align: center;width: 175px;">OUT</th>
                          <td style="background-color: red"></td>
                          <td align="center"><?= $arrayDataRMIB[] = $dataRMIB->b12 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB[] = $dataRMIB->c11 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB[] = $dataRMIB->d10 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB[] = $dataRMIB->e9 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB[] = $dataRMIB->f8 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB[] = $dataRMIB->g7 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB[] = $dataRMIB->h6 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB[] = $dataRMIB->i5 ?? '' ?></td>
                          <td align="center"><?= array_sum($arrayDataRMIB) ?></td>
                          <td align="center"></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;width: 175px;">ME</th>
                          <td align="center"><?= $arrayDataRMIB_me[] = $dataRMIB->a2 ?? '' ?></td>
                          <td style="background-color: red"></td>
                          <td align="center"><?= $arrayDataRMIB_me[] = $dataRMIB->c12 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_me[] = $dataRMIB->d11 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_me[] = $dataRMIB->e10 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_me[] = $dataRMIB->f9 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_me[] = $dataRMIB->g8 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_me[] = $dataRMIB->h7 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_me[] = $dataRMIB->i6 ?? '' ?></td>
                          <td align="center"><?= array_sum($arrayDataRMIB_me) ?></td>
                          <td align="center"></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;">COMP</th>
                          <td align="center"><?= $arrayDataRMIB_comp[] = $dataRMIB->a3 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_comp[] = $dataRMIB->b2 ?? '' ?></td>
                          <td style="background-color: red"></td>
                          <td align="center"><?= $arrayDataRMIB_comp[] = $dataRMIB->d12 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_comp[] = $dataRMIB->e11 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_comp[] = $dataRMIB->f10 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_comp[] = $dataRMIB->g9 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_comp[] = $dataRMIB->h8 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_comp[] = $dataRMIB->i7 ?? '' ?></td>
                          <td align="center"><?= array_sum($arrayDataRMIB_comp) ?></td>
                          <td align="center"></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;">SCI</th>
                          <td align="center"><?= $arrayDataRMIB_sci[] = $dataRMIB->a4 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_sci[] = $dataRMIB->b3 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_sci[] = $dataRMIB->c2 ?? '' ?></td>
                          <td style="background-color: red"></td>
                          <td align="center"><?= $arrayDataRMIB_sci[] = $dataRMIB->e12 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_sci[] = $dataRMIB->f11 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_sci[] = $dataRMIB->g10 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_sci[] = $dataRMIB->h9 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_sci[] = $dataRMIB->i8 ?? '' ?></td>
                          <td align="center"><?= array_sum($arrayDataRMIB_sci) ?></td>
                          <td align="center"></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;">PERS</th>
                          <td align="center"><?= $arrayDataRMIB_pers[] = $dataRMIB->a5 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_pers[] = $dataRMIB->b4 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_pers[] = $dataRMIB->c3 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_pers[] = $dataRMIB->d2 ?? '' ?></td>
                          <td style="background-color: red"></td>
                          <td align="center"><?= $arrayDataRMIB_pers[] = $dataRMIB->f12 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_pers[] = $dataRMIB->g11 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_pers[] = $dataRMIB->g10 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_pers[] = $dataRMIB->g9 ?? '' ?></td>
                          <td align="center"><?= array_sum($arrayDataRMIB_pers) ?></td>
                          <td align="center"></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;">AESTH</th>
                          <td align="center"><?= $arrayDataRMIB_aesth[] = $dataRMIB->a6 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_aesth[] = $dataRMIB->b5 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_aesth[] = $dataRMIB->c4 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_aesth[] = $dataRMIB->d3 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_aesth[] = $dataRMIB->e2 ?? '' ?></td>
                          <td style="background-color: red"></td>
                          <td align="center"><?= $arrayDataRMIB_aesth[] = $dataRMIB->g12 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_aesth[] = $dataRMIB->g11 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_aesth[] = $dataRMIB->g10 ?? '' ?></td>
                          <td align="center"><?= array_sum($arrayDataRMIB_aesth) ?></td>
                          <td align="center"></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;">LIT</th>
                          <td align="center"><?= $arrayDataRMIB_lit[] = $dataRMIB->a7 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_lit[] = $dataRMIB->b6 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_lit[] = $dataRMIB->c5 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_lit[] = $dataRMIB->d4 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_lit[] = $dataRMIB->e3 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_lit[] = $dataRMIB->f2 ?? '' ?></td>
                          <td style="background-color: red"></td>
                          <td align="center"><?= $arrayDataRMIB_lit[] = $dataRMIB->h12 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_lit[] = $dataRMIB->i11 ?? '' ?></td>
                          <td align="center"><?= array_sum($arrayDataRMIB_lit) ?></td>
                          <td align="center"></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;">MUS</th>
                          <td align="center"><?= $arrayDataRMIB_mus[] = $dataRMIB->a8 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_mus[] = $dataRMIB->b7 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_mus[] = $dataRMIB->c6 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_mus[] = $dataRMIB->d5 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_mus[] = $dataRMIB->e4 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_mus[] = $dataRMIB->f3 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_mus[] = $dataRMIB->g2 ?? '' ?></td>
                          <td style="background-color: red"></td>
                          <td align="center"><?= $arrayDataRMIB_mus[] = $dataRMIB->h12 ?? '' ?></td>
                          <td align="center"><?= array_sum($arrayDataRMIB_mus) ?></td>
                          <td align="center"></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;">S.S</th>
                          <td align="center"><?= $arrayDataRMIB_ss[] = $dataRMIB->a9 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_ss[] = $dataRMIB->b8 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_ss[] = $dataRMIB->c7 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_ss[] = $dataRMIB->d6 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_ss[] = $dataRMIB->e5 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_ss[] = $dataRMIB->f4 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_ss[] = $dataRMIB->g3 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_ss[] = $dataRMIB->h2 ?? '' ?></td>
                          <td style="background-color: red"></td>
                          <td align="center"><?= array_sum($arrayDataRMIB_ss) ?></td>
                          <td align="center"></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;">CLER</th>
                          <td align="center"><?= $arrayDataRMIB_cler[] = $dataRMIB->a10 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_cler[] = $dataRMIB->b9 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_cler[] = $dataRMIB->c8 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_cler[] = $dataRMIB->d7 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_cler[] = $dataRMIB->e6 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_cler[] = $dataRMIB->f5 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_cler[] = $dataRMIB->g4 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_cler[] = $dataRMIB->h3 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_cler[] = $dataRMIB->i2 ?? '' ?></td>
                          <td align="center"><?= array_sum($arrayDataRMIB_cler) ?></td>
                          <td align="center"></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;">PRAC</th>
                          <td align="center"><?= $arrayDataRMIB_prac[] = $dataRMIB->a11 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_prac[] = $dataRMIB->b10 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_prac[] = $dataRMIB->c9 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_prac[] = $dataRMIB->d8 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_prac[] = $dataRMIB->e7 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_prac[] = $dataRMIB->f6 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_prac[] = $dataRMIB->g5 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_prac[] = $dataRMIB->h4 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_prac[] = $dataRMIB->i3 ?? '' ?></td>
                          <td align="center"><?= array_sum($arrayDataRMIB_prac) ?></td>
                          <td align="center"></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;">MED</th>
                          <td align="center"><?= $arrayDataRMIB_med[] = $dataRMIB->a12 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_med[] = $dataRMIB->b11 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_med[] = $dataRMIB->c10 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_med[] = $dataRMIB->d9 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_med[] = $dataRMIB->e8 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_med[] = $dataRMIB->f7 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_med[] = $dataRMIB->g6 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_med[] = $dataRMIB->h5 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_med[] = $dataRMIB->i4 ?? '' ?></td>
                          <td align="center"><?= array_sum($arrayDataRMIB_med) ?></td>
                          <td align="center"></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;">Form Profesi 1</th>
                          <td align="center"><?= $dataRMIB->jawaban1 ?? '' ?></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;">Form Profesi 2</th>
                          <td align="center"><?= $dataRMIB->jawaban2 ?? '' ?></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;">Form Profesi 3</th>
                          <td align="center"><?= $dataRMIB->jawaban3 ?? '' ?></td>
                        </tr>
                    </table>
                  </div>




                  <!--NILAI RMIB WANITA -->

                  <div class="table-responsive">

                    <tr>
                      <th>Nilai RMIB - Wanita :</th>
                      <td></td>
                    </tr>

                    <?php
                    /**
                     * get tb_jawaban_rmib_pria
                     * by id_pelamar and id_lowongan
                     */
                    $dataRMIB = $this->db->query("
                SELECT * FROM tb_jawaban_rmib_wanita WHERE id_pelamar= " . $id_pelamar . " AND id_lowongan = " . $lowongan . "
            ")->row();

                    // baris 1
                    // $arrayBaris1 [] = $dataRMIB->b12 ?? '';
                    // $arrayBaris2 [] = $dataRMIB->c11 ?? '';
                    // $arrayBaris3 [] = $dataRMIB->d10 ?? '';
                    // $arrayBaris4 [] = $dataRMIB->e9 ?? '';
                    // $arrayBaris5 [] = $dataRMIB->f8 ?? '';
                    // $arrayBaris6 [] = $dataRMIB->g7 ?? '';
                    // $arrayBaris7 [] = $dataRMIB->h6 ?? '';
                    // $arrayBaris8 [] = $dataRMIB->i5 ?? '';

                    ?>
                    <table class="table table-hover table-bordered" id="sampleTable">
                      <tbody>
                        <tr>
                          <th style="text-align: center;">Kategori</th>
                          <td style="text-align: center;">A</td>
                          <td style="text-align: center;">B</td>
                          <td style="text-align: center;">C</td>
                          <td style="text-align: center;">D</td>
                          <td style="text-align: center;">E</td>
                          <td style="text-align: center;">F</td>
                          <td style="text-align: center;">G</td>
                          <td style="text-align: center;">H</td>
                          <td style="text-align: center;">I</td>
                          <td style="text-align: center;">Jumlah</td>
                          <td style="text-align: center;">Rank</td>
                        </tr>
                        <tr>
                          <th style="text-align: center;width: 175px;">OUT</th>
                          <td style="background-color: red"></td>
                          <td align="center"><?= $arrayDataRMIB_wan[] = $dataRMIB->b12 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_wan[] = $dataRMIB->c11 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_wan[] = $dataRMIB->d10 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_wan[] = $dataRMIB->e9 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_wan[] = $dataRMIB->f8 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_wan[] = $dataRMIB->g7 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_wan[] = $dataRMIB->h6 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_wan[] = $dataRMIB->i5 ?? '' ?></td>
                          <td align="center"><?= array_sum($arrayDataRMIB_wan) ?></td>
                          <td align="center"></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;width: 175px;">ME</th>
                          <td align="center"><?= $arrayDataRMIB_me[] = $dataRMIB->a2 ?? '' ?></td>
                          <td style="background-color: red"></td>
                          <td align="center"><?= $arrayDataRMIB_me_wan[] = $dataRMIB->c12 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_me_wan[] = $dataRMIB->d11 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_me_wan[] = $dataRMIB->e10 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_me_wan[] = $dataRMIB->f9 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_me_wan[] = $dataRMIB->g8 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_me_wan[] = $dataRMIB->h7 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_me_wan[] = $dataRMIB->i6 ?? '' ?></td>
                          <td align="center"><?= array_sum($arrayDataRMIB_me_wan) ?></td>
                          <td align="center"></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;">COMP</th>
                          <td align="center"><?= $arrayDataRMIB_comp_wan[] = $dataRMIB->a3 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_comp_wan[] = $dataRMIB->b2 ?? '' ?></td>
                          <td style="background-color: red"></td>
                          <td align="center"><?= $arrayDataRMIB_comp_wan[] = $dataRMIB->d12 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_comp_wan[] = $dataRMIB->e11 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_comp_wan[] = $dataRMIB->f10 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_comp_wan[] = $dataRMIB->g9 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_comp_wan[] = $dataRMIB->h8 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_comp_wan[] = $dataRMIB->i7 ?? '' ?></td>
                          <td align="center"><?= array_sum($arrayDataRMIB_comp_wan) ?></td>
                          <td align="center"></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;">SCI</th>
                          <td align="center"><?= $arrayDataRMIB_sci_wan[] = $dataRMIB->a4 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_sci_wan[] = $dataRMIB->b3 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_sci_wan[] = $dataRMIB->c2 ?? '' ?></td>
                          <td style="background-color: red"></td>
                          <td align="center"><?= $arrayDataRMIB_sci_wan[] = $dataRMIB->e12 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_sci_wan[] = $dataRMIB->f11 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_sci_wan[] = $dataRMIB->g10 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_sci_wan[] = $dataRMIB->h9 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_sci_wan[] = $dataRMIB->i8 ?? '' ?></td>
                          <td align="center"><?= array_sum($arrayDataRMIB_sci_wan) ?></td>
                          <td align="center"></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;">PERS</th>
                          <td align="center"><?= $arrayDataRMIB_pers_wan[] = $dataRMIB->a5 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_pers_wan[] = $dataRMIB->b4 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_pers_wan[] = $dataRMIB->c3 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_pers_wan[] = $dataRMIB->d2 ?? '' ?></td>
                          <td style="background-color: red"></td>
                          <td align="center"><?= $arrayDataRMIB_pers_wan[] = $dataRMIB->f12 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_pers_wan[] = $dataRMIB->g11 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_pers_wan[] = $dataRMIB->g10 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_pers_wan[] = $dataRMIB->g9 ?? '' ?></td>
                          <td align="center"><?= array_sum($arrayDataRMIB_pers_wan) ?></td>
                          <td align="center"></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;">AESTH</th>
                          <td align="center"><?= $arrayDataRMIB_aesth_wan[] = $dataRMIB->a6 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_aesth_wan[] = $dataRMIB->b5 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_aesth_wan[] = $dataRMIB->c4 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_aesth_wan[] = $dataRMIB->d3 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_aesth_wan[] = $dataRMIB->e2 ?? '' ?></td>
                          <td style="background-color: red"></td>
                          <td align="center"><?= $arrayDataRMIB_aesth_wan[] = $dataRMIB->g12 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_aesth_wan[] = $dataRMIB->g11 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_aesth_wan[] = $dataRMIB->g10 ?? '' ?></td>
                          <td align="center"><?= array_sum($arrayDataRMIB_aesth_wan) ?></td>
                          <td align="center"></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;">LIT</th>
                          <td align="center"><?= $arrayDataRMIB_lit_wan[] = $dataRMIB->a7 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_lit_wan[] = $dataRMIB->b6 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_lit_wan[] = $dataRMIB->c5 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_lit_wan[] = $dataRMIB->d4 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_lit_wan[] = $dataRMIB->e3 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_lit_wan[] = $dataRMIB->f2 ?? '' ?></td>
                          <td style="background-color: red"></td>
                          <td align="center"><?= $arrayDataRMIB_lit_wan[] = $dataRMIB->h12 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_lit_wan[] = $dataRMIB->i11 ?? '' ?></td>
                          <td align="center"><?= array_sum($arrayDataRMIB_lit_wan) ?></td>
                          <td align="center"></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;">MUS</th>
                          <td align="center"><?= $arrayDataRMIB_mus_wan[] = $dataRMIB->a8 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_mus_wan[] = $dataRMIB->b7 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_mus_wan[] = $dataRMIB->c6 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_mus_wan[] = $dataRMIB->d5 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_mus_wan[] = $dataRMIB->e4 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_mus_wan[] = $dataRMIB->f3 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_mus_wan[] = $dataRMIB->g2 ?? '' ?></td>
                          <td style="background-color: red"></td>
                          <td align="center"><?= $arrayDataRMIB_mus_wan[] = $dataRMIB->h12 ?? '' ?></td>
                          <td align="center"><?= array_sum($arrayDataRMIB_mus_wan) ?></td>
                          <td align="center"></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;">S.S</th>
                          <td align="center"><?= $arrayDataRMIB_ss_wan[] = $dataRMIB->a9 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_ss_wan[] = $dataRMIB->b8 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_ss_wan[] = $dataRMIB->c7 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_ss_wan[] = $dataRMIB->d6 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_ss_wan[] = $dataRMIB->e5 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_ss_wan[] = $dataRMIB->f4 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_ss_wan[] = $dataRMIB->g3 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_ss_wan[] = $dataRMIB->h2 ?? '' ?></td>
                          <td style="background-color: red"></td>
                          <td align="center"><?= array_sum($arrayDataRMIB_ss_wan) ?></td>
                          <td align="center"></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;">CLER</th>
                          <td align="center"><?= $arrayDataRMIB_cler_wan[] = $dataRMIB->a10 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_cler_wan[] = $dataRMIB->b9 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_cler_wan[] = $dataRMIB->c8 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_cler_wan[] = $dataRMIB->d7 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_cler_wan[] = $dataRMIB->e6 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_cler_wan[] = $dataRMIB->f5 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_cler_wan[] = $dataRMIB->g4 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_cler_wan[] = $dataRMIB->h3 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_cler_wan[] = $dataRMIB->i2 ?? '' ?></td>
                          <td align="center"><?= array_sum($arrayDataRMIB_cler_wan) ?></td>
                          <td align="center"></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;">PRAC</th>
                          <td align="center"><?= $arrayDataRMIB_prac_wan[] = $dataRMIB->a11 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_prac_wan[] = $dataRMIB->b10 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_prac_wan[] = $dataRMIB->c9 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_prac_wan[] = $dataRMIB->d8 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_prac_wan[] = $dataRMIB->e7 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_prac_wan[] = $dataRMIB->f6 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_prac_wan[] = $dataRMIB->g5 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_prac_wan[] = $dataRMIB->h4 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_prac_wan[] = $dataRMIB->i3 ?? '' ?></td>
                          <td align="center"><?= array_sum($arrayDataRMIB_prac_wan) ?></td>
                          <td align="center"></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;">MED</th>
                          <td align="center"><?= $arrayDataRMIB_med_wan[] = $dataRMIB->a12 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_med_wan[] = $dataRMIB->b11 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_med_wan[] = $dataRMIB->c10 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_med_wan[] = $dataRMIB->d9 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_med_wan[] = $dataRMIB->e8 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_med_wan[] = $dataRMIB->f7 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_med_wan[] = $dataRMIB->g6 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_med_wan[] = $dataRMIB->h5 ?? '' ?></td>
                          <td align="center"><?= $arrayDataRMIB_med_wan[] = $dataRMIB->i4 ?? '' ?></td>
                          <td align="center"><?= array_sum($arrayDataRMIB_med_wan) ?></td>
                          <td align="center"></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;">Form Profesi 1</th>
                          <td align="center"><?= $dataRMIB->jawaban1 ?? '' ?></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;">Form Profesi 2</th>
                          <td align="center"><?= $dataRMIB->jawaban2 ?? '' ?></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;">Form Profesi 3</th>
                          <td align="center"><?= $dataRMIB->jawaban3 ?? '' ?></td>
                        </tr>
                    </table>
                  </div>


                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="sampleTable">
                      <tbody>
                        <tr>
                          <th>Nilai MSDT :</th>
                          <td></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;width: 175px;">Jumlah A</th>
                          <td align="center"><?php
                                              $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_msdt WHERE jawaban='A' AND no_soal IN (1,2,3,4,5,6,7,8) AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                                              $result = $nilai->result_array();
                                              $nilai_a1 = $result[0]['jumlah'];

                                              echo "<input type='hidden' id='nilai_a1' value='" . $nilai_a1 . "'><span>" . $nilai_a1 . "</span> </td>";
                                              ?>

                          <td align="center"><?php
                                              $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_msdt WHERE jawaban='A' AND no_soal IN (9,10,11,12,13,14,15,16) AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                                              $result = $nilai->result_array();
                                              $nilai_a2 = $result[0]['jumlah'];

                                              echo "<input type='hidden' id='nilai_a2' value='" . $nilai_a2 . "'><span>" . $nilai_a2 . "</span> </td>";
                                              ?></td>
                          <td align="center"><?php
                                              $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_msdt WHERE jawaban='A' AND no_soal IN (17,18,19,20,21,22,23,24) AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                                              $result = $nilai->result_array();
                                              $nilai_a3 = $result[0]['jumlah'];

                                              echo "<input type='hidden' id='nilai_a3' value='" . $nilai_a3 . "'><span>" . $nilai_a3 . "</span> </td>";
                                              ?></td>
                          <td align="center"><?php
                                              $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_msdt WHERE jawaban='A' AND no_soal IN (25,26,27,28,29,30,31,32) AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                                              $result = $nilai->result_array();
                                              $nilai_a4 = $result[0]['jumlah'];

                                              echo "<input type='hidden' id='nilai_a4' value='" . $nilai_a4 . "'><span>" . $nilai_a4 . "</span> </td>";
                                              ?></td>
                          <td align="center"><?php
                                              $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_msdt WHERE jawaban='A' AND no_soal IN (33,34,35,36,37,38,39,40) AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                                              $result = $nilai->result_array();
                                              $nilai_a5 = $result[0]['jumlah'];

                                              echo "<input type='hidden' id='nilai_a5' value='" . $nilai_a5 . "'><span>" . $nilai_a5 . "</span> </td>";
                                              ?></td>
                          <td align="center"><?php
                                              $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_msdt WHERE jawaban='A' AND no_soal IN (41,42,43,44,45,46,47,48) AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                                              $result = $nilai->result_array();
                                              $nilai_a6 = $result[0]['jumlah'];

                                              echo "<input type='hidden' id='nilai_a6' value='" . $nilai_a6 . "'><span>" . $nilai_a6 . "</span> </td>";
                                              ?></td>
                          <td align="center"><?php
                                              $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_msdt WHERE jawaban='A' AND no_soal IN (49,50,51,52,53,54,55,56) AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                                              $result = $nilai->result_array();
                                              $nilai_a7 = $result[0]['jumlah'];

                                              echo "<input type='hidden' id='nilai_a7' value='" . $nilai_a7 . "'><span>" . $nilai_a7 . "</span> </td>";
                                              ?></td>
                          <td align="center"><?php
                                              $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_msdt WHERE jawaban='A' AND no_soal IN (57,58,59,60,61,62,63,64) AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                                              $result = $nilai->result_array();
                                              $nilai_a8 = $result[0]['jumlah'];

                                              echo "<input type='hidden' id='nilai_a8' value='" . $nilai_a8 . "'><span>" . $nilai_a8 . "</span> </td>";
                                              ?></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;width: 175px;">Jumlah B</th>
                          <td align="center"><?php
                                              $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_msdt WHERE jawaban='B' AND no_soal IN (1,9,17,25,33,41,49,57) AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                                              $result = $nilai->result_array();
                                              $nilai_b1 = $result[0]['jumlah'];

                                              echo "<input type='hidden' id='nilai_b1' value='" . $nilai_b1 . "'><span>" . $nilai_b1 . "</span> </td>";
                                              ?></td>
                          <td align="center"><?php
                                              $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_msdt WHERE jawaban='B' AND no_soal IN (2,10,18,26,34,42,50,58) AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                                              $result = $nilai->result_array();
                                              $nilai_b2 = $result[0]['jumlah'];

                                              echo "<input type='hidden' id='nilai_b2' value='" . $nilai_b2 . "'><span>" . $nilai_b2 . "</span> </td>";
                                              ?></td>
                          <td align="center"><?php
                                              $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_msdt WHERE jawaban='B' AND no_soal IN (3,11,19,27,35,43,51,59) AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                                              $result = $nilai->result_array();
                                              $nilai_b3 = $result[0]['jumlah'];

                                              echo "<input type='hidden' id='nilai_b3' value='" . $nilai_b3 . "'><span>" . $nilai_b3 . "</span> </td>";
                                              ?></td>
                          <td align="center"><?php
                                              $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_msdt WHERE jawaban='B' AND no_soal IN (4,12,20,28,36,44,52,60) AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                                              $result = $nilai->result_array();
                                              $nilai_b4 = $result[0]['jumlah'];

                                              echo "<input type='hidden' id='nilai_b4' value='" . $nilai_b4 . "'><span>" . $nilai_b4 . "</span> </td>";
                                              ?></td>
                          <td align="center"><?php
                                              $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_msdt WHERE jawaban='B' AND no_soal IN (5,13,21,29,37,45,53,61) AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                                              $result = $nilai->result_array();
                                              $nilai_b5 = $result[0]['jumlah'];

                                              echo "<input type='hidden' id='nilai_b5' value='" . $nilai_b5 . "'><span>" . $nilai_b5 . "</span> </td>";
                                              ?></td>
                          <td align="center"><?php
                                              $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_msdt WHERE jawaban='B' AND no_soal IN (6,14,22,30,38,46,54,62) AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                                              $result = $nilai->result_array();
                                              $nilai_b6 = $result[0]['jumlah'];

                                              echo "<input type='hidden' id='nilai_b6' value='" . $nilai_b6 . "'><span>" . $nilai_b6 . "</span> </td>";
                                              ?></td>
                          <td align="center"><?php
                                              $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_msdt WHERE jawaban='B' AND no_soal IN (7,15,23,31,39,47,55,63) AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                                              $result = $nilai->result_array();
                                              $nilai_b7 = $result[0]['jumlah'];

                                              echo "<input type='hidden' id='nilai_b7' value='" . $nilai_b7 . "'><span>" . $nilai_b7 . "</span> </td>";
                                              ?></td>
                          <td align="center"><?php
                                              $nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_msdt WHERE jawaban='B' AND no_soal IN (8,16,24,32,40,48,56,64) AND id_lowongan = $lowongan AND id_pelamar=$id_pelamar");
                                              $result = $nilai->result_array();
                                              $nilai_b8 = $result[0]['jumlah'];

                                              echo "<input type='hidden' id='nilai_b8' value='" . $nilai_b8 . "'><span>" . $nilai_b8 . "</span> </td>";
                                              ?></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;">Koreksi</th>
                          <td align="center">+1</td>
                          <td align="center">+2</td>
                          <td align="center">+1</td>
                          <td align="center">0</td>
                          <td align="center">+3</td>
                          <td align="center">-1</td>
                          <td align="center">0</td>
                          <td align="center">-4</td>
                        </tr>
                        <tr>
                          <th style="text-align: center;">Jumlah</th>
                          <td align="center"><span id="jumlah_a1b1"></span></td>
                          <td align="center"><span id="jumlah_a2b2"></td>
                          <td align="center"><span id="jumlah_a3b3"></td>
                          <td align="center"><span id="jumlah_a4b4"></td>
                          <td align="center"><span id="jumlah_a5b5"></td>
                          <td align="center"><span id="jumlah_a6b6"></td>
                          <td align="center"><span id="jumlah_a7b7"></td>
                          <td align="center"><span id="jumlah_a8b8"></td>
                        </tr>
                        <tr>
                          <th style="text-align: center;">TO</th>
                          <td align="center"><span id="jumlah_to"></span></td>
                          <td align="center">
                            <span id="jumlahTo"></span>
                          </td>
                        <tr>
                          <th style="text-align: center;">RO</th>
                          <td align="center"><span id="jumlah_ro"></span></td>
                          <td align="center">
                            <span id="jumlahRo"></span>
                          </td>
                        <tr>
                          <th style="text-align: center;">E</th>
                          <td align="center"><span id="jumlah_e"></span></td>
                          <td align="center">
                            <span id="jumlahE"></span>
                          </td>
                      </tbody>
                      <tr>
                        <th style="text-align: center;">Kategori :</th>
                        <td align="center">
                          <strong><i><span id="jumlahKategori"></i></strong></span>
                        </td>
                    </table>
                  </div>




                  <!-- <tr >
                  <th width="150">IQ :</th>
                  <td></td>
                </tr></br>
                <tr >
                  <th width="150">Kategori :</th>
                  <td></td>
                </tr></br>
                <tr>
                  <th>Nilai Ist :</th>
                  <td></td>
                </tr> -->
                  <style>
                    table,
                    th,
                    td {
                      border: 1px solid black;
                    }

                    th,
                    td {
                      padding: 10px;
                    }
                  </style>

                  <body>
                    <table>
                      <tr>
                        <th>Subtes</th>
                        <th>RS</th>
                        <th>SS</th>
                      </tr>
                      <tr>
                        <td>SE</td>
                        <td><?php
                            $nilai = $this->db->query("SELECT count(tb_data_jawaban_ist.nilai) AS jumlah,tb_data_diri.tanggal_lahir as tgl_lhr FROM tb_data_jawaban_ist INNER JOIN tb_data_diri ON tb_data_jawaban_ist.id_pelamar=tb_data_diri.id_pelamar WHERE tb_data_jawaban_ist.subtes=1 AND tb_data_jawaban_ist.nilai=1 AND tb_data_jawaban_ist.id_lowongan = $id_lowongan_ist AND tb_data_jawaban_ist.id_pelamar=$id_pelamar_ist");
                            $result = $nilai->result_array();
                            $nilai_se = $result[0]['jumlah'];

                            $from = new DateTime($result[0]['tgl_lhr']);
                            $to   = new DateTime('today');
                            $umur = $from->diff($to)->y;


                            echo "<input type='hidden' id='nilai_se' value='" . $nilai_se . "'><span>" . $nilai_se . "</span>";

                            //UMUR 21 - 25
                            if ($umur >= 21 and $umur <= 25) {
                              //benar 0
                              if ($nilai_se == 0) {
                                echo '<td>68</td>';
                              }
                              //benar 1
                              else if ($nilai_se == 1) {
                                echo '<td>71</td>';
                              }
                              //benar 2
                              else if ($nilai_se == 2) {
                                echo '<td>74</td>';
                              }
                              //benar 3
                              else if ($nilai_se == 3) {
                                echo '<td>76</td>';
                              }
                              //benar 4
                              else if ($nilai_se == 4) {
                                echo '<td>79</td>';
                              }
                              //benar 5
                              else if ($nilai_se == 5) {
                                echo '<td>82</td>';
                              }
                              //benar 6
                              else if ($nilai_se == 6) {
                                echo '<td>85</td>';
                              }
                              //benar 7
                              else if ($nilai_se == 7) {
                                echo '<td>88</td>';
                              }
                              //benar 8
                              else if ($nilai_se == 8) {
                                echo '<td>91</td>';
                              }
                              //benar 9
                              else if ($nilai_se == 9) {
                                echo '<td>94</td>';
                              }
                              //benar 10
                              else if ($nilai_se == 10) {
                                echo '<td>97</td>';
                              }
                              //benar 11
                              else if ($nilai_se == 11) {
                                echo '<td>100</td>';
                              }
                              //benar 12
                              else if ($nilai_se == 12) {
                                echo '<td>103</td>';
                              }
                              //benar 13
                              else if ($nilai_se == 13) {
                                echo '<td>106</td>';
                              }
                              //benar 14
                              else if ($nilai_se == 14) {
                                echo '<td>109</td>';
                              }
                              //benar 15
                              else if ($nilai_se == 15) {
                                echo '<td>112</td>';
                              }
                              //benar 16
                              else if ($nilai_se == 16) {
                                echo '<td>115</td>';
                              }
                              //benar 17
                              else if ($nilai_se == 17) {
                                echo '<td>118</td>';
                              }
                              //benar 18
                              else if ($nilai_se == 18) {
                                echo '<td>121</td>';
                              }
                              //benar 19
                              else if ($nilai_se == 19) {
                                echo '<td>124</td>';
                              }
                              //benar 20
                              else if ($nilai_se == 20) {
                                echo '<td>126</td>';
                              }
                            } else if ($umur >= 26 and $umur <= 30) {
                              //benar 0
                              if ($nilai_se == 0) {
                                echo '<td>66</td>';
                              }
                              //benar 1
                              else if ($nilai_se == 1) {
                                echo '<td>69</td>';
                              }
                              //benar 2
                              else if ($nilai_se == 2) {
                                echo '<td>72</td>';
                              }
                              //benar 3
                              else if ($nilai_se == 3) {
                                echo '<td>75</td>';
                              }
                              //benar 4
                              else if ($nilai_se == 4) {
                                echo '<td>78</td>';
                              }
                              //benar 5
                              else if ($nilai_se == 5) {
                                echo '<td>81</td>';
                              }
                              //benar 6
                              else if ($nilai_se == 6) {
                                echo '<td>84</td>';
                              }
                              //benar 7
                              else if ($nilai_se == 7) {
                                echo '<td>87</td>';
                              }
                              //benar 8
                              else if ($nilai_se == 8) {
                                echo '<td>90</td>';
                              }
                              //benar 9
                              else if ($nilai_se == 9) {
                                echo '<td>93</td>';
                              }
                              //benar 10
                              else if ($nilai_se == 10) {
                                echo '<td>96</td>';
                              }
                              //benar 11
                              else if ($nilai_se == 11) {
                                echo '<td>99</td>';
                              }
                              //benar 12
                              else if ($nilai_se == 12) {
                                echo '<td>102</td>';
                              }
                              //benar 13
                              else if ($nilai_se == 13) {
                                echo '<td>105</td>';
                              }
                              //benar 14
                              else if ($nilai_se == 14) {
                                echo '<td>108</td>';
                              }
                              //benar 15
                              else if ($nilai_se == 15) {
                                echo '<td>112</td>';
                              }
                              //benar 16
                              else if ($nilai_se == 16) {
                                echo '<td>115</td>';
                              }
                              //benar 17
                              else if ($nilai_se == 17) {
                                echo '<td>118</td>';
                              }
                              //benar 18
                              else if ($nilai_se == 18) {
                                echo '<td>121</td>';
                              }
                              //benar 19
                              else if ($nilai_se == 19) {
                                echo '<td>124</td>';
                              }
                              //benar 20
                              else if ($nilai_se == 20) {
                                echo '<td>127</td>';
                              }
                            }
                            ?></td>
                      </tr>
                      <tr>
                        <td>WA</td>
                        <td><?php
                            $nilai = $this->db->query("SELECT count(tb_data_jawaban_ist.nilai) AS jumlah,tb_data_diri.tanggal_lahir as tgl_lhr FROM tb_data_jawaban_ist INNER JOIN tb_data_diri ON tb_data_jawaban_ist.id_pelamar=tb_data_diri.id_pelamar WHERE tb_data_jawaban_ist.subtes=2 AND tb_data_jawaban_ist.nilai=1 AND tb_data_jawaban_ist.id_lowongan = $id_lowongan_ist AND tb_data_jawaban_ist.id_pelamar=$id_pelamar_ist");
                            $result = $nilai->result_array();
                            $nilai_wa = $result[0]['jumlah'];

                            $from = new DateTime($result[0]['tgl_lhr']);
                            $to   = new DateTime('today');
                            $umur = $from->diff($to)->y;


                            echo "<input type='hidden' id='nilai_wa' value='" . $nilai_wa . "'><span>" . $nilai_wa . "</span>";

                            //UMUR 21 - 25
                            if ($umur >= 21 and $umur <= 25) {
                              //benar 0
                              if ($nilai_wa == 0) {
                                echo '<td>63</td>';
                              }
                              //benar 1
                              else if ($nilai_wa == 1) {
                                echo '<td>66</td>';
                              }
                              //benar 2
                              else if ($nilai_wa == 2) {
                                echo '<td>70</td>';
                              }
                              //benar 3
                              else if ($nilai_wa == 3) {
                                echo '<td>74</td>';
                              }
                              //benar 4
                              else if ($nilai_wa == 4) {
                                echo '<td>77</td>';
                              }
                              //benar 5
                              else if ($nilai_wa == 5) {
                                echo '<td>81</td>';
                              }
                              //benar 6
                              else if ($nilai_wa == 6) {
                                echo '<td>84</td>';
                              }
                              //benar 7
                              else if ($nilai_wa == 7) {
                                echo '<td>88</td>';
                              }
                              //benar 8
                              else if ($nilai_wa == 8) {
                                echo '<td>91</td>';
                              }
                              //benar 9
                              else if ($nilai_wa == 9) {
                                echo '<td>95</td>';
                              }
                              //benar 10
                              else if ($nilai_wa == 10) {
                                echo '<td>99</td>';
                              }
                              //benar 11
                              else if ($nilai_wa == 11) {
                                echo '<td>102</td>';
                              }
                              //benar 12
                              else if ($nilai_wa == 12) {
                                echo '<td>106</td>';
                              }
                              //benar 13
                              else if ($nilai_wa == 13) {
                                echo '<td>109</td>';
                              }
                              //benar 14
                              else if ($nilai_wa == 14) {
                                echo '<td>113</td>';
                              }
                              //benar 15
                              else if ($nilai_wa == 15) {
                                echo '<td>116</td>';
                              }
                              //benar 16
                              else if ($nilai_wa == 16) {
                                echo '<td>120</td>';
                              }
                              //benar 17
                              else if ($nilai_wa == 17) {
                                echo '<td>124</td>';
                              }
                              //benar 18
                              else if ($nilai_wa == 18) {
                                echo '<td>127</td>';
                              }
                              //benar 19
                              else if ($nilai_wa == 19) {
                                echo '<td>131</td>';
                              }
                              //benar 20
                              else if ($nilai_wa == 20) {
                                echo '<td>134</td>';
                              }
                            } else if ($umur >= 26 and $umur <= 30) {
                              //benar 0
                              if ($nilai_wa == 0) {
                                echo '<td>66</td>';
                              }
                              //benar 1
                              else if ($nilai_wa == 1) {
                                echo '<td>69</td>';
                              }
                              //benar 2
                              else if ($nilai_wa == 2) {
                                echo '<td>73</td>';
                              }
                              //benar 3
                              else if ($nilai_se == 3) {
                                echo '<td>76</td>';
                              }
                              //benar 4
                              else if ($nilai_wa == 4) {
                                echo '<td>79</td>';
                              }
                              //benar 5
                              else if ($nilai_wa == 5) {
                                echo '<td>83</td>';
                              }
                              //benar 6
                              else if ($nilai_wa == 6) {
                                echo '<td>86</td>';
                              }
                              //benar 7
                              else if ($nilai_wa == 7) {
                                echo '<td>89</td>';
                              }
                              //benar 8
                              else if ($nilai_wa == 8) {
                                echo '<td>93</td>';
                              }
                              //benar 9
                              else if ($nilai_wa == 9) {
                                echo '<td>96</td>';
                              }
                              //benar 10
                              else if ($nilai_wa == 10) {
                                echo '<td>99</td>';
                              }
                              //benar 11
                              else if ($nilai_wa == 11) {
                                echo '<td>103</td>';
                              }
                              //benar 12
                              else if ($nilai_wa == 12) {
                                echo '<td>106</td>';
                              }
                              //benar 13
                              else if ($nilai_wa == 13) {
                                echo '<td>109</td>';
                              }
                              //benar 14
                              else if ($nilai_wa == 14) {
                                echo '<td>113</td>';
                              }
                              //benar 15
                              else if ($nilai_wa == 15) {
                                echo '<td>116</td>';
                              }
                              //benar 16
                              else if ($nilai_wa == 16) {
                                echo '<td>119</td>';
                              }
                              //benar 17
                              else if ($nilai_wa == 17) {
                                echo '<td>123</td>';
                              }
                              //benar 18
                              else if ($nilai_wa == 18) {
                                echo '<td>126</td>';
                              }
                              //benar 19
                              else if ($nilai_wa == 19) {
                                echo '<td>129</td>';
                              }
                              //benar 20
                              else if ($nilai_wa == 20) {
                                echo '<td>133</td>';
                              }
                            }
                            ?></td>
                      </tr>
                      <tr>
                        <td>AN</td>
                        <td><?php
                            $nilai = $this->db->query("SELECT count(tb_data_jawaban_ist.nilai) AS jumlah,tb_data_diri.tanggal_lahir as tgl_lhr FROM tb_data_jawaban_ist INNER JOIN tb_data_diri ON tb_data_jawaban_ist.id_pelamar=tb_data_diri.id_pelamar WHERE tb_data_jawaban_ist.subtes=3 AND tb_data_jawaban_ist.nilai=1 AND tb_data_jawaban_ist.id_lowongan = $id_lowongan_ist AND tb_data_jawaban_ist.id_pelamar=$id_pelamar_ist");
                            $result = $nilai->result_array();
                            $nilai_an = $result[0]['jumlah'];

                            $from = new DateTime($result[0]['tgl_lhr']);
                            $to   = new DateTime('today');
                            $umur = $from->diff($to)->y;


                            echo "<input type='hidden' id='nilai_an' value='" . $nilai_an . "'><span>" . $nilai_an . "</span>";

                            //UMUR 21 - 25
                            if ($umur >= 21 and $umur <= 25) {
                              //benar 0
                              if ($nilai_an == 0) {
                                echo '<td>76</td>';
                              }
                              //benar 1
                              else if ($nilai_an == 1) {
                                echo '<td>78</td>';
                              }
                              //benar 2
                              else if ($nilai_an == 2) {
                                echo '<td>81</td>';
                              }
                              //benar 3
                              else if ($nilai_an == 3) {
                                echo '<td>83</td>';
                              }
                              //benar 4
                              else if ($nilai_an == 4) {
                                echo '<td>86</td>';
                              }
                              //benar 5
                              else if ($nilai_an == 5) {
                                echo '<td>88</td>';
                              }
                              //benar 6
                              else if ($nilai_an == 6) {
                                echo '<td>91</td>';
                              }
                              //benar 7
                              else if ($nilai_an == 7) {
                                echo '<td>93</td>';
                              }
                              //benar 8
                              else if ($nilai_an == 8) {
                                echo '<td>96</td>';
                              }
                              //benar 9
                              else if ($nilai_an == 9) {
                                echo '<td>98</td>';
                              }
                              //benar 10
                              else if ($nilai_an == 10) {
                                echo '<td>101</td>';
                              }
                              //benar 11
                              else if ($nilai_an == 11) {
                                echo '<td>103</td>';
                              }
                              //benar 12
                              else if ($nilai_an == 12) {
                                echo '<td>106</td>';
                              }
                              //benar 13
                              else if ($nilai_an == 13) {
                                echo '<td>108</td>';
                              }
                              //benar 14
                              else if ($nilai_an == 14) {
                                echo '<td>111</td>';
                              }
                              //benar 15
                              else if ($nilai_an == 15) {
                                echo '<td>113</td>';
                              }
                              //benar 16
                              else if ($nilai_an == 16) {
                                echo '<td>116</td>';
                              }
                              //benar 17
                              else if ($nilai_an == 17) {
                                echo '<td>118</td>';
                              }
                              //benar 18
                              else if ($nilai_an == 18) {
                                echo '<td>121</td>';
                              }
                              //benar 19
                              else if ($nilai_an == 19) {
                                echo '<td>123</td>';
                              }
                              //benar 20
                              else if ($nilai_an == 20) {
                                echo '<td>126</td>';
                              }
                            } else if ($umur >= 26 and $umur <= 30) {
                              //benar 0
                              if ($nilai_an == 0) {
                                echo '<td>78</td>';
                              }
                              //benar 1
                              else if ($nilai_an == 1) {
                                echo '<td>80</td>';
                              }
                              //benar 2
                              else if ($nilai_an == 2) {
                                echo '<td>83</td>';
                              }
                              //benar 3
                              else if ($nilai_an == 3) {
                                echo '<td>85</td>';
                              }
                              //benar 4
                              else if ($nilai_an == 4) {
                                echo '<td>87</td>';
                              }
                              //benar 5
                              else if ($nilai_an == 5) {
                                echo '<td>90</td>';
                              }
                              //benar 6
                              else if ($nilai_an == 6) {
                                echo '<td>92</td>';
                              }
                              //benar 7
                              else if ($nilai_an == 7) {
                                echo '<td>95</td>';
                              }
                              //benar 8
                              else if ($nilai_an == 8) {
                                echo '<td>97</td>';
                              }
                              //benar 9
                              else if ($nilai_an == 9) {
                                echo '<td>99</td>';
                              }
                              //benar 10
                              else if ($nilai_an == 10) {
                                echo '<td>102</td>';
                              }
                              //benar 11
                              else if ($nilai_an == 11) {
                                echo '<td>104</td>';
                              }
                              //benar 12
                              else if ($nilai_an == 12) {
                                echo '<td>106</td>';
                              }
                              //benar 13
                              else if ($nilai_an == 13) {
                                echo '<td>109</td>';
                              }
                              //benar 14
                              else if ($nilai_an == 14) {
                                echo '<td>111</td>';
                              }
                              //benar 15
                              else if ($nilai_an == 15) {
                                echo '<td>114</td>';
                              }
                              //benar 16
                              else if ($nilai_an == 16) {
                                echo '<td>116</td>';
                              }
                              //benar 17
                              else if ($nilai_an == 17) {
                                echo '<td>118</td>';
                              }
                              //benar 18
                              else if ($nilai_an == 18) {
                                echo '<td>121</td>';
                              }
                              //benar 19
                              else if ($nilai_an == 19) {
                                echo '<td>123</td>';
                              }
                              //benar 20
                              else if ($nilai_an == 20) {
                                echo '<td>125</td>';
                              }
                            }
                            ?></td>
                      </tr>
                      <tr>
                        <td>GE</td>
                        <td><?php
                            $nilai = $this->db->query("SELECT count(tb_data_jawaban_ist.nilai) AS jumlah,tb_data_diri.tanggal_lahir as tgl_lhr FROM tb_data_jawaban_ist INNER JOIN tb_data_diri ON tb_data_jawaban_ist.id_pelamar=tb_data_diri.id_pelamar WHERE tb_data_jawaban_ist.subtes=4 AND tb_data_jawaban_ist.nilai=1 AND tb_data_jawaban_ist.id_lowongan = $id_lowongan_ist AND tb_data_jawaban_ist.id_pelamar=$id_pelamar_ist");
                            $result = $nilai->result_array();
                            $nilai_ge = $result[0]['jumlah'];

                            $from = new DateTime($result[0]['tgl_lhr']);
                            $to   = new DateTime('today');
                            $umur = $from->diff($to)->y;


                            echo "<input type='hidden' id='nilai_ge' value='" . $nilai_ge . "'><span>" . $nilai_ge . "</span>";

                            //UMUR 21 - 25
                            if ($umur >= 21 and $umur <= 25) {
                              //benar 0
                              if ($nilai_ge == 0) {
                                echo '<td>69</td>';
                              }
                              //benar 1
                              else if ($nilai_ge == 1) {
                                echo '<td>72</td>';
                              }
                              //benar 2
                              else if ($nilai_ge == 2) {
                                echo '<td>75</td>';
                              }
                              //benar 3
                              else if ($nilai_ge == 3) {
                                echo '<td>78</td>';
                              }
                              //benar 4
                              else if ($nilai_ge == 4) {
                                echo '<td>81</td>';
                              }
                              //benar 5
                              else if ($nilai_ge == 5) {
                                echo '<td>83</td>';
                              }
                              //benar 6
                              else if ($nilai_ge == 6) {
                                echo '<td>86</td>';
                              }
                              //benar 7
                              else if ($nilai_ge == 7) {
                                echo '<td>89</td>';
                              }
                              //benar 8
                              else if ($nilai_ge == 8) {
                                echo '<td>92</td>';
                              }
                              //benar 9
                              else if ($nilai_ge == 9) {
                                echo '<td>94</td>';
                              }
                              //benar 10
                              else if ($nilai_ge == 10) {
                                echo '<td>97</td>';
                              }
                              //benar 11
                              else if ($nilai_ge == 11) {
                                echo '<td>100</td>';
                              }
                              //benar 12
                              else if ($nilai_ge == 12) {
                                echo '<td>103</td>';
                              }
                              //benar 13
                              else if ($nilai_ge == 13) {
                                echo '<td>106</td>';
                              }
                              //benar 14
                              else if ($nilai_ge == 14) {
                                echo '<td>108</td>';
                              }
                              //benar 15
                              else if ($nilai_ge == 15) {
                                echo '<td>111</td>';
                              }
                              //benar 16
                              else if ($nilai_ge == 16) {
                                echo '<td>114</td>';
                              }
                              //benar 17
                              else if ($nilai_ge == 17) {
                                echo '<td>117</td>';
                              }
                              //benar 18
                              else if ($nilai_ge == 18) {
                                echo '<td>119</td>';
                              }
                              //benar 19
                              else if ($nilai_ge == 19) {
                                echo '<td>122</td>';
                              }
                              //benar 20
                              else if ($nilai_ge == 20) {
                                echo '<td>125</td>';
                              }
                            }

                            //UMUR 26 - 30
                            else if ($umur >= 26 and $umur <= 30) {
                              //benar 0
                              if ($nilai_ge == 0) {
                                echo '<td>69</td>';
                              }
                              //benar 1
                              else if ($nilai_ge == 1) {
                                echo '<td>71</td>';
                              }
                              //benar 2
                              else if ($nilai_ge == 2) {
                                echo '<td>74</td>';
                              }
                              //benar 3
                              else if ($nilai_ge == 3) {
                                echo '<td>77</td>';
                              }
                              //benar 4
                              else if ($nilai_ge == 4) {
                                echo '<td>80</td>';
                              }
                              //benar 5
                              else if ($nilai_ge == 5) {
                                echo '<td>83</td>';
                              }
                              //benar 6
                              else if ($nilai_ge == 6) {
                                echo '<td>85</td>';
                              }
                              //benar 7
                              else if ($nilai_ge == 7) {
                                echo '<td>88</td>';
                              }
                              //benar 8
                              else if ($nilai_ge == 8) {
                                echo '<td>91</td>';
                              }
                              //benar 9
                              else if ($nilai_ge == 9) {
                                echo '<td>94</td>';
                              }
                              //benar 10
                              else if ($nilai_ge == 10) {
                                echo '<td>96</td>';
                              }
                              //benar 11
                              else if ($nilai_ge == 11) {
                                echo '<td>99</td>';
                              }
                              //benar 12
                              else if ($nilai_ge == 12) {
                                echo '<td>102</td>';
                              }
                              //benar 13
                              else if ($nilai_ge == 13) {
                                echo '<td>105</td>';
                              }
                              //benar 14
                              else if ($nilai_ge == 14) {
                                echo '<td>108</td>';
                              }
                              //benar 15
                              else if ($nilai_ge == 15) {
                                echo '<td>110</td>';
                              }
                              //benar 16
                              else if ($nilai_ge == 16) {
                                echo '<td>113</td>';
                              }
                              //benar 17
                              else if ($nilai_ge == 17) {
                                echo '<td>116</td>';
                              }
                              //benar 18
                              else if ($nilai_ge == 18) {
                                echo '<td>119</td>';
                              }
                              //benar 19
                              else if ($nilai_ge == 19) {
                                echo '<td>121</td>';
                              }
                              //benar 20
                              else if ($nilai_ge == 20) {
                                echo '<td>124</td>';
                              }
                            }
                            ?></td>
                      </tr>
                      <tr>
                        <td>RA</td>
                        <td><?php
                            $nilai = $this->db->query("SELECT count(tb_data_jawaban_ist.nilai) AS jumlah,tb_data_diri.tanggal_lahir as tgl_lhr FROM tb_data_jawaban_ist INNER JOIN tb_data_diri ON tb_data_jawaban_ist.id_pelamar=tb_data_diri.id_pelamar WHERE tb_data_jawaban_ist.subtes=5 AND tb_data_jawaban_ist.nilai=1 AND tb_data_jawaban_ist.id_lowongan = $id_lowongan_ist AND tb_data_jawaban_ist.id_pelamar=$id_pelamar_ist");
                            $result = $nilai->result_array();
                            $nilai_ra = $result[0]['jumlah'];

                            $from = new DateTime($result[0]['tgl_lhr']);
                            $to   = new DateTime('today');
                            $umur = $from->diff($to)->y;


                            echo "<input type='hidden' id='nilai_ra' value='" . $nilai_ra . "'><span>" . $nilai_ra . "</span>";

                            //UMUR 21 - 25
                            if ($umur >= 21 and $umur <= 25) {
                              //benar 0
                              if ($nilai_ra == 0) {
                                echo '<td>74</td>';
                              }
                              //benar 1
                              else if ($nilai_ra == 1) {
                                echo '<td>77</td>';
                              }
                              //benar 2
                              else if ($nilai_ra == 2) {
                                echo '<td>79</td>';
                              }
                              //benar 3
                              else if ($nilai_ra == 3) {
                                echo '<td>82</td>';
                              }
                              //benar 4
                              else if ($nilai_ra == 4) {
                                echo '<td>85</td>';
                              }
                              //benar 5
                              else if ($nilai_ra == 5) {
                                echo '<td>88</td>';
                              }
                              //benar 6
                              else if ($nilai_ra == 6) {
                                echo '<td>91</td>';
                              }
                              //benar 7
                              else if ($nilai_ra == 7) {
                                echo '<td>94</td>';
                              }
                              //benar 8
                              else if ($nilai_ra == 8) {
                                echo '<td>97</td>';
                              }
                              //benar 9
                              else if ($nilai_ra == 9) {
                                echo '<td>99</td>';
                              }
                              //benar 10
                              else if ($nilai_ra == 10) {
                                echo '<td>102</td>';
                              }
                              //benar 11
                              else if ($nilai_ra == 11) {
                                echo '<td>105</td>';
                              }
                              //benar 12
                              else if ($nilai_ra == 12) {
                                echo '<td>108</td>';
                              }
                              //benar 13
                              else if ($nilai_ra == 13) {
                                echo '<td>111</td>';
                              }
                              //benar 14
                              else if ($nilai_ra == 14) {
                                echo '<td>114</td>';
                              }
                              //benar 15
                              else if ($nilai_ra == 15) {
                                echo '<td>117</td>';
                              }
                              //benar 16
                              else if ($nilai_ra == 16) {
                                echo '<td>119</td>';
                              }
                              //benar 17
                              else if ($nilai_ra == 17) {
                                echo '<td>122</td>';
                              }
                              //benar 18
                              else if ($nilai_ra == 18) {
                                echo '<td>125</td>';
                              }
                              //benar 19
                              else if ($nilai_ra == 19) {
                                echo '<td>128</td>';
                              }
                              //benar 20
                              else if ($nilai_ra == 20) {
                                echo '<td>131</td>';
                              }
                            } else if ($umur >= 26 and $umur <= 30) {
                              //benar 0
                              if ($nilai_ra == 0) {
                                echo '<td>74</td>';
                              }
                              //benar 1
                              else if ($nilai_ra == 1) {
                                echo '<td>77</td>';
                              }
                              //benar 2
                              else if ($nilai_ra == 2) {
                                echo '<td>79</td>';
                              }
                              //benar 3
                              else if ($nilai_ra == 3) {
                                echo '<td>82</td>';
                              }
                              //benar 4
                              else if ($nilai_ra == 4) {
                                echo '<td>85</td>';
                              }
                              //benar 5
                              else if ($nilai_ra == 5) {
                                echo '<td>88</td>';
                              }
                              //benar 6
                              else if ($nilai_ra == 6) {
                                echo '<td>91</td>';
                              }
                              //benar 7
                              else if ($nilai_ra == 7) {
                                echo '<td>94</td>';
                              }
                              //benar 8
                              else if ($nilai_ra == 8) {
                                echo '<td>97</td>';
                              }
                              //benar 9
                              else if ($nilai_ra == 9) {
                                echo '<td>99</td>';
                              }
                              //benar 10
                              else if ($nilai_ra == 10) {
                                echo '<td>102</td>';
                              }
                              //benar 11
                              else if ($nilai_ra == 11) {
                                echo '<td>105</td>';
                              }
                              //benar 12
                              else if ($nilai_ra == 12) {
                                echo '<td>108</td>';
                              }
                              //benar 13
                              else if ($nilai_ra == 13) {
                                echo '<td>111</td>';
                              }
                              //benar 14
                              else if ($nilai_ra == 14) {
                                echo '<td>114</td>';
                              }
                              //benar 15
                              else if ($nilai_ra == 15) {
                                echo '<td>117</td>';
                              }
                              //benar 16
                              else if ($nilai_ra == 16) {
                                echo '<td>119</td>';
                              }
                              //benar 17
                              else if ($nilai_ra == 17) {
                                echo '<td>122</td>';
                              }
                              //benar 18
                              else if ($nilai_ra == 18) {
                                echo '<td>125</td>';
                              }
                              //benar 19
                              else if ($nilai_ra == 19) {
                                echo '<td>128</td>';
                              }
                              //benar 20
                              else if ($nilai_ra == 20) {
                                echo '<td>131</td>';
                              }
                            }
                            ?></td>
                      </tr>
                      <tr>
                        <td>ZR</td>
                        <td><?php
                            $nilai = $this->db->query("SELECT count(tb_data_jawaban_ist.nilai) AS jumlah,tb_data_diri.tanggal_lahir as tgl_lhr FROM tb_data_jawaban_ist INNER JOIN tb_data_diri ON tb_data_jawaban_ist.id_pelamar=tb_data_diri.id_pelamar WHERE tb_data_jawaban_ist.subtes=6 AND tb_data_jawaban_ist.nilai=1 AND tb_data_jawaban_ist.id_lowongan = $id_lowongan_ist AND tb_data_jawaban_ist.id_pelamar=$id_pelamar_ist");
                            $result = $nilai->result_array();
                            $nilai_zr = $result[0]['jumlah'];

                            $from = new DateTime($result[0]['tgl_lhr']);
                            $to   = new DateTime('today');
                            $umur = $from->diff($to)->y;


                            echo "<input type='hidden' id='nilai_zr' value='" . $nilai_zr . "'><span>" . $nilai_zr . "</span>";

                            //UMUR 21 - 25
                            if ($umur >= 21 and $umur <= 25) {
                              //benar 0
                              if ($nilai_zr == 0) {
                                echo '<td>77</td>';
                              }
                              //benar 1
                              else if ($nilai_zr == 1) {
                                echo '<td>80</td>';
                              }
                              //benar 2
                              else if ($nilai_zr == 2) {
                                echo '<td>82</td>';
                              }
                              //benar 3
                              else if ($nilai_zr == 3) {
                                echo '<td>84</td>';
                              }
                              //benar 4
                              else if ($nilai_zr == 4) {
                                echo '<td>87</td>';
                              }
                              //benar 5
                              else if ($nilai_zr == 5) {
                                echo '<td>89</td>';
                              }
                              //benar 6
                              else if ($nilai_zr == 6) {
                                echo '<td>91</td>';
                              }
                              //benar 7
                              else if ($nilai_zr == 7) {
                                echo '<td>94</td>';
                              }
                              //benar 8
                              else if ($nilai_zr == 8) {
                                echo '<td>96</td>';
                              }
                              //benar 9
                              else if ($nilai_zr == 9) {
                                echo '<td>99</td>';
                              }
                              //benar 10
                              else if ($nilai_zr == 10) {
                                echo '<td>101</td>';
                              }
                              //benar 11
                              else if ($nilai_zr == 11) {
                                echo '<td>103</td>';
                              }
                              //benar 12
                              else if ($nilai_zr == 12) {
                                echo '<td>106</td>';
                              }
                              //benar 13
                              else if ($nilai_zr == 13) {
                                echo '<td>108</td>';
                              }
                              //benar 14
                              else if ($nilai_zr == 14) {
                                echo '<td>110</td>';
                              }
                              //benar 15
                              else if ($nilai_zr == 15) {
                                echo '<td>113</td>';
                              }
                              //benar 16
                              else if ($nilai_zr == 16) {
                                echo '<td>115</td>';
                              }
                              //benar 17
                              else if ($nilai_zr == 17) {
                                echo '<td>118</td>';
                              }
                              //benar 18
                              else if ($nilai_zr == 18) {
                                echo '<td>120</td>';
                              }
                              //benar 19
                              else if ($nilai_zr == 19) {
                                echo '<td>122</td>';
                              }
                              //benar 20
                              else if ($nilai_zr == 20) {
                                echo '<td>125</td>';
                              }
                            } else if ($umur >= 26 and $umur <= 30) {
                              //benar 0
                              if ($nilai_zr == 0) {
                                echo '<td>79</td>';
                              }
                              //benar 1
                              else if ($nilai_zr == 1) {
                                echo '<td>81</td>';
                              }
                              //benar 2
                              else if ($nilai_zr == 2) {
                                echo '<td>83</td>';
                              }
                              //benar 3
                              else if ($nilai_zr == 3) {
                                echo '<td>86</td>';
                              }
                              //benar 4
                              else if ($nilai_zr == 4) {
                                echo '<td>88</td>';
                              }
                              //benar 5
                              else if ($nilai_zr == 5) {
                                echo '<td>90</td>';
                              }
                              //benar 6
                              else if ($nilai_zr == 6) {
                                echo '<td>93</td>';
                              }
                              //benar 7
                              else if ($nilai_zr == 7) {
                                echo '<td>95</td>';
                              }
                              //benar 8
                              else if ($nilai_zr == 8) {
                                echo '<td>97</td>';
                              }
                              //benar 9
                              else if ($nilai_zr == 9) {
                                echo '<td>100</td>';
                              }
                              //benar 10
                              else if ($nilai_zr == 10) {
                                echo '<td>102</td>';
                              }
                              //benar 11
                              else if ($nilai_zr == 11) {
                                echo '<td>104</td>';
                              }
                              //benar 12
                              else if ($nilai_zr == 12) {
                                echo '<td>107</td>';
                              }
                              //benar 13
                              else if ($nilai_zr == 13) {
                                echo '<td>109</td>';
                              }
                              //benar 14
                              else if ($nilai_zr == 14) {
                                echo '<td>111</td>';
                              }
                              //benar 15
                              else if ($nilai_zr == 15) {
                                echo '<td>113</td>';
                              }
                              //benar 16
                              else if ($nilai_zr == 16) {
                                echo '<td>116</td>';
                              }
                              //benar 17
                              else if ($nilai_zr == 17) {
                                echo '<td>118</td>';
                              }
                              //benar 18
                              else if ($nilai_zr == 18) {
                                echo '<td>120</td>';
                              }
                              //benar 19
                              else if ($nilai_zr == 19) {
                                echo '<td>123</td>';
                              }
                              //benar 20
                              else if ($nilai_zr == 20) {
                                echo '<td>125</td>';
                              }
                            }
                            ?></td>
                      </tr>
                      <tr>
                        <td>FA</td>
                        <td><?php
                            $nilai = $this->db->query("SELECT count(tb_data_jawaban_ist.nilai) AS jumlah,tb_data_diri.tanggal_lahir as tgl_lhr FROM tb_data_jawaban_ist INNER JOIN tb_data_diri ON tb_data_jawaban_ist.id_pelamar=tb_data_diri.id_pelamar WHERE tb_data_jawaban_ist.subtes=7 AND tb_data_jawaban_ist.nilai=1 AND tb_data_jawaban_ist.id_lowongan = $id_lowongan_ist AND tb_data_jawaban_ist.id_pelamar=$id_pelamar_ist");
                            $result = $nilai->result_array();
                            $nilai_fa = $result[0]['jumlah'];

                            $from = new DateTime($result[0]['tgl_lhr']);
                            $to   = new DateTime('today');
                            $umur = $from->diff($to)->y;


                            echo "<input type='hidden' id='nilai_fa' value='" . $nilai_fa . "'><span>" . $nilai_fa . "</span>";

                            //UMUR 21 - 25
                            if ($umur >= 21 and $umur <= 25) {
                              //benar 0
                              if ($nilai_fa == 0) {
                                echo '<td>70</td>';
                              }
                              //benar 1
                              else if ($nilai_fa == 1) {
                                echo '<td>73</td>';
                              }
                              //benar 2
                              else if ($nilai_fa == 2) {
                                echo '<td>76</td>';
                              }
                              //benar 3
                              else if ($nilai_fa == 3) {
                                echo '<td>79</td>';
                              }
                              //benar 4
                              else if ($nilai_fa == 4) {
                                echo '<td>81</td>';
                              }
                              //benar 5
                              else if ($nilai_fa == 5) {
                                echo '<td>84</td>';
                              }
                              //benar 6
                              else if ($nilai_fa == 6) {
                                echo '<td>87</td>';
                              }
                              //benar 7
                              else if ($nilai_fa == 7) {
                                echo '<td>90</td>';
                              }
                              //benar 8
                              else if ($nilai_fa == 8) {
                                echo '<td>93</td>';
                              }
                              //benar 9
                              else if ($nilai_fa == 9) {
                                echo '<td>96</td>';
                              }
                              //benar 10
                              else if ($nilai_fa == 10) {
                                echo '<td>99</td>';
                              }
                              //benar 11
                              else if ($nilai_fa == 11) {
                                echo '<td>101</td>';
                              }
                              //benar 12
                              else if ($nilai_fa == 12) {
                                echo '<td>104</td>';
                              }
                              //benar 13
                              else if ($nilai_fa == 13) {
                                echo '<td>107</td>';
                              }
                              //benar 14
                              else if ($nilai_fa == 14) {
                                echo '<td>110</td>';
                              }
                              //benar 15
                              else if ($nilai_fa == 15) {
                                echo '<td>113</td>';
                              }
                              //benar 16
                              else if ($nilai_fa == 16) {
                                echo '<td>116</td>';
                              }
                              //benar 17
                              else if ($nilai_fa == 17) {
                                echo '<td>119</td>';
                              }
                              //benar 18
                              else if ($nilai_fa == 18) {
                                echo '<td>121</td>';
                              }
                              //benar 19
                              else if ($nilai_fa == 19) {
                                echo '<td>124</td>';
                              }
                              //benar 20
                              else if ($nilai_fa == 20) {
                                echo '<td>127</td>';
                              }
                            } else if ($umur >= 26 and $umur <= 30) {
                              //benar 0
                              if ($nilai_fa == 0) {
                                echo '<td>71</td>';
                              }
                              //benar 1
                              else if ($nilai_fa == 1) {
                                echo '<td>73</td>';
                              }
                              //benar 2
                              else if ($nilai_fa == 2) {
                                echo '<td>76</td>';
                              }
                              //benar 3
                              else if ($nilai_fa == 3) {
                                echo '<td>79</td>';
                              }
                              //benar 4
                              else if ($nilai_fa == 4) {
                                echo '<td>82</td>';
                              }
                              //benar 5
                              else if ($nilai_fa == 5) {
                                echo '<td>85</td>';
                              }
                              //benar 6
                              else if ($nilai_fa == 6) {
                                echo '<td>88</td>';
                              }
                              //benar 7
                              else if ($nilai_fa == 7) {
                                echo '<td>91</td>';
                              }
                              //benar 8
                              else if ($nilai_fa == 8) {
                                echo '<td>93</td>';
                              }
                              //benar 9
                              else if ($nilai_fa == 9) {
                                echo '<td>96</td>';
                              }
                              //benar 10
                              else if ($nilai_fa == 10) {
                                echo '<td>99</td>';
                              }
                              //benar 11
                              else if ($nilai_fa == 11) {
                                echo '<td>102</td>';
                              }
                              //benar 12
                              else if ($nilai_fa == 12) {
                                echo '<td>105</td>';
                              }
                              //benar 13
                              else if ($nilai_fa == 13) {
                                echo '<td>108</td>';
                              }
                              //benar 14
                              else if ($nilai_fa == 14) {
                                echo '<td>111</td>';
                              }
                              //benar 15
                              else if ($nilai_fa == 15) {
                                echo '<td>113</td>';
                              }
                              //benar 16
                              else if ($nilai_fa == 16) {
                                echo '<td>116</td>';
                              }
                              //benar 17
                              else if ($nilai_fa == 17) {
                                echo '<td>119</td>';
                              }
                              //benar 18
                              else if ($nilai_fa == 18) {
                                echo '<td>122</td>';
                              }
                              //benar 19
                              else if ($nilai_fa == 19) {
                                echo '<td>125</td>';
                              }
                              //benar 20
                              else if ($nilai_fa == 20) {
                                echo '<td>128</td>';
                              }
                            }
                            ?></td>
                      </tr>
                      <tr>
                        <td>WU</td>
                        <td><?php
                            $nilai = $this->db->query("SELECT count(tb_data_jawaban_ist.nilai) AS jumlah,tb_data_diri.tanggal_lahir as tgl_lhr FROM tb_data_jawaban_ist INNER JOIN tb_data_diri ON tb_data_jawaban_ist.id_pelamar=tb_data_diri.id_pelamar WHERE tb_data_jawaban_ist.subtes=8 AND tb_data_jawaban_ist.nilai=1 AND tb_data_jawaban_ist.id_lowongan = $id_lowongan_ist AND tb_data_jawaban_ist.id_pelamar=$id_pelamar_ist");
                            $result = $nilai->result_array();
                            $nilai_wu = $result[0]['jumlah'];

                            $from = new DateTime($result[0]['tgl_lhr']);
                            $to   = new DateTime('today');
                            $umur = $from->diff($to)->y;


                            echo "<input type='hidden' id='nilai_wu' value='" . $nilai_wu . "'><span>" . $nilai_wu . "</span>";

                            //UMUR 21 - 25
                            if ($umur >= 21 and $umur <= 25) {
                              //benar 0
                              if ($nilai_wu == 0) {
                                echo '<td>72</td>';
                              }
                              //benar 1
                              else if ($nilai_wu == 1) {
                                echo '<td>75</td>';
                              }
                              //benar 2
                              else if ($nilai_wu == 2) {
                                echo '<td>77</td>';
                              }
                              //benar 3
                              else if ($nilai_wu == 3) {
                                echo '<td>80</td>';
                              }
                              //benar 4
                              else if ($nilai_wu == 4) {
                                echo '<td>83</td>';
                              }
                              //benar 5
                              else if ($nilai_wu == 5) {
                                echo '<td>86</td>';
                              }
                              //benar 6
                              else if ($nilai_wu == 6) {
                                echo '<td>89</td>';
                              }
                              //benar 7
                              else if ($nilai_wu == 7) {
                                echo '<td>92</td>';
                              }
                              //benar 8
                              else if ($nilai_wu == 8) {
                                echo '<td>95</td>';
                              }
                              //benar 9
                              else if ($nilai_wu == 9) {
                                echo '<td>97</td>';
                              }
                              //benar 10
                              else if ($nilai_wu == 10) {
                                echo '<td>100</td>';
                              }
                              //benar 11
                              else if ($nilai_wu == 11) {
                                echo '<td>103</td>';
                              }
                              //benar 12
                              else if ($nilai_wu == 12) {
                                echo '<td>106</td>';
                              }
                              //benar 13
                              else if ($nilai_wu == 13) {
                                echo '<td>109</td>';
                              }
                              //benar 14
                              else if ($nilai_wu == 14) {
                                echo '<td>112</td>';
                              }
                              //benar 15
                              else if ($nilai_wu == 15) {
                                echo '<td>115</td>';
                              }
                              //benar 16
                              else if ($nilai_wu == 16) {
                                echo '<td>117</td>';
                              }
                              //benar 17
                              else if ($nilai_wu == 17) {
                                echo '<td>120</td>';
                              }
                              //benar 18
                              else if ($nilai_wu == 18) {
                                echo '<td>123</td>';
                              }
                              //benar 19
                              else if ($nilai_wu == 19) {
                                echo '<td>126</td>';
                              }
                              //benar 20
                              else if ($nilai_wu == 20) {
                                echo '<td>129</td>';
                              }
                            } else if ($umur >= 26 and $umur <= 30) {
                              //benar 0
                              if ($nilai_wu == 0) {
                                echo '<td>72</td>';
                              }
                              //benar 1
                              else if ($nilai_wu == 1) {
                                echo '<td>75</td>';
                              }
                              //benar 2
                              else if ($nilai_wu == 2) {
                                echo '<td>78</td>';
                              }
                              //benar 3
                              else if ($nilai_wu == 3) {
                                echo '<td>81</td>';
                              }
                              //benar 4
                              else if ($nilai_wu == 4) {
                                echo '<td>84</td>';
                              }
                              //benar 5
                              else if ($nilai_wu == 5) {
                                echo '<td>87</td>';
                              }
                              //benar 6
                              else if ($nilai_wu == 6) {
                                echo '<td>90</td>';
                              }
                              //benar 7
                              else if ($nilai_wu == 7) {
                                echo '<td>93</td>';
                              }
                              //benar 8
                              else if ($nilai_wu == 8) {
                                echo '<td>96</td>';
                              }
                              //benar 9
                              else if ($nilai_wu == 9) {
                                echo '<td>99</td>';
                              }
                              //benar 10
                              else if ($nilai_wu == 10) {
                                echo '<td>101</td>';
                              }
                              //benar 11
                              else if ($nilai_wu == 11) {
                                echo '<td>104</td>';
                              }
                              //benar 12
                              else if ($nilai_wu == 12) {
                                echo '<td>107</td>';
                              }
                              //benar 13
                              else if ($nilai_wu == 13) {
                                echo '<td>110</td>';
                              }
                              //benar 14
                              else if ($nilai_wu == 14) {
                                echo '<td>113</td>';
                              }
                              //benar 15
                              else if ($nilai_wu == 15) {
                                echo '<td>116</td>';
                              }
                              //benar 16
                              else if ($nilai_wu == 16) {
                                echo '<td>119</td>';
                              }
                              //benar 17
                              else if ($nilai_wu == 17) {
                                echo '<td>122</td>';
                              }
                              //benar 18
                              else if ($nilai_wu == 18) {
                                echo '<td>125</td>';
                              }
                              //benar 19
                              else if ($nilai_wu == 19) {
                                echo '<td>128</td>';
                              }
                              //benar 20
                              else if ($nilai_wu == 20) {
                                echo '<td>131</td>';
                              }
                            }
                            ?></td>
                      </tr>
                      <tr>
                        <td>ME</td>
                        <td><?php
                            $nilai = $this->db->query("SELECT count(tb_data_jawaban_ist.nilai) AS jumlah,tb_data_diri.tanggal_lahir as tgl_lhr FROM tb_data_jawaban_ist INNER JOIN tb_data_diri ON tb_data_jawaban_ist.id_pelamar=tb_data_diri.id_pelamar WHERE tb_data_jawaban_ist.subtes=9 AND tb_data_jawaban_ist.nilai=1 AND tb_data_jawaban_ist.id_lowongan = $id_lowongan_ist AND tb_data_jawaban_ist.id_pelamar=$id_pelamar_ist");
                            $result = $nilai->result_array();
                            $nilai_me = $result[0]['jumlah'];

                            $from = new DateTime($result[0]['tgl_lhr']);
                            $to   = new DateTime('today');
                            $umur = $from->diff($to)->y;


                            echo "<input type='hidden' id='nilai_me' value='" . $nilai_me . "'><span>" . $nilai_me . "</span>";

                            //UMUR 21 - 25
                            if ($umur >= 21 and $umur <= 25) {
                              //benar 0
                              if ($nilai_me == 0) {
                                echo '<td>75</td>';
                              }
                              //benar 1
                              else if ($nilai_me == 1) {
                                echo '<td>77</td>';
                              }
                              //benar 2
                              else if ($nilai_me == 2) {
                                echo '<td>80</td>';
                              }
                              //benar 3
                              else if ($nilai_me == 3) {
                                echo '<td>82</td>';
                              }
                              //benar 4
                              else if ($nilai_me == 4) {
                                echo '<td>84</td>';
                              }
                              //benar 5
                              else if ($nilai_me == 5) {
                                echo '<td>87</td>';
                              }
                              //benar 6
                              else if ($nilai_me == 6) {
                                echo '<td>89</td>';
                              }
                              //benar 7
                              else if ($nilai_me == 7) {
                                echo '<td>91</td>';
                              }
                              //benar 8
                              else if ($nilai_me == 8) {
                                echo '<td>94</td>';
                              }
                              //benar 9
                              else if ($nilai_me == 9) {
                                echo '<td>96</td>';
                              }
                              //benar 10
                              else if ($nilai_me == 10) {
                                echo '<td>98</td>';
                              }
                              //benar 11
                              else if ($nilai_me == 11) {
                                echo '<td>101</td>';
                              }
                              //benar 12
                              else if ($nilai_me == 12) {
                                echo '<td>103</td>';
                              }
                              //benar 13
                              else if ($nilai_me == 13) {
                                echo '<td>105</td>';
                              }
                              //benar 14
                              else if ($nilai_me == 14) {
                                echo '<td>108</td>';
                              }
                              //benar 15
                              else if ($nilai_me == 15) {
                                echo '<td>110</td>';
                              }
                              //benar 16
                              else if ($nilai_me == 16) {
                                echo '<td>112</td>';
                              }
                              //benar 17
                              else if ($nilai_me == 17) {
                                echo '<td>115</td>';
                              }
                              //benar 18
                              else if ($nilai_me == 18) {
                                echo '<td>117</td>';
                              }
                              //benar 19
                              else if ($nilai_me == 19) {
                                echo '<td>119</td>';
                              }
                              //benar 20
                              else if ($nilai_me == 20) {
                                echo '<td>122</td>';
                              }
                            } else if ($umur >= 26 and $umur <= 30) {
                              //benar 0
                              if ($nilai_me == 0) {
                                echo '<td>77</td>';
                              }
                              //benar 1
                              else if ($nilai_me == 1) {
                                echo '<td>80</td>';
                              }
                              //benar 2
                              else if ($nilai_me == 2) {
                                echo '<td>82</td>';
                              }
                              //benar 3
                              else if ($nilai_me == 3) {
                                echo '<td>84</td>';
                              }
                              //benar 4
                              else if ($nilai_me == 4) {
                                echo '<td>86</td>';
                              }
                              //benar 5
                              else if ($nilai_me == 5) {
                                echo '<td>89</td>';
                              }
                              //benar 6
                              else if ($nilai_me == 6) {
                                echo '<td>91</td>';
                              }
                              //benar 7
                              else if ($nilai_me == 7) {
                                echo '<td>93</td>';
                              }
                              //benar 8
                              else if ($nilai_me == 8) {
                                echo '<td>95</td>';
                              }
                              //benar 9
                              else if ($nilai_me == 9) {
                                echo '<td>98</td>';
                              }
                              //benar 10
                              else if ($nilai_me == 10) {
                                echo '<td>100</td>';
                              }
                              //benar 11
                              else if ($nilai_me == 11) {
                                echo '<td>102</td>';
                              }
                              //benar 12
                              else if ($nilai_me == 12) {
                                echo '<td>105</td>';
                              }
                              //benar 13
                              else if ($nilai_me == 13) {
                                echo '<td>107</td>';
                              }
                              //benar 14
                              else if ($nilai_me == 14) {
                                echo '<td>109</td>';
                              }
                              //benar 15
                              else if ($nilai_me == 15) {
                                echo '<td>111</td>';
                              }
                              //benar 16
                              else if ($nilai_me == 16) {
                                echo '<td>114</td>';
                              }
                              //benar 17
                              else if ($nilai_me == 17) {
                                echo '<td>116</td>';
                              }
                              //benar 18
                              else if ($nilai_me == 18) {
                                echo '<td>118</td>';
                              }
                              //benar 19
                              else if ($nilai_me == 19) {
                                echo '<td>120</td>';
                              }
                              //benar 20
                              else if ($nilai_me == 20) {
                                echo '<td>123</td>';
                              }
                            }
                            ?></td>
                      </tr>
                      <tr>
                        <td>GESAMT</td>
                        <td><span id="rs_gesamt"></span></td>
                        <td><span id="ss_gesamt"></span></td>
                      </tr>
                    </table>

                  </body>
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
<script>
  var nilaise = document.getElementById("nilai_se").value;
  var nilai_se = parseInt(nilaise, 10);
  var nilaiwa = document.getElementById("nilai_wa").value;
  var nilai_wa = parseInt(nilaiwa, 10);
  var nilaian = document.getElementById("nilai_an").value;
  var nilai_an = parseInt(nilaian, 10);
  var nilaige = document.getElementById("nilai_ge").value;
  var nilai_ge = parseInt(nilaige, 10);
  var nilaira = document.getElementById("nilai_ra").value;
  var nilai_ra = parseInt(nilaira, 10);
  var nilaizr = document.getElementById("nilai_zr").value;
  var nilai_zr = parseInt(nilaizr, 10);
  var nilaifa = document.getElementById("nilai_fa").value;
  var nilai_fa = parseInt(nilaifa, 10);
  var nilaiwu = document.getElementById("nilai_wu").value;
  var nilai_wu = parseInt(nilaiwu, 10);
  var nilaime = document.getElementById("nilai_me").value;
  var nilai_me = parseInt(nilaime, 10);
  var rs = nilai_se + nilai_wa + nilai_an + nilai_ge + nilai_ra + nilai_zr + nilai_fa + nilai_wu + nilai_me;
  var ss = parseInt(rs, 10);

  var umur = document.getElementById("umur").value;
  var umure = parseInt(umur, 10);

  document.getElementById("rs_gesamt").innerHTML = rs;

  if (umure >= 21 && umure <= 25) {
    if (ss >= 1 && ss <= 10) {
      document.getElementById("ss_gesamt").innerHTML = "67";
    } else if (ss >= 11 && ss <= 20) {
      document.getElementById("ss_gesamt").innerHTML = "70";
    } else if (ss >= 21 && ss <= 30) {
      document.getElementById("ss_gesamt").innerHTML = "74";
    } else if (ss >= 31 && ss <= 40) {
      document.getElementById("ss_gesamt").innerHTML = "78";
    } else if (ss >= 41 && ss <= 50) {
      document.getElementById("ss_gesamt").innerHTML = "82";
    } else if (ss >= 51 && ss <= 60) {
      document.getElementById("ss_gesamt").innerHTML = "86";
    } else if (ss >= 61 && ss <= 70) {
      document.getElementById("ss_gesamt").innerHTML = "90";
    } else if (ss >= 71 && ss <= 80) {
      document.getElementById("ss_gesamt").innerHTML = "93";
    } else if (ss >= 81 && ss <= 90) {
      document.getElementById("ss_gesamt").innerHTML = "97";
    } else if (ss >= 91 && ss <= 100) {
      document.getElementById("ss_gesamt").innerHTML = "101";
    } else if (ss >= 101 && ss <= 110) {
      document.getElementById("ss_gesamt").innerHTML = "105";
    } else if (ss >= 111 && ss <= 120) {
      document.getElementById("ss_gesamt").innerHTML = "109";
    } else if (ss >= 121 && ss <= 130) {
      document.getElementById("ss_gesamt").innerHTML = "113";
    } else if (ss >= 131 && ss <= 140) {
      document.getElementById("ss_gesamt").innerHTML = "117";
    } else if (ss >= 141 && ss <= 150) {
      document.getElementById("ss_gesamt").innerHTML = "120";
    } else if (ss >= 151 && ss <= 160) {
      document.getElementById("ss_gesamt").innerHTML = "124";
    } else if (ss >= 161 && ss <= 170) {
      document.getElementById("ss_gesamt").innerHTML = "128";
    } else if (ss >= 171 && ss <= 180) {
      document.getElementById("ss_gesamt").innerHTML = "132";
    }
  } else if (umure >= 26 && umure <= 30) {
    if (ss >= 1 && ss <= 10) {
      document.getElementById("ss_gesamt").innerHTML = "67";
    } else if (ss >= 11 && ss <= 20) {
      document.getElementById("ss_gesamt").innerHTML = "71";
    } else if (ss >= 21 && ss <= 30) {
      document.getElementById("ss_gesamt").innerHTML = "75";
    } else if (ss >= 31 && ss <= 40) {
      document.getElementById("ss_gesamt").innerHTML = "79";
    } else if (ss >= 41 && ss <= 50) {
      document.getElementById("ss_gesamt").innerHTML = "83";
    } else if (ss >= 51 && ss <= 60) {
      document.getElementById("ss_gesamt").innerHTML = "87";
    } else if (ss >= 61 && ss <= 70) {
      document.getElementById("ss_gesamt").innerHTML = "90";
    } else if (ss >= 71 && ss <= 80) {
      document.getElementById("ss_gesamt").innerHTML = "94";
    } else if (ss >= 81 && ss <= 90) {
      document.getElementById("ss_gesamt").innerHTML = "98";
    } else if (ss >= 91 && ss <= 100) {
      document.getElementById("ss_gesamt").innerHTML = "102";
    } else if (ss >= 101 && ss <= 110) {
      document.getElementById("ss_gesamt").innerHTML = "106";
    } else if (ss >= 111 && ss <= 120) {
      document.getElementById("ss_gesamt").innerHTML = "110";
    } else if (ss >= 121 && ss <= 130) {
      document.getElementById("ss_gesamt").innerHTML = "113";
    } else if (ss >= 131 && ss <= 140) {
      document.getElementById("ss_gesamt").innerHTML = "117";
    } else if (ss >= 141 && ss <= 150) {
      document.getElementById("ss_gesamt").innerHTML = "121";
    } else if (ss >= 151 && ss <= 160) {
      document.getElementById("ss_gesamt").innerHTML = "125";
    } else if (ss >= 161 && ss <= 170) {
      document.getElementById("ss_gesamt").innerHTML = "129";
    } else if (ss >= 171 && ss <= 180) {
      document.getElementById("ss_gesamt").innerHTML = "133";
    }
  }

  // ============================

  var nilaia1 = document.getElementById("nilai_a1").value;
  var nilai_a1 = parseInt(nilaia1, 10);
  var nilaib1 = document.getElementById("nilai_b1").value;
  var nilai_b1 = parseInt(nilaib1, 10);
  var a1b1 = nilai_a1 + nilai_b1 + 1;
  document.getElementById("jumlah_a1b1").innerHTML = a1b1;

  var nilaia2 = document.getElementById("nilai_a2").value;
  var nilai_a2 = parseInt(nilaia2, 10);
  var nilaib2 = document.getElementById("nilai_b2").value;
  var nilai_b2 = parseInt(nilaib2, 10);
  var a2b2 = nilai_a2 + nilai_b2 + 2;
  document.getElementById("jumlah_a2b2").innerHTML = a2b2;

  var nilaia3 = document.getElementById("nilai_a3").value;
  var nilai_a3 = parseInt(nilaia3, 10);
  var nilaib3 = document.getElementById("nilai_b3").value;
  var nilai_b3 = parseInt(nilaib3, 10);
  var a3b3 = nilai_a3 + nilai_b3 + 1;
  document.getElementById("jumlah_a3b3").innerHTML = a3b3;

  var nilaia4 = document.getElementById("nilai_a4").value;
  var nilai_a4 = parseInt(nilaia4, 10);
  var nilaib4 = document.getElementById("nilai_b4").value;
  var nilai_b4 = parseInt(nilaib4, 10);
  var a4b4 = nilai_a4 + nilai_b4 + 0;
  document.getElementById("jumlah_a4b4").innerHTML = a4b4;

  var nilaia5 = document.getElementById("nilai_a5").value;
  var nilai_a5 = parseInt(nilaia5, 10);
  var nilaib5 = document.getElementById("nilai_b5").value;
  var nilai_b5 = parseInt(nilaib5, 10);
  var a5b5 = nilai_a5 + nilai_b5 + 3;
  document.getElementById("jumlah_a5b5").innerHTML = a5b5;

  var nilaia6 = document.getElementById("nilai_a6").value;
  var nilai_a6 = parseInt(nilaia6, 10);
  var nilaib6 = document.getElementById("nilai_b6").value;
  var nilai_b6 = parseInt(nilaib6, 10);
  var a6b6 = nilai_a6 + nilai_b6 - 1;
  document.getElementById("jumlah_a6b6").innerHTML = a6b6;

  var nilaia7 = document.getElementById("nilai_a7").value;
  var nilai_a7 = parseInt(nilaia7, 10);
  var nilaib7 = document.getElementById("nilai_b7").value;
  var nilai_b7 = parseInt(nilaib7, 10);
  var a7b7 = nilai_a7 + nilai_b7 + 0;
  document.getElementById("jumlah_a7b7").innerHTML = a7b7;

  var nilaia8 = document.getElementById("nilai_a8").value;
  var nilai_a8 = parseInt(nilaia8, 10);
  var nilaib8 = document.getElementById("nilai_b8").value;
  var nilai_b8 = parseInt(nilaib8, 10);
  var a8b8 = nilai_a8 + nilai_b8 - 4;
  document.getElementById("jumlah_a8b8").innerHTML = a8b8;

  var nilai3 = document.getElementById("jumlah_a3b3").innerHTML = a3b3;
  var nilai_3 = parseInt(nilai3, 10);
  var nilai4 = document.getElementById("jumlah_a4b4").innerHTML = a4b4;
  var nilai_4 = parseInt(nilai4, 10);
  var nilai7 = document.getElementById("jumlah_a7b7").innerHTML = a7b7;
  var nilai_7 = parseInt(nilai7, 10);
  var nilai8 = document.getElementById("jumlah_a8b8").innerHTML = a8b8;
  var nilai_8 = parseInt(nilai8, 10);
  var to = nilai_3 + nilai_4 + nilai_7 + nilai_8;
  document.getElementById("jumlah_to").innerHTML = to;

  let jumlahTo;
  switch (true) {
    case (to < 29):
      jumlahTo = 0;
      break;
    case (to >= 30 && to <= 31):
      jumlahTo = 0.6;
      break;
    case (to == 32):
      jumlahTo = 1.2;
      break;
    case (to == 33):
      jumlahTo = 1.8;
      break;
    case (to == 34):
      jumlahTo = 2.4;
      break;
    case (to == 35):
      jumlahTo = 3.0;
      break;
    case (to >= 36 && to <= 37):
      jumlahTo = 3.6;
      break;
    case (to >= 38):
      jumlahTo = 4.0;
      break;
    default:
      jumlahTo = to;
      break;
  }
  document.getElementById("jumlahTo").innerHTML = jumlahTo;



  var nilai2 = document.getElementById("jumlah_a2b2").innerHTML = a2b2;
  var nilai_2 = parseInt(nilai2, 10);
  var nilai4 = document.getElementById("jumlah_a4b4").innerHTML = a4b4;
  var nilai_4 = parseInt(nilai4, 10);
  var nilai6 = document.getElementById("jumlah_a6b6").innerHTML = a6b6;
  var nilai_6 = parseInt(nilai6, 10);
  var nilai8 = document.getElementById("jumlah_a8b8").innerHTML = a8b8;
  var nilai_8 = parseInt(nilai8, 10);
  var ro = nilai_2 + nilai_4 + nilai_6 + nilai_8;
  document.getElementById("jumlah_ro").innerHTML = ro;

  let jumlahRo;
  switch (true) {
    case (ro < 29):
      jumlahRo = 0;
      break;
    case (ro >= 30 && ro <= 31):
      jumlahRo = 0.6;
      break;
    case (ro == 32):
      jumlahRo = 1.2;
      break;
    case (ro == 33):
      jumlahRo = 1.8;
      break;
    case (ro == 34):
      jumlahRo = 2.4;
      break;
    case (ro == 35):
      jumlahRo = 3.0;
      break;
    case (ro >= 36 && ro <= 37):
      jumlahRo = 3.6;
      break;
    case (ro >= 38):
      jumlahRo = 4.0;
      break;
    default:
      jumlahRo = ro;
      break;
  }
  document.getElementById("jumlahRo").innerHTML = jumlahRo;

  var nilai5 = document.getElementById("jumlah_a5b5").innerHTML = a5b5;
  var nilai_5 = parseInt(nilai5, 10);
  var nilai6 = document.getElementById("jumlah_a6b6").innerHTML = a6b6;
  var nilai_6 = parseInt(nilai6, 10);
  var nilai7 = document.getElementById("jumlah_a7b7").innerHTML = a7b7;
  var nilai_7 = parseInt(nilai7, 10);
  var nilai8 = document.getElementById("jumlah_a8b8").innerHTML = a8b8;
  var nilai_8 = parseInt(nilai8, 10);
  var e = nilai_5 + nilai_6 + nilai_7 + nilai_8;
  document.getElementById("jumlah_e").innerHTML = e;

  let jumlahE;
  switch (true) {
    case (e < 29):
      jumlahE = 0;
      break;
    case (e >= 30 && e <= 31):
      jumlahE = 0.6;
      break;
    case (e == 32):
      jumlahE = 1.2;
      break;
    case (e == 33):
      jumlahE = 1.8;
      break;
    case (e == 34):
      jumlahE = 2.4;
      break;
    case (e == 35):
      jumlahE = 3.0;
      break;
    case (e >= 36 && e <= 37):
      jumlahE = 3.6;
      break;
    case (e >= 38):
      jumlahE = 4.0;
      break;
    default:
      jumlahE = e;
      break;
  }
  document.getElementById("jumlahE").innerHTML = jumlahE;

  let jumlahKategori;
  switch (true) {
    case (jumlahTo > 2 && jumlahRo > 2 && jumlahE > 2):
      jumlahKategori = "Executive";
      break;
    case (jumlahTo > 2 && jumlahRo > 2 && jumlahE < 2):
      jumlahKategori = "Compromiser";
      break;
    case (jumlahTo > 2 && jumlahRo < 2 && jumlahE > 2):
      jumlahKategori = "Benevolent Autocrat";
      break;
    case (jumlahTo > 2 && jumlahRo < 2 && jumlahE < 2):
      jumlahKategori = "Autocrat";
      break;
    case (jumlahTo < 2 && jumlahRo > 2 && jumlahE > 2):
      jumlahKategori = "Developer";
      break;
    case (jumlahTo < 2 && jumlahRo > 2 && jumlahE < 2):
      jumlahKategori = "Missionary";
      break;
    case (jumlahTo < 2 && jumlahRo < 2 && jumlahE > 2):
      jumlahKategori = "Bureaucrat";
      break;
    case (jumlahTo < 2 && jumlahRo < 2 && jumlahE < 2):
      jumlahKategori = "Deserter";
      break;
    default:
      jumlahKategori = 0;
      break;
  }
  document.getElementById("jumlahKategori").innerHTML = jumlahKategori;
</script>

<?php $this->load->view('layout/footer'); ?>