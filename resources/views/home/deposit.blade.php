@extends('header')

@section('title', 'Deposits')

@section('content')

<div class="content">
	            <div class="container-fluid">

	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="blue">
	                                <h4 class="title">Deposit Funds</h4>
	                            </div>
	                            <div class="card-content">
	                                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('post.pay') }}">
	                                    <div class="row">
	                                        <div class="col-md-5">
												<div class="form-group label-floating">
													<label class="control-label">Amount(Minimum Of $500):</label>
													<input type="number" step="0.01" id="investment" min="500" name="amount" maxlength="10" class="form-control" required>
												</div>
	                                        </div>
	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Plan</label>
													<input type="text" id="plann" value="{{ $plan1->name }}" class="form-control" disabled>
													
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
												<div class="form-group">
													<label class="control-label">Robot Charge[BTC]</label>
													<input type="text" id="charge" value="{{ $plan1->robot_charge }}" class="form-control" disabled>
												</div>
	                                        </div>
	                                        
	                                        <div class="col-md-6">
												<div class="form-group">
													<label class="control-label">Total</label>
													<input type="text" readonly="" id="total" class="form-control" >
												</div>
	                                        </div>
	                                    </div>

	                                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
	                                    <input name="plan_id" value="{{ $plan1->id }}" type="hidden">
	                                    <input name="profit" id="profito" value="" type="hidden">
	                                    <input name="plan" id="pran" value="{{ $plan1->profit }}" type="hidden">

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