@extends('head')

@section('title', 'Deposit Details')

@section('content')

<div class="content">

	<div class="container-fluid">

@if($depo->status != "PAID")

                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-sm-6">
                             <div class="alert alert-warning">
                                        <button type="button" aria-hidden="true" class="close">×</button>
                                        <span><b> Notice - </b> Payment Address Has been generated for this transaction. Please Send Payment Alert once payment has been made.</span>
                                    </div>
                            
                        </div>
                    </div>

                    @endif


		<div class="row">
			<div class="col-md-8">
				<div class="card">
					
					<div class="card-content">
						<h4 class="title">Transaction Details</h4>

						<p class="category"><span class="text-success"> Transaction ID:  </span> {{ $depo->trans_id}}</p>
						<p class="category"><span class="text-success"> Status:  </span> {{ $depo->status }}</p>
						<p class="category"><span class="text-success"> Payment Option: {{ $depo->pay_option}}  </span> </p>
						<p class="category"><span class="text-success"> Plan:  </span> {{ $plan->name}}</p>
						<p class="category"><span class="text-success"> Robot Charge: </span> {{ $plan->robot_charge}}<i class="fa fa-bitcoin"></i></p>
						<p class="category"><span class="text-success"> Investment:  </span> {{ $plan->minimum}}<i class="fa fa-bitcoin"></i></p>
						<p class="category"><span class="text-success"> Total Amount:  </span> {{ $total }}<i class="fa fa-bitcoin"></i></p>
						
						<p class="category"><span class="text-success"> Amount Paid:  </span>
							@if($depo->status == "PAID")
							 {{ $depo->amount}}
							 @else
						 0 
						 @endif
						 <i class="fa fa-bitcoin"></i></p>
						<p class="category"><span class="text-success"> Balance Amount:  </span> {{ $depo->owing}}<i class="fa fa-bitcoin"></i></p>
					</div>
					<div class="card-footer">
						<button type="button" data-toggle="modal" data-target="#myModal2" class="btn btn-success">Send Payment Alert</button>
						<div class="stats">
							<i class="material-icons">access_time</i> updated in real time 
						</div>
					</div>
				</div>

			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-content">
			<div  id="qrcode"><a href="bitcoin:{{ Config::get('siteVar.btcadd1') }}?amount={{$depo->amount}}"></a></div>
			</div>
			<div class="card-footer">
						<div class="stats">
							<p id="foo"><i class="fa fa-bitcoin"></i>{{ Config::get('siteVar.btcadd1') }}</p>
						</div>
						<button id="byn" data-clipboard-target="#foo">
    						Copy Address
							</button>
					</div>
			</div>

			</div>
		</div>
	</div>




@stop