<?php $this->load->view('layout3/header'); ?>
<?php $this->load->view('layout3/navbar'); ?>
<?php $this->load->view('layout3/sidebar'); ?>
<?php $this->load->view('talent_test/layout'); ?>

<style>
    .exam-result-card {
        background-color: var(--bg-card);
        border-radius: var(--border-radius);
        box-shadow: var(--shadow);
        border: 1px solid var(--border-color);
        margin-bottom: 20px;
        overflow: hidden;
    }

    .exam-result-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        color: var(--text-light);
        padding: 15px 20px;
        font-weight: 600;
        font-size: 1.1em;
    }

    .exam-result-body {
        padding: 20px;
    }

    .result-metric {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        padding: 10px 15px;
        background-color: var(--bg-main);
        border-radius: 8px;
        border: 1px solid var(--border-color);
    }

    .metric-label {
        font-weight: 600;
        color: var(--text-secondary);
    }

    .metric-value {
        font-size: 1.2em;
        font-weight: 700;
        color: var(--text-dark);
    }

    .interpretation-box {
        background-color: var(--primary-light);
        border: 1px solid var(--primary-color);
        border-radius: var(--border-radius);
        padding: 15px;
        margin-top: 15px;
    }

    .interpretation-title {
        font-weight: 600;
        color: var(--primary-dark);
        margin-bottom: 8px;
    }

    .interpretation-text {
        color: var(--text-dark);
        line-height: 1.5;
    }

    .no-results {
        text-align: center;
        padding: 40px 20px;
        color: var(--text-secondary);
    }

    .no-results i {
        font-size: 3em;
        margin-bottom: 15px;
        opacity: 0.5;
    }
</style>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><em class="fa fa-dashboard"></em></a></li>
            <li class="active">Hasil Ujian Talent Test</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <i class="fa fa-folder-open"></i> Hasil Ujian Talent Test
            </h1>
            <p>Paket: <strong><?php echo $paket['nama_paket']; ?></strong></p>
        </div>
    </div>

    <div id="notifikasi">
        <?php if ($this->session->flashdata('msg')) : ?>
            <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('msg') ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('msg_update')) : ?>
            <div class="alert alert-info"><i class="fa fa-info-circle"></i> <?php echo $this->session->flashdata('msg_update') ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('msg_hapus')) : ?>
            <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> <?php echo $this->session->flashdata('msg_hapus') ?></div>
        <?php endif; ?>
    </div>

    <?php if (!empty($exam_results)): ?>
        <div class="row">
            <?php foreach ($exam_results as $exam): ?>
                <div class="col-lg-6">
                    <div class="exam-result-card">
                        <div class="exam-result-header">
                            <i class="fa fa-brain"></i> <?php echo $exam['exam_name']; ?>
                        </div>
                        <div class="exam-result-body">
                            <?php if ($exam['exam_type'] == 'disc' && isset($exam['result']['raw_scores'])): ?>
                                <h5 style="font-weight: bold; margin-bottom: 15px;">Grafik Topeng (Most) - Graph 1</h5>
                                <table class="table table-bordered table-striped" style="margin-bottom: 25px;">
                                    <thead>
                                        <tr style="background-color: #f2f2f2;">
                                            <th>Dimensi</th>
                                            <th>Skor Mentah</th>
                                            <th>Skor Konversi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($exam['result']['raw_scores']['graph1'] as $dim => $score): ?>
                                        <tr>
                                            <td><strong><?php echo $dim; ?></strong></td>
                                            <td><?php echo $score; ?></td>
                                            <td><?php echo $exam['result']['converted_scores']['graph1'][$dim]; ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                                <h5 style="font-weight: bold; margin-bottom: 15px;">Grafik Asli (Least) - Graph 2</h5>
                                <table class="table table-bordered table-striped" style="margin-bottom: 25px;">
                                    <thead>
                                        <tr style="background-color: #f2f2f2;">
                                            <th>Dimensi</th>
                                            <th>Skor Mentah</th>
                                            <th>Skor Konversi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($exam['result']['raw_scores']['graph2'] as $dim => $score): ?>
                                        <tr>
                                            <td><strong><?php echo $dim; ?></strong></td>
                                            <td><?php echo $score; ?></td>
                                            <td><?php echo $exam['result']['converted_scores']['graph2'][$dim]; ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <h5 style="font-weight: bold; margin-bottom: 15px;">Grafik Perubahan (Change) - Graph 3</h5>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr style="background-color: #f2f2f2;">
                                            <th>Dimensi</th>
                                            <th>Skor Mentah</th>
                                            <th>Skor Konversi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($exam['result']['raw_scores']['graph3'] as $dim => $score): ?>
                                        <tr>
                                            <td><strong><?php echo $dim; ?></strong></td>
                                            <td><?php echo $score; ?></td>
                                            <td><?php echo $exam['result']['converted_scores']['graph3'][$dim]; ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <?php if (isset($exam['result']['total_soal'])): ?>
                                    <div class="result-metric">
                                        <span class="metric-label">Total Soal</span>
                                        <span class="metric-value"><?php echo $exam['result']['total_soal']; ?></span>
                                    </div>
                                <?php endif; ?>

                                <?php if (isset($exam['result']['jawaban_benar'])): ?>
                                    <div class="result-metric">
                                        <span class="metric-label">Jawaban Benar</span>
                                        <span class="metric-value"><?php echo $exam['result']['jawaban_benar']; ?></span>
                                    </div>
                                <?php endif; ?>

                                <?php if (isset($exam['result']['skor'])): ?>
                                    <div class="result-metric">
                                        <span class="metric-label">Skor</span>
                                        <span class="metric-value"><?php echo round($exam['result']['skor'], 2); ?></span>
                                    </div>
                                <?php endif; ?>

                                <?php if (isset($exam['result']['nilai']) && is_string($exam['result']['nilai'])): ?>
                                    <div class="result-metric">
                                        <span class="metric-label">Nilai</span>
                                        <span class="metric-value"><?php echo $exam['result']['nilai']; ?></span>
                                    </div>
                                <?php endif; ?>

                                <?php if (isset($exam['result']['interpretasi'])): ?>
                                    <div class="interpretation-box">
                                        <div class="interpretation-title">
                                            <i class="fa fa-info-circle"></i> Interpretasi
                                        </div>
                                        <div class="interpretation-text">
                                            <?php echo $exam['result']['interpretasi']; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if (isset($exam['result']['kategori_utama'])): ?>
                                    <div class="result-metric">
                                        <span class="metric-label">Kategori Utama</span>
                                        <span class="metric-value"><?php echo $exam['result']['kategori_utama']; ?></span>
                                    </div>
                                    <div class="result-metric">
                                        <span class="metric-label">Kategori Pendukung</span>
                                        <span class="metric-value"><?php echo $exam['result']['kategori_pendukung']; ?></span>
                                    </div>
                                <?php endif; ?>

                                <?php if (isset($exam['result']['dimensi_dominan'])): ?>
                                    <div class="result-metric">
                                        <span class="metric-label">Dimensi Dominan</span>
                                        <span class="metric-value"><?php echo $exam['result']['dimensi_dominan']; ?></span>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="no-results">
            <i class="fa fa-folder-open-o"></i>
            <h4>Belum ada hasil ujian</h4>
            <p>Anda belum menyelesaikan ujian apapun dalam paket ini.</p>
        </div>
    <?php endif; ?>
</div>

<?php $this->load->view('layout3/footer'); ?>