<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman - PSB Online</title>
    
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
            --teal-accent: #00acc1;
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
        .user-dropdown-toggle:hover { background: rgba(255,255,255,0.2); }

        /* --- SIDEBAR --- */
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
        .nav-link-custom i { width: 25px; font-size: 1.1rem; margin-right: 10px; text-align: center; }
        
        .nav-link-custom:hover { background-color: var(--navy-light); color: white; transform: translateX(3px); }
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

        /* --- ANNOUNCEMENT CARD --- */
        .announcement-card {
            background: white;
            border-radius: var(--card-radius);
            box-shadow: 0 5px 20px rgba(0, 43, 77, 0.15);
            padding: 25px;
            display: flex;
            gap: 20px;
            border: none;
            margin-bottom: 20px;
            transition: transform 0.3s;
            border-left: 6px solid var(--orange-primary);
        }
        .announcement-card:hover { transform: translateY(-3px); }

        .icon-circle {
            min-width: 55px;
            width: 55px;
            height: 55px;
            background: linear-gradient(135deg, #e0f7fa, #b2ebf2);
            color: var(--teal-accent);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            box-shadow: 0 4px 10px rgba(0, 172, 193, 0.2);
        }

        .announcement-meta { 
            font-size: 0.8rem; 
            color: #5c6bc0; 
            font-weight: 600; 
            margin-bottom: 5px; 
        }
        .announcement-title { 
            font-weight: 700; 
            color: var(--navy-primary); 
            font-size: 1.15rem; 
            margin-bottom: 10px; 
        }
        .announcement-body { 
            font-size: 0.95rem; 
            line-height: 1.6; 
            color: #555; 
        }
        .note-box { 
            background-color: #fff8e1; 
            border-left: 4px solid #ffb300; 
            padding: 10px 15px; 
            margin-top: 15px; 
            font-size: 0.85rem; 
            border-radius: 4px;
        }

        /* --- RESPONSIVE LOGIC --- */
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
            .announcement-card { 
                flex-direction: column; 
                padding: 20px; 
            }
            .user-dropdown-toggle span { 
                display: none; 
            }
        }
        
        @media (max-width: 767px) {
            .main-content {
                padding: 10px;
            }
            .announcement-card {
                padding: 15px;
            }
            .announcement-title {
                font-size: 1.1rem;
            }
            .announcement-body {
                font-size: 0.9rem;
            }
            .icon-circle {
                min-width: 45px;
                width: 45px;
                height: 45px;
                font-size: 1.1rem;
            }
        }
        
        @media (max-width: 575px) {
            .announcement-card {
                gap: 15px;
            }
            .note-box {
                font-size: 0.8rem;
                padding: 8px 12px;
            }
            .announcement-meta {
                font-size: 0.75rem;
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
            <a href="{{ route('santri.pengumuman') }}" class="nav-link-custom active"><i class="fas fa-bullhorn"></i> Pengumuman</a>
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
        
        <div class="announcement-card">
            <div class="icon-circle">
                <i class="fas fa-bullhorn"></i>
            </div>
            <div class="w-100">
                <div class="announcement-meta">24 Mei 2023 • Dilihat 120 kali</div>
                <h4 class="announcement-title">Info Aplikasi</h4>
                <div class="announcement-body">
                    <p class="mb-2">
                        <strong>Gelombang Pertama:</strong> Tanggal 1 Desember 2023 Sampai 30 Mei 2024 <br>
                        <strong>Gelombang Kedua:</strong> Tanggal 1 Juni Sampai Tanggal 30 Juni 2024
                    </p>
                    <div class="note-box">
                        <i class="fas fa-info-circle me-1"></i> <strong>Catatan:</strong> Pendaftaran Gelombang Pertama Gratis Biaya Pendaftaran dan Biaya Daftar Ulang.
                    </div>
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

