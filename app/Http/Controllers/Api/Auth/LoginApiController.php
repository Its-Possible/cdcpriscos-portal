<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginApiController extends Controller
{
    //
    public function login(Request $request)
    {
        //
        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'data' => []
        ]);
    }
}
