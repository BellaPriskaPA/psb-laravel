<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Data PSB - Admin PSB AQBS</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --navy-primary: #002b49;
            --navy-dark: #001a2e;
            --blue-info: #00bcd4;
            --orange-primary: #ff7f00;
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
        .sub-menu a:hover { 
            color: white; 
            transform: translateX(3px); 
            font-weight: 600;
        }
        .sub-menu a.active { 
            color: white; 
            font-weight: 700;
        }
        .sub-menu a.active::before { 
            background: var(--blue-info); 
        }

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
        }
        .info-bar-item { display: flex; align-items: center; gap: 12px; }
        .info-icon { width: 40px; height: 40px; background: #fff7ed; color: var(--orange-primary); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; }
        .info-bar-label { font-size: 0.65rem; color: #64748b; font-weight: 700; text-transform: uppercase; }
        .info-bar-value { font-size: 0.95rem; color: var(--navy-primary); font-weight: 800; display: block; }

        /* Export Buttons */
        .export-buttons {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
            flex-wrap: wrap;
        }
        .btn-export {
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all var(--transition-speed);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            min-width: 120px;
            justify-content: center;
        }
        .btn-export-pdf {
            background: #ef4444;
            color: white;
            border: 1px solid #dc2626;
        }
        .btn-export-pdf:hover {
            background: #dc2626;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }
        .btn-export-excel {
            background: #22c55e;
            color: white;
            border: 1px solid #16a34a;
        }
        .btn-export-excel:hover {
            background: #16a34a;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
        }

        /* Items Per Page Selector */
        .items-per-page-selector {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }
        .items-per-page-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--navy-primary);
            white-space: nowrap;
        }
        .items-per-page-btn {
            padding: 6px 12px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.8rem;
            transition: var(--transition-speed);
            background: white;
            border: 1px solid #e2e8f0;
            color: var(--navy-primary);
            cursor: pointer;
        }
        .items-per-page-btn:hover {
            background: #f8fafc;
            border-color: var(--navy-primary);
        }
        .items-per-page-btn.active {
            background: var(--navy-primary);
            color: white;
            border-color: var(--navy-primary);
        }

        /* --- RECAP TABLE STYLES --- */
        .card-custom { 
            background: white; 
            border-radius: 20px; 
            border: 1px solid #e2e8f0; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.08); 
            overflow: hidden; 
            transition: var(--transition-speed);
            margin-bottom: 30px;
        }
        .card-custom:hover {
            box-shadow: 0 6px 20px rgba(0,0,0,0.12);
            transform: translateY(-2px);
        }

        .table th {
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            font-size: 0.75rem;
            padding: 15px 20px;
            border-bottom: 2px solid #f1f5f9;
        }
        .table td {
            padding: 15px 20px;
            vertical-align: middle;
            font-size: 0.9rem;
            color: #334155;
            border-bottom: 1px solid #f1f5f9;
        }

        /* Status Indicators */
        .status-indicator {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 8px;
        }
        .status-complete {
            background: #4ade80;
            color: white;
        }
        .status-incomplete {
            background: #94a3b8;
            color: white;
        }
        .status-pending {
            background: #f59e0b;
            color: white;
        }

        /* Status Badges */
        .status-badge {
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 700;
            display: inline-block;
        }
        .status-santriwati {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }
        .status-daftar-ulang {
            background: #fef9c3;
            color: #a16207;
            border: 1px solid #fef08a;
        }
        .status-proses {
            background: #e0f2fe;
            color: #0369a1;
            border: 1px solid #bae6fd;
        }

        /* Action Buttons */
        .btn-action {
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.85rem;
            transition: var(--transition-speed);
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .btn-update {
            background: #dbeafe;
            color: #1e40af;
            border: 1px solid #bfdbfe;
        }
        .btn-update:hover {
            background: #1e40af;
            color: white;
            transform: translateY(-2px);
        }
        .btn-detail {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }
        .btn-detail:hover {
            background: #166534;
            color: white;
            transform: translateY(-2px);
        }

        /* Filter Card */
        .filter-card {
            background: white;
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            border-left: 4px solid var(--blue-info);
        }
        .filter-card h6 {
            font-size: 0.85rem;
            font-weight: 700;
            color: #64748b;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        /* Legend */
        .legend-card {
            background: white;
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            border-left: 4px solid var(--orange-primary);
        }
        .legend-card h6 {
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--navy-primary);
            margin-bottom: 15px;
            text-transform: uppercase;
        }
        .legend-item {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px;
        }
        .legend-color {
            width: 20px;
            height: 20px;
            border-radius: 50%;
        }
        .legend-complete { background: #4ade80; }
        .legend-incomplete { background: #94a3b8; }
        .legend-pending { background: #f59e0b; }

        /* Info Alert */
        .info-alert {
            background: #f0f9ff;
            border: 1px solid #bae6fd;
            border-left: 4px solid var(--blue-info);
            border-radius: 12px;
            padding: 12px 16px;
            margin-bottom: 20px;
            font-size: 0.85rem;
        }

        /* --- TABLE FOOTER --- */
        .table-footer {
            padding: 20px;
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }
        .pagination {
            margin: 0;
        }
        .pagination .page-link {
            color: var(--navy-primary);
            border: 1px solid #e2e8f0;
            padding: 6px 12px;
            margin: 0 2px;
            border-radius: 8px;
            transition: var(--transition-speed);
            min-width: 36px;
            text-align: center;
        }
        .pagination .page-link:hover {
            background: var(--navy-primary);
            color: white;
            border-color: var(--navy-primary);
        }
        .pagination .page-item.active .page-link {
            background: var(--navy-primary);
            color: white;
            border-color: var(--navy-primary);
        }

        /* --- TOAST NOTIFICATION --- */
        .toast-container {
            position: fixed;
            bottom: 20px;
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
        
        /* Mobile-first approach */
        @media (max-width: 991px) {
            .sidebar { 
                transform: translateX(-100%); 
                width: 280px;
                padding-top: 80px;
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
                width: 100%;
            }
            .top-nav-btn span { 
                display: none; 
            }
            
            /* Filter card adjustments */
            .filter-card {
                padding: 15px;
            }
            .filter-card .form-label {
                font-size: 0.75rem;
                margin-bottom: 5px;
            }
            .form-select, .form-control {
                font-size: 0.85rem;
                padding: 8px 12px;
            }
            .btn-filter {
                padding: 8px 16px;
                font-size: 0.85rem;
            }
            
            /* Export buttons */
            .export-buttons {
                justify-content: center;
            }
            .btn-export {
                width: 100%;
                max-width: 200px;
            }
            
            /* Items per page selector */
            .items-per-page-selector {
                flex-wrap: wrap;
                justify-content: center;
            }
            
            /* Table adjustments */
            .table-responsive {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
            .table {
                min-width: 600px;
            }
            .table th, .table td {
                padding: 12px 10px;
                font-size: 0.85rem;
            }
            .status-indicator {
                width: 20px;
                height: 20px;
                font-size: 0.7rem;
            }
            .status-badge {
                font-size: 0.7rem;
                padding: 4px 10px;
            }
            .btn-action {
                padding: 6px 12px;
                font-size: 0.8rem;
            }
            
            /* Footer adjustments */
            .table-footer {
                flex-direction: column;
                align-items: stretch;
                gap: 15px;
            }
            .pagination {
                justify-content: center;
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
        
        /* Smaller mobile devices */
        @media (max-width: 576px) {
            body {
                padding-top: 65px;
                padding-bottom: 15px;
            }
            
            .navbar-custom {
                height: 65px;
            }
            
            .table {
                min-width: 550px;
            }
            .table th, .table td {
                padding: 10px 8px;
                font-size: 0.8rem;
            }
            
            /* Items per page buttons */
            .items-per-page-btn {
                padding: 5px 10px;
                font-size: 0.75rem;
            }
            
            /* Card view for very small screens */
            .table thead {
                display: none;
            }
            
            .table tbody,
            .table tr,
            .table td {
                display: block;
            }
            
            .table tr {
                border: 1px solid #e2e8f0;
                border-radius: 16px;
                margin-bottom: 15px;
                padding: 15px;
                background: white;
                box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            }
            
            .table td {
                padding: 8px 0;
                border: none;
                position: relative;
                padding-left: 40%;
            }
            
            .table td:before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 38%;
                padding-right: 10px;
                font-weight: 700;
                color: #64748b;
                font-size: 0.85rem;
                word-wrap: break-word;
            }
            
            .table td.text-center {
                text-align: left;
                padding-left: 0;
            }
            
            .table td.text-center:before {
                content: "Aksi";
                width: 100%;
                padding-bottom: 8px;
                border-bottom: 1px solid #e2e8f0;
                margin-bottom: 8px;
            }
            
            /* Action button in card view */
            .table td.text-center .btn-action {
                width: 100%;
                justify-content: center;
            }
            
            /* Pagination for small screens */
            .pagination .page-link {
                padding: 6px 10px;
                font-size: 0.8rem;
                min-width: 32px;
            }
        }
        
        /* Extra small devices */
        @media (max-width: 400px) {
            .table {
                min-width: 500px;
            }
            .status-indicator {
                width: 18px;
                height: 18px;
                font-size: 0.6rem;
            }
            .status-badge {
                font-size: 0.65rem;
                padding: 3px 8px;
            }
            .btn-action {
                padding: 5px 10px;
                font-size: 0.75rem;
            }
            .export-buttons {
                gap: 8px;
            }
            .btn-export {
                padding: 6px 12px;
                font-size: 0.8rem;
                min-width: auto;
            }
            .items-per-page-btn {
                padding: 4px 8px;
                font-size: 0.7rem;
            }
        }
        
        /* Touch-friendly adjustments */
        @media (hover: none) and (pointer: coarse) {
            .menu-btn, .sub-menu a, .btn-action, .btn-export, .pagination .page-link, .items-per-page-btn {
                padding: 14px 15px;
                min-height: 44px;
            }
            .items-per-page-btn {
                padding: 10px 15px;
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
                    <small class="opacity-75 fw-medium" style="font-size: 0.6rem;">Rekap Data PSB</small>
                </div>
            </div>
            
            <div class="ms-auto d-flex align-items-center">
                <a href="#" class="top-nav-btn"><i class="fas fa-chart-pie"></i><span>Dashboard</span></a>
                <a href="#" class="top-nav-btn text-warning"><i class="fas fa-user-shield"></i><span>Profil</span></a>
                <a href="#" class="top-nav-btn text-danger"><i class="fas fa-power-off"></i><span>Logout</span></a>
            </div>
        </div>
    </nav>

    <aside class="sidebar" id="sidebar">
        <div class="menu-category">Menu Utama</div>
        <div class="menu-group">
            <a href="#" class="menu-btn"><i class="fas fa-chart-pie"></i>Dashboard</a>
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
            <button class="menu-btn active-dashboard"><i class="fas fa-database"></i>Data PSB</button>
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
                    <span class="info-bar-value">2026 / 2027</span>
                </div>
            </div>
            <div class="info-bar-item">
                <div class="info-icon"><i class="fas fa-layer-group"></i></div>
                <div>
                    <span class="info-bar-label">Gelombang</span>
                    <span class="info-bar-value">Gelombang 2</span>
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

        <div class="mb-4">
            <h4 class="fw-bold" style="color: var(--navy-primary);">Rekap Persyaratan Pendaftaran Santriwati</h4>
            <p class="text-muted small">Monitoring kelengkapan persyaratan dan status akhir calon santriwati.</p>
        </div>

        <!-- Info Alert -->
        <div class="info-alert">
            <i class="fas fa-info-circle me-2" style="color: var(--blue-info);"></i>
            <strong>Catatan:</strong> Kolom <em>Formulir Lengkap</em> menandakan kelengkapan formulir pendaftaran, sedangkan <em>Surat Pernyataan</em> menandakan keabsahan surat pernyataan yang ditandatangani.
        </div>

        <!-- Export Buttons -->
        <div class="export-buttons">
            <a href="#" class="btn-export btn-export-pdf" id="exportPdfBtn">
                <i class="fas fa-file-pdf"></i> Ekspor PDF
            </a>
            <a href="#" class="btn-export btn-export-excel" id="exportExcelBtn">
                <i class="fas fa-file-excel"></i> Ekspor Excel
            </a>
        </div>

        <!-- Items Per Page Selector -->
        <div class="items-per-page-selector">
            <span class="items-per-page-label">Tampilkan:</span>
            <button class="items-per-page-btn active" data-items="10">10</button>
            <button class="items-per-page-btn" data-items="25">25</button>
            <button class="items-per-page-btn" data-items="50">50</button>
            <button class="items-per-page-btn" data-items="100">100</button>
            <button class="items-per-page-btn" data-items="all">Semua</button>
        </div>

        <!-- Legend Explanation -->
        <div class="legend-card">
            <h6><i class="fas fa-info-circle me-2"></i>Keterangan Status Persyaratan</h6>
            <div class="legend-item">
                <div class="legend-color legend-complete"></div>
                <span>Syarat terpenuhi</span>
            </div>
            <div class="legend-item">
                <div class="legend-color legend-pending"></div>
                <span>Belum diverifikasi</span>
            </div>
            <div class="legend-item">
                <div class="legend-color legend-incomplete"></div>
                <span>Syarat belum terpenuhi</span>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="filter-card">
            <div class="row g-3">
                <div class="col-12 col-md-3">
                    <label class="small fw-bold mb-1">Tahun Ajaran</label>
                    <select class="form-select form-select-sm" id="filterTahun">
                        <option>2026/2027</option>
                        <option>2025/2026</option>
                    </select>
                </div>
                <div class="col-12 col-md-3">
                    <label class="small fw-bold mb-1">Gelombang</label>
                    <select class="form-select form-select-sm" id="filterGelombang">
                        <option value="">Semua Gelombang</option>
                        <option>Gelombang 1</option>
                        <option selected>Gelombang 2</option>
                        <option>Gelombang 3</option>
                    </select>
                </div>
                <div class="col-12 col-md-3">
                    <label class="small fw-bold mb-1">Jenjang</label>
                    <select class="form-select form-select-sm" id="filterJenjang">
                        <option value="">Semua Jenjang</option>
                        <option>SMP</option>
                        <option>SMA</option>
                    </select>
                </div>
                <div class="col-12 col-md-3">
                    <label class="small fw-bold mb-1">Status Akhir</label>
                    <select class="form-select form-select-sm" id="filterStatus">
                        <option value="">Semua Status</option>
                        <option>Santriwati</option>
                        <option>Daftar Ulang</option>
                        <option>Proses Seleksi</option>
                    </select>
                </div>
            </div>
            <div class="row g-3 mt-2">
                <div class="col-md-12 d-flex justify-content-end">
                    <button class="btn-filter w-100" id="applyFilterBtn" style="background: linear-gradient(135deg, var(--orange-primary), #e67100); color: white; border: none; padding: 8px 16px; border-radius: 8px; font-weight: 600; font-size: 0.85rem;">
                        <i class="fas fa-search me-1"></i> TAMPILKAN DATA
                    </button>
                </div>
            </div>
        </div>

        <!-- Rekap Table -->
        <div class="card-custom">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="rekapTable">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4" width="50">#</th>
                            <th>NISN / Nama Santriwati</th>
                            <th class="text-center">Nilai Ujian<br>(≥75)</th>
                            <th class="text-center">Formulir<br>Lengkap</th>
                            <th class="text-center">Surat<br>Pernyataan</th>
                            <th class="text-center">Pembayaran<br>Awal</th>
                            <th class="text-center">Pembayaran<br>Akhir</th>
                            <th>Status Akhir</th>
                            <th class="text-center" width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="rekapTableBody">
                        <!-- Table rows will be populated by JavaScript -->
                    </tbody>
                </table>
            </div>
            <div class="table-footer">
                <div>
                    <small class="text-muted fw-medium" id="resultCount">Menampilkan 0 dari 0 santriwati</small>
                </div>
                <nav>
                    <ul class="pagination pagination-sm mb-0" id="pagination">
                        <!-- Pagination will be populated by JavaScript -->
                    </ul>
                </nav>
            </div>
        </div>
    </main>

    <!-- Success Toast -->
    <div class="toast-container">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="successToast">
            <div class="toast-header">
                <strong class="me-auto"><i class="fas fa-check-circle me-2"></i>Berhasil!</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" id="toastMessage">
                Data berhasil diekspor!
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize components
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const toggleBtn = document.getElementById('sidebarToggle');
        const rekapTableBody = document.getElementById('rekapTableBody');
        const applyFilterBtn = document.getElementById('applyFilterBtn');
        const exportPdfBtn = document.getElementById('exportPdfBtn');
        const exportExcelBtn = document.getElementById('exportExcelBtn');
        const successToastEl = document.getElementById('successToast');
        const successToast = new bootstrap.Toast(successToastEl);
        const toastMessage = document.getElementById('toastMessage');
        const resultCount = document.getElementById('resultCount');
        const itemsPerPageBtns = document.querySelectorAll('.items-per-page-btn');
        
        // Pagination variables
        let currentPage = 1;
        let itemsPerPage = 10;

        // Initial data dengan kolom surat_pernyataan
        let rekapData = [
            {
                id: 1,
                nisn: "0081122334",
                nama: "ANNISA RAHMAWATI",
                nilai_ujian: 87.5,
                formulir_lengkap: true,
                surat_pernyataan: true,
                pembayaran_awal: true,
                pembayaran_akhir: true,
                jenjang: "SMP",
                gelombang: "Gelombang 2"
            },
            {
                id: 2,
                nisn: "0099228833",
                nama: "SITI FATIMAH",
                nilai_ujian: 92.0,
                formulir_lengkap: true,
                surat_pernyataan: true,
                pembayaran_awal: true,
                pembayaran_akhir: false,
                jenjang: "SMA",
                gelombang: "Gelombang 2"
            },
            {
                id: 3,
                nisn: "0077665544",
                nama: "NURUL HUDA",
                nilai_ujian: 65.0,
                formulir_lengkap: true,
                surat_pernyataan: false,
                pembayaran_awal: false,
                pembayaran_akhir: false,
                jenjang: "SMP",
                gelombang: "Gelombang 2"
            },
            {
                id: 4,
                nisn: "0066554433",
                nama: "FATIMAH ZAHRA",
                nilai_ujian: 78.5,
                formulir_lengkap: false,
                surat_pernyataan: false,
                pembayaran_awal: false,
                pembayaran_akhir: false,
                jenjang: "SMA",
                gelombang: "Gelombang 2"
            },
            {
                id: 5,
                nisn: "0055443322",
                nama: "AINUN NAIM",
                nilai_ujian: 82.0,
                formulir_lengkap: true,
                surat_pernyataan: true,
                pembayaran_awal: true,
                pembayaran_akhir: true,
                jenjang: "SMP",
                gelombang: "Gelombang 2"
            },
            {
                id: 6,
                nisn: "0044332211",
                nama: "ZAHRA NABILA",
                nilai_ujian: 76.0,
                formulir_lengkap: true,
                surat_pernyataan: true,
                pembayaran_awal: true,
                pembayaran_akhir: false,
                jenjang: "SMA",
                gelombang: "Gelombang 1"
            },
            {
                id: 7,
                nisn: "0033221100",
                nama: "NURUL AISYAH",
                nilai_ujian: 85.5,
                formulir_lengkap: true,
                surat_pernyataan: true,
                pembayaran_awal: true,
                pembayaran_akhir: true,
                jenjang: "SMP",
                gelombang: "Gelombang 3"
            },
            {
                id: 8,
                nisn: "0022110099",
                nama: "SALMA SALSABILA",
                nilai_ujian: 88.0,
                formulir_lengkap: true,
                surat_pernyataan: true,
                pembayaran_awal: true,
                pembayaran_akhir: false,
                jenjang: "SMA",
                gelombang: "Gelombang 2"
            },
            {
                id: 9,
                nisn: "0011009988",
                nama: "NABILA KAMILA",
                nilai_ujian: 72.5,
                formulir_lengkap: true,
                surat_pernyataan: false,
                pembayaran_awal: false,
                pembayaran_akhir: false,
                jenjang: "SMP",
                gelombang: "Gelombang 1"
            },
            {
                id: 10,
                nisn: "0099887766",
                nama: "FATIMAH AZ-ZAHRA",
                nilai_ujian: 90.0,
                formulir_lengkap: true,
                surat_pernyataan: true,
                pembayaran_awal: true,
                pembayaran_akhir: true,
                jenjang: "SMA",
                gelombang: "Gelombang 2"
            },
            {
                id: 11,
                nisn: "0088776655",
                nama: "AISYAH RAHMA",
                nilai_ujian: 81.0,
                formulir_lengkap: false,
                surat_pernyataan: true,
                pembayaran_awal: true,
                pembayaran_akhir: false,
                jenjang: "SMP",
                gelombang: "Gelombang 3"
            },
            {
                id: 12,
                nisn: "0077665544",
                nama: "KHADIJAH NUR",
                nilai_ujian: 79.5,
                formulir_lengkap: true,
                surat_pernyataan: true,
                pembayaran_awal: false,
                pembayaran_akhir: false,
                jenjang: "SMA",
                gelombang: "Gelombang 2"
            },
            {
                id: 13,
                nisn: "0066554433",
                nama: "MARYAM HANIFAH",
                nilai_ujian: 85.0,
                formulir_lengkap: true,
                surat_pernyataan: true,
                pembayaran_awal: true,
                pembayaran_akhir: true,
                jenjang: "SMP",
                gelombang: "Gelombang 1"
            },
            {
                id: 14,
                nisn: "0055443322",
                nama: "ZAHRAA SABILA",
                nilai_ujian: 68.0,
                formulir_lengkap: false,
                surat_pernyataan: false,
                pembayaran_awal: false,
                pembayaran_akhir: false,
                jenjang: "SMA",
                gelombang: "Gelombang 2"
            },
            {
                id: 15,
                nisn: "0044332211",
                nama: "RAHMA ALIYAH",
                nilai_ujian: 93.5,
                formulir_lengkap: true,
                surat_pernyataan: true,
                pembayaran_awal: true,
                pembayaran_akhir: true,
                jenjang: "SMP",
                gelombang: "Gelombang 3"
            },
            {
                id: 16,
                nisn: "0033221100",
                nama: "SALSABILA NUR",
                nilai_ujian: 84.0,
                formulir_lengkap: true,
                surat_pernyataan: true,
                pembayaran_awal: true,
                pembayaran_akhir: false,
                jenjang: "SMA",
                gelombang: "Gelombang 2"
            },
            {
                id: 17,
                nisn: "0022110099",
                nama: "HAFSAH MAULIDA",
                nilai_ujian: 77.0,
                formulir_lengkap: true,
                surat_pernyataan: false,
                pembayaran_awal: true,
                pembayaran_akhir: false,
                jenjang: "SMP",
                gelombang: "Gelombang 1"
            },
            {
                id: 18,
                nisn: "0011009988",
                nama: "NAILA KAMILIA",
                nilai_ujian: 89.5,
                formulir_lengkap: true,
                surat_pernyataan: true,
                pembayaran_awal: true,
                pembayaran_akhir: true,
                jenjang: "SMA",
                gelombang: "Gelombang 2"
            },
            {
                id: 19,
                nisn: "0099887766",
                nama: "SYIFA QURRATA",
                nilai_ujian: 74.0,
                formulir_lengkap: false,
                surat_pernyataan: true,
                pembayaran_awal: false,
                pembayaran_akhir: false,
                jenjang: "SMP",
                gelombang: "Gelombang 3"
            },
            {
                id: 20,
                nisn: "0088776655",
                nama: "YASMIN NURAINI",
                nilai_ujian: 91.0,
                formulir_lengkap: true,
                surat_pernyataan: true,
                pembayaran_awal: true,
                pembayaran_akhir: true,
                jenjang: "SMA",
                gelombang: "Gelombang 2"
            }
        ];

        // Load data from URL hash if available
        function loadSavedData() {
            const hash = window.location.hash;
            if (hash.startsWith('#data=')) {
                try {
                    const encodedData = hash.substring(6);
                    const decodedData = decodeURIComponent(atob(encodedData));
                    rekapData = JSON.parse(decodedData);
                } catch (error) {
                    console.error('Error loading saved data:', error);
                }
            }
            renderTable();
        }

        // Save data to URL hash
        function saveData() {
            const dataString = JSON.stringify(rekapData);
            const encodedData = btoa(encodeURIComponent(dataString));
            window.location.hash = `data=${encodedData}`;
        }

        // Get status badge based on requirements (dengan surat_pernyataan)
        function getStatusBadge(item) {
            if (item.nilai_ujian >= 75 && item.formulir_lengkap && item.surat_pernyataan && item.pembayaran_awal && item.pembayaran_akhir) {
                return 'status-santriwati';
            } else if (item.nilai_ujian >= 75 && item.formulir_lengkap && item.surat_pernyataan && item.pembayaran_awal && !item.pembayaran_akhir) {
                return 'status-daftar-ulang';
            } else {
                return 'status-proses';
            }
        }

        // Get status text based on requirements (dengan surat_pernyataan)
        function getStatusText(item) {
            if (item.nilai_ujian >= 75 && item.formulir_lengkap && item.surat_pernyataan && item.pembayaran_awal && item.pembayaran_akhir) {
                return 'Santriwati';
            } else if (item.nilai_ujian >= 75 && item.formulir_lengkap && item.surat_pernyataan && item.pembayaran_awal && !item.pembayaran_akhir) {
                return 'Daftar Ulang';
            } else {
                return 'Proses Seleksi';
            }
        }

        // Get status indicator class
        function getStatusIndicator(value, isBoolean = true) {
            if (isBoolean) {
                return value ? 'status-complete' : 'status-incomplete';
            } else {
                return value >= 75 ? 'status-complete' : 'status-incomplete';
            }
        }

        // Get filtered data based on current filters
        function getFilteredData() {
            const tahun = document.getElementById('filterTahun').value;
            const gelombang = document.getElementById('filterGelombang').value;
            const jenjang = document.getElementById('filterJenjang').value;
            const status = document.getElementById('filterStatus').value;
            
            return rekapData.filter(item => {
                // Check jenjang
                if (jenjang && item.jenjang !== jenjang) return false;
                
                // Check gelombang
                if (gelombang && item.gelombang !== gelombang) return false;
                
                // Check status
                if (status && getStatusText(item) !== status) return false;
                
                return true;
            });
        }

        // Render table with pagination (dengan kolom surat_pernyataan)
        function renderTable() {
            const filteredData = getFilteredData();
            const totalItems = filteredData.length;
            
            // Calculate pagination
            let startIndex = 0;
            let endIndex = totalItems;
            let displayData = filteredData;
            
            if (itemsPerPage !== 'all') {
                startIndex = (currentPage - 1) * itemsPerPage;
                endIndex = Math.min(startIndex + itemsPerPage, totalItems);
                displayData = filteredData.slice(startIndex, endIndex);
            }
            
            rekapTableBody.innerHTML = '';
            displayData.forEach((item, index) => {
                const row = document.createElement('tr');
                const statusBadge = getStatusBadge(item);
                const statusText = getStatusText(item);
                const itemNumber = itemsPerPage === 'all' ? index + 1 : startIndex + index + 1;
                
                row.innerHTML = `
                    <td class="ps-4" data-label="#">${itemNumber}</td>
                    <td data-label="NISN / Nama Santriwati">
                        <div class="fw-bold" style="color: var(--navy-primary);">${item.nisn}</div>
                        <div class="small text-muted">${item.nama}</div>
                    </td>
                    <td class="text-center" data-label="Nilai Ujian (≥75)">
                        <span class="status-indicator ${getStatusIndicator(item.nilai_ujian, false)}">
                            <i class="fas ${item.nilai_ujian >= 75 ? 'fa-check' : 'fa-times'}"></i>
                        </span>
                        <span class="small">${item.nilai_ujian}</span>
                    </td>
                    <td class="text-center" data-label="Formulir Lengkap">
                        <span class="status-indicator ${getStatusIndicator(item.formulir_lengkap)}">
                            <i class="fas ${item.formulir_lengkap ? 'fa-check' : 'fa-times'}"></i>
                        </span>
                    </td>
                    <td class="text-center" data-label="Surat Pernyataan">
                        <span class="status-indicator ${getStatusIndicator(item.surat_pernyataan)}">
                            <i class="fas ${item.surat_pernyataan ? 'fa-check' : 'fa-times'}"></i>
                        </span>
                    </td>
                    <td class="text-center" data-label="Pembayaran Awal">
                        <span class="status-indicator ${getStatusIndicator(item.pembayaran_awal)}">
                            <i class="fas ${item.pembayaran_awal ? 'fa-check' : 'fa-times'}"></i>
                        </span>
                    </td>
                    <td class="text-center" data-label="Pembayaran Akhir">
                        <span class="status-indicator ${getStatusIndicator(item.pembayaran_akhir)}">
                            <i class="fas ${item.pembayaran_akhir ? 'fa-check' : 'fa-times'}"></i>
                        </span>
                    </td>
                    <td data-label="Status Akhir">
                        <span class="status-badge ${statusBadge}">${statusText}</span>
                    </td>
                    <td class="text-center" data-label="Aksi">
                        ${statusBadge === 'status-santriwati' || statusBadge === 'status-daftar-ulang' ? 
                            '<button class="btn-action btn-detail" data-nama="' + item.nama + '"><i class="fas fa-eye"></i> Detail</button>' :
                            '<button class="btn-action btn-update" data-nama="' + item.nama + '"><i class="fas fa-sync"></i> Verifikasi</button>'
                        }
                    </td>
                `;
                rekapTableBody.appendChild(row);
            });
            
            // Update result count
            const showingItems = itemsPerPage === 'all' ? totalItems : Math.min(totalItems, itemsPerPage);
            const showingText = itemsPerPage === 'all' ? 
                `Menampilkan semua ${totalItems} santriwati` : 
                `Menampilkan ${showingItems} dari ${totalItems} santriwati`;
            
            resultCount.textContent = showingText;
            
            // Update pagination (only if not showing all)
            if (itemsPerPage !== 'all') {
                updatePagination(totalItems);
            } else {
                document.getElementById('pagination').innerHTML = '';
            }
            
            // Add event listeners to action buttons
            document.querySelectorAll('.btn-detail, .btn-update').forEach(btn => {
                btn.addEventListener('click', function() {
                    const nama = this.dataset.nama;
                    const action = this.classList.contains('btn-detail') ? 'detail' : 'verifikasi';
                    let message = '';
                    
                    if (action === 'detail') {
                        message = `Menampilkan detail profil ${nama}`;
                    } else {
                        message = `Mengirim notifikasi verifikasi ke ${nama}`;
                    }
                    
                    toastMessage.textContent = message;
                    successToast.show();
                });
            });
        }

        // Update pagination controls
        function updatePagination(totalItems) {
            const totalPages = Math.ceil(totalItems / itemsPerPage);
            const paginationEl = document.getElementById('pagination');
            
            // Clear existing pagination
            paginationEl.innerHTML = '';
            
            if (totalPages === 0 || itemsPerPage === 'all') {
                return;
            }
            
            // Add previous button if not on first page
            if (currentPage > 1) {
                const prevLi = document.createElement('li');
                prevLi.className = 'page-item';
                prevLi.innerHTML = `<a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>`;
                paginationEl.appendChild(prevLi);
                
                prevLi.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (currentPage > 1) {
                        currentPage--;
                        renderTable();
                    }
                });
            }
            
            // Add page numbers (max 5 visible)
            const maxVisiblePages = 5;
            let startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
            let endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);
            
            // Adjust start page if we're near the end
            if (endPage - startPage + 1 < maxVisiblePages) {
                startPage = Math.max(1, endPage - maxVisiblePages + 1);
            }
            
            // Add first page if not in range
            if (startPage > 1) {
                const firstLi = document.createElement('li');
                firstLi.className = 'page-item';
                firstLi.innerHTML = `<a class="page-link" href="#" data-page="1">1</a>`;
                paginationEl.appendChild(firstLi);
                
                if (startPage > 2) {
                    const ellipsisLi = document.createElement('li');
                    ellipsisLi.className = 'page-item disabled';
                    ellipsisLi.innerHTML = `<span class="page-link">...</span>`;
                    paginationEl.appendChild(ellipsisLi);
                }
            }
            
            // Add page numbers
            for (let i = startPage; i <= endPage; i++) {
                const li = document.createElement('li');
                li.className = `page-item ${i === currentPage ? 'active' : ''}`;
                li.innerHTML = `<a class="page-link" href="#" data-page="${i}">${i}</a>`;
                paginationEl.appendChild(li);
                
                li.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (!this.classList.contains('active')) {
                        currentPage = i;
                        renderTable();
                    }
                });
            }
            
            // Add last page if not in range
            if (endPage < totalPages) {
                if (endPage < totalPages - 1) {
                    const ellipsisLi = document.createElement('li');
                    ellipsisLi.className = 'page-item disabled';
                    ellipsisLi.innerHTML = `<span class="page-link">...</span>`;
                    paginationEl.appendChild(ellipsisLi);
                }
                
                const lastLi = document.createElement('li');
                lastLi.className = 'page-item';
                lastLi.innerHTML = `<a class="page-link" href="#" data-page="${totalPages}">${totalPages}</a>`;
                paginationEl.appendChild(lastLi);
                
                lastLi.addEventListener('click', function(e) {
                    e.preventDefault();
                    currentPage = totalPages;
                    renderTable();
                });
            }
            
            // Add next button if there are more pages
            if (currentPage < totalPages) {
                const nextLi = document.createElement('li');
                nextLi.className = 'page-item';
                nextLi.innerHTML = `<a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>`;
                paginationEl.appendChild(nextLi);
                
                nextLi.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (currentPage < totalPages) {
                        currentPage++;
                        renderTable();
                    }
                });
            }
        }

        // Export to CSV (Excel compatible) dengan kolom surat_pernyataan
        function exportToExcel() {
            const filteredData = getFilteredData();
            if (filteredData.length === 0) {
                toastMessage.textContent = 'Tidak ada data untuk diekspor!';
                successToast.show();
                return;
            }
            
            let csvContent = "text/csv;charset=utf-8,\uFEFF";
            csvContent += "No,NISN,Nama Santriwati,Nilai Ujian,Formulir Lengkap,Surat Pernyataan,Pembayaran Awal,Pembayaran Akhir,Status Akhir,Jenjang,Gelombang\n";
            
            filteredData.forEach((item, index) => {
                const statusText = getStatusText(item);
                const row = `"${index + 1}","${item.nisn}","${item.nama}","${item.nilai_ujian}","${item.formulir_lengkap ? 'Ya' : 'Tidak'}","${item.surat_pernyataan ? 'Ya' : 'Tidak'}","${item.pembayaran_awal ? 'Ya' : 'Tidak'}","${item.pembayaran_akhir ? 'Ya' : 'Tidak'}","${statusText}","${item.jenjang}","${item.gelombang}"`;
                csvContent += row + "\n";
            });
            
            const encodedUri = encodeURI(csvContent);
            const link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "rekap_data_psb_" + new Date().toISOString().split('T')[0] + ".csv");
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            
            toastMessage.textContent = 'Data berhasil diekspor ke Excel!';
            successToast.show();
        }

        // Export to PDF (using browser print functionality) dengan kolom surat_pernyataan
        function exportToPdf() {
            const filteredData = getFilteredData();
            if (filteredData.length === 0) {
                toastMessage.textContent = 'Tidak ada data untuk diekspor!';
                successToast.show();
                return;
            }
            
            const printWindow = window.open('', '_blank');
            printWindow.document.write(`
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Rekap Data PSB - AQBS</title>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <style>
                        body { 
                            font-family: 'Plus Jakarta Sans', Arial, sans-serif; 
                            margin: 20px; 
                            line-height: 1.6;
                            color: #1e293b;
                        }
                        .header { 
                            text-align: center; 
                            margin-bottom: 30px; 
                            padding-bottom: 20px;
                            border-bottom: 3px solid #002b49;
                        }
                        .header h1 { 
                            color: #002b49; 
                            margin-bottom: 10px; 
                            font-size: 24px;
                        }
                        .header p { 
                            color: #666; 
                            margin: 5px 0;
                            font-size: 14px;
                        }
                        .info-box {
                            display: flex;
                            justify-content: space-between;
                            margin-bottom: 20px;
                            flex-wrap: wrap;
                            gap: 15px;
                        }
                        .info-item {
                            background: #f8fafc;
                            padding: 10px 15px;
                            border-radius: 8px;
                            border-left: 4px solid #ff7f00;
                        }
                        .info-label {
                            font-size: 12px;
                            color: #64748b;
                            font-weight: bold;
                            text-transform: uppercase;
                        }
                        .info-value {
                            font-size: 14px;
                            color: #002b49;
                            font-weight: bold;
                        }
                        table { 
                            width: 100%; 
                            border-collapse: collapse; 
                            margin-top: 20px; 
                            font-size: 12px;
                        }
                        th, td { 
                            border: 1px solid #ddd; 
                            padding: 12px; 
                            text-align: left; 
                        }
                        th { 
                            background-color: #f8fafc; 
                            font-weight: bold; 
                            color: #002b49;
                        }
                        tr:nth-child(even) {
                            background-color: #f9fafb;
                        }
                        .status-complete { color: #166534; font-weight: bold; }
                        .status-incomplete { color: #991b1b; font-weight: bold; }
                        .status-santriwati { background-color: #dcfce7; color: #166534; padding: 4px 8px; border-radius: 4px; display: inline-block; }
                        .status-daftar-ulang { background-color: #fef9c3; color: #a16207; padding: 4px 8px; border-radius: 4px; display: inline-block; }
                        .status-proses { background-color: #e0f2fe; color: #0369a1; padding: 4px 8px; border-radius: 4px; display: inline-block; }
                        @media print {
                            body { margin: 0; }
                            .no-print { display: none; }
                        }
                        @media screen and (max-width: 600px) {
                            table { font-size: 10px; }
                            th, td { padding: 8px; }
                        }
                        .footer {
                            margin-top: 30px;
                            text-align: center;
                            font-size: 12px;
                            color: #64748b;
                            border-top: 1px solid #e2e8f0;
                            padding-top: 15px;
                        }
                    </style>
                </head>
                <body>
                    <div class="header">
                        <h1>REKAP DATA PSB</h1>
                        <p>AISYIYAH QUR'ANIC BOARDING SCHOOL PONOROGO</p>
                        <p>Tanggal Cetak: ${new Date().toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' })}</p>
                    </div>
                    
                    <div class="info-box">
                        <div class="info-item">
                            <div class="info-label">Tahun Pelajaran</div>
                            <div class="info-value">${document.getElementById('filterTahun').value}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Gelombang</div>
                            <div class="info-value">${document.getElementById('filterGelombang').value || 'Semua'}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Jenjang</div>
                            <div class="info-value">${document.getElementById('filterJenjang').value || 'Semua'}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Total Data</div>
                            <div class="info-value">${filteredData.length} Santriwati</div>
                        </div>
                    </div>
                    
                    <p class="no-print" style="color: #ef4444; font-weight: bold; background: #fee2e2; padding: 10px; border-radius: 8px; text-align: center;">
                        <i class="fas fa-print"></i> Tekan Ctrl+P untuk mencetak sebagai PDF
                    </p>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>Nama Santriwati</th>
                                <th>Nilai Ujian</th>
                                <th>Formulir Lengkap</th>
                                <th>Surat Pernyataan</th>
                                <th>Pembayaran Awal</th>
                                <th>Pembayaran Akhir</th>
                                <th>Status Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
            `);
            
            filteredData.forEach((item, index) => {
                const statusText = getStatusText(item);
                const statusClass = getStatusBadge(item);
                printWindow.document.write(`
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.nisn}</td>
                        <td>${item.nama}</td>
                        <td class="${item.nilai_ujian >= 75 ? 'status-complete' : 'status-incomplete'}">${item.nilai_ujian}</td>
                        <td class="${item.formulir_lengkap ? 'status-complete' : 'status-incomplete'}">${item.formulir_lengkap ? 'Ya' : 'Tidak'}</td>
                        <td class="${item.surat_pernyataan ? 'status-complete' : 'status-incomplete'}">${item.surat_pernyataan ? 'Ya' : 'Tidak'}</td>
                        <td class="${item.pembayaran_awal ? 'status-complete' : 'status-incomplete'}">${item.pembayaran_awal ? 'Ya' : 'Tidak'}</td>
                        <td class="${item.pembayaran_akhir ? 'status-complete' : 'status-incomplete'}">${item.pembayaran_akhir ? 'Ya' : 'Tidak'}</td>
                        <td><span class="${statusClass}">${statusText}</span></td>
                    </tr>
                `);
            });
            
            printWindow.document.write(`
                        </tbody>
                    </table>
                    
                    <div class="footer">
                        <p>Dokumen ini dicetak dari Sistem Administrasi PSB AQBS</p>
                        <p>© ${new Date().getFullYear()} Aisyiyah Quranic Boarding School Ponorogo</p>
                    </div>
                </body>
                </html>
            `);
            
            printWindow.document.close();
            printWindow.focus();
            
            setTimeout(() => {
                toastMessage.textContent = 'PDF siap dicetak! Gunakan Ctrl+P untuk menyimpan sebagai PDF.';
                successToast.show();
            }, 1000);
        }

        // Toggle sidebar
        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('show');
            overlay.classList.toggle('show');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.remove('show');
            overlay.classList.remove('show');
        });
        
        // Add active state to menu items
        document.querySelectorAll('.menu-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelectorAll('.menu-btn').forEach(b => b.classList.remove('active-dashboard'));
                this.classList.add('active-dashboard');
            });
        });

        // Items per page selector
        itemsPerPageBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from all buttons
                itemsPerPageBtns.forEach(b => b.classList.remove('active'));
                // Add active class to clicked button
                this.classList.add('active');
                
                // Update items per page
                const itemsValue = this.dataset.items;
                if (itemsValue === 'all') {
                    itemsPerPage = 'all';
                } else {
                    itemsPerPage = parseInt(itemsValue);
                }
                
                // Reset to first page and render table
                currentPage = 1;
                renderTable();
                
                // Show notification
                toastMessage.textContent = `Menampilkan ${itemsValue === 'all' ? 'semua' : itemsValue} data per halaman`;
                successToast.show();
            });
        });

        // Apply filters
        applyFilterBtn.addEventListener('click', function() {
            currentPage = 1;
            renderTable();
            toastMessage.textContent = 'Filter berhasil diterapkan!';
            successToast.show();
        });

        // Export buttons
        exportExcelBtn.addEventListener('click', function(e) {
            e.preventDefault();
            exportToExcel();
        });

        exportPdfBtn.addEventListener('click', function(e) {
            e.preventDefault();
            exportToPdf();
        });

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            loadSavedData();
            
            // Add event listeners for filter inputs (real-time filtering)
            document.getElementById('filterJenjang').addEventListener('change', () => {
                currentPage = 1;
                renderTable();
            });
            document.getElementById('filterGelombang').addEventListener('change', () => {
                currentPage = 1;
                renderTable();
            });
            document.getElementById('filterStatus').addEventListener('change', () => {
                currentPage = 1;
                renderTable();
            });
            
            // Handle window resize for responsive adjustments
            let resizeTimer;
            window.addEventListener('resize', () => {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(renderTable, 250);
            });
            
            // Simulate data loading
            setTimeout(() => {
                toastMessage.textContent = 'Data rekap berhasil dimuat!';
                successToast.show();
            }, 500);
        });
    </script>
</body>
</html>