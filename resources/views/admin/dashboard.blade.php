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
                  <span class="metric-label">Total Guru</span>
                  <span class="metric-icon"><i class="bi bi-journal-text" aria-hidden="true"></i></span>
                </div>
                <div class="metric-value">{{ $totalTeachers ?? '0' }}</div>
              </article>
            </div>
          </section>

        <div class="container-fluid px-3 px-lg-4 py-4">
          <div class="page-heading">
            
          </div>
        </div>
        
    </div>
</main>



@endsection