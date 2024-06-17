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
@endsection
