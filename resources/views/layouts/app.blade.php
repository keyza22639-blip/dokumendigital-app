<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Arsip | @yield('title', 'Sistem Manajemen Dokumen')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7f6; /* Abu-abu lembut */
            font-family: 'Poppins', sans-serif;
        }
        .navbar {
            background-color: #ffffff; /* Putih bersih */
            box-shadow: 0 2px 4px rgba(0,0,0,.05);
        }
        .main-content {
            padding-top: 20px;
        }
        .card-arsip {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); /* Shadow yang lembut */
            transition: transform 0.3s ease-in-out;
        }
        .card-arsip:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }
        .btn-primary-aesthetic {
            background-color: #38bdf8; /* Biru Langit (Aksen) */
            border-color: #38bdf8;
            font-weight: 600;
        }
        .btn-primary-aesthetic:hover {
            background-color: #0ea5e9;
            border-color: #0ea5e9;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand text-primary fw-bold" href="{{ route('arsip.index') }}">
                <i class="fas fa-archive me-2"></i> E-Arsip Digital
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="btn btn-primary-aesthetic" href="{{ route('arsip.create') }}">
                            <i class="fas fa-upload me-1"></i> Unggah Baru
                        </a>
                    </li>
                    </ul>
            </div>
        </div>
    </nav>

    <div class="container main-content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>