<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $fillable =[
        'profissional-id',
        'cliente-id',
        'servico-id',
        'data-hora',
        'pagamento',
        'valor'

    ];
}
