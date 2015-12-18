@extends('master.layout')
@section('content')

    @include('master._navbar', ['page' => 'manage_devices'])

    <div class="container">
        <div class="el-container table-cont">
            @include('master._sortnavbar')
            <h1 class="page-header">
                Content not found.
            </h1>
        </div>
    </div>

@stop