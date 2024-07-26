    @extends('adminlte::page')
    @section('title', 'Dashboard')
    @section('content_header')
    @stop

    @section('content')
    <div class="container">
<br><h5>Cadastrar Novo Endereço</h5><br>
        <form action="{{ route('endereco.store')}}" method="POST">
            @csrf

        <div class="row">
            <div class="col">
                <label for="encontrados">ALUNOS QUE NÃO POSSUEM ENDEREÇO CADASTRADO AINDA</label>
                <select  id="encontrados" name="encontrados" class="form-control">
                    @foreach ($naoPossuiEndereco as $item)
                    <option value={{ $item->id }}>
                         {{ $item->primeiroNome }} {{ $item->sobrenome }} </option>
                    @endforeach
                </select>
            </div>
            </br></br>
        </div>
    </BR>
<div class="row">
    <div class="col-md-5">
                <label for="rua">RUA</label>
                     <input type="text"  id="rua" name="rua" class="form-control"  ></br>
    </div>
    <div class="col-md-1">
        <label for="numero">NÚMERO</label>
             <input type="text"  id="numero" name="numero" class="form-control"  ></br>
</div>
<div class="col-md-4">
    <label for="bairro">BAIRRO</label>
         <input type="text"  id="bairro" name="bairro" class="form-control"  ></br>
</div>
<div class="col-md-2">
    <label for="cep">CEP</label>
         <input type="text"  id="cep" name="cep" class="form-control"  ></br>
</div>
</div>

<div class="row">
    <div class="col-md-3">
                <label for="cidade">CIDADE</label>
                     <input type="text"  id="cidade" name="cidade" class="form-control"  ></br>
    </div>
    <div class="col-md-1">
        <label for="estado">ESTADO</label>
        <select  id="estado" name="estado" class="form-control">
            @foreach ($estados as $item)
            <option value="{{ $item }}">

                 {{ $item }}</option>
            @endforeach
        </select></br>
</div>
<div class="col-md-8">
    <label for="complemento">COMPLEMENTO</label>
         <input type="text"  id="complemento" name="complemento" class="form-control"  ></br>
</div>
</div>


<div class="row">
    <div class="col">
        <button type="submit" class="btn btn-primary"> <i class="fa fa-check" aria-hidden="true"></i> Gravar</button>
        <a href="{{ route('endereco.index') }}" type="submit" class="btn btn-dark"> <i class="fa fa-reply" aria-hidden="true"></i> Cancelar</a>
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

