<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nome',
        'NomeUsuario',
        'Logotipo',
        'Telefone',
        'WhatsApp',
        'Localizacao',
        'LinkMaps',
        'HorarioAtendimento',
        'Buscador',
        'Delivery',
        'Avaliacoes',
        'UserId',
        'Status',
    ];

    protected $dates = ['created_at', 'update_at'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'perfil';
}
