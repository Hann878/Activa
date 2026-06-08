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
                    <p class="eyebrow mb-1">Class Management</p>
                    <h1 class="h3 mb-1">Create Class</h1>
                    <p class="text-muted mb-0">Set up a new class.</p>
                </div>
            </div>

            <div class="heading-actions">
                <a class="btn btn-outline-secondary btn-sm"
                    href="{{ url('/admin/classes') }}">
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
                    action="{{ url('/admin/classes/add-class') }}"
                    method="POST">

                    @csrf

                    <div class="panel-header">
                        <div>
                            <h2 class="h5 mb-1 section-title">
                                <i class="bi bi-box"></i>
                                <span>Class Information</span>
                            </h2>

                            <p class="text-muted mb-0">
                                Define the class settings.
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
                                Major
                            </label>

                            <input
                                class="form-control"
                                type="text"
                                placeholder="Enter the major"
                                name="major"
                                required>
                        </div>

                        <a
                            class="btn btn-outline-secondary"
                            href="{{ url('/admin/classes') }}">
                            Cancel
                        </a>

                        <button
                            class="btn btn-primary"
                            type="submit">

                            <i class="bi bi-check-circle"></i>
                            Create Class

                        </button>

                    </div>

                </form>

            </div>

        </section>

    </div>


</main>




@endsection