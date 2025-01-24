@extends('plantillas.base')

@section('titulo')
Editar Producto
@endsection

@section('cabecera')
Editar producto
@endsection

@section('contenido')
<div class="bg-white w-1/2 p-4 m-auto rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4 text-red-500">Editar Producto</h2>
    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-medium mb-2">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $product->nombre) }}" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="Escribe el nombre del producto...">
            <x-error for="nombre"/>
        </div>
        
        <div class="mb-4">
            <label for="descripcion" class="block text-gray-700 font-medium mb-2">Descripción</label>
            <textarea name="descripcion" id="descripcion" rows="4" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="Escribe una descripción del producto...">{{ old('descripcion', $product->descripcion) }}</textarea>
            <x-error for="descripcion" />
        </div>

        <div class="mb-4">
            <label for="stock" class="block text-gray-700 font-medium mb-2">Stock</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" min="0" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="Cantidad en inventario">
            <x-error for="stock" />
        </div>

        <div class="mb-4">
            <label for="category_id" class="block text-gray-700 font-medium mb-2">Categoría</label>
            <select name="category_id" id="category_id" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                <option value="">Selecciona una categoría</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('category_id', $product->category_id) == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
            <x-error for="category_id" />
        </div>

        <div class="flex items-center space-x-4 mb-4">
            <div class="flex-1">
                <label for="imagen" class="block text-sm font-medium text-gray-700">Actualizar Imagen</label>
                <input type="file" id="imagen" name="imagen" accept="image/*" oninput="preview.src=window.URL.createObjectURL(this.files[0])"
                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            </div>
            <div class="w-24 h-24 border rounded-lg overflow-hidden bg-gray-50">
                <img id="preview" src="{{ $product->imagen ? Storage::url($product->imagen) : Storage::url('images/defaultimage.png') }}" alt="Vista previa" class="w-full h-full object-cover">
            </div>
        </div>

        <!-- Botones -->
        <div class="flex justify-between">
            
            <!-- Botón Cancelar -->
            <a href="{{ route('products.index') }}" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                Cancelar
            </a>

            <!-- Botón Aceptar -->
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                Editar
            </button>

        </div>
    </form>
</div>
@endsection
