<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalaRequest;
use Exception;
use Carbon\Carbon;
use App\Models\Sala;
use Illuminate\Http\Request;

class SalaController extends Controller
{

    public function index(Request $request)
    {
        $salas = Sala::when ($request->has('celula'), function($whenQuery) use ($request){
            $whenQuery->where('celula', 'like','%' . $request->celula . '%');
        })
        ->orderBy('celula')->paginate(10);

        return view('sala.index', [
            'salas'=> $salas,
            'celula'=> $request-> celula,
        ]);


    }

    public function create()
    {
        $anocorrente = \DateTime::createFromFormat('d/m/Y', today());
        $ano = date( 'Y' , strtotime(today()));

        $salas = Sala::all();

        $celula = array('EDUCAÇÃO-INFANTIL','ANOS-INICIAIS','ANOS-FINAIS','ENSINO-MÉDIO');
        $periodo = array('MATUTINO','VESPERTINO','INTEGRAL');
        $turma = array('A','B','C','D','E','F','G','H');
        $serie = array('INFANTIL','INFANTIL I','INFANTIL II','INFANTIL III','1º ANO','2º ANO','3º ANO','4º ANO','5º ANO','6º ANO','7º ANO','8º ANO','9º ANO');

        return view('sala.create',[
            'salas' => $salas,
            'ano'=> $ano,
            'celula'=> $celula,
            'periodo'=>$periodo,
            'turma'=>$turma,
            'serie'=>$serie
        ]);
    }


    public function store(SalaRequest $sala)
    {

        try {
            $sala = Sala::create([
               'celula' =>strtoupper($sala->celula),
               'serie' => strtoupper($sala->serie),
               'turma' => strtoupper($sala->turma),
               'turno' => $sala->turno,
               'ano' => $sala->ano,
               'gstp' => strtoupper($sala->celula) . " " . strtoupper($sala->serie) . " " . strtoupper($sala->turma),
               'situacao' => $sala->situacao
            ]);


            return redirect()->route('sala.create')->with('success', 'Sala cadastrada com sucesso');

        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Sala não cadastrada');
        }
    }


    public function show(Sala $sala)
    {
        //
    }


    public function edit(Sala $sala)
    {
        $celula = array('EDUCAÇÃO-INFANTIL','ANOS-INICIAIS','ANOS-FINAIS','ENSINO-MÉDIO');
        $periodo = array('MATUTINO','VESPERTINO','INTEGRAL');
        $turma = array('A','B','C','D','E','F','G','H');
        $serie = array('INFANTIL','INFANTIL I','INFANTIL II','INFANTIL III','1º ANO','2º ANO','3º ANO','4º ANO','5º ANO','6º ANO','7º ANO','8º ANO','9º ANO');

        return view('sala.edit',['celula'=> $celula, 'sala'=>$sala, 'periodo'=>$periodo, 'turma'=>$turma, 'serie'=>$serie]);
    }


    public function update(SalaRequest $request, Sala $sala)
    {


        $request['situacao'] = (!isset($request['situacao']))? 0 : 1;
        $request->validated();

        try {
            $sala->update([
               'celula' => strtoupper($request->celula),
               'serie' => strtoupper($request->serie),
               'turma' => strtoupper($request->turma),
               'turno' => strtoupper($request->turno),
               'ano' => $request->ano,
               'gstp' => strtoupper($request->celula) . " " . strtoupper($request->serie) . " " . strtoupper($request->turma),
               'situacao' => $request->situacao
            ]);
            return redirect()->route('sala.index')->with('success', 'Os dados informadoss da sala foram alterados com sucesso !!!');


        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Sala não alterada');
        }
    }


    public function destroy(Sala $sala)
    {
        Sala::findOrFail($sala->id)->delete();
        return redirect()-> route('sala.index')-> with('success', 'Sala excluída com sucesso');
    }
}
