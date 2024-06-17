@extends('layout/plantilla')

@section('TituloPagina','Sistema de gestión de inventario para tienda Los Montero')
    
    @section('contenido')

        <div class="card">
          
                <h5 class="card-header">Actualizar Inventario</h5>
           
            <div class="card-body">
                @php
                   // print_r($personas); para ver que trae la variable
                @endphp
                <p class="card-text">
                    <form action="{{ route("inventario.update",$inventario->id)}}" method="POST">
                        @csrf
                        @method("PUT")
                        <label for="">Descripcion</label>
                        <input type="text" name="descripcion" class="form-control" required value="{{$inventario->descripcion}}">
                        <label for="">Cantida Disponible</label>
                        <input type="text" name="cantidadisponible" class="form-control" required value="{{$inventario->cantidadisponible}}">
                        <label for="">Precio Unitario</label>
                        <input type="text" name="preciounitario" class="form-control" required value="{{$inventario->preciounitario}}">
                        <br>
                        <button class="btn btn-warning">
                            <span class="fas fa-user-edit"></span> Actualizar</button>
                        <a href="{{ route("inventario.index")}}" class="btn btn-info"  >
                            <span class="fas fa-undo-alt"></span> Regresar</a>
                
                    </form>
                </p>

            </div>
        </div>
    @endsection