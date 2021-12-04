@extends('admin.layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            
            {!! Form::open(['url' => Request::path(), 'method'=> 'GET', 'class'=> 'input-grup'] ) !!}
                <div class="md-3 m-sm-3"> 
                    <input type="text" class="form-control" id='search' name="search" value="{{ request('search') }}" placeholder="Enter keywords">
                </div>
            {!! Form::close() !!}

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Products</h5>
			        
                    @include('admin.partials.flash')

                    @can('add_products')
                    {{-- button add untuk menambah product --}}
                    <a href="{{url ('admin/products/create') }}" class="btn btn-primary mb-3">Add new</a>
                    @endcan


                    <div class="table-responsive">
                        <table class="table table-striped">
                            
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name Pembuat</th>
                                    <th scope="col">Name Product</th>
                                    <th scope="col">Image product</th>
                                    
                                    @can('edit_products','delete_products')
                                    <th scope="col">Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            
                            <tbody>
                                @forelse ($products as $no => $produk)
                                    
                                <tr>
                                    <td>{{ $no  + $products->firstItem()}}</td>
                                    <td>{{ $produk->name_siswa }}</td>
                                    <td>{{ $produk->name }}</td>
                                    <td><img src="{{ asset('storage/'.$produk->image) }}" style="width:35px"/></td>
                                    <td>
                                        @can('edit_products')
                                        <a href="{{'url'('admin/products/'.$produk->id.'/edit') }}" 
                                            class="btn btn-warning btn-sm">Edit</a>
                                        @endcan

                                        @can('delete_products')
                                            {!! Form::open(['url' => 'admin/products/'. $produk->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::submit('remove', ['class' => 'btn btn-danger btn-sm']) !!}
                                            {!! Form::close() !!}
                                        @endcan
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

                </div>
            </div>            
        </div>
    </div>
</div>

@endsection
