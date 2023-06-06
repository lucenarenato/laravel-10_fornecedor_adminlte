@extends('adminlte::page')

@section('title', 'View fornecedor')

@section('content_header')
    <div id="fornecedores">
        <div class="text_title">
            <h1>Fornecedores</h1>
            <p>Ver</p>
        </div>
    </div>
@stop

@section('content')
    <div class="container-fluid">

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
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Ativo</label>
                                <input type="text" name="active" class="form-control not-value" value="Sim" readonly="">
                        </div>
                    </div>
                        <div class="formulario_fisica row">
                            <div class="mb-3 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">CPF</label>
                                    <input type="text" id="cpf" name="cpf" class="form-control" name="cpf" id="cpf" value={{$fornecedores->cnpj_cpf}} readonly />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <div class="form-group"><label class="form-label">Nome</label><input type="text" name="name" class="form-control" value="{{$fornecedores->razao_social}}" readonly /></div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"><label class="form-label">Apelido</label><input type="text" name="nickname" class="form-control not-value" value={{$fornecedores->apelido}} readonly /></div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"><label class="form-label">RG</label><input type="text" name="rg" class="form-control" value={{$fornecedores->rg}} readonly /></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group"><label class="form-label">Ativo</label><input type="text" name="active" class="form-control not-value" value={{$fornecedores->ativo}} readonly /></div>
                        </div>
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
                                                <div class="form-group"><label class="form-label">Telefone</label><input class="form-control" value={{$fornecedores->telefone}} readonly /></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"><label class="form-label">Tipo</label><input class="form-control" value={{$fornecedores->tipo_telefone}} readonly /></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-email">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label class="form-label">E-mail</label><input class="form-control" value={{$fornecedores->email}} readonly /></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"><label class="form-label">Tipo</label><input class="form-control" value={{$fornecedores->tipo_email}} readonly /></div>
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
                                <div class="form-group"><label class="form-label">CEP</label><input type="tel" class="form-control" value={{$fornecedores->cep}} readonly /></div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"><label class="form-label">Logradouro</label><input type="text" class="form-control" value="{{$fornecedores->logradouro}}" readonly /></div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"><label class="form-label">Número</label><input type="text" class="form-control" value={{$fornecedores->numero}} readonly /></div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"><label class="form-label">Complemento</label><input type="text" class="form-control" value="{{$fornecedores->complemento}}" readonly /></div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"><label class="form-label">Bairro</label><input type="text" class="form-control" value="{{$fornecedores->bairro}}" readonly /></div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"><label class="form-label">Ponto de Referência</label><input type="text" class="form-control" value="{{$fornecedores->ponto_referencia}}" null /></div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"><label class="form-label">UF</label><input type="text" class="form-control" value={{$fornecedores->uf}} readonly /></div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"><label class="form-label">Cidade</label><input type="text" class="form-control" value="{{$fornecedores->cidade}}" readonly /></div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"><label class="form-label">Condomínio</label><input type="text" class="form-control" value={{$fornecedores->condominio}} readonly /></div>
                            </div>
                            <div class="col-md-3 div-address-cond" style="display: none;">
                                <div class="form-group"><label class="form-label">Endereço</label><input type="text" class="form-control" value={{$fornecedores->logradouro}} readonly /></div>
                            </div>
                            <div class="col-md-3 div-address-cond" style="display: none;">
                                <div class="form-group"><label class="form-label">Número</label><input type="text" class="form-control" value={{$fornecedores->numero}} readonly /></div>
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
                            <div class="form-group"><textarea class="text-style" name="description" rows="10" cols="80" style="width: 100%;" disabled>{{$fornecedores->observacao}}</textarea></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="fornecedor/1/editar" class="btn btn-sm btn-primary"><i class="fa fa-edit fa-fw"></i> Editar</a>
                </div>
            </div>

        <footer class="main-footer">
            <div class="pull-right hidden-xs"></div>
            <strong>Dashboard 2022</strong>
        </footer>
    </div>
@stop

@section('css')
    {{-- @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js']) --}}
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

    <script>

    </script>
@stop
