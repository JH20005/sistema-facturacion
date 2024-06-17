<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
        protected $fillable = [
            'nombre',
            'preciounitario', // Campo en la tabla inventarios
        ];

        // Relación inversa: un inventario puede tener muchas ventas
        public function ventas()
        {
            return $this->hasMany(Ventas::class);
        }
        public function actualizarCantidadDisponible($cantidadVenta)
        {
            $this->cantidadisponible  -= $cantidadVenta;
            $this->save();
        }

}
