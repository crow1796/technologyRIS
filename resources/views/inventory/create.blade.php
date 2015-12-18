@extends('master.layout', ['title' => 'Add New Device'])

@section('pageheader')
    @include('master._pageheader')
@stop

@section('accordion')
    @include('master._accordion')
@stop

@section('content')
        <p class="button-container"><a class="btn btn-xs btn-primary mybtn" href="{{ url('/devices') }}">&laquo; Back</a></p>

        @include('errors._errors')

        {!! Form::open(['url' => '/devices', 'class' => 'form', 'id' => 'addDeviceForm']) !!}
            @include('inventory.partials._form', ['pageHeader' => 'Add New Device', 'buttonText' => 'Add Device'])
        {!! Form::close() !!}

@stop

@section('footer')
    @include('master._footer')
    @include('master._permission_info_modal')
@stop