<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Models\Personnel;
use App\Models\Visiteur;
use App\Models\Responsable;
use App\Models\Admin;
use App\Models\Visite;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=Auth::user();
        $id=$user->idPersonnel;

        if(Visiteur::find($id)){
            $lesVisites = Visite::all();
            return view("visiteurHome",['UneVisite'=>$lesVisites, 'visiteur'=>$id]);
        }

        if(Responsable::find($id)){
            $lesVisiteurs = Visiteur::all();
            foreach($lesVisiteurs as $UnVisiteur){
                $idVisiteur = $UnVisiteur->idVisiteur;
                $user = User::find($idVisiteur);
                $UnVisiteur['idVisiteur'] = $user->idPersonnel;
                $UnVisiteur['nomVisiteur'] = $user->nomPersonnel;
                $UnVisiteur['emailVisiteur'] = $user->email;
                $UnVisiteur['prenomVisiteur'] = $user->prenomPersonnel;
                
            }
        
            return view("responsablehome",['lesVisiteurs'=>$lesVisiteurs]);
        }

        if(Admin::find($id)){
            return view("adminHome");   
        }
        else{
            return view('home');
        }
    
    }

    

}
