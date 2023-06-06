<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class State extends Model
{
    use HasFactory;

    protected $table = 'states';

    public $timestamps = false;

    protected $fillable = [
        'title',
        'uf'
    ];

    public function cities()
    {
        return $this->hasMany('App\Models\City');
    }
}
