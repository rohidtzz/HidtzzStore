{{-- <!DOCTYPE html>
<html>
<head>
	<title>Ultras Garuda - Checkout</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script> --}}
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
    {{-- <div id="preloader"></div> --}}
    {{-- <div id="loadingMask" style="width: 100%; height: 100vh; position: fixed;z-index: 999; background:url('{{ asset('blok/f.gif') }}') 50% no-repeat #fff;"></div> --}}
    {{-- <img src="" alt="" srcset=""> --}}

    {{-- <main class="page" style="margin-top: 4% ">
        <section class="shopping-cart dark">

            <div class="container">

               <div class="content">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="items">
                               <h2 style="margin:2%">Alamat dan Pengiriman</h2>
                                <div class="product">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row" style="margin:10px">

                                               <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Example textarea</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" disabled rows="3">{{ $address->alamat }}</textarea>
                                                  </div>
                                               </div>
                                                <input type="hidden" name="city_id" value="{{ $address->city_id }}">
                                               <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Kota: </label>
                                                    <input disabled  id="city" name="city" class="form-control" id="exampleFormControlSelect1">


                                                  </div>
                                               </div>

                                               <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Ekspedisi</label>
                                                    <input type="text" value="jne" disabled class="form-control" id="exampleFormControlInput1">
                                                  </div>
                                               </div>

                                               <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Jenis Layanan</label>
                                                    <input type="text" name="layanan" value="OKE" disabled class="form-control" id="exampleFormControlInput1">
                                                  </div>
                                               </div>

                                               <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Biaya Pengiriman</label>
                                                    <input type="number"  name="cost" disabled class="form-control" id="exampleFormControlInput1">
                                                  </div>
                                               </div>

                                            </div>
                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </section>
   </main> --}}


	<main class="page">
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
                                <h2 style="margin:2%">Product</h2>



                                @foreach ($product as $data)


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
                                                                {{-- <div class="product-info">
                                                                    <span class="value">{!! substr(App\Models\Product::find($data->product_id)->description,0,400) !!}.....</span>
                                                                    <div>Display: <span class="value">5 inch</span></div>
                                                                    <div>RAM: <span class="value">4GB</span></div>
                                                                    <div>Memory: <span class="value">32GB</span></div>
                                                                </div> --}}
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
                                                            <span class="fst-italic" style="padding-bottom: 50px">Rp.{{ number_format($data->subtotal) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </div>

                                @endforeach


				 			</div>
			 			</div>
			 			<div class="col-md-12 col-lg-12">
			 				<div class="summary">
			 					<h3>Summary</h3>
			 					<div class="summary-item"><span class="text">Subtotal</span><span  class="price">
                                    <input type="hidden" name="subtotal" value="{{ $total }}">Rp.
                                    {{ number_format($total) }}
                                </span></div>
			 					<div class="summary-item"><span class="text">Fee</span><div id="fee" class="price">


                                    {{-- {{ number_format($kal[0]->total_fee->customer) }}

                                    {{-- @foreach ($kal[0]->total_fee as $fee)

                                    {{ $fee->customer }}

                                    @endforeach --}}
                                </div></div>
                                {{-- <div class="summary-item"><span class="text">Biaya Pengiriman</span><span class="price" id="pengiriman"></span></div> --}}

                                <div class="summary-item"><span class="text">Total</span>
                                    <span style="font-weight: bold;font-size:25px" id="totall" class="price"></span>
                                </div>
                                <input type="hidden" name="total" value="1231">



			 					{{-- <div class="summary-item"><span class="text">Total</span><span style="font-weight: bold;font-size:25px" id="totall" class="price">
                                   Rp. {{ number_format($total+$kal[0]->total_fee->customer) }}</span></div>
                                <input type="hidden" name="total" value="{{ $total+$kal[0]->total_fee->customer }}"> --}}

			 					{{-- <a type="button" href="{{ url('/checkout') }}" class="btn btn-primary btn-lg btn-block">Checkout</a> --}}
				 			</div>
			 			</div>
		 			</div>
		 		</div>
	 		</div>
		</section>
	</main>

    <main class="page" >
        <section class="shopping-cart dark">

            <div class="container">

               <div class="content">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="items">
                                <center><h2 style="margin:2%" class="">Metode Pembayaran</h2></center>

                                   <div class="product">
                                       <div class="row d-felx justify-content-center">

                                        <form action="{{ url('transaction/store/') }}" method="post">
                                           <center>
                                                <div  class="col-md-3 " style="padding-left: 2%; padding-right:2%">
                                                    @csrf

                                                    {{-- <input type="hidden"  name="cost" > --}}

                                                    <div style="background-color: white; border:none;" type="submit" class="card" >

                                                        <select required name="metode" id="metode" class="form-select" aria-label="Default select example">
                                                            <option class="text-center" value="0" selected>-- Pilih Metode Pembayaran --</option>

                                                            {{-- @foreach ($paymentData as $metode)
                                                                <option value="{{ $metode->paymentMethod }}">{{ $metode->paymentName }}</option>
                                                            @endforeach --}}

                                                        </select>
                                                        {{-- <img class="card-img-top" src="{{ $mas['icon_url'] }}"> --}}


                                                        {{-- <div class="card-body">
                                                            <div class="card-text">

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="hidden" name="method" value="{{ $mas['code'] }}" checked="checked">

                                                                    <label class="form-check-label" for="inlineRadio2">bayar dengan {{ $mas['code'] }}</label>
                                                                </div>

                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </center>


                                       </div>
                                   </div>



                            </div>
                        </div>


                        <div class="d-flex justify-content-end" >
                            <input type="hidden" name="totals" >

                            <input type="hidden" name="fee">
                                    <button id="but" hidden onclick="return confirm('yakin checkout?');" class="btn btn-primary btn-lg btn-block" >Check out</button>
                            </form>


                    </div>
                    </div>
                </div>
            </div>
       </section>
   </main>
   <br>
   <br>
   <br>
   <script>

    $(document).ready(function (){
        let subtotal = $('input[name=subtotal]').val();
        // console.log(subtotal)
        $.ajax({
            type : 'get',
            url : '/kalkulator/'+subtotal,
            success : function(data){

                // console.log(data);
                // let fee = $('#fee').innerHTML = data;

                // $('#hide').empty();

                $(data).each(function(x,y){


                    // console.log(y.category_id)
                    // result = '<option value="'+ y.paymentMethod +'"> <img src="'+ y.paymentImage +'"></option>';
                    if(y.paymentName == "SHOPEEPAY QRIS"){
                        result = '<option value="'+ y.paymentMethod +'">'+ y.paymentName.substr(10) +'</option>';

                    } else {
                        result = '<option value="'+ y.paymentMethod +'">'+ y.paymentName +'</option>';
                    }
                    $('#metode').append(result);
                });

                $('#hide').empty();



            },
        });
    });

    // let l = $("select#metode option").filter(":selected").val() ;
    //     console.log(l);

    $('#metode').on('change', function(){
        // let l = $('#metode :selected').text() ;
        // let l = $("select#metode option").filter(":selected").val();

        let subtotal = $('input[name=subtotal]').val();
        const code = $('#metode').val();
        $("#but").attr("hidden",true);

        if(code != 0){

            $.ajax({
                type : 'get',
                url : '/kalkulator/'+subtotal,
                success : function(data){

                    // console.log(data);
                    // let fee = $('#fee').innerHTML = data;

                    $('#fee').empty();
                    $('#totall').empty();

                    const rupiah = (number)=>{
                                    return new Intl.NumberFormat("id-ID", {
                                    }).format(number);
                            }

                    $(data).each(function(x,y){

                        if(y.paymentMethod == code){

                            if(y.paymentMethod == "SP"){




                                let hitungFee = parseInt(subtotal) * 0.007;
                                let totalFee = parseInt(subtotal)+parseInt(hitungFee);

                                // jumlah = parseInt(subtotal)+parseInt(0.7);
                                jumlah = totalFee;

                                // console.log(jumlah);
                                // console.log(hitungFee);
                                // console.log(totalFee);

                                result2 = `
                                Rp. ${rupiah(jumlah)}
                                `;

                                resultFee = `
                                Rp. ${rupiah(hitungFee)}
                                `;

                                let total = $('#totall').html(result2);
                                let fee = $('#fee').html(resultFee);

                                let inputFee = $('input[name=fee]').val(hitungFee);

                                let totals = $('input[name=totals]').val(jumlah);

                            } else {

                                result = `
                                Rp. ${rupiah(y.totalFee)}
                                `;

                                let fee = $('#fee').html(result);

                                jumlah = parseInt(subtotal)+parseInt(y.totalFee);

                                result2 = `
                                Rp. ${rupiah(jumlah)}
                                `;

                                let total = $('#totall').html(result2);
                                let inputFee = $('input[name=fee]').val(y.totalFee);

                                let totals = $('input[name=totals]').val(jumlah);
                                // console.log(totals);
                                // console.log(total);
                                // let total = $('#total').html()
                            }
                            $("#but").removeAttr("hidden");

                        } else {

                        }
                        // console.log(y.category_id)
                        // result = '<option value="'+ y.paymentMethod +'"> <img src="'+ y.paymentImage +'"></option>';
                        // result = '<option value="'+ y.paymentMethod +'">'+ y.paymentName +'</option>';
                        // $('#metode').append(result);
                    });

                    // $('#product').empty();



                },
            });
            // $("#but").removeAttr("hidden");
        } else{
            $('#fee').empty();
            $('#totall').empty();

            $("#but").attr("hidden",true);
        }



    });

    // let total = $('input[name=total]').val();
    // console.log(total);

    // $('#fee').html("rp");


</script>
   {{-- <script>
    $(document).ready(function(){
        let city = $("input[name=city_id]").val();
        $.ajax({
            url:"/city/"+city,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                $('input[name="city"]').val(data.city_name);

            },
            error: function(data){
            alert("Terjadi Kesalahan!");
            }
        });
        let total = $("input[name=total]").val();
            let span = document.getElementById("totall");
            let pengiriman = document.getElementById("pengiriman");
        $.ajax({
            url:"/cost/",
            type: "GET",
            dataType: "JSON",
            success: function(data){
                let k = parseInt(data.value)+parseInt(total);
                const rupiah = (number)=>{
                    return new Intl.NumberFormat("en-US").format(number);
                }
                span.textContent = ("Rp. "+rupiah(k));
                $('input[name="cost"]').val(data.value);
                pengiriman.textContent = ("Rp. "+rupiah(data.value));
                $('#loadingMask').fadeOut();

            },
            error: function(data){
            alert("Terjadi Kesalahan!");
            }
        });
    });
   </script> --}}
@endsection
