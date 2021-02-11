<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Praticien extends Model
{
    use HasFactory;

    protected $primaryKey = "idPraticien";
    protected $table = "Praticien";
    public $timestamps = false;
    
    protected $fillable = [
        'nomPratic', 'prenomPratic', 'influence', 'entouragePro', 'idSpecialite'
    ];
}
