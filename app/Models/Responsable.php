<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{

    use HasFactory;

    protected $primaryKey = "idResponsable";
    protected $table = "Responsable";
    public $timestamps = false;
    
    protected $fillable = [
        'specialite', 'regionResponsable', 'idPersonnel'
    ];

    public function User(){
        return $this->hasMany(User::class, 'idPersonnel, idResponsable');
    }
}
