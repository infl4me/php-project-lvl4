@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <h1 class="h1 mb-4">{{ __('views.statuses') }}</h1>

                @can('create', App\Models\TaskStatus::class)
                    <a href="{{ route('task_statuses.create') }}" class="btn btn-primary">
                        {{ __('views.create_status') }}</a>
                @endcan

                <div class="table-responsive mt-2">
                    <table class="table table-bordered table-hover text-nowrap">
                        <tbody>
                            <tr>
                                <th>{{ __('views.id') }}</th>
                                <th>{{ __('views.name') }}</th>
                                <th>{{ __('views.created_at') }}</th>
                                <th>{{ __('views.actions') }}</th>
                            </tr>
                            @foreach ($taskStatuses as $taskStatus)
                                <tr>
                                    <td>{{ $taskStatus->id }}</td>
                                    <td>{{ $taskStatus->name }}</td>
                                    <td>{{ $taskStatus->created_at->format('d.m.Y') }}</td>
                                    <td>
                                        @can('delete', $taskStatus)
                                            <a class="text-danger text-decoration-none"
                                                href="{{ route('task_statuses.destroy', $taskStatus) }}"
                                                data-confirm="{{ __('views.delete_status_confirm') }}" data-method="delete">
                                                {{ __('views.delete') }}</a>
                                        @endcan
                                        @can('update', $taskStatus)
                                            <a class="text-decoration-none"
                                                href="{{ route('task_statuses.edit', $taskStatus) }}">
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
