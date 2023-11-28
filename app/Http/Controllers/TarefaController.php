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
        $user_id = auth()->user()->id;
        $tarefa = Tarefa::where('user_id', $user_id)->paginate(2);
        return view('tarefa.index', ['tarefas' => $tarefa]);
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

    public function show(Tarefa $tarefa): string
    {
        return view('tarefa.show', ['tarefa' => $tarefa]);
    }


    public function edit(Tarefa $tarefa)
    {
        $user_id = auth()->user()->id;
        if ($tarefa->user_id == $user_id) {
            return view('tarefa.edit', ['tarefa' => $tarefa]);
        }

        return view('acesso-negado');
    }


    public function update(Request $request, Tarefa $tarefa)
    {
        $user_id = auth()->user()->id;

        if (!$tarefa->user_id == $user_id) {
            return view('acesso-negado');
        }

        $tarefa->update($request->all());
        return redirect()->route('tarefa.show', ['tarefa' => $tarefa->id]);
    }

    public function destroy(Tarefa $tarefa)
    {
        //
    }
}
