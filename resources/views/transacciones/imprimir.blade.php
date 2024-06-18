<!-- resources/views/transacciones/imprimir.blade.php -->
@extends('layout.plantilla')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impresión de Transacción</title>
    <style>
        /* Estilos para la impresión */
        @media print {
            /* Aquí puedes añadir estilos específicos para la impresión */
            body {
                font-family: Arial, sans-serif;
            }
            /* ... */
        }
    </style>
</head>
@section('contenido')
<div class="container">
<body>
    <h1>Detalles de la Transacción</h1>

    <p>ID de Transacción: {{ $transaccion->id }}</p>
    <p>Monto Total: {{ $transaccion->monto_total }}</p>
    <p>Fecha: {{ $transaccion->created_at }}</p>

    <h2>Ventas de esta Transacción:</h2>

    <table border="1"  class="table">
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
                    <td>{{ $venta->inventario->descripcion }}</td>
                    <td>{{ $venta->cantidad }}</td>
                    <td>{{ $venta->preciounitario }}</td>
                    <td>{{ $venta->cantidad * $venta->preciounitario }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- Puedes agregar más detalles de la transacción según necesites -->


@endsection
    <!-- Opcional: Botón para imprimir desde la vista si es necesario -->
    <script>
        // Para imprimir directamente desde la vista si es necesario
        window.onload = function() {
            window.print();
        };
    </script>
</body>

</html>
