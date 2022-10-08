<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{
    use HasFactory;
    protected $table ='stock';
    protected $fillable = [
        'produit_id',
        'quantite_prod',
    ];
}
