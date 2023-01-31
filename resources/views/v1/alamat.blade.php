<form action="{{ url('alamat/store') }}" method="post">
    @csrf


    {{-- <p id="kirim"></p> --}}

    <select name="city" id="city" required>
        <option selected>-- Pilih Kota / Kabupaten --</option>
    </select>
    <br>

    {{-- <select name="province" id="province">
    </select> --}}

    <button type="submit">sumit</button>

</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>

$(document).ready(function(){
    $.ajax({
          url:"/city",
          type: "GET",
          dataType: "JSON",
          success: function(data){
            var nomor = 0;
            for(i=0; i<data.length; i++){
              nomor++;
              $('select[name="city"]').append('<option value="'+ data[i].city_id+'">'+ data[i].type + ' '+ data[i].city_name +'</option>');
            //$('select[name="province"]').append('<option value="'+ data[i].province_id+'">'+ data[i].province +'</option>');
            }
          },
          error: function(data){
           alert("Terjadi Kesalahan!");
         }
    });

    //    $.ajax({
    //       url:"/city",
    //       type: "GET",
    //       dataType: "JSON",
    //       success: function(data){
    //         var nomor = 0;
    //         for(i=0; i<data.length; i++){
    //           nomor++;
    //           $('select[name="province"]').append('<option value="'+ data[i].province_id+'">'+ data[i].province +'</option>');
    //         }
    //       },
    //       error: function(data){
    //        alert("Terjadi Kesalahan!");
    //      }
    //    });
});
// $(function(){
//         $.ajax({
//           url:"/city",
//           type: "GET",
//           dataType: "JSON",
//           success: function(data){
//             var nomor = 0;
//             for(i=0; i<data.length; i++){
//               nomor++;
//               $('select[name="city"]').append('<option value="'+ data[i].city_id'">' + data[i].city_name '</option>');
//             }
//           },
//           error: function(data){
//            alert("Terjadi Kesalahan!");
//          }
//        });
//       });

    // $(document).ready({
    //     City()
    // });

    // function city(){
    //     $.ajax({
    //       url:"/city",
    //       type: "GET",
    //       dataType: "JSON",
    //       success: function(data){

    //         $('kirim').append('<tr><td>'+nomor+'</td><td>'+data[0].city_name+'</td><td>');

    //       },
    //       error: function(data){
    //        alert("Terjadi Kesalahan!");
    //      }
    //    });

    // };

</script>
