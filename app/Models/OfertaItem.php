<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfertaItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'OfertaId',
        'Item',
        'Valor',
        'TextoWhatsApp',
        'UserId',
        'Status',
    ];

    protected $dates = ['created_at', 'update_at'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'oferta_item';
}
