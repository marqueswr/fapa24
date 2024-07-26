<?php

namespace App\Http\Controllers;

use Exception;

use App\Models\Contato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ContatoController extends Controller
{

    public function index(Request $parametro)
    {
        // $alunosContatos = DB::select("select * from contatos join alunos where contatos.aluno_id = alunos.id");
         $alunosContatos = DB::select("select
         alunos.id,
         alunos.situacao,
         alunos.codigo,
         alunos.primeiroNome,
         alunos.sobrenome,
         alunos.nascimento,
         alunos.situacao,
         contatos.id,
         contatos.celular,
         contatos.emailPessoal,
         contatos.emailInstitucional,
         contatos.created_at
        FROM contatos
        left JOIN alunos
        ON contatos.aluno_id = alunos.id");
        // JOIN salas");
        //  ON contatos.aluno_id = salas.id");


       // $variavel = DB::select("select alunos.id, alunos.sobrenome, contatos.aluno_id from contatos innerJoin alunos on alunos.sobrenome = 'MARQUES'");

       //usar isso aqui para a pesquisa de nomes
       /*  $alunosContatos = DB::table('contatos')
        ->join('alunos','contatos.aluno_id', '=', 'alunos.id')
        ->join('salas','contatos.aluno_id', '=', 'salas.id')
        ->select('salas.gstp','alunos.situacao','alunos.codigo','alunos.primeiroNome','alunos.sobrenome','alunos.nascimento','alunos.situacao','contatos.id','contatos.celular','contatos.emailPessoal','contatos.emailInstitucional','contatos.created_at')
        ->get(); */

        $total = Contato::count();
        $navegacao = DB::table('contatos')->paginate(20);

        // $alunosContatos = Contato::paginate(20);
        return view('contato.index',compact('alunosContatos','total','navegacao'));
    }

    public function create()
    {
        //somente que possuem endereço
        $possuiContato = DB::table('contatos')
                ->select(DB::raw(1))
                ->whereColumn('alunos.id', 'contatos.aluno_id');

        $naoPossuiContato = DB::table('alunos')
                    ->whereNotExists($possuiContato)
                    ->where('situacao',1)
                    // ->where('sobrenome','like','%'. $filtro .'%')
                    ->get();

        return view('contato.create',compact('naoPossuiContato'));
    }


    public function store(Request $contato)
    {

        try {
            $contato = Contato::create([
               'celular' =>strtoupper($contato->celular),
               'emailPessoal' => strtoupper($contato->emailPessoal),
               'emailInstitucional' => strtoupper($contato->emailInstitucional),
               'aluno_id' => $contato->encontrados,

            ]);


            return redirect()->route('contato.create')->with('success', 'Contato cadastrado com sucesso');

        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Contato não foi cadastrado');
        }
    }


    public function show(Contato $contato)
    {

    }


    public function edit(Contato $contato)
    {
        //somente que possuem endereço
        $possuiContato = DB::table('contatos')
                ->select(DB::raw(1))
                ->whereColumn('alunos.id', 'contatos.aluno_id');

        $possuiContatoCadastrado = DB::table('alunos')
                    ->whereExists($possuiContato)
                    ->where('situacao',1)
                    ->get();

                    return view('contato.edit',compact('possuiContatoCadastrado','contato'));
    }


    public function update(Request $request, Contato $contato)
    {

        try {
            $contato->update([
               'celular' => strtoupper($request->celular),
               'emailPessoal' => strtoupper($request->emailPessoal),
               'emailInstitucional' => strtoupper($request->emailInstitucional),

            ]);
            return redirect()->route('contato.index')->with('success', 'Os dados informadoss do contato foram alterados com sucesso !!!');


        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Os dados de contato não foram alterados');
        }
    }


    public function destroy(Contato $contato)
    {
        Contato::findOrFail($contato->id)->delete();
        return redirect()-> route('contato.index')-> with('success', 'Contato excluído com sucesso');
    }
}
