<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;

class CartDetailController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request){
    	$cartDetail = new CartDetail();
    	$cartDetail->cart_id = auth()->user()->cart->id;
    	$cartDetail->product_id = $request->product_id;
    	$cartDetail->quantity = $request->quantity;
    	$cartDetail->save();
        $notification = "Producto agregado al carrito de compras.";   
    	return back()->with(compact('notification'));
    }

    public function destroy(Request $request)
    {
    	$cartDetail = CartDetail::find($request->cart_detail_id);

    	if ($cartDetail->cart_id == auth()->user()->cart->id) {
    		$cartDetail->delete();
    		$notification = "Producto eliminado del carrito de compras.";
    	}else{
    		$notification = "ERROR";
    	}
    	return back()->with(compact('notification'));
    }
}