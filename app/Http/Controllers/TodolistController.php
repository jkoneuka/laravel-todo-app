<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $date = today()->format('Y-m-d');

        $todos = Todolist::where('finish_date', '>=', $date)->get();
        return view('welcome', [
            'todos' => $todos
        ]);
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

        $attributes = $request->validate([
            'title' => 'required|min:15',
            'description' => 'nullable',
            'finish_date' => 'required',
        ]);

        Todolist::create($attributes);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todolist $todolist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $date = today()->format('Y-m-d');

        $todo = Todolist::findOrFail($id);
        $todos = Todolist::where('finish_date', '>=', $date)->get();

        return view('welcome', [
            'editTodo' => $todo,
            'todos' => $todos,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $todo = Todolist::find($id);

        if($request->editTodo) {

            $todo->update([
                'title' => $request->title,
                'description' => $request->description,
                'finish_date' => $request->finish_date,
            ]);

        } else {

            $todo->update([
                'completed' => true
            ]);
        }

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Todolist::find($id)->delete();

        return redirect('/');
    }
}
