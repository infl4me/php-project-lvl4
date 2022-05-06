{{ Form::label('name', __('views.name')) }}
{{ Form::text('name', null, ['class' => 'form-control' . ($errors->get('name') ? ' is-invalid' : '')]) }}
@error('name')
    <div class="invalid-feedback" role="alert">{{ $message }}</div>
@enderror
