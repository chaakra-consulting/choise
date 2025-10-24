<?php $this->load->view('layout3/header') ?>
<?php $this->load->view('layout3/navbar') ?>

<style>
    .question-number, .question-text {
        font-size: 20px;
		color: white;
		font-weight: bold;
    }

    .answer-option {
        font-size: 16px;
		color: white;
		text-align: middle; 
	
    }

	.form-check.col-sm-2.text-center input[type="radio"] {
        transform: scale(1.5);
        margin-top: -5px;
	}

	.form-check-input,
	.answer-option {
        display: inline-block;
        vertical-align: middle;
	}

	.form-check {
        display: flex;
        align-items: center;
	}

	.form-check {
        display: grid;
        grid-template-columns: auto auto;
        align-items: center;
    }

    .underlined-text {
        text-decoration: underline;
        line-height: 1.5;
    }
</style>

<div class="col-sm-12 main">
	<div class="row" style="margin-bottom: -50px;">
		<div class="col-lg-9">
			<h3><b>Latihan</b></h3>
		</div>
		<div class="col-lg-3">
			<h4 style="margin-top: 35px" align="right">Waktu latihan <span id="time"></span> detik</h4>
		</div>
	</div>
	<?php
    $idUjian = $this->session->userdata('ses_cepat');
    $ujian = $this->db->query("SELECT * FROM tb_ujian_cepat WHERE id_ujian_cepat = $idUjian");
	foreach ($ujian->result() as $key ) {
		$endlat = $key->end_lat;
	}
    $id_pelamar = $this->session->userdata('ses_id');
    ?>
    <div class="col-sm-12" style="background-color: #000000; padding: 30px; border-radius: 5px; margin-bottom: 20px;">
        <h4 style="color: #fff;"><b>Petunjuk Pengerjaan</b></h4><br>
        <p style="color: #fff;">1. di soal ada 5 kombinasi huruf atau angka</p>
        <p style="color: #fff;">2. Carilah "SATU KESAMAAN" kombinasi huruf dan angka yang "<u>DIGARISBAWAHI</u>" di soal dengan pilihan jawaban yang sudah disediakan.</li>
        <p style="color: #fff;">3. Cobalah untuk mengerjakan contoh soal di bawah ini! Apapun jawaban anda pada tahap latihan ini tidak akan dihitung poinnya.</p>
        <br>
        <h4><li style="color: #fff;"><b>Contoh soal:</b></h4>
        <br>
        <div class="question-text" style="margin: 5px;">
            <p style="color: #fff;">1. <u>nv</u> nx xn vx xv</p>
            <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
                <label class="answer-option" for="latcfit1a">xn</label>
                <input class="form-check-input" type="radio" name="latcfit1" id="latcfit1a" value="b">
            </div>
            <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
                <label class="answer-option" for="latcfit1b">vx</label>
                <input class="form-check-input" type="radio" name="latcfit1" id="latcfit1b" value="b">
            </div>
            <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
                <label class="answer-option" for="latcfit1c">xv</label>
                <input class="form-check-input" type="radio" name="latcfit1" id="latcfit1c" value="b">
            </div>
            <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
                <label class="answer-option" for="latcfit1d">nv</label>
                <input class="form-check-input" type="radio" name="latcfit1" id="latcfit1d" value="b">
            </div>
            <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
                <label class="answer-option" for="latcfit1e">nx</label>
                <input class="form-check-input" type="radio" name="latcfit1" id="latcfit1e" value="b">
            </div>
            <br>
            <br>
            <p style="color: #fff;">2. 2h h4 42 <u>4h</u> 24</p>
            <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
                <label class="answer-option" for="latcfit2a">24</label>
                <input class="form-check-input" type="radio" name="latcfit2" id="latcfit2a" value="b">
            </div>
            <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
                <label class="answer-option" for="latcfit2b">h4</label>
                <input class="form-check-input" type="radio" name="latcfit2" id="latcfit2b" value="b">
            </div>
            <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
                <label class="answer-option" for="latcfit2c">42</label>
                <input class="form-check-input" type="radio" name="latcfit2" id="latcfit2c" value="b">
            </div>
            <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
                <label class="answer-option" for="latcfit2d">2h</label>
                <input class="form-check-input" type="radio" name="latcfit2" id="latcfit2d" value="b">
            </div>
            <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
                <label class="answer-option" for="latcfit2e">4h</label>
                <input class="form-check-input" type="radio" name="latcfit2" id="latcfit2e" value="b">
            </div>
            <br>
            <br>
            <p style="color: #fff;">3. RB <u>RD</u> DR BR BD</p>
            <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
                <label class="answer-option" for="latcfit2a">BR</label>
                <input class="form-check-input" type="radio" name="latcfit3" id="latcfit3a" value="b">
            </div>
            <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
                <label class="answer-option" for="latcfit2b">DR</label>
                <input class="form-check-input" type="radio" name="latcfit3" id="latcfit3b" value="b">
            </div>
            <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
                <label class="answer-option" for="latcfit2c">BD</label>
                <input class="form-check-input" type="radio" name="latcfit3" id="latcfit3c" value="b">
            </div>
            <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
                <label class="answer-option" for="latcfit2d">RB</label>
                <input class="form-check-input" type="radio" name="latcfit3" id="latcfit3d" value="b">
            </div>
            <div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
                <label class="answer-option" for="latcfit2e">RD</label>
                <input class="form-check-input" type="radio" name="latcfit3" id="latcfit3e" value="b">
            </div>
        </div>
        <div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin-top: 20px; margin-bottom: 20px">
            <a href="<?php echo base_url('Pelamar/Ujian/jawaban_latihan/'); ?>" class="btn btn-primary mr-2 mb-2">Masukkan Jawaban</a>     
        </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    var countDownDate = new Date("<?php echo $endlat ?>").getTime();
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
            alert('Waktu latihan sudah berakhir, selamat mengerjakan');
            window.location.href = '<?php echo base_url('Pelamar/Ujian/start_ujian_cepat/'.$idUjian); ?>';
        }
    }, 1000);
</script>
<?php $this->load->view('layout3/footer') ?>