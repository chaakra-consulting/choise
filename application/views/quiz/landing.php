<?php $is_quiz = true; ?>
<?php $this->load->view('layout3/header2') ?>
<?php $this->load->view('layout3/navbar') ?>
<?php $this->load->view('talent_test/layout') ?>

<style>
    :root {
        --primary-color: #FBC02D;
        --secondary-color: #343a40;
        --accent-color: #FF6F00;
        --text-dark: #333333;
        --text-light: #FFFFFF;
        --bg-light: #F8F9FA;
        --bg-white: #FFFFFF;
        --shadow-light: 0 4px 6px rgba(0, 0, 0, 0.07);
        --shadow-medium: 0 10px 25px rgba(0, 0, 0, 0.1);
        --shadow-heavy: 0 20px 40px rgba(0, 0, 0, 0.15);
        --border-radius: 16px;
        --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    body {
        font-family: 'Poppins', sans-serif;
        color: var(--text-dark);
        background-color: var(--bg-light);
        overflow-x: hidden;
        line-height: 1.6;
    }

    .hero-section {
        background: linear-gradient(135deg, #FFF9E6 0%, #FBC02D 50%, #FF6F00 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="%23ffffff" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="%23ffffff" opacity="0.1"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grain)"/></svg>');
        opacity: 0.3;
    }

    .hero-section::after {
        content: '';
        position: absolute;
        top: -200px;
        right: -200px;
        width: 600px;
        height: 600px;
        background: linear-gradient(135deg, var(--accent-color), #FF6F00);
        border-radius: 50%;
        opacity: 0.1;
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(180deg); }
    }

    .hero-content,
    .hero-image-container {
        position: relative;
        z-index: 2;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 1.5rem;
        line-height: 1.2;
        color: var(--text-dark);
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        animation: slideInLeft 1s ease-out;
    }

    @keyframes slideInLeft {
        from { opacity: 0; transform: translateX(-50px); }
        to { opacity: 1; transform: translateX(0); }
    }

    .hero-subtitle {
        font-size: 1.5rem;
        margin-bottom: 3rem;
        line-height: 1.7;
        font-weight: 400;
        color: #555;
        max-width: 600px;
        animation: slideInLeft 1s ease-out 0.2s both;
    }

    .btn-start {
        background: linear-gradient(135deg, var(--primary-color), #FF6F00);
        color: var(--text-dark);
        border: none;
        padding: 18px 45px;
        font-size: 1.2rem;
        font-weight: 700;
        border-radius: 50px;
        text-decoration: none;
        transition: var(--transition);
        box-shadow: var(--shadow-medium);
        display: inline-flex;
        align-items: center;
        gap: 10px;
        position: relative;
        overflow: hidden;
        animation: slideInLeft 1s ease-out 0.4s both;
    }

    .btn-start::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.5s;
    }

    .btn-start:hover::before {
        left: 100%;
    }

    .btn-start:hover {
        transform: translateY(-5px) scale(1.05);
        box-shadow: var(--shadow-heavy);
        background: linear-gradient(135deg, #FF6F00, var(--primary-color));
    }

    .hero-image-container {
        text-align: center;
        animation: slideInRight 1s ease-out;
    }

    @keyframes slideInRight {
        from { opacity: 0; transform: translateX(50px); }
        to { opacity: 1; transform: translateX(0); }
    }

    .hero-image {
        max-width: 100%;
        height: auto;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-heavy);
        transition: var(--transition);
    }

    .hero-image:hover {
        transform: scale(1.05) rotate(2deg);
    }

    .psychologist-info {
        position: absolute;
        bottom: 20px;
        left: 20px;
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(10px);
        padding: 2rem;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-heavy);
        max-width: 400px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        animation: fadeInUp 1s ease-out 0.6s both;
    }

    .psychologist-name {
        font-size: 1.2rem;
        font-weight: 700;
        margin: 0 0 0.5rem 0;
        color: var(--text-dark);
    }

    .psychologist-role {
        font-size: 1rem;
        font-weight: 600;
        margin: 0 0 1rem 0;
        color: var(--accent-color);
        /* text-transform: uppercase; */
        letter-spacing: 0.5px;
    }

    .psychologist-info p {
        font-size: 0.9rem;
        color: #4a5568;
        margin: 0;
        line-height: 1.5;
    }

    .features-section {
        padding: 120px 0;
        background: var(--bg-light);
        position: relative;
    }

    .features-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 100px;
        background: linear-gradient(135deg, var(--primary-color), #FF6F00);
        clip-path: polygon(0 0, 100% 0, 100% 100%, 0 0);
    }

    .section-title {
        text-align: center;
        margin-bottom: 80px;
        font-size: 3rem;
        font-weight: 800;
        color: var(--text-dark);
        position: relative;
        animation: fadeInUp 1s ease-out;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(135deg, var(--primary-color), #FF6F00);
        border-radius: 2px;
    }

    .feature-card {
        background: var(--bg-white);
        border-radius: var(--border-radius);
        padding: 50px 40px;
        text-align: center;
        box-shadow: var(--shadow-light);
        margin-bottom: 30px;
        transition: var(--transition);
        height: 100%;
        border: 1px solid #e2e8f0;
        position: relative;
        overflow: hidden;
    }

    .feature-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, var(--primary-color), #FF6F00);
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .feature-card:hover::before {
        transform: scaleX(1);
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-heavy);
        border-color: var(--primary-color);
    }

    .feature-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #FFF9E6, var(--primary-color));
        color: var(--text-dark);
        font-size: 2.5rem;
        border-radius: 50%;
        margin: 0 auto 2rem auto;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: var(--transition);
        box-shadow: var(--shadow-medium);
    }

    .feature-card:hover .feature-icon {
        transform: rotate(360deg) scale(1.1);
        box-shadow: var(--shadow-heavy);
        background: linear-gradient(135deg, var(--primary-color), #FF6F00);
        color: var(--text-light);
    }

    .feature-card h4 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        color: var(--text-dark);
    }

    .feature-card p {
        color: #718096;
        line-height: 1.7;
        font-size: 1rem;
    }

    .stats-section {
        padding: 80px 0;
        background: var(--bg-white);
        text-align: center;
    }

    .stat-item {
        margin-bottom: 2rem;
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 800;
        color: var(--text-dark);
        background: linear-gradient(135deg, var(--primary-color), #FF6F00);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        display: block;
        margin-bottom: 0.5rem;
    }

    .stat-label {
        font-size: 1.1rem;
        color: #718096;
        font-weight: 600;
    }

    .scroll-indicator {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        animation: bounce 2s infinite;
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% { transform: translateX(-50%) translateY(0); }
        40% { transform: translateX(-50%) translateY(-10px); }
        60% { transform: translateX(-50%) translateY(-5px); }
    }

    .scroll-indicator i {
        color: rgba(0, 0, 0, 0.7);
        font-size: 2rem;
    }
    
    @media (max-width: 1200px) {
        .hero-title {
            font-size: 3rem;
        }
        .hero-subtitle {
            font-size: 1.5rem;
        }
    }

    @media (min-width: 768px) and (max-width: 1024px) {
        .hero-title {
            font-size: 4.5rem;
        }
        .hero-subtitle {
            font-size: 1.5rem;
        }
        .btn-start {
            padding: 22px 55px;
            font-size: 1.6rem;
        }
        .psychologist-name {
            font-size: 1.6rem;
        }
        .psychologist-role {
            font-size: 1.4rem;
        }
        .psychologist-info p {
            font-size: 1.1rem;
        }
        .section-title {
            font-size: 4rem;
        }
        .feature-card h4 {
            font-size: 2rem;
        }
        .feature-card p {
            font-size: 1.4rem;
        }
        .stat-number {
            font-size: 4rem;
        }
        .stat-label {
            font-size: 1.5rem;
        }
    }

    @media (max-width: 991.98px) {
        .hero-section {
            text-align: center;
            min-height: auto;
            padding: 100px 0 60px;
        }

        .hero-content {
            margin-bottom: 4rem;
        }

        .hero-title {
            font-size: 2.8rem;
        }

        .hero-subtitle {
            font-size: 1.1rem;
            max-width: 100%;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-image-container {
            margin-top: 2rem;
        }

        .hero-image {
            max-width: 80%;
        }

        .psychologist-info {
            position: relative;
            bottom: auto;
            left: auto;
            margin: -50px auto 0 auto;
            max-width: 90%;
            padding: 1.25rem;
        }

        .section-title {
            font-size: 2.5rem;
        }

        .feature-card {
            margin-bottom: 40px;
        }

        .features-section {
            padding: 100px 0 60px;
        }
    }

    @media (max-width: 767.98px) {
        .hero-title {
            font-size: 2.5rem;
        }

        .hero-subtitle {
            font-size: 1rem;
        }

        .btn-start {
            padding: 16px 40px;
            font-size: 1.1rem;
        }

        .section-title {
            font-size: 2.2rem;
            margin-bottom: 70px;
        }

        .feature-card {
            padding: 40px 30px;
        }

        .stat-number {
            font-size: 2.5rem;
        }

        .stat-label {
            font-size: 1rem;
        }
    }

    @media (max-width: 576px) {
        .hero-section {
            padding: 80px 0 40px;
        }
        .hero-title {
            font-size: 2.2rem;
        }

        .hero-subtitle {
            font-size: 0.95rem;
        }

        .btn-start {
            padding: 15px 35px;
            font-size: 1rem;
        }

        .section-title {
            font-size: 2rem;
            margin-bottom: 60px;
        }

        .feature-card {
            padding: 35px 25px;
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            font-size: 2rem;
        }

        .feature-card h4 {
            font-size: 1.3rem;
        }

        .psychologist-info {
            margin-top: -40px;
        }

        .scroll-indicator {
            display: none;
        }
    }

    @media (max-width: 375px) {
        .hero-title {
            font-size: 2rem;
        }
        .hero-subtitle {
            font-size: 0.9rem;
        }
        .btn-start {
            padding: 12px 30px;
            font-size: 0.9rem;
        }
        .section-title {
            font-size: 1.8rem;
        }
        .feature-card h4 {
            font-size: 1.2rem;
        }
    }
</style>

<div class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 hero-content">
                <h1 class="hero-title">Temukan Minat Karier Anda bersama <span style="background: linear-gradient(135deg, var(--primary-color), #FF6F00); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Chaakra Consulting</span></h1>
                <p class="hero-subtitle">
                    Tes preferensi ini akan membantu Anda mengidentifikasi tipe <strong>kepribadian kerja</strong> dan <strong>menemukan karier</strong> yang paling sesuai dengan minat Anda melalui pendekatan psikologis yang terbukti.
                </p>
                <a href="<?php echo base_url('quiz/holland-quiz') ?>" class="btn-start">
                    <i class="fas fa-rocket"></i>
                    Mulai Tes Sekarang
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <div class="col-lg-6 hero-image-container">
                <img src="<?php echo base_url('upload/quiz_holland/landing_chaakra2.png') ?>" alt="Psikolog Chaakra Consulting" class="hero-image">
                <div class="psychologist-info">
                    <h3 class="psychologist-name">Lina Subandriyo, M.Psi., Psikolog</h3>
                    <hr style="margin: 0; background-color: black; margin-bottom: 5px;">
                    <p class="psychologist-role">Psikolog Industri yang sudah berpengalaman >10 tahun</p>
                    <p class="psychologist-role">dalam pengembangan Karir SDM dan Direktur Chaakra Consulting</p>
                </div>
            </div>
        </div>
        <div class="scroll-indicator">
            <i class="fas fa-chevron-down"></i>
        </div>
    </div>
</div>

<div class="features-section">
    <div class="container">
        <h2 class="section-title">Mengapa Memilih Tes Ini?</h2>
        <div class="row">
            <div class="col-lg-4 col-md-6 d-flex">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-search-plus"></i>
                    </div>
                    <h4>Identifikasi Minat Akurat</h4>
                    <p>Temukan tipe kepribadian kerja Anda melalui pertanyaan yang dirancang secara psikologis berdasarkan teori Holland yang terkenal.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h4>Analisis Mendalam</h4>
                    <p>Dapatkan kode Holland dan rekomendasi karier yang dipersonalisasi dengan penjelasan detail berdasarkan hasil tes Anda.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-gift"></i>
                    </div>
                    <h4>Gratis & Mudah Digunakan</h4>
                    <p>Tes ini sepenuhnya gratis, dapat diselesaikan dalam 15-20 menit, dan dapat diakses kapan saja dari perangkat apa pun.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="stats-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="stat-item">
                    <span class="stat-number">10,000+</span>
                    <div class="stat-label">Peserta Tes</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-item">
                    <span class="stat-number">95%</span>
                    <div class="stat-label">Tingkat Kepuasan</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-item">
                    <span class="stat-number">15 min</span>
                    <div class="stat-label">Waktu Pengerjaan</div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<?php $this->load->view('layout3/footer') ?>
