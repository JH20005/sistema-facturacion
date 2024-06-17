@extends('layout/plantilla')

@section('TituloPagina','Sistema de gestión de inventario para tienda Los Montero')
    
    @section('contenido')

        <div class="card">
          
                <h5 class="card-header">Wellcome</h5>
           
            <div class="card-body">
                
                <p class="card-text">
               
                        @csrf
                        
              
                        <a href="{{ route("login")}}" class="btn btn-primary  fas fa-user"  > Ir a Login</a>
                        <div id="informacion">
                            <h2>Universidad de El Salvador</h2>
                            <p>Año 2024, Ciclo I</p>
                            <p>Materia: DSI </p>
                            <p>Sistema: Unatienda Los Monteros</p>
                            <h3>Integrantes:</h3>
                            <ul>
                                <li>Marlon Ivan Bermudes</li>
                                <li>Nahun</li>
                                <li>Julio</li>
                                <!-- Añade aquí más integrantes si es necesario -->
                            </ul>
                        </div>
                        
                  
                </p>

            </div>
        </div>
    @endsection