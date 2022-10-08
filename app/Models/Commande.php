<?php

namespace App\Models;

use App\Models\Facture;
use App\Models\Livraison;
use App\Models\CommandeProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande extends Model
{
    use HasFactory;
    protected $table='commande';
    protected $fillable=[
        'user_id',
        'name',
        'prenom',
        'email',
        'tele',
        'adresse',
        'codePostale',
        'dateLivraison',
        'paymentMethod',
        'dateLivraison',
        'facture_id',
        'statut_commd',
        'descripton_commd',
        'numéro_cmmd',
    ];

    public function livraison(){
        return $this->belongsTo(Livraison::class,'paymentMethod','mode_livraison');
    }
    public function facture(){
        return $this->belongsTo(Facture::class,'facture_id','id');
    }
    public function commandeProduct(){
        return $this->hasMany(CommandeProduct::class);
    }
}

