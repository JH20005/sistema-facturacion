<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    //este nos va a permitir traernos todas las categorias
    public function index(){
        return Categoria::all();
    }

    public function store(){}
    public function update(){}
    public function delete(){}

}
