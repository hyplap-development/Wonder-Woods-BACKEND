<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckUser
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
        if (!auth()->check()) {
            // full url with parameters
            $intendedUrl = $request->fullUrl();
            Session::put('intended.url', $intendedUrl);
        }
        if (Auth::check()) {
            $adminRoles = ['admin', 'manager'];

            if (Auth::User()->status == 1 && Auth::User()->deleteId == 0) {
                if (in_array(Auth::User()->role, $adminRoles)) {

                    if (Session::has('intended.url')) {
                        $intendedUrl = Session::get('intended.url');
                        Session::forget('intended.url');
                        return redirect()->intended($intendedUrl);
                    }

                    return $next($request);
                } else {
                    return redirect('/');
                }
            } else {
                Auth::logout();
                Session()->flash('alert-danger', "You have been deactivated from the ADMIN PANEL\nPlease contact the Admin to reinstate your privileges");
                return redirect('admin/login');
            }
        } else {
            Session()->flash('alert-danger', "Please Login in First");
            return redirect('admin/login');
        }
    }
}
