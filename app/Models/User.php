<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = "idPersonnel";

    protected $table = "Personnel";

    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nomPersonnel',
        'prenomPersonnel',
        'email',
        'mdp',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'mdp',
        'remember_token',
    ];
    
    /**
     * Get the mdp for user.
     *
     * @return string 
     */
    public function getAuthPassword()
    {
        return $this->mdp;
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function visiteur(){
        return $this->belongsTo(Visiteurs::class, 'idVisiteur', 'idPersonnel');
    }
}
