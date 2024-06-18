<?php

namespace App\Http\Controllers;

use App\Models\Ventas;
use Illuminate\Http\Request;
use App\Models\Inventario; 
use Illuminate\Support\Facades\DB;
use App\Models\Transaccion;
use Illuminate\Support\Facades\Log;
use App\Models\Personas; 


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
        $personas = Personas::all(); // Obtener todas las personas
        // Depurar para verificar los datos obtenidos
        //dd($inventarios);
        return view('ventas.create', compact('inventarios','personas'));
        
    }

    public function store(Request $request)
{
    $request->validate([
        'persona_id' => 'required|exists:personas,id',
        'productos.*.inventario_id' => 'required|exists:inventarios,id',
        'productos.*.cantidad' => 'required|integer|min:1',
        'productos.*.preciounitario' => 'required|numeric|min:0',
    ]);

    DB::beginTransaction();
    try {
        // Obtener la persona asociada a la venta
        $persona = Personas::findOrFail($request->persona_id);

        // Calcular monto total
        $montoTotal = array_reduce($request->input('productos'), function($carry, $producto) {
            return $carry + ($producto['cantidad'] * $producto['preciounitario']);
        }, 0);

        // Crear transacción
        $transaccion = new Transaccion([
            'descripcion' => 'Venta realizada por ' . $request->input('persona_id'), // Ajustar según tu lógica
            'monto_total' => $montoTotal,
        ]);
        $transaccion->save();

        // Guardar ventas
        foreach ($request->input('productos') as $producto) {
            $venta = new Ventas([
                //'cliente' => $request->input('persona_id'), // Ajustar según tu lógica
                'cliente' => $persona->nombre, // Aquí usas el nombre de la persona
                'inventario_id' => $producto['inventario_id'],
                'cantidad' => $producto['cantidad'],
                'preciounitario' => $producto['preciounitario'],
                'transaccion_id' => $transaccion->id,
            ]);
            $venta->save();

            // Actualizar inventario
            $inventario = Inventario::findOrFail($producto['inventario_id']);
            if ($inventario->cantidadisponible >= $producto['cantidad']) {
                $inventario->cantidadisponible -= $producto['cantidad'];
                $inventario->save();
            } else {
                // Manejar el caso en que no haya suficiente inventario
                throw new \Exception('No hay suficiente inventario para el producto ' . $inventario->descripcion);
            }
        }

        DB::commit();
        return redirect()->route('ventas.index')->with('success', 'Venta registrada correctamente.');
    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Error al registrar la venta: ' . $e->getMessage());
        return redirect()->route('ventas.create')->with('error', 'Hubo un problema al registrar la venta. Error: ' . $e->getMessage());
    }
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

    
    public function mostrarTransaccion($id)
    {
        $ventas = Ventas::where('transaccion_id', $id)->get();
        
        // Cargar la transacción para la primera venta (ejemplo)
        $primeraVenta = $ventas->first();
        $transaccion = $primeraVenta->transaccion; // Accede a la relación definida en el modelo

        return view('ventas.transaccion', compact('ventas', 'transaccion'));
    }

}
