@section('footer')
    <!-- Footer-->
    {{-- <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
    </footer> --}}

    <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <div class="container p-4">
          <!-- Section: Social media -->


          <section class="">

            <!--Grid row-->
            <div class="row justify-content-center">
              <!--Grid column-->

              <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                <p><i class="fa fa-home me-3"></i>Jl.KH Hasyim Ashari, No.89, Pinang, Kota Tangerang, Banten</p>
                <p>
                  <i class="fa fa-envelope me-3"></i>rohidtzz@gmail.com
                </p>
                <p><i class="bi bi-whatsapp"></i>  0851-5685-0530</p>
              </div>
              <!--Grid column-->
            </div>
            <!--Grid row-->
          </section>
          <br>
          <section class="mb-4">
            <!-- Facebook -->
            <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/people/Rohid-Ammar-Firdaus/100010938375925/" target="_blank" role="button"
              ><i class="fa fa-facebook-f"></i
            ></a>

            <!-- Twitter -->
            <a class="btn btn-outline-light btn-floating m-1" href="https://twitter.com/rohidtzz" target="_blank" role="button"
              ><i class="fa fa-twitter"></i
            ></a>

            <!-- Google -->


            <!-- Instagram -->
            <a class="btn btn-outline-light btn-floating m-1" href="https://instagram.com/rohidtzz" target="_blank" role="button"
              ><i class="fa fa-instagram"></i
            ></a>

            <!-- Linkedin -->
            {{-- <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
              ><i class="fa fa-linkedin"></i
            ></a> --}}

            <!-- Github -->

          </section>
          <!-- Section: Links -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Hidtzz Store 2023</p></div>
        </div>
        <!-- Copyright -->
      </footer>
      <!-- Footer -->

    @if (Auth::check())
    <div class="d-lg-none d-xl-none">
        <br>
        <br>
        <br>
    </div>
    @endif

@endsection
