<?php

namespace App\Http\Controllers\Admin;

use App\Models\Commande;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommandesController extends Controller
{
    public function index(){
        $commande = Commande::where('statut_commd','0')->get();
        return view('admin.commande.index',compact('commande'));
    }

    public function view($id){
        $commandes = Commande::where('id',$id)->first();
        return view('admin.commande.view',compact('commandes'));
    }

    public function updateCommande(Request $req,$id){
        $commandes = Commande::find($id);
        $commandes->statut_commd = $req->order_status;
        $commandes->update();
        return redirect('orders')->with('status',"Commande est modifier avec succée");

    }

    public function commandehistory(){
        $commande = Commande::where('statut_commd','1')->get();
        return view('admin.commande.history',compact('commande'));
    }
}
