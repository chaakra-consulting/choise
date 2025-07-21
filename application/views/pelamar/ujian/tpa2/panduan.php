<?php $this->load->view('layout3/header2') ?>
<?php $this->load->view('layout3/navbar') ?>

<?php $idUjian = $this->session->userdata('ses_tpa');
$id_pelamar = $this->session->userdata('ses_id'); ?>
<div class="col-sm-12 main">
  <div class="row">
    <div class="col-lg-9">
      <h3>INTRUKSI TES POTENSI AKADEMIK (TPA)</h3>
      <br>
    </div>
  </div>
  <!--/.row-->
  <div class="col-sm-12" style="background-color: #000000; padding: 30px; border-radius: 5px; margin-bottom: 20px;">
    <h4 style="color: #fff;"><b>INTRUKSI TES POTENSI AKADEMIK (TPA)</b></h4><br>
    <p style="color: #fff;">1. Silahkan pilih 1 jawaban yang paling tepat pada setiap soal yang disediakan.</p><br>
    <p style="color: #fff;">2. Pada tes ini akan diterapkan pembatasan waktu, oleh karena itu silahkan mengerjakan soal sesuai waktu yang diberikan.</p><br>
  </div>
</div>
<!--/.main-->
<div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin-top: 20px; margin-bottom: 20px">
<?php 
if($tpake=='1'){
?>  
<a href="<?php echo base_url('Pelamar/Ujian/start_ujian_tpa2_1/'.$id_pelamar.'/' . $idUjian) ?>" class="btn btn-primary mr-2 mb-2">Selanjutnya</a>
<?php 
}elseif($tpake=='2'){
?>
<a href="<?php echo base_url('Pelamar/Ujian/start_ujian_tpa2_2/'.$id_pelamar.'/' . $idUjian) ?>" class="btn btn-primary mr-2 mb-2">Selanjutnya</a>
<?php 
}else{
?>
<a href="<?php echo base_url('Pelamar/Ujian/start_ujian_tpa2_3/'.$id_pelamar.'/' . $idUjian) ?>" class="btn btn-primary mr-2 mb-2">Selanjutnya</a>
<?php 
}
?>
</div>
<!--
<?php $this->load->view('layout3/footer') ?>