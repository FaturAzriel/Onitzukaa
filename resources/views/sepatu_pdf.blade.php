<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        hr {
            height: 2px;
            background-color: #007bf0;
        }
        .col-sm-8 {
            margin-left: 200px;
        }

        .row {
            margin-top: -50px;
        }

        .fragile {
            font-size: 30px;
        }
    </style>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    @foreach ($sepatu as $p)
    <title>{{ $p->name }}</title>
    @endforeach
  </head>
  <body>

    <div class="container">
        <h5 class="text-right">ONITSUKA.ID</h5>
        <hr class="mb-4">
            <div class="row">
                <div class="col-sm-4">
                <p>FORM &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</p>
                </div>

                <div class="col-sm-8">
                <p>ONITSUKA.ID</p>
                <p>JAKARTA</p>
                <p>+6281932127424 <span>(Whatsapp)</span></p>
                <p>+628161972312 <span>(Call)</span></p>
                </div>
            </div>


        <hr class="mb-4">
            <div class="row">
                <div class="col-sm-4">
                <p>TO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</p>
                </div>

                <div class="col-sm-8">
            @foreach ($sepatu as $p)
            <p type="hidden" name="id" value="{{ $p->id }}"></p>
                <p>{{ $p->name }} - {{ $p->phone }}</p>
                <p>{{ $p->address }}</p>
            @endforeach
                </div>
            </div>

            <br>
            <br>
            <p>THANKYOU FOR SHOPING AT <b>ONITSUKA.ID !</b></p>
            <br>
            <p class="fragile">FRAGILE !!! <br>PLEASE HANDLE WITH CARE</p>
            <br><br><br>
    </div>
            <div style="border-bottom: 1px dashed #000;"></div>
            <br>

            <img src="{{ url('/data_file/'.$p->file) }}">






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>