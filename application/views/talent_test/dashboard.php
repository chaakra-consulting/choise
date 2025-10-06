<?php $this->load->view('layout3/header'); ?>
<?php $this->load->view('layout3/navbar'); ?>
<?php $this->load->view('layout3/sidebar'); ?>

<style>
/* Header Section */
.welcome-header {
  background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
  color: #5a3e1b;
  padding: 30px 0;
  margin-bottom: 30px;
  border-radius: 10px;
  text-align: center;
}

.welcome-header h1 {
  margin-bottom: 10px;
  font-size: 2.2em;
}

.welcome-header p {
  font-size: 1.1em;
  opacity: 0.9;
}

/* Card Styles */
.info-card {
  background: white;
  border-radius: 10px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.1);
  border: none;
  margin-bottom: 25px;
  overflow: hidden;
}

.info-card .card-header {
  background: #fff3cd;
  border-bottom: 1px solid #ffeeba;
  padding: 15px 20px;
  font-weight: 600;
  color: #856404;
}

.info-card .card-body {
  padding: 20px;
  color: #5a3e1b;
}

/* Progress Styles */
.progress {
  height: 10px;
  border-radius: 5px;
  margin-bottom: 10px;
}

.progress-bar {
  background: linear-gradient(90deg, #f6d365 0%, #fda085 100%);
}

/* Exam Cards */
.exam-item {
  background: white;
  border-radius: 8px;
  box-shadow: 0 2px 10px rgba(0,0,0,0.08);
  border: 1px solid #e9ecef;
  margin-bottom: 15px;
  padding: 20px;
  transition: box-shadow 0.3s ease;
}

.exam-item:hover {
  box-shadow: 0 4px 20px rgba(0,0,0,0.12);
}

.exam-item.completed {
  border-left: 4px solid #ffc107;
}

.exam-item.in-progress {
  border-left: 4px solid #ffca2c;
}

.exam-item.not-started {
  border-left: 4px solid #6c757d;
}

/* Status Badges */
.status-badge {
  padding: 4px 10px;
  border-radius: 15px;
  font-size: 0.8em;
  font-weight: 500;
  text-transform: uppercase;
}

.status-completed {
  background: #fff3cd;
  color: #856404;
}

.status-in-progress {
  background: #fff8e1;
  color: #8a6d3b;
}

.status-not-started {
  background: #e2e3e5;
  color: #383d41;
}

/* Buttons */
.btn-custom {
  border-radius: 20px;
  padding: 8px 20px;
  font-weight: 500;
  text-transform: uppercase;
  font-size: 0.85em;
  border: none;
  transition: all 0.3s ease;
}

.btn-custom:hover {
  transform: translateY(-1px);
  box-shadow: 0 3px 10px rgba(0,0,0,0.15);
}

.btn-start {
  background: #ffc107;
  color: #5a3e1b;
}

.btn-continue {
  background: #ffca2c;
  color: #5a3e1b;
}

.btn-result {
  background: #ffd54f;
  color: #5a3e1b;
}

/* Alert Improvements */
.alert {
  border-radius: 8px;
  border: none;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}
/* Countdown Timer Styles */
.countdown-timer {
    margin: 20px 0;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 8px;
    border-left: 4px solid #ffc107;
    text-align: center;
}

.countdown-container {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
}

.countdown-box {
    background: white;
    color: #495057;
    border-radius: 6px;
    padding: 12px 8px;
    text-align: center;
    box-shadow: 1px solid #dee2e6;
    min-width: 60px;
    display: inline-block;
}

.countdown-number {
    font-size: 1.8em;
    font-weight: bold;
    line-height: 1;
    margin-bottom: 2px;
    color: #ffc107;
}

.countdown-label {
    font-size: 0.75em;
    color: #6c757d;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 500;
}

/* Countdown Animation */
.countdown-number {
    animation: pulse 1s ease-in-out;
}

@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}

/* Responsive Countdown */
@media (max-width: 768px) {
    .countdown-container {
        gap: 5px;
    }
    
    .countdown-box {
        padding: 10px 6px;
        min-width: 50px;
    }
    
    .countdown-number {
        font-size: 1.5em;
    }

    .countdown-label {
        font-size: 0.7em;
    }
}

</style>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
          <em class="fa fa-dashboard"></em>
        </a></li>
      <li class="active">Dashboard Talent Test</li>
    </ol>
  </div>

  <!-- Welcome Header -->
  <div class="welcome-header">
    <h1><i class="fa fa-graduation-cap"></i> Dashboard Talent Test</h1>
    <p>Selamat datang di dashboard talent test Anda</p>
  </div>

  <!-- Notifications -->
  <div id="notifikasi">
    <?php if ($this->session->flashdata('msg')) : ?>
      <div class="alert alert-success">
        <i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('msg') ?>
      </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('msg_update')) : ?>
      <div class="alert alert-info">
        <i class="fa fa-info-circle"></i> <?php echo $this->session->flashdata('msg_update') ?>
      </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('msg_hapus')) : ?>
      <div class="alert alert-danger">
        <i class="fa fa-exclamation-triangle"></i> <?php echo $this->session->flashdata('msg_hapus') ?>
      </div>
    <?php endif; ?>
  </div>
  <!-- Countdown Section -->
  <?php if (isset($jadwal_test) && !empty($jadwal_test) && $jadwal_test != '0000-00-00 00:00:00'): ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="info-card">
                <div class="card-header">
                    <i class="fa fa-clock"></i> Jadwal Ujian
                </div>
                <div class="card-body text-center">
                    <h4>Informasi Jadwal</h4>
                    <p class="mb-3">Ujian Anda dijadwalkan pada:</p>
                    <h5 class="text-primary">
                        <?php echo date(' d F Y, H:i', strtotime($jadwal_test)); ?> WIB
                    </h5>
                    <?php if (isset($countdown_status) && is_array($countdown_status) && $countdown_status['can_start']): ?>
                        <div class="alert alert-success">
                            <h5><i class="fa fa-check-circle"></i> Ujian Dapat Dimulai!</h5>
                            <p>Ujian Anda dudah dapat diakses sekarang.</p>
                        </div>
                        <div class="mt-4">
                            <a href="<?php echo site_url('talent-test/exam-list'); ?>"
                                class="btn btn-success btn-lg">
                                <i class="fa fa-play"></i> Mulai Ujian Sekarang
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-warning" id="countdown-alert">
                            <h5><i class="fa fa-clock"></i> <?php echo $countdown_status['message'] ?? 'Menunggu jadwal ujian'; ?></h5>
                        </div>
                        <div class="countdown-timer">
                            <div class="countdown-container">
                                <div class="countdown-box">
                                    <div class="countdown-number" id="hours">
                                        <?php echo isset($countdown_status['hours']) ? str_pad($countdown_status['hours'], 2, '0', STR_PAD_LEFT) : '00'; ?>
                                    </div>
                                    <div class="countdown-label">Jam</div>
                                </div>
                                <div class="countdown-box">
                                    <div class="countdown-number" id="minutes">
                                        <?php echo isset($countdown_status['minutes']) ? str_pad($countdown_status['minutes'], 2, '0', STR_PAD_LEFT) : '00'; ?>
                                    </div>
                                    <div class="countdown-label">Menit</div>
                                </div>
                                <div class="countdown-box">
                                    <div class="countdown-number" id="seconds">
                                        <?php echo isset($countdown_status['seconds']) ? str_pad($countdown_status['seconds'], 2, '0', STR_PAD_LEFT) : '00'; ?>
                                    </div>
                                    <div class="countdown-label">Detik</div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button class="btn btn-secondary" disabled>
                                <i class="fa fa-lock"></i> Ujian Belum Dimulai
                            </button>
                            <p class="text-muted mt-2">
                                <small>Tombol akan aktif ketika countdown mencapai 00:00:00</small>
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
                        <p>Jadwal Ujian Belum ditentukan. Silakan hubungi administartor untuk informasi lebih lanjut.</p>
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
                    <?php $exam_type = ''; 
                    foreach ($ujian_list as $ujian) :
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
        // Ambil waktu exam dari PHP dengan timezone yang benar
        const examDateTime = '<?php echo date('Y-m-d H:i:s', strtotime($jadwal_test)); ?>';
        const examTime = new Date(examDateTime + ' UTC').getTime(); // Asumsi waktu dalam UTC
        
        console.log('Exam time:', new Date(examTime)); // Debug log
        console.log('Current time:', new Date()); // Debug log
        
        // Update countdown setiap detik
        const countdownInterval = setInterval(function() {
            const now = new Date().getTime();
            const distance = examTime - now;
            
            console.log('Distance:', distance); // Debug log
            
            if (distance > 0) {
                // Hitung waktu dengan benar
                const hours = Math.floor(distance / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                
                // Update display
                document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
                document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
                document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
            } else {
                // Countdown selesai - reload halaman agar tombol update
                clearInterval(countdownInterval);
                location.reload();
            }
        }, 1000);
    <?php endif; ?>
});

// Fungsi untuk check waktu exam setiap menit
function checkExamTime() {
    <?php if (isset($jadwal_test) && !empty($jadwal_test)): ?>
        const currentTime = new Date().getTime();
        const examDateTime = '<?php echo date('Y-m-d H:i:s', strtotime($jadwal_test)); ?>';
        const examTime = new Date(examDateTime + ' UTC').getTime();
        
        if (currentTime >= examTime) {
            // Reload halaman jika waktu sudah tiba
            location.reload();
        }
    <?php endif; ?>
}

// Check setiap 60 detik
setInterval(checkExamTime, 60000);
</script>

<?php $this->load->view('layout3/footer'); ?>