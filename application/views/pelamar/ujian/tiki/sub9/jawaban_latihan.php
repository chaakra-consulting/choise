<?php $this->load->view('layout3/header2') ?>
<?php $this->load->view('layout3/navbar') ?>

<style>
    /* Custom Styling for Answer Page */
    .answer-card {
        background-color: #fff;
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
    }

    .answer-card.correct {
        border-left: 6px solid #10B981;
        /* Green border for correct */
    }

    .answer-card.wrong {
        border-left: 6px solid #EF4444;
        /* Red border for incorrect */
    }

    .question-title {
        font-weight: bold;
        font-size: 16px;
        margin-bottom: 15px;
        color: #333;
    }

    .explanation-box {
        background-color: #f8fafc;
        border-radius: 6px;
        padding: 15px;
        margin-top: 15px;
        font-size: 14px;
        line-height: 1.6;
        color: #334155;
    }

    .status-badge {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 50px;
        font-size: 13px;
        font-weight: bold;
        color: #fff;
        margin-bottom: 10px;
    }

    .badge-correct {
        background-color: #10B981;
    }

    .badge-wrong {
        background-color: #EF4444;
    }

    .option-list {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 15px;
    }

    .option-item {
        padding: 8px 15px;
        border-radius: 6px;
        border: 1px solid #cbd5e1;
        background-color: #fff;
        font-size: 14px;
        color: #64748b;
    }

    .option-item.is-answer {
        background-color: #FBC02D;
        color: #000;
        font-weight: bold;
        border-color: #FBC02D;
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
            <h3 style="margin: 0;">Jawaban Latihan Sub Tes 9</h3>
        </div>
        <div class="col-xs-6 col-lg-6 text-right" style="text-align: right; margin-top: 10px;">
            <div class="timer-badge">
                Waktu: <span id="time" style="font-family: monospace; font-size: 18px;"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- PEMBAHASAN SOAL 3 -->
        <div class="col-md-6 col-sm-12">
            <?php
            $kunci_3 = 'a';
            $is_correct_3 = ($jawaban_user3 == $kunci_3);
            ?>
            <div class="answer-card <?php echo $is_correct_3 ? 'correct' : 'wrong'; ?>">
                <?php if ($is_correct_3): ?>
                    <span class="status-badge badge-correct"><i class="fa fa-check"></i> Jawaban Anda Benar</span>
                <?php else: ?>
                    <span class="status-badge badge-wrong"><i class="fa fa-times"></i> Jawaban Anda Salah</span>
                <?php endif; ?>

                <div class="question-title">Soal 3)</div>

                <div class="option-list">
                    <span class="option-item <?php echo ($kunci_3 == 'a') ? 'is-answer' : ''; ?>">a. gigi</span>
                    <span class="option-item <?php echo ($kunci_3 == 'b') ? 'is-answer' : ''; ?>">b. kumis</span>
                    <span class="option-item <?php echo ($kunci_3 == 'c') ? 'is-answer' : ''; ?>">c. bulu mata</span>
                    <span class="option-item <?php echo ($kunci_3 == 'd') ? 'is-answer' : ''; ?>">d. alis</span>
                    <span class="option-item <?php echo ($kunci_3 == 'e') ? 'is-answer' : ''; ?>">e. rambut</span>
                </div>

                <div class="explanation-box">
                    <b>Jawaban yang benar adalah A (gigi).</b>
                    <br><br>
                    <b>Penjelasan:</b> Kata kumis, bulu mata, alis, dan rambut semuanya memiliki kesamaan, yaitu
                    merupakan jenis rambut/bulu yang tumbuh di tubuh manusia. Sedangkan <b>gigi</b> bukan merupakan
                    rambut/bulu, sehingga kata "gigi" adalah kata yang tidak termasuk dalam kelompok tersebut.
                </div>
            </div>
        </div>

        <!-- PEMBAHASAN SOAL 4 -->
        <div class="col-md-6 col-sm-12">
            <?php
            $kunci_4 = 'c';
            $is_correct_4 = ($jawaban_user4 == $kunci_4);
            ?>
            <div class="answer-card <?php echo $is_correct_4 ? 'correct' : 'wrong'; ?>">
                <?php if ($is_correct_4): ?>
                    <span class="status-badge badge-correct"><i class="fa fa-check"></i> Jawaban Anda Benar</span>
                <?php else: ?>
                    <span class="status-badge badge-wrong"><i class="fa fa-times"></i> Jawaban Anda Salah</span>
                <?php endif; ?>

                <div class="question-title">Soal 4)</div>

                <div class="option-list">
                    <span class="option-item <?php echo ($kunci_4 == 'a') ? 'is-answer' : ''; ?>">a. panjang</span>
                    <span class="option-item <?php echo ($kunci_4 == 'b') ? 'is-answer' : ''; ?>">b. berat</span>
                    <span class="option-item <?php echo ($kunci_4 == 'c') ? 'is-answer' : ''; ?>">c. badan</span>
                    <span class="option-item <?php echo ($kunci_4 == 'd') ? 'is-answer' : ''; ?>">d. tinggi</span>
                    <span class="option-item <?php echo ($kunci_4 == 'e') ? 'is-answer' : ''; ?>">e. besar</span>
                </div>

                <div class="explanation-box">
                    <b>Jawaban yang benar adalah C (badan).</b>
                    <br><br>
                    <b>Penjelasan:</b> Kata panjang, berat, tinggi, dan besar adalah kata sifat yang menunjukkan suatu
                    dimensi, ukuran, atau takaran. Sedangkan <b>badan</b> adalah kata benda. Oleh karena itu, kata
                    "badan" tidak menunjukkan kesamaan dengan keempat kata lainnya.
                </div>
            </div>
        </div>
    </div>

    <hr style="border-top: 1px solid #eee; margin: 10px 0 30px 0;">

    <div class="row" style="margin-bottom: 40px;">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 text-center">

            <div class="text-center">
                <p style="color: #d9534f; font-weight: bold; margin-bottom: 20px; font-size: 14px;">
                    <span class="glyphicon glyphicon-warning-sign"></span> Perhatian: Pada tes sesungguhnya waktu sangat
                    terbatas dan nilai akan dihitung. Bekerjalah secepat dan seteliti mungkin!
                </p>
                <a href="<?php echo base_url('Pelamar/Daftar_ujian/Tiki_d/ujian9'); ?>" class="btn btn-primary btn-lg"
                    style="padding: 14px 50px; border-radius: 50px; font-size: 16px; font-weight: bold; box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);">
                    Mulai Tes Sekarang <i class="fa fa-arrow-right" style="margin-left: 8px;"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<?php
$id_pelamar = $this->session->userdata('ses_id');
// Pastikan Anda memodifikasi query ini menyesuaikan ID dan Tabel ujian yang baru jika diperlukan
$ujian = $this->db->query("SELECT * FROM tb_ujian_tiki_d WHERE id_ujian = 1");
$end_lat_sub9 = ""; // fallback
foreach ($ujian->result() as $key) {
    $end_lat_sub9 = $key->end_lat_sub9;
}
?>
<script type="text/javascript">
    var endLatSub9 = "<?php echo !empty($end_lat_sub9) ? $end_lat_sub9 : date('Y-m-d H:i:s', strtotime('+5 minutes')); ?>";
    var countDownDate = new Date(endLatSub9).getTime();

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
            alert('Waktu latihan sudah berakhir, selamat mengerjakan subtes sesungguhnya.');
            // Sesuaikan link ini dengan controller Anda
            window.location.href = '<?php echo base_url('Pelamar/Daftar_ujian/Tiki_d/ujian9'); ?>';
        }
    }, 1000);
</script>
<?php $this->load->view('layout3/footer') ?>