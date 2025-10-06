<?php $this->load->view('layout3/header'); ?>
<?php $this->load->view('layout3/navbar'); ?>
<?php $this->load->view('layout3/sidebar'); ?>

<style>
.file-upload-container {
    background: white;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    padding: 30px;
    margin-bottom: 30px;
}

.file-upload-header {
    background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
    color: #5a3e1b;
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 30px;
    text-align: center;
}

.file-item {
    background: #f8f9fa;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 20px;
    border-left: 4px solid #ffc107;
    transition: all 0.3s ease;
    position: relative;
}

.file-item:hover {
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transform: translateY(-2px);
}

.file-icon {
    font-size: 2.5em;
    color: #ffc107;
    margin-bottom: 10px;
}

.file-info h5 {
    color: #495057;
    margin-bottom: 5px;
}

.file-info small {
    color: #6c757d;
}

.btn-upload {
    background: #ffc107;
    color: #5a3e1b;
    border: none;
    border-radius: 20px;
    padding: 10px 25px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-upload:hover {
    background: #e0a800;
    transform: translateY(-1px);
    box-shadow: 0 3px 10px rgba(0,0,0,0.15);
}

.btn-download {
    background: #28a745;
    color: white;
    border: none;
    border-radius: 20px;
    padding: 8px 20px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-download:hover {
    background: #218838;
    transform: translateY(-1px);
    box-shadow: 0 3px 10px rgba(0,0,0,0.15);
}

/* Alert Styles */
.alert-custom {
    border-radius: 8px;
    border: none;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

/* Status Badge */
.status-badge {
    position: absolute;
    top: 10px;
    right: 10px;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 0.75em;
    font-weight: 500;
}

.status-available {
    background: #d4edda;
    color: #155724;
}

.status-missing {
    background: #f8d7da;
    color: #721c24;
}

.status-admin {
    background: #cce5ff;
    color: #004085;
}

.status-user {
    background: #d1ecf1;
    color: #0c5460;
}

/* Admin file indicator */
.admin-file-indicator {
    background: #e3f2fd;
    border-left: 4px solid #2196f3;
}

.admin-file-indicator .file-icon {
    color: #2196f3;
}

.admin-file-indicator .file-info h5::after {
    content: " (dari Admin)";
    font-size: 0.8em;
    color: #2196f3;
    font-weight: normal;
}
</style>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('talent-test/dashboard'); ?>">
                <em class="fa fa-dashboard"></em>
            </a></li>
            <li class="active">Berkas</li>
        </ol>
    </div>

    <!-- Header -->
    <div class="file-upload-header">
        <h2><i class="fa fa-file"></i> Berkas Talent Test</h2>
        <p>Kelola berkas dan dokumen Anda</p>
    </div>

    <!-- Notifications -->
    <div id="notifikasi">
        <?php if ($this->session->flashdata('msg')) : ?>
            <div class="alert alert-success alert-custom">
                <i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('msg') ?>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('msg_error')) : ?>
            <div class="alert alert-danger alert-custom">
                <i class="fa fa-exclamation-triangle"></i> <?php echo $this->session->flashdata('msg_error') ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Upload Files Container -->
    <div class="file-upload-container">
        <h4><i class="fa fa-file"></i> Berkas Talent Test</h4>
        <p class="text-muted mb-4">Upload berkas yang disediakan admin</p>
        <div class="row">
            <?php if (empty($required_files)): ?>
                <div class="col-12">
                    <div class="alert alert-info alert-custom">
                        <i class="fa fa-info-circle"></i> Belum ada berkas yang diperlukan. Silakan hubungi administrator.
                    </div>
                </div>
            <?php else: ?>
                <?php foreach ($required_files as $key => $file): ?>
                <div class="col-md-6">
                    <div class="file-item" data-key="<?php echo $key; ?>">
                        <?php 
                        $is_uploaded = isset($all_files[$key]) && $all_files[$key] && $all_files[$key]['source'] == 'user';
                        $is_admin = isset($all_files[$key]) && $all_files[$key] && $all_files[$key]['source'] == 'admin';
                        $status_class = $is_uploaded ? 'status-user' : ($is_admin ? 'status-admin' : 'status-missing');
                        $status_text = $is_uploaded ? 'Sudah Upload' : ($is_admin ? 'Tersedia dari Admin' : 'Belum Upload');
                        $info_text = $is_uploaded ? 'File sudah diupload oleh Anda' : ($is_admin ? 'File tersedia dari admin' : 'File belum diupload');
                        ?>
                        <div class="status-badge <?php echo $status_class; ?>">
                            <?php echo $status_text; ?>
                        </div>
                        <div class="file-icon">
                            <i class="fa <?php echo $file['icon']; ?>"></i>
                        </div>
                        <div class="file-info">
                            <h5><?php echo $file['name']; ?></h5>
                            <small><?php echo $info_text; ?></small>
                        </div>
                        
                        <?php if ($is_uploaded): ?>
                        <div class="btn-group" role="group">
                            <a href="<?php echo base_url('talent-test/preview-berkas/' . $all_files[$key]['id_berkas']); ?>" target="_blank" class="btn btn-info btn-sm">
                                <i class="fa fa-eye"></i> Preview
                            </a>
                            <a href="<?php echo base_url('talent-test/download-berkas/' . $all_files[$key]['id_berkas']); ?>" class="btn btn-success btn-sm">
                                <i class="fa fa-download"></i> Download
                            </a>
                        </div>
                        <?php else: ?>
                        <form method="post" action="<?php echo base_url('talent-test/upload-berkas'); ?>" enctype="multipart/form-data" class="upload-form">
                            <input type="hidden" name="jenis" value="<?php echo pathinfo($key, PATHINFO_FILENAME); ?>">
                            <div class="form-group">
                                <input type="file" name="<?php echo pathinfo($key, PATHINFO_FILENAME) ?>" class="form-control" accept=".pdf,.doc,.docx" required>
                                <small class="form-text text-muted">Format: PDF, DOC, DOCX | Maks: 2MB</small>
                            </div>
                            <button type="submit" class="btn btn-upload">
                                <i class="fa fa-upload"></i> Upload <?php echo $file['name']; ?>
                            </button>
                        </form>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- Downloaded Files Container -->
    <div class="file-upload-container">
        <h4><i class="fa fa-download"></i> Berkas dari Admin</h4>
        <p class="text-muted mb-4">Download berkas yang disediakan admin</p>

        <div class="row">
            <?php if (empty($required_files)): ?>
                <div class="alert alert-warning alert-custom">
                    <i class="fa fa-info-circle"></i> Belum ada berkas yang diupload oleh admin. Silakan hubungi administrator untuk mengupload berkas yang diperlukan.
                </div>
            <?php else: ?>
                <?php foreach ($required_files as $key => $file): ?>
                <?php $base = pathinfo($key, PATHINFO_FILENAME); ?>
                <?php if (isset($admin_files[$base])): ?>
                <div class="col-md-6">
                    <div class="file-item admin-file-indicator" data-key="<?php echo $key; ?>">
                        <div class="status-badge status-admin">
                            Dari Admin
                        </div>
                        <div class="file-icon">
                            <i class="fa <?php echo $file['icon']; ?>"></i>
                        </div>
                        <div class="file-info">
                            <h5><?php echo $file['name']; ?><span style="font-weight: normal; color: #2196f3;"> (dari Admin)</span></h5>
                            <small>Status: Dari Admin</small>
                        </div>
                        <div class="btn-group" role="group">
                            <a href="<?php echo base_url('talent-test/preview-berkas/' . $admin_files[$base]['id_berkas']); ?>" target="_blank" class="btn btn-info btn-sm">
                                <i class="fa fa-eye"></i> Preview
                            </a>
                            <a href="<?php echo base_url('talent-test/download-berkas/' . $admin_files[$base]['id_berkas']); ?>" class="btn btn-success btn-sm">
                                <i class="fa fa-download"></i> Download
                            </a>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    function updateAdminFiles() {
        $.ajax({
            url: '<?php echo base_url('talent-test/check-admin-files'); ?>',
            method: 'POST',
            data: { id_pendaftar: <?php echo $pendaftaran['id_pendaftar_pelatihan']; ?> },
            dataType: 'json',
            success: function(adminFiles) {
                console.log('Admin files:', adminFiles);
                updateBerkasUI(adminFiles);
            },
            error: function(err) {
                console.log('Gagal mengambil berkas admin:', err);
            }
        });
    }

    function updateBerkasUI(adminFiles) {
        <?php foreach ($required_files as $key => $file): ?>
        const fileKey = '<?php echo pathinfo($key, PATHINFO_FILENAME); ?>';
        const fileItem = document.querySelector('.file-item[data-key="' + fileKey + '"]');
        if (!fileItem) return;

        const statusBadge = fileItem.querySelector('.status-badge');
        const fileInfo = fileItem.querySelector('.file-info');
        const btnGroup = fileItem.querySelector('.btn-group');
        const uploadForm = fileItem.querySelector('.upload-form');

        if (adminFiles && adminFiles.hasOwnProperty(fileKey)) {
            fileItem.classList.add('admin-file-indicator');
            statusBadge.classList.remove('status-missing', 'status-user');
            statusBadge.classList.add('status-admin');
            statusBadge.textContent = 'Dari Admin';

            const h5 = fileInfo.querySelector('h5');
            h5.innerHTML = '<?php echo $file['name']; ?><span style="font-weight: normal; color: #2196f3;"> (dari Admin)</span>';

            if (uploadForm) {
                uploadForm.remove();
            }
            if (!btnGroup) {
                const newBtnGroup = document.createElement('div');
                newBtnGroup.className = 'btn-group';
                newBtnGroup.setAttribute('role', 'group');
                newBtnGroup.innerHTML = `
                    <a href="<?php echo base_url('talent-test/preview-berkas/'); ?>${adminFiles[fileKey].id_berkas}" target="_blank" class="btn btn-info btn-sm">
                        <i class="fa fa-eye"></i> Preview
                    </a>
                    <a href="<?php echo base_url('talent-test/download-berkas/'); ?>${adminFiles[fileKey].id_berkas}" class="btn btn-success btn-sm">
                        <i class="fa fa-download"></i> Download
                    </a>
                `;
                fileItem.appendChild(newBtnGroup);
            }
        } else {
            fileItem.classList.remove('admin-file-indicator');
            statusBadge.classList.remove('status-admin');
            if (statusBadge.textContent !== 'Sudah Upload') {
                statusBadge.classList.add('status-missing');
                statusBadge.textContent = 'Belum Upload';
            }
            
            const h5 = fileInfo.querySelector('h5');
            h5.innerHTML = '<?php echo $file['name']; ?>';
            
            if (btnGroup && btnGroup.querySelector('.btn-info')) {
                btnGroup.remove();
            }
            if (!uploadForm) {
                // Tambahkan form upload jika belum ada
                const newForm = document.createElement('form');
                newForm.method = 'post';
                newForm.action = '<?php echo base_url('talent-test/upload-berkas'); ?>';
                newForm.enctype = 'multipart/form-data';
                newForm.className = 'upload-form';
                newForm.innerHTML = `
                    <input type="hidden" name="jenis" value="${fileKey}">
                    <div class="form-group">
                        <input type="file" name="${fileKey}" class="form-control" accept=".pdf,.doc,.docx" required>
                        <small class="form-text text-muted">Format: PDF, DOC, DOCX | Maks: 2MB</small>
                    </div>
                    <button type="submit" class="btn btn-upload">
                        <i class="fa fa-upload"></i> Upload <?php echo $file['name']; ?>
                    </button>
                `;
                fileItem.appendChild(newForm);
            }
        }
        <?php endforeach; ?>
    }

    // Fungsi preview untuk admin files
    function previewAdminFile(id_berkas, fileKey) {
        window.open('<?php echo base_url('talent-test/preview-berkas/'); ?>' + id_berkas, '_blank');
    }

    updateAdminFiles();
    setInterval(updateAdminFiles, 30000);
});
</script>

<?php $this->load->view('layout3/footer'); ?>
