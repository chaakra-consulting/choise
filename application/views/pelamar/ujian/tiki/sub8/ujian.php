<?php $this->load->view('layout3/header2') ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

    :root {
        --primary-color: #F59E0B;
        /* Modern Amber */
        --primary-light: #FEF3C7;
        --success-color: #10B981;
        /* Modern Emerald Green */
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

    /* Reference Box (Acuan 5 Pola Utama - Dinamis pola1.png / pola2.png) */
    .reference-box {
        /* background-color: #F8FAFC; */
        border: 2px dashed #94A3B8;
        border-radius: 12px;
        padding: 15px;
        text-align: center;
        margin-bottom: 25px;
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.02);
    }

    .reference-title {
        font-size: 13px;
        font-weight: 700;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 10px;
        display: block;
    }

    .reference-box img {
        max-width: 100%;
        max-height: 140px;
        height: auto;
        margin: 0 auto;
        display: block;
        transition: opacity 0.2s ease-in-out;
    }

    /* Custom Grid untuk 4 Kolom Sejajar (4-Based Grid) */
    .grid-4-container {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        /* Tepat 4 kolom per baris */
        gap: 15px;
        margin-bottom: 25px;
    }

    @media (max-width: 992px) {
        .grid-4-container {
            grid-template-columns: repeat(2, 1fr);
            /* 2 kolom pada layar tablet/HP agar tetap luas */
        }
    }

    @media (max-width: 480px) {
        .grid-4-container {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    /* Custom Styling for Pattern Question Cards & Input */
    .pattern-card {
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        background-color: #fff;
        padding: 12px;
        text-align: center;
        transition: all 0.2s ease-in-out;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.02);
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .pattern-card:hover {
        border-color: var(--primary-color);
        box-shadow: 0 4px 12px rgba(0, 123, 255, 0.15);
    }

    .pattern-header {
        font-weight: bold;
        font-size: 14px;
        color: #333;
        background-color: #f8f9fa;
        padding: 6px;
        border-radius: 6px;
        margin-bottom: 10px;
        border: 1px solid #ebebeb;
    }

    /* Area gambar potongan soal (Dinamis berubah per soal) */
    .pattern-img-box {
        min-height: 90px;
        /* background-color: #fafafa; */
        border: 1px dashed #ccc;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 8px;
        margin-bottom: 12px;
        overflow: hidden;
    }

    .pattern-img-box img {
        max-width: 100%;
        max-height: 85px;
        height: auto;
        display: block;
        margin: 0 auto;
        transition: transform 0.2s;
    }

    .pattern-card:hover .pattern-img-box img {
        transform: scale(1.05);
    }

    /* Styling untuk Input Angka / Teks di bawah gambar */
    .pattern-input-group label {
        font-size: 12px;
        color: #555;
        margin-bottom: 6px;
        display: block;
        font-weight: 600;
    }

    .pattern-input {
        text-align: center;
        font-size: 18px !important;
        font-weight: bold;
        color: #333;
        height: 45px !important;
        padding: 6px !important;
        border: 2px solid #ccc !important;
        border-radius: 8px !important;
        transition: all 0.2s;
    }

    .pattern-input:focus {
        border-color: var(--primary-color) !important;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25) !important;
    }

    /* Hilangkan panah up/down default pada input number */
    .pattern-input::-webkit-outer-spin-button,
    .pattern-input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .pattern-input[type=number] {
        -moz-appearance: textfield;
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
            <h3 class="exam-header-title">TIKI Subtes Pengamatan Bentuk</h3>
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
        $end = $key->end_uji_sub8;
    }
    ?>

    <div class="col-sm-12 modern-card">
        <div class="row">

            <div class="col-md-8 col-sm-12 left-panel">
                <h3 class="question-number">Soal Nomor <span id="display-number">1</span></h3>
                <hr style="margin-top: 15px; margin-bottom: 20px; border-top: 2px solid #F1F5F9;">

                <div class="reference-box">
                    <span class="reference-title">Acuan 5 Pola Utama (1 - 5)</span>
                    <img id="acuan-pola-img"
                        src=""
                        alt="Acuan Pola Utama">
                </div>

                <?php
                $id_pelamar = $this->session->userdata('ses_id');
                // Array huruf kotak dari a sampai h (8 item -> akan menjadi tepat 2 baris x 4 kolom)
                $huruf_kotak = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];
                ?>

                <form id="form-ujian" method="post" onsubmit="return false;">

                    <div class="grid-4-container">
                        <?php foreach ($huruf_kotak as $index => $huruf): ?>
                            <?php $nomor_item = $index + 1; ?>

                            <div class="grid-4-item">
                                <div class="pattern-card">
                                    <div class="pattern-header">Kotak <?php echo strtoupper($huruf); ?></div>

                                    <div class="pattern-img-box">
                                        <img id="img-box-<?php echo $huruf; ?>"
                                            class="choice-grid-img"
                                            data-huruf="<?php echo $huruf; ?>"
                                            src="<?php echo base_url('upload/bank_soal/tiki_d/subtes8/soal/soal-1/' . $huruf . '.png'); ?>"
                                            alt="Kotak <?php echo strtoupper($huruf); ?>">
                                    </div>

                                    <div class="pattern-input-group">
                                        <label for="input_<?php echo $huruf; ?>">Pola (1-5):</label>
                                        <input type="number"
                                            min="1"
                                            max="5"
                                            id="input_<?php echo $huruf; ?>"
                                            data-huruf="<?php echo $huruf; ?>"
                                            name="jawaban_<?php echo $huruf; ?>"
                                            class="form-control pattern-input choice-input"
                                            placeholder="-"
                                            required
                                            autocomplete="off">
                                    </div>
                                </div>
                            </div>
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
        let hurufArray = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];
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
                    subtes: 8
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
            $("#question-grid .selected").removeClass('selected');
            $("#question-grid #grid-" + currentSoal).addClass('selected');
            $('#display-number').html(currentSoal);

            // 1. DINAMIS: Ubah gambar acuan pola (Jika nomor > 9 pakai pola1.png, sisanya pola2.png)
            let polaImgUrl = '';
            // if (currentSoal < 9) {
                polaImgUrl = `${baseUrl}upload/bank_soal/tiki_d/subtes8/soal/pola.png`;
            // } else {
            //     polaImgUrl = `${baseUrl}upload/bank_soal/tiki_d/subtes8/soal/pola-2.png`;
            // }
            $('#acuan-pola-img').css('opacity', '0.4'); // Efek transisi halus
            setTimeout(function() {
                $('#acuan-pola-img').attr('src', polaImgUrl).css('opacity', '1');
            }, 150);

            // 2. DINAMIS: Ubah gambar pada choice grid sesuai nomor soal (soal-1, soal-2, dst.)
            $('.choice-grid-img').each(function() {
                let huruf = $(this).data('huruf');
                let imgUrl = `${baseUrl}upload/bank_soal/tiki_d/subtes8/soal/soal-${currentSoal}/${huruf}.png`;
                $(this).attr('src', imgUrl);
            });

            // 3. Kosongkan seluruh input jawaban di grid terlebih dahulu
            $('.choice-input').val('');

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

            // Fetch data jawaban dari server via AJAX
            $.ajax({
                url: '<?php echo base_url("Pelamar/Daftar_ujian/Tiki_d/get_question"); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    id_ujian: id_ujian,
                    nomor_soal: currentSoal,
                    subtes: 8
                },
                success: function(res) {
                    // Jika backend mengembalikan object jawaban (misal: {a: 1, b: 3, c: 2})
                    if (res.jawaban) {
                        const jawabanObj = Array.from(res.jawaban);
                        hurufArray.forEach(function(h, index) {
                            let v = $(`#input_${h}`).val(jawabanObj[index] || 0);
                        });
                        // if (typeof res.jawaban === 'object') {
                        //     $.each(res.jawaban, function(h, val) {
                        //         $(`#input_${h}`).val(val);
                        //     });
                        // } else {
                        //     // Fallback untuk single value jika ada
                        //     $('#input_a').val(res.jawaban);
                        // }
                    }

                    // Fokuskan kursor ke kotak input pertama (Kotak A) agar pelamar bisa langsung mengetik
                    setTimeout(function() {
                        $('#input_a').focus();
                    }, 100);
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
                    window.location.href = '<?php echo base_url("Pelamar/Daftar_ujian/Tiki_d/latihan9"); ?>';
                }
            }
        });

        // Simpan jawaban (Auto-save) via AJAX saat peserta mengetik angka 1 - 5 pada kotak manapun
        $('.choice-input').on('input change', function() {
            let val = parseInt($(this).val());

            // Validasi: Pastikan input hanya menerima angka 1 sampai 5
            if (isNaN(val) || val < 1 || val > 5) {
                if ($(this).val() !== '') {
                    $(this).val(''); // Kosongkan jika mengetik di luar angka 1-5
                }
                return;
            }

            let huruf = $(this).data('huruf');
            let jawaban_concat = "";
            hurufArray.forEach(function(h) {
                let v = $(`#input_${h}`).val();
                jawaban_concat += (v ? v : 0);
            });

            $.ajax({
                url: '<?php echo base_url("Pelamar/Daftar_ujian/Tiki_d/save_answer"); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    id_ujian: id_ujian,
                    nomor_soal: currentSoal,
                    jawaban: jawaban_concat,
                    subtes: 8
                },
                success: function(res) {
                    // Ubah warna item grid navigasi menjadi hijau
                    $('#grid-' + currentSoal).css({
                        'background-color': 'var(--success-color)',
                        'color': '#ffffff'
                    });
                }
            });
        });

        // Fitur ergonomis: Tekan Enter di dalam kotak input untuk lompat ke kotak berikutnya (A -> B -> C -> dst.)
        $('.choice-input').on('keypress', function(e) {
            if (e.which === 13) { // 13 adalah kode tombol Enter
                e.preventDefault();
                let inputs = $('.choice-input');
                let idx = inputs.index(this);
                if (idx < inputs.length - 1) {
                    inputs[idx + 1].focus(); // Pindah fokus ke kotak input berikutnya
                } else {
                    $('#btn-next').click(); // Jika sudah di kotak terakhir (H), langsung lanjut ke soal berikutnya
                }
            }
        });

        var countDownDate = new Date("<?php echo $end ?>").getTime();

        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;

            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("time").innerHTML = minutes + " : " + (seconds < 10 ? "0" : "") + seconds;

            if (distance < 0) {
                clearInterval(x);
                alert('Waktu Ujian Subtes Pengamatan Bentuk Telah Berakhir, Semua Jawaban Telah Terekam');
                window.location.href = '<?php echo base_url('Pelamar/Daftar_ujian/Tiki_d/latihan9'); ?>';
            }
        }, 1000);

    });
</script>