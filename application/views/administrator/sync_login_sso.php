<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-clipboard"></i> Sync SSO Login</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Administration</li>
            <li class="breadcrumb-item"><a href="#">Sync SSO Login</a></li>
        </ul>
    </div>
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-primary">
            <?php echo $this->session->flashdata('success') ?>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error') ?>
        </div>
    <?php endif; ?>
    <div class="card">
        <div class="card-body">
            <?php if ($sso_data->success == false): ?>
                <div class="mb-2">
                    <div class="alert alert-warning">
                        Silahkan sync menggunakan akun SSO yang terdaftar
                    </div>
                </div>
                <div class="py-2">
                    <h4>Sync Akun SSO Chaakra</h4>
                </div>
                <form action="<?= base_url('Administrator/Welcome/sync_sso'); ?>" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-sync"></i> Sync</button>
                    </div>
                </form>
            <?php else: ?>
                <div class="mb-2 text-center">
                    <img src="https://cdni.iconscout.com/illustration/premium/thumb/check-list-illustration-download-in-svg-png-gif-file-formats--business-task-daily-work-management-pack-people-illustrations-4452998.png?f=webp" alt="" srcset="" width="200">
                    <div class="mt-2">
                        <h4>Sync Akun SSO Chaakra Sudah Terkait</h4>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>
<?php $this->load->view('layout/footer'); ?>