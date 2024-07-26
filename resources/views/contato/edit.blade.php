    @extends('adminlte::page')
    @section('title', 'Dashboard')
    @section('content_header')
    @stop

    @section('content')
    <div class="container">
    <br><h5>Alterar Dados de Contato</h5><br>

    <div class="row">
        <input type="text" hidden id="id" name="id" value="{{ $contato->id }}">
        {{ $contato->aluno->codigo }} - {{ $contato->aluno->primeiroNome }} {{ $contato->aluno->sobrenome }}
    </br></br>
</div>

    <form action="{{ route('contato.update',['contato'=>$contato]) }}" method="POST">
            @csrf
            @method('PUT')

    <div class="row">
        <div class="col">
            <input type="number"  id="celular" name="celular" class="form-control"  value={{ old('celular', $contato->celular) }} ></br>
        </div>
        <div class="col">
            <input type="text"  id="emailPessoal" name="emailPessoal" class="form-control"  value={{  old('emailPessoal', $contato->emailPessoa) }} ></br>
        </div>
        <div class="col">
            <input type="text"  id="emailInstitucional" name="emailInstitucional" class="form-control"  value={{  old('emailInstitucional', $contato->emailInstituciona) }} ></br>
        </div>

    </div>
    <div class="row">
        <div class="col-md">
            <button type="submit" class="btn btn-primary"> <i class="fa fa-check" aria-hidden="true"></i> Gravar</button>
            <a href="{{ route('contato.index') }}" type="submit" class="btn btn-dark"> <i class="fa fa-reply" aria-hidden="true"></i> Cancelar</a>
        </div>

        <x-alert />
    </form>
</div>
        </div>


    @stop

    @section('css')
    @stop

    @section('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11">

         </script>
    @stop

