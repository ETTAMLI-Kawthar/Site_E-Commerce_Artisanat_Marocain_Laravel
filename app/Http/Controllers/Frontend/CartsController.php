<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Carts;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;
class CartsController extends Controller
{
    public function addToCarts(Request $req) {
        $product_id=$req->prod_id;
        $input=$req->input;
            if(Auth::user()->role_as == '0'){

                $product=Product::where('id',$product_id)->first();

                if($product){
                    if(Carts::where('prod_id',$product_id)->where('user_id',Auth::id())->exists()){
                        return response()->json(['status'=>$product->libelle. " est déja existe"]);
                    }
                    else
                    {
                        $cart=new Carts();
                        $cart->user_id=$req->user()->id;
                        $cart->prod_id=$product_id;
                        $cart->prod_qty=$input;
                        $cart->save();
                        return response()->json(['status'=>$product->libelle." a été ajouter avec succé"]);
                    }
                }
            }
            else
            {
                return response()->json(['status'=>"Vous pouvez connecter ou inscrire s il vous plait"]);
            }

    }

    public function viewcart(){

        $cartitem= Carts::where('user_id',Auth::id())->get();
         return view('user.cart',compact('cartitem'));
    }

    public function deleteprod($id){
        $prod_id = Carts::find($id);
        $prod_id->delete();
        // Carts::destroy($id);
        return redirect('/panier')->with('status','Produit a été supprimer avec succès');

    }
    static function cartItem(){
        //$userId = Session::get('user')['id'];
        return Carts::where('user_id',Auth::id())->count();
    }

    public function updateCart(Request $req,$id){
        if(Auth::user()->role_as == '0'){
            if(Carts::where('user_id',Auth::id())->first()){
                $cart = Carts::find($id);
                $cart->prod_qty = $req->input;
                $cart->update();
                return redirect('/panier')->with('status','Produit a été modifier avec succès');
            }
        }
        // $product_id = $req->prod_id;
        // $input = $req->input;

        // if(Auth::user()->role_as == '0'){
        //     if(Carts::where('prod_id',$product_id)->where('user_id',Auth::id())->exists()){
        //         $cart = Carts::where('prod_id',$product_id)->where('user_id',Auth::id())->first();
        //         $cart->prod_qty=$input;
        //         $cart->update();
        //         // return redirect('/panier')->with('status','Produit a été modifier avec succès');
        //         return response()->json(['status'=>"Quantité est modifier"]);
        //     }
        // }

    }

    // public function increaseQ($id){
    //     $prod=Carts::get($id);
    //     $qty=$prod->prod_qty - 1;
    //     Carts::update($id,$qty);
    // }
    // public function decreaseQ(Request $req){
    //     $product_id=$req->prod_id;
    //     $prod=Carts::where('prod_id',$product_id)->where('user_id',Auth::id())->exists();
    //     $prod->prod_qty = $prod->prod_qty + 1;
    // }
}
