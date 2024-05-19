<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showforget(Request $request)
    {
        return view('forgetpassword');
    }

    public function forgetpassword(Request $request)
    {
        $user = User::where('phone', $request->phone)->count();
        if ($user == 0) {
            return response()->json([
                'status' => 201,
                'message' => 'No User with this number',
            ]);
        }
        return response()->json([
            'status' => 200,
        ]);
    }

    public function checkPhone(Request $request)
    {
        $user = User::where('phone', $request->phone)->first();
        if ($user) {
            return response()->json([
                'status' => 201,
                'message' => 'User Found',
            ]);
        }
    }

    public function checkPass(Request $request)
    {
        $user = User::where('phone', $request->phone)->first();

        if (Hash::check($request->oldpass, $user->password)) {
            return response()->json([
                'status' => 201,
                'message' => 'User Found',
            ]);
        } else {
            return response()->json([
                'status' => 200,
                'message' => 'User not Found',
            ]);
        }
    }

    public function changepassword(Request $request)
    {

        $user = User::where('phone', $request->phone)->orderBy('id', 'desc')->first();
        $user->password = Hash::make($request->pass);
        $user->update();
        return response()->json([
            'status' => 200,
            'message' => 'Password Changed Successfully',
        ]);
    }

    public function login()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'customer') {
                return redirect('/');
            }
            return redirect('admin/dashboard');
        } else {
            return view('admin.auth.login');
            Session()->flash('alert-success', "Please Login in First");
        }
        return view('admin.auth.login');
    }

    public function checkUser(Request $request)
    {
        // return $request;
        $phone = $request->post('login');
        $email = $request->post('login');
        $allowedLoginRoles = ['admin', 'manager'];

        $result = User::where(['phone' => $phone])
            ->orWhere(['email' => $email])
            ->orderBy('id', 'desc')
            ->first();

        if ($result) {
            if ($result->status == 1 && $result->deleteId == 0) {
                if (in_array($result->role, $allowedLoginRoles)) {
                    if (Hash::check($request->post('password'), $result->password)) {
                        Auth::login($result);
                        // return redirect('dashboard');
                        return response()->json([
                            'status' => 200,
                            'message' => 'Logged In succesfully',
                        ]);
                    } else {
                        Session()->flash('alert-danger', 'Incorrect Password');
                        // return redirect()->back();
                        return response()->json([
                            'status' => 201,
                            'message' => 'Incorrect Password',
                        ]);
                    }
                } else {
                    return response()->json([
                        'status' => 203,
                        'message' => 'User Not Allowed',
                    ]);
                }
            } else if ($result->status != 1) {
                return response()->json([
                    'status' => 204,
                    'message' => 'User Not active',
                ]);
            } else if ($result->deleteId == 1) {
                return response()->json([
                    'status' => 205,
                    'message' => 'User Deleted',
                ]);
            }
        } else {

            return response()->json([
                'status' => 202,
                'message' => 'Invalid Details',
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('admin/login');
    }

    // Web Functions

    public function indexWebLogin()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'customer') {
                return redirect('/');
            }
            return redirect('admin/dashboard');
        } else {
            return view('web.auth.login');
        }
    }

    public function checkWebUser(Request $request)
    {
        // return $request;

        $user = User::where('email', $request->email)->first();
        if ($user) {
            if ($user->role != 'customer') {
                Session()->flash('alert-danger', 'This is not a customer account');
                return redirect()->back();
            }
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect('/');
            } else {
                Session()->flash('alert-danger', 'Incorrect Password');
                return redirect()->back();
            }
        } else {
            Session()->flash('alert-danger', 'Invalid Details');
            return redirect()->back();
        }
    }

    public function indexWebUser()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'customer') {
                return redirect('/');
            }
            return redirect('admin/dashboard');
        } else {
            return view('web.auth.register');
        }
    }

    public function registerWebUser(Request $request)
    {
        if(User::where('email', $request->email)->exists()){
            Session()->flash('alert-danger', 'Email Already Exists');
            return redirect()->back();
        }
        if(User::where('phone', $request->phone)->exists()){
            Session()->flash('alert-danger', 'Phone Already Exists');
            return redirect()->back();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->role = 'customer';
        $user->save();
        Session()->flash('alert-success', 'Registered Successfully Please Login');
        return redirect('login');
    }

    public function logoutWeb()
    {
        Auth::logout();
        return redirect('/');
    }
}
