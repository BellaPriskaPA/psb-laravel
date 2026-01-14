<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting Tampilan - Admin PSB AQBS</title>
    
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

        .preview-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            height: 100%;
            display: flex;
            flex-direction: column;
            text-align: center;
        }
        .preview-card i {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: var(--orange-primary);
        }
        .preview-card h5 {
            font-weight: 800;
            color: var(--navy-primary);
            margin-bottom: 15px;
            font-size: 1.2rem;
        }
        .preview-card p {
            color: #64748b;
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 20px;
            flex-grow: 1;
        }
        .preview-card hr {
            border-color: #e2e8f0;
            margin: 20px 0;
        }
        .btn-preview {
            background: var(--navy-primary);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 50px;
            font-weight: 600;
            transition: all var(--transition-speed);
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            width: 100%;
        }
        .btn-preview:hover {
            background: var(--navy-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 43, 73, 0.3);
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

        .image-preview-container {
            border: 2px dashed #e2e8f0;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            background: #f8fafc;
            margin-top: 10px;
        }
        .image-preview {
            max-width: 100%;
            max-height: 200px;
            border-radius: 8px;
            display: none;
        }
        .image-placeholder {
            color: #94a3b8;
            font-size: 0.9rem;
            margin: 20px 0;
        }

        .file-upload-area {
            border: 2px dashed #cbd5e1;
            border-radius: 12px;
            padding: 30px 20px;
            text-align: center;
            background: #f8fafc;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
        }
        .file-upload-area:hover {
            border-color: var(--blue-info);
            background: #f0f9ff;
        }
        .file-upload-area i {
            font-size: 2.5rem;
            color: var(--blue-info);
            margin-bottom: 15px;
        }
        .file-upload-area p {
            margin: 0;
            color: #64748b;
            font-size: 0.9rem;
        }
        .file-upload-input {
            display: none;
        }

        .pdf-preview-container {
            border: 2px dashed #e2e8f0;
            border-radius: 12px;
            padding: 15px;
            background: #f8fafc;
            margin-top: 10px;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .pdf-icon {
            font-size: 2.5rem;
            color: #e74c3c;
        }
        .pdf-info {
            flex-grow: 1;
        }
        .pdf-name {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 5px;
        }
        .pdf-size {
            font-size: 0.85rem;
            color: #7f8c8d;
        }
        .btn-remove-pdf {
            background: #e74c3c;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 5px 10px;
            font-size: 0.8rem;
        }

        /* Biaya table styling */
        .biaya-table {
            margin-top: 10px;
        }
        .biaya-table th, .biaya-table td {
            padding: 10px;
            vertical-align: middle;
        }
        .biaya-table .form-control {
            padding: 6px 10px;
            font-size: 0.9rem;
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
            .preview-card {
                padding: 20px;
            }
            .preview-card i {
                font-size: 2rem;
                margin-bottom: 10px;
            }
            .preview-card h5 {
                font-size: 1.1rem;
                margin-bottom: 10px;
            }
            .preview-card p {
                font-size: 0.85rem;
                margin-bottom: 15px;
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
                    <small class="opacity-75 fw-medium" style="font-size: 0.6rem;">Setting Tampilan Website</small>
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
            <a href="#" class="menu-btn active-dashboard"><i class="fas fa-user-lock"></i>Setting Tampilan</a>
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
                    <span class="info-bar-label">Status Sistem</span>
                    <span class="info-bar-value text-success">Aktif</span>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <h4 class="fw-bold" style="color: var(--navy-primary);">Pengaturan Tampilan Website</h4>
            <p class="text-muted small">Kelola semua konten visual dan informasi yang ditampilkan di halaman utama website PSB.</p>
        </div>

        <form id="settingForm">
            <div class="row g-4">
                <div class="col-lg-8">
                    <!-- Logo Section -->
                    <div class="card-setting">
                        <div class="setting-header">LOGO & IDENTITAS</div>
                        <div class="card-body p-4">
                            <div class="mb-4">
                                <label class="form-label-custom">Upload Logo Sekolah</label>
                                <div class="file-upload-area" id="logoUploadArea">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <p>Klik atau drag file logo (PNG, JPG, SVG)</p>
                                    <input type="file" class="file-upload-input" id="logoFile" accept="image/*">
                                </div>
                                <div class="image-preview-container mt-3">
                                    <div class="image-placeholder" id="logoPlaceholder">Pratinjau logo akan muncul di sini</div>
                                    <img src="" alt="Logo Preview" class="image-preview" id="logoPreview">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label-custom">Nama Sekolah</label>
                                <input type="text" class="form-control" value="'Aisyiyah Qur`anic Boarding School" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label-custom">Slogan Sekolah</label>
                                <input type="text" class="form-control" value="Pendidikan Qur'ani Unggul" required>
                            </div>
                        </div>
                    </div>

                    <!-- Hero Content Section -->
                    <div class="card-setting">
                        <div class="setting-header">KONTEN UTAMA & POSTER</div>
                        <div class="card-body p-4">
                            <div class="mb-4">
                                <label class="form-label-custom">Judul Utama Website</label>
                                <input type="text" class="form-control" value="Penerimaan Santriwati Baru" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label-custom">Deskripsi Singkat</label>
                                <textarea class="form-control textarea-custom" placeholder="Deskripsi singkat tentang pendaftaran..." required>Tahun Ajaran 2026/2027</textarea>
                            </div>
                            <div class="mb-4">
                                <label class="form-label-custom">Upload Poster PSB</label>
                                <div class="file-upload-area" id="posterUploadArea">
                                    <i class="fas fa-image"></i>
                                    <p>Klik atau drag file poster (PNG, JPG)</p>
                                    <input type="file" class="file-upload-input" id="posterFile" accept="image/*">
                                </div>
                                <div class="image-preview-container mt-3">
                                    <div class="image-placeholder" id="posterPlaceholder">Pratinjau poster akan muncul di sini</div>
                                    <img src="" alt="Poster Preview" class="image-preview" id="posterPreview">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Panduan Section with PDF upload -->
                    <div class="card-setting">
                        <div class="setting-header">PANDUAN PENDAFTARAN</div>
                        <div class="card-body p-4">
                            <div class="mb-4">
                                <label class="form-label-custom">Upload Panduan PDF</label>
                                <div class="file-upload-area" id="panduanPdfUploadArea">
                                    <i class="fas fa-file-pdf"></i>
                                    <p>Klik atau drag file panduan (PDF)</p>
                                    <input type="file" class="file-upload-input" id="panduanPdfFile" accept=".pdf">
                                </div>
                                <div id="panduanPdfPreviewContainer" class="pdf-preview-container" style="display: none;">
                                    <i class="fas fa-file-pdf pdf-icon"></i>
                                    <div class="pdf-info">
                                        <div class="pdf-name" id="panduanPdfName">panduan-psb.pdf</div>
                                        <div class="pdf-size" id="panduanPdfSize">2.5 MB</div>
                                    </div>
                                    <button type="button" class="btn-remove-pdf" onclick="removePdf('panduan')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="panduanSteps">
                                <div class="panduan-step mb-3 p-3 border rounded">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <label class="form-label-custom mb-0">Langkah 1</label>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="removePanduanStep(this)"><i class="fas fa-trash"></i></button>
                                    </div>
                                    <textarea class="form-control textarea-custom" placeholder="Masukkan deskripsi langkah..." required>Isi Formulir Pendaftaran Online pada halaman utama website ini.</textarea>
                                </div>
                                <div class="panduan-step mb-3 p-3 border rounded">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <label class="form-label-custom mb-0">Langkah 2</label>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="removePanduanStep(this)"><i class="fas fa-trash"></i></button>
                                    </div>
                                    <textarea class="form-control textarea-custom" placeholder="Masukkan deskripsi langkah..." required>Simpan data dan catat NISN & Password yang Anda buat.</textarea>
                                </div>
                                <div class="panduan-step mb-3 p-3 border rounded">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <label class="form-label-custom mb-0">Langkah 3</label>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="removePanduanStep(this)"><i class="fas fa-trash"></i></button>
                                    </div>
                                    <textarea class="form-control textarea-custom" placeholder="Masukkan deskripsi langkah..." required>Lakukan pembayaran biaya pendaftaran melalui transfer Bank.</textarea>
                                </div>
                                <div class="panduan-step mb-3 p-3 border rounded">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <label class="form-label-custom mb-0">Langkah 4</label>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="removePanduanStep(this)"><i class="fas fa-trash"></i></button>
                                    </div>
                                    <textarea class="form-control textarea-custom" placeholder="Masukkan deskripsi langkah..." required>Login kembali menggunakan NISN & Password untuk upload bukti transfer.</textarea>
                                </div>
                                <div class="panduan-step mb-3 p-3 border rounded">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <label class="form-label-custom mb-0">Langkah 5</label>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="removePanduanStep(this)"><i class="fas fa-trash"></i></button>
                                    </div>
                                    <textarea class="form-control textarea-custom" placeholder="Masukkan deskripsi langkah..." required>Cetak Kartu Bukti Pendaftaran dan tunggu jadwal tes seleksi.</textarea>
                                </div>
                            </div>
                            <button type="button" class="btn btn-outline-primary mt-2" onclick="addPanduanStep()"><i class="fas fa-plus"></i> Tambah Langkah</button>
                        </div>
                    </div>

                    <!-- Biaya Section -->
                    <div class="card-setting">
                        <div class="setting-header">RINCIAN BIAYA</div>
                        <div class="card-body p-4">
                            <div class="table-responsive biaya-table">
                                <table class="table table-bordered" id="biayaTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Komponen Biaya</th>
                                            <th>Nominal (Rp)</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" class="form-control" value="Pendaftaran (Gelombang 3)" required></td>
                                            <td><input type="text" class="form-control" value="300.000" required></td>
                                            <td><input type="text" class="form-control" value="Sekali bayar" required></td>
                                            <td><button type="button" class="btn btn-sm btn-danger" onclick="removeBiayaRow(this)"><i class="fas fa-trash"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" value="Uang Pangkal / Gedung" required></td>
                                            <td><input type="text" class="form-control" value="5.000.000" required></td>
                                            <td><input type="text" class="form-control" value="Dapat dicicil 3x" required></td>
                                            <td><button type="button" class="btn btn-sm btn-danger" onclick="removeBiayaRow(this)"><i class="fas fa-trash"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" value="Seragam (5 Setel)" required></td>
                                            <td><input type="text" class="form-control" value="1.200.000" required></td>
                                            <td><input type="text" class="form-control" value="Bahan & Jahit" required></td>
                                            <td><button type="button" class="btn btn-sm btn-danger" onclick="removeBiayaRow(this)"><i class="fas fa-trash"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" value="SPP Bulan Juli" required></td>
                                            <td><input type="text" class="form-control" value="850.000" required></td>
                                            <td><input type="text" class="form-control" value="Termasuk Makan & Laundry" required></td>
                                            <td><button type="button" class="btn btn-sm btn-danger" onclick="removeBiayaRow(this)"><i class="fas fa-trash"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button type="button" class="btn btn-outline-primary mt-2" onclick="addBiayaRow()"><i class="fas fa-plus"></i> Tambah Komponen Biaya</button>
                        </div>
                    </div>

                    <!-- Kontak Section -->
                    <div class="card-setting">
                        <div class="setting-header">INFORMASI KONTAK</div>
                        <div class="card-body p-4">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label-custom">Nomor WhatsApp</label>
                                    <input type="text" class="form-control" placeholder="081234567890" value="081234567890" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label-custom">Email Kontak</label>
                                    <input type="email" class="form-control" placeholder="psb@sekolah.sch.id" value="psb@sekolah.sch.id" required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <label class="form-label-custom">Alamat Sekolah</label>
                                    <textarea class="form-control textarea-custom" placeholder="Masukkan alamat lengkap sekolah" required>Jl. Raya Ponorogo No. 123</textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label-custom">Nomor Rekening</label>
                                    <input type="text" class="form-control" placeholder="123-456-7890" value="123-456-7890" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label-custom">Atas Nama Rekening</label>
                                    <input type="text" class="form-control" placeholder="PSB 'Aisyiyah" value="PSB 'Aisyiyah" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tentang Section with PDF upload -->
                    <div class="card-setting">
                        <div class="setting-header">TENTANG SISTEM PSB</div>
                        <div class="card-body p-4">
                            <label class="form-label-custom">Deskripsi Sistem</label>
                            <textarea class="form-control textarea-custom" placeholder="Masukkan informasi tentang sistem..." required>Website PSB Online 'Aisyiyah Qur`anic Boarding School Ponorogo merupakan sistem resmi Penerimaan Santriwati Baru 'Aisyiyah Qur`anic Boarding School Ponorogo yang digunakan untuk mendukung seluruh proses pendaftaran santriwati secara terintegrasi dan terpusat.</textarea>
                            
                            <div class="mt-4">
                                <label class="form-label-custom">Link Website Eksternal</label>
                                <input type="url" class="form-control" placeholder="https://bandungbondowoso.example.com" value="https://bandungbondowoso.example.com" required>
                                <div class="form-text">Link yang akan ditampilkan di modal Tentang</div>
                            </div>
                            
                            <div class="mt-4">
                                <label class="form-label-custom">Informasi Tim Pengembang</label>
                                <textarea class="form-control textarea-custom" placeholder="Masukkan informasi tim pengembang...">Sistem ini dikembangkan sepenuhnya oleh Internship Team dari Teknik Informatika, Universitas Muhammadiyah Ponorogo, sebagai bagian dari kegiatan magang akademik, di bawah arahan dan persetujuan pihak 'Aisyiyah Qur`anic Boarding School Ponorogo, pada tahun 2025–2026.</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Info PSB Section with PDF upload -->
                    <div class="card-setting">
                        <div class="setting-header">INFORMASI PSB</div>
                        <div class="card-body p-4">
                            <div class="mb-4">
                                <label class="form-label-custom">Upload Info PSB PDF</label>
                                <div class="file-upload-area" id="infoPdfUploadArea">
                                    <i class="fas fa-file-pdf"></i>
                                    <p>Klik atau drag file info PSB (PDF)</p>
                                    <input type="file" class="file-upload-input" id="infoPdfFile" accept=".pdf">
                                </div>
                                <div id="infoPdfPreviewContainer" class="pdf-preview-container" style="display: none;">
                                    <i class="fas fa-file-pdf pdf-icon"></i>
                                    <div class="pdf-info">
                                        <div class="pdf-name" id="infoPdfName">info-psb.pdf</div>
                                        <div class="pdf-size" id="infoPdfSize">1.8 MB</div>
                                    </div>
                                    <button type="button" class="btn-remove-pdf" onclick="removePdf('info')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label-custom">Tahun Ajaran</label>
                                <input type="text" class="form-control" value="2026/2027" required>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label-custom">Jumlah Gelombang</label>
                                <input type="number" class="form-control" value="3" min="1" max="5" required>
                                <div class="form-text">Jumlah gelombang pendaftaran yang tersedia</div>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label-custom">Persyaratan Umum</label>
                                <div id="persyaratanList">
                                    <div class="persyaratan-item mb-2">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="Fotokopi ijazah & SKHUN (legalisir)" required>
                                            <button type="button" class="btn btn-outline-danger" onclick="removePersyaratan(this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="persyaratan-item mb-2">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="Pas foto 3x4 (2 lembar)" required>
                                            <button type="button" class="btn btn-outline-danger" onclick="removePersyaratan(this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="persyaratan-item mb-2">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="Akte kelahiran" required>
                                            <button type="button" class="btn btn-outline-danger" onclick="removePersyaratan(this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="persyaratan-item mb-2">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="Kartu Keluarga" required>
                                            <button type="button" class="btn btn-outline-danger" onclick="removePersyaratan(this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-outline-primary mt-2" onclick="addPersyaratan()">
                                    <i class="fas fa-plus"></i> Tambah Persyaratan
                                </button>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label-custom">Jadwal Penting</label>
                                <div id="jadwalList">
                                    <div class="jadwal-item mb-2">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="Pendaftaran Gelombang III: 10 Januari – 30 Januari 2026" required>
                                            <button type="button" class="btn btn-outline-danger" onclick="removeJadwal(this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="jadwal-item mb-2">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="Tes Seleksi Akademik: 5 Februari 2026" required>
                                            <button type="button" class="btn btn-outline-danger" onclick="removeJadwal(this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="jadwal-item mb-2">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="Wawancara Orang Tua: 10–12 Februari 2026" required>
                                            <button type="button" class="btn btn-outline-danger" onclick="removeJadwal(this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="jadwal-item mb-2">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="Pengumuman Hasil: 20 Februari 2026" required>
                                            <button type="button" class="btn btn-outline-danger" onclick="removeJadwal(this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-outline-primary mt-2" onclick="addJadwal()">
                                    <i class="fas fa-plus"></i> Tambah Jadwal
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <button type="button" class="btn-reset-default" onclick="resetToDefault()">RESET DEFAULT</button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn-save-setting">SIMPAN & TERAPKAN</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="preview-card">
                        <i class="fas fa-magic"></i>
                        <h5>Pratinjau Langsung</h5>
                        <p>Perubahan pada logo, poster, panduan, biaya, kontak, dan informasi tentang akan langsung berdampak pada halaman utama yang diakses oleh calon santriwati.</p>
                        <hr>
                        <button type="button" class="btn-preview" onclick="previewWebsite()">
                            <i class="fas fa-external-link-alt"></i> Lihat Website Utama
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar toggle functionality
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

        // File upload functionality with drag and drop
        function setupFileUpload(uploadAreaId, inputId, previewId, placeholderId, type = 'image') {
            const uploadArea = document.getElementById(uploadAreaId);
            const fileInput = document.getElementById(inputId);
            const preview = document.getElementById(previewId);
            const placeholder = document.getElementById(placeholderId);

            // Click to upload
            uploadArea.addEventListener('click', function() {
                fileInput.click();
            });
            
            // File input change
            fileInput.addEventListener('change', function(e) {
                if (e.target.files && e.target.files[0]) {
                    const file = e.target.files[0];
                    
                    if (type === 'image') {
                        if (file.type.startsWith('image/')) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                preview.src = e.target.result;
                                preview.style.display = 'block';
                                placeholder.style.display = 'none';
                                uploadArea.style.borderColor = '#00bcd4';
                                uploadArea.style.backgroundColor = '#f0f9ff';
                            }
                            reader.readAsDataURL(file);
                        } else {
                            alert('Silakan upload file gambar (PNG, JPG, SVG)');
                        }
                    }
                }
            });

            // Drag and drop functionality
            uploadArea.addEventListener('dragover', function(e) {
                e.preventDefault();
                uploadArea.style.borderColor = '#00bcd4';
                uploadArea.style.backgroundColor = '#e0f7fa';
            });

            uploadArea.addEventListener('dragleave', function(e) {
                e.preventDefault();
                uploadArea.style.borderColor = '#cbd5e1';
                uploadArea.style.backgroundColor = '#f8fafc';
            });

            uploadArea.addEventListener('drop', function(e) {
                e.preventDefault();
                uploadArea.style.borderColor = '#cbd5e1';
                uploadArea.style.backgroundColor = '#f8fafc';
                
                if (e.dataTransfer.files.length) {
                    fileInput.files = e.dataTransfer.files;
                    const event = new Event('change');
                    fileInput.dispatchEvent(event);
                }
            });
        }

        // Setup PDF upload
        function setupPdfUpload(uploadAreaId, inputId, previewContainerId, pdfNameId, pdfSizeId, type) {
            const uploadArea = document.getElementById(uploadAreaId);
            const fileInput = document.getElementById(inputId);
            const previewContainer = document.getElementById(previewContainerId);
            const pdfName = document.getElementById(pdfNameId);
            const pdfSize = document.getElementById(pdfSizeId);

            uploadArea.addEventListener('click', function() {
                fileInput.click();
            });

            fileInput.addEventListener('change', function(e) {
                if (e.target.files && e.target.files[0]) {
                    const file = e.target.files[0];
                    
                    if (file.type === 'application/pdf' || file.name.toLowerCase().endsWith('.pdf')) {
                        // Update preview
                        pdfName.textContent = file.name;
                        pdfSize.textContent = formatFileSize(file.size);
                        previewContainer.style.display = 'flex';
                        
                        // Store file reference for later use
                        if (type === 'panduan') {
                            window.currentPanduanPdf = file;
                        } else if (type === 'info') {
                            window.currentInfoPdf = file;
                        }
                        
                        uploadArea.style.borderColor = '#00bcd4';
                        uploadArea.style.backgroundColor = '#f0f9ff';
                    } else {
                        alert('Silakan upload file PDF');
                        fileInput.value = '';
                    }
                }
            });

            // Drag and drop for PDF
            uploadArea.addEventListener('dragover', function(e) {
                e.preventDefault();
                uploadArea.style.borderColor = '#00bcd4';
                uploadArea.style.backgroundColor = '#e0f7fa';
            });

            uploadArea.addEventListener('dragleave', function(e) {
                e.preventDefault();
                uploadArea.style.borderColor = '#cbd5e1';
                uploadArea.style.backgroundColor = '#f8fafc';
            });

            uploadArea.addEventListener('drop', function(e) {
                e.preventDefault();
                uploadArea.style.borderColor = '#cbd5e1';
                uploadArea.style.backgroundColor = '#f8fafc';
                
                if (e.dataTransfer.files.length) {
                    fileInput.files = e.dataTransfer.files;
                    const event = new Event('change');
                    fileInput.dispatchEvent(event);
                }
            });
        }

        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        function removePdf(type) {
            if (type === 'panduan') {
                document.getElementById('panduanPdfPreviewContainer').style.display = 'none';
                document.getElementById('panduanPdfFile').value = '';
                window.currentPanduanPdf = null;
                document.getElementById('panduanPdfUploadArea').style.borderColor = '#cbd5e1';
                document.getElementById('panduanPdfUploadArea').style.backgroundColor = '#f8fafc';
            } else if (type === 'info') {
                document.getElementById('infoPdfPreviewContainer').style.display = 'none';
                document.getElementById('infoPdfFile').value = '';
                window.currentInfoPdf = null;
                document.getElementById('infoPdfUploadArea').style.borderColor = '#cbd5e1';
                document.getElementById('infoPdfUploadArea').style.backgroundColor = '#f8fafc';
            }
        }

        // Initialize file uploads
        setupFileUpload('logoUploadArea', 'logoFile', 'logoPreview', 'logoPlaceholder');
        setupFileUpload('posterUploadArea', 'posterFile', 'posterPreview', 'posterPlaceholder');
        
        // Initialize PDF uploads
        setupPdfUpload('panduanPdfUploadArea', 'panduanPdfFile', 'panduanPdfPreviewContainer', 'panduanPdfName', 'panduanPdfSize', 'panduan');
        setupPdfUpload('infoPdfUploadArea', 'infoPdfFile', 'infoPdfPreviewContainer', 'infoPdfName', 'infoPdfSize', 'info');

        // Panduan functionality
        function addPanduanStep() {
            const stepsContainer = document.getElementById('panduanSteps');
            const stepNumber = stepsContainer.children.length + 1;
            const newStep = document.createElement('div');
            newStep.className = 'panduan-step mb-3 p-3 border rounded';
            newStep.innerHTML = `
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label class="form-label-custom mb-0">Langkah ${stepNumber}</label>
                    <button type="button" class="btn btn-sm btn-danger" onclick="removePanduanStep(this)"><i class="fas fa-trash"></i></button>
                </div>
                <textarea class="form-control textarea-custom" placeholder="Masukkan deskripsi langkah..." required></textarea>
            `;
            stepsContainer.appendChild(newStep);
            
            // Add focus to new textarea
            newStep.querySelector('textarea').focus();
        }

        function removePanduanStep(button) {
            const stepsContainer = document.getElementById('panduanSteps');
            if (stepsContainer.children.length > 1) {
                const step = button.closest('.panduan-step');
                step.remove();
                // Re-number steps
                const steps = document.querySelectorAll('.panduan-step');
                steps.forEach((step, index) => {
                    const label = step.querySelector('.form-label-custom');
                    label.textContent = `Langkah ${index + 1}`;
                });
            } else {
                alert('Minimal harus ada satu langkah panduan');
            }
        }

        // Biaya functionality
        function addBiayaRow() {
            const tableBody = document.getElementById('biayaTable').getElementsByTagName('tbody')[0];
            const newRow = tableBody.insertRow();
            newRow.innerHTML = `
                <td><input type="text" class="form-control" placeholder="Komponen biaya" required></td>
                <td><input type="text" class="form-control" placeholder="Nominal" required></td>
                <td><input type="text" class="form-control" placeholder="Keterangan" required></td>
                <td><button type="button" class="btn btn-sm btn-danger" onclick="removeBiayaRow(this)"><i class="fas fa-trash"></i></button></td>
            `;
        }

        function removeBiayaRow(button) {
            const tableBody = document.getElementById('biayaTable').getElementsByTagName('tbody')[0];
            if (tableBody.rows.length > 1) {
                const row = button.closest('tr');
                row.remove();
            } else {
                alert('Minimal harus ada satu komponen biaya');
            }
        }

        // Persyaratan functionality
        function addPersyaratan() {
            const list = document.getElementById('persyaratanList');
            const newItem = document.createElement('div');
            newItem.className = 'persyaratan-item mb-2';
            newItem.innerHTML = `
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Masukkan persyaratan" required>
                    <button type="button" class="btn btn-outline-danger" onclick="removePersyaratan(this)">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `;
            list.appendChild(newItem);
            newItem.querySelector('input').focus();
        }

        function removePersyaratan(button) {
            const list = document.getElementById('persyaratanList');
            if (list.children.length > 1) {
                const item = button.closest('.persyaratan-item');
                item.remove();
            } else {
                alert('Minimal harus ada satu persyaratan');
            }
        }

        // Jadwal functionality
        function addJadwal() {
            const list = document.getElementById('jadwalList');
            const newItem = document.createElement('div');
            newItem.className = 'jadwal-item mb-2';
            newItem.innerHTML = `
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Masukkan jadwal" required>
                    <button type="button" class="btn btn-outline-danger" onclick="removeJadwal(this)">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `;
            list.appendChild(newItem);
            newItem.querySelector('input').focus();
        }

        function removeJadwal(button) {
            const list = document.getElementById('jadwalList');
            if (list.children.length > 1) {
                const item = button.closest('.jadwal-item');
                item.remove();
            } else {
                alert('Minimal harus ada satu jadwal');
            }
        }

        // Form submission
        document.getElementById('settingForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate all required fields
            const requiredInputs = this.querySelectorAll('[required]');
            let isValid = true;
            
            requiredInputs.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.classList.add('is-invalid');
                } else {
                    input.classList.remove('is-invalid');
                }
            });
            
            if (isValid) {
                // Collect all data
                const formData = new FormData();
                
                // Add form data
                const formElements = this.querySelectorAll('input, textarea, select');
                formElements.forEach(element => {
                    if (element.name || element.id) {
                        const name = element.name || element.id;
                        formData.append(name, element.value);
                    }
                });
                
                // Add image files if uploaded
                const logoFile = document.getElementById('logoFile').files[0];
                const posterFile = document.getElementById('posterFile').files[0];
                
                if (logoFile) formData.append('logo', logoFile);
                if (posterFile) formData.append('poster', posterFile);
                
                // Add PDF files if uploaded
                if (window.currentPanduanPdf) formData.append('panduan_pdf', window.currentPanduanPdf);
                if (window.currentInfoPdf) formData.append('info_pdf', window.currentInfoPdf);
                
                // Collect panduan steps
                const panduanSteps = [];
                document.querySelectorAll('.panduan-step textarea').forEach((textarea, index) => {
                    panduanSteps.push({
                        step: index + 1,
                        description: textarea.value
                    });
                });
                formData.append('panduan_steps', JSON.stringify(panduanSteps));
                
                // Collect biaya data
                const biayaData = [];
                document.querySelectorAll('#biayaTable tbody tr').forEach(row => {
                    const inputs = row.querySelectorAll('input');
                    if (inputs.length >= 3) {
                        biayaData.push({
                            komponen: inputs[0].value,
                            nominal: inputs[1].value,
                            keterangan: inputs[2].value
                        });
                    }
                });
                formData.append('biaya_data', JSON.stringify(biayaData));
                
                // Collect persyaratan data
                const persyaratanData = [];
                document.querySelectorAll('#persyaratanList input[type="text"]').forEach(input => {
                    persyaratanData.push(input.value);
                });
                formData.append('persyaratan_data', JSON.stringify(persyaratanData));
                
                // Collect jadwal data
                const jadwalData = [];
                document.querySelectorAll('#jadwalList input[type="text"]').forEach(input => {
                    jadwalData.push(input.value);
                });
                formData.append('jadwal_data', JSON.stringify(jadwalData));
                
                // Show success message
                alert('Pengaturan berhasil disimpan!');
                
                // Show loading state
                const saveBtn = this.querySelector('.btn-save-setting');
                const originalText = saveBtn.innerHTML;
                saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
                saveBtn.disabled = true;
                
                // Simulate API call
                setTimeout(() => {
                    saveBtn.innerHTML = originalText;
                    saveBtn.disabled = false;
                    alert('Pengaturan berhasil diterapkan ke website!');
                    
                    // In a real application, you would send formData to the server
                    console.log('Form data collected:', Object.fromEntries(formData.entries()));
                    
                    // Redirect to preview or refresh
                    previewWebsite();
                }, 1500);
            } else {
                alert('Harap lengkapi semua field yang wajib diisi!');
            }
        });

        // Reset to default function
        function resetToDefault() {
            if (confirm('Apakah Anda yakin ingin mengembalikan semua pengaturan ke nilai default? Semua perubahan yang belum disimpan akan hilang.')) {
                // Reset all inputs to default values
                document.querySelectorAll('.form-control, .form-select').forEach(input => {
                    if (input.type === 'file') return;
                    
                    // Reset to placeholder or empty
                    if (input.hasAttribute('placeholder')) {
                        input.value = '';
                    }
                });
                
                // Reset image previews
                document.getElementById('logoPreview').style.display = 'none';
                document.getElementById('logoPlaceholder').style.display = 'block';
                document.getElementById('posterPreview').style.display = 'none';
                document.getElementById('posterPlaceholder').style.display = 'block';
                
                // Reset file inputs
                document.getElementById('logoFile').value = '';
                document.getElementById('posterFile').value = '';
                
                // Reset PDF previews
                removePdf('panduan');
                removePdf('info');
                
                // Reset panduan steps (keep only 5 default steps)
                const panduanSteps = document.getElementById('panduanSteps');
                const defaultSteps = [
                    "Isi Formulir Pendaftaran Online pada halaman utama website ini.",
                    "Simpan data dan catat NISN & Password yang Anda buat.",
                    "Lakukan pembayaran biaya pendaftaran melalui transfer Bank.",
                    "Login kembali menggunakan NISN & Password untuk upload bukti transfer.",
                    "Cetak Kartu Bukti Pendaftaran dan tunggu jadwal tes seleksi."
                ];
                
                // Clear current steps
                while (panduanSteps.children.length > 0) {
                    panduanSteps.removeChild(panduanSteps.lastChild);
                }
                
                // Add default steps
                defaultSteps.forEach((text, index) => {
                    const stepDiv = document.createElement('div');
                    stepDiv.className = 'panduan-step mb-3 p-3 border rounded';
                    stepDiv.innerHTML = `
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label class="form-label-custom mb-0">Langkah ${index + 1}</label>
                            <button type="button" class="btn btn-sm btn-danger" onclick="removePanduanStep(this)"><i class="fas fa-trash"></i></button>
                        </div>
                        <textarea class="form-control textarea-custom" required>${text}</textarea>
                    `;
                    panduanSteps.appendChild(stepDiv);
                });
                
                alert('Pengaturan telah dikembalikan ke nilai default!');
            }
        }

        // Preview website function
        function previewWebsite() {
            // In a real application, this would open the actual website
            // For demonstration, we'll open a new tab with a mock preview
            const previewWindow = window.open('', '_blank');
            previewWindow.document.write(`
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Preview Website PSB AQBS</title>
                    <style>
                        body { 
                            font-family: 'Plus Jakarta Sans', sans-serif; 
                            padding: 20px; 
                            text-align: center; 
                            background: #f8fafc;
                        }
                        .preview-container {
                            max-width: 800px;
                            margin: 0 auto;
                            background: white;
                            padding: 30px;
                            border-radius: 20px;
                            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
                        }
                        h1 { color: #002b49; }
                        .logo { max-width: 200px; margin: 20px auto; }
                        .btn-primary { background: #ff7f00; border: none; padding: 12px 30px; }
                        .pdf-link { color: #e74c3c; text-decoration: none; margin-left: 10px; }
                        .pdf-link:hover { text-decoration: underline; }
                    </style>
                </head>
                <body>
                    <div class="preview-container">
                        <h1>Preview Website PSB AQBS</h1>
                        <p>Ini adalah pratinjau bagaimana tampilan website akan terlihat dengan pengaturan saat ini.</p>
                        
                        <div class="alert alert-success mt-4">
                            <h5>Fitur yang telah diatur:</h5>
                            <ul class="text-start">
                                <li>Logo & Identitas Sekolah</li>
                                <li>Konten Utama & Poster</li>
                                <li>Panduan Pendaftaran (termasuk PDF)</li>
                                <li>Rincian Biaya</li>
                                <li>Informasi Kontak</li>
                                <li>Tentang Sistem PSB</li>
                                <li>Informasi PSB (termasuk PDF)</li>
                            </ul>
                        </div>
                        
                        <div class="alert alert-info mt-4">
                            <i class="fas fa-info-circle"></i> Catatan: <strong>Statistik Pendaftar</strong> dan <strong>Pengumuman</strong> telah dihapus sesuai permintaan.
                        </div>
                        
                        <div class="alert alert-info mt-4">
                            <i class="fas fa-info-circle"></i> Semua PDF yang diupload akan tersedia untuk diunduh pada modal yang sesuai di website utama.
                        </div>
                        
                        <button class="btn btn-primary mt-3" onclick="window.close()">Tutup Pratinjau</button>
                    </div>
                </body>
                </html>
            `);
        }

        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            // Make Setting Tampilan menu active
            const settingMenu = document.querySelector('.menu-btn:nth-child(2)');
            if (settingMenu) {
                settingMenu.classList.add('active-dashboard');
            }
        });
    </script>
</body>
</html>