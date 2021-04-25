<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
  public function index(){
    return view('category.index')->with('categories', Category::all());
  }
  
  public function create(){
    return view('category.create');
  } 
  public function store(Request $request){
    Category::create($request->all());
    session()->flash('success', 'Categoria cadastrado com sucesso!');
    return redirect(route('category.index'));
  }
  public function destroy(Category $category){
    $category->delete();
    session()->flash('success', 'Categoria apagada, tá feliz agora?');
    // redirect(route('alert','success'));
    return redirect(route('category.index'));
  }
  public function edit(Category $category){ //aqui visualiza 
        // dd($category); //ele recebe aqui
        return view('category.edit')->with('category', $category);
    }

  public function update(Request $request,Category $category){
      $category->update($request->all());
      session()->flash('success', 'Produto foi editado');
      return redirect(route('category.index'));
  }
}
