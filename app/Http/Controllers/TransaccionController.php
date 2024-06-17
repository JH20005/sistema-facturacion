<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaccion; // Asegúrate de importar el modelo Transaccion

class TransaccionController extends Controller
{
    public function index()
    {
        $transacciones = Transaccion::with('ventas')->get();
        
        return view('transacciones.index', compact('transacciones'));
    }

    public function show($id)
    {
        $transaccion = Transaccion::with('ventas')->find($id);
        
        if (!$transaccion) {
            abort(404); // Manejo de transacción no encontrada
        }
        
        return view('transacciones.show', compact('transaccion'));
    }
}
