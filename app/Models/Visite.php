<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visite extends Model
{
    use HasFactory;

    protected $primaryKey = "idVisite";
    protected $table = "Visite";
    public $timestamps = false;
    
    protected $fillable = [
        'dateVisite', 'motifVisite', 'medocPresente', 'bilanVisite', 'idVisiteur', 'idPraticien'
    ];

    public function visiteurs(){
        return $this->belongsTo(User::class, 'idVisiteur');
    }
}
