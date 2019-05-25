<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Laravel Dependent Dropdown Example with demo</title>
    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/customer.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="display-4 mb-5">Detail Product</h1>
        <hr>
        <form action="/customer/storeupload" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}  
        <div class="row">
            <div class="col-sm-6">
                <h5>Upload Product</h5>
                <div class="form-group">
                    <label class="btn btn-light">
                        <img src="image/upload.png"><br>Upload<input type="file" required name="file" hidden>
                    </label>
                </div>
            </div>

            <div class="col-sm-6">
                <h5>Pilih Brand</h5>
                <div class="form-group">
                    <select required name="brand" id="brand" class="form-control input-lg dynamic" data-dependent="type">
                        <option value="">Pilih Brand</option>
                            @foreach ($brand_list as $brand)
                            <option value="{{ $brand->brand}}">{{ $brand->brand}}</option>
                            @endforeach
                    </select>
                </div>
                    <label for="">Type</label>
                <div class="form-group">
                    <select required name="type" id="type" class="form-control input-lg dynamic" data-dependent="size">
                        <option value="">Pilih Type</option>
                    </select>
                </div>
                    <label for="">Ukuran</label>
                <div class="form-group">
                    <select required name="size" id="size" class="form-control input-lg">
                        <option value="">Pilih Size</option>
                    </select>
                    {{ csrf_field() }}
                </div>
            </div>


           





    <div class="container mt-5">
        <h1 class="display-4 mb-5">Detail Information</h1>
        <hr>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" required name="name" placeholder="Masukan nama">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" required name="email" placeholder="Masukan email">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nomer Telpon</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" required name="phone" placeholder="Masukan nomer telpon">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Alamat</label>
                        <textarea type="email" class="form-control" id="exampleFormControlInput1" required name="address" placeholder="Masukan alamat"></textarea>
                    </div>
                </div>
            </div>
            <input type="submit" value="Kirim" class="btn btn-dark mt-5">
        </form>
    </div>



<script>
$(document).ready(function(){

 $('.dynamic').change(function(){
  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   var value = $(this).val();
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{{ route('dynamicdependent.fetch') }}",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent},
    success:function(result)
    {
     $('#'+dependent).html(result);
    }

   })
  }
 });

 $('#brand').change(function(){
  $('#type').val('');
  $('#size').val('');
 });

 $('#type').change(function(){
  $('#size').val('');
 });
 

});
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>