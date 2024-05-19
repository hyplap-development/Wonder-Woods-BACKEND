<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Banner;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Compare;
use App\Models\Enquiries;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WebController extends Controller
{
    public function index()
    {

        $userId = isset(Auth::user()->id) ? Auth::user()->id : 0;

        $categories = Category::where('deleteId', 0)->where('status', 1)->inRandomOrder()->limit(8)->get();
        // return $categories;
        $products = Product::where('deleteId', 0)->where('status', 1)->with('category')->inRandomOrder()->limit(10)->get();
        $cart = Cart::where('userId', $userId)->pluck('productId')->toArray();
        $wishlist = Wishlist::where('userId', $userId)->pluck('productId')->toArray();
        $compare = Compare::where('userId', $userId)->pluck('productId')->toArray();
        $banners = Banner::where('status', 1)->get();

        return view('web.index', compact('categories', 'products', 'cart', 'wishlist', 'compare', 'banners'));
    }

    // Category

    public function indexCategory()
    {
        $categories = Category::where('deleteId', 0)->where('status', 1)->get();

        return view('web.category', compact('categories'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $products = Product::where('deleteId', 0)->where('status', 1)->where('categoryId', $category->id)->orderBy('id', 'Desc')->get();

        return view('web.categorySingle', compact('category', 'products'));
    }

    // Product
    public function product($slug)
    {
        $userId = isset(Auth::user()->id) ? Auth::user()->id : 0;
        $product = Product::where('slug', $slug)->with('productimages')->with('company')->first();
        $products = Product::where('deleteId', 0)->where('status', 1)->where('categoryId', $product->categoryId)->inRandomOrder()->limit(3)->get();

        $cart = Cart::where('userId', $userId)->pluck('productId')->toArray();
        $wishlist = Wishlist::where('userId', $userId)->pluck('productId')->toArray();
        $compare = Compare::where('userId', $userId)->pluck('productId')->toArray();
        return view('web.productSingle', compact('product', 'products', 'cart', 'wishlist', 'compare'));
    }

    // Wishlist
    public function indexWishlist()
    {
        $items = Wishlist::where('userId', Auth::user()->id)->with(['products' => function ($q) {
            $q->with('company');
        }])->get();
        //  return $items;
        return view('web.wishlist', compact('items'));
    }

    public function addToCart($id)
    {
        $wishlist = Wishlist::find($id);

        if (!Cart::where('productId', $wishlist->productId)->exists()) {

            $cart = new Cart();
            $cart->userId = Auth::user()->id;
            $cart->productId = $wishlist->productId;
            $cart->qty = 1;

            $cart->save();
        }
        $wishlist->delete();

        return redirect()->back();
    }

    public function manageWishlist(Request $request)
    {
        $productId = $request->productId;

        if (Wishlist::where('userId', Auth::user()->id)->where('productId', $productId)->exists()) {
            Wishlist::where('userId', Auth::user()->id)->where('productId', $productId)->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Product removed from your wishlist'
            ]);
        } else {
            $model = new Wishlist();
            $model->userId = Auth::user()->id;
            $model->productId = $productId;
            $model->save();

            return response()->json([
                'status' => 200,
                'message' => 'Product added to your wishlist'
            ]);
        }
    }

    // Cart
    public function indexCart()
    {
        $items = Cart::where('userId', Auth::user()->id)->with(['products' => function ($q) {
            $q->with('company');
        }])->get();
        // return $items;
        return view('web.cart', compact('items'));
    }

    public function proAddToCart(Request $request)
    {
        $productId = $request->productId;
        $qty = $request->qty;

        $model = new Cart();
        $model->userId = Auth::user()->id;
        $model->productId = $productId;
        $model->qty = $qty;
        $model->save();

        return response()->json([
            'status' => 200,
            'message' => 'Product added to your cart'
        ]);
    }

    public function manageCart(Request $request)
    {
        $productId = $request->productId;

        if (Cart::where('userId', Auth::user()->id)->where('productId', $productId)->exists()) {
            Cart::where('userId', Auth::user()->id)->where('productId', $productId)->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Product removed from your cart'
            ]);
        } else {
            $model = new Cart();
            $model->userId = Auth::user()->id;
            $model->productId = $productId;
            $model->qty = 1;
            $model->save();

            return response()->json([
                'status' => 200,
                'message' => 'Product added to your cart'
            ]);
        }
    }

    public function increaseCartCount($id)
    {
        $cart = Cart::find($id);
        $cart->qty = $cart->qty + 1;
        $cart->save();
        return response()->json([
            'status' => 200,
            'message' => 'Cart count increased'
        ]);
    }

    public function decreaseCartCount($id)
    {
        $cart = Cart::find($id);
        if ($cart->qty > 1) {
            $cart->qty = $cart->qty - 1;
            $cart->save();
            return response()->json([
                'status' => 200,
                'message' => 'Cart count decreased'
            ]);
        } else {

            $cart->delete();

            return response()->json([
                'status' => 201,
                'message' => 'Cart deleted'
            ]);
        }
    }

    public function deleteCartItem($id)
    {
        $cart = Cart::find($id);
        $cart->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Cart deleted'
        ]);
    }

    // Enquiry
    public function submitEnquiry(Request $request)
    {

        if (Enquiries::where('email', $request->email)->where('status', 'Pending')->exists() || Enquiries::where('phone', $request->phone)->where('status', 'Pending')->exists()) {
            return response()->json([
                'status' => 201,
                'message' => 'You already have a pending enquiry'
            ]);
        }

        $model = new Enquiries();
        $model->name = $request->name;
        $model->email = $request->email;
        $model->phone = $request->phone;
        $model->subject = $request->subject;
        $model->message = $request->message;
        $model->status = 'Pending';
        $model->save();

        return response()->json([
            'status' => 200,
            'message' => 'Enquiry submitted successfully'
        ]);
    }

    // Comparison
    public function indexComparison()
    {

        $compareProducts = Compare::where('userId', Auth::user()->id)->with(['products' => function ($query) {
            $query->with('category');
        }])->get();

        // return $compareProducts;
        return view('web.compare', compact('compareProducts'));
    }

    public function manageComparison(Request $request)
    {
        $productId = $request->productId;

        if (Compare::where('userId', Auth::user()->id)->exists()) {
            if (Compare::where('userId', Auth::user()->id)->where('productId', $productId)->exists()) {
                Compare::where('userId', Auth::user()->id)->where('productId', $productId)->delete();

                return response()->json([
                    'status' => 200,
                    'message' => 'Product removed from your comparison'
                ]);
            } else {
                if (Compare::where('userId', Auth::user()->id)->count() < 3) {
                    $model = new Compare();
                    $model->userId = Auth::user()->id;
                    $model->productId = $productId;
                    $model->save();

                    return response()->json([
                        'status' => 200,
                        'message' => 'Product added to your comparison'
                    ]);
                } else {
                    return response()->json([
                        'status' => 201,
                        'message' => 'You can only compare 3 products'
                    ]);
                }
            }
        } else {
            $model = new Compare();
            $model->userId = Auth::user()->id;
            $model->productId = $productId;
            $model->save();

            return response()->json([
                'status' => 200,
                'message' => 'Product added to your comparison'
            ]);
        }
    }

    // Profile
    public function indexProfile()
    {
        $transactions = Transaction::where('userId', 1)->with(['orders' => function ($query) {
            $query->with('product');
        }])->get();

        //  return $transactions;
        return view('web.profileDashboard', compact('transactions'));
    }

    public function indexOrder()
    {
        $transactions = Transaction::where('userId', Auth::user()->id)->with(['orders' => function ($query) {
            $query->with('product.company');
        }])->get();

        // return $transactions;
        return view('web.orders', compact('transactions'));
    }

    public function indexEditProfile()
    {
        $user = User::find(Auth::user()->id);
        return view('web.editProfile', compact('user'));
    }

    public function saveProfile(Request $request){
        $model = User::find(Auth::user()->id);
        if($request->email != $model->email){
            Auth::logout();
        }
        $model->name = $request->name;
        $model->email = $request->email;
        $model->phone = $request->phone;


        $model->save();


        Session()->flash('alert-success', "Profile Updated Successfully");
        return redirect()->back();
    }

    public function indexChangePassword()
    {
        return view('web.changePassword');
    }

    public function savePassword(Request $request)
    {
        $model = User::find(Auth::user()->id);

        if (!Hash::check($request->oldPassword, $model->password)) {
            Session()->flash('alert-danger', "Old Password is Incorrect");
            return redirect()->back();
        }
        $model->password = Hash::make($request->password);
        $model->update();

        Session()->flash('alert-success', "Password Updated Successfully");
        return redirect()->back();
    }

    // Checkout

    public function indexCheckout()
    {
        $homeAddress = Address::where('userId', Auth::user()->id)->where('tag', 'home')->first();
        $otherAddresses = Address::where('userId', Auth::user()->id)->where('tag', 'other')->get();
        $items = Cart::where('userId', Auth::user()->id)->with(['products' => function ($q) {
            $q->with('company');
        }])->get();
        return view('web.checkout', compact('homeAddress', 'otherAddresses', 'items'));
    }

    public function addNewAddress(Request $request)
    {
        if ($request->tag == 'home') {
            Address::where('userId', Auth::user()->id)->where('tag', 'home')->update(['tag' => 'other']);
        }

        $model = new Address();
        $model->userId = Auth::user()->id;
        $model->address1 = $request->address1;
        $model->address2 = $request->address2;
        $model->state = $request->state;
        $model->city = $request->city;
        $model->pincode = $request->pincode;
        $model->tag = $request->tag;
        $model->save();

        return redirect()->back();
    }

    public function confirmOrder(Request $request)
    {
        // return Request()->all();

        $address = Address::find($request->address);

        $trx = new Transaction();
        $trx->userId = Auth::user()->id;
        $trx->name = Auth::user()->name;
        $trx->email = Auth::user()->email;
        $trx->phone = Auth::user()->phone;
        $trx->address1 = $address->address1;
        $trx->address2 = $address->address2;
        $trx->state = $address->state;
        $trx->city = $address->city;
        $trx->pincode = $address->pincode;
        $trx->total = $request->totalMrp - $request->totalDiscount;
        $trx->grandTotal = $request->totalMrp;
        $trx->orderStatus = 'In Process';
        $trx->save();

        $items = Cart::where('userId', Auth::user()->id)->get();

        foreach ($items as $item) {
            $order = new Order();
            $order->trxId = $trx->id;
            $order->productId = $item->productId;
            $order->qty = $item->qty;
            $order->name = $item->products->name;
            $order->discountedPrice = $item->products->discountedPrice;
            $order->save();
        }

        Cart::where('userId', Auth::user()->id)->delete();
        return redirect('checkout/thankyou');
    }

    public function thankyou()
    {
        return view('web.thankyou');
    }
}
