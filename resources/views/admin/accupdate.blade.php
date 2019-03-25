@extends('header')

@section('title', 'Update Account')

@section('content')

<div class="content">
	            <div class="container-fluid">

	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="blue">
	                                <h4 class="title">Update Account</h4>
	                            </div>
	                            <div class="card-content">
	                                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('acc.store') }}">
	                                    <div class="row">
	                                        <div class="col-md-5">
												<div class="form-group label-floating">
													<label class="control-label">Balance:</label>
													<input type="number" value="{{ $acc->dollars }}" step="any" name="amount" class="form-control">
												</div>
	                                        </div>
	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Earnings</label>
													<input type="number" value="{{ $acc->earnings }}" step="any" name="earnings" class="form-control">
													
												</div>
	                                        </div>

	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Owing</label>
													<input type="number" value="{{ $acc->owing }}" step="any"  name="owing" class="form-control">
													
												</div>
	                                        </div>
	                                        
	                                    </div>

	                                    

	                                    <input name="_token" value="{{ csrf_token() }}" type="hidden">

	                                    <input name="acc_id" value="{{ $acc->id }}" type="hidden">
	                                    

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