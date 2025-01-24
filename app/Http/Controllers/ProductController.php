<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Product::orderBy('nombre')->paginate(4);
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Category::all();
        return view('productos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->rules());
        Product::create([
            'nombre' => $request['nombre'],
            'descripcion' => $request['descripcion'],
            'stock' => $request['stock'],
            'imagen' => ($request->imagen) ? $request->imagen->store('images') :'images/defaultimage.png',
            'category_id' => $request->input('category_id'),
        ]);

        return redirect()->route('products.index')->with('mensaje', 'Producto añadido.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categorias = Category::all();
        return view('productos.edit', compact('product', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate($this->rules($product->id));

        $img = $product->imagen;

        $product->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'imagen' => ($request->imagen) ? $request->imagen->store('images/products') : $img
        ]);

        if ($request->imagen && basename($img) != 'defaultimage.png') {
            Storage::delete($img);
        }

        return redirect()->route('products.index')->with('mensaje', 'Producto actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if(basename($product->imagen)!='defaultimage.png') Storage::delete($product->imagen);
        $product->delete();
        return redirect()->route('products.index')->with('mensaje', 'Producto eliminado');
    }

    public function rules(?int $id = null): array{
        return[
            'nombre' => ['required', 'string', 'min:3', 'max:50', 'unique:products,nombre,'.$id],
            'descripcion' => ['required', 'string', 'min:5', 'max:250'],
            'stock' => ['required', 'integer', 'min:0'],
            'category_id' => ['required', 'exists:categories,id'],
            'imagen' => ['image', 'max:2048'],
        ];
    }


}
