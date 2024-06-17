<!-- En resources/views/ventas/index.blade.php -->
@extends('layout.plantilla')

@section('contenido')
    <div class="card">
        <div class="card-header">
            Listado de Ventas
            <p>
                <a href="{{ route("ventas.create")}}" class="btn btn-primary">
                    <span class="fas fa-user-plus"></span>  Agregar Nueva Venta
                    
                </a>
              </p>
        </div>

        <div class="card-body">
            @if ($ventas->isEmpty())
                <p>No hay ventas registradas.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Inventario</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ventas as $venta)
                            <tr>
                                <td>{{ $venta->id }}</td>
                                <td>{{ $venta->cliente }}</td>
                                <td>{{ $venta->inventario->descripcion }}</td>
                                <td>{{ $venta->cantidad }}</td>
                                <td>{{ $venta->preciounitario }}</td>
                                <td>{{ $venta->cantidad * $venta->preciounitario }}</td>
                                <td>
                                    <a href="{{ route('ventas.show', $venta->id) }}" class="btn btn-info btn-sm">Ver</a>
                                    <a href="{{ route('ventas.edit', $venta->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                    <form action="{{ route('ventas.destroy', $venta->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar esta venta?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            <div id="informacion">
                <a href="/dashboard" class="btn btn-primary  fas fa-home"  >   Dashboard</a>
                
              </div>
        </div>
    </div>
@endsection
