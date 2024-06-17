<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    protected $table = 'transacciones'; // Nombre de la tabla en singular si Laravel no lo está haciendo automáticamente

    

    protected $fillable = ['descripcion', 'monto_total']; // Asegúrate de tener los campos necesarios

    public function ventas()
    {
        return $this->hasMany(Ventas::class);
    }
}
