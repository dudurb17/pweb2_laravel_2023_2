<?php

namespace App\Http\Controllers;

use App\Models\CategoriaModel;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    
  public function index(){
    $categories = CategoriaModel::all();
  }
}
