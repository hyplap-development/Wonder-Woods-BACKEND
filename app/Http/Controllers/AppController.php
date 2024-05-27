<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Room;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function welcome()
    {
        try {
            $selectedAddress = Address::where('userId', config('app.userId'))->where('default', 1)->first();
            $categories = Category::where(['deleteId' => 0], ['status' => 1])->get();
            $banners = Banner::where(['status' => 1])->get();
            $rooms = Room::where(['deleteId' => 0], ['status' => 1])->get();
            $products = Product::where(['deleteId' => 0], ['status' => 1])
                ->with('color', 'size')
                ->limit(10)->get();


            return response()->json([
                'status' => 200,
                'data' => [
                    'selectedAddress' => $selectedAddress,
                    'categories' => $categories,
                    'banners' => $banners,
                    'rooms' => $rooms,
                    'products' => $products,
                ]
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'message' => $th->getMessage()
            ]);
        }
    }
}
