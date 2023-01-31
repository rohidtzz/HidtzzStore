<!DOCTYPE html>
<html>
<head>
	<title>Ultras Garuda - Detail Transaction</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	{{-- <link rel="stylesheet" href="assets/css/style.css"> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        .shopping-cart{
	padding-bottom: 50px;
	font-family: 'Montserrat', sans-serif;
}
body{
    background-color: #f6f6f6;

}

.shopping-cart.dark{
	background-color: #f6f6f6;
}

.shopping-cart .content{
	box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
	background-color: white;
}

.shopping-cart .block-heading{
    padding-top: 50px;
    margin-bottom: 40px;
    text-align: center;
}

.shopping-cart .block-heading p{
	text-align: center;
	max-width: 420px;
	margin: auto;
	opacity:0.7;
}

.shopping-cart .dark .block-heading p{
	opacity:0.8;
}

.shopping-cart .block-heading h1,
.shopping-cart .block-heading h2,
.shopping-cart .block-heading h3 {
	margin-bottom:1.2rem;
	color: #3b99e0;
}

.shopping-cart .items{
	margin: auto;
}

.shopping-cart .items .product{
	margin-bottom: 20px;
	padding-top: 20px;
	padding-bottom: 20px;
}

.shopping-cart .items .product .info{
	padding-top: 0px;
	text-align: center;
}

.shopping-cart .items .product .info .product-name{
	font-weight: 600;
}

.shopping-cart .items .product .info .product-name .product-info{
	font-size: 14px;
	margin-top: 15px;
}

.shopping-cart .items .product .info .product-name .product-info .value{
	font-weight: 400;
}

.shopping-cart .items .product .info .quantity .quantity-input{
    margin: auto;
    width: 80px;
}

.shopping-cart .items .product .info .price{
	margin-top: 15px;
    font-weight: bold;
    font-size: 22px;
 }

.shopping-cart .summary{
	border-top: 2px solid #5ea4f3;
    background-color: #f7fbff;
    height: 100%;
    padding: 30px;
}

.shopping-cart .summary h3{
	text-align: center;
	font-size: 1.3em;
	font-weight: 600;
	padding-top: 20px;
	padding-bottom: 20px;
}

.shopping-cart .summary .summary-item:not(:last-of-type){
	padding-bottom: 10px;
	padding-top: 10px;
	border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

.shopping-cart .summary .text{
	font-size: 1em;
	font-weight: 600;
}

.shopping-cart .summary .price{
	font-size: 1em;
	float: right;
}

.shopping-cart .summary button{
	margin-top: 20px;
}

@media (min-width: 768px) {
	.shopping-cart .items .product .info {
		padding-top: 25px;
		text-align: left;
	}

	.shopping-cart .items .product .info .price {
		font-weight: bold;
		font-size: 22px;
		top: 17px;
	}

	.shopping-cart .items .product .info .quantity {
		text-align: center;
	}
	.shopping-cart .items .product .info .quantity .quantity-input {
		padding: 4px 10px;
		text-align: center;
	}
}

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            {{-- <a class="navbar-brand" href="#!">Hidtzz Store</a> --}}
            <a class="navbar-brand" href="{{ url('/') }}">Sezione Tangerag</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
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

            </div>
        </div>
    </nav>

    {{-- <nav class="navbar navbar-dark bg-primary navbar-expand fixed-bottom d-md-none d-lg-none d-xl-none">
        <ul class="navbar-nav nav-justified w-100">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-house" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
              </svg>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
              </svg>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-plus-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
              </svg>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-heart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
              </svg>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
              </svg>
            </a>
          </li>
        </ul>
      </nav> --}}

	<main class="page" style="margin-top: 4% ">
	 	<section class="shopping-cart dark">

	 		<div class="container">
		        {{-- <div class="block-heading">
		          <h2>Shopping Cart</h2>
		          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
		        </div> --}}

		        <div class="content">
	 				<div class="row">
	 					<div class="col-md-12 col-lg-8">
	 						<div class="items">
                                <h6 style="margin:2%">Status : @if ($status == "PAID")
                                    <span class="value badge bg-primary">status: {{ $status }}</span>
                                    @elseif ($status == "UNPAID")
                                    <span class="value badge bg-danger">{{ $status }}</span>
                                    <p id="time">expired : {{ Carbon\Carbon::parse(gmdate("Y-m-d H:i",$exp))->translatedFormat('l, d F Y H:i') }}</p>
                                    @elseif ($status == "REFUND")
                                    <p>status: <span class="value badge bg-info">{{ $status }}</span></p>
                                    @elseif ($status == "EXPIRED")
                                    <span class="value badge bg-danger">{{ $status }}</span>
                                    @elseif ($status == "FAILED")
                                    <span class="value badge bg-danger">{{ $status }}</span>
                                    @else
                                    <span class="value">{{ $status }}</span>
                                @endif</h6>



                                {{-- @foreach ($data as $ref) --}}

                                    @foreach ($datas as $items)



                                    <div class="product">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img class="img-fluid mx-auto d-block image" style="padding: 30px" src="{{ asset('product/img/'.$items->image) }}" alt="{{ $items->image }}">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="info">
                                                    <div class="row">
                                                        <div class="col-md-5 product-name">
                                                            <div class="product-name">
                                                                <p href="#">{{ App\Models\Product::find($items->product_id)->name  }}</p>
                                                                <div class="product-info">
                                                                    <p>
                                                                        {{ App\Models\Product::find($items->product_id)->description  }}
                                                                    </p>
                                                                    {{-- @if ($status == "PAID")
                                                                        <span class="value badge bg-primary">status: {{ $status }}</span>
                                                                        @elseif ($status == "UNPAID")
                                                                        <span class="value badge bg-danger">{{ $status }}</span>
                                                                        <p>expired Time: {{ gmdate("y-m-d h:i:s",$data->expired_time) }}</p>
                                                                        @elseif ($status == "REFUND")
                                                                        <p>status: <span class="value badge bg-info">{{ $status }}</span></p>
                                                                        @elseif ($status == "EXPIRED")
                                                                        <span class="value badge bg-danger">{{ $status }}</span>
                                                                        @elseif ($status == "FAILED")
                                                                        <span class="value badge bg-danger">{{ $status }}</span>
                                                                        @else
                                                                        <span class="value">{{ $status }}</span>
                                                                    @endif --}}

                                                                    {{-- <div>Display: <span class="value">5 inch</span></div>
                                                                    <div>RAM: <span class="value">4GB</span></div>
                                                                    <div>Memory: <span class="value">32GB</span></div> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 quantity">

                                                            <label for="quantity">Quantity:</label>
                                                            <center>
                                                            <table class="" >
                                                                <tr>
                                                                    {{-- <td><a class="btn" href="">-</a></td> --}}
                                                                    <td><input id="quantity" type="number" disabled value="{{ $items->qty }}" class="form-control quantity-input text-center"></td>
                                                                    {{-- <td><a class="btn" href="">+</a></td> --}}
                                                                </tr>
                                                            </table>
                                                        </center>

                                                            {{-- <input id="quantity" type="number" disabled value ="1" class="form-control quantity-input text-center">
                                                            <button class="btn btn-primary" style="margin-right: 10px ">+</button><button class="btn btn-danger">-</button> --}}
                                                        </div>
                                                        <div class="col-md-3 price">
                                                            {{-- <label for="quantity">Price: </label><br> --}}
                                                            <span class="fst-italic" style="padding-bottom: 50px">&nbsp; Rp.{{ number_format($items->subtotal) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach

                                {{-- @endforeach --}}


				 			</div>
			 			</div>
			 			<div class="col-md-12 col-lg-4">
			 				<div class="summary">
			 					<h3>Summary</h3>

			 					<div class="summary-item"><span class="text">Fee payment method {{ $payment_method }}</span><span class="price">Rp. {{ number_format($total_fee) }}</span></div>
                                 {{-- <div class="summary-item"><span class="text">Biaya Pengiriman JNE OKE</span><span class="price">Rp. {{ number_format($pengiriman->cost) }}</span></div> --}}
                                @if ($status == "PAID")
                                <div class="summary-item"><span class="text">Jumlah yang sudah dibayar</span><span style="font-weight: bold;font-size:22px" class="price">Rp. {{ number_format($total) }}</span></div>
                                @else
                                <div class="summary-item"><span class="text">Jumlah yang harus dibayar</span><span style="font-weight: bold;font-size:22px" class="price">Rp. {{ number_format($total) }}</span></div>
                                @endif

			 					{{-- <a type="button" href="{{ url('/checkout') }}" class="btn btn-primary btn-lg btn-block">Checkout</a> --}}
                                @if ($status == "PAID")
                                    @else
                                    <h4 style="margin-top:20px">Instruksi pembayaran</h4>
                                    @foreach ($data->instructions as $ins)


                                    <div class="dropdown">
                                       <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                         {{ $ins->title }}
                                       </button>
                                       <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                           @foreach ($ins->steps as $in)
                                         <li class="dropdown-item disabled" style="color: black" >{{ $loop->iteration }}.{!! $in !!}</li>
                                         @endforeach

                                       </ul>
                                     </div>
                                     @endforeach

                                     @if($qr)
                                     @if($data->status == "UNPAID")
                                     <p class="text-center" style="margin-top: 10px"><img src="{{ $qr }}" alt=""> </p>
                                     @else
                                     @endif
                                     @else
                                     @endif
                                @endif

				 			</div>
			 			</div>
		 			</div>
		 		</div>
	 		</div>
		</section>
	</main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    @include('sweetalert::alert')
</body>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
