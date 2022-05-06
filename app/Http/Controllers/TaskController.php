<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Task::class);
    }

    private function getTaskOptions()
    {
        $userOptinons = User::all()->pluck('name', 'id')->prepend('-------', null)->toArray();
        $statusOptions = TaskStatus::all()->pluck('name', 'id')->toArray();
        $labelOptions = Label::all()->pluck('name', 'id')->toArray();

        return [$userOptinons, $statusOptions, $labelOptions];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();

        return view('task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task();
        [$userOptinons, $statusOptions, $labelOptions] = $this->getTaskOptions();

        return view('task.create', compact('task', 'userOptinons', 'statusOptions', 'labelOptions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'status_id' => 'required',
        ]);

        $task = new Task($request->all());
        $task->created_by_id = Auth::id();
        $task->save();
        $task->labels()->sync($request->labels);

        flash(__('alerts.task.created'))->success();

        return redirect()->route('tasks.show', $task);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        [$userOptinons, $statusOptions, $labelOptions] = $this->getTaskOptions();

        return view('task.edit', compact('task', 'userOptinons', 'statusOptions', 'labelOptions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        $task->labels()->sync($request->labels);

        flash(__('alerts.task.updated'))->success();

        return redirect()->route('tasks.edit', $task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->labels()->detach();
        $task->delete();

        flash(__('alerts.task.deleted'))->success();

        return redirect()->route('tasks.index');
    }
}
