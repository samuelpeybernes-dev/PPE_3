<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activite;
use App\Models\Personnel;
use App\Models\Visiteur;

class ActiviteController extends Controller
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
        $activite = Activite::all();

        return view('Activites/createActivite',['activite'=>$activite]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $activite = Activite::all();
        

        $request->validate([
            'compteRendu' => ['required'],
            'theme' => ['required'],
            'cocktailOffert' => ['required'],
            'idVisiteur' => ['required'],
        ]);


        $activite =  new \App\Models\Activite;
        $activite->compteRendu = $request->input('compteRendu');
        $activite->theme = $request->input('theme');
        $activite->cocktailOffert = $request->input('cocktailOffert');
        $activite->idVisiteur = $request->input('idVisiteur');

        $activite = Activite::create($request->all());

        $activite->save();
  
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
        $visiteur = Visiteur::find($id);
        $idvisiteur = $visiteur->idVisiteur;
        
        return view('Activites/createActivite', ['unVisiteur'=>$visiteur]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activite = \App\Models\Activite::find($id);
        
        return view('Activites/editRespActivite',compact('activite','id'));
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
        $activite = Activite::find($id);
        $activite->update($request->all());
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
        $activite = Activite::find($id);
        $activite->delete();
        return redirect("home");
    }
}
