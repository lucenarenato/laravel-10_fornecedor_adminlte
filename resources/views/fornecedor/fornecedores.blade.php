@extends('adminlte::page')

@section('title', 'Fornecedores')

@section('content_header')
    <div id="fornecedores">
        <div class="text_title">
            <h1>Fornecedores</h1>
            <p>Painel de Controle</p>
        </div>
        <div>
            <a href="{{ route('cadastroFornecedores') }}" type="button" class="btn btn-primary" >Cadastrar</a>
        </div>
    </div>
@stop

@section('content')

    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                        aria-describedby="example1_info">
                        <thead>
                            <tr>
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">Razao Social/Nome</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Nome Fantasia/Apelido</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">CNPJ/CPF</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">Ativo</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fornecedores as $fornecedor)
                            <tr class="odd">
                                <td class="dtr-control sorting_1" tabindex="0">{{ ($fornecedor->razao_social)? $fornecedor->razao_social : $fornecedor->nome  }}</td>
                                <td>{{ ($fornecedor->nome_fantasia)? $fornecedor->nome_fantasia : $fornecedor->apelido  }}</td>
                                <td>{{ ($fornecedor->cnpj_cpf)? $fornecedor->cnpj_cpf : null  }}</td>
                                @if ($fornecedor->ativo == 1)
                                    <td>Sim</td>
                                @else
                                    <td>Não</td>
                                @endif
                                <td class="acoes">
                                    <div class="ver">
                                        <a href="{{ url('/fornecedores/' . $fornecedor->id) }}" class="btn btn-default" id="ver">Ver</a>
                                    </div>
                                    <div class="deletar">
                                        <form method="POST" action="{{ url('/fornecedores' . '/' . $fornecedor->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" id="deletar" title="Delete Student" ><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>
    <div class=" d-flex justify-content-center pt-2">
        {{ $fornecedores->links() }}
    </div>


@stop

@section('css')

@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#delete').click(function(e) {
                e.preventDefault();
                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
                })
            });
        });
    </script>
@stop
