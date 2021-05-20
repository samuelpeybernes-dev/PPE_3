<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personnel_sans_categorie extends Model
{
    use HasFactory;

    protected $primaryKey = "idPersonnel";
    protected $table = "personnel_sans_categorie";
    public $timestamps = false;
    
    protected $fillable = [
        'idPersonnel'
    ];
}
