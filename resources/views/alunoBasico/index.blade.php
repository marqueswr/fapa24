    @extends('adminlte::page')
    @section('title', 'Dashboard')
    @section('content_header')

    @stop

    @section('content')
    <x-alert />
    </br>
    <div class="container">
        <h5 style="color: #031922">Listagem de Alunos</h5>
            <div class="row">
            <div class="col" >
                <form action="{{ route('aluno.basico.index') }}">
                    <div style="width: 80%">
                    <input  type="text" name="primeiroNome" id="primeiroNome" class="form-control" value="{{ $primeiroNome }}"  placeholder="parte do nome do aluno"/>
            </div>
            </div>

            <div style="float-left">
                    <button type="submit" style="width: 150px; height:40px" class="btn btn-secondary btn-sm"> <i class="fa fa-search" aria-hidden="true"></i> PESQUISAR</button>
            </div>

            </form>

            &nbsp;&nbsp;&nbsp;

            <div class="float-right">
                <a class="btn btn-success float-right"  style="width: 150px; height:40px" href="{{ route('aluno.basico.create') }}"> <i class="fa fa-user-plus" aria-hidden="true"></i> Novo</a>
            </div>
            </div>
        </div>

         </br></br>

        <table class="table table-striped mb-none">
            <thead>
                <tr>
                    <th >#</th>
                    <th >CÓDIGO</th>
                    <th>NOME</th>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach ( $alunos as $aluno )
                <tr>
                    <td>{{ $aluno->id}}</td>
                    <td>{{ $aluno->codigo}}</td>
                    <td>{{ $aluno->primeiroNome}} {{ $aluno->sobrenome}}</td>

                <!-- Modal de visualização-->
                <div class="modal fade" id="exampleModal{{ $aluno->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><b>Detalhes do(a) aluno(a)</b></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <b>Código: </b>{{ $aluno->codigo }}</br>
                          <b>Nome completo: </b>{{ $aluno->primeiroNome }} {{ $aluno->sobrenome }} </br>
                          <b>Data de nascimento:</b> {{ \Carbon\Carbon::parse($aluno->nascimento)->format('d/m/Y') }} </br>
                          <b>Sala:</b> {{ $aluno->sala->gstp }}</br>
                          <b>Situação:</b>
                          @if($aluno->situacao == 0)
                            INATIVO
                            @else
                            ATIVO
                          @endif

                        </br>
                          <b>Registro criado em:</b> {{  \Carbon\Carbon::parse($aluno->created_at)->format('d/m/Y h:m:s') }}
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar janela</button>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- Fim do Modal de visualização-->

                    <td class="float-right">
                         <form id="formExcluir{{ $aluno->id }}" action="{{ route('aluno.basico.destroy',['aluno'=> $aluno-> id]) }}"  method="POST" >
                            @csrf
                            @method('delete')
                         <a type="submit" onclick="confirmarExclusao(event, {{ $aluno->id }})" class="btn btn-outline-light float-end ms-2 px-3" style="width: 120px; height:40px" href="{{ route('aluno.basico.destroy',['aluno'=>$aluno->id]) }}" > <i class="fa fa-trash" aria-hidden="true"></i> Excluir</a>
                        </form>
                    </td>
                    <td class="float-right"><a  class="btn btn-outline-light float-end ms-2 px-2" style="width: 120px; height:40px"  href="{{ route('aluno.basico.edit',['aluno'=>$aluno]) }}"><i class="fa fa-recycle" aria-hidden="true"></i> Alterar</a></td>
                    <td class="float-right"><a data-toggle="modal" data-target="#exampleModal{{ $aluno->id }}" class="btn btn-outline-light float-end ms-2 px-3" style="width: 120px; height:40px"> <i class="fa fa-eye" aria-hidden="true" href="{{ route('aluno.basico.index',['aluno'=>$aluno->id]) }}"></i> Visualizar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>

        <div  style="float:inline-end">
            {{ $alunos->onEachSide(0)->links() }}
        </div>
    </div>
    @stop

    @section('css')
    @stop

    @section('js')
        <script>
        function confirmarExclusao(event, alunoID){
        event.preventDefault();
            Swal.fire({
                title:'Excluir esse registro ?',
                text:'Tenha certeza, você não pode reverter essa operação',
                icon:'warning',
                showCancelButton: true,
                cancelButtonText:'Cancelar a exclusão',
                confirmButtonColor:'#d33',
                confirmButtonText:'Sim, excluir',
            }).then((result=>{
                if(result.isConfirmed){
                    document.getElementById(`formExcluir${alunoID}`).submit();
                }
            }))
        }
         </script>
         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stop

