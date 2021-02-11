<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $primaryKey = "idProduit";
    protected $table = "Produit";
    public $timestamps = false;
    
    protected $fillable = [
        'dateVisite', 'motifVisite', 'medocPresente', 'idVisiteur', 'idPraticien'
    ];
}
