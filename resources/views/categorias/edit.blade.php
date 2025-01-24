@extends('plantillas.base')

@section('titulo')
Añadir categorias
@endsection

@section('cabecera')
Nueva Categoria
@endsection

@section('contenido')
<div class="bg-white w-1/2 p-4 m-auto rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4 text-red-500">Añadir Categoría</h2>
    <form action="{{ route('categories.update', $category) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Campo Nombre -->
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-medium mb-2">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{old('nombre', $category->nombre)}}" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="Escribe una categoria...">
            <x-error for="nombre"/>
        </div>
        
        <!-- Campo Color -->
        <div class="mb-4">
            <label for="color" class="block text-gray-700 font-medium mb-2">Color</label>
            <input type="color" name="color" id="color" value="{{old('color', $category->color)}}" class="w-16 h-10 border-none cursor-pointer">
            <x-error for="color"/>
        </div>

        <!-- Botones -->
        <div class="flex justify-between">
            
            <!-- Botón Cancelar -->
            <a href="{{ route('categories.index') }}" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
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
