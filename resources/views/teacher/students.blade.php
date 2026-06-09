@extends('layouts.tlayout.sidebar')

@section('content')

<main class="dashboard-content">
    <div class="container-fluid px-3 px-lg-4 py-4">

        <!-- Header -->
        <div class="page-heading">
            <div class="page-heading-copy">
                <span class="page-icon">
                    <i class="bi bi-people"></i>
                </span>

                <div>
                    <p class="eyebrow mb-1">Management</p>
                    <h1 class="h3 mb-1">Students</h1>
                    <p class="text-muted mb-0">
                        Review student information and monitor student data.
                    </p>
                </div>
            </div>
        </div>

        <!-- Table Panel -->
        <section class="panel mt-3">

            <div class="panel-header">
                <div>
                    <h2 class="h5 mb-1 section-title">
                        <i class="bi bi-table"></i>
                        <span>Student List</span>
                    </h2>

                    <p class="text-muted mb-0">
                        List of registered students.
                    </p>
                </div>

                <div class="d-flex flex-wrap gap-2">
                    <input
                        class="form-control form-control-sm table-search"
                        type="search"
                        placeholder="Search students...">
                </div>
            </div>

            <div class="table-responsive">

                <table class="table align-middle mb-0">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>NIS</th>
                            <th>Class</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>

                                <td>
                                    {{ $student->user?->id ?? '-' }}
                                </td>

                                <td>
                                    {{ $student->user?->name ?? '-' }}
                                </td>

                                <td>{{ $student->nis }}</td>

                                <td>
                                    {{ $student->class?->name ?? '-' }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    Tidak ada data siswa
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </section>

    </div>
</main>

@endsection