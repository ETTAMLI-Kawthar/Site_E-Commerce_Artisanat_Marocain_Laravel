<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Commande;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(){
        $category = Categorie::all();
        return view('admin.categorie.index',compact('category'));
    }

    public function edit($id){
        $categorie = Categorie::find($id);
        return view('admin.categorie.edit',compact('categorie'));
    }

    public function update(Request $request,$id){
        $categorie = Categorie::find($id);
        $prod=Product::where('cate_id',$categorie->id)->get();
        $categorie->name_cat = $request->nom;
        $categorie->description = $request->description;
        $categorie->etat_cat = $request->input('statut') ==TRUE ? '1':'0';
        $categorie->update();
        foreach($prod as $item){
            $item->status_prod = $request->input('statut') ==TRUE ? '1':'0';
            $item->populaire = $request->input('statut') ==TRUE ? '0':'1';
            $item->update();
        }


        return redirect('/categorie')->with('status','Categorie a été modifier avec succès');
    }


    public function add(){
        $categorie = Categorie::all();
        return view('admin.categorie.add',compact('categorie'));
    }

    public function insert(Request $request){

            $categorie =new Categorie();
            $categorie->name_cat = $request->nom;
            $categorie->description = $request->description;
            $categorie->save();
            return redirect('/dashboard')->with('status','Catégorie a été ajouter avec succès');

    }

    static function categorieItem(){
        return Categorie::count();
    }

}
