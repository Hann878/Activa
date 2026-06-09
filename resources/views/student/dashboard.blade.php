@extends('layouts.slayout.sidebar')

@section('content')

<main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
          <div class="page-heading">
            <div class="page-heading-copy">
              <span class="page-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
              <div>
                <p class="eyebrow mb-1">Overview</p>
                <h1 class="h3 mb-1">Dashboard</h1>
                <p class="text-muted mb-0">Welcome to your student dashboard!</p>
              </div>
            </div>
          </div>

          <section class="row g-3 mt-1">
    <div class="col-12">
        <div class="panel">
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <div>
                    <h2 class="mb-2">
                        Selamat Datang, {{ auth()->user()->name }} 👋
                    </h2>
                    <p class="text-muted mb-0">
                        Semangat belajar hari ini! Pantau tugas, kelas, dan progres pembelajaranmu di Activa.
                    </p>
                </div>

                <div class="text-end">
                    <span class="badge bg-primary px-3 py-2">
                        Student
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>


          <section class="row g-3 mt-1">

    {{-- Tugas Terdekat --}}
    <div class="col-12 col-xl-8">
        <div class="panel h-100">
            <div class="panel-header">
                <div>
                    <h2 class="h5 mb-1 section-title">
                        <i class="bi bi-calendar-check"></i>
                        <span>Tugas Terdekat</span>
                    </h2>
                    <p class="text-muted mb-0">
                        Tugas yang harus segera diselesaikan.
                    </p>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Judul Tugas</th>
                            <th>Mata Pelajaran</th>
                            <th>Deadline</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($upcomingTasks ?? [] as $task)
                            <tr>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->subject ?? '-' }}</td>
                                <td>
                                    {{ \Carbon\Carbon::parse($task->deadline)->format('d M Y') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-4">
                                    Tidak ada tugas terdekat.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Pengumuman --}}
    <div class="col-12 col-xl-4">
        <div class="panel h-100">
            <div class="panel-header">
                <div>
                    <h2 class="h5 mb-1 section-title">
                        <i class="bi bi-megaphone"></i>
                        <span>Pengumuman</span>
                    </h2>
                    <p class="text-muted mb-0">
                        Informasi terbaru dari guru.
                    </p>
                </div>
            </div>

            <div class="list-group list-group-flush">

                @forelse($announcements ?? [] as $announcement)
                    <div class="list-group-item border-0 px-0">
                        <h6 class="mb-1">
                            {{ $announcement->title }}
                        </h6>
                        <small class="text-muted">
                            {{ $announcement->created_at->diffForHumans() }}
                        </small>
                    </div>
                @empty
                    <div class="text-center py-4 text-muted">
                        Belum ada pengumuman.
                    </div>
                @endforelse

            </div>
        </div>
    </div>

</section>

<section class="row g-3 mt-3">

    {{-- Kelas Saya --}}
    <div class="col-12 col-lg-6">
        <div class="panel h-100">
            <div class="panel-header">
                <h2 class="h5 mb-0 section-title">
                    <i class="bi bi-book"></i>
                    Kelas Saya
                </h2>
            </div>

            <div class="p-3">

                @if($student && $student->class)
                    <div class="d-flex justify-content-between align-items-center">
                        <strong>{{ $student->class->name }}</strong>

                        <span class="badge bg-primary">
                            Aktif
                        </span>
                    </div>
                @else
                    <p class="text-muted">
                        Belum terdaftar pada kelas manapun.
                    </p>
                @endif

            </div>
        </div>
    </div>

    {{-- Aktivitas Terbaru --}}
    <div class="col-12 col-lg-6">
        <div class="panel h-100">
            <div class="panel-header">
                <h2 class="h5 mb-0 section-title">
                    <i class="bi bi-clock-history"></i>
                    Aktivitas Terbaru
                </h2>
            </div>

            <div class="p-3">

                @forelse($activities ?? [] as $activity)
                    <div class="mb-3 pb-3 border-bottom">
                        <div>{{ $activity->description }}</div>

                        <small class="text-muted">
                            {{ $activity->created_at->diffForHumans() }}
                        </small>
                    </div>
                @empty
                    <p class="text-muted mb-0">
                        Belum ada aktivitas.
                    </p>
                @endforelse

            </div>
        </div>
    </div>

</section>
    </div>
</main>



@endsection