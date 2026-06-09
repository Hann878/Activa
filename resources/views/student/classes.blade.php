@extends('layouts.slayout.sidebar')

@section('content')

<main class="dashboard-content">
    <div class="container-fluid px-3 px-lg-4 py-4">

        <!-- Header -->
        <div class="page-heading">
            <div class="page-heading-copy">
                <span class="page-icon">
                    <i class="bi bi-book" aria-hidden="true"></i>
                </span>

                <div>
                    <p class="eyebrow mb-1">Overview</p>
                    <h1 class="h3 mb-1">Classes</h1>
                    <p class="text-muted mb-0">
                        Manage your classes and class information.
                    </p>
                </div>
            </div>
        </div>

        <!-- Class Panel -->
        <div class="panel">

            <div class="panel-header">
                <div>
                    <h2 class="h5 mb-1">
                        <i class="bi bi-mortarboard"></i>
                        Kelas Saya
                    </h2>

                    @if($student && $student->class)
                        <p class="text-muted mb-0">
                            {{ $student->class->name }} • {{ $classmates->count() }} Siswa
                        </p>
                    @endif
                </div>
            </div>

            <div class="p-3">

                @if($student && $student->class)

                    <!-- Class Information -->
                    <div class="row g-3 mb-4">

                        <div class="col-md-6">
                            <div class="border rounded p-3 h-100">
                                <small class="text-muted d-block mb-1">
                                    Nama Kelas
                                </small>

                                <strong class="fs-5">
                                    {{ $student->class->name }}
                                </strong>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="border rounded p-3 h-100">
                                <small class="text-muted d-block mb-1">
                                    Total Siswa
                                </small>

                                <strong class="fs-5">
                                    {{ $classmates->count() }}
                                </strong>
                            </div>
                        </div>

                    </div>

                    <!-- Student List -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">
                            <i class="bi bi-people"></i>
                            Daftar Siswa
                        </h5>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">

                            <thead>
                                <tr>
                                    <th width="80">No</th>
                                    <th>Nama Siswa</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($classmates as $index => $mate)
                                    <tr>

                                        <td>
                                            {{ $index + 1 }}
                                        </td>

                                        <td>
                                            {{ $mate->user->name }}
                                        </td>

                                        <td>
                                            @if($mate->id == $student->id)
                                                <span class="badge bg-primary">
                                                    Anda
                                                </span>
                                            @else
                                                <span class="badge bg-success">
                                                    Aktif
                                                </span>
                                            @endif
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted py-4">
                                            Tidak ada data siswa.
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>

                        </table>
                    </div>

                @else

                    <!-- Empty State -->
                    <div class="text-center py-5">

                        <i class="bi bi-book fs-1 text-muted"></i>

                        <h5 class="mt-3">
                            Belum Memiliki Kelas
                        </h5>

                        <p class="text-muted mb-0">
                            Kamu belum terdaftar pada kelas manapun.
                        </p>

                    </div>

                @endif

            </div>

        </div>

    </div>
</main>

@endsection