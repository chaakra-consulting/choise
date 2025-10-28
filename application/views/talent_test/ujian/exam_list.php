<?php $this->load->view('layout3/header'); ?>
<?php $this->load->view('layout3/navbar'); ?>
<?php $this->load->view('layout3/sidebar'); ?>
<?php $this->load->view('talent_test/layout'); ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <em class="fa fa-graduation-cap"></em>
                </a>
            </li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Daftar Ujian Talent Test</h1>
        </div>
    </div>
    <div class="col-sm-12" style="background-color: #fff; padding-top: 10px; padding-bottom: 20px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px;">
        <div class="col-sm-12">
            <h3><b>Daftar Ujian</b></h3>
            <h4 style="color: red;">Kerjakan semua ujian sesuai urutan!</h4>
            <hr color="black">
        </div>
        <div class="col-sm-12" style="margin-bottom: 5px;">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><b>No</b></td>
                        <td><b>Jenis Tes</b></td>
                        <td><b>Urutan</b></td>
                        <td><b>Status</b></td>
                        <td><b>Aksi</b></td>
                    </tr>
                    <?php 
                    $no = 1;
                    $previous_completed = true;
                    foreach ($ujian_list as $ujian) {
                        $exam_type = $ujian['jenis_ujian'];
                        $exam_name = ucfirst(str_replace('_', ' ', $exam_type));
                        $progress = isset($progress_data[$exam_type]) ? $progress_data[$exam_type] : null;
                        $is_completed = isset($ujian['is_completed']) ? $ujian['is_completed'] : false;
                        $can_start = !$is_completed && $previous_completed;
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $exam_name; ?></td>
                        <td><?php echo isset($ujian['urutan']) ? $ujian['urutan'] : $no-1; ?></td>
                        <td>
                            <?php if ($is_completed): ?>
                                Selesai
                            <?php elseif (!$previous_completed): ?>
                                Tunggu Ujian Sebelumnya
                            <?php else: ?>
                                Siap Dikerjakan
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if (time() < strtotime($jadwal_test)): ?>
                                <span class="text-muted">Belum dimulai</span>
                            <?php elseif ($is_completed): ?>
                                <span class="text-success">Sudah Selesai</span>
                            <?php elseif (!$previous_completed): ?>
                                <span class="text-muted">Selesaikan Ujian Sebelumnya</span>
                            <?php else: ?>
                                <a href="<?php echo base_url('talent-test/exam/' . $exam_type . '/confirmation') ?>" class="btn btn-primary">Kerjakan Sekarang</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php 
                        if (!$is_completed) {
                            $previous_completed = false;
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $this->load->view('layout3/footer'); ?>