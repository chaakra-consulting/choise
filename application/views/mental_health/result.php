<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Choise - Mental Health Test Result</title>
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Roboto', Arial, sans-serif;
        }

        .result-card {
            background: #fff;
            border-radius: 8px;
            border: 1px solid #dadce0;
            padding: 30px;
            margin-top: 40px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header-strip {
            height: 10px;
            background-color: #FF6F00;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
        }


        .category-title {
            font-weight: 700;
            font-size: 18px;
            color: #202124;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .severity-label {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        /* Custom Colors for Levels */
        .level-Normal {
            color: #2ecc71;
        }

        .level-Ringan {
            color: #f1c40f;
        }

        .level-Sedang {
            color: #e67e22;
        }

        .level-Parah {
            color: #e74c3c;
        }

        .level-Sangat-Parah {
            color: #9b59b6;
        }

        .progress {
            height: 12px;
            border-radius: 10px;
            background-color: #eee;
        }

        .section-divider {
            border-top: 1px solid #eee;
            margin: 25px 0;
        }

        .btn-back {
            margin-top: 20px;
            border-radius: 20px;
            padding: 10px 30px;
        }

        @media print {

            a,
            button {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <?php $this->load->view('layout3/header2') ?>
    <?php $this->load->view('layout3/navbar') ?>
    <?php $this->load->view('talent_test/layout') ?>
    <div class="container">
        <p class="text-muted text-center" style="margin-top: 20px; font-size: 12px; margin-bottom: -20px;">
            *Hasil ini merupakan skrining awal dan bukan diagnosa klinis. <br>
            Silahkan konsultasikan dengan tenaga profesional jika diperlukan.
        </p>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="result-card">

                    <h2 class="text-center" style="margin-bottom: 30px;">Hasil Analisis</h2>

                    <div class="row">
                        <div class="col-sm-4">
                            <p class="category-title">Depresi</p>
                            <?php $d_lvl = $results['depression']['level']; ?>
                            <div class="severity-label level-<?= str_replace(' ', '-', $d_lvl) ?>">
                                <?= $d_lvl ?>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <p>Skor: <strong><?= $results['depression']['d_score'] ?></strong> / 42</p>
                            <div class="progress">
                                <div class="progress-bar progress-bar-<?= get_bootstrap_color($d_lvl) ?>"
                                    role="progressbar"
                                    style="width: <?= ($results['depression']['d_score'] / 42) * 100 ?>%">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-divider"></div>

                    <div class="row">
                        <div class="col-sm-4">
                            <p class="category-title">Kecemasan</p>
                            <?php $a_lvl = $results['anxiety']['level']; ?>
                            <div class="severity-label level-<?= str_replace(' ', '-', $a_lvl) ?>">
                                <?= $a_lvl ?>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <p>Skor: <strong><?= $results['anxiety']['a_score'] ?></strong> / 42</p>
                            <div class="progress">
                                <div class="progress-bar progress-bar-<?= get_bootstrap_color($a_lvl) ?>"
                                    role="progressbar"
                                    style="width: <?= ($results['anxiety']['a_score'] / 42) * 100 ?>%">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-divider"></div>

                    <div class="row">
                        <div class="col-sm-4">
                            <p class="category-title">Stres</p>
                            <?php $s_lvl = $results['stress']['level']; ?>
                            <div class="severity-label level-<?= str_replace(' ', '-', $s_lvl) ?>">
                                <?= $s_lvl ?>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <p>Skor: <strong><?= $results['stress']['s_score'] ?></strong> / 42</p>
                            <div class="progress">
                                <div class="progress-bar progress-bar-<?= get_bootstrap_color($s_lvl) ?>"
                                    role="progressbar"
                                    style="width: <?= ($results['stress']['s_score'] / 42) * 100 ?>%">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <a href="<?= base_url('Mental_health/test') ?>" class="btn btn-default btn-back">Ulangi Tes</a>
                        <button class="btn btn-primary btn-back" onclick="window.print()">Cetak Hasil</button>
                    </div>
                </div>

                <p class="text-muted text-center" style="margin-top: 20px; font-size: 12px;">
                    Reference: Lovibond, S.H. & Lovibond, P.F. (1995). Manual for the Depression Anxiety Stress Scales. (2nd. Ed.) Sydney: Psychology Foundation
                </p>

            </div>
        </div>
    </div>

</body>

</html>