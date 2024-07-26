<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Endereco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnderecoController extends Controller
{

    public function index()
    {
        $alunosContatos = DB::select("select
        alunos.id,
        alunos.situacao,
        alunos.codigo,
        alunos.primeiroNome,
        alunos.sobrenome,
        alunos.nascimento,
        alunos.situacao,
        enderecos.id,
        enderecos.rua,
        enderecos.numero,
        enderecos.bairro,
        enderecos.cep,
        enderecos.cidade,
        enderecos.estado,
        enderecos.complemento
       FROM enderecos
       left JOIN alunos
       ON enderecos.aluno_id = alunos.id");

       $total = Endereco::count();
       $navegacao = DB::table('enderecos')->paginate(20);

       return view('endereco.index',compact('alunosContatos','total','navegacao'));
    }


    public function create()
    {
        $estados = array('SP','MT','RG');

        $possuiEndereco = DB::table('enderecos')
                ->select(DB::raw(1))
                ->whereColumn('alunos.id', 'enderecos.aluno_id');

        $naoPossuiEndereco = DB::table('alunos')
                    ->whereNotExists($possuiEndereco)
                    ->where('situacao',1)
                    ->get();

        return view('endereco.create',compact('naoPossuiEndereco','estados'));
    }


    public function store(Request $endereco)
    {
        try {
            $endereco = Endereco::create([
               'rua' =>strtoupper($endereco->rua),
               'numero' => strtoupper($endereco->numero),
               'bairro' => strtoupper($endereco->bairro),
               'cep' => strtoupper($endereco->cep),
               'cidade' => strtoupper($endereco->cidade),
               'estado' => strtoupper($endereco->estado),
               'complemento' => strtoupper($endereco->complemento),
               'aluno_id' => $endereco->encontrados,

            ]);


            return redirect()->route('contato.create')->with('success', 'Contato cadastrado com sucesso');

        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Contato não foi cadastrado');
        }
    }


    public function show(Endereco $endereco)
    {
        //
    }


    public function edit(Endereco $endereco)
    {
        $estados = array('SP','MT','RG');

         //somente que possuem endereço
         $possuiEndereco = DB::table('enderecos')
         ->select(DB::raw(1))
         ->whereColumn('alunos.id', 'enderecos.aluno_id');

 $possuiEnderecoCadastrado = DB::table('alunos')
             ->whereExists($possuiEndereco)
             ->where('situacao',1)
             ->get();

             return view('endereco.edit',compact('possuiEnderecoCadastrado','endereco','estados'));
    }


    public function update(Request $request, Endereco $endereco)
    {
        try {
            $endereco->update([
               'rua' => strtoupper($request->rua),
               'numero' => strtoupper($request->numero),
               'bairro' => strtoupper($request->bairro),
               'cep' => strtoupper($request->cep),
               'cidade' => strtoupper($request->cidade),
               'estado' => strtoupper($request->estado),
               'complemento' => strtoupper($request->complemento),

            ]);
            return redirect()->route('endereco.index')->with('success', 'Os dados informadoss do endereço foram alterados com sucesso !!!');


        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Os dados de endereço não foram alterados');
        }
    }


    public function destroy(Endereco $endereco)
    {
        Endereco::findOrFail($endereco->id)->delete();
        return redirect()-> route('endereco.index')-> with('success', 'Endereço excluído com sucesso');
    }
}
