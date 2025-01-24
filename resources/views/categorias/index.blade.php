@extends('plantillas.base')

@section('titulo')
Inicio Categorias
@endsection

@section('cabecera')
Categorias
@endsection

@section('contenido')

<div class="1/2 p-4 m-auto">
<div class="flex flex-row mb-2">
    <a href="{{route('categories.create')}}" class="p-2 rounded-xl text-white bg-red-400 hover:bg-red-600">
        <i class="fas fa-add mr-2"></i>Añadir Categoria
    </a>
</div>
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-red-600 uppercase bg-red-200">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Color
                </th>
                <th scope="col" class="px-6 py-3">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $item)
            <tr class="bg-white border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{$item->nombre}}
                </th>
                <td class="px-6 py-4">
                    <div class="px-4 py-2 rounded-xl text-white font-bold text-center" style="background-color:{{$item->color}};">{{$item->color}}</div>
                </td>
                <td class="px-2 py-1 text-center">
                    <form action="{{route('categories.destroy', $item)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type='submit'>
                            <i class="fas fa-trash text-lg hover:text-red-400"></i>
                        </button>
                        <a href="{{route('categories.edit', $item)}}">
                            <i class="fas fa-edit text-lg hover:text-green-400 ml-4"></i>
                        </a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection

@section('alertas')
    <x-alertas/>
@endsection
