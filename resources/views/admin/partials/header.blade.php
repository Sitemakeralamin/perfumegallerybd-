@php
  $business = App\Models\Setting::find(1);
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ env('APP_NAME') }} | Dashboard</title>


  <link rel="shortcut icon" type="image/png" href="{{ asset('images/website/'.optional($business)->favicon) }}" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Poppins Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/toastify.min.css') }}">
  {{-- <link href="{{ asset('assets/taginput/tagsinput.css') }}" rel="stylesheet" type="text/css"> --}}
  {{-- <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
      rel="stylesheet"
    /> --}}
  <style type="text/css">
    /* ===== MODERN ADMIN REDESIGN ===== */

    /* Font — set on body, NOT * with !important (would break FontAwesome) */
    body, p, h1, h2, h3, h4, h5, h6, span, div, a, td, th,
    label, input, select, textarea, button, .nav-link {
      font-family: 'Poppins', 'Source Sans Pro', sans-serif;
    }

    /* =================== SIDEBAR =================== */
    .main-sidebar {
      background: linear-gradient(180deg, rgba(8,12,36,0.98) 0%, rgba(13,18,55,0.98) 100%) !important;
      backdrop-filter: blur(20px) !important;
      -webkit-backdrop-filter: blur(20px) !important;
      border-right: 1px solid rgba(255,255,255,0.07) !important;
      box-shadow: 4px 0 28px rgba(0,0,0,0.4) !important;
    }
    .sidebar-glass-brand {
      display: flex; align-items: center;
      padding: 20px 18px 16px;
      border-bottom: 1px solid rgba(255,255,255,0.08);
    }
    .sidebar-glass-brand .sg-icon {
      width: 40px; height: 40px; flex-shrink: 0;
      background: linear-gradient(135deg, #6366f1, #8b5cf6);
      border-radius: 11px; display: flex; align-items: center; justify-content: center;
      margin-right: 12px; box-shadow: 0 4px 18px rgba(99,102,241,0.5);
    }
    .sidebar-glass-brand .sg-name {
      color: white; font-size: 15px; font-weight: 700;
      letter-spacing: 0.3px; line-height: 1.2;
    }
    .sidebar-glass-brand .sg-sub { color: rgba(255,255,255,0.4); font-size: 10px; }
    .sidebar-flex-wrap {
      display: flex; flex-direction: column;
      height: calc(100vh - 74px); overflow: hidden;
    }
    .sidebar-nav-scroll { flex: 1; overflow-y: auto; overflow-x: hidden; }
    .sidebar-nav-scroll::-webkit-scrollbar { width: 3px; }
    .sidebar-nav-scroll::-webkit-scrollbar-track { background: transparent; }
    .sidebar-nav-scroll::-webkit-scrollbar-thumb { background: rgba(99,102,241,0.3); border-radius: 3px; }
    .sidebar-user-bottom {
      border-top: 1px solid rgba(255,255,255,0.08) !important;
      padding: 14px 18px !important; display: flex; align-items: center; gap: 10px;
      margin: 0 !important; flex-shrink: 0;
    }
    .sidebar-user-bottom .sub-avatar {
      width: 36px; height: 36px; border-radius: 50%;
      border: 2px solid rgba(99,102,241,0.6); object-fit: cover; flex-shrink: 0;
    }
    .sidebar-user-bottom .sub-name {
      color: rgba(255,255,255,0.85); font-size: 12.5px; font-weight: 500;
      white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
    }
    .sidebar-user-bottom .sub-role { color: rgba(255,255,255,0.35); font-size: 10.5px; }
    [class*="sidebar-dark-"] .nav-sidebar > .nav-item > .nav-treeview {
      background-color: transparent !important; margin-left: 0 !important;
    }
    .nav-sidebar > .nav-item > .nav-link {
      border-radius: 50px !important; margin: 2px 10px !important;
      padding: 9px 16px !important; color: rgba(255,255,255,0.6) !important;
      transition: all 0.25s ease !important; font-size: 13px; font-weight: 500;
    }
    .nav-sidebar > .nav-item > .nav-link:hover {
      background: rgba(99,102,241,0.2) !important;
      box-shadow: 0 0 18px rgba(99,102,241,0.3) !important;
      color: rgba(255,255,255,0.95) !important;
    }
    .nav-sidebar > .nav-item.menu-open > .nav-link,
    .nav-sidebar > .nav-item > .nav-link.active {
      background: linear-gradient(135deg, rgba(99,102,241,0.3), rgba(139,92,246,0.3)) !important;
      box-shadow: 0 0 20px rgba(99,102,241,0.35) !important; color: white !important;
    }
    .nav-sidebar > .nav-item > .nav-link .nav-icon {
      color: rgba(130,130,255,0.9) !important; width: 1.2rem; min-width: 1.2rem;
    }
    .nav-treeview > .nav-item > .nav-link {
      color: rgba(255,255,255,0.45) !important; font-size: 12px;
      padding: 7px 16px 7px 24px !important; border-radius: 50px !important;
      margin: 1px 10px !important; transition: all 0.2s;
    }
    .nav-treeview > .nav-item > .nav-link:hover {
      background: rgba(99,102,241,0.15) !important; color: rgba(255,255,255,0.8) !important;
    }

    /* =================== TOP NAVBAR =================== */
    .main-header.navbar {
      background: rgba(255,255,255,0.97) !important;
      backdrop-filter: blur(10px);
      box-shadow: 0 2px 16px rgba(0,0,0,0.07) !important;
      border-bottom: 1px solid rgba(0,0,0,0.06) !important;
    }
    .main-header .nav-link { color: #475569 !important; font-weight: 500; }

    /* =================== CONTENT WRAPPER =================== */
    .content-wrapper { background: #F8FAFC !important; }
    .content-header {
      background: #F8FAFC;
      border-bottom: 1px solid #e2e8f0;
      padding-top: 12px !important; padding-bottom: 12px !important;
    }
    .content-header h1 { font-size: 20px !important; font-weight: 700 !important; color: #1e293b !important; }
    .breadcrumb { background: transparent !important; font-size: 12px !important; margin-bottom: 0 !important; }
    .breadcrumb-item + .breadcrumb-item::before { color: #94a3b8; }
    .breadcrumb-item a { color: #6366f1 !important; }
    .breadcrumb-item.active { color: #94a3b8; }

    /* =================== GENERAL CARDS =================== */
    .card {
      border-radius: 14px !important; border: none !important;
      box-shadow: 0 2px 16px rgba(0,0,0,0.07) !important;
      transition: box-shadow 0.3s ease;
    }
    .card:hover { box-shadow: 0 6px 24px rgba(0,0,0,0.11) !important; }
    .card-header {
      background: #fff !important; border-bottom: 1px solid #f1f5f9 !important;
      padding: 16px 22px !important; font-weight: 600 !important;
      color: #1e293b !important; font-size: 14px !important; border-radius: 14px 14px 0 0 !important;
    }
    .card-header .card-title { font-weight: 600 !important; font-size: 14px !important; color: #1e293b !important; }
    .card-body { padding: 22px !important; }
    .card-footer {
      background: #f8fafc !important; border-top: 1px solid #f1f5f9 !important;
      padding: 12px 22px !important; border-radius: 0 0 14px 14px !important;
    }

    /* =================== TABLES =================== */
    .table thead th {
      background: #f8fafc; color: #64748b; font-size: 11px;
      font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;
      border-bottom: 2px solid #e2e8f0 !important; border-top: none !important;
      padding: 12px 16px; white-space: nowrap;
    }
    .table td, .table tbody td {
      vertical-align: middle !important; font-size: 13px; color: #334155;
      padding: 12px 16px !important; border-color: #f1f5f9 !important;
    }
    .table-bordered { border-color: #f1f5f9 !important; }
    .table-striped tbody tr:nth-of-type(odd) { background-color: rgba(99,102,241,0.03) !important; }
    .table-hover tbody tr:hover { background: #f0f4ff !important; }

    /* =================== FORMS =================== */
    .form-control {
      border-radius: 10px !important; border: 1.5px solid #e2e8f0 !important;
      font-size: 13px !important; padding: 9px 14px !important;
      color: #334155 !important; height: auto !important;
      transition: border-color 0.2s, box-shadow 0.2s !important;
      background-color: #fff !important;
    }
    .form-control:focus {
      border-color: #6366f1 !important;
      box-shadow: 0 0 0 3px rgba(99,102,241,0.12) !important;
    }
    .form-group label, label.col-form-label, .col-sm-2.col-form-label {
      font-size: 13px !important; font-weight: 500 !important; color: #475569 !important;
    }
    .input-group-text {
      border-radius: 10px !important; border: 1.5px solid #e2e8f0 !important;
      background: #f8fafc !important; color: #64748b !important; font-size: 13px !important;
    }
    select.form-control { cursor: pointer; }
    textarea.form-control { height: auto !important; }

    /* =================== BUTTONS =================== */
    .btn {
      border-radius: 10px !important; font-size: 13px !important;
      font-weight: 500 !important; padding: 9px 20px !important;
      transition: all 0.2s ease !important; letter-spacing: 0.2px;
    }
    .btn-sm { padding: 6px 14px !important; font-size: 12px !important; }
    .btn-xs { padding: 4px 10px !important; font-size: 11px !important; }
    .btn-primary {
      background: linear-gradient(135deg, #6366f1, #8b5cf6) !important;
      border: none !important; box-shadow: 0 4px 14px rgba(99,102,241,0.3) !important;
    }
    .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 6px 20px rgba(99,102,241,0.45) !important; }
    .btn-success {
      background: linear-gradient(135deg, #0d9488, #22c55e) !important; border: none !important;
      box-shadow: 0 4px 14px rgba(34,197,94,0.25) !important;
    }
    .btn-danger {
      background: linear-gradient(135deg, #ef4444, #f97316) !important; border: none !important;
      box-shadow: 0 4px 14px rgba(239,68,68,0.25) !important;
    }
    .btn-warning {
      background: linear-gradient(135deg, #f59e0b, #fbbf24) !important; border: none !important;
      color: white !important; box-shadow: 0 4px 14px rgba(245,158,11,0.25) !important;
    }
    .btn-info {
      background: linear-gradient(135deg, #3b82f6, #6366f1) !important; border: none !important;
      color: white !important; box-shadow: 0 4px 14px rgba(59,130,246,0.25) !important;
    }
    .btn-secondary {
      background: #f1f5f9 !important; border: none !important; color: #475569 !important;
    }
    .btn-default { background: #f8fafc !important; border: 1.5px solid #e2e8f0 !important; color: #475569 !important; }

    /* =================== BADGES =================== */
    .badge {
      border-radius: 8px !important; font-size: 11px !important;
      font-weight: 500 !important; padding: 4px 10px !important;
    }
    .badge-success { background: linear-gradient(135deg, #22c55e, #16a34a) !important; color: white !important; }
    .badge-danger { background: linear-gradient(135deg, #ef4444, #dc2626) !important; color: white !important; }
    .badge-warning { background: linear-gradient(135deg, #f59e0b, #d97706) !important; color: white !important; }
    .badge-info { background: linear-gradient(135deg, #3b82f6, #2563eb) !important; color: white !important; }
    .badge-primary { background: linear-gradient(135deg, #6366f1, #8b5cf6) !important; color: white !important; }
    .badge-secondary { background: #e2e8f0 !important; color: #475569 !important; }
    .badge-light { background: #f1f5f9 !important; color: #475569 !important; }
    .badge-dark { background: #1e293b !important; color: white !important; }

    /* =================== PAGINATION =================== */
    .page-link {
      border-radius: 8px !important; margin: 0 2px !important;
      color: #6366f1 !important; border-color: #e2e8f0 !important;
      font-size: 13px !important;
    }
    .page-item.active .page-link {
      background: linear-gradient(135deg, #6366f1, #8b5cf6) !important;
      border-color: #6366f1 !important; color: white !important;
    }
    .page-item.disabled .page-link { color: #cbd5e1 !important; }

    /* =================== SELECT2 =================== */
    .select2-container--default .select2-selection--single {
      border-radius: 10px !important; border: 1.5px solid #e2e8f0 !important;
      height: 42px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
      line-height: 40px !important; color: #334155 !important; font-size: 13px !important;
      padding-left: 14px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow { height: 40px !important; }
    .select2-container--default.select2-container--focus .select2-selection--single {
      border-color: #6366f1 !important; box-shadow: 0 0 0 3px rgba(99,102,241,0.12) !important;
    }
    .select2-dropdown { border-radius: 10px !important; border: 1.5px solid #e2e8f0 !important; box-shadow: 0 8px 24px rgba(0,0,0,0.1) !important; }
    .select2-results__option--highlighted { background: #6366f1 !important; }

    /* =================== DATATABLES =================== */
    .dataTables_filter input, .dataTables_length select {
      border-radius: 10px !important; border: 1.5px solid #e2e8f0 !important;
      padding: 7px 12px !important; font-size: 13px !important; color: #334155 !important;
    }
    .dataTables_filter input:focus { border-color: #6366f1 !important; outline: none !important; }
    div.dataTables_wrapper div.dataTables_info { font-size: 12px !important; color: #64748b !important; padding-top: 12px !important; }
    table.dataTable { border-collapse: collapse !important; }

    /* =================== ALERTS / CALLOUTS =================== */
    .alert { border-radius: 12px !important; border-left-width: 4px !important; border-top: none !important; border-right: none !important; border-bottom: none !important; font-size: 13px !important; }
    .callout { border-radius: 12px !important; }

    /* =================== MODALS =================== */
    .modal-content { border-radius: 16px !important; border: none !important; box-shadow: 0 20px 60px rgba(0,0,0,0.2) !important; }
    .modal-header { border-bottom: 1px solid #f1f5f9 !important; padding: 18px 24px !important; border-radius: 16px 16px 0 0 !important; }
    .modal-title { font-weight: 700 !important; color: #1e293b !important; font-size: 16px !important; }
    .modal-footer { border-top: 1px solid #f1f5f9 !important; padding: 14px 24px !important; }
    .modal-body { padding: 22px 24px !important; }

    /* =================== TABS =================== */
    .nav-tabs { border-bottom: 2px solid #e2e8f0 !important; }
    .nav-tabs .nav-link { border-radius: 10px 10px 0 0 !important; color: #64748b !important; font-size: 13px !important; font-weight: 500 !important; border: none !important; padding: 10px 18px !important; }
    .nav-tabs .nav-link.active { color: #6366f1 !important; border-bottom: 2px solid #6366f1 !important; background: transparent !important; }
    .nav-tabs .nav-link:hover { color: #6366f1 !important; background: rgba(99,102,241,0.05) !important; }

    /* =================== DASHBOARD STAT CARDS =================== */
    .stat-card {
      border-radius: 16px !important; border: none !important; overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease !important;
      color: white !important; position: relative;
    }
    .stat-card:hover { transform: translateY(-6px) !important; box-shadow: 0 24px 48px rgba(0,0,0,0.22) !important; }
    .stat-card .card-body { padding: 24px !important; }
    .stat-card .card-label { font-size: 12px; font-weight: 500; opacity: 0.85; letter-spacing: 0.5px; text-transform: uppercase; }
    .stat-card .card-number { font-size: 32px; font-weight: 700; line-height: 1.2; margin: 6px 0; }
    .stat-card .card-sub { font-size: 12px; opacity: 0.75; }
    .stat-card .card-icon-wrap {
      position: absolute; right: 20px; top: 50%; transform: translateY(-50%);
      width: 64px; height: 64px; border-radius: 14px;
      background: rgba(255,255,255,0.15); display: flex; align-items: center; justify-content: center;
    }
    .stat-card .card-footer-link {
      display: block; padding: 10px 24px; background: rgba(0,0,0,0.1);
      color: rgba(255,255,255,0.9) !important; font-size: 12px; font-weight: 500;
      text-decoration: none !important; transition: background 0.2s;
    }
    .stat-card .card-footer-link:hover { background: rgba(0,0,0,0.2); color: white !important; }

    /* =================== ORDER CARDS =================== */
    .order-card {
      background: white !important; border-radius: 16px !important; border: none !important;
      border-left-width: 4px !important; border-left-style: solid !important;
      box-shadow: 0 2px 14px rgba(0,0,0,0.06) !important;
      transition: transform 0.3s ease, box-shadow 0.3s ease !important; overflow: hidden;
    }
    .order-card:hover { transform: translateY(-5px) !important; box-shadow: 0 18px 36px rgba(0,0,0,0.12) !important; }
    .order-card .card-body { padding: 22px 20px !important; }
    .order-card .oc-number { font-size: 34px; font-weight: 700; color: #1e293b; line-height: 1; }
    .order-card .oc-label { font-size: 12px; font-weight: 600; color: #64748b; letter-spacing: 0.4px; text-transform: uppercase; margin-top: 4px; }
    .order-card .oc-icon { width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 14px; }
    .dash-section-title {
      font-size: 18px; font-weight: 700; color: #1e293b;
      margin-bottom: 18px; padding-bottom: 12px; border-bottom: 2px solid #e2e8f0;
      display: flex; align-items: center; gap: 8px;
    }

    /* =================== FOOTER =================== */
    .main-footer { background: white !important; border-top: 1px solid #e2e8f0 !important; color: #64748b !important; font-size: 13px !important; }

    /* =================== MISC =================== */
    .tox-notifications-container { display: none; }
    .bootstrap-tagsinput { width: 100%; height: 40px; border-radius: 10px !important; }
    .label-info { background-color: #007BFF; }
    .bootstrap-tagsinput .tag { padding: 5px; color: white !important; background-color: #6366f1; margin-top: 10px; border-radius: 6px; }
    .small-box { border-radius: 14px !important; }
    .small-box .icon { opacity: 0.25 !important; }
    .small-box-footer { font-size: 12px !important; padding: 10px !important; }
  </style>
  @yield('style')
    {{-- tinymce --}}
    <x-head.tinymce-config/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput-angular.min.js" integrity="sha512-KT0oYlhnDf0XQfjuCS/QIw4sjTHdkefv8rOJY5HHdNEZ6AmOh1DW/ZdSqpipe+2AEXym5D0khNu95Mtmw9VNKg==" crossorigin="anonymous"></script>
  
  @livewireStyles
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('index') }}" class="nav-link" title="Visit Site" target="_blank"><i class="fas fa-home"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
      <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </div>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->
