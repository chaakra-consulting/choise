<?php $this->load->view('layout3/header2'); ?>
<?php $this->load->view('layout3/navbar'); ?>
<?php $this->load->view('talent_test/layout'); ?>

<style>
    html, body {
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

    .result-card {
        border: none;
        border-radius: 1rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        width: 100%;
        animation: fadeInUp 1s ease-out;
    }

    .result-card-header {
        background: linear-gradient(45deg, #F9A825, #FBC02D);
        padding: 2rem;
        text-align: center;
    }

    .result-card-header h1 {
        font-weight: 700;
        font-size: 2.5rem;
        color: white;
        margin-bottom: 0.5rem;
    }

    .result-card-header h2 {
        font-weight: 600;
        font-size: 1.5rem;
        color: white;
        margin-bottom: 0;
    }

    .result-card-body {
        padding: 2rem;
    }

    .type-icon {
        font-size: 4rem;
        color: #FBC02D;
        margin-bottom: 1rem;
        display: block;
        text-align: center;
    }

    .description-section {
        background: #f8f9fa;
        border-radius: 0.75rem;
        padding: 1.5rem;
        margin-bottom: 2rem;
        border-left: 5px solid #FBC02D;
    }

    .description-section h3 {
        font-weight: 600;
        color: #343a40;
        margin-bottom: 1rem;
    }

    .description-section p {
        color: #6c757d;
        line-height: 1.6;
    }

    .jobs-section h3 {
        font-weight: 600;
        color: #343a40;
        margin-bottom: 1rem;
    }

    .jobs-list {
        list-style: none;
        padding: 0;
    }

    .jobs-list li {
        background: #fff;
        border: 1px solid #e9ecef;
        border-radius: 0.5rem;
        padding: 0.75rem 1rem;
        margin-bottom: 0.5rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        transition: transform 0.2s ease;
    }

    .jobs-list li:hover {
        transform: translateY(-2px);
    }

    .jobs-list li:before {
        content: "✔";
        color: #28a745;
        font-weight: bold;
        margin-right: 0.5rem;
    }

    .message-section {
        background: linear-gradient(45deg, #e3f2fd, #bbdefb);
        border-radius: 0.75rem;
        padding: 1.5rem;
        text-align: center;
        color: #0d47a1;
        font-weight: 500;
        margin-top: 2rem;
    }

    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 576px) {
        body {
            padding-top: 60px;
        }
        .result-card-body {
            padding: 1.5rem;
        }
        .result-card-header h1 {
            font-size: 2rem;
        }
        .result-card-header h2 {
            font-size: 1.2rem;
        }
        .type-icon {
            font-size: 3rem;
        }
    }
</style>

<div class="main-content-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card result-card">
                    <div class="card-header result-card-header">
                        <h1>PREFERENSI BIDANG MINAT KERJA</h1>
                        <h2>(HOLLAND TEST)</h2>
                    </div>
                    <div class="card-body result-card-body">
                        <div class="text-center mb-4">
                            <i class="bi bi-star-fill type-icon"></i>
                            <h3 class="h4">Your Holland Code: <?php echo $code; ?> - <?php echo $type_data['name']; ?></h3>
                        </div>

                        <div class="description-section">
                            <h3>Deskripsi Tipe Anda</h3>
                            <p><?php echo $type_data['description']; ?></p>
                        </div>

                        <div class="jobs-section">
                            <h3>Pekerjaan yang Cocok</h3>
                            <ul class="jobs-list">
                                <?php foreach ($type_data['jobs'] as $job): ?>
                                    <li><?php echo $job; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <div class="message-section">
                            <p><?php echo $message; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<?php $this->load->view('layout3/footer') ?>
