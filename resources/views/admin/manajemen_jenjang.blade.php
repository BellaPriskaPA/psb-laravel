<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Jenjang - Admin PSB AQBS</title>
    
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

        /* --- SIDEBAR NAVY (Full Menu) --- */
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

        /* --- TABLE STYLING --- */
        .card-table {
            background: white;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            overflow: hidden;
            margin-top: 20px;
            transition: var(--transition-speed);
        }
        .card-table:hover {
            box-shadow: 0 6px 20px rgba(0,0,0,0.12);
            transform: translateY(-2px);
        }

        .card-header-blue {
            background-color: var(--blue-info);
            color: white;
            padding: 15px 25px;
            font-weight: 700;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

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

        .badge-jenjang { 
            padding: 6px 14px; 
            border-radius: 8px; 
            font-weight: 700; 
            font-size: 0.75rem; 
            background: #f1f5f9; 
            color: var(--navy-primary); 
            border: 1px solid #e2e8f0;
            display: inline-block;
        }
        .badge-status { 
            padding: 6px 12px; 
            border-radius: 8px; 
            font-weight: 700; 
            font-size: 0.7rem; 
        }

        .btn-action {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition-speed);
            border: 1px solid;
        }
        .btn-edit {
            background: #dbeafe;
            color: #3b82f6;
            border-color: #bfdbfe;
        }
        .btn-edit:hover {
            background: #3b82f6;
            color: white;
            transform: translateY(-2px);
        }
        .btn-delete {
            background: #fee2e2;
            color: #ef4444;
            border-color: #fecaca;
        }
        .btn-delete:hover {
            background: #ef4444;
            color: white;
            transform: translateY(-2px);
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
            padding: 25px;
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
            display: block;
        }
        .form-control, .form-select {
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
        .btn-modal-save {
            background: linear-gradient(135deg, var(--navy-primary), var(--navy-dark));
            color: white;
            border: none;
            padding: 12px 28px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            transition: all var(--transition-speed);
            width: 100%;
        }
        .btn-modal-save:hover {
            background: linear-gradient(135deg, var(--navy-dark), var(--navy-primary));
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.2);
        }
        .btn-modal-cancel {
            background: #e2e8f0;
            color: #64748b;
            border: none;
            padding: 12px 28px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            transition: all var(--transition-speed);
            width: 100%;
        }
        .btn-modal-cancel:hover {
            background: #cbd5e1;
            transform: translateY(-2px);
        }

        /* --- TOAST NOTIFICATION --- */
        .toast-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1100;
        }
        .toast {
            border-radius: 12px;
            border: none;
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }
        .toast-header {
            background: var(--navy-primary);
            color: white;
            border-radius: 12px 12px 0 0 !important;
        }
        .toast-body {
            background: white;
            color: var(--navy-primary);
            font-weight: 600;
        }

        /* --- MOBILE --- */
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
            .card-header-blue {
                flex-direction: column;
                align-items: stretch;
            }
            .table-responsive {
                overflow-x: auto;
            }
            .table th, .table td {
                white-space: nowrap;
                min-width: 120px;
            }
            .modal-dialog {
                margin: 1rem;
                max-width: none;
            }
            .modal-footer {
                flex-direction: column;
                gap: 10px;
            }
            .btn-modal-save, .btn-modal-cancel {
                width: 100%;
            }
        }
        
        @media (max-width: 576px) {
            .badge-jenjang, .badge-status {
                font-size: 0.65rem;
                padding: 4px 8px;
            }
            .btn-action {
                width: 28px;
                height: 28px;
                font-size: 0.8rem;
            }
            .table th, .table td {
                padding: 12px 15px;
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
                    <small class="opacity-75 fw-medium" style="font-size: 0.6rem;">Manajemen Jenjang & Program</small>
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
            <button class="menu-btn active-dashboard"><i class="fas fa-university"></i>Kelembagaan</button>
            <ul class="sub-menu">
                <li><a href="#">Profil Lembaga</a></li>
                <li><a href="#" class="active">Jenjang / Program</a></li>
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

        <div class="menu-category">Data Master</div>
        <div class="menu-group">
            <button class="menu-btn"><i class="fas fa-layer-group"></i>Master Data</button>
            <ul class="sub-menu">
                <li><a href="#">Master Jalur Pendaftaran</a></li>
                <li><a href="#">Master Jenis Daftar</a></li>
            </ul>
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

        <div class="mb-4">
            <h4 class="fw-bold" style="color: var(--navy-primary);">Data Jenjang & Program</h4>
            <p class="text-muted small mb-0">Kelola kuota pendaftaran pendaftar berdasarkan jenjang pendidikan.</p>
        </div>

        <div class="card-table">
            <div class="card-header-blue">
                <span>Daftar Jenjang Aktif</span>
                <input type="text" class="form-control form-control-sm" placeholder="Cari..." style="max-width: 200px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.3);">
            </div>
            
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th width="60" class="text-center">#</th>
                            <th width="150">Jenjang</th>
                            <th class="text-center">Kuota</th>
                            <th class="text-center">Status</th>
                            <th width="120" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="jenjangTableBody">
                        <!-- Table rows will be populated by JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Edit Jenjang Modal -->
    <div class="modal fade" id="editJenjangModal" tabindex="-1" aria-labelledby="editJenjangModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editJenjangModalLabel"><i class="fas fa-edit me-2"></i>Edit Jenjang</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Jenjang Pendidikan</label>
                        <select class="form-select" id="editJenjangSelect">
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Kuota</label>
                        <input type="number" class="form-control" id="editKuotaInput" min="1" placeholder="Masukkan kuota">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select class="form-select" id="editStatusSelect">
                            <option value="AKTIF">AKTIF</option>
                            <option value="NON-AKTIF">NON-AKTIF</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-modal-cancel" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn-modal-save" id="saveEditBtn">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmModalLabel"><i class="fas fa-trash-alt me-2"></i>Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus jenjang "<span id="jenjangToDelete"></span>"? Tindakan ini tidak dapat dibatalkan.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-modal-cancel" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn-modal-save" id="confirmDeleteBtn">Hapus Sekarang</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Toast -->
    <div class="toast-container">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="successToast">
            <div class="toast-header">
                <strong class="me-auto"><i class="fas fa-check-circle me-2"></i>Berhasil!</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" id="toastMessage">
                Perubahan berhasil disimpan!
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize components
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const toggleBtn = document.getElementById('sidebarToggle');
        const jenjangTableBody = document.getElementById('jenjangTableBody');
        const editJenjangModal = new bootstrap.Modal(document.getElementById('editJenjangModal'));
        const deleteConfirmModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
        const successToastEl = document.getElementById('successToast');
        const successToast = new bootstrap.Toast(successToastEl);
        const toastMessage = document.getElementById('toastMessage');
        
        // Current editing/deleting item index
        let currentEditIndex = null;
        let currentDeleteIndex = null;

        // Initial data
        let jenjangData = [
            { jenjang: "SMP", kuota: 80, status: "AKTIF" },
            { jenjang: "SMA", kuota: 40, status: "AKTIF" }
        ];

        // Load data from URL hash if available
        function loadSavedData() {
            const hash = window.location.hash;
            if (hash.startsWith('#data=')) {
                try {
                    const encodedData = hash.substring(6);
                    const decodedData = decodeURIComponent(atob(encodedData));
                    jenjangData = JSON.parse(decodedData);
                } catch (error) {
                    console.error('Error loading saved data:', error);
                }
            }
            renderTable();
        }

        // Save data to URL hash
        function saveData() {
            const dataString = JSON.stringify(jenjangData);
            const encodedData = btoa(encodeURIComponent(dataString));
            window.location.hash = `data=${encodedData}`;
        }

        // Render table with current data
        function renderTable() {
            jenjangTableBody.innerHTML = '';
            jenjangData.forEach((item, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="text-center fw-bold">${index + 1}</td>
                    <td><span class="badge-jenjang">${item.jenjang}</span></td>
                    <td class="text-center fw-bold">${item.kuota}</td>
                    <td class="text-center"><span class="badge-status bg-${item.status === 'AKTIF' ? 'success' : 'secondary'} text-white">${item.status}</span></td>
                    <td class="text-center">
                        <button class="btn-action btn-edit me-1" data-index="${index}"><i class="fas fa-edit"></i></button>
                        <button class="btn-action btn-delete" data-index="${index}"><i class="fas fa-trash"></i></button>
                    </td>
                `;
                jenjangTableBody.appendChild(row);
            });
            
            // Add event listeners to action buttons
            document.querySelectorAll('.btn-edit').forEach(btn => {
                btn.addEventListener('click', handleEditClick);
            });
            document.querySelectorAll('.btn-delete').forEach(btn => {
                btn.addEventListener('click', handleDeleteClick);
            });
        }

        // Handle edit button click
        function handleEditClick(e) {
            const index = parseInt(e.target.closest('.btn-edit').dataset.index);
            currentEditIndex = index;
            const item = jenjangData[index];
            
            document.getElementById('editJenjangSelect').value = item.jenjang;
            document.getElementById('editKuotaInput').value = item.kuota;
            document.getElementById('editStatusSelect').value = item.status;
            
            editJenjangModal.show();
        }

        // Handle delete button click
        function handleDeleteClick(e) {
            const index = parseInt(e.target.closest('.btn-delete').dataset.index);
            currentDeleteIndex = index;
            document.getElementById('jenjangToDelete').textContent = jenjangData[index].jenjang;
            deleteConfirmModal.show();
        }

        // Save edited data
        document.getElementById('saveEditBtn').addEventListener('click', function() {
            if (currentEditIndex !== null) {
                jenjangData[currentEditIndex] = {
                    jenjang: document.getElementById('editJenjangSelect').value,
                    kuota: parseInt(document.getElementById('editKuotaInput').value),
                    status: document.getElementById('editStatusSelect').value
                };
                
                saveData();
                renderTable();
                editJenjangModal.hide();
                
                toastMessage.textContent = 'Data jenjang berhasil diperbarui!';
                successToast.show();
            }
        });

        // Confirm delete
        document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
            if (currentDeleteIndex !== null) {
                jenjangData.splice(currentDeleteIndex, 1);
                saveData();
                renderTable();
                deleteConfirmModal.hide();
                
                toastMessage.textContent = 'Data jenjang berhasil dihapus!';
                successToast.show();
            }
        });

        // Toggle sidebar
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

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            loadSavedData();
        });
    </script>
</body>
</html>

