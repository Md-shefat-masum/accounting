<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function test_view()
    {
        return view('invoice_layouts.quotes_invoice_html');
    }
    public function index()
    {
        return view('backend.master.admin');
    }

    public function vue($vue)
    {
        return view('backend.master.admin', compact(''));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
