<?php

namespace App\Http\Controllers\User;

use PDF;
use App\Models\User;
// use Barryvdh\DomPDF\PDF;
use App\Models\Commande;
use Illuminate\Http\Request;
use App\Models\InfoLivraison;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FactureController extends Controller
{

    public function pdf($id){
        $commandes = Commande::where('id',$id)->where('user_id',Auth::id())->first();
        $data = [
            'commandes' => $commandes,
        ];

        // $path = 'assets/logo/logo1.png';
        // $type = pathinfo($path,PATHINFO_EXTENSION);
        // $datas = file_get_contents($path);
        // $pic = 'data:image/'. $type . ';base64,' . base64_encode($datas);

        $pdf = PDF::loadView('user.facture.pdf', compact('commandes'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download($commandes->name.'_'.$commandes->prenom.'.pdf');
    }
}
