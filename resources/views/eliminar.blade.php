@extends('layout/plantilla')

@section('TituloPagina','Sistema de gestión de inventario para tienda Los Montero')
    
    @section('contenido')

        <div class="card">
          
                <h5 class="card-header">Eliminar una Persona</h5>
           
            <div class="card-body">
                
                <p class="card-text">
                    <div class="alert alert-danger" role="alert">
                        Estas seguro de Eliminar este registro?
                        <table class="table table-sm table-hover table-bordered" style="background-color: white" >
                            <thead>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Nombre</th>
                                <th>Fecha de Nacimmiento</th>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>{{$personas->paterno}}</td>
                                    <td>{{$personas->materno}}</td>
                                    <td>{{$personas->nombre}}</td>
                                    <td>{{$personas->fecha_nacimiento}}</td>
                                </tr>  

                                
                            </tbody>
                        </table>

                        <form action="{{route('personas.destroy',$personas->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('personas.index') }}" class="btn btn-info">
                                <span class="fas fa-undo-alt"></span> Regresar</a>
                            <button class="btn btn-danger">
                                <span class="fas fa-user-minus"></span> Eliminar</button>
                        </form>

                      </div>
                </p>

            </div>
        </div>
    @endsection