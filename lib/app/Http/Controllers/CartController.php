<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Products;
use Mail;

class CartController extends Controller
{
    public function getAddCart($id)
    {

    	$product = Products::find($id);
    	Cart::add(['id' => $id , 'name' => $product->pro_name ,'price' => $product->pro_price ,'weight' => 1 , 'qty' => 1 , 'options' => ['img' => $product->pro_img]]);
    	return redirect()->intended('cart/show');
    }

    public function showCart()
    {

    	$data['total'] = Cart::total();
    	$data['items'] = Cart::content();
    	return view('frontend.cart',$data);
    }

    public function deleteCart($id)
    {
    	
    	if ($id == 'all') {
			
			Cart::destroy(); 		
    	} else {

    		Cart::remove($id);

    	}

    	return back();
    }

    public function updateCart(Request $request)
    {

    	Cart::update($request->rowId , $request->qty);
    	
    }

    public function postMail(Request $request)
    {

    	 $data['total'] = Cart::total();
    	 $data['item'] = $request->all();
    	 $email = $request->email;
    	 $data['info'] = Cart::content();
    	 Mail::send('frontend.email', $data, function($message) use ($email){

    	 	$message->from('ttmfmmtmt@gmail.com','Lam nguyen');
    	 	$message->to($email,$email);
    	 	$message->subject('Xac nhan mua hang');

    	 });
    	 Cart::destroy();
    	 return redirect()->intended('cart/complete');
    }

    public function complete()
    {

    	return view('frontend.complete');
    }
}
