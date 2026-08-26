<?php $this->load->view('layout3/header2') ?>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
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
     td {
            vertical-align: top;
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

    .test-question-ruby {
        font-size: 20px;
        color: var(--text-dark);
        font-weight: 600;
        line-height: 1.5;
        margin-bottom: 25px;
    }

    ruby {
        ruby-position: under;
        /* Forces the annotation below the text */
        text-decoration: underline;
    }

    rt {
        font-size: 0.85em;
        line-height: 1;
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
        flex-direction: column;
        /* Changed from row to stack them neatly */
        gap: 12px;
        /* Adjusted gap for vertical list */
        margin-top: 15px;
        margin-bottom: 40px;
    }

    .custom-radio-card {
        display: block;
        cursor: pointer;
        margin: 0;
        width: 100%;
        /* Ensures all cards have a consistent full width */
    }

    .custom-radio-card input[type="radio"] {
        display: none;
    }

    .custom-radio-card .card-content {
        border: 2px solid var(--border-color);
        border-radius: 10px;
        padding: 12px 24px;
        text-align: left;
        /* FIX: Aligns the text to the left */
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        background-color: #fff;
        display: flex;
        align-items: flex-start;
        /* FIX: Keeps the letter (a, b, c) at the top if the text wraps to multiple lines */
        cursor: pointer;
        width: 100%;
        justify-content: flex-start;
        /* FIX: Aligns the flex items to the left */
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
            <h3 class="exam-header-title">Tes PAPs UGM</h3>
        </div>
        <div class="col-xs-6 col-lg-6 text-right" style="text-align: right; margin-top: 20px;">
            <div class="timer-badge">
                Waktu: <span id="time" style="font-family: monospace; font-size: 18px;"></span>
            </div>
        </div>
    </div>

    <!-- START OF TEST INSTRUCTIONS (BOOTSTRAP 3) -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-info"
                style="border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.02); margin-top: 15px; margin-bottom: 10px;">
                <div class="panel-heading"
                    style="background: #F59E0B !important;  border-top-left-radius: 8px; border-top-right-radius: 8px;">
                    <h3 class="panel-title" style="font-weight: 600; font-family: 'Inter', sans-serif;"
                        id="instruction-title">

                    </h3>
                </div>
                <div class="panel-body" style="color: var(--text-dark); font-size: 15px;" id="instruction-body">
                    <!-- <ul style="margin-bottom: 0; padding-left: 20px; line-height: 1.6;">
                        <li>Pilih salah satu jawaban <strong>(A, B, C, D, atau E)</strong> yang menurut Anda paling tepat.</li>
                        <li>Gunakan <strong>Navigasi Soal</strong> di panel kanan untuk melompat ke soal lain. Kotak berwarna hijau menandakan soal telah dijawab.</li>
                        <li>Waktu ujian berjalan otomatis. Pastikan Anda menyelesaikan semua soal sebelum waktu di pojok kanan atas habis.</li>
                        <li>Untuk soal yang memiliki bacaan panjang, klik tombol <strong>"Tampilkan teks Soal"</strong> jika teks tersembunyi.</li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div>
    <!-- END OF TEST INSTRUCTIONS -->

    <?php
    $id_ujian = $this->session->userdata('ses_cepat');
    $ujian = $this->db->query("SELECT * FROM tb_ujian_paps_ugm WHERE id_ujian_paps_ugm  = 1");
    foreach ($ujian->result() as $key) {
        $end = $key->waktu_akhir;
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
                                <span class="choice-letter">a. </span>
                                <span class="choice-text" id="text-opsi-a"></span>
                            </label>
                        </div>
                        <div class="custom-radio-card">
                            <input type="radio" id="optionB" name="jawaban" value="B">
                            <label for="optionB" class="card-content">
                                <span class="choice-letter">b. </span>
                                <span class="choice-text" id="text-opsi-b"></span>
                            </label>
                        </div>
                        <div class="custom-radio-card">
                            <input type="radio" id="optionC" name="jawaban" value="C">
                            <label for="optionC" class="card-content">
                                <span class="choice-letter">c. </span>
                                <span class="choice-text" id="text-opsi-c"></span>
                            </label>
                        </div>
                        <div class="custom-radio-card">
                            <input type="radio" id="optionD" name="jawaban" value="D">
                            <label for="optionD" class="card-content">
                                <span class="choice-letter">d. </span>
                                <span class="choice-text" id="text-opsi-d"></span>
                            </label>
                        </div>
                        <div class="custom-radio-card">
                            <input type="radio" id="optionE" name="jawaban" value="E">
                            <label for="optionE" class="card-content">
                                <span class="choice-letter">e. </span>
                                <span class="choice-text" id="text-opsi-e"></span>
                            </label>
                        </div>

                    </div>

                    <input type="hidden" name="id_ujian" id="id_ujian" value="<?php echo $id_ujian; ?>">
                    <input type="hidden" name="nomor_soal" id="nomor_soal" value="1">

                    <div class="row" style="margin-top: 20px;">
                        <div class="col-xs-6 text-left" style="text-align: left;">
                            <button type="button" class="btn-modern btn-modern-secondary" id="btn-prev"
                                style="display:none;">&laquo; Sebelumnya</button>
                        </div>
                        <div class="col-xs-6 text-right" style="text-align: right;">
                            <button type="button" class="btn-modern btn-modern-primary" id="btn-next">Selanjutnya
                                &raquo;</button>
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
        $(document).on('show.bs.collapse', '#question-text', function() {
            $('#btn-question-text').text('Sembunyikan teks Soal');
        });

        $(document).on('hide.bs.collapse', '#question-text', function() {
            $('#btn-question-text').text('Tampilkan teks Soal');
        });
        let id_ujian = $('#id_ujian').val();
        let currentSoal = 1;
        let totalSoal = 0;


        loadGrid(function() {
            loadQuestion(1);
        });


        function loadGrid(callback = null) {
            $.ajax({
                url: '<?php echo base_url("Pelamar/Daftar_ujian/Tes_paps_ugm/get_grid"); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    id_ujian: id_ujian,
                    
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
            $('#text-wrapper').empty()

            if (currentSoal >= 31 && currentSoal <= 34) {
                $('#text-wrapper').append(
                    `  <p>
                        <a class="btn btn-primary" id="btn-question-text" data-toggle="collapse" href="#question-text" role="button"
                            aria-expanded="false" aria-controls="question-text">Tampilkan teks Soal</a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="question-text">
                                <div style="text-align: justify; ">
                                    <p><span style="margin-left: 20px;">Lukisan</span> berjudul Self Portrait and His Pipe karya maestro Affandi yang hilang sejak 2006 ternyata sudah beberapa kali berpindah tangan sebelum dilelang. Lukisan itu menghilang dari rumah Emir Sundoro di Pondok Indah, Jakarta Selatan, sejak Mei 2014 lalu.</p>
                                    <p><span style="margin-left: 20px;">"Kami</span> masih mengejar pemilik lukisan itu yang sekarang. Kami akan bekerja sama dengan Interpol dan polisi Hongkong untuk menyita barang itu," kata Direktur Reserse Kriminal Umum Polda Metro Jaya Komisaris Besar Heru Pranoto di Mapolda Metro Jaya, Selasa (5/5/2015).</p>
                                    <p><span style="margin-left: 20px;">Sejak</span> dibuat pada 1979, lukisan itu dimiliki oleh mantan Menteri Negara Perencanaan Pembangunan Nasional periode 1971-1973, Widjojo Nitisastro. Selanjutnya, lukisan itu dikuasai turun-temurun oleh keluarga Widjojo.</p>
                                    <p><span style="margin-left: 20px;">Kemudian,</span> lukisan itu dimiliki oleh Wijaya Laksmi Kusumaningsih, anak Widjojo satu-satunya, yang juga istri Emir Sundoro. Lukisan itu bertahun-tahun disimpan di rumah peninggalan Widjojo di kawasan Pondok Indah, Jakarta Selatan.</p>
                                    <p><span style="margin-left: 20px;">Namun,</span> lukisan itu justru berpindah tangan secara ilegal ke Irwan Perwito, seorang pekerja perbaikan pendingin ruangan (AC) dan listrik di rumah Widjojo. Pria itu pun menjual lukisan itu kepada seorang kolektor bernama Aryadi Atamini.</p>
                                    <p><span style="margin-left: 20px;">Di tangan Aryadi,</span> lukisan itu dibuatkan sertifikat dari Museum Affandi di Yogyakarta. Selanjutnya, Aryadi menjualnya kepada kolektor lainnya bernama Tirto Juwono Santoso senilai Rp1.350.000.000. Tirto kemudian menjualnya lagi kepada seorang pengusaha Alexander Teddja senilai Rp1.525.000.000.</p>
                                    <p><span style="margin-left: 20px;">Barulah</span> setelah di tangan Teddja, lukisan itu dilelang melalui balai lelang Sotheby's di Hongkong senilai 420.212 dollar AS atau setara dengan Rp5,4 miliar. (megapolitan. kompas.com)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    `
                )
            }
            if (currentSoal >= 35 && currentSoal <= 37) {
                $('#text-wrapper').append(
                    `  <p>
                        <a class="btn btn-primary" id="btn-question-text" data-toggle="collapse" href="#question-text" role="button"
                            aria-expanded="false" aria-controls="question-text">Tampilkan teks Soal</a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="question-text">
                                <div style="text-align: justify; ">
                                    <p><span style="margin-left: 20px;">Lukisan</span> Waduk Jatiluhur merupakan salah satu tempat wisata di Jawa Barat, yang patut dikunjungi. Waduk Jatiluhur terletak di Kota Purwakarta dan berdekatan dengan Waduk Cirata. Waduk Jatiluhur adalah sumber aliran
                                    Sungai Citarum yang bermuara di Tanjung Karawang, Laut Jawa. Waduk Jatiluhur pada awalnya dibangun untuk tujuan irigasi pertanian di Karawang, Purwakarta, dan Cianjur. Jenis olahraga yang dilakukan di Waduk Jatiluhur adalah ski air, kano, dayung, perahu naga, dan lain-lain. Berkat pembangunan yang intensif, Waduk Jatiluhur disulap menjadi tempat wisata di Jawa Barat yang indah dan menarik. (http://ujiannasional. org).</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    `
                )
            }
            if (currentSoal >= 38 && currentSoal <= 40) {
                $('#text-wrapper').append(
                    `  <p>
                        <a class="btn btn-primary" id="btn-question-text" data-toggle="collapse" href="#question-text" role="button"
                            aria-expanded="false" aria-controls="question-text">Tampilkan teks Soal</a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="question-text">
                                <div style="text-align: justify; ">
                                    <p><span style="margin-left: 20px;">Komisi</span> Pemilihan Umum diminta tidak mengikuti kesimpulan rapat konsultasi dengan pimpinan DPR mengenai ketentuan pencalonan partai yang bersengketa dalam pilkada. Alasannya, rapat konsultasi bukan sesuatu yang wajib dan tidak mengikat.</p>
                                    <p><span style="margin-left: 20px;">Ketua</span> Komisi Demokrasi (Kode) Insiatif Veri Junaidi, rapat konsultasi yang difasilitasi pimpinan DPR tidak bisa mengintervensi KPU untuk mengubah keputusannya. "Mekanisme dan kewajiban konsultasi sudah melampaui kewenangan yang diberikan undang-undang," ujarnya ditemui di kawasan Cikini, Jakarta, Selasa (5/5).</p>
                                    <p><span style="margin-left: 20px;">Menurut</span>  dia, peraturan KPU (PKPU) sebenarnya tidak perlu dibahas dengan DPR. Sebab, KPU merupakan institusi yang sifatnya mandiri. Sama seperti Mahkamah Konstitusi atau Mahkamah Agung yang memiliki peraturan sendiri dan tak pernah dikonsultasikan ke DPR. "Ini mekanisme yang ajaib," ucapnya.</p>
                                    <p><span style="margin-left: 20px;">Peneliti</span>  Perludem, Fadli Ramadhanil
                                            menambahkan seharusnya DPR memahami
                                            bahwa rekomendasi yang diberikan ke
                                            KPU tidak mengikat atau membuat KPU
                                            mengubah keputusannya. "Kalau harus
                                            memasukkan ke PKPU, itu argumentasi
                                            yang salah," imbuhnya.</p>
                                    <p><span style="margin-left: 20px;">Terlebih,</span> PKPU mengenai pencalonan parpol dalam pilkada dinilai sudah pas. Menurut dia, ketentuan yang disusun KPU tidak bertentangan dengan undang-undang seperti yang direkomendasikan DPR. "KPU diseret ke dalam konflik partai," tandasnya.</p>
                                    <p><span style="margin-left: 20px;">Seperti</span>  diketahui, Senin (4/5) pimpinan DPR menggelar rapat konsultasi dengan komisi II, KPU, dan Kemendagri untuk membahas rekomendasi panja pilkada mengenai syarat parpol bersengketa agar bisa mengikuti pilkada. DPR meminta agar rekomendasi panja dimasukkan dalam PKPU. Namun, KPU menolaknya.</p>
                                    <p><span style="margin-left: 20px;">Rekomendasi</span>   panja tersebut adalah meminta KPU menggunakan landasan putusan hukum terakhir sebagai penentu keabsahan parpol yang bersengketa agar bisa ikut pilkada. Sementara KPU tetap berpegang pada rencana awal, yakni hanya menerima pencalonan dari kepengurusan yang diakui Kementerian Hukum dan HAM. (www.jawapos.com)</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    `
                )
            }
           
            // --- SKELETON LOADING ---
            let skeletonSoal = `
                <div class="skeleton-box skel-q-line-1"></div>
                <div class="skeleton-box skel-q-line-2"></div>
                <div class="skeleton-box skel-q-line-3"></div>
            `;
            let skeletonOpsi = `<div class="skeleton-box skel-choice"></div>`;

            $('#display-pertanyaan').html(skeletonSoal);
            $('#text-opsi-a, #text-opsi-b, #text-opsi-c, #text-opsi-d, #text-opsi-e').html(skeletonOpsi);
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
                url: '<?php echo base_url("Pelamar/Daftar_ujian/Tes_paps_ugm/get_question"); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    id_ujian: id_ujian,
                    nomor_soal: currentSoal,
                    

                },
                success: function(res) {
                    setInstructions(currentSoal);
                    $('#display-pertanyaan').html(res.soal);
                   $('#display-pertanyaan').html(res.soal.includes("soal.png") ? `
                            <img src="<?= base_url('upload/bank_soal/paps_ugm/'); ?>/${currentSoal}/soal.png" alt="" style="height: 200px;">
                        ` : res.soal);
                    $('#text-opsi-a').html(res.opsi_a.includes("a.png") ?
                        ` <img src="<?= base_url('upload/bank_soal/paps_ugm/'); ?>/${currentSoal}/a.png" alt="" style="height: 100px;">
                    ` : res.opsi_a);
                    $('#text-opsi-b').html(res.opsi_b.includes("b.png") ?
                        ` <img src="<?= base_url('upload/bank_soal/paps_ugm/'); ?>/${currentSoal}/b.png" alt="" style="height: 100px;">
                    ` : res.opsi_b);
                    $('#text-opsi-c').html(res.opsi_c.includes("c.png") ?
                        ` <img src="<?= base_url('upload/bank_soal/paps_ugm/'); ?>/${currentSoal}/c.png" alt="" style="height: 100px;">
                    ` : res.opsi_c);
                    $('#text-opsi-d').html(res.opsi_d.includes("d.png") ?
                        ` <img src="<?= base_url('upload/bank_soal/paps_ugm/'); ?>/${currentSoal}/d.png" alt="" style="height: 100px;">
                    ` : res.opsi_d);
                    $('#text-opsi-e').html(res.opsi_e.includes("e.png") ?
                        ` <img src="<?= base_url('upload/bank_soal/paps_ugm/'); ?>/${currentSoal}/e.png" alt="" style="height: 100px;">
                    ` : res.opsi_e);

                    if (res.jawaban) {
                        $('input[name="jawaban"][value="' + res.jawaban + '"]').prop('checked', true);
                    }

                    if (window.MathJax) {
                        MathJax.typesetPromise().then(() => {});
                    }
                }
            });
        };


        function setInstructions(questionNumber) {
            if (questionNumber >= 1 && questionNumber <= 30) {
                $('#instruction-title').html(`<i class="glyphicon glyphicon-info-sign" style="margin-right: 5px; padding-top: 10px;"></i> Petunjuk Pengerjaan Soal 1-30`);
                $('#instruction-body').html(`
                <p>Pada no 1-30, pilih salah satu jawaban <strong>(A, B, C, D, atau E)</strong> yang menurut Anda paling tepat dari pilihan yang ada, di setiap kelompok soal memiliki instruksi berbeda</p>
                <ul style="margin-bottom: 0; padding-left: 20px; line-height: 1.6;">
                        <li> <strong>(=)</strong> Anda diminta mencari padanan kata yang tepat antara dua kata</li>
                        <li> <strong>(><)</strong> Anda diminta mencari lawan kata yang tepat antara dua kata</li>
                        <li> <strong>(a : b = c : d)</strong> Anda diminta mencari persamaan kata dari pola padanan yang tersedia</li>
                    </ul>
                `);
            }else if (questionNumber >= 31 && questionNumber <= 40) {
               $('#instruction-title').html(`<i class="glyphicon glyphicon-info-sign" style="margin-right: 5px; padding-top: 10px;"></i> Petunjuk Pengerjaan Soal 31-40`);
                $('#instruction-body').html(`
                <p>Pada no 31-40, pilih salah satu jawaban <strong>(A, B, C, D, atau E)</strong> yang menurut Anda paling tepat dari pilihan yang ada, di setiap kelompok soal memiliki instruksi berbeda</p>
                <ul style="margin-bottom: 0; padding-left: 20px; line-height: 1.6;">
                <li>Anda diminta untuk menjawab pertanyaan berdasarkan paragraf yang sudah disediakan</li>
                </ul>
                `);
            }else if (questionNumber >= 41 && questionNumber <= 50) {
                $('#instruction-title').html(`<i class="glyphicon glyphicon-info-sign" style="margin-right: 5px; padding-top: 10px;"></i> Petunjuk Pengerjaan Soal 41-50`);
                $('#instruction-body').html(`
                <p>Pada no 41-50, pilih salah satu jawaban <strong>(A, B, C, D, atau E)</strong> yang menurut Anda paling tepat dari pilihan yang ada, di setiap kelompok soal memiliki instruksi berbeda</p>
                <ul style="margin-bottom: 0; padding-left: 20px; line-height: 1.6;">
                <li>Silahkan memilih jawaban yang paling sesuai untuk mengisi jawaban pilihan yang ada dibawah ini</li>
                </ul>
                `);
                }else if (questionNumber >= 51 && questionNumber <= 80) {
                    $('#instruction-title').html(`<i class="glyphicon glyphicon-info-sign" style="margin-right: 5px; padding-top: 10px;"></i> Petunjuk Pengerjaan Soal 51-80`);
                    $('#instruction-body').html(`
                    <p>Pada no 51-80, pilih salah satu jawaban <strong>(A, B, C, D, atau E)</strong> yang menurut Anda paling tepat dari pilihan yang ada, hitung jawaban yang paling tepat</p>
                    <ul style="margin-bottom: 0; padding-left: 20px; line-height: 1.6;">
                    <li>Silahkan memilih jawaban yang paling sesuai untuk mengisi jawaban pilihan yang ada dibawah ini</li>
                    </ul>
                    `);
            }else if (questionNumber >= 81 && questionNumber <= 90) {
                $('#instruction-title').html(`<i class="glyphicon glyphicon-info-sign" style="margin-right: 5px; padding-top: 10px;"></i> Petunjuk Pengerjaan Soal 81-90`);
                $('#instruction-body').html(`
                <p>Pada no 81-90, pilih salah satu jawaban <strong>(A, B, C, D, atau E)</strong> yang menurut Anda paling tepat dari pilihan yang ada</p>
                <ul style="margin-bottom: 0; padding-left: 20px; line-height: 1.6;">
                <li>Silahkan memilih jawaban yang paling sesuai untuk mengisi jawaban pilihan yang ada dibawah ini</li>
                </ul>
                `);
            }
            else if (questionNumber >= 91 && questionNumber <= 100) {
                $('#instruction-title').html(`<i class="glyphicon glyphicon-info-sign" style="margin-right: 5px; padding-top: 10px;"></i> Petunjuk Pengerjaan Soal 91-100`);
                $('#instruction-body').html(`
                <p>Pada no 91-100, pilih salah satu jawaban <strong>(A, B, C, D, atau E)</strong> yang menurut Anda paling tepat dari pilihan yang ada</p>
                <ul style="margin-bottom: 0; padding-left: 20px; line-height: 1.6;">
                <li>Untuk menjawab pertanyaan nomor 91 — 100,
                    kelompokkan tiga kata yang terdapat pada soal
                    ke dalam salah satu dari diagram Venn pada
                    (B), (C), (D), atau (E)!</li>
                </ul>
                `);
            }
            else if (questionNumber >= 101 && questionNumber <= 110) {
                $('#instruction-title').html(`<i class="glyphicon glyphicon-info-sign" style="margin-right: 5px; padding-top: 10px;"></i> Petunjuk Pengerjaan Soal 91-100`);
                $('#instruction-body').html(`
                <p>Pada no 91-100, pilih salah satu jawaban <strong>(A, B, C, D, atau E)</strong> yang menurut Anda paling tepat dari pilihan yang ada</p>
                `);
            } else {
                $('#instruction-title').html(`<i class="glyphicon glyphicon-info-sign" style="margin-right: 5px; padding-top: 10px;"></i> Petunjuk Pengerjaan Soal 91-110`);
                $('#instruction-body').html(`
                <p>Pada no 91-110, pilih salah satu jawaban <strong>(A, B, C, D, atau E)</strong> yang menurut Anda paling tepat dari pilihan yang ada, di setiap kelompok soal memiliki instruksi berbeda</p>
                <ul style="margin-bottom: 0; padding-left: 20px; line-height: 1.6;">
                <li>Silahkan memilih jawaban yang paling sesuai dan pilih jawaban yang ada untuk mengisi lanjutan/urutan yang paling tepat atas pola yang ada di setiap soal</li>
                </ul>
                `);
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
                    window.location.href = '<?php echo base_url("Pelamar/Pelamar/testulispsikotes/" . $id_ujian); ?>';
                }
            }
        });


        $('input[name="jawaban"]').on('change', function() {
            let jawaban_terpilih = $(this).val();

            $.ajax({
                url: '<?php echo base_url("Pelamar/Daftar_ujian/Tes_paps_ugm/save_answer"); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    id_ujian: id_ujian,
                    nomor_soal: currentSoal,
                    jawaban: jawaban_terpilih,
                    

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
                alert('Waktu Ujian Cepat Teliti Telah Berakhir, Semua Jawaban Telah Terekam');
                window.location.href = '<?php echo base_url("Pelamar/Pelamar/testulispsikotes/" . $id_ujian); ?>';
            }
        }, 1000);

    });
</script>