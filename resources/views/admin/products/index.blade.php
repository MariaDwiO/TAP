@extends('admin.layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            
            {!! Form::open(['url' => Request::path(), 'method'=> 'GET', 'class'=> 'input-daterange'] ) !!}
                <div class="md-3 m-sm-3"> 
                    <input type="text" class="form-control" placeholder="Enter keywords">
                </div>
            {!! Form::close() !!}

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Products</h5>
			        
                    @include('admin.partials.flash')

                    <div class="table-responsive">
                        <table class="table table-striped">
                            
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name Pembuat</th>
                                    <th scope="col">Name Product</th>
                                    <th scope="col">Jurusan product</th>
                                    <th scope="col">Image product</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @forelse ($products as $no => $produk)
                                    
                                <tr>
                                    <td>{{ $no  + $products->firstItem()}}</td>
                                    <td>{{ $produk->name_siswa }}</td>
                                    <td>{{ $produk->name }}</td>
                                    <td>{{ $produk->first()->jurusan}}</td>
                                    <td><img src="{{ asset('storage/'.$produk->image) }}" style="width:35px"/></td>
                                    <td>

                                        <a href="{{'url'('admin/products/'.$produk->id.'/edit') }}" 
                                            class="btn btn-warning btn-sm">Edit</a>
                            
                                        {!! Form::open(['url' => 'admin/products/'. $produk->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        {!! Form::submit('remove', ['class' => 'btn btn-danger btn-sm']) !!}
                                        {!! Form::close() !!}

                                    </td>
                                </tr>

                                @empty
                                <tr>
                                    <td colspan="5">No Records Found</td>
                                </tr>

                                @endforelse
                            </tbody>
                        </table>

                        <br>
                        {{ $products->links('vendor.pagination.custom')}}
                    </div>

                    {{-- button add untuk menambah product --}}
                    <div class="card-footer text-right">
                        <a href="{{url ('admin/products/create') }}" class="btn btn-primary">Add new</a>
                    </div>

                </div>
            </div>            
        </div>
    </div>
</div>

@endsection
