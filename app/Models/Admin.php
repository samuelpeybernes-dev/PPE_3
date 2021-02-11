<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $primaryKey = "idAdmin";
    protected $table = "Admin";
    public $timestamps = false;
    
    protected $fillable = [
        'nomAdmin', 'prenomAdmin', 'emailAdmin', 'mdpAdmin'
    ];
}
