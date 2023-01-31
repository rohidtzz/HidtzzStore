@section('footer')

    <!-- Footer-->
    <footer class="py-5 bg-dark" >
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Ultras Garuda Sezione Tangerang @php echo date('Y') @endphp</p></div>
    </footer>

    @if (Auth::Check())
        <div class="d-lg-none d-xl-none">
            <br>
            <br>
            <br>
            <br>
        </div>
    @endif

@endsection
