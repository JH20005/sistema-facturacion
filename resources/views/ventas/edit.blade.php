<!-- resources/views/ventas/edit.blade.php -->

@extends('layout.plantilla')

@section('contenido')
    <div class="card">
        <div class="card-header">
            Editar Venta #{{ $venta->id }}
        </div>
        <div id="informacion">
               
            <a href="{{ route("ventas.index")}}" class="btn btn-info"  >
                <span class="fas fa-undo-alt"></span> Regresar</a>
            
        </div>
        <div class="card-body">
            <form action="{{ route('ventas.update', $venta->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="inventario_id">Inventario:</label>
                    <select name="inventario_id" id="inventario_id" class="form-control">
                        @foreach ($inventarios as $inventario)
                            <option value="{{ $inventario->id }}" {{ $inventario->id == $venta->inventario_id ? 'selected' : '' }}>{{ $inventario->descripcion }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{ $venta->cantidad }}" required>
                </div>
                <div class="form-group">
                    <label for="precio_unitario">Precio Unitario:</label>
                    <input type="number" name="preciounitario" id="preciounitario" class="form-control" value="{{ $venta->preciounitario }}" step="0.01" required>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Venta</button>
            </form>

        </div>
    </div>
@endsection
