<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salario extends Model
{
    protected $table = "salarios";
    use HasFactory;
    protected $fillable =
    ["funcionario_id",
    "salario",
    "carga_horaria",];

    public function user(){
        return $this->belongsTo(Funcionario::class,
            'funcionario_id','id');
    }

}