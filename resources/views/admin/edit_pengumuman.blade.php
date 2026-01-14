<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengumuman - Admin PSB AQBS</title>
    
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

        /* --- SETTING COMPONENTS --- */
        .card-setting { 
            background: white; 
            border-radius: 20px; 
            border: 1px solid #e2e8f0; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.08); 
            overflow: hidden; 
            transition: var(--transition-speed);
            margin-bottom: 30px;
        }
        .card-setting:hover {
            box-shadow: 0 6px 20px rgba(0,0,0,0.12);
            transform: translateY(-2px);
        }
        .setting-header { 
            padding: 20px 25px; 
            background: #f8fafc; 
            border-bottom: 1px solid #e2e8f0; 
            font-weight: 800; 
            color: var(--navy-primary);
            font-size: 1.1rem;
        }
        
        .form-label-custom { 
            font-size: 0.8rem; 
            font-weight: 700; 
            color: #64748b; 
            text-transform: uppercase; 
            margin-bottom: 8px; 
            display: block; 
        }

        .btn-save-setting { 
            background: linear-gradient(135deg, var(--orange-primary), #e67100); 
            color: white; 
            border: none; 
            padding: 12px 30px; 
            border-radius: 12px; 
            font-weight: 700; 
            transition: all var(--transition-speed); 
            width: 100%; 
            font-size: 1rem;
            box-shadow: 0 4px 12px rgba(255, 127, 0, 0.3);
        }
        .btn-save-setting:hover { 
            background: linear-gradient(135deg, #e67100, var(--orange-primary)); 
            transform: translateY(-3px); 
            box-shadow: 0 6px 20px rgba(255, 127, 0, 0.4);
        }
        
        .btn-reset-default {
            background: #e2e8f0;
            color: #64748b;
            border: none;
            padding: 12px 30px;
            border-radius: 12px;
            font-weight: 700;
            transition: all var(--transition-speed);
            width: 100%;
            font-size: 1rem;
        }
        .btn-reset-default:hover {
            background: #cbd5e1;
            transform: translateY(-2px);
        }

        .form-control, .form-select, .form-control:focus, .form-select:focus {
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

        .textarea-custom {
            min-height: 120px;
            resize: vertical;
        }

        /* Announcement styling */
        .announcement-item {
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            background: #f8fafc;
        }
        .ann-date-inputs {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }
        .ann-date-inputs input {
            flex: 1;
        }

        /* Status badges */
        .status-badge {
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 0.7rem;
            font-weight: 800;
            text-transform: uppercase;
            border: 1px solid transparent;
            display: inline-block;
        }
        .status-active {
            background: #dcfce7;
            color: #166534;
            border-color: #bbf7d0;
        }
        .status-draft {
            background: #fef9c3;
            color: #a16207;
            border-color: #fef08a;
        }
        .status-scheduled {
            background: #dbeafe;
            color: #1e40af;
            border-color: #bfdbfe;
        }

        /* Preview section */
        .preview-announcement-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            height: 100%;
            border: 2px solid #e2e8f0;
        }
        .preview-header {
            border-bottom: 2px solid var(--orange-primary);
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        .preview-title {
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--navy-primary);
            margin-bottom: 10px;
        }
        .preview-meta {
            font-size: 0.8rem;
            color: #64748b;
            margin-bottom: 15px;
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        .preview-content {
            line-height: 1.6;
            color: #334155;
            margin-bottom: 20px;
            font-size: 0.95rem;
        }
        .preview-footer {
            background: #f8fafc;
            padding: 15px;
            border-radius: 12px;
            font-size: 0.85rem;
            color: #64748b;
            text-align: center;
        }

        /* Existing announcement list */
        .existing-announcements {
            background: white;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            margin-bottom: 30px;
        }
        .announcement-list-item {
            padding: 15px;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            margin-bottom: 15px;
            background: #f8fafc;
            transition: all 0.3s;
        }
        .announcement-list-item:hover {
            background: #f1f5f9;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .announcement-list-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .announcement-list-title {
            font-weight: 700;
            color: var(--navy-primary);
            font-size: 1.1rem;
            margin-bottom: 5px;
        }
        .announcement-tag {
            font-size: 0.7rem;
            font-weight: 600;
            padding: 4px 8px;
            border-radius: 6px;
            background: var(--blue-info);
            color: white;
            display: inline-block;
        }
        .announcement-content-preview {
            color: #475569;
            margin-bottom: 10px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            font-size: 0.9rem;
        }
        .announcement-actions {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }
        .btn-edit-announcement {
            background: #e2e8f0;
            color: #64748b;
            border: none;
            padding: 6px 12px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.8rem;
            transition: all var(--transition-speed);
        }
        .btn-edit-announcement:hover {
            background: #cbd5e1;
            transform: scale(1.05);
        }
        .btn-delete-announcement {
            background: #fee2e2;
            color: #ef4444;
            border: none;
            padding: 6px 12px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.8rem;
            transition: all var(--transition-speed);
        }
        .btn-delete-announcement:hover {
            background: #ef4444;
            color: white;
            transform: scale(1.05);
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
            .row > [class*="col-"] {
                margin-bottom: 20px;
            }
            .row > [class*="col-"]:last-child {
                margin-bottom: 0;
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
            .ann-date-inputs {
                flex-direction: column;
            }
        }
        
        @media (max-width: 576px) {
            .setting-header {
                font-size: 1rem;
                padding: 15px 20px;
            }
            .form-label-custom {
                font-size: 0.75rem;
            }
            .form-control, .form-select {
                font-size: 0.9rem;
                padding: 10px 14px;
            }
            .btn-save-setting, .btn-reset-default {
                font-size: 0.95rem;
                padding: 10px 25px;
            }
            .preview-announcement-card {
                padding: 20px;
            }
            .preview-title {
                font-size: 1.1rem;
                margin-bottom: 8px;
            }
            .preview-meta {
                font-size: 0.75rem;
                margin-bottom: 12px;
            }
            .announcement-actions {
                flex-direction: column;
            }
            .btn-edit-announcement, .btn-delete-announcement {
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
                    <small class="opacity-75 fw-medium" style="font-size: 0.6rem;">Edit Pengumuman</small>
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
            <a href="#" class="menu-btn"><i class="fas fa-file-edit"></i>Siapkan Ujian</a>
            <a href="#" class="menu-btn active-dashboard"><i class="fas fa-bullhorn"></i>Edit Pengumuman</a>
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
            <a href="#" class="menu-btn"><i class="fas fa-user-lock"></i>Setting Tampilan</a>
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
            <h4 class="fw-bold" style="color: var(--navy-primary);">Kelola Pengumuman</h4>
            <p class="text-muted small">Buat, edit, dan hapus pengumuman yang tampil di beranda dan halaman user.</p>
        </div>

        <form id="announcementForm">
            <div class="row g-4">
                <div class="col-lg-8">
                    <!-- Form Pengumuman Baru -->
                    <div class="card-setting">
                        <div class="setting-header">FORM PENGUMUMAN BARU</div>
                        <div class="card-body p-4">
                            <input type="hidden" id="announcementId">
                            
                            <div class="mb-4">
                                <label class="form-label-custom">Judul Pengumuman</label>
                                <input type="text" id="announcementTitle" class="form-control" placeholder="Masukkan judul pengumuman..." required>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label-custom">Tag / Kategori</label>
                                    <select id="announcementTag" class="form-select" required>
                                        <option value="">-- Pilih Tag --</option>
                                        <option value="INFO TERBARU">INFO TERBARU</option>
                                        <option value="PENGUMUMAN HASIL">PENGUMUMAN HASIL</option>
                                        <option value="JADWAL TES">JADWAL TES</option>
                                        <option value="AKADEMIK">AKADEMIK</option>
                                        <option value="PENTING">PENTING</option>
                                        <option value="INFORMASI UMUM">INFORMASI UMUM</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label-custom">Status</label>
                                    <select class="form-select" id="statusSelect" required>
                                        <option value="draft">Draft</option>
                                        <option value="scheduled">Terjadwal</option>
                                        <option value="active">Aktif</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label class="form-label-custom">Tanggal (Hari)</label>
                                    <input type="number" id="announcementDay" class="form-control" min="1" max="31" placeholder="01" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label-custom">Bulan</label>
                                    <select id="announcementMonth" class="form-select" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="Jan">Januari</option>
                                        <option value="Feb">Februari</option>
                                        <option value="Mar">Maret</option>
                                        <option value="Apr">April</option>
                                        <option value="Mei">Mei</option>
                                        <option value="Jun">Juni</option>
                                        <option value="Jul">Juli</option>
                                        <option value="Agu">Agustus</option>
                                        <option value="Sep">September</option>
                                        <option value="Okt">Oktober</option>
                                        <option value="Nov">November</option>
                                        <option value="Des">Desember</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label-custom">Tahun</label>
                                    <input type="number" id="announcementYear" class="form-control" min="2024" max="2030" value="2026" required>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label-custom">Tanggal Mulai Tampil</label>
                                    <input type="date" id="startDate" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label-custom">Tanggal Berakhir Tampil</label>
                                    <input type="date" id="endDate" class="form-control">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label-custom">Tampilkan di</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="showOnHomepage" checked>
                                            <label class="form-check-label" for="showOnHomepage">
                                                Halaman Beranda
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="showOnUserPage" checked>
                                            <label class="form-check-label" for="showOnUserPage">
                                                Halaman User
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label-custom">Deskripsi Singkat</label>
                                <textarea id="announcementDescription" class="form-control textarea-custom" placeholder="Tulis deskripsi singkat pengumuman..." rows="3" required></textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label-custom">Konten Lengkap Pengumuman</label>
                                <textarea id="announcementContent" class="form-control textarea-custom" placeholder="Tulis isi lengkap pengumuman di sini..." rows="6" required></textarea>
                            </div>

                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <button type="button" class="btn-reset-default" onclick="clearForm()">
                                        <i class="fas fa-times me-2"></i> BATAL / RESET
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn-save-setting">
                                        <i class="fas fa-save me-2"></i> SIMPAN PENGUMUMAN
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Daftar Pengumuman Existing -->
                    <div class="existing-announcements">
                        <h5 class="fw-bold mb-4" style="color: var(--navy-primary);"><i class="fas fa-list me-2"></i>Daftar Pengumuman</h5>
                        <div id="announcementsList">
                            <!-- Pengumuman akan ditampilkan di sini -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Pratinjau Pengumuman -->
                    <div class="preview-announcement-card">
                        <div class="preview-header">
                            <h5 class="preview-title">Pratinjau Pengumuman</h5>
                            <div class="preview-meta">
                                <div><strong>Status:</strong> <span id="previewStatus" class="status-draft">Draft</span></div>
                                <div><strong>Tanggal:</strong> <span id="previewDate">-</span></div>
                                <div><strong>Tag:</strong> <span id="previewTag">-</span></div>
                                <div><strong>Tampil di:</strong> <span id="previewDisplay">Beranda, User</span></div>
                            </div>
                        </div>
                        <div class="preview-content" id="previewContent">
                            Isi pengumuman akan muncul di sini...
                        </div>
                        <div class="preview-footer">
                            <i class="fas fa-bullhorn me-2"></i> AQBS Ponorogo - PSB Online 2026
                        </div>
                    </div>

                    <!-- Petunjuk Penggunaan -->
                    <div class="card-setting mt-4">
                        <div class="card-body p-4">
                            <h6 class="fw-bold mb-3" style="color: var(--navy-primary);"><i class="fas fa-info-circle me-2"></i>Petunjuk Penggunaan</h6>
                            <ul class="small" style="color: #64748b;">
                                <li><strong>Draft</strong> - Tidak ditampilkan ke publik</li>
                                <li><strong>Terjadwal</strong> - Tampil sesuai tanggal mulai/berakhir</li>
                                <li><strong>Aktif</strong> - Langsung tampil di beranda/user</li>
                                <li>Pilih lokasi tampilan sesuai kebutuhan</li>
                                <li>Gunakan tag untuk mengkategorikan pengumuman</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>

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

        // Status change handler
        document.getElementById('statusSelect').addEventListener('change', function() {
            const status = this.value;
            const previewStatus = document.getElementById('previewStatus');
            
            // Remove all status classes
            previewStatus.className = 'status-badge';
            
            if (status === 'active') {
                previewStatus.classList.add('status-active');
                previewStatus.textContent = 'Aktif';
            } else if (status === 'scheduled') {
                previewStatus.classList.add('status-scheduled');
                previewStatus.textContent = 'Terjadwal';
            } else {
                previewStatus.classList.add('status-draft');
                previewStatus.textContent = 'Draft';
            }
        });

        // Preview function
        function previewAnnouncement() {
            const title = document.getElementById('announcementTitle').value;
            const description = document.getElementById('announcementDescription').value;
            const content = document.getElementById('announcementContent').value;
            const tag = document.getElementById('announcementTag').value;
            const status = document.getElementById('statusSelect').value;
            const day = document.getElementById('announcementDay').value;
            const month = document.getElementById('announcementMonth').value;
            const year = document.getElementById('announcementYear').value;
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
            const showOnHomepage = document.getElementById('showOnHomepage').checked;
            const showOnUserPage = document.getElementById('showOnUserPage').checked;
            
            if (title) {
                document.querySelector('.preview-title').textContent = title;
            }
            
            // Use description if available, otherwise use content
            if (description) {
                document.getElementById('previewContent').innerHTML = description.replace(/\n/g, '<br>');
            } else if (content) {
                document.getElementById('previewContent').innerHTML = content.replace(/\n/g, '<br>');
            }
            
            document.getElementById('previewTag').textContent = tag || '-';
            
            if (day && month && year) {
                document.getElementById('previewDate').textContent = `${day} ${month} ${year}`;
            } else {
                document.getElementById('previewDate').textContent = '-';
            }
            
            let displayText = '';
            if (showOnHomepage && showOnUserPage) {
                displayText = 'Beranda, User';
            } else if (showOnHomepage) {
                displayText = 'Beranda';
            } else if (showOnUserPage) {
                displayText = 'Halaman User';
            } else {
                displayText = 'Tidak Ditampilkan';
            }
            document.getElementById('previewDisplay').textContent = displayText;
        }

        // Load announcements from localStorage
        function loadAnnouncements() {
            return JSON.parse(localStorage.getItem('announcements') || '[]');
        }

        // Save announcements to localStorage
        function saveAnnouncements(announcements) {
            localStorage.setItem('announcements', JSON.stringify(announcements));
        }

        // Add or update announcement
        function saveAnnouncement() {
            const id = document.getElementById('announcementId').value || Date.now().toString();
            const title = document.getElementById('announcementTitle').value;
            const tag = document.getElementById('announcementTag').value;
            const status = document.getElementById('statusSelect').value;
            const day = document.getElementById('announcementDay').value;
            const month = document.getElementById('announcementMonth').value;
            const year = document.getElementById('announcementYear').value;
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
            const description = document.getElementById('announcementDescription').value;
            const content = document.getElementById('announcementContent').value;
            const showOnHomepage = document.getElementById('showOnHomepage').checked;
            const showOnUserPage = document.getElementById('showOnUserPage').checked;
            
            if (!title || !tag || !description) {
                alert('⚠️ Judul, tag, dan deskripsi singkat wajib diisi!');
                return false;
            }
            
            if (!day || !month || !year) {
                alert('⚠️ Tanggal pengumuman (hari, bulan, tahun) wajib diisi!');
                return false;
            }
            
            if (status !== 'draft' && (!startDate || !endDate)) {
                alert('⚠️ Untuk pengumuman terjadwal/aktif, tanggal mulai dan berakhir tampil wajib diisi!');
                return false;
            }
            
            const announcement = {
                id,
                title,
                tag,
                status,
                day,
                month,
                year,
                startDate: status !== 'draft' ? startDate : null,
                endDate: status !== 'draft' ? endDate : null,
                description,
                content,
                showOnHomepage,
                showOnUserPage,
                createdAt: new Date().toISOString()
            };
            
            let announcements = loadAnnouncements();
            
            // Update if exists, otherwise add new
            const existingIndex = announcements.findIndex(a => a.id === id);
            if (existingIndex > -1) {
                announcements[existingIndex] = announcement;
            } else {
                announcements.unshift(announcement);
            }
            
            saveAnnouncements(announcements);
            renderAnnouncementsList();
            clearForm();
            alert(status === 'active' ? '✅ Pengumuman berhasil dipublikasikan!' : '✅ Pengumuman berhasil disimpan!');
            return true;
        }

        // Delete announcement
        function deleteAnnouncement(id) {
            if (confirm('Apakah Anda yakin ingin menghapus pengumuman ini?')) {
                let announcements = loadAnnouncements();
                announcements = announcements.filter(a => a.id !== id);
                saveAnnouncements(announcements);
                renderAnnouncementsList();
                alert('✅ Pengumuman berhasil dihapus!');
            }
        }

        // Edit announcement
        function editAnnouncement(id) {
            const announcements = loadAnnouncements();
            const announcement = announcements.find(a => a.id === id);
            
            if (announcement) {
                document.getElementById('announcementId').value = announcement.id;
                document.getElementById('announcementTitle').value = announcement.title;
                document.getElementById('announcementTag').value = announcement.tag;
                document.getElementById('statusSelect').value = announcement.status;
                document.getElementById('announcementDay').value = announcement.day;
                document.getElementById('announcementMonth').value = announcement.month;
                document.getElementById('announcementYear').value = announcement.year;
                document.getElementById('startDate').value = announcement.startDate || '';
                document.getElementById('endDate').value = announcement.endDate || '';
                document.getElementById('announcementDescription').value = announcement.description;
                document.getElementById('announcementContent').value = announcement.content;
                document.getElementById('showOnHomepage').checked = announcement.showOnHomepage;
                document.getElementById('showOnUserPage').checked = announcement.showOnUserPage;
                
                // Update preview
                previewAnnouncement();
                
                // Scroll to form
                document.querySelector('.card-setting').scrollIntoView({ behavior: 'smooth' });
            }
        }

        // Clear form
        function clearForm() {
            document.getElementById('announcementForm').reset();
            document.getElementById('announcementId').value = '';
            document.getElementById('announcementYear').value = '2026';
            document.getElementById('previewContent').innerHTML = 'Isi pengumuman akan muncul di sini...';
            document.getElementById('previewStatus').className = 'status-badge status-draft';
            document.getElementById('previewStatus').textContent = 'Draft';
            document.getElementById('previewDate').textContent = '-';
            document.getElementById('previewTag').textContent = '-';
            document.getElementById('previewDisplay').textContent = 'Beranda, User';
        }

        // Render announcements list
        function renderAnnouncementsList() {
            const announcements = loadAnnouncements();
            const container = document.getElementById('announcementsList');
            
            if (announcements.length === 0) {
                container.innerHTML = '<p class="text-muted text-center py-4">Belum ada pengumuman yang dibuat.</p>';
                return;
            }
            
            container.innerHTML = '';
            
            announcements.forEach(announcement => {
                const statusText = announcement.status === 'active' ? 'Aktif' : 
                                 announcement.status === 'scheduled' ? 'Terjadwal' : 'Draft';
                const statusClass = announcement.status === 'active' ? 'status-active' : 
                                  announcement.status === 'scheduled' ? 'status-scheduled' : 'status-draft';
                
                const displayText = [];
                if (announcement.showOnHomepage) displayText.push('Beranda');
                if (announcement.showOnUserPage) displayText.push('User');
                const displayInfo = displayText.length > 0 ? displayText.join(', ') : 'Tidak Ditampilkan';
                
                const dateText = announcement.startDate && announcement.endDate 
                    ? `${new Date(announcement.startDate).toLocaleDateString('id-ID')} - ${new Date(announcement.endDate).toLocaleDateString('id-ID')}`
                    : `${announcement.day} ${announcement.month} ${announcement.year}`;
                
                const element = document.createElement('div');
                element.className = 'announcement-list-item';
                element.innerHTML = `
                    <div class="announcement-list-header">
                        <div>
                            <div class="announcement-list-title">${announcement.title}</div>
                            <span class="announcement-tag mt-1">${announcement.tag}</span>
                            <span class="status-badge ${statusClass} ms-2">${statusText}</span>
                        </div>
                    </div>
                    <div class="announcement-content-preview">${announcement.description}</div>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            <strong>Tanggal:</strong> ${dateText}<br>
                            <strong>Tampil di:</strong> ${displayInfo}
                        </small>
                        <div class="announcement-actions">
                            <button class="btn-edit-announcement" onclick="editAnnouncement('${announcement.id}')">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="btn-delete-announcement" onclick="deleteAnnouncement('${announcement.id}')">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </div>
                    </div>
                `;
                container.appendChild(element);
            });
        }

        // Form submit handler
        document.getElementById('announcementForm').addEventListener('submit', function(e) {
            e.preventDefault();
            saveAnnouncement();
        });

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            renderAnnouncementsList();
            
            // Auto-preview on input change
            const inputs = document.querySelectorAll('#announcementTitle, #announcementDescription, #announcementContent, #announcementTag, #statusSelect, #announcementDay, #announcementMonth, #announcementYear, #startDate, #endDate, #showOnHomepage, #showOnUserPage');
            inputs.forEach(input => {
                input.addEventListener('input', previewAnnouncement);
            });
            
            // Initial preview
            previewAnnouncement();
        });
    </script>
</body>
</html>