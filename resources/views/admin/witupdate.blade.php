@extends('header')

@section('title', 'Update Payment')

@section('content')

<div class="content">
	            <div class="container-fluid">

	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="blue">
	                                <h4 class="title">Update Withdrawal</h4>
	                            </div>
	                            <div class="card-content">
	                                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('wit.store') }}">
	                                    
	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group">
													<label class="control-label">Status</label>
													<select type="text" name="status" id="charge" class="form-control">
														<option class="form-control" value="{{ $wit->status }}">{{ $wit->status }}</option>
														<option class="form-control" value="PAID">PAID</option>
														<option class="form-control" value="CANCELLED">CANCELLED</option>
													</select>
														
												</div>
											</div>

										<div class="col-md-4">
												
	                                        </div>
	                                        
	                                        
	                                    </div>

	                                    <input name="_token" value="{{ csrf_token() }}" type="hidden">

	                                    <input name="wit_id" value="{{ $wit->id }}" type="hidden">
	                                    

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