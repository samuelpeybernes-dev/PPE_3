<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class password_resets extends Model
{
    use HasFactory;

    protected $primaryKey = "idVisite";
    protected $table = "Visite";
    public $timestamps = false;
    
    protected $fillable = [
        'dateVisite', 'motifVisite', 'medocPresente', 'idVisiteur', 'idPraticien'
    ];
}
