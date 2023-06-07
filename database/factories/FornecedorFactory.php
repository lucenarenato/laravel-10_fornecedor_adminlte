<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class FornecedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cnpj_cpf' => $this->cnpj(),
            'razao_social' => fake()->name(),
            'nome_fantasia'  => fake()->lastName(),
            'situacao_cnpj' => 'ATIVA',
            'ativo' => 1,
            'tipo_cliente' => 'pj',
            'indicador_estadual' => 'contribuinte',
            'inscricao_estadual' => '',
            'inscricao_municipal' => '',
            'recolhimento' => 'retido',
            'cep' => '74000-000',
            'logradouro' => 'Avenida Goias',
            'numero' => '1',
            'complemento' => '',
            'bairro' => 'Setor Central',
            'ponto_referencia' => '',
            'uf' => 'GO',
            'cidade' => 'Goiania',
            'condominio' => 'Não',
            'observacao' => fake()->realTextBetween(),
        ];
    }

    /*
     * Gerador de CNPJ
     */
    public static function cnpj($verdadeiro = true)
    {

        $cnpj = rand(10000000, 99999999) . '0001';

        //Primeiro digito verificador
        $aux = [5,4,3,2,9,8,7,6,5,4,3,2];
        $total = 0;

        foreach(str_split($cnpj) as $key => $char)
            $total += $char * $aux[$key];

        $d1 = 11 - ($total % 11);

        $cnpj .= ($d1 >= 10)?'0':$d1;

        //Segundo digito verificador
        $aux = [6,5,4,3,2,9,8,7,6,5,4,3,2];
        $total = 0;

        foreach(str_split($cnpj) as $key => $char)
            $total += $char * $aux[$key];

        $d2= 11 - ($total % 11);

        if($verdadeiro)
            $cnpj .= ($d2 >= 10)?'0':$d2;
        else
            $cnpj .= ($d2 >= 9)?'1':$d2+1;

        return $cnpj;
    }

}
