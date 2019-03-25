@extends('header')

@section('title', 'Transactions')

@section('content')

<div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="blue">
	                                <h4 class="title">Withdrawals</h4>
	                                
	                            </div>
	                            <div class="card-content table-responsive">
	                                <table class="table">
	                                    <thead class="text-primary">
	                                    	<th>Name</th>
	                                    	<th>Tran Id</th>
	                                    	<th>Amount</th>
	                                    	<th>Pay Option</th>
	                                    	<th>Address</th>
	                                    	<th>Date</th>
											<th>Status</th>
											<th>Action</th>
	                                    </thead>
	                                    <tbody>
	                                    	@foreach($wit as $wits)
	                                        <tr>
	                                        	<td>{{$wits->user->first_name}}</td>
	                                        	<td>{{$wits->tran_id}}</td>
	                           
	                                        	<td>{{$wits->amount}}</td>
	                                        	<td>{{$wits->pay_option}}</td>
	                                        	<td>{{$wits->address}}</td>
	                                        	<td>{{$wits->created_at}}</td>
												<td><span class="badge badge-primary">{{$wits->status}}</span></td>
												<td><a href="{{ route('wit.update', $wits->id) }}" class="btn btn-success">
                                
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