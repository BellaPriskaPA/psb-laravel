<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Berkas - PSB Online</title>
    
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

        /* --- UPLOAD COMPONENTS --- */
        .page-header {
            background: white;
            border-radius: var(--card-radius);
            padding: 20px;
            margin-bottom: 20px;
            border-left: 6px solid var(--orange-primary);
            box-shadow: 0 5px 20px rgba(0, 43, 77, 0.15);
        }

        .upload-card {
            background: white;
            border-radius: var(--card-radius);
            padding: 20px;
            height: 100%;
            box-shadow: 0 4px 10px rgba(0,0,0,0.03);
            border: 1px solid #f0f0f0;
            display: flex;
            flex-direction: column;
            transition: transform 0.2s;
        }
        .upload-card:hover { 
            transform: translateY(-5px); 
            box-shadow: 0 10px 25px rgba(0,0,0,0.08); 
        }
        
        .upload-title {
            font-weight: 700;
            color: var(--navy-primary);
            font-size: 1rem;
            margin-bottom: 15px;
            padding-bottom: 12px;
            border-bottom: 2px dashed #e2e8f0;
            display: flex;
            align-items: center;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .upload-title i { 
            color: var(--orange-primary); 
            margin-right: 10px; 
            background: #fff7ed; 
            padding: 6px; 
            border-radius: 8px; 
            font-size: 1.1rem;
        }
        .upload-title .optional-tag {
            background: #e2e8f0;
            color: #64748b;
            font-size: 0.7rem;
            padding: 2px 8px;
            border-radius: 12px;
            margin-left: auto;
            font-weight: 600;
            text-transform: none;
            letter-spacing: 0;
        }

        /* Area Preview Responsive */
        .preview-box {
            background-color: #f8fafc;
            border: 2px dashed #cbd5e1;
            border-radius: 12px;
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            overflow: hidden;
            position: relative;
            width: 100%;
        }
        .preview-box img { 
            max-width: 100%; 
            max-height: 100%; 
            object-fit: contain; 
            padding: 10px; 
        }
        .preview-placeholder { 
            text-align: center; 
            color: #94a3b8; 
            font-size: 0.9rem; 
        }
        .preview-placeholder i {
            font-size: 2.5rem;
            opacity: 0.25;
            margin-bottom: 8px;
        }
        
        .file-input-wrapper { 
            margin-top: auto; 
        }
        
        .btn-upload {
            background-color: var(--navy-primary); 
            color: white; 
            border: none;
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            font-weight: 600;
            margin-top: 10px;
            transition: 0.2s;
            font-size: 0.9rem;
        }
        .btn-upload:hover { 
            background-color: var(--navy-light); 
        }
        .btn-upload-optional { 
            background-color: #64748b; 
        }
        .btn-upload-optional:hover { 
            background-color: #475569; 
        }

        /* Status badge */
        .status-badge {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            padding: 8px 12px;
            border-radius: 8px;
            font-weight: 600;
        }
        .status-badge i {
            color: #ff9800;
        }

        /* --- MEDIA QUERIES --- */
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
            .page-header {
                padding: 15px;
            }
            .page-header .d-flex {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            .status-badge {
                width: 100%;
                text-align: center;
            }
            .user-dropdown-toggle span { 
                display: none; 
            }
            .preview-box {
                height: 160px;
            }
            .btn-upload {
                padding: 8px;
                font-size: 0.85rem;
            }
            .upload-title .optional-tag {
                font-size: 0.65rem;
                padding: 1px 6px;
            }
        }
        
        @media (max-width: 767px) {
            .main-content {
                padding: 10px;
            }
            .page-header {
                padding: 12px;
            }
            .page-header h3 {
                font-size: 1rem;
            }
            .page-header p {
                font-size: 0.8rem;
            }
            .upload-card {
                padding: 15px;
            }
            .upload-title {
                font-size: 0.95rem;
            }
            .preview-box {
                height: 140px;
            }
            .preview-placeholder i {
                font-size: 2rem;
            }
            .btn-upload {
                padding: 8px;
                font-size: 0.8rem;
            }
            .upload-title .optional-tag {
                font-size: 0.6rem;
                padding: 1px 5px;
            }
        }
        
        @media (min-width: 992px) {
            .row.g-4 {
                --bs-gutter-x: 1.5rem;
                --bs-gutter-y: 1.5rem;
            }
        }
        
        @media (max-width: 575px) {
            .col-12.col-md-6.col-xl-4 {
                flex: 0 0 100%;
                max-width: 100%;
            }
            .preview-box {
                height: 120px;
            }
            .upload-title {
                font-size: 0.9rem;
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
            <a href="#" class="nav-link-custom active"><i class="fas fa-cloud-upload-alt"></i> Upload Berkas</a>
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
        
        <div class="page-header d-flex justify-content-between align-items-center">
            <div>
                <h3 class="fw-bold mb-1">Upload Berkas</h3>
                <p class="mb-0 text-muted small">Format: JPG/PNG/PDF (Max 2MB per file).</p>
            </div>
            <div class="status-badge">
                <small class="text-muted d-block" style="font-size: 0.7rem;">STATUS DOKUMEN</small>
                <span class="fw-bold" id="status-count"><i class="fas fa-exclamation-circle me-1"></i> 0/5 Terupload</span>
            </div>
        </div>

        <div class="row g-4">
            
            <div class="col-12 col-md-6 col-xl-4">
                <div class="upload-card">
                    <div class="upload-title">
                        <i class="fas fa-users"></i> Kartu Keluarga (KK)
                    </div>
                    <div class="preview-box">
                        <div class="preview-placeholder" id="txt-kk">
                            <i class="fas fa-image"></i><br>Preview KK
                        </div>
                        <img src="" id="img-kk" style="display:none;">
                    </div>
                    <div class="file-input-wrapper">
                        <input class="form-control form-control-sm mb-2" type="file" id="file-kk" onchange="previewImage(this, 'img-kk', 'txt-kk')">
                        <button class="btn-upload" onclick="saveImage('kk')"><i class="fas fa-save me-2"></i> Simpan KK</button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-xl-4">
                <div class="upload-card">
                    <div class="upload-title">
                        <i class="fas fa-baby"></i> Akta Kelahiran
                    </div>
                    <div class="preview-box">
                        <div class="preview-placeholder" id="txt-akta">
                            <i class="fas fa-file-contract"></i><br>Preview Akta
                        </div>
                        <img src="" id="img-akta" style="display:none;">
                    </div>
                    <div class="file-input-wrapper">
                        <input class="form-control form-control-sm mb-2" type="file" id="file-akta" onchange="previewImage(this, 'img-akta', 'txt-akta')">
                        <button class="btn-upload" onclick="saveImage('akta')"><i class="fas fa-save me-2"></i> Simpan Akta</button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-xl-4">
                <div class="upload-card">
                    <div class="upload-title">
                        <i class="fas fa-graduation-cap"></i> Ijazah / SKL
                    </div>
                    <div class="preview-box">
                        <div class="preview-placeholder" id="txt-ijazah">
                            <i class="fas fa-certificate"></i><br>Preview Ijazah
                        </div>
                        <img src="" id="img-ijazah" style="display:none;">
                    </div>
                    <div class="file-input-wrapper">
                        <input class="form-control form-control-sm mb-2" type="file" id="file-ijazah" onchange="previewImage(this, 'img-ijazah', 'txt-ijazah')">
                        <button class="btn-upload" onclick="saveImage('ijazah')"><i class="fas fa-save me-2"></i> Simpan Ijazah</button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-xl-4">
                <div class="upload-card">
                    <div class="upload-title">
                        <i class="fas fa-id-card-alt"></i> Kartu KIP 
                        <span class="optional-tag">Opsional</span>
                    </div>
                    <div class="preview-box">
                        <div class="preview-placeholder" id="txt-kip">
                            <i class="fas fa-address-card"></i><br>Preview KIP
                        </div>
                        <img src="" id="img-kip" style="display:none;">
                    </div>
                    <div class="file-input-wrapper">
                        <input class="form-control form-control-sm mb-2" type="file" id="file-kip" onchange="previewImage(this, 'img-kip', 'txt-kip')">
                        <button class="btn-upload btn-upload-optional" onclick="saveImage('kip')"><i class="fas fa-save me-2"></i> Simpan KIP</button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-xl-4">
                <div class="upload-card">
                    <div class="upload-title">
                        <i class="fas fa-heartbeat"></i> BPJS Kesehatan
                        <span class="optional-tag">Opsional</span>
                    </div>
                    <div class="preview-box">
                        <div class="preview-placeholder" id="txt-bpjs">
                            <i class="fas fa-file-medical"></i><br>Preview BPJS
                        </div>
                        <img src="" id="img-bpjs" style="display:none;">
                    </div>
                    <div class="file-input-wrapper">
                        <input class="form-control form-control-sm mb-2" type="file" id="file-bpjs" onchange="previewImage(this, 'img-bpjs', 'txt-bpjs')">
                        <button class="btn-upload btn-upload-optional" onclick="saveImage('bpjs')"><i class="fas fa-save me-2"></i> Simpan BPJS</button>
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

        // Preview Image Logic
        function previewImage(input, imgId, textId) {
            const file = input.files[0];
            const imgElement = document.getElementById(imgId);
            const textElement = document.getElementById(textId);

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imgElement.src = e.target.result;
                    imgElement.style.display = 'block';
                    textElement.style.display = 'none';
                }
                reader.readAsDataURL(file);
            }
        }
        
        // Save image to sessionStorage
        function saveImage(docType) {
            const fileInput = document.getElementById(`file-${docType}`);
            const file = fileInput.files[0];
            
            if (!file) {
                alert('Silakan pilih file terlebih dahulu!');
                return;
            }
            
            // Validate file type
            const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'application/pdf'];
            if (!validTypes.includes(file.type)) {
                alert('Format file tidak valid! Harus JPG, PNG, atau PDF.');
                return;
            }
            
            // Validate file size (2MB)
            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran file terlalu besar! Maksimal 2MB.');
                return;
            }
            
            const reader = new FileReader();
            reader.onload = function(e) {
                // Store in sessionStorage
                sessionStorage.setItem(`uploaded_${docType}`, e.target.result);
                alert('File berhasil disimpan!');
                updateStatusCount();
            };
            reader.readAsDataURL(file);
        }
        
        // Restore saved images on page load
        function restoreSavedImages() {
            const docTypes = ['kk', 'akta', 'ijazah', 'kip', 'bpjs'];
            let uploadedCount = 0;
            
            docTypes.forEach(docType => {
                const savedData = sessionStorage.getItem(`uploaded_${docType}`);
                if (savedData) {
                    uploadedCount++;
                    const imgElement = document.getElementById(`img-${docType}`);
                    const textElement = document.getElementById(`txt-${docType}`);
                    
                    imgElement.src = savedData;
                    imgElement.style.display = 'block';
                    textElement.style.display = 'none';
                }
            });
            
            // Update status count
            const requiredDocs = ['kk', 'akta', 'ijazah'];
            const requiredUploaded = requiredDocs.filter(type => sessionStorage.getItem(`uploaded_${type}`)).length;
            const totalCount = requiredUploaded + (sessionStorage.getItem('uploaded_kip') ? 1 : 0) + (sessionStorage.getItem('uploaded_bpjs') ? 1 : 0);
            
            document.getElementById('status-count').innerHTML = `<i class="fas fa-check-circle me-1" style="color: ${requiredUploaded === 3 ? '#28a745' : '#ff9800'}"></i> ${totalCount}/5 Terupload`;
        }
        
        // Update status count without full restore
        function updateStatusCount() {
            const requiredDocs = ['kk', 'akta', 'ijazah'];
            const requiredUploaded = requiredDocs.filter(type => sessionStorage.getItem(`uploaded_${type}`)).length;
            const totalCount = requiredUploaded + 
                              (sessionStorage.getItem('uploaded_kip') ? 1 : 0) + 
                              (sessionStorage.getItem('uploaded_bpjs') ? 1 : 0);
            
            document.getElementById('status-count').innerHTML = `<i class="fas fa-check-circle me-1" style="color: ${requiredUploaded === 3 ? '#28a745' : '#ff9800'}"></i> ${totalCount}/5 Terupload`;
        }
        
        // Initialize on page load
        window.addEventListener('DOMContentLoaded', restoreSavedImages);
        
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

