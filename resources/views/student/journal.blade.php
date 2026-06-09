@extends('layouts.slayout.sidebar')

@section('content')

<main class="dashboard-content">
    <div class="container-fluid px-3 px-lg-4 py-4">

        <!-- Header -->
        <div class="page-heading">
            <div class="page-heading-copy">
                <span class="page-icon">
                    <i class="bi bi-journal-text"></i>
                </span>

                <div>
                    <p class="eyebrow mb-1">Overview</p>
                    <h1 class="h3 mb-1">Journal</h1>
                    <p class="text-muted mb-0">
                        Kelola jurnal kegiatan harian Anda.
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

        <!-- Form Jurnal -->
        <div class="panel mb-4">

            <div class="panel-header">
                <h2 class="h5 mb-0">
                    Tambah Jurnal
                </h2>
            </div>

            <div class="p-3">

                <form action="{{ route('student.journal.store') }}"
                      method="POST">

                    @csrf

                    <div class="mb-3">
                        <label class="form-label">
                            Tanggal
                        </label>

                        <input
                            type="date"
                            name="date"
                            class="form-control"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Aktivitas
                        </label>

                        <input
                            type="text"
                            name="activity"
                            class="form-control"
                            placeholder="Masukkan aktivitas"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Catatan
                        </label>

                        <textarea
                            name="note"
                            rows="4"
                            class="form-control"
                            placeholder="Tambahkan catatan..."></textarea>
                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary">

                        <i class="bi bi-plus-circle"></i>
                        Simpan Jurnal

                    </button>

                </form>

            </div>

        </div>

        <!-- Tabel Jurnal -->
        <div class="panel">

            <div class="panel-header">
                <h2 class="h5 mb-0">
                    Riwayat Jurnal
                </h2>
            </div>

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>
                        <tr>
                            <th width="120">Tanggal</th>
                            <th>Aktivitas</th>
                            <th>Catatan</th>
                            <th width="120">Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($journals as $journal)

                            <tr>

                                <td>
                                    {{ \Carbon\Carbon::parse($journal->date)->format('d M Y') }}
                                </td>

                                <td>
                                    {{ $journal->activity }}
                                </td>

                                <td>
                                    {{ $journal->note ?? '-' }}
                                </td>

                                <td>

                                    @if($journal->status === 'Approved')

                                        <span class="badge bg-success">
                                            Approved
                                        </span>

                                    @elseif($journal->status === 'Rejected')

                                        <span class="badge bg-danger">
                                            Rejected
                                        </span>

                                    @else

                                        <span class="badge bg-warning text-dark">
                                            Pending
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4"
                                    class="text-center text-muted py-4">

                                    Belum ada jurnal.

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