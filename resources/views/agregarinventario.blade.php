@extends('layout/plantilla')

@section('TituloPagina','Sistema de gestión de inventario para tienda Los Montero')
    
    @section('contenido')

        <div class="card">
          
                <h5 class="card-header">Agregar Nuevo Articulo</h5>
           
            <div class="card-body">
                
                <p class="card-text">
                    <form action="{{route('inventario.store')}}" method="POST">
                        @csrf
                        <label for="">Descripcion</label>
                        <input type="text" name="descripcion" class="form-control" required>
                        <label for="">Cantida Disponible</label>
                        <input type="text" name="cantidadisponible" class="form-control" required>
                        <label for="">Precio Unitario</label>
                        <input type="text" name="preciounitario" class="form-control" required>
                        <br>
                        <button class="btn btn-primary">
                            <span class="fas fa-user-plus"></span> Agregar</button>
                        <a href="{{ route("inventario.index")}}" class="btn btn-info"  >
                            <span class="fas fa-undo-alt"></span> Regresar</a>
                
                    </form>
                </p>

            </div>
        </div>
    @endsection