<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa Daftar Ulang - Admin PSB AQBS</title>
    
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
        
        .status-proses { 
            background: #fef3c7; 
            color: #92400e; 
            font-size: 0.6rem; 
            font-weight: 800; 
            padding: 3px 6px; 
            border-radius: 4px; 
            text-transform: uppercase; 
            border: 1px solid #fde68a;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        
        .status-selesai { 
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
        
        /* Export Loading Overlay */
        .export-loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 2000;
            color: white;
            text-align: center;
        }

        .export-loading-spinner {
            width: 50px;
            height: 50px;
            border: 3px solid #f3f3f3;
            border-top: 3px solid var(--orange-primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 20px;
        }

        .export-loading-text {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .export-loading-subtext {
            font-size: 0.9rem;
            opacity: 0.8;
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
            .status-proses,
            .status-selesai,
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
                    <small class="opacity-75 fw-medium" style="font-size: 0.6rem;">Siswa Daftar Ulang</small>
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
                <li><a href="#" class="active">Siswa Daftar Ulang</a></li>
                <li><a href="#">Ditolak</a></li>
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
                <div class="info-icon text-success" style="background:#f0fdf4"><i class="fas fa-user-check"></i></div>
                <div>
                    <span class="info-bar-label">Selesai DU</span>
                    <span class="info-bar-value text-success">47 Santri</span>
                </div>
            </div>
            <div class="info-bar-item">
                <div class="info-icon text-warning" style="background:#fffbeb"><i class="fas fa-clock"></i></div>
                <div>
                    <span class="info-bar-label">Proses DU</span>
                    <span class="info-bar-value text-warning">58 Santri</span>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <h4 class="fw-bold" style="color: var(--navy-primary);">Data Siswa Daftar Ulang</h4>
            <p class="text-muted small">Monitoring proses pendaftaran ulang santriwati yang telah diterima.</p>
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
                <i class="fas fa-layer-group"></i> Semua Data
            </button>
            <button class="quick-filter-btn" data-filter="proses">
                <i class="fas fa-clock"></i> Proses DU
            </button>
            <button class="quick-filter-btn" data-filter="selesai">
                <i class="fas fa-check-circle"></i> Selesai DU
            </button>
            <button class="quick-filter-btn" data-filter="smp">
                <i class="fas fa-school"></i> SMP
            </button>
            <button class="quick-filter-btn" data-filter="sma">
                <i class="fas fa-university"></i> SMA
            </button>
        </div>

        <div class="filter-card">
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="small fw-bold mb-1">Tahun Ajaran</label>
                    <select class="form-select form-select-sm" id="filterTahun">
                        <option>2026/2027</option>
                        <option>2025/2026</option>
                        <option>2024/2025</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="small fw-bold mb-1">Gelombang</label>
                    <select class="form-select form-select-sm" id="filterGelombang">
                        <option>Semua Gelombang</option>
                        <option>Gelombang 1</option>
                        <option selected>Gelombang 2</option>
                        <option>Gelombang 3</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="small fw-bold mb-1">Jalur/Program</label>
                    <select class="form-select form-select-sm" id="filterJalur">
                        <option value="">Semua Jalur</option>
                        <option>Mandiri</option>
                        <option>Kader</option>
                        <option>Rekomendasi</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="small fw-bold mb-1">Berdasarkan</label>
                    <select class="form-select form-select-sm" id="filterSortBy">
                        <option value="tanggal">Tanggal Daftar Ulang</option>
                        <option value="nama">Nama Santri</option>
                        <option value="jenjang">Jenjang</option>
                    </select>
                </div>
            </div>
            <div class="row g-3 mt-2">
                <div class="col-md-9">
                    <label class="small fw-bold mb-1">Pencarian</label>
                    <input type="text" class="form-control form-control-sm" id="filterSearch" placeholder="Cari Nama / NISN / No. Pendaftaran...">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button class="btn-filter w-100" id="applyFilterBtn" style="background: linear-gradient(135deg, var(--orange-primary), #e67100); color: white; border: none; padding: 8px 16px; border-radius: 8px; font-weight: 600; font-size: 0.85rem;">
                        FILTER
                    </button>
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
                            <th class="sortable" data-sort="status">Status DU</th>
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
                        <span id="detailTitle">Detail Daftar Ulang Santri</span>
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
                        <span id="editTitle">Edit Data Daftar Ulang Santri</span>
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
                        <span id="exportInfoText">Excel: 65+ kolom lengkap | PDF: 10 kolom penting</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-success" id="exportConfirm">Export Data</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading Export Overlay -->
    <div class="export-loading-overlay" id="exportLoadingOverlay" style="display: none;">
        <div class="export-loading-spinner"></div>
        <div class="export-loading-text" id="exportLoadingText">Menyiapkan data untuk export...</div>
        <div class="export-loading-subtext" id="exportLoadingSubtext">Mohon tunggu sebentar</div>
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
        const exportLoadingOverlay = document.getElementById('exportLoadingOverlay');
        const exportLoadingText = document.getElementById('exportLoadingText');
        const exportLoadingSubtext = document.getElementById('exportLoadingSubtext');
        const exportInfoText = document.getElementById('exportInfoText');

        // Current state
        let currentDetailData = null;
        let currentSortField = 'id';
        let currentSortOrder = 'asc';
        let currentPage = 1;
        let itemsPerPage = 50;
        let filteredData = [];
        let currentPageData = [];

        // Generate sample data untuk daftar ulang
        function generateSampleData(count) {
            const data = [];
            const names = ["ANNISA RAHMAWATI", "SITI FATIMAH", "NURUL HUDA", "FATIMAH ZAHRA", "ZAHRA NABILA",
                          "AMELIA PUTRI", "BINTANG NURAINI", "CANTIKA SARI", "DINDA AYU", "ELISA MAHARANI"];
            const tempatLahir = ["Ponorogo", "Madiun", "Surabaya", "Malang", "Jakarta", "Bandung", "Yogyakarta"];
            const agama = ["Islam", "Kristen", "Katolik", "Hindu", "Buddha"];
            const hobi = ["Membaca", "Menulis", "Olahraga", "Musik", "Melukis", "Memasak"];
            const cita = ["Dokter", "Guru", "Pengusaha", "Programmer", "Desainer", "Pilot"];
            const pekerjaan = ["Pegawai Negeri", "Wiraswasta", "Pengusaha", "Dosen", "Dokter", "Guru", "Karyawan Swasta", "Petani"];
            const pendidikan = ["SD", "SMP", "SMA", "D3", "S1", "S2", "S3"];
            const statusKeluarga = ["Masih Hidup", "Meninggal", "Cerai"];
            const jalur = ["Mandiri", "Kader", "Rekomendasi"];
            const sekolahAsal = ["SMP Negeri 1 Ponorogo", "SMP Negeri 2 Ponorogo", "SMP Muhammadiyah 1", 
                                "SMA Negeri 1 Ponorogo", "SMA Negeri 2 Ponorogo", "SMA Islam Terpadu"];
            const statusDU = ["Proses", "Selesai"];

            for (let i = 1; i <= count; i++) {
                const name = names[i % names.length] + " " + (i < 10 ? "0" + i : i);
                const jenjang = i % 2 === 0 ? "SMP" : "SMA";
                const jenisKelamin = i % 2 === 0 ? "Perempuan" : "Laki-laki";
                const status = statusDU[i % 2];
                const tanggalDaftarUlang = `2026-0${(i % 3 + 1)}-${(i % 28 + 1).toString().padStart(2, '0')}`;
                
                data.push({
                    id: i,
                    // Data Santri
                    nama: name,
                    nisn: "00" + Math.floor(10000000 + Math.random() * 90000000),
                    nik_santri: "35" + Math.floor(10000000000000 + Math.random() * 90000000000000),
                    tempat_lahir_santri: tempatLahir[i % tempatLahir.length],
                    tanggal_lahir_santri: `200${jenjang === "SMP" ? 8 : 6}-${(i % 12 + 1).toString().padStart(2, '0')}-${(i % 28 + 1).toString().padStart(2, '0')}`,
                    jenis_kelamin: jenisKelamin,
                    agama_santri: agama[i % agama.length],
                    hobi: hobi[i % hobi.length],
                    cita_cita: cita[i % cita.length],
                    
                    // Alamat Santri
                    alamat_jalan: `Jl. Contoh No. ${i}`,
                    rt: (i % 10 + 1).toString(),
                    rw: (i % 5 + 1).toString(),
                    kelurahan: "Kelurahan " + (i % 5 + 1),
                    kecamatan: "Kecamatan " + (i % 3 + 1),
                    kabupaten_kota: "Ponorogo",
                    provinsi: "Jawa Timur",
                    no_hp_santri: "08" + Math.floor(1000000000 + Math.random() * 9000000000),
                    
                    // Data Ayah
                    nama_ayah: `Ayah ${name.split(' ')[0]}`,
                    nik_ayah: "35" + Math.floor(10000000000000 + Math.random() * 90000000000000),
                    tempat_lahir_ayah: tempatLahir[(i + 1) % tempatLahir.length],
                    tanggal_lahir_ayah: `197${i % 10}-${((i + 2) % 12 + 1).toString().padStart(2, '0')}-${((i + 3) % 28 + 1).toString().padStart(2, '0')}`,
                    agama_ayah: agama[i % agama.length],
                    status_ayah: statusKeluarga[i % statusKeluarga.length],
                    pendidikan_ayah: pendidikan[(i + 2) % pendidikan.length],
                    pekerjaan_ayah: pekerjaan[i % pekerjaan.length],
                    penghasilan_ayah: Math.floor(3000000 + Math.random() * 15000000),
                    no_hp_ayah: "08" + Math.floor(1000000000 + Math.random() * 9000000000),
                    alamat_ayah: `Jl. Ayah No. ${i}`,
                    
                    // Data Ibu
                    nama_ibu: `Ibu ${name.split(' ')[0]}`,
                    nik_ibu: "35" + Math.floor(10000000000000 + Math.random() * 90000000000000),
                    tempat_lahir_ibu: tempatLahir[(i + 2) % tempatLahir.length],
                    tanggal_lahir_ibu: `198${i % 10}-${((i + 3) % 12 + 1).toString().padStart(2, '0')}-${((i + 4) % 28 + 1).toString().padStart(2, '0')}`,
                    agama_ibu: agama[i % agama.length],
                    status_ibu: statusKeluarga[(i + 1) % statusKeluarga.length],
                    pendidikan_ibu: pendidikan[(i + 1) % pendidikan.length],
                    pekerjaan_ibu: pekerjaan[(i + 1) % pekerjaan.length],
                    penghasilan_ibu: Math.floor(2000000 + Math.random() * 8000000),
                    no_hp_ibu: "08" + Math.floor(1000000000 + Math.random() * 9000000000),
                    alamat_ibu: `Jl. Ibu No. ${i}`,
                    
                    // Data Wali
                    nama_wali: `Wali ${name.split(' ')[0]}`,
                    nik_wali: "35" + Math.floor(10000000000000 + Math.random() * 90000000000000),
                    tempat_lahir_wali: tempatLahir[(i + 3) % tempatLahir.length],
                    tanggal_lahir_wali: `197${(i + 2) % 10}-${((i + 4) % 12 + 1).toString().padStart(2, '0')}-${((i + 5) % 28 + 1).toString().padStart(2, '0')}`,
                    agama_wali: agama[(i + 1) % agama.length],
                    status_wali: statusKeluarga[(i + 2) % statusKeluarga.length],
                    pendidikan_wali: pendidikan[(i + 3) % pendidikan.length],
                    pekerjaan_wali: pekerjaan[(i + 2) % pekerjaan.length],
                    penghasilan_wali: Math.floor(4000000 + Math.random() * 12000000),
                    no_hp_wali: "08" + Math.floor(1000000000 + Math.random() * 9000000000),
                    alamat_wali: `Jl. Wali No. ${i}`,
                    
                    // Data Pendaftaran
                    jenis_pendaftaran: "Baru",
                    nomor_pendaftaran: "PSB" + (2026000000 + i),
                    jalur_program: jalur[i % jalur.length],
                    sekolah_asal: sekolahAsal[i % sekolahAsal.length],
                    npsn_sekolah: "20" + Math.floor(100000 + Math.random() * 900000),
                    
                    // Data Daftar Ulang
                    status_daftar_ulang: status,
                    tanggal_daftar_ulang: tanggalDaftarUlang,
                    pembayaran_daftar_ulang: status === "Selesai" ? "Lunas" : "Belum Lunas",
                    nominal_daftar_ulang: 1500000,
                    bukti_pembayaran: status === "Selesai" ? "Tersedia" : "Belum Upload",
                    berkas_daftar_ulang: status === "Selesai" ? "Lengkap" : "Sedang Diproses",
                    catatan_daftar_ulang: status === "Selesai" ? "Berkas lengkap, siap masuk asrama" : "Menunggu upload berkas tambahan",
                    
                    // Additional fields for filtering
                    jenjang: jenjang,
                    status: status,
                    tahun: "2026/2027",
                    gelombang: i % 3 === 0 ? "Gelombang 1" : i % 3 === 1 ? "Gelombang 2" : "Gelombang 3",
                    nilai_ujian: (75 + Math.random() * 15).toFixed(1)
                });
            }
            return data;
        }

        // Initial data
        let daftarUlangData = generateSampleData(105);

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
                    case 'status':
                        valueA = a.status;
                        valueB = b.status;
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
            const jalur = document.getElementById('filterJalur').value;
            const sortBy = document.getElementById('filterSortBy').value;
            const search = document.getElementById('filterSearch').value.toLowerCase();
            const quickFilter = document.querySelector('.quick-filter-btn.active')?.dataset.filter || 'all';

            filteredData = daftarUlangData.filter(item => {
                if (tahun && !item.tahun.includes(tahun.split('/')[0])) return false;
                if (gelombang !== "Semua Gelombang" && item.gelombang !== gelombang) return false;
                if (jalur && item.jalur_program !== jalur) return false;
                if (search && !item.nama.toLowerCase().includes(search) && 
                    !item.nisn.includes(search) && 
                    !item.nomor_pendaftaran.includes(search)) return false;
                
                switch(quickFilter) {
                    case 'proses':
                        if (item.status !== 'Proses') return false;
                        break;
                    case 'selesai':
                        if (item.status !== 'Selesai') return false;
                        break;
                    case 'smp':
                        if (item.jenjang !== 'SMP') return false;
                        break;
                    case 'sma':
                        if (item.jenjang !== 'SMA') return false;
                        break;
                    case 'all':
                    default:
                        break;
                }
                
                return true;
            });

            // Sort data berdasarkan pilihan
            if (sortBy === 'nama') {
                filteredData.sort((a, b) => a.nama.localeCompare(b.nama));
            } else if (sortBy === 'jenjang') {
                filteredData.sort((a, b) => a.jenjang.localeCompare(b.jenjang));
            } else if (sortBy === 'tanggal') {
                filteredData.sort((a, b) => new Date(b.tanggal_daftar_ulang) - new Date(a.tanggal_daftar_ulang));
            }

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

                if (tahun || gelombang !== "Semua Gelombang" || jalur || search || quickFilter !== 'all') {
                    toastMessage.textContent = `Menampilkan ${filteredData.length} siswa daftar ulang`;
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
                const statusBadge = item.status === 'Proses' 
                    ? `<span class="status-proses"><i class="fas fa-clock"></i> ${item.status}</span>`
                    : `<span class="status-selesai"><i class="fas fa-check-circle"></i> ${item.status}</span>`;

                row.innerHTML = `
                    <!-- No - Sticky -->
                    <td class="col-no-sticky">${rowNumber}</td>
                    
                    <!-- Nama Lengkap - Sticky -->
                    <td class="col-nama-sticky nama-cell">
                        <span class="truncate-text" title="${item.nama}">${truncateText(item.nama, 25)}</span>
                        <div class="small text-muted" style="font-size: 0.7rem;">${item.nomor_pendaftaran}</div>
                    </td>
                    
                    <!-- NISN -->
                    <td>${item.nisn}</td>
                    
                    <!-- Jenjang -->
                    <td><span class="jenjang-badge">${item.jenjang}</span></td>
                    
                    <!-- Status DU -->
                    <td>${statusBadge}</td>
                    
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
                    const santri = daftarUlangData.find(item => item.id === id);
                    if (santri) {
                        showDetailModal(santri);
                    }
                });
            });

            document.querySelectorAll('.btn-edit').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = parseInt(this.dataset.id);
                    const santri = daftarUlangData.find(item => item.id === id);
                    if (santri) {
                        showEditModal(santri);
                    }
                });
            });

            document.querySelectorAll('.btn-print').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = parseInt(this.dataset.id);
                    const santri = daftarUlangData.find(item => item.id === id);
                    if (santri) {
                        printDetailData(santri);
                    }
                });
            });
        }

        // Show detail modal - Tampilkan semua data lengkap
        function showDetailModal(santri) {
            currentDetailData = santri;
            
            const statusBadge = santri.status === 'Proses' 
                ? `<span class="status-proses"><i class="fas fa-clock"></i> ${santri.status}</span>`
                : `<span class="status-selesai"><i class="fas fa-check-circle"></i> ${santri.status}</span>`;
            
            const pembayaranBadge = santri.pembayaran_daftar_ulang === 'Lunas'
                ? `<span class="status-selesai"><i class="fas fa-check-circle"></i> Lunas</span>`
                : `<span class="status-proses"><i class="fas fa-clock"></i> Belum Lunas</span>`;
            
            const berkasBadge = santri.berkas_daftar_ulang === 'Lengkap'
                ? `<span class="status-selesai"><i class="fas fa-check-circle"></i> Lengkap</span>`
                : `<span class="status-proses"><i class="fas fa-clock"></i> ${santri.berkas_daftar_ulang}</span>`;
            
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
                                <div class="detail-label">No. HP Santri</div>
                                <div class="detail-value">${santri.no_hp_santri}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Data Daftar Ulang -->
                    <div class="detail-section">
                        <div class="detail-section-title">
                            <i class="fas fa-clipboard-check"></i> DATA DAFTAR ULANG
                        </div>
                        <div class="detail-grid">
                            <div class="detail-item">
                                <div class="detail-label">Status Daftar Ulang</div>
                                <div class="detail-value">${statusBadge}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Tanggal Daftar Ulang</div>
                                <div class="detail-value">${formatDate(santri.tanggal_daftar_ulang)}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Status Pembayaran</div>
                                <div class="detail-value">${pembayaranBadge}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Nominal Daftar Ulang</div>
                                <div class="detail-value">${formatCurrency(santri.nominal_daftar_ulang)}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Status Berkas</div>
                                <div class="detail-value">${berkasBadge}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Catatan</div>
                                <div class="detail-value">${santri.catatan_daftar_ulang}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Data Pendaftaran -->
                    <div class="detail-section">
                        <div class="detail-section-title">
                            <i class="fas fa-file-signature"></i> DATA PENDAFTARAN
                        </div>
                        <div class="detail-grid">
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
                                <div class="detail-label">Tahun Ajaran</div>
                                <div class="detail-value">${santri.tahun}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Gelombang</div>
                                <div class="detail-value">${santri.gelombang}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Nilai Ujian</div>
                                <div class="detail-value">${santri.nilai_ujian}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Data Orang Tua -->
                    <div class="detail-section">
                        <div class="detail-section-title">
                            <i class="fas fa-users"></i> DATA ORANG TUA
                        </div>
                        <div class="detail-grid">
                            <div class="detail-item">
                                <div class="detail-label">Nama Ayah</div>
                                <div class="detail-value">${santri.nama_ayah}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Pekerjaan Ayah</div>
                                <div class="detail-value">${santri.pekerjaan_ayah}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">No. HP Ayah</div>
                                <div class="detail-value">${santri.no_hp_ayah}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Nama Ibu</div>
                                <div class="detail-value">${santri.nama_ibu}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Pekerjaan Ibu</div>
                                <div class="detail-value">${santri.pekerjaan_ibu}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">No. HP Ibu</div>
                                <div class="detail-value">${santri.no_hp_ibu}</div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            detailTitle.textContent = `Detail Daftar Ulang: ${santri.nama}`;
            
            detailModal.show();
        }

        // Show edit modal
        function showEditModal(santri) {
            currentDetailData = santri;
            
            const modalBody = document.getElementById('editModalBody');
            modalBody.innerHTML = `
                <form id="editForm">
                    <div class="edit-form-section">
                        <div class="edit-form-section-title">
                            <i class="fas fa-user-graduate"></i> STATUS DAFTAR ULANG
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Nama Lengkap *</label>
                                    <input type="text" class="edit-form-input" id="editNama" value="${santri.nama}" required>
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Status Daftar Ulang</label>
                                    <select class="edit-form-input" id="editStatus">
                                        <option value="Proses" ${santri.status === 'Proses' ? 'selected' : ''}>Proses</option>
                                        <option value="Selesai" ${santri.status === 'Selesai' ? 'selected' : ''}>Selesai</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Status Pembayaran</label>
                                    <select class="edit-form-input" id="editPembayaran">
                                        <option value="Belum Lunas" ${santri.pembayaran_daftar_ulang === 'Belum Lunas' ? 'selected' : ''}>Belum Lunas</option>
                                        <option value="Lunas" ${santri.pembayaran_daftar_ulang === 'Lunas' ? 'selected' : ''}>Lunas</option>
                                    </select>
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Tanggal Daftar Ulang</label>
                                    <input type="date" class="edit-form-input" id="editTanggalDU" value="${santri.tanggal_daftar_ulang}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Status Berkas</label>
                                    <select class="edit-form-input" id="editBerkas">
                                        <option value="Sedang Diproses" ${santri.berkas_daftar_ulang === 'Sedang Diproses' ? 'selected' : ''}>Sedang Diproses</option>
                                        <option value="Lengkap" ${santri.berkas_daftar_ulang === 'Lengkap' ? 'selected' : ''}>Lengkap</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Nominal Daftar Ulang (Rp)</label>
                                    <input type="number" class="edit-form-input" id="editNominalDU" value="${santri.nominal_daftar_ulang}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Catatan Daftar Ulang</label>
                                    <textarea class="edit-form-input" id="editCatatanDU" rows="3">${santri.catatan_daftar_ulang}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="edit-form-section">
                        <div class="edit-form-section-title">
                            <i class="fas fa-file-signature"></i> DATA PENDAFTARAN
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Jenjang</label>
                                    <select class="edit-form-input" id="editJenjang">
                                        <option value="SMP" ${santri.jenjang === 'SMP' ? 'selected' : ''}>SMP</option>
                                        <option value="SMA" ${santri.jenjang === 'SMA' ? 'selected' : ''}>SMA</option>
                                    </select>
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Jalur/Program</label>
                                    <select class="edit-form-input" id="editJalur">
                                        <option value="Mandiri" ${santri.jalur_program === 'Mandiri' ? 'selected' : ''}>Mandiri</option>
                                        <option value="Kader" ${santri.jalur_program === 'Kader' ? 'selected' : ''}>Kader</option>
                                        <option value="Rekomendasi" ${santri.jalur_program === 'Rekomendasi' ? 'selected' : ''}>Rekomendasi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Gelombang</label>
                                    <select class="edit-form-input" id="editGelombang">
                                        <option ${santri.gelombang === 'Gelombang 1' ? 'selected' : ''}>Gelombang 1</option>
                                        <option ${santri.gelombang === 'Gelombang 2' ? 'selected' : ''}>Gelombang 2</option>
                                        <option ${santri.gelombang === 'Gelombang 3' ? 'selected' : ''}>Gelombang 3</option>
                                    </select>
                                </div>
                                <div class="edit-form-group">
                                    <label class="edit-form-label">Nilai Ujian</label>
                                    <input type="number" step="0.1" class="edit-form-input" id="editNilaiUjian" value="${santri.nilai_ujian}">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            `;
            
            editTitle.textContent = `Edit Data Daftar Ulang: ${santri.nama}`;
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
            
            // Update data
            currentDetailData.nama = nama;
            currentDetailData.status = document.getElementById('editStatus').value;
            currentDetailData.pembayaran_daftar_ulang = document.getElementById('editPembayaran').value;
            currentDetailData.tanggal_daftar_ulang = document.getElementById('editTanggalDU').value;
            currentDetailData.berkas_daftar_ulang = document.getElementById('editBerkas').value;
            currentDetailData.nominal_daftar_ulang = parseInt(document.getElementById('editNominalDU').value) || 0;
            currentDetailData.catatan_daftar_ulang = document.getElementById('editCatatanDU').value;
            currentDetailData.jenjang = document.getElementById('editJenjang').value;
            currentDetailData.jalur_program = document.getElementById('editJalur').value;
            currentDetailData.gelombang = document.getElementById('editGelombang').value;
            currentDetailData.nilai_ujian = parseFloat(document.getElementById('editNilaiUjian').value) || 0;
            
            // Update in main data
            const index = daftarUlangData.findIndex(item => item.id === currentDetailData.id);
            if (index !== -1) {
                daftarUlangData[index] = {...currentDetailData};
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
            
            toastMessage.textContent = `Data daftar ulang ${currentDetailData.nama} berhasil diperbarui`;
            successToast.show();
        }

        // Print detail data
        function printDetailData(santri) {
            const statusText = santri.status;
            const statusColor = santri.status === 'Selesai' ? '#166534' : '#92400e';
            
            const printWindow = window.open('', '_blank');
            printWindow.document.write(`
                <html>
                <head>
                    <title>Data Daftar Ulang - ${santri.nama}</title>
                    <style>
                        body { font-family: Arial, sans-serif; margin: 20px; }
                        .header { text-align: center; margin-bottom: 30px; border-bottom: 3px solid #002b49; padding-bottom: 20px; }
                        .header h1 { color: ${statusColor}; margin-bottom: 5px; font-size: 24px; }
                        .header h2 { color: #666; font-size: 18px; margin-bottom: 10px; }
                        .status-badge { display: inline-block; padding: 5px 15px; background: ${statusColor}; color: white; border-radius: 4px; font-weight: bold; margin-left: 10px; }
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
                        <h1>DATA DAFTAR ULANG - ${statusText} <span class="status-badge">${santri.status}</span></h1>
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
                        </div>
                    </div>
                    
                    <div class="section">
                        <h3>DATA DAFTAR ULANG</h3>
                        <div class="grid">
                            <div class="item"><span class="label">Status:</span> <span class="value"><strong style="color: ${statusColor}">${santri.status}</strong></span></div>
                            <div class="item"><span class="label">Tanggal Daftar Ulang:</span> <span class="value">${formatDate(santri.tanggal_daftar_ulang)}</span></div>
                            <div class="item"><span class="label">Status Pembayaran:</span> <span class="value">${santri.pembayaran_daftar_ulang}</span></div>
                            <div class="item"><span class="label">Nominal:</span> <span class="value">${formatCurrency(santri.nominal_daftar_ulang)}</span></div>
                            <div class="item"><span class="label">Status Berkas:</span> <span class="value">${santri.berkas_daftar_ulang}</span></div>
                            <div class="item"><span class="label">Catatan:</span> <span class="value">${santri.catatan_daftar_ulang}</span></div>
                        </div>
                    </div>
                    
                    <div class="section">
                        <h3>DATA PENDAFTARAN</h3>
                        <div class="grid">
                            <div class="item"><span class="label">Jenjang:</span> <span class="value">${santri.jenjang}</span></div>
                            <div class="item"><span class="label">Jalur/Program:</span> <span class="value">${santri.jalur_program}</span></div>
                            <div class="item"><span class="label">Sekolah Asal:</span> <span class="value">${santri.sekolah_asal}</span></div>
                            <div class="item"><span class="label">Tahun Ajaran:</span> <span class="value">${santri.tahun}</span></div>
                            <div class="item"><span class="label">Gelombang:</span> <span class="value">${santri.gelombang}</span></div>
                            <div class="item"><span class="label">Nilai Ujian:</span> <span class="value">${santri.nilai_ujian}</span></div>
                        </div>
                    </div>
                    
                    <div class="section">
                        <h3>DATA ORANG TUA</h3>
                        <div class="grid">
                            <div class="item"><span class="label">Nama Ayah:</span> <span class="value">${santri.nama_ayah}</span></div>
                            <div class="item"><span class="label">Pekerjaan Ayah:</span> <span class="value">${santri.pekerjaan_ayah}</span></div>
                            <div class="item"><span class="label">No. HP Ayah:</span> <span class="value">${santri.no_hp_ayah}</span></div>
                            <div class="item"><span class="label">Nama Ibu:</span> <span class="value">${santri.nama_ibu}</span></div>
                            <div class="item"><span class="label">Pekerjaan Ibu:</span> <span class="value">${santri.pekerjaan_ibu}</span></div>
                            <div class="item"><span class="label">No. HP Ibu:</span> <span class="value">${santri.no_hp_ibu}</span></div>
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

        // Show export loading
        function showExportLoading(text = "Menyiapkan data untuk export...") {
            exportLoadingText.textContent = text;
            exportLoadingOverlay.style.display = 'flex';
        }

        // Hide export loading
        function hideExportLoading() {
            exportLoadingOverlay.style.display = 'none';
        }

        // Export to Excel dengan 65+ kolom lengkap
        function exportToExcel(dataRange) {
            showExportLoading("Menyiapkan data Excel...");
            
            let dataToExport = dataRange === 'current' ? currentPageData : filteredData;
            
            // Siapkan data dengan SEMUA 65+ kolom
            const excelData = dataToExport.map(item => ({
                // Kolom 1-10: Identitas Santri
                'NO': item.id,
                'NO_PENDAFTARAN': item.nomor_pendaftaran,
                'NAMA_LENGKAP': item.nama,
                'NISN': item.nisn,
                'NIK': item.nik_santri,
                'TEMPAT_LAHIR': item.tempat_lahir_santri,
                'TANGGAL_LAHIR': formatDate(item.tanggal_lahir_santri),
                'JENIS_KELAMIN': item.jenis_kelamin,
                'AGAMA': item.agama_santri,
                'HOBI': item.hobi,
                
                // Kolom 11-20: Cita-cita & Kontak
                'CITA_CITA': item.cita_cita,
                'NO_HP_SANTRI': item.no_hp_santri,
                'ALAMAT_JALAN': item.alamat_jalan,
                'RT': item.rt,
                'RW': item.rw,
                'KELURAHAN': item.kelurahan,
                'KECAMATAN': item.kecamatan,
                'KABUPATEN_KOTA': item.kabupaten_kota,
                'PROVINSI': item.provinsi,
                
                // Kolom 21-30: Data Ayah
                'NAMA_AYAH': item.nama_ayah,
                'NIK_AYAH': item.nik_ayah,
                'TEMPAT_LAHIR_AYAH': item.tempat_lahir_ayah,
                'TANGGAL_LAHIR_AYAH': formatDate(item.tanggal_lahir_ayah),
                'AGAMA_AYAH': item.agama_ayah,
                'STATUS_AYAH': item.status_ayah,
                'PENDIDIKAN_AYAH': item.pendidikan_ayah,
                'PEKERJAAN_AYAH': item.pekerjaan_ayah,
                'PENGHASILAN_AYAH': item.penghasilan_ayah,
                'NO_HP_AYAH': item.no_hp_ayah,
                
                // Kolom 31-40: Data Ibu
                'NAMA_IBU': item.nama_ibu,
                'NIK_IBU': item.nik_ibu,
                'TEMPAT_LAHIR_IBU': item.tempat_lahir_ibu,
                'TANGGAL_LAHIR_IBU': formatDate(item.tanggal_lahir_ibu),
                'AGAMA_IBU': item.agama_ibu,
                'STATUS_IBU': item.status_ibu,
                'PENDIDIKAN_IBU': item.pendidikan_ibu,
                'PEKERJAAN_IBU': item.pekerjaan_ibu,
                'PENGHASILAN_IBU': item.penghasilan_ibu,
                'NO_HP_IBU': item.no_hp_ibu,
                
                // Kolom 41-50: Data Wali
                'NAMA_WALI': item.nama_wali,
                'NIK_WALI': item.nik_wali,
                'TEMPAT_LAHIR_WALI': item.tempat_lahir_wali,
                'TANGGAL_LAHIR_WALI': formatDate(item.tanggal_lahir_wali),
                'AGAMA_WALI': item.agama_wali,
                'STATUS_WALI': item.status_wali,
                'PENDIDIKAN_WALI': item.pendidikan_wali,
                'PEKERJAAN_WALI': item.pekerjaan_wali,
                'PENGHASILAN_WALI': item.penghasilan_wali,
                'NO_HP_WALI': item.no_hp_wali,
                
                // Kolom 51-55: Data Pendaftaran
                'JENIS_PENDAFTARAN': item.jenis_pendaftaran,
                'JALUR_PROGRAM': item.jalur_program,
                'JENJANG': item.jenjang,
                'SEKOLAH_ASAL': item.sekolah_asal,
                'NPSN_SEKOLAH': item.npsn_sekolah,
                
                // Kolom 56-60: Data Daftar Ulang
                'STATUS_DAFTAR_ULANG': item.status_daftar_ulang,
                'TANGGAL_DAFTAR_ULANG': formatDate(item.tanggal_daftar_ulang),
                'STATUS_PEMBAYARAN': item.pembayaran_daftar_ulang,
                'NOMINAL_DAFTAR_ULANG': item.nominal_daftar_ulang,
                'STATUS_BERKAS': item.berkas_daftar_ulang,
                'CATATAN_DAFTAR_ULANG': item.catatan_daftar_ulang,
                
                // Kolom 61-65: Informasi Tambahan
                'TAHUN_AJARAN': item.tahun,
                'GELOMBANG': item.gelombang,
                'NILAI_UJIAN': item.nilai_ujian,
                'ALAMAT_AYAH': item.alamat_ayah,
                'ALAMAT_IBU': item.alamat_ibu,
                'ALAMAT_WALI': item.alamat_wali
            }));
            
            // Buat worksheet
            const ws = XLSX.utils.json_to_sheet(excelData);
            
            // Atur lebar kolom
            const wscols = [];
            for(let i = 0; i < 65; i++) {
                wscols.push({wch: 20}); // Lebar kolom 20 karakter
            }
            ws['!cols'] = wscols;
            
            // Buat workbook
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "Data Siswa Daftar Ulang");
            
            // Simpan file
            const fileName = `Data_Lengkap_Siswa_Daftar_Ulang_${new Date().toISOString().split('T')[0]}.xlsx`;
            
            setTimeout(() => {
                XLSX.writeFile(wb, fileName);
                hideExportLoading();
                
                toastMessage.textContent = `Berhasil export ${dataToExport.length} data lengkap (65 kolom) ke Excel`;
                successToast.show();
            }, 1000);
        }

        // Export to PDF - Hanya 10 kolom penting
        function exportToPdf(dataRange) {
            showExportLoading("Menyiapkan data PDF...");
            
            let dataToExport = dataRange === 'current' ? currentPageData : filteredData;
            
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF('landscape', 'mm', 'a4');
            
            // Header
            doc.setFontSize(14);
            doc.setTextColor(0, 43, 73);
            doc.text('DATA SISWA DAFTAR ULANG - PSB AQBS', 20, 20);
            
            doc.setFontSize(10);
            doc.setTextColor(100, 100, 100);
            doc.text('AISYIYAH QURANIC BOARDING SCHOOL PONOROGO', 20, 27);
            doc.text(`Tahun Pelajaran: ${document.getElementById('filterTahun').value} | Total Data: ${dataToExport.length}`, 20, 32);
            
            // Data untuk tabel PDF
            const tableData = dataToExport.map(item => [
                item.id,
                truncateText(item.nama, 20),
                item.nisn,
                item.jenjang,
                item.status_daftar_ulang,
                formatDate(item.tanggal_daftar_ulang),
                item.pembayaran_daftar_ulang,
                formatCurrency(item.nominal_daftar_ulang),
                item.berkas_daftar_ulang,
                truncateText(item.sekolah_asal, 15)
            ]);
            
            setTimeout(() => {
                // Buat tabel
                doc.autoTable({
                    head: [['No', 'Nama', 'NISN', 'Jenjang', 'Status DU', 'Tgl DU', 'Pembayaran', 'Nominal', 'Berkas', 'Sekolah Asal']],
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
                        cellPadding: 2,
                        overflow: 'linebreak'
                    },
                    columnStyles: {
                        0: { cellWidth: 15 }, // No
                        1: { cellWidth: 35 }, // Nama
                        2: { cellWidth: 25 }, // NISN
                        3: { cellWidth: 20 }, // Jenjang
                        4: { cellWidth: 20 }, // Status DU
                        5: { cellWidth: 20 }, // Tgl DU
                        6: { cellWidth: 25 }, // Pembayaran
                        7: { cellWidth: 25 }, // Nominal
                        8: { cellWidth: 20 }, // Berkas
                        9: { cellWidth: 35 }  // Sekolah Asal
                    }
                });
                
                // Footer dengan nomor halaman
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
                
                // Simpan file
                doc.save(`Data_Siswa_Daftar_Ulang_${new Date().toISOString().split('T')[0]}.pdf`);
                
                hideExportLoading();
                
                toastMessage.textContent = `Berhasil export ${dataToExport.length} data ke PDF`;
                successToast.show();
            }, 1000);
        }

        // Handle export
        function handleExport() {
            const dataRange = document.getElementById('exportDataRange').value;
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
            document.getElementById('filterJalur').addEventListener('change', applyFilters);
            document.getElementById('filterSortBy').addEventListener('change', applyFilters);

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
            
            // Update export info text
            exportInfoText.textContent = 'Excel: 65+ kolom lengkap | PDF: 10 kolom penting';
        });
    </script>
</body>
</html>