<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller {

    //
    public function index() {

//    $tasks = DB::table('tasks')->latest()->get(); DB Query Builder
        $tasks = Task::all(); // Eloquent
        return view('tasks.index', compact('tasks'));
    }

    public function show(Task $task) {
//        $task=Task::find($id); 
        //Route Modeling, ensure that the wildcard and the variable name is the same
//        return $task;
        return view('tasks.show',compact('task'));
    }

}
