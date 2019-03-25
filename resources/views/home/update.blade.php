@extends('header')

@section('title', 'Deposits')

@section('content')

<div class="content">
	            <div class="container-fluid">

	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="blue">
	                                <h4 class="title">Transaction Details</h4>
	                                <p class="category">We need a bit more information before you can start your transaction. </p>
	                            </div>
	                            <div class="card-content">
	                                <form accept-charset="UTF-8" enctype="multipart/form-data" role="form" method="post" action="{{ route('tras.update') }}">
	                                    <div class="row">
	                                       
	                                        
	                                        <div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Date Of Birth:</label>
													<input type="date" name="dob" class="form-control" required>
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">


	                                        <div class="col-md-6">
	                                        	<h5>Identity Verification</h5>
	                                        	<p>Our Anti Money Laundering and Anti Fraud Policy Requires new users to upload a form of identity. A copy of unexpired Drivers license or International Passport</p>
												<div class="form-group">
													
													<input type="file" name="id_pic" required>
													
												</div>
	                                        </div>

										

	                                    </div>

	                                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
	                                    
	                                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
	                                    <div class="clearfix"></div>
	                                </form>
	                            </div>
	                        </div>
	                    </div>
					</div>
	                </div>
	            </div>
	        </div>

	

@stop