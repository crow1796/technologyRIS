@extends('master.layout', ['title' => "Dashboard - TRIS"])

@section('pageheader')
    @include('master._pageheader')
@stop

@section('accordion')
    @include('master._accordion')
@stop

@section('content')
    <div class="row">
        @include('errors.message')
        <h1 class="page-header text-center">Dashboard</h1>

        <div class="row info-row">
            <div class="col-sm-4 text-center">
                <img src="{{ asset('images/stock_icon.png') }}" alt="" class="img-responsive center-block">
                <h2>All Stocks <span class="badge">{{ $deviceRepository->getAll()->count() }}</span></h2>
            </div>{{-- /Col sm 4 --}}

            <div class="col-sm-4 text-center">
                <img src="{{ asset('images/new_icon.png') }}" alt="" class="img-responsive center-block">
                <h2>New Stocks <span class="badge">{{ $deviceRepository->getDeviceStatusRepository()->get(0)->devices()->count() }}</span></h2>
            </div>{{-- /Col sm 4 --}}

            <div class="col-sm-4 text-center">
                <img src="{{ asset('images/damaged_icon.png') }}" alt="" class="img-responsive center-block">
                <h2>Damaged <span class="badge">{{ $deviceRepository->getDeviceStatusRepository()->get(2)->devices()->count() }}</span></h2>
            </div>{{-- /Col sm 4 --}}
        </div>{{-- /Row --}}

        <div class="row info-row">
            <div class="col-sm-4 text-center">
                <img src="{{ asset('images/repaired_icon.png') }}" alt="" class="img-responsive center-block">
                <h2>Repaired <span class="badge">{{ $deviceRepository->getDeviceStatusRepository()->get(3)->devices()->count() }}</span></h2>
            </div>{{-- /Col sm 4 --}}

            <div class="col-sm-4 text-center">
                <img src="{{ asset('images/dumped_icon.png') }}" alt="" class="img-responsive center-block">
                <h2>Dumped <span class="badge">{{ $deviceRepository->getDeviceStatusRepository()->get(4)->devices()->count() }}</span></h2>
            </div>{{-- /Col sm 4 --}}

            <div class="col-sm-4 text-center">
                <img src="{{ asset('images/locations_icon.png') }}" alt="" class="img-responsive center-block">
                <h2>Locations <span class="badge">{{ $locationsCount }}</span></h2>
            </div>{{-- /Col sm 4 --}}
        </div>{{-- /Row --}}
    </div>
@stop

@section('footer')
    @include('master._footer')
    @include('master._permission_info_modal')
@stop