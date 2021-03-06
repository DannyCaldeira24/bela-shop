<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\User;
use App\Mail\NewOrder;

class CartController extends Controller
{
    public function update(){
    	$cart=auth()->user()->cart;
    	$cart->status='Pendiente';
    	$cart->order_date= date("D").', '.date("d").'/'.date("m").'/'.date("Y").' '.date("H").':'.date("i").'.'.date("s").' '.date("a");  
    	$user=auth()->user();
        $admins=User::where('admin',true)->get();
    	Mail::to($admins)->send(new NewOrder($user,$cart));
    	$cart->save(); //UPDATE
    	$notification='Tu pedido se ha registrado correctamente. Te contactaremos pronto vía mail!';
    	return back()->with(compact('notification'));
    }
}
