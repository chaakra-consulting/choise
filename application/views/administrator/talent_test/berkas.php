<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-file"></i> Kelola Berkas Talent Test</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Pelatihan/Talent Test</li>
            <li class="breadcrumb-item"><a href="#">Kelola Berkas</a></li>
        </ul>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-title">
                    <button type="button" class="btn btn-primary" onclick="showUploadModal()">
                        <i class="fa fa-plus"></i> Upload Berkas Baru
                    </button>
                </div>

                <!-- Notifications -->
                <div id="notifikasi">
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success">
                            <i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('success') ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('error')) : ?>
                        <div class="alert alert-danger">
                            <i class="fa fa-exclamation-triangle"></i> <?php echo $this->session->flashdata('error') ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Berkas</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($berkas_list as $berkas): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $berkas['berkas']; ?></td>
                                    <td><?php echo $berkas['berkas']; ?></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="<?php echo base_url('administrator/talent-test/admin-preview-berkas/' . $berkas['id_berkas']); ?>" 
                                               target="_blank" class="btn btn-secondary btn-sm" title="Preview">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="<?php echo base_url('administrator/talent-test/admin-download-berkas/' . $berkas['id_berkas']); ?>" 
                                               class="btn btn-info btn-sm" title="Download">
                                                <i class="fa fa-download"></i>
                                            </a>
                                            <button type="button" class="btn btn-warning btn-sm" 
                                                    onclick="editBerkas(<?php echo $berkas['id_berkas']; ?>, '<?php echo $berkas['berkas']; ?>')" 
                                                    title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" 
                                                    onclick="deleteBerkas(<?php echo $berkas['id_berkas']; ?>, '<?php echo $berkas['berkas']; ?>')" 
                                                    title="Hapus">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Upload Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Berkas Baru</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('administrator/talent-test/admin-upload-berkas'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_berkas">Nama Berkas *</label>
                        <input type="text" name="nama_berkas" id="nama_berkas" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="berkas">Pilih File *</label>
                        <input type="file" name="berkas" id="berkas" class="form-control" accept=".pdf,.doc,.docx" required>
                        <small class="form-text text-muted">Format: PDF, DOC, DOCX | Maksimal 5MB</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Berkas</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="" method="post" enctype="multipart/form-data" id="editForm">
                <input type="hidden" name="id_berkas" id="edit_id_berkas">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_nama_berkas">Nama Berkas *</label>
                        <input type="text" name="nama_berkas" id="edit_nama_berkas" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_berkas">Upload File Baru (Opsional)</label>
                        <input type="file" name="berkas" id="edit_berkas" class="form-control" accept=".pdf,.doc,.docx">
                        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah file</small>
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

<script>
function showUploadModal() {
    $('#uploadModal').modal('show');
}

function editBerkas(id, nama) {
    document.getElementById('edit_id_berkas').value = id;
    document.getElementById('edit_nama_berkas').value = nama;
    document.getElementById('editForm').action = '<?php echo base_url('administrator/talent-test/admin-edit-berkas/'); ?>' + id;
    $('#editModal').modal('show');
}

function deleteBerkas(id, nama) {
    if (confirm('Apakah Anda yakin ingin menghapus berkas "' + nama + '"?')) {
        window.location.href = '<?php echo base_url('administrator/talent-test/admin-delete-berkas/'); ?>' + id;
    }
}

setTimeout(function() {
    $('#notifikasi .alert').fadeOut();
}, 5000);
</script>

<?php $this->load->view('layout/footer'); ?>