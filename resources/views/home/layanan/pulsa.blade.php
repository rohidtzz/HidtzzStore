@extends('home.layouts.master')
@extends('home.layouts.navbar')
@section('content')


<div class="container" style="margin-top: 2%">
    <div class="row">
        <div class="col-12">
            <div class="card" style="margin: 5%">
                <div class="card-header">
                    <div class="">
                        <h2>Pulsa</h2>
                        {{-- <img src="https://cdn.mobilepulsa.net/img/logo/pulsa/small/indosat.png" alt="">
                        <img src="https://cdn.mobilepulsa.net/img/logo/pulsa/small/xl.png" alt="">
                        <img src="https://cdn.mobilepulsa.net/img/logo/pulsa/small/axis.png" alt="">
                        <img src="https://cdn.mobilepulsa.net/img/logo/pulsa/small/telkomsel.png" alt="">
                        <img src="https://cdn.mobilepulsa.net/img/logo/pulsa/small/smart.png" alt="">
                        <img src="https://cdn.mobilepulsa.net/img/logo/pulsa/small/three.png" alt="">
                        <img src="https://cdn.mobilepulsa.net/img/product/operator_list/121121035421-byu-logo.png" alt=""> --}}
                    </div>

                </div>
                <div class="card-body">
                    <form action="/transaction/pulsa" method="POST">
                        @csrf
                        {{-- <label for="">No Hp</label> --}}
                        <div class="input-group mb-3">

                            <input type="number" onkeyup="selesai()" name="nohp" class="form-control" id="hp" aria-describedby="basic-addon3">
                            <div class="input-group-text"  ><img src="" id="gambar" width="50px" alt=""></div>
                        </div>
                        <div id="loader"></div>

                        {{-- <input  id="hp" onkeyup="selesai()" name="nohp" type="number" class="form-control"> --}}
                        {{-- <div class=""> --}}
                            <div  class=  "row hide"  >
                                {{-- <button style="padding: 0;border: none;background: none;" type="submit" onclick="confir()" style="text-decoration: none;color:black" >
                                    <input type="hidden" value="${y.product_code}">
                                    <div class=  "col-12"  >
                                        <div  class=  "card"  style=  "margin-top: 2%"  >
                                            <div  class=  "card-body"  >
                                                <div class="row">
                                                    <div class="col-6 text-start" style="padding:20px">
                                                        ${y.product_description} ${y.product_nominal}
                                                    </div>
                                                    <div class="col-6 text-end" style="padding:20px">
                                                        ${y.product_price}
                                                    </div>

                                                    <div class="col text-start" style="padding:20px">
                                                    pulsa ${y.product_description} ${y.product_nominal}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </button> --}}
                            </div>

                        {{-- </div> --}}

                        <br>
                        <button type="button" id="target" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Beli
                        </button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">

                                <div class="modal-header">
                                    <p>Modal Confirm</p>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div id="om" style="font-size: 20px">

                                    </div>


                                </div>
                                <div class="modal-footer">
                                  <button type="submit" onclick="return confirm('pastikan no hp anda sudah benar!');" class="btn btn-primary">Yes</button>
                                </div>
                              </div>
                            </div>
                        </div>
                        {{-- <button id="buttom" onclick="return confirm('Yakin ingin membeli?. pastikan no hp anda sudah benar!');" type="submit" class="btn btn-primary">Add To cart</button> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    // $(document).ready(function(){

    //     // selesai()
    //     setInterval(() => {
    //         selesai()
    //     }, 1000);
    // });
    $( "#target" ).click(function() {
        let cod = $('input[name=code]:checked').val()
        let nohp = $('input[name=nohp]').val()

        $.ajax({
            type : 'get',
            url : '/filter/pulsa/'+cod,
            success : function(data){
                // console.log(data[0].product_code)
                $('#om').empty();

                const rupiah = (number)=>{
                                return new Intl.NumberFormat("id-ID", {
                                }).format(number);
                        }

                result = `
                Anda Akan membeli ${data[0].product_description} ${rupiah(data[0].product_nominal)} ke nomor ${nohp} seharga Rp ${rupiah(data[0].product_price)}
                dengan metode pembayaran Qris
                <input type="hidden" value="${data[0].product_price}" name="total">
                <input type="hidden" value="${data[0].price}" name="harga">
                <input type="hidden" value="${data[0].product_description} ${rupiah(data[0].product_nominal)}" name="nama">
                `

                $('#om').append(result);
            }
        });



        // console.log(cod)
    });

    function next(){

    }


    function selesai(){
        let isi = $('#hp').val()


        // let gambar = new Image(50,23);
        // gambar.src = 'https://cdn.mobilepulsa.net/img/logo/pulsa/small/indosat.png';

        // let samping = $('#gambar')

        // let g = samping.append(gambar)
        // console.log(g)

        //three
        if(isi == '0896' || isi == '0895' || isi == '0897' || isi == '0899' || isi == '0899'){
            // $('#loader').html("Please WAIT!");
            $('#loader').html("Please WAIT!");
            // $('#hp').prop('disabled', true);
            $.ajax({
                type : 'get',
                url : '/prefix/pulsa/Three',
                success : function(data){

                    $('.hide').empty();


                    $(data).each(function(x,y){
                        // console.log(y.category_id)
                        const rupiah = (number)=>{
                                return new Intl.NumberFormat("id-ID", {
                                }).format(number);
                        }

                        if(y.product_code == 'hthreeBEBAS150' || y.product_code == 'hthreeBEBAS250' || y.product_code == 'hthreeBEBAS60' ){

                            result =  `


                                        <div class=  "col-12"  >
                                            <div  class=  "card"  style=  "margin-top: 2%"  >
                                                <div  class=  "card-body"  >
                                                    <div class="row">
                                                        <div class="col-6 text-start" style="padding:7px">
                                                            <input required name="code" value="${y.product_code}" type="radio"> ${y.product_description} ${y.product_nominal}
                                                        </div>
                                                        <div class="col-6 text-end" style="padding:7px">
                                                           Rp ${rupiah(y.product_price)}
                                                        </div>

                                                        <div class="col text-start" style="padding:7px">
                                                        ${y.product_description} ${y.product_nominal}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                            `;

                        } else {
                            result =  `


                                        <div class=  "col-12"  >
                                            <div  class=  "card"  style=  "margin-top: 2%"  >
                                                <div  class=  "card-body"  >
                                                    <div class="row">
                                                        <div class="col-6 text-start" style="padding:7px">
                                                            <input required name="code" value="${y.product_code}" type="radio"> ${y.product_description} ${rupiah(y.product_nominal)}
                                                        </div>
                                                        <div class="col-6 text-end" style="padding:7px">
                                                           Rp ${rupiah(y.product_price)}
                                                        </div>

                                                        <div class="col text-start" style="padding:7px">
                                                        Pulsa ${y.product_description} Rp ${rupiah(y.product_nominal)}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                            `;

                        }

                        $('.hide').append(result);
                        $('#loader').empty()
                    });

                    $('#product').empty();

                    let img = $('#gambar').attr('src')

                        if(img == ''){
                            let gambar = 'https://cdn.mobilepulsa.net/img/logo/pulsa/small/three.png';

                            let img = $('#gambar').attr('src',gambar)
                        } else{

                            let gambar = 'https://cdn.mobilepulsa.net/img/logo/pulsa/small/three.png';

                            let img = $('#gambar').attr('src',gambar)

                        }



                },
            });


        } else if(isi == '085154' || isi == '085155' || isi == '085156' || isi == '085157' || isi == '085158'){
            //byu
            $('#loader').html("Please WAIT!");
            $.ajax({
                type : 'get',
                url : '/prefix/pulsa/By.U',
                success : function(data){

                    $('.hide').empty();

                    $(data).each(function(x,y){
                        // console.log(y.category_id)
                        const rupiah = (number)=>{
                                return new Intl.NumberFormat("id-ID", {
                                }).format(number);
                        }
                        result =  `


                                    <div class=  "col-12"  >
                                        <div  class=  "card"  style=  "margin-top: 2%"  >
                                            <div  class=  "card-body"  >
                                                <div class="row">
                                                    <div class="col-6 text-start" style="padding:7px">
                                                        <input required name="code" value="${y.product_code}" type="radio"> ${y.product_description} ${rupiah(y.product_nominal)}
                                                    </div>
                                                    <div class="col-6 text-end" style="padding:7px">
                                                       Rp ${rupiah(y.product_price)}
                                                    </div>

                                                    <div class="col text-start" style="padding:7px">
                                                    Pulsa ${y.product_description} Rp ${rupiah(y.product_nominal)}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                        `;
                        $('.hide').append(result);
                        $('#loader').empty()
                    });

                    $('#product').empty();

                    let img = $('#gambar').attr('src')

                        if(img == ''){
                            let gambar = 'https://cdn.mobilepulsa.net/img/product/operator_list/121121035421-byu-logo.png';

                            let img = $('#gambar').attr('src',gambar)
                        } else{

                            let gambar = 'https://cdn.mobilepulsa.net/img/product/operator_list/121121035421-byu-logo.png';

                            let img = $('#gambar').attr('src',gambar)

                        }



                },
            });

        } else if(isi == '0881' || isi == '0882' || isi == '0883' || isi == '0884' || isi == '0885' || isi == '0886' || isi == '0887' || isi == '0888'){
            //smartfren
            $('#loader').html("Please WAIT!");
            $.ajax({
                type : 'get',
                url : '/prefix/pulsa/Smart',
                success : function(data){

                    $('.hide').empty();

                    $(data).each(function(x,y){
                        // console.log(y.category_id)
                        const rupiah = (number)=>{
                                return new Intl.NumberFormat("id-ID", {
                                }).format(number);
                            }
                        result =  `


                                    <div class=  "col-12"  >
                                        <div  class=  "card"  style=  "margin-top: 2%"  >
                                            <div  class=  "card-body"  >
                                                <div class="row">
                                                    <div class="col-6 text-start" style="padding:7px">
                                                        <input required name="code" value="${y.product_code}" type="radio"> ${y.product_description} ${rupiah(y.product_nominal)}
                                                    </div>
                                                    <div class="col-6 text-end" style="padding:7px">
                                                       Rp ${rupiah(y.product_price)}
                                                    </div>

                                                    <div class="col text-start" style="padding:7px">
                                                    Pulsa ${y.product_description} Rp ${rupiah(y.product_nominal)}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                        `;
                        $('.hide').append(result);
                        $('#loader').empty()
                    });

                    $('#product').empty();

                    let img = $('#gambar').attr('src')

                        if(img == ''){
                            let gambar = 'https://cdn.mobilepulsa.net/img/logo/pulsa/small/smart.png';

                            let img = $('#gambar').attr('src',gambar)
                        } else{

                            let gambar = 'https://cdn.mobilepulsa.net/img/logo/pulsa/small/smart.png';

                            let img = $('#gambar').attr('src',gambar)

                        }



                },
            });

        } else if(isi == '0812' || isi == '0813' || isi == '0852' || isi == '0853' || isi == '0821' || isi == '0823' || isi == '0822' || isi == '0851'){
            //telkomsel
            $('#loader').html("Please WAIT!");
            $.ajax({
                type : 'get',
                url : '/prefix/pulsa/Telkomsel',
                success : function(data){

                    $('.hide').empty();
                    // console.log(data);
                    $(data).each(function(x,y){
                        // console.log(y.category_id)
                        const rupiah = (number)=>{
                                return new Intl.NumberFormat("id-ID", {
                                }).format(number);
                            }

                            if(y.product_code == 'htelkomsel50000TEL' || y.product_code == 'htelkomsel5000SMS' || y.product_code == 'htelkomsel5000TEL' ){

                                result =  `


                                            <div class=  "col-12"  >
                                                <div  class=  "card"  style=  "margin-top: 2%"  >
                                                    <div  class=  "card-body"  >
                                                        <div class="row">
                                                            <div class="col-6 text-start" style="padding:7px">
                                                                <input required name="code" value="${y.product_code}" type="radio"> ${y.product_description} ${y.product_nominal}
                                                            </div>
                                                            <div class="col-6 text-end" style="padding:7px">
                                                            Rp ${rupiah(y.product_price)}
                                                            </div>

                                                            <div class="col text-start" style="padding:7px">
                                                            ${y.product_nominal}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                                `;

                            } else {
                                result =  `


                                            <div class=  "col-12"  >
                                                <div  class=  "card"  style=  "margin-top: 2%"  >
                                                    <div  class=  "card-body"  >
                                                        <div class="row">
                                                            <div class="col-6 text-start" style="padding:7px">
                                                                <input required name="code" value="${y.product_code}" type="radio"> ${y.product_description} ${rupiah(y.product_nominal)}
                                                            </div>
                                                            <div class="col-6 text-end" style="padding:7px">
                                                            Rp ${rupiah(y.product_price)}
                                                            </div>

                                                            <div class="col text-start" style="padding:7px">
                                                            Pulsa ${y.product_description} Rp ${rupiah(y.product_nominal)}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                                `;

                            }
                        $('.hide').append(result);
                        $('#loader').empty()
                    });

                    $('#product').empty();

                    let img = $('#gambar').attr('src')

                        if(img == ''){
                            let gambar = 'https://cdn.mobilepulsa.net/img/logo/pulsa/small/telkomsel.png';

                            let img = $('#gambar').attr('src',gambar)
                        } else{

                            let gambar = 'https://cdn.mobilepulsa.net/img/logo/pulsa/small/telkomsel.png';

                            let img = $('#gambar').attr('src',gambar)

                        }



                },
            });

        } else if(isi == '0838' || isi == '0837' || isi == '0831' || isi == '0832'){
            //Axis
            $('#loader').html("Please WAIT!");
            $.ajax({
                type : 'get',
                url : '/prefix/pulsa/AXIS',
                success : function(data){

                    $('.hide').empty();

                    $(data).each(function(x,y){
                        // console.log(y.category_id)
                        const rupiah = (number)=>{
                                return new Intl.NumberFormat("id-ID", {
                                }).format(number);
                        }
                        result =  `


                                    <div class=  "col-12"  >
                                        <div  class=  "card"  style=  "margin-top: 2%"  >
                                            <div  class=  "card-body"  >
                                                <div class="row">
                                                    <div class="col-6 text-start" style="padding:7px">
                                                        <input required name="code" value="${y.product_code}" type="radio"> ${y.product_description} ${rupiah(y.product_nominal)}
                                                    </div>
                                                    <div class="col-6 text-end" style="padding:7px">
                                                       Rp ${rupiah(y.product_price)}
                                                    </div>

                                                    <div class="col text-start" style="padding:7px">
                                                    Pulsa ${y.product_description} Rp ${rupiah(y.product_nominal)}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                        `;
                        $('.hide').append(result);
                        $('#loader').empty()
                    });

                    $('#product').empty();

                    let img = $('#gambar').attr('src')

                        if(img == ''){
                            let gambar = 'https://cdn.mobilepulsa.net/img/logo/pulsa/small/axis.png';

                            let img = $('#gambar').attr('src',gambar)
                        } else{

                            let gambar = 'https://cdn.mobilepulsa.net/img/logo/pulsa/small/axis.png';

                            let img = $('#gambar').attr('src',gambar)

                        }



                },
            });

        } else if(isi == '0817' || isi == '0818' || isi == '0819' || isi == '0859' || isi == '0878' || isi == '0877'){
                //XL
                $('#loader').html("Please WAIT!");
                $.ajax({
                    type : 'get',
                    url : '/prefix/pulsa/XL',
                    success : function(data){

                        $('.hide').empty();

                        $(data).each(function(x,y){
                            // console.log(y.category_id)
                            const rupiah = (number)=>{
                                    return new Intl.NumberFormat("id-ID", {
                                    }).format(number);
                                }

                                if(y.product_code == 'xld500AN90' || y.product_code == 'xld500AN30' || y.product_code == 'xld400AN7' || y.product_code == 'xld325AN30' || y.product_code == 'xld300AN90'){

                                    result =  `


                                                <div class=  "col-12"  >
                                                    <div  class=  "card"  style=  "margin-top: 2%"  >
                                                        <div  class=  "card-body"  >
                                                            <div class="row">
                                                                <div class="col-6 text-start" style="padding:7px">
                                                                    <input required name="code" value="${y.product_code}" type="radio"> ${y.product_description} ${y.product_nominal}
                                                                </div>
                                                                <div class="col-6 text-end" style="padding:7px">
                                                                Rp ${rupiah(y.product_price)}
                                                                </div>

                                                                <div class="col text-start" style="padding:7px">
                                                                ${y.product_nominal}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                    `;

                                } else {
                                    result =  `


                                                <div class=  "col-12"  >
                                                    <div  class=  "card"  style=  "margin-top: 2%"  >
                                                        <div  class=  "card-body"  >
                                                            <div class="row">
                                                                <div class="col-6 text-start" style="padding:7px">
                                                                    <input required name="code" value="${y.product_code}" type="radio"> ${y.product_description} ${rupiah(y.product_nominal)}
                                                                </div>
                                                                <div class="col-6 text-end" style="padding:7px">
                                                                Rp ${rupiah(y.product_price)}
                                                                </div>

                                                                <div class="col text-start" style="padding:7px">
                                                                Pulsa ${y.product_description} Rp ${rupiah(y.product_nominal)}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                    `;

                                }
                            $('.hide').append(result);
                            $('#loader').empty()
                        });

                        $('#product').empty();

                        let img = $('#gambar').attr('src')

                        if(img == ''){
                            let gambar = 'https://cdn.mobilepulsa.net/img/logo/pulsa/small/xl.png';

                            let img = $('#gambar').attr('src',gambar)
                        } else{

                            let gambar = 'https://cdn.mobilepulsa.net/img/logo/pulsa/small/xl.png';

                            let img = $('#gambar').attr('src',gambar)

                        }




                    },
                });

            } else if(isi == '0814' || isi == '0815' || isi == '0816' || isi == '0855' || isi == '0856' || isi == '0857' || isi == '0858'){
                //Indosat
                $('#loader').html("Please WAIT!");
                $.ajax({
                    type : 'get',
                    url : '/prefix/pulsa/Indosat',
                    success : function(data){

                        $('.hide').empty();

                        $(data).each(function(x,y){
                            // console.log(y.category_id)
                            const rupiah = (number)=>{
                                    return new Intl.NumberFormat("id-ID", {
                                    }).format(number);
                                }

                                if(y.product_code == 'hindosat5000SMS' || y.product_code == 'hindosat50000TEL' || y.product_code == 'hindosat25000SMS' || y.product_code == 'hindosat10000SMS'){

                                    result =  `


                                                <div class=  "col-12"  >
                                                    <div  class=  "card"  style=  "margin-top: 2%"  >
                                                        <div  class=  "card-body"  >
                                                            <div class="row">
                                                                <div class="col-6 text-start" style="padding:7px">
                                                                    <input required name="code" value="${y.product_code}" type="radio"> ${y.product_description} ${y.product_nominal}
                                                                </div>
                                                                <div class="col-6 text-end" style="padding:7px">
                                                                Rp ${rupiah(y.product_price)}
                                                                </div>

                                                                <div class="col text-start" style="padding:7px">
                                                                ${y.product_nominal}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                    `;

                                } else {
                                    result =  `


                                                <div class=  "col-12"  >
                                                    <div  class=  "card"  style=  "margin-top: 2%"  >
                                                        <div  class=  "card-body"  >
                                                            <div class="row">
                                                                <div class="col-6 text-start" style="padding:7px">
                                                                    <input required name="code" value="${y.product_code}" type="radio"> ${y.product_description} ${rupiah(y.product_nominal)}
                                                                </div>
                                                                <div class="col-6 text-end" style="padding:7px">
                                                                Rp ${rupiah(y.product_price)}
                                                                </div>

                                                                <div class="col text-start" style="padding:7px">
                                                                Pulsa ${y.product_description} Rp ${rupiah(y.product_nominal)}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                    `;

                                }
                            $('.hide').append(result);
                            $('#loader').empty()







                        });

                        $('#product').empty();

                        let img = $('#gambar').attr('src')

                        if(img == ''){
                            let gambar = 'https://cdn.mobilepulsa.net/img/logo/pulsa/small/indosat.png';

                            let img = $('#gambar').attr('src',gambar)
                        } else{

                            let gambar = 'https://cdn.mobilepulsa.net/img/logo/pulsa/small/indosat.png';

                            let img = $('#gambar').attr('src',gambar)

                        }



                    },
                });

            } else if(isi == '' || isi == '0' || isi == '08'  ){
                $('.hide').empty();
                $('#gambar').attr('src','')
            }
        }

        // $('.hide').empty();
        // $('#buttom').prop('disabled', true);


</script>

<br><br><br>
@endsection
