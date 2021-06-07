<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visite;
use App\Models\Produit;
use App\Models\Praticien;
use App\Models\Visiteur;
use App\Models\Budget;
use App\Models\Personnel;

use Illuminate\support\Facades\Auth;
use App\Models\User;

class VisiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Visites = Visite::all();
        return view('home',['UneVisite'=>$Visites]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       /* $medoc = Produit::all();
        $praticien = Praticien::all();
        $user = Visiteur::all();

        return view('Visites/createVisite',['medoc'=>$medoc, 'praticien'=>$praticien, 'visiteur'=>$user]);
        */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $visites = Visite::all();

        $request->validate([
            'dateVisite' => ['required'],
            'motifVisite' => ['required'],
            'medocPresente' => ['required'],
            'idVisiteur' => ['required'],
            'idPraticien' => ['required'],
        ]);


        $visite =  new \App\Models\Visite;
        $visite->dateVisite = $request->input('dateVisite');
        $visite->motifVisite = $request->input('motifVisite');
        $visite->medocPresente = $request->input('medocPresente');
        $visite->bilanVisite = $request->input('bilan');
        $visite->idVisiteur = $request->input('idVisiteur');
        $visite->idPraticien = $request->input('idPraticien');

        $visite = Visite::create($request->all());

        $visite->save();
  
        return redirect()->route('listevisite.show', $visite->idVisiteur);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visite = Visite::find($id);
        return view('Visites/infoVisite', ['UneVisite'=>$visite]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visite = \App\Models\Visite::find($id);
        $medoc = Produit::all();
        $praticien = Praticien::all();
        return view('Visites/editVisiteResp',compact('visite','id'),['medoc'=>$medoc, 'praticien'=>$praticien]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $visite = Visite::find($id);
        $visite->update($request->all());
        return redirect()->route('listevisite.show', $visite->idVisiteur); //Update EditVisiteResp
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //$Visites = Visite::all();

       $Visite = Visite::find($id);
       $Visite->delete();

       //return redirect('Visiteurs/Home');
       return redirect()->route('listevisite.show', $Visite->idVisiteur); 
    }
}
