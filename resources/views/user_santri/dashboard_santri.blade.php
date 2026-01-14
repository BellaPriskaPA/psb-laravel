<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Santri - PSB Online</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --navy-primary: #002b4d;    
            --navy-light: #004080;
            --orange-primary: #ff7f00;       
            --orange-hover: #e66a00;
            --bg-body: #f4f6f9;
            --sidebar-width: 260px;
            --card-radius: 15px;
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
            padding: 30px;
            min-height: calc(100vh - 70px);
            transition: margin-left 0.3s;
        }

        /* --- COMPONENTS --- */
        
        /* Welcome Banner */
        .welcome-card {
            background: linear-gradient(135deg, var(--navy-primary), #001a33);
            color: white;
            border-radius: var(--card-radius);
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0, 43, 77, 0.15);
            margin-bottom: 30px;
            border-left: 6px solid var(--orange-primary);
        }

        /* Step Cards (Responsive Grid) */
        .step-card {
            background: white;
            border-radius: var(--card-radius);
            padding: 25px 20px;
            height: 100%;
            box-shadow: 0 4px 10px rgba(0,0,0,0.03);
            border: 1px solid #f0f0f0;
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .step-card:hover { 
            transform: translateY(-5px); 
            box-shadow: 0 10px 25px rgba(0,0,0,0.08); 
            border-color: transparent; 
        }
        
        .icon-circle {
            width: 60px; 
            height: 60px; 
            border-radius: 50%;
            background: #eef2ff; 
            color: var(--navy-primary);
            display: flex; 
            align-items: center; 
            justify-content: center;
            font-size: 1.5rem; 
            margin-bottom: 15px;
        }
        
        .btn-action {
            width: 100%; 
            margin-top: auto;
            background-color: var(--orange-primary); 
            color: white; 
            border: none;
            padding: 10px; 
            border-radius: 8px; 
            font-weight: 600; 
            font-size: 0.9rem;
            transition: 0.2s;
        }
        .btn-action:hover { 
            background-color: var(--orange-hover); 
            color: white; 
        }

        /* Announcement & Profile */
        .content-card {
            background: white; 
            border-radius: var(--card-radius);
            border: none; 
            box-shadow: 0 4px 10px rgba(0,0,0,0.03);
            height: 100%; 
            overflow: hidden;
        }
        .card-header-clean { 
            padding: 20px; 
            border-bottom: 1px solid #f0f0f0; 
            font-weight: 700; 
            color: var(--navy-primary); 
        }
        .card-body-clean { 
            padding: 20px; 
        }

        /* Overlay Gelap untuk Mobile */
        .sidebar-overlay {
            display: none; 
            position: fixed; 
            inset: 0;
            background: rgba(0,0,0,0.5); 
            z-index: 1032;
        }

        /* --- MEDIA QUERIES (KUNCI RESPONSIVE) --- */
        @media (max-width: 991px) {
            /* Sembunyikan Sidebar */
            .sidebar { 
                transform: translateX(-100%); 
            }
            .sidebar.show { 
                transform: translateX(0); 
            }
            
            /* Konten Utama Full Width */
            .main-content { 
                margin-left: 0; 
                padding: 20px; 
            }
            
            /* Tampilkan Overlay saat menu aktif */
            .sidebar-overlay.show { 
                display: block; 
            }
            
            /* Penyesuaian Teks Mobile */
            .welcome-card h4 { 
                font-size: 1.2rem; 
            }
            .user-dropdown-toggle span { 
                display: none; 
            }
            
            /* Adjust step cards for mobile */
            .step-card {
                padding: 20px 15px;
            }
            .icon-circle {
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
            }
            .btn-action {
                font-size: 0.85rem;
                padding: 8px;
            }
        }
        
        @media (max-width: 767px) {
            .main-content {
                padding: 15px;
            }
            
            .welcome-card {
                padding: 20px;
            }
            
            .row.g-4 > [class*="col-"] {
                padding: 0 5px;
            }
            
            .content-card {
                margin-bottom: 20px;
            }
        }
        
        /* Modal Print Style */
        .doc-paper {
            background: white; 
            padding: 40px; 
            border: 1px solid #ddd;
            font-family: 'Times New Roman', serif; 
            color: black; 
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
        }
        .doc-header { 
            text-align: center; 
            border-bottom: 3px double black; 
            padding-bottom: 10px; 
            margin-bottom: 20px; 
        }
        @media print {
            body * { 
                visibility: hidden; 
            }
            .modal-content * { 
                visibility: visible; 
            }
            .modal-content { 
                position: absolute; 
                left: 0; 
                top: 0; 
                width: 100%; 
                box-shadow: none; 
                border: none; 
            }
            .modal-footer, .btn-close { 
                display: none; 
            }
        }
        
        /* Fix for navbar logo spacing */
        .navbar-brand img {
            margin-right: 10px;
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
            <a href="#" class="nav-link-custom active"><i class="fas fa-th-large"></i> Dashboard</a>
            <a href="#" class="nav-link-custom"><i class="fas fa-file-signature"></i> Formulir Data</a>
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
        
        <div class="welcome-card d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
            <div>
                <h4 class="fw-bold mb-1">Ahlan Wa Sahlan, Bebelll4!</h4>
                <p class="mb-0 opacity-75 small">ID Pendaftaran: <strong>20402448</strong></p>
            </div>
            <div>
                <span class="badge bg-success px-3 py-2 rounded-pill"><i class="fas fa-check-circle me-1"></i> Data Terverifikasi</span>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-12 col-md-6 col-xl-3">
                <div class="step-card">
                    <div class="icon-circle"><i class="fas fa-file-alt"></i></div>
                    <h6 class="fw-bold mb-1">FORMULIR</h6>
                    <p class="text-muted small mb-3">Biodata santriwati</p>
                    <button class="btn-action" data-bs-toggle="modal" data-bs-target="#modalFormulir">
                        <i class="fas fa-eye me-2"></i> Lihat
                    </button>
                </div>
            </div>

            <div class="col-12 col-md-6 col-xl-3">
                <div class="step-card">
                    <div class="icon-circle"><i class="fas fa-cloud-upload-alt"></i></div>
                    <h6 class="fw-bold mb-1">UPLOAD</h6>
                    <p class="text-muted small mb-3">Berkas pendukung</p>
                    <button class="btn-action">
                        <i class="fas fa-upload me-2"></i> Upload
                    </button>
                </div>
            </div>

            <div class="col-12 col-md-6 col-xl-3">
                <div class="step-card">
                    <div class="icon-circle"><i class="fas fa-id-card"></i></div>
                    <h6 class="fw-bold mb-1">KARTU</h6>
                    <p class="text-muted small mb-3">Bukti pendaftaran</p>
                    <button class="btn-action">
                        <i class="fas fa-print me-2"></i> Cetak
                    </button>
                </div>
            </div>

            <div class="col-12 col-md-6 col-xl-3">
                <div class="step-card">
                    <div class="icon-circle"><i class="fas fa-file-contract"></i></div>
                    <h6 class="fw-bold mb-1">SURAT</h6>
                    <p class="text-muted small mb-3">Pernyataan santri</p>
                    <button class="btn-action" data-bs-toggle="modal" data-bs-target="#modalSurat">
                        <i class="fas fa-print me-2"></i> Cetak
                    </button>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="content-card h-100">
                    <div class="card-header-clean d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-bullhorn text-warning me-2"></i> Pengumuman</span>
                        <a href="#" class="text-decoration-none small text-primary fw-bold">Lihat Semua</a>
                    </div>
                    <div class="card-body-clean">
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <div class="bg-light p-2 rounded text-center" style="min-width: 60px;">
                                <div class="fw-bold text-navy-primary">24</div>
                                <div class="small text-muted" style="font-size: 0.7rem;">MEI</div>
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">Jadwal Daftar Ulang Gelombang 1</h6>
                                <p class="text-muted small mb-0">Batas akhir daftar ulang adalah 30 Juni 2023. Mohon segera melengkapi administrasi.</p>
                            </div>
                        </div>
                        <hr class="text-muted opacity-25">
                        <div class="d-flex align-items-start gap-3">
                            <div class="bg-light p-2 rounded text-center" style="min-width: 60px;">
                                <div class="fw-bold text-navy-primary">15</div>
                                <div class="small text-muted" style="font-size: 0.7rem;">APR</div>
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">Tes Seleksi Akademik Online</h6>
                                <p class="text-muted small mb-0">Tes akan dilaksanakan melalui CBT. Pastikan jaringan stabil.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="content-card text-center p-4">
                    <img src="https://via.placeholder.com/100" class="rounded-circle mb-3 shadow-sm border border-3 border-light">
                    <h5 class="fw-bold mb-0">Bebelll4</h5>
                    <small class="text-muted d-block mb-3">Calon Santriwati</small>
                    
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary btn-sm"><i class="fas fa-globe me-2"></i> Website PTQ</button>
                        <button class="btn btn-outline-success btn-sm"><i class="fab fa-whatsapp me-2"></i> Hubungi Admin</button>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <div class="modal fade" id="modalFormulir" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title fs-6"><i class="fas fa-file-alt me-2"></i> Data Pendaftaran</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body bg-light">
                    <div class="doc-paper mx-auto shadow-sm">
                        <div class="text-center mb-4 border-bottom pb-3">
                            <h5 class="fw-bold">FORMULIR PENDAFTARAN</h5>
                            <p class="small mb-0">Tahun Pelajaran 2026/2027</p>
                        </div>
                        <table class="table table-borderless table-sm small">
                            <tr><td width="35%" class="text-muted">Nomor Pendaftaran</td><td width="5%">:</td><td class="fw-bold">20402448</td></tr>
                            <tr><td class="text-muted">NISN</td><td>:</td><td>1234567789</td></tr>
                            <tr><td class="text-muted">Nama Lengkap</td><td>:</td><td>BEBELLL4</td></tr>
                            <tr><td class="text-muted">Tempat, Tgl Lahir</td><td>:</td><td>Ponorogo, 01 Januari 2008</td></tr>
                            <tr><td class="text-muted">Asal Sekolah</td><td>:</td><td>SMP N 1 Ponorogo</td></tr>
                            <tr><td class="text-muted">Jalur</td><td>:</td><td>Reguler</td></tr>
                            <tr><td class="text-muted">Jenjang</td><td>:</td><td>SMA Boarding School</td></tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-sm btn-primary"><i class="fas fa-download me-2"></i> PDF</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalSurat" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title fs-6 fw-bold"><i class="fas fa-print me-2"></i> Cetak Dokumen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body bg-light">
                    <div class="doc-paper mx-auto shadow-sm">
                        <div class="doc-header">
                            <h5 class="fw-bold mb-0">SURAT PERNYATAAN SANTRI</h5>
                        </div>
                        <p>Saya yang bertanda tangan di bawah ini:</p>
                        <table class="table table-borderless table-sm mb-3">
                            <tr><td width="120">Nama</td><td>: <strong>BEBELLL4</strong></td></tr>
                            <tr><td>No. Daftar</td><td>: 20402448</td></tr>
                            <tr><td>Alamat</td><td>: Jl. Raya Ponorogo No. 123</td></tr>
                        </table>
                        <p class="text-justify small">
                            Dengan ini menyatakan bersedia mematuhi segala peraturan dan tata tertib yang berlaku di <strong>Aisyiyah Qur'anic Boarding School</strong>, serta siap menerima sanksi apabila melanggar.
                        </p>
                        <br>
                        <div class="row mt-4">
                            <div class="col-6 text-center">
                                <p class="small">Mengetahui Orang Tua,</p><br><br>
                                <p>( ........................ )</p>
                            </div>
                            <div class="col-6 text-center">
                                <p class="small">Ponorogo, 4 Jan 2026<br>Yang Membuat,</p><br><br>
                                <p class="fw-bold">BEBELLL4</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-sm btn-success" onclick="window.print()"><i class="fas fa-print me-2"></i> Cetak</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Logic Sidebar Responsive
        const toggleBtn = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        function toggleMenu() {
            sidebar.classList.toggle('show');
            overlay.classList.toggle('show');
        }

        toggleBtn.addEventListener('click', toggleMenu);
        overlay.addEventListener('click', toggleMenu);
        
        // Close sidebar when clicking on nav link (mobile only)
        document.querySelectorAll('.nav-link-custom').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 991) {
                    sidebar.classList.remove('show');
                    overlay.classList.remove('show');
                }
            });
        });
    </script>
</body>
</html>

