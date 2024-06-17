@extends('layout.plantilla')

@section('contenido')
    <div class="container">
        <h1>Detalles de la Transacción</h1>

        <!-- Mostrar detalles de la transacción si es necesario -->
        @if (isset($transaccion))
            <div class="mb-3">
                <h3>Detalles de la Transacción:</h3>
                <p>ID: {{ $transaccion->id }}</p>
                <!-- Muestra otros detalles de la transacción según sea necesario -->
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID Venta</th>
                    <th>Cliente</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ventas as $venta)
                <tr>
                    <td>{{ $venta->id }}</td>
                    <td>{{ $venta->cliente }}</td>
                    <td>{{ $venta->producto }}</td> <!-- Ajusta el nombre del campo según tu estructura de datos -->
                    <td>{{ $venta->cantidad }}</td>
                    <td>{{ $venta->preciounitario }}</td>
                    <td>{{ $venta->cantidad * $venta->preciounitario }}</td> <!-- Calcula el total de la venta -->
                </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('ventas.index') }}" class="btn btn-primary">Volver a la Lista de Ventas</a>
    </div>
@endsection
