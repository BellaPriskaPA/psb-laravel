<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - PSB AQBS Ponorogo</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --navy-primary: #002b49;
            --navy-dark: #001a2e;
            --blue-info: #00bcd4;
            --orange-primary: #ff7f00;
            --green-success: #28a745;
            --purple-accent: #6f42c1;
            --bg-body: #f8fafc;
            --sidebar-width: 280px;
            --transition-speed: 0.3s;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-body);
            color: #1e293b;
            overflow-x: hidden;
            padding-top: 70px;
            padding-bottom: 20px;
        }

        /* --- NAVBAR --- */
        .navbar-custom {
            background-color: var(--navy-primary);
            height: 70px;
            z-index: 1060;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            position: fixed;
            top: 0;
            width: 100%;
        }

        .top-nav-btn {
            color: white;
            text-decoration: none;
            text-align: center;
            padding: 8px 15px;
            font-size: 0.75rem;
            font-weight: 600;
            transition: var(--transition-speed);
        }
        .top-nav-btn:hover { color: var(--orange-primary); transform: translateY(-2px); }
        .top-nav-btn i { display: block; font-size: 1.3rem; margin-bottom: 3px; }

        /* --- SIDEBAR NAVY --- */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--navy-primary);
            position: fixed;
            top: 0; bottom: 0; left: 0;
            z-index: 1050;
            padding: 90px 15px 30px;
            transition: all var(--transition-speed) ease;
            overflow-y: auto;
            border-right: 1px solid rgba(255,255,255,0.05);
        }

        .menu-category {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: rgba(255,255,255,0.4);
            margin: 20px 0 10px 15px;
            font-weight: 800;
        }

        .menu-btn {
            width: 100%;
            text-align: left;
            border: none;
            background: transparent;
            padding: 12px 15px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            color: rgba(255,255,255,0.8);
            margin-bottom: 4px;
            transition: var(--transition-speed);
            text-decoration: none;
            position: relative;
        }
        .menu-btn:hover { 
            background: rgba(255,255,255,0.08); 
            color: white;
            transform: translateX(5px);
        }
        
        /* Dashboard Orange Active */
        .menu-btn.active-dashboard { 
            background: var(--orange-primary); 
            color: white; 
            box-shadow: 0 4px 12px rgba(255, 127, 0, 0.3);
            transform: translateX(0) !important;
        }
        .menu-btn.active-dashboard i { color: white !important; }
        .menu-btn.active-dashboard::after {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 30px;
            background: rgba(255,255,255,0.3);
            border-radius: 2px;
        }

        .menu-btn i { width: 30px; font-size: 1.1rem; color: var(--blue-info); }
        
        .sub-menu { list-style: none; padding-left: 45px; margin-top: 5px; }
        .sub-menu li { margin-bottom: 8px; position: relative; }
        .sub-menu a {
            text-decoration: none;
            color: rgba(255,255,255,0.5);
            font-size: 0.88rem;
            display: block;
            transition: var(--transition-speed);
        }
        .sub-menu li::before {
            content: "";
            position: absolute;
            left: -15px; top: 50%;
            transform: translateY(-50%);
            width: 6px; height: 6px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
        }
        .sub-menu a:hover { color: white; transform: translateX(3px); }

        /* --- MAIN CONTENT --- */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            transition: all var(--transition-speed) ease;
        }

        /* --- INFO BAR --- */
        .info-bar {
            background: white;
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-left: 6px solid var(--orange-primary);
            flex-wrap: wrap; 
            gap: 15px;
            transition: var(--transition-speed);
        }
        .info-bar:hover {
            box-shadow: 0 6px 20px rgba(0,0,0,0.12);
            transform: translateY(-2px);
        }
        .info-bar-item { display: flex; align-items: center; gap: 12px; }
        .info-icon { 
            width: 40px; 
            height: 40px; 
            background: #fff7ed; 
            color: var(--orange-primary); 
            border-radius: 10px; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-size: 1.1rem;
            transition: var(--transition-speed);
        }
        .info-bar-item:hover .info-icon {
            transform: rotate(15deg) scale(1.1);
            background: var(--orange-primary);
            color: white;
        }
        .info-bar-label { font-size: 0.65rem; color: #64748b; font-weight: 700; text-transform: uppercase; }
        .info-bar-value { font-size: 0.95rem; color: var(--navy-primary); font-weight: 800; display: block; }

        /* --- QUICK ACCESS PANEL --- */
        .quick-access {
            background: linear-gradient(135deg, var(--navy-primary), var(--navy-dark));
            border-radius: 20px;
            padding: 25px;
            color: white;
            margin-bottom: 25px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        .quick-access h3 {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: white;
        }
        .quick-access-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        .quick-card {
            background: rgba(255,255,255,0.1);
            border-radius: 16px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all var(--transition-speed);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
            position: relative;
            overflow: hidden;
        }
        .quick-card:hover {
            background: rgba(255,255,255,0.2);
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
        .quick-card i {
            font-size: 2rem;
            margin-bottom: 15px;
            display: block;
        }
        .quick-card h4 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 8px;
        }
        .quick-card p {
            font-size: 0.85rem;
            opacity: 0.8;
            margin-bottom: 10px;
        }
        .quick-card .current-value {
            font-size: 0.9rem;
            font-weight: 700;
            margin-top: 5px;
            color: var(--blue-info);
            background: rgba(0, 188, 212, 0.2);
            padding: 3px 8px;
            border-radius: 8px;
            display: inline-block;
        }

        /* --- QUICK STATS --- */
        .quick-stats {
            background: white;
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            border-left: 6px solid var(--green-success);
            transition: var(--transition-speed);
        }
        .quick-stats:hover {
            box-shadow: 0 6px 20px rgba(0,0,0,0.12);
            transform: translateY(-2px);
        }
        .quick-stats h3 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--navy-primary);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
        }
        .stat-item {
            text-align: center;
            padding: 20px;
            background: #f8fafc;
            border-radius: 16px;
            border: 2px solid #e2e8f0;
            transition: var(--transition-speed);
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        .stat-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--green-success), var(--orange-primary), var(--blue-info));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }
        .stat-item:hover {
            border-color: var(--blue-info);
            background: #f0f9ff;
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }
        .stat-item:hover::before {
            transform: scaleX(1);
        }
        .stat-value {
            font-size: 2rem;
            font-weight: 800;
            color: var(--navy-primary);
            margin-bottom: 8px;
            transition: var(--transition-speed);
        }
        .stat-item:hover .stat-value {
            color: var(--blue-info);
            transform: scale(1.1);
        }
        .stat-label {
            font-size: 0.85rem;
            color: #64748b;
            font-weight: 600;
        }

        /* --- EXAM CARDS --- */
        .exam-section {
            margin-top: 25px;
        }
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f1f5f9;
        }
        .section-title {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--navy-primary);
            position: relative;
            padding-bottom: 10px;
        }
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background: var(--orange-primary);
            border-radius: 2px;
        }
        .exam-cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
        }
        .exam-card {
            border: 2px solid #e2e8f0;
            border-radius: 20px;
            padding: 30px;
            background: white;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            transition: all var(--transition-speed) ease;
            position: relative;
            overflow: hidden;
        }
        .exam-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--green-success), var(--purple-accent), var(--orange-primary));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform var(--transition-speed) ease;
        }
        .exam-card:hover { 
            transform: translateY(-8px); 
            box-shadow: 0 12px 25px rgba(0,0,0,0.15);
            border-color: #cbd5e1;
        }
        .exam-card:hover::before {
            transform: scaleX(1);
        }
        .exam-card .icon-box {
            width: 70px;
            height: 70px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
            font-size: 1.8rem;
            transition: var(--transition-speed);
            background: rgba(107, 61, 198, 0.1);
            color: var(--purple-accent);
        }
        .exam-card:hover .icon-box {
            transform: scale(1.1) rotate(5deg);
        }
        .exam-card h3 {
            font-size: 1.4rem;
            font-weight: 800;
            margin-bottom: 18px;
            color: var(--navy-primary);
        }
        .exam-card p {
            color: #475569;
            margin-bottom: 25px;
            line-height: 1.6;
            font-size: 0.95rem;
        }
        .btn-exam {
            padding: 10px 24px;
            border-radius: 12px;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.95rem;
            transition: var(--transition-speed);
            border: 2px solid;
            background: transparent;
        }
        .btn-exam-primary {
            color: var(--green-success);
            border-color: var(--green-success);
        }
        .btn-exam-secondary {
            color: var(--purple-accent);
            border-color: var(--purple-accent);
        }
        .btn-exam-accent {
            color: var(--orange-primary);
            border-color: var(--orange-primary);
        }
        .exam-card:hover .btn-exam {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        /* Modal Styling */
        .modal-content {
            border-radius: 20px;
            border: none;
            box-shadow: 0 15px 50px rgba(0,0,0,0.3);
        }
        .modal-header {
            background: linear-gradient(135deg, var(--navy-primary), var(--navy-dark));
            color: white;
            border-radius: 20px 20px 0 0 !important;
            border: none;
            padding: 25px;
        }
        .modal-body {
            padding: 25px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            font-weight: 600;
            color: #475569;
            margin-bottom: 8px;
            display: block;
        }
        .form-control, .form-select {
            border-radius: 12px;
            padding: 12px 16px;
            border: 2px solid #e2e8f0;
            font-size: 1rem;
            transition: all var(--transition-speed);
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--blue-info);
            box-shadow: 0 0 0 3px rgba(0, 188, 212, 0.2);
        }
        .btn-modal-save {
            background: linear-gradient(135deg, var(--navy-primary), var(--navy-dark));
            color: white;
            border: none;
            padding: 12px 28px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            transition: all var(--transition-speed);
            width: 100%;
        }
        .btn-modal-save:hover {
            background: linear-gradient(135deg, var(--navy-dark), var(--navy-primary));
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.2);
        }

        /* Notification Toast */
        .toast-container {
            position: fixed;
            top: 80px;
            right: 20px;
            z-index: 1100;
        }
        .toast {
            border-radius: 12px;
            border: none;
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }
        .toast-header {
            background: var(--navy-primary);
            color: white;
            border-radius: 12px 12px 0 0 !important;
        }
        .toast-body {
            background: white;
            color: var(--navy-primary);
            font-weight: 600;
        }

        /* --- MOBILE OPTIMIZATION --- */
        .sidebar-overlay { 
            display: none; 
            position: fixed; 
            inset: 0; 
            background: rgba(0,0,0,0.5); 
            z-index: 1045; 
        }
        
        @media (max-width: 991px) {
            .sidebar { 
                transform: translateX(-100%); 
                width: 250px;
            }
            .sidebar.show { 
                transform: translateX(0); 
            }
            .main-content { 
                margin-left: 0; 
                padding: 15px;
            }
            .sidebar-overlay.show { 
                display: block; 
            }
            .info-bar { 
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }
            .info-bar-item { 
                flex-direction: column; 
                gap: 5px; 
                width: 100%;
            }
            .top-nav-btn span { 
                display: none; 
            }
            .section-header { 
                flex-direction: column; 
                align-items: flex-start; 
                gap: 15px; 
            }
            .exam-cards-container {
                grid-template-columns: 1fr;
            }
            .quick-access-cards {
                grid-template-columns: 1fr;
            }
            .stats-row {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 576px) {
            .exam-card { 
                padding: 20px; 
            }
            .section-title { 
                font-size: 1.4rem; 
            }
            .stat-value { 
                font-size: 1.6rem; 
            }
            .quick-card { 
                padding: 15px; 
            }
            .quick-card i { 
                font-size: 1.5rem; 
            }
            .modal-body { 
                padding: 20px; 
            }
            .info-bar {
                padding: 15px;
            }
            .info-icon {
                width: 35px;
                height: 35px;
            }
            .info-bar-label {
                font-size: 0.6rem;
            }
            .info-bar-value {
                font-size: 0.9rem;
            }
        }
        
        /* Modal Responsive Fixes */
        .modal-dialog {
            margin: 1.75rem auto;
            max-width: 500px;
        }
        
        @media (max-width: 576px) {
            .modal-dialog {
                margin: 1rem;
                max-width: none;
            }
            .modal-content {
                max-height: calc(100vh - 2rem);
                overflow-y: auto;
            }
            .modal-header {
                padding: 20px 15px;
            }
            .modal-body {
                padding: 20px 15px;
            }
            .modal-footer {
                padding: 0 15px 20px 15px;
                flex-direction: column;
                gap: 10px;
            }
            .btn-modal-save, .btn-secondary {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <div class="sidebar-overlay" id="overlay"></div>

    <nav class="navbar navbar-custom">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center">
                <button class="btn btn-link text-white me-2 d-lg-none" id="sidebarToggle">
                    <i class="fas fa-bars-staggered fa-lg"></i>
                </button>
                <img src="https://placehold.co/45?text=AQBS" class="rounded-circle border border-2 border-white me-2">
                <div class="lh-1 text-white d-none d-sm-block">
                    <span class="fw-bold d-block" style="font-size: 1.1rem; letter-spacing: -0.5px;">AQBS ADMIN</span>
                    <small class="opacity-75 fw-medium" style="font-size: 0.6rem;">Sistem Informasi PSB</small>
                </div>
            </div>
            
            <div class="ms-auto d-flex align-items-center">
                <a href="#" class="top-nav-btn text-warning"><i class="fas fa-chart-pie"></i><span>Dashboard</span></a>
                <a href="#" class="top-nav-btn"><i class="fas fa-user-shield"></i><span>Profil</span></a>
                <a href="#" class="top-nav-btn text-danger"><i class="fas fa-power-off"></i><span>Logout</span></a>
            </div>
        </div>
    </nav>

    <aside class="sidebar" id="sidebar">
        <div class="menu-category">Menu Utama</div>
        <div class="menu-group">
            <a href="#" class="menu-btn active-dashboard"><i class="fas fa-chart-pie"></i>Dashboard</a>
        </div>

        <div class="menu-category">Data Lembaga</div>
        <div class="menu-group">
            <button class="menu-btn"><i class="fas fa-university"></i>Kelembagaan</button>
            <ul class="sub-menu">
                <li><a href="#">Profil Lembaga</a></li>
                <li><a href="#">Jenjang / Program</a></li>
            </ul>
        </div>

        <div class="menu-category">Manajemen Santri</div>
        <div class="menu-group">
            <button class="menu-btn"><i class="fas fa-database"></i>Data PSB</button>
            <ul class="sub-menu">
                <li><a href="#">Semua Data</a></li>
                <li><a href="#">Daftar Berkas</a></li>
                <li><a href="#">Data Diterima</a></li>
                <li><a href="#">Siswa Daftar Ulang</a></li>
                <li><a href="#">Ditolak / Cadangan</a></li>
                <li><a href="#">Pembayaran</a></li>
                <li><a href="#" class="active">Rekap</a></li>
            </ul>
        </div>

        <div class="menu-category">Manajemen Ujian</div>
        <div class="menu-group">
            <a href="#" class="menu-btn"><i class="fas fa-clipboard-list"></i>Hasil Ujian</a>
            <a href="#" class="menu-btn"><i class="fas fa-file-edit"></i>Siapkan Ujian</a>
            <a href="#" class="menu-btn"><i class="fas fa-bullhorn"></i>Edit Pengumuman</a>
        </div>

        <div class="menu-category">Cetak</div>
        <div class="menu-group">
            <button class="menu-btn"><i class="fas fa-print"></i>Cetak Dokumen</button>
            <ul class="sub-menu">
                <li><a href="#">Data Penerimaan PSB</a></li>
            </ul>
        </div>

        <div class="menu-category">Konfigurasi</div>
        <div class="menu-group">
            <a href="#" class="menu-btn"><i class="fas fa-tools"></i>Setting Sistem</a>
            <a href="#" class="menu-btn"><i class="fas fa-user-lock"></i>Akun Admin</a>
            <a href="#" class="menu-btn"><i class="fas fa-users-cog"></i>Akun Siswa</a>
        </div>
    </aside>

    <main class="main-content">
        
        <!-- Info Bar with current values -->
        <div class="info-bar">
            <div class="info-bar-item">
                <div class="info-icon"><i class="fas fa-calendar-check"></i></div>
                <div>
                    <span class="info-bar-label">Tahun Pelajaran</span>
                    <span class="info-bar-value" id="currentTahun">2026 / 2027</span>
                </div>
            </div>
            <div class="info-bar-item">
                <div class="info-icon"><i class="fas fa-layer-group"></i></div>
                <div>
                    <span class="info-bar-label">Gelombang</span>
                    <span class="info-bar-value" id="currentGelombang">Gelombang 2</span>
                </div>
            </div>
            <div class="info-bar-item">
                <div class="info-icon text-success" style="background:#f0fdf4"><i class="fas fa-users-viewfinder"></i></div>
                <div>
                    <span class="info-bar-label">Sisa Kuota</span>
                    <span class="info-bar-value text-success">138 Kursi</span>
                </div>
            </div>
        </div>

        <!-- Quick Access Panel -->
        <div class="quick-access">
            <h3><i class="fas fa-bolt"></i> Quick Access</h3>
            <div class="quick-access-cards">
                <div class="quick-card" data-bs-toggle="modal" data-bs-target="#editGelombangModal">
                    <i class="fas fa-layer-group"></i>
                    <h4>Edit Gelombang</h4>
                    <p><span id="gelombangValue">Gelombang 2</span></p>
                    <div class="current-value">Saat ini: 2</div>
                </div>
                <div class="quick-card" data-bs-toggle="modal" data-bs-target="#editTahunModal">
                    <i class="fas fa-calendar-alt"></i>
                    <h4>Edit Tahun Ajaran</h4>
                    <p><span id="tahunValue">2026/2027</span></p>
                    <div class="current-value">Saat ini: 2026/2027</div>
                </div>
                <div class="quick-card" onclick="location.href='#'">
                    <i class="fas fa-users"></i>
                    <h4>Data Santri</h4>
                    <p>Kelola data pendaftar</p>
                </div>
                <div class="quick-card" onclick="location.href='#'">
                    <i class="fas fa-file-alt"></i>
                    <h4>Berkas</h4>
                    <p>Verifikasi dokumen</p>
                </div>
            </div>
        </div>

        <!-- Quick Stats Section -->
        <div class="quick-stats">
            <h3><i class="fas fa-chart-bar"></i> Statistik Pendaftaran</h3>
            <div class="stats-row">
                <div class="stat-item" data-target="total">
                    <div class="stat-value">45</div>
                    <div class="stat-label">Total Pendaftar</div>
                </div>
                <div class="stat-item" data-target="belum">
                    <div class="stat-value">12</div>
                    <div class="stat-label">Belum Verifikasi</div>
                </div>
                <div class="stat-item" data-target="valid">
                    <div class="stat-value">33</div>
                    <div class="stat-label">Valid/Terverifikasi</div>
                </div>
            </div>
        </div>

        <!-- Exam Management Section -->
        <div class="exam-section">
            <div class="section-header">
                <h2 class="section-title">Manajemen Ujian Santriwati</h2>
            </div>
            
            <div class="exam-cards-container">
                <div class="exam-card">
                    <div class="icon-box">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h3>Hasil Ujian</h3>
                    <p>Lihat dan kelola hasil ujian semua santriwati yang telah mengikuti tes seleksi.</p>
                    <a href="#" class="btn-exam btn-exam-primary">
                        Lihat Hasil <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                
                <div class="exam-card">
                    <div class="icon-box">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <h3>Siapkan Ujian</h3>
                    <p>Buat dan konfigurasi pelaksanaan ujian masuk untuk calon santriwati baru.</p>
                    <a href="#" class="btn-exam btn-exam-secondary">
                        Siapkan Tes <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                
                <div class="exam-card">
                    <div class="icon-box">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <h3>Edit Pengumuman</h3>
                    <p>Buat, edit, dan kelola pengumuman hasil ujian dan seleksi santriwati.</p>
                    <a href="#" class="btn-exam btn-exam-accent">
                        Kelola Pengumuman <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

    </main>

    <!-- Edit Gelombang Modal -->
    <div class="modal fade" id="editGelombangModal" tabindex="-1" aria-labelledby="editGelombangModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editGelombangModalLabel"><i class="fas fa-layer-group me-2"></i>Edit Gelombang Pendaftaran</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Pilih Gelombang</label>
                        <select class="form-select" id="modalGelombangSelect">
                            <option value="1">Gelombang 1</option>
                            <option value="2" selected>Gelombang 2</option>
                            <option value="3">Gelombang 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Keterangan</label>
                        <p class="text-muted">Gelombang pendaftaran saat ini akan diperbarui. Perubahan ini akan mempengaruhi semua data pendaftaran.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn-modal-save" id="saveGelombangBtn">
                        <i class="fas fa-save me-2"></i>Simpan Perubahan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Tahun Ajaran Modal -->
    <div class="modal fade" id="editTahunModal" tabindex="-1" aria-labelledby="editTahunModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTahunModalLabel"><i class="fas fa-calendar-alt me-2"></i>Edit Tahun Ajaran</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Tahun Ajaran</label>
                        <input type="text" class="form-control" id="modalTahunInput" placeholder="Contoh: 2026/2027" value="2026/2027">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Format</label>
                        <p class="text-muted">Gunakan format: TAHUN_MULAI/TAHUN_AKHIR (contoh: 2026/2027)</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn-modal-save" id="saveTahunBtn">
                        <i class="fas fa-save me-2"></i>Simpan Perubahan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div class="toast-container">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="notificationToast">
            <div class="toast-header">
                <strong class="me-auto"><i class="fas fa-check-circle me-2"></i>Berhasil!</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" id="toastMessage">
                Konfigurasi berhasil disimpan!
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize components
        const currentTahun = document.getElementById('currentTahun');
        const currentGelombang = document.getElementById('currentGelombang');
        const gelombangValue = document.getElementById('gelombangValue');
        const tahunValue = document.getElementById('tahunValue');
        const modalGelombangSelect = document.getElementById('modalGelombangSelect');
        const modalTahunInput = document.getElementById('modalTahunInput');
        const saveGelombangBtn = document.getElementById('saveGelombangBtn');
        const saveTahunBtn = document.getElementById('saveTahunBtn');
        const toastEl = document.getElementById('notificationToast');
        const toastMessage = document.getElementById('toastMessage');
        const toast = new bootstrap.Toast(toastEl);
        const statItems = document.querySelectorAll('.stat-item');

        // Sidebar toggle
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const toggleBtn = document.getElementById('sidebarToggle');
        
        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('show');
            overlay.classList.toggle('show');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.remove('show');
            overlay.classList.remove('show');
        });
        
        // Menu active state
        document.querySelectorAll('.menu-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelectorAll('.menu-btn').forEach(b => b.classList.remove('active-dashboard'));
                this.classList.add('active-dashboard');
            });
        });
        
        // Sync modal values with current values
        const editGelombangModal = document.getElementById('editGelombangModal');
        const editTahunModal = document.getElementById('editTahunModal');
        
        editGelombangModal.addEventListener('show.bs.modal', function () {
            // Set modal select to current value
            const currentValue = currentGelombang.textContent.replace('Gelombang ', '');
            modalGelombangSelect.value = currentValue;
        });
        
        editTahunModal.addEventListener('show.bs.modal', function () {
            // Set modal input to current value
            const currentValue = currentTahun.textContent.replace(' / ', '/');
            modalTahunInput.value = currentValue;
        });
        
        // Save gelombang changes
        saveGelombangBtn.addEventListener('click', function() {
            const selectedValue = modalGelombangSelect.value;
            const newGelombangText = `Gelombang ${selectedValue}`;
            
            // Update all displays
            currentGelombang.textContent = newGelombangText;
            gelombangValue.textContent = newGelombangText;
            document.querySelector('.quick-card:nth-child(1) .current-value').textContent = `Saat ini: ${selectedValue}`;
            
            // Show success message
            toastMessage.textContent = `Gelombang pendaftaran berhasil diubah menjadi Gelombang ${selectedValue}!`;
            toast.show();
            
            // Close modal
            bootstrap.Modal.getInstance(editGelombangModal).hide();
        });
        
        // Save tahun ajaran changes
        saveTahunBtn.addEventListener('click', function() {
            const inputValue = modalTahunInput.value.trim();
            if (!inputValue) {
                alert('Tahun ajaran tidak boleh kosong!');
                return;
            }
            
            // Format the year for display
            const formattedYear = inputValue.replace('/', ' / ');
            
            // Update all displays
            currentTahun.textContent = formattedYear;
            tahunValue.textContent = inputValue;
            document.querySelector('.quick-card:nth-child(2) .current-value').textContent = `Saat ini: ${inputValue}`;
            
            // Show success message
            toastMessage.textContent = `Tahun ajaran berhasil diubah menjadi ${inputValue}!`;
            toast.show();
            
            // Close modal
            bootstrap.Modal.getInstance(editTahunModal).hide();
        });
        
        // Stat items clickable interaction
        statItems.forEach(item => {
            item.addEventListener('click', function() {
                const target = this.getAttribute('data-target');
                // Add visual feedback
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
                
                // In a real app, you would navigate to the appropriate section
                console.log(`Navigating to ${target} section`);
            });
        });
        
        // Add subtle entrance animations
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.info-bar, .quick-access, .quick-stats, .exam-card');
            elements.forEach((el, index) => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(20px)';
                el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                
                setTimeout(() => {
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                }, 300 + (index * 100));
            });
        });
    </script>
</body>
</html>

