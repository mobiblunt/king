@extends('header')

@section('title', 'Deposits')

@section('content')

<div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="blue">
	                                <h4 class="title">Withdraw Funds</h4>
	                            </div>
	                            <div class="card-content">
	                                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('post.wit') }}">
	                                    <div class="row">
	                                        <div class="col-md-5">
												<div class="form-group label-floating">
													<label class="control-label">Amount</label>
													<input type="text" name="amount" class="form-control" required>
												</div>
	                                        </div>
	                                       
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Mobile</label>
													<input type="text" name="mobile" class="form-control" required>
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Payment Option</label>
													<select name="option" class="form-control" required>
														<option value="BTC" class="form-control">BTC</option>
														<option value="ETH" class="form-control">ETH</option>
														<option value="LTC" class="form-control">LTC</option>
													</select>
												</div>
	                                        </div>

	                                       <div class="col-md-6">
											<div class="form-group label-floating">
												<label class="control-label">Payment Address</label>
												<input type="text" name="address" class="form-control" required>
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