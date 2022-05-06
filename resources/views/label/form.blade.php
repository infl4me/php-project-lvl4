{{ Form::label('name', __('views.name')) }}
{{ Form::text('name', null, ['class' => 'form-control' . ($errors->get('name') ? ' is-invalid' : '')]) }}
@error('name')
    <div class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </div>
@enderror
{{ Form::label('description', __('views.description')) }}
{{ Form::textarea('description', null, ['class' => 'form-control' . ($errors->get('description') ? ' is-invalid' : '')]) }}
@error('description')
    <div class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </div>
@enderror
