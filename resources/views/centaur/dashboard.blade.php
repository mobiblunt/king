@extends('header') 

@section('title', 'Dashboard')

@section('content')
<div class="content">
                <div class="container-fluid">
                    @if (Sentinel::check() && Sentinel::inRole('administrator'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title">Alerts</h4>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>Transaction ID</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                        </thead>
                                        <tbody>
                                            @foreach($alert as $alt)
                                            <tr>
                                                <td>{{$alt->deposit->trans_id}}</td>
                                                <td>{{$alt->amount}} </td>
                                                <td>{{$alt->date_paid}}</td>
                                                
                                                
                                                
                                               
                                            </tr>
                                            @endforeach
                                            
                                            
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <script type="text/javascript">
                                    baseUrl = "https://widgets.cryptocompare.com/";
                                    var scripts = document.getElementsByTagName("script");
                                    var embedder = scripts[ scripts.length - 1 ];
                                    (function (){
                                    var appName = encodeURIComponent(window.location.hostname);
                                    if(appName==""){appName="local";}
                                    var s = document.createElement("script");
                                    s.type = "text/javascript";
                                    s.async = true;
                                    var theUrl = baseUrl+'serve/v1/coin/converter?fsym=BTC&tsyms=USD,GOLD,KRW,CNY';
                                    s.src = theUrl + ( theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
                                    embedder.parentNode.appendChild(s);
                                    })();
                                </script>
                        </div>

                        <div class="col-md-4">
                            <script type="text/javascript">
                                    baseUrl = "https://widgets.cryptocompare.com/";
                                    var scripts = document.getElementsByTagName("script");
                                    var embedder = scripts[ scripts.length - 1 ];
                                    (function (){
                                    var appName = encodeURIComponent(window.location.hostname);
                                    if(appName==""){appName="local";}
                                    var s = document.createElement("script");
                                    s.type = "text/javascript";
                                    s.async = true;
                                    var theUrl = baseUrl+'serve/v1/coin/tiles?fsym=BTC&tsyms=CNY,GOLD,KRW,USD,EUR,GBP,BTC';
                                    s.src = theUrl + ( theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
                                    embedder.parentNode.appendChild(s);
                                    })();
                                </script>
                        </div>

                        <div class="col-md-4">
                            <script type="text/javascript">
                                    baseUrl = "https://widgets.cryptocompare.com/";
                                    var scripts = document.getElementsByTagName("script");
                                    var embedder = scripts[ scripts.length - 1 ];
                                    (function (){
                                    var appName = encodeURIComponent(window.location.hostname);
                                    if(appName==""){appName="local";}
                                    var s = document.createElement("script");
                                    s.type = "text/javascript";
                                    s.async = true;
                                    var theUrl = baseUrl+'serve/v1/coin/multi?fsyms=BTC,ETH,XMR,LTC&tsyms=CNY,GOLD,KRW,USD';
                                    s.src = theUrl + ( theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
                                    embedder.parentNode.appendChild(s);
                                    })();
                                </script>
                        </div>
                    </div>
<div class="row">
    <div class="col-md-12">
        <script type="text/javascript">
                                    baseUrl = "https://widgets.cryptocompare.com/";
                                    var scripts = document.getElementsByTagName("script");
                                    var embedder = scripts[ scripts.length - 1 ];
                                    (function (){
                                    var appName = encodeURIComponent(window.location.hostname);
                                    if(appName==""){appName="local";}
                                    var s = document.createElement("script");
                                    s.type = "text/javascript";
                                    s.async = true;
                                    var theUrl = baseUrl+'serve/v3/coin/chart?fsym=BTC&tsyms=CNY,GOLD,KRW,USD';
                                    s.src = theUrl + ( theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
                                    embedder.parentNode.appendChild(s);
                                    })();
                                </script>
    </div>
</div>
                    @else

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title">Buy Transactions</h4>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>Transaction</th>
                                            <th>Seller</th>
                                            <th>Buyer</th>
                                            <th>Amount</th>
                                            <th>Created</th>
                                            
                                            <th>Updated</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            @foreach($buys as $buy)
                                            <tr>
                                                <td>{{$buy->name}}</td>
                                                <td>
                                                    @if($buy->users == NULL)
                                                     <em>N/A</em>
                                                    @else
                                                   
                                                    {{$buy->users->first_name}} {{$buy->users->last_name}}
                                                </td>
                                                @endif
                                                <td>
                                                    @if($buy->userb == NULL)
                                                    <em>N/A</em>
                                                    @else
                                                     {{$buy->userb->first_name}} {{$buy->userb->last_name}}
                                                </td>
                                                @endif
                                                <td>${{number_format($buy->purchase_value, 2, '.', ',')}}</td>
                                                <td>{{$buy->created_at}}</td>
                                                
                                                
                                                <td>{{$buy->updated_at}}</td>
                                                <td><span style="background-color:green;" class="badge badge-info">{{$buy->status}}</span></td>
                                                <td><a href="{{url('escrow-transaction-details')}}/{{$buy->id}}">
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



<div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="orange">
                                    <h4 class="title">Sale Transactions</h4>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>Transaction</th>
                                            <th>Seller</th>
                                            <th>Buyer</th>
                                            <th>Amount</th>
                                            <th>Created</th>
                                            
                                            <th>Updated</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            @foreach($sales as $sale)
                                            <tr>
                                                <td>{{$sale->name}}</td>
                                                <td>
                                                    @if($sale->users == NULL)
                                                   <em>N/A</em>
                                                     @else
                                                      {{$sale->users->first_name}} {{$sale->users->last_name}}
                                                    
                                                </td>
                                                @endif
                                                <td>
                                                     @if($sale->userb == NULL)
                                                     <em>N/A</em>
                                                     @else
                                                     {{$sale->userb->first_name}} {{$sale->userb->last_name}}
                                                   
                                                    @endif
                                                </td>
                                                
                                                <td>{{number_format($sale->purchase_value, 2, '.', ',')}}</td>
                                                <td>{{$sale->created_at}}</td>
                                                
                                                
                                                <td>{{$sale->updated_at}}</td>
                                                <td><span style="background-color:green;" class="badge badge-success">{{$sale->status}}</span></td>

                                                <td><a href="{{url('escrow-transaction-details')}}/{{$sale->id}}">
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












   
                   

                    


                    
@endif
                </div>
            </div>
    

    <?php
        $user = Sentinel::findById(1);

        // var_dump(Activation::create($user));
    ?>

@stop