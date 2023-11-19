<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaModel extends Model
{
    protected $table = "categoria_models";
    use HasFactory;
    protected $fillable = ["name"];
    public function produtoCategoria(){
        //relacionamento 1 - n
        return $this->hasMany(ProdutoCategoria::class);
    }

    public function produtos(){
        //relacionamento n - n
        return $this->belongsToMany(Produto::class,
            'produto_categorias','id');
    }
}
