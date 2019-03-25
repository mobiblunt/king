@extends('header')

@section('title', 'Referrals')

@section('content')
<div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="blue">
	                                <h4 class="title">My Referrals</h4>
	                                <p class="category">Your Referral ID is :&nbsp;<span>{{ Sentinel::getUser()->u_id }}</span> </p>
	                            </div>
	                            <div class="card-content table-responsive">
	                                <table class="table">
	                                    <thead class="text-primary">
	                                    	<th>Name</th>
	                                    	<th>Plan</th>
	                                    	<th>Date Joined</th>
	                                    </thead>
	                                    <tbody>
	                                    	@foreach($users as $user)
	                                        <tr>
	                                        	<td>{{$user->first_name}}</td>
	                                        	<td>
	                                        		@if($user->plan_id == 1)
	                                        		Silver Premium
	                                        		@elseif($user->plan_id == 4)
	                                        		Gold Premium
	                                        		@elseif($user->plan_id == 5)
	                                        		Ruby Premium
	                                        		@elseif($user->plan_id == 6)
	                                        		Sapphire Premium
	                                        		@endif

	                                        	</td>
	                                        	<td>{{$user->created_at}}</td>
	                                        	
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