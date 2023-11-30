<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected function attemptLogin(Request $request)
{
    $role = $request->input('role');

    if ($role == 'admin') {
        return $this->guard()->attempt(
            $this->credentials($request),
            $request->filled('remember')
        );
    }

    return $this->guard('web')->attempt(
        $this->credentials($request),
        $request->filled('remember')
    );
}
}
