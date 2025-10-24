<?php $this->load->view('layout3/header2') ?>
<?php $this->load->view('layout3/navbar') ?>
<?php $this->load->view('talent_test/layout') ?>

<style>
    :root {
        --primary-main: #FBC02D;
        --primary-dark: #F9A825;
        --secondary-main: #764ba2;
        --text-light: #ffffff;
        --text-dark: #343a40;
        --bg-light: #f8f9fa;
        --bg-white: #ffffff;
        --shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        --border-radius: 12px;
        --transition: all 0.3s ease-in-out;
    }

    body {
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
        color: var(--text-dark);
    }

    .hero-section {
        background: linear-gradient(135deg, var(--primary-main) 0%, var(--primary-dark) 100%);
        min-height: 90vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 60px 0;
        width: 100%;
    }

    .hero-content {
        text-align: center;
        padding: 0 15px;
    }

    .hero-title {
        font-size: 3.8rem;
        font-weight: 500;
        margin-bottom: 1.2rem;
        line-height: 1.2;
        color: var(--text-dark); 
        text-shadow: none; 
    }

    .hero-subtitle {
        font-size: 1.4rem;
        margin-bottom: 2rem;
        opacity: 0.85;
        line-height: 1.7;
        font-weight: 400;
        color: var(--text-light); 
    }

    .btn-start {
        background-color: var(--text-dark);
        color: var(--text-light);
        border: none;
        padding: 16px 45px;
        font-size: 1.2rem;
        font-weight: 600;
        border-radius: 50px;
        text-decoration: none;
        display: inline-block;
        transition: var(--transition);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.25);
    }

    .hero-image:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease;
    }

    .btn-start:hover {
        background-color: #5a6268;
        transform: translateY(-5px) scale(1.06);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        color: var(--text-light);
    }

    .features-section {
        padding: 80px 0;
        background-color: var(--bg-light);
    }

    .section-title {
        text-align: center;
        margin-bottom: 60px;
        font-size: 2.8rem;
        font-weight: 500;
        color: var(--text-dark);
    }

    .feature-card {
        background: var(--bg-white);
        border-radius: var(--border-radius);
        padding: 45px 35px;
        text-align: center;
        box-shadow: var(--shadow);
        margin-bottom: 30px;
        transition: var(--transition);
        border-top: 5px solid transparent;
    }

    .feature-card:hover {
        transform: translateY(-12px);
        border-top-color: var(--primary-main);
    }

    .feature-icon {
        font-size: 4rem;
        color: var(--primary-dark);
        margin-bottom: 1.8rem;
        line-height: 1;
    }

    .feature-card h4 {
        font-size: 1.6rem;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 1.2rem;
    }

    .feature-card p {
        color: #5a6268;
        line-height: 1.7;
        font-size: 1.05rem;
    }


    @media (min-width: 768px) and (max-width: 991.98px) {
        .hero-section { min-height: 75vh; padding: 45px 0; }
        .hero-title { font-size: 2.8rem; margin-bottom: 1.1rem; }
        .hero-subtitle { font-size: 1.1rem; margin-bottom: 1.9rem; }
        .btn-start { font-size: 1.1rem; padding: 14px 35px; }
        .hero-content { padding: 0 14px; }
        .hero-image { max-height: 350px; }
        .section-title { font-size: 2.5rem; margin-bottom: 45px; }
        .feature-card { padding: 40px 30px; margin-bottom: 30px; }
        .feature-icon { font-size: 3.8rem; margin-bottom: 1.6rem; }
        .feature-card h4 { font-size: 1.5rem; margin-bottom: 1.1rem; }
        .feature-card p { font-size: 1rem; }
        .hero-content .col-md-6 {
            min-height: auto !important;
        }
    }

    .navbar-custom { background-color: #212529; }
    .navbar-custom .navbar-brand { color: var(--text-light); }
    .navbar-custom .navbar-brand span { color: var(--primary-main); }
    .navbar-custom .navbar-toggle .icon-bar { background-color: var(--text-light); }
    .navbar-custom .navbar-top-links .fa-user { color: var(--text-light); font-size: 1.2rem; }
    .dropdown-menu.dropdown-messages { background-color: var(--bg-white); border-radius: 8px; box-shadow: var(--shadow); }
    .dropdown-menu.dropdown-messages a { color: var(--text-dark); padding: 10px 20px; }
    .dropdown-menu.dropdown-messages a:hover { background-color: var(--bg-light); color: var(--primary-main); }
    .dropdown-menu.dropdown-messages .divider { background-color: var(--border-color); }
</style>

<div class="hero-section">
    <div class="container">
        <div class="hero-content row d-flex align-items-start justify-content-center">
            <div class="col-lg-7 col-md-6 col-12 d-flex flex-column justify-content-center">
                <h1 class="hero-title animate__animated animate__fadeInLeft">Temukan Minat Karier Anda bersama <br><b>Chaakra Consulting</b></h1>
                <p class="hero-subtitle animate__animated animate__fadeInLeft animate__delay-1s">
                    Test Preferensi Bidang Minat Kerja akan membantu Anda mengidentifikasi tipe <b>KEPRIBADIAN KERJA</b> dan <b>MENEMUKAN KARIER</b> yang paling <b>SESUAI</b> dengan <b>MINAT</b> Anda.
                    Psikolog Industri Berpengalaman lebih dari 10 tahun di bidang SDM dan Pengembangan Karir dan Direktur Chaakra Consulting
                </p>
            </div>
            <div class="col-lg-5 col-md-6 col-12 d-flex align-items-center justify-content-center">
                <img src="<?php echo base_url('upload/quiz_holland/landing_chaakra.png')?>" alt="" class="img-fluid hero-image animate__animated animate__fadeInRight animate__delay-1s" style="max-width: 100%; max-height: 500px; object-fit: contain; margin-top: -50px; margin-right: -50px;">
            </div>
        </div>
        <div class="text-center">
            <a href="<?php echo base_url('public/holland-quiz') ?>" class="btn-start animate__animated animate__fadeInUp animate__delay-2s">
                Mulai Tes Sekarang <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</div>

<div class="features-section">
    <div class="container">
        <h2 class="section-title">Mengapa Anda <b>WAJIB MENGIKUTI</b> test ini?</h2>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-search-plus"></i></div>
                    <h4>Identifikasi Minat</h4>
                    <p>Temukan tipe kepribadian kerja Anda melalui pertanyaan yang dirancang secara psikologis.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-chart-line"></i></div>
                    <h4>Analisis Hasil</h4>
                    <p>Dapatkan kode Holland dan rekomendasi karier yang dipersonalisasi berdasarkan hasil tes Anda.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-gift"></i></div>
                    <h4>Gratis & Mudah</h4>
                    <p>Tes ini sepenuhnya gratis, cepat, dan dapat diakses kapan saja dari perangkat mana pun.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('layout3/footer') ?>