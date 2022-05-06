{{ Form::open(['route' => ['tasks.index'], 'method' => 'GET']) }}
<div class="row g-1">
    <div class="col">
        {{ Form::select('filter[status_id]', $statusOptions, optional($filter)['status_id'], [
            'class' => 'form-select me-2',
            'placeholder' => __('views.status'),
        ]) }}
    </div>
    <div class="col">
        {{ Form::select('filter[created_by_id]', $userOptions, optional($filter)['created_by_id'], [
            'class' => 'form-select me-2',
            'placeholder' => __('views.author'),
        ]) }}
    </div>
    <div class="col">
        {{ Form::select('filter[assigned_to_id]', $userOptions, optional($filter)['assigned_to_id'], [
            'class' => 'form-select me-2',
            'placeholder' => __('views.assignee'),
        ]) }}
    </div>
    <div class="col">
        {{ Form::submit(__('views.apply'), ['class' => 'btn btn-outline-primary me-2']) }}
    </div>

</div>
{{ Form::close() }}
