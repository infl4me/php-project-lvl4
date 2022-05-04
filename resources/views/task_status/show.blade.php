@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <h1 class="h1 mb-5">Статус: {{ $taskStatus->name }}</h1>
            </div>
        </div>
    </div>
@endsection
