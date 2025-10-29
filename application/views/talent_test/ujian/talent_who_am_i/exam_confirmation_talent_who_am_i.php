<?php $this->load->view('layout3/header') ?>
<?php $this->load->view('layout3/navbar') ?>
<?php $this->load->view('layout3/sidebar') ?>
<?php $this->load->view('talent_test/layout') ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-envelope color-amber"></em>
            </a></li>
            <li class="active">Konfirmasi Ujian Who Am I</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Konfirmasi Ujian Who Am I</h1>
        </div>
    </div><!--/.row-->

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
                        <td>Who Am I</td>
                    </tr>
                    <tr>
                        <td><b>Waktu Pengerjaan</b></td>
                        <td><?php echo $durasi; ?> Menit</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-12" style="background-color: #f9243f; padding-top: 10px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; border-radius: 5px;">
                <h4 style="color: #fff;"><b>Peraturan Ujian!</b></h4>
                <li style="color: #fff;">Ujian Who Am I bersifat esai untuk mendeskripsikan diri Anda.</li>
                <li style="color: #fff;">Jawablah dengan jujur dan lengkap sesuai dengan kondisi Anda saat ini.</li>
                <li style="color: #fff;">Pastikan koneksi internet Anda stabil selama pengerjaan.</li>
                <li style="color: #fff;">Waktu pengerjaan: <?php echo $durasi; ?> menit.</li>
                <li style="color: #fff;">Submit sebelum waktu habis.</li>
            </div>
        </div>
        <div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin: 10px;">
            <form action="<?php echo site_url('talent-test/start-exam/talent_who_am_i')?>">
                <button type="submit" class="btn btn-primary mr-2 mb-2">Mulai Ujian</button>
            </form>
        </div>
    </div>
</div>
<!--/.main-->

<?php $this->load->view('layout3/footer') ?>
