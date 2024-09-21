<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Requests\ProductoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductoController extends Controller
{
    //
    public function index(Request $request){
        $productos = Producto::paginate();
        return view('producto.index',compact('productos'))->with('i',($request->input('page', 1) - 1) * $productos->perPage());

    }


    public function  show($id): View{
        $producto = Producto::find($id);
        return view('producto.show',compact('producto'));
    }

    public function  create(): View{
        $producto =new Producto();
        return view('producto.create',compact('producto'));
    }

    public function store(ProductoRequest $request): RedirectResponse
    {
        Producto::create($request->validated());

        return Redirect::route('producto.index')->with('success', 'Producto created successfully.');;
    }

    public function edit($id): View
    {
        $producto = Producto::find($id);

        return view('producto.edit', compact('producto'));
    }

    public function update(ProductoRequest $request, Producto $producto): RedirectResponse
    {
        $producto->update($request->validated());

        return Redirect::route('producto.index')
            ->with('success', 'Producto updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Producto::find($id)->delete();

        return Redirect::route('producto.index')
            ->with('success', 'Producto deleted successfully');
    }


}


