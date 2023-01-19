<header class="navbar navbar-light sticky-top bg-light flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 fw-bold" href="{{ url('/') }}"><img src="{{ asset('img/logo-ft.png') }}" alt="ASG Logo" style="width: 100px;"></a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    {{-- <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search"> --}}
    <div class="w-100 ps-2 small text-dark">
        Hello, <span class="badge rounded-pill bg-primary"><em class="bi bi-person-circle"></em></span> <strong>{{ Auth::user()->first_name }}</strong>
    </div>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="{{ route('logout.perform') }}">Logout</a>
        </div>
    </div>
</header>