@extends('admin.layout')
@section('content')

<div class="row mt-3">
    <div class="col-lg-4">
        <div class="card profile-card-2">
            
            <div class="card-img-block">
                <img class="img-fluid" src="https://via.placeholder.com/800x500" alt="Card image cap">
            </div>

            <div class="card-body pt-5">
                <img src="https://via.placeholder.com/110x110" alt="profile-image" class="profile">
                <h5 class="card-title">Mark Stern</h5>
                <p class="card-text">Admin</p>
            </div>

        </div>
    </div>

    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                
                <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                    <li class="nav-item">
                        <a href="javascript:void();" data-target="#edit" data-toggle="collapse" class="nav-link"><i class="icon-note"></i> <span class="hidden-xs">Edit Profile</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void();" data-target="#template" data-toggle="collapse" class="nav-link"><i class="zmdi zmdi-settings"></i> <span class="hidden-xs">Setting Dashboard</span></a>
                    </li>
                </ul>
                
                <div class="tab-content p-3">
                    <div class=" collapse" id="edit">
                        <form>
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Username</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" value="Mark">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="email" value="mark@example.com">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="password" value="11111122333">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Change profile</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="file">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Contact</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" value="" placeholder="Contact">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                <div class="col-lg-9">
                                    <input type="button" class="btn btn-primary" value="Save Changes">
                                </div>
                            </div>
                            
                        </form>                        
                    </div>
                </div>
                
                <div class="tab-content  p-3">
                    <div class="collapse" id="template">
                        <div class="switcher-icon">
                            <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
                        </div>	

                        <p class="mb-0 responsive">Gaussion Texture</p>
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