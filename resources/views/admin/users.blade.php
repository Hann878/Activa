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
                    <h1 class="h3 mb-1">Users</h1>
                    <p class="text-muted mb-0">
                        Review accounts, roles, account status, and team ownership.
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
                        <span>User List</span>
                    </h2>

                    <p class="text-muted mb-0">
                        Search, review, and manage user accounts.
                    </p>
                </div>

                <div class="d-flex flex-wrap gap-2">
                    <input
                        class="form-control form-control-sm table-search"
                        type="search"
                        placeholder="Search users">

                    <a class="btn btn-primary btn-sm"
                       href="{{ url('/admin/add-user') }}">
                        <i class="bi bi-person-plus"></i>
                        Add User
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Joined</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>
                                    <p class="fw-semibold mb-0">
                                        {{ $user->name }}
                                    </p>
                                </td>

                                <td>{{ $user->email }}</td>

                                <td>
                                    <span class="badge bg-primary">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>

                                <td>
                                    <span class="badge bg-success">
                                        Active
                                    </span>
                                </td>

                                <td>
                                    {{ $user->created_at->format('d M Y') }}
                                </td>

                                <td class="text-end">
                                <button
                                    type="button"
                                    class="btn btn-warning btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $user->id }}">
                                    Edit
                                </button>
                                <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <form action="{{ url('/admin/users/' . $user->id) }}"
                                                method="POST">

                                                @csrf
                                                @method('PUT')

                                                <div class="modal-header">
                                                    <h5 class="modal-title">
                                                        Edit User
                                                    </h5>

                                                    <button type="button"
                                                        class="btn-close"
                                                        data-bs-dismiss="modal">
                                                    </button>
                                                </div>

                                                <div class="modal-body">

                                                    <div class="mb-3">
                                                        <label class="form-label d-block text-start">Nama</label>

                                                        <input
                                                            type="text"
                                                            name="name"
                                                            class="form-control"
                                                            value="{{ $user->name }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label d-block text-start">Email</label>

                                                        <input
                                                            type="email"
                                                            name="email"
                                                            class="form-control"
                                                            value="{{ $user->email }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label d-block text-start">Role</label>

                                                        <select
                                                            name="role"
                                                            class="form-select"
                                                            onchange="toggleRoleFields({{ $user->id }}, this.value)">

                                                            <option
                                                                value="guru"
                                                                {{ $user->role == 'guru' ? 'selected' : '' }}>
                                                                Guru
                                                            </option>

                                                            <option
                                                                value="siswa"
                                                                {{ $user->role == 'siswa' ? 'selected' : '' }}>
                                                                Siswa
                                                            </option>

                                                        </select>
                                                    </div>

                                                    <!-- Teacher Fields -->

                                                    <div id="teacherFields{{ $user->id }}" style="{{ $user->role == 'guru' ? '' : 'display:none;' }}">

                                                        <hr>

                                                        <div class="mb-3">
                                                            <label class="form-label d-block text-start">NIP</label>
                                                            <input type="text" name="nip" class="form-control" value="{{ optional($user->teacher)->nip }}">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label d-block text-start">Subject</label>
                                                            <input type="text" name="subject" class="form-control" value="{{ optional($user->teacher)->subject }}">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label d-block text-start">Address</label>
                                                            <textarea name="address" class="form-control">{{ optional($user->teacher)->address }}</textarea>
                                                        </div>

                                                    </div>

                                                    <!-- Student Fields -->

                                                    <div id="studentFields{{ $user->id }}" style="{{ $user->role == 'siswa' ? '' : 'display:none;' }}">

                                                        <hr>

                                                        <div class="mb-3">
                                                            <label class="form-label d-block text-start">Class</label>
                                                            <select name="class_id" class="form-select">
                                                                <option value="" selected disabled>Choose Class</option>
                                                                @foreach($classes as $class)
                                                                    <option value="{{ $class->id }}" {{ optional($user->student)->class_id == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

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
                                        data-bs-target="#deleteModal{{ $user->id }}">
                                        Delete
                                    </button>
                                    <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>

                                                <div class="modal-body">
                                                    Yakin ingin menghapus user
                                                    <strong>{{ $user->name }}</strong>?
                                                </div>

                                                <div class="modal-footer">

                                                    <button
                                                        type="button"
                                                        class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        Batal
                                                    </button>

                                                    <form action="{{ url('/admin/users/' . $user->id) }}"
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
                                    Tidak ada data user
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-3">
                {{ $users->links() }}
            </div>

        </section>

    </div>
</main>

@endsection

@section('scripts')
<script>
function toggleRoleFields(id, value) {
    const teacher = document.getElementById('teacherFields' + id);
    const student = document.getElementById('studentFields' + id);

    if (value === 'guru') {
        if (teacher) teacher.style.display = '';
        if (student) student.style.display = 'none';
    } else if (value === 'siswa') {
        if (teacher) teacher.style.display = 'none';
        if (student) student.style.display = '';
    } else {
        if (teacher) teacher.style.display = 'none';
        if (student) student.style.display = 'none';
    }
}
</script>
@endsection