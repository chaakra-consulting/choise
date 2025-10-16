<?php $this->load->view('layout3/header2') ?>
<?php $this->load->view('layout3/navbar') ?>

<style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    body {
        display: flex;
        flex-direction: column;
        padding-top: 70px;
    }

    .main-content-wrapper {
        flex-grow: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 2rem 1rem;
        width: 100%;
        overflow-y: auto;
    }
    
    /* ======================= AKHIR DARI CSS BARU ======================= */

    .quiz-card {
        border: none;
        border-radius: 1rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        width: 100%;
    }

    .quiz-card-header {
        background: linear-gradient(45deg, #F9A825, #FBC02D);
        padding: 1.5rem;
    }
    .quiz-card-header h1 {
        font-weight: 700;
        font-size: 2rem;
    }

    .quiz-card-body {
        padding: 2rem;
    }
    .question-step {
        display: none;
    }
    .question-step.active {
        display: block;
        animation: slideIn 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
    }
    .question-icon {
        font-size: 3rem;
        color: #FBC02D;
        margin-bottom: 1rem;
    }
    .question-title {
        font-weight: 600;
        margin-bottom: 2.5rem;
        font-size: 1.7rem;
    }
    .progress {
        height: 0.5rem;
        border-radius: 0.5rem;
    }
    .progress-bar {
        transition: width 0.4s ease-in-out;
    }
    .question-counter-text {
        font-size: 1.2rem;
        font-weight: 500;
        color: #6c757d;
    }

    .rating-group {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 0.75rem;
    }
    .btn-rating {
        border-radius: 0.75rem;
        font-weight: 600;
        padding: 0.75rem;
        min-width: 70px;
        font-size: 1.1rem;
        transition: all 0.2s ease-out;
    }
    .btn-rating small {
        font-size: 1.2rem;
        font-weight: 500;
        display: block;
        margin-top: 4px;
        opacity: 0.8;
    }
    .btn-check:checked+.btn-outline-primary {
        background-color: #FBC02D;
        color: white;
        box-shadow: 0 5px 15px rgba(13, 110, 253, 0.4);
        transform: translateY(-4px) scale(1.05);
    }

    @keyframes slideIn {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 576px) {
        body {
            padding-top: 60px; 
        }
        .quiz-card-body { padding: 1.5rem; }
        .question-title { 
            font-size: 1.2rem;
        }
    }
    
    @media (max-width: 420px) {
        .rating-group {
            flex-direction: column; 
            align-items: stretch;
            gap: 0.5rem;
        }
        .btn-rating {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            padding: 0.75rem 1rem;
        }
        .btn-rating small {
            margin-top: 0;
            font-size: 0.8rem;
        }
    }
</style>

<div class="main-content-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12"> <div class="card quiz-card">
                    <div class="card-header quiz-card-header text-white text-center">
                        <h1 class="h4 mb-0">Holland Self-Assessment</h1>
                    </div>
                    <div class="card-body quiz-card-body">

                        <div class="mb-4">
                            <div class="d-flex justify-content-end align-items-center mb-2">
                                <span class="question-counter-text">Pertanyaan <span id="question-counter">1</span> / 12</span>
                            </div>
                            <div class="progress">
                                <div id="progress-bar" class="progress-bar" role="progressbar" style="width: 8.33%;"></div>
                            </div>
                        </div>

                        <form id="hollandForm" action="<?php echo base_url('public/submit_holland') ?>" method="post">
                            <?php
                            $questions = [
                                ['q' => 'q1', 'text' => 'Memperbaiki alat elektronik', 'icon' => 'bi-plug'],
                                ['q' => 'q2', 'text' => 'Memperbaiki kendaraan bermotor', 'icon' => 'bi-wrench-adjustable-circle'],
                                ['q' => 'q3', 'text' => 'Memecahkan masalah', 'icon' => 'bi-lightbulb'],
                                ['q' => 'q4', 'text' => 'Melakukan hitungan kompleks', 'icon' => 'bi-calculator'],
                                ['q' => 'q5', 'text' => 'Membuat sketsa, menggambar dan melukis', 'icon' => 'bi-palette'],
                                ['q' => 'q6', 'text' => 'Menulis cerita, puisi, maupun lirik lagu', 'icon' => 'bi-pencil-square'],
                                ['q' => 'q7', 'text' => 'Mengajar/membimbing orang lain', 'icon' => 'bi-people'],
                                ['q' => 'q8', 'text' => 'Membantu permasalahan orang lain', 'icon' => 'bi-heart-half'],
                                ['q' => 'q9', 'text' => 'Menjual barang & mempromosikan ide', 'icon' => 'bi-megaphone'],
                                ['q' => 'q10', 'text' => 'Memimpin suatu kelompok', 'icon' => 'bi-flag'],
                                ['q' => 'q11', 'text' => 'Bekerja dengan angka', 'icon' => 'bi-bar-chart-line'],
                                ['q' => 'q12', 'text' => 'Mengetik dengan cepat', 'icon' => 'bi-keyboard']
                            ];

                            foreach ($questions as $index => $item): ?>
                            <div class="question-step text-center <?= $index === 0 ? 'active' : '' ?>">
                                <div class="question-icon"><i class="bi <?= $item['icon'] ?>"></i></div>
                                <h3 class="h5 question-title"><?= $item['text'] ?></h3>
                                <div class="rating-group">
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <input type="radio" class="btn-check" name="<?= $item['q'] ?>" id="<?= $item['q'] ?>-<?= $i ?>" value="<?= $i ?>" autocomplete="off" required>
                                    <label class="btn btn-outline-primary btn-rating" for="<?= $item['q'] ?>-<?= $i ?>">
                                        <?= $i ?>
                                        <small><?= ($i == 1 ? 'Tidak Suka' : ($i == 3 ? 'Netral' : ($i == 5 ? 'Sangat Suka' : '&nbsp;'))) ?></small>
                                    </label>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </form>

                        <div class="d-flex justify-content-center mt-5">
                            <button id="prevBtn" class="btn btn-light me-3" style="display: none;">Sebelumnya</button>
                            <button id="nextBtn" class="btn btn-primary">Berikutnya</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('public/form'); ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<script>
document.addEventListener('DOMContentLoaded', function() {
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');
    const progressBar = document.getElementById('progress-bar');
    const questionCounter = document.getElementById('question-counter');
    const hollandForm = document.getElementById('hollandForm');
    const allRadios = document.querySelectorAll('.btn-check');
    const steps = Array.from(document.querySelectorAll('.question-step'));
    const totalSteps = steps.length;
    let currentStep = 1;
    let autoAdvanceTimeout;
    const goToNextStep = () => {
        const currentStepElement = steps[currentStep - 1];
        const radioChecked = currentStepElement.querySelector('input[type="radio"]:checked');
        if (!radioChecked) { return; }
        if (currentStep < totalSteps) {
            currentStep++;
            updateUI();
        } else {
            const quizData = {};
            allRadios.forEach(radio => {
                if (radio.checked) {
                    quizData[radio.name] = radio.value;
                }
            });
            
            const modalForm = document.querySelector('#formModal form');
            for (const [key, value] of Object.entries(quizData)) {
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = key;
                hiddenInput.value = value;
                modalForm.appendChild(hiddenInput);
            }
            
            $('#formModal').modal('show');
        }
    };
    const updateUI = () => {
        steps.forEach((step, index) => {
            step.classList.toggle('active', index + 1 === currentStep);
        });
        const progress = ((currentStep - 1) / (totalSteps - 1)) * 100;
        progressBar.style.width = progress + '%';
        questionCounter.textContent = currentStep;
        prevBtn.style.display = currentStep > 1 ? 'inline-block' : 'none';
        if (currentStep === totalSteps) {
            nextBtn.textContent = 'Lihat Hasil';
            nextBtn.classList.replace('btn-primary', 'btn-success');
        } else {
            nextBtn.textContent = 'Berikutnya';
            nextBtn.classList.replace('btn-success', 'btn-primary');
        }
    };
    nextBtn.addEventListener('click', goToNextStep);
    prevBtn.addEventListener('click', () => {
        if (currentStep > 1) {
            clearTimeout(autoAdvanceTimeout);
            currentStep--;
            updateUI();
        }
    });
    allRadios.forEach(radio => {
        radio.addEventListener('click', () => {
            clearTimeout(autoAdvanceTimeout);
            autoAdvanceTimeout = setTimeout(() => {
                goToNextStep();
            }, 350);
        });
    });
    updateUI();
});
</script>

<?php $this->load->view('layout3/footer') ?>