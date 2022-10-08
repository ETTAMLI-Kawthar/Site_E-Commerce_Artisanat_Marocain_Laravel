<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $table ='facture';
    protected $fillable = [
        'user_id',
        'montant_total',
        'Quantité',

    ];
}
