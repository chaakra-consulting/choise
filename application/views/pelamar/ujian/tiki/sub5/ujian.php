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
        border: 1px solid rgba(0,0,0,0.02);
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

    .options-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 15px;
        margin-bottom: 25px;
    }
    
    .custom-radio-card {
        display: block;
        cursor: pointer;
        margin: 0;
        /* Responsive 6 columns for A, B, C, D, E, F */
        flex: 1 1 calc(16.666% - 10px); 
        min-width: 60px; /* Slightly wider to accommodate images */
    }
    
    /* Hide the default checkbox */
    .custom-radio-card input[type="checkbox"] {
        display: none; 
    }
    
    /* Base styling for the card */
    .custom-radio-card .card-content {
        border: 3px solid #e0e0e0;
        border-radius: 10px;
        padding: 10px;
        text-align: center;
        transition: all 0.2s ease-in-out;
        background-color: #fff;
        display: flex;
        flex-direction: column; /* Stack letter on top, image on bottom */
        align-items: center;
        justify-content: center;
        height: 100%;
        overflow: hidden; /* Contains the scaled image inside rounded corners */
    }
    
    /* Hover effect */
    .custom-radio-card:hover .card-content {
        border-color: #b0b0b0;
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        transform: translateY(-2px);
    }
    
    /* Selected/Checked state */
    .custom-radio-card input[type="checkbox"]:checked + .card-content {
        border-color: #FBC02D;
        background-color: #FFFDE7;
        color:white;
        box-shadow: 0 4px 12px rgba(251, 192, 45, 0.2);
    }
    
    /* Choice letter (A, B, C, D, E, F) */
    .custom-radio-card .choice-letter {
        font-weight: 700;
        color: #555;
        font-size: 16px;
        text-transform: uppercase;
        margin-bottom: 8px;
        background: #f1f1f1;
        width: 24px;
        height: 24px;
        line-height: 24px;
        border-radius: 50%;
        display: inline-block;
        transition: 0.2s;
    }
    
    /* Change text/bg color when selected */
    .custom-radio-card input[type="checkbox"]:checked + .card-content .choice-letter {
        color: white;
        background-color: #FBC02D;
    }

    /* Option Image Styling */
    .option-image {
        max-width: 100%;
        height: 55px; /* Restrict height so the grid stays uniform */
        object-fit: contain; /* Prevents image stretching */
        /* Makes the white background of the scanned image transparent */
        mix-blend-mode: multiply; 
        /* CROPS 5px off every side to hide the black scanner borders */
        clip-path: inset(5px); 
        /* Scales it slightly back up to compensate for the crop */
        transform: scale(1.15); 
    }

    /* Image wrapper for questions */
    .question-image-wrapper {
        background: #f8f9fa;
        border: 1px solid #eee;
        border-radius: 8px;
        padding: 10px;
        margin-bottom: 15px;
        text-align: center;
    }
    
    .question-image-wrapper img {
        max-width: 100%;
        height: auto;
        border-radius: 4px;
        mix-blend-mode: multiply; /* Blends the question image nicely too */
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
        0% { background-position: -468px 0; }
        100% { background-position: 468px 0; }
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
        top: 0; right: 0; bottom: 0; left: 0;
        transform: translateX(-100%);
        background-image: linear-gradient(90deg,
                rgba(255, 255, 255, 0) 0,
                rgba(255, 255, 255, 0.4) 20%,
                rgba(255, 255, 255, 0.8) 60%,
                rgba(255, 255, 255, 0));
        animation: shimmer 1.5s infinite;
        content: '';
    }

    .skel-q-line-1 { width: 100px; height: 100px; margin-bottom: 12px; }
    .skel-choice { width: 70px; height: 18px; margin: 2px 0; }
</style>

<?php $this->load->view('layout3/navbar') ?>

<div class="col-sm-12 main">
    <div class="row" style="margin-bottom: 10px; z-index: 1; display: flex; align-items: center;">
        <div class="col-xs-6 col-lg-6">
            <h3 class="exam-header-title">TIKI Sub 5</h3>
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
        $end = $key->end_uji_sub5;
    }
    ?>

    <div class="col-sm-12 modern-card">
        <div class="row">

            <div class="col-md-8 col-sm-12 left-panel">
                <h3 class="question-number">Soal Nomor <span id="display-number">1</span></h3>
                <hr style="margin-top: 15px; margin-bottom: 25px; border-top: 2px solid #F1F5F9;">

                <form id="form-ujian" method="post">
                    <div style="width: 100%;">
                        <div class="question-text" id="display-pertanyaan">Memuat Soal...</div>
                    </div>
                    
                    <div class="options-container">
                        <label class="custom-radio-card">
                            <input type="checkbox" name="jawaban[]" value="A">
                            <div class="card-content">
                                <span class="choice-letter">a</span>
                                <img id="opsi-a"  alt="Opsi A" class="option-image">
                            </div>
                        </label>
                        <label class="custom-radio-card">
                            <input type="checkbox" name="jawaban[]" value="B">
                            <div class="card-content">
                                <span class="choice-letter">b</span>
                                <img id="opsi-b"  alt="Opsi B" class="option-image">
                            </div>
                        </label>
                        <label class="custom-radio-card">
                            <input type="checkbox" name="jawaban[]" value="C">
                            <div class="card-content">
                                <span class="choice-letter">c</span>
                                <img id="opsi-c"  alt="Opsi C" class="option-image">
                            </div>
                        </label>
                        <label class="custom-radio-card">
                            <input type="checkbox" name="jawaban[]" value="D">
                            <div class="card-content">
                                <span class="choice-letter">d</span>
                                <img id="opsi-d" alt="Opsi D" class="option-image">
                            </div>
                        </label>
                        <label class="custom-radio-card">
                            <input type="checkbox" name="jawaban[]" value="E">
                            <div class="card-content">
                                <span class="choice-letter">e</span>
                                <img id="opsi-e"  alt="Opsi E" class="option-image">
                            </div>
                        </label>
                        <label class="custom-radio-card">
                            <input type="checkbox" name="jawaban[]" value="F">
                            <div class="card-content">
                                <span class="choice-letter">f</span>
                                <img id="opsi-f"  alt="Opsi F" class="option-image">
                            </div>
                        </label>
                    </div>

                    <input type="hidden" name="id_ujian" id="id_ujian" value="1">
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
                url: '<?php echo base_url("Pelamar/Daftar_ujian/Tiki_d/get_grid"); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    id_ujian: id_ujian,
                    subtes: 5
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
            $('#display-number').text(currentSoal);
           $("#question-grid .selected").removeClass('selected');
            $("#question-grid #grid-" + currentSoal).addClass('selected');

            // Reset checkboxes instead of radio buttons
            $('input[name="jawaban[]"]').prop('checked', false);

             // --- SKELETON LOADING ---
            let skeletonSoal = `
                <div class="skeleton-box skel-q-line-1"></div>
            `;
            let skeletonOpsi = `<div class="skeleton-box skel-choice"></div>`;

            $('#display-pertanyaan').html(skeletonSoal);
            $('#opsi-a, #opsi-b, #opsi-c, #opsi-d,#opsi-e,#opsi-f').html(skeletonOpsi);
            // --- SKELETON LOADING ---

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

            $.ajax({
                url: '<?php echo base_url("Pelamar/Daftar_ujian/Tiki_d/get_question"); ?>',
                type: 'POST',
                dataType: 'json',
                data: { id_ujian: id_ujian, nomor_soal: currentSoal, subtes: 5 },
                success: function(res) {
                    $('#display-pertanyaan').html(res.soal ? `<img src="<?=  base_url('upload/bank_soal/tiki_d/subtes5/'); ?>soal-${currentSoal}/soal.png" style="max-width:100%">` : res.soal);

                    $('#opsi-a').attr('src', res.opsi_a ? `<?=  base_url('upload/bank_soal/tiki_d/subtes5/'); ?>soal-${currentSoal}/a.png` : '');
                    $('#opsi-b').attr('src', res.opsi_b ? `<?=  base_url('upload/bank_soal/tiki_d/subtes5/'); ?>soal-${currentSoal}/b.png` : '');
                    $('#opsi-c').attr('src', res.opsi_c ? `<?=  base_url('upload/bank_soal/tiki_d/subtes5/'); ?>soal-${currentSoal}/c.png` : '');
                    $('#opsi-d').attr('src', res.opsi_d ? `<?=  base_url('upload/bank_soal/tiki_d/subtes5/'); ?>soal-${currentSoal}/d.png` : '');
                    $('#opsi-e').attr('src', res.opsi_e ? `<?=  base_url('upload/bank_soal/tiki_d/subtes5/'); ?>soal-${currentSoal}/e.png` : '');
                    $('#opsi-f').attr('src', res.opsi_f ? `<?=  base_url('upload/bank_soal/tiki_d/subtes5/'); ?>soal-${currentSoal}/f.png` : '');

                    // Re-check previously saved answers
                    if (res.jawaban) {
                        let saved = res.jawaban.split(',');
                        saved.forEach(ans => {
                            $(`input[value="${ans.trim().toUpperCase()}"]`).prop('checked', true);
                        });
                    }
                    if (res.jawaban2) {
                        let saved = res.jawaban2.split(',');
                        saved.forEach(ans => {
                            $(`input[value="${ans.trim().toUpperCase()}"]`).prop('checked', true);
                        });
                    }
                }
            });
        };

        // AUTO-UPDATE & LIMITER: Automatically allows only 2 choices
        $(document).on('change', 'input[name="jawaban[]"]', function() {
            let groupName = $(this).attr('name');
            let $checkedBoxes = $('input[name="' + groupName + '"]:checked');
            
            // If they just checked a 3rd box...
            if ($checkedBoxes.length > 2) {
                // Find the ones that are NOT the current one being clicked
                // and uncheck the very first one in the list.
                $checkedBoxes.not(this).first().prop('checked', false);
            }

            // Save automatically to DB
            let selected = [];
            $('input[name="jawaban[]"]:checked').each(function() {
                selected.push($(this).val());
            });
            console.log("Selected answers for question " + currentSoal + ": " + selected[0] + ", " + selected[1]);

            $.ajax({
                url: '<?php echo base_url("Pelamar/Daftar_ujian/Tiki_d/save_answer"); ?>',
                type: 'POST',
                data: {
                    id_ujian: id_ujian,
                    nomor_soal: currentSoal,
                    jawaban: selected[0],
                    jawaban2: selected[1] ?? '',
                    subtes: 5
                },
                success: function() {
                    $('#grid-' + currentSoal).css('background-color', selected.length > 0 ? 'var(--success-color)' : '#F1F5F9');
                }
            });
        });

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
                    window.location.href = '<?php echo base_url("Pelamar/Daftar_ujian/Tiki_d/latihan7"); ?>';
                }
            }
        });


        // $('input[name="jawaban"]').on('change', function() {
        //     let jawaban_terpilih = $(this).val();
        //     let $checkedBoxes = $('input[name="jawaban"]:checked');

        //     if ($checkedBoxes.length > 2) {
        //         // Find the ones that are NOT the current one being clicked
        //         // and uncheck the very first one in the list.
        //         $checkedBoxes.not(this).first().prop('checked', false);
        //     }
        //     console.log("Selected answer for question " + currentSoal + ": " + jawaban_terpilih);

        //     // $.ajax({
        //     //     url: '<?php echo base_url("Pelamar/Daftar_ujian/Tiki_d/save_answer"); ?>',
        //     //     type: 'POST',
        //     //     dataType: 'json',
        //     //     data: {
        //     //         id_ujian: id_ujian,
        //     //         nomor_soal: currentSoal,
        //     //         jawaban: jawaban_terpilih,
        //     //         subtes: 5
        //     //     },
        //     //     success: function(res) {
        //     //         // Instantly turn the grid item green without reloading the whole grid
        //     //         // Updated to modern Emerald green to match CSS
        //     //         $('#grid-' + currentSoal).css({
        //     //             'background-color': 'var(--success-color)',
        //     //             'color': '#ffffff'
        //     //         });
        //     //     }
        //     // });
        // });


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
                window.location.href = '<?php echo base_url('Pelamar/Daftar_ujian/Tiki_d/latihan7'); ?>';
            }
        }, 1000);

    });
</script>