<?php $this->load->view('layout3/header'); ?>
<?php $this->load->view('layout3/navbar'); ?>
<?php $this->load->view('layout3/sidebar'); ?>
<?php $this->load->view('talent_test/layout'); ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <em class="fa fa-envelope color-amber"></em>
                </a>
            </li>
            <li class="active">Konfirmasi Ujian <?php echo ucfirst($exam_type); ?></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Konfirmasi Ujian <?php echo ucfirst($exam_type); ?></h1>
        </div>
    </div>
    <div class="col-sm-12" style="background-color: #fff; padding-top: 10px; padding-bottom: 20px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px; border-radius: 5px;">
        <div class="col-sm-12">
            <h3><b>Konfirmasi Data</b></h3>
            <hr color="black">
        </div>
        <div class="col-sm-12" style="margin-bottom: 5px;">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><b>Nama Lengkap</b></td>
                        <td><?php echo $pendaftaran['nama_pendaftar_pelatihan']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Email</b></td>
                        <td><?php echo $pendaftaran['email_pendaftar']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Paket Talent Test</b></td>
                        <td><?php echo $paket['nama_paket']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Nama Ujian</b></td>
                        <td>DISC</td>
                    </tr>
                    <tr>
                        <td><b>Jumlah Soal</b></td>
                        <td><?php echo count($questions); ?></td>
                    </tr>
                    <tr>
                        <td><b>Waktu Pengerjaan</b></td>
                        <td><?php echo $durasi; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-12" style="background-color: #f9243f; padding-top: 10px; padding-left: 20px; padding-right: 20px; border-radius: 5px;">
                <h4 style="color: #fff;"><b>Peraturan Ujian!</b></h4>
                <li style="color: #fff;">Pilihlah 1 pertanyaan yang PALING sesuai dengan diri Anda SAAT INI (M - Most)</li>
                <li style="color: #fff;">Pilihlah 1 pertanyaan yang PALING tidak sesuai dengan diri Anda SAAT INI (L - Least)</li>
                <li style="color: #fff;">Sehingga dalam 1 soal akan ada 1 pertanyaan M dan 1 pertanyaan L</li>
                <li style="color: #fff;">Waktu pengerjaan: <?php echo $durasi; ?> menit </li>
                <li style="color: #fff;">Jumlah soal: <?php echo count($questions); ?></li>
            </div>
        </div>
        <div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin: 10px;">
            <a href="<?php echo site_url('talent-test/start-exam/' . $exam_type)?>" class="btn btn-primary mr-2 mb-2">Mulai Ujian</a>
        </div>
    </div>
</div>

<?php $this->load->view('layout3/footer'); ?>
