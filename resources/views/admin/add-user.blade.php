@extends('layouts.alayout.sidebar')

@section('content')

<main class="dashboard-content">
    <div class="container-fluid px-3 px-lg-4 py-4">

        <div class="page-heading">
            <div class="page-heading-copy">
                <span class="page-icon">
                    <i class="bi bi-robot" aria-hidden="true"></i>
                </span>

                <div>
                    <p class="eyebrow mb-1">User Management</p>
                    <h1 class="h3 mb-1">Create User</h1>
                    <p class="text-muted mb-0">Set up a new user.</p>
                </div>
            </div>

            <div class="heading-actions">
                <a class="btn btn-outline-secondary btn-sm"
                    href="{{ url('/admin/users') }}">
                    <i class="bi bi-arrow-left"></i>
                    Back
                </a>
            </div>
        </div>

        <section class="row g-3">

            <div class="col-12 col-xl-8">

                <form
                    class="panel needs-validation"
                    novalidate
                    action="{{ url('/admin/add-user') }}"
                    method="POST">

                    @csrf

                    <div class="panel-header">
                        <div>
                            <h2 class="h5 mb-1 section-title">
                                <i class="bi bi-box"></i>
                                <span>User Information</span>
                            </h2>

                            <p class="text-muted mb-0">
                                Define the user settings.
                            </p>
                        </div>
                    </div>

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">
                                Name
                            </label>

                            <input
                                class="form-control"
                                type="text"
                                placeholder="Enter the name"
                                name="name"
                                required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">
                                Email
                            </label>

                            <input
                                class="form-control"
                                type="email"
                                placeholder="Enter the email"
                                name="email"
                                required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">
                                Password
                            </label>

                            <input
                                class="form-control"
                                type="password"
                                placeholder="Enter the password"
                                name="password"
                                required>
                        </div>

                        <div class="col-md-6">

                            <label class="form-label">
                                User Role
                            </label>

                            <select
                                class="form-select"
                                id="role"
                                required
                                name="role">

                                <option value="" selected disabled>
                                    Choose Role
                                </option>

                                <option value="siswa">
                                    Siswa
                                </option>

                                <option value="guru">
                                    Guru
                                </option>

                            </select>

                        </div>

                    </div>

                    <!-- Teacher Fields -->

                    <div
                        id="teacherFields"
                        style="display:none;">

                        <hr>

                        <h5 class="mb-3">
                            Teacher Information
                        </h5>

                        <div class="row g-3">

                            <div class="col-md-6">

                                <label class="form-label">
                                    NIP
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    name="nip">

                            </div>

                            <div class="col-md-6">

                                <label class="form-label">
                                    Subject
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    name="subject">

                            </div>

                            <div class="col-12">

                                <label class="form-label">
                                    Address
                                </label>

                                <textarea
                                    class="form-control"
                                    rows="3"
                                    name="address"></textarea>

                            </div>

                        </div>

                    </div>

                    <div class="d-flex flex-wrap justify-content-end gap-2 mt-4">

                        <a
                            class="btn btn-outline-secondary"
                            href="{{ url('/admin/users') }}">
                            Cancel
                        </a>

                        <button
                            class="btn btn-primary"
                            type="submit">

                            <i class="bi bi-check-circle"></i>
                            Create User

                        </button>

                    </div>

                </form>

            </div>

        </section>

    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const role = document.getElementById('role');
    const teacherFields = document.getElementById('teacherFields');

    role.addEventListener('change', function () {

        if (this.value === 'guru') {
            teacherFields.style.display = 'block';
        } else {
            teacherFields.style.display = 'none';
        }

    });

});
</script>

@endsection