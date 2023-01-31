@extends('home.layouts.master')
@extends('home.layouts.navbar')
{{-- @extends('home.layouts.hero') --}}
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
                    <div class="col-md-12 col-lg-12">
                        <div class="items">




                           @foreach ($product as $data)

                           <a href="{{ url('/cart/delete/'.$data->id) }}" style="text-decoration:none;color: black"><i  class="fa-solid fa-xmark d-flex justify-content-start" style="margin:20px 20px"></i></a>
                               <div class="product">
                                   <div class="row">
                                       <div class="col-md-3">
                                           <img class="img-fluid mx-auto d-block image" style="padding: 30px" src="{{ asset('product/img/'.App\Models\Product::find($data->product_id)->image ) }}" alt="{{ $data->image }}">
                                       </div>
                                       <div class="col-md-8">
                                           <div class="info">
                                               <div class="row">
                                                   <div class="col-md-5 product-name">
                                                       <div class="product-name">
                                                           <p href="#">{{ App\Models\Product::find($data->product_id)->name }}</p>
                                                           <div class="product-info">
                                                               <span class="value">{{ App\Models\Product::find($data->product_id)->description }}</span>
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
                                                               {{-- <td><a class="btn" href="{{ url('/cart/minus/'.$data->product_id) }}">-</a></td> --}}
                                                               <td><input id="quantity" type="number" disabled value="{{ $data->qty }}" class="form-control quantity-input text-center"></td>
                                                               {{-- <td><a class="btn" href="{{ url('/cart/plus/'.$data->product_id) }}">+</a></td> --}}
                                                           </tr>
                                                       </table>
                                                   </center>

                                                       {{-- <input id="quantity" type="number" disabled value ="1" class="form-control quantity-input text-center">
                                                       <button class="btn btn-primary" style="margin-right: 10px ">+</button><button class="btn btn-danger">-</button> --}}
                                                   </div>
                                                   <div class="col-md-3 price">
                                                       {{-- <label for="quantity">Price: </label><br> --}}
                                                       <span class="fst-italic">&nbsp; Rp.{{ number_format($data->subtotal) }}</span>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>

                                       <div class="col-md-1">

                                       </div>


                                   </div>
                               </div>

                           @endforeach




                        </div>

                    </div>



                    <div class="d-flex justify-content-end" >


                       {{-- @if (App\Models\Cart::where('user_id',Auth()->user()->id)->first())
                            <a type="button" href="{{ url('/checkout') }}" class="btn btn-primary btn-lg btn-block">Next</a>
                           @else
                       @endif --}}

                    </div>

                </div>
            </div>
        </div>
   </section>
</main>
@if (App\Models\Cart::where('user_id',Auth()->user()->id)->first())


<main class="page" >
   <section class="shopping-cart dark">

       <div class="container">
          {{-- <div class="block-heading">
            <h2>Shopping Cart</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
          </div> --}}

          <div class="content">
               <div class="row">
                   <div class="col-md-12 col-lg-12">
                       <div class="items">
                           <h2 style="margin:2%">Metode Pembayaran</h2>



                           <form action="{{ url('checkout/') }}" method="get">
                              <div class="product">
                                  <div class="row">
                                    <div class="input-group mb-3">
                                        <select name="code" class="form-select" id="inputGroupSelect01">
                                            <option selected value="">---- Pilih Pembayaran ----</option>
                                            @foreach ($mas as $channel)

                                            <option value="{{ $channel->code }}">{{$channel->code}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                   {{-- @foreach ($mas as $channel)



                                      <div  class="col-md-3" style="padding-left: 2%; padding-right:2%">


                                        <form action="{{ url('checkout/') }}" method="get">
                                           <div style="background-color: white; border:none;" type="submit" class="card">


                                               <img class="card-img-top" src="{{ $channel->icon_url }}">

                                               <div class="card-body">
                                                   <div class="card-text">
                                                       <div class="form-check form-check-inline">
                                                           <input class="form-check-input" type="radio" name="code" value="{{ $channel->code }}" required>

                                                           <label class="form-check-label" for="inlineRadio2">bayar dengan {{ $channel->code }}</label>
                                                       </div>

                                                   </div>
                                               </div>
                                           </div>



                                       </div>


                                       @endforeach --}}


                                  </div>
                              </div>



                       </div>
                   </div>


                   <div class="d-flex justify-content-end" >


                       @if (App\Models\Cart::where('user_id',Auth()->user()->id)->first())

                      @else
                  @endif

                  <button type="submit"  class="btn btn-primary btn-lg btn-block">Next</button>

               </form>

               </div>
               </div>
           </div>
       </div>
  </section>
</main>

@else
@endif

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@endsection
