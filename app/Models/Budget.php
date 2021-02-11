<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $primaryKey = "idBudget";
    protected $table = "Budget";
    public $timestamps = false;
    
    protected $fillable = [
        'sold', 'annee'
    ];
}
