@extends('layouts.alayout.sidebar')

@section('content')


<main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
          <div class="page-heading">
            <div class="page-heading-copy">
              <span class="page-icon"><i class="bi bi-robot" aria-hidden="true"></i></span>
              <div>
                <p class="eyebrow mb-1">User Management</p>
                <h1 class="h3 mb-1">Create User</h1>
                <p class="text-muted mb-0">Set up a new user.</p>
              </div>
            </div>
            <div class="heading-actions"><a class="btn btn-outline-secondary btn-sm" href="{{ url('/admin/users') }}"><i class="bi bi-arrow-left" aria-hidden="true"></i> Back</a></div>
          </div>

          <section class="row g-3">
            <div class="col-12 col-xl-8">
              <form class="panel needs-validation" novalidate action="{{ url('/admin/add-user') }}" method="POST">
                @csrf
                <div class="panel-header"><div><h2 class="h5 mb-1 section-title"><i class="bi bi-box" aria-hidden="true"></i><span>User Information</span></h2><p class="text-muted mb-0">Define the user settings.</p></div></div>

                <div class="row g-3"> 
                  <div class="col-md-6"><label class="form-label" for="agentName">Name</label><input class="form-control" id="agentName" type="text" placeholder="Enter the name" name="name" required><div class="invalid-feedback">User name is required.</div></div>

                  <div class="col-md-6"><label class="form-label" for="agentName">Email</label><input class="form-control" id="agentName" type="email" placeholder="Enter the email" name="email" required><div class="invalid-feedback">Email is required.</div></div>

                <div class="row g-3"> 
                  <div class="col-md-6"><label class="form-label" for="agentName">Password</label><input class="form-control" id="agentName" type="password" placeholder="Enter the password" name="password" required><div class="invalid-feedback">Password is required.</div></div>

            <div class="col-md-6">
                <label class="form-label" for="agentType">User Role</label>

                <select class="form-select" id="agentType" required name="role">
                    <option value="" selected disabled>Choose Role</option>
                    <option value="siswa">Siswa</option>
                    <option value="guru">Guru</option>
                </select>

                <div class="invalid-feedback">
                    Choose a user role.
                </div>
            </div>

                </div>
                <div class="d-flex flex-wrap justify-content-end gap-2 mt-4"><a class="btn btn-outline-secondary" href="{{ url('/admin/users') }}">Cancel</a><button class="btn btn-primary" type="submit"><i class="bi bi-check-circle" aria-hidden="true"></i> Create User</button></div>
              </form>
            </div>
            </div>
        </section>
    </div>
</main>



@endsection