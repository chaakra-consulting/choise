<?php $this->load->view('layout2/header'); ?>

<body class="hold-transition layout-top-nav">
<div class="wrapper">
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container">
                <div class="col-sm-12">
                    <h1 class="text-center"><?php echo $title; ?></h1>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-check-circle"></i> Status Pembayaran
                                </h3>
                            </div>
                            <div class="card-body">
                                <?php if ($title == 'Pembayaran Berhasil'): ?>
                                    <div class="alert alert-success">
                                        <h4><i class="icon fas fa-check"></i> Selamat!</h4>
                                        <p class="mb-2">Pembayaran Anda telah berhasil diproses.</p>
                                        <p class="mb-0">Sekarang Anda dapat mengakses dashboard talent test untuk memulai ujian.</p>
                                    </div>

                                    <?php if(isset($access_token) && !empty($access_token)): ?>
                                    <div class="alert alert-info">
                                        <h6><i class="fa fa-key"></i> Token Akses Talent Test Anda:</h6>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="accessToken" value="<?php echo $access_token; ?>" readonly>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" onclick="copyToken()">
                                                    <i class="fa fa-copy"></i> Salin
                                                </button>
                                            </div>
                                        </div>
                                        <small>
                                            <b>Simpan token ini dengan aman. Token ini digunakan untuk mengakses dashboard talent test Anda.</b>
                                        </small>
                                    </div>
                                    
                                    <!-- Notifikasi Email -->
                                    <div class="alert alert-success">
                                        <h6><i class="fa fa-envelope"></i> Token Telah Dikirim ke Email</h6>
                                        <p class="mb-0">
                                            Token akses Anda telah dikirim ke email: <strong><?php echo $pendaftar['email_pendaftar'] ?? ''; ?></strong>
                                        </p>
                                        <small>
                                            <b>Periksa inbox atau folder spam jika email tidak ditemukan.</b>
                                        </small>
                                    </div>
                                    <?php endif; ?>

                                    <div class="mt-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="<?php echo site_url('talent-test/dashboard'); ?>" class="btn btn-primary btn-lg btn-block">
                                                    <i class="fa fa-dashboard"></i> Akses Dashboard Talent Test
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="<?php echo site_url('talent-test/login'); ?>" class="btn btn-outline-primary btn-lg btn-block">
                                                    <i class="fa fa-sign-in"></i> Login dengan Token
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-3" style="text-align: center;">
                                        <small>
                                            Atau Anda dapat mengakses dashboard melalui menu utama website
                                        </small>
                                    </div>
                                <?php elseif ($title == 'Pembayaran Pending'): ?>
                                    <div class="alert alert-warning">
                                        <h4><i class="icon fas fa-clock"></i> Pembayaran Pending</h4>
                                        <p>Pembayaran Anda sedang diproses. Silakan tunggu beberapa saat.</p>
                                    </div>
                                <?php elseif ($title == 'Pembayaran Gagal'): ?>
                                    <div class="alert alert-danger">
                                        <h4><i class="icon fas fa-times"></i> Pembayaran Gagal</h4>
                                        <p>Terjadi kesalahan dalam proses pembayaran. Silakan coba lagi.</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function copyToken() {
        let copyText = document.getElementById("accessToken");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");

        let btn = document.querySelector('.btn-outline-secondary');
        let originalText = btn.innerHTML;
        btn.innerHTML = '<i class="fa fa-check"></i> Disalin!';
        btn.classList.remove('btn-outline-secondary');
        btn.classList.add('btn-success');

        setTimeout(function() {
            btn.innerHTML = originalText;
            btn.classList.remove('btn-success');
            btn.classList.add('btn-outline-secondary');
        }, 2000);
    }
</script>

<?php $this->load->view('layout2/footer'); ?>
