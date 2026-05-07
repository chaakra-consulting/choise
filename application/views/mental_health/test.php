<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Choise - Mental Health Test</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

    <style>
        body {
            background-color: #ede7f6;
            /* Classic light purple background */
            font-family: 'Roboto', Arial, sans-serif;
            padding-top: 40px;
            padding-bottom: 40px;
        }

        /* The main "Card" container */
        .form-card {
            background: #fff;
            border-radius: 8px;
            border: 1px solid #dadce0;
            margin-bottom: 12px;
            padding: 24px;
            position: relative;
            overflow: hidden;
        }

        /* The purple header strip */
        .header-strip {
            height: 10px;
            background-color: #FF6F00;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
        }

        .form-title {
            font-size: 32px;
            margin-top: 10px;
            margin-bottom: 8px;
        }

        .form-description {
            font-size: 14px;
            color: #202124;
        }

        .question-title {
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 15px;
            color: #202124;
        }

        /* Cleaning up Bootstrap's default input styling */
        .form-control {
            border: none;
            border-bottom: 1px solid #ddd;
            border-radius: 0;
            box-shadow: none;
            padding-left: 0;
        }

        .form-control:focus {
            border-bottom: 2px solid #673ab7;
            box-shadow: none;
        }

        .btn-submit {
            background-color: #673ab7;
            color: white;
            padding: 8px 24px;
            border-radius: 4px;
            font-weight: bold;
        }

        .btn-submit:hover {
            background-color: #5e35b1;
            color: white;
        }

        /* Container for the whole scale row */
        .scale-container {
            display: table;
            width: 100%;
            margin-top: 20px;
            table-layout: fixed;
        }

        /* The "Not likely" and "Very likely" text */
        .scale-label {
            display: table-cell;
            vertical-align: bottom;
            width: 80px;
            padding-bottom: 5px;
            font-size: 13px;
            color: #70757a;
        }

        .scale-label:last-child {
            text-align: right;
        }

        /* The wrapper for the 1-5 circles */
        .scale-options {
            display: table-cell;
            text-align: center;
            vertical-align: top;
        }

        /* Individual number + radio column */
        .scale-item {
            display: inline-block;
            width: 50px;
            text-align: center;
        }

        .scale-item label {
            display: block;
            margin-bottom: 10px;
            font-weight: 500;
        }

        /* Make radios a bit bigger like G-Forms */
        .scale-item input[type="radio"] {
            margin: 0 auto;
            cursor: pointer;
        }

        .btn-primary:focus {
            background-color: #FBC02D !important;
            border-color: #FBC02D !important;
            styl
        }
    </style>
</head>

<body>
    <?php $this->load->view('layout3/header2') ?>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">

                <a class="navbar-brand" href="#"><span>Chaakra</span>Choise</a>

            </div>
        </div><!-- /.container-fluid -->
    </nav>
    <?php $this->load->view('talent_test/layout') ?>
    <div class="container">
        <div class="row">
            <form action="<?= base_url('mental_health/result') ?>" method="POST">
                <div class="col-md-12">

                    <!-- <div class="form-card">
                    <div class="header-strip"></div>
                    <h1 class="form-title">Event Registration</h1>
                    <p class="form-description">Please fill out the form below to secure your spot. Fields marked with * are required.</p>
                </div> -->

                    <div class="form-card" style="margin-top: 2rem;">
                        <div class="form-group">
                            <label class="question-title">Nama Lengkap <span class="text-danger">*</span></label>
                            <input required type="text" class="form-control" name="nama" placeholder="Jawaban Anda">
                        </div>
                    </div>


                    <?php
                    foreach ($questions as $question) { ?>
                        <div class="form-card">
                            <label class="question-title"><?= $question['no'] ?>. <?= $question['pertanyaan'] ?> <span class="text-danger">*</span></label>

                            <div class="scale-container">
                                <div class="scale-label">Tidak Pernah</div>

                                <div class="scale-options">
                                    <div class="scale-item">
                                        <label>0</label>
                                        <input required type="radio" name="scale_<?= $question['no'] ?>" value="0">
                                    </div>
                                    <div class="scale-item">
                                        <label>1</label>
                                        <input required type="radio" name="scale_<?= $question['no'] ?>" value="1">
                                    </div>
                                    <div class="scale-item">
                                        <label>2</label>
                                        <input required type="radio" name="scale_<?= $question['no'] ?>" value="2">
                                    </div>
                                    <div class="scale-item">
                                        <label>3</label>
                                        <input required type="radio" name="scale_<?= $question['no'] ?>" value="3">
                                    </div>

                                </div>

                                <div class="scale-label">Sangat Sering</div>
                            </div>
                        </div>
                    <?php }
                    ?>



                    <div class="pull-right" style="margin-bottom: 50px;">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <?php $this->load->view('layout3/footer') ?>
</body>

</html>