<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Berhasil - PSB Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --navy-primary: #002b4d;
            --navy-secondary: #004070;
            --orange-primary: #ff7f00;
            --orange-hover: #e66a00;
            --cyan-accent: #4dd0e1;
            --bg-light: #f4f6f9;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--navy-primary) 0%, var(--navy-secondary) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .success-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.2);
            padding: 60px 40px;
            max-width: 600px;
            width: 100%;
            text-align: center;
            animation: slideUp 0.6s ease-out;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .success-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            font-size: 50px;
            color: white;
            animation: bounceIn 0.8s ease-out 0.2s both;
        }
        
        @keyframes bounceIn {
            from {
                opacity: 0;
                transform: scale(0);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        h1 {
            color: var(--navy-primary);
            font-weight: 800;
            margin-bottom: 15px;
            font-size: 2.5rem;
        }
        
        .subtitle {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 30px;
        }
        
        .info-box {
            background: var(--bg-light);
            border: 2px solid var(--cyan-accent);
            border-radius: 12px;
            padding: 25px;
            margin: 30px 0;
            text-align: left;
        }
        
        .info-label {
            color: var(--navy-primary);
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
            display: block;
        }
        
        .info-value {
            font-size: 1.3rem;
            color: var(--navy-primary);
            font-weight: 600;
            font-family: 'Courier New', monospace;
            background: white;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
            word-break: break-all;
        }
        
        .info-value:last-child {
            margin-bottom: 0;
        }
        
        .warning-box {
            background: #fff3cd;
            border: 1px solid #ffc107;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
            color: #856404;
            font-size: 0.95rem;
        }
        
        .warning-box strong {
            display: block;
            margin-bottom: 10px;
        }
        
        .btn-group-custom {
            display: flex;
            gap: 15px;
            margin-top: 40px;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .btn-custom {
            flex: 1;
            min-width: 150px;
            padding: 15px 30px;
            font-weight: 700;
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 1rem;
        }
        
        .btn-login {
            background: linear-gradient(135deg, var(--orange-primary) 0%, var(--orange-hover) 100%);
            color: white;
            border: none;
        }
        
        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255, 127, 0, 0.3);
            color: white;
        }
        
        .btn-home {
            background: white;
            color: var(--navy-primary);
            border: 2px solid var(--navy-primary);
        }
        
        .btn-home:hover {
            background: var(--navy-primary);
            color: white;
            transform: translateY(-3px);
        }
        
        .footer-text {
            color: #999;
            font-size: 0.85rem;
            margin-top: 30px;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }
        
        @media (max-width: 600px) {
            .success-container {
                padding: 40px 25px;
            }
            
            h1 {
                font-size: 1.8rem;
            }
            
            .btn-group-custom {
                flex-direction: column;
            }
            
            .btn-custom {
                min-width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-icon">
            <i class="fas fa-check"></i>
        </div>
        
        <h1>Registrasi Berhasil!</h1>
        <p class="subtitle">Selamat, Anda telah terdaftar sebagai calon santri</p>
        
        <div class="info-box">
            <span class="info-label"><i class="fas fa-id-card me-2"></i>NISN Anda</span>
            <div class="info-value">{{ session('nisn') }}</div>
            
            <span class="info-label"><i class="fas fa-lock me-2"></i>Password Sementara</span>
            <div class="info-value">{{ session('password') }}</div>
        </div>
        
        <div class="warning-box">
            <strong><i class="fas fa-exclamation-triangle me-2"></i>Penting!</strong>
            <ul class="mb-0">
                <li>Jangan bagikan NISN dan Password Anda kepada siapapun</li>
                <li>Simpan informasi ini dengan aman</li>
                <li>Anda dapat mengubah password setelah login pertama kali</li>
            </ul>
        </div>
        
        <div class="btn-group-custom">
            <a href="{{ route('awal.index') }}?nisn={{ session('nisn') }}&pass={{ session('password') }}" class="btn btn-custom btn-login">
                <i class="fas fa-sign-in-alt me-2"></i>Lanjut ke Login
            </a>
            <a href="{{ route('awal.index') }}" class="btn btn-custom btn-home">
                <i class="fas fa-home me-2"></i>Kembali Utama
            </a>
        </div>
        
        <div class="footer-text">
            <p class="mb-0">Halaman ini akan otomatis redirect dalam <span id="countdown">5</span> detik...</p>
        </div>
    </div>
    
    <script>
        let countdown = 5;
        setInterval(() => {
            countdown--;
            document.getElementById('countdown').textContent = countdown;
            if (countdown === 0) {
                window.location.href = "{{ route('awal.index') }}?nisn={{ session('nisn') }}&pass={{ session('password') }}";
            }
        }, 1000);
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
        :root {
            --navy-primary: #002b4d;    
            --orange-primary: #ff7f00;       
            --orange-hover: #e66a00;
            --teal-header: #009688; 
            --bg-light: #f8fafc;     
            --success-green: #28a745;
            --success-green-hover: #218838;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--bg-light) 0%, #eef2f7 100%);
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        /* --- ANIMASI --- */
        @keyframes slideInUp {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        @keyframes bounceIn {
            0% { transform: scale(0.3); opacity: 0; }
            50% { transform: scale(1.05); opacity: 1; }
            70% { transform: scale(0.9); }
            100% { transform: scale(1); }
        }

        /* --- LAYOUT UTAMA --- */
        .content-wrapper {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1.5rem;
            min-height: calc(100vh - 110px);
        }

        /* --- KARTU SUKSES --- */
        .card-success {
            background: white;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0, 43, 77, 0.15);
            overflow: hidden;
            width: 100%;
            max-width: 580px;
            animation: slideInUp 0.6s cubic-bezier(0.25, 0.8, 0.25, 1);
            position: relative;
            border: 1px solid rgba(0,0,0,0.05);
        }

        /* Dekorasi Header */
        .success-header {
            background: linear-gradient(135deg, var(--teal-header) 0%, #00796b 100%);
            color: white;
            padding: 1.5rem 1.2rem;
            text-align: center;
            font-weight: 700;
            letter-spacing: 0.5px;
            font-size: 1rem;
            position: relative;
            box-shadow: 0 4px 12px rgba(0, 150, 136, 0.2);
        }
        .success-header::after {
            content: '';
            position: absolute;
            bottom: -12px;
            left: 50%;
            transform: translateX(-50%);
            width: 24px;
            height: 24px;
            background: linear-gradient(135deg, var(--teal-header) 0%, #00796b 100%);
            clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
        }

        .card-body-custom {
            padding: 2.2rem 1.8rem;
            text-align: center;
        }

        /* --- SUCCESS ICON --- */
        .success-icon-container {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #e0f7fa 0%, #b2ebf2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            animation: bounceIn 0.7s 0.2s backwards;
            border: 4px solid white;
            box-shadow: 0 8px 25px rgba(0, 150, 136, 0.15);
        }

        .success-icon {
            width: 48px;
            height: 48px;
            fill: #009688;
        }

        .user-title {
            font-weight: 800;
            color: var(--navy-primary);
            font-size: 1.6rem;
            margin-bottom: 0.4rem;
            line-height: 1.2;
        }

        .reg-id {
            color: #666;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            display: inline-block;
            background: #f0f7ff;
            padding: 7px 18px;
            border-radius: 50px;
            border: 1px solid #e1ecf8;
            font-family: 'Courier New', monospace;
            letter-spacing: 1px;
        }

        .info-text {
            color: #555;
            margin-bottom: 1.8rem;
            line-height: 1.6;
            font-size: 1rem;
            max-width: 450px;
            margin-left: auto;
            margin-right: auto;
        }

        /* --- KOTAK KREDENSIAL (TICKET STYLE) --- */
        .credential-ticket {
            background: linear-gradient(135deg, #fff8e1 0%, #ffecb3 100%);
            border: 2px dashed #ffd54f;
            border-radius: 14px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            position: relative;
            box-shadow: 0 6px 15px rgba(255, 193, 7, 0.1);
        }
        
        .cred-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.7);
        }
        .cred-row:last-child { 
            border-bottom: none; 
            padding-bottom: 0;
        }
        
        .cred-label { 
            font-size: 0.85rem; 
            color: #5d4037; 
            text-transform: uppercase; 
            font-weight: 700; 
            letter-spacing: 0.5px;
        }
        .cred-value { 
            font-size: 1.05rem; 
            font-weight: 800; 
            color: var(--navy-primary); 
            font-family: 'Courier New', monospace; 
            letter-spacing: 1.2px; 
            background: white;
            padding: 5px 14px;
            border-radius: 6px;
            border: 1px solid #ffe082;
        }

        /* --- BUTTONS --- */
        .action-buttons {
            display: grid;
            grid-template-columns: 1fr;
            gap: 14px;
        }

        .btn-action {
            display: block;
            width: 100%;
            padding: 14px 18px;
            border-radius: 14px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-transform: uppercase;
            font-size: 0.9rem;
            text-align: center;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .btn-action i {
            font-size: 1rem;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, var(--orange-primary) 0%, #ff6d00 100%);
            color: white;
            box-shadow: 0 6px 20px rgba(255, 127, 0, 0.35);
        }
        .btn-primary-custom:hover {
            background: linear-gradient(135deg, var(--orange-hover) 0%, #cc5b00 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 127, 0, 0.45);
            color: white;
        }

        .btn-secondary-custom {
            background: linear-gradient(135deg, white 0%, #f8f9fa 100%);
            color: #555;
            border: 2px solid #e9ecef;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        .btn-secondary-custom:hover {
            border-color: #ced4da;
            color: #333;
            background: linear-gradient(135deg, #f8f9fa 0%, white 100%);
            transform: translateY(-1px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.08);
        }

        .btn-download-custom {
            background: linear-gradient(135deg, var(--success-green) 0%, #1e8e3e 100%);
            color: white;
            box-shadow: 0 6px 20px rgba(40, 167, 69, 0.35);
        }
        .btn-download-custom:hover {
            background: linear-gradient(135deg, var(--success-green-hover) 0%, #197632 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(40, 167, 69, 0.45);
            color: white;
        }

        /* --- FOOTER --- */
        footer {
            background: linear-gradient(135deg, var(--navy-primary) 0%, #001f3f 100%);
            color: rgba(255,255,255,0.85);
            text-align: center;
            padding: 1.4rem 1rem;
            font-size: 0.85rem;
            margin-top: auto;
            box-shadow: 0 -4px 15px rgba(0, 43, 77, 0.1);
        }

        /* --- RESPONSIVE DESIGN --- */
        /* Extra Small Devices (Phones <576px) */
        @media (max-width: 575.98px) {
            .content-wrapper {
                padding: 1rem 0.8rem;
                min-height: calc(100vh - 100px);
            }
            
            .card-body-custom {
                padding: 1.8rem 1.2rem;
            }
            
            .user-title {
                font-size: 1.4rem;
            }
            
            .success-icon-container {
                width: 70px;
                height: 70px;
            }
            
            .success-icon {
                width: 42px;
                height: 42px;
            }
            
            .reg-id {
                font-size: 0.85rem;
                padding: 6px 14px;
            }
            
            .info-text {
                font-size: 0.95rem;
                margin-bottom: 1.4rem;
            }
            
            .credential-ticket {
                padding: 1.2rem;
            }
            
            .cred-label {
                font-size: 0.8rem;
            }
            
            .cred-value {
                font-size: 1rem;
                padding: 4px 12px;
            }
            
            .btn-action {
                padding: 12px 16px;
                font-size: 0.85rem;
                gap: 6px;
            }
            
            .btn-action i {
                font-size: 0.95rem;
            }
            
            .success-header {
                padding: 1.2rem 1rem;
                font-size: 0.95rem;
            }
        }

        /* Small Devices (Tablets ≥576px) */
        @media (min-width: 576px) and (max-width: 767.98px) {
            .action-buttons {
                grid-template-columns: 1fr 1fr;
            }
            
            .user-title {
                font-size: 1.7rem;
            }
            
            .success-icon-container {
                width: 85px;
                height: 85px;
            }
            
            .success-icon {
                width: 52px;
                height: 52px;
            }
        }

        /* Medium Devices (Desktops ≥768px) */
        @media (min-width: 768px) and (max-width: 991.98px) {
            .action-buttons {
                grid-template-columns: 1fr 1fr;
            }
            
            .user-title {
                font-size: 1.8rem;
            }
            
            .success-icon-container {
                width: 90px;
                height: 90px;
            }
            
            .success-icon {
                width: 56px;
                height: 56px;
            }
        }

        /* Large Devices (Desktops ≥992px) */
        @media (min-width: 992px) {
            .action-buttons {
                grid-template-columns: 1fr 1fr 1fr;
            }
            
            .user-title {
                font-size: 1.9rem;
            }
            
            .success-icon-container {
                width: 100px;
                height: 100px;
            }
            
            .success-icon {
                width: 60px;
                height: 60px;
            }
        }

        /* Hide download button when generating image */
        .hide-for-download {
            display: none !important;
        }
    </style>
</head>
<body>

    <div class="content-wrapper">
        <div class="card-success" id="downloadCard">
            <div class="success-header">
                <i class="fas fa-check-circle"></i> PENDAFTARAN BERHASIL
            </div>

            <div class="card-body-custom">
                <div class="success-icon-container">
                    <svg class="success-icon" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                </div>

                <h1 class="user-title">Hai, Bebelll4!</h1>
                <div class="reg-id">NO. PENDAFTARAN: <strong>PPDB2025008</strong></div>

                <p class="info-text">
                    Akun Anda telah berhasil dibuat.<br>
                    Silakan gunakan kredensial di bawah ini untuk login:
                </p>

                <div class="credential-ticket">
                    <div class="cred-row">
                        <span class="cred-label">Username</span>
                        <span class="cred-value">1234567789</span>
                    </div>
                    <div class="cred-row">
                        <span class="cred-label">Password</span>
                        <span class="cred-value">TESTESTES</span>
                    </div>
                </div>

                <div class="action-buttons">
                    <a href="{{ route('awal.index') }}" class="btn-action btn-secondary-custom">
                        <i class="fas fa-clock"></i> Lanjut Nanti
                    </a>
                    <a href="{{ route('awal.index') }}?nisn={{ session('nisn') }}&pass={{ session('password') }}" class="btn-action btn-primary-custom">
                        <i class="fas fa-arrow-right"></i> Lanjut Sekarang
                    </a>
                    <button id="downloadBtn" class="btn-action btn-download-custom">
                        <i class="fas fa-download"></i> Download JPG
                    </button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        Copyright &copy; 2026 AISYIYAH QUR'ANIC BOARDING SCHOOL. All Rights Reserved.
    </footer>

    <!-- Include html2canvas library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    
    <script>
        document.getElementById('downloadBtn').addEventListener('click', function() {
            const element = document.getElementById('downloadCard');
            const downloadBtn = document.getElementById('downloadBtn');
            
            // Hide download button temporarily
            downloadBtn.style.display = 'none';
            
            // Force remove animations for consistent download
            element.style.animation = 'none';
            const iconContainer = element.querySelector('.success-icon-container');
            if (iconContainer) {
                iconContainer.style.animation = 'none';
            }
            
            html2canvas(element, {
                scale: 2,
                backgroundColor: '#f8fafc',
                useCORS: true,
                logging: false,
                allowTaint: true,
                windowHeight: element.offsetHeight + 100,
                scrollY: -window.scrollY
            }).then(canvas => {
                // Restore download button
                downloadBtn.style.display = 'flex';
                
                const link = document.createElement('a');
                link.download = 'pendaftaran-berhasil-aisyiyah.jpg';
                link.href = canvas.toDataURL('image/jpeg', 0.95);
                link.click();
            }).catch(error => {
                console.error('Error generating image:', error);
                downloadBtn.style.display = 'flex';
                alert('Gagal membuat gambar. Silakan coba lagi.');
            });
        });
    </script>
</body>
</html>