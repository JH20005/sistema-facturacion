@extends('layout/plantilla')

@section('TituloPagina','Sistema de gestión de inventario para tienda Los Montero')
    
    @section('contenido')

        <div class="card">
          
                <h5 class="card-header">Eliminar una Articulo</h5>
           
            <div class="card-body">
                
                <p class="card-text">
                    <div class="alert alert-danger" role="alert">
                        Estas seguro de Eliminar este registro?
                        <table class="table table-sm table-hover table-bordered" style="background-color: white" >
                            <thead>
                                <th>Descripcion</th>
                                <th>Cantida Disponible</th>
                                <th>Precio Unitario</th>
                                
                            </thead>
                            <tbody>

                                <tr>
                                    <td>{{$inventario->descripcion}}</td>
                                    <td>{{$inventario->cantidadisponible}}</td>
                                    <td>{{$inventario->preciounitario}}</td>
                                    
                                </tr>  

                                
                            </tbody>
                        </table>

                        <form action="{{route('inventario.destroy',$inventario->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('inventario.index') }}" class="btn btn-info">
                                <span class="fas fa-undo-alt"></span> Regresar</a>
                            <button class="btn btn-danger">
                                <span class="fas fa-user-minus"></span> Eliminar</button>
                        </form>

                      </div>
                </p>

            </div>
        </div>
    @endsection