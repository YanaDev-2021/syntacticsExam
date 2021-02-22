<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Controllers\Controller as Controller;

class TaskController extends Controller
{
    public function index(Request $request) {
        return Task::all();
    }

    public function search($search) {
        return Task::where('first_name', $search)->get();
    }

    public function store(Request $request) {
        return Task::create($request->all());
    }

    public function update(Request $request, $id) {
        $tasks = Task::findOrFail($id);
        $tasks->update($request->all());
        return $tasks;
    }

    public function delete($id) {
        $tasks = Task::findOrFail($id);
        $tasks->delete();
        return 204;
    }
}
