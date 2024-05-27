<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class AppAuthController extends Controller
{
    //

    public function login(Request $request)
    {
        try {
            $request->validate([
                'phone' => 'required|exists:users,phone',
                'password' => 'required',
            ]);

            $phone = $request->phone;
            $password = $request->password;

            $user = User::where('phone', $phone)->first();
            if (Hash::check($password, $user->password)) {

                // generate token for user using Str::random(60)
                $token = Str::random(60);
                $user->token = $token;
                $user->save();

                return response()->json([
                    'status' => 200,
                    'message' => 'Login Success',
                    'data' => $user,
                ]);
            }
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 201,
                'message' => $e->getMessage(),
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 201,
                'message' => $th->getMessage(),
            ]);
        }
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'phone' => 'required|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'confirmPassword' => 'required|same:password',
            ]);

            $user = new User();
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            return response()->json([
                'status' => 200,
                'message' => 'Register Success',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 201,
                'message' => $e->getMessage(),
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 201,
                'message' => $th->getMessage(),
            ]);
        }
    }

    public function forgetPassword(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
            ]);

            $user = User::where('email', $request->email)->first();
            if (!$user) {
                return response()->json([
                    'status' => 404,
                    'message' => 'User with this email does not exists',
                ]);
            }

            $user->password = Hash::make('password');
            $user->save();
            return response()->json([
                'status' => 200,
                'message' => 'Password reset successfully',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 201,
                'message' => $e->getMessage(),
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 201,
                'message' => $th->getMessage(),
            ]);
        }
    }

    public function resetPassword(Request $request)
    {
        try {
            $request->validate([
                'phone' => 'required|exists:users,phone',
                'password' => 'required',
                'confirmPassword' => 'required|same:password',
            ]);

            $user = User::where('phone', $request->phone)->first();
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json([
                'status' => 200,
                'message' => 'Password reset successfully',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 201,
                'message' => $e->getMessage(),
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 201,
                'message' => $th->getMessage(),
            ]);
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->validate([
                'phone' => 'required|exists:users,phone',
            ]);

            $user = User::where('phone', $request->phone)->first();
            $user->token = null;
            $user->save();
            return response()->json([
                'status' => 200,
                'message' => 'Logout successfully',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 201,
                'message' => $e->getMessage(),
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 201,
                'message' => $th->getMessage(),
            ]);
        }
    }
}
