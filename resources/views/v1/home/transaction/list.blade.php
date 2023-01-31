@extends('home.layouts.master')
@extends('home.layouts.navbar')
@section('content')

    <div class="container" style="margin-top: 2%">
        @foreach ($data as $pro)


        <a href="{{ url('transaction/'.$pro->reference) }}" style="text-decoration: none;color:black" >
            <div class="card" style="margin-top: 4%;margin-left:4%;margin-right:4%">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.2em" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                            </svg>
                            {{substr($pro->created_at,0,-8)}}
                    </div>
                        <div class="col text-end">
                                {{$pro->status}}
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-4 col-xl-2 col-md-2">

                            @foreach (json_decode($pro->data) as $s)

                            <img src="{{ asset('product/img/'.$s->image) }}" width="100px" alt="">
                                    {{-- {{App\Models\Product::find($s->product_id)->name}} --}}
                            @endforeach
                            {{-- <img src="{{ asset('blok/image.jpg') }}" width="100px" alt=""> --}}
                        </div>
                        <div class="col-8">
                            <div class="row">
                                <div class="col-12" style="font-weight: 700">
                                    @foreach (json_decode($pro->data) as $s)
                                    {{App\Models\Product::find($s->product_id)->name}}
                                    @endforeach

                                </div>
                                <div class="w-100"></div>
                                <div class="text-muted">1 Barang</div>
                            </div>
                        </div>
                    </div>
                    @foreach (json_decode($pro->data) as $s)
                        @if ($s->qty == 1)

                        @else
                         +{{$s->qty-1}} Barang Lainnya
                        @endif

                    @endforeach
                    {{-- <p>{{ count($pro) }}</p> --}}
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col text-muted">total belanja</div>
                        <div class="w-100"></div>
                        <div class="col col-6">Rp. {{ number_format($pro->amount) }}</div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@endsection
