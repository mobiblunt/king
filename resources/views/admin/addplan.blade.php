@extends('Centaur::layout')

@section('title', 'Add Plan')

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add Plan</h3>
            </div>
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('plans.store') }}">
                <fieldset>
                    <div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="Name" name="name" type="text" value="{{ old('name') }}">
                        {!! ($errors->has('name') ? $errors->first('name', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    <div class="form-group  {{ ($errors->has('profit')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="Profit[%]" name="profit" type="text">
                        {!! ($errors->has('profit') ? $errors->first('profit', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    
                    <div class="form-group  {{ ($errors->has('duration')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="Duration[Days]" name="duration" type="text">
                        {!! ($errors->has('duration') ? $errors->first('duration', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    <div class="form-group  {{ ($errors->has('minimum')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="Minimum Amount[BTC]" name="minimum" type="text">
                        {!! ($errors->has('minimum') ? $errors->first('minimum', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    <div class="form-group  {{ ($errors->has('maximum')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="Affilate Bonus[%]" name="maximum" type="text">
                        {!! ($errors->has('maximum') ? $errors->first('maximum', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Add">
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@stop