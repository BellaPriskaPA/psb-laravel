<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pernyataan - PSB Online</title>
    
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

        /* --- SURAT PREVIEW STYLES --- */
        .paper-preview {
            background-color: white;
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border-radius: 4px;
            position: relative;
            color: black;
            font-family: 'Times New Roman', Times, serif;
            line-height: 1.6;
            border: 1px solid #f0f0f0;
        }

        .surat-header { 
            text-align: center; 
            border-bottom: 3px double #000; 
            padding-bottom: 20px; 
            margin-bottom: 30px; 
        }
        .surat-header h4 { 
            margin: 0; 
            font-weight: 800; 
            text-transform: uppercase; 
            font-size: 1.2rem;
        }
        .surat-header p { 
            margin: 5px 0 0 0; 
            font-size: 0.9rem; 
            font-style: italic; 
        }

        .surat-title { 
            text-align: center; 
            text-decoration: underline; 
            font-weight: bold; 
            margin-bottom: 25px; 
            text-transform: uppercase; 
            letter-spacing: 1px;
            font-size: 1.1rem;
        }

        .data-list { 
            width: 100%; 
            margin: 20px 0; 
            border-collapse: collapse;
        }
        .data-list td { 
            padding: 8px 0; 
            vertical-align: top;
        }
        .data-label { 
            width: 200px; 
            font-weight: bold;
            min-width: 150px;
        }

        .btn-print-fixed {
            background-color: var(--orange-primary);
            color: white;
            padding: 12px 25px;
            border-radius: 50px;
            border: none;
            font-weight: 700;
            box-shadow: 0 5px 15px rgba(255, 127, 0, 0.4);
            transition: 0.3s;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.95rem;
            width: 100%;
            justify-content: center;
        }
        .btn-print-fixed:hover { 
            background-color: var(--orange-hover); 
            transform: translateY(-2px); 
            color: white; 
        }

        /* Signature section - Fixed layout */
        .signature-section {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }
        .signature-box {
            flex: 1;
            text-align: center;
        }
        .signature-line {
            height: 60px;
            border-bottom: 1px solid #000;
            margin: 10px 0 5px 0;
        }

        /* --- PRINT LOGIC --- */
        @media print {
            body { 
                background: white; 
                padding: 0; 
                margin: 0;
            }
            .navbar-custom, 
            .sidebar, 
            .btn-print-fixed, 
            .main-content > h4, 
            .sidebar-overlay,
            .print-instructions {
                display: none !important; 
            }
            .main-content { 
                margin-left: 0 !important; 
                padding: 0 !important; 
            }
            .paper-preview { 
                box-shadow: none; 
                border: none; 
                padding: 40px;
                max-width: 100%; 
                margin: 0 auto;
                page-break-inside: avoid;
            }
            .signature-section {
                display: flex !important;
                justify-content: space-between !important;
                page-break-inside: avoid;
            }
            .signature-box {
                flex: 1 !important;
                text-align: center !important;
            }
            /* Ensure single page */
            html, body {
                height: auto !important;
            }
        }

        /* Responsive Sidebar */
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
            .paper-preview { 
                padding: 30px 20px;
                margin: 0 5px;
            }
            .btn-print-fixed {
                width: 100%;
                font-size: 0.9rem;
                padding: 10px 20px;
            }
        }
        
        @media (max-width: 767px) {
            .paper-preview {
                padding: 25px 15px;
            }
            .surat-header h4 {
                font-size: 1.1rem;
            }
            .surat-header p {
                font-size: 0.85rem;
            }
            .surat-title {
                font-size: 1rem;
            }
            .data-label {
                width: 140px;
                font-size: 0.9rem;
            }
            .data-list td {
                padding: 6px 0;
            }
            /* Keep signature side by side on mobile */
            .signature-section {
                flex-direction: row;
                gap: 15px;
            }
            .signature-box {
                flex: 1;
            }
            .signature-box p {
                font-size: 0.9rem;
                margin: 2px 0;
            }
        }
        
        @media (max-width: 575px) {
            .paper-preview {
                padding: 20px 10px;
            }
            .surat-header h4 {
                font-size: 1rem;
            }
            .surat-header p {
                font-size: 0.8rem;
            }
            .surat-title {
                font-size: 0.95rem;
            }
            .data-label {
                min-width: 120px;
                font-size: 0.85rem;
            }
            .data-list td {
                display: flex;
                flex-wrap: wrap;
                padding: 5px 0;
            }
            .data-label {
                flex: 0 0 120px;
                margin-right: 10px;
            }
            .data-list td:not(.data-label) {
                flex: 1;
                min-width: 150px;
            }
            ol {
                padding-left: 15px;
            }
            ol li {
                font-size: 0.95rem;
                margin-bottom: 8px;
            }
            p {
                font-size: 0.95rem;
                margin-bottom: 12px;
            }
            .signature-section {
                margin-top: 40px;
                gap: 10px;
            }
            .signature-box p {
                font-size: 0.85rem;
                margin: 1px 0;
            }
        }
        
        @media (max-width: 480px) {
            .paper-preview {
                padding: 15px 8px;
            }
            .signature-section {
                margin-top: 35px;
                gap: 8px;
            }
            .signature-box p {
                font-size: 0.8rem;
            }
        }
        
        .print-instructions {
            margin-top: 15px;
            font-size: 0.85rem;
            color: #666;
            text-align: center;
        }
        
        /* Ensure single page printing */
        @page {
            size: A4;
            margin: 0;
        }
        
        /* Force content to fit on one page */
        @media print {
            html, body {
                width: 210mm;
                height: 297mm;
            }
            .paper-preview {
                font-size: 12pt;
                line-height: 1.5;
            }
        }
        
        /* Hide scrollbar in print preview */
        @media print {
            * {
                -webkit-print-color-adjust: exact !important;
                color-adjust: exact !important;
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
            <a href="#" class="nav-link-custom"><i class="fas fa-file-signature"></i> Formulir Data</a>
            <a href="#" class="nav-link-custom"><i class="fas fa-cloud-upload-alt"></i> Upload Berkas</a>
            <a href="#" class="nav-link-custom"><i class="fas fa-id-card"></i> Kartu Pendaftaran</a>
            <a href="#" class="nav-link-custom active"><i class="fas fa-file-contract"></i> Surat Pernyataan</a>
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
        
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <h4 class="fw-bold text-navy-primary mb-0">Preview Surat Pernyataan</h4>
            <button class="btn-print-fixed" onclick="window.print()">
                <i class="fas fa-print"></i> Cetak / Simpan sebagai PDF
            </button>
        </div>

        <div class="paper-preview">
            <div class="surat-header">
                <h4>'AISYIYAH QUR'ANIC BOARDING SCHOOL</h4>
                <p>Alamat: Jl. Raya Ponorogo, Jawa Timur. Telp: (0352) 123456</p>
                <p>Email: admin@aqbs-psb.sch.id | Website: www.aqbs-psb.sch.id</p>
            </div>

            <h5 class="surat-title">SURAT PERNYATAAN KESANGGUPAN SANTRIWATI</h5>

            <p>Saya yang bertanda tangan di bawah ini:</p>
            
            <table class="data-list">
                <tr><td class="data-label">Nama Lengkap</td><td>: <strong>Bebelll4</strong></td></tr>
                <tr><td class="data-label">Nomor Pendaftaran</td><td>: PPDB2025008</td></tr>
                <tr><td class="data-label">NISN</td><td>: 1234567789</td></tr>
                <tr><td class="data-label">Asal Sekolah</td><td>: SMP Negeri 1 Ponorogo</td></tr>
                <tr><td class="data-label">Nama Orang Tua/Wali</td><td>: Nani</td></tr>
            </table>

            <p style="text-align: justify;">
                Dengan ini menyatakan dengan sesungguhnya bahwa apabila saya diterima menjadi Santriwati Baru di 
                <strong>'Aisyiyah Qur'anic Boarding School (AQBS) Ponorogo</strong> Tahun Pelajaran 2026/2027, saya sanggup dan bersedia:
            </p>

            <ol>
                <li>Mentaati seluruh peraturan dan tata tertib yang berlaku di dalam pondok maupun di sekolah.</li>
                <li>Menghormati Bapak/Ibu Guru, Musyrif/ah, dan seluruh Civitas Akademika AQBS.</li>
                <li>Mengikuti seluruh rangkaian kegiatan belajar mengajar dan kegiatan kepondokan dengan disiplin.</li>
                <li>Tidak membawa alat komunikasi (Handphone) atau barang elektronik lainnya tanpa izin resmi.</li>
                <li>Menerima sanksi apapun sesuai ketentuan yang berlaku apabila saya melanggar pernyataan di atas.</li>
            </ol>

            <p>Demikian surat pernyataan ini saya buat dengan sebenarnya tanpa paksaan dari pihak manapun.</p>

            <div class="signature-section">
                <div class="signature-box">
                    <p>Ponorogo, 05 Januari 2026</p>
                    <p>Mengetahui,</p>
                    <p>Orang Tua / Wali Santri</p>
                    <div class="signature-line"></div>
                    <p><strong>( Nani )</strong></p>
                </div>
                <div class="signature-box">
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>Hormat Saya,</p>
                    <div class="signature-line"></div>
                    <p><strong>( Bebelll4 )</strong></p>
                </div>
            </div>
        </div>

        <div class="print-instructions">
            <i class="fas fa-info-circle me-1"></i> Klik tombol "Cetak / Simpan sebagai PDF" untuk menyimpan dokumen ini
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
        
        // Optimize for single page print
        window.onbeforeprint = function() {
            // Ensure the content fits on one page by adjusting font sizes if needed
            const paper = document.querySelector('.paper-preview');
            paper.style.fontSize = '12pt';
            paper.style.lineHeight = '1.5';
        };
    </script>
</body>
</html>

