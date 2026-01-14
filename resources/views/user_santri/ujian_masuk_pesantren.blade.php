<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Ujian Masuk Pesantren - Peserta</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --navy-primary: #002b49;
            --navy-dark: #001a2e;
            --blue-info: #00bcd4;
            --orange-primary: #ff7f00;
            --bg-body: #f8fafc;
            --transition-speed: 0.3s;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html, body {
            height: 100%;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-body);
            color: #1e293b;
            overflow-x: hidden;
        }

        .arabic-text { 
            font-family: 'Amiri', serif; 
            direction: rtl; 
            font-size: 1.8rem; 
            line-height: 3rem; 
            color: var(--navy-primary);
        }
        
        /* Animasi Peringatan */
        .shake { 
            animation: shake 0.5s cubic-bezier(.36,.07,.19,.97) both; 
        }
        @keyframes shake {
            10%, 90% { transform: translate3d(-1px, 0, 0); }
            20%, 80% { transform: translate3d(2px, 0, 0); }
            30%, 50%, 70% { transform: translate3d(-4px, 0, 0); }
            40%, 60% { transform: translate3d(4px, 0, 0); }
        }
        
        .integrity-warning {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            color: white;
            padding: 1.5rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            border: 3px solid #fecaca;
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.25);
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { box-shadow: 0 4px 12px rgba(220, 38, 38, 0.25); }
            50% { box-shadow: 0 4px 20px rgba(220, 38, 38, 0.4); }
        }
        
        .integrity-warning h5 {
            color: white;
            font-weight: 800;
            margin-bottom: 0.75rem;
        }
        
        .integrity-warning ul {
            margin-bottom: 0;
            padding-left: 1.5rem;
        }
        
        .integrity-warning li {
            margin-bottom: 0.5rem;
        }
        
        /* Styling untuk password input dengan toggle */
        .password-container {
            position: relative;
        }
        
        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #64748b;
            cursor: pointer;
            padding: 8px;
            border-radius: 50%;
            transition: all 0.3s ease;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .password-toggle:hover {
            background-color: #f1f5f9;
            color: var(--navy-primary);
        }
        
        .password-toggle:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 43, 73, 0.1);
        }
        
        .form-control-lg {
            padding-right: 50px !important;
        }
        
        .btn-custom {
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.95rem;
            transition: var(--transition-speed);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }
        
        .btn-login {
            background: var(--navy-primary);
            color: white;
            border: none;
            width: 100%;
            box-shadow: 0 4px 12px rgba(0, 43, 73, 0.3);
        }
        
        .btn-login:hover {
            background: var(--navy-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 43, 73, 0.4);
        }
        
        .btn-exam-nav {
            background: #f1f5f9;
            color: #64748b;
            border: 2px solid #e2e8f0;
        }
        
        .btn-exam-nav:hover {
            background: #e2e8f0;
            color: #475569;
            transform: translateY(-2px);
        }
        
        .btn-exam-primary {
            background: var(--navy-primary);
            color: white;
            border: 2px solid var(--navy-primary);
        }
        
        .btn-exam-primary:hover {
            background: var(--navy-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 43, 73, 0.3);
        }
        
        .btn-exam-warning {
            background: #fbbf24;
            color: #92400e;
            border: 2px solid #fbbf24;
            font-weight: 800;
        }
        
        .btn-exam-warning:hover {
            background: #f59e0b;
            color: white;
            transform: translateY(-2px);
        }
        
        .btn-exam-danger {
            background: #ef4444;
            color: white;
            border: 2px solid #ef4444;
        }
        
        .btn-exam-danger:hover {
            background: #dc2626;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }
        
        .btn-option {
            width: 100%;
            text-align: left;
            padding: 16px 20px;
            border: 2px solid #e2e8f0;
            border-radius: 16px;
            font-weight: 600;
            color: #334155;
            transition: var(--transition-speed);
            background: white;
            word-wrap: break-word;
        }
        
        .btn-option:hover {
            border-color: var(--navy-primary);
            background: #f8fafc;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.08);
        }
        
        .btn-option.active {
            border-color: var(--navy-primary);
            background: #dbeafe;
            color: var(--navy-primary);
        }
        
        .nav-number-btn {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.8rem;
            border: 2px solid #e2e8f0;
            background: white;
            transition: var(--transition-speed);
            cursor: pointer;
            margin: 2px;
            flex-shrink: 0;
        }
        
        .nav-number-btn:hover {
            border-color: var(--navy-primary);
            background: #dbeafe;
            color: var(--navy-primary);
            transform: translateY(-1px);
        }
        
        .nav-number-btn.answered {
            border-color: var(--navy-primary);
            background: var(--navy-primary);
            color: white;
        }
        
        .nav-number-btn.flagged {
            border-color: #fbbf24;
            background: #fef9c3;
            color: #92400e;
        }
        
        .nav-number-btn.current {
            border-color: #00bcd4;
            background: #e0f7fa;
            color: #006064;
            box-shadow: 0 0 0 2px #00bcd4;
        }
        
        .timer-display {
            text-align: center;
            background: white;
            padding: 12px;
            border-radius: 12px;
            border: 2px solid #fee2e2;
            box-shadow: 0 2px 8px rgba(239, 68, 68, 0.2);
            min-width: 120px;
        }
        
        .timer-value {
            font-size: 1.5rem;
            font-weight: 800;
            color: #ef4444;
            font-family: monospace;
        }
        
        .timer-label {
            font-size: 0.75rem;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .container-fluid {
            padding-left: 1rem;
            padding-right: 1rem;
        }
        
        @media (min-width: 576px) {
            .container-fluid {
                max-width: 540px;
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }
        }
        
        @media (min-width: 768px) {
            .container-fluid {
                max-width: 720px;
                padding-left: 2rem;
                padding-right: 2rem;
            }
        }
        
        @media (min-width: 992px) {
            .container-fluid {
                max-width: 960px;
                padding-left: 2rem;
                padding-right: 2rem;
            }
        }
        
        @media (min-width: 1200px) {
            .container-fluid {
                max-width: 1140px;
                padding-left: 2rem;
                padding-right: 2rem;
            }
        }
        
        .full-height {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .exam-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        
        .exam-main {
            flex: 1;
            padding-top: 1rem;
            padding-bottom: 1rem;
        }
        
        header {
            z-index: 100;
        }
        
        .card {
            width: 100%;
            margin: 0 auto;
        }
        
        .row {
            margin-left: -0.5rem;
            margin-right: -0.5rem;
        }
        
        .row > [class*="col-"] {
            padding-left: 0.5rem;
            padding-right: 0.5rem;
        }
        
        @media (max-width: 1199.98px) {
            .exam-header {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
            
            .exam-actions {
                justify-content: center !important;
                flex-wrap: wrap;
                gap: 0.5rem;
            }
            
            .question-navigation {
                flex-direction: column;
                gap: 1rem;
            }
            
            .container-fluid {
                max-width: 960px !important;
            }
        }
        
        @media (max-width: 991.98px) {
            .sticky-sidebar {
                position: static !important;
                margin-top: 2rem;
            }
            
            .col-lg-8,
            .col-lg-4 {
                flex: 0 0 100% !important;
                max-width: 100% !important;
            }
            
            .container-fluid {
                max-width: 720px !important;
            }
        }
        
        @media (max-width: 767.98px) {
            .card-body {
                padding: 1.25rem !important;
            }
            
            .arabic-text {
                font-size: 1.3rem;
                line-height: 2rem;
            }
            
            .btn-custom {
                padding: 10px 16px;
                font-size: 0.85rem;
            }
            
            .timer-value {
                font-size: 1.25rem;
            }
            
            .nav-number-btn {
                width: 32px;
                height: 32px;
                font-size: 0.75rem;
                margin: 1px;
            }
            
            .badge {
                font-size: 0.875rem;
                padding: 0.4rem 0.8rem !important;
            }
            
            .container-fluid {
                max-width: 540px !important;
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }
        
        @media (max-width: 575.98px) {
            .card {
                border-radius: 0.75rem !important;
            }
            
            .card-header {
                padding: 1rem !important;
            }
            
            .card-body {
                padding: 1rem !important;
            }
            
            .btn-custom {
                padding: 8px 12px;
                font-size: 0.8rem;
            }
            
            h1.fs-3 {
                font-size: 1.15rem !important;
            }
            
            .timer-value {
                font-size: 1.1rem;
            }
            
            .timer-label {
                font-size: 0.65rem;
            }
            
            .nav-number-btn {
                width: 28px;
                height: 28px;
                font-size: 0.7rem;
                margin: 1px;
            }
            
            .container-fluid {
                padding-left: 0.75rem;
                padding-right: 0.75rem;
            }
        }
        
        @media (max-width: 400px) {
            .arabic-text {
                font-size: 1.1rem;
                line-height: 1.8rem;
            }
            
            .nav-number-btn {
                width: 26px;
                height: 26px;
                font-size: 0.65rem;
                margin: 0.5px;
            }
        }
        
        .resize-warning {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.85);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10000;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }
        
        .resize-warning.show {
            opacity: 1;
            pointer-events: all;
        }
        
        .resize-warning-content {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            text-align: center;
            max-width: 90%;
            width: 500px;
            margin: 1rem;
        }
        
        .resize-warning-content h3 {
            color: #ef4444;
            margin-bottom: 1rem;
        }
        
        .resize-warning-content p {
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }
        
        .no-overflow {
            overflow-x: hidden;
        }
        
        .navigation-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 4px;
            padding: 8px;
            background: #f8fafc;
            border-radius: 8px;
            max-height: 300px;
            overflow-y: auto;
        }
        
        .navigation-legend {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 12px;
            flex-wrap: wrap;
        }
        
        .legend-item {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 0.75rem;
            color: #64748b;
        }
        
        .legend-color {
            width: 12px;
            height: 12px;
            border-radius: 2px;
            border: 1px solid;
        }
        
        .legend-not-attempted { border-color: #e2e8f0; background: white; }
        .legend-answered { border-color: var(--navy-primary); background: var(--navy-primary); }
        .legend-flagged { border-color: #fbbf24; background: #fef9c3; }
        .legend-current { border-color: #00bcd4; background: #e0f7fa; }
    </style>
</head>
<body class="no-overflow">

    <div class="full-height">
        <div id="login-page" class="d-flex align-items-center justify-content-center py-3">
            <div class="container-fluid">
                <div class="col-lg-5 col-md-7 mx-auto">
                    <div class="card border-0 rounded-4 shadow-lg overflow-hidden">
                        <div class="card-header text-center py-4" style="background: linear-gradient(135deg, var(--navy-primary), var(--navy-dark));">
                            <div class="bg-white bg-opacity-20 rounded-3 d-inline-flex align-items-center justify-content-center p-3 mb-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-user-graduate fa-2x text-white"></i>
                            </div>
                            <h1 class="text-white fw-bold fs-4">Login Peserta Ujian</h1>
                            <p class="text-white-50 fs-6 mt-1">Gunakan data pada Kartu Peserta Anda</p>
                        </div>
                        
                        <div class="card-body p-4">
                            <!-- PERINGATAN INTEGRITAS -->
                            <div class="integrity-warning">
                                <h5><i class="fas fa-exclamation-triangle me-2"></i> PERINGATAN PENTING!</h5>
                                <ul class="small">
                                    <li>Sistem dapat mendeteksi kecurangan secara otomatis</li>
                                    <li>Bila terdeteksi kecurangan, Anda akan <strong>keluar dari sistem</strong> secara otomatis</li>
                                    <li>Anda perlu <strong>login ulang</strong> untuk melanjutkan</li>
                                    <li>Jawaban akan <strong>direset dan dihapus</strong> seluruhnya</li>
                                    <li>Soal akan <strong>diacak ulang</strong> dengan pola berbeda</li>
                                    <li><strong>Kerjakan dengan jujur</strong> sesuai kemampuan Anda sendiri</li>
                                </ul>
                            </div>
                            
                            <form onsubmit="handleLogin(event)" id="loginForm">
                                <div class="mb-3">
                                    <label class="form-label fw-bold text-uppercase text-muted small mb-2">Nama Lengkap</label>
                                    <input type="text" id="user-name" required placeholder="Sesuai Akta Kelahiran" 
                                           class="form-control form-control-lg">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold text-uppercase text-muted small mb-2">NISN</label>
                                    <input type="number" id="user-nisn" required placeholder="Masukkan 10 digit NISN" 
                                           class="form-control form-control-lg">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold text-uppercase text-muted small mb-2">Password / Token</label>
                                    <div class="password-container">
                                        <input type="password" id="user-pass" required placeholder="••••••••" 
                                               class="form-control form-control-lg">
                                        <button type="button" class="password-toggle" id="password-toggle">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" id="integrity-agreement" required>
                                    <label class="form-check-label small" for="integrity-agreement">
                                        Saya setuju untuk <strong>mengerjakan ujian dengan jujur</strong> dan memahami bahwa sistem akan mendeteksi kecurangan. Saya juga memahami konsekuensi bila terdeteksi melakukan pelanggaran.
                                    </label>
                                </div>
                                
                                <button type="submit" class="btn-login btn-custom">
                                    MASUK KE RUANG UJIAN <i class="fas fa-arrow-right"></i>
                                </button>
                            </form>
                        </div>
                        <div class="card-footer bg-light text-center py-2">
                            <p class="text-muted small mb-0 fw-bold text-uppercase" style="font-size: 0.7rem;">Panitia PSB Online 2026</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="exam-page" class="d-none exam-wrapper">
            <header class="bg-white border-bottom sticky-top shadow-sm">
                <div class="container-fluid py-2">
                    <div class="row align-items-center exam-header">
                        <div class="col-md-6 mb-2 mb-md-0">
                            <div class="d-flex align-items-center gap-2">
                                <div class="bg-primary text-white rounded-3 d-flex align-items-center justify-content-center p-2" style="width: 44px; height: 44px;">
                                    <i class="fas fa-book-open"></i>
                                </div>
                                <div>
                                    <h2 class="fw-bold mb-1 fs-5" id="display-exam-title">Bahasa Arab & Al-Qur'an</h2>
                                    <p class="text-primary fw-bold mb-0 small" id="display-user">Nama Peserta</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center justify-content-md-end gap-2 exam-actions">
                                <div class="timer-display">
                                    <div class="timer-label">Sisa Waktu</div>
                                    <div class="timer-value">01:29:59</div>
                                </div>
                                <button onclick="finishExam()" class="btn-exam-danger btn-custom">
                                    SELESAI
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="exam-main">
                <div class="container-fluid">
                    <div class="row g-3">
                        <div class="col-lg-8">
                            <div id="exam-card" class="card border-0 rounded-4 shadow-sm">
                                <div class="card-body p-4">
                                    <!-- PERINGATAN DI HALAMAN UJIAN -->
                                    <div class="alert alert-warning border-3 border-warning mb-4">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-shield-alt fa-2x text-warning me-3"></i>
                                            <div>
                                                <h5 class="alert-heading mb-1">SISTEM DETEKSI KECURANGAN AKTIF!</h5>
                                                <p class="mb-0 small">Bila terdeteksi pelanggaran, Anda akan keluar otomatis dan semua jawaban dihapus. Soal akan diacak ulang saat login kembali.</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <span class="badge bg-light text-dark px-3 py-2 rounded-pill fw-bold">Pertanyaan No. 1</span>
                                    </div>

                                    <div class="flex-grow-1">
                                        <div id="question-content" class="mb-4">
                                            <p class="arabic-text text-center mb-3"> كَيْفَ حَالُكَ يَا صَدِيْقِيْ؟ </p>
                                            <p class="text-muted mb-3 fst-italic fw-medium">Arti dari ungkapan di atas adalah...</p>

                                            <div id="options-container" class="row g-2">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between pt-3 mt-3 border-top question-navigation">
                                        <button class="btn-exam-nav btn-custom">
                                            <i class="fas fa-chevron-left"></i> SEBELUMNYA
                                        </button>
                                        <button class="btn-exam-warning btn-custom"> RAGU-RAGU </button>
                                        <button class="btn-exam-primary btn-custom"> SELANJUTNYA <i class="fas fa-chevron-right"></i> </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card border-0 rounded-4 shadow-sm">
                                <div class="card-body p-3">
                                    <h3 class="text-uppercase text-muted small fw-bold mb-3">Navigasi Soal</h3>
                                    <div class="navigation-grid" id="navigation-grid">
                                        <!-- Navigation buttons will be generated here -->
                                    </div>
                                    <div class="navigation-legend">
                                        <div class="legend-item">
                                            <div class="legend-color legend-not-attempted"></div>
                                            <span>Belum Dikerjakan</span>
                                        </div>
                                        <div class="legend-item">
                                            <div class="legend-color legend-answered"></div>
                                            <span>Dijawab</span>
                                        </div>
                                        <div class="legend-item">
                                            <div class="legend-color legend-flagged"></div>
                                            <span>Ragu-ragu</span>
                                        </div>
                                        <div class="legend-item">
                                            <div class="legend-color legend-current"></div>
                                            <span>Saat Ini</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Resize Warning Modal -->
    <div id="resizeWarning" class="resize-warning">
        <div class="resize-warning-content">
            <h3><i class="fas fa-exclamation-triangle"></i> PELANGGARAN TERDETEKSI!</h3>
            <p>Anda telah meminimalkan jendela browser atau beralih ke aplikasi lain.</p>
            <p><strong>Sesuai aturan ujian:</strong></p>
            <ul class="text-start">
                <li>Sesi ujian akan ditutup otomatis</li>
                <li>Semua jawaban akan <strong>DIHAPUS</strong></li>
                <li>Anda perlu <strong>login kembali</strong></li>
                <li>Soal akan <strong>diacak ulang</strong> secara otomatis</li>
            </ul>
            <p>Silahkan mulai ulang ujian dengan login kembali.</p>
            <div id="countdown" class="fs-4 fw-bold text-danger">5</div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let isExamActive = false;
        let examTimer;
        let timeLeft = 5399; // 1 hour 29 minutes 59 seconds
        let hasDetectedViolation = false;
        let currentQuestion = 1;
        let questionStatus = {};
        let violationCount = 0;
        let shuffleSeed = null;

        // Fungsi untuk toggle show/hide password
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('user-pass');
            const toggleButton = document.getElementById('password-toggle');
            const icon = toggleButton.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
                toggleButton.setAttribute('aria-label', 'Sembunyikan password');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
                toggleButton.setAttribute('aria-label', 'Tampilkan password');
            }
        }

        // Initialize question status
        function initQuestionStatus() {
            for (let i = 1; i <= 50; i++) {
                questionStatus[i] = 'not-attempted';
            }
        }

        // Enhanced anti-cheat detection
        function setupAntiCheat() {
            // Visibility change detection (minimize, switch tabs, switch apps)
            document.addEventListener("visibilitychange", function() {
                if (!isExamActive || hasDetectedViolation) return;
                
                if (document.hidden) {
                    violationCount++;
                    if (violationCount >= 2) {
                        triggerForceLogout();
                    } else {
                        showWarning("Peringatan: Jangan keluar dari halaman ujian! Peringatan ke-" + violationCount);
                    }
                }
            });

            // Page hide detection (for mobile devices when switching apps)
            window.addEventListener("pagehide", function() {
                if (isExamActive && !hasDetectedViolation) {
                    triggerForceLogout();
                }
            });

            // Focus/blur detection for window focus changes
            let focusTimeout;
            window.addEventListener("blur", function() {
                if (!isExamActive || hasDetectedViolation) return;
                
                focusTimeout = setTimeout(() => {
                    if (!document.hasFocus() && isExamActive && !hasDetectedViolation) {
                        violationCount++;
                        if (violationCount >= 2) {
                            triggerForceLogout();
                        } else {
                            showWarning("Peringatan: Jangan beralih ke aplikasi lain! Peringatan ke-" + violationCount);
                        }
                    }
                }, 1000);
            });

            window.addEventListener("focus", function() {
                if (focusTimeout) {
                    clearTimeout(focusTimeout);
                }
            });

            // Handle beforeunload to catch when user tries to close tab/window
            window.addEventListener("beforeunload", function(e) {
                if (isExamActive && !hasDetectedViolation) {
                    const confirmationMessage = "Anda yakin ingin meninggalkan ujian? Semua jawaban akan dihapus dan soal akan diacak ulang!";
                    e.returnValue = confirmationMessage;
                    return confirmationMessage;
                }
            });
        }

        function showWarning(message) {
            const examCard = document.getElementById('exam-card');
            examCard.classList.add('shake');
            
            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert alert-danger alert-dismissible fade show';
            alertDiv.innerHTML = `
                <i class="fas fa-exclamation-circle me-2"></i>
                <strong>PERINGATAN:</strong> ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            
            const existingAlert = examCard.querySelector('.alert');
            if (existingAlert) {
                existingAlert.remove();
            }
            
            const integrityWarning = examCard.querySelector('.alert-warning');
            if (integrityWarning) {
                integrityWarning.after(alertDiv);
            }
            
            setTimeout(() => {
                examCard.classList.remove('shake');
            }, 500);
        }

        // 1. LOGIKA LOGIN & ACAK SOAL (RANDOMIZE ON LOAD)
        function handleLogin(e) {
            e.preventDefault();
            const name = document.getElementById('user-name').value;
            const nisn = document.getElementById('user-nisn').value;
            const agreement = document.getElementById('integrity-agreement').checked;

            if (!agreement) {
                alert('Anda harus menyetujui pernyataan integritas akademik untuk melanjutkan!');
                return;
            }

            if(name && nisn) {
                isExamActive = true;
                hasDetectedViolation = false;
                currentQuestion = 1;
                violationCount = 0;
                initQuestionStatus();
                
                // Generate unique shuffle seed based on login time and user data
                shuffleSeed = Date.now() + nisn.length + name.length;
                
                document.getElementById('login-page').classList.add('d-none');
                document.getElementById('exam-page').classList.remove('d-none');
                document.getElementById('display-user').innerText = name + " | " + nisn;
                
                renderShuffledContent();
                startTimer();
                setupAntiCheat();
            }
        }

        // Fungsi Simulasi Acak Jawaban dengan seed
        function renderShuffledContent() {
            const container = document.getElementById('options-container');
            const options = [
                "A. Dimana rumahmu wahai temanku?",
                "B. Bagaimana kabarmu wahai temanku?",
                "C. Siapa namamu wahai temanku?",
                "D. Kapan kamu lahir wahai temanku?"
            ];
            
            // Deterministic shuffle based on seed
            if (shuffleSeed) {
                const seed = shuffleSeed;
                options.sort((a, b) => {
                    const hashA = stringHash(a + seed);
                    const hashB = stringHash(b + seed);
                    return hashA - hashB;
                });
            } else {
                // Fallback random shuffle
                options.sort(() => Math.random() - 0.5);
            }
            
            container.innerHTML = options.map(opt => `
                <div class="col-12">
                    <button type="button" class="btn-option" onclick="selectOption(this)">
                        <span class="ms-2 fw-semibold">${opt}</span>
                    </button>
                </div>
            `).join('');
            
            generateNavigationGrid();
        }
        
        // Simple string hash function
        function stringHash(str) {
            let hash = 0;
            for (let i = 0; i < str.length; i++) {
                const char = str.charCodeAt(i);
                hash = ((hash << 5) - hash) + char;
                hash = hash & hash;
            }
            return hash;
        }
        
        function selectOption(btn) {
            document.querySelectorAll('.btn-option').forEach(b => {
                b.classList.remove('active');
            });
            btn.classList.add('active');
            questionStatus[currentQuestion] = 'answered';
            updateNavigationGrid();
        }
        
        function generateNavigationGrid() {
            const grid = document.getElementById('navigation-grid');
            grid.innerHTML = '';
            for (let i = 1; i <= 50; i++) {
                const button = document.createElement('div');
                button.className = 'nav-number-btn';
                button.textContent = i;
                button.dataset.question = i;
                button.onclick = () => goToQuestion(i);
                grid.appendChild(button);
            }
            updateNavigationGrid();
        }
        
        function updateNavigationGrid() {
            const buttons = document.querySelectorAll('.nav-number-btn');
            buttons.forEach(button => {
                const questionNum = parseInt(button.dataset.question);
                button.className = 'nav-number-btn';
                
                if (questionNum === currentQuestion) {
                    button.classList.add('current');
                } else if (questionStatus[questionNum] === 'answered') {
                    button.classList.add('answered');
                } else if (questionStatus[questionNum] === 'flagged') {
                    button.classList.add('flagged');
                }
            });
        }
        
        function goToQuestion(num) {
            currentQuestion = num;
            document.querySelector('.badge').textContent = `Pertanyaan No. ${num}`;
            updateNavigationGrid();
        }

        function triggerForceLogout() {
            if (hasDetectedViolation) return;
            
            hasDetectedViolation = true;
            clearInterval(examTimer);
            isExamActive = false;
            
            // Show warning modal with countdown
            const warningModal = document.getElementById('resizeWarning');
            warningModal.classList.add('show');
            
            let countdown = 5;
            const countdownElement = document.getElementById('countdown');
            countdownElement.textContent = countdown;
            
            const countdownInterval = setInterval(() => {
                countdown--;
                countdownElement.textContent = countdown;
                
                if (countdown <= 0) {
                    clearInterval(countdownInterval);
                    
                    // Clear all user data
                    localStorage.removeItem('examData');
                    localStorage.removeItem('answers');
                    
                    // Reset and reload
                    warningModal.classList.remove('show');
                    document.getElementById('exam-page').classList.add('d-none');
                    document.getElementById('login-page').classList.remove('d-none');
                    
                    // Reset form
                    document.getElementById('user-name').value = '';
                    document.getElementById('user-nisn').value = '';
                    document.getElementById('user-pass').value = '';
                    document.getElementById('integrity-agreement').checked = false;
                    
                    // Show alert
                    alert('Sesi ujian telah dihentikan karena terdeteksi pelanggaran. Silahkan login kembali dengan soal yang telah diacak ulang.');
                }
            }, 1000);
        }

        // 3. TIMER FUNCTION
        function startTimer() {
            updateTimerDisplay();
            examTimer = setInterval(() => {
                timeLeft--;
                updateTimerDisplay();
                
                if (timeLeft <= 0) {
                    clearInterval(examTimer);
                    finishExam();
                }
            }, 1000);
        }
        
        function updateTimerDisplay() {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            const display = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            document.querySelector('.timer-value').textContent = display;
            
            if (timeLeft <= 300) {
                document.querySelector('.timer-display').style.borderColor = '#ef4444';
                document.querySelector('.timer-value').style.color = '#ef4444';
            }
        }

        function finishExam() {
            if(confirm('Akhiri ujian sekarang? Pastikan semua jawaban sudah diperiksa.')) {
                clearInterval(examTimer);
                alert('Jawaban Anda telah disimpan!');
                location.reload();
            }
        }
        
        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            initQuestionStatus();
            
            // Setup password toggle functionality
            const passwordToggle = document.getElementById('password-toggle');
            if (passwordToggle) {
                passwordToggle.addEventListener('click', togglePasswordVisibility);
                
                // Optional: Toggle with Enter key when focused
                passwordToggle.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        togglePasswordVisibility();
                    }
                });
            }
            
            // Generate empty navigation grid for login page preview
            const grid = document.getElementById('navigation-grid');
            for (let i = 1; i <= 50; i++) {
                const button = document.createElement('div');
                button.className = 'nav-number-btn';
                button.style.opacity = '0.3';
                button.textContent = i;
                grid.appendChild(button);
            }
            
            setupAntiCheat();
        });
    </script>
</body>
</html>