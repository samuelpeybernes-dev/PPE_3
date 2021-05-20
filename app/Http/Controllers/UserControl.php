<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserControl extends Controller
{
    public function getUsers(){
        $users = User::all();
        return view ('Responsables/responsableHome',['utilisateurs'=>$users]);
    }
}
