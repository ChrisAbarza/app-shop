<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(){
    	$categories = Category::orderBy('name')->paginate(10);
    	return view('admin.categories.index')->with(compact('categories')); // listado
    }

    public function create(){
    	
    	return view('admin.categories.create'); //formulario
    }

    public function store(Request $request){
    	//dd($request->all()); //mostrar en pantalla

    	//nueva forma de definir las reglas de validacion, ahora estan en el modelo categoria
    	$this->validate($request, Category::$rules, Category::$messages);

    	//nueva forma de insertar, valores definidos en modelo. producto se maneja normal
    	Category::create($request->all()); //mass asigned

    	return redirect('/admin/categories');
    }

    public function edit(Category $category){
    	
    	return view('admin.categories.edit')->with(compact('category')); //formulario
    }

    public function update(Request $request, Category $category){
    	//dd($request->all()); //mostrar en pantalla

    	$this->validate($request, Category::$rules, Category::$messages);

    	$category->update($request->all());

    	return redirect('/admin/categories');
    }

    public function destroy(Category $category){
    	//dd($request->all()); //mostrar en pantalla
    	$category->delete();

    	return back();
    }
}
