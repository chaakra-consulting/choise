<?php $this->load->view('layout2/header'); ?>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-wrap">
        <div class="site-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h4 class="mb-0">
                                    Selesaikan Pembayaran
                                </h4>
                            </div>
                            <div class="card-body p-4">
                                <div class="alert alert-info">
                                    <h5 class="mb-3">Detail Pesanan</h5>
                                    <p class="mb-1"><strong>Order ID:</strong> <?php echo $pendaftar['order_id']; ?></p>
                                    <p class="mb-1"><strong>Nama :</strong> <?php echo $pendaftar['nama_pendaftar_pelatihan']; ?></p>
                                    <p class="mb-1"><strong>Email :</strong> <?php echo $pendaftar['email_pendaftar']; ?></p>
                                    <p class="mb-1"><strong>Jadwal Test :</strong> <?php echo date('d-m-Y H:i', strtotime($pendaftar['jadwal_test'])); ?></p>
                                    <p class="mb-1"><strong>Kepentingan :</strong> <?php echo $pendaftar['kepentingan']; ?></p>
                                    <p class="mb-1"><strong>Harga Paket:</strong> <span id="harga-paket">Rp <?php echo number_format($paket['Harga'], 0, ',', '.'); ?></span></p>
                                    <div id="diskon-info" style="display: none;">
                                        <p class="mb-1"><strong>Diskon:</strong> <span id="diskon-amount">- Rp 0</span></p>
                                    </div>
                                    <p class="mb-1"><strong>Total Bayar:</strong> <span id="total-bayar">Rp <?php echo number_format($paket['Harga'], 0, ',', '.'); ?></span></p>
                                    <p class="mb-1"><strong>Waktu Pembayaran Berakhir Dalam :</strong> <span id="payment-timer"></span></p>
                                </div>

                                <!-- Section Kupon -->
                                <div class="mb-4">
                                    <h5>Kode Kupon (Opsional)</h5>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="kode-kupon" placeholder="Masukkan kode kupon jika ada">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary" type="button" id="btn-apply-kupon">Gunakan Kupon</button>
                                        </div>
                                    </div>
                                    <div id="kupon-message" class="mt-2"></div>
                                </div>
                                <div class="alert alert-warning mb-4">
                                    <h6 class="mb-6"><i class="fa fa-info-circle"></i> Butuh Bantuan?</h6>
                                    <p class="mb-1">Jika ada pertanyaan atau mengalami kesulitan dalam proses pembayaran, silakan hubungi admin:</p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="mb-1"><strong><i class="fa fa-phone"></i> Telepon/Whatsapp:</strong></p>
                                            <p class="mb-1"> 0859-5460-7775</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="mb-1"><strong><i class="fa fa-clock-o"></i> Jam Operasional:</strong></p>
                                            <p class="mb-1"> Senin - Jumat, 08:00 - 17:00</p>
                                            <p class="mb-1"> Sabtu, 08:00 - 13:00</p>
                                        </div>
                                    </div>
                                </div>
                                <?php if (!empty($pendaftar['snap_token'])) : ?>
                                <button id="pay-button" class="btn btn-success btn-lg btn-block">Bayar Sekarang</button>

                                <script type="text/javascript"
                                    src="https://app.sandbox.midtrans.com/snap/snap.js" 
                                    data-client-key="<?php echo $midtrans_client_key; ?>"></script>
                                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

                                <script type="text/javascript">
                                    let paymentDeadline = new Date('<?php echo date('Y-m-d H:i:s', strtotime($pendaftar['waktu'] . ' +24 hours')); ?>').getTime();
                                    let appliedCoupon = null;
                                    let originalPrice = <?php echo $paket['Harga']; ?>;

                                    let timerInterval = setInterval(function() {
                                        let now = new Date().getTime();
                                        let distance = paymentDeadline - now;

                                        if (distance < 0) {
                                            clearInterval(timerInterval);
                                            document.getElementById("payment-timer").innerHTML = "Waktu pembayaran telah berakhir.";
                                            $('#pay-button').attr("disabled", "disabled");
                                            return;
                                        }

                                        let days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                        let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                        let seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                        let timerText = "";
                                        if (days > 0) {
                                            timerText += days + " hari ";
                                        }
                                        timerText += hours + " jam " + minutes + " menit " + seconds + " detik ";

                                        document.getElementById("payment-timer").innerHTML = timerText;
                                    }, 1000);

                                    $('#btn-apply-kupon').click(function(){
                                        const kodeKupon = $('#kode-kupon').val().trim();

                                        if (!kodeKupon) {
                                            showKuponMessage('Masukkan kode kupon terlebih dahulu', 'danger');
                                            return;
                                        }

                                        $(this).prop('disabled', true).text('Memvalidasi...');

                                        $.ajax({
                                            url: '<?php echo site_url('Home/apply_coupon_to_transaction'); ?>',
                                            type: 'POST',
                                            data: {
                                                kode_kupon: kodeKupon,
                                                order_id: '<?php echo $pendaftar['order_id']; ?>'
                                            },
                                            success: function(response) {
                                                const result = JSON.parse(response);

                                                if (result.success) {
                                                    appliedCoupon = result;
                                                    updatePriceDisplay(result.diskon, result.harga_akhir);
                                                    showKuponMessage(result.message, 'success');
                                                    $('#kode-kupon').prop('disabled', true);
                                                    $('#btn-apply-kupon').prop('disabled', true);

                                                    snapToken = result.snap_token;
                                                } else {
                                                    showKuponMessage(result.message, 'danger');
                                                    $('#btn-apply-kupon').prop('disabled', false);
                                                }
                                            },
                                            error: function() {
                                                showKuponMessage('Terjadi kesalahan saat memvalidasi kupon', 'danger');
                                                $('#btn-apply-kupon').prop('disabled', false);
                                            }
                                        });
                                    });

                                    function showKuponMessage(message, type) {
                                        $('#kupon-message').html(`<div class="alert alert-${type} alert-dismissible fade show">
                                            ${message}
                                            <button type="button" class="close" data-dismiss="alert">
                                                <span>&times;</span>
                                            </button>
                                        </div>`);
                                    }

                                    function updatePriceDisplay(diskon, hargaAkhir) {
                                        $('#diskon-info').show();
                                        $('#diskon-amount').text('- Rp ' + formatRupiah(diskon));
                                        $('#total-bayar').text('Rp ' + formatRupiah(hargaAkhir));
                                    }

                                    function formatRupiah(angka) {
                                        return new Intl.NumberFormat('id-ID').format(angka);
                                    }
                                    
                                    $('#pay-button').click(function(event){
                                        event.preventDefault();
                                        
                                        if (!appliedCoupon) {
                                            $(this).attr("disabled", "disabled").text('Mempersiapkan pembayaran...');
                                            
                                            $.ajax({
                                                url: '<?php echo site_url('Home/prepare_payment_without_coupon'); ?>',
                                                type: 'POST',
                                                data: {
                                                    order_id: '<?php echo $pendaftar['order_id']; ?>'
                                                },
                                                success: function(response) {
                                                    const result = JSON.parse(response);
                                                    
                                                    if (result.success) {
                                                        snapToken = result.snap_token;
                                                        updatePriceDisplay(result.diskon, result.harga_akhir);
                                                        proceedToPayment();
                                                    } else {
                                                        alert(result.message);
                                                        $('#pay-button').removeAttr("disabled").text('Bayar Sekarang');
                                                    }
                                                },
                                                error: function() {
                                                    alert('Terjadi kesalahan saat mempersiapkan pembayaran');
                                                    $('#pay-button').removeAttr("disabled").text('Bayar Sekarang');
                                                }
                                            });
                                        } else {
                                            proceedToPayment();
                                        }
                                    });

                                    function proceedToPayment() {
                                        $('#pay-button').attr("disabled", "disabled");

                                        snap.pay(snapToken, {
                                            onSuccess: function (result) {
                                                console.log('success');
                                                console.log(result);
                                                $.ajax({
                                                    url: '<?php echo site_url('Home/talent_test_success/'); ?><?php echo $pendaftar['order_id']; ?>',
                                                    type: 'POST',
                                                    data: {
                                                        applied_coupon:appliedCoupon ? JSON.stringify(appliedCoupon) : null
                                                    },
                                                    success: function() {
                                                        window.location.href = 
                                                        '<?php echo site_url('Home/talent_test_success/'); ?>' + 
                                                        '<?php echo $pendaftar['order_id']; ?>'
                                                    }
                                                });
                                            },
                                            onPending: function (result){
                                                console.log('pending');
                                                console.log(result);
                                                window.location.href = 
                                                '<?php echo site_url('Home/talent_test_pending/'); ?>' +
                                                '<?php echo $pendaftar['order_id']; ?>';
                                            },
                                            onError: function (result){
                                                console.log('error');
                                                console.log(result);
                                                window.location.href = 
                                                '<?php echo site_url('Home/talent_test_error/'); ?>' +
                                                '<?php echo $pendaftar['order_id']; ?>';
                                            }
                                        });
                                    }

                                </script>
                                <?php else: ?>
                                <div class="alert alert-danger">
                                    <p>Token pembayaran tidak tersedia. Silahkan hubungi administrator.</p>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php $this->load->view('layout2/footer'); ?>
