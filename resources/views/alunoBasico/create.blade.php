    @extends('adminlte::page')

    @section('title', 'Dashboard')

    @section('content_header')
        <h5>Cadastrar novo aluno</h5>
    @stop

    @section('content')
    <div class="container">
        <form action="{{ route('aluno.basico.store')}}" method="POST">
            @csrf

        <br>
        <div class="row">

                <input type="text" hidden id="situacao" name="situacao" value="0">
                <label for="codigo">CÓDIGO</label>
                <input class="form-control"  type="text" id="codigo" name="codigo" ></br></br>
                <label for="primeiroNome">PRIMEIRO NOME</label>
                <input class="form-control"  type="text" id="primeiroNome" name="primeiroNome" ></br></br>
                <label for="sobrenome">SOBRENOME</label>
                <input class="form-control"  type="text" id="sobrenome" name="sobrenome" p></br></br>
                <label for="nascimento">NASCIMENTO</label>
                <input class="form-control" type="date" id="nascimento" name="nascimento"></br></br>
                <label for="sala">SALA</label>
              <select  id="sala" name="sala" class="form-control">
                    <option value="">-- Selecione a Sala --</option>
                    @foreach ($lista as $lst)
                    <option value="{{$lst->id}}">
                        {{$lst->sobrenome}}
                    </option>
                    @endforeach
                </select>

        </div>
        <br>

          <div class="row">
            <div class="col-md">
                <br>
                <button type="submit" class="btn btn-primary"> <i class="fa fa-check" aria-hidden="true"></i> Gravar</button>
                <a href="{{ route('aluno.basico.index') }}" type="submit" class="btn btn-dark"> <i class="fa fa-reply" aria-hidden="true"></i> Cancelar</a>
            </div>

            <x-alert />
        </form>
    </div>
    @stop

    @section('css')
    @stop

    @section('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11">

         </script>
    @stop

