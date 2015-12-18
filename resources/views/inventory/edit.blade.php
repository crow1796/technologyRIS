@extends('master.layout', ['title' => 'Edit Device'])

@section('pageheader')
    @include('master._pageheader')
@stop

@section('accordion')
    @include('master._accordion')
@stop

@section('content')
        <p class="button-container"><a class="btn btn-xs btn-primary mybtn" href="{{ url('/devices') }}">&laquo; Back</a></p>
        @include('errors._errors')
        {!! Form::model($device, ['url' => url('/devices', $device->slug), 'method' => 'PATCH', 'class' => 'form']) !!}
            @include('inventory.partials._form', ['pageHeader' => 'Edit Device', 'buttonText' => 'Update Device'])
        {!! Form::close() !!}
@stop

@section('footer')
    @include('master._footer')
    @include('master._permission_info_modal')
@stop