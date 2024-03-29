<?php

namespace App\Repositories;

use App\Models\Contato;
use App\Models\ContatoAdicional;
use App\Models\Fornecedor;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class FornecedorRepository extends BaseRepository
{

    protected $relations = [];
    protected $deleteRelations = [];

    /**
     * @return string
     */
    public function model()
    {
        return 'App\Models\Fornecedor';
    }

    /**
     * @return mixed
     */
    public function relations()
    {
        return $this->relations;
    }

    /**
     * @return string
     */
    public function validator()
    {
        return 'App\Validators\FornecedorValidator';
    }

    public function store(Request $request)
    {
        try {
            $fornecedores = [
                'cnpj_cpf' => $request->cnpj ? $request->cnpj : $request->cpf,
                'razao_social' => $request->razao_social ? $request->razao_social : $request->nome,
                'nome_fantasia' => $request->nome_fantasia,
                'tipo_cliente' => $request->tipo_cliente,
                'indicador_estadual' => $request->ie_indicator,
                'inscricao_estadual' => $request->inscricao_estadual,
                'inscricao_municipal' => $request->inscricao_minicipal,
                'situacao_cnpj' => $request->situacao,
                'recolhimento' => $request->recolhimento,
                'ativo' => $request->active ? $request->active : $request->ativo,
                'apelido' => $request->apelido,
                'rg' => $request->rg,
                'cep' => $request->cep,
                'logradouro' => $request->logradouro,
                'numero' => $request->numero,
                'complemento' => $request->complemento,
                'bairro' => $request->bairro,
                'ponto_referencia' => $request->ponto_referencia,
                'uf' => $request->uf,
                'cidade' => $request->municipio,
                'condominio' => $request->condominio,
                'observacao' => $request->observacao,
            ];

            $fornecedor = Fornecedor::create($fornecedores);

            foreach ($request->telefone as $key => $value) {
                $dados = [
                    'fornecedor_id' => $fornecedor->id,
                    'telefone' => $value,
                    'tipo_telefone' => $request->tipo_telefone[$key],
                    'email' => $request->email[$key],
                    'tipo_email' => $request->tipo_email[$key],
                ];

                Contato::create($dados);

            }

            if ($request->nome_adicionais) {
                foreach ($request->nome_adicionais as $key => $value) {
                    $contato_adicional = [
                        'fornecedor_id' => $fornecedor->id,
                        'nome_adicional' => $value,
                        'empresa_adicional' => $request->empresa_adicionais[$key],
                        'cargo_adicional' => $request->cargo_adicionais[$key],
                        'telefone_adicional' => $request->telefone_adicionais[$key],
                        'tipo_telefone_adicional' => $request->tipo_telefone_adicionais[$key],
                        'email_adicional' => $request->email_adicionais[$key],
                        'tipo_email_adicional' => $request->tipo_email_adicionais[$key],
                    ];

                    $contato_adicional = ContatoAdicional::create($contato_adicional);
                }
            }

            $resposta['status'] = true;
            $resposta['mensagem'] = 'Fornecedor cadastrado com sucessso!';

        } catch (Exception $error) {
            \Log::debug(json_encode($error->getMessage()));
            throw new Exception("Falha ao criar ou atualizar: " . $error->getMessage());
        }
        return $request;
    }

    /**
     * @throws Exception
     */
    public function update($data, $id)
    {
        try {
            $fornecedor = Fornecedor::find($id);

            if (!$fornecedor) {
                throw new ModelNotFoundException;
            }

            $fornecedor->update($data);
            return $fornecedor;
        } catch (Exception $error) {
            throw new Exception("Falha ao atualizar fornecedor com ID {$id}: " . $error->getMessage());
        }
    }

}
