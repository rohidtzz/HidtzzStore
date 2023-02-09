@extends('home.layouts.master')
@extends('home.layouts.navbar')

@section('content')

<div class="container" style="margin-top: 2%">
    <div class="row">
        @foreach ($product as $items)

            <div class="col-12 col-sm-12 col-xl-4 col-md-6">
                {{-- <a href="{{ url('transaction/') }}" style="text-decoration: none;color:black" > --}}
                    <div class="card" style="margin: 5%">
                        {{-- <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.2em" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                                    </svg>
                                        <div class="col">Column</div>
                                        <div class="col">Column</div>
                                </div>

                                <div class="col text-end">
                                        Paid
                                </div>

                            </div>
                        </div> --}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col col-4 col-xl-4 col-md-4">
                                    <img width="100px" height="100px" src="{{asset('product/img/'. App\Models\Product::find($items->product_id)->image) }}" alt="">
                                    {{-- @foreach (json_decode($pro->data) as $s)

                                    <img src="{{ asset('product/img/'.$s->image) }}" width="100px" alt="">
                                    @endforeach --}}
                                    {{-- <img src="{{ asset('blok/image.jpg') }}" width="100px" alt=""> --}}
                                </div>
                                <div class="col-8">
                                    <div class="row">
                                        <div class="col-12" style="font-weight: 700">
                                            {{ App\Models\Product::find($items->product_id)->name }}
                                            {{-- @foreach (json_decode($pro->data) as $s)
                                            {{App\Models\Product::find($s->product_id)->name}}
                                            @endforeach --}}

                                        </div>
                                        <div class="w-100"></div><br>
                                        {{-- <div class="text-muted">{{ App\Models\Product::find($items->product_id)->description }}</div> --}}
                                        <div style="font-weight: 700">
                                            Rp {{number_format($items->subtotal)}}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col  text-start"><a onclick="return confirm('Yakin hapus product?');" href="{{ url('/cart/delete/'.$items->id) }}"> <i aria-hidden="true" style="color: red"  class="fa fa-trash-o" style="font-size:25px;margin-right:15px"></i></a></div>
                                <div class="col  text-end">
                                    <a href="{{ url('/cart/minus/'.$items->product_id) }}" class="fa fa-minus" aria-hidden="true" style="text-decoration: none;color:red"></a>
                                    <input type="text" style="width:12px;border:none;color:black" value="{{ $items->qty }}" disabled>
                                    <a href="{{ url('/cart/plus/'.$items->product_id) }}" style="text-decoration: none" class="fa fa-plus"></a>

                                </div>
                                {{-- <div class="col text-muted">total belanja</div>
                                <div class="w-100"></div>
                                <div class="col col-6">Rp. 100.000,00</div> --}}
                            </div>
                        </div>
                    </div>
                {{-- </a> --}}
            </div>
        @endforeach

        <br>
        @if (count($product) >= 1)

            <div class="row">
                <div class="col-7 col-sm-7 col-xl-2 col-md-4">
                    <div class="card" >
                        <div class="card-body">


                                    <form method="get" action="/checkout">




                                    <button type="suby" class="btn btn-primary">Pergi ke CheckOut </button>
                                    </form>


                        </div>
                    </div>
                </div>
            </div>
        @endif
        {{-- @if (count($product) >= 1)

            <div class="row">
                <div class="col-12 col-xl-4 col-md-6">
                    <div class="card" style="margin: 5%">
                        <div class="card-header">
                            <h3>Metode Pembayaran</h3>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12">
                                    <form action="checkout/">
                                        <select required  name="code" class="form-select" aria-label="Default select example">
                                            <option class="text-center" selected>-- Pilih Metode Pembayaran --</option>
                                            @foreach ($paymentData as $metode)
                                                <option value="{{ $metode->paymentMethod }}">{{ $metode->paymentName }}</option>
                                            @endforeach

                                        </select>

                                </div>

                                <div class="col">
                                    <br>
                                    <button type="suby" class="btn btn-primary">Beli</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endif --}}


    </div>
</div>




@endsection
