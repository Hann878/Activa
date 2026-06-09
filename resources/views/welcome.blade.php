<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Activa - School Management System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
:root{
    --primary:#2563eb;
    --secondary:#1e293b;
}

body{
    font-family:'Segoe UI',sans-serif;
    background:#f8fafc;
}

/* NAVBAR */
.navbar{
    background:rgba(255,255,255,.08);
    backdrop-filter:blur(12px);
    border-bottom:1px solid rgba(255,255,255,.1);
    position:fixed;
    width:100%;
    z-index:999;
}

/* HERO */
.hero{
    min-height:100vh;
    display:flex;
    align-items:center;
    background:radial-gradient(circle at top right,#60a5fa,#2563eb 45%,#1e3a8a);
    color:white;
    position:relative;
    overflow:hidden;
}

.hero::before{
    content:'';
    position:absolute;
    width:600px;
    height:600px;
    background:rgba(255,255,255,.08);
    border-radius:50%;
    top:-250px;
    right:-200px;
}

.hero h1{
    font-size:4rem;
    font-weight:800;
    line-height:1.1;
}

.hero p{
    opacity:.9;
    font-size:1.1rem;
}

.btn-custom{
    padding:14px 30px;
    border-radius:14px;
    font-weight:600;
}

/* STAT */
.stats{
    background:white;
}

.stat-number{
    font-size:2.5rem;
    font-weight:bold;
    color:#2563eb;
}

/* FEATURES */
.feature-card{
    border:none;
    border-radius:24px;
    transition:.4s;
}

.feature-card:hover{
    transform:translateY(-10px);
    box-shadow:0 20px 40px rgba(0,0,0,.1);
}

.feature-icon{
    width:70px;
    height:70px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:50%;
    background:#dbeafe;
    font-size:28px;
    margin:auto;
}

/* ROLE */
.role-card{
    border:none;
    border-radius:24px;
    transition:.4s;
}

.role-card:hover{
    transform:translateY(-8px);
    box-shadow:0 20px 40px rgba(37,99,235,.15);
}

/* FOOTER */
footer{
    background:#0f172a;
    color:white;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand fw-bold text-white fs-3" href="#">
            Activa
        </a>

        <div class="d-flex gap-2">
            <a href="{{ url('/login') }}" class="btn btn-light">
                Login
            </a>
            <a href="{{ url('/register') }}" class="btn btn-outline-light">
                Register
            </a>
        </div>
    </div>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6">
                <h1>Smart School Management Platform</h1>

                <p class="mt-3">
                    Kelola data siswa, guru, kelas, dan jurnal harian
                    dalam satu sistem modern, cepat, dan efisien.
                </p>

                <div class="mt-4 d-flex gap-2">
                    <a href="{{ url('/login') }}" class="btn btn-light btn-custom">
                        Get Started
                    </a>
                    <a href="#features" class="btn btn-outline-light btn-custom">
                        Learn More
                    </a>
                </div>
            </div>

            <div class="col-lg-6 text-center mt-5 mt-lg-0">
                <img src="https://cdni.iconscout.com/illustration/premium/thumb/school-management-system-illustration-4759505.png"
                     class="img-fluid"
                     style="max-width:520px;">
            </div>

        </div>
    </div>
</section>


<!-- FEATURES -->
<section id="features" class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Features</h2>
            <p class="text-muted">Semua kebutuhan sekolah dalam satu platform</p>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card feature-card shadow-sm p-4 text-center">
                    <div class="feature-icon">👨‍🎓</div>
                    <h5 class="mt-3">Student Management</h5>
                    <p class="text-muted">Kelola data siswa dengan mudah.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card feature-card shadow-sm p-4 text-center">
                    <div class="feature-icon">👨‍🏫</div>
                    <h5 class="mt-3">Teacher Management</h5>
                    <p class="text-muted">Monitoring data guru secara real-time.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card feature-card shadow-sm p-4 text-center">
                    <div class="feature-icon">📖</div>
                    <h5 class="mt-3">Daily Journal</h5>
                    <p class="text-muted">Catat aktivitas belajar harian siswa.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ROLES -->
<section class="py-5 bg-light">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">User Roles</h2>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card role-card shadow-sm p-4 text-center">
                    <h4>Admin</h4>
                    <p>Mengelola seluruh sistem.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card role-card shadow-sm p-4 text-center">
                    <h4>Teacher</h4>
                    <p>Mengelola siswa & jurnal.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card role-card shadow-sm p-4 text-center">
                    <h4>Student</h4>
                    <p>Melihat perkembangan belajar.</p>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- CTA -->
<section class="py-5 text-center text-white"
style="background:linear-gradient(135deg,#1d4ed8,#2563eb);">

    <div class="container">

        <h2 class="fw-bold display-5">
            Ready to Transform Your School?
        </h2>

        <p class="lead mb-4">
            Sistem digital untuk manajemen sekolah modern
        </p>

        <div class="d-flex justify-content-center gap-3">
            <a href="{{ url('/login') }}" class="btn btn-light btn-lg">
                Login
            </a>
            <a href="{{ url('/register') }}" class="btn btn-outline-light btn-lg">
                Register
            </a>
        </div>

    </div>

</section>

<!-- FOOTER -->
<footer class="py-4 text-center">
    <div class="container">
        <p class="mb-0">© {{ date('Y') }} Activa. All Rights Reserved.</p>
    </div>
</footer>

</body>
</html>