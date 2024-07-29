<?php 

// app/Http/Controllers/AccountController.php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Auth::user()->accounts;
        return view('accounts.index', compact('accounts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'account_name' => 'required|string|max:255',
            'balance' => 'required|numeric',
        ]);

        Auth::user()->accounts()->create([
            'account_name' => $request->account_name,
            'balance' => $request->balance,
        ]);

        return redirect()->route('accounts.index')->with('success', 'Account created successfully!');
    }
}
