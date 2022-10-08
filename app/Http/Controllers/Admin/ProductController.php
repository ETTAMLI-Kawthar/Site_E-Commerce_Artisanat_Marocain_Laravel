<?php

namespace App\Http\Controllers\Admin;

use App\Models\Stock;
use App\Models\Product;
use App\Models\Commande;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\CommandeProduct;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(){
        $product = Product::all();
        return view('admin.product.index',compact('product'));
    }

    public function add(){
        $categorie = Categorie::all();
        return view('admin.product.add',compact('categorie'));
    }

    public function insert(Request $request){
        $product =new Product();
        $stock=new Stock();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('assets/uploads/product/', $filename);
            $product->image = $filename;
        }
        $product->prix = $request->prix;
        $product->libelle = $request->libelle;
        $product->description = $request->description;
        $product->cate_id = $request->cate_id;
        $product->populaire = $request->input('populaire') ==TRUE ? '1':'0';
        $product->save();
        $stock->produit_id = $product->id;
        $stock->quantite_prod = $request->quantite_prod;
        $stock->save();
        return redirect('/dashboard')->with('status','Produit a été ajouter avec succès');
    }

    public function edit($id){
        $product = Product::find($id);
        $categorie = Categorie::all();
        return view('admin.product.edit',compact('product','categorie'));
    }

    public function update(Request $request,$id){
        $product = Product::find($id);
        if($request->hasFile('image')){
            $path='assets/uploads/product/'.$product->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('assets/uploads/product/', $filename);
            $product->image = $filename;
        }
        $product->prix = $request->prix;
        $product->libelle = $request->libelle;
        $product->description = $request->description;
        $product->cate_id = $request->cate_id;
        $product->populaire = $request->input('populaire') ==TRUE ? '1':'0';
        $product->status_prod = $request->input('statut') ==TRUE ? '1':'0';
        $product->update();
        return redirect('/dashboard')->with('status','Produit a été modifier avec succès');
    }

    public function delete($id){
        $product = Product::find($id);
        if (CommandeProduct::where('prod_id',$product->id)->exists()) {
            return redirect('/product')->with('status','Vous ne pouvez pas supprimer le produit,Vous pouvez le désactiver');
        }
        if($product->image){
            $path='assets/uploads/product/'.$product->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        // $command_prod = CommandeProduct::all();

        $product->delete();
        return redirect('/product')->with('status','Produit a été supprimer avec succès');
    }

    public function stock(){
        $product = Product::all();
        return view('admin.product.stock',compact('product'));
    }

    public function editstock($id){
        $product = Product::find($id);
        return view('admin.product.editStock',compact('product'));

    }

    public function updatestock(Request $request,$id){
        $product = Product::find($id);
        $stock = Stock::find($id);
        $stock->quantite_prod =$request->qty;
        $stock->update();
        return redirect('/stock')->with('status','Stock a été modifier avec succès');
    }

    static function productItem(){
        return Product::count();
    }
}
