@extends('admin.layout')
@section('content')

  <div class="row mt-3">
    <div class="col-lg-12">

      @php                     //model
          $title = !empty($product) ? ' Update'  : ' New '    
      @endphp

      <div class="card">
        <div class="card-body">

          @include('admin.template.flash', ['$errors' => $errors])
          
          <div class="card-title text-center"><h2>{{ $title }} Product</h2></div>
            <hr>
            <link rel="stylesheet" type="text/css" href="{!! URL::asset('template/assets/style.css') !!}">

                @if (!empty($product))
                    {!! Form::model($product, ['url' => ['products', $product->id], 'method' => 'PUT']) !!}
                    {!! Form::hidden('id') !!}
                @else
                    {!! Form::open(['url' => 'products']) !!}
                @endif

                <div class="form-group">
                  <label for="nama_pembuat">Name Pembuat</label>
                  <input type="text" class="form-control" id="nama_pembuat" placeholder="Enter Your Name">
                </div>

                <div class="form-group">
                  <label for="input-1">Name Product</label>
                  <input type="text" class="form-control" id="input-1" placeholder="Enter Your Name Product">
                </div>

                <div class="form-group">
                  <label for="input-3">Price Product</label>
                  <input type="text" class="form-control" id="input-3" placeholder="Enter Your Price Product">
                </div>

                <div class="form-group">
                  <label for="input-4">Choose Category Jurusan Product</label>
                  <select name="kategori" id="kategori" class="form-control">
                    <option value="">- Silahkan Pilih -</option>
                    <option value="Kriya">Kriya</option>
                    <option value="Multimedia">Multimedia</option>
                  </select>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Image Product</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="file">
                    </div>
                </div>

                <div class="form-group">
                  <label for="input-2">Description Product</label>
                  <input type="textarea" class="form-control" id="editor-custom" placeholder="Enter Your Description Product">
                </div>

                {{-- button untuk save product dan kembali ke table --}}
                <div class="form-group border-top mt-5 pt-15 ">
                  <a type="button" href="{{ url('admin/products')}}" class="btn btn-light px-5 m-auto"><i class="zmdi zmdi-arrow-left"></i> Back</a>
                  <button type="submit" class="btn btn-light px-5 m-5"><i class="zmdi zmdi-file"></i> Save</button>
                </div>

            </form>
          
          </div>
        </div>
      </div>
    </div>
  </div><!--End Row-->

@endsection

