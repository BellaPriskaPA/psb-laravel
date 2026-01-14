<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran - PSB Online</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --navy-primary: #002b4d;    
            --navy-light: #003e6b;
            --orange-primary: #ff7f00;       
            --orange-hover: #e66a00;
            --bg-body: #f4f6f9;
            --sidebar-width: 260px;
            --card-radius: 15px;
            --input-radius: 10px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-body);
            color: #444;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }

        /* --- NAVBAR --- */
        .navbar-custom {
            background-color: var(--navy-primary);
            height: 70px;
            z-index: 1040;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .user-dropdown-toggle { 
            color: white; text-decoration: none; display: flex; align-items: center; 
            padding: 5px 12px; border-radius: 50px; transition: 0.2s; background: rgba(255,255,255,0.1);
        }
        .user-dropdown-toggle:hover { background: rgba(255,255,255,0.2); }

        /* --- SIDEBAR (RESPONSIVE LOGIC) --- */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--navy-primary);
            position: fixed; top: 70px; bottom: 0; left: 0;
            z-index: 1035;
            padding: 20px 15px;
            transition: transform 0.3s ease-in-out;
            overflow-y: auto;
            border-right: 1px solid rgba(255,255,255,0.05);
        }

        .menu-category { 
            font-size: 0.75rem; 
            text-transform: uppercase; 
            letter-spacing: 1px; 
            color: rgba(255,255,255,0.5); 
            margin-bottom: 10px; 
            font-weight: 600; 
            margin-top: 10px; 
        }
        
        .nav-link-custom {
            display: flex; 
            align-items: center; 
            padding: 12px 15px; 
            margin-bottom: 5px;
            color: rgba(255,255,255,0.85); 
            text-decoration: none; 
            font-weight: 500; 
            font-size: 0.95rem;
            border-radius: 10px; 
            transition: all 0.2s;
        }
        .nav-link-custom i { 
            width: 25px; 
            font-size: 1.1rem; 
            margin-right: 10px; 
            text-align: center; 
        }
        
        .nav-link-custom:hover { 
            background-color: var(--navy-light); 
            color: white; 
            transform: translateX(3px); 
        }
        .nav-link-custom.active { 
            background-color: var(--orange-primary); 
            color: white; 
            box-shadow: 0 4px 10px rgba(255, 127, 0, 0.3); 
        }

        /* --- MAIN CONTENT (Adjustable Margin) --- */
        .main-content {
            margin-left: var(--sidebar-width);
            margin-top: 70px;
            padding: 20px;
            min-height: calc(100vh - 70px);
            transition: margin-left 0.3s;
        }

        /* --- FORM STYLES --- */
        .form-header-card {
            background: linear-gradient(135deg, var(--navy-primary), #001a33);
            color: white;
            border-radius: var(--card-radius);
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 5px 20px rgba(0, 43, 77, 0.15);
            border-left: 6px solid var(--orange-primary);
        }

        /* Tabs */
        .nav-pills-custom { 
            gap: 8px; 
            padding-bottom: 15px; 
            overflow-x: auto;
            flex-wrap: nowrap;
        }
        .nav-pills-custom .nav-link {
            background: white; 
            color: #64748b; 
            border: 1px solid #e2e8f0;
            border-radius: 50px; 
            padding: 8px 20px; 
            font-weight: 600; 
            transition: all 0.3s;
            white-space: nowrap;
            font-size: 0.9rem;
            min-width: 120px;
            text-align: center;
        }
        .nav-pills-custom .nav-link.active {
            background: var(--orange-primary); 
            color: white; 
            border-color: var(--orange-primary);
            box-shadow: 0 4px 12px rgba(255, 127, 0, 0.3);
        }

        /* Section Styling */
        .form-section {
            background: white; 
            border-radius: var(--card-radius);
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid #f0f0f0;
            box-shadow: 0 4px 10px rgba(0,0,0,0.03);
            position: relative;
        }
        .section-title {
            font-size: 1rem; 
            font-weight: 700; 
            color: var(--navy-primary); 
            margin-bottom: 15px;
            padding-bottom: 12px; 
            border-bottom: 2px dashed #e2e8f0; 
            display: flex; 
            align-items: center;
            text-transform: uppercase; 
            letter-spacing: 0.5px;
        }
        .section-title i { 
            margin-right: 10px; 
            color: var(--orange-primary); 
            background: #fff7ed; 
            padding: 6px; 
            border-radius: 8px; 
            font-size: 1.1rem;
        }

        /* Input Fields */
        .form-label { 
            font-size: 0.8rem; 
            font-weight: 600; 
            color: #555; 
            margin-bottom: 6px; 
            text-transform: uppercase; 
            letter-spacing: 0.5px; 
        }
        .form-control, .form-select {
            border: 1px solid #cbd5e1; 
            padding: 10px; 
            border-radius: var(--input-radius); 
            font-size: 0.9rem;
            transition: all 0.2s;
            background-color: #fff;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--navy-primary); 
            box-shadow: 0 0 0 3px rgba(0, 43, 77, 0.1);
        }
        .input-readonly-system { 
            background-color: #f0f7ff; 
            border-color: #e1ecf8; 
            color: var(--navy-primary); 
            font-weight: 700; 
            cursor: not-allowed; 
        }

        /* Upload Area */
        .upload-wrapper {
            display: flex; 
            flex-direction: column; 
            align-items: center; 
            justify-content: center;
            padding: 30px 15px; 
            border: 2px dashed #cbd5e1; 
            border-radius: var(--card-radius);
            background: #f8fafc; 
            transition: 0.3s;
        }
        .upload-wrapper:hover { 
            border-color: var(--orange-primary); 
            background: #fff7ed; 
        }
        .preview-img-lg {
            width: 150px; 
            height: 150px; 
            object-fit: cover; 
            border-radius: 50%;
            border: 4px solid white; 
            box-shadow: 0 8px 20px rgba(0,0,0,0.1); 
            margin-bottom: 15px;
        }

        /* Save Button */
        .btn-save-section {
            background: var(--navy-primary); 
            color: white; 
            padding: 10px 25px;
            border-radius: 50px; 
            border: none; 
            font-weight: 700; 
            font-size: 0.9rem;
            box-shadow: 0 4px 12px rgba(0, 43, 77, 0.2); 
            transition: all 0.3s;
            margin-top: 20px;
            display: block;
            width: fit-content;
            margin-left: auto;
        }
        .btn-save-section:hover { 
            transform: translateY(-2px); 
            background: var(--navy-light); 
        }
        .btn-save-section.saved {
            background: #28a745;
            box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
        }
        .btn-save-section.saved:hover {
            background: #218838;
        }

        /* Declaration Card */
        .declaration-card {
            background: linear-gradient(135deg, #f0f7ff, #e6f3ff);
            border: 2px solid #d1e7ff;
        }

        /* Animation */
        .animate-fade { 
            animation: fadeIn 0.3s ease-in-out; 
        }
        @keyframes fadeIn { 
            from { opacity: 0; transform: translateY(-10px); } 
            to { opacity: 1; transform: translateY(0); } 
        }

        /* Overlay */
        .sidebar-overlay { 
            display: none; 
            position: fixed; 
            inset: 0;
            background: rgba(0,0,0,0.5); 
            z-index: 1025; 
        }

        /* Responsive Design */
        @media (max-width: 991px) {
            .sidebar { 
                transform: translateX(-100%); 
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
            
            .form-header-card {
                padding: 15px;
            }
            
            .form-header-card h3 {
                font-size: 1.1rem;
            }
            
            .form-section {
                padding: 15px;
            }
            
            .section-title {
                font-size: 0.95rem;
            }
            
            .preview-img-lg {
                width: 120px;
                height: 120px;
            }
            
            .btn-save-section {
                padding: 8px 20px;
                font-size: 0.85rem;
                margin-top: 15px;
            }
        }
        
        @media (max-width: 767px) {
            .main-content {
                padding: 10px;
            }
            
            .form-header-card {
                padding: 12px;
            }
            
            .form-header-card h3 {
                font-size: 1rem;
            }
            
            .form-header-card p {
                font-size: 0.85rem;
            }
            
            .form-section {
                padding: 12px;
            }
            
            .section-title {
                font-size: 0.9rem;
                margin-bottom: 12px;
            }
            
            .form-label {
                font-size: 0.75rem;
            }
            
            .form-control, .form-select {
                padding: 8px;
                font-size: 0.85rem;
            }
            
            .input-group-text {
                font-size: 0.85rem;
                padding: 8px;
            }
            
            .upload-wrapper {
                padding: 20px 10px;
            }
            
            .preview-img-lg {
                width: 100px;
                height: 100px;
                margin-bottom: 12px;
            }
            
            .btn-save-section {
                padding: 8px 18px;
                font-size: 0.8rem;
                margin-top: 12px;
                width: 100%;
            }
            
            /* Stack declaration inputs on mobile */
            .declaration-card .row > [class*="col-"] {
                margin-bottom: 10px;
            }
            
            .declaration-card .text-end {
                text-align: start !important;
            }
        }
        
        @media (min-width: 992px) {
            .nav-pills-custom {
                flex-wrap: wrap;
                overflow-x: visible;
            }
            
            .nav-pills-custom .nav-link {
                min-width: auto;
                padding: 10px 25px;
                font-size: 0.95rem;
            }
            
            .row.g-4, .row.g-3 {
                --bs-gutter-x: 1.5rem;
                --bs-gutter-y: 1.5rem;
            }
        }
        
        /* Fix for input groups on mobile */
        @media (max-width: 575px) {
            .input-group {
                flex-direction: column;
            }
            
            .input-group .form-control,
            .input-group .input-group-text {
                width: 100%;
                text-align: center;
            }
            
            .input-group .input-group-text {
                margin-bottom: 5px;
                border-bottom-right-radius: 0;
                border-bottom-left-radius: var(--input-radius);
            }
            
            .input-group .form-control {
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }
        }
        
        /* Success message */
        .save-message {
            background: #28a745;
            color: white;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            opacity: 0;
            transition: opacity 0.3s;
            margin-top: 10px;
            display: inline-block;
            margin-left: auto;
        }
        .save-message.show {
            opacity: 1;
        }
        
        /* Foto section specific styling */
        #section-foto .btn-save-section {
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
            display: block;
        }
        
        #section-foto .save-message {
            margin-top: 10px;
            margin-left: auto;
            margin-right: auto;
            display: block;
            text-align: center;
        }
        
        /* Preview data styling */
        .preview-data {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            margin-top: 15px;
            border-left: 3px solid var(--orange-primary);
            display: none;
        }
        .preview-data.show {
            display: block;
        }
        .preview-item {
            margin-bottom: 8px;
            font-size: 0.9rem;
        }
        .preview-label {
            font-weight: 600;
            color: var(--navy-primary);
            margin-right: 8px;
        }
        .preview-value {
            color: #666;
        }
    </style>
</head>
<body>

    <div class="sidebar-overlay" id="overlay"></div>

    <nav class="navbar navbar-expand navbar-custom fixed-top">
        <div class="container-fluid px-3">
            <button class="btn border-0 text-white me-3 d-lg-none" id="sidebarToggle">
                <i class="fas fa-bars fa-lg"></i>
            </button>

            <div class="d-flex align-items-center">
                <img src="https://via.placeholder.com/40" class="rounded-circle border border-2 border-white me-2">
                <div class="lh-1">
                    <div class="fw-bold text-white">PSB ONLINE</div>
                    <div class="small text-white-50" style="font-size: 0.65rem;">AQBS PONOROGO</div>
                </div>
            </div>

            <div class="ms-auto">
                <div class="dropdown">
                    <a href="#" class="user-dropdown-toggle" data-bs-toggle="dropdown">
                        <img src="https://via.placeholder.com/35" class="rounded-circle" width="30" height="30">
                        <span class="ms-2 d-none d-md-block small fw-bold">Bebelll4</span>
                        <i class="fas fa-chevron-down ms-2 small"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-3 rounded-3">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2 text-muted"></i> Profil Saya</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger fw-bold" href="#"><i class="fas fa-sign-out-alt me-2"></i> Keluar</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <aside class="sidebar" id="sidebar">
        <div class="menu-category">Menu Utama</div>
        <nav class="nav flex-column">
            <a href="#" class="nav-link-custom"><i class="fas fa-th-large"></i> Dashboard</a>
            <a href="#" class="nav-link-custom active"><i class="fas fa-file-signature"></i> Formulir Data</a>
            <a href="#" class="nav-link-custom"><i class="fas fa-cloud-upload-alt"></i> Upload Berkas</a>
            <a href="#" class="nav-link-custom"><i class="fas fa-id-card"></i> Kartu Pendaftaran</a>
            <a href="#" class="nav-link-custom"><i class="fas fa-file-contract"></i> Surat Pernyataan</a>
        </nav>

        <div class="menu-category">Informasi</div>
        <nav class="nav flex-column">
            <a href="#" class="nav-link-custom"><i class="fas fa-wallet"></i> Pembayaran</a>
            <a href="#" class="nav-link-custom"><i class="fas fa-bullhorn"></i> Pengumuman</a>
        </nav>

        <div class="mt-auto pt-5">
            <a href="#" class="btn btn-outline-light w-100 rounded-pill btn-sm opacity-75">
                <i class="fas fa-sign-out-alt me-2"></i> Log Out
            </a>
        </div>
    </aside>

    <main class="main-content">
        
        <div class="form-header-card">
            <h3 class="fw-bold mb-1">Formulir Pendaftaran</h3>
            <p class="mb-0 opacity-75">Silakan lengkapi data diri Anda dengan benar dan jujur.</p>
        </div>

        <ul class="nav nav-pills nav-pills-custom mb-4" id="pills-tab" role="tablist">
            <li class="nav-item">
                <button class="nav-link active" id="pills-santri-tab" data-bs-toggle="pill" data-bs-target="#pills-santri"><i class="fas fa-user-graduate me-2"></i> Data Santri</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" id="pills-domisili-tab" data-bs-toggle="pill" data-bs-target="#pills-domisili"><i class="fas fa-map-marked-alt me-2"></i> Domisili</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" id="pills-ortu-tab" data-bs-toggle="pill" data-bs-target="#pills-ortu"><i class="fas fa-users me-2"></i> Orang Tua</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" id="pills-foto-tab" data-bs-toggle="pill" data-bs-target="#pills-foto"><i class="fas fa-camera me-2"></i> Upload Foto</button>
            </li>
        </ul>

        <form>
            <div class="tab-content" id="pills-tabContent">
                
                <div class="tab-pane fade show active" id="pills-santri">
                    <div class="form-section" id="section-pendaftaran">
                        <div class="section-title"><i class="fas fa-server"></i> DATA PENDAFTARAN (AUTO)</div>
                        <div class="row g-3">
                            <div class="col-6 col-md-3"><label class="form-label">Tahun Ajaran</label><input type="text" class="form-control input-readonly-system" value="2026 / 2027" readonly></div>
                            <div class="col-6 col-md-3"><label class="form-label">Gelombang</label><input type="text" class="form-control input-readonly-system" value="Gelombang 1" readonly></div>
                            <div class="col-6 col-md-3"><label class="form-label">Jenis Kelamin</label><input type="text" class="form-control input-readonly-system" value="Perempuan" readonly></div>
                            <div class="col-6 col-md-3"><label class="form-label">Agama</label><input type="text" class="form-control input-readonly-system" value="Islam" readonly></div>
                            <div class="col-6 col-md-3"><label class="form-label">NISN</label><input type="text" class="form-control input-readonly-system" value="9876543210" readonly></div>
                            <div class="col-6 col-md-3"><label class="form-label">Jenjang</label><input type="text" class="form-control input-readonly-system" value="SMP" readonly></div>
                        </div>
                    </div>

                    <div class="form-section" id="section-santriwati">
                        <div class="section-title"><i class="fas fa-user"></i> BIODATA SANTRIWATI</div>
                        <div class="row g-3">
                            <div class="col-12"><label class="form-label">NIK Santri (Sesuai KK)</label><input type="number" class="form-control" placeholder="16 Digit NIK" id="nikSantri"></div>
                            <div class="col-12"><label class="form-label">Nama Lengkap</label><input type="text" class="form-control fw-bold" placeholder="Sesuai Ijazah" id="namaSantri"></div>
                            <div class="col-12 col-md-6"><label class="form-label">Tempat Lahir</label><input type="text" class="form-control" id="tempatLahir"></div>
                            <div class="col-12 col-md-6"><label class="form-label">Tanggal Lahir</label><input type="date" class="form-control" id="tanggalLahir"></div>
                            <div class="col-6 col-md-3"><label class="form-label">Anak Ke-</label><input type="number" class="form-control" id="anakKe"></div>
                            <div class="col-6 col-md-3"><label class="form-label">Jml Saudara Kandung</label><input type="number" class="form-control" id="jmlSaudara"></div>
                        </div>
                        <button type="button" class="btn-save-section" onclick="saveSection('santriwati')">
                            <i class="fas fa-save me-1"></i> SIMPAN DATA SANTRIWATI
                        </button>
                        <div class="save-message" id="message-santriwati">Data santriwati disimpan!</div>
                        
                        <div class="preview-data" id="preview-santriwati">
                            <div class="preview-item"><span class="preview-label">NIK Santri:</span> <span class="preview-value" id="preview-nikSantri"></span></div>
                            <div class="preview-item"><span class="preview-label">Nama Lengkap:</span> <span class="preview-value" id="preview-namaSantri"></span></div>
                            <div class="preview-item"><span class="preview-label">Tempat Lahir:</span> <span class="preview-value" id="preview-tempatLahir"></span></div>
                            <div class="preview-item"><span class="preview-label">Tanggal Lahir:</span> <span class="preview-value" id="preview-tanggalLahir"></span></div>
                            <div class="preview-item"><span class="preview-label">Anak Ke-:</span> <span class="preview-value" id="preview-anakKe"></span></div>
                            <div class="preview-item"><span class="preview-label">Jumlah Saudara Kandung:</span> <span class="preview-value" id="preview-jmlSaudara"></span></div>
                        </div>
                    </div>

                    <div class="form-section" id="section-sekolah">
                        <div class="section-title"><i class="fas fa-school"></i> SEKOLAH & KONTAK</div>
                        <div class="row g-3">
                            <div class="col-12 col-md-4"><label class="form-label">Jenjang Asal</label><select class="form-select" id="jenjangAsal"><option>SD / MI</option><option>SMP / MTs</option></select></div>
                            <div class="col-12 col-md-8"><label class="form-label">Nama Sekolah Asal</label><input type="text" class="form-control" id="namaSekolah"></div>
                            <div class="col-12"><label class="form-label">NPSN Sekolah</label><input type="number" class="form-control" id="npsnSekolah"></div>
                            <div class="col-12 col-md-6"><label class="form-label text-primary">Email Aktif (Milik Santri)</label><input type="email" class="form-control" placeholder="santri@email.com" id="emailSantri"></div>
                            <div class="col-12 col-md-6"><label class="form-label text-primary">No. HP / WA (Milik Santri)</label><div class="input-group"><span class="input-group-text bg-white">+62</span><input type="number" class="form-control" placeholder="812xxxx" id="hpSantri"></div></div>
                        </div>
                        <button type="button" class="btn-save-section" onclick="saveSection('sekolah')">
                            <i class="fas fa-save me-1"></i> SIMPAN DATA SEKOLAH
                        </button>
                        <div class="save-message" id="message-sekolah">Data sekolah disimpan!</div>
                        
                        <div class="preview-data" id="preview-sekolah">
                            <div class="preview-item"><span class="preview-label">Jenjang Asal:</span> <span class="preview-value" id="preview-jenjangAsal"></span></div>
                            <div class="preview-item"><span class="preview-label">Nama Sekolah Asal:</span> <span class="preview-value" id="preview-namaSekolah"></span></div>
                            <div class="preview-item"><span class="preview-label">NPSN Sekolah:</span> <span class="preview-value" id="preview-npsnSekolah"></span></div>
                            <div class="preview-item"><span class="preview-label">Email Santri:</span> <span class="preview-value" id="preview-emailSantri"></span></div>
                            <div class="preview-item"><span class="preview-label">No. HP/WA Santri:</span> <span class="preview-value" id="preview-hpSantri"></span></div>
                        </div>
                    </div>

                    <div class="form-section" id="section-prestasi">
                        <div class="section-title"><i class="fas fa-trophy"></i> DATA PRESTASI</div>
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Prestasi Akademik / Non-Akademik</label>
                                <textarea class="form-control" rows="3" placeholder="Contoh: Juara 1 Lomba Tahfidz Kabupaten (2024), Juara 2 Olimpiade Matematika, dll." id="prestasi"></textarea>
                                <div class="form-text small text-muted">Tuliskan prestasi yang pernah diraih selama 3 tahun terakhir (jika ada).</div>
                            </div>
                        </div>
                        <button type="button" class="btn-save-section" onclick="saveSection('prestasi')">
                            <i class="fas fa-save me-1"></i> SIMPAN DATA PRESTASI
                        </button>
                        <div class="save-message" id="message-prestasi">Data prestasi disimpan!</div>
                        
                        <div class="preview-data" id="preview-prestasi">
                            <div class="preview-item"><span class="preview-label">Prestasi:</span> <span class="preview-value" id="preview-prestasi"></span></div>
                        </div>
                    </div>

                    <div class="form-section" id="section-kesehatan">
                        <div class="section-title"><i class="fas fa-heartbeat"></i> KESEHATAN & MINAT</div>
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label d-block">Punya Riwayat Alergi?</label>
                                <div class="d-flex gap-3 mb-2">
                                    <div class="form-check"><input class="form-check-input" type="radio" name="alergiStatus" id="alergiNo" value="tidak" checked onchange="toggleInput('alergiInput', false)"><label class="form-check-label" for="alergiNo">Tidak</label></div>
                                    <div class="form-check"><input class="form-check-input" type="radio" name="alergiStatus" id="alergiYes" value="ya" onchange="toggleInput('alergiInput', true)"><label class="form-check-label" for="alergiYes">Ya</label></div>
                                </div>
                                <input type="text" class="form-control d-none animate-fade mt-2" id="alergiInput" placeholder="Sebutkan jenis alergi...">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label d-block">Punya Penyakit Dalam?</label>
                                <div class="d-flex gap-3 mb-2">
                                    <div class="form-check"><input class="form-check-input" type="radio" name="sakitStatus" id="sakitNo" value="tidak" checked onchange="toggleInput('sakitInput', false)"><label class="form-check-label" for="sakitNo">Tidak</label></div>
                                    <div class="form-check"><input class="form-check-input" type="radio" name="sakitStatus" id="sakitYes" value="ya" onchange="toggleInput('sakitInput', true)"><label class="form-check-label" for="sakitYes">Ya</label></div>
                                </div>
                                <input type="text" class="form-control d-none animate-fade mt-2" id="sakitInput" placeholder="Sebutkan nama penyakit...">
                            </div>
                            <div class="col-12 col-md-6"><label class="form-label">Hobi</label><input type="text" class="form-control" id="hobi"></div>
                            <div class="col-12 col-md-6"><label class="form-label">Cita-cita</label><input type="text" class="form-control" id="citaCita"></div>
                        </div>
                        <button type="button" class="btn-save-section" onclick="saveSection('kesehatan')">
                            <i class="fas fa-save me-1"></i> SIMPAN DATA KESEHATAN
                        </button>
                        <div class="save-message" id="message-kesehatan">Data kesehatan disimpan!</div>
                        
                        <div class="preview-data" id="preview-kesehatan">
                            <div class="preview-item"><span class="preview-label">Riwayat Alergi:</span> <span class="preview-value" id="preview-alergi"></span></div>
                            <div class="preview-item"><span class="preview-label">Penyakit Dalam:</span> <span class="preview-value" id="preview-sakit"></span></div>
                            <div class="preview-item"><span class="preview-label">Hobi:</span> <span class="preview-value" id="preview-hobi"></span></div>
                            <div class="preview-item"><span class="preview-label">Cita-cita:</span> <span class="preview-value" id="preview-citaCita"></span></div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-domisili">
                    <div class="form-section" id="section-domisili">
                        <div class="section-title"><i class="fas fa-map-marker-alt"></i> ALAMAT LENGKAP</div>
                        <div class="row g-3">
                            <div class="col-12"><label class="form-label">Status Tempat Tinggal</label><select class="form-select" id="statusTinggal"><option>Bersama Orang Tua</option><option>Bersama Wali</option></select></div>
                            <div class="col-12"><label class="form-label">Alamat Jalan</label><textarea class="form-control" rows="2" id="alamatJalan"></textarea></div>
                            <div class="col-6 col-md-3"><label class="form-label">RT</label><input type="number" class="form-control" id="rt"></div>
                            <div class="col-6 col-md-3"><label class="form-label">RW</label><input type="number" class="form-control" id="rw"></div>
                            <div class="col-12 col-md-6"><label class="form-label">Desa / Kelurahan</label><input type="text" class="form-control" id="desa"></div>
                            <div class="col-12 col-md-6"><label class="form-label">Kecamatan</label><input type="text" class="form-control" id="kecamatan"></div>
                            <div class="col-12 col-md-6"><label class="form-label">Kabupaten / Kota</label><input type="text" class="form-control" id="kabupaten"></div>
                            <div class="col-12 col-md-6"><label class="form-label">Provinsi</label><input type="text" class="form-control" id="provinsi"></div>
                            <div class="col-12 col-md-6"><label class="form-label">Kode Pos</label><input type="number" class="form-control" id="kodePos"></div>
                        </div>
                        <button type="button" class="btn-save-section" onclick="saveSection('domisili')">
                            <i class="fas fa-save me-1"></i> SIMPAN DATA DOMISILI
                        </button>
                        <div class="save-message" id="message-domisili">Data domisili disimpan!</div>
                        
                        <div class="preview-data" id="preview-domisili">
                            <div class="preview-item"><span class="preview-label">Status Tempat Tinggal:</span> <span class="preview-value" id="preview-statusTinggal"></span></div>
                            <div class="preview-item"><span class="preview-label">Alamat Jalan:</span> <span class="preview-value" id="preview-alamatJalan"></span></div>
                            <div class="preview-item"><span class="preview-label">RT/RW:</span> <span class="preview-value" id="preview-rtRw"></span></div>
                            <div class="preview-item"><span class="preview-label">Desa/Kelurahan:</span> <span class="preview-value" id="preview-desa"></span></div>
                            <div class="preview-item"><span class="preview-label">Kecamatan:</span> <span class="preview-value" id="preview-kecamatan"></span></div>
                            <div class="preview-item"><span class="preview-label">Kabupaten/Kota:</span> <span class="preview-value" id="preview-kabupaten"></span></div>
                            <div class="preview-item"><span class="preview-label">Provinsi:</span> <span class="preview-value" id="preview-provinsi"></span></div>
                            <div class="preview-item"><span class="preview-label">Kode Pos:</span> <span class="preview-value" id="preview-kodePos"></span></div>
                        </div>
                    </div>
                    <div class="form-section" id="section-kependudukan">
                        <div class="section-title"><i class="fas fa-id-card-alt"></i> DATA KEPENDUDUKAN</div>
                        <div class="row g-3">
                            <div class="col-12 col-md-6"><label class="form-label">Penanggung Jawab</label><select class="form-select" id="penanggungJawab"><option>Orang Tua</option><option>Wali</option></select></div>
                            <div class="col-12 col-md-6"><label class="form-label">No. KK (16 Digit)</label><input type="number" class="form-control" id="noKk"></div>
                            <div class="col-12 col-md-6"><label class="form-label">Nama Kepala Keluarga</label><input type="text" class="form-control" id="namaKk"></div>
                            <div class="col-12 col-md-6"><label class="form-label">No. KIP (Opsional)</label><input type="text" class="form-control" id="noKip"></div>
                        </div>
                        <button type="button" class="btn-save-section" onclick="saveSection('kependudukan')">
                            <i class="fas fa-save me-1"></i> SIMPAN DATA KEPENDUDUKAN
                        </button>
                        <div class="save-message" id="message-kependudukan">Data kependudukan disimpan!</div>
                        
                        <div class="preview-data" id="preview-kependudukan">
                            <div class="preview-item"><span class="preview-label">Penanggung Jawab:</span> <span class="preview-value" id="preview-penanggungJawab"></span></div>
                            <div class="preview-item"><span class="preview-label">No. KK:</span> <span class="preview-value" id="preview-noKk"></span></div>
                            <div class="preview-item"><span class="preview-label">Nama Kepala Keluarga:</span> <span class="preview-value" id="preview-namaKk"></span></div>
                            <div class="preview-item"><span class="preview-label">No. KIP:</span> <span class="preview-value" id="preview-noKip"></span></div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-ortu">
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <div class="form-section h-100 border-start border-4 border-primary" id="section-ayah">
                                <div class="section-title"><i class="fas fa-male"></i> DATA AYAH</div>
                                <div class="row g-3">
                                    <div class="col-12"><label class="form-label">NIK Ayah</label><input type="number" class="form-control" id="nikAyah"></div>
                                    <div class="col-12"><label class="form-label">Nama Lengkap</label><input type="text" class="form-control" id="namaAyah"></div>
                                    <div class="col-12"><label class="form-label">Tempat, Tgl Lahir</label><div class="input-group"><input type="text" class="form-control" placeholder="Tempat" id="tempatLahirAyah"><input type="date" class="form-control" id="tglLahirAyah"></div></div>
                                    <div class="col-12 col-md-6"><label class="form-label">Pendidikan</label><select class="form-select" id="pendidikanAyah"><option>SMA</option><option>S1</option><option>S2</option></select></div>
                                    
                                    <div class="col-12 col-md-6">
                                        <label class="form-label">Pekerjaan</label>
                                        <select class="form-select" id="pekAyah" onchange="togglePekerjaan('pekAyah', 'pekAyahLain')">
                                            <option>Wiraswasta</option><option>PNS</option><option>Karyawan</option><option>Petani</option><option>Tidak Bekerja</option><option value="Lainnya">Lainnya (Input Sendiri)</option>
                                        </select>
                                        <input type="text" class="form-control mt-2 d-none animate-fade" id="pekAyahLain" placeholder="Sebutkan pekerjaan...">
                                    </div>

                                    <div class="col-12"><label class="form-label">Penghasilan / Bulan</label><input type="text" class="form-control" placeholder="Rp." id="penghasilanAyah"></div>
                                    <div class="col-12"><label class="form-label">No HP Ayah</label><input type="number" class="form-control" id="hpAyah"></div>
                                    <div class="col-12"><label class="form-label">Status</label><select class="form-select" id="statusAyah"><option>Masih Hidup</option><option>Meninggal</option><option>Hilang / Tidak Diketahui</option></select></div>
                                </div>
                                <button type="button" class="btn-save-section" onclick="saveSection('ayah')">
                                    <i class="fas fa-save me-1"></i> SIMPAN DATA AYAH
                                </button>
                                <div class="save-message" id="message-ayah">Data ayah disimpan!</div>
                                
                                <div class="preview-data" id="preview-ayah">
                                    <div class="preview-item"><span class="preview-label">NIK Ayah:</span> <span class="preview-value" id="preview-nikAyah"></span></div>
                                    <div class="preview-item"><span class="preview-label">Nama Ayah:</span> <span class="preview-value" id="preview-namaAyah"></span></div>
                                    <div class="preview-item"><span class="preview-label">Tempat Lahir:</span> <span class="preview-value" id="preview-tempatLahirAyah"></span></div>
                                    <div class="preview-item"><span class="preview-label">Tanggal Lahir:</span> <span class="preview-value" id="preview-tglLahirAyah"></span></div>
                                    <div class="preview-item"><span class="preview-label">Pendidikan:</span> <span class="preview-value" id="preview-pendidikanAyah"></span></div>
                                    <div class="preview-item"><span class="preview-label">Pekerjaan:</span> <span class="preview-value" id="preview-pekAyah"></span></div>
                                    <div class="preview-item"><span class="preview-label">Penghasilan:</span> <span class="preview-value" id="preview-penghasilanAyah"></span></div>
                                    <div class="preview-item"><span class="preview-label">No HP Ayah:</span> <span class="preview-value" id="preview-hpAyah"></span></div>
                                    <div class="preview-item"><span class="preview-label">Status:</span> <span class="preview-value" id="preview-statusAyah"></span></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-section h-100 border-start border-4 border-danger" id="section-ibu">
                                <div class="section-title"><i class="fas fa-female" style="color: #e83e8c;"></i> DATA IBU</div>
                                <div class="row g-3">
                                    <div class="col-12"><label class="form-label">NIK Ibu</label><input type="number" class="form-control" id="nikIbu"></div>
                                    <div class="col-12"><label class="form-label">Nama Lengkap</label><input type="text" class="form-control" id="namaIbu"></div>
                                    <div class="col-12"><label class="form-label">Tempat, Tgl Lahir</label><div class="input-group"><input type="text" class="form-control" placeholder="Tempat" id="tempatLahirIbu"><input type="date" class="form-control" id="tglLahirIbu"></div></div>
                                    <div class="col-12 col-md-6"><label class="form-label">Pendidikan</label><select class="form-select" id="pendidikanIbu"><option>SMA</option><option>S1</option><option>S2</option></select></div>
                                    
                                    <div class="col-12 col-md-6">
                                        <label class="form-label">Pekerjaan</label>
                                        <select class="form-select" id="pekIbu" onchange="togglePekerjaan('pekIbu', 'pekIbuLain')">
                                            <option>IRT</option><option>PNS</option><option>Wiraswasta</option><option>Karyawan</option><option>Tidak Bekerja</option><option value="Lainnya">Lainnya (Input Sendiri)</option>
                                        </select>
                                        <input type="text" class="form-control mt-2 d-none animate-fade" id="pekIbuLain" placeholder="Sebutkan pekerjaan...">
                                    </div>

                                    <div class="col-12"><label class="form-label">Penghasilan / Bulan</label><input type="text" class="form-control" placeholder="Rp." id="penghasilanIbu"></div>
                                    <div class="col-12"><label class="form-label">No HP Ibu</label><input type="number" class="form-control" id="hpIbu"></div>
                                    <div class="col-12"><label class="form-label">Status</label><select class="form-select" id="statusIbu"><option>Masih Hidup</option><option>Meninggal</option><option>Hilang / Tidak Diketahui</option></select></div>
                                </div>
                                <button type="button" class="btn-save-section" onclick="saveSection('ibu')">
                                    <i class="fas fa-save me-1"></i> SIMPAN DATA IBU
                                </button>
                                <div class="save-message" id="message-ibu">Data ibu disimpan!</div>
                                
                                <div class="preview-data" id="preview-ibu">
                                    <div class="preview-item"><span class="preview-label">NIK Ibu:</span> <span class="preview-value" id="preview-nikIbu"></span></div>
                                    <div class="preview-item"><span class="preview-label">Nama Ibu:</span> <span class="preview-value" id="preview-namaIbu"></span></div>
                                    <div class="preview-item"><span class="preview-label">Tempat Lahir:</span> <span class="preview-value" id="preview-tempatLahirIbu"></span></div>
                                    <div class="preview-item"><span class="preview-label">Tanggal Lahir:</span> <span class="preview-value" id="preview-tglLahirIbu"></span></div>
                                    <div class="preview-item"><span class="preview-label">Pendidikan:</span> <span class="preview-value" id="preview-pendidikanIbu"></span></div>
                                    <div class="preview-item"><span class="preview-label">Pekerjaan:</span> <span class="preview-value" id="preview-pekIbu"></span></div>
                                    <div class="preview-item"><span class="preview-label">Penghasilan:</span> <span class="preview-value" id="preview-penghasilanIbu"></span></div>
                                    <div class="preview-item"><span class="preview-label">No HP Ibu:</span> <span class="preview-value" id="preview-hpIbu"></span></div>
                                    <div class="preview-item"><span class="preview-label">Status:</span> <span class="preview-value" id="preview-statusIbu"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-section mt-3 border-start border-4 border-warning" id="section-wali">
                        <div class="section-title mb-2"><i class="fas fa-user-friends text-warning"></i> DATA WALI (Jika Ada)</div>
                        <div class="row g-3">
                            <div class="col-md-6"><label class="form-label">NIK Wali</label><input type="number" class="form-control" id="nikWali"></div>
                            <div class="col-md-6"><label class="form-label">Nama Wali</label><input type="text" class="form-control" id="namaWali"></div>
                            <div class="col-12"><label class="form-label">Hubungan dengan Santri</label><input type="text" class="form-control" placeholder="Paman/Bibi" id="hubunganWali"></div>
                            <div class="col-12 col-md-6"><label class="form-label">Tempat Lahir</label><input type="text" class="form-control" id="tempatLahirWali"></div>
                            <div class="col-12 col-md-6"><label class="form-label">Tanggal Lahir</label><input type="date" class="form-control" id="tglLahirWali"></div>
                            <div class="col-12 col-md-6"><label class="form-label">Pendidikan</label><select class="form-select" id="pendidikanWali"><option>SD</option><option>SMP</option><option>SMA</option><option>S1/D4</option><option>S2</option></select></div>
                            
                            <div class="col-12 col-md-6">
                                <label class="form-label">Pekerjaan</label>
                                <select class="form-select" id="pekWali" onchange="togglePekerjaan('pekWali', 'pekWaliLain')">
                                    <option>Wiraswasta</option><option>PNS</option><option>Karyawan</option><option>Petani</option><option>Tidak Bekerja</option><option value="Lainnya">Lainnya (Input Sendiri)</option>
                                </select>
                                <input type="text" class="form-control mt-2 d-none animate-fade" id="pekWaliLain" placeholder="Sebutkan pekerjaan...">
                            </div>

                            <div class="col-12 col-md-6"><label class="form-label">Penghasilan / Bulan</label><input type="text" class="form-control" placeholder="Rp." id="penghasilanWali"></div>
                            <div class="col-12 col-md-6"><label class="form-label">No HP Wali</label><input type="number" class="form-control" id="hpWali"></div>
                        </div>
                        <button type="button" class="btn-save-section" onclick="saveSection('wali')">
                            <i class="fas fa-save me-1"></i> SIMPAN DATA WALI
                        </button>
                        <div class="save-message" id="message-wali">Data wali disimpan!</div>
                        
                        <div class="preview-data" id="preview-wali">
                            <div class="preview-item"><span class="preview-label">NIK Wali:</span> <span class="preview-value" id="preview-nikWali"></span></div>
                            <div class="preview-item"><span class="preview-label">Nama Wali:</span> <span class="preview-value" id="preview-namaWali"></span></div>
                            <div class="preview-item"><span class="preview-label">Hubungan:</span> <span class="preview-value" id="preview-hubunganWali"></span></div>
                            <div class="preview-item"><span class="preview-label">Tempat Lahir:</span> <span class="preview-value" id="preview-tempatLahirWali"></span></div>
                            <div class="preview-item"><span class="preview-label">Tanggal Lahir:</span> <span class="preview-value" id="preview-tglLahirWali"></span></div>
                            <div class="preview-item"><span class="preview-label">Pendidikan:</span> <span class="preview-value" id="preview-pendidikanWali"></span></div>
                            <div class="preview-item"><span class="preview-label">Pekerjaan:</span> <span class="preview-value" id="preview-pekWali"></span></div>
                            <div class="preview-item"><span class="preview-label">Penghasilan:</span> <span class="preview-value" id="preview-penghasilanWali"></span></div>
                            <div class="preview-item"><span class="preview-label">No HP Wali:</span> <span class="preview-value" id="preview-hpWali"></span></div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-foto">
                    <div class="form-section text-center" id="section-foto">
                        <div class="section-title justify-content-center border-0"><i class="fas fa-camera"></i> UPLOAD FOTO PROFIL</div>
                        <div class="upload-wrapper mx-auto" style="max-width: 450px;">
                            <img src="https://via.placeholder.com/200?text=FOTO" id="fotoPreview" class="preview-img-lg">
                            <h5 class="fw-bold mb-1 text-navy-primary">Pilih Foto Resmi</h5>
                            <p class="text-muted small mb-3">Format: JPG/PNG, Max: 2MB, Background Merah/Biru.</p>
                            
                            <label class="btn btn-primary rounded-pill px-4">
                                <i class="fas fa-folder-open me-2"></i> Pilih File dari Komputer
                                <input type="file" id="fotoInput" hidden accept="image/*">
                            </label>
                        </div>
                        <button type="button" class="btn-save-section" onclick="saveSection('foto')">
                            <i class="fas fa-save me-1"></i> SIMPAN FOTO
                        </button>
                        <div class="save-message" id="message-foto">Foto disimpan!</div>
                        
                        <div class="preview-data text-center" id="preview-foto">
                            <img src="" id="preview-foto-img" class="preview-img-lg" style="display: none;">
                            <p class="preview-value" id="preview-foto-text">Foto profil telah diunggah</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="form-section declaration-card mt-3" id="section-pernyataan">
                <div class="section-title mb-2" style="border:none;"><i class="fas fa-file-contract"></i> PERNYATAAN</div>
                <p class="mb-3 text-muted">Saya menyatakan bahwa seluruh data yang diisikan adalah benar dan dapat dipertanggungjawabkan.</p>
                <div class="row align-items-end g-3">
                    <div class="col-12 col-md-4">
                        <label class="form-label text-danger">Nama Penandatangan</label>
                        <input type="text" class="form-control border-danger" placeholder="Nama Orang Tua / Wali" required id="namaPenandatangan">
                    </div>
                    <div class="col-12 col-md-4">
                        <label class="form-label">Hubungan</label>
                        <select class="form-select" id="hubunganPenandatangan"><option>Ayah Kandung</option><option>Ibu Kandung</option><option>Wali</option></select>
                    </div>
                    <div class="col-12 col-md-4">
                        <button type="button" class="btn-save-section" onclick="saveSection('pernyataan')">
                            <i class="fas fa-save me-1"></i> SIMPAN PERNYATAAN
                        </button>
                        <div class="save-message" id="message-pernyataan">Pernyataan disimpan!</div>
                    </div>
                </div>
                
                <div class="preview-data" id="preview-pernyataan">
                    <div class="preview-item"><span class="preview-label">Nama Penandatangan:</span> <span class="preview-value" id="preview-namaPenandatangan"></span></div>
                    <div class="preview-item"><span class="preview-label">Hubungan:</span> <span class="preview-value" id="preview-hubunganPenandatangan"></span></div>
                </div>
            </div>

        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar Toggle
        const toggleBtn = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        function toggleMenu() { sidebar.classList.toggle('show'); overlay.classList.toggle('show'); }
        toggleBtn.addEventListener('click', toggleMenu);
        overlay.addEventListener('click', toggleMenu);

        // Preview Foto
        const fotoInput = document.getElementById('fotoInput');
        const fotoPreview = document.getElementById('fotoPreview');
        if(fotoInput){
            fotoInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) { fotoPreview.src = e.target.result; }
                    reader.readAsDataURL(file);
                }
            });
        }

        // Logic Input Penyakit/Alergi
        function toggleInput(inputId, show) {
            const inputEl = document.getElementById(inputId);
            if (show) { inputEl.classList.remove('d-none'); inputEl.focus(); } 
            else { inputEl.classList.add('d-none'); inputEl.value = ''; }
        }

        // Logic Input Pekerjaan Lainnya
        function togglePekerjaan(selectId, inputId) {
            const selectEl = document.getElementById(selectId);
            const inputEl = document.getElementById(inputId);
            if (selectEl.value === 'Lainnya') {
                inputEl.classList.remove('d-none'); inputEl.focus();
            } else {
                inputEl.classList.add('d-none'); inputEl.value = '';
            }
        }
        
        // Close sidebar when clicking on nav link (mobile only)
        document.querySelectorAll('.nav-link-custom').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 991) {
                    sidebar.classList.remove('show');
                    overlay.classList.remove('show');
                }
            });
        });

        // Save section functionality with data persistence and preview
        function saveSection(sectionId) {
            const button = document.querySelector(`#section-${sectionId} .btn-save-section`);
            const message = document.getElementById(`message-${sectionId}`);
            const previewSection = document.getElementById(`preview-${sectionId}`);
            
            // Simulate saving process
            button.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> MENYIMPAN';
            button.disabled = true;
            
            setTimeout(() => {
                button.innerHTML = '<i class="fas fa-check me-1"></i> DISIMPAN';
                button.className = 'btn-save-section saved';
                button.disabled = false;
                
                // Show success message
                if (message) {
                    message.classList.add('show');
                    setTimeout(() => {
                        message.classList.remove('show');
                    }, 2000);
                }
                
                // Update preview data based on section
                updatePreviewData(sectionId);
                previewSection.classList.add('show');
                
                // Reset button after 3 seconds
                setTimeout(() => {
                    button.innerHTML = `<i class="fas fa-save me-1"></i> SIMPAN ${button.textContent.replace('DISIMPAN', '').replace('MENYIMPAN', '').trim()}`;
                    button.className = 'btn-save-section';
                }, 3000);
            }, 1000);
        }
        
        // Function to update preview data for each section
        function updatePreviewData(sectionId) {
            switch(sectionId) {
                case 'santriwati':
                    document.getElementById('preview-nikSantri').textContent = document.getElementById('nikSantri').value || '-';
                    document.getElementById('preview-namaSantri').textContent = document.getElementById('namaSantri').value || '-';
                    document.getElementById('preview-tempatLahir').textContent = document.getElementById('tempatLahir').value || '-';
                    document.getElementById('preview-tanggalLahir').textContent = document.getElementById('tanggalLahir').value || '-';
                    document.getElementById('preview-anakKe').textContent = document.getElementById('anakKe').value || '-';
                    document.getElementById('preview-jmlSaudara').textContent = document.getElementById('jmlSaudara').value || '-';
                    break;
                    
                case 'sekolah':
                    document.getElementById('preview-jenjangAsal').textContent = document.getElementById('jenjangAsal').value || '-';
                    document.getElementById('preview-namaSekolah').textContent = document.getElementById('namaSekolah').value || '-';
                    document.getElementById('preview-npsnSekolah').textContent = document.getElementById('npsnSekolah').value || '-';
                    document.getElementById('preview-emailSantri').textContent = document.getElementById('emailSantri').value || '-';
                    document.getElementById('preview-hpSantri').textContent = document.getElementById('hpSantri').value || '-';
                    break;
                    
                case 'prestasi':
                    document.getElementById('preview-prestasi').textContent = document.getElementById('prestasi').value || '-';
                    break;
                    
                case 'kesehatan':
                    const alergiInput = document.getElementById('alergiInput');
                    const sakitInput = document.getElementById('sakitInput');
                    document.getElementById('preview-alergi').textContent = 
                        document.querySelector('input[name="alergiStatus"]:checked').value === 'ya' ? 
                        (alergiInput.value || 'Ya') : 'Tidak';
                    document.getElementById('preview-sakit').textContent = 
                        document.querySelector('input[name="sakitStatus"]:checked').value === 'ya' ? 
                        (sakitInput.value || 'Ya') : 'Tidak';
                    document.getElementById('preview-hobi').textContent = document.getElementById('hobi').value || '-';
                    document.getElementById('preview-citaCita').textContent = document.getElementById('citaCita').value || '-';
                    break;
                    
                case 'domisili':
                    document.getElementById('preview-statusTinggal').textContent = document.getElementById('statusTinggal').value || '-';
                    document.getElementById('preview-alamatJalan').textContent = document.getElementById('alamatJalan').value || '-';
                    const rt = document.getElementById('rt').value || '';
                    const rw = document.getElementById('rw').value || '';
                    document.getElementById('preview-rtRw').textContent = rt && rw ? `${rt}/${rw}` : '-';
                    document.getElementById('preview-desa').textContent = document.getElementById('desa').value || '-';
                    document.getElementById('preview-kecamatan').textContent = document.getElementById('kecamatan').value || '-';
                    document.getElementById('preview-kabupaten').textContent = document.getElementById('kabupaten').value || '-';
                    document.getElementById('preview-provinsi').textContent = document.getElementById('provinsi').value || '-';
                    document.getElementById('preview-kodePos').textContent = document.getElementById('kodePos').value || '-';
                    break;
                    
                case 'kependudukan':
                    document.getElementById('preview-penanggungJawab').textContent = document.getElementById('penanggungJawab').value || '-';
                    document.getElementById('preview-noKk').textContent = document.getElementById('noKk').value || '-';
                    document.getElementById('preview-namaKk').textContent = document.getElementById('namaKk').value || '-';
                    document.getElementById('preview-noKip').textContent = document.getElementById('noKip').value || '-';
                    break;
                    
                case 'ayah':
                    document.getElementById('preview-nikAyah').textContent = document.getElementById('nikAyah').value || '-';
                    document.getElementById('preview-namaAyah').textContent = document.getElementById('namaAyah').value || '-';
                    document.getElementById('preview-tempatLahirAyah').textContent = document.getElementById('tempatLahirAyah').value || '-';
                    document.getElementById('preview-tglLahirAyah').textContent = document.getElementById('tglLahirAyah').value || '-';
                    document.getElementById('preview-pendidikanAyah').textContent = document.getElementById('pendidikanAyah').value || '-';
                    const pekAyah = document.getElementById('pekAyah').value;
                    document.getElementById('preview-pekAyah').textContent = 
                        pekAyah === 'Lainnya' ? document.getElementById('pekAyahLain').value : pekAyah;
                    document.getElementById('preview-penghasilanAyah').textContent = document.getElementById('penghasilanAyah').value || '-';
                    document.getElementById('preview-hpAyah').textContent = document.getElementById('hpAyah').value || '-';
                    document.getElementById('preview-statusAyah').textContent = document.getElementById('statusAyah').value || '-';
                    break;
                    
                case 'ibu':
                    document.getElementById('preview-nikIbu').textContent = document.getElementById('nikIbu').value || '-';
                    document.getElementById('preview-namaIbu').textContent = document.getElementById('namaIbu').value || '-';
                    document.getElementById('preview-tempatLahirIbu').textContent = document.getElementById('tempatLahirIbu').value || '-';
                    document.getElementById('preview-tglLahirIbu').textContent = document.getElementById('tglLahirIbu').value || '-';
                    document.getElementById('preview-pendidikanIbu').textContent = document.getElementById('pendidikanIbu').value || '-';
                    const pekIbu = document.getElementById('pekIbu').value;
                    document.getElementById('preview-pekIbu').textContent = 
                        pekIbu === 'Lainnya' ? document.getElementById('pekIbuLain').value : pekIbu;
                    document.getElementById('preview-penghasilanIbu').textContent = document.getElementById('penghasilanIbu').value || '-';
                    document.getElementById('preview-hpIbu').textContent = document.getElementById('hpIbu').value || '-';
                    document.getElementById('preview-statusIbu').textContent = document.getElementById('statusIbu').value || '-';
                    break;
                    
                case 'wali':
                    document.getElementById('preview-nikWali').textContent = document.getElementById('nikWali').value || '-';
                    document.getElementById('preview-namaWali').textContent = document.getElementById('namaWali').value || '-';
                    document.getElementById('preview-hubunganWali').textContent = document.getElementById('hubunganWali').value || '-';
                    document.getElementById('preview-tempatLahirWali').textContent = document.getElementById('tempatLahirWali').value || '-';
                    document.getElementById('preview-tglLahirWali').textContent = document.getElementById('tglLahirWali').value || '-';
                    document.getElementById('preview-pendidikanWali').textContent = document.getElementById('pendidikanWali').value || '-';
                    const pekWali = document.getElementById('pekWali').value;
                    document.getElementById('preview-pekWali').textContent = 
                        pekWali === 'Lainnya' ? document.getElementById('pekWaliLain').value : pekWali;
                    document.getElementById('preview-penghasilanWali').textContent = document.getElementById('penghasilanWali').value || '-';
                    document.getElementById('preview-hpWali').textContent = document.getElementById('hpWali').value || '-';
                    break;
                    
                case 'foto':
                    const fileInput = document.getElementById('fotoInput');
                    const previewImg = document.getElementById('preview-foto-img');
                    const previewText = document.getElementById('preview-foto-text');
                    if (fileInput.files.length > 0) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            previewImg.src = e.target.result;
                            previewImg.style.display = 'block';
                            previewText.style.display = 'none';
                        };
                        reader.readAsDataURL(fileInput.files[0]);
                    } else {
                        previewImg.style.display = 'none';
                        previewText.style.display = 'block';
                    }
                    break;
                    
                case 'pernyataan':
                    document.getElementById('preview-namaPenandatangan').textContent = document.getElementById('namaPenandatangan').value || '-';
                    document.getElementById('preview-hubunganPenandatangan').textContent = document.getElementById('hubunganPenandatangan').value || '-';
                    break;
            }
        }
    </script>
</body>
</html>

