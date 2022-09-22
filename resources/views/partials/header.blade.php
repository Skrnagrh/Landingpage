<!-- Header -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="/" class="logo">
        <img src="/img/logo/logo.png" alt="andromind">
      </a>

      <!-- Navbar -->
      <nav id="navbar" class="navbar">
        <ul>
          <li class="dropdown"><a class="nav-link scrollto {{($active === "home") ? 'active' : '' }}" href="/"><span>Home</span><i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/#about">About</a></li>
              <li><a href="/#jobsprospect">Jobs Prospect</a></li>
              <li><a href="/#news">News</a></li>
            </ul>
          </li>
          <li class="dropdown"><a class="nav-link scrollto {{($active === "startup") ? 'active' : '' }}" href="/startup"><span>Start Up</span><i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/startup/#unicorn">Unicorn</a></li>
              <li><a href="/startup/#unicorn">Decacorn</a></li>
              <li><a href="/startup/#unicorn">Hectocron</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto {{($active === "news") ? 'active' : '' }}" href="/news">News</a></li>
          <li><a class="nav-link scrollto {{($active === "work") ? 'active' : '' }}" href="/work">Karier</a></li>
          {{-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> --}}
          <li><a class="nav-link scrollto {{($active === "contact") ? 'active' : '' }}" href="/contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- Akhir Navbar -->
    </div>
  </header>
  <!-- Akhir Header -->