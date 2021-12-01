@extends('admin.layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-11">

            <br><br>

            <div class="card">
                <div class="card-body">
                    
                    <h5 class="card-title text-center">Category Jurusan</h5>
			        <div class="table-responsive">
                        @include('admin.partials.flash')
                        
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

                    @can('add_categories')
                    {{-- button add untuk menambah product --}}
                        <div class="card-footer text-right">
                            <a href="{{url ('admin/category/create') }}" class="btn btn-primary">Add new</a>
                        </div>
                    @endcan

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
