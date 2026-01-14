<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Ujian - Admin PSB AQBS</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Library untuk Export -->
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>
    
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

        /* --- FILTER CARD --- */
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

        /* --- TABLE STYLING --- */
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

        /* Status Styles */
        .status-badge { 
            padding: 6px 12px; 
            border-radius: 8px; 
            font-size: 0.7rem; 
            font-weight: 800; 
            text-transform: uppercase; 
            border: 1px solid transparent; 
            display: inline-block;
        }
        .status-lulus { 
            background: #d1fae5; 
            color: #065f46; 
            border-color: #6ee7b7; 
        }
        .status-tidak-lulus { 
            background: #fee2e2; 
            color: #991b1b; 
            border-color: #fecaca; 
        }
        .status-belum-ujian { 
            background: #fef9c3; 
            color: #a16207; 
            border-color: #fef08a; 
        }

        .btn-action {
            padding: 8px 16px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.85rem;
            transition: all var(--transition-speed);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-detail {
            background: #dbeafe;
            color: #1e40af;
            border: 1px solid #bfdbfe;
        }
        .btn-detail:hover {
            background: #1e40af;
            color: white;
            transform: translateY(-2px);
        }
        .btn-rekap {
            background: linear-gradient(135deg, var(--orange-primary), #e67100);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.9rem;
            transition: all var(--transition-speed);
        }
        .btn-rekap:hover {
            background: linear-gradient(135deg, #e67100, var(--orange-primary));
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(255, 127, 0, 0.3);
        }

        /* --- STATISTICS CARD --- */
        .stats-card {
            background: white;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            border-left: 4px solid var(--blue-info);
            margin-bottom: 25px;
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
        }
        .stat-value {
            font-size: 2rem;
            font-weight: 800;
            color: var(--navy-primary);
            margin-bottom: 8px;
        }
        .stat-label {
            font-size: 0.85rem;
            color: #64748b;
            font-weight: 600;
        }

        /* --- PAGINATION & EXPORT CONTROLS --- */
        .pagination-controls {
            background: white;
            border-radius: 16px;
            padding: 15px 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .page-info {
            font-size: 0.85rem;
            color: #64748b;
            font-weight: 600;
        }
        
        .pagination .page-link {
            border-radius: 8px;
            margin: 0 3px;
            color: var(--navy-primary);
            border: 1px solid #e2e8f0;
            font-weight: 600;
            min-width: 40px;
            text-align: center;
        }
        
        .pagination .page-item.active .page-link {
            background: var(--orange-primary);
            border-color: var(--orange-primary);
            color: white;
        }
        
        .pagination .page-item.disabled .page-link {
            color: #94a3b8;
        }
        
        .export-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        
        .btn-export {
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all var(--transition-speed);
        }
        
        .btn-excel {
            background: #ecfdf3;
            color: #166534;
            border: 1px solid #d1fae5;
        }
        
        .btn-excel:hover {
            background: #166534;
            color: white;
            transform: translateY(-2px);
        }
        
        .btn-pdf {
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }
        
        .btn-pdf:hover {
            background: #991b1b;
            color: white;
            transform: translateY(-2px);
        }
        
        .records-per-page {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .records-per-page select {
            border-radius: 8px;
            padding: 6px 12px;
            border: 2px solid #e2e8f0;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--navy-primary);
        }

        /* --- MODAL STYLING --- */
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
        .exam-result-item {
            padding: 15px;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            margin-bottom: 15px;
            background: #f8fafc;
        }
        .exam-result-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .exam-result-title {
            font-weight: 700;
            color: var(--navy-primary);
        }
        .exam-result-score {
            font-weight: 800;
            font-size: 1.2rem;
            color: var(--navy-primary);
        }
        .exam-result-passing {
            font-size: 0.85rem;
            color: #64748b;
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
            .filter-card .row > [class*="col"] {
                margin-bottom: 15px;
            }
            .filter-card .row > [class*="col"]:last-child {
                margin-bottom: 0;
            }
            .table-responsive {
                overflow-x: auto;
            }
            .table th, .table td {
                white-space: nowrap;
                min-width: 120px;
            }
            .stats-row {
                grid-template-columns: 1fr;
            }
            .pagination-controls {
                flex-direction: column;
                align-items: stretch;
            }
            .export-buttons {
                justify-content: center;
            }
            .records-per-page {
                justify-content: center;
            }
        }
        
        @media (max-width: 576px) {
            .table th, .table td {
                padding: 12px 15px;
                font-size: 0.85rem;
            }
            .status-badge {
                font-size: 0.65rem;
                padding: 4px 10px;
            }
            .btn-action {
                font-size: 0.8rem;
                padding: 6px 12px;
            }
            .stats-card {
                padding: 15px;
            }
            .stat-item {
                padding: 15px;
            }
            .stat-value {
                font-size: 1.6rem;
            }
            .exam-result-header {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
            }
            .export-buttons {
                flex-direction: column;
                width: 100%;
            }
            .btn-export {
                width: 100%;
                justify-content: center;
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
                    <small class="opacity-75 fw-medium" style="font-size: 0.6rem;">Hasil Ujian Santriwati</small>
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
            <button class="menu-btn"><i class="fas fa-database"></i>Data PSB</button>
            <ul class="sub-menu">
                <li><a href="#">Semua Data</a></li>
                <li><a href="#">Daftar Berkas</a></li>
                <li><a href="#">Data Diterima</a></li>
                <li><a href="#">Siswa Daftar Ulang</a></li>
                <li><a href="#">Ditolak / Cadangan</a></li>
                <li><a href="#">Pembayaran</a></li>
                <li><a href="#">Rekap</a></li>
            </ul>
        </div>

        <div class="menu-category">Manajemen Ujian</div>
        <div class="menu-group">
            <a href="#" class="menu-btn active-dashboard"><i class="fas fa-clipboard-list"></i>Hasil Ujian</a>
            <a href="#" class="menu-btn"><i class="fas fa-file-edit"></i>Buat Bank Soal</a>
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
            <h4 class="fw-bold" style="color: var(--navy-primary);">Hasil Ujian Santriwati</h4>
            <p class="text-muted small">Monitoring hasil ujian dan status kelulusan calon santriwati.</p>
        </div>

        <!-- Statistics Cards -->
        <div class="stats-card">
            <div class="stats-row">
                <div class="stat-item">
                    <div class="stat-value" id="statTotal">87</div>
                    <div class="stat-label">Total Peserta</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value" id="statUjian">65</div>
                    <div class="stat-label">Sudah Ujian</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value" id="statLulus">42</div>
                    <div class="stat-label">Lulus</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value" id="statTidakLulus">23</div>
                    <div class="stat-label">Tidak Lulus</div>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="filter-card">
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="small fw-bold mb-1">Tahun Ajaran</label>
                    <select class="form-select form-select-sm" id="filterTahun">
                        <option value="all">Semua Tahun</option>
                        <option value="2026/2027" selected>2026/2027</option>
                        <option value="2025/2026">2025/2026</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="small fw-bold mb-1">Gelombang</label>
                    <select class="form-select form-select-sm" id="filterGelombang">
                        <option value="all">Semua Gelombang</option>
                        <option value="Gelombang 1">Gelombang 1</option>
                        <option value="Gelombang 2" selected>Gelombang 2</option>
                        <option value="Gelombang 3">Gelombang 3</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="small fw-bold mb-1">Jenjang</label>
                    <select class="form-select form-select-sm" id="filterJenjang">
                        <option value="all">Semua Jenjang</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="small fw-bold mb-1">Status</label>
                    <select class="form-select form-select-sm" id="filterStatus">
                        <option value="all">Semua Status</option>
                        <option value="Lulus">Lulus</option>
                        <option value="Tidak Lulus">Tidak Lulus</option>
                        <option value="Belum Ujian">Belum Ujian</option>
                    </select>
                </div>
                <div class="col-md-2 d-flex gap-2 align-items-end">
                    <button class="btn btn-outline-secondary btn-sm w-100" onclick="resetFilters()">
                        <i class="fas fa-undo me-1"></i> Reset
                    </button>
                    <button class="btn btn-primary btn-sm w-100" onclick="applyFilters()">
                        <i class="fas fa-search me-1"></i> Filter
                    </button>
                </div>
            </div>
        </div>

        <!-- Pagination & Export Controls -->
        <div class="pagination-controls">
            <div class="records-per-page">
                <span class="page-info">Tampilkan:</span>
                <select id="recordsPerPage" class="form-select form-select-sm" onchange="changeRecordsPerPage(this.value)">
                    <option value="10">10 baris</option>
                    <option value="50" selected>50 baris</option>
                    <option value="100">100 baris</option>
                    <option value="all">Semua</option>
                </select>
            </div>
            
            <div class="page-info" id="pageInfo">
                Menampilkan 1-5 dari 87 total peserta
            </div>
            
            <div class="export-buttons">
                <button class="btn-export btn-excel" onclick="exportToExcel()">
                    <i class="fas fa-file-excel"></i> Export Excel
                </button>
                <button class="btn-export btn-pdf" onclick="exportToPDF()">
                    <i class="fas fa-file-pdf"></i> Export PDF
                </button>
                <button class="btn-export btn-rekap" onclick="exportRekap()">
                    <i class="fas fa-print"></i> Cetak Rekap
                </button>
            </div>
        </div>

        <!-- Results Table -->
        <div class="card-custom">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="resultsTable">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">#</th>
                            <th>NISN / Nama</th>
                            <th>Jenjang</th>
                            <th>Total Nilai</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="resultsTableBody">
                        <!-- Data akan diisi oleh JavaScript -->
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination Navigation -->
            <div class="card-footer bg-white border-top-0 p-4">
                <nav aria-label="Navigasi halaman">
                    <ul class="pagination justify-content-center mb-0" id="pagination">
                        <!-- Pagination akan diisi oleh JavaScript -->
                    </ul>
                </nav>
            </div>
        </div>
    </main>

    <!-- Detail Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Detail Hasil Ujian</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="modalBody">
                    <!-- Konten modal akan diisi oleh JavaScript -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn-rekap" onclick="printResult()">
                        <i class="fas fa-print me-1"></i> Cetak Hasil
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Data contoh hasil ujian
        const examResults = [
            { id: 1, nisn: '0081122334', name: 'ANNISA RAHMAWATI', jenjang: 'SMP', tahun: '2026/2027', gelombang: 'Gelombang 2', 
              totalNilai: 87.5, status: 'Lulus',
              detail: [
                { mataPelajaran: 'Bahasa Arab', nilai: 90.0, passingGrade: 75.0 },
                { mataPelajaran: 'Al-Qur\'an', nilai: 85.0, passingGrade: 75.0 },
                { mataPelajaran: 'Bahasa Indonesia', nilai: 80.0, passingGrade: 75.0 },
                { mataPelajaran: 'Matematika', nilai: 95.0, passingGrade: 75.0 }
              ]
            },
            { id: 2, nisn: '0099228833', name: 'SITI FATIMAH', jenjang: 'SMA', tahun: '2026/2027', gelombang: 'Gelombang 2', 
              totalNilai: 92.0, status: 'Lulus',
              detail: [
                { mataPelajaran: 'Bahasa Arab', nilai: 95.0, passingGrade: 75.0 },
                { mataPelajaran: 'Al-Qur\'an', nilai: 90.0, passingGrade: 75.0 },
                { mataPelajaran: 'Bahasa Indonesia', nilai: 88.0, passingGrade: 75.0 },
                { mataPelajaran: 'Matematika', nilai: 95.0, passingGrade: 75.0 }
              ]
            },
            { id: 3, nisn: '0077665544', name: 'NURUL HUDA', jenjang: 'SMP', tahun: '2026/2027', gelombang: 'Gelombang 1', 
              totalNilai: 65.0, status: 'Tidak Lulus',
              detail: [
                { mataPelajaran: 'Bahasa Arab', nilai: 70.0, passingGrade: 75.0 },
                { mataPelajaran: 'Al-Qur\'an', nilai: 65.0, passingGrade: 75.0 },
                { mataPelajaran: 'Bahasa Indonesia', nilai: 60.0, passingGrade: 75.0 },
                { mataPelajaran: 'Matematika', nilai: 65.0, passingGrade: 75.0 }
              ]
            },
            { id: 4, nisn: '0066554433', name: 'FATIMAH ZAHRA', jenjang: 'SMA', tahun: '2025/2026', gelombang: 'Gelombang 3', 
              totalNilai: null, status: 'Belum Ujian', detail: [] },
            { id: 5, nisn: '0055443322', name: 'AINUN NAIM', jenjang: 'SMP', tahun: '2026/2027', gelombang: 'Gelombang 2', 
              totalNilai: 78.5, status: 'Lulus',
              detail: [
                { mataPelajaran: 'Bahasa Arab', nilai: 80.0, passingGrade: 75.0 },
                { mataPelajaran: 'Al-Qur\'an', nilai: 75.0, passingGrade: 75.0 },
                { mataPelajaran: 'Bahasa Indonesia', nilai: 82.0, passingGrade: 75.0 },
                { mataPelajaran: 'Matematika', nilai: 77.0, passingGrade: 75.0 }
              ]
            },
            { id: 6, nisn: '0044332211', name: 'AZIZAH PUTRI', jenjang: 'SMP', tahun: '2026/2027', gelombang: 'Gelombang 1', 
              totalNilai: 88.0, status: 'Lulus',
              detail: [
                { mataPelajaran: 'Bahasa Arab', nilai: 90.0, passingGrade: 75.0 },
                { mataPelajaran: 'Al-Qur\'an', nilai: 85.0, passingGrade: 75.0 },
                { mataPelajaran: 'Bahasa Indonesia', nilai: 92.0, passingGrade: 75.0 },
                { mataPelajaran: 'Matematika', nilai: 85.0, passingGrade: 75.0 }
              ]
            },
            { id: 7, nisn: '0033221100', name: 'SALMA ALYA', jenjang: 'SMA', tahun: '2026/2027', gelombang: 'Gelombang 2', 
              totalNilai: 72.0, status: 'Tidak Lulus',
              detail: [
                { mataPelajaran: 'Bahasa Arab', nilai: 75.0, passingGrade: 75.0 },
                { mataPelajaran: 'Al-Qur\'an', nilai: 70.0, passingGrade: 75.0 },
                { mataPelajaran: 'Bahasa Indonesia', nilai: 68.0, passingGrade: 75.0 },
                { mataPelajaran: 'Matematika', nilai: 75.0, passingGrade: 75.0 }
              ]
            },
            { id: 8, nisn: '0022110099', name: 'KHOIRUNNISA', jenjang: 'SMP', tahun: '2025/2026', gelombang: 'Gelombang 3', 
              totalNilai: null, status: 'Belum Ujian', detail: [] },
            { id: 9, nisn: '0011009988', name: 'ZAHRA AMANDA', jenjang: 'SMA', tahun: '2026/2027', gelombang: 'Gelombang 2', 
              totalNilai: 85.0, status: 'Lulus',
              detail: [
                { mataPelajaran: 'Bahasa Arab', nilai: 88.0, passingGrade: 75.0 },
                { mataPelajaran: 'Al-Qur\'an', nilai: 82.0, passingGrade: 75.0 },
                { mataPelajaran: 'Bahasa Indonesia', nilai: 90.0, passingGrade: 75.0 },
                { mataPelajaran: 'Matematika', nilai: 80.0, passingGrade: 75.0 }
              ]
            },
            { id: 10, nisn: '0009998877', name: 'DIAN ANGGRAINI', jenjang: 'SMP', tahun: '2026/2027', gelombang: 'Gelombang 1', 
              totalNilai: 91.5, status: 'Lulus',
              detail: [
                { mataPelajaran: 'Bahasa Arab', nilai: 95.0, passingGrade: 75.0 },
                { mataPelajaran: 'Al-Qur\'an', nilai: 90.0, passingGrade: 75.0 },
                { mataPelajaran: 'Bahasa Indonesia', nilai: 92.0, passingGrade: 75.0 },
                { mataPelajaran: 'Matematika', nilai: 89.0, passingGrade: 75.0 }
              ]
            },
            { id: 11, nisn: '0008887766', name: 'REZA ANDINI', jenjang: 'SMA', tahun: '2026/2027', gelombang: 'Gelombang 2', 
              totalNilai: 68.5, status: 'Tidak Lulus',
              detail: [
                { mataPelajaran: 'Bahasa Arab', nilai: 70.0, passingGrade: 75.0 },
                { mataPelajaran: 'Al-Qur\'an', nilai: 65.0, passingGrade: 75.0 },
                { mataPelajaran: 'Bahasa Indonesia', nilai: 72.0, passingGrade: 75.0 },
                { mataPelajaran: 'Matematika', nilai: 67.0, passingGrade: 75.0 }
              ]
            },
            { id: 12, nisn: '0007776655', name: 'FITRIANI SARI', jenjang: 'SMP', tahun: '2025/2026', gelombang: 'Gelombang 3', 
              totalNilai: 79.0, status: 'Lulus',
              detail: [
                { mataPelajaran: 'Bahasa Arab', nilai: 82.0, passingGrade: 75.0 },
                { mataPelajaran: 'Al-Qur\'an', nilai: 78.0, passingGrade: 75.0 },
                { mataPelajaran: 'Bahasa Indonesia', nilai: 80.0, passingGrade: 75.0 },
                { mataPelajaran: 'Matematika', nilai: 76.0, passingGrade: 75.0 }
              ]
            }
        ];

        // Variabel global untuk manajemen state
        let currentPage = 1;
        let recordsPerPage = 50;
        let filteredData = [...examResults];

        // Inisialisasi
        document.addEventListener('DOMContentLoaded', function() {
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
            
            // Add active state to menu items
            document.querySelectorAll('.menu-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.querySelectorAll('.menu-btn').forEach(b => b.classList.remove('active-dashboard'));
                    this.classList.add('active-dashboard');
                });
            });

            // Add event listeners to filter inputs
            const filterInputs = document.querySelectorAll('#filterTahun, #filterGelombang, #filterJenjang, #filterStatus');
            filterInputs.forEach(input => {
                input.addEventListener('change', applyFilters);
            });

            // Render data awal
            renderTable();
            updateStats();
        });

        // Fungsi untuk merender tabel dengan pagination
        function renderTable() {
            const tableBody = document.getElementById('resultsTableBody');
            const paginationElement = document.getElementById('pagination');
            const pageInfoElement = document.getElementById('pageInfo');
            
            // Kosongkan isi tabel
            tableBody.innerHTML = '';
            
            // Hitung jumlah halaman
            const totalRecords = filteredData.length;
            const totalPages = recordsPerPage === 'all' ? 1 : Math.ceil(totalRecords / recordsPerPage);
            
            // Validasi halaman saat ini
            if (currentPage > totalPages && totalPages > 0) {
                currentPage = totalPages;
            }
            
            // Tentukan data yang akan ditampilkan
            let dataToShow = [...filteredData];
            let startIndex = 0;
            let endIndex = totalRecords;
            
            if (recordsPerPage !== 'all') {
                startIndex = (currentPage - 1) * recordsPerPage;
                endIndex = Math.min(startIndex + recordsPerPage, totalRecords);
                dataToShow = filteredData.slice(startIndex, endIndex);
            }
            
            // Render data ke tabel
            dataToShow.forEach((student, index) => {
                const actualIndex = recordsPerPage === 'all' ? student.id : startIndex + index + 1;
                const statusClass = getStatusClass(student.status);
                
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="ps-4">${actualIndex}</td>
                    <td>
                        <div class="fw-bold" style="color: var(--navy-primary);">${student.nisn}</div>
                        <div class="small text-muted">${student.name}</div>
                    </td>
                    <td><span class="badge bg-light text-dark">${student.jenjang}</span></td>
                    <td class="fw-bold">${student.totalNilai ? student.totalNilai.toFixed(1) : '-'}</td>
                    <td><span class="status-badge ${statusClass}">${student.status}</span></td>
                    <td class="text-center">
                        <button class="btn-action btn-detail" ${student.status === 'Belum Ujian' ? 'disabled' : ''} 
                                onclick="showDetailModal(${student.id})">
                            <i class="fas fa-eye"></i> Detail
                        </button>
                    </td>
                `;
                tableBody.appendChild(row);
            });
            
            // Update info halaman
            if (totalRecords === 0) {
                pageInfoElement.textContent = 'Tidak ada data yang ditemukan';
            } else if (recordsPerPage === 'all') {
                pageInfoElement.textContent = `Menampilkan semua ${totalRecords} peserta`;
            } else {
                pageInfoElement.textContent = `Menampilkan ${startIndex + 1}-${endIndex} dari ${totalRecords} total peserta`;
            }
            
            // Render pagination
            renderPagination(paginationElement, totalPages);
        }
        
        // Fungsi untuk merender pagination
        function renderPagination(element, totalPages) {
            element.innerHTML = '';
            
            if (recordsPerPage === 'all' || totalPages <= 1) {
                return;
            }
            
            // Tombol Previous
            const prevItem = document.createElement('li');
            prevItem.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
            prevItem.innerHTML = `<a class="page-link" href="#" onclick="changePage(${currentPage - 1}); return false;">&laquo; Sebelumnya</a>`;
            element.appendChild(prevItem);
            
            // Tombol halaman
            const maxVisiblePages = 5;
            let startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
            let endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);
            
            if (endPage - startPage + 1 < maxVisiblePages) {
                startPage = Math.max(1, endPage - maxVisiblePages + 1);
            }
            
            for (let i = startPage; i <= endPage; i++) {
                const pageItem = document.createElement('li');
                pageItem.className = `page-item ${i === currentPage ? 'active' : ''}`;
                pageItem.innerHTML = `<a class="page-link" href="#" onclick="changePage(${i}); return false;">${i}</a>`;
                element.appendChild(pageItem);
            }
            
            // Tombol Next
            const nextItem = document.createElement('li');
            nextItem.className = `page-item ${currentPage === totalPages ? 'disabled' : ''}`;
            nextItem.innerHTML = `<a class="page-link" href="#" onclick="changePage(${currentPage + 1}); return false;">Selanjutnya &raquo;</a>`;
            element.appendChild(nextItem);
        }
        
        // Fungsi untuk mengubah halaman
        function changePage(page) {
            if (page < 1) return;
            
            const totalRecords = filteredData.length;
            const totalPages = recordsPerPage === 'all' ? 1 : Math.ceil(totalRecords / recordsPerPage);
            
            if (page > totalPages) return;
            
            currentPage = page;
            renderTable();
            
            // Scroll ke atas tabel
            document.querySelector('.table-responsive').scrollIntoView({ behavior: 'smooth' });
        }
        
        // Fungsi untuk mengubah jumlah baris per halaman
        function changeRecordsPerPage(value) {
            if (value === 'all') {
                recordsPerPage = 'all';
            } else {
                recordsPerPage = parseInt(value);
            }
            
            currentPage = 1;
            renderTable();
        }
        
        // Fungsi untuk mendapatkan class CSS berdasarkan status
        function getStatusClass(status) {
            switch(status) {
                case 'Lulus': return 'status-lulus';
                case 'Tidak Lulus': return 'status-tidak-lulus';
                case 'Belum Ujian': return 'status-belum-ujian';
                default: return '';
            }
        }
        
        // Fungsi untuk memperbarui statistik
        function updateStats() {
            const totalPeserta = examResults.length;
            const sudahUjian = examResults.filter(s => s.status !== 'Belum Ujian').length;
            const lulus = examResults.filter(s => s.status === 'Lulus').length;
            const tidakLulus = examResults.filter(s => s.status === 'Tidak Lulus').length;
            
            document.getElementById('statTotal').textContent = totalPeserta;
            document.getElementById('statUjian').textContent = sudahUjian;
            document.getElementById('statLulus').textContent = lulus;
            document.getElementById('statTidakLulus').textContent = tidakLulus;
        }

        // Filter functions
        function applyFilters() {
            const tahun = document.getElementById('filterTahun').value;
            const gelombang = document.getElementById('filterGelombang').value;
            const jenjang = document.getElementById('filterJenjang').value;
            const status = document.getElementById('filterStatus').value;
            
            filteredData = examResults.filter(student => {
                const matchesTahun = tahun === 'all' || student.tahun === tahun;
                const matchesGelombang = gelombang === 'all' || student.gelombang === gelombang;
                const matchesJenjang = jenjang === 'all' || student.jenjang === jenjang;
                const matchesStatus = status === 'all' || student.status === status;
                
                return matchesTahun && matchesGelombang && matchesJenjang && matchesStatus;
            });
            
            currentPage = 1;
            renderTable();
        }

        function resetFilters() {
            document.getElementById('filterTahun').value = '2026/2027';
            document.getElementById('filterGelombang').value = 'Gelombang 2';
            document.getElementById('filterJenjang').value = 'all';
            document.getElementById('filterStatus').value = 'all';
            applyFilters();
        }

        // Fungsi untuk menampilkan modal detail
        function showDetailModal(studentId) {
            const student = examResults.find(s => s.id === studentId);
            if (!student) return;
            
            const modalBody = document.getElementById('modalBody');
            let detailHTML = `
                <div class="text-center mb-4">
                    <h6 class="fw-bold" style="color: var(--navy-primary);">${student.name}</h6>
                    <p class="text-muted small">NISN: ${student.nisn} | Jenjang: ${student.jenjang}</p>
                </div>
            `;
            
            if (student.status === 'Belum Ujian') {
                detailHTML += `
                    <div class="text-center py-4">
                        <i class="fas fa-clock text-warning fa-3x mb-3"></i>
                        <h6 class="fw-bold">Belum Mengikuti Ujian</h6>
                        <p class="text-muted">Santriwati ini belum mengikuti ujian seleksi.</p>
                    </div>
                `;
            } else {
                student.detail.forEach(item => {
                    const percentage = (item.nilai / 100) * 100;
                    detailHTML += `
                        <div class="exam-result-item">
                            <div class="exam-result-header">
                                <span class="exam-result-title">${item.mataPelajaran}</span>
                                <span class="exam-result-score">${item.nilai.toFixed(1)}</span>
                            </div>
                            <div class="exam-result-passing">Passing Grade: ${item.passingGrade.toFixed(1)}</div>
                            <div class="progress mt-2" style="height: 8px;">
                                <div class="progress-bar ${item.nilai >= item.passingGrade ? 'bg-success' : 'bg-danger'}" 
                                     role="progressbar" style="width: ${percentage}%"></div>
                            </div>
                        </div>
                    `;
                });
                
                detailHTML += `
                    <div class="text-center mt-4">
                        <div class="fw-bold fs-4" style="color: var(--navy-primary);">Total: ${student.totalNilai.toFixed(1)}</div>
                        <div class="status-badge ${getStatusClass(student.status)} mt-2">Status: ${student.status}</div>
                    </div>
                `;
            }
            
            modalBody.innerHTML = detailHTML;
            
            // Tampilkan modal
            const modal = new bootstrap.Modal(document.getElementById('detailModal'));
            modal.show();
        }
        
        // Fungsi untuk mencetak hasil ujian
        function printResult() {
            const printWindow = window.open('', '_blank');
            printWindow.document.write(`
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Cetak Hasil Ujian</title>
                    <style>
                        body { font-family: Arial, sans-serif; padding: 20px; }
                        .header { text-align: center; margin-bottom: 30px; }
                        .header h2 { color: #002b49; margin-bottom: 5px; }
                        .student-info { margin-bottom: 20px; }
                        .table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
                        .table th, .table td { border: 1px solid #ddd; padding: 10px; text-align: left; }
                        .table th { background-color: #f5f5f5; }
                        .total { text-align: center; font-size: 18px; font-weight: bold; margin-top: 20px; }
                        .status { display: inline-block; padding: 5px 15px; border-radius: 5px; font-weight: bold; }
                        .status-lulus { background: #d1fae5; color: #065f46; }
                        .status-tidak-lulus { background: #fee2e2; color: #991b1b; }
                        .footer { margin-top: 30px; text-align: center; font-size: 12px; color: #666; }
                    </style>
                </head>
                <body>
                    <div class="header">
                        <h2>HASIL UJIAN SANTRIWATI</h2>
                        <h4>PSB AQBS PONOROGO</h4>
                        <p>Tahun Ajaran 2026/2027 - Gelombang 2</p>
                    </div>
                    ${document.getElementById('modalBody').innerHTML}
                    <div class="footer">
                        <p>Dicetak pada: ${new Date().toLocaleDateString('id-ID', { 
                            weekday: 'long', 
                            year: 'numeric', 
                            month: 'long', 
                            day: 'numeric',
                            hour: '2-digit',
                            minute: '2-digit'
                        })}</p>
                        <p>© PSB AQBS Ponorogo - Sistem Penerimaan Santri Baru</p>
                    </div>
                </body>
                </html>
            `);
            printWindow.document.close();
            printWindow.print();
        }

        // Export to Excel function
        function exportToExcel() {
            try {
                // Siapkan data untuk export
                const exportData = filteredData.map(student => ({
                    'No': student.id,
                    'NISN': student.nisn,
                    'Nama Santriwati': student.name,
                    'Jenjang': student.jenjang,
                    'Tahun Ajaran': student.tahun,
                    'Gelombang': student.gelombang,
                    'Total Nilai': student.totalNilai ? student.totalNilai.toFixed(1) : '-',
                    'Status': student.status
                }));
                
                // Buat worksheet
                const ws = XLSX.utils.json_to_sheet(exportData);
                
                // Buat workbook
                const wb = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(wb, ws, "Hasil Ujian");
                
                // Generate file name dengan timestamp
                const fileName = `Hasil_Ujian_PSB_AQBS_${new Date().toISOString().slice(0,10)}.xlsx`;
                
                // Download file
                XLSX.writeFile(wb, fileName);
                
                // Tampilkan notifikasi
                showNotification('Data hasil ujian berhasil diekspor ke Excel!', 'success');
            } catch (error) {
                console.error('Error exporting to Excel:', error);
                showNotification('Gagal mengekspor data ke Excel', 'error');
            }
        }

        // Export to PDF function
        function exportToPDF() {
            try {
                // Inisialisasi jsPDF
                const { jsPDF } = window.jspdf;
                const doc = new jsPDF('l', 'mm', 'a4');
                
                // Judul
                doc.setFontSize(18);
                doc.setTextColor(0, 43, 73); // Warna navy
                doc.text('REKAP HASIL UJIAN SANTRIWATI PSB AQBS', 105, 15, { align: 'center' });
                
                // Sub judul
                doc.setFontSize(11);
                doc.setTextColor(100, 100, 100);
                doc.text(`Tahun Ajaran: 2026/2027 | Gelombang: 2 | Tanggal Cetak: ${new Date().toLocaleDateString('id-ID')}`, 105, 22, { align: 'center' });
                
                // Siapkan data untuk tabel PDF
                const columns = [
                    { header: 'No', dataKey: 'no' },
                    { header: 'NISN', dataKey: 'nisn' },
                    { header: 'Nama Santriwati', dataKey: 'name' },
                    { header: 'Jenjang', dataKey: 'jenjang' },
                    { header: 'Total Nilai', dataKey: 'nilai' },
                    { header: 'Status', dataKey: 'status' }
                ];
                
                const rows = filteredData.map((student, index) => ({
                    no: index + 1,
                    nisn: student.nisn,
                    name: student.name,
                    jenjang: student.jenjang,
                    nilai: student.totalNilai ? student.totalNilai.toFixed(1) : '-',
                    status: student.status
                }));
                
                // Tambahkan tabel
                doc.autoTable({
                    columns: columns,
                    body: rows,
                    startY: 30,
                    theme: 'grid',
                    headStyles: {
                        fillColor: [0, 43, 73], // Warna navy
                        textColor: [255, 255, 255],
                        fontStyle: 'bold'
                    },
                    alternateRowStyles: {
                        fillColor: [248, 250, 252] // Warna abu-abu muda
                    },
                    margin: { top: 30 }
                });
                
                // Footer
                const pageCount = doc.internal.getNumberOfPages();
                for (let i = 1; i <= pageCount; i++) {
                    doc.setPage(i);
                    doc.setFontSize(10);
                    doc.setTextColor(150, 150, 150);
                    doc.text(`Halaman ${i} dari ${pageCount}`, 200, 200, { align: 'right' });
                    doc.text('© PSB AQBS Ponorogo', 10, 200);
                }
                
                // Simpan file
                const fileName = `Hasil_Ujian_PSB_AQBS_${new Date().toISOString().slice(0,10)}.pdf`;
                doc.save(fileName);
                
                // Tampilkan notifikasi
                showNotification('Data hasil ujian berhasil diekspor ke PDF!', 'success');
            } catch (error) {
                console.error('Error exporting to PDF:', error);
                showNotification('Gagal mengekspor data ke PDF', 'error');
            }
        }
        
        // Export rekap lengkap
        function exportRekap() {
            try {
                // Inisialisasi jsPDF
                const { jsPDF } = window.jspdf;
                const doc = new jsPDF('p', 'mm', 'a4');
                
                // Judul
                doc.setFontSize(16);
                doc.setTextColor(0, 43, 73);
                doc.text('REKAP LENGKAP HASIL UJIAN SANTRIWATI', 105, 15, { align: 'center' });
                doc.setFontSize(12);
                doc.text('PSB AQBS PONOROGO', 105, 22, { align: 'center' });
                
                // Informasi statistik
                doc.setFontSize(10);
                doc.text(`Total Peserta: ${examResults.length} | Sudah Ujian: ${examResults.filter(s => s.status !== 'Belum Ujian').length} | Lulus: ${examResults.filter(s => s.status === 'Lulus').length}`, 20, 30);
                doc.text(`Tanggal Cetak: ${new Date().toLocaleDateString('id-ID', { 
                    weekday: 'long', 
                    year: 'numeric', 
                    month: 'long', 
                    day: 'numeric' 
                })}`, 20, 35);
                
                // Header tabel
                let startY = 45;
                
                // Data untuk setiap peserta
                filteredData.forEach((student, index) => {
                    // Cek jika perlu halaman baru
                    if (startY > 250) {
                        doc.addPage();
                        startY = 20;
                    }
                    
                    // Header peserta
                    doc.setFontSize(11);
                    doc.setTextColor(0, 43, 73);
                    doc.text(`${index + 1}. ${student.name} (${student.nisn})`, 20, startY);
                    
                    doc.setFontSize(10);
                    doc.setTextColor(100, 100, 100);
                    doc.text(`Jenjang: ${student.jenjang} | Tahun: ${student.tahun} | Gelombang: ${student.gelombang}`, 20, startY + 5);
                    
                    startY += 12;
                    
                    // Tabel detail nilai
                    if (student.status !== 'Belum Ujian' && student.detail.length > 0) {
                        const detailColumns = ['Mata Pelajaran', 'Nilai', 'Passing Grade', 'Status'];
                        const detailRows = student.detail.map(item => [
                            item.mataPelajaran,
                            item.nilai.toFixed(1),
                            item.passingGrade.toFixed(1),
                            item.nilai >= item.passingGrade ? 'Lulus' : 'Tidak Lulus'
                        ]);
                        
                        doc.autoTable({
                            head: [detailColumns],
                            body: detailRows,
                            startY: startY,
                            theme: 'grid',
                            headStyles: { fillColor: [200, 200, 200], textColor: [0, 0, 0] },
                            margin: { left: 20, right: 20 },
                            styles: { fontSize: 9 }
                        });
                        
                        startY = doc.lastAutoTable.finalY + 5;
                        
                        // Total dan status
                        doc.setFontSize(10);
                        doc.setTextColor(0, 0, 0);
                        doc.text(`Total Nilai: ${student.totalNilai.toFixed(1)}`, 20, startY);
                        doc.text(`Status: ${student.status}`, 150, startY);
                        
                        startY += 15;
                    } else {
                        doc.setFontSize(10);
                        doc.setTextColor(160, 74, 7);
                        doc.text('Belum mengikuti ujian', 20, startY);
                        startY += 10;
                    }
                    
                    // Garis pemisah
                    doc.setDrawColor(200, 200, 200);
                    doc.line(20, startY, 190, startY);
                    startY += 5;
                });
                
                // Footer
                const pageCount = doc.internal.getNumberOfPages();
                for (let i = 1; i <= pageCount; i++) {
                    doc.setPage(i);
                    doc.setFontSize(8);
                    doc.setTextColor(150, 150, 150);
                    doc.text(`Halaman ${i} dari ${pageCount}`, 105, 290, { align: 'center' });
                }
                
                // Simpan file
                const fileName = `Rekap_Lengkap_Hasil_Ujian_${new Date().toISOString().slice(0,10)}.pdf`;
                doc.save(fileName);
                
                // Tampilkan notifikasi
                showNotification('Rekap lengkap berhasil diekspor ke PDF!', 'success');
            } catch (error) {
                console.error('Error exporting rekap:', error);
                showNotification('Gagal mengekspor rekap', 'error');
            }
        }
        
        // Fungsi untuk menampilkan notifikasi
        function showNotification(message, type) {
            // Hapus notifikasi sebelumnya jika ada
            const existingNotification = document.querySelector('.export-notification');
            if (existingNotification) {
                existingNotification.remove();
            }
            
            // Buat elemen notifikasi
            const notification = document.createElement('div');
            notification.className = `export-notification position-fixed ${type === 'success' ? 'bg-success' : 'bg-danger'}`;
            notification.style.cssText = `
                top: 20px;
                right: 20px;
                padding: 12px 20px;
                border-radius: 8px;
                color: white;
                font-weight: 600;
                z-index: 9999;
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                animation: slideIn 0.3s ease;
            `;
            
            // Tambahkan icon berdasarkan jenis notifikasi
            const icon = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';
            notification.innerHTML = `<i class="fas ${icon} me-2"></i> ${message}`;
            
            // Tambahkan ke body
            document.body.appendChild(notification);
            
            // Hapus notifikasi setelah 3 detik
            setTimeout(() => {
                notification.style.animation = 'slideOut 0.3s ease';
                setTimeout(() => notification.remove(), 300);
            }, 3000);
            
            // Tambahkan animasi CSS jika belum ada
            if (!document.querySelector('#notification-styles')) {
                const style = document.createElement('style');
                style.id = 'notification-styles';
                style.textContent = `
                    @keyframes slideIn {
                        from { transform: translateX(100%); opacity: 0; }
                        to { transform: translateX(0); opacity: 1; }
                    }
                    @keyframes slideOut {
                        from { transform: translateX(0); opacity: 1; }
                        to { transform: translateX(100%); opacity: 0; }
                    }
                `;
                document.head.appendChild(style);
            }
        }
    </script>
</body>
</html>