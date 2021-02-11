<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;

    protected $primaryKey = "idPersonnel";
    protected $table = "Personnel";
    public $timestamps = false;
    
    protected $fillable = [
        'nomPersonnel', 'prenomPersonnel', 'matriculePersonnel', 'email', 'mdp'
    ];
}
