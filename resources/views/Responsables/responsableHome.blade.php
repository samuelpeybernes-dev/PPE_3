@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Espace responsable') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Vous êtes connecté en tant que responsable!') }}


                </div>
            </div>
            <br>
         <div class="text-center">   
         <a href="{{route('visiteurs.create')}}"><button type="button" class=" btn btn-success ">Ajouter un visiteur</button></a>
         </div>
            <br>

<table class="table table-hover table-light ">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Nombres Visites</th>
      <th scope="col">Objectif Visite</th>
      <th scope="col">Comparatif</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  @foreach ($lesVisiteurs as $UnVisiteur)
  <tbody>
    <tr>
      <td>{{$UnVisiteur->idVisiteur}}</td>
      <td>{{$UnVisiteur->nomVisiteur}}</td>
      <td>{{$UnVisiteur->prenomVisiteur}}</td>
      <td>{{$UnVisiteur->nbrVisites}}</td>
      <td>{{$UnVisiteur->objectifsVisite}}</td>
      <td><a href="{{route('visiteurs.show', $UnVisiteur->idVisiteur)}}" ><button type="button" class="btn btn-info">Information</button></a></td>
      <td><a href="{{route ('listevisite.show' , $UnVisiteur->idVisiteur) }}"><button type="button" class="btn btn-info">Visites et Activitées</button></a></td>
      <td><a href="{{route('creevisite.show' , $UnVisiteur->idVisiteur)}}"><button type="button" class="btn btn-info">Ajouter une visite</button></a></td>
      <td><form action="{{route('visiteurs.destroy', $UnVisiteur->idVisiteur)}}" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">Supprimer</button>
      </form></td>
    </tr>
  </tbody>
  @endforeach
</table>  

           

        </div>
    </div>
</div>
@endsection
