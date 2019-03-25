@extends('header')

@section('title', 'Transactions')

@section('content')

<div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="blue">
	                                <h4 class="title">Payments</h4>
	                                
	                            </div>
	                            <div class="card-content table-responsive">
	                                <table class="table">
	                                    <thead class="text-primary">
	                                    	<th>Name</th>
	                                    	<th>Plan</th>
	                                    	<th>Amount</th>
	                                    	<th>Mobile</th>
	                                    	<th>Date</th>
											<th>Status</th>
											<th>Action</th>
	                                    </thead>
	                                    <tbody>
	                                    	@foreach($dep as $depi)
	                                        <tr>
	                                        	<td>{{$depi->user->first_name}}</td>
	                                        	<td>{{$depi->plan->name}}</td>
	                                        	<td>{{$depi->amount}}</td>
	                                        	<td>{{$depi->mobile}}</td>
	                                        	<td>{{$depi->created_at}}</td>
												<td><span class="badge badge-primary">{{$depi->status}}</span></td>
												<td><a href="{{ route('payment.update', $depi->id) }}" class="btn btn-success">
                                
                                Update
                            </a></td>
	                                        </tr>
	                                        @endforeach
	                                        
	                                        
	                                    </tbody>
	                                </table>

	                            </div>
	                        </div>
	                    </div>

	                    
	                        
	                </div>
	            </div>
	        </div>


@stop