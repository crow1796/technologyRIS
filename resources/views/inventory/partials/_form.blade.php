<h1 class="page-header text-center">
    {{ $pageHeader }}
</h1>
<div class="form-group">
    {!! Form::label('name', 'Device Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control reminder-popover', 'placeholder' => 'Device Name', 'data-toggle' => 'popover', 'title' => 'Reminder', 'data-content' => '* Must be at least 2 characters.', 'data-placement' => 'top']) !!}
</div>
<div class="form-group">
    {!! Form::label('model', 'Device Model:') !!}
    {!! Form::text('model', null, ['class' => 'form-control reminder-popover', 'placeholder' => 'Device Model', 'data-toggle' => 'popover', 'title' => 'Reminder', 'data-content' => '* Must be at least 2 characters.', 'data-placement' => 'top']) !!}
</div>
<div class="form-group">
    {!! Form::label('brand', 'Device Brand:') !!}
    {!! Form::text('brand', null, ['class' => 'form-control reminder-popover', 'placeholder' => 'Device Brand', 'data-toggle' => 'popover', 'title' => 'Reminder', 'data-content' => '* Must be at least 2 characters.', 'data-placement' => 'top']) !!}
</div>
<div class="form-group">
    {!! Form::label('serial', 'Device Serial:') !!}
    {!! Form::text('serial', null, ['class' => 'form-control reminder-popover', 'placeholder' => 'Device Serial', 'data-toggle' => 'popover', 'title' => 'Reminder', 'data-content' => '* Must be at least 5 characters.', 'data-placement' => 'top']) !!}
</div>
<div class="form-group">
    {!! Form::label('type_id', 'Device Type:') !!}
    {!! Form::select('type_id', $deviceTypes, null, ['class' => 'form-control myselect']) !!}
</div>
<div class="form-group">
    {!! Form::label('location_id', 'Device Location:') !!}
    {!! Form::select('location_id', $deviceLocations, null, ['class' => 'form-control myselect']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Device Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control reminder-popover', 'rows' => '5', 'placeholder' => 'Description', 'data-toggle' => 'popover', 'title' => 'Reminder', 'data-content' => '* Must be at least 5 characters.', 'data-placement' => 'top']) !!}
</div>
<div class="form-group text-center">
    {!! Form::reset('Reset', ['class' => 'btn btn-md btn-warning']) !!}
    {!! Form::submit($buttonText, ['class' => 'btn btn-md btn-primary']) !!}
</div>