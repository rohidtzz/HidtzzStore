@section('navbar')
    @if (Auth::check())
        <nav class="p-0 navbar navbar-dark bg-light navbar-expand d-lg-none d-xl-none fixed-bottom">
            <ul class="navbar-nav nav-justified w-100">
                <li class="nav-item">
                    <a type="submit" onclick="return confirm('yakin logout?');"  aria-current="page" href="{{ url('/logout') }}" style="color: rgb(45, 43, 43)" class="nav-link"><svg width="1.5em" height="1.5em" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                        <path d="M7.5 1v7h1V1h-1z"/>
                        <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
                    </svg><br>Logout</a>
                </li>

                {{-- <li class="nav-item">
                    <a href="" class="nav-link" style="color: rgb(45, 43, 43)" ><svg xmlns="http://www.w3.org/2000/svg" width="1.7em" height="1.7em" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                    </svg><br>Profile</a>
                </li> --}}
                <li class="nav-item dropup">
                    <a style="color: rgb(45, 43, 43)" class="nav-link" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.7em" height="1.7em" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                        </svg><br>Profile
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Account</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Alamat</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/') }}" style="color: rgb(45, 43, 43)" class="nav-link"><svg width="2em" height="2em" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
                        <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
                    </svg><br>Home</a>

                </li>

                <li class="nav-item">
                    <a href="{{ url('/cart') }}" style="color: rgb(45, 43, 43);" class="nav-link"><svg width="1.5em" height="1.5em" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg><br>Cart</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/transaction') }}" style="color: rgb(45, 43, 43)" class="nav-link"><svg width="1.5em" height="1.5em" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                        <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                    </svg><br>Transaksi</a>
                </li>
            </ul>
        </nav>
    @endif

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container px-4 px-lg-5">
            <span class="navbar-brand">Hidtzz Store</span>

            @if(Auth::check())

            @else
            <button style="margin-right:10px "  class="btn btn-outline-dark d-md-none d-lg-none d-xl-none" data-bs-toggle="modal" data-bs-target="#login">
                Login
            </button>

            <button class="btn btn-outline-dark d-md-none d-lg-none d-xl-none" data-bs-toggle="modal" data-bs-target="#register">
                Register
            </button>

            @endif

            <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                            <input name="username" type="text" class="form-control"  placeholder="username" required>
                            <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                            <input name="password" type="password" class="form-control" placeholder="Password" required>
                            <label for="floatingPassword">Password</label>
                            </div>
                            <div class="d-grid">
                            <button class="btn btn-primary text-uppercase fw-bold" type="submit">Sign in</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <p class="d-flex justify-content-start">Don't have an account? <button data-bs-toggle="modal" data-bs-target="#register" style="background-color: white;color:black;border:none"> Sign Up</button>  </p>
                    </div>
                </div>
                </div>
            </div>



            <div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                            <input name="username" type="text" class="form-control"  placeholder="name@example.com" required>
                            <label for="floatingInput">Username</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input name="password" type="password" class="form-control"  placeholder="Password" required>
                                <label for="floatingPassword">Password</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input name="email" type="email" class="form-control"  placeholder="name@example.com" required>
                                <label for="floatingInput">Email</label>
                            </div>

                            {{-- <div class="form-floating mb-3">
                                <input name="nik" type="number" class="form-control"  placeholder="name@example.com" required>
                                <label for="floatingInput">Nik</label>
                            </div> --}}

                            <div class="form-floating mb-3">
                                <input name="name" type="text" class="form-control"  placeholder="name@example.com" required>
                                <label for="floatingInput">Nama Lengkap</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input name="no_hp" type="number" class="form-control"  placeholder="name@example.com" required>
                                <label for="floatingInput">No Hp</label>
                            </div>

                            {{-- <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput"></label>
                            </div> --}}


                            <div class="d-grid">
                            <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign up</button>
                            </div>
                        </form>

                    </div>

                </div>
                </div>
            </div>

            {{-- <img src="{{ asset('tgr.png') }}" width="35" height="35" alt=""> --}}
            <button class="navbar-toggler d-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a></li>
                    @if (Auth::Check())

                    @if (Auth()->user()->role == "admin" || Auth()->user()->role == "staff")
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('admin/transaction') }}">Transaction</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/admin/product') }}">Product</a></li>
                    <li class="nav-item"><a class="nav-link active"  type="submit" onclick="return confirm('yakin logout?');"  aria-current="page" href="{{ url('/logout') }}">Logout</a></li>
                    @else
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/transaction') }}">Transaction</a></li>
                    <li class="nav-item"><a class="nav-link active"  type="submit" onclick="return confirm('yakin logout?');"  aria-current="page" href="{{ url('/logout') }}">Logout</a></li>

                    @endif

                    @else
                    @endif

                    {{-- <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">All Products</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                            <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                        </ul>
                    </li> --}}
                </ul>

                    @if(Auth::check())
                    <a class="btn btn-outline-dark" href="{{ url('cart') }}">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">{{ $cart }}</span>
                    </a>
                    @else
                    <button style="margin-right:10px " class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#login">
                        Login
                    </button>





                    <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#register">
                        Register
                    </button>




                    @endif

                    {{-- <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                    </button> --}}

                    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-fullscreen-xxl-down">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                        </div>
                    </div> --}}
            </div>
        </div>
    </nav>
@endsection
