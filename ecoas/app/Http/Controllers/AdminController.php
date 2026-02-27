<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        if ($request->username === 'londobell56' && $request->password === 'hrviolation') {
            session(['admin_logged_in' => true]);    
            return redirect('/dashboard');
        }

        return back()->with('error', 'Invalid credentials');
    }
}