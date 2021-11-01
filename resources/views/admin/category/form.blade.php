@extends('admin.layout')
@section('content')

<div class="row mt-3">
    <div class="col-lg-8">

        <div class="card">
            <div class="card-body">
                <div class="card-title text-center">Form Category Jurusan</div>
                    <hr>

                    <form>

                        <div class="form-group">
                        <label for="input-1">Name Jurusan Product</label>
                        <input type="text" class="form-control" id="input-1" placeholder="Enter Your Name Jurusan">
                        </div>

                        {{-- button untuk save product dan kembali ke table --}}
                        <div class="form-group">
                        <a type="button" href="{{ url('admin/category')}}" class="btn btn-light px-5 mt-auto"><i class="zmdi zmdi-arrow-left"></i> Back</a>
                        <button type="submit" class="btn btn-light px-5 mt-auto"><i class="zmdi zmdi-file"></i> Save</button>
                        </div>

                    </form>
            
                </div>
            </div>
        </div>
    </div>
</div><!--End Row-->

@endsection

