<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Stock;
use App\Models\Contact;
use App\Models\Facture;
use App\Models\Product;
use App\Models\Commande;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $categorie = Categorie::where('etat_cat','=','0')->get();
        $products = Product::where('status_prod','=','0')->get();

        return view('user.index',compact('products','categorie'));
    }

    public function selectProd($id){
        $products = Product::where('status_prod','=','0')->where('cate_id',$id)->get();
        $categorie = Categorie::where('etat_cat','=','0')->get();
        return  view('user.index',compact('products','categorie'));
    }

    public function productview($prod_lib){

        if(Product::where('libelle',$prod_lib)->exists())
        {   $stock = Stock::all();
            $product = Product::where('libelle',$prod_lib)->first();
            $products = Product::where('status_prod','=','0')->get();
            $categorie = Categorie::where('etat_cat','=','0')->get();
            return view('layouts.user.userview',compact('stock','product','products','categorie'));

        }
        else
        {
            return redirect('/')->with('status',"Le lien est erroné");
        }
    }

    public function commandes(){
        $commande = Commande::where('user_id',Auth::id())->get();
        return view('user.commande.index',compact('commande'));
    }

    public function voir($id){
        $commandes = Commande::where('id',$id)->where('user_id',Auth::id())->first();
        return view('user.commande.voir',compact('commandes'));

    }

    static function userItem(){
        return User::count();
    }

    public function contact(){
        return view('user.contact');
    }

    public function message(Request $req){
        $contact = new Contact();
        $contact->nom = $req->name;
        $contact->email = $req->email;
        $contact->tele = $req->tele;
        $contact->message = $req->message;

        $contact->save();

        return redirect('/contact')->with('status','Message a été envoyé');
    }
}
