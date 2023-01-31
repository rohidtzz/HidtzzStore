<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ultras Garuda - Homepage </title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('landing/css/styles.css') }}" rel="stylesheet" />
    </head>
    <body>
        {{-- Navigation bottom --}}
        @if (Auth::Check())
        <nav class="navbar navbar-dark bg-light navbar-expand d-lg-none d-xl-none fixed-bottom">
            <ul class="navbar-nav nav-justified w-100">
                    <li class="nav-item">

                        <a type="submit" onclick="return confirm('yakin logout?');"  aria-current="page" href="{{ url('/logout') }}" style="color: rgb(45, 43, 43)" class="nav-link"><svg width="1.5em" height="1.5em" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                            <path d="M7.5 1v7h1V1h-1z"/>
                            <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
                        </svg><br>Logout</a>
                    </li>

              <li class="nav-item">
                <a href="#" style="color: rgb(45, 43, 43)" class="nav-link"><svg width="1.5em" height="1.5em" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-gear" viewBox="0 0 16 16">
                    <path d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207l-5 5V13.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 2 13.5V8.207l-.646.647a.5.5 0 1 1-.708-.708L7.293 1.5Z"/>
                    <path d="M11.886 9.46c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.044c-.613-.181-.613-1.049 0-1.23l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                  </svg><br>Dashboard</a>
              </li>
                <li class="nav-item">
                    <a href="#" style="color: rgb(45, 43, 43)" class="nav-link"><svg width="2em" height="2em" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
                        <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
                    </svg><br>Home</a>
                </li>

              <li class="nav-item">
                <a href="{{ url('cart') }}" style="color: rgb(45, 43, 43);" class="nav-link"><svg width="1.5em" height="1.5em" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                  </svg><br>Cart</a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/transaction/daftar') }}" style="color: rgb(45, 43, 43)" class="nav-link"><svg width="1.5em" height="1.5em" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
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
                <a class="navbar-brand" href="{{ url('/') }}">Sezione Tangerag</a>

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

                                <div class="form-floating mb-3">
                                    <input name="nik" type="number" class="form-control"  placeholder="name@example.com" required>
                                    <label for="floatingInput">Nik</label>
                                </div>

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
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/transaction/all') }}">Transaction</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/admin/product') }}">Product</a></li>
                        <li class="nav-item"><a class="nav-link active"  type="submit" onclick="return confirm('yakin logout?');"  aria-current="page" href="{{ url('/logout') }}">Logout</a></li>
                        @else
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/transaction/daftar') }}">Transaction</a></li>
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
        <!-- Header-->
        <header class="bg-dark py-5">
            {{-- <img style="width: 100%; height:1%"  src="{{ asset('tgr.png') }}" alt=""> --}}
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <img src="{{ asset('tgr.png') }}" width="100" height="100" alt="">
                    <h1 class="display-4 fw-bolder">Ultras Garuda Sezione Tangerang</h1>
                    {{-- <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p> --}}
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5  row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($product as $data )
                        <div class="k">
                            <div class="col mb-5">
                                <div class="card h-100">
                                    <!-- Product image-->
                                    <button style="border: none" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $data->id }}">
                                    <img class="kk img-thumbnail" src="{{ asset('product/img/'.$data->image) }}" alt="{{ $data->image }}" />
                                    </button>
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder">{{ $data->name }}</h5>
                                            <!-- Product price-->
                                            <p class="fst-italic">Rp. {{ number_format($data->price)  }}</p>
                                            <p id="stok" stock class="fst-italic"></p>
                                        </div>
                                        <div class="text-center">
                                            <p class="text-justify"> {{ $data->description}}</p>
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center">

                                            @if (Auth::Check())
                                                <a class="btn btn-outline-dark mt-auto" href="{{ url('cart/'.$data->id.'/create') }}">Add to cart</a>
                                                @else
                                                <button class="btn btn-outline-dark mt-auto" data-bs-toggle="modal" data-bs-target="#loginn">Buy NOW!</button>
                                            @endif

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card ">
                                        <div class="card-body">

                                            <div class="card-image">
                                                <span class="card-notify-badge"></span>
                                                {{-- <div class="justify-contet-center"> --}}
                                                    <center>
                                                    <img class="img-fluid" src="{{ asset('product/img/'.$data->image) }}" alt="{{ $data->image }}"/>
                                                </center>
                                                {{-- </div> --}}
                                            </div>
                                                <br>
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6 class="text-center">{{ $data->name }}</h6>
                                                    <br>
                                                    <p class="text-center">{{ $data->description }}</p>
                                                </div>
                                                <div class="col-6 text-center">
                                                    <br>
                                                    <p class="fst-italic">Rp. {{ number_format($data->price) }}</p>
                                                    <p id="stokk" class="fst-italic"></p>

                                                </div>
                                            </div>

                                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                                <div class="text-center">
                                                    @if (Auth::Check())
                                                <a class="btn btn-outline-dark mt-auto" href="{{ url('cart/'.$data->id.'/create') }}">Add to cart</a>
                                                @else
                                                <button class="btn btn-outline-dark mt-auto" data-bs-toggle="modal" data-bs-target="#loginn">Buy NOW!</button>
                                            @endif
                                                </div>

                                            </div>



                                        </div>
                                    </div>
                                </div>

                              </div>
                            </div>
                          </div>
                    @endforeach


                    </div>
                </div>
            </div>

            <div class="modal fade" id="loginn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <p class="d-flex justify-content-start">Don't have an account? <button data-bs-toggle="modal" data-bs-target="#registerr" style="background-color: white;color:black;border:none"> Sign Up</button>  </p>
                    </div>
                  </div>
                </div>
            </div>

            <div class="modal fade" id="registerr" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                            <div class="form-floating mb-3">
                                <input name="nik" type="number" class="form-control"  placeholder="name@example.com" required>
                                <label for="floatingInput">Nik</label>
                            </div>

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
        </section>
        <script>
            $(document).ready(function(){

                // selesai()
                setInterval(() => {
                    show()
                }, 1000);
            });

            function show(){

            $.ajax({
                url: "/stock",
                type: "GET",
                success: function(data){
                    $('#stok').empty()
                    $('#stokk').empty()

                    let kata = `stock: ${data[0].stock}`

                    document.getElementById("stok").innerHTML = kata
                    document.getElementById("stokk").innerHTML = kata
                },
                error: function(data){
                    alert("Terjadi Kesalahan!");
                }
            });

            }
        </script>

        <!-- Footer-->
        <footer class="py-5 bg-dark" >
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Ultras Garuda Sezione Tangerang @php echo date('Y') @endphp</p></div>
        </footer>
        @if (Auth::Check())
            <div class="d-lg-none d-xl-none">
                <br>
                <br>
                <br>
                <br>
            </div>
        @endif
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('landing/js/scripts.js') }}"></script>
        @include('sweetalert::alert')
    </body>
</html>
