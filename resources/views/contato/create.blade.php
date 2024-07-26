    @extends('adminlte::page')

    @section('title', 'Dashboard')

    @section('content_header')

    @stop

    @section('content')
    <div class="container">
<br><h5>Cadastrar Novo Contato</h5><br>
        <form action="{{ route('contato.store')}}" method="POST">
            @csrf

        <div class="row">
            <div class="col">
                <label for="encontrados">ALUNOS QUE NÃO POSSUEM CONTATO CADASTRADO AINDA</label>
                <select  id="encontrados" name="encontrados" class="form-control">
                    @foreach ($naoPossuiContato as $item)
                    <option value={{ $item->id }}>
                         {{ $item->primeiroNome }} {{ $item->sobrenome }} </option>
                    @endforeach
                </select>
            </div>
            </br></br>
        </div>
    </BR>
<div class="row">
    <div class="col-md">
                <label for="celular">CELULAR ALUNO</label>
                     <input type="number"  id="celular" name="celular" class="form-control"  ></br>
    </div>
    <div class="col-md">
        <label for="emailPessoal">EMAIL PESSOAL DO ALUNO</label>
             <input type="email"  id="emailPessoal" name="emailPessoal" class="form-control"  ></br>
</div>
<div class="col-md">
    <label for="emailInstitucional">EMAIL INSTITUCIONAL DO ALUNO</label>
         <input type="email"  id="emailInstitucional" name="emailInstitucional" class="form-control"  ></br>
</div>
</div>
<div class="row">
    <div class="col">
        <button type="submit" class="btn btn-primary"> <i class="fa fa-check" aria-hidden="true"></i> Gravar</button>
        <a href="{{ route('contato.index') }}" type="submit" class="btn btn-dark"> <i class="fa fa-reply" aria-hidden="true"></i> Cancelar</a>
    </div>
        </div>



            <x-alert />
        </form>

    @stop

    @section('css')
    @stop

    @section('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11">

         </script>
    @stop

