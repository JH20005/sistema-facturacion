
@extends('layout/plantilla')
@section('contenido')

<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale())}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Aprendible</title>
    </head>
    <body>
        <div class="card">       
            <h5 class="card-header">Wellcome</h5>
            @csrf
            <div id="informacion">
                <a href="/inicio" class="btn btn-primary  fas fa-user"  > Ir a Login</a>
            </div>
        </div>
    </body>

</html>



