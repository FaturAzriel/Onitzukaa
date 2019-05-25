@extends('layouts.app')

@section('content')

    <div class="container">
            <table class="table table-striped table-responsive">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Image</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Type</th>
                        <th scope="col">Size</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col" width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1 ?>
                    @foreach ($form as $p)
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><img src="{{ url('/data_file/'.$p->file) }}" width="70px"></td>
                        <td>{{$p->brand}}</td>
                        <td>{{$p->type}}</td>
                        <td>{{$p->size}}</td>
                        <td>{{$p->name}}</td>
                        <td>{{$p->phone}}</td>
                        <td>{{$p->address}}</td>
                        <td>
                            <a href="/sepatu/cetak_pdf/{{$p->id}}" class="btn btn-success">Print</a>
                            <a href="/admin/hapuspesanan/{{$p->id}}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>


        







@endsection