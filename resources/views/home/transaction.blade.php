@extends('home.layouts.master')
@extends('home.layouts.navbar')

@section('content')

<div class="container" style="margin-top: 2%">
    <div class="row" style="text-align: center">
        @foreach ($data as $datas)

            <div class="col-12 col-sm-12 col-xl-6" style="display:inline-block;vertical-align: middle;float: none;">
                <a href="{{ url('transaction/'.$datas->reference) }}" style="text-decoration: none;color:black">
                    <div class="card" style="margin: 5%">
                        <div class="card-header">
                            <div class="row">
                                <div class="col text-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.2em" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                                    </svg> {{ substr($datas->created_at,0,11) }}
                                </div>

                                <div class="col text-end">
                                    @if ($datas->status == "UNPAID")
                                        <span class="badge rounded-pill bg-danger">
                                            {{ $datas->status }}
                                        </span>
                                    @elseif ($datas->status == "PAID")
                                        <span class="badge rounded-pill bg-primary">
                                            {{ $datas->status }}
                                        </span>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 col-xl-3 col-md-3  text-start">
                                    {{-- @php
                                        echo reset($datas->data);
                                    @endphp --}}
                                    {{-- @php
                                        for ($x = 1; $x < 2; $x++) {

                                            echo "The number is: $x <br>";
                                        }
                                    @endphp --}}
                                    {{-- @foreach (json_decode($datas->data) as $s)

                                        @for ($x = 1; $x < 2; $x++)
                                            <img  width="100px" src="{{asset('product/img/'.App\Models\Product::find($s->product_id)->image) }}" alt="">

                                        @endfor
                                    @endforeach --}}
                                        {{-- {{ json_decode($datas->data)}} --}}
                                    <img  width="100px" src="{{asset('product/img/'.json_decode($datas->data)[0]->image) }}" alt="">
                                    {{-- @foreach (json_decode($pro->data) as $s)

                                    <img src="{{ asset('product/img/'.$s->image) }}" width="100px" alt="">
                                    @endforeach --}}
                                    {{-- <img src="{{ asset('blok/image.jpg') }}" width="100px" alt=""> --}}
                                </div>
                                <div class="col-8">
                                    <div class="row">
                                        <div class="col-12  text-start" style="font-weight: 700">

                                            @foreach (json_decode($datas->data) as $s)

                                            @if ($s->product_id == null)
                                                Pulsa
                                            @else
                                            {{App\Models\Product::find($s->product_id)->name}}
                                            @endif



                                            @endforeach

                                        </div>
                                        <div class="w-100"></div>
                                        <div class="text-muted  text-start">
                                            @foreach (json_decode($datas->data) as $s)

                                            @if ($s->product_id == null)

                                            @else
                                                1 Barang
                                            @endif



                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <span class="text-start">
                                    @if (count(json_decode($datas->data)) == 1)
                                    <br>
                                    @else
                                        +{{ count(json_decode($datas->data))-1 }} prduk lainnya
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col text-muted  text-start">total belanja</div>
                                <div class="w-100"></div>
                                <div class="col col-6  text-start">Rp {{number_format($datas->amount)}}</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

<br>
<br>
<br>


@endsection
