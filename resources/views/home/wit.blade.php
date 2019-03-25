@extends('header')

@section('title', 'Withdrawal')

@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					
					<div class="card-content">
						<h4 class="title">Withdrawal Details</h4>

						<p class="category"><span class="text-success"> Transaction ID:  </span> {{ $wit->tran_id}}</p>
						<p class="category"><span class="text-success"> Status:  </span> {{ $wit->status }}</p>
						<p class="category"><span class="text-success"> Payment Option: {{ $wit->pay_option}}  </span> </p>
						
						<p class="category"><span class="text-success">Amount:  </span>$ {{ $wit->amount}}</p>

						<p class="category"><span class="text-success">Address:  </span> {{ $wit->address}}</p>
					</div>
					<div class="card-footer">
						
					</div>
				</div>

			</div>
			
		</div>
	</div>


@stop