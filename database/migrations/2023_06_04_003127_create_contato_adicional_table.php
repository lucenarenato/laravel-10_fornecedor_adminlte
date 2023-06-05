<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContatoAdicionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contatos_adicionais', function (Blueprint $table) {
            $table->id();
            $table->string('nome_adicional')->nullable();
            $table->string('empresa_adicional')->nullable();
            $table->string('cargo_adicional')->nullable();
            $table->string('telefone_adicional')->nullable();
            $table->string('tipo_telefone_adicional')->nullable();
            $table->string('email_adicional')->nullable();
            $table->string('tipo_email_adicional')->nullable();

            $table->foreignId('fornecedor_id')->constrained('fornecedores');
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
        Schema::dropIfExists('contatos_adicionals');
    }
};
