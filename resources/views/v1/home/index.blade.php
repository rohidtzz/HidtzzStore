@extends('home.layouts.master')
@extends('home.layouts.navbar')
@extends('home.layouts.hero')
@section('content')
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-md-3 row-cols-xl-4 justify-content-center">
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

@endsection
@extends('home.layouts.footer')
