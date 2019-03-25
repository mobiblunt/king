@extends('header')

@section('title', 'My Account')

@section('content')
<div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-8">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">My Account </h4>
									<p class="category">Update your profile</p>
	                            </div>
	                            <div class="card-content">
	                                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('users.update', $user->id) }}">
	                                    

	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">First Name</label>
													<input type="text" name="first_name" value="{{$user->first_name}}" class="form-control" >
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Last Name</label>
													<input type="text" name="last_name" value="{{$user->last_name}}" class="form-control" >
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Address</label>
													<input type="text" name="address" value="{{$user->address}}" class="form-control" >
												</div>
	                                        </div>


	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">BTC Address</label>
													<input type="text" name="btc" value="{{$user->btc}}" class="form-control" >
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Mobile</label>
													<input type="text" name="mobile" value="{{$user->mobile}}" class="form-control" >
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Password</label>
													<input type="password" name="password" class="form-control" >
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Confirm Password</label>
													<input type="text" name="password_confirmation" class="form-control" >
												</div>
	                                        </div>
	                                    </div>


	                                    <input name="email" value="{{$user->email}}" type="hidden">
	                                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                                        <input name="_method" value="PUT" type="hidden">

	                                    

	                                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
	                                    <div class="clearfix"></div>
	                                </form>
	                            </div>
	                        </div>
	                    </div>
						<div class="col-md-4">
    						<div class="card card-profile">
    							<div class="card-avatar">
    								<a href="#pablo">
    									<img class="img" src="{{ url('/') }}/img/images.jpg" />
    								</a>
    							</div>

    							<div class="content">
    								
    								<h4 class="card-title">{{$user->first_name}} {{$user->last_name}}</h4>
    								<h6 class="category text-gray">{{$user->mobile}}</h6>
    								<p class="card-content">
    									{{$user->country}}
    								</p>
    								
    							</div>
    						</div>
		    			</div>
	                </div>
	            </div>
	        </div>

@stop