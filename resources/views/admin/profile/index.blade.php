@extends('admin.layout')
@section('content')

<div class="row mt-3">
    <div class="col-lg-4">
        <div class="card profile-card-2">
            
            <div class="card-img-block">
                <img class="img-fluid" src="{{ asset('images/'. Auth::user()->profile_photo_path) }}" alt="Card image cap">
            </div>

            <div class="card-body pt-5">
                <img src="{{ asset('images/'. Auth::user()->profile_photo_path) }}" alt="profile-image" class="profile">
                <h5 class="card-title">{{ Auth::user()->name }}</h5>
                <p class="card-text">Admin</p>
            </div>

        </div>
    </div>

    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                
                <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                    <li class="nav-item">
                        <a href="" data-target="#edit" data-toggle="collapse" class="nav-link">
                            <i class="icon-note"></i> <span class="hidden-xs">Edit Profile</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#template" data-toggle="collapse" class="nav-link">
                            <i class="zmdi zmdi-settings"></i> <span class="hidden-xs">Setting Dashboard</span></a>
                    </li>
                </ul>
                
                <div class="tab-content p-3">
                    <div class=" collapse" id="edit">

                        @include('admin.partials.flash', ['$errors' => $errors])

                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group row">
                                <label for="name" class="col-lg-3 col-form-label ">Username</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" id="name" name="name" value="{{ Auth::user()->name }}">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="email" class="col-lg-3 col-form-label">Email</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="email" id="email" name="email" value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label  for="password" class="col-lg-3 col-form-label ">Password</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="password" id="password" name="password" value="{{ Auth::user()->password }}" readonly>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="telephone" class="col-lg-3 col-form-label ">Contact</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" id="telephone" name="telephone" value="{{ Auth::user()->telephone }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="coverImage" class="col-lg-3 col-form-label ">Change profile</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="file" id="coverImage" name="image" value="{{ Auth::user()->profile_photo_path }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                <div class="col-lg-9">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                            
                        </form>                        
                    </div>
                </div>
                
                <div class="tab-content  p-3">
                    <div class="collapse" id="template">
                        <div class="switcher-icon">
                            <i class="zmdi zmdi-settings "></i>
                        </div>	

                        <p class="mb-0">Gaussion Texture</p>
                        <hr>
                        
                        <ul class="switcher">
                            <li id="theme1"></li>
                            <li id="theme2"></li>
                            <li id="theme3"></li>
                            <li id="theme4"></li>
                            <li id="theme5"></li>
                            <li id="theme6"></li>
                        </ul>

                        <p class="mb-0">Gradient Background</p>
                        <hr>
                        
                        <ul class="switcher">
                            <li id="theme7"></li>
                            <li id="theme8"></li>
                            <li id="theme9"></li>
                            <li id="theme10"></li>
                            <li id="theme11"></li>
                            <li id="theme12"></li>
                            <li id="theme13"></li>
                            <li id="theme14"></li>
                            <li id="theme15"></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection