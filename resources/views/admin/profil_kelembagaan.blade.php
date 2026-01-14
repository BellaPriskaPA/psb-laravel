<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Lembaga - Admin PSB AQBS</title>
    
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

        /* --- SIDEBAR --- */
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

        /* --- MAIN CONTENT --- */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            transition: all var(--transition-speed) ease;
        }

        /* --- TABS & FORMS --- */
        .card-profile {
            background: white;
            border-radius: 20px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            overflow: hidden;
            transition: var(--transition-speed);
        }
        .card-profile:hover {
            box-shadow: 0 6px 20px rgba(0,0,0,0.12);
            transform: translateY(-2px);
        }

        .nav-tabs-profile {
            background: #f8fafc;
            padding: 15px 20px 0;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .nav-tabs-profile .nav-link {
            border: none;
            color: #64748b;
            font-weight: 700;
            padding: 12px 20px;
            font-size: 0.9rem;
            border-radius: 12px 12px 0 0;
            transition: var(--transition-speed);
            min-width: 150px;
            text-align: center;
        }

        .nav-tabs-profile .nav-link:hover {
            background: rgba(0, 43, 73, 0.1);
            color: var(--navy-primary);
        }

        .nav-tabs-profile .nav-link.active {
            background: white;
            color: var(--navy-primary);
            border-bottom: 3px solid var(--navy-primary);
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .form-group-custom {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .label-custom {
            width: 220px;
            font-weight: 700;
            color: #64748b;
            font-size: 0.85rem;
            text-align: right;
            padding-right: 30px;
            text-transform: uppercase;
        }

        .input-box { 
            flex: 1; 
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

        .action-footer {
            background: #f8fafc;
            padding: 20px 40px;
            border-top: 1px solid #e2e8f0;
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        .btn-save { 
            background: linear-gradient(135deg, var(--navy-primary), var(--navy-dark)); 
            color: white; 
            border: none; 
            padding: 12px 28px; 
            border-radius: 12px; 
            font-weight: 600; 
            font-size: 1rem;
            transition: all var(--transition-speed);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-reset { 
            background: #e2e8f0; 
            color: #64748b; 
            border: none; 
            padding: 12px 28px; 
            border-radius: 12px; 
            font-weight: 600; 
            font-size: 1rem;
            transition: all var(--transition-speed);
        }
        .btn-save:hover { 
            background: linear-gradient(135deg, var(--navy-dark), var(--navy-primary));
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.2);
        }
        .btn-reset:hover {
            background: #cbd5e1;
            transform: translateY(-2px);
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
            .form-group-custom { 
                flex-direction: column; 
                align-items: flex-start; 
            }
            .label-custom { 
                width: 100%; 
                text-align: left; 
                padding-right: 0; 
                margin-bottom: 8px; 
            }
            .top-nav-btn span { 
                display: none; 
            }
            .nav-tabs-profile {
                padding: 10px 10px 0;
            }
            .nav-tabs-profile .nav-link {
                padding: 10px 15px;
                font-size: 0.8rem;
                min-width: 120px;
            }
            .action-footer {
                padding: 15px 20px;
                flex-direction: column;
            }
            .btn-save, .btn-reset {
                width: 100%;
                justify-content: center;
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
        }
        
        @media (max-width: 576px) {
            .nav-tabs-profile .nav-link {
                min-width: 100px;
                padding: 8px 12px;
                font-size: 0.75rem;
            }
            .label-custom {
                font-size: 0.8rem;
            }
            .form-control, .form-select {
                font-size: 0.9rem;
            }
        }
        
        /* Modal Styling */
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
            text-align: center;
        }
        .btn-modal-confirm {
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
        .btn-modal-confirm:hover {
            background: linear-gradient(135deg, var(--navy-dark), var(--navy-primary));
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.2);
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
                    <small class="opacity-75 fw-medium" style="font-size: 0.6rem;">Profil Lembaga Pesantren</small>
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
                <li><a href="#" class="active">Profil Lembaga</a></li>
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
            <h4 class="fw-bold" style="color: var(--navy-primary);">Pengaturan Profil Lembaga</h4>
            <p class="text-muted small">Kelola data kelembagaan dan kemitraan akademik di sini.</p>
        </div>

        <div class="card-profile">
            <ul class="nav nav-tabs nav-tabs-profile" id="profileTabs" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#legalitas"><i class="fas fa-certificate me-2"></i>Legalitas</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#akademik"><i class="fas fa-graduation-cap me-2"></i>Akademik</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#domisili"><i class="fas fa-map-marked-alt me-2"></i>Domisili</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#kontak"><i class="fas fa-address-book me-2"></i>Kontak</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#pimpinan"><i class="fas fa-user-tie me-2"></i>Pimpinan</button>
                </li>
            </ul>

            <form id="profileForm">
                <div class="tab-content p-4 p-md-5">
                    <div class="tab-pane fade show active" id="legalitas">
                        <div class="form-group-custom">
                            <label class="label-custom">NPSN</label>
                            <div class="input-box"><input type="text" class="form-control" name="npsn" value="20402448"></div>
                        </div>
                        <div class="form-group-custom">
                            <label class="label-custom">NSPP</label>
                            <div class="input-box"><input type="text" class="form-control" name="nspp" placeholder="Nomor Statistik Pondok Pesantren"></div>
                        </div>
                        <div class="form-group-custom">
                            <label class="label-custom">Izin Operasional</label>
                            <div class="input-box"><input type="text" class="form-control" name="izin_operasional" placeholder="No. SK Izin Operasional"></div>
                        </div>
                        <div class="form-group-custom">
                            <label class="label-custom">Nama Pesantren</label>
                            <div class="input-box"><input type="text" class="form-control" name="nama_pesantren" value="'AISYIYAH QUR'ANIC BOARDING SCHOOL"></div>
                        </div>
                        <div class="form-group-custom">
                            <label class="label-custom">Nama Yayasan</label>
                            <div class="input-box"><input type="text" class="form-control" name="nama_yayasan" value="PIMPINAN DAERAH 'AISYIYAH PONOROGO"></div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="akademik">
                        <div class="form-group-custom">
                            <label class="label-custom">Jenjang Pendidikan</label>
                            <div class="input-box">
                                <select class="form-select" name="jenjang_pendidikan">
                                    <option selected>Kombinasi (SMP & SMA)</option>
                                    <option>SMP (Madrasah Tsanawiyah)</option>
                                    <option>SMA (Madrasah Aliyah)</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group-custom">
                            <label class="label-custom">Akreditasi</label>
                            <div class="input-box">
                                <select class="form-select" name="akreditasi">
                                    <option selected>A (Unggul)</option>
                                    <option>B (Baik)</option>
                                    <option>C (Cukup)</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group-custom">
                            <label class="label-custom">Kurikulum</label>
                            <div class="input-box"><input type="text" class="form-control" name="kurikulum" value="Kemenag & Kepesantrenan Modern"></div>
                        </div>
                        
                        <hr class="my-4 opacity-10">
                        <h6 class="fw-bold" style="color: var(--navy-primary);"><i class="fas fa-handshake me-2"></i>Kemitraan Sekolah</h6>
                        
                        <div class="form-group-custom">
                            <label class="label-custom">Kerja Sama SMP</label>
                            <div class="input-box"><input type="text" class="form-control" name="kerja_sama_smp" placeholder="Nama SMP Mitra"></div>
                        </div>
                        <div class="form-group-custom">
                            <label class="label-custom">Kerja Sama SMA</label>
                            <div class="input-box"><input type="text" class="form-control" name="kerja_sama_sma" placeholder="Nama SMA Mitra"></div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="domisili">
                        <div class="form-group-custom">
                            <label class="label-custom">Alamat Lengkap</label>
                            <div class="input-box"><textarea class="form-control" name="alamat_lengkap" rows="2">Jl. Letjen Suprato, Gg. 2 Ronowijayan, Siman</textarea></div>
                        </div>
                        <div class="form-group-custom">
                            <label class="label-custom">Kabupaten</label>
                            <div class="input-box"><input type="text" class="form-control" name="kabupaten" value="Ponorogo"></div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="kontak">
                        <div class="form-group-custom">
                            <label class="label-custom">No. Telepon</label>
                            <div class="input-box"><input type="text" class="form-control" name="no_telepon" value="085706545216"></div>
                        </div>
                        <div class="form-group-custom">
                            <label class="label-custom">Email Resmi</label>
                            <div class="input-box"><input type="email" class="form-control" name="email_resmi" value="ptq.aisyiyah@gmail.com"></div>
                        </div>
                        <div class="form-group-custom">
                            <label class="label-custom">Website Resmi</label>
                            <div class="input-box"><input type="text" class="form-control" name="website_resmi" value="aqbs-ponpes.id"></div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pimpinan">
                        <div class="form-group-custom">
                            <label class="label-custom">Mudir / Kepala</label>
                            <div class="input-box"><input type="text" class="form-control" name="mudir" value="Al-Ustadz Rifqi Ihsanu Najib, S.Ag, M. Pd"></div>
                        </div>
                        <div class="form-group-custom">
                            <label class="label-custom">NIP / NBM</label>
                            <div class="input-box"><input type="text" class="form-control" name="nip_nbm" value="1308 9623 1493 127"></div>
                        </div>
                    </div>
                </div>

                <div class="action-footer">
                    <button type="reset" class="btn-reset">BATALKAN</button>
                    <button type="submit" class="btn-save">
                        <i class="fas fa-save me-2"></i>SIMPAN PERUBAHAN
                    </button>
                </div>
            </form>
        </div>

    </main>

    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel"><i class="fas fa-save me-2"></i>Konfirmasi Penyimpanan</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="lead mb-4">Apakah Anda yakin ingin menyimpan perubahan pada profil lembaga?</p>
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>Data yang disimpan akan tetap tersedia setelah halaman dimuat ulang.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn-modal-confirm" id="confirmSaveBtn">Ya, Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Toast -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1100;">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="successToast">
            <div class="toast-header bg-success text-white">
                <strong class="me-auto"><i class="fas fa-check-circle me-2"></i>Berhasil!</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Profil lembaga berhasil disimpan!
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize components
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const toggleBtn = document.getElementById('sidebarToggle');
        const profileForm = document.getElementById('profileForm');
        const confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
        const confirmSaveBtn = document.getElementById('confirmSaveBtn');
        const successToastEl = document.getElementById('successToast');
        const successToast = new bootstrap.Toast(successToastEl);

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

        // Handle form submission with confirmation modal
        profileForm.addEventListener('submit', function(e) {
            e.preventDefault();
            confirmationModal.show();
        });

        // Handle actual save when confirmed
        confirmSaveBtn.addEventListener('click', function() {
            // Get all form data
            const formData = new FormData(profileForm);
            const profileData = {};
            
            // Convert FormData to object
            for (let [key, value] of formData.entries()) {
                profileData[key] = value;
            }
            
            // Store data in URL hash (simulates persistent storage)
            const dataString = JSON.stringify(profileData);
            const encodedData = btoa(encodeURIComponent(dataString));
            window.location.hash = `data=${encodedData}`;
            
            // Close modal
            confirmationModal.hide();
            
            // Show success toast
            successToast.show();
            
            // Update form fields with saved data after a short delay
            setTimeout(() => {
                loadSavedData();
            }, 500);
        });

        // Load saved data from URL hash on page load
        function loadSavedData() {
            const hash = window.location.hash;
            if (hash.startsWith('#data=')) {
                try {
                    const encodedData = hash.substring(6);
                    const decodedData = decodeURIComponent(atob(encodedData));
                    const profileData = JSON.parse(decodedData);
                    
                    // Populate form fields with saved data
                    Object.keys(profileData).forEach(key => {
                        const element = profileForm.querySelector(`[name="${key}"]`);
                        if (element) {
                            if (element.type === 'checkbox' || element.type === 'radio') {
                                element.checked = profileData[key] === 'true';
                            } else if (element.tagName === 'SELECT') {
                                element.value = profileData[key];
                            } else {
                                element.value = profileData[key];
                            }
                        }
                    });
                } catch (error) {
                    console.error('Error loading saved data:', error);
                }
            }
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            loadSavedData();
        });

        // Handle reset button to clear saved data
        profileForm.addEventListener('reset', function() {
            // Clear the hash to remove saved data
            window.location.hash = '';
            // Reload default values after a short delay
            setTimeout(() => {
                // Reset to original default values
                document.querySelector('[name="npsn"]').value = "20402448";
                document.querySelector('[name="nama_pesantren"]').value = "'AISYIYAH QUR'ANIC BOARDING SCHOOL";
                document.querySelector('[name="nama_yayasan"]').value = "PIMPINAN DAERAH 'AISYIYAH PONOROGO";
                document.querySelector('[name="alamat_lengkap"]').value = "Jl. Letjen Suprato, Gg. 2 Ronowijayan, Siman";
                document.querySelector('[name="kabupaten"]').value = "Ponorogo";
                document.querySelector('[name="no_telepon"]').value = "085706545216";
                document.querySelector('[name="email_resmi"]').value = "ptq.aisyiyah@gmail.com";
                document.querySelector('[name="website_resmi"]').value = "aqbs-ponpes.id";
                document.querySelector('[name="mudir"]').value = "Al-Ustadz Rifqi Ihsanu Najib, S.Ag, M. Pd";
                document.querySelector('[name="nip_nbm"]').value = "1308 9623 1493 127";
                document.querySelector('[name="kurikulum"]').value = "Kemenag & Kepesantrenan Modern";
                document.querySelector('[name="jenjang_pendidikan"]').value = "Kombinasi (SMP & SMA)";
                document.querySelector('[name="akreditasi"]').value = "A (Unggul)";
            }, 100);
        });
    </script>
</body>
</html>

