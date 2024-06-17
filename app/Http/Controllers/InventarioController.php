<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{

    public function index()
    {
        //
        $datos=Inventario::orderBy('cantidadisponible','Desc')->paginate(3);
        return view('inventarioinicio',compact('datos'));
    }


    public function create()
    {
        //
        return view('agregarinventario');
    }


    public function store(Request $request)
    {
        //
        $inventario = New Inventario();
        $inventario->descripcion=$request->post('descripcion');
        $inventario->cantidadisponible=$request->post('cantidadisponible');        
        $inventario->preciounitario=$request->post('preciounitario');
        $inventario->save();
        
        return redirect()->route("inventario.index")->with("success","Agregado con Exito!");
    }


    public function show($id)
    {
        //
        $inventario = Inventario::find($id);//--busqueda por Query id
        return view("eliminarinventario",compact('inventario'));
    }

    public function edit($id)
    {
        //
        $inventario = Inventario::find($id);//--busqueda por Query id
        return view("actualizarinventario",compact('inventario'));
        //echo $id; --> PARA VISUALIZAR LO QUE LE ENVIO POR GET
    }


    public function update(Request $request, $id)
    {
        //
                //ESTE METODO ACTUALIZA LOS DATOS EN LA BDD
                $inventario = Inventario::find($id);
        
                $inventario->descripcion=$request->post('descripcion');
                $inventario->cantidadisponible=$request->post('cantidadisponible');        
                $inventario->preciounitario=$request->post('preciounitario');
                $inventario->save();
                
                return redirect()->route("inventario.index")->with("success","Actualizado con Exito!");
    }

    public function destroy($id)
    {
        //
                //print_r($id);
                $inventario = Inventario::find($id);
                $inventario->delete();
                return redirect()->route("inventario.index")->with("success","Eliminado con Exito!");
    }
}
