@extends('header')

@section('title', 'Update Payment')

@section('content')

<div class="content">
	            <div class="container-fluid">

	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="blue">
	                                <h4 class="title">Update Payment</h4>
	                            </div>
	                            <div class="card-content">
	                                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('payment.store') }}">
	                                    <div class="row">
	                                        <div class="col-md-5">
												<div class="form-group label-floating">
													<label class="control-label">Amount:</label>
													<input type="number" step="0.01" value="{{ $depo->amount }}" name="amount" class="form-control">
												</div>
	                                        </div>
	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Earnings</label>
													<input type="number" step="any" name="earnings" class="form-control">
													
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Owing</label>
													<input type="number" step="any" name="owing" class="form-control" required>
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group">
													<label class="control-label">Status</label>
													<select type="text" name="status" id="charge" class="form-control">
														<option class="form-control" value="{{ $depo->status }}">{{ $depo->status }}</option>
														<option class="form-control" value="PAID">PAID</option>
														<option class="form-control" value="CANCELLED">CANCELLED</option>
													</select>
														
												</div>
											</div>

										
	                                        
	                                        
	                                    </div>

	                                    <input name="_token" value="{{ csrf_token() }}" type="hidden">

	                                    <input name="dep_id" value="{{ $depo->id }}" type="hidden">
	                                    

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