<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comparatifVisites extends Model
{
    use HasFactory;

    protected $primaryKey = "Expr1";
    protected $table = "comparatifVisites";
    public $timestamps = false;
    
    protected $fillable = [
        'Expr1', 'idVisiteur', 'objectifsVisite', 'nbrVisites'
    ];
}
