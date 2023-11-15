<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TarefaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       /* if (auth()->check()) { // verifica se o usuário esta autenticado
            $id = auth()->user()->id;
            $nome = auth()->user()->name;
            $email = auth()->user()->email;

            return "ID: $id | Nome: $nome | Email: $email";
        } else {
            return 'Voce nao esta logado no sistema';
        }
       */

        if (Auth::check()) { // verifica se o usuário esta autenticado
            $id = Auth::user()->id;
            $nome = Auth::user()->name;
            $email = Auth::user()->email;

            return "ID: $id | Nome: $nome | Email: $email";
        } else {
            return 'Voce nao esta logado no sistema';
        }
        return 'Chegamos aqui';
    }

    public function create()
    {
        return view('tarefa.create');
    }

    public function store(Request $request)
    {
        $tarefa = Tarefa::create($request->all());
        return redirect()->route('tarefa.show', ['tarefa' => $tarefa->id]);
    }

    public function show(Tarefa $tarefa)
    {
        //
    }


    public function edit(Tarefa $tarefa)
    {
        //
    }


    public function update(Request $request, Tarefa $tarefa)
    {
        //
    }

    public function destroy(Tarefa $tarefa)
    {
        //
    }
}
