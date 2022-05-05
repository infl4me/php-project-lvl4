<?php

namespace App\Http\Controllers;

use App\Models\TaskStatus;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taskStatuses = TaskStatus::all();

        return view('task_status.index', compact('taskStatuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $taskStatus = new TaskStatus();

        return view('task_status.create', compact('taskStatus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', TaskStatus::class);

        $this->validate($request, [
            'name' => 'required|unique:task_statuses',
        ]);

        $taskStatus = new TaskStatus($request->all());
        $taskStatus->save();

        flash(__('alerts.status.created'))->success();

        return redirect()->route('task_statuses.show', $taskStatus);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $taskStatus = TaskStatus::findOrFail($id);

        return view('task_status.show', compact('taskStatus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taskStatus = TaskStatus::findOrFail($id);

        return view('task_status.edit', compact('taskStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $taskStatus = TaskStatus::findOrFail($id);
        $this->authorize('update', [TaskStatus::class, $taskStatus]);
        $taskStatus->update($request->all());

        flash(__('alerts.status.updated'))->success();

        return redirect()->route('task_statuses.edit', $taskStatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $taskStatus = TaskStatus::findOrFail($id);
        $this->authorize('delete', [TaskStatus::class, $taskStatus]);
        $taskStatus->delete();

        flash(__('alerts.status.deleted'))->success();

        return redirect()->route('task_statuses.index');
    }
}
