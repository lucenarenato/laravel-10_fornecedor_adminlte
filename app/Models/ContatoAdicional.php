<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContatoAdicional extends Model
{
    use HasFactory;

    protected $table = 'contatos_adicionais';

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fornecedor_id',
        'nome_adicional',
        'empresa_adicional',
        'cargo_adicional',
        'telefone_adicional',
        'tipo_telefone_adicional',
        'email_adicional',
        'tipo_email_adicional',
    ];
}
