<?php

namespace App\Http\Controllers;

use App\Mail\NovaTarefaMail;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $dados = $request->all();
        $dados['user_id'] = auth()->user()->id;
        $tarefa = Tarefa::create($dados);

        $destino = auth()->user()->email;
        Mail::to($destino)->send(new NovaTarefaMail($tarefa));
        return redirect()->route('tarefa.show', ['tarefa' => $tarefa->id]);
    }

    public function show(Tarefa $tarefa)
    {
        return view('tarefa.show', ['tarefa' => $tarefa]);
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
