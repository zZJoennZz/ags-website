<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky scroll--simple">
        <ul class="nav flex-column mt-4">
            <li class="nav-item">
                <a class="nav-link position-relative" href="{{ route('dashboard') }}">
                    <em class="bi bi-speedometer"></em>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link position-relative" href="{{ route('applicants.show') }}">
                    <em class="bi bi-person-lines-fill"></em>
                    Applicants
                </a>
            </li>
        </ul>
        <hr />
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link position-relative" href="{{ route('vacancies.show') }}">
                    <em class="bi bi-list-task"></em>
                    Vacancy
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link position-relative" href="{{ route('applicant-status.show') }}">
                    <em class="bi bi-tags-fill"></em>
                    Status
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link position-relative" href="{{ route('user.index') }}">
                    <em class="bi bi-people-fill"></em>
                    Users
                </a>
            </li>
        </ul>
        <hr />
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('settings.index') }}" class="nav-link position-relative">
                    <em class="bi bi-gear-fill"></em>
                    Settings
                </a>
            </li>
        </ul>
        <hr />
        <ul class="nav flex-column">
            <li class="nav-link">
                <div class="mb-3 mb-md-0 small text-muted">
                    Copyright © {{ date("Y") }}.
                    <div>
                        Alphalink Global Solutions.
                    </div>
                </div>
            </li>
        </ul>
        <hr />
    </div>
</nav>