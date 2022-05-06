@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <h1 class="h1 mb-4">{{ $taskStatus->name }}</h1>
                <p>{{ __('views.created_at') . ': ' }}{{ $label->created_at }}</p>
                <p>{{ __('views.updated_at') . ': ' }}{{ $label->updated_at }}</p>
                <a class="btn btn-primary" href="{{ route('task_statuses.edit', $taskStatus) }}">
                    {{ __('views.edit') }}</a>
            </div>
        </div>
    </div>
@endsection
