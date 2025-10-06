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
        <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
        <div class="tile-body">
            <form action="<?php echo site_url('administrator/paket/simpan'); ?>" method="post">
                <div class="form-group">
                    <label for="nama_paket">Nama Paket</label>
                    <input type="text" class="form-control" id="nama_paket" name="nama_paket" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="harga">Harga (contoh: 50000)</label>
                    <input type="text" class="form-control" id="harga_display" name="harga_display" placeholder="Contoh: 50000" required>
                    <input type="hidden" id="harga" name="harga">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="aktif">Aktif</option>
                        <option value="tidak_aktif">Tidak Aktif</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Paket</button>
                <a href="<?php echo site_url('administrator/paket'); ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
      </div>
    </div>
  </div>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        const hargaDisplay = document.getElementById('harga_display');
        const hargaHidden = document.getElementById('harga');

        if (hargaDisplay && hargaHidden) {
            hargaDisplay.addEventListener('input', function(e){
                let rawValue = e.target.value.replace(/[^0-9]/g, '');

                hargaHidden.value = rawValue;
                if (rawValue) {
                    let formattedValue = new Intl.NumberFormat('id-ID').format(rawValue);
                    e.target.value = 'Rp ' + formattedValue;
                } else {
                    e.target.value = '';
                }
            });
        }
    });
</script>

<?php $this->load->view('layout/footer'); ?>