<?php $this->load->view('layout3/header2') ?>
<?php $this->load->view('layout3/navbar') ?>

<style>
    /* Custom Grid untuk 8 Kolom Sejajar dalam 1 Baris */
    .grid-8-container {
        display: flex;
        flex-wrap: nowrap;
        /* Memaksa 8 item tetap berada dalam 1 baris */
        gap: 8px;
        margin-bottom: 25px;
        overflow-x: auto;
        /* Mencegah terpotong jika layar monitor lebih kecil dari standar */
        padding-bottom: 5px;
    }

    .grid-8-item {
        flex: 1 1 calc(12.5% - 8px);
        /* Membagi lebar tepat menjadi 8 kolom */
        min-width: 110px;
        /* Lebar minimum agar input dan teks tetap terbaca jelas */
    }

    /* Custom Styling for Pattern Question Cards & Input (Versi Kompak) */
    .pattern-card {
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        background-color: #fff;
        padding: 8px;
        text-align: center;
        transition: all 0.2s ease-in-out;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .pattern-card:hover {
        border-color: #007bff;
        box-shadow: 0 4px 10px rgba(0, 123, 255, 0.15);
    }

    .pattern-header {
        font-weight: bold;
        font-size: 13px;
        color: #333;
        background-color: #f8f9fa;
        padding: 5px 2px;
        border-radius: 4px;
        margin-bottom: 8px;
        border: 1px solid #ebebeb;
        white-space: nowrap;
    }

    /* Area tempat gambar soal A-H dibuat lebih ringkas */
    .pattern-img-box {
        min-height: 80px;
        background-color: #fafafa;
        border: 1px dashed #ccc;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 5px;
        margin-bottom: 8px;
        overflow: hidden;
    }

    .pattern-img-box img {
        max-width: 100%;
        max-height: 75px;
        height: auto;
        display: block;
        margin: 0 auto;
    }

    .img-placeholder {
        color: #999;
        font-size: 10px;
        font-style: italic;
        line-height: 1.2;
    }

    /* Styling untuk Input Angka / Teks di bawah gambar */
    .pattern-input-group label {
        font-size: 11px;
        color: #555;
        margin-bottom: 4px;
        display: block;
        font-weight: 600;
        white-space: nowrap;
    }

    .pattern-input {
        text-align: center;
        font-size: 16px !important;
        font-weight: bold;
        color: #333;
        height: 38px !important;
        padding: 4px !important;
        border: 2px solid #ccc !important;
        border-radius: 6px !important;
        transition: border-color 0.2s;
    }

    .pattern-input:focus {
        border-color: #007bff !important;
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

    /* Table & Instruction styles */
    .contoh-box {
        background-color: #fff;
        color: #000;
        border-radius: 6px;
        padding: 15px;
        margin-top: 15px;
        font-size: 13px;
    }

    .contoh-title {
        font-weight: bold;
        border-bottom: 2px solid #eee;
        padding-bottom: 5px;
        margin-bottom: 10px;
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
    <div class="row" style="margin-bottom: 15px; z-index: 1; display: flex; align-items: center;">
        <div class="col-md-8 col-sm-12">
            <h3 style="margin: 0;">Soal Latihan Sub Tes 8</h3>
        </div>
        <div class="col-xs-6 col-lg-6 text-right" style="text-align: right; margin-top: 10px;">
            <div class="timer-badge">
                Waktu: <span id="time" style="font-family: monospace; font-size: 18px;"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12" style="margin-bottom: 25px;">
            <div
                style="background-color: #f9243f; padding: 25px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                <h4
                    style="color: #fff; margin-top: 0; border-bottom: 1px solid rgba(255,255,255,0.3); padding-bottom: 10px;">
                    <b>Petunjuk Pengerjaan</b>
                </h4>

                <p style="color: #fff; text-align: justify; font-size: 14px; line-height: 1.6;">
                    Di bawah ini terdapat gambar <b>5 pola yang ditentukan</b>, yang bernomor <b>1 sampai dengan 5</b>.
                    Di bawahnya terdapat pula baris gambar pola yang sama dalam kotak-kotak <b>a, b, c, d, e, f, g,</b>
                    dan <b>h</b> dengan susunan urutan yang tidak teratur.<br>
                    Tugas Anda adalah mencari nomor masing-masing pola dalam kotak-kotak tersebut dan mengetikkan nomor
                    pola yang bersangkutan (1 sampai 5) ke dalam kolom jawaban.
                </p>

                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="contoh-box" style="height: calc(100% - 15px);">
                            <div class="contoh-title">Contoh 1 (Pola Lengkap / Utuh):</div>
                            <p style="margin-top: 5px; margin-bottom: 0;">
                                Pada kotak <b>a</b> sampai <b>c</b> telah diisi dengan nomor pola yang bersangkutan,
                                yaitu: <b>a = 4 ; b = 1 ; c = 5</b>.<br><br>
                                Jika dilanjutkan dengan kotak-kotak berikutnya, maka jawaban yang benar adalah: <b>d = 3
                                    ; e = 2 ; f = 5 ; g = 4 ; h = 2</b>.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="contoh-box" style="height: calc(100% - 15px);">
                            <div class="contoh-title">Contoh 2 & 3 (Pola Tidak Lengkap / Bagian):</div>
                            <p style="margin-top: 5px; margin-bottom: 0;">
                                Selain pola lengkap, terdapat pula baris kotak yang berisi potongan dari salah satu pola
                                yang ditentukan.<br><br>
                                <b>Jawaban yang benar pada Contoh 3 adalah:</b><br>
                                <b>a = 1 ; b = 2 ; c = 3 ; d = 1 ; e = 1 ; f = 4 ; g = 1 ; h = 5</b>.<br><br>
                                <i>Setelah Anda mengerti apa yang harus dilakukan, bekerja secepat-cepatnya dan seteliti
                                    mungkin!</i>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div
                style="background-color: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); margin-bottom: 30px;">
                <h4 style="margin-top: 0; color: #333; border-bottom: 2px solid #f0f0f0; padding-bottom: 10px;">
                    <b>Soal Latihan (Kotak a - h)</b>
                </h4>

                <p style="font-size: 13px; color: #555; text-align: justify; margin-bottom: 15px;">
                    Perhatikan <b>5 Gambar Pola Utama</b> di bawah ini sebagai acuan. Kemudian, perhatikan gambar di
                    dalam setiap kotak <b>(a sampai h)</b> dan ketik angka jawaban Anda <b>(1 - 5)</b> pada kolom input
                    di bawah masing-masing gambar!
                </p>

                <div
                    style="background-color: #f8f9fa; border: 2px dashed #999; padding: 15px; text-align: center; border-radius: 8px; margin-bottom: 25px;">
                    <span
                        style="color: #333; font-weight: bold; font-size: 13px; display: block; margin-bottom: 8px;">ACUAN
                        5 POLA UTAMA (1 - 5)</span>
                    <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes8/contoh/pola.png'); ?>"
                        alt="Acuan Pola Utama"
                        style="max-width: 100%; height: auto; border-radius: 6px; box-shadow: 0 2px 6px rgba(0,0,0,0.05);">
                </div>

                <?php
                $id_pelamar = $this->session->userdata('ses_id');
                $ujian = $this->db->query("SELECT * FROM tb_ujian_tiki_d WHERE id_ujian = 1");
                $end_lat_sub8 = ""; // fallback
                foreach ($ujian->result() as $key) {
                    $end_lat_sub8 = $key->end_lat_sub8;
                }

                // Array huruf kotak dari a sampai h
                $huruf_kotak = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];
                ?>

                <form method="post" action="<?php echo base_url('Pelamar/Daftar_ujian/Tiki_d/latihan8_answer') ?>">

                    <div class="grid-8-container">
                        <?php foreach ($huruf_kotak as $index => $huruf): ?>
                            <?php $nomor_soal = $index + 1; ?>

                            <div class="grid-8-item">
                                <div class="pattern-card">
                                    <div class="pattern-header">Kotak <?php echo strtoupper($huruf); ?></div>

                                    <div class="pattern-img-box">
                                        <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes8/contoh/contoh-1/'.$huruf.'.png'); ?>"
                                            alt="Acuan Pola Utama"
                                            style="max-width: 100%; height: auto; border-radius: 6px; box-shadow: 0 2px 6px rgba(0,0,0,0.05);">

                                    </div>

                                    <div class="pattern-input-group">
                                        <label for="input_<?php echo $nomor_soal; ?>">Pola (1-5):</label>
                                        <input type="number" min="1" max="5" id="input_<?php echo $nomor_soal; ?>"
                                            name="jawaban_latihan<?php echo $nomor_soal; ?>"
                                            class="form-control pattern-input" placeholder="-" required autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

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
    var endLatSub1 = "<?php echo !empty($end_lat_sub8) ? $end_lat_sub8 : date('Y-m-d H:i:s', strtotime('+5 minutes')); ?>";
    var countDownDate = new Date(endLatSub1).getTime();

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
            alert('Waktu latihan sudah berakhir, selamat mengerjakan subtes.');
            // Sesuaikan link ini dengan controller Anda
            window.location.href = '<?php echo base_url('Pelamar/Daftar_ujian/Tiki_d/latihan1_answer'); ?>';
        }
    }, 1000);

    // Validasi agar pelamar hanya bisa menginput angka 1 sampai 5
    document.querySelectorAll('.pattern-input').forEach(function (input) {
        input.addEventListener('input', function (e) {
            var val = parseInt(this.value);
            if (val < 1 || val > 5) {
                this.value = ''; // Kosongkan jika mengetik di luar angka 1-5
            }
        });
    });
</script>

<?php $this->load->view('layout3/footer') ?>