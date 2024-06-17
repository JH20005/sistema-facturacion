
@extends('layout/plantilla')
@section('contenido')

<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale())}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bienvenido</title>
        <style>
        body {
            background-color: #cceeff !important; /* Color celeste para el fondo */
        }
        .card-header {
            background-color: #ffffff; /* Color blanco para el encabezado */
            color: #333333; /* Color oscuro para el texto del encabezado */
        }
        .card-body {
            background-color: #ffffff; /* Color blanco para el cuerpo de la tarjeta */
            color: #333333; /* Color oscuro para el texto del cuerpo */
        }
        .btn-primary {
            background-color: #007bff; /* Color azul para los botones */
            border-color: #007bff; /* Color del borde del botón */
            color: #ffffff; /* Color del texto del botón */
        }
        </style>
    </head>
    <div class="card">
        <div class="card-header">
            Bienvenido a Tienda los Monteros
        </div>
        <div class="card-body">
        <p class="card-text">
        <body>
            <div class="card">       
                <h5 class="card-header">Menu</h5>
                @csrf
                <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
                    <div style="max-width: 600px; width: 100%; text-align: center;">
                        <table class="table table-sm table-bordered text-center">
                            <thead>
                                <tr>
                                <th style="width: 50%;"><a href="/inicio" class="btn btn-primary btn-lg fas fa-user"  >   Cliente</a></th>
                                <th style="width: 50%;"><a href="/inventarioinicio" class="btn btn-primary btn-lg fas fa-shopping-basket"  >   Inventario</a></th>
                                </tr>
                            </thead>
                        
                        
                        </table>
                    </div>
                </div>
            </div>
        </body>
        </p>
        </div>
    </div>    
</html>



