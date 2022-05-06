@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <div class="d-flex mb-4">
                    <h1 class="h1">{{ __('views.tasks') }}</h1>
                </div>


                <div class="d-flex mb-3 justify-content-between">
                    <div class="flex-grow-1">
                        @include('task.filter')
                    </div>

                    <div class="ms-3">
                        @can('create', App\Models\Task::class)
                            <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                                {{ __('views.create_task') }}</a>
                        @endcan
                    </div>
                </div>

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
                                    <td>{{ $task->created_at->format('d.m.Y') }}</td>
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

                <div>
                    {{ $tasks->links('task.pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection
