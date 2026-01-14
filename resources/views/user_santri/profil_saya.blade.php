<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - PSB Online</title>
    
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
            color: white; 
            text-decoration: none; 
            display: flex; 
            align-items: center; 
            padding: 5px 12px; 
            border-radius: 50px; 
            background: rgba(255,255,255,0.1); 
            transition: 0.2s; 
        }
        .user-dropdown-toggle:hover { 
            background: rgba(255,255,255,0.2); 
        }

        /* --- SIDEBAR (NAVY) --- */
        .sidebar { 
            width: var(--sidebar-width); 
            background: var(--navy-primary); 
            position: fixed; 
            top: 70px; 
            bottom: 0; 
            left: 0; 
            z-index: 1035; 
            padding: 20px 15px; 
            transition: transform 0.3s ease-in-out; 
            border-right: 1px solid rgba(255,255,255,0.05); 
            overflow-y: auto;
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

        /* --- MAIN CONTENT --- */
        .main-content { 
            margin-left: var(--sidebar-width); 
            margin-top: 70px; 
            padding: 20px; 
            min-height: calc(100vh - 70px); 
            transition: margin-left 0.3s; 
        }

        /* --- PROFILE COMPONENTS --- */
        .profile-header-card {
            background: linear-gradient(135deg, var(--navy-primary), var(--navy-light));
            color: white;
            border-radius: var(--card-radius);
            padding: 30px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 25px;
            box-shadow: 0 10px 20px rgba(0, 43, 77, 0.1);
            border-left: 6px solid var(--orange-primary);
        }

        .profile-avatar-wrapper {
            position: relative;
            width: 120px;
            height: 120px;
        }

        .profile-avatar {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid rgba(255,255,255,0.2);
        }

        .avatar-edit-btn {
            position: absolute;
            bottom: 5px;
            right: 5px;
            background: var(--orange-primary);
            color: white;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid white;
            font-size: 0.8rem;
            cursor: pointer;
            transition: 0.2s;
        }
        .avatar-edit-btn:hover { 
            background: var(--orange-hover); 
            transform: scale(1.1); 
        }

        .info-card {
            background: white;
            border-radius: var(--card-radius);
            padding: 25px;
            border: none;
            box-shadow: 0 4px 10px rgba(0,0,0,0.03);
            height: 100%;
        }

        .info-title {
            font-weight: 700;
            color: var(--navy-primary);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.1rem;
        }
        .info-title i {
            color: var(--orange-primary);
        }

        .form-label { 
            font-size: 0.8rem; 
            font-weight: 600; 
            color: #888; 
            text-transform: uppercase; 
            margin-bottom: 4px;
            letter-spacing: 0.5px;
        }
        .form-control-plaintext { 
            font-weight: 600; 
            color: #333; 
            padding-top: 0; 
            padding-bottom: 10px; 
            border-bottom: 1px solid #f0f0f0; 
            margin-bottom: 15px; 
        }

        .btn-update {
            background-color: var(--navy-primary);
            color: white;
            border-radius: 50px;
            padding: 10px 25px;
            font-weight: 600;
            border: none;
            transition: 0.3s;
            box-shadow: 0 4px 10px rgba(0, 43, 77, 0.2);
        }
        .btn-update:hover { 
            background-color: var(--navy-light); 
            transform: translateY(-2px); 
            color: white; 
        }

        /* Badge styles */
        .badge {
            padding: 6px 12px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .badge.bg-success {
            background-color: #28a745 !important;
            color: white !important;
        }

        /* Alert styles */
        .alert {
            padding: 12px 15px;
            border-radius: 8px;
            font-size: 0.85rem;
        }

        /* Responsive */
        .sidebar-overlay { 
            display: none; 
            position: fixed; 
            inset: 0; 
            background: rgba(0,0,0,0.5); 
            z-index: 1032; 
        }
        
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
            .profile-header-card { 
                flex-direction: column; 
                text-align: center; 
                padding: 25px;
                gap: 20px;
            }
            .profile-header-card h2 {
                font-size: 1.4rem;
            }
            .profile-avatar-wrapper {
                width: 100px;
                height: 100px;
            }
        }
        
        @media (max-width: 767px) {
            .main-content {
                padding: 10px;
            }
            .profile-header-card {
                padding: 20px;
            }
            .info-card {
                padding: 20px;
            }
            .profile-header-card h2 {
                font-size: 1.3rem;
            }
            .profile-header-card p {
                font-size: 0.9rem;
            }
            .btn-update {
                padding: 8px 20px;
                font-size: 0.9rem;
            }
            .row.g-4 {
                --bs-gutter-x: 1rem;
                --bs-gutter-y: 1rem;
            }
        }
        
        @media (max-width: 575px) {
            .col-lg-7, .col-lg-5 {
                flex: 0 0 100%;
                max-width: 100%;
            }
            .profile-header-card {
                gap: 15px;
            }
            .profile-avatar-wrapper {
                width: 80px;
                height: 80px;
            }
            .info-card {
                margin-bottom: 20px;
            }
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
                        <li><a class="dropdown-item" href="{{ route('santri.profil') }}"><i class="fas fa-user me-2 text-muted"></i> Profil Saya</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><form action="{{ route('santri.logout') }}" method="POST" style="display: inline;"><a class="dropdown-item text-danger fw-bold" onclick="this.closest('form').submit(); return false;"><i class="fas fa-sign-out-alt me-2"></i> Keluar</a>@csrf</form></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <aside class="sidebar" id="sidebar">
        <div class="menu-category">Menu Utama</div>
        <nav class="nav flex-column">
            <a href="{{ route('santri.dashboard') }}" class="nav-link-custom"><i class="fas fa-th-large"></i> Dashboard</a>
            <a href="{{ route('santri.formulir') }}" class="nav-link-custom"><i class="fas fa-file-signature"></i> Formulir Data</a>
            <a href="{{ route('santri.upload') }}" class="nav-link-custom"><i class="fas fa-cloud-upload-alt"></i> Upload Berkas</a>
            <a href="{{ route('santri.kartu') }}" class="nav-link-custom"><i class="fas fa-id-card"></i> Kartu Pendaftaran</a>
            <a href="{{ route('santri.pernyataan') }}" class="nav-link-custom"><i class="fas fa-file-contract"></i> Surat Pernyataan</a>
        </nav>
        <div class="menu-category">Informasi</div>
        <nav class="nav flex-column">
            <a href="{{ route('santri.pembayaran') }}" class="nav-link-custom"><i class="fas fa-wallet"></i> Pembayaran</a>
            <a href="{{ route('santri.pengumuman') }}" class="nav-link-custom"><i class="fas fa-bullhorn"></i> Pengumuman</a>
        </nav>

        <div class="mt-auto pt-5">
            <form action="{{ route('santri.logout') }}" method="POST">
                <button type="submit" class="btn btn-outline-light w-100 rounded-pill btn-sm opacity-75 border-0">
                    <i class="fas fa-sign-out-alt me-2"></i> Log Out
                </button>
                @csrf
            </form>
        </div>
    </aside>

    <main class="main-content">
        
        <div class="profile-header-card">
            <div class="profile-avatar-wrapper">
                <img src="https://via.placeholder.com/150" class="profile-avatar" alt="User Photo">
                <label class="avatar-edit-btn" title="Ganti Foto">
                    <i class="fas fa-camera"></i>
                </label>
            </div>
            <div>
                <h2 class="fw-bold mb-1">Bebelll4</h2>
                <p class="mb-2 opacity-75"><i class="fas fa-id-badge me-2"></i>ID Pendaftaran: PPDB2025008</p>
                <span class="badge bg-success">Akun Santri Aktif</span>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-7">
                <div class="info-card">
                    <div class="info-title">
                        <i class="fas fa-user-circle"></i> Detail Informasi Akun
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Username / Nama</label>
                            <div class="form-control-plaintext">Bebelll4</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email Terdaftar</label>
                            <div class="form-control-plaintext">bebelll4@student.com</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Bergabung</label>
                            <div class="form-control-plaintext">18 Desember 2025</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status Pendaftaran</label>
                            <div class="form-control-plaintext text-success">TERVERIFIKASI</div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="alert alert-warning border-0 mb-0">
                                <i class="fas fa-info-circle me-2"></i> Data pendaftaran di atas diisi melalui menu <strong>Formulir Data</strong> dan hanya dapat diubah oleh Admin pusat.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="info-card">
                    <div class="info-title">
                        <i class="fas fa-shield-alt"></i> Keamanan Akun
                    </div>
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Kata Sandi Saat Ini</label>
                            <input type="password" class="form-control" placeholder="••••••••">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kata Sandi Baru</label>
                            <input type="password" class="form-control" placeholder="Minimal 8 karakter">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Konfirmasi Kata Sandi Baru</label>
                            <input type="password" class="form-control" placeholder="Ulangi kata sandi baru">
                        </div>
                        <button type="submit" class="btn btn-update w-100">
                            <i class="fas fa-key me-2"></i> Perbarui Kata Sandi
                        </button>
                    </form>
                </div>
            </div>
        </div>

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

