<?php $this->load->view('layout2/header'); ?>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-wrap">
        <div class="site-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h4 class="mb-0">
                                    <i class="fa fa-sign-in"></i> Login Talent Test dengan Token
                                </h4>
                            </div>
                            <div class="card-body p-4">
                                <?php if ($this->session->flashdata('error')): ?>
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        <?php echo $this->session->flashdata('error'); ?>
                                        <button type="button" class="close" data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                <?php endif; ?>
                                <?php if ($this->session->flashdata('success')): ?>
                                    <div class="alert alert-success alert-dismissible fade show">
                                        <?php echo $this->session->flashdata('success'); ?>
                                        <button type="button" class="close" data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                <?php endif; ?>
                                <div class="text-center mb-4">
                                    <p>Masukkan token akses yang Anda dapatkan setelah pembayaran berhasil untuk mengakses dashboard talent test.</p>
                                </div>
                                <form action="<?php echo site_url('Home/talent_test_login_process')?>" id="loginForm" method="post">
                                    <div class="form-group">
                                        <label for="access_token">
                                            <i class="fa fa-key"></i> Token Akses <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="access_token" id="access_token" class="form-control form-control-lg"
                                            placeholder="Masukkan token akses Anda" required autocomplete="off">
                                        <small class="form-text text-muted">
                                            Token akses adalah kode unik yang dikirimkan ke email Anda setelah pembayaran berhasil.
                                        </small>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" id="btnLogin">
                                            <i class="fa fa-sign-in"></i> Masuk ke Dashboard Talent Test
                                        </button>
                                    </div>
                                </form>
                                <hr class="my-4">
                                <div class="text-center">
                                    <p class="mb-2">Belum memiliki token akses?</p>
                                    <a href="<?php echo site_url('Home/#pelatihan-selection'); ?>" class="btn btn-outline-primary">
                                        <i class="fa fa-home"></i> Kembali ke Beranda
                                    </a>
                                </div>
                                <div class="mt-4">
                                    <div class="alert alert-info">
                                        <h6><i class="fa fa-info-circle"></i> Bantuan:</h6>
                                        <ul class="mb-0">
                                            <li>Token akses dapat ditemukan di email konfirmasi pembayaran</li>
                                            <li>Jika Anda kehilangan token, hubungi administrator</li>
                                            <li>Token bersifat rahasia, jangan berikan kepada orang lain</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function(){
        $('#loginForm').on('submit', function(e){
            $('#btnLogin').prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Memvalidasi...');
        });
        $('#access_token').focus();
        $('#access_token').on('input',  function(){
            let token = $(this).val().trim();
            if (token.length > 0) {
                $(this).removeClass('is-invalid');
            }
        });
    });
</script>
<?php $this->load->view('layout2/footer'); ?>