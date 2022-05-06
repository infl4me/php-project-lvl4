@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <h1 class="h1 mb-4">{{ __('views.edit_label') }}</h1>
                {{ Form::model($label, ['route' => ['labels.update', $label], 'method' => 'PATCH']) }}
                <div class="form-group mb-5 w-50">
                    @include('label.form')
                    {{ Form::submit(__('views.update'), ['class' => 'btn btn-primary mt-3']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
