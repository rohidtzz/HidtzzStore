@extends('home.layouts.master')
@extends('home.layouts.navbar')
@extends('home.layouts.hero')
@section('style')
<style>
    textarea{
    border:1px solid #999999;
    width:100%;
    margin:5px 0;
    padding:3px;
    resize: none;
    height: 350px;

}
.textareacontainer{
    padding-right: 8px; /* 1 + 3 + 3 + 1 */
}
</style>
@endsection
@section('content')
<br>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{$product->name}}</h3>
            {{-- <h6 class="card-subtitle">{{$product->jenis}}</h6> --}}
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-6">
                    <div class="white-box text-center" style="margin-top:20px"><img width="100%" height="100%" src="{{ asset('product/img/'.$product->image) }}" class="img-responsive"></div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-6">
                    <h4 class="box-title mt-5">Product description</h4>
                    {{-- <div class="textareacontainer">
                        <textarea disabled> Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores sunt natus reiciendis nobis quia, pariatur nesciunt doloribus odit nulla unde ut aut libero ea nisi in soluta itaque mollitia quaerat eveniet minima quisquam. Quae, ipsum totam quasi iste placeat aliquam similique ea accusamus, enim voluptates dolore eligendi vel. Quibusdam, molestias deleniti veritatis ab voluptatem aperiam sunt? Optio omnis aliquid rem atque cumque, suscipit, cum, rerum molestias deleniti numquam quasi ea ducimus iusto pariatur aperiam vitae provident excepturi. Unde repellat alias iste, doloremque error doloribus. Amet ratione hic facere totam eius rerum temporibus, possimus repellendus modi quos harum accusantium adipisci unde?</textarea>
                    </div> --}}
                    {{-- <textarea style="resize:none;" name="" id="" width="100x">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque harum officia libero ab officiis ex. Ratione nesciunt odit minus molestias reiciendis sit dignissimos nobis odio velit error inventore temporibus nulla dolor, repudiandae fugit dicta, culpa explicabo doloribus perferendis. Molestiae harum minima praesentium quae? Ullam esse sapiente totam repudiandae iusto nam doloremque porro hic voluptate sequi nemo assumenda, eius aliquid odit distinctio id inventore eos ut praesentium quisquam sunt architecto, iste, officiis ipsum? Tempore qui accusantium repudiandae aliquam autem saepe minima. Nobis dolore nemo totam earum sint minima debitis consequuntur voluptates. Repudiandae exercitationem voluptate officiis corrupti quo sint architecto ex vitae.</textarea> --}}
                    <p style="text-align: justify;">{!! $product->description !!}</p>
                    <h2 class="mt-5">
                        Rp. {{ number_format($product->price)}}
                    </h2><br>
                    <a type="button" href="{{ url('cart/'.$product->id.'/create') }}" class="btn btn-dark btn-rounded mr-1" data-toggle="tooltip" title="" data-original-title="Add to cart">
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                    {{-- <button class="btn btn-primary btn-rounded">Buy Now</button> --}}
                    {{-- <h3 class="box-title mt-5">Key Highlights</h3>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-check text-success"></i>Sturdy structure</li>
                        <li><i class="fa fa-check text-success"></i>Designed to foster easy portability</li>
                        <li><i class="fa fa-check text-success"></i>Perfect furniture to flaunt your wonderful collectibles</li>
                    </ul> --}}
                </div>

            </div>
        </div>
    </div>
</div>
<br>
@endsection
@extends('home.layouts.footer')
