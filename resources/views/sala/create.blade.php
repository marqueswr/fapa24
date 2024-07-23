    @extends('adminlte::page')

    @section('title', 'Dashboard')

    @section('content_header')

    @stop

    @section('content')
    <div class="container">
<br><h5>Cadastrar nova sala</h5><br>
        <form action="{{ route('sala.store')}}" method="POST">
            @csrf

        <div class="row">
            <input type="text" hidden id="gstp" name="gstp" >
                <input type="text" hidden id="situacao" name="situacao" value="1">

                <label for="celula">CÉLULA</label>
                <select  id="celula" name="celula" class="form-control">
                    @foreach ($celula as $item)
                    <option value={{ $item }}>
                         {{ $item }}</option>
                    @endforeach
                </select></br></br>

                <label for="serie">SÉRIE</label>
                <select  id="serie" name="serie" class="form-control">
                    @foreach ($serie as $item)
                    <option value="{{ $item }}">
                         {{ $item }}</option>
                    @endforeach
                </select></br></br>

                <label for="turma">TURMA</label>
                <select  id="turma" name="turma" class="form-control">
                    @foreach ($turma as $item)
                    <option value="{{ $item }}">

                         {{ $item }}</option>
                    @endforeach
                </select></br></br>

                <label for="turno">TURNO</label>
                <select  id="turno" name="turno" class="form-control">
                    @foreach ($periodo as $item)
                    <option value="{{ $item}}">

                         {{ $item }}</option>
                    @endforeach
                </select></br></b></br></br>

                <label for="ano">ANO</label>
                     <input type="number"  id="ano" name="ano" class="form-control" value={{ $ano }} ></br>
        </div>

          <div class="row">
            <div class="col-md">
                <br>
                <button type="submit" class="btn btn-primary"> <i class="fa fa-check" aria-hidden="true"></i> Gravar</button>
                <a href="{{ route('sala.index') }}" type="submit" class="btn btn-dark"> <i class="fa fa-reply" aria-hidden="true"></i> Cancelar</a>
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

