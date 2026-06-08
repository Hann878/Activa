@extends('layouts.alayout.sidebar')

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
                        Review student information and manage their accounts.
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
                        Search, review, and manage student accounts.
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
                            <th>Id</th>
                            <th>User Id</th>
                            <th>Name</th>
                            <th>NIS</th>
                            <th>Class</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>

                                <td>{{ $student->user->id }}</td>

                                <td>{{ $student->user->name }}</td>

                                <td>{{ $student->nis }}</td>

                                <td>{{ $student->class->name }}</td>

                                <td class="text-end">

                                    <button
                                        type="button"
                                        class="btn btn-warning btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $student->id }}">
                                        Edit
                                    </button>

                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal{{ $student->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <form action="{{ url('/admin/students/' . $student->id) }}"
                                            method="POST">

                                            @csrf
                                            @method('PUT')

                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    Edit Kelas Siswa
                                                </h5>

                                                <button
                                                    type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal">
                                                </button>
                                            </div>

                                            <div class="modal-body">

                                                <div class="mb-3">
                                                    <label class="form-label d-block text-start">
                                                        Nama Siswa
                                                    </label>

                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        value="{{ $student->user->name }}"
                                                        readonly>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label d-block text-start">
                                                        NIS
                                                    </label>

                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        value="{{ $student->nis }}"
                                                        readonly>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label d-block text-start">
                                                        Kelas
                                                    </label>

                                                    <select
                                                        name="class_id"
                                                        class="form-select">

                                                        @foreach ($classes as $class)
                                                            <option
                                                                value="{{ $class->id }}"
                                                                {{ $student->class_id == $class->id ? 'selected' : '' }}>
                                                                {{ $class->name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>

                                            </div>

                                            <div class="modal-footer">

                                                <button
                                                    type="button"
                                                    class="btn btn-secondary"
                                                    data-bs-dismiss="modal">
                                                    Batal
                                                </button>

                                                <button
                                                    type="submit"
                                                    class="btn btn-primary">
                                                    Simpan
                                                </button>

                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>

                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
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