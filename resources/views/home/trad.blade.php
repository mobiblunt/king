@extends('header') 

@section('title', 'Escrow Details')

@section('content')
<div class="content">
                <div class="container-fluid">


           <div class="row">
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header ">
                  <h4 class="card-title">Escrow Transaction Details</h4>
                </div>
                <br>
                <br>
                <div class="card-body" style="text-align: center;">
                  <ul class="nav nav-pills nav-pills-warning" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist">
                        Overview
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#link2" role="tablist">
                        Terms
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#link3" role="tablist">
                       Amount
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#link4" role="tablist">
                       Status
                      </a>
                    </li>
                    @if($trans->status == "PENDING FUNDING")
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#link5" role="tablist">
                       Payment
                      </a>
                    </li>
                    @endif
                  </ul>
                  <div class="tab-content tab-space">
                    <div class="tab-pane active" id="link1">
                      <p ><b>Transaction Name:</b>  {{ $trans->name }}</p>
                      <br />

					<p ><b>Transaction Type:</b>  {{ $trans->type }}</p>
                      <br />

                      <p><b>Description:</b>  {{ $trans->description }}</p>
                      <br /> 

                      @if($trans->status == "PENDING" && $trans->email == Sentinel::getUser()->email)
                      <form accept-charset="UTF-8" role="form" method="post" action="{{ route('post.tran') }}">

                    	<div class="checkbox">
																<label>
																	<input type="checkbox" name="checki" required>
																	<span>By checking this box you agree to the <a href="{{ route('terms.home') }}">Terms of Services</a> and escrow instructions set forth herein. Please read these terms carefully before entering into this Agreement. THIS CONTRACT CONTAINS AN ARBITRATION PROVISION WHICH MAY BE ENFORCED BY THE PARTIES.<br><br>Due to regulatory considerations, before proceeding with your transaction, verify that your state of residence is not excluded in the terms of use for this applications.</span> 
																</label>

															</div>
															<input name="_token" value="{{ csrf_token() }}" type="hidden">

															<input name="tran_id" value="{{ $trans->id }}" type="hidden">

															<button class="btn btn-warning">Reject</button>&nbsp;<button class="btn btn-success" type="submit">Agree</button>

															</form>

                    	@endif


                      
                      
                    </div>
                    <div class="tab-pane" id="link2">
                     
                     <div class="col-lg-12 col-md-6 col-sm-6">
                             <div class="alert alert-info alert-with-icon" data-notify="container">
                                        <i data-notify="icon" class="material-icons">add_alert</i>
                                        <span data-notify="message"><b> Payment Release Terms:  - </b> {{ $trans->release_term }}</span>
                                    </div>
                            
                        </div>
                      
                      
                    </div>
                    <div class="tab-pane" id="link3">
                    	<p><b>Buyers Payment:</b>  <span class="badge badge-success">${{ number_format($trans->buyers_payment, 2, '.', ',') }}</span>  </p>
                      <br/>
                     <p><b>Escrow Fee:</b>  <span class="text-primary">${{ number_format($trans->fee, 2, '.', ',') }}</span></p>
                      <br/>
                      <p><b>Sellers Balance:</b> <span class="text-primary">${{ number_format($trans->sellers_balance, 2, '.', ',') }}</span>  </p>
                      <br/>  
                    </div>
                    <div class="tab-pane" id="link4">
                    	<p><b>Status:</b><br> <span style="background-color:green;" class="badge badge-success">{{ $trans->status }}</span> </p>


                      <br/>
                      
                    </div>
                    <div class="tab-pane" id="link5">
                    	<h4>Fund Your Transaction - Wire Transfer</h4>
                    	

                        <div class="col-lg-12 col-md-6 col-sm-6">
                             <div class="alert alert-info alert-with-icon" data-notify="container">
                                        <i data-notify="icon" class="material-icons">add_alert</i>
                                        <span data-notify="message"><b> No Holding Period  - </b> Wires are a fast secure way of sending money with immediate availability to start your transaction.<br><br>Please Print this screen to take with you or copy the information below to use when requesting the wire transfer from your financial institution.<br><br><b>IMPORTANT: </b>Be sure that ALL account numbers, ABA/SWIFT, numbers and the 16 digit transaction number matches any information included with your wire transfer this ensures that your funds are matched correctly with your transaction in our system</span>
                                    </div>
                            
                        </div>
                    
                     <p><b>Direct To:</b> <br><b>Funding Amount:</b> <span style="background-color:green;" class="badge badge-success">${{ number_format($trans->buyers_payment, 2, '.', ',') }}</span>  </p>
                     <p><b>Sort Code:</b> 070436</p>
                     <p><b>Swift Code(International Wires):</b> NAIAGB21 <br><br>NOTE: If you are sending payment from an international finacial institution(NON-UK), Include an additional $35 fee. Transactions will not be activated until the full contract value is received by the escrow agent. </p>
                     <p><b></b></p>

                     <p><b>Bank Name:</b> Nationwide Bank</p>
                      <p><b>Bank Address:</b> 798 High Road, Finchley, London N129QX</p>
                      <p><b>IBAN:</b> GB18NA1A07043604299220</p>
                      <p><b>Beneficiary Account No:</b> 04299220</p>
                      <p><b>Beneficiary Account Name:</b> N O </p>

                      <img height="200" width="300" src="{{ url('/') }}/img/nation.png">


                      <div class="col-lg-12 col-md-6 col-sm-6">
                             <div class="alert alert-info alert-with-icon" data-notify="container">
                                        <i data-notify="icon" class="material-icons">add_alert</i>
                                        <span data-notify="message"><b> After Payment </b><br> Please send proof of payment to <a href="mailto:support@escrowcustodianservices.net">support@escrowcustodianservices.net</a><br><br><b>IMPORTANT: </b>Be sure that ALL account numbers, ABA/SWIFT, numbers and the 16 digit transaction number matches any information included with your wire transfer this ensures that your funds are matched correctly with your transaction in our system</span>
                                    </div>
                            
                        </div>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
                



                </div>
            </div>
@stop