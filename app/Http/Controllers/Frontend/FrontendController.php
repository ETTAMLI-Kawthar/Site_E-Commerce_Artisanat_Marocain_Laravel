<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Stock;
use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index(){
        $product = Product::where('status_prod','=','0')->get();
        $pop_product = Product::where('populaire','1')->take(15)->get();
        $categorie = Categorie::where('etat_cat','=','0')->get();
        return view('frontend.index',compact('pop_product'),compact('product','categorie'));
    }

    public function selectProd($id){
        $product = Product::where('status_prod','=','0')->where('cate_id',$id)->get();
        $pop_product = Product::where('populaire','1')->take(15)->get();
        $categorie = Categorie::where('etat_cat','=','0')->get();
        return  view('frontend.index',compact('product','pop_product','categorie'));
    }

    public function productview($prod_lib){
        $products = Product::where('status_prod','=','0')->get();
        if(Product::where('libelle',$prod_lib)->exists())
        {
            $product = Product::where('libelle',$prod_lib)->first();
            $stock = Stock::all();
            return view('frontend.view',compact('product','stock','products'));
        }
        else{
            return redirect('/')->with('status',"Le lien est erroné");
        }
    }

    public function addToCarts(Request $req) {

            return response()->json(['status'=>"Vous pouvez connecter ou inscrire s il vous plait"]);

    }

    public function about(){
        return view('frontend.about');
    }

    public function contact(){
        return view('frontend.contact');
    }

}
