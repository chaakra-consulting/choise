<?php $this->load->view('layout3/header2') ?>
<style>
    /* Typography */
    .question-number {
        font-size: 20px;
        color: #000000;
        font-weight: bold;
    }

    .question-text {
        font-size: 18px;
        color: #000000;
        font-weight: bold;
        letter-spacing: 1px;
    }

    /* Horizontal Options Styling */
    .options-container {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        gap: 15px;
        margin-top: 15px;
        margin-bottom: 30px;
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
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        padding: 8px 20px;
        text-align: center;
        transition: all 0.2s ease-in-out;
        background-color: #fff;
        display: flex;
        align-items: center;
        cursor: pointer;
        min-width: 80px;
        justify-content: center;
    }

    /* Hover and Selected States */
    .custom-radio-card:hover .card-content {
        border-color: #b0b0b0;
    }

    .custom-radio-card input[type="radio"]:checked+.card-content {
        border-color: #FBC02D;
        background-color: #FFFDE7;
        border-width: 3px;
        padding: 7px 19px;
        box-shadow: 0 4px 8px rgba(251, 192, 45, 0.2);
    }

    .choice-letter {
        font-weight: 600;
        color: #555;
        font-size: 16px;
    }

    .choice-text {
        font-size: 16px;
        font-weight: bold;
        margin-left: 5px;
        color: #333;
    }

    .custom-radio-card input[type="radio"]:checked+.card-content .choice-letter,
    .custom-radio-card input[type="radio"]:checked+.card-content .choice-text {
        color: #FBC02D;
    }

    /* Grid layout for question numbers (Exactly 7 columns) */
    .grid-container {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 8px;
        max-height: 500px;
        overflow-y: auto;
        padding-right: 5px;
    }

    .grid-item {
        width: 100%;
        aspect-ratio: 1 / 1;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-weight: bold;
        transition: 0.2s;
        font-size: 14px;
    }

    .grid-item:hover {
        opacity: 0.8;
    }

    .grid-item.selected {
        border: 2px solid #8ad919;
        background-color: #8ad919 !important;
        color: white !important;
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
        background-color: #e2e2e2;
        border-radius: 4px;
    }

    .skeleton-box::after {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        transform: translateX(-100%);
        background-image: linear-gradient(
            90deg,
            rgba(255, 255, 255, 0) 0,
            rgba(255, 255, 255, 0.2) 20%,
            rgba(255, 255, 255, 0.5) 60%,
            rgba(255, 255, 255, 0)
        );
        animation: shimmer 1.5s infinite;
        content: '';
    }

    /* Skeleton Sizes */
    .skel-q-line-1 { width: 100%; height: 18px; margin-bottom: 8px; }
    .skel-q-line-2 { width: 85%; height: 18px; margin-bottom: 8px; }
    .skel-q-line-3 { width: 60%; height: 18px; }
    .skel-choice { width: 60px; height: 16px; margin: 2px 0; }
</style>
<?php $this->load->view('layout3/navbar') ?>

<div class="col-sm-12 main">
    <div class="row" style="margin-bottom: 20px; z-index: 1;">
        <div class="col-lg-6">
            <h3 style="color: #666; margin-top: 20px;">Cepat Teliti</h3>
        </div>
        <div class="col-lg-6">
            <h4 style="margin-top: 25px; color: #666;" align="right">Waktu Ujian <span id="time" style="font-weight: bold;"></span> detik</h4>
        </div>
    </div>

    <?php
    $id_ujian =  $this->session->userdata('ses_cepat');
    $ujian = $this->db->query("SELECT * FROM tb_ujian_cepat WHERE id_ujian_cepat = $id_ujian");
    foreach ($ujian->result() as $key) {
        $end_lat = $key->end_uji;
    }
    ?>

    <div class="col-sm-12 box" style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); margin-top: 10px;">
        <div class="row">

            <div class="col-md-8 col-sm-12" style="border-right: 1px solid #eee; min-height: 400px;">
                <h3 class="question-number">Soal Nomor 1</h3>
                <hr style="margin-top: 10px; margin-bottom: 20px; border-top: 1px dashed #ccc;">

                <form id="form-ujian" method="post">
                    <div style="width: 100%; margin-bottom: 20px;">
                        <p class="question-text" id="display-pertanyaan">Memuat Soal...</p>
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
                    </div>

                    <input type="hidden" name="id_ujian" id="id_ujian" value="<?php echo $id_ujian; ?>">
                    <input type="hidden" name="nomor_soal" id="nomor_soal" value="1">

                    <div class="row" style="margin-top: 40px; margin-bottom: 20px;">
                        <div class="col-xs-6 text-left" style="text-align: left;">
                            <button type="button" class="btn btn-secondary" id="btn-prev" style="display:none; padding: 10px 20px;">&laquo; Sebelumnya</button>
                        </div>
                        <div class="col-xs-6 text-right" style="text-align: right;">
                            <button type="button" class="btn btn-primary" id="btn-next" style="padding: 10px 20px;">Selanjutnya &raquo;</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-4 col-sm-12" style="padding-left: 30px;">
                <h4 style="font-weight: bold; font-size: 16px; margin-bottom: 15px;">Daftar Soal</h4>
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

        // 1. Initialize: Load Grid first, then load Question 1
        loadGrid(function() {
            loadQuestion(1);
        });

        // 2. Load Sidebar Grid
        function loadGrid(callback = null) {
            $.ajax({
                url: '<?php echo base_url("Pelamar/Daftar_ujian/Cepat_teliti/get_grid"); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    id_ujian: id_ujian
                },
                success: function(res) {
                    totalSoal = parseInt(res.total);

                    let html = '';
                    for (let i = 1; i <= totalSoal; i++) {
                        let isAnswered = res.dijawab.includes(i.toString()) || res.dijawab.includes(i);
                        let bgClass = isAnswered ? '#68a80c' : '#f1f1f1';
                        let textClass = isAnswered ? '#fff' : '#333';

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
            $('.question-number').html('Soal Nomor ' + currentSoal);

            // --- SKELETON LOADING INJECTION START ---
            let skeletonSoal = `
                <div class="skeleton-box skel-q-line-1"></div>
                <div class="skeleton-box skel-q-line-2"></div>
                <div class="skeleton-box skel-q-line-3"></div>
            `;
            let skeletonOpsi = `<div class="skeleton-box skel-choice"></div>`;

            $('#display-pertanyaan').html(skeletonSoal);
            $('#text-opsi-a, #text-opsi-b, #text-opsi-c, #text-opsi-d').html(skeletonOpsi);
            // --- SKELETON LOADING INJECTION END ---

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
                $('#btn-next').removeClass('btn-primary').addClass('btn-success').html('Selesai');
            } else {
                // Otherwise, keep it as Next
                $('#btn-next').removeClass('btn-success').addClass('btn-primary').html('Selanjutnya &raquo;');
            }

            // Fetch Data via AJAX
            $.ajax({
                url: '<?php echo base_url("Pelamar/Daftar_ujian/Cepat_teliti/get_question"); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    id_ujian: id_ujian,
                    nomor_soal: currentSoal
                },
                success: function(res) {
                    // Overwrite the skeletons with real data
                    $('#display-pertanyaan').html(res.soal);
                    $('#text-opsi-a').html(res.opsi_a);
                    $('#text-opsi-b').html(res.opsi_b);
                    $('#text-opsi-c').html(res.opsi_c);
                    $('#text-opsi-d').html(res.opsi_d);

                    // Check the radio button if it was already answered
                    if (res.jawaban) {
                        $('input[name="jawaban"][value="' + res.jawaban + '"]').prop('checked', true);
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
                // Move to next question
                loadQuestion(currentSoal + 1);
            } else if (currentSoal === totalSoal) {
                // Trigger Finish Exam if it's the last question
                let konfirmasi = confirm("Apakah Anda yakin ingin menyelesaikan ujian ini?");
                if (konfirmasi) {
                    window.location.href = '<?php echo base_url("Pelamar/Pelamar/testulispsikotes/"); ?>';
                }
            }
        });

       
        $('input[name="jawaban"]').on('change', function() {
            let jawaban_terpilih = $(this).val();


            $.ajax({
                url: '<?php echo base_url("Pelamar/Daftar_ujian/Cepat_teliti/save_answer"); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    id_ujian: id_ujian,
                    nomor_soal: currentSoal,
                    jawaban: jawaban_terpilih
                },
                success: function(res) {
                    // Instantly turn the grid item green without reloading the whole grid
                    $('#grid-' + currentSoal).css({
                        'background-color': '#68a80c',
                        'color': '#fff'
                    });
                }
            });
        });

        
        var countDownDate = new Date("<?php echo $end_lat ?>").getTime();

        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;

            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("time").innerHTML = minutes + " : " + (seconds < 10 ? "0" : "") + seconds;

            if (distance < 0) {
                clearInterval(x);
                alert('Waktu Ujian Cepat Teliti Telah Berakhir, Semua Jawaban Telah Terekam');
                window.location.href = '<?php echo base_url("Pelamar/Pelamar/testulispsikotes/" . $id_ujian); ?>';
            }
        }, 1000);

    });
</script>