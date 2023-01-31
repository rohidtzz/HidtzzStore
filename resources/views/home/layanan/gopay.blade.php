@extends('home.layouts.master')
@extends('home.layouts.navbar')
@section('content')


<div class="container" style="margin-top: 2%">
    <div class="row">
        <div class="col-12">
            <div class="card" style="margin: 5%">
                <div class="card-header">
                    <img src="https://cdn.mobilepulsa.net/img/logo/pulsa/small/gopay.png" alt="">
                </div>
                <div class="card-body">
                    <form action="/2">
                        <label for="">No Hp</label>
                        <input  id="hp" onkeyup="selesai()" name="nohp" type="number" class="form-control">
                        @foreach ($data as $datas)
                            <div class=  "col-12"  >
                                <div  class=  "card"  style=  "margin-top: 2%"  >
                                    <div  class=  "card-body"  >
                                        <div class="row">
                                            <div class="col-6 text-start" style="padding:7px">
                                                <input required name="code" value="{{ $datas->product_code}}" type="radio"> {{ $datas->product_nominal}}
                                            </div>
                                            <div class="col-6 text-end" style="padding:7px">
                                            Rp {{ number_format($datas->product_price)}}
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <br>
                        <button id="buttom" type="submit" class="btn btn-primary">Add To cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

<br><br><br>
@endsection
