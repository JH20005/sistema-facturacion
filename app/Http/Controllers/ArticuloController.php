<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

class ArticuloController extends Controller
{
    //Nos permite traer todos los articulos
    public function index(){
        return Articulo::all();
    }
    
}
