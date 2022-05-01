@extends('layouts.app')

@section('main')
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 col-md-10 col-lg-8 mx-auto border rounded-3 bg-light p-5">
                <h1 class="display-3">Менеджер Задач</h1>
                {{ json_encode($items) }}
            </div>
        </div>
    </div>
@endsection
