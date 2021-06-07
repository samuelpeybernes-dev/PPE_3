<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnel;
use App\Models\Visiteur;
use App\Models\Budget;
use App\Models\personnel_sans_categorie;
use Illuminate\support\Facades\Auth;

class PersonnelController extends Controller
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
        $personnel = Personnel::all();
        $budget = Budget::all();
        $visiteur = Visiteur::all();
        $personnel_sans_categorie = personnel_sans_categorie::all();

        return view('Visiteurs/createVisiteur',['personnel'=>$personnel, 'budget'=>$budget, 'visiteur'=>$visiteur,
         'personnel_sans_categorie'=>$personnel_sans_categorie]);
    }

    /**²
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $visiteurs = Visiteur::all();

        $request->validate([
            'idVisiteur' => ['required'],
            'Objectif' => ['required'],
            'Prime' => ['required'],
            'avantage' => ['required'],
            'idBudget' => ['required'],
            'objectifVisite' =>['required'],
        ]);


        $visiteur =  new \App\Models\Visiteur;
        $visiteur->idVisiteur = $request->input('idVisiteur');
        $visiteur->Objectif = $request->input('Objectif');
        $visiteur->Prime = $request->input('Prime');
        $visiteur->avantage = $request->input('avantage');
        $visiteur->idBudget = $request->input('idBudget');
        $visiteur->objectifVisite =$request->input('objectifVisite');

        $visiteur = Visiteur::create($request->all());

        $visiteur->save();
        return redirect('/home');

    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visiteur = Personnel::find($id);       
        return view('Visiteurs/infoVisiteur', ['UnVisiteur'=>$visiteur]);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visiteur = Visiteur::find($id);
        $visiteur->delete();
        return redirect("home");
    }
}
