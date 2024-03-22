<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\Priority;
use App\Models\TaskStatus;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $role = $user->role->id;

        $tasks = Task::with(['priority', 'taskStatus'])->orderBy('created_at', 'DESC');
        if ($role == 2) {
            $tasks = $tasks->where('reporter_id', $user->id);
        } else if ($role == 3) {
            $tasks = $tasks->where('assignee_id', $user->id);
        }

        $query = null;
        if ($request->has('search') && !empty($request->search)) {
            $query = $request->search;
            // dd($query);
            $tasks = $tasks->where(function($q) use($query) {
                $q->where('title', 'LIKE', '%'.$query.'%')
                ->orWhere('description', 'LIKE', '%'.$query.'%');
            });
        }
        $tasks = !empty($query) ? $tasks->paginate(10)->appends(['search'=>$query]) : $tasks->paginate(10);

        return response()->json($tasks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $role = $user->role->id;

        if ($role > 2) {
            return response()->json([
                'msg'   => 'Your role is not allowed!',
                'code'  => 401
            ]);
        }

        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->has('description') && !empty($request->description) ? $request->description : null;
        $task->due_date = $request->has('due_date') && !empty($request->due_date) ? $request->due_date : null;
        $task->priority_id = $request->has('priority_id') && !empty($request->priority_id) ? $request->priority_id : 1;
        $task->status_id = $request->has('status_id') && !empty($request->status_id) ? $request->status_id : 1;
        $task->reporter_id = $user->id;
        $task->assignee_id = $request->assignee_id;
        $task->save();

        return response()->json($task->load(['priority', 'taskStatus']));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::with(['priority', 'taskStatus'])->where('id', $id)->first();
        return response()->json($task);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::find($id);
        $task->title = $request->title;
        $task->description = $request->has('description') && !empty($request->description) ? $request->description : null;
        $task->due_date = $request->has('due_date') && !empty($request->due_date) ? $request->due_date : null;
        $task->priority_id = $request->has('priority_id') && !empty($request->priority_id) ? $request->priority_id : 1;
        $task->status_id = $request->has('status_id') && !empty($request->status_id) ? $request->status_id : 1;
        $task->assignee_id = $request->assignee_id;
        $task->save();

        return response()->json($task->load(['priority', 'taskStatus']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();
        $role = $user->role->id;

        if ($role > 2) {
            return response()->json([
                'msg'   => 'Your role is not allowed!',
                'code'  => 401
            ]);
        }

        $task = Task::find($id);
        $task->delete();

        return response()->json(['msg' => 'Task is deleted!']);
    }

}
