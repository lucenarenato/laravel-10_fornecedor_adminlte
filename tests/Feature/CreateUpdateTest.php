<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Fornecedor;
use App\Models\User;

class CreateUpdateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_fornecedor_can_be_updated()
    {
        $this->assertNull(auth()->user());
        $user = User::factory()->create([
            'password' => bcrypt($password = 'i-love-laravel'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($user);

        $this->withoutExceptionHandling();
        $this->post(
            route('cadastrarFornecedores'),
            [
                'cnpj_cpf' => '64232182000109',
                'razao_social' => 'Gerador de CNPJ',
                'nome_fantasia'  => 'Gerador de CNPJ',
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
                'municipio' => 'Goiania',
                'condominio' => 'Não',
                'observacao' => 'Gerador de CNPJGerador de CNPJGerador de CNPJGerador de CNPJGerador de CNPJGerador de CNPJGerador de CNPJ',
            ],
        );

        $fornecedor = Fornecedor::first();

        $this->put(
            route('updateFornecedores', $fornecedor->id),
            [
                'cnpj_cpf' => '64232182000109',
                'razao_social' => 'Food and',
            ],
        );

        $this->assertEquals('Food and', $fornecedor->razao_social);
    }
}
