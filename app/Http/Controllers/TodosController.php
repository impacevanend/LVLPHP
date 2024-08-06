<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{
    /**
     * index para mostrar todos las tareas
     * store para guardar una tarea
     * update para actualizar una tarea
     * destroy para eliminar una tarea
     * edit para mostrar el formulario de edición.
     */

     public function store(Request $request){
        $request->validate([
            'title' => 'required|min:3'
        ]);
        $todo = new Todo();
        $todo->title = $request->title;
        $todo->save();

        return redirect()->route('todos')->with('success', 'Tarea creada correctamente');
     }

     public function index(){
        $todos = Todo::all();

        return view('todos.index', ['todos' => $todos]);
    }

     public function show($id){
        $todo = Todo::find($id);
        return view('todos.show', ['todos' => $todo]);
    }
     public function update(){
        $todos = Todo::all();

        return view('todos.index', ['todos' => $todos]);
    }
     public function destroy(){
        $todos = Todo::all();

        return view('todos.index', ['todos' => $todos]);
    }

}
