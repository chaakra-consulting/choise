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
            <h3 class="exam-header-title">TPA Pascasarjana Sub Tes 2</h3>
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
    $ujian = $this->db->query("SELECT * FROM tb_ujian_tpa_pascasarjana WHERE id = 1");
    foreach ($ujian->result() as $key) {
        $end = $key->end_uji_sub2;
    }
    ?>

    <div class="col-sm-12 modern-card">
        <div class="row">

            <div class="col-md-8 col-sm-12 left-panel">

                <h3 class="question-number">Question Number <span id="display-number">1</span></h3>
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
                    subtes: 2
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

            if (currentSoal >= 41 && currentSoal <= 50) {
                $('#text-wrapper').append(
                    `  <p>
                        <a class="btn btn-primary" id="btn-question-text" data-toggle="collapse" href="#question-text" role="button"
                            aria-expanded="false" aria-controls="question-text">Tampilkan teks Soal</a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="question-text">
                                <div>
                                    <table>
                                        <tr>
                                            <td>Line</td>
                                            <td width="60"></td>
                                            <td>Globalization is a subject often talked about today, and no writing can be expected to adequately
                                                cover every part of it. However, any aspect of society can be divided into component parts and in
                                                analyzing the relative worth of globalization, the four most contentious areas are worth examining.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td width="60"></td>
                                            <td>To begin, we need a definition of "globalization", both academically and in the personal effects on
                                                our lives. Academically, the term refers to the growing internationalization of the world's
                                                economies, financial markets, people and populations, as well as internationalization of the
                                                production, distribution, and consumption of goods. Looking at this in a more personal sense,
                                                globalization means activities such as watching foreign films, wearing American</td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td width="60"></td>
                                            <td>fashion, buying international brands, eating food in different ethnic restaurants or in fast food
                                                chains. It means living in multi-cultural societies, investing in international markets, using the
                                                internet, or traveling to other countries for work, study, or pleasure. Globalization is truly
                                                touching on the lives of almost everyone on earth. One controversial issue is whether globalization
                                                is actually "Americanization" that is,</td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>15</td>
                                            <td width="60"></td>
                                            <td>a means by which America can spread economic and cultural dominance. Globalization is certainly
                                                bringing changes to the country it reaches, but perhaps change is an essential and natural part of
                                                life. We could say that the fact that American products are successful in world markets simply shows
                                                that they are well-made, and see nothing more to it than that. However, we could also say that the
                                                whole world seems to drink Coca-Cola, watch </td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>20</td>
                                            <td width="60"></td>
                                            <td>American TV dramas, and eat at American fast food restaurants. Especially in film, music, and
                                                television, there is an overwhelming and growing dominance of US products, mostly at the expense of
                                                local economies and culture.
                                                <span style="width: 10px;"></span> The next issue is whether globalization causes inequality. On the
                                                one hand, there is evidence that
                                                inequalities in global income and poverty are decreasing, as shown by
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>25</td>
                                            <td width="60"></td>
                                            <td>the rise in income and living standards in China. The actual countries that are becoming poorer are
                                                those that are not open to world trade, such as many nations in Africa. But there is equal evidence
                                                that this gap between the rich and the poor, among nations and within nations, is increasing. Market
                                                forces give the rich the power to add further to their wealth. Large corporations invest in poorer
                                                countries not particularly to help them, but instead so</td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>30</td>
                                            <td width="60"></td>
                                            <td>they can make greater profits from lower wage levels, often exploiting the country, and ultimately
                                                leaving it more debt-ridden than even before.
                                                The role of the internet is also open to debate. English, for example, is the main language of the
                                                internet because it is the rich English-speaking countries generating most of the content. Perhaps
                                                then, the internet has become a method of cultural takeover, in</td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>35</td>
                                            <td width="60"></td>
                                            <td>which Western values dominate and try to intrude upon other legitimate ways of thinking. Contrasting
                                                this completely, many people within developing countries see the internet. as an opportunity to
                                                obtain knowledge and communication from around the world in a way that, before, they would have not
                                                thought possible. This gives chances for economic development in many industries, such as
                                                tourism--and this is very important in developing</td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>40</td>
                                            <td width="60"></td>
                                            <td>countries such as Thailand.
                                                The environmental impact of globalization is perhaps the biggest bone of contention. Being connected
                                                to the world economy contributes to environmental improvements in some ways. It helps
                                                knowledge-sharing, which in turn increases some incomes and improves property-rights, the latter
                                                resulting in regulating the distribution and use of agricultural</td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>45</td>
                                            <td width="60"></td>
                                            <td> lands more efficiently. Yet, multinational companies have a poor record in environmental
                                                protection. Notoriously, industries such as forestry, mining, and fishing, often exploit the many
                                                natural resources of poor countries, showing little regard to the long term cost, as in the case of
                                                New Guinea and Indonesia. The companies take advantage of less stringent protection policy, which
                                                may result in the loss, through rampant and one-sided economic</td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>50</td>
                                            <td width="60"></td>
                                            <td> development, of an irreplaceable national treasure.</td>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    `
                )
            }
            if (currentSoal >= 51 && currentSoal <= 60) {
                $('#text-wrapper').append(
                    `  <p>
                        <a class="btn btn-primary" id="btn-question-text" data-toggle="collapse" href="#question-text" role="button"
                            aria-expanded="false" aria-controls="question-text">Tampilkan teks Soal</a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="question-text">
                                <div class="card card-body">
                                    <table>
                                        <tr>
                                            <td>Line</td>
                                            <td width="60"></td>
                                            <td>By volume, half of blood is the liquid part, called plasma. The rest comprises specialized
                                                components, the main one being red blood cells (technically known as erythrocytes). These transport
                                                oxygen molecules throughout the body, and also give blood its color (from the hemoglobin protein,
                                                within which turns red when combined with oxygen). Red blood
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td width="60"></td>
                                            <td>cells, as with all cells in the human body, have a limited operating life. They are produced within
                                                the marrow of bones, principally the larger ones, and live for about four months before they fall
                                                inactive, to be then reabsorbed by the spleen and liver, with waste products absorbed into the
                                                urine. This contrasts with the other main cells of human blood: the white blood cells,</td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td width="60"></td>
                                            <td>technically known as leukocytes. Similarly produced in the bone marrow, they are active only for
                                                three or four days, yet they are essential in defending the body against infections. White blood
                                                cells come in many different types, each designed to deal with a different sort of invader-bacteria,
                                                virus, fungus, or parasite. When one of these enters the body, the white blood cells quickly
                                                determine its nature, then, after mustering sufficient numbers of</td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>15</td>
                                            <td width="60"></td>
                                            <td>a specific type (the period in which you are sick), they launch themselves into the fight,
                                                enveloping each individual invasive cell, and breaking it down (leading to recovery).
                                                That leaves the last main component of blood: platelets. Their technical name is thrombocytes, and
                                                they are much smaller than red and white blood cells. Also circulating freely, they are responsible
                                                for clotting the blood, and this is necessary to heal both external </td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>20</td>
                                            <td width="60"></td>
                                            <td>and internal injuries. Once again they are produced in the bone marrow, and have the interesting
                                                ability to change shape. There are several diseases related to the breakdown in the regulation of
                                                their numbers. If too low, excessive bleeding can occur, yet if too high, internal clotting may
                                                result, causing potentially catastrophic blockages in parts of the body, and medical ailments we
                                                know as strokes, heart attacks, and embolisms.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>25</td>
                                            <td width="60"></td>
                                            <td>Blood's complexity presents particular difficulties in the advent of emergency transfusions. These
                                                are avoided whenever possible in order to lower the risk of reactions due to blood incompatibility.
                                                Unexpected antigens can trigger antibodies to attack blood components, with potentially lethal
                                                results.
                                                Thus, if transfusions are to take place, a thorough knowledge and classification of blood is
                                                essential, yet with 30 recognized blood-group systems, containing hundreds of</td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>30</td>
                                            <td width="60"></td>
                                            <td>antigens, this presents quite a challenge. The ABO system is the most important. On top of this is
                                                the Rhesus factor, which is not as simple as positive or negative as most people think, but
                                                comprises scores of antigens. These can, however, be clustered into groups which cause similar
                                                responses, creating some order.
                                                In a true emergency, a blood bank is needed, with an array of various types of blood </td>

                                        </tr>
                                        <tr>
                                            <td>35</td>
                                            <td width="60"></td>
                                            <td>on hand. Hence, blood donations must be a regular occurrence among a significant segment of the
                                                population. In the developed world, unpaid volunteers provide most of the blood for the community,
                                                whereas in less developed nations, families or friends are mostly involved. In the era of HIV and
                                                other insidious blood-borne diseases, potential donors are carefully screened and tested, and a
                                                period of about two months is recommended before</td>

                                        </tr>
                                        <tr>
                                            <td>40</td>
                                            <td width="60"></td>
                                            <td>successive whole blood donations.</td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    `
                )
            }
            if(currentSoal >= 61 && currentSoal <= 70){
                $('#text-wrapper').append(
                    `  <p>
                        <a class="btn btn-primary" id="btn-question-text" data-toggle="collapse" href="#question-text" role="button"
                            aria-expanded="false" aria-controls="question-text">Tampilkan teks Soal</a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="question-text">
                                <div class="card card-body">
                                    <table>
                                        <tr>
                                            <td>Line</td>
                                            <td width="60"></td>
                                            <td>Agnes Milowka was one of the foremost cave divers in the world. Female, photogenic, and experienced,
                                                she had gained international recognition for her exploratory work in many underground caverns around
                                                the world. In early 2011, she entered Tank Cave, near Mount Gambier, a seven-kilometer maze of
                                                narrow tunnels-yet ones she had explored
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td width="60"></td>
                                            <td>many times before. Deep inside she parted company from her dive buddy to explore a tight passageway
                                                through which only one person could pass. What happened next will never be exactly known, but the
                                                nature of the cave suggests that she became disoriented during a "sill-out". Unable to maneuver
                                                quickly, with visibility almost zero, she could not find her
                                                way back, and her air ran out.</td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td width="60"></td>
                                            <td>Thinking of these last moments is disturbing, but illustrates the obvious danger of cave diving.
                                                When anything goes wrong, divers cannot swim vertically to the surface, but instead must navigate
                                                the entire way back. The dive is immediately abandoned, but even with the full team at hand, the
                                                return is complicated by narrow tunnels, often lined with sand, mud, or clay, all of which can be
                                                easily disturbed, leading to the dreaded silt- </td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>15</td>
                                            <td width="60"></td>
                                            <td>out, where in few seconds the diver is virtually blind trapped in a panic-inducing soup of sediment.
                                                Artificial light is swallowed in pitch blackness, and there always needs to be sufficient breathing
                                                gas, In short, cave diving seems an insanely dangerous activity.
                                                Yet the cave-diving community disputes this, arguing that their sport is actually safer than normal
                                                open-sea recreational diving. This is due to the much greater degrees of </td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>20</td>
                                            <td width="60"></td>
                                            <td>experience and training, and the special equipment used. Most fatalities that have occurred are a
                                                result of breaking accepted protocols, where improperly trained and inadequately equipped divers
                                                take on caves well beyond their capabilities. Cave divers maintain that, if the rules and guidelines
                                                are followed, their sport becomes acceptably safe. In the rare cases where deaths have happened
                                                while following these, there have typically been
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>25</td>
                                            <td width="60"></td>
                                            <td>unusual circumstances, such as unexpected currents of rock falls.
                                                So, what are those protocols? There are major five ones, all decided upon after extensive accident
                                                analysis. Firstly, a cave diver should be trained and experienced. The next rule highlights the
                                                maximum depths a diver can take as well as the decompression stops needed to allow the release of
                                                dissolved nitrogen from the blood. The last three </td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>30</td>
                                            <td width="60"></td>
                                            <td>protocols concem a vital set of equipment which includes a guide rope, lights (one primary and two
                                                backups), and of course, the breathing gas. There is the "rule of thirds" dealing with oxygen
                                                management. Here, one third of the gas is reserved for exploring into the cave, one third for
                                                retreating out of it, and one third as a reserve in the event of an emergency. or to support fellow
                                                divers.</td>

                                        </tr>
                                        <tr>
                                            <td>35</td>
                                            <td width="60"></td>
                                            <td>By following all such protocols, the risk is minimized, such that cave diving, as far as can be
                                                proven with the limited statistics available, is said to be safer than driving a car. Yet, as the
                                                sad death of Agnes Milowka shows, lethal mishaps can always occur. The question to be asked then is
                                                why anyone would want to dive into cold, confined, pitch-dark, subterranean cave systems in the
                                                first place. The answer is supplied by a cave-diving</td>

                                        </tr>
                                        <tr>
                                            <td>40</td>
                                            <td width="60"></td>
                                            <td> leader: "You get to see things that human beings have never seen before. Nothing on Earth can
                                                compare to that."</td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    `
                )
            }
            if(currentSoal >= 71 && currentSoal <= 80){
                $('#text-wrapper').append(
                    `  <p>
                        <a class="btn btn-primary" id="btn-question-text" data-toggle="collapse" href="#question-text" role="button"
                            aria-expanded="false" aria-controls="question-text">Tampilkan teks Soal</a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="question-text">
                                <div class="card card-body">
                                    <table>
                                        <tr>
                                            <td>Line</td>
                                            <td width="60"></td>
                                            <td>The role that interpreters play is generally accepted as only to accurately interpret one language
                                                to another. They therefore should not advise, counsel, or consult. They do not help the client, or
                                                support any other person. According to Frishberg, some of the metaphors used to describe
                                                interpreters are machine, window, bridge, or telephone line.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td width="60"></td>
                                            <td>This is also the popular image of interpreters, particularly in legal settings. To formalize the
                                                interpreters' role, each government interpreting agency has its own code of conduct and ethics. The
                                                official code of conduct of AUCIT is 14 pages long, and has categories such as professional conduct,
                                                confidentiality, competence, impartiality, and accuracy. With interpreting has such a strict basis
                                                in theory and ethics, one would think that</td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td width="60"></td>
                                            <td>the gender of interpreters should not be a relevant factor, and that the criterion for their
                                                selection should be their language ability, and not any other "profiling" criteria (such as sex,
                                                age, religion, and ethnicity). In fact, the participants of a Victorian Language Services forum
                                                agreed that linguistic ability should be the main consideration in interpreter selection, and that
                                                any other form of profiling undermined the professionalism of the industry-for</td>
                                        </tr>
                                        <tr>
                                            <td>15</td>
                                            <td width="60"></td>
                                            <td>example, by suggesting that male interpreters are unable to provide an impartial service.
                                                However, obviously, open communication from the client is important for successful interpreting.
                                                Therefore, to achieve this, human needs and the client's nature, and the situations in which the
                                                interpreting takes place, must all be considered to some extent. Yet the situation can often be such
                                                that, despite the best intentions of everyone, problems</td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>20</td>
                                            <td width="60"></td>
                                            <td> are inevitable. For example, embarrassment or shame through discussing awkward topics such as sex
                                                offences may lead to issues not being fully discussed or interpreted. A Greek woman who has been
                                                raped may have difficulty talking about her feelings and symptoms with an Italian male interpreter.
                                                Even in the best of settings and circumstances, the clients' dependence on interpreters results in a
                                                loss of personal freedom which can raise levels of
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>25</td>
                                            <td width="60"></td>
                                            <td> anxiety enough to impede communication.
                                                This anxiety can increase due to factors implicit in the actual interpreting process itself.
                                                Ideally, every unit of meaning must be translated, no matter what the speed of the source, but of
                                                course, due to the grammatical differences, conveying the same message between two different
                                                languages may need different number of words. The interpreted message </td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>30</td>
                                            <td width="60"></td>
                                            <td>may be much shorter or longer than the original, depending on the degree to which the languages
                                                condense information. In addition, even the best interpreters need "processing" times, as they
                                                reconfigure the message, aiming for the most appropriate phrasing. These two factors give the
                                                appearance of "tampering" or "selective interpretation", which often creates suspicions, or, in
                                                extreme cases, breakdown of cooperation. It is therefore even</td>

                                        </tr>
                                        <tr>
                                            <td>35</td>
                                            <td width="60"></td>
                                            <td>more important that there exists the utmost trust between all parties, meaning that gender selection
                                                perhaps must necessarily be accepted.
                                                But there is always a counter argument. Allowing gender selection might create better understanding
                                                and empathy between client and interpreter, but the latter often leads to the clients
                                                misunderstanding the role of interpreters, and expecting them to support and</td>

                                        </tr>
                                        <tr>
                                            <td>40</td>
                                            <td width="60"></td>
                                            <td> even defend them, instead of impartially interpreting. Clients can feel betrayed when this
                                                impartiality is realized and this is a significant cause of complaints against interpreters. These
                                                complaints have, in fact, increased in 2011 significantly. Nevertheless, most interpreting agencies
                                                (including TIS, HCIS, and LAD-EAC) routinely allow clients to choose the gender of their
                                                interpreters, despite the absence of definite policy in this area.</td>
                                        </tr>
                                        <tr>
                                            <td>45</td>
                                            <td width="60"></td>
                                            <td> So far, interpreters' rights groups have raised only minor concerns with this apparent lack of
                                                clear policy, and the double-standards that exist in modern society, which otherwise so vigorously
                                                champions equal opportunity between the sexes in all other fields. Perhaps, since interpreting is so
                                                human-based, with its consequent dependence on interaction, emotions, and personality factors, there
                                                is a realization that it cannot be regulated by</td>
                                        </tr>
                                        <tr>
                                            <td>50</td>
                                            <td width="60"></td>
                                            <td> impersonal "sexual-discrimination" legalities. But in society growing more litigious every year, it
                                                is possible that this may be a problem just waiting to surface. One wonders what will happen then.
                                            </td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    `
                )
            }
            if(currentSoal >= 81 && currentSoal <= 90){
                $('#text-wrapper').append(
                    `  <p>
                        <a class="btn btn-primary" id="btn-question-text" data-toggle="collapse" href="#question-text" role="button"
                            aria-expanded="false" aria-controls="question-text">Tampilkan teks Soal</a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="question-text">
                                <div class="card card-body">
                                    <table>
                                        <tr>
                                            <td>Line</td>
                                            <td width="60"></td>
                                            <td>Being in a cold climate, facing limited summer seasons, rooted in nutrient-poor and dry soil and
                                                subject to high winds and withering winters, bristlecone pines mature very slowly indeed. Yet mature
                                                they do, as with all pines becoming fractionally thicker every year as another growth ring is added
                                                to their trunk. By counting these, we can accurately
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td width="60"></td>
                                            <td>state that, as of 2011, Methuselah tree was 4,842 years old, meaning that it sprouted as a seedling
                                                in 2832 BC, centuries before the ancient Egyptians began building their pyramids. And that's just
                                                one fascinating fact about that well-known species of tree--the pine.
                                                Pine trees are native to most of the Northern Hemisphere. Several species have adapted to the harsh
                                                conditions of high elevations and latitudes, including Methuselah</td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td width="60"></td>
                                            <td>tree itself, growing among the peaks of White Mountains of Northern California. Pines can be small,
                                                such as the Siberian Dwarf Pine, or huge, such as the Ponderosa Pine in the wilds of Oregon, and
                                                there are over 100 varieties in all. They have been introduced into the more temperate portions of
                                                the Southern Hemisphere, where they are now grown widely, becoming a familiar feature in parks and
                                                gardens. It would not be too much of an</td>
                                        </tr>
                                        <tr>
                                            <td>15</td>
                                            <td width="60"></td>
                                            <td>exaggeration to say that almost everyone knows pines.
                                                These trees certainly have many telltale characteristics. They are evergreen, usually with
                                                needle-like foliage and a sharp pleasant "pine" smell. They are often large and imposing, with thick
                                                scaly bark, and always produce their signature pine cones. These formations are certainly not
                                                simple. They can be male (small, inconspicuous, and shedding</td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>20</td>
                                            <td width="60"></td>
                                            <td> pollen) or female (large, woody, and containing seeds), even when appearing on the same tree. They
                                                have numerous scales arranged in a spiral, with seeds (on the female) tucked within. As the cone
                                                opens, the seeds eventually fall out, mostly to be dispersed by the wind, or sometimes by birds. In
                                                some varieties, the cones remain closed until their binding resin is melted by forest fires.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>25</td>
                                            <td width="60"></td>
                                            <td> This last fact-the need for wildfires for regeneration-is another fascinating aspect of many pine
                                                species. In fire-prone areas, it can result in extensive stands of pines, a good example being in
                                                "pine barrens". These are eco-regions of sandy nutrient-poor soil dominated by pines, since the
                                                frequency of natural (usually lightning-induced) fires weeds out the less fire-tolerant species. It
                                                is perhaps sad that modem fire prevention methods have resulted in </td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>30</td>
                                            <td width="60"></td>
                                            <td>the decline of many pine species in the wild, and most ancient pine barrens are now being taken over
                                                by other forest vegetation.
                                                However, the situation is very different for home and commercial use, which has seen pines become a
                                                very common sight. As these trees grow fast, can be planted in dense arrays, and produce attractive
                                                and easily molded wood, they are favorites for commercial</td>
                                        </tr>
                                    </table>
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
                    subtes: 2

                },
                success: function(res) {
                    setInstructions(currentSoal);
                    $('#display-pertanyaan').html(res.soal);
                    $('#text-opsi-a').html(currentSoal >= 16 && currentSoal <= 40 ? res.opsi_a.charAt(0).toUpperCase() + res.opsi_a.slice(1) : res.opsi_a);
                    $('#text-opsi-b').html(currentSoal >= 16 && currentSoal <= 40 ? res.opsi_b.charAt(0).toUpperCase() + res.opsi_b.slice(1) : res.opsi_b);
                    $('#text-opsi-c').html(currentSoal >= 16 && currentSoal <= 40 ? res.opsi_c.charAt(0).toUpperCase() + res.opsi_c.slice(1) : res.opsi_c);
                    $('#text-opsi-d').html(currentSoal >= 16 && currentSoal <= 40 ? res.opsi_d.charAt(0).toUpperCase() + res.opsi_d.slice(1) : res.opsi_d);

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
            if (questionNumber >= 1 && questionNumber <= 15) {
                $('#instruction-title').html(`<i class="glyphicon glyphicon-info-sign" style="margin-right: 5px; padding-top: 10px;"></i> Directions Questions Number 1-15`);
                $('#instruction-body').html(`
                <p>Questions 1-15 are incomplete sentences. Beneath each sentence you will see four words or phrases, marked A, B, C, and D. Choose the one word or phrase that best completes the sentence. </p>
                
                `);
            } else if (questionNumber >= 16 && questionNumber <= 40) {
                $('#instruction-title').html(`<i class="glyphicon glyphicon-info-sign" style="margin-right: 5px; padding-top: 10px;"></i> Directions Questions Number 16-40`);
                $('#instruction-body').html(`
                <p>In questions 16-40 each sentence has four underlined words or phrases. The four underlined parts of the sentence are marked A, B, C, and D. Identify the one underlined word or phrase that must be changed in order for the sentence to be correct. Choose the one word or phrase that best completes the sentence.</p>
                
                `);
            } else if (questionNumber >= 41 && questionNumber <= 90) {
                $('#instruction-title').html(`<i class="glyphicon glyphicon-info-sign" style="margin-right: 5px; padding-top: 10px;"></i> Directions Questions Number 41-90`);
                $('#instruction-body').html(`
                <p>Read the provided passages carefully before answering the questions.</p>
                <ul style="margin-bottom: 0; padding-left: 20px; line-height: 1.6;">
                <li>Each text is followed by one or more questions regarding its content, vocabulary, or implied meaning.</li>
                <li>Evaluate all options carefully and select the best answer based strictly on the information stated or implied in the passage.</li>
                <li>Choose only one correct answer for each question from the provided options: A, B, C, or D.</li>
                </ul>
                `);
            } else if (questionNumber >= 71 && questionNumber <= 90) {
                $('#instruction-title').html(`<i class="glyphicon glyphicon-info-sign" style="margin-right: 5px; padding-top: 10px;"></i> Directions Questions Number 71-90`);
                $('#instruction-body').html(`
                <p>Pada no 71-90, pilih salah satu jawaban <strong>(A, B, C, D, atau E)</strong> yang menurut Anda paling tepat dari pilihan yang ada, di setiap kelompok soal memiliki instruksi berbeda</p>
                <ul style="margin-bottom: 0; padding-left: 20px; line-height: 1.6;">
                <li>Silahkan memilih jawaban yang paling sesuai untuk mengisi jawaban pilihan yang ada dibawah ini</li>
                </ul>
                `);
            } else {
                $('#instruction-title').html(`<i class="glyphicon glyphicon-info-sign" style="margin-right: 5px; padding-top: 10px;"></i> Directions Questions Number 91-110`);
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
                url: '<?php echo base_url("Pelamar/Daftar_ujian/Tpa_pascasarjana/save_answer"); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    id_ujian: id_ujian,
                    nomor_soal: currentSoal,
                    jawaban: jawaban_terpilih,
                    subtes: 2

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