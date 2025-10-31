<?php $this->load->view('layout3/header'); ?>
<?php $this->load->view('layout3/navbar'); ?>
<?php $this->load->view('layout3/sidebar'); ?>
<?php $this->load->view('talent_test/layout'); ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-envelope color-amber"></em>
            </a></li>
            <li class="active">Konfirmasi Ujian Cepat Teliti</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Konfirmasi Ujian Cepat Teliti</h1>
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
                        <td>Cepat Teliti</td>
                    </tr>
                    <tr>
                        <td><b>Waktu Pengerjaan</b></td>
                        <td><?php echo $durasi; ?> Menit</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-12">
            <h3><b>Panduan Pengerjaan</b></h3>
            <hr color="black">
        </div>
        <div class="col-sm-12" style="margin-bottom: 5px;">
            <p>Ujian Cepat Teliti adalah tes yang mengukur kemampuan Anda dalam menjawab soal - soal dengan cepat dan teliti. 
                Anda akan diberikan serangkaian soal dengan pilihan jawaban A, B, C, D, E
            </p>
            <ul>
                <li>Bacalah soal dengan teliti.</li>
                <li>Pilih jawaban yang paling tepat dari pilihan yang tersedia.</li>
                <li>Waktu pengerjaan terbatas, jadi kerjakan dengan cepat namun tetap teliti.</li>
                <li>Anda dapat berpindah antar soal menggunakan tombol navigasi.</li>
                <li>Terdapat 200 soal dalam ujian ini.</li>
            </ul> 
        </div>
        <div class="col-sm-12">
            <div class="col-sm-12" style="background-color: #f9243f; padding-top: 10px; padding-bottom: 10px; padding-left: 20px; 
                padding-right: 20px; border-radius: 5px;">
                <h4 style="color: #fff;"><b>Peraturan Ujian!</b></h4>
                <li style="color: #fff;">Harap tidak menutup halaman selama ujian berlangsung.</li>
                <li style="color: #fff;">Waktu akan terus berjalan meskipun Anda keluar dari halaman.</li>
                <li style="color: #fff;">Jangan gunakan bantuan dari orang lain atau alat bantu.</li>
            </div>
        </div>
        <div class="col-sm-12 button-lm-little justify-content-center text-center" style="margin: 10px;">
            <form action="<?php echo site_url('talent-test/training/cepat_teliti/1')?>">
                <button type="submit" class="btn btn-primary mr-2 mb-2">Mulai Ujian</button>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('layout3/footer'); ?>