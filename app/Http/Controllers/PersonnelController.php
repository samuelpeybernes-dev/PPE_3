<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnel;

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
        return view('createVisiteur');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $visiteurs = Personnel::all();

        $request->validate([
            'nomPersonnel' => ['required'],
            'prenomPersonnel' => ['required'],
            'email' => ['required'],
            'mdp' => ['required'],
        ]);


        $visiteur =  new \App\Models\Personnel;
        $visiteur->nomPersonnel = $request->input('nomPersonnel');
        $visiteur->prenomPersonnel = $request->input('prenomPersonnel');
        $visiteur->email = $request->input('email');
        $visiteur->mdp = $request->input('mdp');

        $visiteur = Personnel::create($request->all());

        $visiteur->save();
        return view('responsableHome',['UnVisiteur'=>$visiteurs]);

    
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
        return view('infoVisiteur', ['UnVisiteur'=>$visiteur]);
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
        $visiteur = App\Models\Personnel::find($id);
        $visiteur->delete();
        return redirect(visiteur);
    }
}
