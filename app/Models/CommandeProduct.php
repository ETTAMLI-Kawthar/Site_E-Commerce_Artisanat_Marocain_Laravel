<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommandeProduct extends Model
{
    use HasFactory;

    protected $table='commande_product';
    protected $fillable=[
       'commande_id',
       'prod_id',
       'qty',
       'prix',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class,'prod_id','id');
    }
}
