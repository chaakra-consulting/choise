<?php $this->load->view('layout2/header'); ?>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-wrap">
        <div class="site-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">

                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-primary text-white text-center">
                                <h4 class="mb-0">Selesaikan Pembayaran</h4>
                            </div>

                            <div class="card-body p-4 p-md-5">

                                <div class="text-center mb-4">
                                    <span class="badge badge-warning p-2">Menunggu Pembayaran</span>
                                    <p class="text-muted mt-2">Selesaikan pembayaran sebelum batas waktu untuk melanjutkan proses pendaftaran.</p>
                                </div>

                                <h5 class="font-weight-bold">Detail Pesanan</h5>
                                <dl class="row">
                                    <dt class="col-sm-4">Order ID</dt>
                                    <dd class="col-sm-8">: <?php echo htmlspecialchars($pendaftaran['order_id']); ?></dd>

                                    <dt class="col-sm-4">Nama Lengkap</dt>
                                    <dd class="col-sm-8">: <?php echo htmlspecialchars($pendaftaran['nama_pendaftaran_pelatihan']); ?></dd>

                                    <dt class="col-sm-4">Paket Dipilih</dt>
                                    <dd class="col-sm-8">: <?php echo htmlspecialchars($pendaftaran['nama_paket']); ?></dd>
                                </dl>

                                <hr>

                                <div class="alert alert-light text-center" role="alert">
                                    <h6 class="text-muted mb-1">Total Pembayaran</h6>
                                    <h2 class="font-weight-bold text-primary">Rp <?php echo number_format($pendaftaran['harga'], 0, ',', '.'); ?></h2>
                                </div>

                                <div class="text-center p-3 my-4" style="background-color: #f8f9fa; border-radius: .5rem;">
                                    <h6 class="text-muted mb-2">Nomor Virtual Account</h6>
                                    <h2 id="vaNumber" class="font-weight-bold mb-3"><?php echo htmlspecialchars($pendaftaran['nomor_va']); ?></h2>
                                    <button class="btn btn-sm btn-outline-primary" onclick="copyToClipboard()">
                                        Salin Nomor VA <i class="icon-copy"></i>
                                    </button>
                                    <small id="copySuccess" class="text-success d-block mt-2" style="display:none;">Berhasil disalin!</small>
                                </div>


                                <h5 class="font-weight-bold mt-5">Instruksi Pembayaran</h5>
                                <div class="accordion" id="paymentInstructions">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne">
                                                    Transfer via ATM
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#paymentInstructions">
                                            <div class="card-body">
                                                1. Masukkan kartu ATM dan PIN Anda.<br>
                                                2. Pilih menu **Transaksi Lainnya** > **Transfer** > **Ke Rekening Virtual Account**.<br>
                                                3. Masukkan **Nomor Virtual Account** di atas dan tekan **Benar**.<br>
                                                4. Periksa kembali detail pembayaran Anda, jika sesuai tekan **Ya**.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo">
                                                    Transfer via Mobile Banking
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#paymentInstructions">
                                            <div class="card-body">
                                                1. Buka aplikasi Mobile Banking Anda.<br>
                                                2. Pilih menu **m-Transfer** > **Virtual Account**.<br>
                                                3. Masukkan **Nomor Virtual Account** di atas pada kolom yang tersedia.<br>
                                                4. Periksa kembali rincian tagihan Anda, lalu masukkan PIN untuk menyelesaikan transaksi.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <hr class="my-4">

                                <a href="<?php echo site_url('home'); ?>" class="btn btn-primary btn-block">Kembali ke Beranda</a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard() {
            var tempInput = document.createElement("textarea");
            var textToCopy = document.getElementById("vaNumber").innerText;
            tempInput.value = textToCopy;
            document.body.appendChild(tempInput);

            tempInput.select();
            document.execCommand("copy");

            document.body.removeChild(tempInput);

            var successMessage = document.getElementById("copySuccess");
            successMessage.style.display = "block";
            setTimeout(function() {
                successMessage.style.display = "none";
            }, 2000);
        }
    </script>

</body>

<?php $this->load->view('layout2/footer'); ?>