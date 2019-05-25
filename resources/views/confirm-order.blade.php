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
                        @foreach ($form as $p)
                        <img src="{{ url('/data_file/'.$p->file) }}" width="400px;"><br>
                        @endforeach
                </div>
            </div>

            <div class="col-sm-6">
                <h5>Ukuran Sepatu</h5>
                <div class="form-group">
                    <label for="title">Select Type:</label>
                    <select name="allsize" class="form-control" style="width:350px" disabled required>
                    @foreach ($form as $p)
                        <option value="">{{$p->size}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Select Size:</label>
                    <select name="spesificsize" class="form-control" style="width:350px" disabled required>
                    <option value="">{{$p->spesificsize}}</option>
                    </select>
                </div>
            </div>
        </div>
    </div>





    <div class="container mt-5">
        <h1 class="display-4 mb-5">Detail Information</h1>
        <hr>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                    @foreach ($form as $p)
                        <label for="exampleFormControlInput1">Nama</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" required name="name" value="{{$p->name}}" disabled>
                    @endforeach
                    </div>
                    <div class="form-group">
                    @foreach ($form as $p)
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" required name="email" value="{{$p->email}}" disabled>
                    @endforeach
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                    @foreach ($form as $p)
                        <label for="exampleFormControlInput1">Nomer Telpon</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" required name="phone" value="{{$p->phone}}" disabled>
                    @endforeach
                    </div>
                    <div class="form-group">
                    @foreach ($form as $p)
                        <label for="exampleFormControlInput1">Alamat</label>
                        <textarea type="email" class="form-control" id="exampleFormControlInput1" required name="address" placeholder="{{$p->address}}" disabled></textarea>
                    @endforeach
                    </div>
                </div>
            </div>
            <input type="submit" value="Selanjutnya" class="btn btn-dark mt-5">
        </form>
    </div>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="allsize"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: '/detail-productt/ajax/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        
                        $('select[name="spesificsize"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="spesificsize"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="spesificsize"]').empty();
            }
        });
    });
</script>


</body>
</html>