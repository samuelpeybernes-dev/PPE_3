<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visiteur extends Model
{
    use HasFactory;

    protected $primaryKey = "idVisiteur";
    protected $table = "Visiteur";
    public $timestamps = false;
    
    protected $fillable = [
        'idVisiteur', 'Objectif', 'Prime', 'avantage', 'idBudget', 'nbrVisites', 'objectifsVisite'
    ];

  

    public function visiteurs(){
        return $this->hasMany(User::class, 'idVisiteur');
    }
}
