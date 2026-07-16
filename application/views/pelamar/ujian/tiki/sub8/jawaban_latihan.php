<?php $this->load->view('layout3/header2') ?>
<?php $this->load->view('layout3/navbar') ?>

<style>
    /* Custom Grid untuk 8 Kolom Sejajar dalam 1 Baris */
    .grid-8-container {
        display: flex;
        flex-wrap: nowrap;
        gap: 8px;
        margin-bottom: 25px;
        overflow-x: auto;
        padding-bottom: 10px;
    }
    .grid-8-item {
        flex: 1 1 calc(12.5% - 8px);
        min-width: 110px;
    }

    /* Custom Styling for Pattern Result Cards */
    .pattern-card {
        border: 2px solid #FBC02D; /* Border emas/kuning untuk menandakan kunci jawaban */
        border-radius: 8px;
        background-color: #FFFDE7; /* Background kuning sangat muda */
        padding: 8px;
        text-align: center;
        box-shadow: 0 4px 10px rgba(251, 192, 45, 0.15);
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .pattern-header {
        font-weight: bold;
        font-size: 13px;
        color: #333;
        background-color: #fff;
        padding: 5px 2px;
        border-radius: 4px;
        margin-bottom: 8px;
        border: 1px solid #f0e68c;
        white-space: nowrap;
    }
    /* Area tempat gambar soal A-H */
    .pattern-img-box {
        min-height: 80px;
        background-color: #fff;
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
    /* Kotak penanda Jawaban Benar di bawah gambar */
    .correct-answer-box {
        background-color: #FBC02D;
        color: #fff;
        border-radius: 6px;
        padding: 6px 4px;
        font-size: 12px;
        font-weight: bold;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .correct-answer-box span {
        display: block;
        font-size: 16px;
        margin-top: 2px;
        color: #212121;
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
            <h3 style="margin: 0;">Jawaban Latihan Sub Tes Pengamatan Bentuk</h3>
        </div>
        <div class="col-xs-6 col-lg-6 text-right" style="text-align: right; margin-top: 10px;">
            <div class="timer-badge">
                Waktu: <span id="time" style="font-family: monospace; font-size: 18px;"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div style="background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); margin-bottom: 30px;">
                
                <div class="text-center" style="margin-bottom: 25px;">
                    <h3 style="color: #FBC02D; font-weight: bold; margin-top: 0;">
                        <span class="glyphicon glyphicon-ok-circle"></span> Kunci Jawaban Benar
                    </h3>
                    <p style="font-size: 14px; color: #555; max-width: 700px; margin: 0 auto;">
                        Cocokkan jawaban yang telah Anda pilih dengan kunci jawaban di bawah ini. Jika Anda sudah memahami pola pengerjaannya, Anda siap untuk memulai tes yang sesungguhnya.
                    </p>
                </div>

                <?php 
                // Array kunci jawaban resmi berdasarkan instruksi soal latihan
                $kunci_jawaban = [
                    'a' => 1,
                    'b' => 2,
                    'c' => 3,
                    'd' => 1,
                    'e' => 1,
                    'f' => 4,
                    'g' => 1,
                    'h' => 5
                ];
                ?>

                <div class="grid-8-container">
                    <?php foreach ($kunci_jawaban as $huruf => $jawaban_benar): ?>
                        <div class="grid-8-item">
                            <div class="pattern-card">
                                <div class="pattern-header">Kotak <?php echo strtoupper($huruf); ?></div>
                                
                                <div class="pattern-img-box">
                                    <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes8/contoh/contoh-1/'.$huruf.'.png'); ?>"
                                            alt="Acuan Pola Utama"
                                            style="max-width: 100%; height: auto; border-radius: 6px; box-shadow: 0 2px 6px rgba(0,0,0,0.05);">

                                </div>

                                <div class="correct-answer-box">
                                    Jawaban Benar:
                                    <span>Pola <?php echo $jawaban_benar; ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <hr style="border-top: 1px solid #eee; margin: 25px 0;">

                <div class="text-center">
                    <p style="color: #d9534f; font-weight: bold; margin-bottom: 20px; font-size: 14px;">
                        <span class="glyphicon glyphicon-warning-sign"></span> Perhatian: Pada tes sesungguhnya waktu sangat terbatas dan nilai akan dihitung. Bekerjalah secepat dan seteliti mungkin!
                    </p>
                    <a href="<?php echo base_url('Pelamar/Daftar_ujian/Tiki_d/ujian8'); ?>" class="btn btn-primary btn-lg" style="padding: 14px 50px; border-radius: 50px; font-size: 16px; font-weight: bold; box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);">
                        Mulai Tes Sekarang <i class="fa fa-arrow-right" style="margin-left: 8px;"></i>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</div>

<?php 
// Tetap meneruskan timer latihan agar peserta tidak berlama-lama di halaman kunci jawaban
$ujian = $this->db->query("SELECT * FROM tb_ujian_tiki_d WHERE id_ujian = 1");
$end_lat_sub7 = ""; 
foreach ($ujian->result() as $key ) {
    $end_lat_sub7 = $key->end_lat_sub7;
}
?>

<script type="text/javascript">
    var endLatSub7 = "<?php echo !empty($end_lat_sub7) ? $end_lat_sub7 : date('Y-m-d H:i:s', strtotime('+5 minutes')); ?>";
    var countDownDate = new Date(endLatSub7).getTime();
    
    var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate - now;
        
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
        // Formatting 00:00
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        
        document.getElementById("time").innerHTML = minutes + " : " + seconds;
        
        if (distance < 0) {
            clearInterval(x);
            alert('Waktu persiapan sudah habis. Anda akan dialihkan ke ujian sebenarnya.');
            // Sesuaikan link pengalihan di bawah ini dengan controller ujian asli Anda
            window.location.href = '<?php echo base_url('Pelamar/Daftar_ujian/Tiki_d/ujian7'); ?>'; 
        }
    }, 1000);
</script>

<?php $this->load->view('layout3/footer') ?>