<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Http\Request;

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
    public function index()
    {
        $product=Product::where('status_prod','=','0');
        $products = Product::where('status_prod','=','0');
        $categorie = Categorie::where('etat_cat','=','0')->get();
        return view('user.index',compact('product','products','categorie'));
    }
}
