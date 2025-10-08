<?php $this->load->view('layout3/header'); ?>
<?php $this->load->view('layout3/navbar'); ?>
<?php $this->load->view('layout3/sidebar'); ?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

:root {
    --primary-color: #FBC02D;
    --primary-dark: #F9A825;
    --primary-light: #FFF8E1;
    --success-color: #28a745;
    --success-light: #e9f5e9;
    --danger-color: #dc3545;
    --text-dark: #212529;
    --text-secondary: #6c757d;
    --text-light: #ffffff;
    --bg-main: #f8f9fa;
    --bg-card: #ffffff;
    --border-color: #dee2e6;
    --shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    --border-radius: 8px;
    --transition: all 0.2s ease;
}

body {
    background-color: var(--bg-main);
    font-family: 'Poppins', sans-serif;
    color: var(--text-secondary);
}

.panel {
    border: none;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow);
}

.main {
    padding-top: 25px;
}

.breadcrumb {
    background-color: var(--bg-card);
    border-radius: var(--border-radius);
    padding: 12px 20px;
    margin-bottom: 25px;
    box-shadow: var(--shadow);
    border: 1px solid var(--border-color);
    margin-right: 15px;
    margin-left: 15px;
}
.breadcrumb-item a {
    color: var(--primary-dark);
    font-weight: 500;
    text-decoration: none;
}
.breadcrumb-item.active {
    color: var(--text-dark);
    font-weight: 600;
}

.welcome-header {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    color: var(--text-dark);
    padding: 30px 25px;
    margin-bottom: 25px;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow);
}
.welcome-header h1 {
    font-size: 2em;
    font-weight: 700;
    margin: 0;
}
.welcome-header p {
    font-size: 1em;
    opacity: 0.9;
    margin-top: 5px;
}

.info-card {
    background-color: var(--bg-card);
    border-radius: var(--border-radius);
    box-shadow: var(--shadow);
    border: 1px solid var(--border-color);
    margin-bottom: 25px;
    height: 100%;
}
.info-card .card-header {
    background-color: transparent;
    border-bottom: 1px solid var(--border-color);
    padding: 18px 20px;
    font-weight: 600;
    color: var(--text-dark);
    font-size: 1.1em;
    display: flex;
    align-items: center;
    gap: 8px;
}
.info-card .card-body {
    padding: 20px;
}

.btn-custom {
    border-radius: 20px;
    padding: 8px 20px;
    font-weight: 600;
    font-size: 0.85em;
    border: none;
    transition: var(--transition);
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    text-decoration: none !important;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: var(--text-dark);
}
.btn-custom:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}
.btn-upload {
    background: var(--primary-color);
}
.btn-upload:hover {
    background: var(--primary-dark);
}
.btn-download {
    background-color: var(--success-color);
    color: var(--text-light);
}
.btn-download:hover {
    background-color: #218838;
}

.alert {
    border-radius: var(--border-radius);
    border: none;
    padding: 12px 18px;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--text-light);
    box-shadow: var(--shadow);
}
.alert-success { background: var(--success-color); }
.alert-warning { background: var(--primary-color); color: var(--text-dark); }
.alert-danger { background: var(--danger-color); }
.alert-info { background: #17a2b8; }

.file-item {
    background-color: var(--bg-card);
    border-radius: var(--border-radius);
    box-shadow: var(--shadow);
    border: 1px solid var(--border-color);
    border-left-width: 4px;
    padding: 20px;
    margin-bottom: 15px;
    display: flex;
    flex-direction: column;
    height: 100%;
    transition: var(--transition);
}
.file-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}
.file-item.uploaded { border-left-color: var(--success-color); }
.file-item.admin { border-left-color: #2196f3; }
.file-item.missing { border-left-color: var(--border-color); }

.file-icon {
    font-size: 2.5em;
    color: var(--primary-color);
    margin-bottom: 10px;
}

.file-info h5 {
    color: var(--text-dark);
    margin-bottom: 5px;
}

.file-info small {
    color: var(--text-secondary);
}

.profile-usertitle-name {
    color: var(--text-dark);
    font-weight: 600;
}
.nav.menu li a {
    color: var(--text-secondary);
    transition: var(--transition);
    border-radius: 6px;
    margin: 2px 8px;
    padding-left: 12px;
}
.nav.menu li a:hover, .nav.menu li.active a {
    background-color: var(--primary-light);
    color: var(--primary-dark);
    text-decoration: none;
}
.nav.menu li a .fa {
    color: var(--primary-dark);
}
.status-badge {
    padding: 4px 10px;
    border-radius: 15px;
    font-size: 0.7em;
    font-weight: 600;
    text-transform: uppercase;
}
.status-uploaded { background-color: var(--success-light); color: var(--success-color); }
.status-admin { background-color: #cce5ff; color: #004085; }
.status-missing { background-color: #f1f3f5; color: var(--text-secondary); }

@media (max-width: 768px) {
    .welcome-header h1 { 
        font-size: 1.6em; 
    }
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

    <!-- Welcome Header -->
    <div class="welcome-header">
        <h1 style="color: black;"><i class="fa fa-file"></i> Berkas Talent Test</h1>
        <p style="color: white"><b>Selamat datang, <?php echo $this->session->userdata('talent_test_user_name'); ?>. Kelola berkas dan dokumen Anda di sini.</b></p>
    </div>

    <!-- Notifications -->
    <div id="notifikasi">
        <?php if ($this->session->flashdata('msg')) : ?>
            <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('msg') ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('msg_error')) : ?>
            <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> <?php echo $this->session->flashdata('msg_error') ?></div>
        <?php endif; ?>
    </div>

    <!-- Files Sections Side by Side -->
    <div class="row">
        <!-- Upload Files Container -->
        <div class="col-md-6">
            <div class="info-card">
                <div class="card-header">
                    <i class="fa fa-upload"></i> Upload Berkas Talent Test
                </div>
                <div class="card-body">
                    <p class="mb-4">Upload berkas yang disediakan admin</p>
                    <div class="row">
                        <?php if (empty($required_files)): ?>
                            <div class="col-12">
                                <div class="alert alert-info">
                                    <i class="fa fa-info-circle"></i> Belum ada berkas yang diperlukan. Silakan hubungi administrator.
                                </div>
                            </div>
                        <?php else: ?>
                            <?php foreach ($required_files as $key => $file): ?>
                            <div class="col-12">
                                <div class="file-item <?php 
                                $is_uploaded = isset($all_files[$key]) && $all_files[$key] && $all_files[$key]['source'] == 'user';
                                $is_admin = isset($all_files[$key]) && $all_files[$key] && $all_files[$key]['source'] == 'admin';
                                echo $is_uploaded ? 'uploaded' : ($is_admin ? 'admin' : 'missing');
                                ?>">
                                    <?php 
                                    $status_class = $is_uploaded ? 'status-uploaded' : ($is_admin ? 'status-admin' : 'status-missing');
                                    $status_text = $is_uploaded ? 'Sudah Upload' : ($is_admin ? 'Dari Admin' : 'Belum Upload');
                                    $info_text = $is_uploaded ? 'File sudah diupload oleh Anda' : ($is_admin ? 'File tersedia dari admin' : 'File belum diupload');
                                    ?>
                                    <div class="status-badge <?php echo $status_class; ?>">
                                        <?php echo $status_text; ?>
                                    </div>
                                    <div class="file-icon">
                                        <i class="fa <?php echo $file['icon']; ?>"></i>
                                    </div>
                                    <div class="file-info">
                                        <h5><?php echo $file['name']; ?><?php if ($is_admin): ?><span style="font-weight: normal; color: #2196f3;"> (dari Admin)</span><?php endif; ?></h5>
                                        <small><?php echo $info_text; ?></small>
                                    </div>
                                    
                                    <?php if ($is_uploaded): ?>
                                    <div class="btn-group" role="group">
                                        <a href="<?php echo base_url('talent-test/preview-berkas/' . $all_files[$key]['id_berkas']); ?>" target="_blank" class="btn btn-custom">
                                            <i class="fa fa-eye"></i> Preview
                                        </a>
                                        <a href="<?php echo base_url('talent-test/download-berkas/' . $all_files[$key]['id_berkas']); ?>" class="btn btn-custom btn-download">
                                            <i class="fa fa-download"></i> Download
                                        </a>
                                    </div>
                                    <?php else: ?>
                                    <form method="post" action="<?php echo base_url('talent-test/upload-berkas'); ?>" enctype="multipart/form-data" class="upload-form">
                                        <input type="hidden" name="jenis" value="<?php echo str_replace(' ', '_', pathinfo($key, PATHINFO_FILENAME)); ?>">
                                        <div class="form-group">
                                            <input type="file" name="<?php echo str_replace(' ', '_', pathinfo($key, PATHINFO_FILENAME)); ?>" class="form-control" accept=".pdf,.doc,.docx" required>
                                            <small class="form-text text-muted">Format: PDF, DOC, DOCX | Maks: 2MB</small>
                                        </div>
                                        <button type="submit" class="btn btn-custom btn-upload">
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
            </div>
        </div>
        
        <!-- Downloaded Files Container -->
        <div class="col-md-6">
            <div class="info-card">
                <div class="card-header">
                    <i class="fa fa-download"></i> Berkas dari Admin
                </div>
                <div class="card-body">
                    <p class="mb-4">Download berkas yang disediakan admin</p>

                    <div class="row">
                        <?php if (empty($required_files)): ?>
                            <div class="col-12">
                                <div class="alert alert-warning">
                                    <i class="fa fa-info-circle"></i> Belum ada berkas yang diupload oleh admin. Silakan hubungi administrator untuk mengupload berkas yang diperlukan.
                                </div>
                            </div>
                        <?php else: ?>
                            <?php foreach ($required_files as $key => $file): ?>
                            <?php $base = pathinfo($key, PATHINFO_FILENAME); ?>
                            <?php if (isset($admin_files[$base])): ?>
                            <div class="col-12">
                                <div class="file-item admin">
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
                                        <a href="<?php echo base_url('talent-test/preview-berkas/' . $admin_files[$base]['id_berkas']); ?>" target="_blank" class="btn btn-custom">
                                            <i class="fa fa-eye"></i> Preview
                                        </a>
                                        <a href="<?php echo base_url('talent-test/download-berkas/' . $admin_files[$base]['id_berkas']); ?>" class="btn btn-custom btn-download">
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
        const fileKey = '<?php echo str_replace(' ', '_', pathifo($key, PATHINFO_FILENAME)); ?>';
        const fileItem = document.querySelector('.file-item[data-key="' + fileKey + '"]');
        if (!fileItem) return;

        const statusBadge = fileItem.querySelector('.status-badge');
        const fileInfo = fileItem.querySelector('.file-info');
        const btnGroup = fileItem.querySelector('.btn-group');
        const uploadForm = fileItem.querySelector('.upload-form');

        if (adminFiles && adminFiles.hasOwnProperty(fileKey)) {
            fileItem.classList.add('admin');
            fileItem.classList.remove('missing', 'uploaded');
            statusBadge.classList.remove('status-missing', 'status-uploaded');
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
                    <a href="<?php echo base_url('talent-test/preview-berkas/'); ?>${adminFiles[fileKey].id_berkas}" target="_blank" class="btn btn-custom">
                        <i class="fa fa-eye"></i> Preview
                    </a>
                    <a href="<?php echo base_url('talent-test/download-berkas/'); ?>${adminFiles[fileKey].id_berkas}" class="btn btn-custom btn-download">
                        <i class="fa fa-download"></i> Download
                    </a>
                `;
                fileItem.appendChild(newBtnGroup);
            }
        } else {
            fileItem.classList.remove('admin');
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
                    <button type="submit" class="btn btn-custom btn-upload">
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
