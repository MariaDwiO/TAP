@extends('admin.layout')
@section('content')

  <div class="row mt-3">
    <div class="col-lg-12">

      @php                     //model
          $title = !empty($product) ? ' Update'  : ' New '    
      @endphp

      <div class="card">
        <div class="card-body">

          <div class="card-title text-center"><h2>{{ $title }} Product</h2></div>
            @include('admin.partials.flash', ['$errors' => $errors])
            
            <hr>
            <link rel="stylesheet" type="text/css" href="{!! URL::asset('template/assets/style.css') !!}">

                @if (!empty($product))
                    {!! Form::model($product, ['url' => ['admin/products', $product->id], 'method' => 'PUT']) !!}
                    {!! Form::hidden('id') !!} 
                @else
                    {!! Form::open(['url' => 'admin/products','enctype' => 'multipart/form-data']) !!}
                @endif

                <div class="form-group">
                  {!! Form::label('name_siswa', 'Nama siswa') !!}
                  {!! Form::text('name_siswa', null, ['class' => 'form-control', 'placeholder'=>'Enter Your Name']) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('telephone', 'Telephone') !!}
                  {!! Form::text('telephone', null, ['class' =>'form-control', 'placeholder'=>'Enter Your Telephone']) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('name', 'Nama Product') !!}
                  {!! Form::text('name', null, ['class' => 'form-control', 'placeholder'=>'Enter Your Name Product']) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('price', 'Prince Product') !!}
                  {!! Form::text('price', null, ['class' => 'form-control', 'placeholder'=>'Enter Your Price Product']) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('pengerjaan ', 'Waktu Pengerjaan') !!}
                  {!! Form::text('pengerjaan', null, ['class' => 'form-control', 'placeholder'=>'Enter Your Waktu Pengerjaan']) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('kategori', 'Category Jurusan Product') !!}
                  {!! General::selectMultiLevel('kategori[]', $categories, ['class' => 'form-control', 'selected' =>!empty(old('kategori'))? old ('kategori'):$categoryIDs,
                  'placeholder'=>'-Choose Category Jurusan Product-']) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('image', 'Image Product') !!}
                  {!! Form::file('image', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('description', 'Description Product') !!}
                  {!! Form::textarea('description', null, ['id' =>'editor-custom', 'placeholder'=>'Enter Your Description Product']) !!}
                </div>

                {{-- button untuk save product dan kembali ke table --}}
                <div class="form-group border-top mt-5 pt-15 ">
                  <a type="button" href="{{ url('admin/products')}}" class="btn btn-light px-5 m-auto"><i class="zmdi zmdi-arrow-left"></i> Back</a>
                  <button type="submit" class="btn btn-light px-5 m-5" onclick=" checkButton()"><i class="zmdi zmdi-file"></i> Save</button>
                </div>

              {!! Form::close() !!}

          </div>
        </div>
      </div>
    </div>
  </div><!--End Row-->

@endsection

