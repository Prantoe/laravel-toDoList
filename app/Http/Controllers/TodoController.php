<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todo = Todo::all();

        return view('home', ['todo' => $todo]);
    }

    public function tambah()
    {
        return view('todo_tambah');
    }

    public function simpan(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect('/home')->with('message', 'data created');
    }

    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('todo_edit', ['todo' => $todo]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            // 'status' => 'required'
        ]);

        $todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->description = $request->description;
        // $todo->status = $request->status;
        $todo->save();

        return redirect('/home')->with('message', 'data updated');
    }

    public function delete($id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        return redirect('/home');
    }

    public function complete(Todo $todo)
    {
        $todo->update(['status' => 1]);
        return redirect()->back()->with('message', 'Task Completed');
    }

    public function incomplete(Todo $todo)
    {
        $todo->update(['status' => 0]);
        return redirect()->back()->with('message', 'Task incomplete');
    }
}
