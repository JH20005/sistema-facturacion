@extends('layout.plantilla')

@section('contenido')
    <div class="container">
        <h1>Nueva Venta</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form method="POST" action="{{ route('ventas.store') }}">
            @csrf
        
            <div class="form-group">
                <label for="cliente">Cliente</label>
                <input type="text" name="cliente" id="cliente" class="form-control" value="{{ old('cliente') }}" required>
            </div>
        

            <div class="form-group">
                <label for="inventario_id">Producto del Inventario/Precio Unitario</label>
                <select name="inventario_id" id="inventario_id" class="form-control" required>
                    <option value="">Selecciona un producto</option>
                    @foreach($inventarios as $inventario)
                        <option value="{{ $inventario->id }}" data-preciounitario="{{ $inventario->preciounitario }}">{{ $inventario->descripcion }}-{{ $inventario->preciounitario  }}</option>
                        
                    @endforeach
                  
                </select>
             
            </div>
        
            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{ old('cantidad') }}" required>
            </div>
        

              <!-- Campo oculto para 'preciounitario' -->
              <input type="hidden" name="preciounitario" id="preciounitario">
            
            
              @push('scripts')
              <script>
                  document.addEventListener('DOMContentLoaded', function () {
                      let inventarioSelect = document.getElementById('inventario_id');
                      let precioUnitarioInput = document.getElementById('preciounitario');
              
                      inventarioSelect.addEventListener('change', function () {
                          let selectedOption = inventarioSelect.options[inventarioSelect.selectedIndex];
                          let precioUnitario = selectedOption.getAttribute('data-preciounitario');
              
                          precioUnitarioInput.value = precioUnitario;
                      });
                  });
              </script>
              @endpush
       
        
            <button type="submit" class="btn btn-primary">Guardar Venta</button>
        </form>
        
        
        
    </div>
@endsection
