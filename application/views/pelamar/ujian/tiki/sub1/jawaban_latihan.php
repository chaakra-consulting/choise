<?php $this->load->view('layout3/header2') ?>
<?php $this->load->view('layout3/navbar') ?>

<style>
    /* Custom Styling for Result Cards */
    .options-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 15px;
        margin-bottom: 25px;
    }
    .custom-radio-card {
        display: block;
        margin: 0;
        flex: 1 1 calc(20% - 10px); /* Responsive 5 columns */
        min-width: 55px;
    }
    .custom-radio-card input[type="radio"] {
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
    /* Correct/Checked state */
    .custom-radio-card input[type="radio"]:checked + .card-content {
       border-color: #FBC02D;
        background-color: #FFFDE7;
        box-shadow: 0 4px 12px rgba(76, 175, 80, 0.2);
        opacity: 1; /* Full opacity for correct answer */
        transform: scale(1.05); /* Slightly enlarge correct answer */
        transition: all 0.3s ease;
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
        font-size: 18px;
        color: #555;
    }
    /* Change text color when correct */
    .custom-radio-card input[type="radio"]:checked + .card-content .choice-letter,
    .custom-radio-card input[type="radio"]:checked + .card-content .option-text {
        color: #FBC02D; /* Darker green text */
    }
    
    .correct-badge {
        display: inline-block;
        background-color: #FBC02D;
        color: white;
        padding: 3px 10px;
        border-radius: 15px;
        font-size: 12px;
        font-weight: bold;
        margin-left: 10px;
        vertical-align: middle;
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
            <h3>Jawaban Latihan Sub Tes 1</h3>
        </div>
        <div class="col-xs-6 col-lg-6 text-right" style="text-align: right; margin-top: 20px;">
            <div class="timer-badge">
                Waktu: <span id="time" style="font-family: monospace; font-size: 18px;"></span>
            </div>
        </div>
    </div>

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
                    <label style="font-size: 16px; font-weight: bold; color: #333;">
                        1) 36 : 4 - 2 = ... <span class="correct-badge">Jawaban: c (7)</span>
                    </label>
                    <div class="options-container">
                        <label class="custom-radio-card">
                            <input type="radio" disabled>
                            <div class="card-content">
                                <span class="choice-letter">a</span>
                                <span class="option-text">6</span>
                            </div>
                        </label>
                        <label class="custom-radio-card">
                            <input type="radio" checked disabled>
                            <div class="card-content">
                                <span class="choice-letter">b</span>
                                <span class="option-text">7</span>
                            </div>
                        </label>
                        <label class="custom-radio-card">
                            <input type="radio"  readonly> <div class="card-content">
                                <span class="choice-letter">c</span>
                                <span class="option-text">8</span>
                            </div>
                        </label>
                        <label class="custom-radio-card">
                            <input type="radio" disabled>
                            <div class="card-content">
                                <span class="choice-letter">d</span>
                                <span class="option-text">5</span>
                            </div>
                        </label>
                        <label class="custom-radio-card">
                            <input type="radio" disabled>
                            <div class="card-content">
                                <span class="choice-letter">e</span>
                                <span class="option-text">9</span>
                            </div>
                        </label>
                    </div>
                </div>
                
                <div class="form-group" style="background-color: #fafafa; padding: 20px; border-radius: 8px; border: 1px solid #eee; margin-bottom: 30px;">
                    <label style="font-size: 16px; font-weight: bold; color: #333;">
                        2) 16 x 3 : 12 = ... <span class="correct-badge">Jawaban: a (4)</span>
                    </label>
                    <div class="options-container">
                        <label class="custom-radio-card">
                            <input type="radio" checked readonly> <div class="card-content">
                                <span class="choice-letter">a</span>
                                <span class="option-text">4</span>
                            </div>
                        </label>
                        <label class="custom-radio-card">
                            <input type="radio" disabled>
                            <div class="card-content">
                                <span class="choice-letter">b</span>
                                <span class="option-text">3</span>
                            </div>
                        </label>
                        <label class="custom-radio-card">
                            <input type="radio" disabled>
                            <div class="card-content">
                                <span class="choice-letter">c</span>
                                <span class="option-text">6</span>
                            </div>
                        </label>
                        <label class="custom-radio-card">
                            <input type="radio" disabled>
                            <div class="card-content">
                                <span class="choice-letter">d</span>
                                <span class="option-text">5</span>
                            </div>
                        </label>
                        <label class="custom-radio-card">
                            <input type="radio" disabled>
                            <div class="card-content">
                                <span class="choice-letter">e</span>
                                <span class="option-text">2</span>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="text-center">
                    <p style="color: #FBC02D; font-weight: bold; margin-bottom: 15px;">
                        <span class="glyphicon glyphicon-warning-sign"></span> Nilai tes sebenarnya akan dihitung. Kerjakan secepat dan seteliti mungkin!
                    </p>
                    <a href="<?php echo base_url('Pelamar/Daftar_ujian/Tiki_d/ujian1'); ?>" class="btn btn-primary btn-lg" style="padding: 12px 50px; border-radius: 25px; font-size: 16px; font-weight: bold; box-shadow: 0 4px 6px rgba(76, 175, 80, 0.3);">
                        Mulai Tes
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</div>

<?php 
// Tetap meneruskan timer latihan agar peserta tidak berlama-lama di halaman kunci jawaban
$ujian = $this->db->query("SELECT * FROM tb_ujian_tiki_d WHERE id_ujian = 1");
$end_lat_sub1 = ""; 
foreach ($ujian->result() as $key ) {
    $end_lat_sub1 = $key->end_lat_sub1;
}
?>

<script type="text/javascript">
    var endLatSub1 = "<?php echo !empty($end_lat_sub1) ? $end_lat_sub1 : date('Y-m-d H:i:s', strtotime('+5 minutes')); ?>";
    var countDownDate = new Date(endLatSub1).getTime();
    
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
            window.location.href = '<?php echo base_url('Pelamar/Daftar_ujian/Tiki_d/ujian1'); ?>'; 
        }
    }, 1000);
</script>

<?php $this->load->view('layout3/footer') ?>