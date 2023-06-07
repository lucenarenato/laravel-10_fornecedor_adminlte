<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fornecedor extends Model
{
    use HasFactory;

    protected $table = 'fornecedores';

    protected $fillable = [
        'cnpj_cpf',
        'razao_social',
        'nome_fantasia',
        'tipo_cliente',
        'indicador_estadual',
        'inscricao_estadual',
        'inscricao_municipal',
        'situacao_cnpj',
        'recolhimento',
        'ativo',
        'apelido',
        'rg',
        'ativo_fisico',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'ponto_referencia',
        'uf',
        'cidade',
        'condominio',
        'observacao',
    ];

    protected $hidden = [
        'ativo', 'created_at', 'updated_at'
    ];

    protected $casts = [
        'ativo' => 'boolean',
    ];

    public function contato()
    {
        return $this->hasMany('App\Models\Contato');
    }
}
