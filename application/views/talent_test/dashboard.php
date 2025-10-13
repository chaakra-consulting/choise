<?php $this->load->view('layout3/header'); ?>
<?php $this->load->view('layout3/navbar'); ?>
<?php $this->load->view('layout3/sidebar'); ?>
<?php $this->load->view('talent_test/layout'); ?>
<style>
    .panel {
        border: none;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow);
    }

    .main {
        padding-top: 25px;
    }

    .breadcrumb {
        background-color: var(--bg-card);
        border-radius: var(--border-radius);
        padding: 12px 20px;
        margin-bottom: 25px;
        box-shadow: var(--shadow);
        border: 1px solid var(--border-color);
        margin-right: 15px;
        margin-left: 15px;
    }

    .breadcrumb-item a {
        color: var(--primary-dark);
        font-weight: 500;
        text-decoration: none;
    }

    .breadcrumb-item.active {
        color: var(--text-dark);
        font-weight: 600;
    }

    .welcome-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        color: var(--text-dark);
        padding: 30px 25px;
        margin-bottom: 25px;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow);
    }

    .welcome-header h1 {
        font-size: 2em;
        font-weight: 700;
        margin: 0;
    }

    .welcome-header p {
        font-size: 1em;
        opacity: 0.9;
        margin-top: 5px;
    }

    .stats-overview {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 15px;
        margin-bottom: 25px;
    }

    .stat-card {
        background: var(--bg-card);
        border-radius: var(--border-radius);
        padding: 20px;
        text-align: center;
        box-shadow: var(--shadow);
        border: 1px solid var(--border-color);
    }

    .stat-number {
        font-size: 2em;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 5px;
    }

    .stat-label {
        font-size: 0.85em;
        color: var(--text-secondary);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .info-card {
        background-color: var(--bg-card);
        border-radius: var(--border-radius);
        box-shadow: var(--shadow);
        border: 1px solid var(--border-color);
        margin-bottom: 25px;
    }

    .info-card .card-header {
        background-color: transparent;
        border-bottom: 1px solid var(--border-color);
        padding: 18px 20px;
        font-weight: 600;
        color: var(--text-dark);
        font-size: 1.1em;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .info-card .card-body {
        padding: 20px;
    }

    .countdown-timer {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 20px;
    }

    .countdown-box {
        background-color: var(--bg-main);
        padding: 15px;
        border-radius: var(--border-radius);
        width: 90px;
        text-align: center;
        border: 1px solid var(--border-color);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .countdown-number {
        font-size: 2.5em;
        font-weight: 700;
        color: var(--text-dark);
        line-height: 1;
        margin-bottom: 5px;
    }

    .countdown-label {
        font-size: 0.8em;
        color: var(--text-secondary);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
    }

    .exam-item {
        background-color: var(--bg-card);
        border-radius: var(--border-radius);
        box-shadow: var(--shadow);
        border: 1px solid var(--border-color);
        border-left-width: 4px;
        padding: 20px;
        margin-bottom: 15px;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .exam-item.completed { border-left-color: var(--success-color); }
    .exam-item.in-progress { border-left-color: var(--primary-color); }
    .exam-item.not-started { border-left-color: var(--border-color); }

    .status-badge {
        padding: 4px 10px;
        border-radius: 15px;
        font-size: 0.7em;
        font-weight: 600;
        text-transform: uppercase;
    }

    .status-completed { background-color: var(--success-light); color: var(--success-color); }
    .status-in-progress { background-color: var(--primary-light); color: var(--primary-dark); }
    .status-not-started { background-color: #f1f3f5; color: var(--text-secondary); }

    .btn-custom {
        border-radius: 20px;
        padding: 8px 20px;
        font-weight: 600;
        font-size: 0.85em;
        border: none;
        transition: var(--transition);
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: var(--text-dark);
    }

    .btn-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .btn-start, .btn-continue {
        background: var(--primary-color);
    }

    .btn-start:hover, .btn-continue:hover {
        background: var(--primary-dark);
    }

    .btn-result {
        background-color: var(--success-color);
        color: var(--text-light);
    }

    .btn-disabled {
        background-color: #ced4da;
        color: #6c757d;
        cursor: not-allowed;
        box-shadow: none;
    }

    .alert {
        border-radius: var(--border-radius);
        border: none;
        padding: 12px 18px;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 8px;
        color: var(--text-light);
        box-shadow: var(--shadow);
    }

    .alert-success { background: var(--success-color); }
    .alert-warning { background: var(--primary-color); color: var(--text-dark); }
    .alert-danger { background: var(--danger-color); }
    .alert-info { background: #17a2b8; }

    .btn-start-exam {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        border: none;
        border-radius: 20px;
        padding: 10px 20px;
        font-size: 1em;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 2px 8px rgba(40, 167, 69, 0.2);
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .btn-start-exam:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
    }

    @media (max-width: 768px) {
        .welcome-header h1 {
            font-size: 1.6em;
        }
        .countdown-timer {
            gap: 10px;
        }
        .countdown-box {
            width: 65px;
            padding: 10px;
        }
        .countdown-number {
            font-size: 2em;
        }
        .stats-overview {
            grid-template-columns: 1fr 1fr;
        }
    }
</style>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><em class="fa fa-dashboard"></em></a></li>
            <li class="active">Dashboard Talent Test</li>
        </ol>
    </div>

    <div class="welcome-header">
        <h1 style="color: black;"><i class="fa fa-graduation-cap"></i> Dashboard Talent Test</h1>
        <p style="color: white"><b>Selamat datang, <?php echo $this->session->userdata('talent_test_user_name'); ?>. Siap untuk memulai?</b></p>
    </div>

    <!-- Stats Overview -->
    <div class="stats-overview">
        <?php
        $total_exams = count($ujian_list);
        $completed_exams = 0;
        $total_duration = 0;
        foreach ($ujian_list as $ujian) {
            $exam_type = $ujian['jenis_ujian'];
            $progress = $progress_data[$exam_type] ?? null;
            if ($progress && $progress['answered_questions'] >= $progress['total_questions']) {
                $completed_exams++;
            }
            $total_duration += $ujian['durasi'] ?? 0;
        }
        ?>
        <div class="stat-card">
            <div class="stat-number"><?php echo $total_exams; ?></div>
            <div class="stat-label">Total Ujian</div>
        </div>
        <div class="stat-card">
            <div class="stat-number"><?php echo $total_duration; ?> menit</div>
            <div class="stat-label">Total Durasi</div>
        </div>
        <div class="stat-card">
            <div class="stat-number"><?php echo $total_exams - $completed_exams; ?></div>
            <div class="stat-label">Belum Selesai</div>
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

    <!-- Countdown Section -->
    <?php if (isset($jadwal_test) && !empty($jadwal_test) && $jadwal_test != '0000-00-00 00:00:00'): ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="info-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div><i class="fa fa-clock"></i> Jadwal Ujian</div>
                        <div id="countdown-alert" class="text-warning font-weight-bold"></div>
                    </div>
                    <div class="card-body text-center">
                        <h4>Informasi Jadwal</h4>
                        <p class="mb-3">Ujian Anda dijadwalkan pada:</p>
                        <h5 class="text-primary">
                            <?php echo date(' d F Y, H:i', strtotime($jadwal_test)); ?> WIB
                        </h5>
                        <?php if (isset($countdown_status) && is_array($countdown_status) && $countdown_status['can_start']): ?>
                            <div class="mt-4">
                                <a href="<?php echo site_url('talent-test/exam-list'); ?>" class="btn-start-exam">
                                    <i class="fa fa-play"></i> Mulai Ujian Sekarang
                                </a>
                            </div>
                        <?php else: ?>
                            <div class="countdown-timer">
                                <div class="countdown-box">
                                    <div class="countdown-number" id="hours">00</div>
                                    <div class="countdown-label">Jam</div>
                                </div>
                                <div class="countdown-box">
                                    <div class="countdown-number" id="minutes">00</div>
                                    <div class="countdown-label">Menit</div>
                                </div>
                                <div class="countdown-box">
                                    <div class="countdown-number" id="seconds">00</div>
                                    <div class="countdown-label">Detik</div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <button class="btn btn-secondary btn-lg rounded-pill" disabled>
                                    <i class="fa fa-lock"></i> Ujian Belum Dimulai
                                </button>
                                <p class="mt-2 small">
                                    Tombol akan aktif ketika countdown mencapai 00:00:00
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="info-card">
                    <div class="card-header">
                        <i class="fa fa-clock"></i> Jadwal Ujian
                    </div>
                    <div class="card-body text-center">
                        <div class="alert alert-warning">
                            <h5><i class="fa fa-exclamation-triangle"></i> Jadwal Ujian Tidak Ditemukan</h5>
                            <p>Jadwal Ujian Belum ditentukan. Silakan hubungi administrator untuk informasi lebih lanjut.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Exam List -->
    <div class="row">
        <div class="col-lg-12">
            <div class="info-card">
                <div class="card-header">
                    <i class="fa fa-list"></i> Daftar Ujian
                    <?php if (isset($countdown_status) && is_array($countdown_status) && $countdown_status['can_start']): ?>
                        <small class="text-success">(Ujian dapat dimulai)</small>
                    <?php elseif (isset($jadwal_test) && !empty($jadwal_test)): ?>
                        <small class="text-warning">(Menunggu jadwal ujian)</small>
                    <?php else: ?>
                        <small class="text-muted">(Jadwal belum ditentukan)</small>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php foreach ($ujian_list as $ujian) :
                            $exam_type = $ujian['jenis_ujian'];
                            $progress = isset($progress_data[$exam_type]) ? $progress_data[$exam_type] : null;
                            $status = 'Belum Dimulai';
                            $status_class = 'not-started';
                            $card_class = 'not-started';

                            if ($progress && isset($progress['total_questions']) && isset($progress['answered_questions'])) {
                                if ($progress['total_questions'] == $progress['answered_questions']) {
                                    $status = 'Selesai';
                                    $status_class = 'completed';
                                    $card_class = 'completed';
                                } elseif ($progress['answered_questions'] > 0) {
                                    $status = 'Dalam Proses';
                                    $status_class = 'in-progress';
                                    $card_class = 'in-progress';
                                }
                            }

                            $exam_progress_percentage = 0;
                            if ($progress && isset($progress['total_questions']) && isset($progress['answered_questions'])) {
                                $exam_progress_percentage = ($progress['answered_questions'] / $progress['total_questions']) * 100;
                            }
                        ?>
                        <div class="col-lg-6 mb-3">
                            <div class="exam-item <?php echo $card_class; ?>" data-exam-type="<?php echo $exam_type; ?>">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="mb-0">
                                        <i class="fa fa-brain"></i> <?php echo ucfirst(str_replace('_', ' ', $exam_type)); ?>
                                    </h5>
                                    <span class="status-badge status-<?php echo $status_class; ?>"><?php echo $status; ?></span>
                                </div>

                                <?php if ($progress && isset($progress['total_questions'])): ?>
                                <div class="mb-3">
                                    <small class="text-muted"><?php echo $progress['answered_questions']; ?>/<?php echo $progress['total_questions']; ?> soal</small>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: <?php echo $exam_progress_percentage; ?>%"></div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <div class="text-right">
                                    <?php if ($status == 'Selesai'): ?>
                                        <a href="<?php echo site_url('talent-test/exam-result/' . $exam_type); ?>" class="btn btn-custom btn-result">
                                            <i class="fa fa-chart-bar"></i> Lihat Hasil
                                        </a>
                                    <?php elseif ($status == 'Dalam Proses'): ?>
                                        <a href="<?php echo site_url('talent-test/exam/' . $exam_type . '/panel'); ?>" class="btn btn-custom btn-continue">
                                            <i class="fa fa-play"></i> Lanjutkan
                                        </a>
                                    <?php else: ?>
                                        <?php if (isset($countdown_status) && is_array($countdown_status) && $countdown_status['can_start']): ?>
                                            <a href="<?php echo site_url('talent-test/start-exam/' . $exam_type); ?>" class="btn btn-custom btn-start">
                                                <i class="fa fa-rocket"></i> Mulai Ujian
                                            </a>
                                        <?php else: ?>
                                            <button class="btn btn-secondary" disabled>
                                                <i class="fa fa-lock"></i> Belum Waktunya
                                            </button>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php if (isset($jadwal_test) && !empty($jadwal_test) && isset($countdown_status) && is_array($countdown_status) && !$countdown_status['can_start']): ?>
            const examTimestamp = <?php echo isset($countdown_status['exam_timestamp']) ? $countdown_status['exam_timestamp'] : 0; ?> * 1000;
            const serverTime = <?php echo isset($countdown_status['server_time']) ? $countdown_status['server_time'] : 0; ?> * 1000;
            const pageLoadTime = new Date().getTime();
            
            const timeOffset = pageLoadTime - serverTime;
            
            const countdownInterval = setInterval(function() {
                const now = new Date().getTime();
                const adjustedNow = now - timeOffset;
                const distance = examTimestamp - adjustedNow;
                
                if (distance > 0) {
                    const hours = Math.floor(distance / (1000 * 60 * 60));
                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    
                    document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
                    document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
                    document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
                } else {
                    clearInterval(countdownInterval);
                    location.reload();
                }
            }, 1000);
        <?php endif; ?>
    });

    function checkExamTime() {
        <?php if (isset($jadwal_test) && !empty($jadwal_test)): ?>
            fetch('<?php echo site_url('talent-test/check-exam-time'); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    jadwal_test: '<?php echo $jadwal_test; ?>'
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.can_start) {
                    location.reload();
                }
            })
            .catch(error => console.error('Error:', error));
        <?php endif; ?>
    }

    setInterval(checkExamTime, 30000);
</script>

<?php $this->load->view('layout3/footer'); ?>