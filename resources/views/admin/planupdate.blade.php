@extends('header')

@section('title', 'Update Plan')

@section('content')

<div class="content">
	            <div class="container-fluid">

	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="blue">
	                                <h4 class="title">Update Plan</h4>
	                            </div>
	                            <div class="card-content">
	                                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('plan.store') }}">
	                                    <div class="row">
	                                        <div class="col-md-5">
												<div class="form-group label-floating">
													<label class="control-label">Name:</label>
													<input type="text" value="{{ $plan->name }}" name="name" class="form-control">
												</div>
	                                        </div>
	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Profit</label>
													<input type="number" value="{{ $plan->profit }}" step="any" name="profit" class="form-control">
													
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Charge</label>
													<input type="number" step="any" value="{{ $plan->robot_charge }}" name="charge" class="form-control" required>
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        

										<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Duration</label>
													<input type="text" value="{{ $plan->duration }}" name="duration" class="form-control">
														
														
												</div>

	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Min</label>
													<input type="number" value="{{ $plan->minimum }}" name="min" class="form-control">
														
														
												</div>

	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Max</label>
													<input type="number" value="{{ $plan->maximum }}" name="max" class="form-control">
														
														
												</div>

	                                        </div>
	                                        
	                                        
	                                    </div>

	                                    <input name="_token" value="{{ csrf_token() }}" type="hidden">

	                                    <input name="plan_id" value="{{ $plan->id }}" type="hidden">
	                                    

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