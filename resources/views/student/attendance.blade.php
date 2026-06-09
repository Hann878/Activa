@extends('layouts.slayout.sidebar')

@section('content')

<main class="dashboard-content">
    <div class="container-fluid px-3 px-lg-4 py-4">

        <!-- Header -->
        <div class="page-heading">
            <div class="page-heading-copy">
                <span class="page-icon">
                    <i class="bi bi-calendar-check"></i>
                </span>

                <div>
                    <p class="eyebrow mb-1">Overview</p>
                    <h1 class="h3 mb-1">Attendance</h1>
                    <p class="text-muted mb-0">
                        Kelola absensi harian Anda.
                    </p>
                </div>
            </div>
        </div>

        <!-- Alert -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Attendance Action -->
        <div class="panel mb-4">
            <div class="panel-header">
                <h2 class="h5 mb-0">
                    <i class="bi bi-fingerprint"></i>
                    Absensi Hari Ini
                </h2>
            </div>

            <div class="p-4">

                @if(!$todayAttendance)

                    <form action="{{ route('student.attendance.checkin') }}" method="POST">
                        @csrf

                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-box-arrow-in-right"></i>
                            Absen Masuk
                        </button>
                    </form>

                @elseif(!$todayAttendance->check_out_time)

                    <div class="mb-3">
                        <strong>Jam Masuk:</strong>
                        {{ $todayAttendance->check_in_time }}
                    </div>

                    <form action="{{ route('student.attendance.checkout') }}" method="POST">
                        @csrf

                        <button type="submit" class="btn btn-warning">
                            <i class="bi bi-box-arrow-right"></i>
                            Absen Pulang
                        </button>
                    </form>

                @else

                    <div class="alert alert-success mb-0">
                        <i class="bi bi-check-circle-fill"></i>
                        Absensi hari ini sudah lengkap.

                        <hr>

                        <p class="mb-1">
                            <strong>Jam Masuk:</strong>
                            {{ $todayAttendance->check_in_time }}
                        </p>

                        <p class="mb-0">
                            <strong>Jam Pulang:</strong>
                            {{ $todayAttendance->check_out_time }}
                        </p>
                    </div>

                @endif

            </div>
        </div>

        <!-- Statistics -->
        <section class="row g-3 mb-4">

            <div class="col-md-4">
                <div class="metric-card metric-success">
                    <div class="metric-top">
                        <span class="metric-label">
                            Total Hadir
                        </span>
                    </div>

                    <div class="metric-value">
                        {{ $attendances->where('status', 'Hadir')->count() }}
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="metric-card metric-warning">
                    <div class="metric-top">
                        <span class="metric-label">
                            Total Izin
                        </span>
                    </div>

                    <div class="metric-value">
                        {{ $attendances->where('status', 'Izin')->count() }}
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="metric-card metric-danger">
                    <div class="metric-top">
                        <span class="metric-label">
                            Total Alpha
                        </span>
                    </div>

                    <div class="metric-value">
                        {{ $attendances->where('status', 'Alpha')->count() }}
                    </div>
                </div>
            </div>

        </section>

        <!-- Attendance History -->
        <div class="panel">

            <div class="panel-header">
                <h2 class="h5 mb-0">
                    <i class="bi bi-clock-history"></i>
                    Riwayat Absensi
                </h2>
            </div>

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jam Masuk</th>
                            <th>Jam Pulang</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($attendances as $index => $attendance)

                            <tr>

                                <td>
                                    {{ $index + 1 }}
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($attendance->date)->format('d M Y') }}
                                </td>

                                <td>
                                    {{ $attendance->check_in_time ?? '-' }}
                                </td>

                                <td>
                                    {{ $attendance->check_out_time ?? '-' }}
                                </td>

                                <td>

                                    @if($attendance->status == 'Hadir')
                                        <span class="badge bg-success">
                                            Hadir
                                        </span>

                                    @elseif($attendance->status == 'Izin')
                                        <span class="badge bg-warning">
                                            Izin
                                        </span>

                                    @else
                                        <span class="badge bg-danger">
                                            Alpha
                                        </span>
                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    Belum ada riwayat absensi.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>
</main>

@endsection