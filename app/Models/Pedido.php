<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pedido extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'user_id',
        'cnpj',
        'data_pedido',
        'email',
        'Quantidade',
        'produto_id'
    ];

    public function user(){
        return $this->belongsTo(User::class,
            'user_id','id');
    }
    public function product(){
        return $this->belongsTo(Produto::class,
            'produto_id','id');
    }
}