<?php

namespace App\Models;

use App\Models\Stock;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table ='product';
    protected $fillable = [
        'prix',
        'libelle',
        'description',
        'cate_id',
        'image',
        'populaire',
        'status_prod',

    ];

    public function categorie(){
        return $this->belongsTo(Categorie::class,'cate_id','id');
    }
    public function stock(){
        return $this->belongsTo(Stock::class,'id','id');
    }
}
