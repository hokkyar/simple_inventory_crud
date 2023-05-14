<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
  public function index(Request $request)
  {
    if ($request->session()->has('user')) {
      return redirect('/dashboard');
    }
    return view('login');
  }

  public function authenticate(Request $request)
  {
    if ($request->username == env('ADMIN_USERNAME') && $request->password == env('ADMIN_PASSWORD')) {
      $request->session()->regenerate();
      session(['user' => ['name' => $request->username]]);
      return redirect()->intended('/dashboard');
    }
    return redirect('/login')->withErrors(['Invalid username or password']);
  }

  public function logout(Request $request)
  {
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
  }
}
