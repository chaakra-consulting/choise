<?php $this->load->view('layout3/header') ?>
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
<div class="col-sm-12 box">
    <div class="col-sm-6">
        <h4><b>Subtes <?php echo $soal_subtes3->subtes; ?></b></h4>
        <h3><b>Soal Nomor <?php echo $soal_subtes3->nomor_soal ?></b></h3>
        <!-- <p id="time"></p> -->
        <hr color="black">
    </div>
    <div class="col-md-7 col-sm-12" style="margin-bottom: 5px;">
        <form method="post">
            <div class="col-sm-12">
                <img src="<?php echo base_url("assets3/images/CFIT 2a/Tes 3/Soal $soal_subtes3->nomor_soal/soal-$soal_subtes3->nomor_soal.png") ?>" class="img-responsive" alt="Soal <?= $soal_subtes3->nomor_soal ?>" style="width: 200px; margin-bottom: 15px; border-radius: 5px;">

                <div class="options-container">
                    <label class="custom-radio-card">
                        <input type="radio" name="jawaban" value="A" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "A") { ?> checked="checked" <?php } ?>>
                        <div class="card-content">
                            <span class="choice-letter">a</span>
                            <img src="<?php echo base_url("assets3/images/CFIT 2a/Tes 3/Soal $soal_subtes3->nomor_soal/a.png") ?>" alt="Option A">
                        </div>
                    </label>

                    <label class="custom-radio-card">
                        <input type="radio" name="jawaban" value="B" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "B") { ?> checked="checked" <?php } ?>>
                        <div class="card-content">
                            <span class="choice-letter">b</span>
                            <img src="<?php echo base_url("assets3/images/CFIT 2a/Tes 3/Soal $soal_subtes3->nomor_soal/b.png") ?>" alt="Option B">
                        </div>
                    </label>

                    <label class="custom-radio-card">
                        <input type="radio" name="jawaban" value="C" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "C") { ?> checked="checked" <?php } ?>>
                        <div class="card-content">
                            <span class="choice-letter">c</span>
                            <img src="<?php echo base_url("assets3/images/CFIT 2a/Tes 3/Soal $soal_subtes3->nomor_soal/c.png") ?>" alt="Option C">
                        </div>
                    </label>

                    <label class="custom-radio-card">
                        <input type="radio" name="jawaban" value="D" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "D") { ?> checked="checked" <?php } ?>>
                        <div class="card-content">
                            <span class="choice-letter">d</span>
                            <img src="<?php echo base_url("assets3/images/CFIT 2a/Tes 3/Soal $soal_subtes3->nomor_soal/d.png") ?>" alt="Option D">
                        </div>
                    </label>

                    <label class="custom-radio-card">
                        <input type="radio" name="jawaban" value="E" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "E") { ?> checked="checked" <?php } ?>>
                        <div class="card-content">
                            <span class="choice-letter">e</span>
                            <img src="<?php echo base_url("assets3/images/CFIT 2a/Tes 3/Soal $soal_subtes3->nomor_soal/e.png") ?>" alt="Option E">
                        </div>
                    </label>
                </div>
                <hr style="border-top: 1px dashed #ddd;">


            </div>
            <center>
                <input type="hidden" name="id_pelamar" value="<?php echo $this->session->userdata('ses_id') ?>">
                <input type="hidden" name="id_lowongan" value="<?php echo $this->session->userdata('sesIdLowongan') ?>">
                <input type="hidden" name="id_ujian" value="<?php echo $this->session->userdata('ses_ujian') ?>">
                <input type="hidden" name="nomor_soal" value="<?php echo $soal_subtes3->nomor_soal ?>">
                <input type="hidden" name="subtes" value="<?php echo $soal_subtes3->subtes ?>">
                <input type="hidden" name="kunci_jawaban" value="<?php echo $soal_subtes3->jawaban ?>">
                <div class="baten">
                    <?php if ($soal_subtes3->nomor_soal != 1 && $soal_subtes3->subtes == 3) { ?>
                        <button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_cfit_2a_subtes_3/1') ?>"> <i class="fa fa-arrow-circle-left"> </i> Sebelumnya
                        </button>
                    <?php } ?>
                    <!-- <button type="submit" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_cfit_2a_subtes_1/0') ?>"> Konfirmasi -->
                    </button>
                    <?php if ($soal_subtes3->nomor_soal != 12 && $soal_subtes3->subtes == 3) { ?>
                        <button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_cfit_2a_subtes_3/2') ?>"> Selanjutnya <i class="fa fa-arrow-circle-right"></i>
                        </button>
                    <?php } ?>
                    <?php if ($soal_subtes3->nomor_soal >= 12 && $soal_subtes3->subtes == 3) { ?>
                        <button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_end_cfit_2a_subtes_3') ?>" class="btn btn-primary"> Subtes 4 <i class="fa fa-arrow-circle-right"></i>
                        </button>
                    <?php } ?>
                </div>
            </center>
        </form>
    </div>
    <?php $this->load->view('pelamar/ujian/panel_ujian_cfit_2a_3'); ?>
</div>
<?php $this->load->view('layout3/footer') ?>