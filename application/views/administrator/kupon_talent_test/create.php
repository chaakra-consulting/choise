<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-plus"></i> Tambah Kupon Talent Test</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Administrator</li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('Administrator/KuponTalentTest'); ?>">Kupon Talent Test</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile title">Form Tambah Kupon</h3>
                <div class="tile-body">
                    <form action="<?php echo base_url('Administrator/KuponTalentTest/create'); ?>" method="post">
                        <div class="form-group">
                            <label for="kode_kupon">Kode Kupon *</label>
                            <input type="text" name="kode_kupon" id="kode_kupon" class="form-control" value="<?php echo set_value('kode_kupon'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_kupon">Nama Kupon *</label>
                            <input type="text" name="nama_kupon" id="nama_kupon" class="form-control" value="<?php echo set_value('nama_kupon'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"><?php echo set_value('deskripsi'); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="jenis_diskon">Jenis Diskon *</label>
                            <select name="jenis_diskon" id="jenis_diskon" class="form-control" required>
                                <option value="">Pilih Jenis Diskon</option>
                                <option value="persen" <?php echo set_value('jenis_diskon', 'persen'); ?>>Persen (%)</option>
                                <option value="nominal" <?php echo set_value('jenis_diskon', 'nominal'); ?>>Nominal (Rp)</option>
                            </select>
                            <?php echo form_error('jenis_diskon', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="nilai_diskon">Nilai Diskon *</label>
                            <input type="number" name="nilai_diskon" id="nilai_diskon" class="form-control" value="<?php echo set_value('nilai_diskon'); ?>" min="0" required>
                            <?php echo form_error('nilai_diskon', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="maksimal_diskon">Maksimal Diskon (Opsional)</label>
                            <input type="number" name="maksimal_diskon" id="maksimal_diskon" class="form-control" value="<?php echo set_value('maksimal_diskon'); ?>" min="0">
                            <small class="form-text text-muted">Kosongkan jika tidak ada batasan maksimal diskon.</small>
                        </div>
                        <div class="form-group">
                            <label for="minimal_pembelian">Minimal Pembelian *</label>
                            <input type="number" name="minimal_pembelian" id="minimal_pembelian" class="form-control" value="<?php echo set_value('minimal_pembelian', 0); ?>" min="0" required>
                            <?php echo form_error('minimal_pembelian', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="maksimal_penggunaan">Maksimal Penggunaan (Opsional)</label>
                            <input type="number" name="maksimal_penggunaan" id="maksimal_penggunaan" class="form-control" value="<?php echo set_value('maksimal_penggunaan'); ?>" min="0">
                            <small class="form-text text-muted">Kosongkan jika tidak ada batas penggunaan.</small>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_mulai">Tanggal Mulai *</label>
                            <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" value="<?php echo set_value('tanggal_mulai'); ?>" required>
                            <?php echo form_error('tanggal_mulai', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_berakhir">Tanggal Berakhir *</label>
                            <input type="date" name="tanggal_berakhir" id="tanggal_berakhir" class="form-control" value="<?php echo set_value('tanggal_berakhir') ?>" required>
                            <?php echo form_error('tanggal_berakhir', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="status">Status *</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="aktif" <?php echo set_select('status', 'aktif', TRUE); ?>>Aktif</option>
                                <option value="tidak_aktif" <?php echo set_select('status', 'tidak_aktif'); ?>>Tidak Aktif</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?php echo base_url('Administrator/KuponTalentTest'); ?>" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $this->load->view('layout/footer'); ?>