{{ Form::label('name', __('views.name')) }}
{{ Form::text('name', null, ['class' => 'form-control' . ($errors->get('name') ? ' is-invalid' : ''), 'required' => true]) }}
@error('name')
    <div class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </div>
@enderror
{{ Form::label('description', __('views.description')) }}
{{ Form::textarea('description', null, ['class' => 'form-control' . ($errors->get('description') ? ' is-invalid' : ''), 'required' => true]) }}
@error('description')
    <div class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </div>
@enderror
