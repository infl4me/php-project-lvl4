@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <h1 class="h1 mb-4">{{ __('views.tasks') }}</h1>

                @can('create', App\Models\Task::class)
                    <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                        {{ __('views.create_task') }}</a>
                @endcan

                <div class="table-responsive mt-2">
                    <table class="table table-bordered table-hover text-nowrap">
                        <tbody>
                            <tr>
                                <th>{{ __('views.id') }}</th>
                                <th>{{ __('views.status') }}</th>
                                <th>{{ __('views.name') }}</th>
                                <th>{{ __('views.author') }}</th>
                                <th>{{ __('views.assignee') }}</th>
                                <th>{{ __('views.created_at') }}</th>
                                <th>{{ __('views.actions') }}</th>
                            </tr>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->id }}</td>
                                    <td>{{ $task->status->name }}</td>
                                    <td><a class="text-decoration-none" href="{{ route('tasks.show', $task) }}">
                                            {{ $task->name }}</a></td>
                                    <td>{{ $task->creator->name }}</td>
                                    <td>{{ optional($task->assignee)->name }}</td>
                                    <td>{{ $task->created_at }}</td>
                                    <td>
                                        @can('delete', $task)
                                            <a class="text-danger text-decoration-none"
                                                href="{{ route('tasks.destroy', $task) }}"
                                                data-confirm="{{ __('views.delete_task_confirm') }}" data-method="delete">
                                                {{ __('views.delete') }}</a>
                                        @endcan
                                        @can('update', $task)
                                            <a class="text-decoration-none" href="{{ route('tasks.edit', $task) }}">
                                                {{ __('views.edit') }}</a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
