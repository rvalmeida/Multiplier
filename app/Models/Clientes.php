<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $id;    
    protected $fillable = [
        'nome_fantasia',
        'cnpj',
        'endereco',
        'cidade',
        'estado',
        'pais',
        'telefone',
        'email',
        'area_de_atuacao',
        'quadro_societario',
    ];
}
