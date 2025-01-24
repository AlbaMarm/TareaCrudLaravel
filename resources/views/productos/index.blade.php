@extends('plantillas.base')

@section('titulo')
Inicio Productos
@endsection

@section('cabecera')
Productos
@endsection

@section('contenido')
<div class="p-4 m-auto">
    <div class="mb-4 ml-40">
        <a href="{{route('products.create')}}" class="p-2 rounded-xl text-white bg-red-400 hover:bg-red-600">
            <i class="fas fa-add mr-2"></i>Añadir Producto
        </a>
    </div>

    <div class="flex justify-center">
        <div class="w-full max-w-4xl">
            <table class="w-full text-sm text-center text-gray-500 border border-gray-200">
                <thead class="text-xs text-red-600 uppercase bg-red-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Imagen
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Descripción
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Stock
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Categoría
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $item)
                    <tr class="bg-white border-b">
                        <td class="px-3 py-3">
                            <img class="w-32 h-15 rounded object-cover mx-auto" src="{{ Storage::url($item->imagen) }}" alt="Producto">
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{$item->nombre}}
                        </td>
                        <td class="px-6 py-4 text-gray-900">
                            {{$item->descripcion}}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{$item->stock}}
                        </td>
                        <td class="px-6 py-4">
                            <div class="p-2 rounded-xl text-center text-white font-bold" style="background-color:{{$item->category->color}}">
                                {{$item->category->nombre}}
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <form action="{{route('products.destroy', $item)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type='submit'>
                                <i class="fas fa-trash text-lg hover:text-red-400"></i>
                            </button>
                            <a href="{{route('products.edit', $item)}}">
                                <i class="fas fa-edit text-lg hover:text-green-400 ml-4"></i>
                            </a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $productos->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('alertas')
<x-alertas />
@endsection
