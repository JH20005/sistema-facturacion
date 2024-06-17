@extends('layout/plantilla')

@section('TituloPagina','Sistema de gestión de inventario para tienda Los Montero')
    
    @section('contenido')

    <div class="card">
          
        <h5 class="card-header">Login</h5>
   
    <div class="card-body">
        
        
         @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error}}</li>  
                @endforeach 
            </ul>
                
         @endif   
            

        <form method="POST">
            @csrf
            <label>
                <input name="email" type="text" placeholder="Email..." required value="{{old('email')}}" autofocus>
            </label><br>
            
            <label>
                <input name="password" type="password" placeholder="Contraseña" required></label><br>
            
            <br>
            <label>
                <input type="checkbox" name="remember">
                Recuerda mi sesion
            </label><br>
            <button type="submit">Login</button>
        </form>

    </div>
    </div>


@endsection