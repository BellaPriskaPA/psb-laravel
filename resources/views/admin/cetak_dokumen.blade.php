<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Berkas - Admin PSB AQBS</title>
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
        .top-nav-btn:hover { 
            color: var(--orange-primary); 
            transform: translateY(-2px); 
        }
        .top-nav-btn i { 
            display: block; 
            font-size: 1.3rem; 
            margin-bottom: 3px; 
        }

        /* --- SIDEBAR NAVY --- */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--navy-primary);
            position: fixed;
            top: 0; 
            bottom: 0; 
            left: 0;
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
        
        .menu-btn.active-cetak { 
            background: var(--orange-primary); 
            color: white; 
            box-shadow: 0 4px 12px rgba(255, 127, 0, 0.3);
            transform: translateX(0) !important;
        }
        .menu-btn.active-cetak i { 
            color: white !important; 
        }
        .menu-btn.active-cetak::after {
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

        .menu-btn i { 
            width: 30px; 
            font-size: 1.1rem; 
            color: var(--blue-info); 
        }
        
        .sub-menu { 
            list-style: none; 
            padding-left: 45px; 
            margin-top: 5px; 
        }
        .sub-menu li { 
            margin-bottom: 8px; 
            position: relative; 
        }
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
            left: -15px; 
            top: 50%;
            transform: translateY(-50%);
            width: 6px; 
            height: 6px;
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
        .info-bar-item { 
            display: flex; 
            align-items: center; 
            gap: 12px; 
        }
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
        }
        .info-bar-label { 
            font-size: 0.65rem; 
            color: #64748b; 
            font-weight: 700; 
            text-transform: uppercase; 
        }
        .info-bar-value { 
            font-size: 0.95rem; 
            color: var(--navy-primary); 
            font-weight: 800; 
            display: block; 
        }

        /* --- FILTER CARD --- */
        .filter-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            border-left: 4px solid var(--blue-info);
        }
        .filter-card h6 {
            font-size: 0.85rem;
            font-weight: 700;
            color: #64748b;
            margin-bottom: 12px;
            text-transform: uppercase;
        }
        
        .btn-filter {
            background: linear-gradient(135deg, var(--orange-primary), #e67100);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.85rem;
            transition: all var(--transition-speed);
            width: 100%;
        }
        .btn-filter:hover {
            background: linear-gradient(135deg, #e67100, var(--orange-primary));
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 127, 0, 0.3);
        }

        /* --- PAGINATION CONTROLS --- */
        .pagination-controls {
            background: white;
            border-radius: 12px;
            padding: 15px 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .show-entries {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .show-entries select {
            width: 80px;
            padding: 6px 12px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            background: white;
            font-size: 0.85rem;
        }
        
        .pagination-info {
            font-size: 0.85rem;
            color: #64748b;
        }
        
        .pagination-buttons {
            display: flex;
            gap: 5px;
        }
        
        .pagination-buttons .btn {
            padding: 6px 12px;
            font-size: 0.8rem;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            color: #64748b;
            background: white;
            transition: all var(--transition-speed);
        }
        
        .pagination-buttons .btn:hover {
            background: #f8fafc;
            border-color: var(--blue-info);
        }
        
        .pagination-buttons .btn.active {
            background: var(--navy-primary);
            color: white;
            border-color: var(--navy-primary);
        }
        
        .pagination-buttons .btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* --- CARD CUSTOM --- */
        .card-custom {
            background: white;
            border-radius: 20px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            overflow: hidden;
            margin-bottom: 30px;
            transition: var(--transition-speed);
        }
        .card-custom:hover {
            box-shadow: 0 6px 20px rgba(0,0,0,0.12);
            transform: translateY(-2px);
        }

        .section-title {
            font-size: 1rem;
            font-weight: 800;
            color: var(--navy-primary);
            padding: 20px 25px;
            background: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        /* --- TABLE HEADER SORTING --- */
        .sortable-header {
            cursor: pointer;
            user-select: none;
            position: relative;
            padding-right: 20px !important;
        }
        
        .sortable-header:hover {
            background: #f1f5f9;
        }
        
        .sort-icon {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 0.8rem;
        }
        
        .sort-icon.active {
            color: var(--navy-primary);
        }
        
        .sort-icon.asc::after {
            content: "↑";
        }
        
        .sort-icon.desc::after {
            content: "↓";
        }

        /* --- BADGES & BUTTONS --- */
        .badge-verif-wait {
            background: #fef9c3;
            color: #a16207;
            font-size: 0.7rem;
            font-weight: 800;
            padding: 8px 14px;
            border-radius: 10px;
            border: 1px solid #fef08a;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        
        .badge-verif-done {
            background: #dcfce7;
            color: #166534;
            font-size: 0.7rem;
            font-weight: 800;
            padding: 8px 14px;
            border-radius: 10px;
            border: 1px solid #bbf7d0;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        
        .badge-verif-rejected {
            background: #fee2e2;
            color: #991b1b;
            font-size: 0.7rem;
            font-weight: 800;
            padding: 8px 14px;
            border-radius: 10px;
            border: 1px solid #fecaca;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn-action-circle {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid;
            color: white;
            transition: all var(--transition-speed);
            font-size: 0.85rem;
            margin: 0 2px;
            cursor: pointer;
        }
        
        .btn-view-proof {
            background: #dbeafe;
            color: #3b82f6;
            border-color: #bfdbfe;
        }
        .btn-view-proof:hover {
            background: #3b82f6;
            color: white;
            transform: translateY(-2px) scale(1.1);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }
        
        .btn-approve {
            background: #dcfce7;
            color: #22c55e;
            border-color: #bbf7d0;
        }
        .btn-approve:hover {
            background: #22c55e;
            color: white;
            transform: translateY(-2px) scale(1.1);
            box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
        }
        
        .btn-reject {
            background: #fee2e2;
            color: #ef4444;
            border-color: #fecaca;
        }
        .btn-reject:hover {
            background: #ef4444;
            color: white;
            transform: translateY(-2px) scale(1.1);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }
        
        .btn-action-group {
            display: flex;
            justify-content: center;
            gap: 8px;
        }

        /* --- TABLE STYLES --- */
        .table {
            margin-bottom: 0;
        }
        
        .table thead {
            background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        }
        
        .table th {
            font-weight: 700;
            font-size: 0.8rem;
            color: var(--navy-primary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 16px 20px;
            border-bottom: 2px solid #e2e8f0;
        }
        
        .table td {
            padding: 16px 20px;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
        }
        
        .table tbody tr {
            transition: all var(--transition-speed);
        }
        
        .table tbody tr:hover {
            background-color: #f8fafc;
            transform: translateX(4px);
        }
        
        .table .row-number {
            font-weight: 700;
            color: var(--navy-primary);
            text-align: center;
            width: 50px;
        }

        /* --- FILE TYPE BADGES --- */
        .file-type-badge {
            font-size: 0.7rem;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 6px;
            display: inline-block;
            margin-left: 8px;
        }
        
        .file-pdf {
            background: #fee2e2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }
        
        .file-image {
            background: #dbeafe;
            color: #1d4ed8;
            border: 1px solid #bfdbfe;
        }

        /* --- COUNTER BADGES --- */
        .counter-badge {
            background: var(--orange-primary);
            color: white;
            font-size: 0.75rem;
            font-weight: 800;
            padding: 4px 12px;
            border-radius: 20px;
            margin-left: 8px;
        }

        /* --- TOAST NOTIFICATION --- */
        .toast-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1100;
        }
        
        .toast {
            border-radius: 16px;
            border: none;
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
            overflow: hidden;
        }
        
        .toast-header {
            background: var(--navy-primary);
            color: white;
            border-radius: 16px 16px 0 0 !important;
            padding: 12px 16px;
            font-weight: 700;
        }
        
        .toast-body {
            background: white;
            color: var(--navy-primary);
            font-weight: 600;
            padding: 16px;
        }

        /* --- MODAL STYLES --- */
        .modal-content {
            border-radius: 20px;
            overflow: hidden;
            border: none;
            box-shadow: 0 8px 30px rgba(0,0,0,0.2);
        }
        
        .modal-header {
            background: var(--navy-primary);
            color: white;
            border-bottom: none;
            padding: 20px 25px;
        }
        
        .modal-title {
            font-weight: 800;
            font-size: 1.2rem;
        }
        
        .modal-body {
            padding: 25px;
            max-height: 70vh;
            overflow-y: auto;
        }
        
        /* --- IMAGE PREVIEW STYLES --- */
        .image-preview-container {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .image-preview {
            max-width: 100%;
            max-height: 400px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border: 1px solid #e2e8f0;
            margin-bottom: 15px;
        }
        
        .pdf-preview-container {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 20px;
            background: #f8fafc;
            text-align: center;
        }
        
        .zoom-controls {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 15px;
        }
        
        .zoom-btn {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all var(--transition-speed);
        }
        
        .zoom-btn:hover {
            background: var(--navy-primary);
            color: white;
            border-color: var(--navy-primary);
        }
        
        .file-info {
            background: #f8fafc;
            border-radius: 10px;
            padding: 15px;
            margin-top: 15px;
        }
        
        .file-info-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .file-info-item:last-child {
            border-bottom: none;
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
            .table-responsive { 
                overflow-x: auto; 
            }
            .table th, .table td { 
                font-size: 0.85rem; 
                padding: 14px 12px; 
            }
            .btn-action-circle { 
                width: 32px; 
                height: 32px; 
                font-size: 0.8rem; 
            }
            .filter-card .row {
                gap: 12px;
            }
            .pagination-controls {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
            }
            .pagination-info {
                text-align: center;
            }
            .show-entries {
                justify-content: center;
            }
            .modal-dialog {
                margin: 10px;
            }
        }
        
        @media (max-width: 576px) {
            .section-title {
                padding: 15px 20px;
                font-size: 0.95rem;
            }
            
            .filter-card {
                padding: 20px;
            }
            
            .badge-verif-wait,
            .badge-verif-done,
            .badge-verif-rejected {
                font-size: 0.65rem;
                padding: 6px 10px;
            }
            
            .table thead { 
                display: none; 
            }
            .table tbody, .table tr, .table td { 
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
                padding: 10px 0;
                border: none;
                position: relative;
                padding-left: 40%;
            }
            .table td:before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 35%;
                padding-right: 10px;
                font-weight: 700;
                color: #64748b;
                font-size: 0.8rem;
            }
            .table td.text-center {
                text-align: left;
                padding-left: 0;
                margin-top: 15px;
                padding-top: 15px;
                border-top: 1px solid #e2e8f0;
            }
            .table td.text-center:before {
                content: "Aksi";
                position: static;
                width: 100%;
                padding-bottom: 8px;
                border-bottom: none;
                margin-bottom: 8px;
                font-size: 0.9rem;
                color: var(--navy-primary);
            }
            
            .table td.row-number:before {
                content: "No.";
            }
            
            .btn-action-group {
                justify-content: flex-start;
                gap: 10px;
            }
            
            .btn-action-circle {
                width: 40px;
                height: 40px;
            }
            
            .image-preview {
                max-height: 250px;
            }
        }
    </style>
</head>
<body>

    <div class="sidebar-overlay" id="overlay"></div>

    <!-- Navbar -->
    <nav class="navbar navbar-custom">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center">
                <button class="btn btn-link text-white me-2 d-lg-none" id="sidebarToggle">
                    <i class="fas fa-bars-staggered fa-lg"></i>
                </button>
                <img src="https://placehold.co/45?text=AQBS" class="rounded-circle border border-2 border-white me-2">
                <div class="lh-1 text-white d-none d-sm-block">
                    <span class="fw-bold d-block" style="font-size: 1.1rem; letter-spacing: -0.5px;">AQBS ADMIN</span>
                    <small class="opacity-75 fw-medium" style="font-size: 0.6rem;">Verifikasi Berkas</small>
                </div>
            </div>
            <div class="ms-auto d-flex align-items-center">
                <a href="#" class="top-nav-btn"><i class="fas fa-chart-pie"></i><span>Dashboard</span></a>
                <a href="#" class="top-nav-btn text-warning"><i class="fas fa-user-shield"></i><span>Profil</span></a>
                <a href="#" class="top-nav-btn text-danger"><i class="fas fa-power-off"></i><span>Logout</span></a>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
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
            <button class="menu-btn"><i class="fas fa-database"></i>Data PSB</button>
            <ul class="sub-menu">
                <li><a href="#">Semua Data</a></li>
                <li><a href="#">Daftar Berkas</a></li>
                <li><a href="#">Data Diterima</a></li>
                <li><a href="#">Siswa Daftar Ulang</a></li>
                <li><a href="#">Pembayaran</a></li>
                <li><a href="#">Ditolak / Cadangan</a></li>
                <li><a href="#">Rekap</a></li>
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
            <button class="menu-btn active-cetak"><i class="fas fa-print"></i>Cetak Dokumen</button>
            <ul class="sub-menu">
                <li><a href="#" class="active">Data Penerimaan PSB</a></li>
            </ul>
        </div>
        <div class="menu-category">Konfigurasi</div>
        <div class="menu-group">
            <a href="#" class="menu-btn"><i class="fas fa-tools"></i>Setting Sistem</a>
            <a href="#" class="menu-btn"><i class="fas fa-user-lock"></i>Akun Admin</a>
            <a href="#" class="menu-btn"><i class="fas fa-users-cog"></i>Akun Siswa</a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Info Bar -->
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
                <div class="info-icon text-success" style="background:#f0fdf4"><i class="fas fa-file-alt"></i></div>
                <div>
                    <span class="info-bar-label">Total Berkas</span>
                    <span class="info-bar-value text-success">125 Berkas</span>
                </div>
            </div>
            <div class="info-bar-item">
                <div class="info-icon text-warning" style="background:#fef3c7"><i class="fas fa-clock"></i></div>
                <div>
                    <span class="info-bar-label">Perlu Verifikasi</span>
                    <span class="info-bar-value text-warning">38 Berkas</span>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <h4 class="fw-bold" style="color: var(--navy-primary);">Verifikasi Berkas Terpisah</h4>
            <p class="text-muted small">Periksa dan validasi dokumen <strong>Formulir Pendaftaran</strong> dan <strong>Surat Pernyataan Orang Tua/Wali</strong> secara terpisah.</p>
        </div>

        <!-- Filter Card -->
        <div class="filter-card">
            <div class="row g-4">
                <div class="col-12 col-md-4">
                    <label class="small fw-bold mb-2">Pencarian Nama / NISN</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control" id="filterSearch" placeholder="Cari berdasarkan nama atau NISN...">
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <label class="small fw-bold mb-2">Jenjang</label>
                    <select class="form-select" id="filterJenjang">
                        <option value="">Semua Jenjang</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="SMK">SMK</option>
                    </select>
                </div>
                <div class="col-12 col-md-3">
                    <label class="small fw-bold mb-2">Status Verifikasi</label>
                    <select class="form-select" id="filterStatus">
                        <option value="">Semua Status</option>
                        <option value="Belum Dicek">Belum Dicek</option>
                        <option value="Sudah Dicek">Sudah Dicek</option>
                        <option value="Ditolak">Ditolak</option>
                    </select>
                </div>
                <div class="col-12 col-md-2 d-flex align-items-end">
                    <button class="btn-filter" id="applyFilterBtn">
                        <i class="fas fa-filter me-2"></i>Filter
                    </button>
                </div>
            </div>
        </div>

        <!-- FORMULIR SECTION -->
        <div class="card-custom">
            <div class="section-title">
                <span><i class="fas fa-file-signature text-info me-2"></i>Formulir Pendaftaran 
                    <span class="counter-badge" id="formulirCounter">0</span>
                </span>
                <small class="text-muted">Total 75 formulir perlu diverifikasi</small>
            </div>
            
            <!-- Pagination Controls - Formulir -->
            <div class="pagination-controls" id="formulirPagination">
                <div class="show-entries">
                    <span class="small fw-bold">Tampilkan:</span>
                    <select id="formulirEntries" class="form-select-sm">
                        <option value="10">10</option>
                        <option value="25" selected>25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="0">Semua</option>
                    </select>
                    <span class="small">data per halaman</span>
                </div>
                <div class="pagination-info" id="formulirPaginationInfo">
                    Menampilkan 0 dari 0 data
                </div>
                <div class="pagination-buttons" id="formulirPaginationButtons">
                    <!-- Pagination buttons will be generated here -->
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="formulirTable">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 row-number">No</th>
                            <th class="sortable-header" data-sort="nisn">
                                NISN
                                <span class="sort-icon" data-sort="nisn"></span>
                            </th>
                            <th class="sortable-header" data-sort="nama">
                                Nama Santriwati
                                <span class="sort-icon" data-sort="nama"></span>
                            </th>
                            <th class="sortable-header" data-sort="jenjang">
                                Jenjang
                                <span class="sort-icon" data-sort="jenjang"></span>
                            </th>
                            <th class="sortable-header" data-sort="tgl_upload">
                                Tgl Upload
                                <span class="sort-icon" data-sort="tgl_upload"></span>
                            </th>
                            <th class="sortable-header" data-sort="status">
                                Status Verifikasi
                                <span class="sort-icon" data-sort="status"></span>
                            </th>
                            <th class="text-center">Berkas</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="formulirBody">
                        <!-- Rows populated by JS -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- SURAT PERNYATAAN SECTION -->
        <div class="card-custom">
            <div class="section-title">
                <span><i class="fas fa-file-contract text-success me-2"></i>Surat Pernyataan Orang Tua/Wali
                    <span class="counter-badge" id="suratCounter">0</span>
                </span>
                <small class="text-muted">Total 50 surat perlu diverifikasi</small>
            </div>
            
            <!-- Pagination Controls - Surat -->
            <div class="pagination-controls" id="suratPagination">
                <div class="show-entries">
                    <span class="small fw-bold">Tampilkan:</span>
                    <select id="suratEntries" class="form-select-sm">
                        <option value="10">10</option>
                        <option value="25" selected>25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="0">Semua</option>
                    </select>
                    <span class="small">data per halaman</span>
                </div>
                <div class="pagination-info" id="suratPaginationInfo">
                    Menampilkan 0 dari 0 data
                </div>
                <div class="pagination-buttons" id="suratPaginationButtons">
                    <!-- Pagination buttons will be generated here -->
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="suratTable">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 row-number">No</th>
                            <th class="sortable-header" data-sort="nisn">
                                NISN
                                <span class="sort-icon" data-sort="nisn"></span>
                            </th>
                            <th class="sortable-header" data-sort="nama">
                                Nama Santriwati
                                <span class="sort-icon" data-sort="nama"></span>
                            </th>
                            <th class="sortable-header" data-sort="jenjang">
                                Jenjang
                                <span class="sort-icon" data-sort="jenjang"></span>
                            </th>
                            <th class="sortable-header" data-sort="tgl_upload">
                                Tgl Upload
                                <span class="sort-icon" data-sort="tgl_upload"></span>
                            </th>
                            <th class="sortable-header" data-sort="status">
                                Status Verifikasi
                                <span class="sort-icon" data-sort="status"></span>
                            </th>
                            <th class="text-center">Berkas</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="suratBody">
                        <!-- Rows populated by JS -->
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Summary Section -->
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card-custom p-3 text-center">
                    <div class="fs-4 fw-bold text-info mb-2"><i class="fas fa-file-alt"></i></div>
                    <h5 class="mb-1" id="totalFormulir">0</h5>
                    <p class="text-muted small mb-0">Total Formulir</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom p-3 text-center">
                    <div class="fs-4 fw-bold text-success mb-2"><i class="fas fa-file-contract"></i></div>
                    <h5 class="mb-1" id="totalSurat">0</h5>
                    <p class="text-muted small mb-0">Total Surat Pernyataan</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom p-3 text-center">
                    <div class="fs-4 fw-bold text-warning mb-2"><i class="fas fa-clock"></i></div>
                    <h5 class="mb-1" id="totalPending">0</h5>
                    <p class="text-muted small mb-0">Berkas Perlu Verifikasi</p>
                </div>
            </div>
        </div>
    </main>

    <!-- Toast Notification -->
    <div class="toast-container">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="successToast">
            <div class="toast-header">
                <strong class="me-auto"><i class="fas fa-check-circle me-2"></i>Berhasil!</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" id="toastMessage">Berkas berhasil diverifikasi!</div>
        </div>
    </div>

    <!-- Modal View Document -->
    <div class="modal fade" id="viewDocumentModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">View Document</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="modalBody">
                    <!-- Content will be loaded here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-success" id="modalApproveBtn">Setujui</button>
                    <button type="button" class="btn btn-danger" id="modalRejectBtn">Tolak</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Generate sample data (125 records)
        function generateSampleData(count) {
            const data = [];
            const names = [
                "Bebelll", "Siti Fatimah", "Annisa Rahmawati", "Maya Indah Sari", "Rahma Dewi",
                "Nurul Hikmah", "Aisyah Putri", "Desi Ratnasari", "Fitriani", "Kartika Sari",
                "Linda Wijaya", "Mega Pratiwi", "Nadia Utami", "Oktavia", "Putri Ayu",
                "Rina Marlina", "Sari Dewi", "Tina Susanti", "Umi Kulsum", "Vina Amelia"
            ];
            
            const jenjangList = ["SMP", "SMA", "SMK"];
            const statusList = ["Belum Dicek", "Sudah Dicek", "Ditolak"];
            const months = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];
            const fileTypes = ["pdf", "jpg", "png", "jpeg"];
            
            // Sample image URLs for preview
            const sampleImages = [
                "https://images.unsplash.com/photo-1580927752452-89d86da3fa0a?w=800&auto=format&fit=crop",
                "https://images.unsplash.com/photo-1544717305-2782549b5136?w=800&auto=format&fit=crop",
                "https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w-800&auto=format&fit=crop",
                "https://images.unsplash.com/photo-1523580494863-6f3031224c94?w=800&auto=format&fit=crop",
                "https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=800&auto=format&fit=crop"
            ];
            
            for (let i = 1; i <= count; i++) {
                const name = names[Math.floor(Math.random() * names.length)];
                const jenjang = jenjangList[Math.floor(Math.random() * jenjangList.length)];
                const day = Math.floor(Math.random() * 28) + 1;
                const month = months[Math.floor(Math.random() * months.length)];
                const year = 2025;
                const fileType = fileTypes[Math.floor(Math.random() * fileTypes.length)];
                const isImage = fileType !== "pdf";
                
                // Randomly choose between image and PDF
                let formulirFile, suratFile;
                let formulirUrl, suratUrl;
                
                if (isImage) {
                    formulirFile = `formulir_${name.toLowerCase().replace(/\s+/g, '_')}_${i}.${fileType}`;
                    suratFile = `surat_${name.toLowerCase().replace(/\s+/g, '_')}_${i}.${fileType}`;
                    formulirUrl = sampleImages[Math.floor(Math.random() * sampleImages.length)];
                    suratUrl = sampleImages[Math.floor(Math.random() * sampleImages.length)];
                } else {
                    formulirFile = `formulir_${name.toLowerCase().replace(/\s+/g, '_')}_${i}.pdf`;
                    suratFile = `surat_${name.toLowerCase().replace(/\s+/g, '_')}_${i}.pdf`;
                    formulirUrl = null;
                    suratUrl = null;
                }
                
                data.push({
                    id: i,
                    nisn: `1234567${i.toString().padStart(3, '0')}`,
                    nama: name,
                    jenjang: jenjang,
                    tgl_upload: `${day} ${month} ${year}`,
                    formulir_status: statusList[Math.floor(Math.random() * statusList.length)],
                    surat_status: statusList[Math.floor(Math.random() * statusList.length)],
                    formulir_file: formulirFile,
                    surat_file: suratFile,
                    formulir_url: formulirUrl,
                    surat_url: suratUrl,
                    file_type: fileType,
                    is_image: isImage
                });
            }
            
            return data;
        }

        // Initial data
        let berkasData = generateSampleData(125);

        // DOM Elements
        const formulirBody = document.getElementById('formulirBody');
        const suratBody = document.getElementById('suratBody');
        const successToastEl = document.getElementById('successToast');
        const toastMessage = document.getElementById('toastMessage');
        const viewDocumentModal = new bootstrap.Modal(document.getElementById('viewDocumentModal'));
        const modalTitle = document.getElementById('modalTitle');
        const modalBody = document.getElementById('modalBody');
        const modalApproveBtn = document.getElementById('modalApproveBtn');
        const modalRejectBtn = document.getElementById('modalRejectBtn');
        const successToast = new bootstrap.Toast(successToastEl);
        
        // State management
        let currentDocument = null;
        let imageZoom = 100;
        
        // Formulir pagination state
        let formulirState = {
            currentPage: 1,
            entriesPerPage: 25,
            totalPages: 1,
            sortField: 'id',
            sortDirection: 'asc',
            filteredData: []
        };
        
        // Surat pagination state
        let suratState = {
            currentPage: 1,
            entriesPerPage: 25,
            totalPages: 1,
            sortField: 'id',
            sortDirection: 'asc',
            filteredData: []
        };

        // Initialize
        document.addEventListener('DOMContentLoaded', () => {
            updateCounters();
            setupEventListeners();
            renderFormulirTable();
            renderSuratTable();
        });

        function setupEventListeners() {
            // Mobile sidebar toggle
            document.getElementById('sidebarToggle').addEventListener('click', () => {
                document.getElementById('sidebar').classList.toggle('show');
                document.getElementById('overlay').classList.toggle('show');
            });
            
            document.getElementById('overlay').addEventListener('click', () => {
                document.getElementById('sidebar').classList.remove('show');
                document.getElementById('overlay').classList.remove('show');
            });

            // Filter events
            document.getElementById('applyFilterBtn').addEventListener('click', () => {
                formulirState.currentPage = 1;
                suratState.currentPage = 1;
                renderFormulirTable();
                renderSuratTable();
            });
            
            document.getElementById('filterSearch').addEventListener('input', () => {
                formulirState.currentPage = 1;
                suratState.currentPage = 1;
                renderFormulirTable();
                renderSuratTable();
            });
            
            document.getElementById('filterJenjang').addEventListener('change', () => {
                formulirState.currentPage = 1;
                suratState.currentPage = 1;
                renderFormulirTable();
                renderSuratTable();
            });
            
            document.getElementById('filterStatus').addEventListener('change', () => {
                formulirState.currentPage = 1;
                suratState.currentPage = 1;
                renderFormulirTable();
                renderSuratTable();
            });

            // Formulir entries per page
            document.getElementById('formulirEntries').addEventListener('change', (e) => {
                formulirState.entriesPerPage = parseInt(e.target.value) || 0;
                formulirState.currentPage = 1;
                renderFormulirTable();
            });

            // Surat entries per page
            document.getElementById('suratEntries').addEventListener('change', (e) => {
                suratState.entriesPerPage = parseInt(e.target.value) || 0;
                suratState.currentPage = 1;
                renderSuratTable();
            });

            // Modal buttons
            modalApproveBtn.addEventListener('click', () => {
                if (currentDocument) {
                    approveRejectDocument(currentDocument.nisn, currentDocument.type, 'approve');
                    viewDocumentModal.hide();
                }
            });

            modalRejectBtn.addEventListener('click', () => {
                if (currentDocument) {
                    approveRejectDocument(currentDocument.nisn, currentDocument.type, 'reject');
                    viewDocumentModal.hide();
                }
            });
        }

        function getFilteredData(type) {
            const search = document.getElementById('filterSearch').value.toLowerCase();
            const jenjang = document.getElementById('filterJenjang').value;
            const status = document.getElementById('filterStatus').value;

            return berkasData.filter(item => {
                // Filter by search
                if (search && !item.nama.toLowerCase().includes(search) && !item.nisn.includes(search)) {
                    return false;
                }
                
                // Filter by jenjang
                if (jenjang && item.jenjang !== jenjang) {
                    return false;
                }
                
                // Filter by status for specific type
                if (status) {
                    const itemStatus = type === 'formulir' ? item.formulir_status : item.surat_status;
                    if (itemStatus !== status) {
                        return false;
                    }
                }
                
                return true;
            });
        }

        function sortData(data, field, direction) {
            return [...data].sort((a, b) => {
                let aValue = a[field];
                let bValue = b[field];
                
                // For status sorting, use custom order
                if (field === 'status') {
                    const order = { 'Belum Dicek': 1, 'Sudah Dicek': 2, 'Ditolak': 3 };
                    aValue = order[aValue] || 0;
                    bValue = order[bValue] || 0;
                }
                
                // For date sorting, convert to comparable format
                if (field === 'tgl_upload') {
                    aValue = parseDate(aValue);
                    bValue = parseDate(bValue);
                }
                
                if (direction === 'asc') {
                    return aValue > bValue ? 1 : aValue < bValue ? -1 : 0;
                } else {
                    return aValue < bValue ? 1 : aValue > bValue ? -1 : 0;
                }
            });
        }

        function parseDate(dateStr) {
            const parts = dateStr.split(' ');
            if (parts.length === 3) {
                const months = {
                    'Jan': 0, 'Feb': 1, 'Mar': 2, 'Apr': 3, 'Mei': 4, 'Jun': 5,
                    'Jul': 6, 'Agu': 7, 'Sep': 8, 'Okt': 9, 'Nov': 10, 'Des': 11
                };
                const day = parseInt(parts[0]);
                const month = months[parts[1]] || 0;
                const year = parseInt(parts[2]);
                return new Date(year, month, day);
            }
            return new Date(0);
        }

        function getPagedData(filteredData, state) {
            const startIndex = (state.currentPage - 1) * (state.entriesPerPage || filteredData.length);
            const endIndex = state.entriesPerPage === 0 ? 
                filteredData.length : 
                Math.min(startIndex + state.entriesPerPage, filteredData.length);
            
            return filteredData.slice(startIndex, endIndex);
        }

        function updateSortIcons(tableType, sortField, sortDirection) {
            // Reset all icons
            document.querySelectorAll(`#${tableType}Table .sort-icon`).forEach(icon => {
                icon.className = 'sort-icon';
            });
            
            // Set active icon
            const activeIcon = document.querySelector(`#${tableType}Table .sort-icon[data-sort="${sortField}"]`);
            if (activeIcon) {
                activeIcon.className = `sort-icon active ${sortDirection}`;
            }
        }

        function getFileTypeBadge(fileName) {
            const extension = fileName.split('.').pop().toLowerCase();
            const isImage = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'].includes(extension);
            
            if (isImage) {
                return `<span class="file-type-badge file-image"><i class="fas fa-image me-1"></i>Gambar</span>`;
            } else {
                return `<span class="file-type-badge file-pdf"><i class="fas fa-file-pdf me-1"></i>PDF</span>`;
            }
        }

        function renderFormulirTable() {
            // Get filtered data
            formulirState.filteredData = getFilteredData('formulir').map(item => ({
                ...item,
                status: item.formulir_status
            }));
            
            // Sort data
            formulirState.filteredData = sortData(
                formulirState.filteredData, 
                formulirState.sortField, 
                formulirState.sortDirection
            );
            
            // Calculate pagination
            const totalItems = formulirState.filteredData.length;
            const entriesPerPage = formulirState.entriesPerPage || totalItems;
            formulirState.totalPages = entriesPerPage === 0 ? 1 : Math.ceil(totalItems / entriesPerPage);
            
            // Get paged data
            const pagedData = getPagedData(formulirState.filteredData, formulirState);
            
            // Clear and render table
            formulirBody.innerHTML = '';
            
            if (pagedData.length === 0) {
                formulirBody.innerHTML = `
                    <tr>
                        <td colspan="8" class="text-center py-4">
                            <i class="fas fa-inbox fa-2x text-muted mb-3"></i>
                            <p class="text-muted">Tidak ada data formulir yang ditemukan</p>
                        </td>
                    </tr>
                `;
            } else {
                const startNumber = (formulirState.currentPage - 1) * (formulirState.entriesPerPage || totalItems) + 1;
                
                pagedData.forEach((item, index) => {
                    const rowNumber = startNumber + index;
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td class="ps-4 row-number fw-bold" data-label="No">${rowNumber}</td>
                        <td class="fw-bold" data-label="NISN">${item.nisn}</td>
                        <td data-label="Nama Santriwati">${item.nama}</td>
                        <td data-label="Jenjang"><span class="badge bg-light text-dark">${item.jenjang}</span></td>
                        <td data-label="Tgl Upload">${item.tgl_upload}</td>
                        <td data-label="Status Verifikasi">${getVerifikasiBadge(item.formulir_status)}</td>
                        <td class="text-center" data-label="Berkas">
                            ${getFileTypeBadge(item.formulir_file)}
                            <button class="btn-action-circle btn-view-proof" title="Lihat Formulir" data-nisn="${item.nisn}" data-type="formulir" data-file="${item.formulir_file}" data-url="${item.formulir_url}" data-is-image="${item.is_image}">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                        <td class="text-center" data-label="Aksi">
                            <div class="btn-action-group">
                                <button class="btn-action-circle btn-approve" title="Setujui Formulir" data-nisn="${item.nisn}" data-type="formulir" ${item.formulir_status === "Sudah Dicek" ? 'disabled' : ''}>
                                    <i class="fas fa-check"></i>
                                </button>
                                <button class="btn-action-circle btn-reject" title="Tolak Formulir" data-nisn="${item.nisn}" data-type="formulir" ${item.formulir_status === "Ditolak" ? 'disabled' : ''}>
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </td>
                    `;
                    formulirBody.appendChild(row);
                });
            }
            
            // Update pagination info
            updatePaginationInfo('formulir', totalItems);
            
            // Update pagination buttons
            renderPaginationButtons('formulir');
            
            // Update sort icons
            updateSortIcons('formulir', formulirState.sortField, formulirState.sortDirection);
            
            // Update counter
            document.getElementById('formulirCounter').textContent = totalItems;
            
            // Add event listeners
            addButtonListeners();
            addSortListeners('formulir');
        }

        function renderSuratTable() {
            // Get filtered data
            suratState.filteredData = getFilteredData('surat').map(item => ({
                ...item,
                status: item.surat_status
            }));
            
            // Sort data
            suratState.filteredData = sortData(
                suratState.filteredData, 
                suratState.sortField, 
                suratState.sortDirection
            );
            
            // Calculate pagination
            const totalItems = suratState.filteredData.length;
            const entriesPerPage = suratState.entriesPerPage || totalItems;
            suratState.totalPages = entriesPerPage === 0 ? 1 : Math.ceil(totalItems / entriesPerPage);
            
            // Get paged data
            const pagedData = getPagedData(suratState.filteredData, suratState);
            
            // Clear and render table
            suratBody.innerHTML = '';
            
            if (pagedData.length === 0) {
                suratBody.innerHTML = `
                    <tr>
                        <td colspan="8" class="text-center py-4">
                            <i class="fas fa-inbox fa-2x text-muted mb-3"></i>
                            <p class="text-muted">Tidak ada data surat pernyataan yang ditemukan</p>
                        </td>
                    </tr>
                `;
            } else {
                const startNumber = (suratState.currentPage - 1) * (suratState.entriesPerPage || totalItems) + 1;
                
                pagedData.forEach((item, index) => {
                    const rowNumber = startNumber + index;
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td class="ps-4 row-number fw-bold" data-label="No">${rowNumber}</td>
                        <td class="fw-bold" data-label="NISN">${item.nisn}</td>
                        <td data-label="Nama Santriwati">${item.nama}</td>
                        <td data-label="Jenjang"><span class="badge bg-light text-dark">${item.jenjang}</span></td>
                        <td data-label="Tgl Upload">${item.tgl_upload}</td>
                        <td data-label="Status Verifikasi">${getVerifikasiBadge(item.surat_status)}</td>
                        <td class="text-center" data-label="Berkas">
                            ${getFileTypeBadge(item.surat_file)}
                            <button class="btn-action-circle btn-view-proof" title="Lihat Surat Pernyataan" data-nisn="${item.nisn}" data-type="surat" data-file="${item.surat_file}" data-url="${item.surat_url}" data-is-image="${item.is_image}">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                        <td class="text-center" data-label="Aksi">
                            <div class="btn-action-group">
                                <button class="btn-action-circle btn-approve" title="Setujui Surat" data-nisn="${item.nisn}" data-type="surat" ${item.surat_status === "Sudah Dicek" ? 'disabled' : ''}>
                                    <i class="fas fa-check"></i>
                                </button>
                                <button class="btn-action-circle btn-reject" title="Tolak Surat" data-nisn="${item.nisn}" data-type="surat" ${item.surat_status === "Ditolak" ? 'disabled' : ''}>
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </td>
                    `;
                    suratBody.appendChild(row);
                });
            }
            
            // Update pagination info
            updatePaginationInfo('surat', totalItems);
            
            // Update pagination buttons
            renderPaginationButtons('surat');
            
            // Update sort icons
            updateSortIcons('surat', suratState.sortField, suratState.sortDirection);
            
            // Update counter
            document.getElementById('suratCounter').textContent = totalItems;
            
            // Add event listeners
            addButtonListeners();
            addSortListeners('surat');
        }

        function updatePaginationInfo(tableType, totalItems) {
            const state = tableType === 'formulir' ? formulirState : suratState;
            const entriesPerPage = state.entriesPerPage || totalItems;
            const start = (state.currentPage - 1) * entriesPerPage + 1;
            const end = Math.min(state.currentPage * entriesPerPage, totalItems);
            
            let infoText = '';
            if (totalItems === 0) {
                infoText = 'Tidak ada data';
            } else if (state.entriesPerPage === 0) {
                infoText = `Menampilkan semua ${totalItems} data`;
            } else {
                infoText = `Menampilkan ${start} sampai ${end} dari ${totalItems} data`;
            }
            
            document.getElementById(`${tableType}PaginationInfo`).textContent = infoText;
        }

        function renderPaginationButtons(tableType) {
            const state = tableType === 'formulir' ? formulirState : suratState;
            const container = document.getElementById(`${tableType}PaginationButtons`);
            
            if (state.totalPages <= 1) {
                container.innerHTML = '';
                return;
            }
            
            let buttons = '';
            
            // Previous button
            buttons += `
                <button class="btn ${state.currentPage === 1 ? 'disabled' : ''}" 
                        onclick="goToPage('${tableType}', ${state.currentPage - 1})">
                    <i class="fas fa-chevron-left"></i>
                </button>
            `;
            
            // Page buttons
            const maxButtons = 5;
            let startPage = Math.max(1, state.currentPage - Math.floor(maxButtons / 2));
            let endPage = Math.min(state.totalPages, startPage + maxButtons - 1);
            
            if (endPage - startPage + 1 < maxButtons) {
                startPage = Math.max(1, endPage - maxButtons + 1);
            }
            
            for (let i = startPage; i <= endPage; i++) {
                buttons += `
                    <button class="btn ${i === state.currentPage ? 'active' : ''}" 
                            onclick="goToPage('${tableType}', ${i})">
                        ${i}
                    </button>
                `;
            }
            
            // Next button
            buttons += `
                <button class="btn ${state.currentPage === state.totalPages ? 'disabled' : ''}" 
                        onclick="goToPage('${tableType}', ${state.currentPage + 1})">
                    <i class="fas fa-chevron-right"></i>
                </button>
            `;
            
            container.innerHTML = buttons;
        }

        // Global functions for pagination
        window.goToPage = function(tableType, page) {
            if (tableType === 'formulir') {
                if (page >= 1 && page <= formulirState.totalPages) {
                    formulirState.currentPage = page;
                    renderFormulirTable();
                }
            } else {
                if (page >= 1 && page <= suratState.totalPages) {
                    suratState.currentPage = page;
                    renderSuratTable();
                }
            }
        };

        function addSortListeners(tableType) {
            document.querySelectorAll(`#${tableType}Table .sortable-header`).forEach(header => {
                header.addEventListener('click', () => {
                    const sortField = header.dataset.sort;
                    const state = tableType === 'formulir' ? formulirState : suratState;
                    
                    if (state.sortField === sortField) {
                        // Toggle direction
                        state.sortDirection = state.sortDirection === 'asc' ? 'desc' : 'asc';
                    } else {
                        // New field, default to asc
                        state.sortField = sortField;
                        state.sortDirection = 'asc';
                    }
                    
                    if (tableType === 'formulir') {
                        renderFormulirTable();
                    } else {
                        renderSuratTable();
                    }
                });
            });
        }

        function getVerifikasiBadge(status) {
            switch(status) {
                case "Sudah Dicek":
                    return '<span class="badge-verif-done"><i class="fas fa-check-circle me-1"></i> Sudah Dicek</span>';
                case "Ditolak":
                    return '<span class="badge-verif-rejected"><i class="fas fa-times-circle me-1"></i> Ditolak</span>';
                default:
                    return '<span class="badge-verif-wait"><i class="fas fa-clock me-1"></i> Belum Dicek</span>';
            }
        }

        function addButtonListeners() {
            // View document buttons
            document.querySelectorAll('.btn-view-proof').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const nisn = btn.dataset.nisn;
                    const type = btn.dataset.type;
                    const filename = btn.dataset.file;
                    const fileUrl = btn.dataset.url;
                    const isImage = btn.dataset.isImage === 'true';
                    
                    viewDocument(nisn, type, filename, fileUrl, isImage);
                });
            });

            // Approve buttons
            document.querySelectorAll('.btn-approve:not([disabled])').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const nisn = btn.dataset.nisn;
                    const type = btn.dataset.type;
                    
                    if (confirm(`Setujui ${type === 'formulir' ? 'formulir' : 'surat pernyataan'} untuk NISN ${nisn}?`)) {
                        approveRejectDocument(nisn, type, 'approve');
                    }
                });
            });

            // Reject buttons
            document.querySelectorAll('.btn-reject:not([disabled])').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const nisn = btn.dataset.nisn;
                    const type = btn.dataset.type;
                    
                    if (confirm(`Tolak ${type === 'formulir' ? 'formulir' : 'surat pernyataan'} untuk NISN ${nisn}?`)) {
                        approveRejectDocument(nisn, type, 'reject');
                    }
                });
            });
        }

        function viewDocument(nisn, type, filename, fileUrl, isImage) {
            currentDocument = { nisn, type, filename, fileUrl, isImage };
            imageZoom = 100;
            
            const docType = type === 'formulir' ? 'Formulir Pendaftaran' : 'Surat Pernyataan';
            modalTitle.innerHTML = `<i class="fas fa-file-${type === 'formulir' ? 'signature' : 'contract'} me-2"></i>${docType} - ${nisn}`;
            
            // Show loading
            modalBody.innerHTML = `
                <div class="text-center py-4">
                    <div class="spinner-border text-primary mb-3" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="text-muted">Membuka dokumen...</p>
                </div>
            `;
            
            // Show modal
            viewDocumentModal.show();
            
            // Load content after a short delay (simulate loading)
            setTimeout(() => {
                loadDocumentContent(nisn, type, filename, fileUrl, isImage);
            }, 500);
        }

        function loadDocumentContent(nisn, type, filename, fileUrl, isImage) {
            const item = berkasData.find(b => b.nisn === nisn);
            const docType = type === 'formulir' ? 'Formulir Pendaftaran' : 'Surat Pernyataan';
            const fileExtension = filename.split('.').pop().toUpperCase();
            
            if (isImage && fileUrl) {
                // Show image preview
                modalBody.innerHTML = `
                    <div class="image-preview-container">
                        <div class="mb-3">
                            <img src="${fileUrl}" alt="${filename}" class="image-preview" id="previewImage" style="width: ${imageZoom}%; max-width: 100%; transition: width 0.3s;">
                        </div>
                        <div class="zoom-controls">
                            <button class="zoom-btn" onclick="changeImageZoom(-25)">
                                <i class="fas fa-search-minus"></i>
                            </button>
                            <span class="mx-2" style="line-height: 40px;">${imageZoom}%</span>
                            <button class="zoom-btn" onclick="changeImageZoom(25)">
                                <i class="fas fa-search-plus"></i>
                            </button>
                            <button class="zoom-btn" onclick="resetImageZoom()" style="margin-left: 10px;">
                                <i class="fas fa-redo"></i>
                            </button>
                        </div>
                    </div>
                    <div class="file-info">
                        <div class="file-info-item">
                            <span><i class="fas fa-file-image text-primary me-2"></i>Jenis File</span>
                            <span class="fw-bold">Gambar (${fileExtension})</span>
                        </div>
                        <div class="file-info-item">
                            <span><i class="fas fa-user me-2"></i>Nama Santriwati</span>
                            <span class="fw-bold">${item?.nama || '-'}</span>
                        </div>
                        <div class="file-info-item">
                            <span><i class="fas fa-id-card me-2"></i>NISN</span>
                            <span class="fw-bold">${nisn}</span>
                        </div>
                        <div class="file-info-item">
                            <span><i class="fas fa-calendar me-2"></i>Tanggal Upload</span>
                            <span class="fw-bold">${item?.tgl_upload || '-'}</span>
                        </div>
                    </div>
                    <div class="alert alert-info mt-3">
                        <i class="fas fa-info-circle me-2"></i>
                        Gunakan tombol zoom untuk memperbesar/memperkecil gambar. Pastikan semua informasi dalam gambar terbaca dengan jelas sebelum melakukan verifikasi.
                    </div>
                `;
            } else {
                // Show PDF preview (simulated)
                modalBody.innerHTML = `
                    <div class="pdf-preview-container">
                        <div class="mb-4">
                            <i class="fas fa-file-pdf text-danger fa-4x mb-3"></i>
                            <h5>${filename}</h5>
                            <p class="text-muted mb-0">File PDF - ${fileExtension}</p>
                        </div>
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            Preview PDF tidak tersedia. Untuk melihat isi dokumen, silahkan download file.
                        </div>
                        <div class="mt-3">
                            <a href="#" class="btn btn-primary" onclick="downloadFile('${filename}')">
                                <i class="fas fa-download me-2"></i>Download PDF
                            </a>
                        </div>
                    </div>
                    <div class="file-info mt-3">
                        <div class="file-info-item">
                            <span><i class="fas fa-file-pdf text-danger me-2"></i>Jenis File</span>
                            <span class="fw-bold">PDF Document</span>
                        </div>
                        <div class="file-info-item">
                            <span><i class="fas fa-user me-2"></i>Nama Santriwati</span>
                            <span class="fw-bold">${item?.nama || '-'}</span>
                        </div>
                        <div class="file-info-item">
                            <span><i class="fas fa-id-card me-2"></i>NISN</span>
                            <span class="fw-bold">${nisn}</span>
                        </div>
                        <div class="file-info-item">
                            <span><i class="fas fa-calendar me-2"></i>Tanggal Upload</span>
                            <span class="fw-bold">${item?.tgl_upload || '-'}</span>
                        </div>
                    </div>
                `;
            }
        }

        // Global functions for image zoom
        window.changeImageZoom = function(change) {
            imageZoom = Math.max(25, Math.min(200, imageZoom + change));
            const previewImage = document.getElementById('previewImage');
            if (previewImage) {
                previewImage.style.width = `${imageZoom}%`;
                
                // Update zoom percentage display
                const zoomDisplay = document.querySelector('.zoom-controls span');
                if (zoomDisplay) {
                    zoomDisplay.textContent = `${imageZoom}%`;
                }
            }
        };

        window.resetImageZoom = function() {
            imageZoom = 100;
            const previewImage = document.getElementById('previewImage');
            if (previewImage) {
                previewImage.style.width = `${imageZoom}%`;
                
                // Update zoom percentage display
                const zoomDisplay = document.querySelector('.zoom-controls span');
                if (zoomDisplay) {
                    zoomDisplay.textContent = `${imageZoom}%`;
                }
            }
        };

        window.downloadFile = function(filename) {
            toastMessage.innerHTML = `<i class="fas fa-download me-2"></i>Memulai download file: ${filename}`;
            successToast.show();
            // In a real application, this would trigger an actual download
            // For demo purposes, we just show a toast
            return false;
        };

        function approveRejectDocument(nisn, type, action) {
            const item = berkasData.find(b => b.nisn === nisn);
            if (!item) return;

            const statusKey = type === 'formulir' ? 'formulir_status' : 'surat_status';
            const docType = type === 'formulir' ? 'Formulir' : 'Surat Pernyataan';
            
            if (action === 'approve') {
                item[statusKey] = "Sudah Dicek";
                toastMessage.innerHTML = `<i class="fas fa-check-circle text-success me-2"></i>${docType} untuk NISN <strong>${nisn}</strong> berhasil disetujui.`;
            } else if (action === 'reject') {
                item[statusKey] = "Ditolak";
                toastMessage.innerHTML = `<i class="fas fa-times-circle text-danger me-2"></i>${docType} untuk NISN <strong>${nisn}</strong> ditolak.`;
            }

            successToast.show();
            updateCounters();
            renderFormulirTable();
            renderSuratTable();
        }

        function updateCounters() {
            const totalFormulir = berkasData.length;
            const totalSurat = berkasData.length;
            const totalPending = berkasData.filter(item => 
                item.formulir_status === "Belum Dicek" || item.surat_status === "Belum Dicek"
            ).length;

            document.getElementById('totalFormulir').textContent = totalFormulir;
            document.getElementById('totalSurat').textContent = totalSurat;
            document.getElementById('totalPending').textContent = totalPending;
        }
    </script>

</body>
</html>