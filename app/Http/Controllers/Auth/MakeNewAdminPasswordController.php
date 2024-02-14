<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MakeNewAdminPasswordController extends Controller
{
  public function index()
  {
    return Inertia::render('Dashboard/MakePassword');
  }
  public function store(Request $request)
  {
    $request->validate([
      'password' => ['required', 'confirmed'],
    ]);

    $user = User::findOrFail(Auth::user()->id);
    $user->password = Hash::make($request->password);
    $user->has_password = 1;
    $user->save();

    return redirect()->route('web-development.index');
  }
}
