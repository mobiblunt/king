@extends('header')

@section('title', 'Transactions')

@section('content')

<div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="blue">
	                                <h4 class="title">Deposits</h4>
	                            </div>
	                            <div class="card-content table-responsive">
	                                <table class="table">
	                                    <thead class="text-primary">
	                                    	<th>Transaction ID</th>
	                                    	<th>Amount</th>
	                                    	<th>Date</th>
	                                    	<th>Address</th>
											<th>Status</th>
											
											<th>Details</th>
	                                    </thead>
	                                    <tbody>
	                                    	@foreach($dep as $depi)
	                                        <tr>
	                                        	<td>{{$depi->trans_id}}</td>
	                                        	<td> $ {{$depi->amount }}</td>
	                                        	<td>{{$depi->created_at}}</td>
	                                        	<td><button type="button" data-toggle="modal" data-target="#myModal">View</button></td>
												<td><span class="badge badge-primary">{{$depi->status}}</span></td>
												
												
	                                        	<td><a href="{{url('deposit-btc-qr')}}/{{$depi->id}}">
                                        <button>Details</button>
                                    </a></td>
	                                        </tr>
	                                        @endforeach
	                                        
	                                        
	                                    </tbody>
	                                </table>

	                            </div>
	                        </div>
	                    </div>

	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="orange">
	                                <h4 class="title">Withdrawals</h4>
	                            </div>
	                            <div class="card-content table-responsive">
	                                <table class="table">
	                                    <thead class="text-primary">
	                                    	<th>Transaction ID</th>
	                                    	<th>Amount</th>
	                                    	<th>Date</th>
	                                    	<th>Address</th>
											<th>Status</th>
											<th>Details</th>
	                                    </thead>
	                                    <tbody>
	                                    	@foreach($wit as $wits)
	                                        <tr>
	                                        	<td>{{$wits->tran_id}}</td>
	                                        	<td>$ {{$wits->amount}}</td>
	                                        	<td>{{$wits->created_at}}</td>
	                                        	<td>{{$wits->address}}</td>
												<td><span class="badge badge-primary">{{$wits->status}}</span></td>
												
	                                        	<td><a href="{{url('withdraw-btc-qr')}}/{{$wits->id}}">
                                        <button>Details</button>
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