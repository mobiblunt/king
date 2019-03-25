@extends('Centaur::layout')

@section('title', 'Accounts')

@section('content')
    
        <div class='btn-toolbar pull-right'>
            
        </div>
        <h1>Accounts</h1>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @foreach ($acct as $acc)
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="panel panel-default">
                        <div class="panel-body text-center">
                            
                            
                                <h4>{{ $acc->user->first_name }}</h4>
                                 <h4>{{ $acc->plan->name }} </h4>
                                <h4>Balance: $ {{ $acc->dollars }} </h4>
                                <h4>Earnings: $ {{ $acc->earnings }}</h4>
                                <h4>Owing: $ {{ $acc->owing }}</h4>
                                <h4>Expiry: {{ $acc->end_date }}</h4>
                                
                            
                        </div>
                        <ul class="list-group">
                            
                        </ul>
                        <div class="panel-footer">
                            <a href="{{ route('account.update', $acc->id) }}" class="btn btn-default">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                Edit
                            </a>
                            <a href="{{ route('del.acc', $acc->id) }}" class="btn btn-danger" data-method="delete" data-token="{{ csrf_token() }}">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                Delete
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
@stop
