<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-ticket"></i> Manajemen Kupon Talent Test</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Talent Test</li>
            <li class="breadcrumb-item"><a href="#">Kupon Talent Test</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <a href="<?php echo base_url('administrator/kupon-talent-test/create'); ?>" class="btn btn-primary mb-3">Tambah Kupon</a>
                <div id="notifikasi">
                    <?php if ($this->session->flashdata('msg')): ?>
                        <div class="alert alert-success"><?php echo $this->session->flashdata('msg') ?></div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('msg_error')): ?>
                        <div class="alert alert-danger"><?php echo $this->session->flashdata('msg_error'); ?></div>
                    <?php endif; ?>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Kupon</th>
                                <th>Nama Kupon</th>
                                <th>Jenis Diskon</th>
                                <th>Nilai Diskon</th>
                                <th>Maksimal Diskon</th>
                                <th>Minimal Pembelian</th>
                                <th>Maksimal Penggunaan</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Berakhir</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($kupons as $kupon): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $kupon['kode_kupon']; ?></td>
                                <td><?php echo $kupon['nama_kupon']; ?></td>
                                <td><?php echo ucfirst($kupon['jenis_diskon']); ?></td>
                                <td>
                                    <?php 
                                    if ($kupon['jenis_diskon'] == 'persen') {
                                        echo $kupon['nilai_diskon'] . '%';
                                    } else {
                                        echo 'Rp ' . number_format($kupon['nilai_diskon'], '0', ',', '.');
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                    echo $kupon['maksimal_diskon'] ? 'Rp ' . number_format($kupon['maksimal_diskon'], 0, ',', '.') : '-';
                                    ?>
                                </td>
                                <td>Rp <?php echo number_format($kupon['minimal_pembelian'], 0, ',', '.'); ?></td>
                                <td>
                                    <?php 
                                    echo $kupon['maksimal_penggunaan'] ? $kupon['maksimal_penggunaan'] : '-';
                                    ?>
                                </td>
                                <td><?php echo date('d-m-Y', strtotime($kupon['tanggal_mulai'])); ?></td>
                                <td><?php echo date('d-m-Y', strtotime($kupon['tanggal_berakhir'])); ?></td>
                                <td><?php echo ucfirst($kupon['status']); ?></td>
                                <td>
                                    <a href="<?php echo base_url('administrator/kupon-talent-test/edit/' . $kupon['id_kupon']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="<?php echo base_url('administrator/kupon-talent-test/delete/' . $kupon['id_kupon']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kupon ini?');">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php if (empty($kupons)): ?>
                            <tr>
                                <td colspan="12" class="text-center">Tidak ada data kupon.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $this->load->view('layout/footer'); ?>