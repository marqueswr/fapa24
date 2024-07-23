    @extends('adminlte::page')

    @section('title', 'Dashboard')

    @section('content_header')
        <h5>Alterar dados do aluno</h5>
    @stop

    @section('content')
    <div class="container">
        <form action="{{ route('aluno.basico.update', ['aluno'=>$aluno])}}" method="POST">
            @csrf
            @method('PUT')

        <br>
        <div class="row">

                <label for="codigo">CÓDIGO</label>
                <input class="form-control"  type="text" id="codigo" name="codigo" value="{{ old('codigo', $aluno->codigo) }}" ></br></br>
                <label for="primeiroNome">PRIMEIRO NOME</label>
                <input class="form-control"  type="text" id="primeiroNome" name="primeiroNome" value="{{ old('primeiroNome', $aluno->primeiroNome) }}"></br></br>
                <label for="sobrenome">SOBRENOME</label>
                <input class="form-control"  type="text" id="sobrenome" name="sobrenome" value="{{ old('sobrenome', $aluno->sobrenome) }}" p></br></br>
                <label for="nascimento">NASCIMENTO</label>
                <input class="form-control" type="date" id="nascimento" name="nascimento" value="{{ old('nascimento', $aluno->nascimento) }}"></br></br>
                <label for="sala">SALA</label>

                <select  id="sala_id" name="sala_id" class="form-control">
                    <option value="">-- Selecione a sala --</option>
                    @foreach ($salas as $sala)
                    <option value="{{ $sala->id }}"
                      {{ old('sala_id', $aluno->sala_id) == $sala->id ? 'selected' : '' }}>
                      {{ $sala->gstp }}</option>
                    @endforeach
                </select>

            </br></br></br>


                <input name="situacao" type="checkbox" data-oFF-text="INATIVO" value="1"
                    data-off-color="danger" data-size="small" data-on-text="ATIVO"
                    data-on-color="success" {{ $aluno->situacao == '1' ? 'checked' : '' }}
                    @if( $aluno->situacao == 1)
                     onchange="checkStat(this, 'check-ppra');" id="check-ppra"> &nbsp;&nbsp; Aluno(a) <b>&nbsp;&nbsp;ATIVO&nbsp;&nbsp;</b> (desmarque a caixa para inativar)

                   @else
                   <input name="situacao" type="checkbox" data-oFF-text="INATIVO" value="1"
                   data-off-color="danger" data-size="small" data-on-text="ATIVO"
                   data-on-color="success" {{ $aluno->situacao == '1' ? 'checked' : '' }}
                   onchange="checkStat(this, 'check-ppra');" id="check-ppra"> &nbsp;&nbsp; Aluno <b>&nbsp;&nbsp;INATIVO&nbsp;&nbsp;</b> (marque a caixa para ativar)

                     @endif
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

