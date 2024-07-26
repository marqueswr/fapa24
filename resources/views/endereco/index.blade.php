    @extends('adminlte::page')
    @section('title', 'Dashboard')
    @section('content_header')

    @stop

    @section('content')
    <x-alert />
    </br>
    <div class="container">
        <h5 style="color: #031922">Alunos com Endereços Cadastrados - {{ $total }}</h5>

         </br>
         <div class="float-right">
            <a class="btn btn-success float-right"  style="width: 150px; height:40px" href="{{ route('endereco.create') }}"> <i class="fa fa-user-plus" aria-hidden="true"></i> Novo</a>
        </div>
    </br></br>
        &nbsp;&nbsp;&nbsp;
        </div>
    </div>
        <table class="table table-striped mb-none">
            <thead>
                <tr>
                    <th >#</th>
                    <th >CÓDIGO</th>
                    <th >NOME</th>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach ( $alunosContatos as $item )
                <tr>
                    <td>{{ $item->id}}</td>
                    <td>{{ $item->codigo}}</td>
                    <td>{{ $item->primeiroNome}} {{ $item->sobrenome}}</td>


                    <td class="float-right">
                        <form id="formExcluir{{ $item->id }}" action="{{ route('endereco.destroy',['endereco'=> $item-> id]) }}"  method="POST" >
                           @csrf
                           @method('delete')
                        <a type="submit" onclick="confirmarExclusao(event, {{ $item->id }})" class="btn btn-outline-light float-end ms-2 px-3" style="width: 120px; height:40px" href="{{ route('endereco.destroy',['endereco'=>$item->id]) }}" > <i class="fa fa-trash" aria-hidden="true"></i> Excluir</a>
                       </form>
                   </td>
                   <td class="float-right"><a data-toggle="modal" data-target="#exampleModal{{ $item->id }}" class="btn btn-outline-light float-end ms-2 px-3" style="width: 120px; height:40px"> <i class="fa fa-eye" aria-hidden="true" href="{{ route('endereco.index',['alunosContatos'=>$item->id]) }}"></i> Visualizar</a></td>
                   <td><a class="btn btn-outline-light float-end ms-2 px-3" style="width: 120px; height:40px" href="{{ route('endereco.edit',['endereco'=>$item->id]) }}" > <i class="fa fa-recycle" aria-hidden="true"></i> Alterar</a></td>


                   <!-- Modal de visualização-->
                <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><b>Detalhes do(a) aluno(a)</b></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <b>Código: </b>{{ $item->codigo }}</br>
                          <b>Nome completo: </b>{{ $item->primeiroNome }} {{ $item->sobrenome }} </br>
                          <b>Rua/Bairro:</b> {{ $item->rua }}, {{ $item->numero }} - {{ $item->bairro }} </br>
                          <b>Cidade/Estado/CEP:</b> {{ $item->cidade }} / {{ $item->estado }} - {{ $item->cep }}</br>
                          <b>Complemento:</b> {{ $item->complemento }}</br>

                          <b>Data de nascimento:</b> {{ \Carbon\Carbon::parse($item->nascimento)->format('d/m/Y') }} </br>
                          <b>Situação:</b>
                          @if($item->situacao == 0)
                            INATIVO
                            @else
                            ATIVO
                          @endif

                        {{-- </br>
                         <b>Registro criado em:</b> {{  \Carbon\Carbon::parse($item->created_at)->format('d/m/Y h:m:s') }}
                        </div> --}}
                        <div class="modal-footer">
                          <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar janela</button>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- Fim do Modal de visualização-->

                        </tr>
                @endforeach
            </tbody>
        </table>
        </div>

        <div  style="float:inline-end">
            {{ $navegacao->onEachSide(0)->links() }}
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

