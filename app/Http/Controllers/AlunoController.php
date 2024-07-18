<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Sala;
use App\Models\Aluno;
use Illuminate\Http\Request;
use App\Http\Requests\AlunoRequest;

class AlunoController extends Controller
{

    public function index(Request $request)
    {

        $alunos = Aluno::when ($request->has('primeiroNome'), function($whenQuery) use ($request){
            $whenQuery->where('primeiroNome', 'like','%' . $request->primeiroNome . '%');
        })
        ->orderBy('primeiroNome')->paginate(5);

        return view('alunoBasico.index', [
            'alunos'=> $alunos,
            'primeiroNome'=> $request-> primeiroNome,
        ]);
    }


    public function create()
    {
        $salas = Sala::all();
        return view('alunoBasico.create',['salas' => $salas]);
    }


    public function store(AlunoRequest $aluno)
    {
        $aluno->validated();

       // $data = \DateTime:: createFromFormat ('d/m/Y', $aluno->nascimento);

        try {
            $aluno = Aluno::create([
               'codigo' => $aluno->codigo,
               'primeiroNome' => strtoupper($aluno->primeiroNome),
               'sobrenome' => strtoupper($aluno->sobrenome),
               'nascimento' => $aluno->nascimento,
               'sala' => $aluno->sala,
               'situacao' => $aluno->situacao
            ]);


            return redirect()->route('aluno.basico.create')->with('success', 'Aluno cadastrado com sucesso');

        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Aluno não cadastrado');
        }
    }


    public function show(Aluno $aluno)
    {

    }


    public function edit(Aluno $aluno)
    {
        $salas = Sala::all();
        return view('alunoBasico.edit', ['aluno' => $aluno, 'salas'=>$salas]);
    }


    public function update(AlunoRequest $request, Aluno $aluno)
    {
        $request->validated();

        try {
            $aluno->update([
               'codigo' => $request->codigo,
               'primeiroNome' => strtoupper($request->primeiroNome),
               'sobrenome' => strtoupper($request->sobrenome),
               'nascimento' => $request->nascimento,
               'sala' => $request->sala,
               'situacao' => $request->situacao
            ]);
            return redirect()->route('aluno.basico.index')->with('success', 'Aluno foi alterado para ' . $request->primeiroNome . ' com sucesso !!!');


        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Aluno não alterado');
        }
    }

    public function destroy(Aluno $aluno)
    {
        Aluno::findOrFail($aluno->id)->delete();
        return redirect()-> route('aluno.basico.index')-> with('success', 'Aluno(a) excluído(a) com sucesso');
    }
}
