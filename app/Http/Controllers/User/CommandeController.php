<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Carts;
use App\Models\Stock;
use App\Models\Facture;
use App\Models\Product;
use App\Models\Commande;
use App\Models\Livraison;
use Illuminate\Http\Request;
use App\Models\CommandeProduct;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    public function index(){
        $livraison = Livraison::all();
        $old_cartItem=Carts::where('user_id',Auth::id())->get();
        foreach($old_cartItem as $elem){
            if(!($elem->products->stock->quantite_prod >= $elem->prod_qty)){
                    $suppElem = Carts::where('user_id',Auth::id())->where('prod_id',$elem->prod_id)->first();
                    $suppElem->delete();
            }
        }
        $cartItem = Carts::where('user_id',Auth::id())->get();
        $commande=Commande::where('user_id',Auth::id())->get();
        return view('user.commande',compact('cartItem','livraison','commande'));
    }

    public function payer(Request $req){

        $commande = new Commande();
        $commande->user_id = Auth::id();
        $commande->name = $req->name;
        $commande->prenom = $req->prenom;
        $commande->email = $req->email;
        $commande->tele = $req->tele;
        $commande->adresse = $req->adresse;
        $commande->codePostale = $req->codePostale;
        $commande->dateLivraison = $req->dateLivraison;

        $commande->paymentMethod = $req->paymentMethod;

        $montant_total=0;
        $Quantité = 0;
        $cartItem_total = Carts::where('user_id',Auth::id())->get();
        foreach($cartItem_total as $item){
            $montant_total += $item->products->prix * $item->prod_qty;
            $Quantité += $item->prod_qty;
        }

        $facture = new Facture();
        $facture->user_id=Auth::id();
        $facture->montant_total =$montant_total;
        $facture->Quantité= $Quantité;
        $facture->save();

        $commande->facture_id = $facture->id ;
        $commande->numéro_commd='VB'.rand(1111,9999);
        $commande->save();

        $cartItem = Carts::where('user_id',Auth::id())->get();

        foreach($cartItem as $elem){
            CommandeProduct::create([
                'commande_id'=> $commande->id,
                'prod_id'=>$elem->prod_id,
                'qty'=>$elem->prod_qty,
                'prix'=>$elem->products->prix,
            ]);


            $stock=Stock::where('produit_id',$elem->prod_id)->first();
            $stock->quantite_prod = $stock->quantite_prod - $elem->prod_qty;
            $stock->update();
        }



        if(Auth::user()->remember_token==NULL){
            $user=User::where('id',Auth::id())->first();
            $user->name = $req->name;
            $user->prenom = $req->prenom;
            $user->tele = $req->tele;
            $user->adresse = $req->adresse;
            $user->codePostale = $req->codePostale;
            $user->update();
        }
        $cartItem = Carts::where('user_id',Auth::id())->get();
        Carts::destroy($cartItem);

            return redirect('/page_user')->with('status',"Commande avec succée");

    }
}
