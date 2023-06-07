<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contato extends Model
{
    use HasFactory;

    protected $table = 'contatos';
      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fornecedor_id',
        'telefone',
        'tipo_telefone',
        'email',
        'tipo_email'
    ];

    public function fornecedor()
    {
        return $this->belongsTo('App\Models\Fornecedor');
    }
}
