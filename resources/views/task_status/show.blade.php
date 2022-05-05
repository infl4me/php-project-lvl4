@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <h1 class="h1 mb-4">Статус: {{ $taskStatus->name }}</h1>
                <a class="btn btn-primary" href="{{ route('task_statuses.edit', $taskStatus) }}">
                    {{ __('views.edit') }}</a>
            </div>
        </div>
    </div>
@endsection
