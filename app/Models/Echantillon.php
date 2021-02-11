<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Echantillon extends Model
{
    use HasFactory;

    protected $primaryKey = "idEchantillon";
    protected $table = "Echantillon";
    public $timestamps = false;
    
    protected $fillable = [
        'idProduit', 'idVisite', 'nbrsEchantillon'
    ];
}
