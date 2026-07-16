<?php $this->load->view('layout3/header2') ?>
<?php $this->load->view('layout3/navbar') ?>

<style>
    /* Custom Styling for Radio Cards (Text/Number Edition) */
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
        flex: 1 1 calc(20% - 10px);
        /* Responsive 5 columns */
        min-width: 55px;
    }

    /* Hide the default radio button */
    .custom-radio-card input[type="checkbox"] {
        display: none;
    }

    /* Base styling for the card */
    .custom-radio-card .card-content {
        border: 3px solid #e0e0e0;
        border-radius: 10px;
        padding: 12px 10px;
        text-align: center;
        background-color: #f9f9f9; /* Slightly darker for disabled look */
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        opacity: 0.6; /* Fade out wrong answers */
    }

    /* Hover effect */
    .custom-radio-card:hover .card-content {
        border-color: #b0b0b0;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
    }

    /* Selected/Checked state */
    .custom-radio-card input[type="checkbox"]:checked+.card-content {
        border-color: #FBC02D;
        background-color: #FFFDE7;
        box-shadow: 0 4px 12px rgba(251, 192, 45, 0.2);
    }

    /* Choice letter (a, b, c, d, e) */
    .custom-radio-card .choice-letter {
        font-weight: 600;
        color: #888;
        font-size: 14px;
        text-transform: lowercase;
        margin-bottom: 5px;
    }

    /* Text Option (The Number) */
    .custom-radio-card .option-text {
        font-weight: bold;
        font-size: 14px;
        color: #333;
    }

    /* Change text color when selected */
    .custom-radio-card input[type="checkbox"]:checked+.card-content .choice-letter,
    .custom-radio-card input[type="checkbox"]:checked+.card-content .option-text {
        color: #FBC02D;
    }

    /* Make table in instructions seamless */
    .contoh-table td,
    .contoh-table th {
        border: none !important;
        color: black !important;
        padding: 8px 5px !important;
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
</style>

<div class="col-sm-12 main">
    <div class="row" style="margin-bottom: 10px; z-index: 1; display: flex; align-items: center;">
        <div class="col-md-8 col-sm-12">
            <h3>Soal Latihan Sub Tes 4</h3>
        </div>
        <div class="col-xs-6 col-lg-6 text-right" style="text-align: right; margin-top: 20px;">
            <div class="timer-badge">
                Waktu: <span id="time" style="font-family: monospace; font-size: 18px;"></span>
            </div>
        </div>
    </div>
    <?php
    $id_pelamar = $this->session->userdata('ses_id');
    $ujian = $this->db->query("SELECT * FROM tb_ujian_tiki_d WHERE id_ujian = 1");
    $end_lat_sub4 = ""; // fallback
    foreach ($ujian->result() as $key) {
        $end_lat_sub4 = $key->end_lat_sub4;
    }
    ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-sm-12">
            <div style="background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">

                <div class="text-center" style="margin-bottom: 30px;">
                    <h3 style="color: #FBC02D; font-weight: bold; margin-top: 0;">
                        <span class="glyphicon glyphicon-ok-circle"></span> Jawaban Benar
                    </h3>
                    <p style="font-size: 15px; color: #555;">
                        Cocokkan jawaban Anda dengan kunci jawaban di bawah ini. Jika Anda sudah mengerti pola pengerjaannya, Anda siap untuk memulai tes yang sesungguhnya.
                    </p>
                </div>

                <div class="form-group" style="background-color: #fafafa; padding: 20px; border-radius: 8px; border: 1px solid #eee;">
                    <div class="options-container">
                        <label class="custom-radio-card">
                            <input type="checkbox" name="jawaban_latihan1[]" readonly disabled value="a">
                            <div class="card-content">
                                <span class="choice-letter">a</span>
                                <span class="option-text">Lembut</span>
                            </div>
                        </label>
                        <label class="custom-radio-card">
                            <input type="checkbox" name="jawaban_latihan1[]" readonly disabled value="b">
                            <div class="card-content">
                                <span class="choice-letter">b</span>
                                <span class="option-text">Betul</span>
                            </div>
                        </label>
                        <label class="custom-radio-card">
                            <input type="checkbox" name="jawaban_latihan1[]" readonly disabled value="c">
                            <div class="card-content">
                                <span class="choice-letter">c</span>
                                <span class="option-text">Salah</span>
                            </div>
                        </label>
                        <label class="custom-radio-card">
                            <input type="checkbox" name="jawaban_latihan1[]" readonly disabled value="d">
                            <div class="card-content">
                                <span class="choice-letter">d</span>
                                <span class="option-text">Sama</span>
                            </div>
                        </label>

                    </div>
                </div>

                <div class="form-group" style="background-color: #fafafa; padding: 20px; border-radius: 8px; border: 1px solid #eee; margin-bottom: 30px;">
                    <div class="options-container">
                        <label class="custom-radio-card">
                            <input type="checkbox" name="jawaban_latihan2[]" readonly disabled value="a">
                            <div class="card-content">
                                <span class="choice-letter">a</span>
                                <span class="option-text">Membuka</span>
                            </div>
                        </label>
                        <label class="custom-radio-card">
                            <input type="checkbox" name="jawaban_latihan2[]" readonly disabled value="b">
                            <div class="card-content">
                                <span class="choice-letter">b</span>
                                <span class="option-text">Menyongsong</span>
                            </div>
                        </label>
                        <label class="custom-radio-card">
                            <input type="checkbox" name="jawaban_latihan2[]" readonly disabled value="c">
                            <div class="card-content">
                                <span class="choice-letter">c</span>
                                <span class="option-text">Menoleh</span>
                            </div>
                        </label>
                        <label class="custom-radio-card">
                            <input type="checkbox" name="jawaban_latihan2[]" readonly disabled value="d">
                            <div class="card-content">
                                <span class="choice-letter">d</span>
                                <span class="option-text">Menutup</span>
                            </div>
                        </label>

                    </div>
                </div>

                <div class="text-center">
                    <p style="color: #FBC02D; font-weight: bold; margin-bottom: 15px;">
                        <span class="glyphicon glyphicon-warning-sign"></span> Nilai tes sebenarnya akan dihitung. Kerjakan secepat dan seteliti mungkin!
                    </p>
                    <a href="<?php echo base_url('Pelamar/Daftar_ujian/Tiki_d/ujian4'); ?>" class="btn btn-primary btn-lg" style="padding: 12px 50px; border-radius: 25px; font-size: 16px; font-weight: bold; box-shadow: 0 4px 6px rgba(76, 175, 80, 0.3);">
                        Mulai Tes
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
<?php $this->load->view('layout3/footer') ?>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('change', 'input[name="jawaban_latihan1[]"]', function() {
            let groupName = $(this).attr('name');
            let $checkedBoxes = $('input[name="' + groupName + '"]:checked');

            // If they just checked a 3rd box...
            if ($checkedBoxes.length > 2) {
                // Find the ones that are NOT the current one being clicked
                // and uncheck the very first one in the list.
                $checkedBoxes.not(this).first().prop('checked', false);
            }

        });
        $(document).on('change', 'input[name="jawaban_latihan2[]"]', function() {
            let groupName = $(this).attr('name');
            let $checkedBoxes = $('input[name="' + groupName + '"]:checked');

            // If they just checked a 3rd box...
            if ($checkedBoxes.length > 2) {
                // Find the ones that are NOT the current one being clicked
                // and uncheck the very first one in the list.
                $checkedBoxes.not(this).first().prop('checked', false);
            }

        });
    });
    var endLatSub4 = "<?php echo !empty($end_lat_sub4) ? $end_lat_sub4 : date('Y-m-d H:i:s', strtotime('+5 minutes')); ?>";
    var countDownDate = new Date(endLatSub4).getTime();

    var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate - now;

        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Formatting to add leading zero if needed
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        document.getElementById("time").innerHTML = minutes + " : " + seconds;

        if (distance < 0) {
            clearInterval(x);
            alert('Waktu latihan sudah berakhir, selamat mengerjakan subtes.');
            // Sesuaikan link ini dengan controller Anda
            window.location.href = '<?php echo base_url('Pelamar/Daftar_ujian/Tiki_d/latihan4_answer'); ?>';
        }
    }, 1000);
</script>