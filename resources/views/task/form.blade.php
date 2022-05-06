<div class="form-group mb-3">
    {{ Form::label('name', __('views.name')) }}
    {{ Form::text('name', null, ['class' => 'form-control' . ($errors->get('name') ? ' is-invalid' : ''), 'required' => true]) }}
    @error('name')
        <div class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
</div>
<div class="form-group mb-3">
    {{ Form::label('description', __('views.description')) }}
    {{ Form::textarea('description', null, ['class' => 'form-control' . ($errors->get('description') ? ' is-invalid' : '')]) }}
    @error('description')
        <div class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
</div>
<div class="form-group mb-3">
    {{ Form::label('status_id', __('views.status')) }}
    {{ Form::select('status_id', $statusOptions, null, ['class' => 'form-control' . ($errors->get('status_id') ? ' is-invalid' : ''), 'required' => true]) }}
    @error('status_id')
        <div class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
</div>
<div class="form-group mb-3">
    {{ Form::label('assigned_to_id', __('views.assignee')) }}
    {{ Form::select('assigned_to_id', $userOptinons, null, ['class' => 'form-control' . ($errors->get('assigned_to_id') ? ' is-invalid' : '')]) }}
    @error('assigned_to_id')
        <div class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
</div>
<div class="form-group mb-3">
    {{ Form::label('labels[]', __('views.labels')) }}
    {{ Form::select('labels[]', $labelOptions, null, ['class' => 'form-control' . ($errors->get('labels[]') ? ' is-invalid' : ''), 'multiple' => true]) }}
    @error('labels[]')
        <div class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
</div>
