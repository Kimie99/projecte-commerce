<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="https://img.freepik.com/free-vector/letter-s-logo-vector_23987-138.jpg?size=338&ext=jpg" alt="" /></a><h3 style="color: white; ">Shopee Ciplak</h3>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ml-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Delivery</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#team">Profile</a></li>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </ul>
        </div>
    </div>
</nav>
