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
        flex-direction: row;
        flex-wrap: wrap;
        gap: 16px;
        margin-top: 15px;
        margin-bottom: 40px;
    }

    .custom-radio-card {
        display: block;
        cursor: pointer;
        margin: 0;
    }

    .custom-radio-card input[type="radio"] {
        display: none;
    }

    .custom-radio-card .card-content {
        border: 2px solid var(--border-color);
        border-radius: 10px;
        padding: 12px 24px;
        text-align: center;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        background-color: #fff;
        display: flex;
        align-items: center;
        cursor: pointer;
        min-width: 90px;
        justify-content: center;
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
            <h3 class="exam-header-title">TPA Pascasarjana</h3>
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
            <div class="panel panel-info" style="border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.02); margin-top: 15px; margin-bottom: 10px;">
                <div class="panel-heading" style="background: #F59E0B !important;  border-top-left-radius: 8px; border-top-right-radius: 8px;">
                    <h3 class="panel-title" style="font-weight: 600; font-family: 'Inter', sans-serif;" id="instruction-title">
                        
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
    $ujian = $this->db->query("SELECT * FROM tb_ujian_tpa_pascasarjana WHERE id = 1");
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
                url: '<?php echo base_url("Pelamar/Daftar_ujian/Tpa_pascasarjana/get_grid"); ?>',
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

            if (currentSoal >= 31 && currentSoal <= 35) {
                $('#text-wrapper').append(
                    `  <p>
                        <a class="btn btn-primary" id="btn-question-text" data-toggle="collapse" href="#question-text" role="button"
                            aria-expanded="false" aria-controls="question-text">Tampilkan teks Soal</a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="question-text">
                                <div class="card card-body">
                                    <p style="text-align: justify; font-size: 16px;">(1) Sebuah studi menunjukkan bahwa
                                        anak yang dibiasakan mendengarkan cerita sejak dini akan dikenalkan dengan
                                        kebiasaan
                                        membaca memiliki perkembangan jaringan otak yang lebih awal. (2) Sebaliknya,
                                        anak yang
                                        tidak dikenalkan dengan kebiasaan membaca memiliki perkembangan yang kurang pada
                                        jaringan tersebut. (3) Anak- anak balita dengan orang tua yang rutin membacakan
                                        buku
                                        untuk mereka mengalami perilaku dan prestasi akademik dengan anak- anak dengan
                                        orang tua
                                        yang cenderung pasif dalam membacakan buku. (4) Menurut sebuah studi baru yang
                                        diterbitkan dalam jumal Pediatrics menemukan perbedaan yang juga terjadi pada
                                        aktivitas
                                        otak anak.
                                        (5) Peneliti mengamati perubahan aktivitas otak anak-anak usia 3 sampai dengan 5
                                        tahun
                                        yang mendengarkan orang tua mereka membacakan buku melalui scanner otak yang
                                        disebut
                                        functional magnetic resonance imaging (FMRI). (6) Orang tua menjawab pertanyaan
                                        tentang
                                        berapa banyak mereka membacakan cerita untuk anak-anak serta seberapa sering
                                        melakukan
                                        komunikasi. (7) Para peneliti melihat bahwa ketika anak-anak sedang mendengarkan
                                        orang
                                        tua bercerita, sejumlah daerah di bagian kiri otak menjadi lebih aktif. (8) Ini
                                        adalah
                                        daerah yang terlibat dalam memahami arti kata, konsep, dan memori. (9) Wilayah
                                        otak ini
                                        juga menjadi aktif ketika anak-anak bercerita atau membaca. (10) Pada studi ini
                                        menunjukkan bahwa perkembangan daerah ini dimulai pada usia yang sangat muda.
                                        (11) Yang
                                        lebih menarik adalah bagaimana aktivitas otak di wilayah ini lebih sibuk pada
                                        anak-anak
                                        yang orang tuanya gemar membaca. (12) Membacakan buku untuk anak membantu
                                        pertumbuhan
                                        neuron di daerah ini yang akan menguntungkan anak di masa depan dalam hal
                                        kebiasaan
                                        membaca. (Sumber: http:// health.kompas.com)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    `
                )
            }
            if (currentSoal >= 36 && currentSoal <= 40) {
                $('#text-wrapper').append(
                    `  <p>
                        <a class="btn btn-primary" id="btn-question-text" data-toggle="collapse" href="#question-text" role="button"
                            aria-expanded="false" aria-controls="question-text">Tampilkan teks Soal</a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="question-text">
                                <div class="card card-body">
                                    <p style="text-align: justify; font-size: 16px;">
(1) Generasi hari ini berbeda dengan generasi sebelumnya karena generasi hari ini lahir di tengah kecanggihan teknologi digital sehingga mereka dimanjakan game (2)Sejatinya, online dan media sosial.
smartphone mendukung proses belajar- mengajar sehingga proses transfer of knowledge dan pembinaan karakter dan keterampilan berjalan lancar. (3) Namun, kita juga sering menjumpai remaja yang berada dalam sebuah forum tanpa berkomunikasi satu dengan yang lain, karena asyik dengan dunianya sendiri. (4) Meminjam bahasa Don Tapscott (2013), generasi ini adalah generasi acuh-tak acuh. (5) Minat mereka hanya mengenai budaya populer, para pesohor, dan teman-teman mereka. (6) Hal itu menunjukkan bahwa teknologi digital membawa sejumlah dampak positif dan negatif.
(7) Menurut Felder dan Soloman (1993), "Pembelajar di zaman informasi ini mempunyai kecenderungan gaya belajar aktif, sequential, sensing, dan visual." (8) Fokus pembelajaran adalah pembelajaran 
seumur hidup, bukan demi ujian semata. (9) Guru tidak perlu khawatir jika siswa lupa tanggal, peristiwa penting dalam sejarah karena mereka dapat mencarinya melalui buku dan web. (10) Guru perlu mengajari mereka cara belajar yang baik dan mendorong mereka untuk gemar membaca dan menulis. (11) Jadi, yang terpenting bukan hanya tentang apa yang diketahui ketika mereka lulus, melainkan juga untuk mencintai pembelajaran seumur hidup. (diadaptasi dari http://koran.tempo.co/konten)</p>
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
                url: '<?php echo base_url("Pelamar/Daftar_ujian/Tpa_pascasarjana/get_question"); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    id_ujian: id_ujian,
                    nomor_soal: currentSoal,

                },
                success: function(res) {
                    setInstructions(currentSoal);
                    $('#display-pertanyaan').html(res.soal.includes("soal.png") ? `
                            <img src="<?= base_url('upload/bank_soal/tpa_pascasarjana/'); ?>/soal-${currentSoal}/soal.png" alt="" style="height: 200px;">
                        ` : res.soal);
                    $('#text-opsi-a').html(res.opsi_a.includes("a.png") ?
                        ` <img src="<?= base_url('upload/bank_soal/tpa_pascasarjana/'); ?>/soal-${currentSoal}/a.png" alt="" style="height: 100px;">
                    ` : res.opsi_a.charAt(0).toUpperCase() + res.opsi_a.slice(1));
                    $('#text-opsi-b').html(res.opsi_b.includes("b.png") ?
                        ` <img src="<?= base_url('upload/bank_soal/tpa_pascasarjana/'); ?>/soal-${currentSoal}/b.png" alt="" style="height: 100px;">
                    ` : res.opsi_b.charAt(0).toUpperCase() + res.opsi_b.slice(1));
                    $('#text-opsi-c').html(res.opsi_c.includes("c.png") ?
                        ` <img src="<?= base_url('upload/bank_soal/tpa_pascasarjana/'); ?>/soal-${currentSoal}/c.png" alt="" style="height: 100px;">
                    ` : res.opsi_c.charAt(0).toUpperCase() + res.opsi_c.slice(1));
                    $('#text-opsi-d').html(res.opsi_d.includes("d.png") ?
                        ` <img src="<?= base_url('upload/bank_soal/tpa_pascasarjana/'); ?>/soal-${currentSoal}/d.png" alt="" style="height: 100px;">
                    ` : res.opsi_d.charAt(0).toUpperCase() + res.opsi_d.slice(1));
                    $('#text-opsi-e').html(res.opsi_e.includes("e.png") ?
                        ` <img src="<?= base_url('upload/bank_soal/tpa_pascasarjana/'); ?>/soal-${currentSoal}/e.png" alt="" style="height: 100px;">
                    ` : res.opsi_e.charAt(0).toUpperCase() + res.opsi_e.slice(1));

                    
                    if (res.jawaban) {
                        $('input[name="jawaban"][value="' + res.jawaban + '"]').prop('checked', true);
                    }
                }
            });
        };


        function setInstructions(questionNumber) {
            if (questionNumber >=1 && questionNumber <= 30) {
                $('#instruction-title').html(`<i class="glyphicon glyphicon-info-sign" style="margin-right: 5px; padding-top: 10px;"></i> Petunjuk Pengerjaan Soal 1-30`);
                $('#instruction-body').html(`
                <p>Pada no 1-30, pilih salah satu jawaban <strong>(A, B, C, D, atau E)</strong> yang menurut Anda paling tepat dari pilihan yang ada, di setiap kelompok soal memiliki instruksi berbeda</p>
                <ul style="margin-bottom: 0; padding-left: 20px; line-height: 1.6;">
                        <li> <strong>(=)</strong> Anda diminta mencari padanan kata yang tepat antara dua kata</li>
                        <li> <strong>(><)</strong> Anda diminta mencari lawan kata yang tepat antara dua kata</li>
                        <li> <strong>(a : b = c : d)</strong> Anda diminta mencari persamaan kata dari pola padanan yang tersedia</li>
                    </ul>
                `);
            }else if (questionNumber >=31 && questionNumber <= 40) {
                $('#instruction-title').html(`<i class="glyphicon glyphicon-info-sign" style="margin-right: 5px; padding-top: 10px;"></i> Petunjuk Pengerjaan Soal 31-40`);
                $('#instruction-body').html(`
                <p>Pada no 31-40, pilih salah satu jawaban <strong>(A, B, C, D, atau E)</strong> yang menurut Anda paling tepat dari pilihan yang ada, di setiap kelompok soal memiliki instruksi berbeda</p>
                <ul style="margin-bottom: 0; padding-left: 20px; line-height: 1.6;">
                <li>Anda diminta untuk menjawab pertanyaan berdasarkan paragraf yang sudah disediakan</li>
                </ul>
                `);
            }else if (questionNumber >=41 && questionNumber <= 70) {
                $('#instruction-title').html(`<i class="glyphicon glyphicon-info-sign" style="margin-right: 5px; padding-top: 10px;"></i> Petunjuk Pengerjaan Soal 41-70`);
                $('#instruction-body').html(`
                <p>Pada no 41-70, pilih salah satu jawaban <strong>(A, B, C, D, atau E)</strong> yang menurut Anda paling tepat dari pilihan yang ada, di setiap kelompok soal memiliki instruksi berbeda</p>
                <ul style="margin-bottom: 0; padding-left: 20px; line-height: 1.6;">
                <li>Silahkan menghitung jawaban yang paling tepat untuk menjawab berdasarkan pilihan yang tersedia</li>
                </ul>
                `);
            }else if (questionNumber >=71 && questionNumber <= 90) {
                $('#instruction-title').html(`<i class="glyphicon glyphicon-info-sign" style="margin-right: 5px; padding-top: 10px;"></i> Petunjuk Pengerjaan Soal 71-90`);
                $('#instruction-body').html(`
                <p>Pada no 71-90, pilih salah satu jawaban <strong>(A, B, C, D, atau E)</strong> yang menurut Anda paling tepat dari pilihan yang ada, di setiap kelompok soal memiliki instruksi berbeda</p>
                <ul style="margin-bottom: 0; padding-left: 20px; line-height: 1.6;">
                <li>Silahkan memilih jawaban yang paling sesuai untuk mengisi jawaban pilihan yang ada dibawah ini</li>
                </ul>
                `);
            }else{
                $('#instruction-title').html(`<i class="glyphicon glyphicon-info-sign" style="margin-right: 5px; padding-top: 10px;"></i> Petunjuk Pengerjaan Soal 71-90`);
                $('#instruction-body').html(`
                <p>Pada no 71-90, pilih salah satu jawaban <strong>(A, B, C, D, atau E)</strong> yang menurut Anda paling tepat dari pilihan yang ada, di setiap kelompok soal memiliki instruksi berbeda</p>
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
                    window.location.href = '<?php echo base_url('Pelamar/Daftar_ujian/Tiki_d/latihan2'); ?>';
                }
            }
        });


        $('input[name="jawaban"]').on('change', function() {
            let jawaban_terpilih = $(this).val();

            $.ajax({
                url: '<?php echo base_url("Pelamar/Daftar_ujian/Tpa_pascasarjana/save_answer"); ?>',
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
                // window.location.href = '<?php echo base_url('Pelamar/Daftar_ujian/Tiki_d/latihan2'); ?>';
            }
        }, 1000);

    });
</script>