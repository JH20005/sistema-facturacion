<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    protected $fillable = [
        'cliente',
        'inventario_id',
        'cantidad',
        'preciounitario',
    ];

    public function inventario()
    {
        return $this->belongsTo(Inventario::class, 'inventario_id');
    }

   // protected $table = 'ventas';

    // Relación con la transacción
    public function transaccion()
    {
        return $this->belongsTo(Transaccion::class);
    }
}
