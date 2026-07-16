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
        flex: 1 1 calc(20% - 10px); /* Responsive 5 columns */
        min-width: 55px;
    }
    /* Hide the default radio button */
    .custom-radio-card input[type="radio"] {
        display: none; 
    }
    /* Base styling for the card */
    .custom-radio-card .card-content {
        border: 3px solid #e0e0e0;
        border-radius: 10px;
        padding: 12px 10px;
        text-align: center;
        transition: all 0.2s ease-in-out;
        background-color: #fff;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    /* Hover effect */
    .custom-radio-card:hover .card-content {
        border-color: #b0b0b0;
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    }
    /* Selected/Checked state */
    .custom-radio-card input[type="radio"]:checked + .card-content {
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
        font-size: 18px;
        color: #333;
    }
    /* Change text color when selected */
    .custom-radio-card input[type="radio"]:checked + .card-content .choice-letter,
    .custom-radio-card input[type="radio"]:checked + .card-content .option-text {
        color: #FBC02D;
    }

    /* Make table in instructions seamless */
    .contoh-table td, .contoh-table th {
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
            <h3>Soal Latihan Sub Tes 7</h3>
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
                <p style="color: #fff; text-align: justify; font-size: 13px;">
                    Test ini terdiri dari soal-soal berhitung dengan menggunakan huruf-huruf. Tentang menghitung perkalian, misalnya 5 x 12 = ..., kiranya tidak perlu dijelaskan lagi.<br>
                    Tetapi dalam test ini, soal-soalnya tidak terdiri dari angka-angka (bilangan-bilangan), melainkan huruf-huruf.
                </p>

                <p style="color: #fff; margin-top: 15px; margin-bottom: 5px; font-weight: bold; font-size: 13px;">Diketahui:</p>
                <div style="display: grid; grid-template-columns: repeat(5, 1fr); background-color: #ccc; border: 1px solid #ccc; margin-bottom: 15px; color: #000; font-weight: bold; text-align: center; border-radius: 4px; gap: 1px;">
                    <div style="background-color: #fff; padding: 5px;">A = 1</div>
                    <div style="background-color: #fff; padding: 5px;">B = 2</div>
                    <div style="background-color: #fff; padding: 5px;">C = 3</div>
                    <div style="background-color: #fff; padding: 5px;">D = 4</div>
                    <div style="background-color: #fff; padding: 5px;">E = 5</div>
                    <div style="background-color: #fff; padding: 5px;">F = 6</div>
                    <div style="background-color: #fff; padding: 5px;">G = 7</div>
                    <div style="background-color: #fff; padding: 5px;">H = 8</div>
                    <div style="background-color: #fff; padding: 5px;">J = 9</div>
                    <div style="background-color: #fff; padding: 5px;">K = 0</div>
                </div>

                <p style="color: #fff; text-align: justify; font-size: 13px;">
                    Huruf AB misalnya adalah angka 1 dan 2 berurutan, dan itu berarti sama dengan 12. Diketahui bahwa A = 1 dan F = 6; dengan demikian AF = 16.<br>
                    Perhatikan contoh-contoh dibawah ini:
                </p>

                <p style="color: #fff; margin-top: 15px; font-style: italic; font-size: 13px;">Contoh :</p>
                
                <div class="table-responsive" style="color: black; background-color: #fff; border-radius: 5px; padding: 10px;">
                    <table class="table contoh-table" style="margin-bottom: 0;">
                        <tbody>
                            <tr><td width="30">1)</td><td class="text-center">A</td><td class="text-center">x</td><td class="text-center">C</td><td class="text-center">=</td><td class="text-center">C</td></tr>
                            <tr><td>2)</td><td class="text-center">C</td><td class="text-center">x</td><td class="text-center">F</td><td class="text-center">=</td><td class="text-center">AE</td></tr>
                            <tr><td>3)</td><td class="text-center">G</td><td class="text-center">x</td><td class="text-center">H</td><td class="text-center">=</td><td class="text-center">EF</td></tr>
                            <tr><td>4)</td><td class="text-center">K</td><td class="text-center">x</td><td class="text-center">B</td><td class="text-center">=</td><td class="text-center">K</td></tr>
                        </tbody>
                    </table>
                </div>
                
                <p style="color: #fff; text-align: justify; margin-top: 15px; font-size: 13px;">
                    Pada contoh 1, A x C = 1 x 3 dan hasilnya sama dengan 3. Angka 3 dapat diganti dengan huruf C. Dengan demikian perhitungan contoh 1 adalah <i>benar</i>. Oleh karena itu pada lembar jawaban dibelakang contoh 1, huruf <b>b ( = benar )</b> telah dilingkari.<br><br>
                    Pada contoh 2, C x F dapat diganti dengan 3 x 6 yang akan memberikan hasil sama dengan 18. Angka 18 dapat diganti dengan huruf AH. Pada contoh 2 kita lihat bahwa C x F = AE, dengan demikian berarti bahwa hasil perhitungan itu <i>salah</i>, sebab seharusnya AH dan bukannya AE. Oleh karena itu pada lembar jawaban dibelakang contoh 2, huruf <b>s ( = salah )</b> telah dilingkari.<br><br>
                    Pada contoh 3, G x H = 7 x 8; hasilnya = 56 atau = EF. Dengan demikian contoh 3 adalah benar. Oleh karena itu pada lembar jawaban, huruf <b>b</b> telah dilingkari.<br><br>
                    Pada contoh 4, K x B = 0 x 2; hasilnya = 0 atau = K. Jadi contoh 4 adalah benar.
                </p>

                <p style="color: #fff; text-align: justify; margin-top: 15px; font-size: 13px;">
                    Dibawah ini masih terdapat 4 contoh. Kerjakan sendiri contoh-contoh tersebut.
                </p>

                <p style="color: #fff; margin-top: 15px; font-style: italic; font-size: 13px;">Contoh :</p>
                <div class="table-responsive" style="color: black; background-color: #fff; border-radius: 5px; padding: 10px;">
                    <table class="table contoh-table" style="margin-bottom: 0;">
                        <tbody>
                            <tr><td width="30">5)</td><td class="text-center">B</td><td class="text-center">x</td><td class="text-center">J</td><td class="text-center">=</td><td class="text-center">AD</td></tr>
                            <tr><td>6)</td><td class="text-center">J</td><td class="text-center">x</td><td class="text-center">D</td><td class="text-center">=</td><td class="text-center">BF</td></tr>
                            <tr><td>7)</td><td class="text-center">AB</td><td class="text-center">x</td><td class="text-center">C</td><td class="text-center">=</td><td class="text-center">CF</td></tr>
                            <tr><td>8)</td><td class="text-center">AK</td><td class="text-center">x</td><td class="text-center">AK</td><td class="text-center">=</td><td class="text-center">BKK</td></tr>
                        </tbody>
                    </table>
                </div>

                <p style="color: #fff; text-align: justify; margin-top: 15px; font-size: 13px;">
                    Jawaban yang benar dari contoh-contoh diatas adalah:<br>
                    contoh 5 = s ; contoh 6 = s ; contoh 7 = b ; contoh 8 = s.
                </p>
            </div>
        </div>

        <div class="col-md-6 col-sm-12">
            <div style="background-color: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); height: 100%;">
                <p style="font-size: 14px; color: #555; text-align: justify; margin-bottom: 20px;">Coba pecahkan sendiri contoh-contoh di bawah ini, dan pilihlah huruf yang sesuai dengan jawaban yang benar. Apapun jawaban Anda pada tahap latihan ini tidak akan dihitung poinnya.</p>
                
                <?php 
                $id_pelamar = $this->session->userdata('ses_id');
                $ujian = $this->db->query("SELECT * FROM tb_ujian_tiki_d WHERE id_ujian = 1");
                $end_lat_sub7 = ""; // fallback
                foreach ($ujian->result() as $key ) {
                    $end_lat_sub7 = $key->end_lat_sub7;
                }
                ?>

                <form method="post" action="<?php echo base_url('Pelamar/Daftar_ujian/Tiki_d/latihan7_answer') ?>">
                    
                    <div class="form-group">
                        <label style="font-size: 16px; font-weight: bold; color: #333;">1) B x D = H</label>
                        <div class="options-container" style="justify-content: flex-start; gap: 15px;">
                            <label class="custom-radio-card" style="flex: 0 1 calc(50% - 15px); min-width: 100px;">
                                <input type="radio" name="jawaban_latihan1" value="A" required>
                                <div class="card-content">
                                    <span class="option-text">Benar</span>
                                </div>
                            </label>
                            <label class="custom-radio-card" style="flex: 0 1 calc(50% - 15px); min-width: 100px;">
                                <input type="radio" name="jawaban_latihan1" value="B">
                                <div class="card-content">
                                    <span class="option-text">Salah</span>
                                </div>
                            </label>
                        </div>
                    </div>
                    
                    <hr style="border-top: 1px dashed #ddd; margin: 15px 0;">

                    <div class="form-group" style="margin-bottom: 30px;">
                        <label style="font-size: 16px; font-weight: bold; color: #333;">2) C x E = AF</label>
                        <div class="options-container" style="justify-content: flex-start; gap: 15px;">
                            <label class="custom-radio-card" style="flex: 0 1 calc(50% - 15px); min-width: 100px;">
                                <input type="radio" name="jawaban_latihan2" value="A" required>
                                <div class="card-content">
                                    <span class="option-text">Benar</span>
                                </div>
                            </label>
                            <label class="custom-radio-card" style="flex: 0 1 calc(50% - 15px); min-width: 100px;">
                                <input type="radio" name="jawaban_latihan2" value="B">
                                <div class="card-content">
                                    <span class="option-text">Salah</span>
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

<script type="text/javascript">
    var endLatSub1 = "<?php echo !empty($end_lat_sub7) ? $end_lat_sub7 : date('Y-m-d H:i:s', strtotime('+5 minutes')); ?>";
    var countDownDate = new Date(endLatSub1).getTime();
    
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
            window.location.href = '<?php echo base_url('Pelamar/Daftar_ujian/Tiki_d/latihan7_answer'); ?>'; 
        }
    }, 1000);
</script>

<?php $this->load->view('layout3/footer') ?>