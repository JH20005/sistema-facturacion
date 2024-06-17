<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class PersonasController extends Controller
{
  
    public function index()
    {
        //ESTE METODO ES PARA LA PAGINA DE INICIO 
        $datos=Personas::orderBy('paterno','Desc')->paginate(3);
        return view('inicio',compact('datos'));
    }

   
    public function create()
    {
        //EL FORMULARIO DONDE NOSOTROS AGREGAMOS DATOS-->VISTA
        return view('agregar');
    }

    public function store(Request $request)
    {
        //SIRVE PARA GUARDAR DATOS EN LA BDD
        //print_r($_POST);--> para poder visualizar lo que lleva el formulario por el metodo POST
        $personas = new Personas();

        $personas->paterno=$request->post('paterno');
        $personas->materno=$request->post('materno');        
        $personas->nombre=$request->post('nombre');
        $personas->fecha_nacimiento=$request->post('fecha_nacimiento');        
        $personas->save();
        
        return redirect()->route("personas.index")->with("success","Agregado con Exito!");

    }


    public function show($id)
    {
        //OBTENER UN REGISTRO DE NUESTRA TABLA
        $personas = Personas::find($id);//--busqueda por Query id
        return view("eliminar",compact('personas'));
        
    }


    public function edit($id)
    {
        //ESTE METODO NOS SIRVE PARA TRAER LOS DATOS QUE SE VAN A EDITAR Y LOS COLOCA EN UN FORMULARIO
        $personas = Personas::find($id);//--busqueda por Query id
        return view("actualizar",compact('personas'));
        //echo $id; --> PARA VISUALIZAR LO QUE LE ENVIO POR GET
    }

    
    public function update(Request $request, $id)
    {
        //ESTE METODO ACTUALIZA LOS DATOS EN LA BDD
        $personas = Personas::find($id);
        
        $personas->paterno=$request->post('paterno');
        $personas->materno=$request->post('materno');        
        $personas->nombre=$request->post('nombre');
        $personas->fecha_nacimiento=$request->post('fecha_nacimiento');        
        $personas->save();
        
        return redirect()->route("personas.index")->with("success","Actualizado con Exito!");

    }

    
    public function destroy($id)
    {
        //ELIMINA UN REGISTRO
        //print_r($id);
        $personas = Personas::find($id);
        $personas->delete();
        return redirect()->route("personas.index")->with("success","Eliminado con Exito!");

    }
}
