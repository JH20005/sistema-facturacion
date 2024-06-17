@extends('layout/plantilla')

@section('TituloPagina','Sistema de gestión de inventario para tienda Los Montero')
    
    @section('contenido')

    <div class="card">
        <div class="card-header">
          Listado De Inventario
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    @if ($mensaje=Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{$mensaje}}
                        </div>    
                    @endif
                    
                </div>
            </div>

          <h5 class="card-title text-center" >Listado de Inventario</h5>
          <p>
            <a href="{{ route("inventario.create")}}" class="btn btn-primary">
                <span class="fas fa-user-plus"></span>  Agregar Articulo al Inventario
                
            </a>
          </p>
          <hr>
          @php
         //     print_r($datos);
          @endphp
          <p class="card-text">
            <div class="table table-responsive">
                <table class="table table-sm table-bordered">
                    <thead>
                        <th>Descripcion</th>
                        <th>Cantida Disponible</th>
                        <th>Precio Unitario</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>
                      @foreach ($datos as $item)
                      <tr>
                        <td>{{$item->descripcion}}</td>
                        <td>{{$item->cantidadisponible}}</td>
                        <td>{{$item->preciounitario}}</td>
                        <td>
                            <form action="{{ route("inventario.edit",$item->id)}}" method="GET">
                                <button class="btn btn-warning btn-sm">
                                    <span class="fas fa-user-edit"></span>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route("inventario.show",$item->id)}}" method="GET">
                                <button class="btn btn-danger btn-sm">
                                    <span class="fas fa-user-minus"></span>
                                </button>
                            </form>
                        </td>
                    </tr>  
                      @endforeach
                        
                    </tbody>
                </table>
                <hr>
                
            </div>
            <div class="row">
                <div class="col-sm-12 ">
                    {{$datos->links()}}
                </div>
            </div>
          </p>
          
        </div>
    </div>

@endsection