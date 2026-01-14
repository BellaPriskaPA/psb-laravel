<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CBT Admin - Panel Ujian Pesantren</title>
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
/* --- CBT BUILDER STYLES --- */
.builder-card {
background: white;
border-radius: 20px;
border: 1px solid #e2e8f0;
box-shadow: 0 4px 12px rgba(0,0,0,0.08);
padding: 24px;
margin-bottom: 24px;
transition: var(--transition-speed);
}
.builder-card:hover {
box-shadow: 0 6px 20px rgba(0,0,0,0.12);
transform: translateY(-2px);
}
.builder-card:focus-within {
border-left: 6px solid var(--navy-primary);
box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}
.btn-custom {
padding: 10px 20px;
border-radius: 12px;
font-weight: 700;
font-size: 0.9rem;
transition: var(--transition-speed);
display: inline-flex;
align-items: center;
gap: 8px;
}
.btn-preview {
background: white;
color: #64748b;
border: 2px solid #e2e8f0;
}
.btn-preview:hover {
background: #f8fafc;
border-color: #cbd5e1;
transform: translateY(-2px);
}
.btn-save-exam {
background: linear-gradient(135deg, var(--navy-primary), var(--navy-dark));
color: white;
border: none;
box-shadow: 0 4px 12px rgba(0, 43, 73, 0.3);
}
.btn-save-exam:hover {
background: linear-gradient(135deg, var(--navy-dark), var(--navy-primary));
transform: translateY(-3px);
box-shadow: 0 6px 20px rgba(0, 43, 73, 0.4);
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
.question-header {
display: flex;
justify-content: space-between;
align-items: center;
margin-bottom: 20px;
}
.question-badge {
background: #f1f5f9;
color: #64748b;
font-size: 0.75rem;
font-weight: 800;
padding: 6px 16px;
border-radius: 50px;
text-transform: uppercase;
letter-spacing: 1px;
}
.option-item {
display: flex;
align-items: center;
gap: 15px;
margin-bottom: 12px;
padding: 12px;
border-radius: 12px;
background: #f8fafc;
transition: var(--transition-speed);
position: relative;
}
.option-item:hover {
background: #f1f5f9;
}
.option-item.correct-answer {
background: linear-gradient(135deg, #dcfce7, #bbf7d0);
border: 2px solid #22c55e;
}
.option-item.correct-answer::before {
content: "✓ Jawaban Benar";
position: absolute;
top: -10px;
right: 15px;
background: #22c55e;
color: white;
font-size: 0.65rem;
font-weight: 700;
padding: 2px 10px;
border-radius: 20px;
}
.option-input {
flex: 1;
border: none;
background: transparent;
padding: 8px 0;
font-size: 0.95rem;
color: #334155;
border-bottom: 2px solid #e2e8f0;
}
.option-input:focus {
outline: none;
border-bottom-color: var(--navy-primary);
}
.btn-set-correct {
background: #dcfce7;
color: #166534;
width: 32px;
height: 32px;
border-radius: 8px;
display: flex;
align-items: center;
justify-content: center;
border: none;
transition: var(--transition-speed);
}
.btn-set-correct:hover {
background: #166534;
color: white;
transform: scale(1.1);
}
.btn-set-correct.active {
background: #166534;
color: white;
}
.btn-remove-option, .btn-remove-question {
background: #fee2e2;
color: #ef4444;
width: 32px;
height: 32px;
border-radius: 8px;
display: flex;
align-items: center;
justify-content: center;
border: none;
transition: var(--transition-speed);
}
.btn-remove-option:hover, .btn-remove-question:hover {
background: #ef4444;
color: white;
transform: scale(1.1);
}
.question-footer {
display: flex;
align-items: center;
gap: 20px;
margin-top: 20px;
padding-top: 20px;
border-top: 1px solid #e2e8f0;
}
.btn-add-option {
background: #dcfce7;
color: #166534;
padding: 8px 16px;
border-radius: 8px;
font-weight: 700;
font-size: 0.8rem;
border: none;
transition: var(--transition-speed);
}
.btn-add-option:hover {
background: #166534;
color: white;
transform: translateY(-2px);
}
.question-actions {
margin-left: auto;
display: flex;
align-items: center;
gap: 15px;
}
.points-input {
width: 80px;
padding: 8px 12px;
border-radius: 8px;
border: 2px solid #e2e8f0;
text-align: center;
font-weight: 700;
color: var(--navy-primary);
}
.points-input:focus {
border-color: var(--blue-info);
outline: none;
}
.btn-add-question {
background: white;
border: 2px dashed #cbd5e1;
color: #64748b;
padding: 20px;
border-radius: 20px;
font-weight: 700;
font-size: 1.1rem;
transition: var(--transition-speed);
width: 100%;
display: flex;
align-items: center;
justify-content: center;
gap: 12px;
}
.btn-add-question:hover {
border-color: var(--navy-primary);
color: var(--navy-primary);
background: #f8fafc;
transform: translateY(-3px);
}
.btn-add-question i {
font-size: 1.5rem;
}
.arabic-font {
font-family: 'Amiri', serif;
direction: rtl;
font-size: 1.6rem;
line-height: 2.5rem;
color: var(--navy-primary);
}
.exam-section {
background: white;
border-radius: 20px;
border: 1px solid #e2e8f0;
box-shadow: 0 4px 12px rgba(0,0,0,0.08);
margin-bottom: 30px;
}
.exam-section-header {
padding: 20px 25px;
background: #f8fafc;
border-bottom: 1px solid #e2e8f0;
font-weight: 800;
color: var(--navy-primary);
font-size: 1.2rem;
display: flex;
justify-content: space-between;
align-items: center;
}
.btn-remove-exam {
background: #fee2e2;
color: #ef4444;
width: 36px;
height: 36px;
border-radius: 8px;
display: flex;
align-items: center;
justify-content: center;
border: none;
transition: var(--transition-speed);
}
.btn-remove-exam:hover {
background: #ef4444;
color: white;
transform: scale(1.1);
}
.exam-actions {
display: flex;
gap: 10px;
margin-top: 15px;
}
/* Exam Navigation Sidebar */
.exam-nav-sidebar {
position: fixed;
right: 20px;
top: 120px;
width: 280px;
background: white;
border-radius: 16px;
box-shadow: 0 8px 25px rgba(0,0,0,0.15);
z-index: 1000;
max-height: calc(100vh - 140px);
overflow-y: auto;
padding: 20px;
}
.exam-nav-header {
font-weight: 800;
color: var(--navy-primary);
margin-bottom: 15px;
padding-bottom: 10px;
border-bottom: 2px solid #e2e8f0;
}
.exam-nav-list {
list-style: none;
padding: 0;
margin: 0;
}
.exam-nav-item {
margin-bottom: 8px;
}
.exam-nav-link {
display: block;
padding: 12px 16px;
border-radius: 12px;
text-decoration: none;
color: #64748b;
font-weight: 600;
transition: all var(--transition-speed);
border: 2px solid #e2e8f0;
}
.exam-nav-link:hover {
background: #f8fafc;
border-color: var(--blue-info);
color: var(--navy-primary);
transform: translateY(-2px);
}
.exam-nav-link.active {
background: var(--navy-primary);
color: white;
border-color: var(--navy-primary);
box-shadow: 0 4px 12px rgba(0, 43, 73, 0.3);
}
.btn-add-exam-nav {
width: 100%;
background: linear-gradient(135deg, var(--orange-primary), #e67100);
color: white;
border: none;
padding: 10px 16px;
border-radius: 12px;
font-weight: 700;
font-size: 0.9rem;
margin-top: 15px;
transition: all var(--transition-speed);
}
.btn-add-exam-nav:hover {
background: linear-gradient(135deg, #e67100, var(--orange-primary));
transform: translateY(-2px);
box-shadow: 0 4px 12px rgba(255, 127, 0, 0.3);
}
/* Modal Styles */
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
padding: 30px;
}
.link-display {
background: #f8fafc;
border: 2px dashed #cbd5e1;
border-radius: 16px;
padding: 20px;
display: flex;
align-items: center;
gap: 15px;
margin-bottom: 25px;
}
.link-text {
flex: 1;
color: var(--navy-primary);
font-weight: 800;
font-family: monospace;
font-size: 0.95rem;
word-break: break-all;
}
.link-text a {
color: var(--navy-primary);
text-decoration: none;
}
.link-text a:hover {
color: var(--blue-info);
text-decoration: underline;
}
.btn-copy-link {
background: var(--navy-primary);
color: white;
padding: 10px 20px;
border-radius: 12px;
font-weight: 700;
font-size: 0.9rem;
border: none;
transition: var(--transition-speed);
}
.btn-copy-link:hover {
background: var(--navy-dark);
transform: translateY(-2px);
}
.btn-open-link {
background: var(--blue-info);
color: white;
padding: 10px 20px;
border-radius: 12px;
font-weight: 700;
font-size: 0.9rem;
border: none;
transition: var(--transition-speed);
}
.btn-open-link:hover {
background: #0097a7;
transform: translateY(-2px);
}
.modal-footer {
background: #f8fafc;
padding: 20px 30px;
border-top: 1px solid #e2e8f0;
border-radius: 0 0 20px 20px;
}
.btn-modal-close {
background: #e2e8f0;
color: #64748b;
border: none;
padding: 10px 25px;
border-radius: 12px;
font-weight: 700;
font-size: 0.95rem;
transition: var(--transition-speed);
}
.btn-modal-close:hover {
background: #cbd5e1;
transform: translateY(-2px);
}
/* Main content adjustment for sidebar */
.main-content-with-nav {
margin-right: 320px;
}
/* Toast Notification */
.toast-notification {
position: fixed;
top: 90px;
right: 20px;
z-index: 1100;
min-width: 300px;
background: white;
border-radius: 12px;
box-shadow: 0 8px 25px rgba(0,0,0,0.2);
display: none;
border-left: 5px solid var(--orange-primary);
}
.toast-notification.show {
display: block;
animation: slideIn 0.3s ease;
}
.toast-content {
padding: 15px 20px;
display: flex;
align-items: center;
gap: 15px;
}
.toast-icon {
width: 40px;
height: 40px;
background: #dcfce7;
color: #166534;
border-radius: 10px;
display: flex;
align-items: center;
justify-content: center;
font-size: 1.2rem;
}
.toast-message {
flex: 1;
}
.toast-message h6 {
margin: 0;
color: var(--navy-primary);
font-weight: 700;
}
.toast-message p {
margin: 5px 0 0 0;
font-size: 0.9rem;
color: #64748b;
}
@keyframes slideIn {
from {
transform: translateX(100%);
opacity: 0;
}
to {
transform: translateX(0);
opacity: 1;
}
}
/* Warning for missing answer key */
.answer-key-warning {
background: #fef3c7;
border: 2px solid #f59e0b;
border-radius: 12px;
padding: 10px 15px;
margin-bottom: 15px;
display: none;
color: #92400e;
font-size: 0.85rem;
font-weight: 600;
}
.answer-key-warning.show {
display: block;
animation: pulse 2s infinite;
}
@keyframes pulse {
0% { box-shadow: 0 0 0 0 rgba(245, 158, 11, 0.4); }
70% { box-shadow: 0 0 0 10px rgba(245, 158, 11, 0); }
100% { box-shadow: 0 0 0 0 rgba(245, 158, 11, 0); }
}
/* --- MOBILE OPTIMIZATION --- */
.sidebar-overlay {
display: none;
position: fixed;
inset: 0;
background: rgba(0,0,0,0.5);
z-index: 1045;
}
@media (max-width: 1199px) {
.exam-nav-sidebar {
display: none;
}
.main-content-with-nav {
margin-right: 0;
}
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
.question-footer {
flex-direction: column;
align-items: stretch;
gap: 15px;
}
.question-actions {
margin-left: 0;
justify-content: space-between;
}
.points-input {
width: 100%;
}
.exam-section-header {
flex-direction: column;
align-items: stretch;
gap: 15px;
}
.exam-actions {
flex-direction: column;
}
}
@media (max-width: 576px) {
.question-header {
flex-direction: column;
align-items: stretch;
gap: 10px;
}
.option-item {
flex-direction: column;
align-items: stretch;
}
.btn-remove-option {
align-self: flex-end;
}
.link-display {
flex-direction: column;
text-align: center;
}
.modal-body {
padding: 20px;
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
<small class="opacity-75 fw-medium" style="font-size: 0.6rem;">CBT Admin Panel</small>
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
<a href="#" class="menu-btn active-dashboard"><i class="fas fa-file-edit"></i>Buat Bank Soal</a>
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
<main class="main-content main-content-with-nav">
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
<div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">
<div>
<h2 class="fw-bold" style="color: var(--navy-primary);">Manajemen Mata Uji</h2>
<p class="text-muted small">Rancang soal ujian untuk 5 mata pelajaran dan bagikan link akses peserta.</p>
</div>
<div class="d-flex gap-2">
<button class="btn-preview btn-custom" onclick="previewAllExams()">
<i class="fas fa-eye"></i> Preview Semua
</button>
</div>
</div>
<div class="row justify-content-center">
<div class="col-lg-10">
<div id="exam-container">
<!-- Exam sections will be added here dynamically -->
</div>
<button onclick="addExamSection()" class="btn-add-question mt-4">
<i class="fas fa-plus-circle"></i> TAMBAH MATA PELAJARAN
</button>
</div>
</div>
</main>
<!-- Toast Notification -->
<div class="toast-notification" id="toastNotification">
<div class="toast-content">
<div class="toast-icon">
<i class="fas fa-check-circle"></i>
</div>
<div class="toast-message">
<h6 id="toastTitle">Berhasil!</h6>
<p id="toastMessage">Link berhasil dibuat dan dikirim</p>
</div>
<button class="btn-close" onclick="hideToast()"></button>
</div>
</div>
<!-- Exam Navigation Sidebar -->
<div class="exam-nav-sidebar">
<div class="exam-nav-header">
<i class="fas fa-book me-2"></i>Mata Uji yang Dibuat
</div>
<ul class="exam-nav-list" id="exam-nav-list">
<!-- Navigation items will be added here dynamically -->
</ul>
<button class="btn-add-exam-nav" onclick="addExamSection()">
<i class="fas fa-plus me-2"></i>TAMBAH MATA UJI
</button>
</div>
<!-- Modal Link -->
<div class="modal fade" id="modalLink" tabindex="-1">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title fw-bold"><i class="fas fa-link me-2"></i>Link Akses Berhasil Dibuat!</h5>
<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
</div>
<div class="modal-body">
<p class="text-muted">Link akses untuk mata pelajaran ini telah berhasil dibuat dan siap dibagikan.</p>
<div class="link-display">
<code id="generated-link" class="link-text">
<a href="#" id="link-url" target="_blank"></a>
</code>
</div>
<div class="d-flex gap-2 mb-3">
<button onclick="copyToClipboard()" class="btn-copy-link">
<i class="fas fa-copy me-2"></i>SALIN LINK
</button>
<button onclick="openGeneratedLink()" class="btn-open-link">
<i class="fas fa-external-link-alt me-2"></i>BUKA LINK
</button>
</div>
<div class="row g-3">
<div class="col-6">
<button class="btn btn-outline-secondary w-100 py-3">
<i class="fas fa-qrcode fa-2x mb-2"></i><br>
<small class="fw-bold">Download QR</small>
</button>
</div>
<div class="col-6">
<button onclick="window.print()" class="btn btn-outline-secondary w-100 py-3">
<i class="fas fa-address-card fa-2x mb-2"></i><br>
<small class="fw-bold">Cetak Kartu</small>
</button>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn-modal-close" data-bs-dismiss="modal">Tutup</button>
</div>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Sidebar toggle functionality
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');
const toggleBtn = document.getElementById('sidebarToggle');

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

let examCount = 0;
let questionCounts = {};
let currentExamId = null;
let examData = {}; // Store exam data for each exam ID

function addExamSection() {
examCount++;
const container = document.getElementById('exam-container');
const div = document.createElement('div');
div.className = "exam-section";
div.id = `exam-${examCount}`;
div.innerHTML = `
<div class="exam-section-header">
<span>Mata Pelajaran ${examCount}</span>
<button type="button" class="btn-remove-exam" onclick="removeExamSection(${examCount})">
<i class="fas fa-trash"></i>
</button>
</div>
<div class="p-4">
<input type="text" id="exam-title-${examCount}" placeholder="Judul Mata Pelajaran (Contoh: Bahasa Arab)"
class="form-control form-control-lg mb-3" style="font-size: 1.3rem; font-weight: 700; border: none; border-bottom: 2px solid #e2e8f0; padding: 10px 0;">
<textarea placeholder="Deskripsi atau instruksi pengerjaan..."
class="form-control mb-4" rows="2" style="resize: none; border: none; border-bottom: 1px solid #e2e8f0;"></textarea>
<div class="row g-3 mb-4">
<div class="col-md-4">
<label class="form-label text-muted small fw-bold mb-2">Mata Pelajaran</label>
<select class="form-select" id="subject-${examCount}">
<option selected>Pilih Mata Pelajaran</option>
<option>Bahasa Indonesia</option>
<option>Bahasa Inggris</option>
<option>Bahasa Arab</option>
<option>Al-Qur'an</option>
<option>Matematika</option>
</select>
</div>
<div class="col-md-4">
<label class="form-label text-muted small fw-bold mb-2">Waktu (Menit)</label>
<input type="number" value="90" class="form-control" id="time-${examCount}">
</div>
<div class="col-md-4">
<label class="form-label text-muted small fw-bold mb-2">Passing Grade</label>
<input type="number" value="75" class="form-control" id="grade-${examCount}">
</div>
</div>
<div id="builder-container-${examCount}">
</div>
<div class="exam-actions">
<button onclick="addQuestion(${examCount})" class="btn-add-question">
<i class="fas fa-plus-circle"></i> TAMBAH PERTANYAAN
</button>
<button onclick="simpanDanKirim(${examCount})" class="btn-save-exam btn-custom">
<i class="fas fa-cloud-upload-alt"></i> SIMPAN & KIRIM LINK
</button>
</div>
</div>
`;
container.appendChild(div);

// Initialize question count for this exam
questionCounts[examCount] = 0;

// Add to navigation sidebar
addExamToNav(examCount);

// Set as current exam
setCurrentExam(examCount);

// Scroll to the new exam section
div.scrollIntoView({ behavior: 'smooth', block: 'start' });
}

function addExamToNav(examId) {
const navList = document.getElementById('exam-nav-list');
const li = document.createElement('li');
li.className = 'exam-nav-item';
li.innerHTML = `
<a href="#exam-${examId}" class="exam-nav-link" onclick="setCurrentExam(${examId})">
<i class="fas fa-book me-2"></i>Mata Uji ${examId}
</a>
`;
navList.appendChild(li);
}

function setCurrentExam(examId) {
// Remove active class from all nav items
document.querySelectorAll('.exam-nav-link').forEach(link => {
link.classList.remove('active');
});

// Add active class to current exam nav item
const currentNavLink = document.querySelector(`.exam-nav-link[href="#exam-${examId}"]`);
if (currentNavLink) {
currentNavLink.classList.add('active');
}

// Scroll to the exam section
const examSection = document.getElementById(`exam-${examId}`);
if (examSection) {
examSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
}
currentExamId = examId;
}

function addQuestion(examId) {
questionCounts[examId]++;
const container = document.getElementById(`builder-container-${examId}`);
const div = document.createElement('div');
div.className = "builder-card";
div.id = `q-${examId}-${questionCounts[examId]}`;
div.innerHTML = `
<div class="question-header">
<span class="question-badge">Pertanyaan #${questionCounts[examId]}</span>
<select onchange="changeType(${examId}, ${questionCounts[examId]}, this.value)" class="form-select" style="width: auto; padding: 6px 12px; font-size: 0.85rem;">
<option value="mc">Pilihan Ganda</option>
<option value="sa">Isian Singkat</option>
</select>
</div>
<textarea placeholder="Tuliskan pertanyaan di sini..." class="form-control mb-4" rows="3" style="resize: none;"></textarea>
<div class="answer-key-warning" id="warning-${examId}-${questionCounts[examId]}">
<i class="fas fa-exclamation-triangle me-2"></i>Belum ada jawaban benar yang ditetapkan!
</div>
<div id="options-${examId}-${questionCounts[examId]}" class="mb-4">
<div class="option-item">
<button type="button" class="btn-set-correct" onclick="setCorrectAnswer(${examId}, ${questionCounts[examId]}, this)" title="Jadikan Jawaban Benar">
<i class="fas fa-check"></i>
</button>
<input type="text" placeholder="Opsi 1" class="option-input" value="">
<button type="button" class="btn-remove-option" onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button>
</div>
</div>
<div class="question-footer">
<button type="button" onclick="addOption(${examId}, ${questionCounts[examId]})" class="btn-add-option">+ Tambah Opsi</button>
<div class="question-actions">
<div class="d-flex align-items-center gap-2">
<span class="text-muted small fw-bold">Poin:</span>
<input type="number" value="5" class="points-input" min="1" max="100">
</div>
<div class="form-check form-switch">
<input class="form-check-input" type="checkbox" id="required-${examId}-${questionCounts[examId]}" checked>
<label class="form-check-label text-muted small fw-bold" for="required-${examId}-${questionCounts[examId]}">Wajib</label>
</div>
<button type="button" class="btn-remove-question" onclick="document.getElementById('q-${examId}-${questionCounts[examId]}').remove()"><i class="fas fa-trash"></i></button>
</div>
</div>
`;
container.appendChild(div);

// Initially hide the warning
document.getElementById(`warning-${examId}-${questionCounts[examId]}`).style.display = 'none';
}

function addOption(examId, qId) {
const container = document.getElementById(`options-${examId}-${qId}`);
const count = container.children.length + 1;
const div = document.createElement('div');
div.className = "option-item";
div.innerHTML = `
<button type="button" class="btn-set-correct" onclick="setCorrectAnswer(${examId}, ${qId}, this)" title="Jadikan Jawaban Benar">
<i class="fas fa-check"></i>
</button>
<input type="text" placeholder="Opsi ${count}" class="option-input" value="">
<button type="button" class="btn-remove-option" onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button>
`;
container.appendChild(div);
}

function setCorrectAnswer(examId, qId, button) {
// Find the parent option item
const optionItem = button.closest('.option-item');
const container = document.getElementById(`options-${examId}-${qId}`);
const warningDiv = document.getElementById(`warning-${examId}-${qId}`);

// Reset all options in this question
container.querySelectorAll('.option-item').forEach(item => {
item.classList.remove('correct-answer');
const btn = item.querySelector('.btn-set-correct');
btn.classList.remove('active');
btn.innerHTML = '<i class="fas fa-check"></i>';
});

// Set the selected option as correct
optionItem.classList.add('correct-answer');
button.classList.add('active');
button.innerHTML = '<i class="fas fa-check-circle"></i>';

// Hide the warning
warningDiv.style.display = 'none';
warningDiv.classList.remove('show');

// Show success message
showToast('Jawaban Benar Ditandai', 'Jawaban benar telah ditetapkan untuk pertanyaan ini');
}

function changeType(examId, qId, val) {
const optCont = document.getElementById(`options-${examId}-${qId}`);
const questionCard = document.getElementById(`q-${examId}-${qId}`);
const btnAdd = questionCard.querySelector('.btn-add-option');
const warningDiv = document.getElementById(`warning-${examId}-${qId}`);
if(val === 'sa') {
optCont.innerHTML = `<div class="p-4 border-2 border-dashed border-slate-100 rounded-xl text-slate-400 text-xs text-center bg-light">Peserta akan mengisi jawaban teks singkat...</div>`;
if (btnAdd) btnAdd.style.display = 'none';
if (warningDiv) warningDiv.style.display = 'none';
} else {
optCont.innerHTML = `<div class="option-item">
<button type="button" class="btn-set-correct" onclick="setCorrectAnswer(${examId}, ${qId}, this)" title="Jadikan Jawaban Benar">
<i class="fas fa-check"></i>
</button>
<input type="text" placeholder="Opsi 1" class="option-input" value="">
<button type="button" class="btn-remove-option" onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button>
</div>`;
if (btnAdd) btnAdd.style.display = 'block';
if (warningDiv) warningDiv.style.display = 'none';
}
}

function removeExamSection(examId) {
if(confirm('Hapus mata pelajaran ini beserta semua soalnya?')) {
// Remove from main container
document.getElementById(`exam-${examId}`).remove();

// Remove from navigation
const navLink = document.querySelector(`.exam-nav-link[href="#exam-${examId}"]`);
if (navLink) {
navLink.parentElement.remove();
}

// Reset exam count and renumber remaining exams
const remainingExams = document.querySelectorAll('.exam-section');
examCount = 0;
questionCounts = {};
const container = document.getElementById('exam-container');
container.innerHTML = '';
const navList = document.getElementById('exam-nav-list');
navList.innerHTML = '';

remainingExams.forEach((exam, index) => {
examCount++;
const newId = `exam-${examCount}`;
exam.id = newId;
exam.querySelector('.exam-section-header span').textContent = `Mata Pelajaran ${examCount}`;

// Update all IDs and references within the exam section
const titleInput = exam.querySelector('[id^="exam-title-"]');
if (titleInput) {
titleInput.id = `exam-title-${examCount}`;
}

const subjectSelect = exam.querySelector('[id^="subject-"]');
if (subjectSelect) {
subjectSelect.id = `subject-${examCount}`;
}

const timeInput = exam.querySelector('[id^="time-"]');
if (timeInput) {
timeInput.id = `time-${examCount}`;
}

const gradeInput = exam.querySelector('[id^="grade-"]');
if (gradeInput) {
gradeInput.id = `grade-${examCount}`;
}

const builderContainer = exam.querySelector('[id^="builder-container-"]');
if (builderContainer) {
builderContainer.id = `builder-container-${examCount}`;
}

// Update remove button
const removeBtn = exam.querySelector('.btn-remove-exam');
if (removeBtn) {
removeBtn.setAttribute('onclick', `removeExamSection(${examCount})`);
}

// Update exam actions buttons
const addQuestionBtn = exam.querySelector('.exam-actions .btn-add-question');
if (addQuestionBtn) {
addQuestionBtn.setAttribute('onclick', `addQuestion(${examCount})`);
}

const saveBtn = exam.querySelector('.exam-actions .btn-save-exam');
if (saveBtn) {
saveBtn.setAttribute('onclick', `simpanDanKirim(${examCount})`);
}

container.appendChild(exam);
addExamToNav(examCount);
});

// Set first exam as current if exists
if (examCount > 0) {
setCurrentExam(1);
}
}
}

function simpanDanKirim(examId) {
const title = document.getElementById(`exam-title-${examId}`);
const subject = document.getElementById(`subject-${examId}`);

if(!title.value.trim()) {
alert(`Mohon isi judul untuk Mata Pelajaran ${examId}!`);
return;
}

if(subject.value === "Pilih Mata Pelajaran") {
alert(`Mohon pilih mata pelajaran untuk bagian ${examId}!`);
return;
}

// Check if all multiple choice questions have correct answers
let hasMissingAnswerKeys = false;
const questionCards = document.querySelectorAll(`#builder-container-${examId} .builder-card`);
questionCards.forEach((card, index) => {
const type = card.querySelector('select').value;
if (type === 'mc') {
const hasCorrectAnswer = card.querySelectorAll('.correct-answer').length > 0;
if (!hasCorrectAnswer) {
// Show warning for this question
const warningDiv = card.querySelector('.answer-key-warning');
if (warningDiv) {
warningDiv.style.display = 'block';
warningDiv.classList.add('show');
}
hasMissingAnswerKeys = true;
}
}
});

if (hasMissingAnswerKeys) {
alert('Ada pertanyaan pilihan ganda yang belum ditetapkan jawaban benarnya! Silahkan periksa semua pertanyaan.');
return;
}

// Collect all exam data
const examData = {
id: examId,
title: title.value,
subject: subject.value,
time: document.getElementById(`time-${examId}`).value,
grade: document.getElementById(`grade-${examId}`).value,
questions: []
};

// Collect questions
questionCards.forEach((card, index) => {
const questionText = card.querySelector('textarea').value;
const type = card.querySelector('select').value;
const points = card.querySelector('.points-input').value;
const required = card.querySelector('.form-check-input').checked;

const question = {
id: index + 1,
text: questionText,
type: type,
points: points,
required: required,
options: [],
correctAnswer: null
};

// If multiple choice, collect options
if (type === 'mc') {
const optionItems = card.querySelectorAll('.option-item');
optionItems.forEach((optionItem, optIndex) => {
const optionText = optionItem.querySelector('.option-input').value;
const isCorrect = optionItem.classList.contains('correct-answer');
question.options.push({
id: optIndex + 1,
text: optionText,
isCorrect: isCorrect
});
if (isCorrect) {
question.correctAnswer = optIndex + 1;
}
});
}

examData.questions.push(question);
});

// Save exam data to localStorage or send to server
saveExamData(examData);

// Generate unique link for this exam
const subjects = {
"Bahasa Indonesia": "BI",
"Bahasa Inggris": "BING",
"Bahasa Arab": "BAR",
"Al-Qur'an": "QURAN",
"Matematika": "MTK"
};

const subjectCode = subjects[subject.value] || "GEN";
const randomCode = Math.random().toString(36).substring(2, 8).toUpperCase();
const examLink = `https://cbt-pesantren.com/exam/PSB-2026-${subjectCode}-${randomCode}`;

// Update modal with specific link
const linkElement = document.getElementById('link-url');
linkElement.href = examLink;
linkElement.textContent = examLink;
document.getElementById('generated-link').href = examLink;

// Show modal
const modal = new bootstrap.Modal(document.getElementById('modalLink'));
modal.show();

// Simulate sending link to server
sendLinkToServer(examLink, examData);

// Show success toast
showToast('Link Berhasil Dibuat!', `Link untuk ${title.value} telah dikirim ke server.`);
}

function saveExamData(examData) {
// Save to localStorage for demo purposes
// In real application, send to server via API
const exams = JSON.parse(localStorage.getItem('cbt_exams') || '[]');
const existingIndex = exams.findIndex(e => e.id === examData.id);
if (existingIndex > -1) {
exams[existingIndex] = examData;
} else {
exams.push(examData);
}
localStorage.setItem('cbt_exams', JSON.stringify(exams));
}

function sendLinkToServer(link, examData) {
// Simulate API call to send link
console.log('Sending link to server:', link);
console.log('Exam data:', examData);

// In real application, make fetch/axios call to your API
// fetch('/api/send-exam-link', {
//   method: 'POST',
//   headers: { 'Content-Type': 'application/json' },
//   body: JSON.stringify({ link, examData })
// });

// For demo, just log success
setTimeout(() => {
console.log('Link successfully sent to server');
}, 1000);
}

function copyToClipboard() {
const link = document.getElementById('link-url').textContent;
navigator.clipboard.writeText(link).then(() => {
const btn = document.querySelector('.btn-copy-link');
const originalText = btn.innerHTML;
btn.innerHTML = '<i class="fas fa-check me-2"></i>TERKOPI!';
showToast('Link Tersalin', 'Link berhasil disalin ke clipboard');
setTimeout(() => {
btn.innerHTML = originalText;
}, 2000);
});
}

function openGeneratedLink() {
const link = document.getElementById('link-url').href;
window.open(link, '_blank');
}

function showToast(title, message) {
const toast = document.getElementById('toastNotification');
document.getElementById('toastTitle').textContent = title;
document.getElementById('toastMessage').textContent = message;
toast.classList.add('show');
setTimeout(() => {
toast.classList.remove('show');
}, 5000);
}

function hideToast() {
document.getElementById('toastNotification').classList.remove('show');
}

function previewAllExams() {
const exams = document.querySelectorAll('.exam-section');
if (exams.length === 0) {
alert('Belum ada mata pelajaran yang dibuat!');
return;
}

let previewContent = `=== PREVIEW SEMUA MATA PELAJARAN ===\n\n`;
exams.forEach((exam, index) => {
const title = exam.querySelector('[id^="exam-title-"]').value || `Mata Pelajaran ${index + 1}`;
const subject = exam.querySelector('[id^="subject-"]').value || 'Belum dipilih';
const time = exam.querySelector('[id^="time-"]').value || '90';
const grade = exam.querySelector('[id^="grade-"]').value || '75';
const questionCount = exam.querySelectorAll('.builder-card').length;

previewContent += `MATA PELAJARAN ${index + 1}\n`;
previewContent += `Judul: ${title}\n`;
previewContent += `Subjek: ${subject}\n`;
previewContent += `Waktu: ${time} menit\n`;
previewContent += `Passing Grade: ${grade}\n`;
previewContent += `Jumlah Soal: ${questionCount}\n`;
previewContent += '─'.repeat(50) + '\n\n';
});

// Show preview in modal or alert
const modal = new bootstrap.Modal(document.getElementById('modalLink'));
document.getElementById('link-url').href = '#';
document.getElementById('link-url').textContent = previewContent;
document.getElementById('modalLink').querySelector('.modal-title').innerHTML = '<i class="fas fa-eye me-2"></i>Preview Semua Ujian';
modal.show();
}

// Initialize with one exam section
addExamSection();
</script>
</body>
</html>