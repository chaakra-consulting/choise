<?php $this->load->view('layout3/header') ?>
<style>
    /* Mengatur ukuran teks untuk nomor soal dan soal */
    .question-number,
    .question-text {
        font-size: 20px;
        color: #000000;
        font-weight: bold;
    }

    /* --- STYLING SELECTABLE CARDS --- */

    /* 1. Sembunyikan radio button bawaan */
    .hidden-radio {
        display: none;
    }

    /* 2. Ubah label menjadi block agar menutupi seluruh area card */
    .option-card {
        display: block;
        cursor: pointer;
        margin-bottom: 12px;
        font-weight: normal;
        /* Override bawaan label Bootstrap 3 yang bold */
    }

    /* 3. Styling desain visual kotak (Card) */
    .option-card .card-body {
        border: 2px solid #ddd;
        border-radius: 8px;
        padding: 15px 20px;
        background-color: #f9f9f9;
        font-size: 16px;
        color: #333;
        display: flex;
        align-items: center;

        /* FIX 1: Target specific properties instead of 'all' for smooth performance */
        transition: background-color 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease, transform 0.2s ease, color 0.2s ease;
        /* FIX 2: Hardware acceleration to prevent flickering */
        transform: translateZ(0);
    }

    /* Efek saat card di-hover */
    .option-card:hover .card-body {
        background-color: #f1f1f1;
        border-color: #ccc;
    }

    /* 4. Efek saat radio button terpilih (Checked State) */
    .hidden-radio:checked+.card-body {
        border-color: #337ab7;
        background-color: #e4f0f9;
        color: #337ab7;
        box-shadow: 0 4px 8px rgba(51, 122, 183, 0.15);

        /* FIX 3: Use text-shadow instead of font-weight to prevent layout jumping */
        text-shadow: 0 0 0.5px #337ab7;

        /* Optional: A very smooth, lightweight 'pop' effect when selected */
        transform: scale(1.01);
    }

    /* Label A, B, C, D (Opsional, agar rapi) */
    .option-prefix {
        font-weight: bold;
        margin-right: 15px;
        background: #fff;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #ddd;
    }

    .hidden-radio:checked+.card-body .option-prefix {
        background: #337ab7;
        color: white;
        border-color: #337ab7;
    }
</style>

<div class="col-sm-12 box">
    <div class="col-sm-6">
        <h3><b class="question-number">Soal Nomor <?php echo $learning_agility->nomor_soal ?></b></h3>
        <hr color="black">
    </div>
    <div class="col-md-7 col-sm-12" style="margin-bottom: 10px;">
        <form method="post">
            <div style="margin-bottom: 25px;">
                <p class="question-text"><?php echo $learning_agility->soal; ?></p>
            </div>

            <label class="option-card">
                <input class="hidden-radio" type="radio" name="jawaban" value="A" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "A") { ?> checked="checked" <?php } ?>>
                <div class="card-body">
                    <span class="option-prefix">A</span>
                    <span class="answer-option"><?php echo $learning_agility->opsi_a; ?></span>
                </div>
            </label>

            <label class="option-card">
                <input class="hidden-radio" type="radio" name="jawaban" value="B" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "B") { ?> checked="checked" <?php } ?>>
                <div class="card-body">
                    <span class="option-prefix">B</span>
                    <span class="answer-option"><?php echo $learning_agility->opsi_b; ?></span>
                </div>
            </label>

            <label class="option-card">
                <input class="hidden-radio" type="radio" name="jawaban" value="C" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "C") { ?> checked="checked" <?php } ?>>
                <div class="card-body">
                    <span class="option-prefix">C</span>
                    <span class="answer-option"><?php echo $learning_agility->opsi_c; ?></span>
                </div>
            </label>

            <label class="option-card">
                <input class="hidden-radio" type="radio" name="jawaban" value="D" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "D") { ?> checked="checked" <?php } ?>>
                <div class="card-body">
                    <span class="option-prefix">D</span>
                    <span class="answer-option"><?php echo $learning_agility->opsi_d; ?></span>
                </div>
            </label>

            <center>
                <input type="hidden" name="id_pelamar" value="<?php echo $this->session->userdata('ses_id') ?>">
                <input type="hidden" name="id_lowongan" value="<?php echo $this->session->userdata('sesIdLowongan') ?>">
                <input type="hidden" name="id_ujian" value="1">
                <input type="hidden" name="nomor_soal" value="<?php echo $learning_agility->nomor_soal ?>">

                <div class="baten" style="margin-top: 30px;">
                    <?php
                    $jumlahsoal = $this->db->query("SELECT count(id_soal) as jumlah from tb_soal_learning_agility")->result();
                    if ($learning_agility->nomor_soal != 1) { ?>
                        <button type="submit" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_learning_agility/1') ?>">
                            <i class="fa fa-arrow-circle-left"> </i> Sebelumnya
                        </button>
                    <?php } ?>

                    <?php if ($learning_agility->nomor_soal != intval($jumlahsoal[0]->jumlah)) { ?>
                        <button type="submit" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_learning_agility/2') ?>">
                            Selanjutnya <i class="fa fa-arrow-circle-right"></i>
                        </button>
                    <?php } ?>

                    <?php if ($learning_agility->nomor_soal >= intval($jumlahsoal[0]->jumlah)) { ?>
                        <button type="submit" class="btn btn-danger" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_endlearning_agility') ?>" onclick="return confirm('Apakah anda yakin ingin mengakhiri ujian?');">
                            Selesai <i class="fa fa-arrow-circle-right"></i>
                        </button>
                    <?php } ?>
                </div>
            </center>
        </form>
    </div>
    <?php $this->load->view('pelamar/ujian/learning_agility/panel_ujian'); ?>
</div>
<?php $this->load->view('layout3/footer') ?>