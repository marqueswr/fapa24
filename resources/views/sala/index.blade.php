    @extends('adminlte::page')
    @section('title', 'Dashboard')
    @section('content_header')

    @stop

    @section('content')
    <x-alert />
    </br>
    <div class="container">
        <h5 style="color: #031922">Listagem de Salas</h5>
            <div class="row">
            <div class="col" >
                <form action="{{ route('sala.index') }}">
                    <div style="width: 80%">
                    <input  type="text" name="celula" id="celula" class="form-control" value="{{ $celula }}"  placeholder="parte do nome da célula"/>
            </div>
            </div>

            <div style="float-left">
                    <button type="submit" style="width: 150px; height:40px" class="btn btn-secondary btn-sm"> <i class="fa fa-search" aria-hidden="true"></i> PESQUISAR</button>
            </div>

            </form>

            &nbsp;&nbsp;&nbsp;

            <div class="float-right">
                <a class="btn btn-success float-right"  style="width: 150px; height:40px" href="{{ route('sala.create') }}"> <i class="fa fa-user-plus" aria-hidden="true"></i> Novo</a>
            </div>
            </div>
        </div>

         </br></br>

        <table class="table table-striped mb-none">
            <thead>
                <tr>
                    <th >#</th>
                    <th >CÉLULA</th>
                    <th>SÉRIE</th>
                    <th>TURMA</th>
                    <th>TURNO</th>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach ( $salas as $sala )
                <tr>
                    <td>{{ $sala->id}}</td>
                    <td>{{ $sala->celula}}</td>
                    <td>{{ $sala->serie}}</td>
                    <td>{{ $sala->turma}}</td>
                    <td>{{ $sala->turno}}</td>

                <!-- Modal de visualização-->
                <div class="modal fade" id="exampleModal{{ $sala->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><b>Detalhes da Sala</b></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <b>Célula: </b>{{ $sala->celula }}</br>
                          <b>Série: </b>{{ $sala->serie }} </br>
                          <b>Turma:</b> {{ $sala->turma }} </br>
                          <b>Turno:</b> {{ $sala->turno }}</br>
                          <b>Ano:</b> {{ $sala->ano }}</br>
                          <b>GSTP:</b> {{ $sala->gstp }}</br>
                          <b>Registro criado em:</b> {{  \Carbon\Carbon::parse($sala->created_at)->format('d/m/Y h:m:s') }}
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar janela</button>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- Fim do Modal de visualização-->

                    <td class="float-right">
                         <form id="formExcluir{{ $sala->id }}" action="{{ route('sala.destroy',['sala'=> $sala-> id]) }}"  method="POST" >
                            @csrf
                            @method('delete')
                         <a type="submit" onclick="confirmarExclusao(event, {{ $sala->id }})" class="btn btn-outline-light float-end ms-2 px-3" style="width: 120px; height:40px" href="{{ route('sala.destroy',['sala'=>$sala->id]) }}" > <i class="fa fa-trash" aria-hidden="true"></i> Excluir</a>
                        </form>
                    </td>
                    <td class="float-right"><a  class="btn btn-outline-light float-end ms-2 px-2" style="width: 120px; height:40px"  href="{{ route('sala.edit',['sala'=>$sala]) }}"><i class="fa fa-recycle" aria-hidden="true"></i> Alterar</a></td>
                    <td class="float-right"><a data-toggle="modal" data-target="#exampleModal{{ $sala->id }}" class="btn btn-outline-light float-end ms-2 px-3" style="width: 120px; height:40px"> <i class="fa fa-eye" aria-hidden="true" href="{{ route('sala.index',['sala'=>$sala->id]) }}"></i> Visualizar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>

        <div  style="float:inline-end">
            {{ $salas->onEachSide(0)->links() }}
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

