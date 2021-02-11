<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    use HasFactory;

    protected $primaryKey = "idSpecialite";
    protected $table = "Specialite";
    public $timestamps = false;
    
    protected $fillable = [
        'dateVisite', 'motifVisite', 'medocPresente', 'idVisiteur', 'idPraticien'
    ];
}
