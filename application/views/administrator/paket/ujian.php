<?php $this->load->view('layout/header') ?>
<?php $this->load->view('layout/sidebar') ?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> <?php echo $title; ?></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-"></i></li>
            <li class="breadcrumb-item">User</li>
            <li class="breadcrumb-item"><a href=""></a><?php echo $title; ?></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-title-w-btn">
                    <h3 class="title">Ujian - <?php echo $paket['nama_paket'] ?? 'Paket Talent Test'; ?></h3>
                    <div class="btn-group">
                        <a href="<?php echo site_url('administrator/paket'); ?>" class="btn btn-primary">
                            <i class="fa fa-arrow-left"></i> Kembali
                        </a>
                        <button class="btn btn-success" data-toggle="modal" data-target="#tambahUjianModal">
                            <i class="fa fa-plus"></i> Tambah Ujian
                        </button>
                    </div>
                </div>
                <div class="tile-body">
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('error')) : ?>
                        <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Jenis Ujian</th>
                                    <th>Urutan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($ujian_list)) : ?>
                                    <?php foreach ($ujian_list as $index => $ujian) : ?>
                                        <tr>
                                            <td><?php echo $index + 1; ?></td>
                                            <td><?php echo $jenis_ujian_options[$ujian['jenis_ujian']] ?? $ujian['jenis_ujian']; ?></td>
                                            <td><?php echo $ujian['urutan']; ?></td>
                                            <td>
                                                <span class="badge badge-success">Aktif</span>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editUjianModal<?php echo $ujian['id_paket_ujian']; ?>">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                    <a href="<?php echo site_url('administrator/paket/hapus_ujian/' . $ujian['id_paket_ujian'] . '/' . $paket['id_paket']); ?>" 
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Yakin hapus ujian ini?')">
                                                        <i class="fa fa-trash"></i> Hapus
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="editUjianModal<?php echo $ujian['id_paket_ujian']; ?>" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Ujian</h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            <span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?php echo site_url('administrator/paket/edit_ujian/' . $ujian['id_paket_ujian'] . '/' . $paket['id_paket']); ?>" method="post">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Jenis Ujian</label>
                                                                <select name="jenis_ujian" class="form-control" required>
                                                                    <option value="">Pilih Jenis Ujian</option>
                                                                    <?php foreach ($jenis_ujian_options as $key => $value) : ?>
                                                                        <option value="<?php echo $key; ?>" <?php echo ($ujian['jenis_ujian'] == $key) ? 'selected' : ''; ?>>
                                                                            <?php echo $value; ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Urutan</label>
                                                                <input type="number" name="urutan" class="form-control" value="<?php echo $ujian['urutan'];?>" min="1" required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Belum ada ujian dalam paket ini</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="modal fade" id="tambahUjianModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Ujian</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url('administrator/paket/tambah_ujian/' . $paket['id_paket']); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Jenis Ujian</label>
                        <select name="jenis_ujian" class="form-control" required>
                            <option value="">Pilih Jenis Ujian</option>
                            <?php foreach ($jenis_ujian_options as $key => $value) : ?>
                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Urutan</label>
                        <input type="number" name="urutan" class="form-control" value="1" min="1" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('layout/footer') ?>