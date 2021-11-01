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
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name Jurusan Product</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>

                            {{-- looping nomer --}}
                            @php $no= 1; @endphp
                            
                            <tbody>
                                <tr>
                                <th>{{$no++}}</th>
                                <td>Busana Batik</td>
                                <td>Edit Delete</td>
                                </tr>
                                <tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- button add untuk menambah product --}}
                    <div class="card-footer text-right">
                        <a href="{{url ('admin/category/create') }}" class="btn btn-primary">Add new</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
