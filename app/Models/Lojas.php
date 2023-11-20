<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lojas extends Model
{
    protected $table = "lojas";
    use HasFactory;
    protected $fillable = [
        'endereco',
        'numero',
        'cidade',
    ];
}