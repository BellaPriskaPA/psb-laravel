<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manajemen Pembayaran - Admin PSB AQBS</title>
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
/* --- SETTING PEMBAYARAN --- */
.payment-setting-card {
background: white;
border-radius: 16px;
padding: 20px;
margin-bottom: 25px;
box-shadow: 0 4px 12px rgba(0,0,0,0.08);
border-left: 6px solid var(--blue-info);
}
.payment-setting-header {
display: flex;
justify-content: space-between;
align-items: center;
margin-bottom: 20px;
flex-wrap: wrap;
gap: 15px;
}
.payment-setting-header h5 {
font-size: 0.95rem;
font-weight: 700;
color: var(--navy-primary);
margin: 0;
display: flex;
align-items: center;
gap: 10px;
}
.payment-setting-header h5 i {
color: var(--blue-info);
}
.setting-header-actions {
display: flex;
gap: 10px;
align-items: center;
flex-wrap: wrap;
}
.toggle-label {
font-size: 0.8rem;
font-weight: 600;
color: #64748b;
}
.toggle-switch {
position: relative;
display: inline-block;
width: 50px;
height: 26px;
}
.toggle-switch input {
opacity: 0;
width: 0;
height: 0;
}
.toggle-slider {
position: absolute;
cursor: pointer;
top: 0;
left: 0;
right: 0;
bottom: 0;
background-color: #e2e8f0;
transition: .4s;
border-radius: 34px;
}
.toggle-slider:before {
position: absolute;
content: "";
height: 18px;
width: 18px;
left: 4px;
bottom: 4px;
background-color: white;
transition: .4s;
border-radius: 50%;
}
input:checked + .toggle-slider {
background-color: var(--blue-info);
}
input:checked + .toggle-slider:before {
transform: translateX(24px);
}
.payment-account-info {
background: #f8fafc;
border-radius: 12px;
padding: 15px;
margin-top: 15px;
border: 1px solid #e2e8f0;
}
.payment-types-container {
margin-bottom: 20px;
}
.payment-type-item {
background: white;
border-radius: 10px;
padding: 15px;
margin-bottom: 10px;
border: 1px solid #e2e8f0;
transition: all 0.3s;
}
.payment-type-item:hover {
box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}
.payment-type-header {
display: flex;
justify-content: space-between;
align-items: center;
margin-bottom: 10px;
}
.payment-type-title {
font-size: 0.9rem;
font-weight: 700;
color: var(--navy-primary);
display: flex;
align-items: center;
gap: 8px;
}
.payment-type-actions {
display: flex;
gap: 8px;
}
.payment-type-badge {
display: inline-block;
padding: 3px 10px;
border-radius: 6px;
font-size: 0.7rem;
font-weight: 700;
}
.badge-pembayaran-awal-setting {
background: #dbeafe;
color: #1e40af;
border: 1px solid #bfdbfe;
}
.badge-daftar-ulang-setting {
background: #dcfce7;
color: #166534;
border: 1px solid #bbf7d0;
}
.account-badge {
display: inline-block;
padding: 3px 10px;
border-radius: 6px;
font-size: 0.7rem;
font-weight: 700;
margin-left: 10px;
}
.badge-active {
background: #dcfce7;
color: #166534;
border: 1px solid #bbf7d0;
}
.badge-inactive {
background: #fee2e2;
color: #b91c1c;
border: 1px solid #fecaca;
}
.btn-small-action {
padding: 4px 8px;
border-radius: 6px;
font-size: 0.7rem;
font-weight: 600;
display: inline-flex;
align-items: center;
gap: 4px;
cursor: pointer;
transition: all 0.2s;
border: 1px solid;
}
.btn-edit-small {
background: #fef3c7;
color: #d97706;
border-color: #fde68a;
}
.btn-edit-small:hover {
background: #f59e0b;
color: white;
}
.btn-delete-small {
background: #fee2e2;
color: #dc2626;
border-color: #fecaca;
}
.btn-delete-small:hover {
background: #dc2626;
color: white;
}
.btn-add-account {
background: linear-gradient(135deg, #22c55e, #16a34a);
color: white;
border: none;
padding: 8px 16px;
border-radius: 8px;
font-weight: 600;
font-size: 0.85rem;
transition: all 0.3s;
display: flex;
align-items: center;
gap: 8px;
cursor: pointer;
}
.btn-add-account:hover {
background: linear-gradient(135deg, #16a34a, #15803d);
transform: translateY(-2px);
box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
}
.btn-edit-setting {
background: linear-gradient(135deg, var(--orange-primary), #e67100);
color: white;
border: none;
padding: 8px 16px;
border-radius: 8px;
font-weight: 600;
font-size: 0.85rem;
transition: all 0.3s;
display: flex;
align-items: center;
gap: 8px;
cursor: pointer;
}
.btn-edit-setting:hover {
background: linear-gradient(135deg, #e67100, #cc6500);
transform: translateY(-2px);
box-shadow: 0 4px 12px rgba(255, 127, 0, 0.3);
}
.payment-type-details {
display: grid;
grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
gap: 10px;
margin-top: 10px;
font-size: 0.85rem;
}
.payment-type-detail {
display: flex;
flex-direction: column;
gap: 4px;
}
.detail-label {
font-size: 0.75rem;
color: #64748b;
font-weight: 600;
}
.detail-value {
font-weight: 700;
color: var(--navy-primary);
}
.account-item {
background: white;
border-radius: 10px;
padding: 15px;
margin-bottom: 10px;
border: 1px solid #e2e8f0;
}
.account-header {
display: flex;
justify-content: space-between;
align-items: center;
margin-bottom: 10px;
}
.account-title {
font-size: 0.9rem;
font-weight: 700;
color: var(--navy-primary);
display: flex;
align-items: center;
gap: 8px;
}
.account-details {
display: grid;
grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
gap: 10px;
font-size: 0.85rem;
}
.jenjang-selection {
display: flex;
gap: 15px;
margin-top: 10px;
flex-wrap: wrap;
}
.jenjang-checkbox {
display: flex;
align-items: center;
gap: 8px;
cursor: pointer;
}
.jenjang-checkbox input[type="checkbox"] {
width: 18px;
height: 18px;
cursor: pointer;
}
.jenjang-checkbox-label {
font-size: 0.85rem;
font-weight: 600;
color: var(--navy-primary);
cursor: pointer;
}
/* Export Buttons */
.export-buttons {
display: flex;
gap: 10px;
margin-bottom: 15px;
flex-wrap: wrap;
}
.btn-export {
padding: 8px 16px;
border-radius: 8px;
font-weight: 600;
font-size: 0.85rem;
transition: all var(--transition-speed);
display: inline-flex;
align-items: center;
gap: 8px;
text-decoration: none;
min-width: 120px;
justify-content: center;
}
.btn-export-pdf {
background: #ef4444;
color: white;
border: 1px solid #dc2626;
}
.btn-export-pdf:hover {
background: #dc2626;
transform: translateY(-2px);
box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
}
.btn-export-excel {
background: #22c55e;
color: white;
border: 1px solid #16a34a;
}
.btn-export-excel:hover {
background: #16a34a;
transform: translateY(-2px);
box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
}
/* --- PAYMENT COMPONENTS --- */
.card-custom {
background: white;
border-radius: 20px;
border: 1px solid #e2e8f0;
box-shadow: 0 4px 12px rgba(0,0,0,0.08);
overflow: hidden;
margin-bottom: 30px;
transition: var(--transition-speed);
}
.card-custom:hover {
box-shadow: 0 6px 20px rgba(0,0,0,0.12);
transform: translateY(-2px);
}
.section-title {
font-size: 0.95rem;
font-weight: 700;
color: var(--navy-primary);
padding: 20px 25px;
background: #f8fafc;
border-bottom: 1px solid #e2e8f0;
display: flex;
justify-content: space-between;
align-items: center;
flex-wrap: wrap;
gap: 15px;
}
/* Table Pagination */
.table-pagination {
display: flex;
justify-content: space-between;
align-items: center;
padding: 15px 25px;
background: #f8fafc;
border-top: 1px solid #e2e8f0;
flex-wrap: wrap;
gap: 15px;
}
.pagination-info {
font-size: 0.85rem;
color: #64748b;
font-weight: 600;
}
.pagination-controls {
display: flex;
align-items: center;
gap: 15px;
flex-wrap: wrap;
}
.rows-per-page {
display: flex;
align-items: center;
gap: 8px;
}
.rows-per-page-label {
font-size: 0.8rem;
color: #64748b;
font-weight: 600;
}
.rows-per-page-select {
padding: 5px 10px;
border: 1px solid #d1d5db;
border-radius: 6px;
background: white;
font-size: 0.8rem;
font-weight: 600;
color: var(--navy-primary);
cursor: pointer;
}
.rows-per-page-select:focus {
outline: none;
border-color: var(--blue-info);
}
.pagination-buttons {
display: flex;
align-items: center;
gap: 5px;
}
.pagination-btn {
width: 32px;
height: 32px;
border-radius: 8px;
display: flex;
align-items: center;
justify-content: center;
background: white;
border: 1px solid #d1d5db;
color: #64748b;
font-size: 0.8rem;
font-weight: 600;
cursor: pointer;
transition: all 0.2s;
}
.pagination-btn:hover {
background: #f3f4f6;
border-color: #9ca3af;
}
.pagination-btn.active {
background: var(--blue-info);
color: white;
border-color: var(--blue-info);
}
.pagination-btn:disabled {
background: #f3f4f6;
color: #d1d5db;
cursor: not-allowed;
}
.pagination-btn-prev,
.pagination-btn-next {
padding: 0 12px;
width: auto;
min-width: 70px;
}
.badge-nominal-warning {
background: #fee2e2;
color: #b91c1c;
padding: 5px 12px;
border-radius: 8px;
font-weight: 700;
font-size: 0.75rem;
border: 1px solid #fecaca;
display: inline-flex;
align-items: center;
gap: 5px;
}
.badge-verif-wait {
background: #fef9c3;
color: #a16207;
font-size: 0.7rem;
font-weight: 800;
padding: 6px 12px;
border-radius: 8px;
border: 1px solid #fef08a;
}
.badge-verif-done {
background: #dcfce7;
color: #166534;
font-size: 0.7rem;
font-weight: 800;
padding: 6px 12px;
border-radius: 8px;
border: 1px solid #bbf7d0;
}
.badge-pembayaran-awal {
background: #dbeafe;
color: #1e40af;
font-size: 0.7rem;
font-weight: 700;
padding: 4px 10px;
border-radius: 6px;
border: 1px solid #bfdbfe;
}
.badge-daftar-ulang {
background: #f0fdf4;
color: #166534;
font-size: 0.7rem;
font-weight: 700;
padding: 4px 10px;
border-radius: 6px;
border: 1px solid #bbf7d0;
}
.btn-action-circle {
width: 32px;
height: 32px;
border-radius: 8px;
display: inline-flex;
align-items: center;
justify-content: center;
border: 1px solid;
color: white;
transition: var(--transition-speed);
font-size: 0.75rem;
margin: 0 2px;
}
.btn-view-proof {
background: #dbeafe;
color: #3b82f6;
border-color: #bfdbfe;
}
.btn-view-proof:hover {
background: #3b82f6;
color: white;
transform: translateY(-2px);
}
.btn-approve {
background: #dcfce7;
color: #22c55e;
border-color: #bbf7d0;
}
.btn-approve:hover {
background: #22c55e;
color: white;
transform: translateY(-2px);
}
.btn-reject {
background: #fee2e2;
color: #ef4444;
border-color: #fecaca;
}
.btn-reject:hover {
background: #ef4444;
color: white;
transform: translateY(-2px);
}
.btn-download-excel {
background: #dcfce7;
color: #22c55e;
border: 1px solid #bbf7d0;
padding: 6px 16px;
border-radius: 8px;
font-weight: 700;
font-size: 0.85rem;
transition: var(--transition-speed);
display: inline-flex;
align-items: center;
gap: 6px;
}
.btn-download-excel:hover {
background: #22c55e;
color: white;
transform: translateY(-2px);
}
/* --- FILTER CARD --- */
.filter-card {
background: white;
border-radius: 16px;
padding: 20px;
margin-bottom: 25px;
box-shadow: 0 4px 12px rgba(0,0,0,0.08);
border-left: 4px solid var(--blue-info);
}
.filter-card h6 {
font-size: 0.85rem;
font-weight: 700;
color: #64748b;
margin-bottom: 8px;
text-transform: uppercase;
}
/* --- TABLE STYLING --- */
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
/* Simple Proof Modal */
.simple-proof-modal .modal-dialog {
max-width: 400px;
}
.simple-proof-modal .modal-content {
border-radius: 12px;
box-shadow: 0 6px 20px rgba(0,0,0,0.15);
}
.simple-proof-modal .modal-header {
background: var(--navy-primary);
color: white;
border-radius: 12px 12px 0 0;
padding: 12px 15px;
}
.simple-proof-modal .modal-header .btn-close {
filter: invert(1);
opacity: 0.8;
}
.simple-proof-modal .modal-body {
padding: 15px;
text-align: center;
}
.simple-proof-modal img {
max-width: 100%;
max-height: 300px;
border-radius: 8px;
box-shadow: 0 2px 8px rgba(0,0,0,0.1);
object-fit: contain;
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
width: 280px;
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
.payment-setting-header {
flex-direction: column;
align-items: flex-start;
}
.setting-header-actions {
align-self: flex-start;
}
.filter-card {
padding: 15px;
}
.filter-card .form-label {
font-size: 0.75rem;
margin-bottom: 5px;
}
.form-select, .form-control {
font-size: 0.85rem;
padding: 8px 12px;
}
.btn-filter {
padding: 8px 16px;
font-size: 0.85rem;
}
.export-buttons {
justify-content: center;
}
.btn-export {
width: 100%;
max-width: 200px;
}
.table-responsive {
overflow-x: auto;
-webkit-overflow-scrolling: touch;
}
.table {
min-width: 500px;
}
.table th, .table td {
padding: 12px 10px;
font-size: 0.85rem;
}
.badge-nominal-warning, .badge-verif-wait, .badge-verif-done, .badge-pembayaran-awal, .badge-daftar-ulang {
font-size: 0.7rem;
padding: 4px 10px;
}
.btn-action-circle {
width: 28px;
height: 28px;
font-size: 0.7rem;
margin: 0 1px;
}
.section-title {
flex-direction: column;
align-items: stretch;
gap: 15px;
}
.btn-download-excel {
width: 100%;
justify-content: center;
margin-top: 10px;
}
.table-pagination {
flex-direction: column;
align-items: stretch;
gap: 15px;
}
.pagination-controls {
flex-direction: column;
align-items: stretch;
gap: 10px;
}
.rows-per-page {
justify-content: center;
}
.pagination-buttons {
justify-content: center;
flex-wrap: wrap;
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
.modal-dialog {
margin: 0.5rem;
max-width: calc(100% - 1rem);
}
.modal-body {
padding: 15px;
max-height: calc(85vh - 120px);
}
}
@media (max-width: 576px) {
.table th, .table td {
padding: 10px 12px;
font-size: 0.8rem;
}
.btn-action-circle {
width: 26px;
height: 26px;
font-size: 0.65rem;
}
.badge-verif-wait, .badge-verif-done, .badge-pembayaran-awal, .badge-daftar-ulang {
font-size: 0.65rem;
padding: 4px 8px;
min-width: 100px;
text-align: center;
}
.badge-nominal-warning {
font-size: 0.7rem;
padding: 4px 8px;
}
.section-title {
font-size: 0.9rem;
padding: 15px 20px;
}
.table {
min-width: 650px;
}
.section-title .btn-download-excel {
font-size: 0.8rem;
padding: 5px 12px;
}
.table thead {
display: none;
}
.table tbody,
.table tr,
.table td {
display: block;
}
.table tr {
border: 1px solid #e2e8f0;
border-radius: 16px;
margin-bottom: 15px;
padding: 15px;
background: white;
box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}
.table td {
padding: 8px 0;
border: none;
position: relative;
padding-left: 35%;
}
.table td:before {
content: attr(data-label);
position: absolute;
left: 0;
width: 32%;
padding-right: 10px;
font-weight: 700;
color: #64748b;
font-size: 0.85rem;
word-wrap: break-word;
}
.table td.text-center {
text-align: left;
padding-left: 0;
}
.table td.text-center:before {
content: "Aksi";
width: 100%;
padding-bottom: 8px;
border-bottom: 1px solid #e2e8f0;
margin-bottom: 8px;
}
.btn-action-group {
display: flex;
gap: 5px;
flex-wrap: wrap;
}
.table td:last-child {
padding-top: 15px;
}
.image-preview {
max-height: 200px;
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
<small class="opacity-75 fw-medium" style="font-size: 0.6rem;">Manajemen Pembayaran</small>
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
<button class="menu-btn active-dashboard"><i class="fas fa-database"></i>Data PSB</button>
<ul class="sub-menu">
<li><a href="#">Semua Data</a></li>
<li><a href="#">Daftar Berkas</a></li>
<li><a href="#">Data Diterima</a></li>
<li><a href="#">Siswa Daftar Ulang</a></li>
<li><a href="#" class="active">Pembayaran</a></li>
<li><a href="#">Ditolak / Cadangan</a></li>
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
<h4 class="fw-bold" style="color: var(--navy-primary);">Verifikasi Pembayaran</h4>
<p class="text-muted small">Validasi bukti transfer biaya pendaftaran dan daftar ulang santriwati.</p>
</div>
<!-- Setting Pembayaran Section -->
<div class="payment-setting-card">
<div class="payment-setting-header">
<h5><i class="fas fa-cog"></i> Pengaturan Pembayaran</h5>
<div class="setting-header-actions">
<div class="setting-toggle">
<span class="toggle-label">Aktifkan Pembayaran:</span>
<label class="toggle-switch">
<input type="checkbox" id="paymentToggle" checked>
<span class="toggle-slider"></span>
</label>
</div>
<button class="btn-edit-setting" id="editSettingBtn">
<i class="fas fa-edit"></i> Edit Setting
</button>
</div>
</div>
<div class="payment-account-info">
<!-- 2 Jenis Pembayaran Tetap -->
<div class="mb-4">
<h6 class="mb-3" style="color: var(--navy-primary);">Jenis Pembayaran</h6>
<div class="payment-types-container" id="paymentTypesContainer">
<!-- Payment types will be populated by JavaScript -->
</div>
</div>
<!-- Rekening Bank Section -->
<div class="mb-4">
<div class="d-flex justify-content-between align-items-center mb-3">
<h6 class="mb-0" style="color: var(--navy-primary);">Rekening Bank</h6>
<button class="btn-add-account" id="addAccountBtn">
<i class="fas fa-plus"></i> Tambah Rekening
</button>
</div>
<div class="accountsContainer" id="accountsContainer">
<!-- Accounts will be populated by JavaScript -->
</div>
</div>
<!-- Status dan Jenjang -->
<div class="account-item">
<div class="account-header">
<div class="account-title">
<i class="fas fa-toggle-on"></i>
<span>Status dan Pengaturan Umum</span>
</div>
</div>
<div class="account-details">
<div class="payment-type-detail">
<div class="detail-label">Status Sistem</div>
<div class="detail-value">
<span id="accountStatusText">Aktif</span>
<span id="accountStatusBadge" class="account-badge badge-active">Aktif</span>
</div>
</div>
<div class="payment-type-detail">
<div class="detail-label">Ditujukan Untuk Jenjang</div>
<div class="jenjang-selection">
<label class="jenjang-checkbox">
<input type="checkbox" id="jenjangSMP" checked>
<span class="jenjang-checkbox-label">SMP</span>
</label>
<label class="jenjang-checkbox">
<input type="checkbox" id="jenjangSMA" checked>
<span class="jenjang-checkbox-label">SMA</span>
</label>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Export Buttons -->
<div class="export-buttons">
<a href="#" class="btn-export btn-export-pdf" id="exportPdfBtn">
<i class="fas fa-file-pdf"></i> Ekspor PDF
</a>
<a href="#" class="btn-export btn-export-excel" id="exportExcelBtn">
<i class="fas fa-file-excel"></i> Ekspor Excel
</a>
</div>
<div class="filter-card">
<div class="row g-3">
<div class="col-12 col-md-4">
<label class="small fw-bold mb-1">Pencarian</label>
<input type="text" class="form-control form-control-sm" id="filterSearch" placeholder="Cari Nama Santriwati / Kode Transaksi...">
</div>
<div class="col-12 col-md-2">
<label class="small fw-bold mb-1">Jenjang</label>
<select class="form-select form-select-sm" id="filterJenjang">
<option value="">Semua Jenjang</option>
<option>SMP</option>
<option>SMA</option>
</select>
</div>
<div class="col-12 col-md-2">
<label class="small fw-bold mb-1">Jenis Pembayaran</label>
<select class="form-select form-select-sm" id="filterJenis">
<option value="">Semua Jenis</option>
<option>Pembayaran Awal</option>
<option>Daftar Ulang</option>
</select>
</div>
<div class="col-12 col-md-2">
<label class="small fw-bold mb-1">Status</label>
<select class="form-select form-select-sm" id="filterStatus">
<option value="">Semua Status</option>
<option>Belum Verifikasi</option>
<option>Sudah Verifikasi</option>
</select>
</div>
<div class="col-12 col-md-2 d-flex align-items-end">
<button class="btn-filter w-100" id="applyFilterBtn" style="background: linear-gradient(135deg, var(--orange-primary), #e67100); color: white; border: none; padding: 8px 16px; border-radius: 8px; font-weight: 600; font-size: 0.85rem;">CARI</button>
</div>
</div>
</div>
<!-- PEMBAYARAN AWAL SECTION -->
<div class="card-custom">
<div class="section-title">
<span><i class="fas fa-wallet text-info me-2"></i>Pembayaran Awal (Biaya Pendaftaran)</span>
<div>
<button class="btn-download-excel me-2" id="downloadAwalExcelBtn">
<i class="fas fa-file-excel me-1"></i> Download Excel
</button>
<button class="btn-download-excel" style="background: #ef4444; color: white; border-color: #dc2626;" id="downloadAwalPdfBtn">
<i class="fas fa-file-pdf me-1"></i> Download PDF
</button>
</div>
</div>
<div class="table-responsive">
<table class="table table-hover align-middle mb-0" id="pembayaranAwalTable">
<thead class="bg-light">
<tr>
<th class="ps-4">No</th>
<th>Kode Transaksi</th>
<th>Nama Santriwati</th>
<th>Jumlah Bayar</th>
<th>Tgl Bayar</th>
<th>Jenjang</th>
<th>Verifikasi</th>
<th class="text-center">Bukti</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody id="pembayaranAwalBody">
<!-- Table rows will be populated by JavaScript -->
</tbody>
</table>
</div>
<!-- Pagination for Pembayaran Awal -->
<div class="table-pagination" id="paginationAwal">
<div class="pagination-info" id="paginationInfoAwal">
Menampilkan 0 dari 0 data
</div>
<div class="pagination-controls">
<div class="rows-per-page">
<span class="rows-per-page-label">Tampilkan:</span>
<select class="rows-per-page-select" id="rowsPerPageAwal">
<option value="10">10</option>
<option value="25">25</option>
<option value="50">50</option>
<option value="100">100</option>
<option value="0">Semua</option>
</select>
</div>
<div class="pagination-buttons" id="paginationButtonsAwal">
<!-- Pagination buttons will be populated by JavaScript -->
</div>
</div>
</div>
</div>
<!-- DAFTAR ULANG SECTION -->
<div class="card-custom">
<div class="section-title">
<span><i class="fas fa-clipboard-list text-success me-2"></i>Daftar Ulang (Biaya Registrasi)</span>
<div>
<button class="btn-download-excel me-2" id="downloadUlangExcelBtn">
<i class="fas fa-file-excel me-1"></i> Download Excel
</button>
<button class="btn-download-excel" style="background: #ef4444; color: white; border-color: #dc2626;" id="downloadUlangPdfBtn">
<i class="fas fa-file-pdf me-1"></i> Download PDF
</button>
</div>
</div>
<div class="table-responsive">
<table class="table table-hover align-middle mb-0" id="daftarUlangTable">
<thead class="bg-light">
<tr>
<th class="ps-4">No</th>
<th>Kode Transaksi</th>
<th>Nama Santriwati</th>
<th>Jumlah Bayar</th>
<th>Tgl Bayar</th>
<th>Jenjang</th>
<th>Verifikasi</th>
<th class="text-center">Bukti</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody id="daftarUlangBody">
<!-- Table rows will be populated by JavaScript -->
</tbody>
</table>
</div>
<!-- Pagination for Daftar Ulang -->
<div class="table-pagination" id="paginationUlang">
<div class="pagination-info" id="paginationInfoUlang">
Menampilkan 0 dari 0 data
</div>
<div class="pagination-controls">
<div class="rows-per-page">
<span class="rows-per-page-label">Tampilkan:</span>
<select class="rows-per-page-select" id="rowsPerPageUlang">
<option value="10">10</option>
<option value="25">25</option>
<option value="50">50</option>
<option value="100">100</option>
<option value="0">Semua</option>
</select>
</div>
<div class="pagination-buttons" id="paginationButtonsUlang">
<!-- Pagination buttons will be populated by JavaScript -->
</div>
</div>
</div>
</div>
</main>

<!-- SIMPLE PROOF MODAL (HANYA GAMBAR + TUTUP) -->
<div class="modal fade simple-proof-modal" id="simpleProofModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Bukti Pembayaran</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img id="simpleProofImage" src="" alt="Bukti Pembayaran" style="max-width: 100%; max-height: 300px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Add Account Modal -->
<div class="modal fade" id="addAccountModal" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title"><i class="fas fa-university me-2"></i>Tambah Rekening Bank</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<form id="addAccountForm">
<div class="mb-3">
<label class="form-label small fw-bold">Nama Bank</label>
<input type="text" class="form-control" id="accountBankName" placeholder="Contoh: Bank Syariah Indonesia (BSI)" required>
</div>
<div class="mb-3">
<label class="form-label small fw-bold">Nomor Rekening</label>
<input type="text" class="form-control" id="accountNumber" placeholder="Contoh: 123-456-7890-12" required>
</div>
<div class="mb-3">
<label class="form-label small fw-bold">Atas Nama</label>
<input type="text" class="form-control" id="accountHolderName" placeholder="Contoh: Yayasan AQBS Ponorogo" required>
</div>
<div class="mb-3">
<label class="form-label small fw-bold">Status</label>
<div class="form-check">
<input class="form-check-input" type="checkbox" id="accountActive" checked>
<label class="form-check-label" for="accountActive">
Aktifkan rekening ini
</label>
</div>
</div>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
<button type="button" class="btn btn-primary" id="saveAccountBtn">Simpan</button>
</div>
</div>
</div>
</div>
<!-- Edit Setting Modal -->
<div class="modal fade" id="editSettingModal" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title"><i class="fas fa-cog me-2"></i>Edit Pengaturan Umum</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<form id="settingForm">
<div class="row g-3">
<div class="col-12">
<label class="form-label small fw-bold">Status Sistem Pembayaran</label>
<div class="form-check">
<input class="form-check-input" type="checkbox" id="modalAktif">
<label class="form-check-label" for="modalAktif">
Aktifkan seluruh sistem pembayaran
</label>
</div>
<div class="form-text small">Nonaktifkan untuk menutup sementara semua pembayaran</div>
</div>
<div class="col-12">
<label class="form-label small fw-bold">Jenjang yang Ditujukan</label>
<div class="row">
<div class="col-md-6">
<div class="form-check">
<input class="form-check-input" type="checkbox" id="modalSMP">
<label class="form-check-label" for="modalSMP">
SMP
</label>
</div>
</div>
<div class="col-md-6">
<div class="form-check">
<input class="form-check-input" type="checkbox" id="modalSMA">
<label class="form-check-label" for="modalSMA">
SMA
</label>
</div>
</div>
</div>
</div>
<div class="col-md-6">
<label class="form-label small fw-bold">Nominal Pembayaran Awal</label>
<div class="input-group">
<span class="input-group-text">Rp</span>
<input type="number" class="form-control" id="modalNominalAwal" placeholder="250000" min="0" required>
</div>
<div class="form-text small">Biaya pendaftaran awal</div>
</div>
<div class="col-md-6">
<label class="form-label small fw-bold">Nominal Daftar Ulang</label>
<div class="input-group">
<span class="input-group-text">Rp</span>
<input type="number" class="form-control" id="modalNominalUlang" placeholder="300000" min="0" required>
</div>
<div class="form-text small">Biaya registrasi setelah diterima</div>
</div>
</div>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
<button type="button" class="btn btn-primary" id="saveModalBtn">Simpan Perubahan</button>
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
Data berhasil diekspor!
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Initialize components
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');
const toggleBtn = document.getElementById('sidebarToggle');
const pembayaranAwalBody = document.getElementById('pembayaranAwalBody');
const daftarUlangBody = document.getElementById('daftarUlangBody');
const applyFilterBtn = document.getElementById('applyFilterBtn');
const exportPdfBtn = document.getElementById('exportPdfBtn');
const exportExcelBtn = document.getElementById('exportExcelBtn');
const downloadAwalExcelBtn = document.getElementById('downloadAwalExcelBtn');
const downloadUlangExcelBtn = document.getElementById('downloadUlangExcelBtn');
const downloadAwalPdfBtn = document.getElementById('downloadAwalPdfBtn');
const downloadUlangPdfBtn = document.getElementById('downloadUlangPdfBtn');
const editSettingBtn = document.getElementById('editSettingBtn');
const addAccountBtn = document.getElementById('addAccountBtn');
// Pagination elements
const paginationInfoAwal = document.getElementById('paginationInfoAwal');
const paginationButtonsAwal = document.getElementById('paginationButtonsAwal');
const rowsPerPageAwal = document.getElementById('rowsPerPageAwal');
const paginationInfoUlang = document.getElementById('paginationInfoUlang');
const paginationButtonsUlang = document.getElementById('paginationButtonsUlang');
const rowsPerPageUlang = document.getElementById('rowsPerPageUlang');
// Modals
const addAccountModalEl = document.getElementById('addAccountModal');
const editSettingModalEl = document.getElementById('editSettingModal');
const simpleProofModalEl = document.getElementById('simpleProofModal');
let addAccountModal = null;
let editSettingModal = null;
let simpleProofModal = null;
// Toast
const successToastEl = document.getElementById('successToast');
const successToast = new bootstrap.Toast(successToastEl);
const toastMessage = document.getElementById('toastMessage');
// Initial data
let pembayaranData = [
{
id: 1,
kode: "202512190001",
nama: "Bebelll",
jumlah: 0,
tgl_bayar: "2025-12-19",
jenis: "Pembayaran Awal",
verifikasi: "Belum Dicek",
jenjang: "SMP",
images: [
{
url: "https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
description: "Bukti transfer pembayaran pendaftaran",
date: "2025-12-19",
size: "2.4 MB",
uploader: "Sistem"
}
]
},
{
id: 2,
kode: "202512200002",
nama: "Siti Fatimah",
jumlah: 250000,
tgl_bayar: "2025-12-20",
jenis: "Pembayaran Awal",
verifikasi: "Belum Dicek",
jenjang: "SMA",
images: [
{
url: "https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
description: "Bukti transfer pembayaran awal",
date: "2025-12-20",
size: "1.8 MB",
uploader: "Orang Tua"
}
]
},
{
id: 3,
kode: "202512200003",
nama: "Aisyah Nurul",
jumlah: 250000,
tgl_bayar: "2025-12-21",
jenis: "Pembayaran Awal",
verifikasi: "Sudah Dicek",
jenjang: "SMP",
images: [
{
url: "https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
description: "Bukti transfer yang sudah diverifikasi",
date: "2025-12-21",
size: "3.2 MB",
uploader: "Sistem"
}
]
},
{
id: 4,
kode: "202512200004",
nama: "Fatimah Zahra",
jumlah: 250000,
tgl_bayar: "2025-12-22",
jenis: "Pembayaran Awal",
verifikasi: "Belum Dicek",
jenjang: "SMA",
images: [
{
url: "https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
description: "Bukti transfer pembayaran",
date: "2025-12-22",
size: "2.1 MB",
uploader: "Orang Tua"
}
]
},
{
id: 5,
kode: "202512200005",
nama: "Nurul Hikmah",
jumlah: 250000,
tgl_bayar: "2025-12-23",
jenis: "Pembayaran Awal",
verifikasi: "Sudah Dicek",
jenjang: "SMP",
images: [
{
url: "https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
description: "Bukti transfer yang sudah disetujui",
date: "2025-12-23",
size: "2.7 MB",
uploader: "Sistem"
}
]
},
{
id: 6,
kode: "202511140001",
nama: "BEBELLL4",
jumlah: 300000,
tgl_bayar: "2025-11-14",
jenis: "Daftar Ulang",
verifikasi: "Sudah Dicek",
jenjang: "SMP",
images: [
{
url: "https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
description: "Bukti transfer daftar ulang",
date: "2025-11-14",
size: "2.5 MB",
uploader: "Sistem"
}
]
},
{
id: 7,
kode: "202511150002",
nama: "Annisa Rahmawati",
jumlah: 300000,
tgl_bayar: "2025-11-15",
jenis: "Daftar Ulang",
verifikasi: "Sudah Dicek",
jenjang: "SMA",
images: [
{
url: "https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
description: "Bukti pembayaran daftar ulang",
date: "2025-11-15",
size: "1.9 MB",
uploader: "Orang Tua"
}
]
},
{
id: 8,
kode: "202511160003",
nama: "Rahma Sari",
jumlah: 300000,
tgl_bayar: "2025-11-16",
jenis: "Daftar Ulang",
verifikasi: "Belum Dicek",
jenjang: "SMP",
images: [
{
url: "https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
description: "Bukti transfer menunggu verifikasi",
date: "2025-11-16",
size: "3.0 MB",
uploader: "Sistem"
}
]
},
{
id: 9,
kode: "202511170004",
nama: "Salsabila Putri",
jumlah: 300000,
tgl_bayar: "2025-11-17",
jenis: "Daftar Ulang",
verifikasi: "Sudah Dicek",
jenjang: "SMA",
images: [
{
url: "https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
description: "Bukti transfer yang sudah divalidasi",
date: "2025-11-17",
size: "2.2 MB",
uploader: "Orang Tua"
}
]
},
{
id: 10,
kode: "202511180005",
nama: "Nadia Amira",
jumlah: 300000,
tgl_bayar: "2025-11-18",
jenis: "Daftar Ulang",
verifikasi: "Belum Dicek",
jenjang: "SMP",
images: [
{
url: "https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
description: "Bukti pembayaran daftar ulang",
date: "2025-11-18",
size: "2.8 MB",
uploader: "Sistem"
}
]
},
{
id: 11,
kode: "202512200006",
nama: "Dewi Sartika",
jumlah: 250000,
tgl_bayar: "2025-12-24",
jenis: "Pembayaran Awal",
verifikasi: "Sudah Dicek",
jenjang: "SMA",
images: [
{
url: "https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
description: "Bukti transfer pembayaran awal",
date: "2025-12-24",
size: "2.3 MB",
uploader: "Orang Tua"
}
]
},
{
id: 12,
kode: "202512200007",
nama: "Kartini Putri",
jumlah: 250000,
tgl_bayar: "2025-12-25",
jenis: "Pembayaran Awal",
verifikasi: "Belum Dicek",
jenjang: "SMP",
images: [
{
url: "https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
description: "Bukti pembayaran menunggu verifikasi",
date: "2025-12-25",
size: "2.6 MB",
uploader: "Sistem"
}
]
}
];
// Payment settings state
let paymentSettings = {
aktif: true,
aktifSMP: true,
aktifSMA: true,
nominalAwal: 250000,
nominalUlang: 300000
};
// Payment types data - HANYA 2 JENIS
let paymentTypes = [
{
id: 1,
name: "Pembayaran Awal",
category: "pembayaran_awal",
amount: 250000,
description: "Biaya pendaftaran awal",
active: true,
forSMP: true,
forSMA: true
},
{
id: 2,
name: "Daftar Ulang",
category: "daftar_ulang",
amount: 300000,
description: "Biaya registrasi setelah diterima",
active: true,
forSMP: true,
forSMA: true
}
];
// Bank accounts data
let bankAccounts = [
{
id: 1,
bankName: "Bank Syariah Indonesia (BSI)",
accountNumber: "123-456-7890-12",
holderName: "Yayasan AISYIYAH QUR'ANIC BOARDING SCHOOL PONOROGO",
active: true
},
{
id: 2,
bankName: "Bank Mandiri",
accountNumber: "987-654-3210-98",
holderName: "Yayasan AISYIYAH QUR'ANIC BOARDING SCHOOL PONOROGO",
active: false
}
];
// Pagination state for each table
let paginationState = {
awal: {
currentPage: 1,
rowsPerPage: 10,
totalPages: 1,
totalItems: 0
},
ulang: {
currentPage: 1,
rowsPerPage: 10,
totalPages: 1,
totalItems: 0
}
};
// Load data from URL hash if available
function loadSavedData() {
const hash = window.location.hash;
if (hash.startsWith('#data=')) {
try {
const encodedData = hash.substring(6);
const decodedData = decodeURIComponent(atob(encodedData));
const savedData = JSON.parse(decodedData);
pembayaranData = savedData.pembayaranData || pembayaranData;
paymentSettings = savedData.paymentSettings || paymentSettings;
paymentTypes = savedData.paymentTypes || paymentTypes;
bankAccounts = savedData.bankAccounts || bankAccounts;
} catch (error) {
console.error('Error loading saved ', error);
}
}
renderPaymentTypes();
renderBankAccounts();
updatePaymentSettingsUI();
renderTables();
// Add event listeners untuk filter inputs
document.getElementById('filterJenjang').addEventListener('change', renderTables);
document.getElementById('filterJenis').addEventListener('change', renderTables);
document.getElementById('filterStatus').addEventListener('change', renderTables);
document.getElementById('filterSearch').addEventListener('input', renderTables);
}
// Save data to URL hash
function saveData() {
const dataToSave = {
pembayaranData,
paymentSettings,
paymentTypes,
bankAccounts
};
const dataString = JSON.stringify(dataToSave);
const encodedData = btoa(encodeURIComponent(dataString));
window.location.hash = `data=${encodedData}`;
}
// Render payment types - HANYA 2 JENIS
function renderPaymentTypes() {
const container = document.getElementById('paymentTypesContainer');
container.innerHTML = '';
paymentTypes.forEach(paymentType => {
const typeElement = document.createElement('div');
typeElement.className = 'payment-type-item';
typeElement.id = `payment-type-${paymentType.id}`;
let badgeClass = '';
let badgeText = '';
switch(paymentType.category) {
case 'pembayaran_awal':
badgeClass = 'badge-pembayaran-awal-setting';
badgeText = 'Pembayaran Awal';
break;
case 'daftar_ulang':
badgeClass = 'badge-daftar-ulang-setting';
badgeText = 'Daftar Ulang';
break;
}
const activeBadge = paymentType.active ?
'<span class="account-badge badge-active">Aktif</span>' :
'<span class="account-badge badge-inactive">Nonaktif</span>';
typeElement.innerHTML = `
<div class="payment-type-header">
<div class="payment-type-title">
<i class="fas fa-wallet"></i>
<span>${paymentType.name}</span>
<span class="payment-type-badge ${badgeClass}">${badgeText}</span>
${activeBadge}
</div>
<div class="payment-type-actions">
<button class="btn-small-action btn-edit-small" data-id="${paymentType.id}">
<i class="fas fa-edit"></i> Edit
</button>
</div>
</div>
<div class="payment-type-details">
<div class="payment-type-detail">
<div class="detail-label">Nominal</div>
<div class="detail-value">Rp ${paymentType.amount.toLocaleString('id-ID')}</div>
</div>
<div class="payment-type-detail">
<div class="detail-label">Deskripsi</div>
<div class="detail-value">${paymentType.description || '-'}</div>
</div>
<div class="payment-type-detail">
<div class="detail-label">Jenjang</div>
<div class="detail-value">
${paymentType.forSMP ? 'SMP' : ''} ${paymentType.forSMP && paymentType.forSMA ? '/' : ''} ${paymentType.forSMA ? 'SMA' : ''}
</div>
</div>
</div>
`;
container.appendChild(typeElement);
});
document.querySelectorAll('.btn-edit-small').forEach(btn => {
btn.addEventListener('click', function() {
const id = parseInt(this.dataset.id);
editPaymentType(id);
});
});
}
// Render bank accounts
function renderBankAccounts() {
const container = document.getElementById('accountsContainer');
container.innerHTML = '';
bankAccounts.forEach(account => {
const accountElement = document.createElement('div');
accountElement.className = 'account-item';
accountElement.id = `account-${account.id}`;
const activeBadge = account.active ?
'<span class="account-badge badge-active">Aktif</span>' :
'<span class="account-badge badge-inactive">Nonaktif</span>';
accountElement.innerHTML = `
<div class="account-header">
<div class="account-title">
<i class="fas fa-university"></i>
<span>${account.bankName}</span>
${activeBadge}
</div>
<div class="payment-type-actions">
<button class="btn-small-action btn-edit-small" data-id="${account.id}">
<i class="fas fa-edit"></i> Edit
</button>
<button class="btn-small-action btn-delete-small" data-id="${account.id}">
<i class="fas fa-trash"></i> Hapus
</button>
</div>
</div>
<div class="account-details">
<div class="payment-type-detail">
<div class="detail-label">Nomor Rekening</div>
<div class="detail-value">${account.accountNumber}</div>
</div>
<div class="payment-type-detail">
<div class="detail-label">Atas Nama</div>
<div class="detail-value">${account.holderName}</div>
</div>
</div>
`;
container.appendChild(accountElement);
});
document.querySelectorAll('.account-item .btn-edit-small').forEach(btn => {
btn.addEventListener('click', function() {
const id = parseInt(this.dataset.id);
editBankAccount(id);
});
});
document.querySelectorAll('.account-item .btn-delete-small').forEach(btn => {
btn.addEventListener('click', function() {
const id = parseInt(this.dataset.id);
deleteBankAccount(id);
});
});
}
// Get filtered data based on current filters
function getFilteredData() {
const search = document.getElementById('filterSearch').value.toLowerCase();
const jenjang = document.getElementById('filterJenjang').value;
const jenis = document.getElementById('filterJenis').value;
const status = document.getElementById('filterStatus').value;
return pembayaranData.filter(item => {
if (jenjang && item.jenjang !== jenjang) return false;
if (jenis && item.jenis !== jenis) return false;
if (status === "Belum Verifikasi" && item.verifikasi !== "Belum Dicek") return false;
if (status === "Sudah Verifikasi" && item.verifikasi !== "Sudah Dicek") return false;
if (search && !item.nama.toLowerCase().includes(search) && !item.kode.includes(search)) return false;
return true;
});
}
// Get paginated data for a specific table
function getPaginatedData(data, tableType) {
const state = paginationState[tableType];
const startIndex = (state.currentPage - 1) * state.rowsPerPage;
if (state.rowsPerPage === 0) return data;
return data.slice(startIndex, startIndex + state.rowsPerPage);
}
// Update pagination info
function updatePaginationInfo(data, tableType) {
const state = paginationState[tableType];
const totalItems = data.length;
const rowsPerPage = state.rowsPerPage === 0 ? totalItems : state.rowsPerPage;
const totalPages = state.rowsPerPage === 0 ? 1 : Math.ceil(totalItems / state.rowsPerPage);
state.totalItems = totalItems;
state.totalPages = totalPages;
if (state.currentPage > totalPages && totalPages > 0) state.currentPage = totalPages;
else if (state.currentPage < 1 && totalPages > 0) state.currentPage = 1;
const startItem = state.rowsPerPage === 0 ? 1 : ((state.currentPage - 1) * state.rowsPerPage) + 1;
const endItem = state.rowsPerPage === 0 ? totalItems : Math.min(state.currentPage * state.rowsPerPage, totalItems);
const infoElement = document.getElementById(`paginationInfo${tableType.charAt(0).toUpperCase() + tableType.slice(1)}`);
infoElement.textContent = totalItems === 0 ? 'Tidak ada data' : `Menampilkan ${startItem} - ${endItem} dari ${totalItems} data`;
}
// Render pagination buttons
function renderPaginationButtons(data, tableType) {
const state = paginationState[tableType];
const totalPages = state.totalPages;
const currentPage = state.currentPage;
const buttonsContainer = document.getElementById(`paginationButtons${tableType.charAt(0).toUpperCase() + tableType.slice(1)}`);
buttonsContainer.innerHTML = '';
if (totalPages <= 1 || state.rowsPerPage === 0) return;
const prevButton = document.createElement('button');
prevButton.className = 'pagination-btn pagination-btn-prev';
prevButton.innerHTML = '<i class="fas fa-chevron-left me-1"></i> Sebelumnya';
prevButton.disabled = currentPage === 1;
prevButton.addEventListener('click', () => {
if (currentPage > 1) {
state.currentPage--;
saveData();
renderTables();
}
});
buttonsContainer.appendChild(prevButton);
const maxVisiblePages = 5;
let startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
let endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);
if (endPage - startPage + 1 < maxVisiblePages) startPage = Math.max(1, endPage - maxVisiblePages + 1);
if (startPage > 1) {
const firstButton = document.createElement('button');
firstButton.className = 'pagination-btn';
firstButton.textContent = '1';
firstButton.addEventListener('click', () => {
state.currentPage = 1;
saveData();
renderTables();
});
buttonsContainer.appendChild(firstButton);
if (startPage > 2) {
const ellipsis = document.createElement('span');
ellipsis.className = 'pagination-btn';
ellipsis.textContent = '...';
ellipsis.style.cursor = 'default';
buttonsContainer.appendChild(ellipsis);
}
}
for (let i = startPage; i <= endPage; i++) {
const pageButton = document.createElement('button');
pageButton.className = `pagination-btn ${i === currentPage ? 'active' : ''}`;
pageButton.textContent = i;
pageButton.addEventListener('click', () => {
state.currentPage = i;
saveData();
renderTables();
});
buttonsContainer.appendChild(pageButton);
}
if (endPage < totalPages) {
if (endPage < totalPages - 1) {
const ellipsis = document.createElement('span');
ellipsis.className = 'pagination-btn';
ellipsis.textContent = '...';
ellipsis.style.cursor = 'default';
buttonsContainer.appendChild(ellipsis);
}
const lastButton = document.createElement('button');
lastButton.className = 'pagination-btn';
lastButton.textContent = totalPages;
lastButton.addEventListener('click', () => {
state.currentPage = totalPages;
saveData();
renderTables();
});
buttonsContainer.appendChild(lastButton);
}
const nextButton = document.createElement('button');
nextButton.className = 'pagination-btn pagination-btn-next';
nextButton.innerHTML = 'Selanjutnya <i class="fas fa-chevron-right ms-1"></i>';
nextButton.disabled = currentPage === totalPages;
nextButton.addEventListener('click', () => {
if (currentPage < totalPages) {
state.currentPage++;
saveData();
renderTables();
}
});
buttonsContainer.appendChild(nextButton);
}
// Format currency
function formatCurrency(amount) {
if (amount === 0) {
return '<span class="badge-nominal-warning"><i class="fas fa-exclamation-triangle me-1"></i> Rp 0 (Belum diisi)</span>';
}
return `Rp ${amount.toLocaleString('id-ID')}`;
}
// Get badge class for verifikasi
function getVerifikasiBadge(verifikasi) {
return verifikasi === "Sudah Dicek" ? 'badge-verif-done' : 'badge-verif-wait';
}
// Render tables
function renderTables() {
const filteredData = getFilteredData();
const awalData = filteredData.filter(item => item.jenis === "Pembayaran Awal");
const ulangData = filteredData.filter(item => item.jenis === "Daftar Ulang");
const paginatedAwalData = getPaginatedData(awalData, 'awal');
const paginatedUlangData = getPaginatedData(ulangData, 'ulang');
updatePaginationInfo(awalData, 'awal');
updatePaginationInfo(ulangData, 'ulang');
renderPaginationButtons(awalData, 'awal');
renderPaginationButtons(ulangData, 'ulang');
pembayaranAwalBody.innerHTML = '';
paginatedAwalData.forEach((item, index) => {
const row = document.createElement('tr');
const startIndex = (paginationState.awal.currentPage - 1) * paginationState.awal.rowsPerPage;
const rowNumber = startIndex + index + 1;
row.innerHTML = `
<td class="ps-4 fw-bold" style="color: var(--navy-primary);" data-label="No">${rowNumber}</td>
<td data-label="Kode Transaksi">${item.kode}</td>
<td data-label="Nama Santriwati">${item.nama}</td>
<td data-label="Jumlah Bayar">${formatCurrency(item.jumlah)}</td>
<td data-label="Tgl Bayar">${item.tgl_bayar}</td>
<td data-label="Jenjang">${item.jenjang}</td>
<td data-label="Verifikasi"><span class="${getVerifikasiBadge(item.verifikasi)}">${item.verifikasi}</span></td>
<td class="text-center" data-label="Bukti">
<button class="btn-action-circle btn-view-proof" title="Lihat Bukti" data-kode="${item.kode}" data-img="${item.images[0]?.url || ''}">
<i class="fas fa-eye"></i>
</button>
</td>
<td class="text-center" data-label="Action">
<div class="btn-action-group">
<button class="btn-action-circle btn-approve" title="Setujui" data-kode="${item.kode}" data-status="approve"><i class="fas fa-check"></i></button>
<button class="btn-action-circle btn-reject" title="Tolak" data-kode="${item.kode}" data-status="reject"><i class="fas fa-times"></i></button>
</div>
</td>
`;
pembayaranAwalBody.appendChild(row);
});
daftarUlangBody.innerHTML = '';
paginatedUlangData.forEach((item, index) => {
const row = document.createElement('tr');
const startIndex = (paginationState.ulang.currentPage - 1) * paginationState.ulang.rowsPerPage;
const rowNumber = startIndex + index + 1;
row.innerHTML = `
<td class="ps-4 fw-bold" style="color: var(--navy-primary);" data-label="No">${rowNumber}</td>
<td data-label="Kode Transaksi">${item.kode}</td>
<td data-label="Nama Santriwati">${item.nama}</td>
<td data-label="Jumlah Bayar">${formatCurrency(item.jumlah)}</td>
<td data-label="Tgl Bayar">${item.tgl_bayar}</td>
<td data-label="Jenjang">${item.jenjang}</td>
<td data-label="Verifikasi"><span class="${getVerifikasiBadge(item.verifikasi)}">${item.verifikasi}</span></td>
<td class="text-center" data-label="Bukti">
<button class="btn-action-circle btn-view-proof" title="Lihat Bukti" data-kode="${item.kode}" data-img="${item.images[0]?.url || ''}">
<i class="fas fa-eye"></i>
</button>
</td>
<td class="text-center" data-label="Action">
<div class="btn-action-group">
<button class="btn-action-circle btn-approve" title="Setujui" data-kode="${item.kode}" data-status="approve"><i class="fas fa-check"></i></button>
<button class="btn-action-circle btn-reject" title="Tolak" data-kode="${item.kode}" data-status="reject"><i class="fas fa-times"></i></button>
</div>
</td>
`;
daftarUlangBody.appendChild(row);
});
// Add event listeners
addEventListeners();
}
// Function to show simple proof preview
function showSimpleProof(imageUrl) {
const img = document.getElementById('simpleProofImage');
img.src = imageUrl;
simpleProofModal.show();
}
// Add event listeners to action buttons
function addEventListeners() {
document.querySelectorAll('.btn-view-proof').forEach(btn => {
btn.addEventListener('click', function() {
const imgUrl = this.dataset.img;
if (imgUrl) showSimpleProof(imgUrl);
});
});
document.querySelectorAll('[data-status]').forEach(btn => {
btn.addEventListener('click', function() {
const kode = this.dataset.kode;
const status = this.dataset.status;
let message = '';
switch(status) {
case 'approve':
message = `Pembayaran ${kode} telah disetujui!`;
const item = pembayaranData.find(p => p.kode === kode);
if (item) item.verifikasi = "Sudah Dicek";
break;
case 'reject':
message = `Pembayaran ${kode} ditolak!`;
const rejectItem = pembayaranData.find(p => p.kode === kode);
if (rejectItem) rejectItem.verifikasi = "Belum Dicek";
break;
}
toastMessage.textContent = message;
successToast.show();
saveData();
renderTables();
});
});
}
// Update payment settings UI
function updatePaymentSettingsUI() {
document.getElementById('paymentToggle').checked = paymentSettings.aktif;
const awalType = paymentTypes.find(pt => pt.category === 'pembayaran_awal');
const ulangType = paymentTypes.find(pt => pt.category === 'daftar_ulang');
if (awalType) awalType.amount = paymentSettings.nominalAwal;
if (ulangType) ulangType.amount = paymentSettings.nominalUlang;
renderPaymentTypes();
const accountStatusText = document.getElementById('accountStatusText');
const accountStatusBadge = document.getElementById('accountStatusBadge');
if (paymentSettings.aktif) {
accountStatusText.textContent = "Aktif";
accountStatusBadge.className = "account-badge badge-active";
accountStatusBadge.textContent = "Aktif";
} else {
accountStatusText.textContent = "Tidak Aktif";
accountStatusBadge.className = "account-badge badge-inactive";
accountStatusBadge.textContent = "Tidak Aktif";
}
document.getElementById('jenjangSMP').checked = paymentSettings.aktifSMP;
document.getElementById('jenjangSMA').checked = paymentSettings.aktifSMA;
paymentTypes.forEach(type => {
type.forSMP = paymentSettings.aktifSMP;
type.forSMA = paymentSettings.aktifSMA;
});
}
// Edit payment type (hanya nominal)
function editPaymentType(id) {
const paymentType = paymentTypes.find(pt => pt.id === id);
if (!paymentType) return;
const newAmount = prompt(`Edit nominal ${paymentType.name} (Rp):`, paymentType.amount);
if (newAmount && !isNaN(newAmount) && newAmount > 0) {
paymentType.amount = parseInt(newAmount);
if (paymentType.category === 'pembayaran_awal') paymentSettings.nominalAwal = paymentType.amount;
else if (paymentType.category === 'daftar_ulang') paymentSettings.nominalUlang = paymentType.amount;
saveData();
renderPaymentTypes();
toastMessage.textContent = `Nominal ${paymentType.name} berhasil diperbarui!`;
successToast.show();
}
}
// Add new bank account
function addBankAccount() {
const bankName = document.getElementById('accountBankName').value.trim();
const accountNumber = document.getElementById('accountNumber').value.trim();
const holderName = document.getElementById('accountHolderName').value.trim();
const active = document.getElementById('accountActive').checked;
if (!bankName || !accountNumber || !holderName) {
toastMessage.textContent = 'Harap isi semua field yang wajib!';
successToast.show();
return;
}
const newAccount = {
id: bankAccounts.length > 0 ? Math.max(...bankAccounts.map(acc => acc.id)) + 1 : 1,
bankName,
accountNumber,
holderName,
active
};
bankAccounts.push(newAccount);
saveData();
renderBankAccounts();
addAccountModal.hide();
toastMessage.textContent = `Rekening ${bankName} berhasil ditambahkan!`;
successToast.show();
document.getElementById('addAccountForm').reset();
}
// Edit bank account
function editBankAccount(id) {
const account = bankAccounts.find(acc => acc.id === id);
if (!account) return;
account.active = !account.active;
saveData();
renderBankAccounts();
toastMessage.textContent = `Status rekening ${account.bankName} berhasil diperbarui!`;
successToast.show();
}
// Delete bank account
function deleteBankAccount(id) {
if (confirm('Apakah Anda yakin ingin menghapus rekening ini?')) {
const index = bankAccounts.findIndex(acc => acc.id === id);
if (index !== -1) {
bankAccounts.splice(index, 1);
saveData();
renderBankAccounts();
toastMessage.textContent = 'Rekening berhasil dihapus!';
successToast.show();
}
}
}
// Load modal with current settings
function loadModalSettings() {
document.getElementById('modalAktif').checked = paymentSettings.aktif;
document.getElementById('modalSMP').checked = paymentSettings.aktifSMP;
document.getElementById('modalSMA').checked = paymentSettings.aktifSMA;
document.getElementById('modalNominalAwal').value = paymentSettings.nominalAwal;
document.getElementById('modalNominalUlang').value = paymentSettings.nominalUlang;
}
// Save modal settings
function saveModalSettings() {
paymentSettings.aktif = document.getElementById('modalAktif').checked;
paymentSettings.aktifSMP = document.getElementById('modalSMP').checked;
paymentSettings.aktifSMA = document.getElementById('modalSMA').checked;
paymentSettings.nominalAwal = parseInt(document.getElementById('modalNominalAwal').value) || 250000;
paymentSettings.nominalUlang = parseInt(document.getElementById('modalNominalUlang').value) || 300000;
saveData();
updatePaymentSettingsUI();
editSettingModal.hide();
toastMessage.textContent = 'Pengaturan umum berhasil diperbarui!';
successToast.show();
}
// Export to CSV (Excel compatible)
function exportToExcel(filteredData, filename) {
if (filteredData.length === 0) {
toastMessage.textContent = 'Tidak ada data untuk diekspor!';
successToast.show();
return;
}
let csvContent = "text/csv;charset=utf-8,\uFEFF";
csvContent += "No,Kode Transaksi,Nama Santriwati,Jumlah Bayar,Tanggal Bayar,Jenjang,Status Verifikasi\n";
filteredData.forEach((item, index) => {
const row = `"${index + 1}","${item.kode}","${item.nama}","${item.jumlah}","${item.tgl_bayar}","${item.jenjang}","${item.verifikasi}"`;
csvContent += row + "\n";
});
const encodedUri = encodeURI(csvContent);
const link = document.createElement("a");
link.setAttribute("href", encodedUri);
link.setAttribute("download", filename);
document.body.appendChild(link);
link.click();
document.body.removeChild(link);
}
// Function to export multiple payments to PDF
function exportMultipleToPdf(payments, title) {
if (payments.length === 0) {
toastMessage.textContent = 'Tidak ada data untuk diekspor!';
successToast.show();
return;
}
const printWindow = window.open('', '_blank');
printWindow.document.write(`
<!DOCTYPE html>
<html>
<head>
<title>${title} - AQBS</title>
<meta charset="UTF-8">
<style>
body {
font-family: 'Plus Jakarta Sans', Arial, sans-serif;
margin: 15px;
line-height: 1.6;
color: #1e293b;
}
.header {
text-align: center;
margin-bottom: 20px;
padding-bottom: 15px;
border-bottom: 3px solid #002b49;
}
.header h1 {
color: #002b49;
margin-bottom: 8px;
font-size: 20px;
}
.header p {
color: #666;
margin: 4px 0;
font-size: 12px;
}
table {
width: 100%;
border-collapse: collapse;
margin-top: 15px;
font-size: 11px;
}
th, td {
border: 1px solid #ddd;
padding: 10px;
text-align: left;
}
th {
background-color: #f8fafc;
font-weight: bold;
color: #002b49;
}
tr:nth-child(even) {
background-color: #f9fafb;
}
.verified { color: #166534; font-weight: bold; }
.pending { color: #a16207; font-weight: bold; }
@media print {
body { margin: 0; }
.no-print { display: none; }
}
@media screen and (max-width: 600px) {
table { font-size: 10px; }
th, td { padding: 8px; }
}
</style>
</head>
<body>
<div class="header">
<h1>${title.toUpperCase()}</h1>
<p>AISYIYAH QUR'ANIC BOARDING SCHOOL PONOROGO</p>
<p>Tahun Pelajaran 2026/2027 - Gelombang 2</p>
<p class="no-print" style="margin-top: 15px; color: #ef4444; font-weight: bold;">Tekan Ctrl+P untuk mencetak sebagai PDF</p>
</div>
<table>
<thead>
<tr>
<th>No</th>
<th>Kode Transaksi</th>
<th>Nama Santriwati</th>
<th>Jumlah Bayar</th>
<th>Tanggal Bayar</th>
<th>Jenjang</th>
<th>Status Verifikasi</th>
</tr>
</thead>
<tbody>
`);
payments.forEach((item, index) => {
const statusClass = item.verifikasi === "Sudah Dicek" ? "verified" : "pending";
printWindow.document.write(`
<tr>
<td>${index + 1}</td>
<td>${item.kode}</td>
<td>${item.nama}</td>
<td>Rp ${item.jumlah.toLocaleString('id-ID')}</td>
<td>${item.tgl_bayar}</td>
<td>${item.jenjang}</td>
<td class="${statusClass}">${item.verifikasi}</td>
</tr>
`);
});
printWindow.document.write(`
</tbody>
</table>
<div style="margin-top: 20px; padding-top: 15px; border-top: 1px solid #ddd; font-size: 10px; color: #666;">
<p>Total Data: ${payments.length} transaksi</p>
<p>Dicetak pada: ${new Date().toLocaleDateString('id-ID', {
day: 'numeric',
month: 'long',
year: 'numeric',
hour: '2-digit',
minute: '2-digit'
})}</p>
</div>
</body>
</html>
`);
printWindow.document.close();
printWindow.focus();
setTimeout(() => {
toastMessage.textContent = `${title} siap dicetak! Gunakan Ctrl+P untuk menyimpan sebagai PDF.`;
successToast.show();
}, 1000);
}
// Event Listeners
document.addEventListener('DOMContentLoaded', function() {
addAccountModal = new bootstrap.Modal(addAccountModalEl);
editSettingModal = new bootstrap.Modal(editSettingModalEl);
simpleProofModal = new bootstrap.Modal(simpleProofModalEl);
loadSavedData();
});
toggleBtn.addEventListener('click', () => {
sidebar.classList.toggle('show');
overlay.classList.toggle('show');
});
overlay.addEventListener('click', () => {
sidebar.classList.remove('show');
overlay.classList.remove('show');
});
document.querySelectorAll('.menu-btn').forEach(btn => {
btn.addEventListener('click', function(e) {
e.preventDefault();
document.querySelectorAll('.menu-btn').forEach(b => b.classList.remove('active-dashboard'));
this.classList.add('active-dashboard');
});
});
document.getElementById('paymentToggle').addEventListener('change', function() {
paymentSettings.aktif = this.checked;
updatePaymentSettingsUI();
saveData();
const status = this.checked ? "diaktifkan" : "dinonaktifkan";
toastMessage.textContent = `Sistem pembayaran berhasil ${status}!`;
successToast.show();
});
document.getElementById('jenjangSMP').addEventListener('change', function() {
paymentSettings.aktifSMP = this.checked;
saveData();
updatePaymentSettingsUI();
toastMessage.textContent = `Pembayaran untuk SMP ${this.checked ? "diaktifkan" : "dinonaktifkan"}!`;
successToast.show();
});
document.getElementById('jenjangSMA').addEventListener('change', function() {
paymentSettings.aktifSMA = this.checked;
saveData();
updatePaymentSettingsUI();
toastMessage.textContent = `Pembayaran untuk SMA ${this.checked ? "diaktifkan" : "dinonaktifkan"}!`;
successToast.show();
});
rowsPerPageAwal.addEventListener('change', function() {
paginationState.awal.rowsPerPage = parseInt(this.value);
paginationState.awal.currentPage = 1;
saveData();
renderTables();
});
rowsPerPageUlang.addEventListener('change', function() {
paginationState.ulang.rowsPerPage = parseInt(this.value);
paginationState.ulang.currentPage = 1;
saveData();
renderTables();
});
addAccountBtn.addEventListener('click', () => addAccountModal.show());
editSettingBtn.addEventListener('click', () => {
loadModalSettings();
editSettingModal.show();
});
document.getElementById('saveAccountBtn').addEventListener('click', addBankAccount);
document.getElementById('saveModalBtn').addEventListener('click', saveModalSettings);
exportExcelBtn.addEventListener('click', function(e) {
e.preventDefault();
const filteredData = getFilteredData();
exportToExcel(filteredData, 'data_pembayaran_semua.csv');
toastMessage.textContent = 'Data berhasil diekspor ke Excel!';
successToast.show();
});
exportPdfBtn.addEventListener('click', function(e) {
e.preventDefault();
const filteredData = getFilteredData();
exportMultipleToPdf(filteredData, 'Data Pembayaran Semua');
});
downloadAwalExcelBtn.addEventListener('click', function(e) {
e.preventDefault();
const filteredData = getFilteredData().filter(item => item.jenis === "Pembayaran Awal");
exportToExcel(filteredData, 'data_pembayaran_awal.csv');
toastMessage.textContent = 'Data pembayaran awal berhasil diekspor ke Excel!';
successToast.show();
});
downloadUlangExcelBtn.addEventListener('click', function(e) {
e.preventDefault();
const filteredData = getFilteredData().filter(item => item.jenis === "Daftar Ulang");
exportToExcel(filteredData, 'data_daftar_ulang.csv');
toastMessage.textContent = 'Data daftar ulang berhasil diekspor ke Excel!';
successToast.show();
});
downloadAwalPdfBtn.addEventListener('click', function(e) {
e.preventDefault();
const filteredData = getFilteredData().filter(item => item.jenis === "Pembayaran Awal");
exportMultipleToPdf(filteredData, 'Data Pembayaran Awal');
});
downloadUlangPdfBtn.addEventListener('click', function(e) {
e.preventDefault();
const filteredData = getFilteredData().filter(item => item.jenis === "Daftar Ulang");
exportMultipleToPdf(filteredData, 'Data Daftar Ulang');
});
applyFilterBtn.addEventListener('click', function() {
paginationState.awal.currentPage = 1;
paginationState.ulang.currentPage = 1;
saveData();
renderTables();
toastMessage.textContent = 'Filter berhasil diterapkan!';
successToast.show();
});
window.addEventListener('resize', () => {
clearTimeout(window.resizeTimer);
window.resizeTimer = setTimeout(renderTables, 250);
});
</script>
</body>
</html>

