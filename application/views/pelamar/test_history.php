<?php $this->load->view('layout3/header') ?>
<style>
    :root {
        --theme-purple: #FBC02D;
        --theme-light-purple: #ece8ff;
        --theme-text-dark: #3a405b;
        --theme-text-muted: #6b7280;
        --bg-body: #f4f7fa;
    }

    /* 1. INCREASED BASE FONT SIZE */
    html {
        font-size: 13px;
    }

    body {
        background-color: var(--bg-body);
        color: var(--theme-text-dark);
        font-size: 1rem;
        /* Adapts to the 18px root */
    }

    /* --- BS4 Utility Polyfills for BS3 Compatibility --- */
    .d-flex {
        display: flex !important;
    }

    .flex-column {
        flex-direction: column !important;
    }

    .align-items-center {
        align-items: center !important;
    }

    .align-items-end {
        align-items: flex-end !important;
    }

    .justify-content-between {
        justify-content: space-between !important;
    }

    .justify-content-around {
        justify-content: space-around !important;
    }

    .flex-wrap {
        flex-wrap: wrap !important;
    }

    .mb-0 {
        margin-bottom: 0 !important;
    }

    .mb-1 {
        margin-bottom: 5px !important;
    }

    .mb-2 {
        margin-bottom: 10px !important;
    }

    .mb-3 {
        margin-bottom: 15px !important;
    }

    .mb-4 {
        margin-bottom: 25px !important;
    }

    .mt-2 {
        margin-top: 10px !important;
    }

    .ml-1 {
        margin-left: 5px !important;
    }

    .ml-2 {
        margin-left: 10px !important;
    }

    .p-4 {
        padding: 25px !important;
    }

    .w-100 {
        width: 100% !important;
    }

    .w-75 {
        width: 75% !important;
    }

    .font-weight-bold {
        font-weight: 700 !important;
    }

    .shadow-sm {
        box-shadow: 0 2px 4px rgba(0, 0, 0, .075) !important;
    }

    .border-bottom-0 {
        border-bottom: 0 !important;
    }

    .text-muted {
        color: #6c757d !important;
    }

    /* --------------------------------------------------- */

    .text-theme {
        color: var(--theme-purple) !important;
    }

    .bg-theme {
        background-color: var(--theme-purple) !important;
        color: white;
    }

    .card {
        border: none;
        border-radius: 16px;
        box-shadow: 0 4px 15px rgba(92, 60, 230, 0.05);
        background-color: #ffffff;
        margin-bottom: 20px;
        display: block;
    }

    .card-title {
        color: var(--theme-purple);
        font-weight: 600;
        font-size: 1.3rem;
        /* Increased */
        margin-bottom: 1rem;
        margin-top: 0;
    }

    /* Student Details Card */
    .student-avatar {
        width: 100px;
        /* Scaled slightly for larger text */
        height: 100px;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid var(--theme-light-purple);
    }

    .detail-label {
        color: var(--theme-text-muted);
        font-size: 1rem;
        /* Increased */
        margin-bottom: 0.2rem;
    }

    .detail-value {
        font-weight: 600;
        color: var(--theme-text-dark);
        font-size: 1.15rem;
        /* Increased */
    }

    /* Final Score Card */
    .score-circle-container {
        position: relative;
        width: 120px;
        /* Scaled up */
        height: 120px;
    }

    .score-text-center {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 1.8rem;
        /* Increased */
        font-weight: bold;
    }

    .large-grade {
        font-size: 5.5rem;
        /* Increased drastically */
        font-weight: 700;
        line-height: 1;
        color: var(--theme-purple);
    }

    .score-disclaimer {
        font-size: 0.75rem;
        /* Increased */
        color: var(--theme-text-muted);
        font-style: italic;
        text-align: right;
        line-height: 1.3;
    }

    /* Tables */
    .table-custom th {
        color: var(--theme-purple);
        font-weight: 600;
        border-top: none !important;
        border-bottom: 2px solid var(--theme-light-purple) !important;
        font-size: 1.1rem;
        /* Increased */
        text-align: center;
        padding: 12px 8px !important;
    }

    .table-custom td {
        vertical-align: middle !important;
        color: var(--theme-text-dark);
        border-color: #f0f0f0 !important;
        font-size: 1.15rem;
        /* Increased */
        text-align: center;
        padding: 12px 8px !important;
    }

    /* Activities Progress Bars */
    .activity-grade {
        font-size: 2.3rem;
        /* Increased */
        font-weight: bold;
        color: var(--theme-purple);
        line-height: 1;
    }

    .activity-grade sup {
        font-size: 1.2rem;
    }

    .progress-custom {
        height: 8px;
        /* Thicker progress bar */
        border-radius: 6px;
        background-color: var(--theme-light-purple);
        overflow: visible;
        margin-top: 10px;
        box-shadow: none;
        margin-bottom: 0;
    }

    .progress-bar-custom {
        background-color: var(--theme-purple);
        border-radius: 6px;
        position: relative;
        box-shadow: none;
    }

    .progress-value-badge {
        position: absolute;
        right: 0;
        top: -26px;
        background: white;
        border: 1px solid #eee;
        padding: 3px 8px;
        border-radius: 4px;
        font-size: 0.85rem;
        /* Increased */
        font-weight: bold;
        color: var(--theme-text-muted);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    /* Grading Scale Banner */
    .grading-banner {
        border-radius: 12px;
        padding: 20px 25px;
        /* More padding */
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }

    .grading-banner span {
        font-size: 1.1rem;
        /* Increased */
        font-weight: 500;
        margin: 5px 10px;
    }

    /* Chart Containers */
    .line-chart-container {
        height: 250px;
        /* Taller chart to fit larger fonts */
        width: 100%;
    }

    /* Fix BS3 grid heights for the split row */
    .bs3-flex-row {
        display: flex;
        flex-wrap: wrap;
    }

    .locked-container {
        position: relative;
    }

    .blurred-content {
        /* Apply the blur effect */
        filter: blur(8px);
        /* Prevent users from clicking or selecting the text to bypass the blur */
        pointer-events: none;
        user-select: none;
        opacity: 0.7;
    }

    .premium-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 10;
        /* Slight dark overlay to make the text pop */
        background-color: rgba(0, 0, 0, 0.3);
        border-radius: 1rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 20px;
    }

    .premium-icon {
        font-size: 3rem;
        color: #ffc107;
        /* Bootstrap Warning Yellow */
        margin-bottom: 15px;
    }
</style>
<?php $this->load->view('layout3/navbar') ?>
<?php $this->load->view('layout3/sidebar') ?>

<div class="col-sm-9 col-sm-offset-4 col-lg-10 col-lg-offset-2" style="padding-bottom: 2rem;">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home color-amber"></em>
                </a></li>
            <li class="active">Dashboard</li>
        </ol>
    </div>


    <div class="row bs3-flex-row" style="padding-top: 2rem;">
        <!-- LEFT COLUMN -->
        <div class="col-md-7 col-sm-12">
            <div class="row">
                <div class="col-xs-12">
                    <div class="card p-4">
                        <div class="row bs3-flex-row" style="align-items: flex-end;">

                            <!-- Added col-sm-8 to take up 2/3 of the row on small screens -->
                            <div class="col-md-10 col-sm-8 col-xs-12 mb-3">
                                <label class="text-muted mb-2 font-weight-bold" style="font-size: 1.1rem;">Lowongan Kerja</label>
                                <select id="lowonganKerja" class="form-control form-control-custom">
                                    <option value="-">Pilih Lowongan Kerja</option>
                                    <?php foreach ($lowongan_kerja as $lowongan): ?>
                                        <option value="<?= $lowongan->id_lowongan ?>"><?= $lowongan->nama_jabatan ?> - <?= $lowongan->nama_perusahaan ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Added col-sm-4 to take up 1/3 of the row on small screens -->
                            <div class="col-md-2 col-sm-4 col-xs-12 mb-3">
                                <!-- Resized button: height reduced to 40px, font-size reduced to 1rem -->
                                <button id="filterBtn" class="btn btn-primary" style="height: 40px; border-radius: 10px; font-weight: bold; font-size: 1rem;">Filter</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- 1. Detail Pelamar -->
            <div class="card p-4">
                <h5 class="card-title">Detail Pelamar</h5>
                <div class="row d-flex align-items-center flex-wrap">
                    <div class="col-sm-3 col-xs-12 text-center mb-3">
                        <img src="<?php
                                    echo ($pelamar->foto != '' ? base_url('./upload/foto_pelamar/' . $pelamar->foto) : base_url('./upload/foto_pelamar/default.png'));

                                    ?>" alt="Student Avatar" class="student-avatar" alt="Foto Pelamar">
                    </div>
                    <div class="col-sm-9 col-xs-12">
                        <div class="row">
                            <div class="col-sm-4 col-xs-6 mb-3">
                                <div class="detail-label">Nama Pelamar:</div>
                                <div class="detail-value"><?php echo $data_pelamar[0]['nama_pelamar']; ?></div>
                                <div class="detail-label mt-2">Jenis Kelamin:</div>
                                <div class="detail-value"><?= $data_pelamar[0]['jenis_kelamin']; ?></div>
                            </div>
                            <div class="col-sm-4 col-xs-6 mb-3">
                                <div class="detail-label">Email:</div>
                                <div class="detail-value"><?= $pelamar->email; ?></div>
                                <div class="detail-label mt-2">Username:</div>
                                <div class="detail-value"><?= $pelamar->username; ?></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card p-4 w-100">
                <h5 class="card-title text-center">HOLLAND RIASEC</h5>
                <div class="chart-data" style="text-align: center;">
                    <h4 class="text-center">Filter berdasarkan lowongan yang sudah dilamar</h4>
                </div>
            </div>

            <!-- 2. Marks & Historical Chart Row -->
            <!-- <div class="row"> -->
            <!-- Marks Table -->
            <!-- <div class="col-md-5 col-xs-12 col-sm-12 d-flex">
                    <div class="card p-4 w-100">
                        <h5 class="card-title">Marks</h5>
                        <div class="table-responsive">
                            <table class="table table-custom mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-left" style="text-align: left;">Subjects</th>
                                        <th>Marks</th>
                                        <th colspan="2">Benchmark Range<br><span style="font-size:0.8rem; font-weight:normal;">Lower &nbsp;&nbsp;&nbsp; Upper</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-left" style="text-align: left;">English</td>
                                        <td>85</td>
                                        <td>85</td>
                                        <td>85</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left" style="text-align: left;">Maths</td>
                                        <td>78</td>
                                        <td>78</td>
                                        <td>78</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left" style="text-align: left;">Science</td>
                                        <td>65</td>
                                        <td>65</td>
                                        <td>65</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left" style="text-align: left;">History</td>
                                        <td>52</td>
                                        <td>52</td>
                                        <td>52</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left border-bottom-0" style="text-align: left;">Hindi</td>
                                        <td class="border-bottom-0">75</td>
                                        <td class="border-bottom-0">75</td>
                                        <td class="border-bottom-0">75</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> -->

            <!-- Historical Performance Chart -->
            <!-- <div class="col-md-10 col-sm-12 col-xs-12 d-flex">
                    <div class="card p-4 w-100">
                        <h5 class="card-title text-center">HOLLAND RISEC</h5>
                        <div class="chart-data" style="text-align: center;">
                            <h4 style=" padding-top: 45%;">Filter berdasarkan lowongan yang sudah dilamar</h4>
                        </div>
                    </div>
                </div> -->
            <!-- </div> -->

            <!-- 3. Total Grade Details -->
            <!-- <div class="card p-4 ">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title mb-0">Total Grade Details</h5>
                    <a href="#" class="text-muted small" style="font-style: italic;">See details <i class="fas fa-ellipsis-h ml-1"></i></a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-center mb-0" style="border-color: var(--theme-light-purple);">
                        <thead style="background-color: #faf9ff;">
                            <tr>
                                <th class="text-theme font-weight-bold" style="text-align: center;">Final Grade</th>
                                <th style="text-align: center;">A+</th>
                                <th style="text-align: center;">A</th>
                                <th style="text-align: center;">B+</th>
                                <th style="text-align: center;">B</th>
                                <th style="text-align: center;">C</th>
                                <th style="text-align: center;">D</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="font-weight-bold text-theme" style="font-size: 1.1rem;">B</td>
                                <td>2</td>
                                <td>5</td>
                                <td>6</td>
                                <td>8</td>
                                <td>2</td>
                                <td>1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> -->

        </div>

        <!-- RIGHT COLUMN -->
        <div class="col-md-5 col-sm-12 col-xs-12">
            <!-- Container holding both the overlay and the blurred content -->
            <div class="locked-container">

                <!-- The Locked Message Overlay -->
                <div class="premium-overlay">
                    <!-- Using a standard SVG lock icon (you can swap this for FontAwesome if you use it) -->
                    <svg class="premium-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z" />
                    </svg>
                    <h4 class="text-dark font-weight-bold">Konten Premium</h4>
                    <p class="text-dark"><strong>Lakukan upgrade untuk melihat konten ini</strong></p>
                    <button class="btn btn-warning mt-2"><strong>Lakukan Upgrade</strong></button>
                </div>

                <!-- The Original Content (Blurred) -->
                <div class="blurred-content">
                    <!-- 4. Final Score -->
                    <div class="card p-4 mb-3">
                        <h5 class="card-title">Final Score:</h5>
                        <div class="d-flex align-items-center justify-content-around mt-2">
                            <div class="score-circle-container">
                                <canvas id="scoreChart"></canvas>
                                <div class="score-text-center">82%</div>
                            </div>
                            <div class="d-flex flex-column align-items-end">
                                <div class="large-grade">B</div>
                                <div class="score-disclaimer mt-2 w-75">
                                    final grade based on both academic subjects as well as activities and conducts
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 5. Activities & Conduct -->
                    <div class="card p-4">
                        <h5 class="card-title">Activities & Conduct</h5>

                        <div class="mb-4">
                            <div class="activity-grade">A</div>
                            <div class="small text-theme mb-1">Attentiveness</div>
                            <div class="progress progress-custom">
                                <div class="progress-bar progress-bar-custom" role="progressbar" style="width: 91%;">
                                    <span class="progress-value-badge">91%</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="activity-grade">B</div>
                            <div class="small text-theme mb-1">Punctuality</div>
                            <div class="progress progress-custom">
                                <div class="progress-bar progress-bar-custom" role="progressbar" style="width: 85%;">
                                    <span class="progress-value-badge">85%</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="activity-grade">A<sup>+</sup></div>
                            <div class="small text-theme mb-1">Neat and Orderly</div>
                            <div class="progress progress-custom">
                                <div class="progress-bar progress-bar-custom" role="progressbar" style="width: 97%;">
                                    <span class="progress-value-badge">97%</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="activity-grade">B<sup>+</sup></div>
                            <div class="small text-theme mb-1">Extracurriculars</div>
                            <div class="progress progress-custom">
                                <div class="progress-bar progress-bar-custom" role="progressbar" style="width: 87%;">
                                    <span class="progress-value-badge">87%</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-2">
                            <div class="activity-grade">B<sup>+</sup></div>
                            <div class="small text-theme mb-1">Extracurriculars</div>
                            <div class="progress progress-custom">
                                <div class="progress-bar progress-bar-custom" role="progressbar" style="width: 87%;">
                                    <span class="progress-value-badge">87%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- 6. Grading Scale Footer Banner -->
    <div class="row">
        <div class="col-xs-12">

            <!-- Container holding both the overlay and the blurred content -->
            <div class="locked-container">

                <!-- The Locked Message Overlay (Adjusted horizontally for the slim banner) -->
                <div class="premium-overlay" style="flex-direction: row; gap: 15px; padding: 10px;">
                    <svg class="premium-icon" style="margin-bottom: 0; width: 24px; height: 24px;" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z" />
                    </svg>
                    <h6 class="text-dark font-weight-bold mb-0">Fitur Premium</h6>
                    <button class="btn btn-warning btn-sm m-0"><strong>Lakukan Upgrade</strong></button>
                </div>

                <!-- The Original Content (Blurred) -->
                <div class="bg-theme grading-banner shadow-sm blurred-content">
                    <h5 class="mb-0 font-weight-bold d-flex align-items-center" style="margin-top:0;">Grading Scale:</h5>
                    <span>A+: 100-96</span>
                    <span>A: 95-91</span>
                    <span>B+: 90-86</span>
                    <span>B: 85-81</span>
                    <span>C: 80-76</span>
                    <span>D: 75 Below</span>
                    <i class="far fa-question-circle text-white ml-2" style="font-size: 1.1rem; cursor:pointer;"></i>
                </div>

            </div>

        </div>
    </div>


</div>
<?php $this->load->view('layout3/footer') ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    $('#filterBtn').on('click', function() {
        if ($('#lowonganKerja').val() != '-') {
            $('.chart-data').empty().html(`  <div class="line-chart-container">
                                <canvas id="riasecChart"></canvas>
                            </div>
                            <div class="text-center mt-3">
                                <p id="recommendationText"></p>
                            </div>`);
            loadHollandChart($('#lowonganKerja').val());

        } else {
            $('.chart-data').empty().html(` <h4 class="text-center">Filter berdasarkan lowongan yang sudah dilamar</h4>`);
        }
    });
    const themePurple = '#FBC02D';
    const themeLight = '#ece8ff';

    // 1. Final Score Doughnut Chart
    const ctxScore = document.getElementById('scoreChart').getContext('2d');
    new Chart(ctxScore, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [82, 18],
                backgroundColor: [themePurple, themeLight],
                borderWidth: 0,
                cutout: '85%'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                tooltip: {
                    enabled: false
                }
            },
            animation: {
                animateScale: true
            }
        }
    });

    function loadHollandChart(id_lowongan, ) {
        $.ajax({
            url: '<?= base_url('Pelamar/Pelamar/load_holland') ?>?id_lowongan=' + id_lowongan,
            method: 'GET',
            success: function(response) {
                var hollandData = response.data;
                var recommendation = response.recommendation;
                console.log(response.data);
                $('#recommendationText').text(recommendation);
                if (hollandData != null) {
                    var riasecData = {
                        Realistic: hollandData.nilai_r,
                        Investigative: hollandData.nilai_i,
                        Artistic: hollandData.nilai_a,
                        Social: hollandData.nilai_s,
                        Enterprising: hollandData.nilai_e,
                        Conventional: hollandData.nilai_k
                    };

                    var ctxRiasec = document.getElementById('riasecChart').getContext('2d');

                    new Chart(ctxRiasec, {
                        type: 'polarArea',
                        data: {
                            labels: [
                                'Realistic (R)',
                                'Investigative (I)',
                                'Artistic (A)',
                                'Social (S)',
                                'Enterprising (E)',
                                'Conventional (C)'
                            ],
                            datasets: [{
                                data: [
                                    riasecData.Realistic,
                                    riasecData.Investigative,
                                    riasecData.Artistic,
                                    riasecData.Social,
                                    riasecData.Enterprising,
                                    riasecData.Conventional
                                ],
                                // Colors mapped to each category
                                backgroundColor: [
                                    '#e74a3b', // Red for Realistic
                                    '#4e73df', // Blue for Investigative
                                    '#f6c23e', // Yellow for Artistic
                                    '#1cc88a', // Green for Social
                                    '#36b9cc', // Cyan for Enterprising
                                    '#858796' // Gray for Conventional
                                ],
                                borderWidth: 2,
                                borderColor: '#ffffff',
                                hoverOffset: 5
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    position: 'right', // Puts the legend on the right side
                                    labels: {
                                        font: {
                                            size: 12,
                                            family: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"
                                        },
                                        color: '#6b7280',
                                        usePointStyle: true,
                                        padding: 15
                                    }
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            return ` ${context.label}: ${context.raw} pts`;
                                        }
                                    }
                                }
                            },
                            cutout: '65%', // Controls the thickness of the donut ring
                            animation: {
                                animateScale: true,
                                animateRotate: true
                            }
                        }
                    });
                } else {
                    $('.chart-data').empty().html(` <h4 class="text-center">Nilai ujian di lowongan tersebut tidak ditemukan</h4>`);
                }

            },
            error: function(xhr, status, error) {
                console.error('Error fetching Holland data:', error);
            }
        })

    }
</script>