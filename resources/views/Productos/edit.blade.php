@extends('plantilla.plantilla')

@section('contenido')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Editar Producto</h1>
    <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Nombre del producto -->
        <div class="mb-4">
            <label for="nombre" class="block text-sm font-medium">Nombre del Producto</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $producto->nombre) }}" class="mt-1 block w-full rounded border-gray-300" required>
        </div>

        <!-- Descripción -->
        <div class="mb-4">
            <label for="descripcion" class="block text-sm font-medium">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="mt-1 block w-full rounded border-gray-300">{{ old('descripcion', $producto->descripcion) }}</textarea>
        </div>

        <!-- Categoría -->
        <div class="mb-4">
            <label for="categoria_id" class="block text-sm font-medium">Categoría</label>
            <select name="categoria_id" id="categoria_id" class="mt-1 block w-full rounded border-gray-300" required>
                <option value="">Seleccione una categoría</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $categoria->id == $producto->subcategoria->categoria_id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Subcategoría -->
        <div class="mb-4">
            <label for="subcategoria_id" class="block text-sm font-medium">Subcategoría</label>
            <select name="subcategoria_id" id="subcategoria_id" class="mt-1 block w-full rounded border-gray-300" required>
                <!-- Las opciones se cargarán dinámicamente -->
            </select>
        </div>

        <!-- Precio -->
        <div class="mb-4">
            <label for="precio" class="block text-sm font-medium">Precio</label>
            <input type="number" name="precio" id="precio" value="{{ old('precio', $producto->precio) }}" class="mt-1 block w-full rounded border-gray-300" required>
        </div>

        <!-- Stock -->
        <div class="mb-4">
            <label for="stock" class="block text-sm font-medium">Stock</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock', $producto->stock) }}" class="mt-1 block w-full rounded border-gray-300" required>
        </div>

        <!-- Imagen -->
        <div class="mb-4">
            <label for="imagen" class="block text-sm font-medium">Imagen</label>
            @if($producto->imagen)
                <img src="{{ asset('imagenes/' . $producto->imagen) }}" alt="Imagen del Producto" class="w-32 h-32 object-cover mb-2">
            @endif
            <input type="file" name="imagen" id="imagen" class="mt-1 block w-full rounded border-gray-300">
            <p class="text-sm text-gray-600">Deja este campo vacío si no deseas cambiar la imagen.</p>
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Actualizar</button>
        <a href="{{ route('productos.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</a>
    </form>
</div>

<!-- Agregar el script para manejar el cambio de categoría y cargar las subcategorías -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categoriaSelect = document.getElementById('categoria_id');
        const subcategoriaSelect = document.getElementById('subcategoria_id');
        const selectedSubcategoriaId = '{{ $producto->subcategoria_id }}';

        function loadSubcategorias(categoriaId, selectedSubcategoriaId = null) {
            // Limpiar el select de subcategorías
            subcategoriaSelect.innerHTML = '<option value="">Seleccione una subcategoría</option>';

            if (categoriaId) {
                // Hacer una solicitud AJAX para obtener las subcategorías
                fetch('/get-subcategorias/' + categoriaId)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(subcategoria => {
                            const option = document.createElement('option');
                            option.value = subcategoria.id;
                            option.text = subcategoria.nombre;
                            if (selectedSubcategoriaId && subcategoria.id == selectedSubcategoriaId) {
                                option.selected = true;
                            }
                            subcategoriaSelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        }

        // Al cargar la página, cargar las subcategorías correspondientes a la categoría seleccionada
        loadSubcategorias(categoriaSelect.value, selectedSubcategoriaId);

        // Cuando cambia la categoría, actualizar las subcategorías
        categoriaSelect.addEventListener('change', function() {
            loadSubcategorias(this.value);
        });
    });
</script>
@endsection
