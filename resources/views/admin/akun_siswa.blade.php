<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun Siswa - PSB AQBS</title>
    
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

        /* --- STUDENT ACCOUNT STYLES --- */
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

        .form-label-custom { 
            font-size: 0.8rem; 
            font-weight: 700; 
            color: #64748b; 
            text-transform: uppercase; 
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

        .btn-action {
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 0.85rem;
            transition: all var(--transition-speed);
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .btn-edit {
            background: #dbeafe;
            color: #1e40af;
            border: 1px solid #bfdbfe;
        }
        .btn-edit:hover {
            background: #1e40af;
            color: white;
            transform: translateY(-2px);
        }
        .btn-reset {
            background: #fef9c3;
            color: #a16207;
            border: 1px solid #fef08a;
        }
        .btn-reset:hover {
            background: #a16207;
            color: white;
            transform: translateY(-2px);
        }
        .btn-delete {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }
        .btn-delete:hover {
            background: #991b1b;
            color: white;
            transform: translateY(-2px);
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 700;
            display: inline-block;
        }
        .status-active {
            background: #dcfce7;
            color: #166534;
        }
        .status-pending {
            background: #fef9c3;
            color: #a16207;
        }
        .status-inactive {
            background: #fee2e2;
            color: #991b1b;
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

        /* Table Styles */
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
            font-family: monospace;
        }
        .password-value {
            background: #f8fafc;
            padding: 4px 8px;
            border-radius: 4px;
            border: 1px solid #e2e8f0;
            font-weight: 600;
            color: var(--navy-primary);
        }

        /* Pagination Styles */
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
            .table-responsive {
                overflow-x: auto;
            }
            .table {
                min-width: 800px;
            }
            .table th, .table td {
                white-space: nowrap;
                padding: 12px 15px;
                font-size: 0.85rem;
            }
            .password-value {
                font-size: 0.8rem;
                padding: 3px 6px;
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
                padding: 10px 12px;
                font-size: 0.8rem;
            }
            .btn-action {
                font-size: 0.8rem;
                padding: 6px 12px;
            }
            .status-badge {
                font-size: 0.7rem;
                padding: 4px 8px;
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
            .password-value {
                font-size: 0.75rem;
                padding: 2px 5px;
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
                    <small class="opacity-75 fw-medium" style="font-size: 0.6rem;">Akun Siswa</small>
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
            <a href="#" class="menu-btn"><i class="fas fa-clipboard-list"></i>Hasil Ujian</a>
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
            <a href="#" class="menu-btn active-dashboard"><i class="fas fa-users-cog"></i>Akun Siswa</a>
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
            <h4 class="fw-bold" style="color: var(--navy-primary);">Manajemen Akun Santriwati</h4>
            <p class="text-muted small">Kelola akun seluruh calon santriwati yang terdaftar dalam sistem PSB AQBS Ponorogo.</p>
        </div>

        <!-- Filter Section -->
        <div class="filter-card">
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="small fw-bold mb-1">Tahun Ajaran</label>
                    <select class="form-select form-select-sm" id="filterTahun">
                        <option>Semua Tahun</option>
                        <option selected>2026/2027</option>
                        <option>2025/2026</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="small fw-bold mb-1">Gelombang</label>
                    <select class="form-select form-select-sm" id="filterGelombang">
                        <option>Semua Gelombang</option>
                        <option>Gelombang 1</option>
                        <option selected>Gelombang 2</option>
                        <option>Gelombang 3</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="small fw-bold mb-1">Jenjang</label>
                    <select class="form-select form-select-sm" id="filterJenjang">
                        <option>Semua Jenjang</option>
                        <option>SMP</option>
                        <option>SMA</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="small fw-bold mb-1">Status Akun</label>
                    <select class="form-select form-select-sm" id="filterStatus">
                        <option>Semua Status</option>
                        <option>Aktif</option>
                        <option>Menunggu Verifikasi</option>
                        <option>Tidak Aktif</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <input type="text" class="form-control form-control-sm" id="searchInput" placeholder="Cari Nama atau NISN...">
                </div>
                <div class="col-md-6 d-flex gap-2">
                    <button class="btn btn-outline-secondary btn-sm" onclick="resetFilters()">
                        <i class="fas fa-undo me-1"></i> Reset
                    </button>
                    <button class="btn btn-primary btn-sm" onclick="applyFilters()">
                        <i class="fas fa-search me-1"></i> Terapkan Filter
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
                Menampilkan 1-5 dari 5 total akun
            </div>
            
            <div class="export-buttons">
                <button class="btn-export btn-excel" onclick="exportToExcel()">
                    <i class="fas fa-file-excel"></i> Export Excel
                </button>
                <button class="btn-export btn-pdf" onclick="exportToPDF()">
                    <i class="fas fa-file-pdf"></i> Export PDF
                </button>
            </div>
        </div>

        <!-- Student List Table -->
        <div class="card-custom">
            <div class="card-header bg-white border-bottom-0 p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0" style="color: var(--navy-primary);">
                        <i class="fas fa-users me-2"></i>Daftar Akun Santriwati
                    </h5>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0" id="studentsTable">
                        <thead class="bg-light">
                            <tr>
                                <th>#</th>
                                <th>Username (NISN)</th>
                                <th>Nama Santriwati</th>
                                <th>Password</th>
                                <th>Jenjang</th>
                                <th>Tahun Ajaran</th>
                                <th>Gelombang</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="studentsTableBody">
                            <!-- Data akan diisi oleh JavaScript -->
                        </tbody>
                    </table>
                </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Data contoh akun siswa (biasanya dari database)
        const studentsData = [
            { id: 1, nisn: '0081122334', name: 'ANNISA RAHMAWATI', password: 'AnnisaRahma2026!', jenjang: 'SMP', tahun: '2026/2027', gelombang: 'Gelombang 2', status: 'Aktif' },
            { id: 2, nisn: '0099228833', name: 'SITI FATIMAH', password: 'SitiFatimah2026!', jenjang: 'SMA', tahun: '2026/2027', gelombang: 'Gelombang 2', status: 'Menunggu Verifikasi' },
            { id: 3, nisn: '0077665544', name: 'NURUL HUDA', password: 'NurulHuda2026!', jenjang: 'SMP', tahun: '2026/2027', gelombang: 'Gelombang 1', status: 'Aktif' },
            { id: 4, nisn: '0066554433', name: 'FATIMAH ZAHRA', password: 'FatimahZahra2026!', jenjang: 'SMA', tahun: '2025/2026', gelombang: 'Gelombang 3', status: 'Tidak Aktif' },
            { id: 5, nisn: '0055443322', name: 'AINUN NAIM', password: 'AinunNaim2026!', jenjang: 'SMP', tahun: '2026/2027', gelombang: 'Gelombang 2', status: 'Aktif' },
            { id: 6, nisn: '0044332211', name: 'AZIZAH PUTRI', password: 'AzizahPutri2026!', jenjang: 'SMP', tahun: '2026/2027', gelombang: 'Gelombang 1', status: 'Aktif' },
            { id: 7, nisn: '0033221100', name: 'SALMA ALYA', password: 'SalmaAlya2026!', jenjang: 'SMA', tahun: '2026/2027', gelombang: 'Gelombang 2', status: 'Menunggu Verifikasi' },
            { id: 8, nisn: '0022110099', name: 'KHOIRUNNISA', password: 'Khoirunnisa2026!', jenjang: 'SMP', tahun: '2025/2026', gelombang: 'Gelombang 3', status: 'Aktif' },
            { id: 9, nisn: '0011009988', name: 'ZAHRA AMANDA', password: 'ZahraAmanda2026!', jenjang: 'SMA', tahun: '2026/2027', gelombang: 'Gelombang 2', status: 'Tidak Aktif' },
            { id: 10, nisn: '0009998877', name: 'DIAN ANGGRAINI', password: 'DianAnggraini2026!', jenjang: 'SMP', tahun: '2026/2027', gelombang: 'Gelombang 1', status: 'Aktif' },
            { id: 11, nisn: '0008887766', name: 'REZA ANDINI', password: 'RezaAndini2026!', jenjang: 'SMA', tahun: '2026/2027', gelombang: 'Gelombang 2', status: 'Aktif' },
            { id: 12, nisn: '0007776655', name: 'FITRIANI SARI', password: 'FitrianiSari2026!', jenjang: 'SMP', tahun: '2025/2026', gelombang: 'Gelombang 3', status: 'Menunggu Verifikasi' },
            { id: 13, nisn: '0006665544', name: 'SANTI DEWI', password: 'SantiDewi2026!', jenjang: 'SMA', tahun: '2026/2027', gelombang: 'Gelombang 1', status: 'Aktif' },
            { id: 14, nisn: '0005554433', name: 'YULIANTI', password: 'Yulianti2026!', jenjang: 'SMP', tahun: '2026/2027', gelombang: 'Gelombang 2', status: 'Aktif' },
            { id: 15, nisn: '0004443322', name: 'RETNO WATI', password: 'RetnoWati2026!', jenjang: 'SMA', tahun: '2026/2027', gelombang: 'Gelombang 3', status: 'Tidak Aktif' }
        ];

        // Variabel global untuk manajemen state
        let currentPage = 1;
        let recordsPerPage = 50;
        let filteredData = [...studentsData];

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
            const filterInputs = document.querySelectorAll('#filterTahun, #filterGelombang, #filterJenjang, #filterStatus, #searchInput');
            filterInputs.forEach(input => {
                input.addEventListener('change', applyFilters);
                if (input.id === 'searchInput') {
                    input.addEventListener('input', applyFilters);
                }
            });

            // Render data awal
            renderTable();
        });

        // Fungsi untuk merender tabel dengan pagination
        function renderTable() {
            const tableBody = document.getElementById('studentsTableBody');
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
                    <td>${actualIndex}</td>
                    <td>${student.nisn}</td>
                    <td>${student.name}</td>
                    <td><span class="password-value">${student.password}</span></td>
                    <td>${student.jenjang}</td>
                    <td>${student.tahun}</td>
                    <td>${student.gelombang}</td>
                    <td><span class="status-badge ${statusClass}">${student.status}</span></td>
                    <td class="text-center">
                        <button class="btn-edit btn-action" onclick="editStudent('${student.nisn}')">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn-reset btn-action" onclick="resetPassword('${student.nisn}')">
                            <i class="fas fa-key"></i>
                        </button>
                        <button class="btn-delete btn-action" onclick="deleteStudent('${student.nisn}')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                `;
                tableBody.appendChild(row);
            });
            
            // Update info halaman
            if (totalRecords === 0) {
                pageInfoElement.textContent = 'Tidak ada data yang ditemukan';
            } else if (recordsPerPage === 'all') {
                pageInfoElement.textContent = `Menampilkan semua ${totalRecords} akun`;
            } else {
                pageInfoElement.textContent = `Menampilkan ${startIndex + 1}-${endIndex} dari ${totalRecords} total akun`;
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
                case 'Aktif': return 'status-active';
                case 'Menunggu Verifikasi': return 'status-pending';
                case 'Tidak Aktif': return 'status-inactive';
                default: return '';
            }
        }

        // Filter functions
        function applyFilters() {
            const tahun = document.getElementById('filterTahun').value;
            const gelombang = document.getElementById('filterGelombang').value;
            const jenjang = document.getElementById('filterJenjang').value;
            const status = document.getElementById('filterStatus').value;
            const search = document.getElementById('searchInput').value.toLowerCase();
            
            filteredData = studentsData.filter(student => {
                const matchesTahun = tahun === 'Semua Tahun' || student.tahun === tahun;
                const matchesGelombang = gelombang === 'Semua Gelombang' || student.gelombang === gelombang;
                const matchesJenjang = jenjang === 'Semua Jenjang' || student.jenjang === jenjang;
                const matchesStatus = status === 'Semua Status' || student.status === status;
                const matchesSearch = search === '' || 
                                    student.nisn.toLowerCase().includes(search) || 
                                    student.name.toLowerCase().includes(search);
                
                return matchesTahun && matchesGelombang && matchesJenjang && matchesStatus && matchesSearch;
            });
            
            currentPage = 1;
            renderTable();
        }

        function resetFilters() {
            document.getElementById('filterTahun').value = '2026/2027';
            document.getElementById('filterGelombang').value = 'Gelombang 2';
            document.getElementById('filterJenjang').value = 'Semua Jenjang';
            document.getElementById('filterStatus').value = 'Semua Status';
            document.getElementById('searchInput').value = '';
            applyFilters();
        }

        // Action functions
        function editStudent(nisn) {
            alert(`Mengedit akun santriwati dengan NISN: ${nisn}`);
            // In real application, this would open a modal or navigate to edit page
        }

        function resetPassword(nisn) {
            if (confirm(`Apakah Anda yakin ingin mereset password untuk santriwati dengan NISN: ${nisn}?`)) {
                alert(`Password untuk NISN ${nisn} telah direset!`);
                // In real application, this would call an API endpoint
            }
        }

        function deleteStudent(nisn) {
            if (confirm(`Apakah Anda yakin ingin menghapus akun santriwati dengan NISN: ${nisn}? Tindakan ini tidak dapat dikembalikan!`)) {
                alert(`Akun santriwati dengan NISN ${nisn} telah dihapus!`);
                // In real application, this would call an API endpoint to delete
            }
        }

        // Export to Excel function
        function exportToExcel() {
            try {
                // Siapkan data untuk export
                const exportData = filteredData.map(student => ({
                    'No': student.id,
                    'Username (NISN)': student.nisn,
                    'Nama Santriwati': student.name,
                    'Password': student.password,
                    'Jenjang': student.jenjang,
                    'Tahun Ajaran': student.tahun,
                    'Gelombang': student.gelombang,
                    'Status': student.status
                }));
                
                // Buat worksheet
                const ws = XLSX.utils.json_to_sheet(exportData);
                
                // Buat workbook
                const wb = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(wb, ws, "Akun Santriwati");
                
                // Generate file name dengan timestamp
                const fileName = `Akun_Santriwati_PSB_AQBS_${new Date().toISOString().slice(0,10)}.xlsx`;
                
                // Download file
                XLSX.writeFile(wb, fileName);
                
                // Tampilkan notifikasi
                showNotification('Data berhasil diekspor ke Excel!', 'success');
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
                doc.text('DAFTAR AKUN SANTRIWATI PSB AQBS', 105, 15, { align: 'center' });
                
                // Sub judul
                doc.setFontSize(11);
                doc.setTextColor(100, 100, 100);
                doc.text(`Tahun Ajaran: 2026/2027 | Gelombang: 2 | Tanggal Cetak: ${new Date().toLocaleDateString('id-ID')}`, 105, 22, { align: 'center' });
                
                // Siapkan data untuk tabel PDF
                const columns = [
                    { header: 'No', dataKey: 'no' },
                    { header: 'Username (NISN)', dataKey: 'nisn' },
                    { header: 'Nama Santriwati', dataKey: 'name' },
                    { header: 'Jenjang', dataKey: 'jenjang' },
                    { header: 'Tahun Ajaran', dataKey: 'tahun' },
                    { header: 'Gelombang', dataKey: 'gelombang' },
                    { header: 'Status', dataKey: 'status' }
                ];
                
                const rows = filteredData.map((student, index) => ({
                    no: index + 1,
                    nisn: student.nisn,
                    name: student.name,
                    jenjang: student.jenjang,
                    tahun: student.tahun,
                    gelombang: student.gelombang,
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
                const fileName = `Akun_Santriwati_PSB_AQBS_${new Date().toISOString().slice(0,10)}.pdf`;
                doc.save(fileName);
                
                // Tampilkan notifikasi
                showNotification('Data berhasil diekspor ke PDF!', 'success');
            } catch (error) {
                console.error('Error exporting to PDF:', error);
                showNotification('Gagal mengekspor data ke PDF', 'error');
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