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

   
    .question-text img,
    .choice-text img,
    #text-wrapper img {
        max-width: 100% !important;
        height: auto !important; 
        max-height: 300px;
        object-fit: contain;
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

    .question-text {
        font-size: 20px;
        color: var(--text-dark);
        font-weight: 600;
        line-height: 1.5;
        margin-bottom: 25px;
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

  /* Horizontal Options Styling */
    .options-container {
        display: flex;
        flex-direction: column; /* Changed from row to stack them neatly */
        gap: 12px; /* Adjusted gap for vertical list */
        margin-top: 15px;
        margin-bottom: 40px;
    }

    .custom-radio-card {
        display: block;
        cursor: pointer;
        margin: 0;
        width: 100%; /* Ensures all cards have a consistent full width */
    }

    .custom-radio-card input[type="radio"] {
        display: none;
    }

    .custom-radio-card .card-content {
        border: 2px solid var(--border-color);
        border-radius: 10px;
        padding: 12px 24px;
        text-align: left; /* FIX: Aligns the text to the left */
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        background-color: #fff;
        display: flex;
        align-items: flex-start; /* FIX: Keeps the letter (a, b, c) at the top if the text wraps to multiple lines */
        cursor: pointer;
        width: 100%;
        justify-content: flex-start; /* FIX: Aligns the flex items to the left */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
    }

    /* Hover and Selected States */
    .custom-radio-card:hover .card-content {
        border-color: #CBD5E1;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    .custom-radio-card input[type="radio"]:checked+.card-content {
        border-color: var(--primary-color);
        background-color: var(--primary-light);
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.15);
        transform: translateY(-2px);
    }

    .choice-letter {
        font-weight: 700;
        color: var(--text-muted);
        font-size: 16px;
    }

    .choice-text {
        font-size: 16px;
        font-weight: 600;
        margin-left: 6px;
        color: var(--text-dark);
    }

    .custom-radio-card input[type="radio"]:checked+.card-content .choice-letter,
    .custom-radio-card input[type="radio"]:checked+.card-content .choice-text {
        color: #B45309;
        /* Darker amber for contrast */
    }

    /* Grid layout for question numbers */
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
        /* FIX: Added padding (top, right, bottom, left) to prevent hover/active state clipping */
        padding: 5px 5px 15px 5px;
    }

    /* Custom Scrollbar for Grid */
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

    /* Skeleton Loading Animation */
    @keyframes shimmer {
        0% {
            background-position: -468px 0;
        }

        100% {
            background-position: 468px 0;
        }
    }

    .skeleton-box {
        display: inline-block;
        position: relative;
        overflow: hidden;
        background-color: #F1F5F9;
        border-radius: 6px;
    }

    .skeleton-box::after {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        transform: translateX(-100%);
        background-image: linear-gradient(90deg,
                rgba(255, 255, 255, 0) 0,
                rgba(255, 255, 255, 0.4) 20%,
                rgba(255, 255, 255, 0.8) 60%,
                rgba(255, 255, 255, 0));
        animation: shimmer 1.5s infinite;
        content: '';
    }

    .skel-q-line-1 {
        width: 100%;
        height: 22px;
        margin-bottom: 12px;
    }

    .skel-q-line-2 {
        width: 85%;
        height: 22px;
        margin-bottom: 12px;
    }

    .skel-q-line-3 {
        width: 60%;
        height: 22px;
    }

    .skel-choice {
        width: 70px;
        height: 18px;
        margin: 2px 0;
    }
</style>


<?php $this->load->view('layout3/navbar') ?>

<div class="col-sm-12 main">
    <div class="row" style="margin-bottom: 10px; z-index: 1; display: flex; align-items: center;">
        <div class="col-xs-6 col-lg-6">
            <h3 class="exam-header-title">Ujian BAPPENAS Sub 1</h3>
        </div>
        <div class="col-xs-6 col-lg-6 text-right" style="text-align: right; margin-top: 20px;">
            <div class="timer-badge">
                Waktu: <span id="time" style="font-family: monospace; font-size: 18px;"></span>
            </div>
        </div>
    </div>

     <div class="panel-body" style="color: var(--text-dark); font-size: 15px;" id="instruction-body">
                  
                </div>

    <?php
    $id_ujian =  $this->session->userdata('ses_cepat');
    $ujian = $this->db->query("SELECT * FROM tb_ujian_bappenas WHERE id_ujian = 1");
    foreach ($ujian->result() as $key) {
        $end = $key->end_uji_sub1;
    }
    ?>

    <div class="col-sm-12 modern-card">
        <div class="row">

            <div class="col-md-8 col-sm-12 left-panel">
                <h3 class="question-number">Soal Nomor <span id="display-number">1</span></h3>
                <hr style="margin-top: 15px; margin-bottom: 25px; border-top: 2px solid #F1F5F9;">

                <div id="text-wrapper" style="margin-bottom: 20px;">

                </div>

                <form id="form-ujian" method="post">
                    <div style="width: 100%;">
                        <div class="question-text" id="display-pertanyaan">Memuat Soal...</div>
                    </div>

                    <div class="options-container">
                        <div class="custom-radio-card">
                            <input type="radio" id="optionA" name="jawaban" value="A">
                            <label for="optionA" class="card-content">
                                <span class="choice-letter">A. </span>
                                <span class="choice-text" id="text-opsi-a"></span>
                            </label>
                        </div>
                        <div class="custom-radio-card">
                            <input type="radio" id="optionB" name="jawaban" value="B">
                            <label for="optionB" class="card-content">
                                <span class="choice-letter">B. </span>
                                <span class="choice-text" id="text-opsi-b"></span>
                            </label>
                        </div>
                        <div class="custom-radio-card">
                            <input type="radio" id="optionC" name="jawaban" value="C">
                            <label for="optionC" class="card-content">
                                <span class="choice-letter">C. </span>
                                <span class="choice-text" id="text-opsi-c"></span>
                            </label>
                        </div>
                        <div class="custom-radio-card">
                            <input type="radio" id="optionD" name="jawaban" value="D">
                            <label for="optionD" class="card-content">
                                <span class="choice-letter">D. </span>
                                <span class="choice-text" id="text-opsi-d"></span>
                            </label>
                        </div>
                        <div class="custom-radio-card">
                            <input type="radio" id="optionE" name="jawaban" value="E">
                            <label for="optionE" class="card-content">
                                <span class="choice-letter">E. </span>
                                <span class="choice-text" id="text-opsi-e"></span>
                            </label>
                        </div>
                    </div>

                    <input type="hidden" name="id_ujian" id="id_ujian" value="<?php echo $id_ujian; ?>">
                    <input type="hidden" name="nomor_soal" id="nomor_soal" value="1">

                    <div class="row" style="margin-top: 20px;">
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

        let id_ujian = $('#id_ujian').val();
        let currentSoal = 1;
        let totalSoal = 0;


        loadGrid(function() {
            loadQuestion(1);
        });


        function loadGrid(callback = null) {
            $.ajax({
                url: '<?php echo base_url("Pelamar/Daftar_ujian/Bappenas/get_grid"); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    id_ujian: id_ujian,
                    subtes: 1
                },
                success: function(res) {
                    totalSoal = parseInt(res.total);

                    let html = '';
                    for (let i = 1; i <= totalSoal; i++) {
                        let isAnswered = res.dijawab.includes(i.toString()) || res.dijawab.includes(i);
                        // Using modern colors directly in JS
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
            $('#display-number').html(currentSoal); // Updated purely number part

            // --- SKELETON LOADING ---
            let skeletonSoal = `
                <div class="skeleton-box skel-q-line-1"></div>
                <div class="skeleton-box skel-q-line-2"></div>
                <div class="skeleton-box skel-q-line-3"></div>
            `;
            let skeletonOpsi = `<div class="skeleton-box skel-choice"></div>`;

            $('#display-pertanyaan').html(skeletonSoal);
            $('#text-opsi-a, #text-opsi-b, #text-opsi-c, #text-opsi-d').html(skeletonOpsi);
            // --- SKELETON LOADING ---

            // Reset radio buttons
            $('input[name="jawaban"]').prop('checked', false);

            // Update Button States based on current question
            if (currentSoal === 1) {
                $('#btn-prev').hide();
            } else {
                $('#btn-prev').show();
            }

            if (currentSoal === totalSoal) {
                // If it's the last question, change the Next button to a Finish button
                $('#btn-next').removeClass('btn-modern-primary').addClass('btn-modern-success').html('Selesai &#10003;');
            } else {
                // Otherwise, keep it as Next
                $('#btn-next').removeClass('btn-modern-success').addClass('btn-modern-primary').html('Selanjutnya &raquo;');
            }

            // Fetch Data via AJAX
            $.ajax({
                url: '<?php echo base_url("Pelamar/Daftar_ujian/Bappenas/get_question"); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    id_ujian: id_ujian,
                    nomor_soal: currentSoal,
                     subtes: 1
                },
                success: function(res) {
                    $('#text-wrapper').empty()
                    setQuestionText(currentSoal);
                    $('#display-pertanyaan').html(res.soal);
                    $('#text-opsi-a').html(res.opsi_a);
                    $('#text-opsi-b').html(res.opsi_b);
                    $('#text-opsi-c').html(res.opsi_c);
                    $('#text-opsi-d').html(res.opsi_d);
                    $('#text-opsi-e').html(res.opsi_e);

                    // Check the radio button if it was already answered
                    if (res.jawaban) {
                        $('input[name="jawaban"][value="' + res.jawaban + '"]').prop('checked', true);
                    }
                }
            });
        };

        function setQuestionText(questionNumber) {
            if (currentSoal >= 61 && currentSoal <= 63) {
                $('#text-wrapper').append(
                    `  <p>
                        <a class="btn btn-primary" id="btn-question-text" data-toggle="collapse" href="#question-text" role="button"
                            aria-expanded="false" aria-controls="question-text">Tampilkan teks Soal</a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="question-text">
                                <div>
                                <p>Teks berikut digunakan untuk menjawab soal nomor 61-63.</p>
<p>(1) Banyak komitmen yang dibuat dan harus dipatuhi untuk mendukung performa mereka. (2) Komitmen yang dimaksud antara lain wajib berpantang mengonsumsi makanan yang pedas dan asam, makanan yang mengandung banyak minyak, minuman dingin, cokelat, dan permen. (3) Mereka harus teratur minum beras kencur dan mengonsumsi nasi, dengan irisan kencur untuk menjaga stamina. (4) Mereka rela mengorbankan waktu libur untuk berlatih agar mampu menunjukkan penampilan yang terbaik. (5) Melalui proses inilah, peserta didik yang masuk tim paduan suara mempersiapkan diri untuk mengikuti lomba.</p>                                </div>
                            </div>
                        </div>
                    </div>
                    `
                )
            }
            if (currentSoal >= 64 && currentSoal <= 66) {
                $('#text-wrapper').append(
                    `  <p>
                        <a class="btn btn-primary" id="btn-question-text" data-toggle="collapse" href="#question-text" role="button"
                            aria-expanded="false" aria-controls="question-text">Tampilkan teks Soal</a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="question-text">
                                <div>
                                <p>Teks berikut digunakan untuk menjawab soal nomor 64-66.</p>
<p>Mungkin para penggagas Mycotech ini bisa diberi julukan "generasi tempe". Mereka terinspirasi dari cara pembuatan tempe sehingga dapat membuat material dengan cara baru. Mereka menggunakan limbah pertanian seperti tandan kosong kelapa sawit, limbah tapioka, serbuk kayu, atau sekam padi untuk membuat material multifungsi. Limbah pertanian tersebut dapat berubah menjadi material bangunan nonstruktural seperti bahan furnitur, batu bata dan panel, bahkan dasbor mobil atau casing ponsel. Material tersebut dibuat dengan konsep pembuatan seperti tempe, yakni menumbuhkan jamur di atas bahan yang mereka ambil dari limbah pertanian. Jamur yang digunakan adalah jamur tiram yang miseliumnya lebih tebal sehingga bisa merekatkan material dengan pengikat potensial untuk menggantikan resin yang biasanya non-organik.</p>
<p>Proses pembuatan material diawali dengan mencampur semua bahan. Kemudian, jamur ditumbuhkan di bahan-bahan tersebut. Setelah berbentuk panel-panel, pengeringan dilakukan dengan mengeluarkan air dan panel disterilisasi. Setelah itu, Mycotech dapat dibentuk sesuai keinginan. Hal yang menarik adalah proses ini tidak menggunakan energi berlebih, seperti bata yang dibuat dari tanah liat yang harus dibakar dalam suhu tinggi. Pengeringan Mycotech hanya memerlukan suhu sekitar 90&deg;C dalam waktu kurang lebih 2 jam.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    `
                )
            }
            if (currentSoal >= 67 && currentSoal <= 68) {
                $('#text-wrapper').append(
                    `  <p>
                        <a class="btn btn-primary" id="btn-question-text" data-toggle="collapse" href="#question-text" role="button"
                            aria-expanded="false" aria-controls="question-text">Tampilkan teks Soal</a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="question-text">
                                <div>
                                    <p>Teks berikut digunakan untuk menjawab soal nomor 67-68.</p>
<p>&nbsp;</p>
<p>(1) Setelah beberapa bulan terakhir puluhan bahkan ratusan ribu pengungsi datang dari sejumlah negara di Timur Tengah dan Afrika Eropa yang dipandang sebagai tanah impian harus menghadapi realita pelik. (2) Kondisi di Eropa ini sungguh memprihatinkan dan memperlihatkan betapa makin peliknya masalah internasional. (3) Pengungsi meninggalkan negara mereka karena keadaan sulit, baik karena disebabkan konflik maupun penindasan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    `
                )
            }
            if (currentSoal >= 73 && currentSoal <= 75) {
                $('#text-wrapper').append(
                    `  <p>
                        <a class="btn btn-primary" id="btn-question-text" data-toggle="collapse" href="#question-text" role="button"
                            aria-expanded="false" aria-controls="question-text">Tampilkan teks Soal</a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="question-text">
                                <div>
                                <p>Teks berikut digunakan untuk menjawab soal nomor 73-75.</p>
<p>(1) Kita harus menegaskan kembali makna berpolitik dan berkekuasaan untuk membangun negara yang sejahtera dan adil beradab. (2) Berpolitik bukan aji mumpung untuk berkuasa tetapi jalan untuk membangun bangsa. (3) Saat ini, kita dapat melihat wajah gelap politik negeri ini. (4) Wajah gelap itu yang harus kembali diterangi oleh kejujuran berpolitik. (5) Kejujuran tersebut dapat kita pelajari dari para pendahulu negeri ini. (6) Mereka mampu berpolitik dengan mengusung gagasan dan cita-cita besar Indonesia. (7) Tekad kuat dalam makna berpolitik adalah dengan menjadi penguasa yang berpihak pada rakyat, bukan kepada pemilik uang. (8) Karena politik yang berkembang saat ini, tidak ada bedanya dengan transaksi bisnis. (9) Oleh karena itu, cara perubahan orientasi politik di Indonesia harus segera dilakukan.</p>
                                    </div>
                            </div>
                        </div>
                    </div>
                    `
                )
            }
            if (currentSoal >= 76 && currentSoal <= 77) {
                $('#text-wrapper').append(
                    `  <p>
                        <a class="btn btn-primary" id="btn-question-text" data-toggle="collapse" href="#question-text" role="button"
                            aria-expanded="false" aria-controls="question-text">Tampilkan teks Soal</a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="question-text">
                                <div>
                                <p>Bacaan berikut digunakan untuk menjawab soal nomor 76 dan nomor 77.</p>
<p>&nbsp;</p>
<p>Banyak ungkapan dalam dunia politik. Ungkapan itu dipergunakan untuk menamai atau memberi label. Salah satu ungkapan yang masih sangat dikenal umum adalah politik sebagai panglima. Ungkapan ini memiliki konotasi yang negatif. Bahkan, ungkapan tersebut memiliki potensi menakutkan masyarakat. Konon, dahulu ungkapan itu mengandung ancaman, khususnya bagi pihak yang tidak sepaham dalam ideologi politik.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    `
                )
            }
        }

        $('#btn-prev').click(function() {
            if (currentSoal > 1) {
                loadQuestion(currentSoal - 1);
            }
        });

        $('#btn-next').click(function() {
            if (currentSoal < totalSoal) {
                // Move to next question
                loadQuestion(currentSoal + 1);
            } else if (currentSoal === totalSoal) {
                // Trigger Finish Exam if it's the last question
                let konfirmasi = confirm("Apakah Anda yakin ingin menyelesaikan ujian ini?");
                if (konfirmasi) {
                    window.location.href = '<?php echo base_url('Pelamar/Daftar_ujian/Bappenas/sub2'); ?>';
                }
            }
        });


        $('input[name="jawaban"]').on('change', function() {
            let jawaban_terpilih = $(this).val();

            $.ajax({
                url: '<?php echo base_url("Pelamar/Daftar_ujian/Bappenas/save_answer"); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    id_ujian: id_ujian,
                    nomor_soal: currentSoal,
                    jawaban: jawaban_terpilih,
                    subtes: 1
                },
                success: function(res) {
                    // Instantly turn the grid item green without reloading the whole grid
                    // Updated to modern Emerald green to match CSS
                    $('#grid-' + currentSoal).css({
                        'background-color': 'var(--success-color)',
                        'color': '#ffffff'
                    });
                }
            });
        });


        var countDownDate = new Date("<?php echo $end ?>").getTime();

        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;

            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Added monospace font style in HTML to prevent jittering numbers
            document.getElementById("time").innerHTML = minutes + " : " + (seconds < 10 ? "0" : "") + seconds;

            if (distance < 0) {
                clearInterval(x);
                alert('Waktu Ujian Bappenas Subtes 1 Telah Berakhir, Semua Jawaban Telah Terekam');
                window.location.href = '<?php echo base_url('Pelamar/Daftar_ujian/Bappenas/sub2'); ?>';
            }
        }, 1000);

    });
</script>