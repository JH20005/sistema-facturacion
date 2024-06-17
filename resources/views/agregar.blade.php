@extends('layout/plantilla')

@section('TituloPagina','Sistema de gestión de inventario para tienda Los Montero')
    
    @section('contenido')

        <div class="card">
          
                <h5 class="card-header">Agregar Nueva Persona</h5>
           
            <div class="card-body">
                
                <p class="card-text">
                    <form action="{{route('personas.store')}}" method="POST">
                        @csrf
                        <label for="">Apellido Paterno</label>
                        <input type="text" name="paterno" class="form-control" required>
                        <label for="">Apellido Materno</label>
                        <input type="text" name="materno" class="form-control" required>
                        <label for="">Nombre</label>
                        <input type="text" name="nombre" class="form-control" required>
                        <label for="">Fecha de Nacimmiento</label>
                        <input type="date" name="fecha_nacimiento" class="form-control" required>
                        <br>
                        <button class="btn btn-primary">
                            <span class="fas fa-user-plus"></span> Agregar</button>
                        <a href="{{ route("personas.index")}}" class="btn btn-info"  >
                            <span class="fas fa-undo-alt"></span> Regresar</a>
                
                    </form>
                </p>

            </div>
        </div>
    @endsection