<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductsController extends Controller
{
    public function index(){
        return view('product.index')->with('products', Product::all());
    }

    public function create(){
        return view('product.create')->with('categories', Category::all());
    }

    public function store(Request $request){
        dd($request);
        // if($request->image){
            // $image = $request->file('image')->store('product');
            // $image = 'storage/'.$image;            
        // }else{
            // $image = 'storage/product/produto-sem-imagem.gif';
        // }
// 
        // Product::create([
            // 'name' => $request->name,
            // 'description' => $request->description,
            // 'price'=>$request->price,
            // 'category_id' => $request->category_id,
            // 'image' => $image
        // ]);
        // dd($image);
        // session()->flash('success', 'Produto cadastrado com sucesso!');
        // return redirect(route('product.index'));

    }

    public function edit(Product $product){
        // dd($product); //ele recebe aqui
        return view('product.edit')->with(['product'=>$product, 'categories'=>Category::all()]);
    }

    public function update(Request $request, Product $product){
        $product->update($request->all());
        session()->flash('success', 'Produto foi editado');
        return redirect(route('product.index'));
    }

    public function destroy(Product $product){
        $product->delete();
        session()->flash('success', 'Produto foi apagado');
        // redirect(route('alert','success'));
        // return redirect(route('product.index'));
        return redirect(route('product.trash')); 
    }
    public function trash(){
        return view('product.trash')->with('products', Product::onlyTrashed()->get());
    }
    public function restore($id){
        $product = Product::onlyTrashed()->where('id',$id)->firstOrFail();
        $product->restore();
        session()->flash('success', 'Produto restaurado com sucesso!');
        return redirect(route('product.restore'));        
    }
    // public function show(Product $product)
    // {
    //     return redirect(route('product.index'));        
    // }
}
