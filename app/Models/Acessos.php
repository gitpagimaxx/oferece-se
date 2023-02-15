<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acessos extends Model
{
    use HasFactory;

    protected $fillable = [
        'IP',
        'Source',
        'Link',
        'UserId'
    ];

    protected $dates = ['created_at', 'update_at'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'acessos';
}
