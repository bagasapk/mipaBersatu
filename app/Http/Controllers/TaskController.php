<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return Task::all();
    }

    public function add()
    {
        return view('', compact('task'));
    }

    public function store($id)
    {
        $task = Task::find($id);
        return view('')->with(array('task' => $task));
    }

    public function save(Request $request)
    {
        $task = new Task();
        $task->title = $request->title;
        $task->end_date = $request->end_date;
        $task->point = $request->point;
        $task->description = $request->description;
        $task->status = $request->default('assigned');
        $task->save();
        return redirect('');
    }
}
