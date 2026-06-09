@extends('layouts.tlayout.sidebar')

@section('content')

<main class="dashboard-content">
    <div class="container-fluid px-3 px-lg-4 py-4">

        <div class="page-heading">
            <div class="page-heading-copy">
                <span class="page-icon">
                    <i class="bi bi-mortarboard-fill"></i>
                </span>
                <div>
                    <p class="eyebrow mb-1">Teacher Panel</p>
                    <h1 class="h3 mb-1">Dashboard Guru</h1>
                    <p class="text-muted mb-0">
                        Monitor siswa dan jurnal PKL.
                    </p>
                </div>
            </div>
        </div>

        <section class="row g-3 mt-1">

            <div class="col-12 col-sm-6 col-xl-3">
                <article class="metric-card metric-primary">
                    <div class="metric-top">
                        <span class="metric-label">
                            Total Siswa
                        </span>
                        <span class="metric-icon">
                            <i class="bi bi-people-fill"></i>
                        </span>
                    </div>

                    <div class="metric-value">
                        {{ $totalStudents ?? 0 }}
                    </div>
                </article>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <article class="metric-card metric-success">
                    <div class="metric-top">
                        <span class="metric-label">
                            Jurnal Hari Ini
                        </span>
                        <span class="metric-icon">
                            <i class="bi bi-journal-check"></i>
                        </span>
                    </div>

                    <div class="metric-value">
                        {{ $todayJournals ?? 0 }}
                    </div>
                </article>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <article class="metric-card metric-warning">
                    <div class="metric-top">
                        <span class="metric-label">
                            Total Jurnal
                        </span>
                        <span class="metric-icon">
                            <i class="bi bi-journal-text"></i>
                        </span>
                    </div>

                    <div class="metric-value">
                        {{ $totalJournals ?? 0 }}
                    </div>
                </article>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <article class="metric-card metric-danger">
                    <div class="metric-top">
                        <span class="metric-label">
                            Pending Review
                        </span>
                        <span class="metric-icon">
                            <i class="bi bi-clock-history"></i>
                        </span>
                    </div>

                    <div class="metric-value">
                        {{ $pendingJournals ?? 0 }}
                    </div>
                </article>
            </div>

        </section>

        <section class="row g-3 mt-4">

            <div class="col-12 col-xl-8">
                <div class="panel h-100">

                    <div class="panel-header">
                        <div>
                            <h2 class="h5 mb-1 section-title">
                                <i class="bi bi-journal-bookmark"></i>
                                <span>Jurnal Terbaru</span>
                            </h2>

                            <p class="text-muted mb-0">
                                Aktivitas siswa terbaru.
                            </p>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle">

                            <thead>
                                <tr>
                                    <th>Siswa</th>
                                    <th>Tanggal</th>
                                    <th>Aktivitas</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($latestJournals ?? [] as $journal)
                                    <tr>
                                        <td>{{ $journal->student->user->name }}</td>
                                        <td>{{ $journal->date }}</td>
                                        <td>{{ $journal->activity }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            Belum ada jurnal.
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>

                        </table>
                    </div>

                </div>
            </div>

            <div class="col-12 col-xl-4">
                <div class="panel h-100">

                    <div class="panel-header">
                        <div>
                            <h2 class="h5 mb-1 section-title">
                                <i class="bi bi-person-check-fill"></i>
                                <span>Ringkasan</span>
                            </h2>

                            <p class="text-muted mb-0">
                                Statistik monitoring siswa.
                            </p>
                        </div>
                    </div>

                    <div class="p-3">

                        <div class="d-flex justify-content-between mb-3">
                            <span>Jurnal Disetujui</span>
                            <strong>{{ $approvedJournals ?? 0 }}</strong>
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <span>Jurnal Pending</span>
                            <strong>{{ $pendingJournals ?? 0 }}</strong>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span>Total Siswa Aktif</span>
                            <strong>{{ $totalStudents ?? 0 }}</strong>
                        </div>

                    </div>

                </div>
            </div>

        </section>

    </div>
</main>

@endsection