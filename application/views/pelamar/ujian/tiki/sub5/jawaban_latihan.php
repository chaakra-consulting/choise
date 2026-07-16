<?php $this->load->view('layout3/header2') ?>
<?php $this->load->view('layout3/navbar') ?>

<style>
    /* Custom Styling for Result Cards (Image/Spatial Edition) */
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
        /* Responsive 6 columns for A, B, C, D, E, F */
        flex: 1 1 calc(16.666% - 10px); 
        min-width: 60px;
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
        background-color: #f9f9f9; /* Slightly darker for disabled look */
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
        overflow: hidden;
        opacity: 0.6; /* Fade out wrong answers */
    }
    
    /* Correct/Checked state */
    .custom-radio-card input[type="checkbox"]:checked + .card-content {
        border-color: #FBC02D;
        background-color: #FFFDE7;
        box-shadow: 0 4px 12px rgba(251, 192, 45, 0.3);
        opacity: 1; /* Full opacity for correct answers */
        transform: scale(1.05); /* Slightly enlarge correct answers */
        transition: all 0.3s ease;
    }
    
    /* Choice letter (A, B, C, D, E, F) */
    .custom-radio-card .choice-letter {
        font-weight: 700;
        color: #888;
        font-size: 16px;
        text-transform: uppercase;
        margin-bottom: 8px;
        background: #f1f1f1;
        width: 24px;
        height: 24px;
        line-height: 24px;
        border-radius: 50%;
        display: inline-block;
    }
    
    /* Change text/bg color when correct */
    .custom-radio-card input[type="checkbox"]:checked + .card-content .choice-letter {
        color: #fff;
        background-color: #FBC02D;
    }

    /* Option Image Styling */
    .option-image {
        max-width: 100%;
        height: 55px;
        object-fit: contain;
        mix-blend-mode: multiply; 
        clip-path: inset(5px); 
        transform: scale(1.15); 
        opacity: 0.5; /* Dim wrong images */
    }
    
    .custom-radio-card input[type="checkbox"]:checked + .card-content .option-image {
        opacity: 1; /* Full brightness for correct images */
    }

    /* Image wrapper for questions */
    .question-image-wrapper {
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 10px;
        margin-bottom: 15px;
        text-align: center;
    }
    
    .question-image-wrapper img {
        max-width: 100%;
        height: auto;
        border-radius: 4px;
        mix-blend-mode: multiply; 
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
            <h3>Kunci Jawaban Latihan Sub Tes 5</h3>
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

                <div class="form-group" style="background-color: #fafafa; padding: 20px; border-radius: 8px; border: 1px solid #eee; margin-bottom: 30px;">
                    <label style="font-size: 16px; font-weight: bold; color: #333;">
                        1) Perhatikan gambar berikut: <span class="correct-badge">Jawaban: b & d</span>
                    </label>
                    
                    <div class="question-image-wrapper">
                        <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes5/contoh-1/soal.png'); ?>" alt="Soal Latihan 1">
                    </div>

                    <div class="options-container">
                        <label class="custom-radio-card">
                            <input type="checkbox" disabled>
                            <div class="card-content">
                                <span class="choice-letter">a</span>
                                <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes5/contoh-1/a.png'); ?>" alt="Opsi A" class="option-image">
                            </div>
                        </label>
                        <label class="custom-radio-card">
                            <input type="checkbox" checked readonly> 
                            <div class="card-content">
                                <span class="choice-letter">b</span>
                                <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes5/contoh-1/b.png'); ?>" alt="Opsi B" class="option-image">
                            </div>
                        </label>
                        <label class="custom-radio-card">
                            <input type="checkbox" disabled> 
                            <div class="card-content">
                                <span class="choice-letter">c</span>
                                <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes5/contoh-1/c.png'); ?>" alt="Opsi C" class="option-image">
                            </div>
                        </label>
                        <label class="custom-radio-card">
                            <input type="checkbox" checked readonly>
                            <div class="card-content">
                                <span class="choice-letter">d</span>
                                <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes5/contoh-1/d.png'); ?>" alt="Opsi D" class="option-image">
                            </div>
                        </label>
                        <label class="custom-radio-card">
                            <input type="checkbox" disabled>
                            <div class="card-content">
                                <span class="choice-letter">e</span>
                                <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes5/contoh-1/e.png'); ?>" alt="Opsi E" class="option-image">
                            </div>
                        </label>
                        <label class="custom-radio-card">
                            <input type="checkbox" disabled>
                            <div class="card-content">
                                <span class="choice-letter">f</span>
                                <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes5/contoh-1/f.png'); ?>" alt="Opsi F" class="option-image">
                            </div>
                        </label>
                    </div>
                </div>
                
                <div class="form-group" style="background-color: #fafafa; padding: 20px; border-radius: 8px; border: 1px solid #eee; margin-bottom: 30px;">
                    <label style="font-size: 16px; font-weight: bold; color: #333;">
                        2) Perhatikan gambar berikut: <span class="correct-badge">Jawaban: c & f</span>
                    </label>
                    
                    <div class="question-image-wrapper">
                        <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes5/contoh-2/soal.png'); ?>" alt="Soal Latihan 2">
                    </div>

                    <div class="options-container">
                        <label class="custom-radio-card">
                            <input type="checkbox" disabled> 
                            <div class="card-content">
                                <span class="choice-letter">a</span>
                                <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes5/contoh-2/a.png'); ?>" alt="Opsi A" class="option-image">
                            </div>
                        </label>
                        <label class="custom-radio-card">
                            <input type="checkbox" disabled>
                            <div class="card-content">
                                <span class="choice-letter">b</span>
                                <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes5/contoh-2/b.png'); ?>" alt="Opsi B" class="option-image">
                            </div>
                        </label>
                        <label class="custom-radio-card">
                            <input type="checkbox" checked readonly>
                            <div class="card-content">
                                <span class="choice-letter">c</span>
                                <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes5/contoh-2/c.png'); ?>" alt="Opsi C" class="option-image">
                            </div>
                        </label>
                        <label class="custom-radio-card">
                            <input type="checkbox" disabled>
                            <div class="card-content">
                                <span class="choice-letter">d</span>
                                <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes5/contoh-2/d.png'); ?>" alt="Opsi D" class="option-image">
                            </div>
                        </label>
                        <label class="custom-radio-card">
                            <input type="checkbox" disabled>
                            <div class="card-content">
                                <span class="choice-letter">e</span>
                                <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes5/contoh-2/e.png'); ?>" alt="Opsi E" class="option-image">
                            </div>
                        </label>
                        <label class="custom-radio-card">
                            <input type="checkbox" checked readonly>
                            <div class="card-content">
                                <span class="choice-letter">f</span>
                                <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes5/contoh-2/f.png'); ?>" alt="Opsi F" class="option-image">
                            </div>
                        </label>
                    </div>
                </div>

                <div class="text-center">
                    <p style="color: #FBC02D; font-weight: bold; margin-bottom: 15px;">
                        <span class="glyphicon glyphicon-warning-sign"></span> Nilai tes sebenarnya akan dihitung. Kerjakan secepat dan seteliti mungkin!
                    </p>
                    <a href="<?php echo base_url('Pelamar/Daftar_ujian/Tiki_d/ujian5'); ?>" class="btn btn-primary btn-lg" style="padding: 12px 50px; border-radius: 25px; font-size: 16px; font-weight: bold; box-shadow: 0 4px 6px rgba(76, 175, 80, 0.3);">
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
$end_lat_sub5 = ""; 
foreach ($ujian->result() as $key ) {
    $end_lat_sub5 = $key->end_lat_sub5;
}
?>

<script type="text/javascript">
    var endLatSub5 = "<?php echo !empty($end_lat_sub5) ? $end_lat_sub5 : date('Y-m-d H:i:s', strtotime('+5 minutes')); ?>";
    var countDownDate = new Date(endLatSub5).getTime();
    
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
            window.location.href = '<?php echo base_url('Pelamar/Daftar_ujian/Tiki_d/ujian5'); ?>'; 
        }
    }, 1000);
</script>

<?php $this->load->view('layout3/footer') ?>