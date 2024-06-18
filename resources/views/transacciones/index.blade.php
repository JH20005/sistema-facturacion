@extends('layout.plantilla')

@section('contenido')
    <div class="container">
        <h1>Lista de Transacciones</h1>

        <ul>
            @foreach ($transacciones as $transaccion)
                <li>
                    <a href="{{ route('transacciones.show', $transaccion->id) }}">
                        Transacción ID: {{ $transaccion->id }} - Fecha: {{ $transaccion->created_at }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    </p>
    <div id="informacion">
    <a href="/dashboard" class="btn btn-primary  fas fa-home"  >   Dashboard</a>
    
    </div>
@endsection
