<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the token list.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tokens = Auth::guard('web')->user()->accessTokens;

        return view('home', compact('tokens'));
    }

    /**
     * Generate new token for user.
     *
     * @return RedirectResponse
     */
    public function generateToken(Request $request)
    {
        Auth::guard('web')->user()->createToken(Str::random(8));

        return redirect()->back();
    }
}
