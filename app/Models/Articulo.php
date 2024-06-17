<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;
    protected $fillable =['idcategoria','codigo','nombre','precio_venta','stock','descripcion','condicion'];
    
    public function categoria(){

        return $this->belongsTo('App\Model\Categoria');
    }
}
