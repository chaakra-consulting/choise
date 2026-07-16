<?php $this->load->view('layout3/header2') ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

    :root {
        --primary-color: #F59E0B; /* Modern Amber */
        --primary-light: #FEF3C7;
        --success-color: #10B981; /* Modern Emerald Green */
        --text-dark: #1E293B;
        --text-muted: #64748B;
        --bg-body: #F8FAFC;
        --border-color: #E2E8F0;
    }

    body {
        font-family: 'Inter', sans-serif;
        background-color: var(--bg-body);
    }

    /* Typography */
    .exam-header-title {
        color: var(--text-dark);
        font-weight: 700;
        margin-top: 20px;
        font-size: 24px;
    }

    .timer-badge {
        background-color: #FEE2E2;
        color: #EF4444;
        padding: 8px 16px;
        border-radius: 50px;
        font-size: 16px;
        font-weight: 600;
        display: inline-block;
        box-shadow: 0 2px 4px rgba(239, 68, 68, 0.1);
    }

    .question-number {
        font-size: 18px;
        color: var(--text-muted);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Main Card Layout */
    .modern-card {
        background: #ffffff;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(0, 0, 0, 0.02);
        margin-top: 10px;
    }

    .left-panel {
        border-right: 1px solid var(--border-color);
        min-height: 400px;
        padding-right: 30px;
    }

    @media (max-width: 768px) {
        .left-panel {
            border-right: none;
            border-bottom: 1px solid var(--border-color);
            padding-right: 15px;
            margin-bottom: 30px;
            padding-bottom: 20px;
        }
    }

    /* Selectable Card Style Layout for Options (A-E) */
    .option-card-group {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        justify-content: flex-start;
        margin-bottom: 30px;
        margin-top: 10px;
    }

    .option-card-label {
        margin: 0;
        cursor: pointer;
        flex: 1 1 calc(20% - 15px); /* 5 Kolom sejajar */
        min-width: 100px;
    }

    /* Menyembunyikan input radio asli */
    .option-card-label input[type="radio"] {
        display: none;
    }

    /* Desain default kartu opsi */
    .option-card {
        border: 2px solid var(--border-color);
        border-radius: 12px;
        padding: 15px 10px;
        text-align: center;
        background-color: #fff;
        transition: all 0.2s ease-in-out;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    /* Efek hover pada kartu */
    .option-card-label:hover .option-card {
        border-color: #cbd5e1;
        background-color: #f8fafc;
        transform: translateY(-2px);
    }

    /* Desain ketika kartu (radio) dipilih */
    .option-card-label input[type="radio"]:checked + .option-card {
        border: 2px solid var(--primary-color);
        background-color: #fff;
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.15);
    }

    .option-letter {
        display: block;
        font-size: 14px;
        color: var(--text-muted);
        margin-bottom: 8px;
        font-weight: 600;
        text-transform: uppercase;
    }

    .option-text {
        display: block;
        font-size: 16px;
        font-weight: bold;
        color: var(--text-dark);
        word-wrap: break-word;
    }

    /* Jika opsi menggunakan gambar (opsional) */
    .option-img {
        max-width: 100%;
        max-height: 60px;
        margin-top: 5px;
        display: none; /* Default disembunyikan, akan dimunculkan via JS jika ada */
    }

    @media (max-width: 768px) {
        .option-card-label {
            flex: 1 1 calc(33.333% - 15px); /* 3 kolom di tablet */
        }
    }

    @media (max-width: 480px) {
        .option-card-label {
            flex: 1 1 calc(50% - 15px); /* 2 kolom di HP */
        }
    }

    /* Grid layout for question numbers (Navigasi Kanan) */
    .grid-title {
        font-weight: 700;
        font-size: 16px;
        color: var(--text-dark);
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .grid-container {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 10px;
        max-height: 500px;
        overflow-y: auto;
        padding: 5px 5px 15px 5px;
    }

    .grid-container::-webkit-scrollbar {
        width: 6px;
    }

    .grid-container::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .grid-container::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 10px;
    }

    .grid-item {
        width: 100%;
        aspect-ratio: 1 / 1;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.2s;
        font-size: 14px;
        border: 2px solid transparent;
    }

    .grid-item:hover {
        transform: scale(1.05);
        opacity: 0.9;
    }

    .grid-item.selected {
        border: 2px solid var(--primary-color) !important;
        box-shadow: 0 0 0 3px var(--primary-light);
    }

    /* Modern Buttons */
    .btn-modern {
        padding: 10px 24px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 15px;
        transition: all 0.2s ease;
        border: none;
    }

    .btn-modern-primary {
        background-color: var(--primary-color);
        color: white;
        box-shadow: 0 4px 10px rgba(245, 158, 11, 0.3);
    }

    .btn-modern-primary:hover {
        background-color: #D97706;
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 6px 14px rgba(245, 158, 11, 0.4);
    }

    .btn-modern-secondary {
        background-color: #F1F5F9;
        color: var(--text-dark);
    }

    .btn-modern-secondary:hover {
        background-color: #E2E8F0;
        color: var(--text-dark);
    }

    .btn-modern-success {
        background-color: var(--success-color);
        color: white;
        box-shadow: 0 4px 10px rgba(16, 185, 129, 0.3);
    }

    .btn-modern-success:hover {
        background-color: #059669;
        color: white;
    }
</style>

<?php $this->load->view('layout3/navbar') ?>

<div class="col-sm-12 main">
    <div class="row" style="margin-bottom: 10px; z-index: 1; display: flex; align-items: center;">
        <div class="col-xs-6 col-lg-6">
            <h3 class="exam-header-title">Ujian Subtes 9</h3>
        </div>
        <div class="col-xs-6 col-lg-6 text-right" style="text-align: right; margin-top: 20px;">
            <div class="timer-badge">
                Waktu: <span id="time" style="font-family: monospace; font-size: 18px;"></span>
            </div>
        </div>
    </div>

    <?php
    $id_ujian =  $this->session->userdata('ses_cepat');
    $ujian = $this->db->query("SELECT * FROM tb_ujian_tiki_d WHERE id_ujian = 1");
    foreach ($ujian->result() as $key) {
        $end = $key->end_uji_sub9;
    }
    ?>

    <div class="col-sm-12 modern-card">
        <div class="row">

            <div class="col-md-8 col-sm-12 left-panel">
                <h3 class="question-number">Soal Nomor <span id="display-number">1</span></h3>
                <hr style="margin-top: 15px; margin-bottom: 20px; border-top: 2px solid #F1F5F9;">

                <!-- Tempat render teks soal utama (jika ada) -->
                <div id="soal-utama-container" style="margin-bottom: 20px; display: none;">
                    <img id="img-soal-utama" src="" alt="Soal Utama" style="max-width: 100%; height: auto; border-radius: 8px;">
                </div>

                <form id="form-ujian" method="post" onsubmit="return false;">

                    <?php 
                    // Opsi jawaban A sampai E
                    $huruf_opsi = ['a', 'b', 'c', 'd', 'e']; 
                    ?>

                    <div class="option-card-group">
                        <?php foreach ($huruf_opsi as $huruf): ?>
                            <label class="option-card-label">
                                <input type="radio" name="jawaban_soal" value="<?php echo $huruf; ?>" class="choice-input">
                                <div class="option-card">
                                    <span class="option-letter"><?php echo $huruf; ?></span>
                                    
                                    <!-- Jika Opsi berupa teks (Dinamis via JS) -->
                                    <span class="option-text" id="text-opsi-<?php echo $huruf; ?>">-</span>
                                    
                                </div>
                            </label>
                        <?php endforeach; ?>
                    </div>

                    <input type="hidden" name="id_ujian" id="id_ujian" value="<?php echo $id_ujian; ?>">
                    <input type="hidden" name="nomor_soal" id="nomor_soal" value="1">

                    <hr style="border-top: 1px solid #eee; margin: 10px 0 20px 0;">

                    <div class="row">
                        <div class="col-xs-6 text-left" style="text-align: left;">
                            <button type="button" class="btn-modern btn-modern-secondary" id="btn-prev" style="display:none;">&laquo; Sebelumnya</button>
                        </div>
                        <div class="col-xs-6 text-right" style="text-align: right;">
                            <button type="button" class="btn-modern btn-modern-primary" id="btn-next">Selanjutnya &raquo;</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-4 col-sm-12" style="padding-left: 30px;">
                <div class="grid-title">Navigasi Soal</div>
                <div id="question-grid" class="grid-container"></div>
            </div>

        </div>
    </div>
</div>

<?php $this->load->view('layout3/footer') ?>

<script type="text/javascript">
    $(document).ready(function() {
        let hurufArray = ['a', 'b', 'c', 'd', 'e'];
        let id_ujian = $('#id_ujian').val() || 1;
        let currentSoal = 1;
        let totalSoal = 0;
        let baseUrl = '<?php echo base_url(); ?>';

        loadGrid(function() {
            loadQuestion(1);
        });

        function loadGrid(callback = null) {
            $.ajax({
                url: '<?php echo base_url("Pelamar/Daftar_ujian/Tiki_d/get_grid"); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    id_ujian: id_ujian,
                    subtes: 9 // Sesuaikan jika ID subtes berbeda untuk Kesamaan Kata
                },
                success: function(res) {
                    totalSoal = parseInt(res.total);

                    let html = '';
                    for (let i = 1; i <= totalSoal; i++) {
                        let isAnswered = res.dijawab.includes(i.toString()) || res.dijawab.includes(i);
                        let bgClass = isAnswered ? 'var(--success-color)' : '#F1F5F9';
                        let textClass = isAnswered ? '#ffffff' : 'var(--text-dark)';

                        html += `<div id="grid-${i}" class="grid-item" 
                                      style="background-color: ${bgClass}; color: ${textClass};"
                                      onclick="loadQuestion(${i})">
                                      ${i}
                             </div>`;
                    }
                    $('#question-grid').html(html);

                    if (callback) callback();
                }
            });
        }

        window.loadQuestion = function(nomor) {
            currentSoal = parseInt(nomor);
            $('#nomor_soal').val(currentSoal);
            
            // Ubah highlight navigasi
            $("#question-grid .selected").removeClass('selected');
            $("#question-grid #grid-" + currentSoal).addClass('selected');
            $('#display-number').html(currentSoal);

            // 1. Kosongkan pilihan radio sebelumnya
            $('input[name="jawaban_soal"]').prop('checked', false);

            // Update status tombol navigasi Sebelumnya / Selanjutnya
            if (currentSoal === 1) {
                $('#btn-prev').hide();
            } else {
                $('#btn-prev').show();
            }

            if (currentSoal === totalSoal) {
                $('#btn-next').removeClass('btn-modern-primary').addClass('btn-modern-success').html('Selesai &#10003;');
            } else {
                $('#btn-next').removeClass('btn-modern-success').addClass('btn-modern-primary').html('Selanjutnya &raquo;');
            }

            // Fetch data soal dan jawaban tersimpan dari server via AJAX
            $.ajax({
                url: '<?php echo base_url("Pelamar/Daftar_ujian/Tiki_d/get_question"); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    id_ujian: id_ujian,
                    nomor_soal: currentSoal,
                    subtes: 9 
                },
                success: function(res) {
                    console.log(res);
                    
                    hurufArray.forEach(function(h) {
                        // JIKA MENGGUNAKAN TEKS:
                        // Asumsi respon ajax memiliki format res.teks_a, res.teks_b, dst.
                        if (res['opsi_' + h]) {
                            $('#text-opsi-' + h).text(res['opsi_' + h].charAt(0).toUpperCase()+res['opsi_' + h].slice(1));
                        } 
                    });


                    if (res.jawaban) {
                        $(`input[name="jawaban_soal"][value="${res.jawaban}"]`).prop('checked', true);
                    }
                }
            });
        };

        $('#btn-prev').click(function() {
            if (currentSoal > 1) {
                loadQuestion(currentSoal - 1);
            }
        });

        $('#btn-next').click(function() {
            if (currentSoal < totalSoal) {
                loadQuestion(currentSoal + 1);
            } else if (currentSoal === totalSoal) {
                let konfirmasi = confirm("Apakah Anda yakin ingin menyelesaikan ujian ini?");
                if (konfirmasi) {
                    window.location.href = '<?php echo base_url("Pelamar/Pelamar/testulispsikotes/"); ?>';
                }
            }
        });

        // Simpan jawaban (Auto-save) via AJAX saat pelamar memilih (klik) kartu opsi
        $('.choice-input').on('change', function() {
            let val = $(this).val(); // Mengambil value 'a', 'b', 'c', 'd', atau 'e'

            $.ajax({
                url: '<?php echo base_url("Pelamar/Daftar_ujian/Tiki_d/save_answer"); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    id_ujian: id_ujian,
                    nomor_soal: currentSoal,
                    jawaban: val, // Mengirimkan 1 huruf jawaban
                    subtes: 9
                },
                success: function(res) {
                    // Ubah warna item grid navigasi menjadi hijau karena sudah terjawab
                    $('#grid-' + currentSoal).css({
                        'background-color': 'var(--success-color)',
                        'color': '#ffffff'
                    });
                    
                }
            });
        });

        // Timer Logic
        var countDownDate = new Date("<?php echo $end ?>").getTime();

        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;

            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("time").innerHTML = minutes + " : " + (seconds < 10 ? "0" : "") + seconds;

            if (distance < 0) {
                clearInterval(x);
                alert('Waktu Ujian Subtes Kesamaan Kata Telah Berakhir. Jawaban Telah Terekam.');
                window.location.href = '<?php echo base_url("Pelamar/Pelamar/testulispsikotes/" . $id_ujian); ?>';
            }
        }, 1000);

    });
</script>