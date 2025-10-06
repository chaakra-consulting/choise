<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Edit Kupon Talent Test</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Administrator</li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/KuponTalentTest'); ?>">Kupon Talent Test</a></li>
            <li class="breadcrumb-item">Edit</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Form Edit Kupon</h3>
                <div class="tile-body">
                    <form action="<?php echo base_url('administrator/KuponTalentTest/edit/' . $kupon['id_kupon'])?>" method="post">
                        <div class="form-group">
                            <label for="kode_kupon">Kode Kupon *</label>
                            <input type="text" name="kode_kupon" id="kode_kupon" class="form-control" value="<?php echo set_value('kode_kupon', $kupon['kode_kupon']); ?>" readonly>
                            <small class="form-text text-muted">Kode kupon tidak dapat diubah.</small>
                        </div>
                        <div class="form-group">
                            <label for="nama_kupon">Nama Kupon *</label>
                            <input type="text" name="nama_kupon" id="nama_kupon" class="form-control" value="<?php echo set_value('nama_kupon', $kupon['nama_kupon']); ?>" required>
                            <?php echo form_error('nama_kupon', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"><?php echo set_value('deskripsi', $kupon['deskripsi']); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="jenis_diskon">Jenis Diskon *</label>
                            <select name="jenis_diskon" id="jenis_diskon" class="form-control" required>
                                <option value="">Pilih Jenis Diskon</option>
                                <option value="persen" <?php echo set_value('jenis_diskon', 'persen', $kupon['jenis_diskon'] == 'persen'); ?>>Persen (%)</option>
                                <option value="nominal" <?php echo set_value('jenis_diskon', 'nominal', $kupon['jenis_diskon'] == 'nominal'); ?>>Nominal</option>
                            </select>
                            <?php echo form_error('jenis_diskon', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="nilai_diskon">Nilai Diskon *</label>
                            <input type="number" name="nilai_diskon" id="nilai_diskon" class="form-control" value="<?php echo set_value('nilai_diskon', $kupon['nilai_diskon']); ?>" min="0" required>
                            <?php echo form_error('nilai_diskon', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="minimal_pembelian">Minimal Pembelian</label>
                            <input type="number" name="minimal_pembelian" id="minimal_pembelian" class="form-control" value="<?php echo set_value('minimal_pembelian', $kupon['minimal_pembelian']); ?>" min="0" required>
                            <?php echo form_error('minimal_pembelian', '<small class=""text-danger>', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="maksimal_penggunaan">Maksimal Penggunaan (Opsional)</label>
                            <input type="number" name="maksimal_penggunaan" id="maksimal_penggunaan" class="form-control" value="<?php echo set_value('maksimal_penggunaan', $kupon['maksimal_penggunaan']); ?>" min="0">
                            <small class="form-text text-muted">Kosongkan jika tidak ada batas penggunaan.</small>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_mulai">Tanggal Mulai *</label>
                            <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" value="<?php echo set_value('tanggal_mulai', $kupon['tanggal_mulai']); ?>" required>
                            <?php echo form_error('tanggal_mulai', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_berakhir">Tanggal Berakhir *</label>
                            <input type="date" name="tanggal_berakhir" id="tanggal_berakhir" class="form-control" value="<?php echo set_value('tanggal_berakhir', $kupon['tanggal_berakhir']); ?>" required>
                            <?php echo form_error('tanggal_berakhir', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="status">Status *</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="aktif" <?php echo set_value('status', 'aktif', $kupon['status'] == 'aktif'); ?>>Aktif</option>
                                <option value="tidak_aktif" <?php echo set_value('status', 'tidak_aktif', $kupon['status'] == 'tidak_aktif'); ?>>Tidak Aktif</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?php echo base_url('administrator/KuponTalentTest'); ?>" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $this->load->view('layout/footer'); ?>