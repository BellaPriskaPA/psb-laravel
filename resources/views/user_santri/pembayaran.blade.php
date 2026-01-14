<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - PSB Online</title>
    
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

        /* --- PAYMENT COMPONENTS --- */
        .status-alert {
            background: linear-gradient(135deg, #00bcd4, #00acc1);
            color: white;
            border-radius: var(--card-radius);
            padding: 15px 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
            box-shadow: 0 4px 10px rgba(0, 188, 212, 0.2);
        }
        .status-alert .badge-diterima {
            background-color: #28a745;
            color: white;
            font-weight: 700;
            padding: 6px 15px;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .payment-card {
            background: white;
            border-radius: var(--card-radius);
            border: 1px solid #f0f0f0;
            box-shadow: 0 4px 10px rgba(0,0,0,0.03);
            margin-bottom: 20px;
            overflow: hidden;
        }
        .card-header-clean {
            padding: 20px 25px;
            border-bottom: 1px solid #f0f0f0;
            background: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }
        .card-header-clean h6 {
            font-weight: 700;
            color: var(--navy-primary);
            margin: 0;
            font-size: 1.1rem;
        }

        /* Table Responsive Styles */
        .table-responsive {
            border-radius: 10px;
        }
        .table-custom {
            font-size: 0.9rem;
            margin-bottom: 0;
        }
        .table-custom thead {
            background-color: #42a5f5;
            color: white;
        }
        .table-custom th {
            border: none;
            padding: 15px;
            font-weight: 600;
            white-space: nowrap;
        }
        .table-custom td {
            padding: 15px;
            vertical-align: middle;
            color: #475569;
            border-color: #f8f9fa;
        }

        /* Summary Section */
        .summary-box {
            padding: 20px 25px;
            background-color: #f8fafc;
            border-top: 1px solid #f0f0f0;
        }
        .summary-item {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }
        .summary-label {
            width: 180px;
            font-weight: 600;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .summary-value {
            font-weight: 700;
            color: #1e293b;
        }
        
        .badge-lunas {
            background-color: #28a745;
            color: white;
            padding: 6px 20px;
            border-radius: 8px;
            font-weight: 800;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        /* Buttons */
        .btn-action-group {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        .btn-pay-nav {
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.9rem;
            padding: 8px 18px;
            border: none;
            transition: 0.2s;
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
        }
        .btn-info {
            background-color: #ef4444;
            color: white;
            box-shadow: 0 4px 10px rgba(239, 68, 68, 0.3);
        }
        .btn-info:hover {
            background-color: #dc2626;
            color: white;
            transform: translateY(-2px);
        }
        .btn-add {
            background-color: #5c6bc0;
            color: white;
            box-shadow: 0 4px 10px rgba(92, 107, 192, 0.3);
        }
        .btn-add:hover {
            background-color: #3f51b5;
            color: white;
            transform: translateY(-2px);
        }

        /* Badge styles */
        .badge {
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        .badge.bg-success {
            background-color: #28a745 !important;
            color: white !important;
        }

        /* Button styles */
        .btn {
            font-size: 0.85rem;
            padding: 5px 10px;
            border-radius: 6px;
            cursor: pointer;
        }
        .btn-sm {
            padding: 4px 8px;
        }

        /* Modal Styles */
        .modal-content {
            border-radius: var(--card-radius);
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        .modal-header {
            background: var(--navy-primary);
            color: white;
            border-bottom: none;
            padding: 20px 25px;
        }
        .modal-title {
            font-weight: 600;
            font-size: 1.2rem;
        }
        .modal-body {
            padding: 25px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            font-weight: 600;
            color: #475569;
            margin-bottom: 8px;
        }
        .form-control, .form-select {
            border-radius: 8px;
            padding: 10px 15px;
            border: 1px solid #cbd5e1;
        }
        .btn-modal {
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            transition: 0.2s;
            cursor: pointer;
        }
        .btn-modal-cancel {
            background-color: #f1f5f9;
            color: #64748b;
            border: 1px solid #e2e8f0;
        }
        .btn-modal-cancel:hover {
            background-color: #e2e8f0;
        }
        .btn-modal-submit {
            background-color: var(--orange-primary);
            color: white;
            border: none;
        }
        .btn-modal-submit:hover {
            background-color: var(--orange-hover);
        }
        .payment-instructions {
            background-color: #f8fafc;
            border-left: 4px solid var(--orange-primary);
            padding: 15px;
            border-radius: 0 8px 8px 0;
            margin-top: 15px;
        }
        .payment-instructions h6 {
            color: var(--navy-primary);
            margin-bottom: 10px;
        }
        .payment-instructions ul {
            padding-left: 20px;
            margin-bottom: 0;
        }
        .payment-instructions li {
            margin-bottom: 8px;
            line-height: 1.5;
        }
        .account-details {
            background-color: #f1f5f9;
            padding: 15px;
            border-radius: 8px;
            margin-top: 15px;
        }
        .account-details p {
            margin: 5px 0;
            font-size: 0.95rem;
        }
        .account-details strong {
            color: var(--navy-primary);
        }

        /* --- RESPONSIVE LOGIC --- */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.5);
            z-index: 1025;
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
            
            .summary-label {
                width: 140px;
                font-size: 0.85rem;
            }
            .card-header-clean {
                flex-direction: column;
                align-items: flex-start;
            }
            .btn-action-group {
                width: 100%;
            }
            .btn-pay-nav {
                flex: 1;
                justify-content: center;
            }
            .status-alert {
                padding: 12px 15px;
            }
            .payment-card {
                margin-bottom: 15px;
            }
        }

        @media (max-width: 767px) {
            .main-content {
                padding: 10px;
            }
            .card-header-clean {
                padding: 15px 20px;
            }
            .card-header-clean h6 {
                font-size: 1rem;
            }
            .table-custom th,
            .table-custom td {
                padding: 10px 8px;
                font-size: 0.85rem;
            }
            .summary-box {
                padding: 15px 20px;
            }
            .summary-item {
                font-size: 0.9rem;
            }
            .btn-pay-nav {
                font-size: 0.85rem;
                padding: 6px 15px;
            }
            .modal-body {
                padding: 20px 15px;
            }
        }

        @media (max-width: 575px) {
            .status-alert {
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
                gap: 10px;
            }
            .summary-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 2px;
                margin-bottom: 15px;
            }
            .summary-label {
                width: 100%;
            }
            .summary-value {
                padding-left: 0;
            }
            .table-responsive {
                font-size: 0.8rem;
            }
            .table-custom thead {
                display: none;
            }
            .table-custom,
            .table-custom tbody,
            .table-custom tr,
            .table-custom td {
                display: block;
                width: 100%;
            }
            .table-custom tr {
                margin-bottom: 15px;
                border: 1px solid #f0f0f0;
                border-radius: 8px;
                padding: 10px;
            }
            .table-custom td {
                text-align: left;
                padding: 6px 0;
                position: relative;
                border: none;
            }
            .table-custom td:before {
                content: attr(data-label) ": ";
                font-weight: 600;
                color: #64748b;
                float: left;
                width: 40%;
            }
            .table-custom td:after {
                clear: both;
                display: block;
            }
            .text-center {
                text-align: left !important;
            }
            .text-end {
                text-align: left !important;
            }
            .btn-action-group {
                flex-direction: column;
                gap: 8px;
            }
            .btn-pay-nav {
                width: 100%;
            }
            .modal-header {
                padding: 15px 20px;
            }
            .modal-title {
                font-size: 1.1rem;
            }
            .btn-modal {
                width: 100%;
                justify-content: center;
            }
            .btn-action-group .btn-modal {
                width: auto;
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
            <a href="#" class="nav-link-custom"><i class="fas fa-file-contract"></i> Surat Pernyataan</a>
        </nav>

        <div class="menu-category">Informasi</div>
        <nav class="nav flex-column">
            <a href="#" class="nav-link-custom active"><i class="fas fa-wallet"></i> Pembayaran</a>
            <a href="#" class="nav-link-custom"><i class="fas fa-bullhorn"></i> Pengumuman</a>
        </nav>

        <div class="mt-auto pt-5">
            <a href="#" class="btn btn-outline-light w-100 rounded-pill btn-sm opacity-75">
                <i class="fas fa-sign-out-alt me-2"></i> Log Out
            </a>
        </div>
    </aside>

    <main class="main-content">
        
        <div class="status-alert">
            <div class="d-flex align-items-center flex-wrap gap-2">
                <span class="fw-bold">Status Pendaftaran:</span>
                <span class="badge-diterima">Diterima</span>
            </div>
            <span class="small opacity-90">- Silakan lakukan pembayaran daftar ulang</span>
        </div>

        <div class="payment-card">
            <div class="card-header-clean">
                <h6>Rincian Biaya Daftar Ulang</h6>
                <div class="text-muted small">Total Biaya: <span class="text-dark fw-bold">Rp 150.000</span></div>
            </div>
            <div class="table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th class="text-center" width="80">#</th>
                            <th>Nama Komponen Biaya</th>
                            <th class="text-end">Jumlah (Rp)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="fw-500">Biaya Pendaftaran Santriwati Baru</td>
                            <td class="text-end fw-bold text-dark">150.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="payment-card">
            <div class="card-header-clean">
                <h6>Riwayat Pembayaran</h6>
                <div class="btn-action-group">
                    <button class="btn-pay-nav btn-info" data-bs-toggle="modal" data-bs-target="#infoBayarModal">
                        <i class="fas fa-info-circle"></i> Info Bayar
                    </button>
                    <button class="btn-pay-nav btn-add" data-bs-toggle="modal" data-bs-target="#tambahBayarModal">
                        <i class="fas fa-plus"></i> Tambah Bayar
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Kode Transaksi</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                            <th class="text-center">Verifikasi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center" data-label="#">1</td>
                            <td class="fw-bold text-primary" data-label="Kode Transaksi">202512020001</td>
                            <td class="fw-bold" data-label="Jumlah">Rp 150.000</td>
                            <td data-label="Tanggal">02 Des 2025</td>
                            <td class="text-center" data-label="Verifikasi">
                                <span class="badge bg-success rounded-pill px-3 py-2 small">Berhasil diverifikasi</span>
                            </td>
                            <td class="text-center" data-label="Aksi">
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-sm btn-outline-primary rounded-circle" title="Lihat Bukti" onclick="lihatBukti()">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-warning rounded-circle" title="Cetak Kuitansi" onclick="cetakKuitansi()">
                                        <i class="fas fa-print"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="summary-box">
                <div class="summary-item">
                    <div class="summary-label">TOTAL PEMBAYARAN</div>
                    <div class="summary-value">: Rp 150.000</div>
                </div>
                <div class="summary-item">
                    <div class="summary-label">SISA TAGIHAN</div>
                    <div class="summary-value">: Rp 0</div>
                </div>
                <div class="summary-item mt-3">
                    <div class="summary-label">STATUS AKHIR</div>
                    <div class="summary-value d-flex align-items-center">
                        <span class="me-2">:</span> <span class="badge-lunas">SUDAH LUNAS</span>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- Info Bayar Modal -->
    <div class="modal fade" id="infoBayarModal" tabindex="-1" aria-labelledby="infoBayarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoBayarModalLabel">Informasi Pembayaran</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Berikut adalah informasi rekening yang dapat digunakan untuk pembayaran biaya pendaftaran:</p>
                    
                    <div class="account-details">
                        <p><strong>Bank Syariah Indonesia (BSI)</strong></p>
                        <p>No. Rekening: <strong>9876543210</strong></p>
                        <p>a.n. <strong>Yayasan Pondok Pesantren AQBS Ponorogo</strong></p>
                    </div>
                    
                    <div class="payment-instructions">
                        <h6><i class="fas fa-exclamation-circle me-2"></i>Petunjuk Pembayaran:</h6>
                        <ul>
                            <li>Lakukan transfer ke rekening di atas sesuai dengan jumlah tagihan</li>
                            <li>Simpan bukti transfer (struk ATM/internet banking/screenshot)</li>
                            <li>Upload bukti pembayaran melalui menu "Tambah Bayar"</li>
                            <li>Verifikasi akan diproses dalam 1x24 jam kerja</li>
                        </ul>
                    </div>
                    
                    <div class="mt-4 text-center">
                        <button type="button" class="btn btn-modal btn-modal-cancel" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambah Bayar Modal -->
    <div class="modal fade" id="tambahBayarModal" tabindex="-1" aria-labelledby="tambahBayarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahBayarModalLabel">Tambah Pembayaran</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Jumlah Pembayaran (Rp)</label>
                        <input type="number" class="form-control" id="jumlahPembayaran" placeholder="Masukkan jumlah pembayaran" min="10000" value="150000">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Tanggal Pembayaran</label>
                        <input type="date" class="form-control" id="tanggalPembayaran" value="2025-12-02">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Metode Pembayaran</label>
                        <select class="form-select" id="metodePembayaran">
                            <option value="transfer">Transfer Bank</option>
                            <option value="va">Virtual Account</option>
                            <option value="ewallet">E-Wallet</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Upload Bukti Pembayaran</label>
                        <input class="form-control" type="file" id="buktiPembayaran" accept="image/*,.pdf">
                        <div class="form-text">Format: JPG, PNG, atau PDF (Maks. 2MB)</div>
                    </div>
                    
                    <div class="d-flex gap-2 mt-4">
                        <button type="button" class="btn btn-modal btn-modal-cancel" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-modal btn-modal-submit" id="submitPembayaran">Simpan Pembayaran</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar Toggle
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

        // Update tahun untuk input tanggal
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('tanggalPembayaran').value = today;
        });

        // Modal button actions
        document.getElementById('submitPembayaran').addEventListener('click', function() {
            const jumlah = document.getElementById('jumlahPembayaran').value;
            const tanggal = document.getElementById('tanggalPembayaran').value;
            const metode = document.getElementById('metodePembayaran').value;
            const file = document.getElementById('buktiPembayaran').files[0];
            
            if (!jumlah || jumlah <= 0) {
                alert('Harap masukkan jumlah pembayaran yang valid!');
                return;
            }
            
            if (!tanggal) {
                alert('Harap pilih tanggal pembayaran!');
                return;
            }
            
            if (!file) {
                alert('Harap upload bukti pembayaran!');
                return;
            }
            
            // Validasi ukuran file (maks 2MB)
            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran file terlalu besar. Maksimal 2MB!');
                return;
            }
            
            // Validasi tipe file
            const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'application/pdf'];
            if (!allowedTypes.includes(file.type)) {
                alert('Format file tidak didukung! Harap upload JPG, PNG, atau PDF.');
                return;
            }
            
            alert('Pembayaran berhasil disimpan! Bukti pembayaran akan diverifikasi oleh admin dalam 1x24 jam.');
            
            // Reset form
            document.getElementById('jumlahPembayaran').value = '150000';
            document.getElementById('tanggalPembayaran').value = new Date().toISOString().split('T')[0];
            document.getElementById('metodePembayaran').value = 'transfer';
            document.getElementById('buktiPembayaran').value = '';
            
            // Tutup modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('tambahBayarModal'));
            modal.hide();
        });

        // Fungsi untuk tombol aksi
        function lihatBukti() {
            alert('Membuka bukti pembayaran...\nKode: 202512020001\nJumlah: Rp 150.000\nTanggal: 02 Des 2025\nStatus: Berhasil diverifikasi');
        }
        
        function cetakKuitansi() {
            alert('Mencetak kuitansi untuk transaksi 202512020001...\nSilakan periksa printer Anda atau simpan sebagai PDF.');
        }

        // Dropdown user functionality
        document.querySelector('.user-dropdown-toggle').addEventListener('click', function(e) {
            e.preventDefault();
            // Bootstrap akan menangani dropdown secara otomatis
        });

        // Add active class to clicked nav items
        document.querySelectorAll('.nav-link-custom').forEach(item => {
            item.addEventListener('click', function() {
                document.querySelectorAll('.nav-link-custom').forEach(nav => nav.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Responsive table data labels
        function setupTableResponsive() {
            if (window.innerWidth <= 575) {
                const table = document.querySelector('.table-custom');
                const headers = [];
                table.querySelectorAll('thead th').forEach(th => {
                    headers.push(th.textContent);
                });
                
                table.querySelectorAll('tbody tr').forEach(tr => {
                    tr.querySelectorAll('td').forEach((td, index) => {
                        if (headers[index]) {
                            td.setAttribute('data-label', headers[index]);
                        }
                    });
                });
            }
        }

        // Initialize on load
        document.addEventListener('DOMContentLoaded', setupTableResponsive);
        window.addEventListener('resize', setupTableResponsive);
    </script>
</body>
</html>