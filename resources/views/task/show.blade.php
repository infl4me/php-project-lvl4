@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <h1 class="h1 mb-4">{{ $task->name }}</h1>
                <p>{{ __('views.status') . ': ' }}{{ $task->status->name }}</p>
                <p>{{ __('views.description') . ': ' }}{{ $task->description }}</p>
                <p>{{ __('views.assignee') . ': ' }}{{ $task->assignee ? $task->assignee->name : '—' }}</p>
                <p>
                    {{ __('views.labels') . ': ' }}
                <ul>
                    @foreach ($task->labels as $label)
                        <li>{{ $label->name }}</li>
                    @endforeach
                </ul>
                </p>
                <p>{{ __('views.created_by') . ': ' }}{{ $task->creator->name }}</p>
                <p>{{ __('views.created_at') . ': ' }}{{ $task->created_at }}</p>
                <p>{{ __('views.updated_at') . ': ' }}{{ $task->updated_at }}</p>
                <a class="btn btn-primary" href="{{ route('tasks.edit', $task) }}">
                    {{ __('views.edit') }}</a>
                {{-- <p>{{__('views.tags') . ': '}}{{$task->tags}}</p> --}}
            </div>
        </div>
    </div>
@endsection
