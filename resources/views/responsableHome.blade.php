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
         </div> <br>
         <div class="text-center">   
         <a href="{{route('visites.create')}}"><button type="button" class=" btn btn-success ">Ajouter une visite</button></a>
         </div>
            <br>

<table class="table table-hover table-light ">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Email</th>
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
      <td>{{$UnVisiteur->emailVisiteur}}</td>
    </tr>
  </tbody>
  @endforeach
</table>  

           

        </div>
    </div>
</div>
@endsection
