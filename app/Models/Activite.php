<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    use HasFactory;

    protected $primaryKey = "idActivite";
    protected $table = "Activite";
    public $timestamps = false;
    
    protected $fillable = [
        'idActivite', 'compteRendu', 'numAccord', 'theme', 'cocktailOffert', 'idVisiteur'
    ];
}
