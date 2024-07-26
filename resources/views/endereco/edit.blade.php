    @extends('adminlte::page')
    @section('title', 'Dashboard')
    @section('content_header')
    @stop

    @section('content')
    <div class="container">
    <br><h5>Alterar Dados de Endereço</h5><br>

    <div class="row">
        <input type="text" hidden id="id" name="id" value="{{ $endereco->id }}">
        {{ $endereco->aluno->codigo }} - {{ $endereco->aluno->primeiroNome }} {{ $endereco->aluno->sobrenome }}
    </br></br>
</div>

    <form action="{{ route('endereco.update',['endereco'=>$endereco]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-5">
                            <label for="rua">RUA</label>
                                 <input type="text"  id="rua" name="rua" class="form-control" value="{{ old('rua', $endereco->rua) }}" ></br>
                </div>
                <div class="col-md-1">
                    <label for="numero">NÚMERO</label>
                         <input type="text"  id="numero" name="numero" class="form-control" value="{{ old('numero', $endereco->numero) }}"  ></br>
            </div>
            <div class="col-md-4">
                <label for="bairro">BAIRRO</label>
                     <input type="text"  id="bairro" name="bairro" class="form-control" value="{{ old('bairro', $endereco->bairro) }}"  ></br>
            </div>
            <div class="col-md-2">
                <label for="cep">CEP</label>
                     <input type="text"  id="cep" name="cep" class="form-control"  value="{{ old('cep', $endereco->cep) }}" ></br>
            </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                            <label for="cidade">CIDADE</label>
                                 <input type="text"  id="cidade" name="cidade" class="form-control" value="{{ old('cidade', $endereco->cidade) }}"  ></br>
                </div>
                <div class="col-md-1">
                    <label for="estado">ESTADO</label>
                    <select  id="estado" name="estado" class="form-control">
                        @foreach ($estados as $item)
                        <option value={{ $item }}
                            {{ old('estados', $endereco->estado) == $item ? 'selected' : '' }}>
                             {{ $item }}</option>
                        @endforeach
                    </select></br>
            </div>
            <div class="col-md-8">
                <label for="complemento">COMPLEMENTO</label>
                     <input type="text"  id="complemento" name="complemento" class="form-control" value="{{ old('complemento', $endereco->complemento) }}"  ></br>
            </div>
            </div>
    <div class="row">
        <div class="col-md">
            <button type="submit" class="btn btn-primary"> <i class="fa fa-check" aria-hidden="true"></i> Gravar</button>
            <a href="{{ route('endereco.index') }}" type="submit" class="btn btn-dark"> <i class="fa fa-reply" aria-hidden="true"></i> Cancelar</a>
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

