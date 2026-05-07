<?php $this->load->view('layout3/header2') ?>
<?php $this->load->view('layout3/navbar') ?>

<style>
    /* Custom Styling for Radio Cards */
    .options-container {
        display: flex;
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

    /* Hide the default radio button */
    .custom-radio-card input[type="radio"] {
        display: none;
    }

    /* Base styling for the card */
    .custom-radio-card .card-content {
        border: 4px solid #e0e0e0;
        border-radius: 12px;
        padding: 10px 15px;
        text-align: center;
        transition: all 0.2s ease-in-out;
        background-color: #fff;
    }

    /* Hover effect */
    .custom-radio-card:hover .card-content {
        border-color: #b0b0b0;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
    }

    /* Selected/Checked state */
    .custom-radio-card input[type="radio"]:checked+.card-content {
        border-color: #FBC02D;
        /* Updated yellow/gold border */
        background-color: #FFFDE7;
        /* Light yellow tint */
        box-shadow: 0 4px 12px rgba(251, 192, 45, 0.2);
    }

    /* Image and text styling inside the card */
    .custom-radio-card .card-content img {
        width: 50px;
        border-radius: 5px;
        margin-top: 8px;
        display: block;
    }

    .custom-radio-card .choice-letter {
        font-weight: 600;
        color: #555;
        font-size: 16px;
        text-transform: uppercase;
    }

    /* Change text color when selected */
    .custom-radio-card input[type="radio"]:checked+.card-content .choice-letter {
        color: #FBC02D;
    }
</style>
<div class="col-sm-12 main">
    <div class="row" style="margin-bottom: -50px;">
        <div class="col-lg-9">
            <h3>Soal Latihan</h3>
        </div>
        <div class="col-lg-3">
            <h4 style="margin-top: 35px" align="right">Waktu latihan <span id="time"></span> detik</h4>
        </div>
    </div><!--/.row-->
    <!-- 
		<iframe style="margin-top: -60px;" id="frame" src="<?php echo base_url('Pelamar/Ujian/frame_latihan_cfit/') ?>" width="100%" onload="this.style.height=this.contentDocument.body.scrollHeight +'px';"  frameborder="0">Browser Anda Tidak Mendukung Iframe, Silahkan Perbaharui Browser Anda.</iframe>
	-->
    <div class="col-sm-12" style="background-color: #f9243f; padding: 30px; border-radius: 5px; margin-bottom: 20px;">
        <h4 style="color: #fff;"><b>Petunjuk Pengerjaan Subtes 4</b></h4>
        <p style="color: #fff;">Pada subtes keempat, Anda diminta untuk memilih gambar dimana Anda dapat meletakkan posisi titik yang tidak berbeda komposisinya dengan gambar.</p><br>
        <p style="color: #fff;">Contoh soal:</p>
        <img src="<?php echo base_url('assets3/images/CFIT 2a/Tes 4/Contoh 1/Contoh-1.png') ?>" class="img-responsive" alt="" style="width: 200px; margin: 10px; border-radius: 5px;">

        <div class="form-check col-sm-1 text-center" style="margin: 5px;">
            <p style="color: #fff;">a</p>
            <center>
                <img src="<?php echo base_url('assets3/images/CFIT 2a/Tes 4/Contoh 1/a.png') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
            </center>
        </div>
        <div class="form-check col-sm-1 text-center" style="margin: 5px;">
            <p style="color: #fff;">b</p>
            <center>
                <img src="<?php echo base_url('assets3/images/CFIT 2a/Tes 4/Contoh 1/b.png') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
            </center>
        </div>
        <div class="form-check col-sm-1 text-center" style="margin: 5px;">
            <p style="color: #fff;">c</p>
            <center>
                <img src="<?php echo base_url('assets3/images/CFIT 2a/Tes 4/Contoh 1/c.png') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
            </center>
        </div>
        <div class="form-check col-sm-1 text-center" style="margin: 5px;">
            <p style="color: #fff;">d</p>
            <center>
                <img src="<?php echo base_url('assets3/images/CFIT 2a/Tes 4/Contoh 1/d.png') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
            </center>
        </div>
        <div class="form-check col-sm-1 text-center" style="margin: 5px;">
            <p style="color: #fff;">e</p>
            <center>
                <img src="<?php echo base_url('assets3/images/CFIT 2a/Tes 4/Contoh 1/e.png') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
            </center>
        </div>

        <p class="col-sm-12" style="color: #fff; margin: 10px;">Jawaban: (c) Karena titik berada di dalam lingkaran, tetapi di luar segi empat. </p>
    </div>
    <div class="col-sm-12" style="background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
        <p style="font-size: 15px; color: #555;">Soal dibawah ini merupakan soal latihan sebelum mengerjakan subtes 4. Cobalah untuk mengerjakan contoh soal di bawah ini! Apapun jawaban anda pada tahap latihan ini tidak akan dihitung poinnya.</p>

        <?php
        $idUjian = $this->session->userdata('ses_ujian');
        $id_pelamar = $this->session->userdata('ses_id');
        $ujian = $this->db->query("SELECT * FROM tb_ujian_cfit_2a WHERE id_ujian = $idUjian");
        foreach ($ujian->result() as $key) {
            $end_lat4 = $key->end_lat_sub4;
        }
        ?>

        <form method="post" action="<?php echo base_url('Pelamar/Ujian/jawabancontoh_cfit_2a_subtes_4/' . $idUjian . '/' . $id_pelamar) ?>">

            <div class="col-sm-12" style="margin-bottom: 30px;">
                <p style="font-weight: bold; font-size: 16px;">1.</p>
                <img src="<?php echo base_url('assets3/images/CFIT 2a/Tes 4/Contoh 2/Contoh-2.png') ?>" class="img-responsive" alt="" style="width: 200px; margin: 10px; border-radius: 5px;">
                <div class="options-container">
                    <label class="custom-radio-card">
                        <input type="radio" name="jawaban_latihan" value="a" required>
                        <div class="card-content">
                            <span class="choice-letter">a</span>
                            <img src="<?php echo base_url('assets3/images/CFIT 2a/Tes 4/Contoh 2/a.png') ?>" alt="Option A">
                        </div>
                    </label>

                    <label class="custom-radio-card">
                        <input type="radio" name="jawaban_latihan" value="b">
                        <div class="card-content">
                            <span class="choice-letter">b</span>
                            <img src="<?php echo base_url('assets3/images/CFIT 2a/Tes 4/Contoh 2/b.png') ?>" alt="Option B">
                        </div>
                    </label>

                    <label class="custom-radio-card">
                        <input type="radio" name="jawaban_latihan" value="c">
                        <div class="card-content">
                            <span class="choice-letter">c</span>
                            <img src="<?php echo base_url('assets3/images/CFIT 2a/Tes 4/Contoh 2/c.png') ?>" alt="Option C">
                        </div>
                    </label>

                    <label class="custom-radio-card">
                        <input type="radio" name="jawaban_latihan" value="d">
                        <div class="card-content">
                            <span class="choice-letter">d</span>
                            <img src="<?php echo base_url('assets3/images/CFIT 2a/Tes 4/Contoh 2/d.png') ?>" alt="Option D">
                        </div>
                    </label>

                    <label class="custom-radio-card">
                        <input type="radio" name="jawaban_latihan" value="e">
                        <div class="card-content">
                            <span class="choice-letter">e</span>
                            <img src="<?php echo base_url('assets3/images/CFIT 2a/Tes 4/Contoh 2/e.png') ?>" alt="Option E">
                        </div>
                    </label>
                </div>
                <hr style="border-top: 1px dashed #ddd;">
            </div>

            <div class="col-sm-12 text-center" style="margin-top: 30px;">
                <button type="submit" class="btn btn-primary btn-lg" style="padding: 10px 40px; border-radius: 25px;">Selanjutnya</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    var countDownDate = new Date("<?php echo $end_lat4 ?>").getTime();
    var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate - now;
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        document.getElementById("time").innerHTML = minutes + " : " + seconds + " ";
        if (distance < 0) {
            clearInterval(x);
            alert('Waktu latihan subtes 4 sudah berakhir, selamat mengerjakan subtes 4');
            window.location.href = '<?php echo base_url('Pelamar/Ujian/start_ujian_cfit_2a_subtes_4/' . $idUjian . '/4'); ?>';
        }
    }, 1000);
</script>

<?php $this->load->view('layout3/footer') ?>