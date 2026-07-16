<?php $this->load->view('layout3/header2') ?>
<?php $this->load->view('layout3/navbar') ?>

<style>
    /* Custom Styling for Checkbox Cards (Image/Spatial Edition) */
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
        color: #fff;
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
            <h3>Soal Latihan Sub Tes 5</h3>
        </div>
        <div class="col-xs-6 col-lg-6 text-right" style="text-align: right; margin-top: 20px;">
            <div class="timer-badge">
                Waktu: <span id="time" style="font-family: monospace; font-size: 18px;"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-12" style="margin-bottom: 20px;">
            <div style="background-color: #f9243f; padding: 25px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); height: 100%;">
                <h4 style="color: #fff; margin-top: 0;"><b>Petunjuk Pengerjaan</b></h4>
                <p style="color: #fff; text-align: justify; font-size: 14px; line-height: 1.6;">
                    Test berikut ini terdiri dari gambar bentuk-bentuk. Gambar di sebelah kiri dari setiap soal merupakan bentuk yang terpotong menjadi 2 bagian yang sudah ditentukan. 
                    Di sebelah kanannya terdapat 6 gambar <b>A, B, C, D, E</b> dan <b>F</b>. 
                    <br><br>
                    <b>Dua diantaranya</b> terbuat dari bagian-bagian yang terdapat di sebelah kiri. Carilah <b>kedua gambar</b> tersebut. Apabila sudah ditemukan, pilihlah huruf-huruf yang menunjukkan gambar yang dimaksudkan.
                </p>
                
                <p style="color: #fff; margin-top: 20px; font-style: italic;">Contoh Soal:</p>
                
                <div style="background-color: #fff; padding: 15px; border-radius: 6px; text-align: center; margin-bottom: 15px;">
                    <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes5/contoh-1/instruksi.png'); ?>" alt="Contoh Instruksi" style="max-width: 100%; height: auto;">
                    <div style="color: #888; font-size: 12px; margin-top: 10px;">(Placeholder Gambar Contoh)</div>
                </div>
                
                <p style="color: #fff; text-align: justify; margin-top: 10px; font-size: 13px;">
                    Pada contoh 1 dapat dilihat bahwa jika bagian-bagian yang terdapat di sebelah kiri digabungkan, maka akan diperoleh gambar <b>B</b> dan <b>D</b>. Oleh karena itu huruf <b>B</b> dan <b>D</b> adalah jawaban yang benar.
                </p>
            </div>
        </div>

        <div class="col-md-6 col-sm-12">
            <div style="background-color: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); height: 100%;">
                <p style="font-size: 14px; color: #555; text-align: justify; margin-bottom: 20px;">
                    Coba pecahkan sendiri contoh-contoh di bawah ini, dan pilihlah <b>dua gambar</b> yang sesuai dengan jawaban yang benar. Apapun jawaban Anda pada tahap latihan ini tidak akan dihitung poinnya.
                </p>
                
                <?php 
                $id_pelamar = $this->session->userdata('ses_id');
                $ujian = $this->db->query("SELECT * FROM tb_ujian_tiki_d WHERE id_ujian = 1");
                $end_lat_sub5 = ""; // fallback
                foreach ($ujian->result() as $key ) {
                    $end_lat_sub5 = $key->end_lat_sub5;
                }
                ?>

                <form method="post" action="<?php echo base_url('Pelamar/Daftar_ujian/Tiki_d/latihan5_answer') ?>">
                    
                    <div class="form-group">
                        <label style="font-size: 16px; font-weight: bold; color: #333;">1) Perhatikan gambar berikut:</label>
                        
                        <div class="question-image-wrapper">
                            <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes5/contoh-2/soal.png'); ?>" alt="Soal Latihan 1">
                        </div>

                        <div class="options-container">
                            <label class="custom-radio-card">
                                <input type="checkbox" name="jawaban_latihan1[]" value="a">
                                <div class="card-content">
                                    <span class="choice-letter">a</span>
                                    <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes5/contoh-2/a.png'); ?>" alt="Opsi A" class="option-image">
                                </div>
                            </label>
                            <label class="custom-radio-card">
                                <input type="checkbox" name="jawaban_latihan1[]" value="b">
                                <div class="card-content">
                                    <span class="choice-letter">b</span>
                                    <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes5/contoh-2/b.png'); ?>" alt="Opsi B" class="option-image">
                                </div>
                            </label>
                            <label class="custom-radio-card">
                                <input type="checkbox" name="jawaban_latihan1[]" value="c">
                                <div class="card-content">
                                    <span class="choice-letter">c</span>
                                    <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes5/contoh-2/c.png'); ?>" alt="Opsi C" class="option-image">
                                </div>
                            </label>
                            <label class="custom-radio-card">
                                <input type="checkbox" name="jawaban_latihan1[]" value="d">
                                <div class="card-content">
                                    <span class="choice-letter">d</span>
                                    <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes5/contoh-2/d.png'); ?>" alt="Opsi D" class="option-image">
                                </div>
                            </label>
                            <label class="custom-radio-card">
                                <input type="checkbox" name="jawaban_latihan1[]" value="e">
                                <div class="card-content">
                                    <span class="choice-letter">e</span>
                                    <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes5/contoh-2/e.png'); ?>" alt="Opsi E" class="option-image">
                                </div>
                            </label>
                            <label class="custom-radio-card">
                                <input type="checkbox" name="jawaban_latihan1[]" value="f">
                                <div class="card-content">
                                    <span class="choice-letter">f</span>
                                    <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes5/contoh-2/f.png'); ?>" alt="Opsi F" class="option-image">
                                </div>
                            </label>
                        </div>
                    </div>
                    
                    <hr style="border-top: 1px dashed #ddd; margin: 25px 0;">

                    <div class="form-group" style="margin-bottom: 30px;">
                        <label style="font-size: 16px; font-weight: bold; color: #333;">2) Perhatikan gambar berikut:</label>
                        
                        <div class="question-image-wrapper">
                            <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes5/contoh-3/soal.png'); ?>" alt="Soal Latihan 2">
                        </div>

                        <div class="options-container">
                            <label class="custom-radio-card">
                                <input type="checkbox" name="jawaban_latihan2[]" value="a">
                                <div class="card-content">
                                    <span class="choice-letter">a</span>
                                    <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes5/contoh-3/a.png'); ?>" alt="Opsi A" class="option-image">
                                </div>
                            </label>
                            <label class="custom-radio-card">
                                <input type="checkbox" name="jawaban_latihan2[]" value="b">
                                <div class="card-content">
                                    <span class="choice-letter">b</span>
                                    <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes5/contoh-3/b.png'); ?>" alt="Opsi B" class="option-image">
                                </div>
                            </label>
                            <label class="custom-radio-card">
                                <input type="checkbox" name="jawaban_latihan2[]" value="c">
                                <div class="card-content">
                                    <span class="choice-letter">c</span>
                                    <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes5/contoh-3/c.png'); ?>" alt="Opsi C" class="option-image">
                                </div>
                            </label>
                            <label class="custom-radio-card">
                                <input type="checkbox" name="jawaban_latihan2[]" value="d">
                                <div class="card-content">
                                    <span class="choice-letter">d</span>
                                    <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes5/contoh-3/d.png'); ?>" alt="Opsi D" class="option-image">
                                </div>
                            </label>
                            <label class="custom-radio-card">
                                <input type="checkbox" name="jawaban_latihan2[]" value="e">
                                <div class="card-content">
                                    <span class="choice-letter">e</span>
                                    <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes5/contoh-3/e.png'); ?>" alt="Opsi E" class="option-image">
                                </div>
                            </label>
                            <label class="custom-radio-card">
                                <input type="checkbox" name="jawaban_latihan2[]" value="f">
                                <div class="card-content">
                                    <span class="choice-letter">f</span>
                                    <img src="<?php echo base_url('upload/bank_soal/tiki_d/subtes5/contoh-3/f.png'); ?>" alt="Opsi F" class="option-image">
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary btn-lg" style="padding: 10px 40px; border-radius: 25px; width: 100%;">Selanjutnya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php $this->load->view('layout3/footer') ?>
<script type="text/javascript">
    $(document).ready(function() {
        
        // AUTO-UPDATE LIMITER: Unchecks the first previously selected option if a 3rd is clicked.
        $(document).on('change', '.custom-radio-card input[type="checkbox"]', function() {
            let groupName = $(this).attr('name');
            let $checkedBoxes = $('input[name="' + groupName + '"]:checked');
            
            // If they just checked a 3rd box...
            if ($checkedBoxes.length > 2) {
                // Find the ones that are NOT the current one being clicked
                // and uncheck the very first one in the list.
                $checkedBoxes.not(this).first().prop('checked', false);
            }
        });

        // Timer Logic
        var endLatSub5 = "<?php echo !empty($end_lat_sub5) ? $end_lat_sub5 : date('Y-m-d H:i:s', strtotime('+5 minutes')); ?>";
        var countDownDate = new Date(endLatSub5).getTime();
        
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
                window.location.href = '<?php echo base_url('Pelamar/Daftar_ujian/Tiki_d/latihan5_answer'); ?>'; 
            }
        }, 1000);
    });
</script>