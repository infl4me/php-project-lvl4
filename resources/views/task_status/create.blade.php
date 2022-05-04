@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <h1 class="h1 mb-5">{{ __('views.create_status') }}</h1>

                {{ Form::model($taskStatus, ['route' => ['task_statuses.store'], 'method' => 'POST']) }}
                <div class="form-group mb-5 w-50">
                    {{ Form::label('name', __('views.name')) }}
                    {{ Form::text('name', '', ['class' => 'form-control' . ($errors->get('name') ? ' is-invalid' : ''), 'required' => true]) }}
                    @error('name')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    {{ Form::submit(__('views.create'), ['class' => 'btn btn-primary mt-3']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
