@extends('master.layout', ['title' => 'Manage Devices'])
    
@section('pageheader')
    @include('master._pageheader')
@stop

@section('accordion')
    @include('master._accordion')
@stop

@section('content')
        @include('errors.message')
        @include('errors._errors')
        <h1 class="page-header text-center">
            Manage Devices
        </h1>
        <div class="el-container table-cont">
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="btn-group">
                        <a class="btn btn-sm btn-primary" href="{{ url('/devices/create') }}"><span class="glyphicon glyphicon-plus"></span>  Add Device</a>

                        <a class="btn btn-sm btn-success" href="{{ url('/devices/print') }}"><span class="glyphicon glyphicon-print"></span>  Print</a>
                    </div>
                </div>
            </div>{{-- End Row --}}
            <div class="row table-container">
                <div class="col-sm-12">
                    <table class="table table-striped dt-responsive" width="100%">
                        <thead>
                            <tr>
                                <th class="min-tablet-p">ID</th>
                                <th class="all">Name</th>
                                <th width="15%" class="min-tablet-l">Actions</th>
                                <th class="min-tablet-l">Type</th>
                                <th class="desktop">Model</th>
                                <th class="desktop">Brand</th>
                                <th class="none">Serial</th>
                                <th class="min-tablet-p">Status</th>
                                <th class="min-tablet-l">Location</th>
                                <th class="none">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($devices as $device)
                                <tr>
                                    <td> {{ $device->id  }}</td>
                                    <td>{{ $device->name }}</td>
                                    <td>
                                        <a class="btn btn-xs btn-link" title="Click to Edit" href="{{ url('/devices', $device->slug) }}/edit">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>

                                        <a title="Click to Delete" data-toggle="modal" class="btn btn-xs btn-link deletebtn" href="#deletemodal">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>

                                        <a class="btn btn-xs btn-link editstatusbtn" href="#editstatusmodal" data-toggle="modal" title="Click to Edit Status">
                                            <span class="glyphicon glyphicon-heart-empty"></span>
                                        </a>
                                    </td>
                                    <td>{{ $device->deviceType->name }}</td>
                                    <td>{{ $device->model }}</td>
                                    <td>{{ $device->brand }}</td>
                                    <td>{{ $device->serial }}</td>
                                    @if($device->deviceStatus->id == 1)
                                        <td class="bg-success">{{ $device->deviceStatus->name }}</td>
                                    @elseif($device->deviceStatus->id == 2)
                                        <td class="bg-primary">{{ $device->deviceStatus->name }}</td>
                                    @elseif($device->deviceStatus->id == 3)
                                        <td class="bg-warning">{{ $device->deviceStatus->name }}</td>
                                    @elseif($device->deviceStatus->id == 4)
                                        <td class="bg-info">{{ $device->deviceStatus->name }}</td>
                                    @elseif($device->deviceStatus->id == 5)
                                        <td class="bg-danger">{{ $device->deviceStatus->name }}</td>
                                    @endif
                                    <td>{{ $device->deviceLocation->name }}</td>
                                    <td>{{ $device->description }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- {!! $devices->render() !!} --}}
    {{-- Modals --}}
        <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="deleteModalLabel">
                            Confirm
                        </h4>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">
                            Are you sure you want to delete this device?
                        </p>
                    </div>
                    <div class="modal-footer">
                        {!! Form::open(['method' => 'DELETE', 'id' => 'deleteform']) !!}
                            {!! Form::input('button', 'close', 'Close', ['data-dismiss' => 'modal', 'class' => 'btn btn-default']) !!}

                            {!! Form::submit('Confirm', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            </div>
            <div class="modal fade" id="editstatusmodal" tabindex="-1" role="dialog" aria-labelledby="editStatusLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        {!! Form::open(['id' => 'editstatusform']) !!}
                        
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="editStatusLabel">
                                    Change Status
                                </h4>
                            </div>
                            <div class="modal-body">
                                <p class="text-center">
                                    Select new Status
                                </p>
                                
                                    {{-- Select control --}}
                                    <div class="form-group">
                                        {!! Form::select('status_id', $deviceStatus->lists('name', 'id'), null, ['class' => 'form-control', 'id' => 'editstatusselect']) !!}
                                    </div>
                                
                            </div>
                            <div class="modal-footer">
                                {!! Form::input('button', 'close', 'Close', ['data-dismiss' => 'modal', 'class' => 'btn btn-default']) !!}
                                {!! Form::submit('Confirm', ['class' => 'btn btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

    </div>

@stop

@section('footer')
    @include('master._footer')
    @include('master._permission_info_modal')
@stop
