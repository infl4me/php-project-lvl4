@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <h1 class="h1 mb-4">{{ __('views.labels') }}</h1>

                @can('create', App\Models\Label::class)
                    <a href="{{ route('labels.create') }}" class="btn btn-primary">
                        {{ __('views.create_label') }}</a>
                @endcan

                <div class="table-responsive mt-2">
                    <table class="table table-bordered table-hover text-nowrap">
                        <tbody>
                            <tr>
                                <th>{{ __('views.id') }}</th>
                                <th>{{ __('views.name') }}</th>
                                <th>{{ __('views.description') }}</th>
                                <th>{{ __('views.created_at') }}</th>
                                <th>{{ __('views.actions') }}</th>
                            </tr>
                            @foreach ($labels as $label)
                                <tr>
                                    <td>{{ $label->id }}</td>
                                    <td><a class="text-decoration-none" href="{{ route('labels.show', $label) }}">
                                            {{ $label->name }}</a></td>
                                    <td>{{ $label->description }}</td>
                                    <td>{{ $label->created_at->format('d.m.Y') }}</td>
                                    <td>
                                        @can('delete', $label)
                                            <a class="text-danger text-decoration-none"
                                                href="{{ route('labels.destroy', $label) }}"
                                                data-confirm="{{ __('views.delete_label_confirm') }}" data-method="delete">
                                                {{ __('views.delete') }}</a>
                                        @endcan
                                        @can('update', $label)
                                            <a class="text-decoration-none" href="{{ route('labels.edit', $label) }}">
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
