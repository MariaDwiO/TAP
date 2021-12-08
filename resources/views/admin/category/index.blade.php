@extends('admin.layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-11">

            {!! Form::open(['url' => Request::path(), 'method'=> 'GET', 'class'=> 'input-grup'] ) !!}
                <div class="md-3 m-sm-3"> 
                    <input type="text" class="form-control" id='search' name="search" value="{{ request('search') }}" placeholder="Enter keywords">
                </div>
            {!! Form::close() !!}

            <div class="card">
                <div class="card-body">
                    
                    <h5 class="card-title text-center">Category Jurusan</h5>
                    @include('admin.partials.flash')

                    @can('add_categories')
                    {{-- button add untuk menambah product --}}
                        <a href="{{url ('admin/category/create') }}" class="btn btn-primary mb-3">Add new</a>
                    @endcan

			        <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name Jurusan Product</th>

                                    @can('edit_categories','delete_categories')
                                    <th scope="col">Action</th>
                                    @endcan
                                    
                                </tr>
                            </thead>
                            
                            <tbody>
                                @forelse  ($category as $no => $kategori)
                                    
                                <tr>
                                    <td>{{ $no  + $category->firstItem()}}</td>
                                    <td>{{ $kategori->name }}</td>
                                    <td>
                                        @can('edit_categories')
                                        <a href="{{ url('admin/category/'.$kategori->id.'/edit') }}" 
                                        class="btn btn-warning btn-sm">Edit</a>
                                        @endcan

                                        @can('delete_categories')
                                            {!! Form::open(['url' => 'admin/category/'. $kategori->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
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
                        {{ $category->links('vendor.pagination.custom')}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
