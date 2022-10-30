<nav class="navbar fixed-top navbar-expand-lg navbar-dark shadow-sm bg-primary">
    <div class="container">
        <a href="/" class="navbar-brand">
            <img src="/img/logo_unsika.png" width="40px" height="50px" alt="logo unsika" class="img-fluid">
            Siakad_20075
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dosen') ? 'active' : '' }}" href="/dosen">Dosen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('mahasiswa') ? 'active' : '' }}" href="/mahasiswa">Mahasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('matkul') ? 'active' : '' }}" href="/matkul">Mata Kuliah</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
