@extends('admin.layouts.master')
@section('content')

<div class="content-header" style="background:#F8FAFC; border-bottom:1px solid #e2e8f0;">
  <div class="container-fluid">
    <div class="row align-items-center py-1">
      <div class="col-sm-6">
        <h4 class="m-0" style="font-weight:700; color:#1e293b;">Dashboard</h4>
        <p style="font-size:12px; color:#64748b; margin:0;">Welcome back, {{ Auth::user()->name }}</p>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right" style="background:transparent; font-size:12px;">
          <li class="breadcrumb-item"><a href="{{ route('index') }}" target="_blank" style="color:#6366f1;">Home</a></li>
          <li class="breadcrumb-item active" style="color:#64748b;">Dashboard</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="content" style="padding: 24px 20px;">
  <div class="container-fluid">

    @if(Auth::user()->type == 1)

    {{-- ===== SALES STATS ROW ===== --}}
    <div class="row" style="margin-bottom: 28px;">

      {{-- Total Sales --}}
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card" style="background: linear-gradient(135deg, #6366f1, #8b5cf6); box-shadow: 0 8px 32px rgba(99,102,241,0.35);">
          <div class="card-body">
            <div class="card-label">Total Sales</div>
            <div class="card-number">
              {{ number_format($orders->filter(fn($o) => $o->order_status_id != 5)->sum('price')) }}
            </div>
            <div class="card-sub">All accumulated revenue</div>
            <div class="card-icon-wrap">
              <svg width="28" height="28" fill="none" viewBox="0 0 24 24">
                <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" stroke="white" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                <polyline points="16 7 22 7 22 13" stroke="white" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
          </div>
          <a href="{{ route('order.index') }}" class="card-footer-link">
            View Details &nbsp;<i class="fas fa-arrow-right fa-xs"></i>
          </a>
        </div>
      </div>

      {{-- Current Year --}}
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card" style="background: linear-gradient(135deg, #0d9488, #22c55e); box-shadow: 0 8px 32px rgba(13,148,136,0.35);">
          <div class="card-body">
            <div class="card-label">Current Year</div>
            <div class="card-number">
              {{ number_format($yearly_orders->filter(fn($o) => $o->order_status_id != 5)->sum('price')) }}
            </div>
            <div class="card-sub">{{ date('Y') }} annual revenue</div>
            <div class="card-icon-wrap">
              <svg width="28" height="28" fill="none" viewBox="0 0 24 24">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2" stroke="white" stroke-width="2.2"/>
                <line x1="16" y1="2" x2="16" y2="6" stroke="white" stroke-width="2.2" stroke-linecap="round"/>
                <line x1="8" y1="2" x2="8" y2="6" stroke="white" stroke-width="2.2" stroke-linecap="round"/>
                <line x1="3" y1="10" x2="21" y2="10" stroke="white" stroke-width="2.2"/>
              </svg>
            </div>
          </div>
          <a href="{{ route('order.current.year') }}" class="card-footer-link">
            View Details &nbsp;<i class="fas fa-arrow-right fa-xs"></i>
          </a>
        </div>
      </div>

      {{-- Current Month --}}
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card" style="background: linear-gradient(135deg, #f97316, #f59e0b); box-shadow: 0 8px 32px rgba(249,115,22,0.35);">
          <div class="card-body">
            <div class="card-label">Current Month</div>
            <div class="card-number">
              {{ number_format($monthly_orders->filter(fn($o) => $o->order_status_id != 5)->sum('price')) }}
            </div>
            <div class="card-sub">{{ date('F Y') }} revenue</div>
            <div class="card-icon-wrap">
              <svg width="28" height="28" fill="none" viewBox="0 0 24 24">
                <path d="M12 2v20M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6" stroke="white" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
          </div>
          <a href="{{ route('order.current.month') }}" class="card-footer-link">
            View Details &nbsp;<i class="fas fa-arrow-right fa-xs"></i>
          </a>
        </div>
      </div>

      {{-- Today's Sales --}}
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card" style="background: linear-gradient(135deg, #f43f5e, #ec4899); box-shadow: 0 8px 32px rgba(244,63,94,0.35);">
          <div class="card-body">
            <div class="card-label">Today's Sales</div>
            <div class="card-number">
              {{ number_format($daily_orders->filter(fn($o) => $o->order_status_id != 5)->sum('price')) }}
            </div>
            <div class="card-sub">{{ date('d M Y') }}</div>
            <div class="card-icon-wrap">
              <svg width="28" height="28" fill="none" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" stroke="white" stroke-width="2.2"/>
                <polyline points="12 6 12 12 16 14" stroke="white" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
          </div>
          <a href="{{ route('order.today') }}" class="card-footer-link">
            View Details &nbsp;<i class="fas fa-arrow-right fa-xs"></i>
          </a>
        </div>
      </div>

    </div>
    {{-- end sales row --}}

    {{-- ===== ORDER OVERVIEW ===== --}}
    <div class="dash-section-title">
      <svg width="20" height="20" fill="none" viewBox="0 0 24 24" style="color:#6366f1;">
        <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2" stroke="#6366f1" stroke-width="2" stroke-linecap="round"/>
        <rect x="9" y="3" width="6" height="4" rx="1" stroke="#6366f1" stroke-width="2"/>
        <line x1="9" y1="12" x2="15" y2="12" stroke="#6366f1" stroke-width="2" stroke-linecap="round"/>
        <line x1="9" y1="16" x2="13" y2="16" stroke="#6366f1" stroke-width="2" stroke-linecap="round"/>
      </svg>
      Order Overview
    </div>

    <div class="row">

      {{-- Completed --}}
      <div class="col-xl col-md-4 col-sm-6 mb-4">
        <div class="card order-card" style="border-left-color: #22c55e;">
          <div class="card-body">
            <div class="oc-icon" style="background: rgba(34,197,94,0.1);">
              <svg width="22" height="22" fill="none" viewBox="0 0 24 24">
                <path d="M20 6L9 17l-5-5" stroke="#22c55e" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <div class="oc-number">
              {{ count($orders->filter(fn($o) => $o->order_status == 'delivered')) }}
            </div>
            <div class="oc-label">Completed</div>
            <a href="{{ route('order.status.filter', 'delivered') }}" style="font-size:11px; color:#22c55e; font-weight:600; text-decoration:none; display:inline-block; margin-top:8px;">
              View all <i class="fas fa-arrow-right fa-xs"></i>
            </a>
          </div>
        </div>
      </div>

      {{-- Accepted --}}
      <div class="col-xl col-md-4 col-sm-6 mb-4">
        <div class="card order-card" style="border-left-color: #3b82f6;">
          <div class="card-body">
            <div class="oc-icon" style="background: rgba(59,130,246,0.1);">
              <svg width="22" height="22" fill="none" viewBox="0 0 24 24">
                <path d="M22 11.08V12a10 10 0 11-5.93-9.14" stroke="#3b82f6" stroke-width="2.2" stroke-linecap="round"/>
                <polyline points="22 4 12 14.01 9 11.01" stroke="#3b82f6" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <div class="oc-number">
              {{ count($orders->filter(fn($o) => $o->order_status != 'pending' && $o->order_status != 'canceled')) }}
            </div>
            <div class="oc-label">Accepted</div>
            <a href="javascript:void(0)" style="font-size:11px; color:#3b82f6; font-weight:600; text-decoration:none; display:inline-block; margin-top:8px;">
              View all <i class="fas fa-arrow-right fa-xs"></i>
            </a>
          </div>
        </div>
      </div>

      {{-- In Progress --}}
      <div class="col-xl col-md-4 col-sm-6 mb-4">
        <div class="card order-card" style="border-left-color: #8b5cf6;">
          <div class="card-body">
            <div class="oc-icon" style="background: rgba(139,92,246,0.1);">
              <svg width="22" height="22" fill="none" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" stroke="#8b5cf6" stroke-width="2.2"/>
                <polyline points="12 6 12 12 16 14" stroke="#8b5cf6" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <div class="oc-number">
              {{ count($orders->filter(fn($o) => $o->order_status == 'processing')) }}
            </div>
            <div class="oc-label">In Progress</div>
            <a href="{{ route('order.status.filter', 'processing') }}" style="font-size:11px; color:#8b5cf6; font-weight:600; text-decoration:none; display:inline-block; margin-top:8px;">
              View all <i class="fas fa-arrow-right fa-xs"></i>
            </a>
          </div>
        </div>
      </div>

      {{-- Pending --}}
      <div class="col-xl col-md-4 col-sm-6 mb-4">
        <div class="card order-card" style="border-left-color: #f59e0b;">
          <div class="card-body">
            <div class="oc-icon" style="background: rgba(245,158,11,0.1);">
              <svg width="22" height="22" fill="none" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" stroke="#f59e0b" stroke-width="2.2"/>
                <line x1="12" y1="8" x2="12" y2="12" stroke="#f59e0b" stroke-width="2.2" stroke-linecap="round"/>
                <line x1="12" y1="16" x2="12.01" y2="16" stroke="#f59e0b" stroke-width="2.5" stroke-linecap="round"/>
              </svg>
            </div>
            <div class="oc-number">
              {{ count($orders->filter(fn($o) => $o->order_status == 'pending')) }}
            </div>
            <div class="oc-label">Pending</div>
            <a href="{{ route('order.status.filter', 'pending') }}" style="font-size:11px; color:#f59e0b; font-weight:600; text-decoration:none; display:inline-block; margin-top:8px;">
              View all <i class="fas fa-arrow-right fa-xs"></i>
            </a>
          </div>
        </div>
      </div>

      {{-- Canceled --}}
      <div class="col-xl col-md-4 col-sm-6 mb-4">
        <div class="card order-card" style="border-left-color: #ef4444;">
          <div class="card-body">
            <div class="oc-icon" style="background: rgba(239,68,68,0.1);">
              <svg width="22" height="22" fill="none" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" stroke="#ef4444" stroke-width="2.2"/>
                <line x1="15" y1="9" x2="9" y2="15" stroke="#ef4444" stroke-width="2.2" stroke-linecap="round"/>
                <line x1="9" y1="9" x2="15" y2="15" stroke="#ef4444" stroke-width="2.2" stroke-linecap="round"/>
              </svg>
            </div>
            <div class="oc-number">
              {{ count($orders->filter(fn($o) => $o->order_status == 'canceled')) }}
            </div>
            <div class="oc-label">Canceled</div>
            <a href="{{ route('order.status.filter', 'canceled') }}" style="font-size:11px; color:#ef4444; font-weight:600; text-decoration:none; display:inline-block; margin-top:8px;">
              View all <i class="fas fa-arrow-right fa-xs"></i>
            </a>
          </div>
        </div>
      </div>

    </div>
    {{-- end order overview --}}

    @endif

  </div>
</section>

@endsection

@section('scripts')
@endsection
