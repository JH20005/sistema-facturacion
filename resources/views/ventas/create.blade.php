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

            <!-- Campo para seleccionar la persona -->
            <div class="form-group">
                <label for="persona_id">Persona</label>
                <select name="persona_id" id="persona_id" class="form-control" required>
                    <option value="">Selecciona una persona</option>
                    @foreach($personas as $persona)
                        <option value="{{ $persona->id }}">{{ $persona->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div id="productos">
                <div class="producto">
                    <div class="form-group">
                        <label for="productos[0][inventario_id]">Producto del Inventario/Precio Unitario</label>
                        <select name="productos[0][inventario_id]" class="form-control inventario-select" required>
                            <option value="">Selecciona un producto</option>
                            @foreach($inventarios as $inventario)
                                <option value="{{ $inventario->id }}" data-preciounitario="{{ $inventario->preciounitario }}">
                                    {{ $inventario->descripcion }} - ${{ $inventario->preciounitario }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="productos[0][cantidad]">Cantidad</label>
                        <input type="number" name="productos[0][cantidad]" class="form-control cantidad" required>
                        
                    </div>

                    <input type="hidden" name="productos[0][preciounitario]" class="preciounitario">
                </div>
            </div>

            <button type="button" id="addProduct" class="btn btn-secondary">Agregar Producto</button>
            <button type="submit" class="btn btn-primary">Guardar Venta</button>
        </form>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let productIndex = 0; // Empieza con 0 para el primer producto
    
            document.getElementById('addProduct').addEventListener('click', function () {
                let productosDiv = document.getElementById('productos');
                let newProductDiv = document.querySelector('.producto').cloneNode(true);
    
                newProductDiv.querySelectorAll('select, input').forEach(input => {
                    input.name = input.name.replace(/\[\d+\]/, '[' + productIndex + ']');
                    if (input.classList.contains('preciounitario')) {
                        input.value = '';
                    }
                });
    
                newProductDiv.querySelector('select').value = '';
                newProductDiv.querySelector('.cantidad').value = '';
    
                productosDiv.appendChild(newProductDiv);
                productIndex++;
            });
    
            document.getElementById('productos').addEventListener('change', function (event) {
                if (event.target.tagName === 'SELECT' && event.target.classList.contains('inventario-select')) {
                    let selectedOption = event.target.options[event.target.selectedIndex];
                    let precioUnitario = selectedOption.getAttribute('data-preciounitario');
                    event.target.closest('.producto').querySelector('.preciounitario').value = precioUnitario;
                }
            });
        });
    </script>
    @endpush
@endsection
