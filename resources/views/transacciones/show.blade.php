@extends('layout.plantilla')

@section('contenido')
    <div class="container">
        <h1>Detalles de la Transacción</h1>

        <p>ID de Transacción: {{ $transaccion->id }}</p>
        <p>Fecha: {{ $transaccion->created_at }}</p>

        <h2>Ventas de esta Transacción:</h2>

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
                @foreach($transaccion->ventas as $venta)
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
    </div>
@endsection
