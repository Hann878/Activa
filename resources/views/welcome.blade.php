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
            font-family: 'Segoe UI', sans-serif;
            background:#f8fafc;
        }

        .hero{
            min-height:100vh;
            display:flex;
            align-items:center;
            background:
                linear-gradient(
                    135deg,
                    #2563eb 0%,
                    #3b82f6 100%
                );
            color:white;
        }

        .hero h1{
            font-size:3.5rem;
            font-weight:700;
        }

        .hero p{
            font-size:1.1rem;
            opacity:.9;
        }

        .btn-custom{
            padding:12px 28px;
            border-radius:12px;
            font-weight:600;
        }

        .feature-card{
            border:none;
            border-radius:20px;
            transition:.3s;
            height:100%;
        }

        .feature-card:hover{
            transform:translateY(-8px);
        }

        .feature-icon{
            width:70px;
            height:70px;
            display:flex;
            align-items:center;
            justify-content:center;
            border-radius:50%;
            background:#dbeafe;
            color:#2563eb;
            font-size:28px;
            margin:auto;
        }

        .stats{
            background:white;
        }

        .stat-number{
            font-size:2.5rem;
            font-weight:bold;
            color:#2563eb;
        }

        .role-card{
            border:none;
            border-radius:20px;
            transition:.3s;
        }

        .role-card:hover{
            transform:scale(1.03);
        }

        footer{
            background:#0f172a;
            color:white;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-transparent position-absolute w-100">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            Activa
        </a>

        <div>
            <a href="{{ url('/login') }}" class="btn btn-light">
                Login
            </a>
        </div>
    </div>
</nav>

<!-- Hero -->
<section class="hero">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6">
                <h1>
                    Smart School Management Platform
                </h1>

                <p class="mt-3">
                    Kelola data siswa, guru, kelas, dan jurnal harian
                    dalam satu sistem yang modern, cepat, dan mudah digunakan.
                </p>

                <div class="mt-4">
                    <a href="{{ url('/login') }}"
                       class="btn btn-light btn-custom me-2">
                        Get Started
                    </a>

                    <a href="#features"
                       class="btn btn-outline-light btn-custom">
                        Learn More
                    </a>
                </div>
            </div>

            <div class="col-lg-6 text-center mt-5 mt-lg-0">
                <img
                    src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png"
                    class="img-fluid"
                    style="max-width:450px;"
                >
            </div>

        </div>
    </div>
</section>

<!-- Features -->
<section id="features" class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Features</h2>
            <p class="text-muted">
                Semua kebutuhan sekolah dalam satu platform.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card feature-card shadow-sm p-4 text-center">
                    <div class="feature-icon">👨‍🎓</div>
                    <h5 class="mt-3">Student Management</h5>
                    <p class="text-muted">
                        Kelola data siswa secara mudah dan terstruktur.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card feature-card shadow-sm p-4 text-center">
                    <div class="feature-icon">👨‍🏫</div>
                    <h5 class="mt-3">Teacher Management</h5>
                    <p class="text-muted">
                        Monitoring dan manajemen data guru.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card feature-card shadow-sm p-4 text-center">
                    <div class="feature-icon">📖</div>
                    <h5 class="mt-3">Daily Journal</h5>
                    <p class="text-muted">
                        Catat aktivitas dan perkembangan siswa setiap hari.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- Stats -->
{{-- <section class="stats py-5">
    <div class="container">
        <div class="row text-center">

            <div class="col-md-4">
                <div class="stat-number">1000+</div>
                <p>Siswa</p>
            </div>

            <div class="col-md-4">
                <div class="stat-number">100+</div>
                <p>Guru</p>
            </div>

            <div class="col-md-4">
                <div class="stat-number">50+</div>
                <p>Kelas</p>
            </div>

        </div>
    </div>
</section> --}}

<!-- Role -->
<section class="py-5 bg-light">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">User Roles</h2>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card role-card shadow-sm p-4 text-center">
                    <h4>Admin</h4>
                    <p>Mengelola seluruh sistem dan data sekolah.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card role-card shadow-sm p-4 text-center">
                    <h4>Teacher</h4>
                    <p>Mengelola siswa, jurnal, dan aktivitas pembelajaran.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card role-card shadow-sm p-4 text-center">
                    <h4>Student</h4>
                    <p>Melihat jurnal dan perkembangan aktivitas belajar.</p>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- CTA -->
<section class="py-5 text-center text-white"
         style="background:#2563eb;">
    <div class="container">
        <h2 class="fw-bold">
            Ready to Use Activa?
        </h2>

        <p class="mb-4">
            Mulai kelola sekolah secara digital sekarang.
        </p>

        <a href="{{ url('/login') }}"
           class="btn btn-light btn-lg">
            Login Now
        </a>
    </div>
</section>

<footer class="py-4 text-center">
    <div class="container">
        <p class="mb-0">
            © {{ date('Y') }} Activa. All Rights Reserved.
        </p>
    </div>
</footer>

</body>
</html>