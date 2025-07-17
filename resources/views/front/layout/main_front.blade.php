<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>NINGRUM HOSPITAL</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    @stack('styles')
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
    }
    .carousel img {
      height: 450px;
      object-fit: cover;
      border-radius: 8px;
    }
    footer {
      background-color: #f8f9fa;
      border-top: 1px solid #dee2e6;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success sticky-top shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ route('home.index') }}">NINGRUM HOSPITAL</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
  <li class="nav-item">
    <a class="nav-link active" href="{{ route('home.index') }}">Beranda</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
      Tentang RS
    </a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="{{ route('visi_misi') }}">Visi & Misi</a></li>
      <li><a class="dropdown-item" href="{{ route('sambutan_direktur') }}">Sambutan Direktur RS</a></li>
    </ul>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('login') }}">Login</a>
  </li>
</ul>
    </div>
  </div>
</nav>

@yield('content')

@stack('scripts')
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
