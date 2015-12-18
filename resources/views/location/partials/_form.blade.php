<div class="form-group">
	{!! Form::label('name', 'Location Name:') !!}
	{!! Form::input('text', 'name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group text-center">
	{!! Form::reset('RESET', ['class' => 'btn btn-md btn-warning']) !!}
	{!! Form::submit($btnText, ['class' => 'btn btn-md btn-primary']) !!}
</div>