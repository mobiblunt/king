@extends('header')

@section('title', 'New Transaction')

@section('content')

<div class="content">
	            <div class="container-fluid">

	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="blue">
	                                <h4 class="title">Transaction Details</h4>
	                            </div>
	                            <div class="card-content">
	                                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('tras.store') }}">
	                                    <div class="row">
	                                    	<div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Transaction Name</label>
													<input type="text" name="tran_name" class="form-control">
												</div>
	                                        </div>
	                                        <div class="col-md-5">
												<div class="form-group label-floating">
													<label class="control-label">This Transaction Would be for the transfer of:</label>
													<select class="form-control" name="type" required>
														<option value="Aircraft" class="form-control" >Aircraft</option>
														<option value="Boat" class="form-control" >Boat</option>
														<option value="Vehicle" class="form-control" >Vehicle</option>
														<option value="Property" class="form-control" >Property</option>
														<option value="Construction" class="form-control" >Construction</option>
														<option value="Commercial" class="form-control" >Commercial</option>
														<option value="Industrial" class="form-control" >Industrial</option>
														<option value="Cryptocurrency" class="form-control" >Cryptocurrency</option>
													</select>
												</div>
	                                        </div>
	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">For this transaction i will be the:</label>
													<select class="form-control" name="desig" required>
														<option value="Seller" class="form-control" >Seller</option>
														<option value="Buyer" class="form-control" >Buyer</option>
													</select>
													
												</div>
	                                        </div>
	                                        
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group">
													<label class="control-label">Description</label>
													<textarea name="desc" class="form-control" required></textarea>
												</div>
	                                        </div>

										<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">Payment Release Terms</label>
													<textarea name="release" class="form-control" required></textarea>
												</div>
	                                        </div>

	                                        
	                                        <div class="col-md-6">
												<div class="form-group">
													<label class="control-label">Buyer Or Sellers Email</label>
													<input type="text" name="other_email" class="form-control" >
												</div>
	                                        </div>


	                                         <div class="col-md-6">
												<div class="form-group">
													<label class="control-label">Purchase Value($)</label>
													<input type="number" min="1000" step="any" name="p_value" id="purchase" class="form-control" required>
												</div>
	                                        </div>

	                                         
	                                         <div class="col-md-6">
												<div class="form-group">
													<label class="control-label">Escrow Fee($)</label>
													<input type="number" step="any" readonly="" name="fee" id="total" class="form-control" >
												</div>
	                                        </div>
	                                        
	                                         <div class="col-md-6">
												<div class="form-group">
													<label class="control-label">Fees Payment</label>
													<select class="form-control" name="who_fees" required>
														<option value="seller" class="form-control" >Seller Pays Fee</option>
														<option value="buyer" class="form-control" >Buyer Pays Fee</option>
														<option value="split" class="form-control" >Split Fee 50/50</option>
													</select>
												</div>
	                                        </div>

	                                        <div class="col-md-12">
												<div class="checkbox">
																<label>
																	<input type="checkbox" name="checki" required>
																	<span>By checking this box you agree to the <a href="{{ route('terms.home') }}">Terms of Services</a> and escrow instructions set forth herein. Please read these terms carefully before entering into this Agreement. THIS CONTRACT CONTAINS AN ARBITRATION PROVISION WHICH MAY BE ENFORCED BY THE PARTIES.<br><br>Due to regulatory considerations, before proceeding with your transaction, verify that your state of residence is not excluded in the terms of use for this applications.</span> 
																</label>

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