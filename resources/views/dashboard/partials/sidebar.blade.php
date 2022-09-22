<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading  text-danger">Core</div>
                <a class="nav-link  text-danger" href="/dashboard">
                    <div class="sb-nav-link-icon  text-danger"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading  text-danger">Interface</div>
                <a class="nav-link collapsed  text-danger" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon  text-danger"><i class="fas fa-columns"></i></div>
                    Content
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down text-danger"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('dashboard/prospect*') ? 'active' : '' }} text-decoration-none text-danger"
                                href="/dashboard/prospect">Jobs Prospect</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ Request::is('dashboard/startup*') ? 'active' : '' }} text-decoration-none  text-danger"
                                href="/dashboard/startup">Start up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ Request::is('dashboard/work*') ? 'active' : '' }} text-decoration-none  text-danger"
                                href="/dashboard/work">Work</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ Request::is('dashboard/news*') ? 'active' : '' }} text-decoration-none  text-danger"
                                href="/dashboard/news"> News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ Request::is('dashboard/apply*') ? 'active' : '' }} text-decoration-none  text-danger"
                                href="/dashboard/apply">Apply</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ Request::is('dashboard/categories*') ? 'active' : '' }} text-decoration-none  text-danger"
                                href="/dashboard/categories">Categories</a>
                        </li>
                    </nav>
                </div>
                <a class="nav-link collapsed text-danger" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                    aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon text-danger"><i class="fas fa-book-open text-danger"></i></div>
                    Pages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down text-danger"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        {{-- <form action="/logout" method="post">
                            @csrf
                            <button class="nav-link bg-light"> Logout
                                <span data-feather="log-out"></span></button>
                        </form> --}}
                        <a class="nav-link text-danger" href="/dashboard/register">Register</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">

            {{-- @if ($user->image)
            <img src="{{ asset('storage/' . $user->image) }}" class="img-circle" style="border-radius: 50%;" alt="{{ $user->name }}">
             </div> --}}
            {{-- @else --}}
            {{-- <a href="/dashboard/user" class="text-decoration-none  text-danger" style="">
                <img src="/img/logo/profile.jpg" alt="profile" height="50px" class="img-circle"
                    style="border-radius: 50%;">
            </a> --}}
            {{-- @endif --}}
            {{-- <strong>{{ auth()->user()->name }}</strong> --}}


        </div>
    </nav>
</div>
