<!-- resources/views/ventas/show.blade.php -->

@extends('layout.plantilla')

@section('contenido')
    <div class="card">
        <div class="card-header">
            Detalles de la Venta #{{ $venta->id }}
        </div>
        <div class="card-body">
            <p><strong>Inventario:</strong> {{ $venta->inventario->descripcion }}</p>
            <p><strong>Cantidad:</strong> {{ $venta->cantidad }}</p>
            <p><strong>Precio Unitario:</strong> {{ $venta->preciounitario }}</p>
            <p><strong>Total:</strong> {{ $venta->preciounitario * $venta->cantidad }}</p>
            <button onclick="imprimir('{{ $venta->id }}')" class="btn btn-primary">Imprimir Venta #{{ $venta->id }}</button>

            <!-- Botón para imprimir con el ID de la venta -->
            <!--a href="{{ route('ventas.print', $venta->id) }}" class="btn btn-primary">Imprimir Venta #{{ $venta->id }}</a-->
            <a href="{{ route('ventas.index') }}" class="btn btn-secondary">Volver al Listado</a>
        </div>
    </div>
@endsection

