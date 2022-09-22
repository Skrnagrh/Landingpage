<nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
    <!-- Navbar Brand-->
    <a href="#" class="navbar-brand ps-3">
        <img src="/img/logo/logo.png" alt="andromind" width="70%">
    </a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <p class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <strong>{{ auth()->user()->name }}</strong>
    </p>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-fill"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                {{-- <li><a class="dropdown-item" href="/dashboard/register/edit">
                <i class="bi bi-gear-fill"></i> Settings</a></li>
                <li>
                    <hr class="dropdown-divider" />
                </li> --}}
                <li>
                    <form action="/logout" method="post">
                        @csrf
                            <button class="dropdown-item" ><i class="bi bi-box-arrow-left"></i> Logout</button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
