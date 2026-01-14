<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data PSB Lengkap - AQBS Admin</title>
    
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

        /* --- DATA COMPONENTS --- */
        .card-psb { 
            background: white; 
            border-radius: 20px; 
            border: 1px solid #e2e8f0; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.08); 
            overflow: hidden; 
            transition: var(--transition-speed);
        }
        .card-psb:hover {
            box-shadow: 0 6px 20px rgba(0,0,0,0.12);
            transform: translateY(-2px);
        }
        .status-badge { 
            padding: 6px 12px; 
            border-radius: 8px; 
            font-size: 0.7rem; 
            font-weight: 800; 
            text-transform: uppercase; 
            border: 1px solid transparent; 
            display: inline-block;
        }
        
        /* Warna Status Tahapan */
        .st-1 { background: #fef9c3; color: #a16207; border-color: #fef08a; } /* Verifikasi */
        .st-5 { background: #d1fae5; color: #065f46; border-color: #6ee7b7; } /* Diterima */
        .st-6 { background: #e0f2fe; color: #0369a1; border-color: #bae6fd; } /* Daftar Ulang */
        .st-active { background: #dcfce7; color: #166534; border-color: #86efac; } /* Santriwati Aktif */

        .btn-action-group .btn { 
            width: 35px; 
            height: 35px; 
            padding: 0; 
            display: inline-flex; 
            align-items: center; 
            justify-content: center; 
            border-radius: 8px; 
            margin: 0 2px;
            transition: var(--transition-speed);
            border: 1px solid;
        }
        .btn-action-group .btn-info {
            background: #dbeafe;
            color: #3b82f6;
            border-color: #bfdbfe;
        }
        .btn-action-group .btn-info:hover {
            background: #3b82f6;
            color: white;
            transform: translateY(-2px);
        }
        .btn-action-group .btn-success {
            background: #dcfce7;
            color: #22c55e;
            border-color: #bbf7d0;
        }
        .btn-action-group .btn-success:hover {
            background: #22c55e;
            color: white;
            transform: translateY(-2px);
        }

        .form-select-sm {
            border-radius: 8px;
            padding: 4px 8px;
            font-size: 0.85rem;
            border: 1px solid #e2e8f0;
            transition: var(--transition-speed);
        }
        .form-select-sm:focus {
            border-color: var(--blue-info);
            box-shadow: 0 0 0 3px rgba(0, 188, 212, 0.2);
        }

        .btn-filter {
            background: linear-gradient(135deg, var(--orange-primary), #e67100);
            color: white;
            border: none;
            padding: 6px 16px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all var(--transition-speed);
        }
        .btn-filter:hover {
            background: linear-gradient(135deg, #e67100, var(--orange-primary));
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 127, 0, 0.3);
        }

        .btn-export, .btn-print {
            padding: 6px 16px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all var(--transition-speed);
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .btn-export {
            background: #dcfce7;
            color: #22c55e;
            border: 1px solid #bbf7d0;
        }
        .btn-export:hover {
            background: #22c55e;
            color: white;
            transform: translateY(-2px);
        }
        .btn-print {
            background: #dbeafe;
            color: #3b82f6;
            border: 1px solid #bfdbfe;
        }
        .btn-print:hover {
            background: #3b82f6;
            color: white;
            transform: translateY(-2px);
        }

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
            padding: 20px 25px;
        }
        .modal-body {
            padding: 25px;
        }
        .modal-footer {
            background: #f8fafc;
            padding: 20px 25px;
            border-top: 1px solid #e2e8f0;
            border-radius: 0 0 20px 20px;
        }
        .btn-modal-close {
            background: #e2e8f0;
            color: #64748b;
            border: none;
            padding: 8px 20px;
            border-radius: 12px;
            font-weight: 600;
            transition: all var(--transition-speed);
        }
        .btn-modal-close:hover {
            background: #cbd5e1;
            transform: translateY(-2px);
        }
        .btn-modal-print {
            background: linear-gradient(135deg, var(--green-success), #22c55e);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 12px;
            font-weight: 600;
            transition: all var(--transition-speed);
        }
        .btn-modal-print:hover {
            background: linear-gradient(135deg, #22c55e, var(--green-success));
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
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
                width: 100%;
            }
            .top-nav-btn span { 
                display: none; 
            }
            .btn-action-group {
                display: flex;
                justify-content: center;
            }
            .table-responsive {
                overflow-x: auto;
            }
            .filter-card .row > [class*="col"] {
                margin-bottom: 15px;
            }
            .filter-card .row > [class*="col"]:last-child {
                margin-bottom: 0;
            }
            .d-flex.align-items-center.mb-4 {
                flex-direction: column;
                align-items: stretch;
                gap: 15px;
            }
            .no-print {
                display: flex;
                gap: 10px;
            }
            .btn-export, .btn-print {
                flex: 1;
                justify-content: center;
            }
        }
        
        @media (max-width: 576px) {
            .table th, .table td {
                padding: 12px 15px;
                font-size: 0.85rem;
            }
            .btn-action-group .btn {
                width: 30px;
                height: 30px;
                font-size: 0.8rem;
            }
            .status-badge {
                font-size: 0.65rem;
                padding: 4px 8px;
            }
        }

        @media print {
            .navbar-custom, .sidebar, .filter-section, .pagination, .btn-action-group, .no-print, .sidebar-overlay { display: none !important; }
            .main-content { margin: 0; padding: 0; }
            .card-psb { border: none; box-shadow: none; }
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
                    <small class="opacity-75 fw-medium" style="font-size: 0.6rem;">Data Pendaftaran Santriwati</small>
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
                <li><a href="#" class="active">Semua Data</a></li>
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

        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <div>
                <h4 class="fw-bold" style="color: var(--navy-primary);">Manajemen Data Santriwati</h4>
                <p class="text-muted small">Kelola tahapan pendaftaran dari verifikasi hingga santriwati aktif.</p>
            </div>
            <div class="no-print">
                <button class="btn-export"><i class="fas fa-file-excel"></i> Export</button>
                <button class="btn-print" onclick="window.print()"><i class="fas fa-print"></i> Cetak Daftar</button>
            </div>
        </div>

        <div class="filter-card filter-section">
            <div class="row g-3">
                <div class="col-md-2">
                    <label class="small fw-bold mb-1">Tahun Ajaran</label>
                    <select class="form-select form-select-sm">
                        <option>2026/2027</option>
                        <option>2025/2026</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="small fw-bold mb-1">Gelombang</label>
                    <select class="form-select form-select-sm">
                        <option>Gel. 1</option>
                        <option>Gel. 2</option>
                        <option>Gel. 3</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="small fw-bold mb-1">Jenjang</label>
                    <select class="form-select form-select-sm">
                        <option>-- Semua --</option>
                        <option>SMP</option>
                        <option>SMA</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="small fw-bold mb-1">Status Tahapan</label>
                    <select class="form-select form-select-sm">
                        <option>-- Semua Status --</option>
                        <option>Terverifikasi</option>
                        <option>Diterima</option>
                        <option>Daftar Ulang</option>
                        <option>Santriwati Aktif</option>
                        <option>Ditolak</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="small fw-bold mb-1">Pencarian</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Cari Nama / NISN...">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button class="btn-filter w-100">FILTER</button>
                </div>
            </div>
        </div>

        <div class="card-psb">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr class="bg-light">
                            <th class="ps-4">NISN / Nama</th>
                            <th>Info Jenjang</th>
                            <th>Status Terakhir</th>
                            <th>Ubah Tahapan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="ps-4">
                                <div class="fw-bold" style="color: var(--navy-primary);">0081122334</div>
                                <div class="small text-muted">Aisyah Azzahra</div>
                            </td>
                            <td>
                                <div class="small fw-bold">SMP - Mandiri</div>
                                <div class="small text-muted">Gel 1 | 2026/2027</div>
                            </td>
                            <td><span class="status-badge st-5">Diterima</span></td>
                            <td>
                                <select class="form-select form-select-sm d-inline-block w-auto">
                                    <option>Terverifikasi</option>
                                    <option>Lakukan Pembayaran</option>
                                    <option>Lengkapi Formulir</option>
                                    <option>Lakukan Tes</option>
                                    <option selected>Diterima</option>
                                    <option>Daftar Ulang</option>
                                    <option>Santriwati Aktif</option>
                                    <option>Ditolak</option>
                                </select>
                            </td>
                            <td class="text-center btn-action-group">
                                <button class="btn btn-sm btn-info text-white" data-bs-toggle="modal" data-bs-target="#modalDetail"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-success" onclick="window.print()"><i class="fas fa-print"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-4">
                                <div class="fw-bold" style="color: var(--navy-primary);">0099887766</div>
                                <div class="small text-muted">Fatimah Zahro</div>
                            </td>
                            <td>
                                <div class="small fw-bold">SMA - Kader</div>
                                <div class="small text-muted">Gel 1 | 2026/2027</div>
                            </td>
                            <td><span class="status-badge st-6">Daftar Ulang</span></td>
                            <td>
                                <select class="form-select form-select-sm d-inline-block w-auto">
                                    <option>Terverifikasi</option>
                                    <option>Lakukan Pembayaran</option>
                                    <option>Lengkapi Formulir</option>
                                    <option>Lakukan Tes</option>
                                    <option>Diterima</option>
                                    <option selected>Daftar Ulang</option>
                                    <option>Santriwati Aktif</option>
                                    <option>Ditolak</option>
                                </select>
                            </td>
                            <td class="text-center btn-action-group">
                                <button class="btn btn-sm btn-info text-white" data-bs-toggle="modal" data-bs-target="#modalDetail"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-success" onclick="window.print()"><i class="fas fa-print"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-4">
                                <div class="fw-bold" style="color: var(--navy-primary);">0077665544</div>
                                <div class="small text-muted">Nurul Huda</div>
                            </td>
                            <td>
                                <div class="small fw-bold">SMP - Kader</div>
                                <div class="small text-muted">Gel 2 | 2026/2027</div>
                            </td>
                            <td><span class="status-badge st-active">Santriwati Aktif</span></td>
                            <td>
                                <select class="form-select form-select-sm d-inline-block w-auto">
                                    <option>Terverifikasi</option>
                                    <option>Lakukan Pembayaran</option>
                                    <option>Lengkapi Formulir</option>
                                    <option>Lakukan Tes</option>
                                    <option>Diterima</option>
                                    <option>Daftar Ulang</option>
                                    <option selected>Santriwati Aktif</option>
                                    <option>Ditolak</option>
                                </select>
                            </td>
                            <td class="text-center btn-action-group">
                                <button class="btn btn-sm btn-info text-white" data-bs-toggle="modal" data-bs-target="#modalDetail"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-success" onclick="window.print()"><i class="fas fa-print"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <div class="modal fade" id="modalDetail" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Profil Santriwati</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <img src="https://placehold.co/150?text=Foto" class="img-thumbnail rounded-3 mb-3" alt="Foto">
                            <span class="badge bg-info w-100 py-2" style="background: var(--blue-info) !important;">TAHUN AJARAN 2026/2027</span>
                        </div>
                        <div class="col-md-8">
                            <table class="table table-sm table-borderless">
                                <tr><th width="140">NISN</th><td>: 0081122334</td></tr>
                                <tr><th>Nama Lengkap</th><td>: Aisyah Azzahra</td></tr>
                                <tr><th>Jenjang</th><td>: SMP (Madrasah Tsanawiyah)</td></tr>
                                <tr><th>Jalur Daftar</th><td>: Mandiri</td></tr>
                                <tr><th>Tempat Lahir</th><td>: Ponorogo</td></tr>
                                <tr><th>Tanggal Lahir</th><td>: 12 Mei 2013</td></tr>
                                <tr><th>No. HP Ortu</th><td>: 081234455667</td></tr>
                                <tr><th>Status</th><td>: <span class="status-badge st-5">Diterima</span></td></tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-modal-close" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn-modal-print" onclick="window.print()">Cetak Profil</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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
        
        // Add event listener to tahapan dropdowns
        document.querySelectorAll('.form-select').forEach(select => {
            select.addEventListener('change', function() {
                const row = this.closest('tr');
                const statusCell = row.querySelector('td:nth-child(3)');
                const selectedValue = this.value;
                
                // Update status badge based on selection
                let statusClass = '';
                let statusText = '';
                
                if (selectedValue === 'Santriwati Aktif') {
                    statusClass = 'st-active';
                    statusText = 'Santriwati Aktif';
                } else if (selectedValue === 'Diterima') {
                    statusClass = 'st-5';
                    statusText = 'Diterima';
                } else if (selectedValue === 'Daftar Ulang') {
                    statusClass = 'st-6';
                    statusText = 'Daftar Ulang';
                } else if (selectedValue === 'Terverifikasi') {
                    statusClass = 'st-1';
                    statusText = 'Terverifikasi';
                } else {
                    statusClass = 'st-1';
                    statusText = selectedValue;
                }
                
                statusCell.innerHTML = `<span class="status-badge ${statusClass}">${statusText}</span>`;
            });
        });
    </script>
</body>
</html>

