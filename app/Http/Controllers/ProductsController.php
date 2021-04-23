<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index(){
        return view('product.index')->with('products', Product::all());
    }

    public function create(){
        return view('product.create');
    }

    public function store(Request $request){
        Product::create($request->all());
        session()->flash('success', 'Produto cadastrado com sucesso!');
        return redirect(route('product.index'));
    }

    public function edit(Product $product){
        // dd($product); //ele recebe aqui
        return view('product.edit')->with('product', $product);
    }

    public function update(Request $request,Product $product){
        $product->update($request->all());
        session()->flash('success', 'Produto foi editado');
        return redirect(route('product.index'));
    }
}
