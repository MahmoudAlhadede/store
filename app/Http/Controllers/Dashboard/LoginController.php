<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginRequest;
class LoginController extends Controller
{
    public function login(){
        return view('Dashboard.auth.login');
    }
    public function postLogin(AdminLoginRequest $request){
        $remember_me = $request->has('remember_me') ? true : false;
        if (auth()->guard('admin')->attempt(['email' =>  $request->input('email'), 'password' => $request->input('password')])) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->with(['error' => 'يوجد بيانات خطأ']);
    }
}
