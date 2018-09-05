<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	public static $messages = [
		'name.required' => 'Es necesario ingresar el nombre de la categoria',
		'name.min' => 'El nombre debe contener al menos 3 caracteres'
	];
	public static $rules = [
		'name' => 'required|min:3',
		'description' => 'max:250',
	];

	protected $fillable = ['name', 'description'];
	
    public function products(){

    	return $this->hasMany(Product::class);
    }

     public function getFeaturedImageUrlAttribute(){

    	$featuredProduct = $this->products()->first();
    	return $featuredProduct->featured_image_url;
    }
}
