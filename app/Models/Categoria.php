<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nome',
        'Link',
        'UserId',
        'Status',
    ];

    protected $dates = ['created_at', 'update_at'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'categoria';
}
