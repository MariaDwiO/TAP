@extends('admin.layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-11">
            
            <br><br>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Products</h5>
			        <div class="table-responsive">
                        
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name Pembuat</th>
                                <th scope="col">Name Product</th>
                                <th scope="col">Image Product</th>
                                <th scope="col">Jurusan product</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>

                            {{-- looping nomer --}}
                            @php $no= 1; @endphp
                            
                            <tbody>
                                <tr>
                                <th>{{$no++}}</th>
                                <td>Andari Dira</td>
                                <td>Batik</td>
                                <td>Image Batik</td>
                                <td>Busana Batik</td>
                                <td>Edit Delete</td>
                                </tr>
                                <tr>
                            </tbody>
                        </table>
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
