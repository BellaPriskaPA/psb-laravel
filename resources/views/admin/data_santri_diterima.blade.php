<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Santri Diterima - Admin PSB AQBS</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Libraries untuk export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    
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

        /* Export Button Styling */
        .export-buttons {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
            flex-wrap: wrap;
        }
        
        .btn-export {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: var(--transition-speed);
        }
        
        .btn-export:hover {
            background: linear-gradient(135deg, #16a34a, #22c55e);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        
        .btn-export-pdf {
            background: linear-gradient(135deg, #ef4444, #dc2626);
        }
        
        .btn-export-pdf:hover {
            background: linear-gradient(135deg, #dc2626, #ef4444);
        }

        /* Quick Filter Buttons */
        .quick-filter-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }
        
        .quick-filter-btn {
            background: white;
            border: 1px solid #e2e8f0;
            color: #64748b;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: var(--transition-speed);
        }
        
        .quick-filter-btn:hover {
            background: var(--bg-body);
            border-color: var(--orange-primary);
            color: var(--orange-primary);
            transform: translateY(-2px);
        }
        
        .quick-filter-btn.active {
            background: var(--orange-primary);
            color: white;
            border-color: var(--orange-primary);
        }

        /* --- TABLE STYLING --- */
        .card-custom { 
            background: white; 
            border-radius: 20px; 
            border: 1px solid #e2e8f0; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.08); 
            overflow: hidden; 
            transition: var(--transition-speed);
            position: relative;
        }
        .card-custom:hover {
            box-shadow: 0 6px 20px rgba(0,0,0,0.12);
            transform: translateY(-2px);
        }

        .table-container {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            max-height: 70vh;
            position: relative;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
        }

        .table-container::-webkit-scrollbar {
            height: 8px;
            width: 8px;
        }

        .table-container::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .table-container::-webkit-scrollbar-thumb {
            background: var(--navy-primary);
            border-radius: 4px;
        }

        .table-container::-webkit-scrollbar-thumb:hover {
            background: var(--navy-dark);
        }

        /* TABEL SEDERHANA - Hanya 5 kolom utama */
        .simple-data-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            font-size: 0.85rem;
        }

        .simple-data-table th {
            background-color: #f8fafc;
            color: var(--navy-primary);
            font-weight: 700;
            font-size: 0.75rem;
            text-transform: uppercase;
            padding: 12px 8px;
            border-bottom: 2px solid #e2e8f0;
            position: sticky;
            top: 0;
            z-index: 10;
            white-space: nowrap;
            vertical-align: middle;
            text-align: center;
            border-right: 1px solid #e2e8f0;
            cursor: pointer;
            user-select: none;
            transition: background-color 0.2s;
        }

        .simple-data-table th:hover {
            background-color: #f1f5f9;
        }

        .simple-data-table th.sortable::after {
            content: " ↕";
            font-size: 0.7rem;
            opacity: 0.5;
            margin-left: 4px;
        }

        .simple-data-table th.sort-asc::after {
            content: " ↑";
            opacity: 1;
            color: var(--orange-primary);
        }

        .simple-data-table th.sort-desc::after {
            content: " ↓";
            opacity: 1;
            color: var(--orange-primary);
        }

        .simple-data-table td {
            padding: 10px 8px;
            border-bottom: 1px solid #e2e8f0;
            vertical-align: middle;
            white-space: nowrap;
            border-right: 1px solid #f1f5f9;
            background-color: white;
            text-align: center;
        }

        .simple-data-table tr:hover td {
            background-color: #f8fafc;
        }

        /* KOLOM STICKY untuk tabel sederhana */
        .simple-data-table th.col-no-sticky,
        .simple-data-table td.col-no-sticky {
            position: sticky;
            left: 0;
            background-color: white;
            z-index: 25;
            box-shadow: 3px 0 5px rgba(0,0,0,0.1);
            width: 60px;
            min-width: 60px;
            border-right: 2px solid #e2e8f0;
        }

        .simple-data-table th.col-nama-sticky,
        .simple-data-table td.col-nama-sticky {
            position: sticky;
            left: 62px;
            background-color: white;
            z-index: 24;
            box-shadow: 3px 0 5px rgba(0,0,0,0.05);
            width: 250px;
            min-width: 250px;
            border-right: 2px solid #e2e8f0;
        }

        .simple-data-table th.col-aksi-sticky,
        .simple-data-table td.col-aksi-sticky {
            position: sticky;
            right: 0;
            background-color: white;
            z-index: 25;
            box-shadow: -3px 0 5px rgba(0,0,0,0.1);
            width: 180px;
            min-width: 180px;
            border-left: 2px solid #e2e8f0;
        }

        /* Button Aksi di Tabel */
        .btn-action-group {
            display: flex;
            gap: 6px;
            justify-content: center;
            align-items: center;
        }
        
        .btn-detail {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            border: none;
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 0.65rem;
            font-weight: 600;
            transition: all var(--transition-speed);
            display: inline-flex;
            align-items: center;
            gap: 4px;
            box-shadow: 0 1px 3px rgba(59, 130, 246, 0.3);
            min-width: 60px;
            justify-content: center;
            cursor: pointer;
            flex: 1;
        }
        
        .btn-detail:hover {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            transform: translateY(-1px);
            box-shadow: 0 2px 5px rgba(59, 130, 246, 0.4);
        }
        
        .btn-edit {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            border: none;
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 0.65rem;
            font-weight: 600;
            transition: all var(--transition-speed);
            display: inline-flex;
            align-items: center;
            gap: 4px;
            box-shadow: 0 1px 3px rgba(16, 185, 129, 0.3);
            min-width: 60px;
            justify-content: center;
            cursor: pointer;
            flex: 1;
        }
        
        .btn-edit:hover {
            background: linear-gradient(135deg, #059669, #10b981);
            transform: translateY(-1px);
            box-shadow: 0 2px 5px rgba(16, 185, 129, 0.4);
        }
        
        .btn-print {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
            border: none;
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 0.65rem;
            font-weight: 600;
            transition: all var(--transition-speed);
            display: inline-flex;
            align-items: center;
            gap: 4px;
            box-shadow: 0 1px 3px rgba(245, 158, 11, 0.3);
            min-width: 60px;
            justify-content: center;
            cursor: pointer;
            flex: 1;
        }
        
        .btn-print:hover {
            background: linear-gradient(135deg, #d97706, #f59e0b);
            transform: translateY(-1px);
            box-shadow: 0 2px 5px rgba(245, 158, 11, 0.4);
        }

        /* Badge */
        .badge-jalur { 
            background: #f1f5f9; 
            color: var(--navy-primary); 
            font-size: 0.65rem; 
            font-weight: 800; 
            padding: 3px 6px; 
            border-radius: 4px; 
            border: 1px solid #e2e8f0;
            display: inline-block;
        }
        .status-diterima { 
            background: #dcfce7; 
            color: #166534; 
            font-size: 0.6rem; 
            font-weight: 800; 
            padding: 3px 6px; 
            border-radius: 4px; 
            text-transform: uppercase; 
            border: 1px solid #bbf7d0;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        
        .jenjang-badge {
            background: #e0f2fe;
            color: #0369a1;
            font-size: 0.65rem;
            font-weight: 700;
            padding: 3px 8px;
            border-radius: 12px;
            border: 1px solid #bae6fd;
        }

        /* Text truncation */
        .truncate-text {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100%;
            display: inline-block;
            vertical-align: middle;
            cursor: default;
            transition: all 0.2s ease;
        }

        .truncate-text:hover {
            overflow: visible;
            white-space: normal;
            position: relative;
            z-index: 100;
            background: white;
            padding: 4px 8px;
            border-radius: 4px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            border: 1px solid #e2e8f0;
            min-width: 150px;
            max-width: 250px;
        }

        /* Nama cell */
        .nama-cell {
            text-align: left !important;
            padding-left: 10px !important;
            font-weight: 500;
        }

        /* --- PAGINATION STYLING --- */
        .pagination-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            background: white;
            border-top: 1px solid #e2e8f0;
            border-radius: 0 0 20px 20px;
        }
        
        .items-per-page {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .items-per-page label {
            font-size: 0.85rem;
            color: #64748b;
            font-weight: 600;
            margin-bottom: 0;
        }
        
        .items-per-page select {
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 6px 12px;
            font-size: 0.85rem;
            color: #334155;
            background: white;
            cursor: pointer;
            transition: var(--transition-speed);
        }
        
        .items-per-page select:hover {
            border-color: var(--orange-primary);
        }
        
        .items-per-page select:focus {
            outline: none;
            border-color: var(--orange-primary);
            box-shadow: 0 0 0 3px rgba(255, 127, 0, 0.1);
        }
        
        .pagination-info {
            font-size: 0.85rem;
            color: #64748b;
            font-weight: 600;
        }
        
        .pagination-controls {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .pagination-controls .btn-pagination {
            background: white;
            border: 1px solid #cbd5e1;
            color: #64748b;
            border-radius: 8px;
            padding: 6px 12px;
            font-size: 0.85rem;
            font-weight: 600;
            transition: var(--transition-speed);
            display: flex;
            align-items: center;
            gap: 5px;
            cursor: pointer;
        }
        
        .pagination-controls .btn-pagination:hover:not(:disabled) {
            background: var(--navy-primary);
            color: white;
            border-color: var(--navy-primary);
            transform: translateY(-2px);
        }
        
        .pagination-controls .btn-pagination:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        
        .pagination-controls .btn-pagination.active {
            background: var(--orange-primary);
            color: white;
            border-color: var(--orange-primary);
        }
        
        .page-numbers {
            display: flex;
            gap: 5px;
        }
        
        .pagination-all .pagination-controls {
            opacity: 0.5;
            pointer-events: none;
        }
        
        .pagination-all .pagination-info {
            font-weight: 700;
            color: var(--orange-primary);
        }
        
        /* Loading Overlay */
        .loading-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.9);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 10;
            border-radius: 20px;
        }
        
        .loading-spinner {
            width: 40px;
            height: 40px;
            border: 3px solid #f3f3f3;
            border-top: 3px solid var(--orange-primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
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

        /* --- NO RESULTS MESSAGE --- */
        .no-results {
            text-align: center;
            padding: 40px 20px;
            color: #64748b;
        }
        .no-results i {
            font-size: 3rem;
            margin-bottom: 15px;
            color: #cbd5e1;
        }

        /* Table Controls */
        .table-controls {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
            flex-wrap: wrap;
            align-items: center;
        }

        /* --- DETAIL MODAL STYLING --- */
        .detail-section {
            background: #f8fafc;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            border-left: 4px solid var(--blue-info);
            transition: all 0.3s ease;
        }

        .detail-section:hover {
            background: #f1f5f9;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .detail-section-title {
            color: var(--navy-primary);
            font-weight: 700;
            font-size: 0.9rem;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e2e8f0;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 15px;
        }

        .detail-item {
            background: white;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            transition: all 0.2s ease;
        }

        .detail-item:hover {
            border-color: var(--blue-info);
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .detail-label {
            font-size: 0.75rem;
            color: #64748b;
            font-weight: 600;
            margin-bottom: 4px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .detail-value {
            font-size: 0.9rem;
            color: var(--navy-primary);
            font-weight: 600;
            word-break: break-word;
        }

        .detail-value.editable {
            cursor: pointer;
            padding: 4px 8px;
            border-radius: 4px;
            transition: all 0.2s ease;
            border: 1px dashed transparent;
        }

        .detail-value.editable:hover {
            background: #f0f9ff;
            border-color: var(--blue-info);
        }

        .modal-detail-header {
            background: linear-gradient(135deg, var(--navy-primary), var(--navy-dark));
            color: white;
            border-bottom: none;
            padding: 20px;
        }

        .modal-detail-title {
            font-weight: 700;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .modal-detail-body {
            padding: 25px;
            max-height: 70vh;
            overflow-y: auto;
        }

        .modal-detail-footer {
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-modal-action {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.85rem;
            border: none;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-modal-edit {
            background: linear-gradient(135deg, var(--orange-primary), #e67100);
            color: white;
        }

        .btn-modal-edit:hover {
            background: linear-gradient(135deg, #e67100, var(--orange-primary));
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 127, 0, 0.3);
        }

        .btn-modal-print {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
        }

        .btn-modal-print:hover {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .btn-modal-close {
            background: #64748b;
            color: white;
        }

        .btn-modal-close:hover {
            background: #475569;
            transform: translateY(-2px);
        }

        /* Edit form styling */
        .edit-form-group {
            margin-bottom: 15px;
        }

        .edit-form-label {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--navy-primary);
            margin-bottom: 5px;
            display: block;
        }

        .edit-form-input {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 0.9rem;
            color: var(--navy-primary);
            transition: all 0.3s ease;
        }

        .edit-form-input:focus {
            outline: none;
            border-color: var(--blue-info);
            box-shadow: 0 0 0 3px rgba(0, 188, 212, 0.1);
        }

        /* Form sections in edit modal */
        .edit-form-section {
            background: #f8fafc;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            border-left: 4px solid var(--blue-info);
        }

        .edit-form-section-title {
            color: var(--navy-primary);
            font-weight: 700;
            font-size: 0.9rem;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Responsive Design */
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
            .filter-card .row > [class*="col"] {
                margin-bottom: 15px;
            }
            .filter-card .row > [class*="col"]:last-child {
                margin-bottom: 0;
            }
            .pagination-container {
                flex-direction: column;
                gap: 15px;
                align-items: stretch;
            }
            .items-per-page {
                justify-content: center;
            }
            .pagination-info {
                text-align: center;
            }
            .pagination-controls {
                justify-content: center;
            }
            .export-buttons {
                flex-direction: column;
            }
            .quick-filter-buttons {
                overflow-x: auto;
                flex-wrap: nowrap;
                padding-bottom: 10px;
            }
            .simple-data-table {
                font-size: 0.75rem;
            }
            .simple-data-table th {
                font-size: 0.7rem;
                padding: 8px 6px;
            }
            .simple-data-table td {
                padding: 8px 6px;
                font-size: 0.75rem;
            }
            .detail-grid {
                grid-template-columns: 1fr;
            }
            .simple-data-table th.col-nama-sticky,
            .simple-data-table td.col-nama-sticky {
                left: 52px;
                min-width: 180px;
            }
            .simple-data-table th.col-aksi-sticky,
            .simple-data-table td.col-aksi-sticky {
                min-width: 160px;
            }
            .btn-action-group {
                flex-direction: column;
                gap: 4px;
            }
            .btn-detail, .btn-edit, .btn-print {
                width: 100%;
                font-size: 0.6rem;
                padding: 3px 6px;
            }
        }
        
        @media (max-width: 768px) {
            .filter-card .row {
                display: flex;
                flex-direction: column;
            }
            .filter-card .row > [class*="col"] {
                width: 100% !important;
                margin-bottom: 12px;
            }
            .btn-filter {
                width: 100% !important;
            }
            .info-bar {
                padding: 15px;
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
            .page-numbers {
                display: none;
            }
            .pagination-all .pagination-controls {
                display: none;
            }
            .table-controls {
                flex-direction: column;
            }
            .simple-data-table {
                font-size: 0.7rem;
            }
            .simple-data-table th {
                font-size: 0.65rem;
                padding: 6px 4px;
            }
            .simple-data-table td {
                padding: 6px 4px;
                font-size: 0.7rem;
            }
            .simple-data-table th.col-nama-sticky,
            .simple-data-table td.col-nama-sticky {
                left: 52px;
                min-width: 150px;
            }
            .modal-detail-body {
                padding: 15px;
            }
            .modal-detail-footer {
                flex-direction: column;
                gap: 10px;
            }
            .btn-modal-action {
                width: 100%;
                justify-content: center;
            }
            .edit-form-section {
                padding: 12px;
            }
        }
        
        @media (max-width: 576px) {
            .simple-data-table th,
            .simple-data-table td {
                padding: 5px 3px;
                font-size: 0.65rem;
            }
            .badge-jalur,
            .status-diterima,
            .jenjang-badge {
                font-size: 0.55rem;
                padding: 2px 4px;
            }
            .simple-data-table th.col-no-sticky,
            .simple-data-table td.col-no-sticky {
                min-width: 50px;
                width: 50px;
            }
            .simple-data-table th.col-nama-sticky,
            .simple-data-table td.col-nama-sticky {
                left: 52px;
                min-width: 120px;
                width: 120px;
            }
            .simple-data-table th.col-aksi-sticky,
            .simple-data-table td.col-aksi-sticky {
                min-width: 140px;
                width: 140px;
            }
            .detail-section {
                padding: 15px;
            }
            .detail-item {
                padding: 10px;
            }
            .edit-form-section {
                padding: 10px;
            }
        }
        
        @media (max-width: 400px) {
            .export-buttons {
                gap: 8px;
            }
            .btn-export {
                padding: 6px 12px;
                font-size: 0.8rem;
            }
            .simple-data-table {
                font-size: 0.6rem;
            }
            .simple-data-table th {
                font-size: 0.6rem;
            }
            .simple-data-table td {
                font-size: 0.6rem;
            }
            .simple-data-table th.col-nama-sticky,
            .simple-data-table td.col-nama-sticky {
                min-width: 100px;
                width: 100px;
            }
            .btn-action-group {
                flex-wrap: wrap;
            }
            .btn-detail, .btn-edit, .btn-print {
                min-width: 50px;
                font-size: 0.55rem;
                padding: 2px 4px;
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
                    <small class="opacity-75 fw-medium" style="font-size: 0.6rem;">Data Santri Diterima</small>
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
                <li><a href="#" class="active">Data Diterima</a></li>
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
            <h4 class="fw-bold" style="color: var(--navy-primary);">Daftar Santri Diterima</h4>
            <p class="text-muted small">Data calon santri yang telah dinyatakan lolos seleksi penerimaan.</p>
        </div>

        <!-- Table Controls -->
        <div class="table-controls">
            <div class="export-buttons">
                <button class="btn-export" id="exportExcelBtn">
                    <i class="fas fa-file-excel"></i> Export Excel
                </button>
                <button class="btn-export btn-export-pdf" id="exportPdfBtn">
                    <i class="fas fa-file-pdf"></i> Export PDF
                </button>
            </div>
        </div>

        <!-- Quick Filter Buttons -->
        <div class="quick-filter-buttons">
            <button class="quick-filter-btn active" data-filter="all">
                <i class="fas fa-layer-group"></i> Semua Santri
            </button>
            <button class="quick-filter-btn" data-filter="smp">
                <i class="fas fa-school"></i> SMP
            </button>
            <button class="quick-filter-btn" data-filter="sma">
                <i class="fas fa-university"></i> SMA
            </button>
            <button class="quick-filter-btn" data-filter="mandiri">
                <i class="fas fa-user-check"></i> Mandiri
            </button>
            <button class="quick-filter-btn" data-filter="kader">
                <i class="fas fa-users"></i> Kader
            </button>
            <button class="quick-filter-btn" data-filter="rekomendasi">
                <i class="fas fa-star"></i> Rekomendasi
            </button>
        </div>

        <div class="filter-card">
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="small fw-bold mb-1">Tahun Ajaran</label>
                    <select class="form-select form-select-sm" id="filterTahun">
                        <option>2026/2027</option>
                        <option>2025/2026</option>
                        <option>2024/2025</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="small fw-bold mb-1">Gelombang</label>
                    <select class="form-select form-select-sm" id="filterGelombang">
                        <option>Semua Gelombang</option>
                        <option>Gelombang 1</option>
                        <option selected>Gelombang 2</option>
                        <option>Gelombang 3</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="small fw-bold mb-1">Pencarian</label>
                    <input type="text" class="form-control form-control-sm" id="filterSearch" placeholder="Cari Nama / NISN...">
                </div>
            </div>
            <div class="row g-3 mt-2">
                <div class="col-12 d-flex justify-content-end">
                    <button class="btn-filter w-auto" id="applyFilterBtn" style="background: linear-gradient(135deg, var(--orange-primary), #e67100); color: white; border: none; padding: 6px 16px; border-radius: 8px; font-weight: 600; font-size: 0.85rem;">FILTER</button>
                </div>
            </div>
        </div>

        <div class="card-custom position-relative">
            <!-- Loading Overlay -->
            <div class="loading-overlay" id="loadingOverlay" style="display: none;">
                <div class="loading-spinner"></div>
                <p class="mt-3">Memuat data...</p>
            </div>

            <div class="table-container">
                <!-- Simple Data Table View - Hanya 5 kolom utama -->
                <table class="simple-data-table" id="simpleDataTable">
                    <thead>
                        <tr>
                            <th class="col-no-sticky sortable" data-sort="id">No</th>
                            <th class="col-nama-sticky sortable" data-sort="nama">Nama Lengkap</th>
                            <th class="sortable" data-sort="nisn">NISN</th>
                            <th class="sortable" data-sort="jenjang">Jenjang</th>
                            <th class="sortable" data-sort="jalur_program">Jalur</th>
                            <th class="col-aksi-sticky">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="simpleDataTableBody">
                        <!-- Table rows will be populated by JavaScript -->
                    </tbody>
                </table>

                <div id="noResultsMessage" class="no-results" style="display: none;">
                    <i class="fas fa-search"></i>
                    <h5>Tidak ada data yang sesuai filter</h5>
                    <p>Coba ubah kriteria filter Anda</p>
                </div>
            </div>
            
            <!-- Pagination Container -->
            <div class="pagination-container" id="paginationContainer" style="display: none;">
                <div class="items-per-page">
                    <label for="itemsPerPage">Tampilkan:</label>
                    <select id="itemsPerPage" class="form-select-sm">
                        <option value="10">10</option>
                        <option value="50" selected>50</option>
                        <option value="100">100</option>
                        <option value="200">200</option>
                        <option value="500">500</option>
                        <option value="all">Semua</option>
                    </select>
                </div>
                <div class="pagination-info" id="paginationInfo">
                    Menampilkan 0-0 dari 0 data
                </div>
                <div class="pagination-controls">
                    <button class="btn-pagination" id="firstPageBtn" disabled>
                        <i class="fas fa-angle-double-left"></i>
                    </button>
                    <button class="btn-pagination" id="prevPageBtn" disabled>
                        <i class="fas fa-angle-left"></i>
                    </button>
                    <div class="page-numbers" id="pageNumbers">
                        <!-- Page numbers will be populated by JavaScript -->
                    </div>
                    <button class="btn-pagination" id="nextPageBtn" disabled>
                        <i class="fas fa-angle-right"></i>
                    </button>
                    <button class="btn-pagination" id="lastPageBtn" disabled>
                        <i class="fas fa-angle-double-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </main>

    <!-- Detail Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header modal-detail-header">
                    <h5 class="modal-title modal-detail-title" id="detailModalLabel">
                        <i class="fas fa-user-graduate"></i>
                        <span id="detailTitle">Detail Santri Diterima</span>
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-detail-body" id="detailModalBody">
                    <!-- Detail content will be populated by JavaScript -->
                </div>
                <div class="modal-footer modal-detail-footer">
                    <button type="button" class="btn-modal-action btn-modal-close" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i> Tutup
                    </button>
                    <div class="d-flex gap-2">
                        <button type="button" class="btn-modal-action btn-modal-edit" id="btnEditData">
                            <i class="fas fa-edit"></i> Edit Data
                        </button>
                        <button type="button" class="btn-modal-action btn-modal-print" id="btnPrintDetail">
                            <i class="fas fa-print"></i> Cetak Data
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header modal-detail-header">
                    <h5 class="modal-title modal-detail-title" id="editModalLabel">
                        <i class="fas fa-edit"></i>
                        <span id="editTitle">Edit Data Santri</span>
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-detail-body" id="editModalBody" style="max-height: 70vh; overflow-y: auto;">
                    <!-- Edit form will be populated by JavaScript -->
                </div>
                <div class="modal-footer modal-detail-footer">
                    <button type="button" class="btn-modal-action btn-modal-close" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i> Batal
                    </button>
                    <button type="button" class="btn-modal-action btn-modal-edit" id="btnSaveData">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Export Modal -->
    <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exportModalLabel"><i class="fas fa-file-export me-2"></i>Export Data</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Pilih data yang akan diexport:</p>
                    <div class="mt-3">
                        <label class="form-label">Jumlah Data:</label>
                        <select class="form-select" id="exportDataRange">
                            <option value="current">Data yang ditampilkan (halaman saat ini)</option>
                            <option value="all" selected>Semua data yang difilter</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Format Export:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exportFormat" id="formatExcel" value="excel" checked>
                            <label class="form-check-label" for="formatExcel">
                                <i class="fas fa-file-excel text-success"></i> Excel (.xlsx)
                            </label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="exportFormat" id="formatPdf" value="pdf">
                            <label class="form-check-label" for="formatPdf">
                                <i class="fas fa-file-pdf text-danger"></i> PDF (.pdf)
                            </label>
                        </div>
                    </div>
                    <div class="alert alert-info mt-3">
                        <i class="fas fa-info-circle"></i>
                        Data akan diexport dalam format lengkap dengan semua kolom
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn-modal-confirm" id="exportConfirm">Export Data</button>
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
                Aksi berhasil dilakukan!
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize components
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const toggleBtn = document.getElementById('sidebarToggle');
        const simpleDataTableBody = document.getElementById('simpleDataTableBody');
        const applyFilterBtn = document.getElementById('applyFilterBtn');
        const noResultsMessage = document.getElementById('noResultsMessage');
        const detailModal = new bootstrap.Modal(document.getElementById('detailModal'));
        const editModal = new bootstrap.Modal(document.getElementById('editModal'));
        const exportModal = new bootstrap.Modal(document.getElementById('exportModal'));
        const successToastEl = document.getElementById('successToast');
        const successToast = new bootstrap.Toast(successToastEl);
        const toastMessage = document.getElementById('toastMessage');
        const exportConfirm = document.getElementById('exportConfirm');
        const paginationContainer = document.getElementById('paginationContainer');
        const paginationInfo = document.getElementById('paginationInfo');
        const itemsPerPageSelect = document.getElementById('itemsPerPage');
        const firstPageBtn = document.getElementById('firstPageBtn');
        const prevPageBtn = document.getElementById('prevPageBtn');
        const nextPageBtn = document.getElementById('nextPageBtn');
        const lastPageBtn = document.getElementById('lastPageBtn');
        const pageNumbers = document.getElementById('pageNumbers');
        const loadingOverlay = document.getElementById('loadingOverlay');
        const exportExcelBtn = document.getElementById('exportExcelBtn');
        const exportPdfBtn = document.getElementById('exportPdfBtn');
        const quickFilterButtons = document.querySelectorAll('.quick-filter-btn');
        const btnEditData = document.getElementById('btnEditData');
        const btnPrintDetail = document.getElementById('btnPrintDetail');
        const btnSaveData = document.getElementById('btnSaveData');
        const detailTitle = document.getElementById('detailTitle');
        const editTitle = document.getElementById('editTitle');

        // Current state
        let currentDetailData = null;
        let currentSortField = 'id';
        let currentSortOrder = 'asc';
        let currentPage = 1;
        let itemsPerPage = 50;
        let filteredData = [];
        let currentPageData = [];

        // Data dari database
        let santriData = {!! json_encode($santriData ?? []) !!};

        // Format date
        function formatDate(dateString) {
            if (!dateString || dateString === "-") return "-";
            try {
                const date = new Date(dateString);
                if (isNaN(date.getTime())) return dateString;
                const options = { day: 'numeric', month: 'short', year: 'numeric' };
                return date.toLocaleDateString('id-ID', options);
            } catch (error) {
                return dateString;
            }
        }

        // Format currency
        function formatCurrency(amount) {
            if (!amount || amount === "-") return "-";
            return "Rp " + amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        // Truncate text with hover effect
        function truncateText(text, maxLength = 20) {
            if (!text) return "-";
            if (text.length <= maxLength) return text;
            return text.substring(0, maxLength) + "...";
        }

        // Sort data
        function sortData(data) {
            return data.sort((a, b) => {
                let valueA, valueB;
                
                switch(currentSortField) {
                    case 'nama':
                        valueA = a.nama.toLowerCase();
                        valueB = b.nama.toLowerCase();
                        break;
                    case 'nisn':
                        valueA = a.nisn;
                        valueB = b.nisn;
                        break;
                    case 'jenjang':
                        valueA = a.jenjang;
                        valueB = b.jenjang;
                        break;
                    case 'jalur_program':
                        valueA = a.jalur_program;
                        valueB = b.jalur_program;
                        break;
                    case 'id':
                    default:
                        valueA = a.id;
                        valueB = b.id;
                        break;
                }
                
                if (currentSortOrder === 'asc') {
                    return valueA > valueB ? 1 : valueA < valueB ? -1 : 0;
                } else {
                    return valueA < valueB ? 1 : valueA > valueB ? -1 : 0;
                }
            });
        }

        // Update sort indicators
        function updateSortIndicators() {
            document.querySelectorAll('.sortable').forEach(th => {
                th.classList.remove('sort-asc', 'sort-desc');
            });
            
            const currentSortTh = document.querySelector(`[data-sort="${currentSortField}"]`);
            if (currentSortTh) {
                currentSortTh.classList.add(currentSortOrder === 'asc' ? 'sort-asc' : 'sort-desc');
            }
        }

        // Filter data
        function applyFilters() {
            showLoading();
            
            const tahun = document.getElementById('filterTahun').value;
            const gelombang = document.getElementById('filterGelombang').value;
            const search = document.getElementById('filterSearch').value.toLowerCase();
            const quickFilter = document.querySelector('.quick-filter-btn.active')?.dataset.filter || 'all';

            filteredData = santriData.filter(item => {
                if (tahun && !item.tahun.includes(tahun.split('/')[0])) return false;
                if (gelombang !== "Semua Gelombang" && item.gelombang !== gelombang) return false;
                if (search && !item.nama.toLowerCase().includes(search) && !item.nisn.includes(search)) return false;
                
                switch(quickFilter) {
                    case 'smp':
                        if (item.jenjang !== 'SMP') return false;
                        break;
                    case 'sma':
                        if (item.jenjang !== 'SMA') return false;
                        break;
                    case 'mandiri':
                        if (item.jalur_program !== 'Mandiri') return false;
                        break;
                    case 'kader':
                        if (item.jalur_program !== 'Kader') return false;
                        break;
                    case 'rekomendasi':
                        if (item.jalur_program !== 'Rekomendasi') return false;
                        break;
                    case 'all':
                    default:
                        break;
                }
                
                return true;
            });

            filteredData = sortData(filteredData);
            currentPage = 1;
            
            updateSortIndicators();
            
            setTimeout(() => {
                renderPagination();
                renderCurrentPage();
                hideLoading();

                if (filteredData.length === 0) {
                    noResultsMessage.style.display = 'block';
                    paginationContainer.style.display = 'none';
                } else {
                    noResultsMessage.style.display = 'none';
                    paginationContainer.style.display = 'flex';
                }

                if (tahun || gelombang !== "Semua Gelombang" || search || quickFilter !== 'all') {
                    toastMessage.textContent = `Menampilkan ${filteredData.length} santri yang diterima`;
                    successToast.show();
                }
            }, 500);
        }

        // Show loading
        function showLoading() {
            loadingOverlay.style.display = 'flex';
        }

        // Hide loading
        function hideLoading() {
            loadingOverlay.style.display = 'none';
        }

        // Render current page
        function renderCurrentPage() {
            let startIndex, endIndex, pageData;
            
            if (itemsPerPage === 'all') {
                pageData = filteredData;
                startIndex = 0;
                endIndex = filteredData.length;
            } else {
                startIndex = (currentPage - 1) * itemsPerPage;
                endIndex = Math.min(startIndex + itemsPerPage, filteredData.length);
                pageData = filteredData.slice(startIndex, endIndex);
            }
            
            currentPageData = pageData;
            
            renderSimpleTable(pageData, startIndex);
            
            updatePaginationInfo(startIndex, endIndex);
        }

        // Render simple table with only 5 columns
        function renderSimpleTable(data, startIndex) {
            simpleDataTableBody.innerHTML = '';
            
            // Calculate row numbers
            let rowNumbers;
            if (currentSortField === 'id' && currentSortOrder === 'desc') {
                rowNumbers = Array.from({length: data.length}, (_, i) => {
                    if (itemsPerPage === 'all') {
                        return filteredData.length - startIndex - i;
                    } else {
                        return filteredData.length - (startIndex + i);
                    }
                });
            } else {
                rowNumbers = Array.from({length: data.length}, (_, i) => startIndex + i + 1);
            }
            
            data.forEach((item, index) => {
                const row = document.createElement('tr');
                const rowNumber = rowNumbers[index];

                row.innerHTML = `
                    <!-- No - Sticky -->
                    <td class="col-no-sticky">${rowNumber}</td>
                    
                    <!-- Nama Lengkap - Sticky -->
                    <td class="col-nama-sticky nama-cell">
                        <span class="truncate-text" title="${item.nama}">${truncateText(item.nama, 25)}</span>
                    </td>
                    
                    <!-- NISN -->
                    <td>${item.nisn}</td>
                    
                    <!-- Jenjang -->
                    <td><span class="jenjang-badge">${item.jenjang}</span></td>
                    
                    <!-- Jalur -->
                    <td><span class="badge-jalur">${item.jalur_program}</span></td>
                    
                    <!-- Aksi - Sticky -->
                    <td class="col-aksi-sticky">
                        <div class="btn-action-group">
                            <button class="btn-detail" data-id="${item.id}" title="Lihat Detail">
                                <i class="fas fa-eye"></i> <span class="d-none d-md-inline">Detail</span>
                            </button>
                            <button class="btn-edit" data-id="${item.id}" title="Edit Data">
                                <i class="fas fa-edit"></i> <span class="d-none d-md-inline">Edit</span>
                            </button>
                            <button class="btn-print" data-id="${item.id}" title="Cetak Data">
                                <i class="fas fa-print"></i> <span class="d-none d-md-inline">Cetak</span>
                            </button>
                        </div>
                    </td>
                `;
                simpleDataTableBody.appendChild(row);
            });

            // Add event listeners for action buttons
            document.querySelectorAll('.btn-detail').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = parseInt(this.dataset.id);
                    const santri = santriData.find(item => item.id === id);
                    if (santri) {
                        showDetailModal(santri);
                    }
                });
            });

            document.querySelectorAll('.btn-edit').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = parseInt(this.dataset.id);
                    const santri = santriData.find(item => item.id === id);
                    if (santri) {
                        showEditModal(santri);
                    }
                });
            });

            document.querySelectorAll('.btn-print').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = parseInt(this.dataset.id);
                    const santri = santriData.find(item => item.id === id);
                    if (santri) {
                        printDetailData(santri);
                    }
                });
            });
        }

        // Show detail modal - Tampilkan semua data lengkap seperti Excel
        function showDetailModal(santri) {
            currentDetailData = santri;
            
            const modalBody = document.getElementById('detailModalBody');
            modalBody.innerHTML = `
                <div class="detail-grid">
                    <!-- Data Santri -->
                    <div class="detail-section">
                        <div class="detail-section-title">
                            <i class="fas fa-user-graduate"></i> DATA PRIBADI SANTRI
                        </div>
                        <div class="detail-grid">
                            <div class="detail-item">
                                <div class="detail-label">No. Pendaftaran</div>
                                <div class="detail-value">${santri.nomor_pendaftaran}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Nama Lengkap</div>
                                <div class="detail-value">${santri.nama}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">NISN</div>
                                <div class="detail-value">${santri.nisn}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">NIK</div>
                                <div class="detail-value">${santri.nik_santri}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Tempat, Tanggal Lahir</div>
                                <div class="detail-value">${santri.tempat_lahir_santri}, ${formatDate(santri.tanggal_lahir_santri)}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Jenis Kelamin</div>
                                <div class="detail-value">${santri.jenis_kelamin}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Agama</div>
                                <div class="detail-value">${santri.agama_santri}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Hobi</div>
                                <div class="detail-value">${santri.hobi}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Cita-Cita</div>
                                <div class="detail-value">${santri.cita_cita}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">No. HP</div>
                                <div class="detail-value">${santri.no_hp_santri}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Alamat Santri -->
                    <div class="detail-section">
                        <div class="detail-section-title">
                            <i class="fas fa-home"></i> ALAMAT & DOMISILI SANTRI
                        </div>
                        <div class="detail-grid">
                            <div class="detail-item">
                                <div class="detail-label">Alamat Jalan</div>
                                <div class="detail-value">${santri.alamat_jalan}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">RT/RW</div>
                                <div class="detail-value">${santri.rt}/${santri.rw}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Kelurahan/Desa</div>
                                <div class="detail-value">${santri.kelurahan}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Kecamatan</div>
                                <div class="detail-value">${santri.kecamatan}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Kabupaten/Kota</div>
                                <div class="detail-value">${santri.kabupaten_kota}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Provinsi</div>
                                <div class="detail-value">${santri.provinsi}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Data Ayah -->
                    <div class="detail-section">
                        <div class="detail-section-title">
                            <i class="fas fa-male"></i> DATA AYAH KANDUNG
                        </div>
                        <div class="detail-grid">
                            <div class="detail-item">
                                <div class="detail-label">Nama Ayah</div>
                                <div class="detail-value">${santri.nama_ayah}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">NIK Ayah</div>
                                <div class="detail-value">${santri.nik_ayah}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Tempat, Tanggal Lahir</div>
                                <div class="detail-value">${santri.tempat_lahir_ayah}, ${formatDate(santri.tanggal_lahir_ayah)}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Agama</div>
                                <div class="detail-value">${santri.agama_ayah}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Status</div>
                                <div class="detail-value">${santri.status_ayah}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Pendidikan</div>
                                <div class="detail-value">${santri.pendidikan_ayah}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Pekerjaan</div>
                                <div class="detail-value">${santri.pekerjaan_ayah}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Penghasilan</div>
                                <div class="detail-value">${formatCurrency(santri.penghasilan_ayah)}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">No. HP</div>
                                <div class="detail-value">${santri.no_hp_ayah}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Alamat</div>
                                <div class="detail-value">${santri.alamat_ayah}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Data Ibu -->
                    <div class="detail-section">
                        <div class="detail-section-title">
                            <i class="fas fa-female"></i> DATA IBU KANDUNG
                        </div>
                        <div class="detail-grid">
                            <div class="detail-item">
                                <div class="detail-label">Nama Ibu</div>
                                <div class="detail-value">${santri.nama_ibu}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">NIK Ibu</div>
                                <div class="detail-value">${santri.nik_ibu}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Tempat, Tanggal Lahir</div>
                                <div class="detail-value">${santri.tempat_lahir_ibu}, ${formatDate(santri.tanggal_lahir_ibu)}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Agama</div>
                                <div class="detail-value">${santri.agama_ibu}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Status</div>
                                <div class="detail-value">${santri.status_ibu}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Pendidikan</div>
                                <div class="detail-value">${santri.pendidikan_ibu}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Pekerjaan</div>
                                <div class="detail-value">${santri.pekerjaan_ibu}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Penghasilan</div>
                                <div class="detail-value">${formatCurrency(santri.penghasilan_ibu)}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">No. HP</div>
                                <div class="detail-value">${santri.no_hp_ibu}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Alamat</div>
                                <div class="detail-value">${santri.alamat_ibu}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Data Wali -->
                    <div class="detail-section">
                        <div class="detail-section-title">
                            <i class="fas fa-user-tie"></i> DATA WALI (Jika Berbeda)
                        </div>
                        <div class="detail-grid">
                            <div class="detail-item">
                                <div class="detail-label">Nama Wali</div>
                                <div class="detail-value">${santri.nama_wali}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">NIK Wali</div>
                                <div class="detail-value">${santri.nik_wali}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Tempat, Tanggal Lahir</div>
                                <div class="detail-value">${santri.tempat_lahir_wali}, ${formatDate(santri.tanggal_lahir_wali)}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Agama</div>
                                <div class="detail-value">${santri.agama_wali}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Status</div>
                                <div class="detail-value">${santri.status_wali}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Pendidikan</div>
                                <div class="detail-value">${santri.pendidikan_wali}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Pekerjaan</div>
                                <div class="detail-value">${santri.pekerjaan_wali}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Penghasilan</div>
                                <div class="detail-value">${formatCurrency(santri.penghasilan_wali)}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">No. HP</div>
                                <div class="detail-value">${santri.no_hp_wali}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Alamat</div>
                                <div class="detail-value">${santri.alamat_wali}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Data Pendaftaran -->
                    <div class="detail-section">
                        <div class="detail-section-title">
                            <i class="fas fa-file-signature"></i> DATA PENDAFTARAN & SELEKSI
                        </div>
                        <div class="detail-grid">
                            <div class="detail-item">
                                <div class="detail-label">Jenis Pendaftaran</div>
                                <div class="detail-value">${santri.jenis_pendaftaran}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Jalur/Program</div>
                                <div class="detail-value"><span class="badge-jalur">${santri.jalur_program}</span></div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Jenjang</div>
                                <div class="detail-value"><span class="jenjang-badge">${santri.jenjang}</span></div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Sekolah Asal</div>
                                <div class="detail-value">${santri.sekolah_asal}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">NPSN Sekolah</div>
                                <div class="detail-value">${santri.npsn_sekolah}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Tahun Ajaran</div>
                                <div class="detail-value">${santri.tahun}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Gelombang</div>
                                <div class="detail-value">${santri.gelombang}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Status Penerimaan</div>
                                <div class="detail-value"><span class="status-diterima">${santri.status}</span></div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Tanggal Diterima</div>
                                <div class="detail-value">${formatDate(santri.tanggal_diterima)}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Nilai Ujian</div>
                                <div class="detail-value">${santri.nilai_ujian}</div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            detailTitle.textContent = `Detail Santri: ${santri.nama}`;
            
            detailModal.show();
        }

        // Show edit modal - Form edit lengkap semua data
        function showEditModal(santri) {
            currentDetailData = santri;
            
            const modalBody = document.getElementById('editModalBody');
            modalBody.innerHTML = `
                <form id="editForm">
                    <div class="edit-form-section">
                        <div class="edit-form-section-title">
                            <i class="fas fa-user-graduate"></i> DATA PRIBADI SANTRI
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Nama Lengkap *</label>
                                    <input type="text" class="edit-form-input" id="editNama" value="${santri.nama}" required>
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">NISN</label>
                                    <input type="text" class="edit-form-input" id="editNisn" value="${santri.nisn}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">NIK</label>
                                    <input type="text" class="edit-form-input" id="editNik" value="${santri.nik_santri}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Tempat Lahir</label>
                                    <input type="text" class="edit-form-input" id="editTempatLahir" value="${santri.tempat_lahir_santri}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Tanggal Lahir</label>
                                    <input type="date" class="edit-form-input" id="editTanggalLahir" value="${santri.tanggal_lahir_santri}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Jenis Kelamin</label>
                                    <select class="edit-form-input" id="editJenisKelamin">
                                        <option value="Laki-laki" ${santri.jenis_kelamin === 'Laki-laki' ? 'selected' : ''}>Laki-laki</option>
                                        <option value="Perempuan" ${santri.jenis_kelamin === 'Perempuan' ? 'selected' : ''}>Perempuan</option>
                                    </select>
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Agama</label>
                                    <select class="edit-form-input" id="editAgama">
                                        <option ${santri.agama_santri === 'Islam' ? 'selected' : ''}>Islam</option>
                                        <option ${santri.agama_santri === 'Kristen' ? 'selected' : ''}>Kristen</option>
                                        <option ${santri.agama_santri === 'Katolik' ? 'selected' : ''}>Katolik</option>
                                        <option ${santri.agama_santri === 'Hindu' ? 'selected' : ''}>Hindu</option>
                                        <option ${santri.agama_santri === 'Buddha' ? 'selected' : ''}>Buddha</option>
                                    </select>
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Hobi</label>
                                    <input type="text" class="edit-form-input" id="editHobi" value="${santri.hobi}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Cita-Cita</label>
                                    <input type="text" class="edit-form-input" id="editCita" value="${santri.cita_cita}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">No. HP Santri</label>
                                    <input type="text" class="edit-form-input" id="editNoHpSantri" value="${santri.no_hp_santri}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="edit-form-section">
                        <div class="edit-form-section-title">
                            <i class="fas fa-home"></i> ALAMAT & DOMISILI SANTRI
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Alamat Jalan</label>
                                    <input type="text" class="edit-form-input" id="editAlamat" value="${santri.alamat_jalan}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">RT</label>
                                    <input type="text" class="edit-form-input" id="editRt" value="${santri.rt}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">RW</label>
                                    <input type="text" class="edit-form-input" id="editRw" value="${santri.rw}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Kelurahan/Desa</label>
                                    <input type="text" class="edit-form-input" id="editKelurahan" value="${santri.kelurahan}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Kecamatan</label>
                                    <input type="text" class="edit-form-input" id="editKecamatan" value="${santri.kecamatan}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Kabupaten/Kota</label>
                                    <input type="text" class="edit-form-input" id="editKota" value="${santri.kabupaten_kota}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Provinsi</label>
                                    <input type="text" class="edit-form-input" id="editProvinsi" value="${santri.provinsi}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="edit-form-section">
                        <div class="edit-form-section-title">
                            <i class="fas fa-male"></i> DATA AYAH KANDUNG
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Nama Ayah</label>
                                    <input type="text" class="edit-form-input" id="editNamaAyah" value="${santri.nama_ayah}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">NIK Ayah</label>
                                    <input type="text" class="edit-form-input" id="editNikAyah" value="${santri.nik_ayah}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Tempat Lahir Ayah</label>
                                    <input type="text" class="edit-form-input" id="editTempatLahirAyah" value="${santri.tempat_lahir_ayah}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Tanggal Lahir Ayah</label>
                                    <input type="date" class="edit-form-input" id="editTanggalLahirAyah" value="${santri.tanggal_lahir_ayah}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Agama Ayah</label>
                                    <select class="edit-form-input" id="editAgamaAyah">
                                        <option ${santri.agama_ayah === 'Islam' ? 'selected' : ''}>Islam</option>
                                        <option ${santri.agama_ayah === 'Kristen' ? 'selected' : ''}>Kristen</option>
                                        <option ${santri.agama_ayah === 'Katolik' ? 'selected' : ''}>Katolik</option>
                                        <option ${santri.agama_ayah === 'Hindu' ? 'selected' : ''}>Hindu</option>
                                        <option ${santri.agama_ayah === 'Buddha' ? 'selected' : ''}>Buddha</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Status Ayah</label>
                                    <select class="edit-form-input" id="editStatusAyah">
                                        <option ${santri.status_ayah === 'Masih Hidup' ? 'selected' : ''}>Masih Hidup</option>
                                        <option ${santri.status_ayah === 'Meninggal' ? 'selected' : ''}>Meninggal</option>
                                        <option ${santri.status_ayah === 'Cerai' ? 'selected' : ''}>Cerai</option>
                                    </select>
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Pendidikan Ayah</label>
                                    <select class="edit-form-input" id="editPendidikanAyah">
                                        <option ${santri.pendidikan_ayah === 'SD' ? 'selected' : ''}>SD</option>
                                        <option ${santri.pendidikan_ayah === 'SMP' ? 'selected' : ''}>SMP</option>
                                        <option ${santri.pendidikan_ayah === 'SMA' ? 'selected' : ''}>SMA</option>
                                        <option ${santri.pendidikan_ayah === 'D3' ? 'selected' : ''}>D3</option>
                                        <option ${santri.pendidikan_ayah === 'S1' ? 'selected' : ''}>S1</option>
                                        <option ${santri.pendidikan_ayah === 'S2' ? 'selected' : ''}>S2</option>
                                        <option ${santri.pendidikan_ayah === 'S3' ? 'selected' : ''}>S3</option>
                                    </select>
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Pekerjaan Ayah</label>
                                    <input type="text" class="edit-form-input" id="editPekerjaanAyah" value="${santri.pekerjaan_ayah}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Penghasilan Ayah</label>
                                    <input type="number" class="edit-form-input" id="editPenghasilanAyah" value="${santri.penghasilan_ayah}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">No. HP Ayah</label>
                                    <input type="text" class="edit-form-input" id="editNoHpAyah" value="${santri.no_hp_ayah}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="edit-form-section">
                        <div class="edit-form-section-title">
                            <i class="fas fa-female"></i> DATA IBU KANDUNG
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Nama Ibu</label>
                                    <input type="text" class="edit-form-input" id="editNamaIbu" value="${santri.nama_ibu}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">NIK Ibu</label>
                                    <input type="text" class="edit-form-input" id="editNikIbu" value="${santri.nik_ibu}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Tempat Lahir Ibu</label>
                                    <input type="text" class="edit-form-input" id="editTempatLahirIbu" value="${santri.tempat_lahir_ibu}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Tanggal Lahir Ibu</label>
                                    <input type="date" class="edit-form-input" id="editTanggalLahirIbu" value="${santri.tanggal_lahir_ibu}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Agama Ibu</label>
                                    <select class="edit-form-input" id="editAgamaIbu">
                                        <option ${santri.agama_ibu === 'Islam' ? 'selected' : ''}>Islam</option>
                                        <option ${santri.agama_ibu === 'Kristen' ? 'selected' : ''}>Kristen</option>
                                        <option ${santri.agama_ibu === 'Katolik' ? 'selected' : ''}>Katolik</option>
                                        <option ${santri.agama_ibu === 'Hindu' ? 'selected' : ''}>Hindu</option>
                                        <option ${santri.agama_ibu === 'Buddha' ? 'selected' : ''}>Buddha</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Status Ibu</label>
                                    <select class="edit-form-input" id="editStatusIbu">
                                        <option ${santri.status_ibu === 'Masih Hidup' ? 'selected' : ''}>Masih Hidup</option>
                                        <option ${santri.status_ibu === 'Meninggal' ? 'selected' : ''}>Meninggal</option>
                                        <option ${santri.status_ibu === 'Cerai' ? 'selected' : ''}>Cerai</option>
                                    </select>
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Pendidikan Ibu</label>
                                    <select class="edit-form-input" id="editPendidikanIbu">
                                        <option ${santri.pendidikan_ibu === 'SD' ? 'selected' : ''}>SD</option>
                                        <option ${santri.pendidikan_ibu === 'SMP' ? 'selected' : ''}>SMP</option>
                                        <option ${santri.pendidikan_ibu === 'SMA' ? 'selected' : ''}>SMA</option>
                                        <option ${santri.pendidikan_ibu === 'D3' ? 'selected' : ''}>D3</option>
                                        <option ${santri.pendidikan_ibu === 'S1' ? 'selected' : ''}>S1</option>
                                        <option ${santri.pendidikan_ibu === 'S2' ? 'selected' : ''}>S2</option>
                                        <option ${santri.pendidikan_ibu === 'S3' ? 'selected' : ''}>S3</option>
                                    </select>
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Pekerjaan Ibu</label>
                                    <input type="text" class="edit-form-input" id="editPekerjaanIbu" value="${santri.pekerjaan_ibu}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Penghasilan Ibu</label>
                                    <input type="number" class="edit-form-input" id="editPenghasilanIbu" value="${santri.penghasilan_ibu}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">No. HP Ibu</label>
                                    <input type="text" class="edit-form-input" id="editNoHpIbu" value="${santri.no_hp_ibu}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="edit-form-section">
                        <div class="edit-form-section-title">
                            <i class="fas fa-user-tie"></i> DATA WALI (Jika Berbeda)
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Nama Wali</label>
                                    <input type="text" class="edit-form-input" id="editNamaWali" value="${santri.nama_wali}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">NIK Wali</label>
                                    <input type="text" class="edit-form-input" id="editNikWali" value="${santri.nik_wali}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Tempat Lahir Wali</label>
                                    <input type="text" class="edit-form-input" id="editTempatLahirWali" value="${santri.tempat_lahir_wali}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Tanggal Lahir Wali</label>
                                    <input type="date" class="edit-form-input" id="editTanggalLahirWali" value="${santri.tanggal_lahir_wali}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Agama Wali</label>
                                    <select class="edit-form-input" id="editAgamaWali">
                                        <option ${santri.agama_wali === 'Islam' ? 'selected' : ''}>Islam</option>
                                        <option ${santri.agama_wali === 'Kristen' ? 'selected' : ''}>Kristen</option>
                                        <option ${santri.agama_wali === 'Katolik' ? 'selected' : ''}>Katolik</option>
                                        <option ${santri.agama_wali === 'Hindu' ? 'selected' : ''}>Hindu</option>
                                        <option ${santri.agama_wali === 'Buddha' ? 'selected' : ''}>Buddha</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Status Wali</label>
                                    <select class="edit-form-input" id="editStatusWali">
                                        <option ${santri.status_wali === 'Masih Hidup' ? 'selected' : ''}>Masih Hidup</option>
                                        <option ${santri.status_wali === 'Meninggal' ? 'selected' : ''}>Meninggal</option>
                                        <option ${santri.status_wali === 'Cerai' ? 'selected' : ''}>Cerai</option>
                                    </select>
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Pendidikan Wali</label>
                                    <select class="edit-form-input" id="editPendidikanWali">
                                        <option ${santri.pendidikan_wali === 'SD' ? 'selected' : ''}>SD</option>
                                        <option ${santri.pendidikan_wali === 'SMP' ? 'selected' : ''}>SMP</option>
                                        <option ${santri.pendidikan_wali === 'SMA' ? 'selected' : ''}>SMA</option>
                                        <option ${santri.pendidikan_wali === 'D3' ? 'selected' : ''}>D3</option>
                                        <option ${santri.pendidikan_wali === 'S1' ? 'selected' : ''}>S1</option>
                                        <option ${santri.pendidikan_wali === 'S2' ? 'selected' : ''}>S2</option>
                                        <option ${santri.pendidikan_wali === 'S3' ? 'selected' : ''}>S3</option>
                                    </select>
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Pekerjaan Wali</label>
                                    <input type="text" class="edit-form-input" id="editPekerjaanWali" value="${santri.pekerjaan_wali}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Penghasilan Wali</label>
                                    <input type="number" class="edit-form-input" id="editPenghasilanWali" value="${santri.penghasilan_wali}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">No. HP Wali</label>
                                    <input type="text" class="edit-form-input" id="editNoHpWali" value="${santri.no_hp_wali}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="edit-form-section">
                        <div class="edit-form-section-title">
                            <i class="fas fa-file-signature"></i> DATA PENDAFTARAN & SELEKSI
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Jalur/Program</label>
                                    <select class="edit-form-input" id="editJalur">
                                        <option value="Mandiri" ${santri.jalur_program === 'Mandiri' ? 'selected' : ''}>Mandiri</option>
                                        <option value="Kader" ${santri.jalur_program === 'Kader' ? 'selected' : ''}>Kader</option>
                                        <option value="Rekomendasi" ${santri.jalur_program === 'Rekomendasi' ? 'selected' : ''}>Rekomendasi</option>
                                    </select>
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Jenjang</label>
                                    <select class="edit-form-input" id="editJenjang">
                                        <option value="SMP" ${santri.jenjang === 'SMP' ? 'selected' : ''}>SMP</option>
                                        <option value="SMA" ${santri.jenjang === 'SMA' ? 'selected' : ''}>SMA</option>
                                    </select>
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Sekolah Asal</label>
                                    <input type="text" class="edit-form-input" id="editSekolahAsal" value="${santri.sekolah_asal}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">NPSN Sekolah</label>
                                    <input type="text" class="edit-form-input" id="editNpsn" value="${santri.npsn_sekolah}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Status Penerimaan</label>
                                    <select class="edit-form-input" id="editStatus">
                                        <option value="Diterima" ${santri.status === 'Diterima' ? 'selected' : ''}>Diterima</option>
                                        <option value="Daftar Ulang" ${santri.status === 'Daftar Ulang' ? 'selected' : ''}>Daftar Ulang</option>
                                        <option value="Ditolak" ${santri.status === 'Ditolak' ? 'selected' : ''}>Ditolak</option>
                                        <option value="Cadangan" ${santri.status === 'Cadangan' ? 'selected' : ''}>Cadangan</option>
                                    </select>
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Nilai Ujian</label>
                                    <input type="number" step="0.1" class="edit-form-input" id="editNilaiUjian" value="${santri.nilai_ujian}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Tanggal Diterima</label>
                                    <input type="date" class="edit-form-input" id="editTanggalDiterima" value="${santri.tanggal_diterima}">
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Gelombang</label>
                                    <select class="edit-form-input" id="editGelombang">
                                        <option ${santri.gelombang === 'Gelombang 1' ? 'selected' : ''}>Gelombang 1</option>
                                        <option ${santri.gelombang === 'Gelombang 2' ? 'selected' : ''}>Gelombang 2</option>
                                        <option ${santri.gelombang === 'Gelombang 3' ? 'selected' : ''}>Gelombang 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            `;
            
            editTitle.textContent = `Edit Data Santri: ${santri.nama}`;
            editModal.show();
        }

        // Save all edits from edit form
        function saveAllEdits() {
            if (!currentDetailData) return;
            
            // Validate required fields
            const nama = document.getElementById('editNama').value;
            if (!nama) {
                alert('Nama lengkap harus diisi!');
                return;
            }
            
            // Get all values from form
            // Data Santri
            currentDetailData.nama = nama;
            currentDetailData.nisn = document.getElementById('editNisn').value;
            currentDetailData.nik_santri = document.getElementById('editNik').value;
            currentDetailData.tempat_lahir_santri = document.getElementById('editTempatLahir').value;
            currentDetailData.tanggal_lahir_santri = document.getElementById('editTanggalLahir').value;
            currentDetailData.jenis_kelamin = document.getElementById('editJenisKelamin').value;
            currentDetailData.agama_santri = document.getElementById('editAgama').value;
            currentDetailData.hobi = document.getElementById('editHobi').value;
            currentDetailData.cita_cita = document.getElementById('editCita').value;
            currentDetailData.no_hp_santri = document.getElementById('editNoHpSantri').value;
            
            // Alamat Santri
            currentDetailData.alamat_jalan = document.getElementById('editAlamat').value;
            currentDetailData.rt = document.getElementById('editRt').value;
            currentDetailData.rw = document.getElementById('editRw').value;
            currentDetailData.kelurahan = document.getElementById('editKelurahan').value;
            currentDetailData.kecamatan = document.getElementById('editKecamatan').value;
            currentDetailData.kabupaten_kota = document.getElementById('editKota').value;
            currentDetailData.provinsi = document.getElementById('editProvinsi').value;
            
            // Data Ayah
            currentDetailData.nama_ayah = document.getElementById('editNamaAyah').value;
            currentDetailData.nik_ayah = document.getElementById('editNikAyah').value;
            currentDetailData.tempat_lahir_ayah = document.getElementById('editTempatLahirAyah').value;
            currentDetailData.tanggal_lahir_ayah = document.getElementById('editTanggalLahirAyah').value;
            currentDetailData.agama_ayah = document.getElementById('editAgamaAyah').value;
            currentDetailData.status_ayah = document.getElementById('editStatusAyah').value;
            currentDetailData.pendidikan_ayah = document.getElementById('editPendidikanAyah').value;
            currentDetailData.pekerjaan_ayah = document.getElementById('editPekerjaanAyah').value;
            currentDetailData.penghasilan_ayah = parseInt(document.getElementById('editPenghasilanAyah').value) || 0;
            currentDetailData.no_hp_ayah = document.getElementById('editNoHpAyah').value;
            
            // Data Ibu
            currentDetailData.nama_ibu = document.getElementById('editNamaIbu').value;
            currentDetailData.nik_ibu = document.getElementById('editNikIbu').value;
            currentDetailData.tempat_lahir_ibu = document.getElementById('editTempatLahirIbu').value;
            currentDetailData.tanggal_lahir_ibu = document.getElementById('editTanggalLahirIbu').value;
            currentDetailData.agama_ibu = document.getElementById('editAgamaIbu').value;
            currentDetailData.status_ibu = document.getElementById('editStatusIbu').value;
            currentDetailData.pendidikan_ibu = document.getElementById('editPendidikanIbu').value;
            currentDetailData.pekerjaan_ibu = document.getElementById('editPekerjaanIbu').value;
            currentDetailData.penghasilan_ibu = parseInt(document.getElementById('editPenghasilanIbu').value) || 0;
            currentDetailData.no_hp_ibu = document.getElementById('editNoHpIbu').value;
            
            // Data Wali
            currentDetailData.nama_wali = document.getElementById('editNamaWali').value;
            currentDetailData.nik_wali = document.getElementById('editNikWali').value;
            currentDetailData.tempat_lahir_wali = document.getElementById('editTempatLahirWali').value;
            currentDetailData.tanggal_lahir_wali = document.getElementById('editTanggalLahirWali').value;
            currentDetailData.agama_wali = document.getElementById('editAgamaWali').value;
            currentDetailData.status_wali = document.getElementById('editStatusWali').value;
            currentDetailData.pendidikan_wali = document.getElementById('editPendidikanWali').value;
            currentDetailData.pekerjaan_wali = document.getElementById('editPekerjaanWali').value;
            currentDetailData.penghasilan_wali = parseInt(document.getElementById('editPenghasilanWali').value) || 0;
            currentDetailData.no_hp_wali = document.getElementById('editNoHpWali').value;
            
            // Data Pendaftaran
            currentDetailData.jalur_program = document.getElementById('editJalur').value;
            currentDetailData.jenjang = document.getElementById('editJenjang').value;
            currentDetailData.sekolah_asal = document.getElementById('editSekolahAsal').value;
            currentDetailData.npsn_sekolah = document.getElementById('editNpsn').value;
            currentDetailData.status = document.getElementById('editStatus').value;
            currentDetailData.nilai_ujian = parseFloat(document.getElementById('editNilaiUjian').value) || 0;
            currentDetailData.tanggal_diterima = document.getElementById('editTanggalDiterima').value;
            currentDetailData.gelombang = document.getElementById('editGelombang').value;
            
            // Update in main data
            const index = santriData.findIndex(item => item.id === currentDetailData.id);
            if (index !== -1) {
                santriData[index] = {...currentDetailData};
            }
            
            // Update in filtered data if exists
            const filteredIndex = filteredData.findIndex(item => item.id === currentDetailData.id);
            if (filteredIndex !== -1) {
                filteredData[filteredIndex] = {...currentDetailData};
            }
            
            // Refresh table
            applyFilters();
            
            // Close modal
            editModal.hide();
            
            toastMessage.textContent = `Data santri ${currentDetailData.nama} berhasil diperbarui`;
            successToast.show();
        }

        // Print detail data
        function printDetailData(santri) {
            const printWindow = window.open('', '_blank');
            printWindow.document.write(`
                <html>
                <head>
                    <title>Data Santri - ${santri.nama}</title>
                    <style>
                        body { font-family: Arial, sans-serif; margin: 20px; }
                        .header { text-align: center; margin-bottom: 30px; border-bottom: 3px solid #002b49; padding-bottom: 20px; }
                        .header h1 { color: #002b49; margin-bottom: 5px; font-size: 24px; }
                        .header h2 { color: #666; font-size: 18px; margin-bottom: 10px; }
                        .section { margin-bottom: 25px; }
                        .section h3 { color: #002b49; border-bottom: 2px solid #002b49; padding-bottom: 5px; margin-bottom: 15px; }
                        .grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; }
                        .item { margin-bottom: 10px; }
                        .label { font-weight: bold; color: #555; font-size: 0.9em; display: inline-block; width: 200px; }
                        .value { color: #333; }
                        .footer { text-align: center; margin-top: 40px; font-size: 0.9em; color: #666; }
                        @media print {
                            body { margin: 0; padding: 15px; }
                            .no-print { display: none; }
                            .header { page-break-after: avoid; }
                            .section { page-break-inside: avoid; }
                        }
                        @page { margin: 20mm; }
                    </style>
                </head>
                <body>
                    <div class="header">
                        <h1>DATA SANTRI DITERIMA</h1>
                        <h2>AISYIYAH QURANIC BOARDING SCHOOL PONOROGO</h2>
                        <p>Dicetak pada: ${new Date().toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}</p>
                    </div>
                    
                    <div class="section">
                        <h3>DATA PRIBADI SANTRI</h3>
                        <div class="grid">
                            <div class="item"><span class="label">No. Pendaftaran:</span> <span class="value">${santri.nomor_pendaftaran}</span></div>
                            <div class="item"><span class="label">Nama Lengkap:</span> <span class="value">${santri.nama}</span></div>
                            <div class="item"><span class="label">NISN:</span> <span class="value">${santri.nisn}</span></div>
                            <div class="item"><span class="label">NIK:</span> <span class="value">${santri.nik_santri}</span></div>
                            <div class="item"><span class="label">Tempat, Tanggal Lahir:</span> <span class="value">${santri.tempat_lahir_santri}, ${formatDate(santri.tanggal_lahir_santri)}</span></div>
                            <div class="item"><span class="label">Jenis Kelamin:</span> <span class="value">${santri.jenis_kelamin}</span></div>
                            <div class="item"><span class="label">Agama:</span> <span class="value">${santri.agama_santri}</span></div>
                            <div class="item"><span class="label">Hobi:</span> <span class="value">${santri.hobi}</span></div>
                            <div class="item"><span class="label">Cita-Cita:</span> <span class="value">${santri.cita_cita}</span></div>
                            <div class="item"><span class="label">No. HP:</span> <span class="value">${santri.no_hp_santri}</span></div>
                        </div>
                    </div>
                    
                    <div class="section">
                        <h3>ALAMAT & DOMISILI SANTRI</h3>
                        <div class="grid">
                            <div class="item"><span class="label">Alamat Jalan:</span> <span class="value">${santri.alamat_jalan}</span></div>
                            <div class="item"><span class="label">RT/RW:</span> <span class="value">${santri.rt}/${santri.rw}</span></div>
                            <div class="item"><span class="label">Kelurahan/Desa:</span> <span class="value">${santri.kelurahan}</span></div>
                            <div class="item"><span class="label">Kecamatan:</span> <span class="value">${santri.kecamatan}</span></div>
                            <div class="item"><span class="label">Kabupaten/Kota:</span> <span class="value">${santri.kabupaten_kota}</span></div>
                            <div class="item"><span class="label">Provinsi:</span> <span class="value">${santri.provinsi}</span></div>
                        </div>
                    </div>
                    
                    <div class="section">
                        <h3>DATA ORANG TUA & WALI</h3>
                        <div class="grid">
                            <div class="item"><span class="label">Nama Ayah:</span> <span class="value">${santri.nama_ayah}</span></div>
                            <div class="item"><span class="label">NIK Ayah:</span> <span class="value">${santri.nik_ayah}</span></div>
                            <div class="item"><span class="label">Pekerjaan Ayah:</span> <span class="value">${santri.pekerjaan_ayah}</span></div>
                            <div class="item"><span class="label">No. HP Ayah:</span> <span class="value">${santri.no_hp_ayah}</span></div>
                            <div class="item"><span class="label">Nama Ibu:</span> <span class="value">${santri.nama_ibu}</span></div>
                            <div class="item"><span class="label">NIK Ibu:</span> <span class="value">${santri.nik_ibu}</span></div>
                            <div class="item"><span class="label">Pekerjaan Ibu:</span> <span class="value">${santri.pekerjaan_ibu}</span></div>
                            <div class="item"><span class="label">No. HP Ibu:</span> <span class="value">${santri.no_hp_ibu}</span></div>
                            <div class="item"><span class="label">Nama Wali:</span> <span class="value">${santri.nama_wali}</span></div>
                            <div class="item"><span class="label">Pekerjaan Wali:</span> <span class="value">${santri.pekerjaan_wali}</span></div>
                        </div>
                    </div>
                    
                    <div class="section">
                        <h3>DATA PENDAFTARAN & SELEKSI</h3>
                        <div class="grid">
                            <div class="item"><span class="label">Jalur/Program:</span> <span class="value">${santri.jalur_program}</span></div>
                            <div class="item"><span class="label">Jenjang:</span> <span class="value">${santri.jenjang}</span></div>
                            <div class="item"><span class="label">Sekolah Asal:</span> <span class="value">${santri.sekolah_asal}</span></div>
                            <div class="item"><span class="label">NPSN Sekolah:</span> <span class="value">${santri.npsn_sekolah}</span></div>
                            <div class="item"><span class="label">Status:</span> <span class="value"><strong>${santri.status}</strong></span></div>
                            <div class="item"><span class="label">Gelombang:</span> <span class="value">${santri.gelombang}</span></div>
                            <div class="item"><span class="label">Nilai Ujian:</span> <span class="value">${santri.nilai_ujian}</span></div>
                            <div class="item"><span class="label">Tanggal Diterima:</span> <span class="value">${formatDate(santri.tanggal_diterima)}</span></div>
                        </div>
                    </div>
                    
                    <div class="footer">
                        <p>Dokumen ini dicetak secara otomatis dari Sistem Admin PSB AQBS</p>
                        <p>Dokumen sah dengan tanda tangan dan stempel yang berlaku</p>
                    </div>
                    
                    <div class="no-print" style="margin-top: 30px; text-align: center;">
                        <button onclick="window.print()" style="padding: 10px 20px; background: #002b49; color: white; border: none; cursor: pointer; margin-right: 10px;">Cetak Halaman</button>
                        <button onclick="window.close()" style="padding: 10px 20px; background: #666; color: white; border: none; cursor: pointer;">Tutup</button>
                    </div>
                    
                    <script>
                        window.onload = function() {
                            // Auto-focus untuk cetak
                            window.focus();
                        };
                    <\/script>
                </body>
                </html>
            `);
            printWindow.document.close();
            
            toastMessage.textContent = `Membuka halaman cetak untuk ${santri.nama}`;
            successToast.show();
        }

        // Update pagination info
        function updatePaginationInfo(startIndex, endIndex) {
            const totalItems = filteredData.length;
            
            if (itemsPerPage === 'all') {
                paginationInfo.textContent = `Menampilkan semua data (${totalItems} data)`;
                paginationContainer.classList.add('pagination-all');
            } else {
                paginationInfo.textContent = `Menampilkan ${startIndex + 1}-${endIndex} dari ${totalItems} data`;
                paginationContainer.classList.remove('pagination-all');
            }
        }

        // Render pagination
        function renderPagination() {
            const totalItems = filteredData.length;
            
            if (itemsPerPage === 'all' || totalItems <= itemsPerPage) {
                pageNumbers.innerHTML = '';
                firstPageBtn.disabled = true;
                prevPageBtn.disabled = true;
                nextPageBtn.disabled = true;
                lastPageBtn.disabled = true;
                return;
            }
            
            const totalPages = Math.ceil(totalItems / itemsPerPage);
            pageNumbers.innerHTML = '';
            
            let startPage = Math.max(1, currentPage - 2);
            let endPage = Math.min(totalPages, currentPage + 2);
            
            if (currentPage <= 3) {
                endPage = Math.min(5, totalPages);
            }
            if (currentPage >= totalPages - 2) {
                startPage = Math.max(1, totalPages - 4);
            }
            
            for (let i = startPage; i <= endPage; i++) {
                const pageBtn = document.createElement('button');
                pageBtn.className = 'btn-pagination';
                pageBtn.textContent = i;
                if (i === currentPage) {
                    pageBtn.classList.add('active');
                }
                pageBtn.addEventListener('click', () => {
                    currentPage = i;
                    renderCurrentPage();
                    renderPagination();
                    updatePaginationButtons(totalPages);
                });
                pageNumbers.appendChild(pageBtn);
            }
            
            updatePaginationButtons(totalPages);
        }

        // Update pagination buttons
        function updatePaginationButtons(totalPages) {
            firstPageBtn.disabled = currentPage === 1;
            prevPageBtn.disabled = currentPage === 1;
            nextPageBtn.disabled = currentPage === totalPages;
            lastPageBtn.disabled = currentPage === totalPages;
            
            firstPageBtn.onclick = () => {
                if (currentPage !== 1) {
                    currentPage = 1;
                    renderCurrentPage();
                    renderPagination();
                }
            };
            
            prevPageBtn.onclick = () => {
                if (currentPage > 1) {
                    currentPage--;
                    renderCurrentPage();
                    renderPagination();
                }
            };
            
            nextPageBtn.onclick = () => {
                if (currentPage < totalPages) {
                    currentPage++;
                    renderCurrentPage();
                    renderPagination();
                }
            };
            
            lastPageBtn.onclick = () => {
                if (currentPage !== totalPages) {
                    currentPage = totalPages;
                    renderCurrentPage();
                    renderPagination();
                }
            };
        }

        // Export to Excel
        function exportToExcel(dataRange) {
            let dataToExport = dataRange === 'current' ? currentPageData : filteredData;
            
            const excelData = dataToExport.map(item => ({
                'No.': item.id,
                'No. Pendaftaran': item.nomor_pendaftaran,
                'Nama Lengkap': item.nama,
                'NISN': item.nisn,
                'NIK': item.nik_santri,
                'Tempat Lahir': item.tempat_lahir_santri,
                'Tanggal Lahir': formatDate(item.tanggal_lahir_santri),
                'Jenis Kelamin': item.jenis_kelamin,
                'Agama': item.agama_santri,
                'Hobi': item.hobi,
                'Cita-Cita': item.cita_cita,
                'Alamat Jalan': item.alamat_jalan,
                'RT': item.rt,
                'RW': item.rw,
                'Kelurahan/Desa': item.kelurahan,
                'Kecamatan': item.kecamatan,
                'Kabupaten/Kota': item.kabupaten_kota,
                'Provinsi': item.provinsi,
                'No HP Santri': item.no_hp_santri,
                'Nama Ayah': item.nama_ayah,
                'NIK Ayah': item.nik_ayah,
                'Tempat Lahir Ayah': item.tempat_lahir_ayah,
                'Tanggal Lahir Ayah': formatDate(item.tanggal_lahir_ayah),
                'Agama Ayah': item.agama_ayah,
                'Status Ayah': item.status_ayah,
                'Pendidikan Ayah': item.pendidikan_ayah,
                'Pekerjaan Ayah': item.pekerjaan_ayah,
                'Penghasilan Ayah': item.penghasilan_ayah,
                'No HP Ayah': item.no_hp_ayah,
                'Alamat Ayah': item.alamat_ayah,
                'Nama Ibu': item.nama_ibu,
                'NIK Ibu': item.nik_ibu,
                'Tempat Lahir Ibu': item.tempat_lahir_ibu,
                'Tanggal Lahir Ibu': formatDate(item.tanggal_lahir_ibu),
                'Agama Ibu': item.agama_ibu,
                'Status Ibu': item.status_ibu,
                'Pendidikan Ibu': item.pendidikan_ibu,
                'Pekerjaan Ibu': item.pekerjaan_ibu,
                'Penghasilan Ibu': item.penghasilan_ibu,
                'No HP Ibu': item.no_hp_ibu,
                'Alamat Ibu': item.alamat_ibu,
                'Nama Wali': item.nama_wali,
                'NIK Wali': item.nik_wali,
                'Tempat Lahir Wali': item.tempat_lahir_wali,
                'Tanggal Lahir Wali': formatDate(item.tanggal_lahir_wali),
                'Agama Wali': item.agama_wali,
                'Status Wali': item.status_wali,
                'Pendidikan Wali': item.pendidikan_wali,
                'Pekerjaan Wali': item.pekerjaan_wali,
                'Penghasilan Wali': item.penghasilan_wali,
                'No HP Wali': item.no_hp_wali,
                'Alamat Wali': item.alamat_wali,
                'Jenis Pendaftaran': item.jenis_pendaftaran,
                'Jalur/Program': item.jalur_program,
                'Jenjang': item.jenjang,
                'Sekolah Asal': item.sekolah_asal,
                'NPSN Sekolah': item.npsn_sekolah,
                'Status Penerimaan': item.status,
                'Tahun Ajaran': item.tahun,
                'Gelombang': item.gelombang,
                'Tanggal Diterima': formatDate(item.tanggal_diterima),
                'Nilai Ujian': item.nilai_ujian
            }));
            
            const ws = XLSX.utils.json_to_sheet(excelData);
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "Data Santri Diterima");
            
            XLSX.writeFile(wb, `Data_Lengkap_Santri_Diterima_${new Date().toISOString().split('T')[0]}.xlsx`);
            
            toastMessage.textContent = `Berhasil export ${dataToExport.length} data lengkap ke Excel`;
            successToast.show();
        }

        // Export to PDF
        function exportToPdf(dataRange) {
            let dataToExport = dataRange === 'current' ? currentPageData : filteredData;
            
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF('landscape', 'mm', 'a4');
            
            doc.setFontSize(14);
            doc.setTextColor(0, 43, 73);
            doc.text('DATA SANTRI DITERIMA - PSB AQBS', 20, 20);
            
            doc.setFontSize(10);
            doc.setTextColor(100, 100, 100);
            doc.text('AISYIYAH QURANIC BOARDING SCHOOL PONOROGO', 20, 27);
            doc.text(`Tahun Pelajaran: ${document.getElementById('filterTahun').value} | Total Data: ${dataToExport.length}`, 20, 32);
            
            const tableData = dataToExport.map(item => [
                item.id,
                truncateText(item.nama, 20),
                item.nisn,
                item.jenjang,
                item.jalur_program,
                item.sekolah_asal,
                item.status
            ]);
            
            doc.autoTable({
                head: [['No', 'Nama', 'NISN', 'Jenjang', 'Jalur', 'Sekolah Asal', 'Status']],
                body: tableData,
                startY: 40,
                theme: 'grid',
                headStyles: {
                    fillColor: [0, 43, 73],
                    textColor: [255, 255, 255],
                    fontStyle: 'bold'
                },
                alternateRowStyles: {
                    fillColor: [248, 250, 252]
                },
                margin: { horizontal: 15 },
                styles: {
                    fontSize: 7,
                    cellPadding: 2
                }
            });
            
            const pageCount = doc.internal.getNumberOfPages();
            for (let i = 1; i <= pageCount; i++) {
                doc.setPage(i);
                doc.setFontSize(8);
                doc.setTextColor(150, 150, 150);
                doc.text(
                    `Dicetak pada: ${new Date().toLocaleDateString('id-ID')} | Halaman ${i} dari ${pageCount}`,
                    15,
                    doc.internal.pageSize.height - 10
                );
            }
            
            doc.save(`Data_Santri_Diterima_${new Date().toISOString().split('T')[0]}.pdf`);
            
            toastMessage.textContent = `Berhasil export ${dataToExport.length} data ke PDF`;
            successToast.show();
        }

        // Handle export
        function handleExport() {
            const dataRange = exportDataRange.value;
            const format = document.querySelector('input[name="exportFormat"]:checked').value;
            
            if (format === 'excel') {
                exportToExcel(dataRange);
            } else {
                exportToPdf(dataRange);
            }
        }

        // Initialize event listeners
        function initEventListeners() {
            toggleBtn.addEventListener('click', () => {
                sidebar.classList.toggle('show');
                overlay.classList.toggle('show');
            });

            overlay.addEventListener('click', () => {
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
            });

            applyFilterBtn.addEventListener('click', applyFilters);

            itemsPerPageSelect.addEventListener('change', function() {
                const value = this.value;
                itemsPerPage = value === 'all' ? 'all' : parseInt(value);
                currentPage = 1;
                applyFilters();
            });

            exportExcelBtn.addEventListener('click', () => {
                exportModal.show();
            });

            exportPdfBtn.addEventListener('click', () => {
                document.getElementById('formatPdf').checked = true;
                exportModal.show();
            });

            exportConfirm.addEventListener('click', () => {
                handleExport();
                exportModal.hide();
            });

            quickFilterButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    quickFilterButtons.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    applyFilters();
                });
            });

            document.getElementById('filterSearch').addEventListener('input', () => {
                clearTimeout(window.searchTimeout);
                window.searchTimeout = setTimeout(() => {
                    applyFilters();
                }, 500);
            });

            document.getElementById('filterTahun').addEventListener('change', applyFilters);
            document.getElementById('filterGelombang').addEventListener('change', applyFilters);

            // Sort event listeners
            document.querySelectorAll('.sortable').forEach(th => {
                th.addEventListener('click', function() {
                    const sortField = this.dataset.sort;
                    
                    if (currentSortField === sortField) {
                        currentSortOrder = currentSortOrder === 'asc' ? 'desc' : 'asc';
                    } else {
                        currentSortField = sortField;
                        currentSortOrder = 'asc';
                    }
                    
                    applyFilters();
                });
            });

            // Edit button in detail modal
            btnEditData.addEventListener('click', function() {
                if (currentDetailData) {
                    detailModal.hide();
                    showEditModal(currentDetailData);
                }
            });

            // Print button in detail modal
            btnPrintDetail.addEventListener('click', function() {
                if (currentDetailData) {
                    printDetailData(currentDetailData);
                }
            });

            // Save button in edit modal
            btnSaveData.addEventListener('click', saveAllEdits);
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            initEventListeners();
            applyFilters();
            
            document.getElementById('filterTahun').value = '2026/2027';
            document.getElementById('filterGelombang').value = 'Gelombang 2';
        });
    </script>
</body>
</html>