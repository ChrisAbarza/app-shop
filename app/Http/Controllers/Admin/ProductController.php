<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(){
    	$products = Product::paginate(10);
    	return view('admin.products.index')->with(compact('products')); // listado
    }

    public function create(){
    	$categories = Category::orderBy('name')->get();
    	return view('admin.products.create')->with(compact('categories')); //formulario
    }

    public function store(Request $request){
    	//dd($request->all()); //mostrar en pantalla
    	$messages = [
    		'name.required' => 'Es necesario ingresar el nombre del producto',
    		'name.min' => 'El nombre debe contener al menos 3 caracteres'
    	];
    	$rules = [
    		'name' => 'required|min:3',
    		'description' => 'required|max:200',
    		'price' => 'required|numeric|min:0',
    	];

    	$this->validate($request,$rules,$messages);

    	$product = new Product();
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->category_id = $request->input('category_id');
    	$product->price = $request->input('price');
    	$product->long_description = $request->input('long_description'); 
    	$product->save();

    	return redirect('/admin/products');
    }

    public function edit($id){
    	$product = Product::find($id);
        $categories = Category::orderBy('name')->get();
    	
    	return view('admin.products.edit')->with(compact('product','categories')); //formulario
    }

    public function update(Request $request, $id){
    	//dd($request->all()); //mostrar en pantalla

    	$messages = [
    		'name.required' => 'Es necesario ingresar el nombre del producto',
    		'name.min' => 'El nombre debe contener al menos 3 caracteres'
    	];
    	$rules = [
    		'name' => 'required|min:3',
    		'description' => 'required|max:200',
    		'price' => 'required|numeric|min:0',
    	];

    	$this->validate($request,$rules,$messages);
    	$product = Product::find($id);
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->category_id = $request->input('category_id');
    	$product->price = $request->input('price');
    	$product->long_description = $request->input('long_description'); 
    	$product->save();

    	return redirect('/admin/products');
    }

    public function destroy($id){
    	//dd($request->all()); //mostrar en pantalla
    	$product = Product::find($id);
    	$product->delete();

    	return back();
    }
}
