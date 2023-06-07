@extends('adminlte::page')

@section('title', 'Editar fornecedor')

@section('content_header')
    <div id="fornecedores">
        <div class="text_title">
            <h1>Fornecedor<small>Editar</small></h1>
        </div>
    </div>
@stop

@section('content')
    <div class="container-fluid">
        <form action="{{ route('updateFornecedores', $fornecedores->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Dados do Fornecedor</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            @if ($fornecedores->tipo_cliente === 'pj')
                                <label class="radio-inline">
                                    <input type="radio" name="type" id="type-client-pj" value={{$fornecedores->tipo_cliente}} checked="" disabled="">Pessoa Jurídica
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="type" id="type-client-pf" value={{$fornecedores->tipo_cliente}} disabled="">Pessoa Física
                                </label>
                                <div class="formulario_juridica row">
                                    <div class="mb-3 col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">CNPJ</label>
                                            <input type="text" id="cnpj" name="cnpj" class="form-control" name="cnpj" id="cnpj" value={{$fornecedores->cnpj_cpf}}  />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div class="form-group"><label class="form-label">Razão Social</label><input type="text" name="name" class="form-control" value="{{$fornecedores->razao_social}}"  /></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"><label class="form-label">Nome Fantasia</label><input type="text" name="nome_fantasia" class="form-control not-value" value={{$fornecedores->nome_fantasia}}  /></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"><label class="form-label">Indicador de Inscrição Estadual</label><input type="text" name="indicador_estadual" class="form-control" value={{$fornecedores->indicador_estadual}}  /></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"><label class="form-label">Inscrição Estadual</label><input type="text" name="inscricao_estadual" class="form-control" value={{$fornecedores->inscricao_estadual}} {{$fornecedores->inscricao_estadual ? '':''}}></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"><label class="form-label">Inscrição Municipal</label><input type="text" name="inscricao_municipal" class="form-control not-value" value={{$fornecedores->inscricao_municipal}} {{$fornecedores->inscricao_municipal ? '':''}}></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"><label class="form-label">Recolhimento</label><input type="text" name="recolhimento" class="form-control" value={{$fornecedores->recolhimento}}  /></div>
                                    </div>
                                </div>
                            @else
                                <label class="radio-inline">
                                    <input type="radio" name="type" id="type-client-pj" value={{$fornecedores->tipo_cliente}} disabled="">Pessoa Jurídica
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="type" id="type-client-pf" value={{$fornecedores->tipo_cliente}} checked="" disabled="">Pessoa Física
                                </label>
                                <div class="formulario_fisica row">
                                    <div class="mb-3 col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">CPF</label>
                                            <input type="text" id="cpf" name="cpf" class="form-control" name="cpf" id="cpf" value={{$fornecedores->cnpj_cpf}}  />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div class="form-group"><label class="form-label">Nome</label><input type="text" name="name" class="form-control" value="{{$fornecedores->razao_social}}"  /></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"><label class="form-label">Apelido</label><input type="text" name="nickname" class="form-control not-value" value={{$fornecedores->apelido}}  /></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"><label class="form-label">RG</label><input type="text" name="rg" class="form-control" value={{$fornecedores->rg}}  /></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"><label class="form-label">Ativo</label><input type="text" name="active" class="form-control not-value" value=@if($fornecedores->ativo === 1) 'Sim' @else 'Não' @endif disabled/></div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                    @if ($fornecedores->tipo_cliente === 'pj')
                        <div class="col-md-3">
                            <div class="form-group"><label class="form-label">Ativo</label><input type="text" name="active" class="form-control not-value" value=@if($fornecedores->ativo === 1) 'Sim' @else 'Não' @endif disabled/></div>
                        </div>
                    @endif
                    </div>
                </div>
            </div>
            <div class="card card-default">
                <div class="card-header with-border">
                    <h4 class="card-title">Contato Principal</h4>
                    <div class="card-tools pull-right">
                        <button type="button" class="btn btn-card-tool" data-widget="collapse"><i class="fa fa-minus bt-plus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="contact-phone">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label class="form-label">Telefone</label><input class="form-control" value={{$fornecedores->telefone}}  /></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"><label class="form-label">Tipo</label><input class="form-control" value={{$fornecedores->tipo_telefone}}  /></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-email">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label class="form-label">E-mail</label><input class="form-control" value={{$fornecedores->email}}  /></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"><label class="form-label">Tipo</label><input class="form-control" value={{$fornecedores->tipo_email}}  /></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-default">
                <div class="card-header with-border">
                    <h3 class="card-title">Contatos Adicionais</h3>
                    <div class="card-tools pull-right">
                        <button type="button" class="btn btn-card-tool" data-widget="collapse"><i class="fa fa-minus bt-plus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row" id="div-not-contact">
                        <div class="col-md-12 text-center"><span style="color: #999;">NÃO HÁ CONTATOS ADICIONAIS.</span></div>
                    </div>
                    <div id="div-contact" style="min-height: 10px;"></div>
                </div>
            </div>
            <div class="card card-default" style="margin-top: 10px;">
                <div class="card-header with-border">
                    <h3 class="card-title">Dados do Endereço</h3>
                    <div class="card-tools pull-right">
                        <button type="button" class="btn btn-card-tool" data-widget="collapse"><i class="fa fa-minus bt-plus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row-address">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group"><label class="form-label">CEP</label><input type="tel" class="form-control" value={{$fornecedores->cep}}  /></div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"><label class="form-label">Logradouro</label><input type="text" class="form-control" value="{{$fornecedores->logradouro}}"  /></div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"><label class="form-label">Número</label><input type="text" class="form-control" value={{$fornecedores->numero}}  /></div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"><label class="form-label">Complemento</label><input type="text" class="form-control" value="{{$fornecedores->complemento}}"  /></div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"><label class="form-label">Bairro</label><input type="text" class="form-control" value="{{$fornecedores->bairro}}"  /></div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"><label class="form-label">Ponto de Referência</label><input type="text" class="form-control" value="{{$fornecedores->ponto_referencia}}" null /></div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"><label class="form-label">UF</label><input type="text" class="form-control" value={{$fornecedores->uf}}  /></div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"><label class="form-label">Cidade</label><input type="text" class="form-control" value="{{$fornecedores->cidade}}"  /></div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"><label class="form-label">Condomínio</label><input type="text" class="form-control" value={{$fornecedores->condominio}}  /></div>
                            </div>
                            <div class="col-md-3 div-address-cond" style="display: none;">
                                <div class="form-group"><label class="form-label">Endereço</label><input type="text" class="form-control" value={{$fornecedores->logradouro}}  /></div>
                            </div>
                            <div class="col-md-3 div-address-cond" style="display: none;">
                                <div class="form-group"><label class="form-label">Número</label><input type="text" class="form-control" value={{$fornecedores->numero}}  /></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-default">
                <div class="card-header with-border">
                    <div class="row">
                        <div class="col-md-2 col-xs-12 col-sm-12"><h4 class="card-title">Observação</h4></div>
                    </div>
                    <div class="card-tools pull-right">
                        <button type="button" class="btn btn-card-tool" data-widget="collapse"><i class="fa fa-minus bt-plus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group"><textarea class="text-style" name="observacao" rows="10" cols="80" style="width: 100%;" >{{$fornecedores->observacao}}</textarea></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-sm btn-success update"><i class="fa fa-save fa-fw"></i> Salvar</button>
                </div>
            </div>

        <footer class="main-footer">
            <div class="pull-right hidden-xs"></div>
            <strong>Dashboard 2023</strong>
        </footer>
    </form>
</div>
@stop

@section('css')
    <style type="text/css">
    .form-control[disabled], .form-control[], fieldset[disabled] .form-control {
        background-color: #eee;
        opacity: 1;
      }
    </style>
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

    <script>

    </script>
@stop
