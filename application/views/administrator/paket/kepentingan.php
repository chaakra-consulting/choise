<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-list"></i> <?php echo $title; ?> - <?php echo $paket['nama_paket']; ?></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Administrator</li>
            <li class="breadcrumb-item"><a href="<?php echo site_url('Administrator/Paket'); ?>">Paket</a></li>
            <li class="breadcrumb-item"><a href="#"><?php echo $title; ?></a></li>
        </ul>
    </div>

    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-title-w-btn">
                    <h3 class="title">Kepentingan yang Terkait</h3>
                    <div class="btn-group">
                        <a href="<?php echo site_url('Administrator/Paket'); ?>" class="btn btn-primary">
                            <i class="fa fa-arrow-left"></i> Kembali
                        </a>
                        <button class="btn btn-success" data-toggle="modal" data-target="#tambahKepentinganModal">
                            <i class="fa fa-plus"></i> Tambah Kepentingan
                        </button>
                    </div>
                </div>
                
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kepentingan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($kepentingan_paket)) : ?>
                                    <?php foreach ($kepentingan_paket as $index => $kepentingan) : ?>
                                        <tr>
                                            <td><?php echo $index + 1; ?></td>
                                            <td><?php echo $kepentingan['option_text']; ?></td>
                                            <td>
                                                <span class="badge badge-success">Aktif</span>
                                            </td>
                                            <td>
                                                <a href="<?php echo site_url('administrator/paket/hapus_kepentingan_paket/' . $paket['id_paket'] . '/' . $kepentingan['id']); ?>" 
                                                   class="btn btn-sm btn-danger"
                                                   onclick="return confirm('Yakin hapus kepentingan ini dari paket?')">
                                                    <i class="fa fa-trash"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            Belum ada kepentingan yang terkait dengan paket ini
                                        </td>
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

<!-- Modal Tambah Kepentingan -->
<div class="modal fade" id="tambahKepentinganModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kepentingan ke Paket</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url('administrator/paket/tambah_kepentingan_paket/' . $paket['id_paket']); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Pilih Kepentingan</label>
                        <select name="id_kepentingan" class="form-control" required>
                            <option value="">Pilih Kepentingan</option>
                            <?php foreach ($available_kepentingan as $kepentingan) : ?>
                                <option value="<?php echo $kepentingan['id']; ?>">
                                    <?php echo $kepentingan['option_text']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('layout/footer'); ?>