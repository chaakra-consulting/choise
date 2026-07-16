<?php $this->load->view('layout3/header2') ?>
<?php $this->load->view('layout3/navbar') ?>

<style>
    /* Custom Styling for Verbal Classification Question Cards */
    .question-card {
        background-color: #fff;
        border: 2px solid #f0f0f0;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
    }

    .question-number {
        font-weight: bold;
        font-size: 16px;
        margin-bottom: 15px;
        border-bottom: 2px solid #f0f0f0;
        padding-bottom: 10px;
        color: #333;
    }

    /* Selectable Card Style Layout */
    .option-card-group {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        justify-content: flex-start;
    }

    .option-card-label {
        margin: 0;
        cursor: pointer;
        flex: 1 1 calc(20% - 12px); /* Membagi rata untuk 5 opsi */
        min-width: 90px;
    }

    /* Menyembunyikan input radio asli */
    .option-card-label input[type="radio"] {
        display: none;
    }

    /* Desain default kartu opsi */
    .option-card {
        border: 2px solid #e2e8f0; /* Garis tepi abu-abu terang */
        border-radius: 10px;
        padding: 12px 5px;
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
    }

    /* Desain ketika kartu (radio) dipilih seperti pada image_ffc7d4.png */
    .option-card-label input[type="radio"]:checked + .option-card {
        border: 2px solid #FBC02D; 
        background-color: #fff;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    /* Teks huruf (a, b, c, d, e) */
    .option-letter {
        display: block;
        font-size: 13px;
        color: #64748b;
        margin-bottom: 8px;
        font-weight: 500;
    }

    /* Teks nilai kata/jawaban */
    .option-text {
        display: block;
        font-size: 16px;
        font-weight: bold;
        color: #1e293b;
        word-wrap: break-word;
    }

    /* Table & Instruction styles */
    .contoh-box {
        background-color: #fff;
        color: #000;
        border-radius: 6px;
        padding: 20px;
        margin-top: 15px;
        font-size: 14px;
        line-height: 1.6;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .contoh-title {
        font-weight: bold;
        border-bottom: 2px solid #eee;
        padding-bottom: 8px;
        margin-bottom: 12px;
        font-size: 15px;
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

    .example-list {
        list-style: none;
        padding-left: 0;
        margin-bottom: 15px;
    }

    .example-list li {
        margin-bottom: 8px;
    }

    .example-options span {
        display: inline-block;
        margin-right: 15px;
    }
    
    /* Responsive adjustment */
    @media (max-width: 768px) {
        .option-card-label {
            flex: 1 1 calc(33.333% - 12px);
        }
    }
    
    @media (max-width: 480px) {
        .option-card-label {
            flex: 1 1 calc(50% - 12px);
        }
    }
</style>

<div class="col-sm-12 main">
    <div class="row" style="margin-bottom: 15px; z-index: 1; display: flex; align-items: center;">
        <div class="col-md-8 col-sm-12">
            <h3 style="margin: 0;">Soal Latihan Sub Tes 9</h3>
        </div>
        <div class="col-xs-6 col-lg-6 text-right" style="text-align: right; margin-top: 10px;">
            <div class="timer-badge">
                Waktu: <span id="time" style="font-family: monospace; font-size: 18px;"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12" style="margin-bottom: 25px;">
            <div style="background-color: #f9243f; padding: 25px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                <h4 style="color: #fff; margin-top: 0; border-bottom: 1px solid rgba(255,255,255,0.3); padding-bottom: 10px;">
                    <b>Petunjuk Pengerjaan</b>
                </h4>

                <p style="color: #fff; text-align: justify; font-size: 15px; line-height: 1.6; margin-bottom: 20px;">
                    Setiap soal terdiri dari 5 kata <b>a, b, c, d</b> dan <b>e</b>. Diantara kelima kata tersebut terdapat satu kata yang <b>tidak termasuk</b> atau tidak menunjukkan suatu kesamaan dengan keempat kata lainnya. Carilah kata itu. Apabila sudah ditemukan, pilihlah (klik pada kotak jawaban) huruf yang menunjukkan kata yang dimaksud.
                    <br><br>Perhatikan sekarang contoh di bawah ini.
                </p>

                <div class="row">
                    <div class="col-md-12">
                        <div class="contoh-box">
                            <div class="contoh-title">Contoh Soal:</div>
                            <ul class="example-list">
                                <li>
                                    <b>1)</b>
                                    <div class="example-options">
                                        <span>a. duduk</span>
                                        <span>b. berbaring</span>
                                        <span>c. berdiri</span>
                                        <span><b>d. berjalan</b></span>
                                        <span>e. berlutut</span>
                                    </div>
                                </li>
                                <li>
                                    <b>2)</b>
                                    <div class="example-options">
                                        <span>a. meja</span>
                                        <span>b. kursi</span>
                                        <span><b>c. burung</b></span>
                                        <span>d. lemari</span>
                                        <span>e. tempat-tidur</span>
                                    </div>
                                </li>
                            </ul>
                            
                            <hr style="border-top: 1px dashed #ccc; margin: 15px 0;">
                            
                            <p style="margin-top: 5px; margin-bottom: 10px; text-align: justify;">
                                Pada <b>contoh 1</b>, kata-kata a, b, c dan e menunjukkan bahwa orang yang bersangkutan berada dalam keadaan diam atau tidak bergerak, sedangkan kata d menunjukkan keadaan bergerak. Jadi kata d itulah yang tidak termasuk ke dalam keempat kata lainnya. Oleh karena itu, pada lembar jawaban di belakang contoh 1, <b>huruf d</b> telah dilingkari (dipilih).
                            </p>
                            <p style="margin-bottom: 0; text-align: justify;">
                                Pada <b>contoh 2</b>, kata-kata a, b, d dan e adalah perabot rumah tangga, sedangkan kata c bukan perabot rumah tangga. Oleh karena itu, pada lembar jawaban di belakang contoh 2, <b>huruf c</b> telah dilingkari (dipilih).
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div style="background-color: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); margin-bottom: 30px;">
                <h4 style="margin-top: 0; color: #333; border-bottom: 2px solid #f0f0f0; padding-bottom: 10px;">
                    <b>Soal Latihan</b>
                </h4>

                <p style="font-size: 14px; color: #555; text-align: justify; margin-bottom: 20px;">
                    Dibawah ini terdapat contoh-contoh sebagai latihan. Kerjakan sendiri menurut cara yang sama dengan memilih (klik kartu) pada salah satu jawaban yang paling tepat!
                </p>

                <?php
                $id_pelamar = $this->session->userdata('ses_id');
                // Pastikan Anda memodifikasi query ini menyesuaikan ID dan Tabel ujian yang baru jika diperlukan
                $ujian = $this->db->query("SELECT * FROM tb_ujian_tiki_d WHERE id_ujian = 1");
                $end_lat_sub9 = ""; // fallback
                foreach ($ujian->result() as $key) {
                    $end_lat_sub9 = $key->end_lat_sub9; 
                }

                // Array Soal Latihan (Sesuai Gambar)
                $soal_latihan = [
                    3 => [
                        'a' => 'gigi',
                        'b' => 'kumis',
                        'c' => 'bulu mata',
                        'd' => 'alis',
                        'e' => 'rambut'
                    ],
                    4 => [
                        'a' => 'panjang',
                        'b' => 'berat',
                        'c' => 'badan',
                        'd' => 'tinggi',
                        'e' => 'besar'
                    ]
                ];
                ?>

                <!-- Pastikan action URL sesuai dengan controller baru untuk format soal ini -->
                <form method="post" action="<?php echo base_url('Pelamar/Daftar_ujian/Tiki_d/latihan9_answer') ?>">

                    <div class="row">
                        <?php foreach ($soal_latihan as $nomor => $opsi): ?>
                            <div class="col-md-6 col-sm-12">
                                <div class="question-card">
                                    <div class="question-number">Soal <?php echo $nomor; ?>)</div>
                                    
                                    <!-- Implementasi Selectable Cards Group -->
                                    <div class="option-card-group">
                                        <?php foreach ($opsi as $huruf => $teks): ?>
                                            <label class="option-card-label">
                                                <input type="radio" name="jawaban_latihan<?php echo $nomor; ?>" value="<?php echo $huruf; ?>" required>
                                                <div class="option-card">
                                                    <span class="option-letter"><?php echo $huruf; ?></span>
                                                    <span class="option-text"><?php echo $teks; ?></span>
                                                </div>
                                            </label>
                                        <?php endforeach; ?>
                                    </div>
                                    
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- <div class="alert alert-info" style="margin-top: 10px; border-radius: 6px;">
                        <i class="fa fa-info-circle"></i> <b>Catatan Latihan:</b> Jawaban yang benar dari contoh 3 adalah <b>a</b>, dan dari contoh 4 adalah <b>c</b>. Silakan pilih kartu jawaban tersebut untuk melanjutkan.
                    </div> -->

                    <hr style="border-top: 1px solid #eee; margin: 10px 0 20px 0;">

                    <div class="row">
                        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12">
                            <button type="submit" class="btn btn-primary btn-lg"
                                style="padding: 12px 40px; border-radius: 50px; width: 100%; font-weight: bold; font-size: 15px; box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);">
                                Selanjutnya <i class="fa fa-arrow-right" style="margin-left: 8px;"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var endLatSub9 = "<?php echo !empty($end_lat_sub9) ? $end_lat_sub9 : date('Y-m-d H:i:s', strtotime('+5 minutes')); ?>";
    var countDownDate = new Date(endLatSub9).getTime();

    var x = setInterval(function () {
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
            alert('Waktu latihan sudah berakhir, selamat mengerjakan subtes sesungguhnya.');
            // Sesuaikan link ini dengan controller Anda
            window.location.href = '<?php echo base_url('Pelamar/Daftar_ujian/Tiki_d/latihan9_answer'); ?>';
        }
    }, 1000);
</script>

<?php $this->load->view('layout3/footer') ?>