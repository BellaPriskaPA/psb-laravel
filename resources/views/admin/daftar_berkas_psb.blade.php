<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Berkas PSB - Admin PSB AQBS</title>
    
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

        /* --- SIDEBAR NAVY (FULL MENU) --- */
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

        /* Berkas UI Components */
        .card-custom { 
            background: white; 
            border-radius: 20px; 
            border: 1px solid #e2e8f0; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.08); 
            overflow: hidden; 
            transition: var(--transition-speed);
        }
        .card-custom:hover {
            box-shadow: 0 6px 20px rgba(0,0,0,0.12);
            transform: translateY(-2px);
        }
        .status-unggah { 
            background: #22c55e; 
            color: white; 
            font-size: 0.7rem; 
            font-weight: 700; 
            padding: 4px 12px; 
            border-radius: 50px; 
            text-decoration: none; 
            display: inline-flex; 
            align-items: center; 
            gap: 5px; 
            transition: var(--transition-speed);
        }
        .status-unggah:hover {
            background: #16a34a;
            transform: translateY(-2px);
        }
        .status-unggah.blue { background: #6366f1; }
        .status-unggah.blue:hover { background: #4f46e5; }
        .status-unggah.purple { background: #a855f7; }
        .status-unggah.purple:hover { background: #9333ea; }
        .status-unggah.red { background: #ef4444; }
        .status-unggah.red:hover { background: #dc2626; }
        .status-unggah.orange { background: #f97316; }
        .status-unggah.orange:hover { background: #ea580c; }
        .btn-action-round { 
            width: 28px; 
            height: 28px; 
            border-radius: 50%; 
            display: inline-flex; 
            align-items: center; 
            justify-content: center; 
            border: none; 
            color: white; 
            font-size: 0.7rem; 
            transition: var(--transition-speed);
            margin-left: 4px;
        }
        .btn-dl { 
            background: var(--blue-info); 
        }
        .btn-dl:hover {
            background: #0097a7;
            transform: translateY(-2px);
        }
        .btn-print-sm {
            background: #6b7280;
            color: white;
        }
        .btn-print-sm:hover {
            background: #4b5563;
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
            cursor: pointer;
            user-select: none;
            position: relative;
        }
        .table th.sortable:hover {
            background-color: #f8fafc;
        }
        .table th.sortable::after {
            content: " \2195";
            opacity: 0.3;
            font-size: 0.8rem;
            position: absolute;
            right: 15px;
        }
        .table th.sort-asc::after {
            content: " \2191";
            opacity: 1;
            color: var(--orange-primary);
        }
        .table th.sort-desc::after {
            content: " \2193";
            opacity: 1;
            color: var(--orange-primary);
        }
        .table td {
            padding: 15px 20px;
            vertical-align: middle;
            font-size: 0.9rem;
            color: #334155;
            border-bottom: 1px solid #f1f5f9;
        }

        /* Status Tahapan Styling */
        .status-tahapan { 
            padding: 6px 12px; 
            border-radius: 8px; 
            font-size: 0.75rem; 
            font-weight: 700; 
            text-align: center; 
            min-width: 100px; 
        }
        .status-verifikasi { 
            background: #fef9c3; 
            color: #a16207; 
            border: 1px solid #fef08a; 
        }
        .status-diterima { 
            background: #d1fae5; 
            color: #065f46; 
            border: 1px solid #6ee7b7; 
        }
        .status-daftar-ulang { 
            background: #e0f2fe; 
            color: #0369a1; 
            border: 1px solid #bae6fd; 
        }
        .status-santri-aktif { 
            background: #dcfce7; 
            color: #166534; 
            border: 1px solid #86efac; 
        }
        .status-ditolak { 
            background: #fee2e2; 
            color: #991b1b; 
            border: 1px solid #fecaca; 
        }
        .btn-group-custom .btn {
            padding: 6px 12px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.75rem;
            transition: var(--transition-speed);
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        .btn-success-custom {
            background: #dcfce7;
            color: #22c55e;
            border: 1px solid #bbf7d0;
        }
        .btn-success-custom:hover {
            background: #22c55e;
            color: white;
            transform: translateY(-2px);
        }
        .btn-warning-custom {
            background: #fff7ed;
            color: #f97316;
            border: 1px solid #fed7aa;
        }
        .btn-warning-custom:hover {
            background: #f97316;
            color: white;
            transform: translateY(-2px);
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
        
        /* When "All" is selected, hide pagination controls */
        .pagination-all .pagination-controls {
            opacity: 0.5;
            pointer-events: none;
        }
        
        .pagination-all .pagination-info {
            font-weight: 700;
            color: var(--orange-primary);
        }
        
        /* Export Button Styling */
        .export-buttons {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
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
        
        /* Bulk Actions */
        .bulk-actions {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
            padding: 15px;
            background: #f8fafc;
            border-radius: 12px;
            border-left: 4px solid var(--blue-info);
        }
        
        .bulk-select-info {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.85rem;
            color: #64748b;
        }
        
        .bulk-select-info .badge {
            background: var(--orange-primary);
            color: white;
            padding: 4px 8px;
            border-radius: 6px;
            font-weight: 600;
        }
        
        .btn-bulk-action {
            background: white;
            border: 1px solid #cbd5e1;
            color: #64748b;
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: var(--transition-speed);
        }
        
        .btn-bulk-action:hover {
            background: var(--navy-primary);
            color: white;
            border-color: var(--navy-primary);
            transform: translateY(-2px);
        }
        
        /* Table Checkbox */
        .table-checkbox {
            width: 20px;
            height: 20px;
            cursor: pointer;
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
        
        /* --- ALERT STYLING --- */
        .alert-custom {
            background: #dbeafe;
            border: 1px solid #bfdbfe;
            border-radius: 12px;
            padding: 12px 20px;
            font-size: 0.85rem;
            color: #1e40af;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }
        .alert-custom i {
            font-size: 1rem;
        }
        .badge-custom {
            background: #dcfce7;
            color: #22c55e;
            padding: 4px 10px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 0.75rem;
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

        /* --- MOBILE OPTIMIZATION --- */
        .sidebar-overlay { 
            display: none; 
            position: fixed; 
            inset: 0; 
            background: rgba(0,0,0,0.5); 
            z-index: 1045; 
        }
        
        /* Tablet and below */
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
            .table-responsive {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
            .table {
                min-width: 800px;
            }
            .table th, .table td {
                white-space: nowrap;
                padding: 12px 15px;
                font-size: 0.85rem;
            }
            .status-tahapan {
                min-width: 90px;
                font-size: 0.7rem;
                padding: 5px 10px;
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
            .bulk-actions {
                flex-direction: column;
            }
        }
        
        /* Mobile phones */
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
            .quick-filter-buttons {
                overflow-x: auto;
                flex-wrap: nowrap;
                padding-bottom: 10px;
            }
            .pagination-all .pagination-controls {
                display: none;
            }
        }
        
        @media (max-width: 576px) {
            .table th, .table td {
                padding: 10px 12px;
                font-size: 0.8rem;
            }
            .btn-group-custom .btn {
                padding: 5px 10px;
                font-size: 0.7rem;
                width: 100%;
                margin-bottom: 5px;
            }
            .status-unggah, .btn-action-round {
                font-size: 0.6rem;
                padding: 3px 6px;
            }
            .btn-action-round {
                width: 24px;
                height: 24px;
                margin-left: 2px;
            }
            .status-tahapan {
                font-size: 0.65rem;
                padding: 4px 8px;
                min-width: 80px;
            }
            .table {
                min-width: 700px;
            }
            /* Stack action buttons vertically on very small screens */
            .btn-group-custom {
                display: flex;
                flex-direction: column;
            }
        }
        
        /* Extra small devices */
        @media (max-width: 400px) {
            .table {
                min-width: 650px;
            }
            .status-unggah {
                padding: 2px 6px;
                font-size: 0.55rem;
            }
            .btn-action-round {
                width: 22px;
                height: 22px;
                font-size: 0.6rem;
            }
        }
        
        /* Responsive table with card view on mobile */
        @media (max-width: 768px) {
            .table-responsive {
                display: block;
                width: 100%;
                overflow-x: auto;
            }
            /* Alternative card view for very small screens */
            @media (max-width: 576px) {
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
                    padding-left: 30%;
                }
                
                .table td:before {
                    content: attr(data-label);
                    position: absolute;
                    left: 0;
                    width: 28%;
                    padding-right: 10px;
                    font-weight: 700;
                    color: #64748b;
                    font-size: 0.85rem;
                }
                
                .table td.text-center {
                    text-align: left;
                }
                /* Special handling for action buttons */
                .table td:last-child {
                    padding-top: 15px;
                }
                .btn-group-custom {
                    display: flex;
                    flex-direction: row;
                    gap: 8px;
                }
                .btn-group-custom .btn {
                    width: auto;
                    margin-bottom: 0;
                    padding: 6px 12px;
                }
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
                    <small class="opacity-75 fw-medium" style="font-size: 0.6rem;">Daftar Berkas PSB</small>
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
                <li><a href="#" class="active">Daftar Berkas</a></li>
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
            <h4 class="fw-bold" style="color: var(--navy-primary);">Data Berkas PSB</h4>
            <div class="alert-custom">
                <i class="fas fa-info-circle"></i>
                Jika terdapat tombol <span class="badge-custom">Lihat</span>, berkas sudah diunggah.
            </div>
        </div>

        <!-- Export Buttons -->
        <div class="export-buttons">
            <button class="btn-export" id="exportExcelBtn">
                <i class="fas fa-file-excel"></i> Export Excel
            </button>
            <button class="btn-export" id="exportPrintBtn">
                <i class="fas fa-print"></i> Print Laporan
            </button>
        </div>

        <!-- Quick Filter Buttons -->
        <div class="quick-filter-buttons">
            <button class="quick-filter-btn active" data-filter="all">
                <i class="fas fa-layer-group"></i> Semua Berkas
            </button>
            <button class="quick-filter-btn" data-filter="complete">
                <i class="fas fa-check-circle"></i> Berkas Lengkap
            </button>
            <button class="quick-filter-btn" data-filter="incomplete">
                <i class="fas fa-exclamation-circle"></i> Belum Lengkap
            </button>
            <button class="quick-filter-btn" data-filter="uploaded">
                <i class="fas fa-upload"></i> Sudah Upload
            </button>
            <button class="quick-filter-btn" data-filter="pending">
                <i class="fas fa-clock"></i> Menunggu Upload
            </button>
        </div>

        <!-- Bulk Actions -->
        <div class="bulk-actions" id="bulkActions" style="display: none;">
            <div class="bulk-select-info">
                <span id="selectedCount">0</span> data dipilih
                <span class="badge" id="selectedBadge">0</span>
            </div>
            <button class="btn-bulk-action" id="bulkDownloadBtn">
                <i class="fas fa-download"></i> Download
            </button>
            <button class="btn-bulk-action" id="bulkPrintBtn">
                <i class="fas fa-print"></i> Print
            </button>
            <button class="btn-bulk-action" id="bulkZipBtn">
                <i class="fas fa-file-archive"></i> ZIP
            </button>
            <button class="btn-bulk-action text-danger" id="bulkDeselectBtn">
                <i class="fas fa-times"></i> Batal Pilih
            </button>
        </div>

        <div class="filter-card">
            <div class="row g-3">
                <div class="col-md-2">
                    <label class="small fw-bold mb-1">Tahun Ajaran</label>
                    <select class="form-select form-select-sm" id="filterTahun">
                        <option>2026/2027</option>
                        <option>2025/2026</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="small fw-bold mb-1">Gelombang</label>
                    <select class="form-select form-select-sm" id="filterGelombang">
                        <option>Gelombang 1</option>
                        <option selected>Gelombang 2</option>
                        <option>Gelombang 3</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="small fw-bold mb-1">Jenjang</label>
                    <select class="form-select form-select-sm" id="filterJenjang">
                        <option value="">-- Jenjang --</option>
                        <option>SMP</option>
                        <option>SMA</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="small fw-bold mb-1">Jalur</label>
                    <select class="form-select form-select-sm" id="filterJalur">
                        <option value="">-- Jalur --</option>
                        <option>Mandiri</option>
                        <option>Kader</option>
                        <option>Rekomendasi</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="small fw-bold mb-1">Status Tahapan</label>
                    <select class="form-select form-select-sm" id="filterStatus">
                        <option value="">-- Semua Status --</option>
                        <option>Terverifikasi</option>
                        <option>Diterima</option>
                        <option>Daftar Ulang</option>
                        <option>Santriwati Aktif</option>
                        <option>Ditolak</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="small fw-bold mb-1">Pencarian</label>
                    <input type="text" class="form-control form-control-sm" id="filterSearch" placeholder="Nama / NISN...">
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

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th width="50">
                                <input type="checkbox" class="table-checkbox" id="selectAllCheckbox">
                            </th>
                            <th class="ps-4 sortable" width="50" id="sortNumber" data-sort="id">#</th>
                            <th width="200" class="sortable" data-sort="nama">Nama Pendaftar</th>
                            <th class="sortable" data-sort="status">Status Tahapan</th>
                            <th class="sortable" data-sort="kk">Kartu Keluarga</th>
                            <th class="sortable" data-sort="ijazah">Ijazah / SKL</th>
                            <th class="sortable" data-sort="akta">Akta Lahir</th>
                            <th class="sortable" data-sort="kip">KIP</th>
                            <th class="sortable" data-sort="bpjs">BPJS</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="berkasTableBody">
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

    <!-- File Action Modal -->
    <div class="modal fade" id="fileActionModal" tabindex="-1" aria-labelledby="fileActionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fileActionModalLabel"><i class="fas fa-file me-2"></i>Aksi Berkas</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="fileActionMessage">Anda akan melakukan aksi pada berkas:</p>
                    <p id="fileNameDisplay" class="fw-bold text-primary"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn-modal-confirm" id="confirmFileActionBtn">Lanjutkan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bulk Action Modal -->
    <div class="modal fade" id="bulkActionModal" tabindex="-1" aria-labelledby="bulkActionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bulkActionModalLabel"><i class="fas fa-users-cog me-2"></i>Aksi Massal</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="bulkActionMessage">Anda akan melakukan aksi massal pada:</p>
                    <p id="bulkCountDisplay" class="fw-bold text-primary"></p>
                    <div class="alert alert-warning mt-3">
                        <i class="fas fa-exclamation-triangle"></i>
                        Aksi ini akan diterapkan pada semua data yang dipilih.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn-modal-confirm" id="confirmBulkActionBtn">Lanjutkan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Export Modal -->
    <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exportModalLabel"><i class="fas fa-file-export me-2"></i>Export Data ke Excel</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Pilih data yang akan diexport:</p>
                    <div class="mt-3">
                        <label class="form-label">Jumlah Data:</label>
                        <select class="form-select" id="exportDataRange">
                            <option value="current">Data yang ditampilkan (halaman saat ini)</option>
                            <option value="all">Semua data yang difilter</option>
                            <option value="selected">Data yang dipilih</option>
                        </select>
                    </div>
                    <div class="alert alert-info mt-3">
                        <i class="fas fa-info-circle"></i>
                        Data akan diexport dalam format Excel (.xlsx)
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn-modal-confirm" id="exportExcelConfirm">Export ke Excel</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script>
        // Initialize components
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const toggleBtn = document.getElementById('sidebarToggle');
        const berkasTableBody = document.getElementById('berkasTableBody');
        const applyFilterBtn = document.getElementById('applyFilterBtn');
        const noResultsMessage = document.getElementById('noResultsMessage');
        const fileActionModal = new bootstrap.Modal(document.getElementById('fileActionModal'));
        const bulkActionModal = new bootstrap.Modal(document.getElementById('bulkActionModal'));
        const exportModal = new bootstrap.Modal(document.getElementById('exportModal'));
        const successToastEl = document.getElementById('successToast');
        const successToast = new bootstrap.Toast(successToastEl);
        const toastMessage = document.getElementById('toastMessage');
        const confirmFileActionBtn = document.getElementById('confirmFileActionBtn');
        const confirmBulkActionBtn = document.getElementById('confirmBulkActionBtn');
        const paginationContainer = document.getElementById('paginationContainer');
        const paginationInfo = document.getElementById('paginationInfo');
        const itemsPerPageSelect = document.getElementById('itemsPerPage');
        const firstPageBtn = document.getElementById('firstPageBtn');
        const prevPageBtn = document.getElementById('prevPageBtn');
        const nextPageBtn = document.getElementById('nextPageBtn');
        const lastPageBtn = document.getElementById('lastPageBtn');
        const pageNumbers = document.getElementById('pageNumbers');
        const loadingOverlay = document.getElementById('loadingOverlay');
        const selectAllCheckbox = document.getElementById('selectAllCheckbox');
        const bulkActions = document.getElementById('bulkActions');
        const selectedCount = document.getElementById('selectedCount');
        const selectedBadge = document.getElementById('selectedBadge');
        const bulkDownloadBtn = document.getElementById('bulkDownloadBtn');
        const bulkPrintBtn = document.getElementById('bulkPrintBtn');
        const bulkZipBtn = document.getElementById('bulkZipBtn');
        const bulkDeselectBtn = document.getElementById('bulkDeselectBtn');
        const exportExcelBtn = document.getElementById('exportExcelBtn');
        const exportPrintBtn = document.getElementById('exportPrintBtn');
        const exportExcelConfirm = document.getElementById('exportExcelConfirm');
        const exportDataRange = document.getElementById('exportDataRange');
        const quickFilterButtons = document.querySelectorAll('.quick-filter-btn');

        // Current action details
        let currentAction = null;
        let currentFileName = null;
        let currentBulkAction = null;

        // Sorting state
        let currentSortField = 'id';
        let currentSortOrder = 'asc'; // 'asc' or 'desc'

        // Pagination state
        let currentPage = 1;
        let itemsPerPage = 50; // Default value
        let filteredData = [];

        // Selection state
        let selectedItems = new Set();
        let currentPageData = [];

        // Initial data with full filtering capabilities
        let berkasData = [
            {
                id: 1,
                nama: "ANNISA RAHMAWATI",
                jenjang: "SMP",
                status: "Diterima",
                tahun: "2026/2027",
                gelombang: "Gelombang 2",
                jalur: "Mandiri",
                berkas: {
                    kk: true,
                    ijazah: true,
                    akta: true,
                    kip: true,
                    bpjs: true
                }
            },
            {
                id: 2,
                nama: "FATIMAH ZAHRA",
                jenjang: "SMA",
                status: "Terverifikasi",
                tahun: "2026/2027",
                gelombang: "Gelombang 2",
                jalur: "Kader",
                berkas: {
                    kk: true,
                    ijazah: false,
                    akta: true,
                    kip: false,
                    bpjs: true
                }
            },
            {
                id: 3,
                nama: "NURUL HUDA",
                jenjang: "SMP",
                status: "Daftar Ulang",
                tahun: "2026/2027",
                gelombang: "Gelombang 1",
                jalur: "Mandiri",
                berkas: {
                    kk: true,
                    ijazah: true,
                    akta: true,
                    kip: true,
                    bpjs: false
                }
            },
            {
                id: 4,
                nama: "SITI AISYAH",
                jenjang: "SMA",
                status: "Ditolak",
                tahun: "2026/2027",
                gelombang: "Gelombang 2",
                jalur: "Mandiri",
                berkas: {
                    kk: true,
                    ijazah: true,
                    akta: false,
                    kip: false,
                    bpjs: true
                }
            },
            {
                id: 5,
                nama: "ZAHRA NABILA",
                jenjang: "SMP",
                status: "Santriwati Aktif",
                tahun: "2025/2026",
                gelombang: "Gelombang 3",
                jalur: "Kader",
                berkas: {
                    kk: true,
                    ijazah: true,
                    akta: true,
                    kip: true,
                    bpjs: true
                }
            }
        ];

        // Generate more sample data for pagination demonstration
        function generateMoreData() {
            const names = ["AMELIA PUTRI", "BINTANG NURAINI", "CANTIKA SARI", "DINDA AYU", "ELISA MAHARANI", 
                         "FIRA ANDINI", "GITA MAHESWARI", "HANNAH FEBRIANA", "INDAH PERMATA", "JASMINE ALYA",
                         "KIRANA DEWI", "LUTFIYAH HANUM", "MELATI SUKMA", "NADIA RAHMA", "OKTAVIA SALSABILA",
                         "PUTRI ANANDA", "QONITA ZAHRA", "RARA SEKAR", "SASHA AMELIA", "TIARA KIRANA"];
            
            const jenjangs = ["SMP", "SMA"];
            const statuses = ["Terverifikasi", "Diterima", "Daftar Ulang", "Santriwati Aktif", "Ditolak"];
            const gelombangs = ["Gelombang 1", "Gelombang 2", "Gelombang 3"];
            const jalurs = ["Mandiri", "Kader", "Rekomendasi"];
            
            for (let i = 6; i <= 305; i++) {
                const name = names[Math.floor(Math.random() * names.length)] + " " + (i < 10 ? "0" + i : i);
                const jenjang = jenjangs[Math.floor(Math.random() * jenjangs.length)];
                const status = statuses[Math.floor(Math.random() * statuses.length)];
                const gelombang = gelombangs[Math.floor(Math.random() * gelombangs.length)];
                const jalur = jalurs[Math.floor(Math.random() * jalurs.length)];
                
                berkasData.push({
                    id: i,
                    nama: name,
                    jenjang: jenjang,
                    status: status,
                    tahun: "2026/2027",
                    gelombang: gelombang,
                    jalur: jalur,
                    berkas: {
                        kk: Math.random() > 0.2,
                        ijazah: Math.random() > 0.3,
                        akta: Math.random() > 0.25,
                        kip: Math.random() > 0.4,
                        bpjs: Math.random() > 0.35
                    }
                });
            }
        }

        // Load data from URL hash if available
        function loadSavedData() {
            const hash = window.location.hash;
            if (hash.startsWith('#data=')) {
                try {
                    const encodedData = hash.substring(6);
                    const decodedData = decodeURIComponent(atob(encodedData));
                    berkasData = JSON.parse(decodedData);
                } catch (error) {
                    console.error('Error loading saved ', error);
                }
            } else {
                // Generate more data for demonstration if no saved data
                generateMoreData();
            }
            applyFilters(); // Apply filters on initial load
        }

        // Save data to URL hash
        function saveData() {
            const dataString = JSON.stringify(berkasData);
            const encodedData = btoa(encodeURIComponent(dataString));
            window.location.hash = `data=${encodedData}`;
        }

        // Get status class for styling
        function getStatusClass(status) {
            const statusMap = {
                'Terverifikasi': 'status-verifikasi',
                'Diterima': 'status-diterima',
                'Daftar Ulang': 'status-daftar-ulang',
                'Santriwati Aktif': 'status-santri-aktif',
                'Ditolak': 'status-ditolak'
            };
            return statusMap[status] || 'status-verifikasi';
        }

        // Get file label for display
        function getFileLabel(fileKey) {
            const labels = {
                'kk': 'Kartu Keluarga',
                'ijazah': 'Ijazah / SKL',
                'akta': 'Akta Lahir',
                'kip': 'KIP',
                'bpjs': 'BPJS'
            };
            return labels[fileKey] || fileKey;
        }

        // Check if all files are uploaded
        function isCompleteBerkas(berkas) {
            return berkas.kk && berkas.ijazah && berkas.akta && berkas.kip && berkas.bpjs;
        }

        // Check if any files are uploaded
        function hasUploadedFiles(berkas) {
            return berkas.kk || berkas.ijazah || berkas.akta || berkas.kip || berkas.bpjs;
        }

        // Sort data based on current sort field and order
        function sortData(data) {
            return data.sort((a, b) => {
                let valueA, valueB;
                
                switch(currentSortField) {
                    case 'nama':
                        valueA = a.nama.toLowerCase();
                        valueB = b.nama.toLowerCase();
                        break;
                    case 'status':
                        valueA = a.status;
                        valueB = b.status;
                        break;
                    case 'kk':
                        valueA = a.berkas.kk ? 1 : 0;
                        valueB = b.berkas.kk ? 1 : 0;
                        break;
                    case 'ijazah':
                        valueA = a.berkas.ijazah ? 1 : 0;
                        valueB = b.berkas.ijazah ? 1 : 0;
                        break;
                    case 'akta':
                        valueA = a.berkas.akta ? 1 : 0;
                        valueB = b.berkas.akta ? 1 : 0;
                        break;
                    case 'kip':
                        valueA = a.berkas.kip ? 1 : 0;
                        valueB = b.berkas.kip ? 1 : 0;
                        break;
                    case 'bpjs':
                        valueA = a.berkas.bpjs ? 1 : 0;
                        valueB = b.berkas.bpjs ? 1 : 0;
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
            // Remove all sort classes
            document.querySelectorAll('.sortable').forEach(th => {
                th.classList.remove('sort-asc', 'sort-desc');
            });
            
            // Add sort class to current sort field
            const currentSortTh = document.querySelector(`[data-sort="${currentSortField}"]`);
            if (currentSortTh) {
                currentSortTh.classList.add(currentSortOrder === 'asc' ? 'sort-asc' : 'sort-desc');
            }
        }

        // Calculate row number based on sort order
        function calculateRowNumber(index, totalItems, startIndex = 0) {
            if (currentSortOrder === 'asc') {
                // Ascending: 1, 2, 3, ...
                return startIndex + index + 1;
            } else {
                // Descending: totalItems, totalItems-1, totalItems-2, ...
                if (itemsPerPage === 'all') {
                    return totalItems - index;
                } else {
                    return totalItems - startIndex - index;
                }
            }
        }

        // Filter data based on current filter selections
        function applyFilters() {
            showLoading();
            
            const tahun = document.getElementById('filterTahun').value;
            const gelombang = document.getElementById('filterGelombang').value;
            const jenjang = document.getElementById('filterJenjang').value;
            const jalur = document.getElementById('filterJalur').value;
            const status = document.getElementById('filterStatus').value;
            const search = document.getElementById('filterSearch').value.toLowerCase();
            const quickFilter = document.querySelector('.quick-filter-btn.active')?.dataset.filter || 'all';

            // Filter the data
            filteredData = berkasData.filter(item => {
                // Check tahun
                if (tahun && item.tahun !== tahun) return false;
                // Check gelombang
                if (gelombang && item.gelombang !== gelombang) return false;
                // Check jenjang
                if (jenjang && item.jenjang !== jenjang) return false;
                // Check jalur
                if (jalur && item.jalur !== jalur) return false;
                // Check status
                if (status && item.status !== status) return false;
                // Check search term in nama
                if (search && !item.nama.toLowerCase().includes(search)) return false;
                
                // Check quick filter
                switch(quickFilter) {
                    case 'complete':
                        if (!isCompleteBerkas(item.berkas)) return false;
                        break;
                    case 'incomplete':
                        if (isCompleteBerkas(item.berkas)) return false;
                        break;
                    case 'uploaded':
                        if (!hasUploadedFiles(item.berkas)) return false;
                        break;
                    case 'pending':
                        if (hasUploadedFiles(item.berkas)) return false;
                        break;
                    case 'all':
                    default:
                        // No additional filter
                        break;
                }
                
                return true;
            });

            // Sort the filtered data
            filteredData = sortData(filteredData);

            // Reset to first page when filters change
            currentPage = 1;
            
            // Clear selection when filters change
            selectedItems.clear();
            updateSelectionUI();
            
            // Update sort indicators
            updateSortIndicators();
            
            // Render the paginated data
            setTimeout(() => {
                renderPagination();
                renderCurrentPage();
                hideLoading();

                // Show/hide no results message
                if (filteredData.length === 0) {
                    noResultsMessage.style.display = 'block';
                    paginationContainer.style.display = 'none';
                } else {
                    noResultsMessage.style.display = 'none';
                    paginationContainer.style.display = 'flex';
                }

                // Show success toast for filter application
                if (tahun || gelombang || jenjang || jalur || status || search) {
                    toastMessage.textContent = `Menampilkan ${filteredData.length} hasil dari filter yang dipilih`;
                    successToast.show();
                }
            }, 500);
        }

        // Show loading overlay
        function showLoading() {
            loadingOverlay.style.display = 'flex';
        }

        // Hide loading overlay
        function hideLoading() {
            loadingOverlay.style.display = 'none';
        }

        // Render current page
        function renderCurrentPage() {
            // Calculate start and end indices
            let startIndex, endIndex, pageData;
            
            if (itemsPerPage === 'all') {
                // Show all data
                pageData = filteredData;
                startIndex = 0;
                endIndex = filteredData.length;
            } else {
                // Show paginated data
                startIndex = (currentPage - 1) * itemsPerPage;
                endIndex = Math.min(startIndex + itemsPerPage, filteredData.length);
                pageData = filteredData.slice(startIndex, endIndex);
            }
            
            // Store current page data
            currentPageData = pageData;
            
            // Render the table
            renderTable(pageData, startIndex);
            
            // Update pagination info
            updatePaginationInfo(startIndex, endIndex);
        }

        // Render table with provided data
        function renderTable(data, startIndex) {
            berkasTableBody.innerHTML = '';
            const totalItems = filteredData.length;
            
            data.forEach((item, index) => {
                const row = document.createElement('tr');
                const statusClass = getStatusClass(item.status);
                const isSelected = selectedItems.has(item.id);
                
                // Calculate row number based on sort order
                const rowNumber = calculateRowNumber(index, totalItems, startIndex);

                // Build berkas cells
                const berkasFields = ['kk', 'ijazah', 'akta', 'kip', 'bpjs'];
                const berkasLabels = ['Kartu Keluarga', 'Ijazah / SKL', 'Akta Lahir', 'KIP', 'BPJS'];
                const berkasColors = ['', 'blue', 'purple', 'red', 'orange'];
                let berkasCells = '';
                berkasFields.forEach((field, idx) => {
                    if (item.berkas[field]) {
                        berkasCells += `
                        <td data-label="${berkasLabels[idx]}">
                            <div class="d-flex align-items-center gap-2">
                                <a href="#" class="status-unggah ${berkasColors[idx]}" data-action="view" data-file="${field}" data-name="${item.nama}">Lihat <i class="fas fa-eye"></i></a>
                                <button class="btn-action-round btn-dl" title="Download" data-action="download" data-file="${field}" data-name="${item.nama}"><i class="fas fa-download"></i></button>
                                <button class="btn-action-round btn-print-sm" title="Print" data-action="print" data-file="${field}" data-name="${item.nama}"><i class="fas fa-print"></i></button>
                            </div>
                        </td>
                        `;
                    } else {
                        berkasCells += `<td data-label="${berkasLabels[idx]}"><div class="d-flex align-items-center gap-2"><span class="text-muted">Belum Upload</span></div></td>`;
                    }
                });

                row.innerHTML = `
                <td data-label="Pilih">
                    <input type="checkbox" class="table-checkbox item-checkbox" data-id="${item.id}" ${isSelected ? 'checked' : ''}>
                </td>
                <td class="ps-4" data-label="#">${rowNumber}</td>
                <td data-label="Nama Pendaftar">
                    <div class="fw-bold" style="color: var(--navy-primary);">${item.nama}</div>
                    <div class="small text-muted">${item.jenjang}</div>
                </td>
                <td data-label="Status Tahapan"><span class="status-tahapan ${statusClass}">${item.status}</span></td>
                ${berkasCells}
                <td class="text-center" data-label="Aksi">
                    <div class="btn-group-custom">
                        <button class="btn btn-success-custom" data-action="zip" data-name="${item.nama}"><i class="fas fa-download"></i> ZIP</button>
                        <button class="btn btn-warning-custom" data-action="print-all" data-name="${item.nama}"><i class="fas fa-print"></i> PRINT</button>
                    </div>
                </td>
                `;
                berkasTableBody.appendChild(row);
            });

            // Add event listeners to action buttons
            addEventListeners();
            
            // Add event listeners to checkboxes
            addCheckboxListeners();
            
            // Update select all checkbox state
            updateSelectAllCheckbox();
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

        // Render pagination controls
        function renderPagination() {
            const totalItems = filteredData.length;
            
            if (itemsPerPage === 'all' || totalItems <= itemsPerPage) {
                // Hide pagination controls when showing all or when data fits in one page
                pageNumbers.innerHTML = '';
                firstPageBtn.disabled = true;
                prevPageBtn.disabled = true;
                nextPageBtn.disabled = true;
                lastPageBtn.disabled = true;
                return;
            }
            
            const totalPages = Math.ceil(totalItems / itemsPerPage);
            
            // Clear page numbers
            pageNumbers.innerHTML = '';
            
            // Calculate page range to display
            let startPage = Math.max(1, currentPage - 2);
            let endPage = Math.min(totalPages, currentPage + 2);
            
            // Adjust if we're near the start or end
            if (currentPage <= 3) {
                endPage = Math.min(5, totalPages);
            }
            if (currentPage >= totalPages - 2) {
                startPage = Math.max(1, totalPages - 4);
            }
            
            // Add page number buttons
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
            
            // Update navigation buttons
            updatePaginationButtons(totalPages);
        }

        // Update pagination navigation buttons
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

        // Add event listeners to all action buttons
        function addEventListeners() {
            // Individual file actions
            document.querySelectorAll('[data-action="view"], [data-action="download"], [data-action="print"]').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const action = this.dataset.action;
                    const file = this.dataset.file;
                    const name = this.dataset.name;
                    currentAction = action;
                    currentFileName = `${name} - ${getFileLabel(file)}`;
                    let actionText = '';
                    switch(action) {
                        case 'view':
                            actionText = 'melihat';
                            break;
                        case 'download':
                            actionText = 'mengunduh';
                            break;
                        case 'print':
                            actionText = 'mencetak';
                            break;
                    }
                    document.getElementById('fileActionMessage').textContent = `Anda akan ${actionText} berkas:`;
                    document.getElementById('fileNameDisplay').textContent = currentFileName;
                    fileActionModal.show();
                });
            });

            // Bulk actions
            document.querySelectorAll('[data-action="zip"], [data-action="print-all"]').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const action = this.dataset.action;
                    const name = this.dataset.name;
                    currentAction = action;
                    currentFileName = name;
                    let actionText = action === 'zip' ? 'mengunduh semua berkas dalam format ZIP' : 'mencetak semua berkas';
                    document.getElementById('fileActionMessage').textContent = `Anda akan ${actionText} untuk:`;
                    document.getElementById('fileNameDisplay').textContent = currentFileName;
                    fileActionModal.show();
                });
            });
        }

        // Add event listeners to checkboxes
        function addCheckboxListeners() {
            document.querySelectorAll('.item-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const id = parseInt(this.dataset.id);
                    if (this.checked) {
                        selectedItems.add(id);
                    } else {
                        selectedItems.delete(id);
                    }
                    updateSelectionUI();
                    updateSelectAllCheckbox();
                });
            });
        }

        // Update selection UI
        function updateSelectionUI() {
            const count = selectedItems.size;
            selectedCount.textContent = count;
            selectedBadge.textContent = count;
            
            if (count > 0) {
                bulkActions.style.display = 'flex';
            } else {
                bulkActions.style.display = 'none';
            }
        }

        // Update select all checkbox
        function updateSelectAllCheckbox() {
            const allChecked = currentPageData.every(item => selectedItems.has(item.id));
            const anyChecked = currentPageData.some(item => selectedItems.has(item.id));
            
            if (allChecked) {
                selectAllCheckbox.checked = true;
                selectAllCheckbox.indeterminate = false;
            } else if (anyChecked) {
                selectAllCheckbox.checked = false;
                selectAllCheckbox.indeterminate = true;
            } else {
                selectAllCheckbox.checked = false;
                selectAllCheckbox.indeterminate = false;
            }
        }

        // Select all items on current page
        function selectAllOnPage() {
            currentPageData.forEach(item => {
                selectedItems.add(item.id);
            });
            updateSelectionUI();
            renderCurrentPage();
        }

        // Deselect all items
        function deselectAll() {
            selectedItems.clear();
            updateSelectionUI();
            renderCurrentPage();
        }

        // Handle confirmed file action
        confirmFileActionBtn.addEventListener('click', function() {
            // Simulate action processing
            setTimeout(() => {
                let message = '';
                switch(currentAction) {
                    case 'view':
                        message = `Berhasil membuka berkas ${currentFileName}`;
                        break;
                    case 'download':
                        message = `Berhasil mengunduh berkas ${currentFileName}`;
                        break;
                    case 'print':
                        message = `Berhasil mencetak berkas ${currentFileName}`;
                        break;
                    case 'zip':
                        message = `Berhasil mengunduh semua berkas ${currentFileName} dalam format ZIP`;
                        break;
                    case 'print-all':
                        message = `Berhasil mencetak semua berkas ${currentFileName}`;
                        break;
                }
                toastMessage.textContent = message;
                successToast.show();
                fileActionModal.hide();
            }, 500);
        });

        // Handle confirmed bulk action
        confirmBulkActionBtn.addEventListener('click', function() {
            // Simulate bulk action processing
            setTimeout(() => {
                let message = '';
                switch(currentBulkAction) {
                    case 'download':
                        message = `Berhasil mengunduh ${selectedItems.size} berkas yang dipilih`;
                        break;
                    case 'print':
                        message = `Berhasil mencetak ${selectedItems.size} berkas yang dipilih`;
                        break;
                    case 'zip':
                        message = `Berhasil mengunduh ${selectedItems.size} berkas dalam format ZIP`;
                        break;
                }
                toastMessage.textContent = message;
                successToast.show();
                bulkActionModal.hide();
                
                // Clear selection after bulk action
                deselectAll();
            }, 500);
        });

        // Export to Excel
        function exportToExcel(dataRange) {
            let dataToExport = [];
            
            switch(dataRange) {
                case 'current':
                    dataToExport = currentPageData;
                    break;
                case 'selected':
                    dataToExport = berkasData.filter(item => selectedItems.has(item.id));
                    break;
                case 'all':
                default:
                    dataToExport = filteredData;
                    break;
            }
            
            // Prepare data for Excel
            const excelData = dataToExport.map(item => ({
                'No': item.id,
                'Nama Pendaftar': item.nama,
                'Jenjang': item.jenjang,
                'Status': item.status,
                'Tahun Ajaran': item.tahun,
                'Gelombang': item.gelombang,
                'Jalur': item.jalur,
                'KK': item.berkas.kk ? 'Ya' : 'Tidak',
                'Ijazah/SKL': item.berkas.ijazah ? 'Ya' : 'Tidak',
                'Akta Lahir': item.berkas.akta ? 'Ya' : 'Tidak',
                'KIP': item.berkas.kip ? 'Ya' : 'Tidak',
                'BPJS': item.berkas.bpjs ? 'Ya' : 'Tidak'
            }));
            
            // Create worksheet
            const ws = XLSX.utils.json_to_sheet(excelData);
            
            // Create workbook
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "Data Berkas PSB");
            
            // Generate file
            XLSX.writeFile(wb, `Data_Berkas_PSB_${new Date().toISOString().split('T')[0]}.xlsx`);
            
            toastMessage.textContent = `Berhasil export ${dataToExport.length} data ke Excel`;
            successToast.show();
        }

        // Print report
        function printReport() {
            const printWindow = window.open('', '_blank');
            printWindow.document.write(`
                <html>
                <head>
                    <title>Laporan Berkas PSB</title>
                    <style>
                        body { font-family: Arial, sans-serif; margin: 20px; }
                        h1 { color: #002b49; }
                        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
                        th { background-color: #002b49; color: white; }
                        .badge { padding: 2px 6px; border-radius: 4px; font-size: 12px; }
                        .complete { background: #d1fae5; color: #065f46; }
                        .incomplete { background: #fef9c3; color: #a16207; }
                    </style>
                </head>
                <body>
                    <h1>Laporan Berkas PSB</h1>
                    <p>Tanggal: ${new Date().toLocaleDateString('id-ID')}</p>
                    <p>Total Data: ${filteredData.length}</p>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pendaftar</th>
                                <th>Jenjang</th>
                                <th>Status</th>
                                <th>KK</th>
                                <th>Ijazah/SKL</th>
                                <th>Akta Lahir</th>
                                <th>KIP</th>
                                <th>BPJS</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${filteredData.map((item, index) => `
                                <tr>
                                    <td>${index + 1}</td>
                                    <td>${item.nama}</td>
                                    <td>${item.jenjang}</td>
                                    <td>${item.status}</td>
                                    <td>${item.berkas.kk ? '✓' : '✗'}</td>
                                    <td>${item.berkas.ijazah ? '✓' : '✗'}</td>
                                    <td>${item.berkas.akta ? '✓' : '✗'}</td>
                                    <td>${item.berkas.kip ? '✓' : '✗'}</td>
                                    <td>${item.berkas.bpjs ? '✓' : '✗'}</td>
                                </tr>
                            `).join('')}
                        </tbody>
                    </table>
                </body>
                </html>
            `);
            printWindow.document.close();
            printWindow.print();
            
            toastMessage.textContent = 'Berhasil mencetak laporan';
            successToast.show();
        }

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

        // Initialize filter button
        applyFilterBtn.addEventListener('click', applyFilters);

        // Initialize sorting functionality
        document.querySelectorAll('.sortable').forEach(th => {
            th.addEventListener('click', function() {
                const sortField = this.dataset.sort;
                
                if (currentSortField === sortField) {
                    // Toggle sort order if same field
                    currentSortOrder = currentSortOrder === 'asc' ? 'desc' : 'asc';
                } else {
                    // Set new sort field with default ascending order
                    currentSortField = sortField;
                    currentSortOrder = 'asc';
                }
                
                // Re-apply filters (which includes sorting)
                applyFilters();
            });
        });

        // Items per page change handler
        itemsPerPageSelect.addEventListener('change', function() {
            const value = this.value;
            if (value === 'all') {
                itemsPerPage = 'all';
            } else {
                itemsPerPage = parseInt(value);
            }
            currentPage = 1; // Reset to first page
            applyFilters(); // This will re-render with new items per page
        });

        // Select all checkbox handler
        selectAllCheckbox.addEventListener('change', function() {
            if (this.checked || this.indeterminate) {
                selectAllOnPage();
            } else {
                // Deselect only items on current page
                currentPageData.forEach(item => {
                    selectedItems.delete(item.id);
                });
                updateSelectionUI();
                renderCurrentPage();
            }
        });

        // Bulk action handlers
        bulkDownloadBtn.addEventListener('click', () => {
            if (selectedItems.size === 0) return;
            currentBulkAction = 'download';
            document.getElementById('bulkActionMessage').textContent = 'Anda akan mengunduh berkas untuk:';
            document.getElementById('bulkCountDisplay').textContent = `${selectedItems.size} data yang dipilih`;
            bulkActionModal.show();
        });

        bulkPrintBtn.addEventListener('click', () => {
            if (selectedItems.size === 0) return;
            currentBulkAction = 'print';
            document.getElementById('bulkActionMessage').textContent = 'Anda akan mencetak berkas untuk:';
            document.getElementById('bulkCountDisplay').textContent = `${selectedItems.size} data yang dipilih`;
            bulkActionModal.show();
        });

        bulkZipBtn.addEventListener('click', () => {
            if (selectedItems.size === 0) return;
            currentBulkAction = 'zip';
            document.getElementById('bulkActionMessage').textContent = 'Anda akan mengunduh berkas dalam format ZIP untuk:';
            document.getElementById('bulkCountDisplay').textContent = `${selectedItems.size} data yang dipilih`;
            bulkActionModal.show();
        });

        bulkDeselectBtn.addEventListener('click', deselectAll);

        // Export button handlers
        exportExcelBtn.addEventListener('click', () => {
            exportModal.show();
        });

        exportPrintBtn.addEventListener('click', printReport);

        exportExcelConfirm.addEventListener('click', () => {
            exportToExcel(exportDataRange.value);
            exportModal.hide();
        });

        // Quick filter button handlers
        quickFilterButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                quickFilterButtons.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                applyFilters();
            });
        });

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            loadSavedData();
        });
    </script>
</body>
</html>