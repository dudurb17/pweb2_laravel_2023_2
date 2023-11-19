<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoCategoria extends Model
{
    protected $table = "produto_categorias";
    use HasFactory;

    protected $fillable =
    [
    "produto_id",
    "categoria_id",
];
    public function categorias(){
        //relacionamento 1 - 1 (um para um)
        return $this->belongsTo(CategoriaModel::class,
            'categoria_id','id');
    }
    public function produtos(){
        //relacionamento 1 - 1 (um para um)
        return $this->belongsTo(Produto::class,
            'produto_id','id');
    }

}
