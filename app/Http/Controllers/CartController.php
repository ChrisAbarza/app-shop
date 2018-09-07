<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\carbon;
class CartController extends Controller
{
    public function update()
    {
    	$cart = auth()->user()->cart;
    	$cart->status = 'pending';
    	$cart->order_date = Carbon::now();
    	$cart->save();

    	$notification = 'Tu pedido se encuentra en proceso de aprobacion, favor esperar.';

    	return back()->with(compact('notification'));
    }
}
