@extends('layouts.alayout.sidebar')

@section('content')

<main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
          <div class="page-heading">
            <div class="page-heading-copy">
              <span class="page-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
              <div>
                <p class="eyebrow mb-1">Overview</p>
                <h1 class="h3 mb-1">Dashboard</h1>
                <p class="text-muted mb-0">Monitor Users, Students, Attendance, and Journals.</p>
              </div>
            </div>
          </div>

          <section class="row g-3 mt-1" aria-label="Dashboard metrics">
            <div class="col-12 col-sm-6 col-xl-3">
              <article class="metric-card metric-primary">
                <div class="metric-top">
                  <span class="metric-label">Total Users</span>
                  <span class="metric-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
                </div>
                <div class="metric-value">{{ $totalUsers ?? '0' }}</div>
              </article>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
              <article class="metric-card metric-success">
                <div class="metric-top">
                  <span class="metric-label">Total Siswa</span>
                  <span class="metric-icon"><i class="bi bi-person-vcard" aria-hidden="true"></i></span>
                </div>
                <div class="metric-value">{{ $totalStudents ?? '0' }}</div>
              </article>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
              <article class="metric-card metric-warning">
                <div class="metric-top">
                  <span class="metric-label">Total Kelas</span>
                  <span class="metric-icon"><i class="bi bi-house-door-fill" aria-hidden="true"></i></span>
                </div>
                <div class="metric-value">{{ $totalClasses ?? '0' }}</div>
              </article>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
              <article class="metric-card metric-danger">
                <div class="metric-top">
                  <span class="metric-label">Total Jurnal</span>
                  <span class="metric-icon"><i class="bi bi-journal-text" aria-hidden="true"></i></span>
                </div>
                <div class="metric-value">{{ $totalJournals ?? '0' }}</div>
              </article>
            </div>
          </section>

        <div class="container-fluid px-3 px-lg-4 py-4">
          <div class="page-heading">
            
          </div>

          <section class="row g-3 mt-1">
            <div class="col-12 col-xl-8">
              <div class="panel h-100">
                <div class="panel-header"><div><h2 class="h5 mb-1 section-title"><i class="bi bi-bar-chart-line" aria-hidden="true"></i><span>Revenue Trend</span></h2><p class="text-muted mb-0">Static chart component ready for Chart.js integration.</p></div></div>
                <div class="chart-bars" aria-label="Revenue chart"><div class="chart-column bar-42"><span></span><small>Jan</small></div><div class="chart-column bar-58"><span></span><small>Feb</small></div><div class="chart-column bar-51"><span></span><small>Mar</small></div><div class="chart-column bar-72"><span></span><small>Apr</small></div><div class="chart-column bar-66"><span></span><small>May</small></div><div class="chart-column bar-83"><span></span><small>Jun</small></div></div>
              </div>
            </div>
            <div class="col-12 col-xl-4">
              <div class="panel h-100">
                <div class="panel-header"><div><h2 class="h5 mb-1 section-title"><i class="bi bi-pie-chart" aria-hidden="true"></i><span>Channel Mix</span></h2><p class="text-muted mb-0">Revenue contribution by source.</p></div></div>
                <div class="donut-chart mx-auto"><span>68%</span></div>
                <div class="legend-list mt-4"><div><span class="legend-dot bg-primary"></span>Direct sales<strong>42%</strong></div><div><span class="legend-dot bg-success"></span>Marketplace<strong>26%</strong></div><div><span class="legend-dot bg-warning"></span>Partners<strong>18%</strong></div><div><span class="legend-dot bg-danger"></span>Other<strong>14%</strong></div></div>
              </div>
            </div>
          </section>
        </div>
        
        </div>
      </main>



@endsection