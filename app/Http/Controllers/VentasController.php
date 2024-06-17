<?php

namespace App\Http\Controllers;

use App\Models\Ventas;
use Illuminate\Http\Request;
use App\Models\Inventario; 


class VentasController extends Controller
{

    public function index()
    {
        //
        $ventas = Ventas::with('inventario')->get();
        // Calcular el total de las ventas sumando la cantidad de cada una
        $totalVentas = Ventas::sum('cantidad');
        return view('ventas.index', compact('ventas', 'totalVentas'));
    }


    public function create()
    {
        // Obtener todos los productos del inventario
        $inventarios = Inventario::all();
        // Depurar para verificar los datos obtenidos
        //dd($inventarios);
        return view('ventas.create', compact('inventarios'));
        
    }

    public function store(Request $request)
    {

                // Validar los datos del formulario
                $request->validate([
                    'cliente' => 'required|string|max:255',
                    'inventario_id' => 'required|exists:inventarios,id',
                    'cantidad' => 'required|integer|min:1',
                    'preciounitario' => 'required|numeric|min:0', // Asegúrate de validar el precio unitario si es necesario
                ]);
                 // Crear nueva venta
                 $venta = new Ventas();
                 $venta->cliente = $request->cliente;
                 $venta->inventario_id = $request->inventario_id;
                 $venta->cantidad = $request->cantidad;
                 $venta->preciounitario = $request->preciounitario; // Asegúrate de que este campo esté presente en el formulario
                 
                 $venta->save();

                         // Actualizar la cantidad disponible en el inventario
                    $inventario = Inventario::findOrFail($request->inventario_id);
                    $inventario->actualizarCantidadDisponible($request->cantidad);
                 // Redireccionar a la vista de detalles de la venta
                 return redirect()->route('ventas.show', $venta->id)->with('success', 'Venta creada exitosamente.');
    

    }

    public function show($id)
    {
        $venta = Ventas::findOrFail($id);
         // Calcular el total de todas las ventas sumando la cantidad de cada una
         $totalVentas = Ventas::sum('cantidad');
        return view('ventas.show', compact('venta','totalVentas'));
    }

    public function edit($id)
    {
        //
        $venta = Ventas::findOrFail($id);
        $inventarios = Inventario::all();
        return view('ventas.edit', compact('venta', 'inventarios'));
    }


    public function update(Request $request, $id)
    {
        //
                // Validación de datos
                $request->validate([
                    'inventario_id' => 'required|exists:inventarios,id',
                    'cantidad' => 'required|integer|min:1',
                    'preciounitario' => 'required|numeric|min:0',
                ]);
        
                // Actualizar la venta
                $venta = Ventas::findOrFail($id);
                $venta->update($request->all());
        
                // Redireccionar o retornar una respuesta
                return redirect()->route('ventas.index')->with('success', 'Venta actualizada correctamente.');
    }

    public function destroy($id)
    {
        // Eliminar la venta
        $venta = Ventas::findOrFail($id);
        $venta->delete();

        // Redireccionar o retornar una respuesta
        return redirect()->route('ventas.index')->with('success', 'Venta eliminada correctamente.');
    }

}
