<!DOCTYPE html>
<html>
<head>
	<title>Ultras Garuda - Shopping Cart</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
body {
    color: #566787;
    background: #f5f5f5;
    font-family: 'Roboto', sans-serif;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
    min-width: 1000px;
    background: #fff;
    padding: 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 10px;
    margin: 0 0 10px;
    min-width: 100%;
}
.table-title h2 {
    margin: 8px 0 0;
    font-size: 22px;
}
.search-box {
    position: relative;
    float: right;
}
.search-box input {
    height: 34px;
    border-radius: 20px;
    padding-left: 35px;
    border-color: #ddd;
    box-shadow: none;
}
.search-box input:focus {
    border-color: #3FBAE4;
}
.search-box i {
    color: #a0a5b1;
    position: absolute;
    font-size: 19px;
    top: 8px;
    left: 10px;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
}
table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table td:last-child {
    width: 130px;
}
table.table td a {
    color: #a0a5b1;
    display: inline-block;
    margin: 0 5px;
}
table.table td a.view {
    color: #03A9F4;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}
.pagination {
    float: right;
    margin: 0 0 5px;
}
.pagination li a {
    border: none;
    font-size: 95%;
    width: 30px;
    height: 30px;
    color: #999;
    margin: 0 2px;
    line-height: 30px;
    border-radius: 30px !important;
    text-align: center;
    padding: 0;
}
.pagination li a:hover {
    color: #666;
}
.pagination li.active a {
    background: #03A9F4;
}
.pagination li.active a:hover {
    background: #0397d6;
}
.pagination li.disabled i {
    color: #ccc;
}
.pagination li i {
    font-size: 16px;
    padding-top: 6px
}
.hint-text {
    float: left;
    margin-top: 6px;
    font-size: 95%;
}
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
        </script>
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
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('admin/transaction') }}">Transaction</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('admin/product') }}">Product</a></li>
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

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h2> <b>Product</b></h2></div>
                        <div class="col-sm-4">
                            <div class="search-box">
                                <a style="color: white" href="/admin/product/create" type="button" class="btn btn-primary" >
                                    Create Product
                                  </a>
                            </div>


                            <br>




                            {{-- <div class="search-box">
                                <i class="material-icons">&#xE8B6;</i>
                                <input type="text" class="form-control" placeholder="Search&hellip;">
                            </div> --}}
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Img</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Desc</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($all as $d)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $d->name }}</td>
                                <td><img src="{{ asset('/product/img/'.$d->image)}}" width="100" height="100" alt=""></td>
                                <td>{{ number_format($d->price) }}</td>
                                <td>{{ $d->stock }}</td>
                                <td>{!! $d->description !!}</td>
                                <td>
                                    {{-- <a type="button" data-id="{{$d->id}}"  data-bs-toggle="modal" data-bs-target="#exampleModa-{{ $d->id }}" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a> --}}
                                    <a type="button" href="/admin/product/edit/{{$d->id}}" class="edit" title="Edit"><i class="material-icons">&#xE254;</i></a>
                                    <a onclick="return confirm('are you sure?')" href="{{ url('/admin/product/delete/'.$d->id) }}"  class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="clearfix">
                    <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item active"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    @include('sweetalert::alert')
</body>



<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
