<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun Admin - PSB AQBS</title>
    
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

        /* --- ADMIN ACCOUNT STYLES --- */
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

        .profile-section {
            text-align: center;
            padding: 40px 20px;
            background: linear-gradient(135deg, var(--navy-primary), var(--navy-dark));
            color: white;
            border-radius: 20px 20px 0 0;
        }
        .profile-avatar {
            width: 120px;
            height: 120px;
            border: 4px solid white;
            border-radius: 50%;
            margin: 0 auto 20px;
            background: #f8fafc;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: var(--navy-primary);
        }
        .profile-name {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 8px;
        }
        .profile-role {
            font-size: 1rem;
            opacity: 0.9;
            font-weight: 600;
        }

        .btn-save-profile {
            background: linear-gradient(135deg, var(--navy-primary), var(--navy-dark));
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1rem;
            transition: all var(--transition-speed);
            width: 100%;
            box-shadow: 0 4px 12px rgba(0, 43, 73, 0.3);
        }
        .btn-save-profile:hover {
            background: linear-gradient(135deg, var(--navy-dark), var(--navy-primary));
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 43, 73, 0.4);
        }

        .credentials-section {
            background: #f8fafc;
            padding: 25px;
            border-radius: 16px;
            margin-top: 25px;
            border-left: 4px solid var(--orange-primary);
        }
        .credentials-section h5 {
            color: var(--navy-primary);
            font-weight: 800;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .credential-item {
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e2e8f0;
        }
        .credential-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        .credential-label {
            font-weight: 700;
            color: #64748b;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .credential-value {
            font-family: monospace;
            font-size: 1.1rem;
            color: var(--navy-primary);
            font-weight: 700;
            word-break: break-all;
            background: white;
            padding: 12px;
            border-radius: 8px;
            border: 2px solid #e2e8f0;
        }

        .password-toggle {
            cursor: pointer;
            margin-left: 10px;
            color: var(--blue-info);
            background: none;
            border: none;
            padding: 0;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 0.9rem;
        }
        .password-toggle:hover {
            color: var(--navy-primary);
        }

        /* Password Toggle Button Styles */
        .input-group .btn-outline-secondary {
            border-color: #dee2e6;
            color: #64748b;
            transition: all var(--transition-speed);
        }

        .input-group .btn-outline-secondary:hover {
            background-color: var(--navy-primary);
            border-color: var(--navy-primary);
            color: white;
        }

        .input-group .btn-outline-secondary:focus {
            box-shadow: 0 0 0 0.25rem rgba(0, 43, 73, 0.25);
        }

        .input-group .form-control:focus {
            border-color: var(--navy-primary);
            box-shadow: 0 0 0 0.25rem rgba(0, 43, 73, 0.25);
        }

        /* Password strength indicator */
        .password-strength {
            height: 5px;
            margin-top: 5px;
            border-radius: 2px;
            transition: all var(--transition-speed);
        }

        .strength-weak { background-color: #dc3545; width: 25%; }
        .strength-fair { background-color: #ffc107; width: 50%; }
        .strength-good { background-color: #198754; width: 75%; }
        .strength-strong { background-color: #198754; width: 100%; }

        .password-feedback {
            font-size: 0.75rem;
            margin-top: 3px;
        }

        /* Alert styling */
        .custom-alert {
            top: 80px;
            right: 20px;
            z-index: 9999;
            min-width: 300px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
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
            .profile-section {
                padding: 30px 15px;
            }
            .profile-avatar {
                width: 100px;
                height: 100px;
                font-size: 3rem;
            }
            .profile-name {
                font-size: 1.3rem;
            }
            .credential-value {
                font-size: 1rem;
            }
            .custom-alert {
                min-width: 250px;
                right: 10px;
                left: 10px;
            }
        }
        
        @media (max-width: 576px) {
            .btn-save-profile {
                font-size: 0.95rem;
                padding: 10px 25px;
            }
            .profile-section {
                padding: 25px 10px;
            }
            .profile-avatar {
                width: 80px;
                height: 80px;
                font-size: 2.5rem;
                border-width: 3px;
            }
            .profile-name {
                font-size: 1.2rem;
            }
            .profile-role {
                font-size: 0.9rem;
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
            .credential-label {
                font-size: 0.9rem;
            }
            .credential-value {
                font-size: 0.9rem;
                padding: 10px;
            }
            .input-group .btn-outline-secondary {
                padding: 6px 10px;
                font-size: 0.8rem;
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
                    <small class="opacity-75 fw-medium" style="font-size: 0.6rem;">Akun Admin</small>
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
            <a href="#" class="menu-btn active-dashboard"><i class="fas fa-user-lock"></i>Akun Admin</a>
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
            <h4 class="fw-bold" style="color: var(--navy-primary);">Akun Administrator Tunggal</h4>
            <p class="text-muted small">Akun administrator tunggal untuk mengelola seluruh sistem PSB AQBS Ponorogo.</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card-custom">
                    <div class="profile-section">
                        <div class="profile-avatar">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <h3 class="profile-name">Administrator Tunggal</h3>
                        <p class="profile-role">Super Admin PSB AQBS</p>
                    </div>
                    
                    <div class="card-body p-4 text-center">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            Akun administrator tunggal ini memiliki akses penuh ke seluruh sistem PSB AQBS Ponorogo.
                        </div>
                        
                        <button class="btn-save-profile" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                            <i class="fas fa-key me-2"></i> GANTI PASSWORD ADMIN
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card-custom">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4" style="color: var(--navy-primary);">
                            <i class="fas fa-shield-alt me-2"></i>Keamanan Akun
                        </h5>
                        
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-muted small">Login Terakhir</span>
                                <span class="fw-bold">30 Menit yang lalu</span>
                            </div>
                            <small class="text-muted">15 Mei 2026, 16:30 WIB dari 192.168.1.100</small>
                        </div>
                        
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-muted small">Session Aktif</span>
                                <span class="fw-bold">1 Device</span>
                            </div>
                            <small class="text-muted">Browser Chrome di Windows</small>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary">
                                <i class="fas fa-history me-2"></i> Riwayat Login
                            </button>
                            <button class="btn btn-outline-danger">
                                <i class="fas fa-sign-out-alt me-2"></i> Logout Semua Session
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Credentials Section -->
        <div class="card-custom">
            <div class="card-body p-4">
                <div class="credentials-section">
                    <h5>
                        <i class="fas fa-key"></i> Kredensial Akses Administrator Tunggal
                    </h5>
                    <p class="text-muted small mb-4">
                        Akun administrator tunggal ini memiliki akses penuh ke seluruh sistem PSB AQBS Ponorogo. 
                        Simpan kredensial ini dengan aman dan jangan bagikan kepada siapapun.
                    </p>
                    
                    <div class="credential-item">
                        <div class="credential-label">
                            <i class="fas fa-user"></i> Username
                        </div>
                        <div class="credential-value">admin_aqbs_ponorogo</div>
                    </div>
                    
                    <div class="credential-item">
                        <div class="credential-label">
                            <i class="fas fa-lock"></i> Password
                        </div>
                        <div class="credential-value" id="passwordDisplay">
                            ••••••••••••••••
                        </div>
                        <button class="password-toggle" onclick="togglePasswordVisibility()">
                            <i class="fas fa-eye" id="passwordToggleIcon"></i> Tampilkan
                        </button>
                    </div>
                    
                    <div class="credential-item">
                        <div class="credential-label">
                            <i class="fas fa-fingerprint"></i> Level Akses
                        </div>
                        <div class="credential-value">SUPER ADMIN - AKSES PENUH</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <button class="btn btn-outline-danger" onclick="resetAdminPassword()">
                <i class="fas fa-redo me-2"></i> Reset Password Administrator
            </button>
        </div>
    </main>

    <!-- Change Password Modal -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold"><i class="fas fa-key me-2"></i>Ganti Password Administrator</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="changePasswordForm">
                        <div class="mb-3">
                            <label class="form-label">Password Baru</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="newPassword1" placeholder="Masukkan password baru" required>
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword1">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="form-text">Minimal 8 karakter</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Konfirmasi Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="newPassword2" placeholder="Konfirmasi password baru" required>
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword2">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn-save-profile" onclick="saveNewPassword()">Simpan Password Baru</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const toggleBtn = document.getElementById('sidebarToggle');
        const passwordDisplay = document.getElementById('passwordDisplay');
        const passwordToggleIcon = document.getElementById('passwordToggleIcon');

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

        // Password toggle functionality for credential section
        let passwordVisible = false;
        let currentPassword = "AQBS_Ponorogo_2026!"; // Initial password

        function togglePasswordVisibility() {
            passwordVisible = !passwordVisible;
            if (passwordVisible) {
                passwordDisplay.textContent = currentPassword;
                passwordToggleIcon.className = "fas fa-eye-slash";
                document.querySelector('.password-toggle').innerHTML = '<i class="fas fa-eye-slash"></i> Sembunyikan';
            } else {
                passwordDisplay.textContent = "••••••••••••••••";
                passwordToggleIcon.className = "fas fa-eye";
                document.querySelector('.password-toggle').innerHTML = '<i class="fas fa-eye"></i> Tampilkan';
            }
        }

        // Password toggle functionality for modal
        function setupPasswordToggles() {
            const togglePassword1 = document.getElementById('togglePassword1');
            const togglePassword2 = document.getElementById('togglePassword2');
            const newPassword1 = document.getElementById('newPassword1');
            const newPassword2 = document.getElementById('newPassword2');
            
            if (togglePassword1) {
                togglePassword1.addEventListener('click', function() {
                    const type = newPassword1.getAttribute('type') === 'password' ? 'text' : 'password';
                    newPassword1.setAttribute('type', type);
                    this.querySelector('i').classList.toggle('fa-eye');
                    this.querySelector('i').classList.toggle('fa-eye-slash');
                });
            }
            
            if (togglePassword2) {
                togglePassword2.addEventListener('click', function() {
                    const type = newPassword2.getAttribute('type') === 'password' ? 'text' : 'password';
                    newPassword2.setAttribute('type', type);
                    this.querySelector('i').classList.toggle('fa-eye');
                    this.querySelector('i').classList.toggle('fa-eye-slash');
                });
            }
            
            // Add password strength indicator
            if (newPassword1) {
                newPassword1.addEventListener('input', updatePasswordStrength);
            }
        }

        // Update password strength indicator
        function updatePasswordStrength() {
            const password = this.value;
            let strengthBar = document.getElementById('passwordStrengthBar');
            let strengthText = document.getElementById('passwordStrengthText');
            
            if (!strengthBar) {
                // Create strength indicator if it doesn't exist
                const parent = this.parentElement.parentElement;
                const strengthContainer = document.createElement('div');
                strengthContainer.className = 'd-flex flex-column mt-2';
                strengthContainer.innerHTML = `
                    <div id="passwordStrengthBar" class="password-strength"></div>
                    <small id="passwordStrengthText" class="password-feedback"></small>
                `;
                parent.appendChild(strengthContainer);
                
                strengthBar = document.getElementById('passwordStrengthBar');
                strengthText = document.getElementById('passwordStrengthText');
            }
            
            if (password.length === 0) {
                strengthBar.className = 'password-strength';
                strengthBar.style.width = '0%';
                strengthText.textContent = '';
                return;
            }
            
            let strength = 0;
            let feedback = '';
            
            // Length check
            if (password.length >= 8) strength += 25;
            
            // Lowercase check
            if (/[a-z]/.test(password)) strength += 25;
            
            // Uppercase check
            if (/[A-Z]/.test(password)) strength += 25;
            
            // Number/special char check
            if (/[0-9!@#$%^&*(),.?":{}|<>]/.test(password)) strength += 25;
            
            if (strength <= 25) {
                strengthBar.className = 'password-strength strength-weak';
                feedback = 'Password lemah';
            } else if (strength <= 50) {
                strengthBar.className = 'password-strength strength-fair';
                feedback = 'Password cukup';
            } else if (strength <= 75) {
                strengthBar.className = 'password-strength strength-good';
                feedback = 'Password baik';
            } else {
                strengthBar.className = 'password-strength strength-strong';
                feedback = 'Password kuat';
            }
            
            strengthBar.style.width = `${strength}%`;
            strengthText.textContent = feedback;
        }

        // Save new password function (updated with validation)
        function saveNewPassword() {
            const newPassword1 = document.getElementById('newPassword1').value;
            const newPassword2 = document.getElementById('newPassword2').value;
            
            if (!newPassword1 || !newPassword2) {
                showAlert('⚠️ Semua field wajib diisi!', 'warning');
                return;
            }
            
            if (newPassword1.length < 8) {
                showAlert('⚠️ Password minimal 8 karakter!', 'warning');
                return;
            }
            
            if (newPassword1 !== newPassword2) {
                showAlert('⚠️ Password tidak cocok!', 'warning');
                return;
            }
            
            // Strong password validation
            const hasLowercase = /[a-z]/.test(newPassword1);
            const hasUppercase = /[A-Z]/.test(newPassword1);
            const hasNumber = /[0-9]/.test(newPassword1);
            const hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/.test(newPassword1);
            
            if (!(hasLowercase && hasUppercase && hasNumber && hasSpecialChar)) {
                const confirmChange = confirm(
                    'Password Anda tidak mengandung kombinasi karakter yang kuat.\n' +
                    'Disarankan menggunakan kombinasi huruf besar, kecil, angka, dan simbol.\n\n' +
                    'Tetap gunakan password ini?'
                );
                
                if (!confirmChange) {
                    return;
                }
            }
            
            // Update the password
            currentPassword = newPassword1;
            passwordDisplay.textContent = passwordVisible ? currentPassword : "••••••••••••••••";
            
            // Close modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('changePasswordModal'));
            modal.hide();
            
            // Clear form and reset toggles
            document.getElementById('changePasswordForm').reset();
            document.querySelectorAll('#togglePassword1 i, #togglePassword2 i').forEach(icon => {
                icon.className = 'fas fa-eye';
            });
            
            // Reset password type
            document.getElementById('newPassword1').type = 'password';
            document.getElementById('newPassword2').type = 'password';
            
            // Remove strength indicator
            const strengthBar = document.getElementById('passwordStrengthBar');
            if (strengthBar) {
                strengthBar.parentElement.remove();
            }
            
            showAlert('✅ Password administrator berhasil diubah!', 'success');
        }

        // Utility function to show alerts
        function showAlert(message, type) {
            // Remove existing alerts
            document.querySelectorAll('.custom-alert').forEach(alert => alert.remove());
            
            // Create alert element
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type === 'success' ? 'success' : 'warning'} alert-dismissible fade show position-fixed custom-alert`;
            alertDiv.innerHTML = `
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            
            document.body.appendChild(alertDiv);
            
            // Add show class after a small delay
            setTimeout(() => {
                alertDiv.classList.add('show');
            }, 10);
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                if (alertDiv.parentElement) {
                    alertDiv.classList.remove('show');
                    setTimeout(() => alertDiv.remove(), 150);
                }
            }, 5000);
        }

        // Reset password function
        function resetAdminPassword() {
            if (confirm('Apakah Anda yakin ingin mereset password administrator? Password baru akan dikirim ke email yang terdaftar.')) {
                // Generate random password
                const randomPassword = "AQBS_" + Math.random().toString(36).substr(2, 8) + "!";
                currentPassword = randomPassword;
                passwordDisplay.textContent = passwordVisible ? currentPassword : "••••••••••••••••";
                showAlert('✅ Password administrator telah direset! Password baru: ' + randomPassword, 'success');
            }
        }

        // Initialize when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            passwordDisplay.textContent = "••••••••••••••••";
            
            // Setup password toggles when modal is shown
            const changePasswordModal = document.getElementById('changePasswordModal');
            if (changePasswordModal) {
                changePasswordModal.addEventListener('shown.bs.modal', function() {
                    setupPasswordToggles();
                });
            }
            
            // Reset form when modal is hidden
            if (changePasswordModal) {
                changePasswordModal.addEventListener('hidden.bs.modal', function() {
                    document.getElementById('changePasswordForm').reset();
                    document.querySelectorAll('#togglePassword1 i, #togglePassword2 i').forEach(icon => {
                        icon.className = 'fas fa-eye';
                    });
                    document.getElementById('newPassword1').type = 'password';
                    document.getElementById('newPassword2').type = 'password';
                    
                    // Remove strength indicator
                    const strengthBar = document.getElementById('passwordStrengthBar');
                    if (strengthBar) {
                        strengthBar.parentElement.remove();
                    }
                });
            }
        });
    </script>
</body>
</html>