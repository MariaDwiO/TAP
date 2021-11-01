@extends('admin.layout')
@section('content')

<div class="row mt-3">
    <div class="col-lg-8">

        @php                     //model
            $title = !empty($category) ? ' Update'  : ' New '    
        @endphp

        <div class="card">
            <div class="card-body">
                <div class="card-title text-center">
                    {{ $title }} Category Jurusan
                </div>
                    <hr>
                    @include('admin.partials.flash', ['$errors' => $errors])

                    {{-- mengechek apakah pada form category ada isinya maka akan di ambil dan di simpan --}}
                        @if (!empty($category))
                            {!! Form::model($category, ['url' => ['admin/category', $category->id], 'method' => 'PUT']) !!}
                            {!! Form::hidden('id') !!}
                        @else
                            {!! Form::open(['url' => 'admin/category']) !!}
                        @endif

                        <div class="form-group">
                            {!! Form::label('name', 'Name Jurusan Product') !!}
                            {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Enter Your Name Jurusan']) !!}   
                        </div>

                        {{-- button untuk save product dan kembali ke table --}}
                        <div class="form-group">
                            <a type="button" href="{{ url('admin/category')}}" class="btn btn-light px-5 mt-auto"><i class="zmdi zmdi-arrow-left"></i> Back</a>
                            <button type="submit" class="btn btn-light px-5 mt-auto"><i class="zmdi zmdi-file"></i> Save</button>
                        </div>

                    {!! Form::close() !!}
            </div>
        </div>

    </div>
</div><!--End Row-->

@endsection

