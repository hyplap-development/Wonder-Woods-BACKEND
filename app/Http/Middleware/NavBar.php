<?php

namespace App\Http\Middleware;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Wishlist;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NavBar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userId = isset(Auth::user()->id) ? Auth::user()->id : 0;

        $categories = Category::where('deleteId', 0)->where('status', 1)->get();

        $carts = Cart::where('userId', $userId)->with('products')->get();

        $wishlist = Wishlist::where('userId', $userId)->count();

        config(['categories' => $categories]);
        config(['carts' => $carts]);
        config(['wishlist' => $wishlist]);

        return $next($request);
    }
}
