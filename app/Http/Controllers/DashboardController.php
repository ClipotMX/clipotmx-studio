<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        
        $url = "";
        if($request->user()->role === "admin"){
            $url = "admin/dashboard";
        }elseif($request->user()->role === "user"){
            $url = "user/dashboard";
        }else{
            $url = "dashboard";  
        }

        return redirect()->intended($url);
    }
}
