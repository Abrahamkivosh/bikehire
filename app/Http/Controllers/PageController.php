<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use Illuminate\Http\Request;
use PhpOption\None;

class PageController extends Controller
{
    //constructor with items in cart
    public function __construct()
    {
        
    }
    //
    public function index()
    {
        // count items in cart session
       $cartCount = $this->countItemsInCart();
       
        
        $bikes = Bike::query()->with('brand')->get();
        return view('welcome', compact('bikes','cartCount'));
    }
    public function show(Bike $bike)
    {
        $cartCount = $this->countItemsInCart();
        return view('bike', compact('bike','cartCount'));
    }
    public function addToCart(Bike $bike)
    {
        $cart = session()->get('cart');

        // check if cart is empty
        if (empty($cart)){
            $cart[] = [
                "id" => $bike->id,
                "name" => $bike->name,
                "color"=> $bike->color,
                "quantity" => 1,
                "price_per_hour" =>  $bike->price_per_hour,
                "image" => $bike->image
            ];
            session()->put('cart', $cart);

        }else{
            $cartItemIds = [];
            foreach ($cart as $key => $cartItem) {
                $cartItemIds[] = $cartItem['id'];
                
            }
            // check if $bike->id is in  $cartItemIds
            if (in_array($bike->id, $cartItemIds)){
                // if it is, increment quantity
                foreach ($cart as $key => $cartItem) {
                    if ($bike->id == $cartItem['id']){
                        $cart[$key]['quantity']++;
                    }
                }
                session()->put('cart', $cart);
              
            }else{
                $cart[] = [
                    "id" => $bike->id,
                    "name" => $bike->name,
                    "color"=> $bike->color,
                    "quantity" => 1,
                    "price_per_hour" =>  $bike->price_per_hour,
                    "image" => $bike->image
                ];
                session()->put('cart', $cart);

            }

        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    
     
    }

    protected function countItemsInCart()
    {
        $cart = session()->get('cart');
        $count = 0;
        if (empty($cart)){
            return $count;
        }else{
            foreach ($cart as $key => $cartItem) {
                $count += $cartItem['quantity'];
            }
        }
      
        return $count;
    }

    public function cart()
    {
        $cartCount = $this->countItemsInCart();
        $cart = session()->get('cart');
        return view('cart', compact('cartCount','cart'));
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Cart is cleared!');
    }

}
