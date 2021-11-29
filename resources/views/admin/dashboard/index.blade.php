@extends('admin.layout')
@section('content')

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <center><h5>WELCOME SUPER ADMIN</h5></center>

    <div class="container">
        <div class="col-lg-12">
            <div class="row">                            

            @forelse ($products as $produk)

                <div class="col d-flex">
                    <div class="card-deck text-dark bg-light" style="max-width: 15rem;">
                        <img src="{{ asset('storage/'.$produk->image) }}" class="card-img-top" alt="image" style="width:100%">

                        <div class="card-body">
                            <h5 class="card-title">{{ $produk->name }}</h5>
                            <h5 class="card-title">{{ $produk->price }}</h5>
                        </div>
                        <div class="card-footer">
                            <small class="text-dark">{{ $produk->tgl() }}</small>
                        </div>
                    </div>
                </div>

            @empty
                <tr>
                    <p>Product tidak ada</p>
                </tr>
            @endforelse

        </div>
    </div>

    {{ $products->links('vendor.pagination.custom')}}

</body>

</html>

@endsection