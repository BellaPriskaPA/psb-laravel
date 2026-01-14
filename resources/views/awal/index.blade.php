<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PSB Online - 'Aisyiyah Qur`anic Boarding School</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
:root {
/* Palette Warna */
--navy-primary: #002b4d;
--navy-secondary: #004070;
--orange-primary: #ff7f00;
--orange-hover: #e66a00;
--cyan-accent: #4dd0e1;
--bg-light: #f4f6f9;
}
body {
font-family: 'Poppins', sans-serif;
background-color: var(--bg-light);
color: #444;
overflow-x: hidden;
display: flex; flex-direction: column; min-height: 100vh;
}
/* Navbar */
.navbar { background: var(--navy-primary); box-shadow: 0 2px 10px rgba(0,0,0,0.1); padding: 12px 0; }
.navbar-brand img { border: 2px solid white; padding: 2px; background: white; }
.nav-link { font-weight: 500; transition: 0.2s; }
.nav-link:hover { color: var(--orange-primary) !important; }
.btn-admin-nav { border: 1px solid rgba(255,255,255,0.3); color: rgba(255,255,255,0.8); font-size: 0.8rem; }
.btn-admin-nav:hover { background: rgba(255,255,255,0.1); color: white; border-color: white; }
/* Hero Section */
.hero-section { background: linear-gradient(160deg, var(--navy-primary) 0%, var(--navy-secondary) 100%); color: white; padding-top: 4rem; padding-bottom: 6rem; position: relative; overflow: hidden; }
.hero-bg-icon { position: absolute; color: white; opacity: 0.05; z-index: 0; pointer-events: none; }
.btn-orange { background-color: var(--orange-primary); color: white; border: none; font-weight: 700; padding: 10px 20px; border-radius: 8px; transition: 0.2s; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
.btn-orange:hover { background-color: var(--orange-hover); box-shadow: 0 6px 12px rgba(0,0,0,0.15); color: white; }
.btn-quick-access {
background: linear-gradient(135deg, var(--orange-primary) 0%, #ff9a3d 100%);
color: white;
border: none;
font-weight: 800;
padding: 15px 30px;
border-radius: 12px;
transition: all 0.3s;
box-shadow: 0 8px 20px rgba(255, 127, 0, 0.3);
font-size: 1.1rem;
letter-spacing: 1px;
margin-top: 25px;
display: inline-flex;
align-items: center;
justify-content: center;
gap: 10px;
animation: pulse 2s infinite;
}
.btn-quick-access:hover {
transform: translateY(-5px);
box-shadow: 0 12px 25px rgba(255, 127, 0, 0.4);
color: white;
animation: none;
}
.countdown-container { background: rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255, 255, 0.2); border-radius: 12px; padding: 20px; }
.time-box { background: var(--orange-primary); color: white; border-radius: 6px; padding: 5px; min-width: 55px; text-align: center; }
.time-val { font-size: 1.5rem; font-weight: 700; display: block; line-height: 1; }
.status-badge { font-size: 0.8rem; font-weight: 700; padding: 5px 12px; border-radius: 50px; text-transform: uppercase; display: inline-block; }
/* Form Styles */
.card-custom { border: none; border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); background: white; transition: transform 0.3s, box-shadow 0.3s; }
.card-custom:hover { transform: translateY(-5px); box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
.form-header { background: linear-gradient(90deg, #26c6da, #00acc1); color: white; padding: 15px; text-align: center; font-weight: 700; letter-spacing: 1px; border-radius: 10px 10px 0 0; }
.form-label { font-size: 0.85rem; font-weight: 600; color: #555; margin-bottom: 6px; text-transform: uppercase; }
.form-control, .form-select { border: 1px solid #ced4da; padding: 10px 12px; font-size: 0.95rem; border-radius: 6px; background-color: #fff; transition: all 0.3s; }
.form-control:focus, .form-select:focus { border-color: var(--cyan-accent); box-shadow: 0 0 0 3px rgba(77, 208, 225, 0.15); }
.conditional-field { display: none; transition: all 0.3s ease; }
.conditional-field.show { display: block; }
/* Captcha */
.captcha-box { background-color: #eee; border: 1px dashed #bbb; font-family: 'Courier New', monospace; font-size: 1.3rem; font-weight: bold; letter-spacing: 5px; color: #d9534f; padding: 8px; border-radius: 5px; text-align: center; width: 100%; user-select: none; }
.btn-refresh-captcha { cursor: pointer; color: #666; font-size: 1.1rem; transition: 0.2s; margin-left: 10px; }
.btn-refresh-captcha:hover { color: var(--orange-primary); transform: rotate(180deg); }
/* --- BAGIAN PENGUMUMAN (BARU & MENARIK) --- */
.announcement-wrapper {
display: flex;
overflow-x: auto;
scroll-behavior: smooth;
-webkit-overflow-scrolling: touch;
gap: 1.5rem;
padding: 1rem 0;
}
.announcement-card {
flex: 0 0 auto;
width: 320px;
background: #fff;
border-radius: 12px;
overflow: hidden;
box-shadow: 0 4px 15px rgba(0,0,0,0.05);
transition: transform 0.2s;
border: 1px solid #f0f0f0;
height: 100%;
opacity: 0;
transform: translateY(20px);
animation: fadeInUp 0.6s forwards;
cursor: pointer;
}
.announcement-card:nth-child(1) { animation-delay: 0.2s; }
.announcement-card:nth-child(2) { animation-delay: 0.4s; }
.announcement-card:nth-child(3) { animation-delay: 0.6s; }
.announcement-card:nth-child(4) { animation-delay: 0.8s; }
.announcement-card:hover {
transform: translateY(-5px);
box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}
.ann-date {
background: var(--navy-primary);
color: white;
min-width: 85px;
display: flex;
flex-direction: column;
justify-content: center;
align-items: center;
padding: 10px;
text-align: center;
}
.ann-day { font-size: 1.8rem; font-weight: 800; line-height: 1; }
.ann-month { font-size: 0.8rem; text-transform: uppercase; font-weight: 600; opacity: 0.9; }
.ann-year { font-size: 0.7rem; opacity: 0.7; }
.ann-content { padding: 20px; flex-grow: 1; display: flex; flex-direction: column; justify-content: center; }
.ann-tag {
font-size: 0.7rem; text-transform: uppercase; font-weight: 700;
color: var(--orange-primary); letter-spacing: 1px; margin-bottom: 5px;
display: flex; align-items: center; gap: 5px;
}
.ann-title { font-weight: 700; color: var(--navy-primary); margin-bottom: 5px; font-size: 1rem; line-height: 1.4; }
.ann-desc { font-size: 0.85rem; color: #666; margin-bottom: 0; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
.ann-arrow {
display: flex; align-items: center; justify-content: center; padding-right: 20px; color: #ddd;
transition: transform 0.3s;
}
.announcement-card:hover .ann-arrow { color: var(--orange-primary); transform: translateX(5px); }
/* Footer Stats */
.footer-section { background-color: white; margin-top: auto; padding-top: 3rem; border-top: 1px solid #eee; }
.stat-card-row {
display: flex; align-items: center; background: white; border-radius: 10px; padding: 1.2rem; margin-bottom: 1.2rem;
box-shadow: 0 2px 10px rgba(0,0,0,0.05); border: 1px solid #eee; border-left: 5px solid transparent;
opacity: 0;
transform: translateX(-20px);
animation: slideInRight 0.6s forwards;
}
.stat-card-row:nth-child(1) { animation-delay: 0.2s; }
.stat-card-row:nth-child(2) { animation-delay: 0.4s; }
.stat-smp { border-left-color: #0d6efd; } .stat-smp .icon-wrapper { background: rgba(13, 110, 253, 0.1); color: #0d6efd; }
.stat-sma { border-left-color: var(--orange-primary); } .stat-sma .icon-wrapper { background: rgba(255, 127, 0, 0.1); color: var(--orange-primary); }
.icon-wrapper { width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.3rem; margin-right: 1.2rem; flex-shrink: 0; }
.stat-content { flex-grow: 1; }
.stat-number-big { font-size: 1.6rem; font-weight: 800; line-height: 1; color: #333; }
.total-box {
background: linear-gradient(135deg, var(--navy-primary) 0%, var(--navy-secondary) 100%);
color: white; border-radius: 15px; padding: 2rem; text-align: center; height: 100%;
display: flex; flex-direction: column; justify-content: center;
box-shadow: 0 5px 20px rgba(0, 43, 77, 0.2);
opacity: 0;
animation: fadeIn 1s forwards;
animation-delay: 0.6s;
}
.total-number { font-size: 3.5rem; font-weight: 800; line-height: 1; margin-bottom: 0.5rem; }
/* Modal Animations */
.modal-content {
border: none;
border-radius: 15px;
overflow: hidden;
transform: scale(0.9);
opacity: 0;
transition: all 0.3s ease;
}
.modal.show .modal-content {
transform: scale(1);
opacity: 1;
}
/* Loading Animation */
.loading-dots::after {
content: '.';
animation: dots 1.5s infinite;
}
@keyframes dots {
0%, 20% { content: '.'; }
40% { content: '..'; }
60%, 100% { content: '...'; }
}
/* Keyframe Animations */
@keyframes fadeInUp {
from {
opacity: 0;
transform: translateY(20px);
}
to {
opacity: 1;
transform: translateY(0);
}
}
@keyframes fadeIn {
from {
opacity: 0;
}
to {
opacity: 1;
}
}
@keyframes slideInRight {
from {
opacity: 0;
transform: translateX(-20px);
}
to {
opacity: 1;
transform: translateX(0);
}
}
@keyframes pulse {
0% {
box-shadow: 0 8px 20px rgba(255, 127, 0, 0.3);
}
50% {
box-shadow: 0 12px 30px rgba(255, 127, 0, 0.5);
}
100% {
box-shadow: 0 8px 20px rgba(255, 127, 0, 0.3);
}
}
@keyframes float {
0%, 100% {
transform: translateY(0px);
}
50% {
transform: translateY(-10px);
}
}
.floating {
animation: float 3s ease-in-out infinite;
}
.staggered-item {
opacity: 0;
transform: translateY(10px);
}
.staggered-item.visible {
opacity: 1;
transform: translateY(0);
transition: opacity 0.5s ease, transform 0.5s ease;
}
@media (max-width: 768px) {
.hero-section { text-align: center; padding-top: 2rem; }
.countdown-row { justify-content: center; }
.stat-card-row { flex-direction: row; padding: 1rem; }
.announcement-card { width: 280px; }
.btn-quick-access { padding: 12px 25px; font-size: 1rem; animation: none; }
}
.cursor-pointer { cursor: pointer; }
.external-link {
color: var(--orange-primary);
font-size: 0.9rem;
text-decoration: none;
margin-left: 8px;
}
.external-link:hover {
text-decoration: underline;
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
<div class="container">
<a class="navbar-brand d-flex align-items-center" href="#">
<img src="https://via.placeholder.com/50" alt="Logo" class="rounded-circle me-3 shadow-sm floating">
<div class="d-flex flex-column">
<span class="fw-bold text-uppercase ls-1">PSB ONLINE</span>
<small style="font-size: 0.7rem; opacity: 0.9;">'Aisyiyah Qur`anic Boarding School</small>
</div>
</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
<ul class="navbar-nav align-items-center gap-2 mt-3 mt-lg-0">
<li class="nav-item"><a class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#modalPanduan">Panduan <i class="fas fa-external-link-alt external-link"></i></a></li>
<li class="nav-item"><a class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#modalBiaya">Biaya</a></li>
<li class="nav-item"><a class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#modalKontak">Kontak</a></li>
<!-- TOMBOL INFO-PSB DITAMBAHKAN (POPUP) -->
<li class="nav-item"><a class="nav-link text-white me-2" data-bs-toggle="modal" data-bs-target="#modalInfoPSB">Info PSB <i class="fas fa-external-link-alt external-link"></i></a></li>
<!-- TOMBOL TENTANG DIPERTAHANKAN -->
<li class="nav-item"><a class="nav-link text-white me-2" data-bs-toggle="modal" data-bs-target="#modalTentang">Tentang <i class="fas fa-external-link-alt external-link"></i></a></li>
<li class="nav-item ms-lg-2 mt-2 mt-lg-0">
<a class="btn btn-sm btn-admin-nav rounded-pill px-3" href="#" data-bs-toggle="modal" data-bs-target="#modalAdmin"><i class="fas fa-user-shield me-1"></i> Panitia</a>
</li>
</ul>
</div>
</div>
</nav>
<section class="hero-section">
<i class="fas fa-book-open hero-bg-icon fa-10x" style="top: 10%; right: 5%; animation: float 4s ease-in-out infinite;"></i>
<i class="fas fa-mosque hero-bg-icon fa-8x" style="bottom: 10%; left: 5%; animation: float 5s ease-in-out infinite 1s;"></i>
<div class="container position-relative z-1">
<div class="row align-items-center">
<div class="col-lg-7 mb-5 mb-lg-0">
<div class="d-inline-block px-3 py-1 border border-white rounded-pill mb-3 staggered-item" style="background: rgba(255,255,255,0.1);">
<small>📅 Tahun Ajaran 2026/2027</small>
</div>
<h1 class="fw-bold display-5 mb-3 staggered-item">Penerimaan Santriwati Baru</h1>
<!-- Tombol Quick Access Daftar Sekarang -->
<a href="#formulir-pendaftaran" class="btn btn-quick-access staggered-item">
<i class="fas fa-rocket"></i> DAFTAR SEKARANG
</a>
<div class="countdown-container mt-4 staggered-item">
<div class="row align-items-center">
<div class="col-md-5 border-end border-light">
<h4 class="fw-bold text-warning mb-0" id="waveName">GELOMBANG 3</h4>
<div id="statusBadge" class="status-badge bg-success mt-2">SEDANG BERLANGSUNG</div>
</div>
<div class="col-md-7 mt-3 mt-md-0">
<p class="small mb-2 text-center text-md-start opacity-75" id="timerLabel">Sisa Waktu Pendaftaran:</p>
<div class="d-flex gap-2 justify-content-center justify-content-md-start countdown-row">
<div class="time-box"><span class="time-val" id="days">00</span><span class="time-label">Hari</span></div>
<div class="time-box"><span class="time-val" id="hours">00</span><span class="time-label">Jam</span></div>
<div class="time-box"><span class="time-val" id="minutes">00</span><span class="time-label">Mnt</span></div>
<div class="time-box bg-white text-dark"><span class="time-val" id="seconds">00</span><span class="time-label">Dtk</span></div>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-4 offset-lg-1">
<div class="card card-custom border-top-4 border-info staggered-item">
<div class="card-header bg-white text-center py-3">
<h5 class="fw-bold text-navy mb-0">LOGIN SANTRIWATI</h5>
</div>
<div class="card-body p-4">
<form>
<div class="mb-3">
<label class="form-label">NISN</label>
<input type="text" class="form-control" placeholder="Masukkan NISN">
</div>
<div class="mb-4">
<label class="form-label">KATA SANDI</label>
<div class="input-group">
<input type="password" class="form-control border-end-0" id="loginPass" placeholder="Password">
<span class="input-group-text bg-white border-start-0 cursor-pointer" onclick="togglePassword('loginPass', 'iconLoginPass')">
<i class="fas fa-eye text-muted" id="iconLoginPass"></i>
</span>
</div>
</div>
<button type="submit" class="btn btn-orange w-100 mb-3">MASUK APLIKASI</button>
</form>
</div>
</div>
</div>
</div>
</div>
</section>

<!-- Pengumuman Section (Nama tetap "Pengumuman") -->
<section class="py-5 bg-white border-bottom">
<div class="container">
<div class="text-center mb-5 staggered-item">
<h3 class="fw-bold text-navy">PENGUMUMAN</h3>
<div style="width: 50px; height: 3px; background: var(--orange-primary); margin: 10px auto;"></div>
</div>
<div class="announcement-wrapper" id="announcementWrapper">
<!-- Pengumuman akan ditambahkan secara dinamis -->
</div>
</div>
</section>

<section class="py-5" id="formulir-pendaftaran">
<div class="container">
<div class="row g-4">
<div class="col-lg-6">
<div class="card card-custom h-100 staggered-item">
<div class="form-header"><i class="fas fa-edit me-2"></i> FORMULIR PENDAFTARAN</div>
<div class="card-body p-4">
<form>
<div class="mb-3">
<label class="form-label">TAHUN AJARAN</label>
<select class="form-select" disabled>
<option selected>2026/2027</option>
</select>
</div>
<div class="mb-3">
<label class="form-label">GELOMBANG PENDAFTARAN</label>
<select class="form-select" disabled>
<option selected>Gelombang 3</option>
</select>
</div>
<div class="mb-3">
<label class="form-label">TANGGAL PENDAFTARAN</label>
<input type="text" class="form-control" value="10 Januari 2026" disabled>
</div>
<div class="mb-3">
<label class="form-label">SEKOLAH/ PESANTREN ASAL</label>
<input type="text" class="form-control" placeholder="Nama sekolah atau pesantren sebelumnya">
</div>
<div class="row mb-3">
<div class="col-md-6">
<label class="form-label">JENIS PENDAFTARAN</label>
<select class="form-select" id="jenisPendaftaran">
<option selected disabled>-- Pilih --</option>
<option value="baru">Santriwati Baru</option>
<option value="pindahan">Santriwati Pindahan</option>
</select>
</div>
<div class="col-md-6">
<label class="form-label">JENJANG YANG DIPILIH</label>
<select class="form-select" id="jenjangPendidikan">
<option selected disabled>-- Pilih --</option>
<option>SMP Boarding</option>
<option>SMA Boarding</option>
</select>
</div>
</div>
<div class="mb-3">
<label class="form-label">JALUR PENDAFTARAN</label>
<select class="form-select" id="jalurPendaftaran">
<option selected disabled>-- Pilih --</option>
<option value="mandiri">Mandiri</option>
<option value="kader">Kader</option>
<option value="rekomendasi">Rekomendasi Cabang/Ranting</option>
</select>
</div>
<!-- Input Kader -->
<div class="mb-3 conditional-field" id="kaderField">
<label class="form-label">STATUS KADER SAAT INI</label>
<input type="text" class="form-control" placeholder="Status kader di organisasi (misal: Ketua IPM, Sekretaris PIP, dll)">
</div>
<!-- Input Rekomendasi -->
<div class="mb-3 conditional-field" id="rekomendasiField">
<label class="form-label">REKOMENDASI DARI</label>
<input type="text" class="form-control" placeholder="Nama Cabang/Ranting 'Aisyiyah">
</div>
<div class="mb-3">
<label class="form-label">NISN</label>
<input type="number" class="form-control" placeholder="10 Digit NISN">
</div>
<div class="mb-3">
<label class="form-label">NAMA LENGKAP</label>
<input type="text" class="form-control" placeholder="Nama Sesuai Ijazah">
</div>
<div class="mb-3">
<label class="form-label">BUAT PASSWORD</label>
<div class="input-group">
<input type="password" class="form-control border-end-0" id="regPass" placeholder="Min. 6 Karakter">
<span class="input-group-text bg-white border-start-0 cursor-pointer" onclick="togglePassword('regPass', 'iconRegPass')">
<i class="fas fa-eye text-muted" id="iconRegPass"></i>
</span>
</div>
<div class="form-text small">Password ini digunakan untuk login selanjutnya.</div>
</div>
<div class="mb-4">
<label class="form-label">KODE VERIFIKASI</label>
<div class="row align-items-center">
<div class="col-md-5 mb-2 mb-md-0 d-flex align-items-center">
<div id="captchaBox" class="captcha-box">Xm7sA</div>
<i class="fas fa-sync-alt btn-refresh-captcha" onclick="refreshCaptcha()" title="Ganti Kode"></i>
</div>
<div class="col-md-7">
<input type="text" class="form-control py-2" placeholder="Ketik kode disini">
</div>
</div>
</div>
<button type="submit" class="btn btn-orange w-100 py-3 text-uppercase" style="letter-spacing: 1px;">
<i class="fas fa-save me-2"></i> Simpan Pendaftaran
</button>
</form>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="card card-custom h-100 bg-dark text-white text-center d-flex align-items-center justify-content-center p-3 staggered-item">
<div style="border: 2px dashed rgba(255,255,255,0.3); width: 100%; height: 100%; border-radius: 10px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
<i class="far fa-image fa-5x mb-3 text-secondary floating"></i>
<h5>Area Poster PSB</h5>
<p class="text-muted small">Ukuran rekomendasi: 1080x1350 pixel</p>
</div>
</div>
</div>
</div>
</div>
</section>
<footer class="footer-section">
<div class="container pb-5">
<div class="text-center mb-5 staggered-item">
<h3 class="fw-bold text-navy">DATA REALTIME PENDAFTAR</h3>
<div style="width: 50px; height: 4px; background: var(--orange-primary); margin: 10px auto; border-radius: 2px;"></div>
</div>
<div class="row g-4 align-items-stretch">
<div class="col-lg-7">
<div class="stat-card-row stat-smp">
<div class="icon-wrapper">
<i class="fas fa-user-graduate"></i>
</div>
<div class="stat-content">
<div class="d-flex justify-content-between align-items-center mb-1">
<h6 class="mb-0 fw-bold text-secondary text-uppercase" style="font-size: 0.85rem;">Jenjang SMP Boarding</h6>
<span class="stat-percent text-primary">70%</span>
</div>
<div class="d-flex align-items-end justify-content-between mb-2">
<span class="stat-number-big">140</span>
<small class="text-muted fw-bold">Santriwati</small>
</div>
<div class="progress" style="height: 6px;">
<div class="progress-bar bg-primary" role="progressbar" style="width: 70%"></div>
</div>
</div>
</div>
<div class="stat-card-row stat-sma">
<div class="icon-wrapper">
<i class="fas fa-university"></i>
</div>
<div class="stat-content">
<div class="d-flex justify-content-between align-items-center mb-1">
<h6 class="mb-0 fw-bold text-secondary text-uppercase" style="font-size: 0.85rem;">Jenjang SMA Boarding</h6>
<span class="stat-percent text-warning" style="color: var(--orange-primary)!important;">45%</span>
</div>
<div class="d-flex align-items-end justify-content-between mb-2">
<span class="stat-number-big">90</span>
<small class="text-muted fw-bold">Santriwati</small>
</div>
<div class="progress" style="height: 6px;">
<div class="progress-bar" role="progressbar" style="width: 45%; background-color: var(--orange-primary);"></div>
</div>
</div>
</div>
</div>
<div class="col-lg-5">
<div class="total-box">
<div class="badge bg-white text-dark align-self-center mb-3 rounded-pill px-3 py-1 shadow-sm">
<div class="d-inline-block rounded-circle bg-success me-1" style="width:8px;height:8px;"></div> Live Data
</div>
<div class="total-number">230</div>
<div style="font-size: 1.1rem; font-weight: 500; opacity: 0.9;">Total Pendaftar Masuk</div>
<div class="mt-4 bg-white text-dark rounded-3 p-3 d-flex justify-content-between align-items-center shadow-sm">
<span class="fw-bold text-muted"><i class="fas fa-chair text-warning me-2"></i> Sisa Kuota</span>
<span class="fw-bold text-danger">20 Kursi</span>
</div>
</div>
</div>
</div>
</div>
<div class="bg-dark text-white text-center py-3 mt-4 small">
&copy; 2026 IT Team 'Aisyiyah Boarding School.
<a href="#" class="text-secondary text-decoration-none ms-2" data-bs-toggle="modal" data-bs-target="#modalAdmin">• Login Admin</a>
</div>
</footer>
<!-- Modal Admin -->
<div class="modal fade" id="modalAdmin" tabindex="-1"><div class="modal-dialog modal-dialog-centered"><div class="modal-content border-0 shadow-lg"><div class="modal-header bg-dark text-white"><h5 class="modal-title fw-bold"><i class="fas fa-user-shield me-2 text-warning"></i> Portal Panitia PSB</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div><div class="modal-body p-4"><form><div class="form-floating mb-3"><input type="email" class="form-control" id="adminEmail" placeholder="email"><label>Username / Email</label></div><div class="form-floating mb-4"><input type="password" class="form-control" id="adminPass" placeholder="Password"><label>Password</label></div><button type="submit" class="btn btn-dark w-100 py-2 fw-bold">MASUK DASHBOARD</button></form></div></div></div></div>
<!-- Modal Panduan -->
<div class="modal fade" id="modalPanduan" tabindex="-1">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header bg-navy text-white" style="background-color: var(--navy-primary);">
<h5 class="modal-title fw-bold">Panduan PSB Online</h5>
<a href="https://example.com/panduan-psb.pdf" target="_blank" class="text-white ms-auto me-3"><i class="fas fa-file-pdf fa-lg"></i></a>
<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
</div>
<div class="modal-body">
<ol class="list-group list-group-numbered">
<li class="list-group-item">Isi Formulir Pendaftaran Online pada halaman utama website ini.</li>
<li class="list-group-item">Simpan data dan catat <strong>NISN & Password</strong> yang Anda buat.</li>
<li class="list-group-item">Lakukan pembayaran biaya pendaftaran melalui transfer Bank.</li>
<li class="list-group-item">Login kembali menggunakan NISN & Password untuk upload bukti transfer.</li>
<li class="list-group-item">Cetak Kartu Bukti Pendaftaran dan tunggu jadwal tes seleksi.</li>
</ol>
<div class="mt-3 text-center">
<a href="https://example.com/panduan-psb.pdf" target="_blank" class="btn btn-outline-primary">
<i class="fas fa-download me-2"></i>Unduh Panduan Lengkap (PDF)
</a>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
</div>
</div>
</div>
</div>
<!-- Modal Biaya -->
<div class="modal fade" id="modalBiaya" tabindex="-1">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header text-white" style="background-color: var(--orange-primary);">
<h5 class="modal-title fw-bold"><i class="fas fa-money-bill-wave me-2"></i> Rincian Biaya PSB</h5>
<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
</div>
<div class="modal-body">
<table class="table table-striped table-bordered">
<thead class="table-dark">
<tr><th>Komponen Biaya</th><th>Nominal (Rp)</th><th>Keterangan</th></tr>
</thead>
<tbody>
<tr><td>Pendaftaran (Gelombang 3)</td><td class="fw-bold">Rp 300.000</td><td>Sekali bayar</td></tr>
<tr><td>Uang Pangkal / Gedung</td><td>Rp 5.000.000</td><td>Dapat dicicil 3x</td></tr>
<tr><td>Seragam (5 Setel)</td><td>Rp 1.200.000</td><td>Bahan & Jahit</td></tr>
<tr><td>SPP Bulan Juli</td><td>Rp 850.000</td><td>Termasuk Makan & Laundry</td></tr>
<tr class="table-info fw-bold"><td>TOTAL ESTIMASI</td><td>Rp 7.350.000</td><td></td></tr>
</tbody>
</table>
<div class="alert alert-info small mb-0"><i class="fas fa-info-circle"></i> Transfer ke Rekening <strong>BSI: 123-456-7890</strong> a.n. PSB 'Aisyiyah</div>
</div>
</div>
</div>
</div>
<!-- Modal Kontak -->
<div class="modal fade" id="modalKontak" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header bg-success text-white">
<h5 class="modal-title fw-bold"><i class="fas fa-headset me-2"></i> Hubungi Panitia PSB</h5>
<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
</div>
<div class="modal-body text-center">
<p class="mb-4">Ada kendala saat mendaftar? Silakan hubungi kami:</p>
<div class="d-grid gap-3">
<a href="#" class="btn btn-outline-success py-2"><i class="fab fa-whatsapp fa-lg me-2"></i> Chat WhatsApp Admin</a>
<a href="#" class="btn btn-outline-danger py-2"><i class="fas fa-envelope fa-lg me-2"></i> Email: psb@sekolah.sch.id</a>
<button class="btn btn-outline-primary py-2"><i class="fas fa-map-marker-alt fa-lg me-2"></i> Jl. Raya Ponorogo No. 123</button>
</div>
</div>
</div>
</div>
</div>
<!-- MODAL TENTANG - PENGEMBANGAN SISTEM (BARU) -->
<div class="modal fade" id="modalTentang" tabindex="-1">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header text-white" style="background-color: var(--navy-primary);">
<h5 class="modal-title fw-bold"><i class="fas fa-info-circle me-2"></i> Tentang Sistem PSB Online</h5>
<a href="https://bandungbondowoso.example.com" target="_blank" class="text-white ms-auto me-3"><i class="fas fa-external-link-alt fa-lg"></i></a>
<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
</div>
<div class="modal-body modal-tentang-container">
<div class="pengembangan-system-card">
<h6 class="pengembangan-title">
<i class="fas fa-laptop-code tentang-icon"></i>Pengembangan Sistem
</h6>
<p>Website PSB Online 'Aisyiyah Qur`anic Boarding School Ponorogo merupakan sistem resmi Penerimaan Santriwati Baru 'Aisyiyah Qur`anic Boarding School Ponorogo yang digunakan untuk mendukung seluruh proses pendaftaran santriwati secara terintegrasi dan terpusat.</p>
<h6 class="pengembangan-title mt-4">
<i class="fas fa-bullseye tentang-icon"></i>Tujuan Pengembangan Sistem
</h6>
<p>Sistem ini dikembangkan dengan tujuan untuk:</p>
<ul class="pengembangan-list">
<li><strong>Mempermudah calon santriwati dan wali</strong> dalam melakukan proses pendaftaran secara online, cepat, dan mudah diakses.</li>
<li><strong>Meningkatkan efisiensi dan akurasi</strong> pengelolaan data pendaftaran santriwati.</li>
<li><strong>Menyediakan informasi pendaftaran yang transparan</strong>, mulai dari jadwal, tahapan seleksi, hingga pengumuman.</li>
<li><strong>Mendukung transformasi digital</strong> di lingkungan pendidikan 'Aisyiyah Qur`anic Boarding School Ponorogo.</li>
</ul>
<div class="tim-info">
<h6 class="pengembangan-title">
<i class="fas fa-users-cog tentang-icon"></i>Informasi Pengembangan
</h6>
<p>Sistem ini dikembangkan sepenuhnya oleh <strong>Internship Team</strong> dari <strong>Teknik Informatika, Universitas Muhammadiyah Ponorogo</strong>, sebagai bagian dari kegiatan magang akademik, di bawah arahan dan persetujuan pihak 'Aisyiyah Qur`anic Boarding School Ponorogo, pada tahun 2025–2026.</p>
</div>
<div class="alert alert-light border mt-3">
<i class="fas fa-exclamation-circle text-info me-2"></i>
<small>Seluruh hasil pengembangan, pengelolaan data, dan pemanfaatan sistem berada di bawah kewenangan 'Aisyiyah Qur`anic Boarding School Ponorogo.</small>
</div>
<div class="text-center mt-3">
<a href="https://bandungbondowoso.example.com" target="_blank" class="btn btn-outline-info">
<i class="fas fa-globe me-2"></i>Kunjungi Website Bandung Bondowoso
</a>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
</div>
</div>
</div>
</div>
<!-- MODAL INFO PSB (BARU) -->
<div class="modal fade" id="modalInfoPSB" tabindex="-1">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header text-white" style="background-color: var(--navy-primary);">
<h5 class="modal-title fw-bold"><i class="fas fa-info-circle me-2"></i> Informasi PSB</h5>
<a href="https://example.com/info-psb.pdf" target="_blank" class="text-white ms-auto me-3"><i class="fas fa-file-pdf fa-lg"></i></a>
<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
</div>
<div class="modal-body">
<div class="alert alert-info">
<strong>Tahun Ajaran 2026/2027</strong> – Penerimaan Santriwati Baru dibuka dalam 3 gelombang:
</div>
<ul class="list-group mb-4">
<li class="list-group-item d-flex justify-content-between align-items-center">
Gelombang I
<span class="badge bg-success">Selesai</span>
</li>
<li class="list-group-item d-flex justify-content-between align-items-center">
Gelombang II
<span class="badge bg-warning text-dark">Selesai</span>
</li>
<li class="list-group-item d-flex justify-content-between align-items-center">
Gelombang III
<span class="badge bg-primary">Berlangsung</span>
</li>
</ul>
<p><strong>Jadwal Penting:</strong></p>
<ul>
<li>Pendaftaran Gelombang III: 10 Januari – 30 Januari 2026</li>
<li>Tes Seleksi Akademik: 5 Februari 2026</li>
<li>Wawancara Orang Tua: 10–12 Februari 2026</li>
<li>Pengumuman Hasil: 20 Februari 2026</li>
</ul>
<p><strong>Persyaratan Umum:</strong></p>
<ul>
<li>Fotokopi ijazah & SKHUN (legalisir)</li>
<li>Pas foto 3x4 (2 lembar)</li>
<li>Akte kelahiran</li>
<li>Kartu Keluarga</li>
</ul>
<div class="text-center mt-3">
<a href="https://example.com/info-psb.pdf" target="_blank" class="btn btn-outline-primary">
<i class="fas fa-download me-2"></i>Unduh Info PSB Lengkap (PDF)
</a>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
</div>
</div>
</div>
</div>
<!-- MODAL PENGUMUMAN DETAIL -->
<div class="modal fade" id="modalPengumumanDetail" tabindex="-1">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header bg-navy text-white" style="background-color: var(--navy-primary);">
<h5 class="modal-title fw-bold" id="modalPengumumanTitle">Detail Pengumuman</h5>
<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
</div>
<div class="modal-body" id="modalPengumumanContent">
<!-- Content will be filled dynamically -->
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
</div>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Toggle Password
function togglePassword(inputId, iconId) {
const input = document.getElementById(inputId); const icon = document.getElementById(iconId);
if (input.type === "password") { input.type = "text"; icon.classList.remove("fa-eye"); icon.classList.add("fa-eye-slash"); }
else { input.type = "password"; icon.classList.remove("fa-eye-slash"); icon.classList.add("fa-eye"); }
}
// Refresh Captcha Logic
function refreshCaptcha() {
const chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
let captcha = "";
for (let i = 0; i < 5; i++) {
captcha += chars.charAt(Math.floor(Math.random() * chars.length));
}
document.getElementById("captchaBox").innerText = captcha;
}
// Countdown Logic (Static on page load, functionality remains)
const waveName = "GELOMBANG 3";
const endDate   = new Date("January 30, 2026 23:59:59").getTime();
document.getElementById("waveName").innerText = waveName;
setInterval(function() {
const now = new Date().getTime();
const badge = document.getElementById("statusBadge"); const label = document.getElementById("timerLabel");
if (now > endDate) { badge.className = "status-badge bg-danger"; badge.innerText = "DITUTUP"; label.innerText = "Berakhir."; document.getElementById("days").innerText = "00"; }
else {
const distance = endDate - now;
const days = Math.floor(distance / (1000 * 60 * 60 * 24));
const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
const seconds = Math.floor((distance % (1000 * 60)) / 1000);
document.getElementById("days").innerText = days < 10 ? "0" + days : days;
document.getElementById("hours").innerText = hours < 10 ? "0" + hours : hours;
document.getElementById("minutes").innerText = minutes < 10 ? "0" + minutes : minutes;
document.getElementById("seconds").innerText = seconds < 10 ? "0" + seconds : seconds;
}
}, 1000);
// Smooth scroll untuk tombol daftar sekarang
document.querySelector('.btn-quick-access').addEventListener('click', function(e) {
if (this.getAttribute('href').startsWith('#')) {
e.preventDefault();
const targetId = this.getAttribute('href');
const targetElement = document.querySelector(targetId);
if (targetElement) {
window.scrollTo({
top: targetElement.offsetTop - 80,
behavior: 'smooth'
});
}
}
});
// Conditional Fields Logic
document.getElementById('jalurPendaftaran').addEventListener('change', function() {
const kaderField = document.getElementById('kaderField');
const rekomendasiField = document.getElementById('rekomendasiField');
// Hide all conditional fields first
kaderField.classList.remove('show');
rekomendasiField.classList.remove('show');
// Show specific field based on selection
if (this.value === 'kader') {
kaderField.classList.add('show');
} else if (this.value === 'rekomendasi') {
rekomendasiField.classList.add('show');
}
});
// Staggered Animation for Hero Section
document.addEventListener('DOMContentLoaded', function() {
setTimeout(() => {
const staggeredItems = document.querySelectorAll('.staggered-item');
staggeredItems.forEach((item, index) => {
setTimeout(() => {
item.classList.add('visible');
}, index * 200);
});
}, 300);

// Populate announcements dynamically with click functionality
const announcements = [
{ 
  day: "04", month: "Jan", year: "2026", tag: "INFO TERBARU", 
  title: "Pembukaan Pendaftaran Gelombang 3", 
  desc: "Pendaftaran gelombang ketiga resmi dibuka mulai hari ini. Segera lengkapi berkas sebelum kuota penuh.",
  fullContent: `<p>Pendaftaran gelombang ketiga resmi dibuka mulai hari ini, tanggal 4 Januari 2026. Calon santriwati baru dapat segera mengisi formulir pendaftaran online melalui website resmi PSB 'Aisyiyah Qur\`anic Boarding School.</p>
<p>Kuota terbatas hanya untuk 100 santriwati baru per jenjang (SMP dan SMA). Segera lengkapi berkas administrasi dan lakukan pembayaran biaya pendaftaran sebelum kuota penuh atau masa pendaftaran berakhir pada tanggal 30 Januari 2026.</p>
<p>Berkas yang harus dipersiapkan:</p>
<ul>
<li>Fotokopi ijazah & SKHUN (legalisir)</li>
<li>Pas foto 3x4 (2 lembar)</li>
<li>Akte kelahiran</li>
<li>Kartu Keluarga</li>
<li>Surat keterangan sehat dari dokter</li>
</ul>`
},
{ 
  day: "20", month: "Feb", year: "2026", tag: "AKADEMIK", 
  title: "Jadwal Tes Seleksi Masuk Online", 
  desc: "Tes seleksi akademik dan wawancara akan dilaksanakan secara daring. Cek kartu ujian di dashboard.",
  fullContent: `<p>Tes seleksi akademik dan wawancara untuk calon santriwati baru akan dilaksanakan secara daring melalui platform Zoom Meeting.</p>
<p><strong>Jadwal Tes Akademik:</strong></p>
<ul>
<li>SMP Boarding: Sabtu, 20 Februari 2026 pukul 08.00 - 10.00 WIB</li>
<li>SMA Boarding: Sabtu, 20 Februari 2026 pukul 10.30 - 12.30 WIB</li>
</ul>
<p><strong>Jadwal Wawancara:</strong></p>
<ul>
<li>Minggu, 21 Februari 2026 pukul 08.00 - 16.00 WIB (sesi per keluarga)</li>
</ul>
<p>Calon santriwati wajib login ke dashboard pribadi untuk mencetak kartu ujian dan mendapatkan link Zoom Meeting. Pastikan koneksi internet stabil dan perangkat (laptop/smartphone) dalam kondisi baik.</p>`
},
{ 
  day: "15", month: "Jan", year: "2026", tag: "PENTING", 
  title: "Perubahan Jadwal Wawancara", 
  desc: "Wawancara orang tua dialihkan ke sesi virtual via Zoom. Harap perhatikan email konfirmasi.",
  fullContent: `<p>Sehubungan dengan situasi terkini, wawancara orang tua/wali calon santriwati yang semula direncanakan tatap muka, dialihkan menjadi sesi virtual melalui platform Zoom Meeting.</p>
<p>Setiap keluarga akan mendapatkan email konfirmasi berisi:</p>
<ul>
<li>Link Zoom Meeting khusus</li>
<li>ID Meeting dan Password</li>
<li>Jadwal sesi wawancara spesifik</li>
<li>Panduan teknis pelaksanaan wawancara virtual</li>
</ul>
<p>Harap perhatikan email yang terdaftar saat pendaftaran dan pastikan untuk hadir tepat waktu sesuai jadwal yang telah ditentukan. Wawancara virtual memiliki bobot penilaian yang sama dengan wawancara tatap muka.</p>`
},
{ 
  day: "01", month: "Mar", year: "2026", tag: "KEGIATAN", 
  title: "Open House Virtual", 
  desc: "Ikuti open house virtual untuk mengenal lebih dekat lingkungan pesantren dan fasilitasnya.",
  fullContent: `<p>'Aisyiyah Qur\`anic Boarding School Ponorogo mengundang calon santriwati dan orang tua/wali untuk mengikuti Open House Virtual yang akan diselenggarakan pada:</p>
<p><strong>Tanggal:</strong> 1 Maret 2026<br>
<strong>Waktu:</strong> 13.00 - 15.00 WIB<br>
<strong>Platform:</strong> YouTube Live & Zoom Meeting</p>
<p>Dalam acara ini, Anda akan mendapatkan kesempatan untuk:</p>
<ul>
<li>Mengenal profil lengkap 'Aisyiyah Qur\`anic Boarding School</li>
<li>Tour virtual fasilitas asrama, ruang kelas, masjid, perpustakaan, dan laboratorium</li>
<li>Sesi tanya jawab langsung dengan kepala sekolah dan panitia PSB</li>
<li>Testimoni dari santriwati senior</li>
</ul>
<p>Daftar terlebih dahulu melalui link yang tersedia di dashboard pendaftaran Anda untuk mendapatkan link akses eksklusif.</p>`
}
];

const wrapper = document.getElementById('announcementWrapper');
announcements.forEach((ann, index) => {
const card = document.createElement('div');
card.className = 'announcement-card';
card.innerHTML = `
<div class="ann-date">
<span class="ann-day">${ann.day}</span>
<span class="ann-month">${ann.month}</span>
<span class="ann-year">${ann.year}</span>
</div>
<div class="ann-content">
<span class="ann-tag"><i class="fas fa-bullhorn"></i> ${ann.tag}</span>
<div class="ann-title">${ann.title}</div>
<p class="ann-desc">${ann.desc}</p>
</div>
<div class="ann-arrow d-none d-md-flex">
<i class="fas fa-chevron-right"></i>
</div>
`;
// Add click event to show modal
card.addEventListener('click', () => {
document.getElementById('modalPengumumanTitle').textContent = ann.title;
document.getElementById('modalPengumumanContent').innerHTML = ann.fullContent;
const modal = new bootstrap.Modal(document.getElementById('modalPengumumanDetail'));
modal.show();
});
wrapper.appendChild(card);
});

// Initialize captcha
refreshCaptcha();
});
</script>
</body>
</html>

