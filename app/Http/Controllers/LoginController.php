<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginFunction(Request $request){
        return response()->json(['message' => 'Form submitted successfully']);
    }
    
}
