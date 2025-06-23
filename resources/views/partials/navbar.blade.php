<!-- Topbar Start -->
<div class="container-fluid bg-primary py-3">
    <div class="container">
        <!-- isi topbar -->
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar Start -->
<div class="container-fluid position-relative nav-bar p-0">
    <div class="container-lg position-relative p-0 px-lg-3">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 pl-3 pl-lg-5">
            <a href="{{ url('/') }}" class="navbar-brand">
                <h1 class="m-0 text-secondary"><span class="text-primary">LAUND</span>RYFY</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav ml-auto py-0">
                    <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
                    <a href="{{ url('/about') }}" class="nav-item nav-link">About</a>
                    <a href="{{ url('/services') }}" class="nav-item nav-link">Services</a>
                    <a href="{{ url('/pricing') }}" class="nav-item nav-link">Pricing</a>
                    <a href="{{ url('/blog') }}" class="nav-item nav-link">Blog</a>
                    <!-- <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a> -->
                    <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
