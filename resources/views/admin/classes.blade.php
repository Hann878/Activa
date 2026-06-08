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
                    <h1 class="h3 mb-1">Classes</h1>
                    <p class="text-muted mb-0">
                        Review classes, schedules, and related information.
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
                        <span>Class List</span>
                    </h2>

                    <p class="text-muted mb-0">
                        Search, review, and manage classes.
                    </p>
                </div>

                <div class="d-flex flex-wrap gap-2">
                    <input
                        class="form-control form-control-sm table-search"
                        type="search"
                        placeholder="Search classes">

                    <a class="btn btn-primary btn-sm"
                       href="{{ url('admin/classes/add-class') }}">
                        <i class="bi bi-plus"></i>
                        Add Class
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Name Class</th>
                            <th>Major</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($classes as $class)
                            <tr>
                                <td>
                                    <p class="fw-semibold mb-0">
                                        {{ $class->name }}
                                    </p>
                                </td>

                                <td>{{ $class->major }}</td>

                                <td class="text-end">
                                <button
                                    type="button"
                                    class="btn btn-warning btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $class->id }}">
                                    Edit
                                </button>
                                <div class="modal fade" id="editModal{{ $class->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <form action="{{ url('admin/classes/' . $class->id) }}"
                                                method="POST">

                                                @csrf
                                                @method('PUT')

                                                <div class="modal-header">
                                                    <h5 class="modal-title">
                                                        Edit Class
                                                    </h5>

                                                    <button type="button"
                                                        class="btn-close"
                                                        data-bs-dismiss="modal">
                                                    </button>
                                                </div>

                                                <div class="modal-body">

                                                    <div class="mb-3">
                                                        <label class="form-label d-block text-start">Nama Kelas</label>

                                                        <input
                                                            type="text"
                                                            name="name"
                                                            class="form-control"
                                                            value="{{ $class->name }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label d-block text-start">Major</label>

                                                        <input
                                                            type="text"
                                                            name="major"
                                                            class="form-control"
                                                            value="{{ $class->major }}">
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


                                    <button
                                        type="button"
                                        class="btn btn-danger btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $class->id }}">
                                        Delete
                                    </button>
                                    <div class="modal fade" id="deleteModal{{ $class->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>

                                                <div class="modal-body">
                                                    Yakin ingin menghapus kelas
                                                    <strong>{{ $class->name }}</strong>?
                                                </div>

                                                <div class="modal-footer">

                                                    <button
                                                        type="button"
                                                        class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        Batal
                                                    </button>

                                                    <form action="{{ url('/admin/classes/' . $class->id) }}"
                                                        method="POST">

                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit"
                                                            class="btn btn-danger">
                                                            Hapus
                                                        </button>

                                                    </form>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    Tidak ada data kelas
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-3">
                {{ $classes->links() }}
            </div>

        </section>

    </div>
</main>



@endsection