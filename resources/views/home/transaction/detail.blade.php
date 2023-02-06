{{-- <!DOCTYPE html>
<html>
<head>
	<title>Ultras Garuda - Detail Transaction</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
@extends('home.layouts.master')
@extends('home.layouts.navbar')
@section('style')
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
@endsection
@section('content')

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
                                <h6 style="margin:2%">Status : @if ($status == "SUCCESS")
                                    <span class="value badge bg-primary">PAID</span>
                                    @elseif ($status == "UNPAID")
                                    <span class="value badge bg-danger">{{ $status }}</span>
                                    {{-- <p id="time">expired : {{ Carbon\Carbon::parse(gmdate("Y-m-d H:i",$exp))->translatedFormat('l, d F Y H:i') }}</p> --}}
                                    @elseif ($status == "REFUND")
                                    <p>status: <span class="value badge bg-info">{{ REFUND }}</span></p>
                                    @elseif ($status == "EXPIRED")
                                    <span class="value badge bg-danger">{{ EXPIRED }}</span>
                                    @elseif ($status == "FAILED")
                                    <span class="value badge bg-danger">{{ $status }}</span>
                                    @else
                                    <span class="value">{{ $status }}</span>
                                @endif</h6>



                                {{-- @foreach ($data as $ref) --}}
                                    {{-- {{dd($datas[])}} --}}
                                    @foreach ($data as $items)


                                    {{-- {{dd($items)}} --}}
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
                                                                <p href="#">


                                                                    @if ($items->product_id == null)
                                                                        Pulsa
                                                                    @else
                                                                     {{App\Models\Product::find($items->product_id)->name}}
                                                                    @endif



                                                                </p>
                                                                <div class="product-info">
                                                                    <p>
                                                                        @if ($items->product_id == null)

                                                                        @else
                                                                        {{App\Models\Product::find($items->product_id)->description}}
                                                                        @endif

                                                                        {{-- {{ App\Models\Product::find($items->product_id)->description  }} --}}
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

			 					{{-- <div class="summary-item"><span class="text">Fee payment method {{ $payment_method }}</span><span class="price">Rp. {{ number_format($total_fee) }}</span></div> --}}
                                 {{-- <div class="summary-item"><span class="text">Biaya Pengiriman JNE OKE</span><span class="price">Rp. {{ number_format($pengiriman->cost) }}</span></div> --}}
                                @if ($status == "PAID")
                                <div class="summary-item"><span class="text">Jumlah yang sudah dibayar</span><span style="font-weight: bold;font-size:18px" class="price">Rp. {{ number_format($total) }}</span></div>
                                @else
                                <div class="summary-item"><span class="text">Subtotal Product</span><span style="font-weight: bold;font-size:18px" class="price">Rp. {{ number_format($subtotal) }}</span></div>
                                <div class="summary-item"><span class="text">Fee</span><span style="font-weight: bold;font-size:18px" class="price">Rp. {{ number_format($fee) }}</span></div>
                                <div class="summary-item"><span class="text">Jumlah yang harus dibayar</span><span style="font-weight: bold;font-size:18px" class="price">Rp. {{ number_format($total) }}</span></div>
                                @endif

			 					{{-- <a type="button" href="{{ url('/checkout') }}" class="btn btn-primary btn-lg btn-block">Checkout</a> --}}
                                @if ($status == "SUCCESS")

                                @else
                                    {{-- <h4 style="margin-top:20px">Instruksi pembayaran</h4> --}}
                                    {{-- @foreach ($data->instructions as $ins)


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
                                    @endforeach --}}

                                    @if($qr)
                                        <br>
                                        <div class="summary-item"><span class="text">Silahkan Scan QR Dibawah ini</span>
                                        <br><br>
                                        <p class="text-center" style="margin-top: 10px">{!! QrCode::size(200)->generate($qr) !!} </p>
                                    @else
                                        <br>
                                        <div class="summary-item"><span class="text">VaNumber: {{ $vaNumber }}</span>
                                    @endif
                                @endif

                                <br>
                                <br>

				 			</div>
			 			</div>
		 			</div>
		 		</div>
	 		</div>
		</section>
	</main>
@endsection


