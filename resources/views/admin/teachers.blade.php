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
                    <h1 class="h3 mb-1">Teachers</h1>
                    <p class="text-muted mb-0">
                        Review teacher accounts, account status, and other details.
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
                        <span>Teacher List</span>
                    </h2>

                    <p class="text-muted mb-0">
                        Search, review, and manage teacher accounts.
                    </p>
                </div>

                <div class="d-flex flex-wrap gap-2">
                    <input
                        class="form-control form-control-sm table-search"
                        type="search"
                        placeholder="Search teachers">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>User Id</th>
                            <th>Name</th>
                            <th>NIP</th>
                            <th>Subject</th>
                            <th>Address</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($teachers as $teacher)
                            <tr>

                                <td>{{ $teacher->id }}</td>

                                <td>{{ $teacher->user_id }}</td>

                                <td>
                                    {{ $teacher->user->name }}
                                </td>

                                <td>{{ $teacher->nip }}</td>

                                <td>{{ $teacher->subject }}</td>

                                <td>{{ $teacher->address }}</td>

                                <td class="text-end">

                                    <button
                                        type="button"
                                        class="btn btn-warning btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $teacher->id }}">
                                        Edit
                                    </button>

                                    <div class="modal fade"
                                        id="editModal{{ $teacher->id }}"
                                        tabindex="-1">

                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <form
                                                    action="{{ url('/admin/teachers/' . $teacher->id) }}"
                                                    method="POST">

                                                    @csrf
                                                    @method('PUT')

                                                    <div class="modal-header">

                                                        <h5 class="modal-title">
                                                            Edit Teacher
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
                                                                Nama
                                                            </label>

                                                            <input
                                                                type="text"
                                                                name="name"
                                                                class="form-control"
                                                                value="{{ $teacher->user->name }}">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label d-block text-start">
                                                                Email
                                                            </label>

                                                            <input
                                                                type="email"
                                                                name="email"
                                                                class="form-control"
                                                                value="{{ $teacher->user->email }}">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label d-block text-start">
                                                                NIP
                                                            </label>

                                                            <input
                                                                type="text"
                                                                name="nip"
                                                                class="form-control"
                                                                value="{{ $teacher->nip }}">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label d-block text-start">
                                                                Subject
                                                            </label>

                                                            <input
                                                                type="text"
                                                                name="subject"
                                                                class="form-control"
                                                                value="{{ $teacher->subject }}">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label d-block text-start">
                                                                Address
                                                            </label>

                                                            <textarea
                                                                name="address"
                                                                class="form-control"
                                                                rows="3">{{ $teacher->address }}</textarea>
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
                                        data-bs-target="#deleteModal{{ $teacher->id }}">
                                        Delete
                                    </button>

                                    <div class="modal fade"
                                        id="deleteModal{{ $teacher->id }}"
                                        tabindex="-1">

                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">

                                                    <h5 class="modal-title">
                                                        Konfirmasi Hapus
                                                    </h5>

                                                    <button
                                                        type="button"
                                                        class="btn-close"
                                                        data-bs-dismiss="modal">
                                                    </button>

                                                </div>

                                                <div class="modal-body">

                                                    Yakin ingin menghapus teacher

                                                    <strong>
                                                        {{ $teacher->user->name }}
                                                    </strong> ?

                                                </div>

                                                <div class="modal-footer">

                                                    <button
                                                        type="button"
                                                        class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        Batal
                                                    </button>

                                                    <form
                                                        action="{{ url('/admin/teachers/' . $teacher->id) }}"
                                                        method="POST">

                                                        @csrf
                                                        @method('DELETE')

                                                        <button
                                                            type="submit"
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
                                <td colspan="7" class="text-center py-4">
                                    Tidak ada data teacher
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