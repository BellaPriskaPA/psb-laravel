<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Pendaftaran - PSB Online</title>
    
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

        /* --- CARD STYLE --- */
        .card-pendaftaran {
            background: white;
            border-radius: var(--card-radius);
            box-shadow: 0 5px 20px rgba(0, 43, 77, 0.15);
            border: none;
            overflow: hidden;
            border-left: 6px solid var(--orange-primary);
        }
        .card-header-title {
            padding: 20px 25px;
            border-bottom: 1px solid #f0f0f0;
            font-weight: 700;
            color: var(--navy-primary);
            font-size: 1.1rem;
            display: flex;
            align-items: center;
        }
        .card-header-title i {
            color: var(--orange-primary);
            margin-right: 10px;
        }

        /* Profile & Table Data */
        .profile-frame {
            width: 150px; 
            height: 150px;
            border-radius: 12px;
            object-fit: cover;
            border: 4px solid #f8f9fa;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            margin-bottom: 15px;
        }
        .status-badge {
            background-color: #28a745; 
            color: white;
            padding: 6px 16px; 
            border-radius: 50px;
            font-size: 0.8rem; 
            font-weight: 700;
            display: inline-block; 
            text-transform: uppercase;
        }

        .data-table { 
            width: 100%; 
        }
        .data-table tr td { 
            padding: 12px 10px; 
            border-bottom: 1px solid #f8f9fa; 
            font-size: 0.95rem; 
        }
        .label-text { 
            color: #888; 
            font-weight: 600; 
            width: 40%; 
            text-transform: none;
            letter-spacing: normal;
        }
        .value-text { 
            color: #333; 
            font-weight: 600; 
            text-transform: none;
        }

        /* Buttons */
        .btn-group-custom { 
            display: flex; 
            flex-wrap: wrap; 
            gap: 10px; 
            margin-top: 20px; 
        }
        .btn-custom {
            border-radius: 10px; 
            padding: 10px 20px; 
            font-weight: 600; 
            font-size: 0.9rem;
            border: none; 
            transition: 0.3s; 
            display: flex; 
            align-items: center; 
            gap: 8px;
        }
        .btn-blue { 
            background-color: #5d69ba; 
            color: white; 
            box-shadow: 0 4px 10px rgba(93, 105, 186, 0.3);
        }
        .btn-green { 
            background-color: #28a745; 
            color: white; 
            box-shadow: 0 4px 10px rgba(40, 167, 69, 0.3);
        }
        .btn-orange { 
            background-color: var(--orange-primary); 
            color: white; 
            box-shadow: 0 4px 10px rgba(255, 127, 0, 0.3);
        }
        .btn-red {
            background-color: #dc3545;
            color: white;
            box-shadow: 0 4px 10px rgba(220, 53, 69, 0.3);
        }
        .btn-custom:hover { 
            transform: translateY(-2px); 
            opacity: 0.9; 
            box-shadow: 0 6px 15px rgba(0,0,0,0.2);
        }

        /* Upload Form Styles */
        .upload-section {
            background: #f9fafc;
            border-radius: 12px;
            padding: 25px;
            margin-top: 30px;
            border: 2px solid #e0e6ef;
        }
        .upload-header {
            font-size: 1.2rem;
            color: var(--navy-primary);
            font-weight: 700;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .upload-instructions {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 25px;
            line-height: 1.5;
        }
        .upload-instructions ul {
            padding-left: 20px;
            margin-top: 10px;
        }
        .upload-instructions li {
            margin-bottom: 8px;
        }
        .upload-box {
            background: white;
            border: 2px dashed #d1d8e0;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 25px;
            transition: all 0.3s;
        }
        .upload-box:hover {
            border-color: var(--orange-primary);
            background: #fff9f2;
        }
        .upload-box-title {
            font-weight: 700;
            color: var(--navy-primary);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.1rem;
        }
        .upload-box-instructions {
            font-size: 0.85rem;
            color: #666;
            margin-bottom: 15px;
        }
        .signature-notes {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            border-left: 4px solid #ffc107;
        }
        .signature-notes h6 {
            color: #856404;
            font-weight: 700;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .signature-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .signature-list li {
            margin-bottom: 12px;
            padding-bottom: 12px;
            border-bottom: 1px dashed #eee;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .signature-list li:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        .signature-person {
            background: #fff8e6;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 600;
            color: #856404;
            font-size: 0.85rem;
        }
        .signature-detail {
            flex: 1;
            font-size: 0.85rem;
            color: #666;
        }
        .signature-icon {
            color: #ff7f00;
        }
        .file-input-wrapper {
            position: relative;
            margin-bottom: 15px;
        }
        .file-input {
            opacity: 0;
            position: absolute;
            width: 100%;
            height: 100%;
            cursor: pointer;
            z-index: 2;
        }
        .file-label {
            display: block;
            background: #f8f9fa;
            border: 2px solid #e0e6ef;
            border-radius: 8px;
            padding: 12px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 600;
            color: var(--navy-primary);
        }
        .file-label:hover {
            border-color: var(--orange-primary);
            background: #fff9f2;
        }
        .upload-status {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
        }
        .upload-preview {
            display: none;
            margin-top: 20px;
        }
        .upload-preview.show {
            display: block;
        }
        .preview-item {
            background: white;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            border-left: 4px solid var(--orange-primary);
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        }
        .file-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .file-icon {
            font-size: 1.8rem;
            color: #ff7f00;
        }
        .file-details h5 {
            margin: 0;
            font-size: 1rem;
            color: var(--navy-primary);
        }
        .file-details p {
            margin: 5px 0 0;
            font-size: 0.85rem;
            color: #666;
        }
        .file-actions {
            display: flex;
            gap: 10px;
        }
        .btn-action {
            background: none;
            border: none;
            font-size: 1rem;
            cursor: pointer;
            padding: 5px;
            border-radius: 5px;
            transition: 0.2s;
        }
        .btn-delete {
            color: #e74c3c;
        }
        .btn-delete:hover {
            background: #fdf2f0;
        }
        .btn-view {
            color: #3498db;
        }
        .btn-view:hover {
            background: #f0f8ff;
        }
        .btn-upload {
            background-color: var(--orange-primary);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 25px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .btn-upload:hover {
            background-color: var(--orange-hover);
            transform: translateY(-2px);
        }
        .btn-upload:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
        .alert {
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 0.9rem;
            margin-bottom: 15px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }
        .alert-warning {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
        }
        .uploaded-badge {
            background-color: #28a745;
            color: white;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .not-uploaded-badge {
            background-color: #dc3545;
            color: white;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .pending-badge {
            background-color: #ffc107;
            color: #212529;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        /* Notes Print Section */
        .notes-section {
            background: #fff8e6;
            border-radius: 12px;
            padding: 20px;
            margin-top: 25px;
            border-left: 5px solid #ffc107;
        }
        .notes-title {
            font-weight: 700;
            color: #856404;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .notes-list {
            margin: 0;
            padding-left: 20px;
        }
        .notes-list li {
            margin-bottom: 8px;
            color: #856404;
            font-size: 0.9rem;
        }

        /* Status Upload Section */
        .status-upload {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-top: 25px;
            border: 1px solid #e0e6ef;
        }
        .status-title {
            font-weight: 700;
            color: var(--navy-primary);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .status-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #f0f0f0;
        }
        .status-item:last-child {
            border-bottom: none;
        }
        .status-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .status-icon {
            font-size: 1.2rem;
        }
        .status-icon.success {
            color: #28a745;
        }
        .status-icon.pending {
            color: #ffc107;
        }
        .status-icon.danger {
            color: #dc3545;
        }
        .status-text {
            font-weight: 600;
            color: #333;
            font-size: 0.95rem;
        }

        /* Info Panel */
        .info-panel {
            background: #e3f2fd;
            border-radius: 12px;
            padding: 20px;
            margin-top: 25px;
            border-left: 5px solid #2196f3;
        }
        .info-panel-title {
            font-weight: 700;
            color: #0d47a1;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .info-panel-content {
            color: #0d47a1;
            font-size: 0.9rem;
            line-height: 1.6;
        }

        /* Signature Requirements */
        .requirements-box {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            border: 2px solid #e0e6ef;
        }
        .requirements-title {
            font-weight: 700;
            color: var(--navy-primary);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .requirement-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px dashed #dee2e6;
        }
        .requirement-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        .req-icon {
            color: #ff7f00;
            font-size: 1.2rem;
            margin-right: 15px;
            margin-top: 3px;
        }
        .req-content h6 {
            margin: 0 0 5px 0;
            color: #333;
            font-weight: 600;
        }
        .req-content p {
            margin: 0;
            color: #666;
            font-size: 0.9rem;
        }

        /* Modal Kartu Ujian */
        .modal-kartu {
            max-width: 900px;
            border-radius: 15px;
            overflow: hidden;
            background: white;
            margin: 20px;
            max-height: 90vh;
            overflow-y: auto;
        }
        .kartu-header {
            background: linear-gradient(135deg, var(--navy-primary), #0056b3);
            color: white;
            padding: 25px;
            text-align: center;
        }
        .kartu-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 5px;
            letter-spacing: 1px;
        }
        .kartu-subtitle {
            font-size: 1.3rem;
            opacity: 0.9;
            margin-bottom: 10px;
        }
        .kartu-body {
            padding: 30px;
            background: white;
        }
        .kartu-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 25px;
        }
        .kartu-info-item {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            border-left: 4px solid var(--orange-primary);
        }
        .kartu-info-label {
            font-size: 0.85rem;
            color: #666;
            margin-bottom: 5px;
            font-weight: 600;
        }
        .kartu-info-value {
            font-size: 1.1rem;
            color: var(--navy-primary);
            font-weight: 700;
        }
        .qr-code-container {
            text-align: center;
            margin: 20px 0;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
        }
        .qr-code-placeholder {
            width: 150px;
            height: 150px;
            background: #e9ecef;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
        }
        
        /* Mata Ujian Section */
        .mata-ujian-section {
            margin-top: 30px;
        }
        .mata-ujian-title {
            font-size: 1.4rem;
            color: var(--navy-primary);
            font-weight: 700;
            margin-bottom: 20px;
            text-align: center;
            padding-bottom: 10px;
            border-bottom: 3px solid var(--orange-primary);
        }
        .ujian-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            border: 2px solid #e0e6ef;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
            transition: 0.3s;
        }
        .ujian-card:hover {
            border-color: var(--orange-primary);
            box-shadow: 0 5px 15px rgba(255, 127, 0, 0.1);
        }
        .ujian-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        .ujian-nama {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--navy-primary);
        }
        .ujian-kode {
            background: #e3f2fd;
            color: #0d47a1;
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.85rem;
        }
        .ujian-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 20px;
        }
        .ujian-info-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .ujian-info-icon {
            color: var(--orange-primary);
            font-size: 1rem;
        }
        .ujian-info-label {
            font-weight: 600;
            color: #666;
            font-size: 0.9rem;
        }
        .ujian-info-value {
            font-weight: 600;
            color: #333;
        }
        .link-ujian-container {
            background: #f0f8ff;
            padding: 20px;
            border-radius: 8px;
            border: 2px dashed #3498db;
            text-align: center;
        }
        .link-ujian-title {
            font-size: 1.1rem;
            color: #0d47a1;
            font-weight: 700;
            margin-bottom: 15px;
        }
        .link-ujian-description {
            color: #666;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }
        .btn-link-ujian {
            background: #3498db;
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 8px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: 0.3s;
        }
        .btn-link-ujian:hover {
            background: #2980b9;
            transform: translateY(-2px);
            color: white;
            text-decoration: none;
        }
        .link-status {
            margin-top: 10px;
            font-size: 0.85rem;
        }
        .link-status.aktif {
            color: #28a745;
        }
        .link-status.nonaktif {
            color: #dc3545;
        }
        
        .kartu-footer {
            background: #f8f9fa;
            padding: 20px;
            text-align: center;
            color: #666;
            font-size: 0.85rem;
            border-top: 1px solid #e0e6ef;
        }
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.8);
            z-index: 9999;
            display: none;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .modal-overlay.show {
            display: flex;
        }

        /* Status Pembayaran */
        .status-pembayaran {
            background: white;
            border-radius: 12px;
            padding: 25px;
            margin-top: 25px;
            border: 1px solid #e0e6ef;
            text-align: center;
        }
        .status-pembayaran-icon {
            font-size: 4rem;
            margin-bottom: 20px;
        }
        .status-pembayaran-icon.success {
            color: #28a745;
        }
        .status-pembayaran-icon.pending {
            color: #ffc107;
        }
        .status-pembayaran-icon.danger {
            color: #dc3545;
        }
        .status-pembayaran-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--navy-primary);
            margin-bottom: 10px;
        }
        .status-pembayaran-desc {
            color: #666;
            margin-bottom: 25px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        .btn-bayar {
            background: var(--orange-primary);
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }
        .btn-bayar:hover {
            background: var(--orange-hover);
            transform: translateY(-2px);
        }

        /* Responsive Logic */
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
            .user-dropdown-toggle span { 
                display: none; 
            }
            .data-table tr td { 
                display: block; 
                width: 100%; 
                border: none; 
                padding: 8px 0; 
            }
            .label-text { 
                font-size: 0.85rem; 
                margin-bottom: 3px; 
                width: 100%;
                text-transform: none;
            }
            .value-text { 
                margin-bottom: 12px; 
                border-bottom: 1px solid #eee; 
                padding-bottom: 8px; 
                font-size: 0.95rem;
                text-transform: none;
            }
            .btn-custom { 
                width: 100%; 
                justify-content: center; 
                padding: 12px;
            }
            .profile-frame {
                width: 120px;
                height: 120px;
            }
            .card-header-title {
                padding: 15px 20px;
                font-size: 1rem;
            }
            .upload-section {
                padding: 20px;
            }
            .preview-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            .file-actions {
                align-self: flex-end;
            }
            .signature-list li {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }
            .signature-person {
                align-self: flex-start;
            }
            .kartu-info {
                grid-template-columns: 1fr;
            }
            .ujian-info {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 767px) {
            .main-content {
                padding: 10px;
            }
            .card-pendaftaran {
                border-radius: 12px;
            }
            .card-body {
                padding: 15px;
            }
            .profile-frame {
                width: 100px;
                height: 100px;
            }
            .btn-group-custom {
                gap: 8px;
            }
            .btn-custom {
                padding: 10px;
                font-size: 0.85rem;
            }
            .status-badge {
                padding: 5px 12px;
                font-size: 0.75rem;
            }
            .label-text {
                font-size: 0.8rem;
                text-transform: none;
            }
            .value-text {
                font-size: 0.9rem;
                text-transform: none;
            }
            .upload-header {
                font-size: 1.1rem;
            }
            .upload-box {
                padding: 20px;
            }
        }
        
        @media (max-width: 575px) {
            .col-lg-3, .col-lg-9 {
                flex: 0 0 100%;
                max-width: 100%;
            }
            .border-end-lg {
                border-right: none !important;
                margin-bottom: 20px;
            }
            .ps-lg-4 {
                padding-left: 0 !important;
            }
            .profile-frame {
                margin: 0 auto;
            }
            .label-text, .value-text {
                font-size: 0.85rem;
                text-transform: none;
            }
        }
        
        /* Fix for long text wrapping */
        .value-text {
            word-break: break-word;
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

            <!-- NAVBAR MENU SESUAI DENGAN HALAMAN PENGUMUMAN -->
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
                        <li><a class="dropdown-item" href="{{ route('santri.profil') }}"><i class="fas fa-user me-2 text-muted"></i> Profil Saya</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><form action="{{ route('santri.logout') }}" method="POST" style="display: inline;"><a class="dropdown-item text-danger fw-bold" onclick="this.closest('form').submit(); return false;"><i class="fas fa-sign-out-alt me-2"></i> Keluar</a>@csrf</form></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- SIDEBAR MENU SESUAI DENGAN HALAMAN PENGUMUMAN -->
    <aside class="sidebar" id="sidebar">
        <div class="menu-category">Menu Utama</div>
        <nav class="nav flex-column">
            <a href="{{ route('santri.dashboard') }}" class="nav-link-custom"><i class="fas fa-th-large"></i> Dashboard</a>
            <a href="{{ route('santri.formulir') }}" class="nav-link-custom"><i class="fas fa-file-signature"></i> Formulir Data</a>
            <a href="{{ route('santri.upload') }}" class="nav-link-custom"><i class="fas fa-cloud-upload-alt"></i> Upload Berkas</a>
            <a href="{{ route('santri.kartu') }}" class="nav-link-custom active"><i class="fas fa-id-card"></i> Kartu Pendaftaran</a>
            <a href="{{ route('santri.pernyataan') }}" class="nav-link-custom"><i class="fas fa-file-contract"></i> Surat Pernyataan</a>
        </nav>

        <div class="menu-category">Informasi</div>
        <nav class="nav flex-column">
            <a href="{{ route('santri.pembayaran') }}" class="nav-link-custom"><i class="fas fa-wallet"></i> Pembayaran</a>
            <a href="{{ route('santri.pengumuman') }}" class="nav-link-custom"><i class="fas fa-bullhorn"></i> Pengumuman</a>
        </nav>

        <div class="mt-auto pt-5">
            <form action="{{ route('santri.logout') }}" method="POST">
                <button type="submit" class="btn btn-outline-light w-100 rounded-pill btn-sm opacity-75 border-0">
                    <i class="fas fa-sign-out-alt me-2"></i> Log Out
                </button>
                @csrf
            </form>
        </div>
    </aside>

    <main class="main-content">
        
        <div class="card-pendaftaran">
            <div class="card-header-title">
                <i class="fas fa-cloud-upload-alt"></i> Upload Dokumen Pendaftaran PSB
            </div>
            <div class="card-body p-4">
                <!-- KONTEN UPLOAD DOKUMEN TETAP SAMA SEPERTI SEMULA -->
                <div class="row">
                    <div class="col-lg-3 text-center mb-4 mb-lg-0">
                        <img src="https://via.placeholder.com/150" class="profile-frame" alt="Foto Santriwati">
                        <div class="d-block mt-3">
                            <span class="status-badge"><i class="fas fa-check-circle me-1"></i> Data Lengkap</span>
                        </div>
                    </div>

                    <div class="col-lg-9">
                        <table class="data-table">
                            <tr>
                                <td class="label-text">No. Pendaftaran</td>
                                <td class="value-text">PSB/2025/AQBS/008</td>
                            </tr>
                            <tr>
                                <td class="label-text">Nama Lengkap</td>
                                <td class="value-text">Bebelll4</td>
                            </tr>
                            <tr>
                                <td class="label-text">NISN</td>
                                <td class="value-text">1234567789</td>
                            </tr>
                            <tr>
                                <td class="label-text">Program Pendidikan</td>
                                <td class="value-text">SMP AQBS Ponorogo</td>
                            </tr>
                            <tr>
                                <td class="label-text">Orang Tua / Wali</td>
                                <td class="value-text">Nani</td>
                            </tr>
                        </table>

                        <div class="btn-group-custom">
                            <button class="btn-custom btn-blue" onclick="downloadFormulir()">
                                <i class="fas fa-download"></i> Download Formulir
                            </button>
                            <button class="btn-custom btn-green" onclick="downloadSuratPernyataan()">
                                <i class="fas fa-file-contract"></i> Download Surat
                            </button>
                            <button class="btn-custom btn-orange" onclick="printKartuPendaftaran()">
                                <i class="fas fa-print"></i> Cetak Kartu
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Status Pembayaran -->
                <div class="status-pembayaran" id="statusPembayaran">
                    <!-- Status akan diisi oleh JavaScript -->
                </div>

                <!-- Info Panel -->
                <div class="info-panel">
                    <div class="info-panel-title">
                        <i class="fas fa-info-circle"></i> Informasi Penting dari Panitia PSB
                    </div>
                    <div class="info-panel-content">
                        <p><strong>Perhatian:</strong> Kedua dokumen berikut HARUS ditandatangani oleh <strong>Santriwati dan Orang Tua/Wali</strong>:</p>
                        <ol>
                            <li><strong>Formulir Pendaftaran:</strong> Tanda tangan santriwati <strong>DAN</strong> orang tua/wali</li>
                            <li><strong>Surat Pernyataan:</strong> Tanda tangan santriwati <strong>DAN</strong> orang tua/wali</li>
                            <li>Data telah terisi otomatis oleh sistem PSB</li>
                            <li>Jangan mengubah data yang sudah tercetak</li>
                            <li>Scan dokumen setelah ditandatangani semua pihak</li>
                            <li><strong>Kartu Ujian</strong> hanya dapat diakses setelah melakukan pembayaran</li>
                        </ol>
                    </div>
                </div>

                <!-- Signature Requirements -->
                <div class="requirements-box">
                    <div class="requirements-title">
                        <i class="fas fa-signature"></i> Syarat Tanda Tangan untuk Kedua Dokumen
                    </div>
                    
                    <div class="requirement-item">
                        <i class="fas fa-user-graduate req-icon"></i>
                        <div class="req-content">
                            <h6>Calon Santriwati (Bebelll4)</h6>
                            <p>Harus menandatangani <strong>kedua dokumen</strong> di tempat yang disediakan. Tanda tangan harus sama dengan identitas.</p>
                        </div>
                    </div>
                    
                    <div class="requirement-item">
                        <i class="fas fa-user-friends req-icon"></i>
                        <div class="req-content">
                            <h6>Orang Tua/Wali (Nani)</h6>
                            <p>Harus menandatangani <strong>kedua dokumen</strong> di tempat yang disediakan. Tanda tangan harus sama dengan KTP.</p>
                        </div>
                    </div>
                    
                    <div class="requirement-item">
                        <i class="fas fa-file-signature req-icon"></i>
                        <div class="req-content">
                            <h6>Format Tanda Tangan</h6>
                            <p>Gunakan tinta hitam, tanda tangan jelas, dan jangan menggunakan stempel. Pastikan semua halaman ditandatangani jika lebih dari 1 halaman.</p>
                        </div>
                    </div>
                </div>

                <!-- Upload Formulir Section -->
                <div class="upload-section">
                    <div class="upload-header">
                        <i class="fas fa-file-upload"></i> Upload Dokumen yang Sudah Ditandatangani Lengkap
                    </div>
                    
                    <div class="upload-instructions">
                        <p>Upload kedua dokumen yang sudah ditandatangani lengkap oleh <strong>santriwati dan orang tua/wali</strong>:</p>
                        <ul>
                            <li><strong>Data sudah terisi otomatis</strong> oleh sistem PSB</li>
                            <li><strong>Kedua dokumen</strong> harus ditandatangani oleh <strong>Bebelll4 (Santriwati) dan Nani (Orang Tua/Wali)</strong></li>
                            <li>File dalam format PDF (max. 2MB per file)</li>
                            <li>Pastikan scan dokumen jelas dan semua tanda tangan terbaca</li>
                            <li>Upload formulir dan surat pernyataan secara terpisah</li>
                        </ul>
                    </div>

                    <div id="uploadAlert" class="alert" style="display: none;"></div>

                    <!-- Formulir Upload Box -->
                    <div class="upload-box" id="formulirBox">
                        <div class="upload-box-title">
                            <i class="fas fa-file-signature"></i> Formulir Pendaftaran PSB
                        </div>
                        
                        <div class="signature-notes">
                            <h6><i class="fas fa-signature signature-icon"></i> TANDA TANGAN WAJIB PADA FORMULIR INI:</h6>
                            <ul class="signature-list">
                                <li>
                                    <span class="signature-person">CALON SANTRIWATI</span>
                                    <span class="signature-detail">Bebelll4 harus menandatangani di kolom "Tanda Tangan Calon Santriwati"</span>
                                </li>
                                <li>
                                    <span class="signature-person">ORANG TUA/WALI</span>
                                    <span class="signature-detail">Nani harus menandatangani di kolom "Tanda Tangan Orang Tua/Wali"</span>
                                </li>
                            </ul>
                            <p class="mt-3 mb-0 text-muted small"><i class="fas fa-exclamation-circle"></i> <strong>KEDUA PIHAK HARUS MENANDATANGANI</strong></p>
                        </div>
                        
                        <div class="upload-box-instructions">
                            Upload formulir pendaftaran yang sudah ditandatangani lengkap oleh santriwati dan orang tua/wali.
                        </div>
                        
                        <div class="file-input-wrapper">
                            <input type="file" id="formulirInput" class="file-input" accept=".pdf">
                            <label for="formulirInput" class="file-label">
                                <i class="fas fa-file-upload me-2"></i> Upload Formulir Lengkap (PDF, max 2MB)
                            </label>
                        </div>

                        <div class="upload-status">
                            <div>
                                <span id="formulirStatusText" class="text-muted small">Belum diupload</span>
                            </div>
                            <button class="btn-upload btn-sm" id="uploadFormulirBtn" onclick="uploadFormulir()" disabled>
                                <i class="fas fa-cloud-upload-alt"></i> Upload Formulir
                            </button>
                        </div>

                        <div class="upload-preview" id="formulirPreview"></div>
                    </div>

                    <!-- Surat Pernyataan Upload Box -->
                    <div class="upload-box" id="suratBox">
                        <div class="upload-box-title">
                            <i class="fas fa-file-contract"></i> Surat Pernyataan PSB
                        </div>
                        
                        <div class="signature-notes">
                            <h6><i class="fas fa-signature signature-icon"></i> TANDA TANGAN WAJIB PADA SURAT INI:</h6>
                            <ul class="signature-list">
                                <li>
                                    <span class="signature-person">CALON SANTRIWATI</span>
                                    <span class="signature-detail">Bebelll4 harus menandatangani di bagian "Tanda Tangan Calon Santri"</span>
                                </li>
                                <li>
                                    <span class="signature-person">ORANG TUA/WALI</span>
                                    <span class="signature-detail">Nani harus menandatangani di bagian "Tanda Tangan Orang Tua/Wali"</span>
                                </li>
                            </ul>
                            <p class="mt-3 mb-0 text-muted small"><i class="fas fa-exclamation-circle"></i> <strong>KEDUA PIHAK HARUS MENANDATANGANI</strong></p>
                        </div>
                        
                        <div class="upload-box-instructions">
                            Upload surat pernyataan yang sudah ditandatangani lengkap oleh santriwati dan orang tua/wali.
                        </div>
                        
                        <div class="file-input-wrapper">
                            <input type="file" id="suratInput" class="file-input" accept=".pdf">
                            <label for="suratInput" class="file-label">
                                <i class="fas fa-file-upload me-2"></i> Upload Surat Lengkap (PDF, max 2MB)
                            </label>
                        </div>

                        <div class="upload-status">
                            <div>
                                <span id="suratStatusText" class="text-muted small">Belum diupload</span>
                            </div>
                            <button class="btn-upload btn-sm" id="uploadSuratBtn" onclick="uploadSuratPernyataan()" disabled>
                                <i class="fas fa-cloud-upload-alt"></i> Upload Surat
                            </button>
                        </div>

                        <div class="upload-preview" id="suratPreview"></div>
                    </div>
                </div>

                <!-- Status Upload Section -->
                <div class="status-upload">
                    <div class="status-title">
                        <i class="fas fa-clipboard-check"></i> Status Upload Dokumen PSB
                    </div>
                    
                    <div class="status-item">
                        <div class="status-info">
                            <i class="fas fa-file-signature status-icon" id="formulirStatusIcon"></i>
                            <span class="status-text">Formulir Pendaftaran (Ttd. Santriwati & Orang Tua)</span>
                        </div>
                        <span id="formulirStatusBadge" class="not-uploaded-badge">Belum Upload</span>
                    </div>
                    
                    <div class="status-item">
                        <div class="status-info">
                            <i class="fas fa-file-contract status-icon" id="suratStatusIcon"></i>
                            <span class="status-text">Surat Pernyataan (Ttd. Santriwati & Orang Tua)</span>
                        </div>
                        <span id="suratStatusBadge" class="not-uploaded-badge">Belum Upload</span>
                    </div>
                </div>

                <!-- Notes Print Section -->
                <div class="notes-section">
                    <div class="notes-title">
                        <i class="fas fa-exclamation-triangle"></i> Instruksi Penting dari Panitia PSB
                    </div>
                    <ul class="notes-list">
                        <li><strong>KEDUA DOKUMEN HARUS DITANDATANGANI OLEH KEDUA PIHAK:</strong> Santriwati <strong>DAN</strong> Orang Tua/Wali</li>
                        <li><strong>Data telah diisi otomatis</strong> oleh sistem berdasarkan informasi pendaftaran Anda</li>
                        <li><strong>Jangan mengisi/mengubah data</strong> pada formulir yang sudah tercetak</li>
                        <li><strong>Formulir Pendaftaran:</strong> Tanda tangan <strong>Bebelll4 (Santriwati)</strong> dan <strong>Nani (Orang Tua/Wali)</strong></li>
                        <li><strong>Surat Pernyataan:</strong> Tanda tangan <strong>Bebelll4 (Santriwati)</strong> dan <strong>Nani (Orang Tua/Wali)</strong></li>
                        <li>Pastikan tanda tangan jelas dan sesuai dengan identitas masing-masing</li>
                        <li>Gunakan tinta hitam untuk tanda tangan (jangan menggunakan pensil atau stempel)</li>
                        <li>Jika dokumen lebih dari 1 halaman, pastikan tanda tangan ada di setiap halaman yang disyaratkan</li>
                        <li>Scan dokumen dengan resolusi minimal 300 DPI untuk kejelasan tanda tangan</li>
                        <li>File PDF maksimal 2MB, pastikan semua halaman ter-scan dengan baik</li>
                        <li><strong>KARTU UJIAN</strong> hanya dapat diakses setelah pembayaran biaya pendaftaran lunas</li>
                        <li>Proses seleksi hanya dapat dilakukan setelah kedua dokumen diupload dengan tanda tangan lengkap</li>
                        <li>Hubungi Panitia PSB di <strong>0857-XXXX-XXXX</strong> jika ada kendala atau pertanyaan</li>
                        <li>Simpan dokumen asli yang sudah ditandatangani untuk keperluan administrasi selanjutnya</li>
                    </ul>
                </div>
            </div>
        </div>

    </main>

    <!-- Modal Kartu Ujian -->
    <div class="modal-overlay" id="modalKartuUjian">
        <div class="modal-kartu">
            <div class="kartu-header">
                <div class="kartu-title">KARTU PESERTA UJIAN</div>
                <div class="kartu-subtitle">PSB ONLINE AQLAN QUR'ANIC BOARDING SCHOOL PONOROGO</div>
                <div class="mt-3">
                    <span class="badge bg-light text-dark fs-6">TAHUN AJARAN 2025/2026</span>
                </div>
            </div>
            
            <div class="kartu-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="kartu-info">
                            <div class="kartu-info-item">
                                <div class="kartu-info-label">Nomor Peserta</div>
                                <div class="kartu-info-value">PSB-2025-008</div>
                            </div>
                            <div class="kartu-info-item">
                                <div class="kartu-info-label">Nama Lengkap</div>
                                <div class="kartu-info-value">Bebelll4</div>
                            </div>
                            <div class="kartu-info-item">
                                <div class="kartu-info-label">Program Pendidikan</div>
                                <div class="kartu-info-value">SMP AQBS Ponorogo</div>
                            </div>
                            <div class="kartu-info-item">
                                <div class="kartu-info-label">Tanggal Ujian</div>
                                <div class="kartu-info-value">15 Juli 2025</div>
                            </div>
                            <div class="kartu-info-item">
                                <div class="kartu-info-label">Waktu Ujian</div>
                                <div class="kartu-info-value">08.00 - 12.00 WIB</div>
                            </div>
                            <div class="kartu-info-item">
                                <div class="kartu-info-label">Ruangan</div>
                                <div class="kartu-info-value">Ruang A-12</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="qr-code-container">
                            <div class="qr-code-placeholder">
                                <i class="fas fa-qrcode fa-4x text-muted"></i>
                            </div>
                            <p class="text-muted small">Scan QR Code untuk validasi peserta</p>
                        </div>
                    </div>
                </div>
                
                <!-- Mata Ujian Section -->
                <div class="mata-ujian-section">
                    <h3 class="mata-ujian-title">
                        <i class="fas fa-book-open"></i> MATA UJIAN DAN LINK UJIAN
                    </h3>
                    
                    <!-- Matematika -->
                    <div class="ujian-card">
                        <div class="ujian-header">
                            <div class="ujian-nama">MATEMATIKA</div>
                            <div class="ujian-kode">Kode: MTK-001</div>
                        </div>
                        
                        <div class="ujian-info">
                            <div class="ujian-info-item">
                                <i class="fas fa-clock ujian-info-icon"></i>
                                <div>
                                    <div class="ujian-info-label">Waktu Ujian</div>
                                    <div class="ujian-info-value">08.00 - 09.30 WIB</div>
                                </div>
                            </div>
                            <div class="ujian-info-item">
                                <i class="fas fa-list-ol ujian-info-icon"></i>
                                <div>
                                    <div class="ujian-info-label">Jumlah Soal</div>
                                    <div class="ujian-info-value">40 Soal Pilihan Ganda</div>
                                </div>
                            </div>
                            <div class="ujian-info-item">
                                <i class="fas fa-user-check ujian-info-icon"></i>
                                <div>
                                    <div class="ujian-info-label">Pengawas</div>
                                    <div class="ujian-info-value">Ustadz Ahmad Fauzi, S.Pd.</div>
                                </div>
                            </div>
                            <div class="ujian-info-item">
                                <i class="fas fa-graduation-cap ujian-info-icon"></i>
                                <div>
                                    <div class="ujian-info-label">Materi Ujian</div>
                                    <div class="ujian-info-value">Aljabar, Geometri, Aritmatika</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="link-ujian-container">
                            <div class="link-ujian-title">
                                <i class="fas fa-link"></i> LINK UJIAN MATEMATIKA
                            </div>
                            <div class="link-ujian-description">
                                Klik tombol di bawah ini untuk mengakses soal ujian Matematika.
                                Link akan aktif sesuai jadwal ujian.
                            </div>
                            <a href="https://ujian.aqbs-ponorogo.ac.id/matematika/psb-2025-008" target="_blank" class="btn-link-ujian">
                                <i class="fas fa-external-link-alt"></i> BUKA UJIAN MATEMATIKA
                            </a>
                            <div class="link-status aktif">
                                <i class="fas fa-check-circle"></i> Link aktif mulai 15 Juli 2025, 07.30 WIB
                            </div>
                        </div>
                    </div>
                    
                    <!-- Bahasa Indonesia -->
                    <div class="ujian-card">
                        <div class="ujian-header">
                            <div class="ujian-nama">BAHASA INDONESIA</div>
                            <div class="ujian-kode">Kode: BIND-002</div>
                        </div>
                        
                        <div class="ujian-info">
                            <div class="ujian-info-item">
                                <i class="fas fa-clock ujian-info-icon"></i>
                                <div>
                                    <div class="ujian-info-label">Waktu Ujian</div>
                                    <div class="ujian-info-value">09.45 - 11.15 WIB</div>
                                </div>
                            </div>
                            <div class="ujian-info-item">
                                <i class="fas fa-list-ol ujian-info-icon"></i>
                                <div>
                                    <div class="ujian-info-label">Jumlah Soal</div>
                                    <div class="ujian-info-value">50 Soal Pilihan Ganda</div>
                                </div>
                            </div>
                            <div class="ujian-info-item">
                                <i class="fas fa-user-check ujian-info-icon"></i>
                                <div>
                                    <div class="ujian-info-label">Pengawas</div>
                                    <div class="ujian-info-value">Ustadzah Dewi Rahmawati, M.Pd.</div>
                                </div>
                            </div>
                            <div class="ujian-info-item">
                                <i class="fas fa-graduation-cap ujian-info-icon"></i>
                                <div>
                                    <div class="ujian-info-label">Materi Ujian</div>
                                    <div class="ujian-info-value">Membaca, Menulis, Tata Bahasa</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="link-ujian-container">
                            <div class="link-ujian-title">
                                <i class="fas fa-link"></i> LINK UJIAN BAHASA INDONESIA
                            </div>
                            <div class="link-ujian-description">
                                Klik tombol di bawah ini untuk mengakses soal ujian Bahasa Indonesia.
                                Link akan aktif sesuai jadwal ujian.
                            </div>
                            <a href="https://ujian.aqbs-ponorogo.ac.id/bahasa-indonesia/psb-2025-008" target="_blank" class="btn-link-ujian">
                                <i class="fas fa-external-link-alt"></i> BUKA UJIAN BAHASA INDONESIA
                            </a>
                            <div class="link-status aktif">
                                <i class="fas fa-check-circle"></i> Link aktif mulai 15 Juli 2025, 09.30 WIB
                            </div>
                        </div>
                    </div>
                    
                    <!-- IPA -->
                    <div class="ujian-card">
                        <div class="ujian-header">
                            <div class="ujian-nama">ILMU PENGETAHUAN ALAM (IPA)</div>
                            <div class="ujian-kode">Kode: IPA-003</div>
                        </div>
                        
                        <div class="ujian-info">
                            <div class="ujian-info-item">
                                <i class="fas fa-clock ujian-info-icon"></i>
                                <div>
                                    <div class="ujian-info-label">Waktu Ujian</div>
                                    <div class="ujian-info-value">11.30 - 12.30 WIB</div>
                                </div>
                            </div>
                            <div class="ujian-info-item">
                                <i class="fas fa-list-ol ujian-info-icon"></i>
                                <div>
                                    <div class="ujian-info-label">Jumlah Soal</div>
                                    <div class="ujian-info-value">30 Soal Pilihan Ganda</div>
                                </div>
                            </div>
                            <div class="ujian-info-item">
                                <i class="fas fa-user-check ujian-info-icon"></i>
                                <div>
                                    <div class="ujian-info-label">Pengawas</div>
                                    <div class="ujian-info-value">Ustadz Muhammad Arif, S.Pd.</div>
                                </div>
                            </div>
                            <div class="ujian-info-item">
                                <i class="fas fa-graduation-cap ujian-info-icon"></i>
                                <div>
                                    <div class="ujian-info-label">Materi Ujian</div>
                                    <div class="ujian-info-value">Fisika, Biologi, Kimia Dasar</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="link-ujian-container">
                            <div class="link-ujian-title">
                                <i class="fas fa-link"></i> LINK UJIAN IPA
                            </div>
                            <div class="link-ujian-description">
                                Klik tombol di bawah ini untuk mengakses soal ujian IPA.
                                Link akan aktif sesuai jadwal ujian.
                            </div>
                            <a href="https://ujian.aqbs-ponorogo.ac.id/ipa/psb-2025-008" target="_blank" class="btn-link-ujian">
                                <i class="fas fa-external-link-alt"></i> BUKA UJIAN IPA
                            </a>
                            <div class="link-status aktif">
                                <i class="fas fa-check-circle"></i> Link aktif mulai 15 Juli 2025, 11.15 WIB
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4 p-3" style="background: #f8f9fa; border-radius: 10px;">
                    <h5><i class="fas fa-clipboard-list"></i> Perlengkapan yang Harus Dibawa:</h5>
                    <ul class="mb-0">
                        <li>Kartu Ujian ini (dicetak atau dalam bentuk digital)</li>
                        <li>Kartu Identitas (KTP/SIM/Akte Kelahiran)</li>
                        <li>Alat tulis (pensil 2B, penghapus, rautan)</li>
                        <li>Smartphone/laptop dengan koneksi internet stabil (untuk ujian online)</li>
                        <li>Kalkulator sederhana (untuk ujian Matematika)</li>
                    </ul>
                </div>
            </div>
            
            <div class="kartu-footer">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fas fa-print"></i> Cetak kartu ini sebagai bukti peserta ujian
                    </div>
                    <button class="btn btn-primary btn-sm" onclick="cetakKartuUjian()">
                        <i class="fas fa-print"></i> Cetak Kartu
                    </button>
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
        function toggleMenu() { sidebar.classList.toggle('show'); overlay.classList.toggle('show'); }
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

        // Status Pembayaran Data (dari database)
        let statusPembayaran = "{!! $statusPembayaran ?? 'pending' !!}"; // "pending", "success", "failed"
        let biayaPendaftaran = {!! $biayaPendaftaran ?? 250000 !!};
        
        // Data mata ujian dari database
        const mataUjianData = {!! json_encode($mataUjianData ?? []) !!};
        
        // Update status pembayaran display
        function updateStatusPembayaran() {
            const statusDiv = document.getElementById('statusPembayaran');
            let html = '';
            
            if (statusPembayaran === "success") {
                html = `
                    <div class="status-pembayaran-icon success">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="status-pembayaran-title">Pembayaran Berhasil</div>
                    <div class="status-pembayaran-desc">
                        Biaya pendaftaran sebesar <strong>Rp ${biayaPendaftaran.toLocaleString('id-ID')}</strong> telah berhasil dibayar.
                        Anda sekarang dapat mengakses kartu ujian dan link soal ujian.
                    </div>
                    <div>
                        <button class="btn-bayar" onclick="lihatKartuUjian()">
                            <i class="fas fa-id-card"></i> Lihat Kartu Ujian
                        </button>
                    </div>
                `;
            } else if (statusPembayaran === "pending") {
                html = `
                    <div class="status-pembayaran-icon pending">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="status-pembayaran-title">Menunggu Pembayaran</div>
                    <div class="status-pembayaran-desc">
                        Biaya pendaftaran sebesar <strong>Rp ${biayaPendaftaran.toLocaleString('id-ID')}</strong> belum dibayar.
                        Untuk mengakses kartu ujian dan link soal, silakan lakukan pembayaran terlebih dahulu.
                    </div>
                    <div>
                        <button class="btn-bayar" onclick="prosesPembayaran()">
                            <i class="fas fa-credit-card"></i> Bayar Sekarang
                        </button>
                    </div>
                `;
            } else {
                html = `
                    <div class="status-pembayaran-icon danger">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="status-pembayaran-title">Pembayaran Gagal</div>
                    <div class="status-pembayaran-desc">
                        Terjadi kesalahan dalam proses pembayaran. Silakan coba lagi atau hubungi panitia PSB untuk bantuan.
                    </div>
                    <div>
                        <button class="btn-bayar" onclick="prosesPembayaran()">
                            <i class="fas fa-redo"></i> Coba Lagi
                        </button>
                    </div>
                `;
            }
            
            statusDiv.innerHTML = html;
        }
        
        // Simulasi proses pembayaran
        function prosesPembayaran() {
            const uploadAlert = document.getElementById('uploadAlert');
            uploadAlert.innerHTML = `
                <div class="alert alert-info">
                    <i class="fas fa-spinner fa-spin"></i> Membuka halaman pembayaran...
                </div>
            `;
            uploadAlert.style.display = 'block';
            
            // Simulasi delay pembayaran
            setTimeout(() => {
                const konfirmasi = confirm("Apakah Anda ingin menyelesaikan pembayaran sebesar Rp 250.000?");
                
                if (konfirmasi) {
                    // Simulasi pembayaran berhasil
                    statusPembayaran = "success";
                    updateStatusPembayaran();
                    
                    uploadAlert.innerHTML = `
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle"></i> Pembayaran berhasil! Kartu ujian sekarang dapat diakses.
                        </div>
                    `;
                    uploadAlert.style.display = 'block';
                    
                    // Tampilkan kartu ujian setelah 2 detik
                    setTimeout(() => {
                        lihatKartuUjian();
                    }, 2000);
                } else {
                    uploadAlert.innerHTML = `
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle"></i> Pembayaran dibatalkan. Kartu ujian hanya dapat diakses setelah pembayaran.
                        </div>
                    `;
                    uploadAlert.style.display = 'block';
                }
                
                // Hide alert after 5 seconds
                setTimeout(() => {
                    uploadAlert.style.display = 'none';
                }, 5000);
            }, 1500);
        }
        
        // Tampilkan kartu ujian
        function lihatKartuUjian() {
            if (statusPembayaran === "success") {
                const modal = document.getElementById('modalKartuUjian');
                modal.classList.add('show');
            } else {
                const uploadAlert = document.getElementById('uploadAlert');
                uploadAlert.innerHTML = `
                    <div class="alert alert-danger">
                        <i class="fas fa-lock"></i> Akses ditolak! Anda harus menyelesaikan pembayaran terlebih dahulu untuk melihat kartu ujian.
                    </div>
                `;
                uploadAlert.style.display = 'block';
                
                setTimeout(() => {
                    uploadAlert.style.display = 'none';
                }, 5000);
            }
        }
        
        // Tutup modal kartu ujian
        document.getElementById('modalKartuUjian').addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.remove('show');
            }
        });
        
        // Cetak kartu ujian
        function cetakKartuUjian() {
            window.print();
        }

        // File Upload Variables
        let formulirFile = null;
        let suratFile = null;
        const uploadAlert = document.getElementById('uploadAlert');
        
        // Data dari sistem
        const dataSantri = {
            nama: "Bebelll4",
            noPendaftaran: "PSB/2025/AQBS/008",
            orangTua: "Nani"
        };
        
        // Formulir Upload Logic
        const formulirInput = document.getElementById('formulirInput');
        const formulirPreview = document.getElementById('formulirPreview');
        const uploadFormulirBtn = document.getElementById('uploadFormulirBtn');
        const formulirStatusText = document.getElementById('formulirStatusText');
        const formulirStatusIcon = document.getElementById('formulirStatusIcon');
        const formulirStatusBadge = document.getElementById('formulirStatusBadge');

        formulirInput.addEventListener('change', function(e) {
            if (e.target.files && e.target.files[0]) {
                const file = e.target.files[0];
                
                // Validate file
                if (validateFile(file, 'formulir')) {
                    formulirFile = file;
                    updateFormulirPreview();
                    uploadFormulirBtn.disabled = false;
                    formulirStatusText.innerHTML = `<span class="text-success"><i class="fas fa-check"></i> Siap diupload: ${file.name}</span>`;
                } else {
                    formulirFile = null;
                    uploadFormulirBtn.disabled = true;
                }
            }
        });

        // Surat Pernyataan Upload Logic
        const suratInput = document.getElementById('suratInput');
        const suratPreview = document.getElementById('suratPreview');
        const uploadSuratBtn = document.getElementById('uploadSuratBtn');
        const suratStatusText = document.getElementById('suratStatusText');
        const suratStatusIcon = document.getElementById('suratStatusIcon');
        const suratStatusBadge = document.getElementById('suratStatusBadge');

        suratInput.addEventListener('change', function(e) {
            if (e.target.files && e.target.files[0]) {
                const file = e.target.files[0];
                
                // Validate file
                if (validateFile(file, 'surat')) {
                    suratFile = file;
                    updateSuratPreview();
                    uploadSuratBtn.disabled = false;
                    suratStatusText.innerHTML = `<span class="text-success"><i class="fas fa-check"></i> Siap diupload: ${file.name}</span>`;
                } else {
                    suratFile = null;
                    uploadSuratBtn.disabled = true;
                }
            }
        });

        function validateFile(file, type) {
            // Check file type
            if (file.type !== 'application/pdf') {
                showAlert(`File ${type === 'formulir' ? 'formulir' : 'surat pernyataan'} harus dalam format PDF.`, 'danger');
                return false;
            }
            
            // Check file size (max 2MB)
            if (file.size > 2 * 1024 * 1024) {
                showAlert(`File ${type === 'formulir' ? 'formulir' : 'surat pernyataan'} terlalu besar. Maksimal 2MB.`, 'danger');
                return false;
            }
            
            return true;
        }

        function updateFormulirPreview() {
            formulirPreview.innerHTML = '';
            
            if (!formulirFile) {
                formulirPreview.classList.remove('show');
                return;
            }
            
            const fileSize = (formulirFile.size / (1024 * 1024)).toFixed(2);
            
            const previewItem = document.createElement('div');
            previewItem.className = 'preview-item';
            previewItem.innerHTML = `
                <div class="file-info">
                    <i class="fas fa-file-pdf file-icon"></i>
                    <div class="file-details">
                        <h5>${formulirFile.name}</h5>
                        <p>${fileSize} MB • Formulir Pendaftaran</p>
                        <p class="text-success"><i class="fas fa-user-graduate"></i> <i class="fas fa-user-friends"></i> Harus ditandatangani: <strong>${dataSantri.nama}</strong> dan <strong>${dataSantri.orangTua}</strong></p>
                    </div>
                </div>
                <div class="file-actions">
                    <button class="btn-action btn-view" onclick="viewFormulirFile()" title="Lihat PDF">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button class="btn-action btn-delete" onclick="removeFormulirFile()" title="Hapus">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `;
            formulirPreview.appendChild(previewItem);
            formulirPreview.classList.add('show');
        }

        function updateSuratPreview() {
            suratPreview.innerHTML = '';
            
            if (!suratFile) {
                suratPreview.classList.remove('show');
                return;
            }
            
            const fileSize = (suratFile.size / (1024 * 1024)).toFixed(2);
            
            const previewItem = document.createElement('div');
            previewItem.className = 'preview-item';
            previewItem.innerHTML = `
                <div class="file-info">
                    <i class="fas fa-file-pdf file-icon"></i>
                    <div class="file-details">
                        <h5>${suratFile.name}</h5>
                        <p>${fileSize} MB • Surat Pernyataan</p>
                        <p class="text-success"><i class="fas fa-user-graduate"></i> <i class="fas fa-user-friends"></i> Harus ditandatangani: <strong>${dataSantri.nama}</strong> dan <strong>${dataSantri.orangTua}</strong></p>
                    </div>
                </div>
                <div class="file-actions">
                    <button class="btn-action btn-view" onclick="viewSuratFile()" title="Lihat PDF">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button class="btn-action btn-delete" onclick="removeSuratFile()" title="Hapus">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `;
            suratPreview.appendChild(previewItem);
            suratPreview.classList.add('show');
        }

        function viewFormulirFile() {
            if (formulirFile) {
                const fileURL = URL.createObjectURL(formulirFile);
                window.open(fileURL, '_blank');
            }
        }

        function viewSuratFile() {
            if (suratFile) {
                const fileURL = URL.createObjectURL(suratFile);
                window.open(fileURL, '_blank');
            }
        }

        function removeFormulirFile() {
            formulirFile = null;
            formulirInput.value = '';
            formulirPreview.innerHTML = '';
            formulirPreview.classList.remove('show');
            uploadFormulirBtn.disabled = true;
            formulirStatusText.innerHTML = `<span class="text-muted">Belum diupload</span>`;
            updateUploadStatus();
        }

        function removeSuratFile() {
            suratFile = null;
            suratInput.value = '';
            suratPreview.innerHTML = '';
            suratPreview.classList.remove('show');
            uploadSuratBtn.disabled = true;
            suratStatusText.innerHTML = `<span class="text-muted">Belum diupload</span>`;
            updateUploadStatus();
        }

        function uploadFormulir() {
            if (!formulirFile) {
                showAlert('Silakan pilih file formulir terlebih dahulu.', 'danger');
                return;
            }
            
            // Confirm signature requirement
            if (!confirm(`Apakah formulir ini sudah ditandatangani LENGKAP oleh:\n\n1. ${dataSantri.nama} (Calon Santriwati)\n2. ${dataSantri.orangTua} (Orang Tua/Wali)\n\nPastikan kedua tanda tangan sudah ada sebelum mengupload.`)) {
                return;
            }
            
            // Simulate upload process
            showAlert(`Mengupload formulir pendaftaran yang sudah ditandatangani oleh ${dataSantri.nama} dan ${dataSantri.orangTua}...`, 'info');
            uploadFormulirBtn.disabled = true;
            uploadFormulirBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengupload...';
            
            // Simulate server upload delay
            setTimeout(() => {
                showAlert(`✓ Formulir pendaftaran berhasil diupload dengan tanda tangan lengkap dari ${dataSantri.nama} dan ${dataSantri.orangTua}.`, 'success');
                uploadFormulirBtn.innerHTML = '<i class="fas fa-check"></i> Terupload Lengkap';
                uploadFormulirBtn.disabled = true;
                
                // Update status
                formulirStatusIcon.className = "fas fa-file-signature status-icon success";
                formulirStatusBadge.textContent = "Sudah Upload";
                formulirStatusBadge.className = "uploaded-badge";
                formulirStatusText.innerHTML = `<span class="text-success"><i class="fas fa-check-double"></i> Terupload - Ttd: ${dataSantri.nama} & ${dataSantri.orangTua}</span>`;
                
                updateUploadStatus();
            }, 2000);
        }

        function uploadSuratPernyataan() {
            if (!suratFile) {
                showAlert('Silakan pilih file surat pernyataan terlebih dahulu.', 'danger');
                return;
            }
            
            // Confirm signature requirement
            if (!confirm(`Apakah surat pernyataan ini sudah ditandatangani LENGKAP oleh:\n\n1. ${dataSantri.nama} (Calon Santriwati)\n2. ${dataSantri.orangTua} (Orang Tua/Wali)\n\nPastikan kedua tanda tangan sudah ada sebelum mengupload.`)) {
                return;
            }
            
            // Simulate upload process
            showAlert(`Mengupload surat pernyataan yang sudah ditandatangani oleh ${dataSantri.nama} dan ${dataSantri.orangTua}...`, 'info');
            uploadSuratBtn.disabled = true;
            uploadSuratBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengupload...';
            
            // Simulate server upload delay
            setTimeout(() => {
                showAlert(`✓ Surat pernyataan berhasil diupload dengan tanda tangan lengkap dari ${dataSantri.nama} dan ${dataSantri.orangTua}.`, 'success');
                uploadSuratBtn.innerHTML = '<i class="fas fa-check"></i> Terupload Lengkap';
                uploadSuratBtn.disabled = true;
                
                // Update status
                suratStatusIcon.className = "fas fa-file-contract status-icon success";
                suratStatusBadge.textContent = "Sudah Upload";
                suratStatusBadge.className = "uploaded-badge";
                suratStatusText.innerHTML = `<span class="text-success"><i class="fas fa-check-double"></i> Terupload - Ttd: ${dataSantri.nama} & ${dataSantri.orangTua}</span>`;
                
                updateUploadStatus();
            }, 2000);
        }

        function updateUploadStatus() {
            // Check if both files are uploaded
            const formulirUploaded = formulirStatusBadge.textContent === "Sudah Upload";
            const suratUploaded = suratStatusBadge.textContent === "Sudah Upload";
            
            if (formulirUploaded && suratUploaded) {
                showAlert('🎉 SELAMAT! Semua dokumen PSB telah diupload dengan tanda tangan lengkap. Pendaftaran Anda telah lengkap dan siap diproses oleh panitia.', 'success');
            } else if (formulirUploaded || suratUploaded) {
                const docType = formulirUploaded ? "Formulir" : "Surat Pernyataan";
                showAlert(`${docType} sudah diupload. Jangan lupa upload dokumen lainnya dengan tanda tangan lengkap dari kedua pihak.`, 'info');
            }
        }

        function showAlert(message, type) {
            uploadAlert.innerHTML = message;
            uploadAlert.className = `alert alert-${type}`;
            uploadAlert.style.display = 'block';
            
            // Auto hide after 5 seconds (except for final success)
            if (type !== 'success' || !message.includes('SELAMAT')) {
                setTimeout(() => {
                    uploadAlert.style.display = 'none';
                }, 5000);
            }
        }

        // Button Actions - PERBAIKAN: Tombol download tetap berfungsi
        function downloadFormulir() {
            showAlert(`Mengunduh formulir pendaftaran dengan data terisi otomatis...`, 'info');
            
            // Create a blob with some sample content (simulating a PDF)
            const content = `
                FORMULIR PENDAFTARAN PSB AQBS PONOROGO
                
                No. Pendaftaran: PSB/2025/AQBS/008
                Nama Lengkap: Bebelll4
                NISN: 1234567789
                Program Pendidikan: SMP AQBS Ponorogo
                Orang Tua/Wali: Nani
                
                INSTRUKSI:
                1. Formulir ini HARUS ditandatangani oleh:
                   - Calon Santriwati: Bebelll4
                   - Orang Tua/Wali: Nani
                2. Jangan mengubah data yang sudah tercetak
                3. Scan setelah ditandatangani dan upload kembali
                
                TANDA TANGAN CALON SANTRIWATI:
                __________________________
                (Bebelll4)
                
                TANDA TANGAN ORANG TUA/WALI:
                __________________________
                (Nani)
                
                Tanggal: __________________
                
                PSB Online AQBS Ponorogo
                Tahun Ajaran 2025/2026
            `;
            
            const blob = new Blob([content], { type: 'application/pdf' });
            const url = URL.createObjectURL(blob);
            
            // Create download link
            const link = document.createElement('a');
            link.href = url;
            link.download = 'Formulir_Pendaftaran_PSB_' + dataSantri.noPendaftaran.replace('/', '_') + '.pdf';
            
            // Trigger download
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            
            // Clean up
            setTimeout(() => {
                URL.revokeObjectURL(url);
            }, 100);
            
            // Show success message
            setTimeout(() => {
                showAlert(`✓ Formulir pendaftaran berhasil diunduh.\n\n🔹 HARUS ditandatangani oleh:\n1. ${dataSantri.nama} (Calon Santriwati)\n2. ${dataSantri.orangTua} (Orang Tua/Wali)\n\nSetelah ditandatangani, scan dan upload kembali.`, 'success');
            }, 1000);
        }

        function downloadSuratPernyataan() {
            showAlert(`Mengunduh surat pernyataan dengan data terisi otomatis...`, 'info');
            
            // Create a blob with some sample content (simulating a PDF)
            const content = `
                SURAT PERNYATAAN PSB AQBS PONOROGO
                
                Saya yang bertanda tangan di bawah ini:
                
                Nama: Bebelll4
                No. Pendaftaran: PSB/2025/AQBS/008
                Program Pendidikan: SMP AQBS Ponorogo
                
                Dengan ini menyatakan bahwa:
                1. Data yang diisi dalam formulir pendaftaran adalah benar dan dapat dipertanggungjawabkan
                2. Bersedia mengikuti semua tahapan seleksi PSB AQBS Ponorogo
                3. Bersedia mematuhi semua peraturan dan tata tertib yang berlaku di AQBS Ponorogo
                4. Apabila diterima, bersedia mengikuti pendidikan di AQBS Ponorogo dengan sepenuh hati
                
                Demikian surat pernyataan ini saya buat dengan penuh kesadaran dan tanggung jawab.
                
                TANDA TANGAN CALON SANTRI:
                __________________________
                (Bebelll4)
                
                TANDA TANGAN ORANG TUA/WALI:
                __________________________
                (Nani)
                
                Tanggal: __________________
                
                PSB Online AQBS Ponorogo
                Tahun Ajaran 2025/2026
            `;
            
            const blob = new Blob([content], { type: 'application/pdf' });
            const url = URL.createObjectURL(blob);
            
            // Create download link
            const link = document.createElement('a');
            link.href = url;
            link.download = 'Surat_Pernyataan_PSB_' + dataSantri.noPendaftaran.replace('/', '_') + '.pdf';
            
            // Trigger download
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            
            // Clean up
            setTimeout(() => {
                URL.revokeObjectURL(url);
            }, 100);
            
            // Show success message
            setTimeout(() => {
                showAlert(`✓ Surat pernyataan berhasil diunduh.\n\n🔹 HARUS ditandatangani oleh:\n1. ${dataSantri.nama} (Calon Santriwati)\n2. ${dataSantri.orangTua} (Orang Tua/Wali)\n\nSetelah ditandatangani, scan dan upload kembali.`, 'success');
            }, 1000);
        }

        function printKartuPendaftaran() {
            if (statusPembayaran !== "success") {
                showAlert('Anda harus menyelesaikan pembayaran terlebih dahulu untuk mencetak kartu ujian.', 'danger');
                return;
            }
            
            showAlert('Menyiapkan kartu ujian untuk dicetak...', 'info');
            // Tampilkan modal kartu ujian
            setTimeout(() => {
                lihatKartuUjian();
            }, 500);
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            updateStatusPembayaran();
        });
    </script>
</body>
</html>