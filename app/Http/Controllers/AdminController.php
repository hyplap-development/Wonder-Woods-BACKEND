<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Color;
use App\Models\Company;
use App\Models\Compare;
use App\Models\Enquiries;
use App\Models\Gst;
use App\Models\Log;
use App\Models\Order;
use App\Models\Product;
use App\Models\Productimages;
use App\Models\Productrating;
use App\Models\Role;
use App\Models\Room;
use App\Models\Size;
use App\Models\Subcategory;
use App\Models\Testimonial;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wishlist;
use Barryvdh\DomPDF\PDF;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Pdf as WriterPdf;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Illuminate\Support\Str;

class AdminController extends Controller
{

    // logs
    public function indexLog()
    {
        $logs = Log::with('user')->orderBy('id', 'desc')->get();
        return view('admin.log', compact('logs'));
    }

    // Common Functions

    public function checkEmail(Request $request)
    {
        $data = User::where('email', $request->email)->where('deleteId', 0)->first();
        if ($data) {
            return response()->json([
                'status' => 200,
                'data' => $data,
                'message' => 'Email Already Exist',
            ]);
        } else {
            return response()->json([
                'status' => 201,
                'data' => $data,
                'message' => 'Email Not Exist',
            ]);
        }
    }

    public function checkPhone(Request $request)
    {
        $data = User::where('phone', $request->phone)->where('deleteId', 0)->first();
        if ($data) {
            return response()->json([
                'status' => 200,
                'data' => $data,
                'message' => 'Phone Already Exist',
            ]);
        } else {
            return response()->json([
                'status' => 201,
                'data' => $data,
                'message' => 'Phone Not Exist',
            ]);
        }
    }

    public function checkCatName(Request $request)
    {
        $data = Category::where('name', $request->name)->where('deleteId', 0)->first();
        if ($data) {
            return response()->json([
                'status' => 200,
                'data' => $data,
                'message' => 'Category Already Exist',
            ]);
        } else {
            return response()->json([
                'status' => 201,
                'data' => $data,
                'message' => 'Category Not Exist',
            ]);
        }
    }

    public function checkSubCatName(Request $request)
    {
        $data = Category::where('name', $request->name)->where('deleteId', 0)->first();
        if ($data) {
            return response()->json([
                'status' => 200,
                'data' => $data,
                'message' => 'Sub Category Already Exist',
            ]);
        } else {
            return response()->json([
                'status' => 201,
                'data' => $data,
                'message' => 'Sub Category Not Exist',
            ]);
        }
    }

    // Dashboard

    public function indexAdmin()
    {
        return view('admin.dashboard');
    }

    // Reset Pass

    public function resetPassIndex()
    {
        return view('resetPass');
    }

    public function resetPass(Request $request)
    {
        $model = User::where(['phone' => $request->phone])->first();

        if (Hash::check($request->oldpass, $model->password)) {
            if ($request->newpass == $request->confirmpass) {
                $model->password = Hash::make($request->newpass);
                $model->update();
                Auth::logout();
                return redirect('/login');
            }
        }
    }

    // User Controller

    public function indexUser()
    {
        $adminPanelRoles = ['admin', 'manager'];
        $user = User::where('deleteId', 0)->whereIn('role', $adminPanelRoles)->with('rolee')->get();
        $roles = Role::whereIn('slug', $adminPanelRoles)->get();
        return view('admin.master.user', compact('user', 'roles'));
    }

    public function addUser(Request $request)
    {

        $model = new User;

        $uploadpath = 'media/images/users';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $final_name = time() . $image_name;
            $image->move($uploadpath, $final_name);
            chmod('media/images/users/' . $final_name, 0777);
            $image_path = "media/images/users/" . $final_name;
        } else {
            $image_path = null;
        }

        $model->profileImage = $image_path;
        $model->name = $request->name;
        $model->email = $request->email;
        $model->phone = $request->phone;
        $model->password = Hash::make($request->password);
        $model->role = isset($request->role) ? $request->role : 'customer';
        $model->status = $request->status;
        $model->deleteId = 0;
        $model->save();
        Session()->flash('alert-success', "User Added Succesfully");
        return redirect()->back();
    }

    public function updateUser(Request $request)
    {
        $model = User::find($request->hiddenId);

        $uploadpath = 'media/images/users';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $final_name = time() . $image_name;
            $image->move($uploadpath, $final_name);
            chmod('media/images/users/' . $final_name, 0777);
            $image_path = "media/images/users/" . $final_name;
        } else {
            $image_path = User::find($request->hiddenId);
            $image_path = $image_path['image'];
        }

        $model->profileImage = $image_path;
        $model->name = $request->name;
        $model->email = $request->email;
        $model->phone = $request->phone;
        $model->role = isset($request->role) ? $request->role : 'customer';
        $model->status = $request->status;
        $model->update();
        Session()->flash('alert-success', "User Updated Succesfully");
        return redirect()->back();
    }

    public function deleteUser(Request $request)
    {
        $model = User::find($request->hiddenId);
        $model->deleteId = 1;
        $model->update();
        Session()->flash('message', 'User Deleted');
        Session()->flash('alert-success', "User Deleted Succesfully");
        return redirect()->back();
    }

    // Enduser controller
    public function indexEndUser()
    {
        $enduser = User::where('deleteId', 0)->whereIn('role', ['customer'])->with('rolee')->with('address')->get();
        return view('admin.master.enduser', compact('enduser'));
    }

    //************* Companies *************//
    public function indexCompany()
    {
        $companies = Company::where('deleteId', 0)->get();
        return view('admin.master.company', compact('companies'));
    }

    public function addCompany(Request $request)
    {
        $model = new Company();

        // add company image
        $uploadpath = 'media/images/company';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $final_name = time() . $image_name;
            $image->move($uploadpath, $final_name);
            chmod('media/images/company/' . $final_name, 0777);
            $image_path = "media/images/company/" . $final_name;
        } else {
            $image_path = null;
        }

        $model->logo = $image_path;
        $model->name = $request->name;
        $model->slug = Str::slug($request->name, '-');
        $model->status = $request->status;
        $model->deleteId = 0;
        $model->save();
        Session()->flash('alert-success', "Company Added Succesfully");
        return redirect()->back();
    }

    public function updateCompany(Request $request)
    {
        $model = Company::find($request->hiddenId);

        // update company Image
        $uploadpath = 'media/images/company';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $final_name = time() . $image_name;
            $image->move($uploadpath, $final_name);
            chmod('media/images/company/' . $final_name, 0777);
            $image_path = "media/images/company/" . $final_name;
        } else {
            if ($request->profile_avatar_remove == 1) {
                $image_path = null;
            } else {
                $image_path = $model['logo'];
            }
        }

        $model->logo = $image_path;
        $model->name = $request->name;
        $model->status = $request->status;
        $model->update();
        Session()->flash('alert-success', "Company Updated Succesfully");
        return redirect()->back();
    }

    public function deleteCompany(Request $request)
    {
        $productImageCount = 0;
        $model = Company::find($request->hiddenId);
        $model->deleteId = 1;

        $products = Product::where('companyId', $request->hiddenId)->get();
        foreach ($products as $product) {
            $this->deleteFile($product->image);
            $product->deleteId = 1;
            $product->update();

            $productImages = Productimages::where('productId', $product->id)->get();
            foreach ($productImages as $productImage) {
                $this->deleteFile($productImage->image);
                $productImage->delete();
                ++$productImageCount;
            }
        }

        $model->update();
        Session()->flash('alert-success', "Company Deleted Succesfully along with " . count($products) . " Products" . " and " . $productImageCount . " Product Images");
        return redirect()->back();
    }

    //************* Color *************//
    public function indexColor()
    {
        $colors = Color::where('deleteId', 0)->get();
        return view('admin.master.color', compact('colors'));
    }

    public function addColor(Request $request)
    {
        $model = new Color();
        $model->name = $request->name;
        $model->code = $request->color;
        $model->status = $request->status;
        $model->deleteId = 0;
        $model->save();
        Session()->flash('alert-success', "Color Added Succesfully");
        return redirect()->back();
    }

    public function updateColor(Request $request)
    {
        $model = Color::find($request->hiddenId);
        $model->name = $request->name;
        $model->code = $request->color;
        $model->status = $request->status;
        $model->update();
        Session()->flash('alert-success', "Color Updated Succesfully");
        return redirect()->back();
    }

    public function deleteColor(Request $request)
    {
        $model = Color::find($request->hiddenId);
        $model->deleteId = 1;
        $model->update();
        Session()->flash('alert-success', "Color Deleted Succesfully");
        return redirect()->back();
    }

    //************* Size *************//
    public function indexSize()
    {
        $sizes = Size::where('deleteId', 0)->get();
        return view('admin.master.size', compact('sizes'));
    }

    public function addSize(Request $request)
    {
        $model = new Size();
        $model->name = $request->name;
        $model->status = $request->status;
        $model->deleteId = 0;
        $model->save();
        Session()->flash('alert-success', "Size Added Succesfully");
        return redirect()->back();
    }

    public function updateSize(Request $request)
    {
        $model = Size::find($request->hiddenId);
        $model->name = $request->name;
        $model->status = $request->status;
        $model->update();
        Session()->flash('alert-success', "Size Updated Succesfully");
        return redirect()->back();
    }

    public function deleteSize(Request $request)
    {
        $model = Size::find($request->hiddenId);
        $model->deleteId = 1;
        $model->update();
        Session()->flash('alert-success', "Size Deleted Succesfully");
        return redirect()->back();
    }

    //************* Gst *************//
    public function indexGst()
    {
        $gsts = Gst::where('deleteId', 0)->get();
        return view('admin.master.gst', compact('gsts'));
    }

    public function addGst(Request $request)
    {
        $model = new Gst();
        $model->percent = $request->percent;
        $model->status = $request->status;
        $model->deleteId = 0;
        $model->save();
        Session()->flash('alert-success', "Gst Added Succesfully");
        return redirect()->back();
    }

    public function updateGst(Request $request)
    {
        $model = Gst::find($request->hiddenId);
        $model->percent = $request->percent;
        $model->status = $request->status;
        $model->update();
        Session()->flash('alert-success', "Gst Updated Succesfully");
        return redirect()->back();
    }

    public function deleteGst(Request $request)
    {
        $model = Gst::find($request->hiddenId);
        $model->deleteId = 1;
        $model->update();
        Session()->flash('alert-success', "Gst Deleted Succesfully");
        return redirect()->back();
    }

    //************* Room *************//
    public function indexRoom()
    {
        $rooms = Room::where('deleteId', 0)->get();
        return view('admin.master.room', compact('rooms'));
    }

    public function addRoom(Request $request)
    {
        $model = new Room();

        // add room image
        $uploadpath = 'media/images/room';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $final_name = time() . $image_name;
            $image->move($uploadpath, $final_name);
            chmod('media/images/room/' . $final_name, 0777);
            $image_path = "media/images/room/" . $final_name;
        } else {
            $image_path = null;
        }

        $model->name = $request->name;
        $model->image = $image_path;
        $model->status = $request->status;
        $model->deleteId = 0;
        $model->save();
        Session()->flash('alert-success', "Room Added Succesfully");
        return redirect()->back();
    }

    public function updateRoom(Request $request)
    {
        $model = Room::find($request->hiddenId);

        // update room image
        $uploadpath = 'media/images/room';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $final_name = time() . $image_name;
            $image->move($uploadpath, $final_name);
            chmod('media/images/room/' . $final_name, 0777);
            $image_path = "media/images/room/" . $final_name;
        } else {
            if ($request->profile_avatar_remove == 1) {
                $image_path = null;
            } else {
                $image_path = $model['image'];
            }
        }

        $model->name = $request->name;
        $model->image = $image_path;
        $model->status = $request->status;
        $model->update();
        Session()->flash('alert-success', "Room Updated Succesfully");
        return redirect()->back();
    }

    public function deleteRoom(Request $request)
    {
        $model = Room::find($request->hiddenId);
        $model->deleteId = 1;
        $model->update();
        Session()->flash('alert-success', "Room Deleted Succesfully");
        return redirect()->back();
    }

    //************* Category *************// 
    public function indexCategory()
    {
        $categories = Category::where('deleteId', 0)->get();
        return view('admin.master.category', compact('categories'));
    }

    public function addCategory(Request $request)
    {

        $model = new Category;

        $uploadpath = 'media/images/category';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $final_name = time() . $image_name;
            $image->move($uploadpath, $final_name);
            chmod('media/images/category/' . $final_name, 0777);
            $image_path = "media/images/category/" . $final_name;
        } else {
            $image_path = null;
        }

        $model->image = $image_path;
        $model->name = $request->name;
        $model->slug = Str::slug($request->name, '-');
        $model->status = $request->status;
        $model->deleteId = 0;
        $model->save();
        Session()->flash('alert-success', "Category Added Succesfully");
        return redirect()->back();
    }

    public function updateCategory(Request $request)
    {
        $model = Category::find($request->hiddenId);

        $uploadpath = 'media/images/category';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $final_name = time() . $image_name;
            $image->move($uploadpath, $final_name);
            chmod('media/images/category/' . $final_name, 0777);
            $image_path = "media/images/category/" . $final_name;
        } else {
            $image_path = Category::find($request->hiddenId);
            if ($request->profile_avatar_remove == 1) {
                $image_path = null;
            } else {
                $image_path = $image_path['image'];
            }
        }

        $model->image = $image_path;
        $model->name = $request->name;
        $model->slug = Str::slug($request->name, '-');
        if ($model->status == 0) {
            Product::where('categoryId', $request->hiddenId)->update(['status' => 0]);
        }
        $model->status = $request->status;
        $model->deleteId = 0;
        $model->update();
        Session()->flash('alert-success', "Category Updated Succesfully");
        return redirect()->back();
    }

    public function deleteCategory(Request $request)
    {
        $subcategoryCount = 0;
        $productCount = 0;

        $model = Category::find($request->hiddenId);
        $this->deleteFile($model->image);
        $model->deleteId = 1;

        $subcategories = Subcategory::where('categoryId', $request->hiddenId)->get();
        foreach ($subcategories as $value) {
            $this->deleteFile($value->image);
            $value->deleteId = 1;
            $value->update();
            ++$subcategoryCount;
        }

        $products = Product::where('categoryId', $request->hiddenId)->get();
        foreach ($products as $value) {
            $this->deleteFile($value->image);
            $value->deleteId = 1;
            $value->update();
            ++$productCount;
        }

        $model->update();
        Session()->flash('alert-success', "Category Deleted Succesfully along with " . $subcategoryCount . " Sub Categories and " . $productCount . " Products");
        return redirect()->back();
    }

    // ************* Sub Category *************//
    public function indexSubCategory()
    {
        $subcategories = Subcategory::where('deleteId', 0)->with('category')->get();
        $categories = Category::where('deleteId', 0)->where('status', 1)->get();
        return view('admin.master.subcategory', compact('subcategories', 'categories'));
    }

    public function addSubCategory(Request $request)
    {
        $model = new Subcategory;

        $uploadpath = 'media/images/subcategory';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $final_name = time() . $image_name;
            $image->move($uploadpath, $final_name);
            chmod('media/images/subcategory/' . $final_name, 0777);
            $image_path = "media/images/subcategory/" . $final_name;
        } else {
            $image_path = null;
        }

        $model->image = $image_path;
        $model->categoryId = $request->categoryId;
        $model->name = $request->name;
        $model->slug = Str::slug($request->name, '-');
        $model->status = $request->status;
        $model->deleteId = 0;
        $model->save();
        Session()->flash('alert-success', "Sub Category Added Succesfully");
        return redirect()->back();
    }

    public function updateSubCategory(Request $request)
    {
        $model = Subcategory::find($request->hiddenId);

        $uploadpath = 'media/images/subcategory';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $final_name = time() . $image_name;
            $image->move($uploadpath, $final_name);
            chmod('media/images/subcategory/' . $final_name, 0777);
            $image_path = "media/images/subcategory/" . $final_name;
        } else {
            $image_path = Category::find($request->hiddenId);
            if ($request->profile_avatar_remove == 1) {
                $image_path = null;
            } else {
                $image_path = $image_path['image'];
            }
        }

        $model->image = $image_path;
        $model->categoryId = $request->categoryId;
        $model->name = $request->name;
        $model->slug = Str::slug($request->name, '-');
        if ($model->status == 0) {
            Product::where('categoryId', $request->hiddenId)->update(['status' => 0]);
        }
        $model->status = $request->status;
        $model->deleteId = 0;
        $model->update();
        Session()->flash('alert-success', "Sub Category Updated Succesfully");
        return redirect()->back();
    }

    public function deleteSubCategory(Request $request)
    {
        $model = Subcategory::find($request->hiddenId);
        $model->deleteId = 1;
        Product::where('subCategoryId', $request->hiddenId)->update(['status' => 0]);
        $model->update();
        Session()->flash('alert-success', "Sub Category Deleted Succesfully");
        return redirect()->back();
    }

    // ************* Product *************//
    public function indexProduct()
    {
        // add product rating 
        $products = Product::where('deleteId', 0)->with('productimages', 'company', 'category', 'subcategory', 'color', 'size', 'room', 'gst')
            ->withCount([
                'ratings as oneStar' => function ($query) {
                    $query->where('rating', 1);
                },
                'ratings as twoStar' => function ($query) {
                    $query->where('rating', 2);
                },
                'ratings as threeStar' => function ($query) {
                    $query->where('rating', 3);
                },
                'ratings as fourStar' => function ($query) {
                    $query->where('rating', 4);
                },
                'ratings as fiveStar' => function ($query) {
                    $query->where('rating', 5);
                },
                'ratings as totalRatings'
            ])
            ->get();

        return view('admin.master.product', compact('products'));
    }

    public function indexAddProduct()
    {
        $companies = Company::where('deleteId', 0)->where('status', 1)->get();
        $categories = Category::where('deleteId', 0)->where('status', 1)->get();
        $subcategories = Subcategory::where('deleteId', 0)->where('status', 1)->get();
        $colors = Color::where('deleteId', 0)->where('status', 1)->get();
        $sizes = Size::where('deleteId', 0)->where('status', 1)->get();
        $gsts = Gst::where('deleteId', 0)->where('status', 1)->get();
        $rooms = Room::where('deleteId', 0)->where('status', 1)->get();

        return view('admin.master.productAdd', compact('categories', 'companies', 'subcategories', 'colors', 'sizes', 'gsts', 'rooms'));
    }

    public function addProduct(Request $request)
    {
        // return $request->all();

        $model = new Product;
        $uploadpath = 'media/images/product';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $final_name = time() . $image_name;
            $image->move($uploadpath, $final_name);
            chmod('media/images/product/' . $final_name, 0777);
            $image_path = "media/images/product/" . $final_name;
        } else {
            $image_path = null;
        }

        $model->image = $image_path;
        $model->companyId = $request->companyId;
        $model->categoryId = $request->categoryId;
        $model->subcategoryId = $request->subCategoryId;
        $model->colorId = $request->colorId;
        $model->sizeId = $request->sizeId;
        $model->roomId = $request->roomId;
        $model->name = $request->name;
        $model->slug = Str::slug($request->name, '-');
        $model->mrp = $request->mrp;
        $model->discountedPrice = $request->discountedPrice;
        $model->deliveryCharge = $request->deliveryCharge;
        $model->gst = $request->gst;
        $model->tag = $request->tag;
        $model->description = $request->description;

        $model->length = $request->length;
        $model->width = $request->width;
        $model->height = $request->height;
        $model->material = $request->material;
        $model->finish = $request->finish;
        $model->style = $request->style;
        $model->weight = $request->weight;
        $model->storage = $request->storage;
        $model->warranty = $request->warranty;

        $model->status = $request->status;
        $model->deleteId = 0;
        $model->save();

        // 1 star 2 star 3 star 4 star 5 star

        // save ratings if exists
        for ($i = 1; $i <= 5; $i++) {
            $rating = 'rating' . $i;
            if ($request->$rating > 0) {
                for ($j = 1; $j <= $request->$rating; $j++) {
                    $model2 = new Productrating();
                    $model2->productId = $model->id;
                    $model2->rating = $i;
                    $model2->save();
                }
            }
        }

        // save multiple images if exists
        if ($request->hasFile('multiImages')) {
            $images = $request->file('multiImages');
            foreach ($images as $image) {
                $image_name = $image->getClientOriginalName();
                $final_name = time() . $image_name;
                $image->move($uploadpath, $final_name);
                chmod('media/images/product/' . $final_name, 0777);
                $image_path2 = "media/images/product/" . $final_name;

                $model2 = new Productimages();
                $model2->productId = $model->id;
                $model2->image = $image_path2;
                $model2->save();
            }
        }

        Session()->flash('alert-success', "Product Added Succesfully");
        return redirect('admin/product');
    }

    public function indexUpdateProduct($slug)
    {
        $product = Product::where('slug', $slug)
            ->withCount([
                'ratings as oneStar' => function ($query) {
                    $query->where('rating', 1);
                },
                'ratings as twoStar' => function ($query) {
                    $query->where('rating', 2);
                },
                'ratings as threeStar' => function ($query) {
                    $query->where('rating', 3);
                },
                'ratings as fourStar' => function ($query) {
                    $query->where('rating', 4);
                },
                'ratings as fiveStar' => function ($query) {
                    $query->where('rating', 5);
                },
                'ratings as totalRatings'
            ])
            ->first();
        $companies = Company::where('deleteId', 0)->where('status', 1)->get();
        $categories = Category::where('deleteId', 0)->where('status', 1)->get();
        $subcategories = Subcategory::where('deleteId', 0)->where('status', 1)->get();
        $colors = Color::where('deleteId', 0)->where('status', 1)->get();
        $sizes = Size::where('deleteId', 0)->where('status', 1)->get();
        $gsts = Gst::where('deleteId', 0)->where('status', 1)->get();
        $rooms = Room::where('deleteId', 0)->where('status', 1)->get();

        return view('admin.master.productUpdate', compact('categories', 'product', 'companies', 'subcategories', 'colors', 'sizes', 'gsts', 'rooms'));
    }

    public function saveImages(Request $request)
    {
        // return $request->all();
        $imageIds = $request->imageIds;
        $uploadpath = 'media/images/product';

        if (isset($imageIds)) {

            foreach ($imageIds as $imageId) {
                $imageStatus = 'profile_avatar_remove' . $imageId;

                $model = Productimages::find($imageId);

                if ($request->hasFile('image' . $imageId)) {
                    $image = $request->file('image' . $imageId);
                    $image_name = $image->getClientOriginalName();
                    $final_name = time() . $image_name;
                    $image->move($uploadpath, $final_name);
                    chmod('media/images/product/' . $final_name, 0777);
                    $image_path = "media/images/product/" . $final_name;
                    $model->image = $image_path;
                    $model->save();
                } else {
                    if ($request->$imageStatus == 1) {
                        $model->delete();
                    } else {
                        $image_path = $model['image'];
                        $model->image = $image_path;
                        $model->save();
                    }
                }
            }
        }

        if (isset($request->image)) {

            foreach ($request->image as $key => $value) {
                if ($image = $request->file('image')[$key]) {
                    $image_name = $image->getClientOriginalName();
                    $final_name = time() . $image_name;
                    $image->move($uploadpath, $final_name);
                    chmod('media/images/product/' . $final_name, 0777);
                    $image_path = "media/images/product/" . $final_name;

                    $model2 = new Productimages();
                    $model2->productId = $request->id;
                    $model2->image = $image_path;
                    $model2->save();
                } else {
                    continue;
                }
            }
        }

        return redirect()->back();
    }

    public function updateProduct(Request $request)
    {
        // return request()->all();
        $model = Product::find($request->hiddenId);
        $uploadpath = 'media/images/product';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $final_name = time() . $image_name;
            $image->move($uploadpath, $final_name);
            chmod('media/images/product/' . $final_name, 0777);
            $image_path = "media/images/product/" . $final_name;
        } else {
            $image_path = Product::find($request->hiddenId);
            if ($request->profile_avatar_remove == 1) {
                $image_path = null;
            } else {
                $image_path = $image_path['image'];
            }
        }

        $model->image = $image_path;
        $model->categoryId = $request->categoryId;
        $model->subCategoryId = $request->subCategoryId;
        $model->companyId = $request->companyId;
        $model->name = $request->name;
        $model->slug = Str::slug($request->name, '-');
        $model->mrp = $request->mrp;
        $model->discountedPrice = $request->discountedPrice;
        $model->gst = $request->gst;
        $model->deliveryCharge = $request->deliveryCharge;
        $model->description = $request->description;

        $model->length = $request->length;
        $model->width = $request->width;
        $model->height = $request->height;
        $model->warranty = $request->warranty;
        $model->material = $request->material;
        $model->colors = $request->colors;
        $model->sizes = $request->sizes;

        $model->metaKeywords = $request->metaKeywords;
        $model->metaTitle = $request->metaTitle;
        $model->metaDescription = $request->metaDescription;
        $model->status = $request->status;
        $model->update();

        Session()->flash('alert-success', "Product Updated Succesfully");
        return redirect('admin/product');
    }

    public function deleteProduct(Request $request)
    {
        $model = Product::find($request->hiddenId);
        if (file_exists($model->image)) {
            unlink($model->image);
        }
        $model->deleteId = 1;
        $model->update();

        $productImages = Productimages::where('productId', $request->hiddenId)->get();
        foreach ($productImages as $productImage) {

            if (file_exists($productImage->image)) {
                unlink($productImage->image);
            }

            $productImage->delete();
        }

        // check in cart
        Cart::where('productId', $request->hiddenId)->delete();

        // check in wishlist
        Wishlist::where('productId', $request->hiddenId)->delete();

        // check in compare
        Compare::where('productId', $request->hiddenId)->delete();

        Session()->flash('alert-success', "Product Deleted Succesfully");
        return redirect('admin/product');
    }

    public function importProduct(Request $request)
    {
        try {
            $this->importExcel($request, 2);

            return redirect()->back();
        } catch (\Exception $e) {
            Session()->flash('alert-danger', 'error:' . $e);
            return redirect()->back();
        }
    }

    // Transaction
    public function indexTransaction()
    {
        $transactions = Transaction::with('orders')->get();
        return view('admin.trx.transaction', compact('transactions'));
    }

    public function changeStatus()
    {
        $transaction = Transaction::find(request()->trxId);
        $transaction->orderStatus = request()->status;
        $transaction->update();
        return redirect()->back();
    }

    public function indexOrder($id)
    {
        $transaction = Transaction::find($id);
        $orders = Order::where('trxId', $id)->get();
        return view('admin.trx.order', compact('orders', 'transaction'));
    }

    public function indexBanner()
    {
        $banners = Banner::all();
        return view('admin.master.banner', compact('banners'));
    }

    public function addBanner(Request $request)
    {
        $model = new Banner();
        $uploadpath = 'media/images/banner';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $final_name = time() . $image_name;
            $image->move($uploadpath, $final_name);
            chmod('media/images/banner/' . $final_name, 0777);
            $image_path = "media/images/banner/" . $final_name;
        } else {
            $image_path = null;
        }

        $model->image = $image_path;
        $model->title = $request->title;
        $model->subtitle = $request->subtitle;
        $model->link = $request->link;
        $model->status = 1;
        $model->save();

        Session()->flash('alert-success', "Banner Added Succesfully");
        return redirect()->back();
    }

    public function updateBanner(Request $request)
    {
        $model = Banner::find($request->hiddenId);
        $uploadpath = 'media/images/banner';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $final_name = time() . $image_name;
            $image->move($uploadpath, $final_name);
            chmod('media/images/banner/' . $final_name, 0777);
            $image_path = "media/images/banner/" . $final_name;
        } else {
            $image_path = Banner::find($request->hiddenId);
            if ($request->profile_avatar_remove == 1) {
                $image_path = null;
            } else {
                $image_path = $image_path['image'];
            }
        }

        $model->image = $image_path;
        $model->title = $request->title;
        $model->subtitle = $request->subtitle;
        $model->link = $request->link;
        $model->status = $request->status;
        $model->update();

        Session()->flash('alert-success', "Banner Updated Succesfully");
        return redirect()->back();
    }

    public function deleteBanner(Request $request)
    {
        $model = Banner::find($request->hiddenId);
        if (file_exists($model->image)) {
            unlink($model->image);
        }
        $model->delete();

        Session()->flash('alert-success', "Banner Deleted Succesfully");
        return redirect()->back();
    }
}
