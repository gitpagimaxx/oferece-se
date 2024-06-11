<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nome',
        'Telefone',
        'Atendimento',
        'Entrega',
        'Observacao',
        'VendaId',
        'Publicar',
        'Status',
    ];

    protected $dates = ['created_at', 'update_at'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'avaliacao';
}
