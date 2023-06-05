<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFornecedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->id();
            $table->string('cnpj_cpf',45)->nullable();
            $table->string('razao_social')->nullable();
            $table->string('nome_fantasia')->nullable();
            $table->string('indicador_estadual')->nullable();
            $table->string('inscricao_estadual')->nullable();
            $table->string('inscricao_municipal')->nullable();
            $table->string('situacao_cnpj')->nullable();
            $table->string('recolhimento')->nullable();
            $table->boolean('ativo')->default(true);
            $table->string('apelido')->nullable();
            $table->string('rg')->nullable();
            $table->string('cep');
            $table->string('logradouro');
            $table->integer('numero');
            $table->string('complemento')->nullable();
            $table->string('bairro');
            $table->string('ponto_referencia')->nullable();
            $table->string('uf');
            $table->string('cidade');
            $table->string('condominio');
            $table->longText('observacao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fornecedores');
    }
};
