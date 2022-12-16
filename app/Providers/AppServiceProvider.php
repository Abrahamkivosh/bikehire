<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $cart = session()->get('cart');
        $cartCount = $this->countItemsInCart($cart);
        
        view()->share('cartCount', $cartCount);
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
}
