<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\TodoList;

class TodoListController extends Controller
{

    public function index()
    {
        return view('welcome', ['taskItems' => TodoList::all()]);
    }

    public function completeTask($id)
    {
        $taskItem = TodoList::find($id);
        $taskItem->is_complete = 'Yes';
        $taskItem->save();
        return redirect('/');
    }

    public function incompleteTask($id)
    {
        $taskItem = TodoList::find($id);
        $taskItem->is_complete = 'No';
        $taskItem->save();
        return redirect('/');
    }

    public function deleteTask($id)
    {
        DB::delete('delete from todolist where id = ?', [$id]);
        return redirect('/');
    }

    public function uploadTask(Request $request)
    {
        $newTodoTask = new TodoList;
        $newTodoTask->taskname = $request->taskItem;
        $newTodoTask->is_complete = 'No';
        $newTodoTask->save();
        return redirect('/');
    }
}
