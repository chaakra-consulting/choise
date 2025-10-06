<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> <?php echo $title; ?></h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item"><a href="#"><?php echo $title; ?></a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
        <div class="tile-body">
            <h1>Pilih Paket Talent Test</h1>
            <?php foreach ($paket_list as $paket) : ?>
                <h2><?php echo $paket['nama_paket']; ?></h2>
                <p><?php echo $paket['deskripsi']; ?></p>
                <h3>Rp <?php echo number_format($paket['harga'], 0, ',', '.'); ?></h3>
                <a href="<?php echo site_url('talent-test/daftar/' . $paket['id_paket']); ?>">Pilih Paket</a>
            <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</main>

<?php $this->load->view('layout/footer'); ?>