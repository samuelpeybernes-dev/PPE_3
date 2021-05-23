<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visite;
use App\Models\Visiteur;
use App\Models\Produit;
use App\Models\Praticien;
use App\Models\Activite;

class listevisiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visiteur = Visiteur::find($id);
        $idvisiteur = $visiteur->idVisiteur;
        $lesVisites = Visite::all();
        $lesActivite = Activite::all();
        //dd($visite);
        return view('Responsables/listevisite', ['visiteur'=>$idvisiteur, 'UneVisite'=>$lesVisites, 'UneActivite'=>$lesActivite]);
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

        $idmedoc = $visite->idProduit;
        $medoc = Produit::find($idmedoc);

        $idPraticien = $visite->idPraticien;
        $praticien = Praticien::find($idPraticien);
 

        return view('Visites/editBilanVisiteur',compact('visite','id'),['medoc'=>$medoc, 'praticien'=>$praticien]);
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
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
