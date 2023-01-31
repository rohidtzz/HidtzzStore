@section('footer')
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
    </footer>
    @if (Auth::check())
    <div class="d-lg-none d-xl-none">
        <br>
        <br>
        <br>
    </div>
    @endif

@endsection
