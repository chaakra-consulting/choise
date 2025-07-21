<?php $this->load->view('layout3/header2') ?>
<?php $this->load->view('layout3/navbar') ?>

<?php $idUjian = $this->session->userdata('ses_kreapelin');
$id_pelamar = $this->session->userdata('ses_id'); ?>
<div class="col-sm-12 main">
  <div class="row">
    <div class="col-lg-9">
      <h3>INTRUKSI TES KREAPELIN</h3>
      <br>
    </div>
  </div>
  <!--/.row-->
  <div class="col-sm-12" style="background-color: #f9243f; padding: 30px; border-radius: 5px; margin-bottom: 20px;">
    <h4 style="color: #fff;"><b>INTRUKSI KREAPELIN</b></h4><br>
    <p style="color: #fff;">1. Silahkan pilih 1 jawaban yang paling tepat pada setiap soal yang disediakan.</p><br>
    <p style="color: #fff;">2. Pada tes ini akan diterapkan pembatasan waktu, oleh karena itu silahkan mengerjakan sesuai soal yang diberikan.</p><br>
  </div>
</div>
<!--/.main-->
<div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin-top: 20px; margin-bottom: 20px"> 
<a href="<?php echo base_url('Pelamar/Ujian/start_ujian_kreapelin/'.$id_pelamar.'/' . $idUjian) ?>" class="btn btn-primary mr-2 mb-2">Selanjutnya</a>
</div>
<!--
<?php $this->load->view('layout3/footer') ?>