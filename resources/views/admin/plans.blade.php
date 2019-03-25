@extends('Centaur::layout')

@section('title', 'Plans')

@section('content')
    
        <div class='btn-toolbar pull-right'>
            <a class="btn btn-primary btn-lg" href="{{ route('plans.create') }}">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Create Plan
            </a>
        </div>
        <h1>Plans</h1>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @foreach ($plans as $plan)
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="panel panel-default">
                        <div class="panel-body text-center">
                            
                            
                                <h4>{{ $plan->name }}</h4>
                                <h4>Charge: {{ $plan->robot_charge }} BTC</h4>
                                <h4>Profit[ROI]: {{ $plan->profit }}%</h4>
                                <h4>Duration: {{ $plan->duration }} Days</h4>
                            
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item">
                            
                                <em>Min Investment: {{ $plan->minimum }} BTC </em><br>
                                <em>Affiliate Bonus: {{ $plan->maximum }}% </em>
                            
                            </li>
                        </ul>
                        <div class="panel-footer">
                            <a href="{{ route('plan.update', $plan->id) }}" class="btn btn-default">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                Edit
                            </a>
                            <a href="{{ route('del.plan', $plan->id) }}" class="btn btn-danger" data-method="delete" data-token="{{ csrf_token() }}">
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
